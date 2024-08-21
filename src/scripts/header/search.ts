import { handleVisibleEl } from "../utils";

const searchButtons = document.querySelectorAll<HTMLButtonElement>(".search-button");
const searchBlock = document.querySelector<HTMLButtonElement>(".search-block");

searchButtons.forEach((el) => {
	el.addEventListener("click", () => {
		handleVisibleEl(searchBlock, { invisibleClasses: ["hidden", "xl:!block"] });

		if (el.classList.contains("search-open")) {
			const searchInput = searchBlock?.querySelector<HTMLInputElement>("#s");

			searchInput?.focus();
		}
	});
});
