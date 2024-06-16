const initBannerModal = () => {
	const bannerModal = document.querySelector<HTMLDivElement>("#banner-banner-modal");
	const storageHiddenModalKey = "hidden-banner-modal";
	const storageHiddenModalValue = localStorage.getItem(storageHiddenModalKey);

	const isStorageHiddenModal = storageHiddenModalValue ? storageHiddenModalValue === "true" : false;

	if (!bannerModal || isStorageHiddenModal) {
		return;
	}

	const invisibleClasses = ["invisible", "opacity-0"];

	const closeElements = bannerModal.querySelectorAll<HTMLElement>(".close-banner-modal");
	const visibleDelay = Number(bannerModal.getAttribute("data-banner-visible-delay")) || 7000;

	const handleVisibleBannerModal = (isVisible: boolean) => {
		if (isVisible) {
			bannerModal.classList.remove(...invisibleClasses);
		} else {
			bannerModal.classList.add(...invisibleClasses);

			localStorage.setItem(storageHiddenModalKey, "true");
		}
	};

	const timer = setTimeout(() => {
		handleVisibleBannerModal(true);

		clearTimeout(timer);
	}, visibleDelay);

	closeElements.forEach((el) =>
		el.addEventListener("click", () => {
			handleVisibleBannerModal(false);
		})
	);

	document.addEventListener(
		"wpcf7mailsent",
		() => {
			handleVisibleBannerModal(false);
		},
		false
	);
};

initBannerModal();
