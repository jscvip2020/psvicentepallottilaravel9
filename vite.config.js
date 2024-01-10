import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/style.css',
                'resources/fontawesome/css/fontawesome.min.css',
                'resources/fontawesome/css/solid.min.css',
                'resources/fontawesome/css/brands.min.css',
                'node_modules/flowbite/dist/flowbite.min.js',
            ],
            refresh: true,
        }),
    ],
});
