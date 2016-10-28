/**
 * Created by pascal on 27/10/16.
 */
// ********************************************************************
// *                       main function
// ********************************************************************
jQuery(document).ready(function($) {
    console.log('jQuery app_backend a démarré...');
    init_corinne();


    // ZOOM SUR LES IMAGES
    zoom_images();

});

// ********************************************************************
// *                       initialisation
// ********************************************************************

function init_corinne()
{
    // pour le menu hamburger
    $(".button-collapse").sideNav();
    $('#contact-body').hide();

    $("#contact-body").hide().show(1000).css("display", "block");
    $("#access-body").hide().show(2000).css("display" ,"block");

    $('#textarea1').trigger('autoresize');

    $('.modal-trigger').leanModal();

}

function zoom_images() {
    $('.materialboxed').materialbox();
}


// ********************************************************************
// *                       Sliders
// ********************************************************************

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

// ********************************************************************
// *                       Bouton retour vers haut
// ********************************************************************

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


// ********************************************************************
// *                       Facebook
// ********************************************************************

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
// *                       Click droit off
// ********************************************************************
