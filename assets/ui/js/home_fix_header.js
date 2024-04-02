

window.addEventListener('scroll', function() {

let current_scroll = window.pageYOffset;
let home_header_main = document.querySelector(".home-header-main");
let home_header_main_top = document.querySelector(".home-header-main-top");

if (current_scroll >= 100) {
    home_header_main_top.style.display = "none";
    home_header_main.style.background = "#000";
    home_header_main.classList.add("fixed-top");
}

else if (current_scroll < 25) {
    home_header_main_top.style.display = "flex";
    home_header_main.style.background = "transparent";
    home_header_main.classList.remove("fixed-top");
}

});
