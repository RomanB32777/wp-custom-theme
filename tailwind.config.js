/** @type {import('tailwindcss').Config} */

require("dotenv").config({ path: "./.env" });

const {
	PRIMARY_COLOR,
	PRIMARY_GRIZZLY_COLOR,
	PRIMARY_LIGHT_COLOR,
	PRIMARY_BRIGHTEST_COLOR,
	PRIMARY_TEXT_COLOR,
	SECONDARY_COLOR,
	SECONDARY_LIGHT_COLOR,
	DARK_COLOR,
	DARK_GRIZZLY_COLOR,
	DARK_OPACITY_COLOR,
	WHITE_COLOR,
	WHITE_LIGHT_COLOR,
	WHITE_OPACITY_COLOR,
	GRIZZLY_COLOR,
	GRIZZLY_LIGHT_COLOR,
	GRIZZLY_DARK_COLOR,
	RED_COLOR,
	YELLOW_COLOR,
	YELLOW_LIGHT_COLOR,
} = process.env;

const alternativeFonts = ["Arial", "sans-serif"];

module.exports = {
	content: [
		"./theme-functions/**/*.php",
		"./theme-parts/**/*.php",
		"./src/**/*.{js,ts}",
		"./*.php",
	],
	theme: {
		extend: {
			colors: {
				primary: {
					DEFAULT: PRIMARY_COLOR || "#1fb1c1",
					grizzly: PRIMARY_GRIZZLY_COLOR || "#a5d6c6",
					light: PRIMARY_LIGHT_COLOR || "#e6f4f1",
					brightest: PRIMARY_BRIGHTEST_COLOR || "#f3eff9",
					dark: "#106c77",
					text: PRIMARY_TEXT_COLOR || "#324b4f",
					hover: "#1ca5b4",
				},
				secondary: {
					DEFAULT: SECONDARY_COLOR || "#ff8d3f",
					light: SECONDARY_LIGHT_COLOR || "#e3ae6f",
					opacity: "#f9c199",
				},
				dark: {
					DEFAULT: DARK_COLOR || "#121212",
					grizzly: DARK_GRIZZLY_COLOR || "#4e4e53",
					opacity: DARK_OPACITY_COLOR || "#000c",
				},
				white: {
					DEFAULT: WHITE_COLOR || "#fff",
					light: WHITE_LIGHT_COLOR || "#f0eff8",
					opacity: WHITE_OPACITY_COLOR || "#f2eff833",
				},
				grizzly: {
					DEFAULT: GRIZZLY_COLOR || "#909090",
					light: GRIZZLY_LIGHT_COLOR || "#7f8c8d",
					dark: GRIZZLY_DARK_COLOR || "#9797b2",
				},
				red: {
					DEFAULT: RED_COLOR || "#d63031",
				},
				yellow: {
					DEFAULT: YELLOW_COLOR || "#fdb913",
					light: YELLOW_LIGHT_COLOR || "#e3ae6f",
				},
			},
			fontFamily: {
				roboto: ['"Roboto"', ...alternativeFonts],
				notoSans: ['"NotoSans"', ...alternativeFonts],
				lineSeedJp: ['"LINESeedJP"', ...alternativeFonts],
				inter: ['"Inter"', ...alternativeFonts],
			},
			letterSpacing: {
				wide: "0.75rem",
				widest: "1.5rem",
			},
			spacing: {
				"50%": "50%",
			},
		},
	},
	variants: {
		extend: {},
	},
	plugins: [],
};
