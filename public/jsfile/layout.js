var menuList = document.getElementById("menuList");
var barList = document.getElementById("barList");

barList.style.height = "10vh";
menuList.style.maxHeight = "0px";

function togglemenu() {
    if (menuList.style.maxHeight == "0px") {
        menuList.style.maxHeight = "180px";
    } else {
        menuList.style.maxHeight = "0px";
    }

    if (barList.style.height == "10vh") {
        barList.style.height = "18vh";
    } else {
        barList.style.height = "10vh";
    }
}

var barList = document.getElementById("barList");
window.onscroll = function () {
    if (window.scrollY > 22) {
        barList.classList.add("scrolled");
    } else {
        barList.classList.remove("scrolled");
    }
};
