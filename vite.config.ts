import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.ts'],
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
