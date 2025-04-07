const initTabs = (wrapper: HTMLDivElement) => {
	if (!wrapper) {
		return;
	}

	const tabButtons = wrapper.querySelectorAll<HTMLLIElement>(".tab-button");

	const changeStateOfTab = (tabButtonEl: HTMLLIElement | null) => {
		if (!tabButtonEl) {
			return;
		}

		const tabId = tabButtonEl.getAttribute("data-tab-id");
		const tabContent = wrapper.querySelector(`#author-tab-content-${tabId}`);

		tabButtonEl?.classList.toggle("active");
		tabContent?.classList.toggle("hidden");
	};

	const itemHandler = (tabButtonEl: HTMLLIElement | null) => {
		if (tabButtonEl.classList.contains("active")) {
			return;
		}

		changeStateOfTab(tabButtonEl);

		tabButtons.forEach((el) => {
			if (el !== tabButtonEl && el.classList.contains("active")) {
				changeStateOfTab(el);
			}
		});
	};

	if (tabButtons.length) {
		itemHandler(tabButtons[0]);
	}

	tabButtons.forEach((tabButton) => {
		tabButton.addEventListener("click", () => itemHandler(tabButton));
	});
};

const tabBlocks = document.querySelectorAll<HTMLDivElement>(".custom-tabs");

tabBlocks.forEach(initTabs);
