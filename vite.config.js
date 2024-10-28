import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        hmr: {
          host: 'dev.ginipick.com',
          //port: '6001',
        }
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                //'resources/css/admin.css',
                'resources/js/app.js',
                'resources/js/default.js',
                'resources/js/defaultalpine.js',
            ],
            refresh: true,
        }),
    ],
});
