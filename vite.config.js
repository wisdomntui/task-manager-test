import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    server: {
        proxy: {
            "/api": "http://127.0.0.1:8000",
        },
        cors: {
            origin: "http://127.0.0.1:8000", // Allow requests from the Laravel local server (Fix for CORS)
            methods: ["GET", "POST", "PUT", "DELETE"],
            allowedHeaders: ["Content-Type"],
        },
    },
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/task-manager.js",
            ],
            refresh: true,
        }),
    ],
});
