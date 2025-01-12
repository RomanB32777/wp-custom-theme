import { baseBreakpoints } from "../constants";

const dropdownMenuItems = document.querySelectorAll<HTMLDivElement>(".dropdown");

dropdownMenuItems.forEach((item) => {
	const link = item.querySelector("a.dropdown-toggle");
	const dropdownMenu = item.querySelector(".dropdown-menu");
	const dropdownArrow = item.querySelector(".dropdown-arrow");
	const isSubMenu = item.classList.contains("group/sub");

	link?.addEventListener("click", (e) => {
		e.preventDefault();

		const currentWindowWidth = window.innerWidth;

		if (currentWindowWidth < baseBreakpoints.xl || isSubMenu) {
			dropdownArrow?.classList.toggle("rotate-180");

			dropdownMenu?.classList.toggle("hidden");
		}
	});
});
