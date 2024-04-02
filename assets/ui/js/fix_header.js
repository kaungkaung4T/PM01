

window.addEventListener('scroll', function() {

    let current_scroll = window.pageYOffset;
    let header_main = document.querySelector(".header-main");
    let header_main_top = document.querySelector(".header-main-top");
    
    if (current_scroll >= 100) {
        header_main_top.style.display = "none";
        header_main.style.background = "#000";
        header_main.classList.add("fixed-top");
        header_main.querySelector(".navbar-brand").classList.add("text-white");

        let white = header_main.querySelector("ul").querySelectorAll(".nav-link");
        for (var i = 0; i < white.length; i++) {
            white[i].classList.add("text-white");
        }
    }
    
    else if (current_scroll < 25) {
        header_main_top.style.display = "flex";
        header_main.style.background = "transparent";
        header_main.classList.remove("fixed-top");
        header_main.querySelector(".navbar-brand").classList.remove("text-white");
        
        let white = header_main.querySelector("ul").querySelectorAll(".nav-link");
        for (var i = 0; i < white.length; i++) {
            white[i].classList.remove("text-white");
        }
    }
    
    });
    