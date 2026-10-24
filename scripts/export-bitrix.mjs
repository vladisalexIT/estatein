import { promises as fs } from 'node:fs'
import path from 'node:path'
import { fileURLToPath } from 'node:url'

const root = path.resolve(path.dirname(fileURLToPath(import.meta.url)), '..')
const buildDir = path.join(root, 'dist-bitrix')
const cmsDir = path.join(root, 'cms')
const templateDir = path.join(cmsDir, 'local', 'templates', 'estatein')
const expectedBase = '/local/templates/estatein/'

async function exists(file) {
  try { await fs.access(file); return true } catch { return false }
}
function phpString(value) {
  return "'" + value.replaceAll('\\', '\\\\').replaceAll("'", "\\'") + "'"
}
function safeResource(file) {
  if (!file || file.startsWith('/') || file.includes('\\') || file.split('/').includes('..')) {
    throw new Error(`Unsafe resource path: ${file}`)
  }
  return file
}
async function writeInitial(file, content) {
  if (await exists(file)) {
    console.log(`KEEP existing editable file: ${path.relative(root, file)}`)
    return
  }
  await fs.mkdir(path.dirname(file), { recursive: true })
  await fs.writeFile(file, content, 'utf8')
  console.log(`CREATE: ${path.relative(root, file)}`)
}
async function copyResources(source, destination) {
  await fs.mkdir(destination, { recursive: true })
  for (const item of await fs.readdir(source, { withFileTypes: true })) {
    if (item.name === '.vite') continue
    const src = path.join(source, item.name)
    const dest = path.join(destination, item.name)
    if (item.isDirectory()) {
      await copyResources(src, dest)
    } else if (item.isFile() && !/\.(?:html?|php|phtml)$/i.test(item.name)) {
      await fs.copyFile(src, dest)
    }
  }
}

async function main() {
  const manifestPath = path.join(buildDir, '.vite', 'manifest.json')
  if (!(await exists(manifestPath))) {
    throw new Error('Run npm run build:bitrix first: dist-bitrix/.vite/manifest.json is missing.')
  }
  const manifest = JSON.parse(await fs.readFile(manifestPath, 'utf8'))
  const html = await fs.readFile(path.join(buildDir, 'index.html'), 'utf8')
  const head = html.match(/<head\b[^>]*>([\s\S]*?)<\/head\s*>/i)?.[1]
  const body = html.match(/<body\b([^>]*)>([\s\S]*?)<\/body\s*>/i)
  const mainMatch = body?.[2].match(/<main\b([^>]*)>([\s\S]*?)<\/main\s*>/i)
  if (!head || !body || !mainMatch) throw new Error('Home must contain head, body and one main element.')
  if (/<load\b/i.test(html)) throw new Error('Unresolved <load> found. Check htmlInject plugin.')
  function attribute(tag, name) {
    const match = tag.match(new RegExp('\\b' + name + '\\s*=\\s*(["\x27])([\\s\\S]*?)\\1', 'i'))
    return match?.[2]
  }
  function builtResource(url) {
    if (!url?.startsWith(expectedBase)) {
      throw new Error(`Wrong asset URL: ${url}. Expected build base ${expectedBase}`)
    }
    return safeResource(url.slice(expectedBase.length))
  }
  const js = []
  for (const tag of head.match(/<script\b[^>]*>/gi) ?? []) {
    if (attribute(tag, 'type')?.toLowerCase() !== 'module') {
      throw new Error('Unexpected non-module script in Home head. Review before exporting.')
    }
    js.push(builtResource(attribute(tag, 'src')))
  }
  if (js.length === 0) throw new Error('No module script found in built Home head.')
  const css = new Set()
  for (const tag of head.match(/<link\b[^>]*>/gi) ?? []) {
    if (attribute(tag, 'rel')?.toLowerCase() === 'stylesheet') {
      css.add(builtResource(attribute(tag, 'href')))
    }
  }
  const visited = new Set()
  function collectCss(key) {
    if (visited.has(key)) return
    visited.add(key)
    const chunk = manifest[key]
    if (!chunk) throw new Error(`Missing manifest chunk: ${key}`)
    for (const dependency of chunk.imports ?? []) collectCss(dependency)
    for (const file of chunk.css ?? []) css.add(safeResource(file))
  }
  // Vite may merge identical HTML entries into one shared chunk.
  // Read the real module URLs from built HTML, not a guessed manifest key.
  for (const file of js) {
    for (const [key, chunk] of Object.entries(manifest)) {
      if (chunk.file === file) collectCss(key)
    }
  }
  if (css.size === 0) throw new Error('No CSS found for Home. Export stopped.')
  for (const file of [...js, ...css]) {
    if (!(await exists(path.join(buildDir, file)))) throw new Error(`Missing resource: ${file}`)
  }
  if (/\/src\/(?:assets|scripts|styles)\//.test(html)) {
    throw new Error('Source resource paths remain in built HTML. Check the build before exporting.')
  }
  if (/<script\b/i.test(body[2])) {
    throw new Error('Unexpected body script. Review script placement before exporting.')
  }
  const mainOffset = mainMatch.index
  const headerMarkup = body[2].slice(0, mainOffset).trim()
  const footerMarkup = body[2].slice(mainOffset + mainMatch[0].length).trim()
  const mainAttributes = mainMatch[1]
  const mainMarkup = mainMatch[2].trim()

  // Keep custom Home head tags; Bitrix renders title, description, charset and assets.
  const extraHead = head
    .replace(/<title\b[^>]*>[\s\S]*?<\/title\s*>/gi, '')
    .replace(/<script\b[^>]*>[\s\S]*?<\/script\s*>/gi, '')
    .replace(/<meta\b[^>]*>/gi, tag => /\bcharset\s*=|\bname\s*=\s*["'](?:description|viewport)["']/i.test(tag) ? '' : tag)
    .replace(/<link\b[^>]*>/gi, tag => /\brel\s*=\s*["'](?:stylesheet|modulepreload|icon)["']/i.test(tag) ? '' : tag)
    .trim()

  const headerPhp = `<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\\Main\\Page\\Asset;

$estateinAssets = require __DIR__ . '/assets.php';
foreach ($estateinAssets['css'] as $estateinCss) {
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/' . $estateinCss);
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php $APPLICATION->ShowTitle(false); ?></title>
  <?php $APPLICATION->ShowHead(); ?>
  <link rel="icon" type="image/svg+xml" href="<?= htmlspecialcharsbx(SITE_TEMPLATE_PATH . '/favicon.svg') ?>">
${extraHead ? '  ' + extraHead + '\n' : ''}  <?php foreach ($estateinAssets['js'] as $estateinJs): ?>
  <script type="module" crossorigin src="<?= htmlspecialcharsbx(SITE_TEMPLATE_PATH . '/' . $estateinJs) ?>"></script>
  <?php endforeach; ?>
</head>
<body${body[1]}>
  <div id="panel"><?php $APPLICATION->ShowPanel(); ?></div>
${headerMarkup}
<main${mainAttributes}>
`
  const footerPhp = `<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
</main>
${footerMarkup}
</body>
</html>
`
  const pagePhp = `<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Estatein | Real Estate Properties & Services');
$APPLICATION->SetPageProperty('description', 'Discover properties, expert real estate services and investment opportunities with Estatein. Find the right home or plan your next property move.');
?>
${mainMarkup}
<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>
`
  const descriptionPhp = `<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
$arTemplate = array(
    'NAME' => 'Estatein',
    'DESCRIPTION' => 'Estatein website template',
    'SORT' => 100,
    'TYPE' => '',
);
`
  const assetsPhp = `<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
return array(
    'css' => array(${[...css].map(phpString).join(', ')}),
    'js' => array(${js.map(phpString).join(', ')}),
);
`

  // Editable PHP snapshots are created once. Future asset exports never overwrite them.
  await fs.mkdir(templateDir, { recursive: true })
  await copyResources(buildDir, templateDir)
  await fs.writeFile(path.join(templateDir, 'assets.php'), assetsPhp, 'utf8')
  await writeInitial(path.join(templateDir, 'description.php'), descriptionPhp)
  await writeInitial(path.join(templateDir, 'header.php'), headerPhp)
  await writeInitial(path.join(templateDir, 'footer.php'), footerPhp)
  await writeInitial(path.join(cmsDir, 'index.php'), pagePhp)
  console.log('\nREADY: cms/local/templates/estatein/ and cms/index.php')
  console.log('Only Home is exported. Other pages and real form submission are separate integration steps.')
  console.log('On later builds upload resources + assets.php together. Old hashed resources are kept deliberately.')
}

main().catch(error => {
  console.error(`\nEXPORT STOPPED: ${error.message}`)
  process.exitCode = 1
})
