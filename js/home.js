$(function() {
    new WOW().init(); // wow.js for scrolling animation

 // scroll to sections

 $(".navbar .navbar-nav a.nav-link").on("click", function() {
    var object = $(this);
    $("html ,body").animate({
        scrollTop: $("#" + object.data("scroll") + "-section").offset().top - 55
    }, 700);
});


});