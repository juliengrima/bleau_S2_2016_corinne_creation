
// Shorthand for $( document ).ready()
$(function () {
    console.log("jQuery est prêt");

    $(".button-collapse").sideNav();

    $('#body-contact').hide();

    $('.navTextCC').mouseenter(function () {
        $(this).effect('highlight', 'slow');
    });

    $('.navTextMobileCC').mouseenter(function () {
        $(this).effect('highlight', 'slow');
    });

});