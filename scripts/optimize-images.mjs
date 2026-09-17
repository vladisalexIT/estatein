import { mkdir, readdir } from 'node:fs/promises'
import {
  dirname,
  extname,
  join,
  relative,
} from 'node:path'
import sharp from 'sharp'

const inputDirectory = 'raw-assets/images'
const outputDirectory = 'src/assets/images'

const supportedExtensions = new Set([
  '.jpg',
  '.jpeg',
  '.png',
])

async function processDirectory(currentDirectory) {
  const entries = await readdir(currentDirectory, {
    withFileTypes: true,
  })

  for (const entry of entries) {
    const inputPath = join(currentDirectory, entry.name)

    if (entry.isDirectory()) {
      await processDirectory(inputPath)
      continue
    }

    const extension = extname(entry.name).toLowerCase()

    if (!supportedExtensions.has(extension)) {
      continue
    }

    const relativePath = relative(
      inputDirectory,
      inputPath
    )

    const outputPath = join(
      outputDirectory,
      relativePath.replace(
        /\.(jpe?g|png)$/i,
        '.webp'
      )
    )

    await mkdir(dirname(outputPath), {
      recursive: true,
    })

    await sharp(inputPath)
      .rotate()
      .webp({
        quality: 80,
        effort: 5,
      })
      .toFile(outputPath)

    console.log(`${inputPath} -> ${outputPath}`)
  }
}

await mkdir(outputDirectory, {
  recursive: true,
})

await processDirectory(inputDirectory)