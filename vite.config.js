import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            css: {
                output: 'public/css', // Specify your desired output directory
                writeFileName: 'tailwind-output.css',
            },
        }),
    ],

    build: {
        rollupOptions: {
          output: {
            entryFileNames: 'app.js',
            assetFileNames: 'app.css',
            chunkFileNames: "app.js",
            manualChunks: undefined,
          }
        }
      }
});
