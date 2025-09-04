// news.js

const sliders = document.querySelectorAll(".image-slider");

sliders.forEach((slider) => {
    const wrapper = slider.querySelector(".slider-wrapper");
    const slides = wrapper.querySelectorAll(".slide");
    const prevButton = slider.querySelector(".prev-button");
    const nextButton = slider.querySelector(".next-button");
    let currentIndex = 0;

    // Show the initial slide
    slides[currentIndex].classList.add("active");

    // Handle previous button click
    prevButton.addEventListener("click", () => {
        slides[currentIndex].classList.remove("active");
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        slides[currentIndex].classList.add("active");
    });

    // Handle next button click
    nextButton.addEventListener("click", () => {
        slides[currentIndex].classList.remove("active");
        currentIndex = (currentIndex + 1) % slides.length;
        slides[currentIndex].classList.add("active");
    });
});
