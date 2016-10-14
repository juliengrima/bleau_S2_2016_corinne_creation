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

<!-- GOOGLE MAPS -->
<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>

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

<!-- GOOGLE MAPS SCRIPT -->

<script type='text/javascript'>
		function init_map(){
			// DEBUT FONCTION
			var myOptions = {
				zoom:9,center:new google.maps.LatLng(48.109367,2.7571100000000115),
				mapTypeId: google.maps.MapTypeId.ROADMAP};

				map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
				marker = new google.maps.Marker({
					map: map,position: new google.maps.LatLng(48.109367,2.7571100000000115)});

				infowindow = new google.maps.InfoWindow({
					content:'<strong>les 22 et 23 octobre au salon d\'Art et Artisanat de Nargis (45)</strong><br>nargis<br>'});
					
				marker = new google.maps.Marker({
					map: map,position: new google.maps.LatLng(48.1951399,3.2688646)});

				infowindow = new google.maps.InfoWindow({
					content:'<strong>du 1er au 31 octobre, à l\'office de tourisme de Sens (89)<br>'});


				google.maps.event.addListener(marker, 'click', 
					function(){
						infowindow.open(map,marker);});
						infowindow.open(map,marker);}
			// 			// FIN FONCTION

						google.maps.event.addDomListener(window, 'load', init_map);
	</script>
    
    
</body>

</html>