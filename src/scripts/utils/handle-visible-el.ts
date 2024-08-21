const invisibleClasses = ["invisible", "opacity-0"];

export const checkIsHiddenEl = (el: HTMLElement) => el?.classList.contains(invisibleClasses[0]);

export const handleVisibleEl = (
	el: HTMLElement,
	options?: { isVisible?: boolean; invisibleClasses?: string[] }
) => {
	if (!el) {
		return;
	}

	const isVisible = options?.isVisible !== undefined ? options?.isVisible : checkIsHiddenEl(el);

	invisibleClasses.push(...(options?.invisibleClasses || []));

	if (isVisible) {
		el.classList.remove(...invisibleClasses);
	} else {
		el.classList.add(...invisibleClasses);
	}
};
