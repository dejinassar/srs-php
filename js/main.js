(function ($) {
    "use strict";
    // Initiate the wowjs
    new WOW().init();
// Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.sticky-top').css('top', '0px');
        } else {
            $('.sticky-top').css('top', '-100px');
        }
    });
        
});
