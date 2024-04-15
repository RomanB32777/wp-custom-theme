import Swiper from "swiper";
import { Autoplay, Navigation, Pagination } from "swiper/modules";
import type { SwiperOptions } from "swiper/types/swiper-options";

import { baseBreakpoints } from "./constants";

const initSwiperSlider = (containerName: string, options: SwiperOptions = {}) => {
	const {
		breakpoints,
		pagination = {
			clickable: true,
			el: ".swiper-pagination",
			bulletClass: "swiper-bullet group w-3 h-3",
			bulletActiveClass: "nav-active",
			renderBullet(_index: number, className: string) {
				return `
				<button class="${className}">
					<span class="bullet-dot inline-block w-full h-full duration-200 rounded-full bg-primary-light hover:bg-secondary group-[.nav-active]:bg-secondary"></span>
				</button>
			`;
			},
		},
		navigation = {
			nextEl: `.arrow-right-${containerName.replace(/[#.]/gm, "")}`,
			prevEl: `.arrow-left-${containerName.replace(/[#.]/gm, "")}`,
			disabledClass: "nav-disabled",
		},
		...swiperOptions
	} = options;

	return new Swiper(containerName, {
		modules: [Navigation, Pagination, Autoplay],
		slidesPerView: 4,
		spaceBetween: 24,
		autoplay: {
			delay: 5000,
		},
		pagination,
		navigation,
		breakpoints: {
			[baseBreakpoints.xs]: {
				slidesPerView: 1,
			},
			[baseBreakpoints.sm]: {
				slidesPerView: 2,
			},
			[baseBreakpoints.md]: {
				slidesPerView: 3,
			},
			[baseBreakpoints.xl]: {
				slidesPerView: 4,
				spaceBetween: 24,
			},
			...breakpoints,
		},
		...swiperOptions,
	});
};

const sliderElementName = "swiper-slider";

const sliders = document.querySelectorAll<HTMLDivElement>(`.${sliderElementName}`);

for (let i = 0; i < sliders.length; i++) {
	const slider = sliders[i];

	const { id } = slider;

	if (id) {
		const isLoop = slider.getAttribute("data-slider-loop") === "true";
		const isDisableNavigation = slider.getAttribute("data-slider-disable-navigation");
		const isDisablePagination = slider.getAttribute("data-slider-disable-pagination");
		const isDisableAutoplay = slider.getAttribute("data-slider-disable-autoplay");
		const autoplayDelay = slider.getAttribute("data-slider-autoplay-delay");

		const xsSlidesPerView = slider.getAttribute("data-slides-per-view-xs");
		const smSlidesPerView = slider.getAttribute("data-slides-per-view-sm");
		const mdSlidesPerView = slider.getAttribute("data-slides-per-view-md");
		const xlSlidesPerView = slider.getAttribute("data-slides-per-view-xl");

		const xsSlidesSpaceBetween = slider.getAttribute("data-slides-space-between-xs");
		const smSlidesSpaceBetween = slider.getAttribute("data-slides-space-between-sm");
		const mdSlidesSpaceBetween = slider.getAttribute("data-slides-space-between-md");
		const xlSlidesSpaceBetween = slider.getAttribute("data-slides-space-between-xl");

		const baseSpaceBetween = 24;

		const swiperOptions: SwiperOptions = {
			loop: isLoop,
			breakpoints: {
				[baseBreakpoints.xs]: {
					slidesPerView: Number(xsSlidesPerView) || 1,
					spaceBetween: Number(xsSlidesSpaceBetween) || baseSpaceBetween,
				},
				[baseBreakpoints.sm]: {
					slidesPerView: Number(smSlidesPerView) || 2,
					spaceBetween: Number(smSlidesSpaceBetween) || baseSpaceBetween,
				},
				[baseBreakpoints.md]: {
					slidesPerView: Number(mdSlidesPerView) || 3,
					spaceBetween: Number(mdSlidesSpaceBetween) || baseSpaceBetween,
				},
				[baseBreakpoints.xl]: {
					slidesPerView: Number(xlSlidesPerView) || 4,
					spaceBetween: Number(xlSlidesSpaceBetween) || baseSpaceBetween,
				},
			},
			autoplay:
				isDisableAutoplay === "true"
					? false
					: {
							delay: Number(autoplayDelay) || 5000,
						},
		};

		if (isDisableNavigation === "true") {
			swiperOptions.navigation = false;
		}

		if (isDisablePagination === "true") {
			swiperOptions.pagination = false;
		}

		initSwiperSlider(`#${id}`, swiperOptions);
	}
}
