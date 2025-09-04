const postContainer = [...document.querySelectorAll('.post-container')];
const bntNext = [...document.querySelectorAll('.btn-next')];
const btnPrev = [...document.querySelectorAll('.btn-prev')];

postContainer.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    btnNext[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    });

    btnPrev[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    });
});
