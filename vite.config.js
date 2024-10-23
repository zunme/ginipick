import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        hmr: {
          host: 'dev.ginipick.com',
          //port: '5174',
        }
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/default.js',
            ],
            refresh: true,
        }),
    ],
});
