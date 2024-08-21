import { debounce, handleVisibleEl } from "./utils";

// jQuery
// eslint-disable-next-line @typescript-eslint/ban-ts-comment
// @ts-ignore
jQuery(document).ready(function ($) {
	"use strict";

	const handleSearch = (value: string | undefined, resultsBlock: HTMLDivElement) => {
		$.ajax({
			type: "POST",
			// eslint-disable-next-line @typescript-eslint/ban-ts-comment
			// @ts-ignore
			url: ajax_data?.ajax_url,
			data: { search_value: value, action: "search_services" },
			error(request: { responseText: string }, status: string | number) {
				if (status == 500) {
					alert("Error while adding comment");
				} else if (status == "timeout") {
					alert("Error: Server doesn't respond.");
				} else {
					// process WordPress errors
					const wpErrorHtml = request.responseText.split("<p>"),
						wpErrorStr = wpErrorHtml[1].split("</p>");

					alert(wpErrorStr[0]);
				}
			},
			success(response: string) {
				handleVisibleEl(resultsBlock, { isVisible: !!response.length });

				resultsBlock.innerHTML = response;
			},
		});
	};

	const searchDelay = debounce(handleSearch, 600);

	const autocompleteBlocks = document.querySelectorAll<HTMLDivElement>(".autocomplete-block");

	autocompleteBlocks.forEach((block) => {
		const autocompleteInput = block.querySelector<HTMLInputElement>("input");
		const autocompleteResults = block.querySelector<HTMLDivElement>(".autocomplete-results");

		autocompleteInput?.addEventListener("focusout", () => {
			handleVisibleEl(autocompleteResults, { isVisible: false });
		});

		autocompleteInput?.addEventListener("focus", (e) => {
			const { value } = e.target as HTMLInputElement;

			if (value) {
				handleSearch(value, autocompleteResults);
			}

			// handleVisibleEl(autocompleteResults);
		});

		autocompleteInput?.addEventListener("input", (e) => {
			const { value } = e.target as HTMLInputElement;

			searchDelay(value || undefined, autocompleteResults);
		});
	});
});
