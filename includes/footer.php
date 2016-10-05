<!-- DIV FIN PARALLAX -->
</div>
<!--<footer class="page-footer">
    
</footer>-->

<!-- Import jQuery before materialize.js -->
<!-- APPEL SCRIPT JQUERY on line -->
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.1.0.js" integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.1.0.js" integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk=" crossorigin="anonymous"></script>

<!-- Compiled and minified JavaScript on line -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<!-- Fichier source off line -->
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/parallax.js"></script>
<script type="text/javascript" src="js/jquery.arctext.js"></script>

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
    
<!-- PARALLAX -->
    <SCRIPT>$(document).ready(function(){
      $('.parallax').parallax();
    });</SCRIPT>

<!-- COURBUR DE TEXT -->
<!-- <script type="text/javascript">			
	var $word1		= $('#arc-wrapper').find('span').hide();
	var $word2		= $('#arc-wrapper').find('span').hide();
	var $word3		= $('#arc-wrapper').find('span').hide();
	var $word4		= $('#arc-wrapper').find('span').hide();
	var $word5		= $('#arc-wrapper').find('span').hide();
	var $lien1	= $('#lien1').hide(); //changer nom example1
	var $lien2	= $('#lien2').hide(); //changer nom example1
	var $lien3	= $('#lien3').hide(); //changer nom example1
	var $lien4	= $('#lien4').hide(); //changer nom example1
	var $lien5	= $('#lien5').hide(); //changer nom example1
	
	google.load('webfont','1'); // loader de font
	
	google.setOnLoadCallback(function() { //fonction d'appel font 
		WebFont.load({
			google		: {
				families	: ['Pinyon Script'] // police menu
			},
			fontactive	: function(fontFamily, fontDescription) { 
				init();
			},
			fontinactive	: function(fontFamily, fontDescription) {
				init();
			}
		});
	});
	
	function init() {	
		$word1.show().arctext();
		$word2.show().arctext();
		$word3.show().arctext();
		$word4.show().arctext();
		$word5.show().arctext();
		
		$lien1.show().arctext({radius: 500});
		$lien2.show().arctext({radius: 500});
		$lien3.show().arctext({radius: 500});
		$lien4.show().arctext({radius: 500});
		$lien5.show().arctext({radius: 500});
	
	};
</script> -->
  

</body>

</html>