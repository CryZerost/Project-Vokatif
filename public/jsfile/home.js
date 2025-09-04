document.getElementById("next").onclick = function () {
    const widthItem = document.querySelector(".post-card").offsetWidth;
    document.getElementById("post-list").scrollLeft -= widthItem;
};
document.getElementById("prev").onclick = function () {
    const widthItem = document.querySelector(".post-card").offsetWidth;
    document.getElementById("post-list").scrollLeft += widthItem;
};
