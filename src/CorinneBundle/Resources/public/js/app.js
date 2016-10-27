// ********************************************************************
// *                       Appel Fonction
// ********************************************************************
jQuery(document).ready(function($) {

    init_corinne();
    gestionSlider();
    autoplay();
    // click_droit_off();

    // RETOUR VERS LE HAUT
    retour_haut();

    // ZOOM SUR LES IMAGES
    zoom_images();

    // Fontion fonction
    gere_facebook();

    // deroulement_card();

});

// ********************************************************************
// *                       JS General
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
function click_droit_off() {
    //if IE4+
   document.onselectstart = new Function("return false");
   document.oncontextmenu = new Function("return false");
   //if NS6
   if (window.sidebar) {
       document.onmousedown = disableselect;
       document.onclick = reEnable;
   }

    $('img').mousedown(function (event) {
        switch (event.which) {
            case 1:
//                alert('Left Mouse button pressed.');
                break;
            case 2:
                // alert('Middle Mouse button pressed.');
                break;
            case 3:

                $('#modalAlert').openModal();
                break;
            default:
                alert('You have a strange Mouse!');
        }
    });
}