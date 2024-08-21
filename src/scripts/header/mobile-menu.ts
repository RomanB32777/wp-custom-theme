const handleVisibleMenuElements = document.querySelectorAll<HTMLDivElement>(".handle-visible-menu");
const mobileMenu = document.querySelector<HTMLDivElement>("#mobile-menu");
const specialMobileButton = document.querySelector<HTMLButtonElement>("#special-mobile-button");

const hamburgerBtn = document.querySelector<HTMLButtonElement>(".hamburger-btn");
const openIcon = hamburgerBtn?.querySelector(".hamburger-icon");
const closeIcon = hamburgerBtn?.querySelector(".close-icon");

const handleVisibleMenu = () => {
	openIcon?.classList.toggle("hidden");
	closeIcon?.classList.toggle("hidden");

	mobileMenu?.classList.toggle("hidden");
	document.body.classList.toggle("overflow-hidden");
};

handleVisibleMenuElements.forEach((el) => {
	el.addEventListener("click", handleVisibleMenu);
});

specialMobileButton?.addEventListener("click", () => {
	const specialMainButton = document.querySelector<HTMLButtonElement>("#specialButton");

	if (specialMainButton) {
		specialMainButton.click();
		handleVisibleMenu();
	}
});
