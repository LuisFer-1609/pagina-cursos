import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/forms/subir-curso.js",
                "resources/js/services/api.js",
                "resources/js/services/funcs.js",
            ],
            refresh: true,
        }),
    ],
});
