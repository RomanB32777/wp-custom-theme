export interface IBuildPaths {
	entry: string;
	output: string;
	src: string;
	pluginStyles: string;
}

export type TBuildMode = "production" | "development";

export interface IBuildOptions {
	mode: TBuildMode;
	port: number;
	paths: IBuildPaths;
}

export type TEnvVariables = Partial<IBuildOptions>;
