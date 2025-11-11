import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
    optimizeDeps: {
        // Force Vite to skip WASM files during optimization
        exclude: ['*.wasm','problematic-wasm-library']
    },
    build: {
        // Reduce chunk size
        chunkSizeWarningLimit: 1000,
        rollupOptions: {
            output: {
                manualChunks: {
                    // Split vendor chunks
                    vendor: ['vue'],
                }
            }
        }
    },
    plugins: [
        laravel({
            input: ['resources/js/app.ts','resources/css/filament/admin/theme.css'],
            ssr: 'resources/js/ssr.ts',
            refresh: true,
        }),
        tailwindcss(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve:{
        alias: {
            '@': path.resolve(__dirname, './resources/js'),
            '@sections': path.resolve(__dirname, './resources/js/sections'),
            '@images': path.resolve(__dirname, './resources/js/assets/images'),
            '@videos': path.resolve(__dirname, './resources/js/assets/videos'),
        }
    },
});
