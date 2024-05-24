import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import mkcert from 'vite-plugin-mkcert';

const host = 'boorgir.test';
const port = '8000';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        mkcert(),
    ],
    server: {
        https: true,
        proxy: {
            '^(?!(\/\@vite|\/resources|\/node_modules))': {
                target: `http://${host}:${port}`
            }
        },
        cors: {
            origin: 'https://boorgir.test:3000',
            credentials: true
        },
        host,
        port: 443,
        hmr: { host },
    },
});
