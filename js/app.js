
// Shorthand for $( document ).ready()
$(function () {
    console.log("jQuery est prêt pour corinne création");

    $(".button-collapse").sideNav();

    $('#body-contact').hide();

    $('.navTextCC').mouseenter(function () {
        $(this).effect('highlight', 'slow');
    });

    $('.navTextMobileCC').mouseenter(function () {
        $(this).effect('highlight', 'slow');
    });

    $("#body-contact").hide().show(1000).css("display", "flex");
    $('#textarea1').trigger('autoresize');

    $('.modal-trigger').leanModal();



    $('.carousel.carousel-slider').carousel({full_width: true, indicators: true});

    $('.carousel').carousel({indicators: true});

    $("#body-contact").hide().show(1000).css("display", "flex");
    $('#textarea1').trigger('autoresize');
});