import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/sass/theme.scss',
                'resources/js/theme.js',
            ],
            refresh: true,
        }),
    ],
});
