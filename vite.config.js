import { defineConfig } from "vite";
import liveReload from "vite-plugin-live-reload";
import path from "path";

export default defineConfig({
	root: "./resources",
	base: "/",

	plugins: [liveReload("./resources/views/**/*.php")],

	build: {
		outDir: "../public/dist",
		emptyOutDir: true,
		assetsDir: "./assets",
		manifest: true,
		rollupOptions: {
			input: {
				main: path.resolve(__dirname, "resources/js/app.js"),
			},
		},
	},
	resolve: {
		alias: {
			"@": path.resolve(__dirname, "resources"),
		},
	},

	server: {
		cors: true,
	},
});