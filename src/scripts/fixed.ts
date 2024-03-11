const showOnPx = 100;
const invisibleClasses = ["invisible", "opacity-0"];

const backToTopButton = document.querySelector<HTMLButtonElement>("#back-to-top");

const getScrollContainer = () => document.documentElement || document.body;

if (backToTopButton) {
	document.addEventListener(
		"scroll",
		() => {
			const scrollContainer = getScrollContainer();

			if (scrollContainer.scrollTop > showOnPx) {
				backToTopButton?.classList.remove(...invisibleClasses);
			} else {
				backToTopButton?.classList.add(...invisibleClasses);
			}
		},
		{ capture: true, passive: true }
	);
}

backToTopButton?.addEventListener("click", () => {
	document.body.scrollIntoView({
		behavior: "smooth",
	});
});
