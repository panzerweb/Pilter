import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';

const jsFiles = fs.readdirSync('resources/js')
    .filter(file => file.endsWith('.js'))
    .map(file => `resources/js/${file}`);

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                ...jsFiles, // Include all JS files
            ],
            refresh: true,
        }),
    ],
});
