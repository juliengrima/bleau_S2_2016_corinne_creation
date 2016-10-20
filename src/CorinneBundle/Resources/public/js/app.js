
// Shorthand for $( document ).ready()
<<<<<<< HEAD
=======
$(function () {

    console.log("jQuery est logiquement prêt pour corinne création");

>>>>>>> de8667cb72f944ea55e0dd9a95a39167c4c5b30a

jQuery(document).ready(function($) {
    console.log("jQuery est prêt  pour corinne création");

    $(".button-collapse").sideNav();
    $('#contact-body').hide();


    $("#contact-body").hide().show(1000).css("display", "flex");
    $('#textarea1').trigger('autoresize');

    $('.modal-trigger').leanModal();

    $('.carousel.carousel-slider').carousel({full_width: true, indicators: true});
    $('.carousel').carousel({
        indicators: true
    });


<<<<<<< HEAD

    autoplay();
    function autoplay() {
        $('.carousel').carousel('next');
        setTimeout(autoplay, 4500);
    }

    // RETOUR VERS LE HAUT
=======
    $("#body-contact").hide().show(1000).css("display", "flex");
    $('#textarea1').trigger('autoresize');
>>>>>>> de8667cb72f944ea55e0dd9a95a39167c4c5b30a

    $('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');

    var amountScrolled = 300;

    $(window).scroll(function () {
        if ($(window).scrollTop() > amountScrolled) {
            $('a.back-to-top').fadeIn('slow');
        } else {
            $('a.back-to-top').fadeOut('slow');
        }
    });

    $('a.back-to-top, a.simple-back-to-top').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 700);
        return false;
    });

    // ZOOM SUR LES IMAGES

    $('.materialboxed').materialbox();

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

});