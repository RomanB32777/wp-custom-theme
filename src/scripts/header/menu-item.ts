import { baseBreakpoints } from "../constants";

const dropdownMenuItems = document.querySelectorAll<HTMLDivElement>(".dropdown");

dropdownMenuItems.forEach((item) => {
	const link = item.querySelector("a.dropdown-toggle");
	const dropdownMenu = item.querySelector(".dropdown-menu");

	link?.addEventListener("click", (e) => {
		e.preventDefault();

		const currentWindowWidth = window.innerWidth;

		if (currentWindowWidth < baseBreakpoints.xl) {
			link.classList.toggle("!text-yellow");

			dropdownMenu?.classList.toggle("hidden");
		}
	});
});
