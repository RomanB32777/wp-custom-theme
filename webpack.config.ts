import path from "path";

import { buildWebpack } from "./config/build/build.webpack";
import type { TEnvVariables } from "./config/build/types";

export default (env: TEnvVariables) => {
	const envMode = env.mode;
	const envPort = Number(env.port);

	return buildWebpack({
		port: envPort || 5050,
		mode: envMode ?? "production",
		paths: {
			output: path.resolve(__dirname, "dist"),
			entry: path.resolve(__dirname, "src", "index.ts"),
			src: path.resolve(__dirname, "src"),
			pluginStyles: path.resolve(__dirname, "..", "wp-blocks", "build", "style.css"),
		},
	});
};
