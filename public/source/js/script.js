window.onscroll = function () {
    headerSticky()
};


// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function headerSticky() {
    var navbar = document.getElementById("menu");
    var header = document.getElementById("header");
    var sticky = navbar.offsetHeight + header.offsetHeight;

    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
    } else {
        navbar.classList.remove("sticky");
    }
}

function menu() {
    var menu_button = document.getElementById("menu-button");
    var menu = document.getElementsByClassName("menu")[0];

    if (menu_button.classList.contains("opened")) {
        menu_button.classList.remove("opened");

        menu.classList.remove("open");
    } else {
        menu_button.classList.add("opened");

        menu.classList.add("open");
    }
}


var logo = document.querySelector('.header h1')
var foreBird = document.querySelector('.header');

window.addEventListener('scroll', function () {
    var scrolled = window.scrollY;

    logo.style.transform = "translate(0px," + scrolled + "%)";
    foreBird.style.transform = "translate(0px,-" + scrolled / 80 + "%)";
});

var forEach = function (array, callback) {
    for (var i = 0; i < array.length; i++) {
        callback.call(null, i, array[i]);
    }
};

