
// Shorthand for $( document ).ready()
$(function () {
    console.log("jQuery est normalement prêt pour corinne création");

    $(".button-collapse").sideNav();

    $('#contact-body').hide();

    $('.navTextCC').mouseenter(function () {
        $(this).effect('highlight', 'slow');
    });

    $('.navTextMobileCC').mouseenter(function () {
        $(this).effect('highlight', 'slow');
    });

    $("#contact-body").hide().show(1000).css("display", "flex");
    $('#textarea1').trigger('autoresize');

    $('.modal-trigger').leanModal();

    $('.carousel.carousel-slider').carousel({full_width: true, indicators: true});
    $('.carousel').carousel({indicators: true});


    $('.carousel').carousel('next');

    autoplay()
    function autoplay() {
        // Next slide
        $('.carousel').carousel('next');
        setTimeout(autoplay, 4500);
    }

    $("#body-contact").hide().show(1000).css("display", "flex");
    $('#textarea1').trigger('autoresize');

    // RETOUR VERS LE HAUT 
    
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


});