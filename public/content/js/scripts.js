"use strict";
const scrollTop = document.getElementById("scroll__top");
scrollTop &&
    (scrollTop.addEventListener("click", function () {
        window.scroll({
            top: 0,
            left: 0,
            behavior: "smooth",
        });
    }),
    window.addEventListener("scroll", function () {
        window.scrollY > 300
            ? scrollTop.classList.add("active")
            : scrollTop.classList.remove("active");
    }));

// button_menue
$(document).ready(function () {
    $(".btn_menu").click(function (e) {
        e.preventDefault();
        $(".header__menu--navigation").addClass("show_menu");
    });
});

//X_menu_Action

$(document).ready(function () {
    $(".btn_close").click(function (e) {
        e.preventDefault();
        $(".header__menu--navigation").removeClass("show_menu");
    });
});

// when click on background div of menue remove the show_menu
$(document).ready(function () {
    $(".menu-backdrop").click(function (e) {
        e.preventDefault();
        $(".header__menu--navigation").removeClass("show_menu");
    });
});

$(document).ready(function () {
    // Toggle sub_mobile_menu on click of mobile_link
    $(".mobile_link").click(function () {
        $(this).next(".sub_mobile_menu").slideToggle(300);
        // $(this).toggleClass("chevron_icon");
    });

    // Toggle small_ul_menu on click of insted_mobile_link
    $(".insted_mobile_link").click(function () {
        $(this).next(".small_ul_menu").slideToggle(300);
        $(this).toggleClass("chevron_icon");
    });
});

var swiper = new Swiper(".clients-slide", {
    slidesPerView: 3,
    loop: true,
    speed: 2000,
    autoplay: {
        enabled: true,
        delay: 1,
    },
});

$(".clients-slide").hover(
    function () {
        this.swiper.autoplay.stop();
    },
    function () {
        this.swiper.autoplay.start();
    }
);

var refLinks = document.querySelectorAll(".ref_styles");
var currentUrl = window.location.href;
refLinks.forEach(function (link) {
    link.classList.remove("active_ref");
    if (link.href === currentUrl) {
        link.classList.add("active_ref");
    }
});

var headerLinks = document.querySelectorAll(".a_ref");
var existUrl = window.location.href;
refLinks.forEach(function (link) {
    link.classList.remove("active_link");
    if (link.href === existUrl) {
        link.classList.add("active_link");
    }
});

$(window).on("load", function () {
    $(".loader-wrapper").fadeOut("fast", function () {
        $(this).remove();
    });
});

// //  cursor_effect
// var kursorx = new kursor({
//     type: 1,
//     color: "#990000",
// });

$(document).ready(function () {
    if ($(".dropdown_arrow").length > 0) {
        $(".dropdown_arrow").each((index, val) => {
            if ($(val).hasClass("active")) {
                $(val).next(".aside_menu").show();
            } else {
                $(val).next(".aside_menu").hide();
            }
        });
    }

    //   $(".flex_asid_menu").removeClass("active");
    //   $(this).closest("li").addClass("active");
    // })

    $(document).on("click", ".dropdown_arrow", function (e) {
        e.preventDefault();

        $(".aside_menu").not($(this).next(".aside_menu")).hide();
        $(this).next(".aside_menu").slideToggle(300);

        $(".dropdown_arrow").removeClass("active");

        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
        } else {
            $(this).addClass("active");
        }

        $(".flex_asid_menu").removeClass("active");
        $(this).closest("li").addClass("active");
    });

    // $(document).ready(function () {
    //   // Toggle sub_mobile_menu on click of mobile_link
    //   $(".dropdown_arrow ").click(function () {
    //     $(this).next(".aside_menu").slideToggle(300);
    //     $(this).toggleClass("chevron_icon");
    //   });
});
