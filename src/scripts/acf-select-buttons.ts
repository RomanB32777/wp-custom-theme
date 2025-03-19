// eslint-disable-next-line @typescript-eslint/ban-ts-comment
// @ts-ignore
jQuery(document).ready(function ($) {
	const fieldSelector = '.acf-field[data-type="taxonomy"]';

	// Create and append Select All/Deselect All buttons
	$(`${fieldSelector} .acf-taxonomy-field[data-ftype="checkbox"]`).before(
		`
			<button type="button" class="select-all button">Select All</button>
			<button type="button" class="deselect-all button">Deselect All</button>
		`
	);

	// Add click event for Select All
	$(`${fieldSelector} .select-all`).click(function (e: { preventDefault: () => void }) {
		e.preventDefault();
		$('input[type="checkbox"]', fieldSelector).prop("checked", true).trigger("change");
	});

	// Add click event for Deselect All
	$(`${fieldSelector} .deselect-all`).click(function (e: { preventDefault: () => void }) {
		e.preventDefault();
		$('input[type="checkbox"]', fieldSelector).prop("checked", false).trigger("change");
	});
});
