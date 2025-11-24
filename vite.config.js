import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/charts/dashboard.js',
                'resources/js/charts/jumlah-mahasiswa.js',
                'resources/js/charts/jumlah-wisudawan.js',
                'resources/js/charts/bisnis-dan-inovasi.js',
                'resources/js/charts/keuangan-dan-perencanaan.js',
                'resources/js/charts/grafik-artikel.js',
                'resources/js/charts/scopus-document-quartile.js',
                'resources/js/charts/tracer-study-partisipasi.js',
                'resources/js/charts/tracer-study-status.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
