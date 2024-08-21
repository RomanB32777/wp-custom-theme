import toastr from "toastr";

import { checkIsHiddenEl, handleVisibleEl } from "./utils";

const formModal = document.querySelector<HTMLDivElement>("#form-modal");

const successText =
	formModal.getAttribute("data-modal-success-text") || "Your data has been sent successfully!";

const handleDisableSubmitForm = () => {
	const shortcodeForms = document.querySelectorAll<HTMLDivElement>(".form-shortcode");

	shortcodeForms.forEach((form) => {
		const submitButton = form.querySelector<HTMLInputElement>('input[type="submit"]');

		submitButton?.toggleAttribute("disabled");
	});
};

document.addEventListener("wpcf7beforesubmit", handleDisableSubmitForm, false);

document.addEventListener("wpcf7invalid", handleDisableSubmitForm, false);

document.addEventListener(
	"wpcf7mailsent",
	() => {
		if (!checkIsHiddenEl(formModal)) {
			handleVisibleEl(formModal);
		}

		toastr.success(successText, "", { progressBar: true });
		handleDisableSubmitForm();
	},
	false
);

const initFormModal = () => {
	if (!formModal) {
		return;
	}

	const handleModalElements = document.querySelectorAll<HTMLElement>(".handle-form-modal");

	handleModalElements.forEach((el) =>
		el.addEventListener("click", () => {
			handleVisibleEl(formModal);
		})
	);
};

initFormModal();
