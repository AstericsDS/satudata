import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/dashboardChart.js', 'resources/css/dashboardChart.css'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
