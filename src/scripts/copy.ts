if (navigator.clipboard) {
	const copyButtons = document.querySelectorAll<HTMLDivElement>(".copy-button");

	for (let i = 0; i < copyButtons.length; i++) {
		const button = copyButtons[i];
		const copyText = button.getAttribute("data-copy-text");

		button.addEventListener("click", () => {
			navigator.clipboard.writeText(copyText).then(
				() => button.classList.add("active"),
				(err) => console.error("Error while copying: ", err)
			);
		});
	}
}
