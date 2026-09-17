import { resolve, dirname } from 'node:path'
import { fileURLToPath } from 'url'
import { defineConfig } from 'vite'
import htmlInject from 'vite-plugin-html-inject'
import { ViteImageOptimizer } from 'vite-plugin-image-optimizer'

// Получаем __dirname для ES-модулей
const __dirname = dirname(fileURLToPath(import.meta.url))

export default defineConfig({
  plugins: [
    htmlInject(),
    ViteImageOptimizer({
      png: { quality: 80 },
      jpeg: { quality: 82 },
      jpg: { quality: 82 },
      webp: { quality: 80 },
      avif: { quality: 65 },
      svg: {
        multipass: true,
        plugins: [
          {
            name: 'preset-default',
            params: {
              overrides: {
                removeViewBox: false,
              },
            },
          },
        ],
      },
    }),
  ],
  build: {
    rollupOptions: {
      input: {
        home: resolve(__dirname, 'index.html'),
        about: resolve(__dirname, 'about.html'),
      },
    },
  },
})