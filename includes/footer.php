<!-- DIV FIN PARALLAX -->
</div>
<!--<footer class="page-footer">
    
</footer>-->

<!-- Import jQuery before materialize.js -->
<!-- APPEL SCRIPT JQUERY on line -->

<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous">
</script>    

<!-- Compiled and minified JavaScript on line -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

<!-- Fichier source off line -->
<script src="js/slider.js" type="text/javascript"></script>
<script type="text/javascript" src="js/index.js"></script>

<!-- RETOUR VERS LE HAUT -->
<script type="text/javascript">
$('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');

var amountScrolled = 300;

$(window).scroll(function() {
	if ( $(window).scrollTop() > amountScrolled ) {
		$('a.back-to-top').fadeIn('slow');
	} else {
		$('a.back-to-top').fadeOut('slow');
	}
});

$('a.back-to-top, a.simple-back-to-top').click(function() {
	$('html, body').animate({
		scrollTop: 0
	}, 700);
	return false;
});
</script>  

<!-- ZOOM SUR LES IMAGES -->
<SCRIPT type='text/javascript'>
 $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
</SCRIPT>

<SCRIPT type='text/javascript'>

  $('.carousel.carousel-slider').carousel({full_width: true});
        
</SCRIPT>




    
    
</body>

</html>