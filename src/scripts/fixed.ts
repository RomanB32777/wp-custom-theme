const throttle = (func: (...args: unknown[]) => void, timeout: number) => {
	let ready: boolean = true;

	return (...args: unknown[]) => {
		if (!ready) {
			return;
		}

		ready = false;
		func(...args);

		setTimeout(() => (ready = true), timeout);
	};
};

const showOnPx = 400;
const invisibleClasses = ["invisible", "opacity-0"];
const sessionHiddenButtonKey = "hidden-fixed-button";

const backToTopButton = document.querySelector<HTMLButtonElement>("#back-to-top");
const fixedButton = document.querySelector<HTMLDivElement>("#fixed-button");
const closeFixedButton = fixedButton?.querySelector<HTMLButtonElement>("#close-fixed-button");

const getScrollContainer = () => document.documentElement || document.body;

const handleVisibleFixedButton = (isVisible = false) => {
	if (isVisible) {
		fixedButton?.classList.remove(...invisibleClasses);
	} else {
		fixedButton?.classList.add(...invisibleClasses);
	}
};

const getIsSessionVisibleButton = () => !sessionStorage.getItem(sessionHiddenButtonKey);

const setBottomPositionForBackToTopButton = (isVisibleFixedButton = false) => {
	if (!backToTopButton) {
		return;
	}

	backToTopButton.style.bottom = "2rem";
	document.body.style.paddingBottom = null;

	if (fixedButton && isVisibleFixedButton) {
		const fixedButtonHeight = fixedButton.clientHeight;

		document.body.style.paddingBottom = `${fixedButtonHeight}px`;
		backToTopButton.style.bottom = `${fixedButtonHeight + 20}px`;
	}
};

if (backToTopButton || fixedButton) {
	document.addEventListener(
		"scroll",
		() => {
			const scrollContainer = getScrollContainer();

			if (scrollContainer.scrollTop > showOnPx) {
				backToTopButton?.classList.remove(...invisibleClasses);
			} else {
				backToTopButton?.classList.add(...invisibleClasses);
			}

			handleVisibleFixedButton(scrollContainer.scrollTop > showOnPx && getIsSessionVisibleButton());
		},
		{ capture: true, passive: true }
	);

	if (backToTopButton) {
		const orientation = window.matchMedia("(orientation: portrait)");

		setBottomPositionForBackToTopButton(getIsSessionVisibleButton());

		orientation.addEventListener(
			"change",
			throttle(() => setBottomPositionForBackToTopButton(getIsSessionVisibleButton()), 100),
			{
				passive: true,
			}
		);

		window.addEventListener(
			"resize",
			throttle(() => setBottomPositionForBackToTopButton(getIsSessionVisibleButton()), 100),
			{
				passive: true,
			}
		);
	}

	closeFixedButton?.addEventListener("click", () => {
		handleVisibleFixedButton();
		setBottomPositionForBackToTopButton();
		sessionStorage.setItem(sessionHiddenButtonKey, "true");
	});
}

backToTopButton?.addEventListener("click", () => {
	document.body.scrollIntoView({
		behavior: "smooth",
	});
});
