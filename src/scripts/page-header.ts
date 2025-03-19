const initPaymentsShowButton = () => {
	const paymentSystemsRow = document.querySelector<HTMLDivElement>(".page-header .payment-systems");
	const paymentShowButton =
		paymentSystemsRow?.querySelector<HTMLDivElement>(".payments-show-button");

	if (!paymentSystemsRow || !paymentShowButton) {
		return;
	}

	let nextButtonContent = "<";

	paymentShowButton.addEventListener("click", () => {
		const paymentSystemsItems =
			paymentSystemsRow.querySelectorAll<HTMLDivElement>(".payment-system-item");

		paymentSystemsItems.forEach((el) => {
			if (el.classList.contains("toggle-visible-item")) {
				el.classList.toggle("hidden");
			}
		});

		paymentShowButton.querySelector("span").innerHTML = nextButtonContent;

		nextButtonContent = nextButtonContent === "<" ? "..." : "<";
	});
};

initPaymentsShowButton();
