import { promises as fs } from 'node:fs'
import path from 'node:path'
import { fileURLToPath } from 'node:url'

const root = path.resolve(
  path.dirname(fileURLToPath(import.meta.url)),
  '..'
)

const buildDir = path.join(root, 'dist-bitrix')
const cmsDir = path.join(root, 'cms')
const templateDir = path.join(
  cmsDir,
  'local',
  'templates',
  'estatein'
)

const includeDir = path.join(
  cmsDir,
  'local',
  'include',
  'pages'
)

const expectedBase = '/local/templates/estatein/'

const pages = [
  { name: 'about', source: 'about.html' },
  { name: 'properties', source: 'properties.html' },
  { name: 'services', source: 'services.html' },
  { name: 'property-details', source: 'property-details.html' },
  { name: 'contacts', source: 'contacts.html' },
]

const routes = {
  index: '/',
  about: '/about/',
  properties: '/properties/',
  services: '/services/',
  'property-details': '/property-details/',
  contacts: '/contacts/',
}

async function exists(file) {
  try {
    await fs.access(file)
    return true
  } catch {
    return false
  }
}

function relative(file) {
  return path.relative(root, file)
}

function phpString(value) {
  return (
    "'" +
    value
      .replaceAll('\\', '\\\\')
      .replaceAll("'", "\\'") +
    "'"
  )
}

function attribute(tag, name) {
  const match = tag.match(
    new RegExp(
      '\\b' +
      name +
      '\\s*=\\s*(["\\x27])([\\s\\S]*?)\\1',
      'i'
    )
  )

  return match?.[2]
}

function decodeHtml(value) {
  return value
    .replace(/&#x([0-9a-f]+);/gi, (_, code) => {
      return String.fromCodePoint(parseInt(code, 16))
    })
    .replace(/&#([0-9]+);/g, (_, code) => {
      return String.fromCodePoint(Number(code))
    })
    .replace(/&quot;/gi, '"')
    .replace(/&apos;/gi, "'")
    .replace(/&lt;/gi, '<')
    .replace(/&gt;/gi, '>')
    .replace(/&amp;/gi, '&')
}

function resourcePath(url, source) {
  if (!url?.startsWith(expectedBase)) {
    throw new Error(
      `${source}: unexpected resource URL: ${url}`
    )
  }

  const file = url.slice(expectedBase.length)

  if (
    !file ||
    file.startsWith('/') ||
    file.includes('\\') ||
    file.includes('?') ||
    file.includes('#') ||
    file.split('/').includes('..')
  ) {
    throw new Error(
      `${source}: unsafe resource path: ${file}`
    )
  }

  return file
}

function readBuiltPage(html, source) {
  // Comments are not needed in the initial CMS snapshot.
  const cleanHtml = html.replace(
    /<!--[\s\S]*?-->/g,
    ''
  )

  const head = cleanHtml.match(
    /<head\b[^>]*>([\s\S]*?)<\/head\s*>/i
  )?.[1]

  const body = cleanHtml.match(
    /<body\b[^>]*>([\s\S]*?)<\/body\s*>/i
  )?.[1]

  if (!head || !body) {
    throw new Error(
      `${source}: head or body was not found.`
    )
  }

  const mainMatches = [
    ...body.matchAll(
      /<main\b([^>]*)>([\s\S]*?)<\/main\s*>/gi
    ),
  ]

  if (mainMatches.length !== 1) {
    throw new Error(
      `${source}: exactly one main element is required.`
    )
  }

  const mainMarkup = mainMatches[0][2].trim()

  if (!mainMarkup) {
    throw new Error(
      `${source}: main element is empty.`
    )
  }

  if (/<load\b/i.test(cleanHtml)) {
    throw new Error(
      `${source}: unresolved load tags were found.`
    )
  }

  if (/\/src\/(?:assets|scripts|styles)\//i.test(cleanHtml)) {
    throw new Error(
      `${source}: source resource URLs remain in the build.`
    )
  }

  if (/<script\b/i.test(body)) {
    throw new Error(
      `${source}: unexpected body script was found.`
    )
  }

  const titleMarkup = head.match(
    /<title\b[^>]*>([\s\S]*?)<\/title\s*>/i
  )?.[1]

  const descriptionTag = (
    head.match(/<meta\b[^>]*>/gi) ?? []
  ).find((tag) => {
    return attribute(tag, 'name')?.toLowerCase() === 'description'
  })

  const descriptionMarkup = descriptionTag
    ? attribute(descriptionTag, 'content')
    : undefined

  if (!titleMarkup?.trim() || !descriptionMarkup?.trim()) {
    throw new Error(
      `${source}: title or description is missing.`
    )
  }

  const js = []

  for (const tag of head.match(/<script\b[^>]*>/gi) ?? []) {
    if (attribute(tag, 'type')?.toLowerCase() !== 'module') {
      throw new Error(
        `${source}: unexpected non-module head script.`
      )
    }

    js.push(
      resourcePath(attribute(tag, 'src'), source)
    )
  }

  const css = []

  for (const tag of head.match(/<link\b[^>]*>/gi) ?? []) {
    if (attribute(tag, 'rel')?.toLowerCase() === 'stylesheet') {
      css.push(
        resourcePath(attribute(tag, 'href'), source)
      )
    }
  }

  if (!js.length || !css.length) {
    throw new Error(
      `${source}: JavaScript or CSS was not found.`
    )
  }

  return {
    title: decodeHtml(titleMarkup.trim()),
    description: decodeHtml(descriptionMarkup.trim()),
    mainMarkup,
    js: [...new Set(js)].sort(),
    css: [...new Set(css)].sort(),
  }
}

function rewriteLinks(markup) {
  return markup.replace(
    /\b(href|action)(\s*=\s*)(["'])([^"']*)\3/gi,
    (fullMatch, name, separator, quote, value) => {
      const updatedValue = value.replace(
        /^(?:\.\/|\/)?(index|about|properties|services|property-details|contacts)\.html(?=[?#]|$)/i,
        (_, pageName) => routes[pageName.toLowerCase()]
      )

      return name + separator + quote + updatedValue + quote
    }
  )
}

function removeTermsLink(markup) {
  return markup.replace(
    /<a\b(?=[^>]*\bclass\s*=\s*["'][^"']*\bfooter__legal-link\b[^"']*["'])(?=[^>]*\bhref\s*=\s*["']\/terms\.html["'])[^>]*>[\s\S]*?<\/a\s*>/gi,
    ''
  )
}

function createPagePhp(page, content) {
  return `<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$APPLICATION->SetTitle(${phpString(content.title)});
$APPLICATION->SetPageProperty(
    'description',
    ${phpString(content.description)}
);

$APPLICATION->IncludeComponent(
    'bitrix:main.include',
    '',
    [
        'AREA_FILE_SHOW' => 'file',
        'PATH' => '/local/include/pages/${page.name}.php',
        'EDIT_TEMPLATE' => '',
    ]
);

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
`
}

function createIncludePhp(markup) {
  return `<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
${rewriteLinks(markup)}
`
}

async function main() {
  const requiredFiles = [
    path.join(buildDir, '.vite', 'manifest.json'),
    path.join(buildDir, 'index.html'),
    path.join(cmsDir, 'index.php'),
    path.join(templateDir, 'header.php'),
    path.join(templateDir, 'footer.php'),
    path.join(templateDir, 'assets.php'),
    ...pages.map((page) => path.join(buildDir, page.source)),
  ]

  for (const file of requiredFiles) {
    if (!(await exists(file))) {
      throw new Error(
        `Missing file: ${relative(file)}. ` +
        'Run build:bitrix and export:bitrix first. ' +
        'All six HTML pages must be included in the Vite build.'
      )
    }
  }

  const homeHtml = await fs.readFile(
    path.join(buildDir, 'index.html'),
    'utf8'
  )

  const home = readBuiltPage(homeHtml, 'index.html')
  const newFiles = []

  // Validate all five pages before writing any CMS files.
  for (const page of pages) {
    const html = await fs.readFile(
      path.join(buildDir, page.source),
      'utf8'
    )

    const content = readBuiltPage(html, page.source)

    if (
      JSON.stringify(content.js) !== JSON.stringify(home.js) ||
      JSON.stringify(content.css) !== JSON.stringify(home.css)
    ) {
      throw new Error(
        `${page.source}: its JS/CSS differs from Home. ` +
        'The shared template must be reviewed before importing.'
      )
    }

    newFiles.push(
      {
        file: path.join(cmsDir, page.name, 'index.php'),
        content: createPagePhp(page, content),
      },
      {
        file: path.join(includeDir, `${page.name}.php`),
        content: createIncludePhp(content.mainMarkup),
      }
    )
  }

  for (const resource of [...home.js, ...home.css]) {
    if (!(await exists(path.join(templateDir, resource)))) {
      throw new Error(
        `Missing exported resource: ${resource}. ` +
        'Run npm run export:bitrix first.'
      )
    }
  }

  // Never replace previously created editable page files.
  for (const item of newFiles) {
    if (await exists(item.file)) {
      throw new Error(
        `Already exists: ${relative(item.file)}. ` +
        'Import stopped to protect editable CMS content.'
      )
    }
  }

  const filesToUpdate = [
    path.join(cmsDir, 'index.php'),
    path.join(templateDir, 'header.php'),
    path.join(templateDir, 'footer.php'),
  ]

  const updates = []

  for (const file of filesToUpdate) {
    const original = await fs.readFile(file, 'utf8')

    let updated = rewriteLinks(original)

    if (file === path.join(templateDir, 'footer.php')) {
      updated = removeTermsLink(updated)
    }

    if (updated !== original) {
      updates.push({ file, content: updated })
    }
  }

  for (const item of newFiles) {
    await fs.mkdir(path.dirname(item.file), {
      recursive: true,
    })

    await fs.writeFile(item.file, item.content, {
      encoding: 'utf8',
      flag: 'wx',
    })

    console.log(`CREATE: ${relative(item.file)}`)
  }

  for (const item of updates) {
    await fs.writeFile(item.file, item.content, 'utf8')

    console.log(`UPDATE: ${relative(item.file)}`)
  }

  console.log('\nREADY: five Bitrix pages and five include files.')
  console.log('Existing Home markup and shared template were preserved.')
  console.log('Internal page links were converted to directory URLs.')
  console.log('Forms and property search are still demos.')
}

main().catch((error) => {
  console.error(`\nIMPORT STOPPED: ${error.message}`)
  process.exitCode = 1
})