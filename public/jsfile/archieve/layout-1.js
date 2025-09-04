var barList = document.getElementById('barList');
window.onscroll = function (){
    if (window.scrollY > 22) {
        barList.classList.add('scrolled');
    }
    else
    {
        barList.classList.remove('scrolled');
    }
};