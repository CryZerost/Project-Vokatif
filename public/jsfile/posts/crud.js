const input = document.getElementById("image");
const uploadLabel = document.querySelector(".upload-label");
const previewContainer = document.querySelector(".image-preview-container");

input.addEventListener("change", (e) => {
    const files = Array.from(e.target.files);

    files.forEach((file) => {
        const reader = new FileReader();

        reader.onload = (e) => {
            const imageWrapper = document.createElement("div");
            imageWrapper.classList.add("image-preview-wrapper");

            const image = document.createElement("img");
            image.src = e.target.result;
            image.classList.add("image-preview");
            imageWrapper.appendChild(image);

            const cancelButton = document.createElement("button");
            cancelButton.classList.add("cancel-button");
            cancelButton.innerHTML = "&times;";
            cancelButton.addEventListener("click", () => {
                imageWrapper.remove();
                checkImageCount();
            });
            imageWrapper.appendChild(cancelButton);

            previewContainer.appendChild(imageWrapper);
            checkImageCount();
        };

        reader.readAsDataURL(file);
    });

    // Clear the file input value after selecting files
    input.value = "";
});

function checkImageCount() {
    const imageCount = previewContainer.childElementCount;
    if (imageCount > 0) {
        uploadLabel.style.display = "none";
    } else {
        uploadLabel.style.display = "block";
    }
}
