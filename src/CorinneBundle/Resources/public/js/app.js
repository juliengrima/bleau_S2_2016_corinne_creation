
// Shorthand for $( document ).ready()


function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 4500);
}

function gestionSlider() {

    $('.carousel.carousel-slider').carousel({full_width: true, indicators: true});
    $('.carousel').carousel({
        indicators: true
    });
}


function init_corinne()
{
    // pour le menu hamburger
    $(".button-collapse").sideNav();
    $('#contact-body').hide();

    $("#contact-body").hide().show(1000).css("display", "flex");
    $("#access-body").hide().show(2000).css("display" ,"flex");

    $('#textarea1').trigger('autoresize');

    $('.modal-trigger').leanModal();

}

function retour_haut() {
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
}

function zoom_images() {
    $('.materialboxed').materialbox();
}

function gere_facebook() {

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
}

// ********************************************************************
// *                       Programme principal
// ********************************************************************
jQuery(document).ready(function($) {
    console.log("jQuery est prêt  pour corinne création");

    init_corinne();
    gestionSlider();
    autoplay();

    // // RETOUR VERS LE HAUT
    retour_haut();

    // ZOOM SUR LES IMAGES
    zoom_images();

    gere_facebook();

});