export const initDocuments = () => {
	const wrapper = document.querySelector(".documents-wrapper");

	if (!wrapper) {
		return;
	}

	const documentCategories = wrapper.querySelectorAll<HTMLDivElement>(".document-category");
	const documentsWrapper = wrapper.querySelector(".documents");
	const documents = wrapper.querySelectorAll<HTMLDivElement>(".document-content");

	const changeStateOfDocument = (documentEl: HTMLDivElement | null) => {
		if (!documentEl) {
			return;
		}

		documentEl?.classList.toggle("hidden");
	};

	const itemHandler = (categoryEl: HTMLDivElement | null) => {
		const dataCategory = categoryEl.getAttribute("data-category");
		const documentContent = documentsWrapper?.querySelector<HTMLDivElement>(
			`[data-category="${dataCategory}"]`
		);

		changeStateOfDocument(documentContent);
		categoryEl.classList.toggle("active");

		documentCategories.forEach((el) => {
			if (el !== categoryEl && el.classList.contains("active")) {
				const currDataCategory = el.getAttribute("data-category");
				const currDocumentContent = documentsWrapper?.querySelector<HTMLDivElement>(
					`[data-category="${currDataCategory}"]`
				);

				changeStateOfDocument(currDocumentContent);

				el.classList.toggle("active");
			}
		});

		documents.forEach((el) => {
			if (el !== documentContent) {
				el.classList.add("hidden");
			}
		});
	};

	documentCategories.forEach((element) => {
		element.addEventListener("click", () => itemHandler(element));
	});

	if (documentCategories.length) {
		itemHandler(documentCategories[0]);
	}
};

initDocuments();
