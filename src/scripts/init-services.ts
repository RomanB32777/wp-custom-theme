export const initServices = () => {
	const wrapper = document.querySelector(".services");

	if (!wrapper) {
		return;
	}

	const services = wrapper.querySelectorAll<HTMLDivElement>(".service");

	const changeStateOfService = (serviceEl: HTMLDivElement | null) => {
		if (!serviceEl) {
			return;
		}

		const title = serviceEl.querySelector(".service-title");
		const arrowWrapper = serviceEl.querySelector(".arrow-wrapper");
		const serviceContent = serviceEl.querySelector(".service-content");

		if (arrowWrapper) {
			arrowWrapper.classList.toggle("rotate-90");

			const arrow = arrowWrapper.querySelector(".more-arrow");
			arrow?.classList.toggle("active");
		}

		serviceContent?.classList.toggle("hidden");
		title?.classList.toggle("font-semibold");
	};

	const itemHandler = (serviceEl: HTMLDivElement | null) => {
		changeStateOfService(serviceEl);
		serviceEl.classList.toggle("active");
	};

	services.forEach((service) => {
		const titleBlock = service.querySelector(".title-block");

		(titleBlock || service)?.addEventListener("click", () => itemHandler(service));
	});
};

initServices();
