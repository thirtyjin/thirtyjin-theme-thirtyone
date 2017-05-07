<?php
/**
 * Template Name: Contact Template
 * Description: A Page Template that adds a sidebar to pages
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */

get_header(); ?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script>
	function initialize() {
	  var myLatlng = new google.maps.LatLng(40.050954,116.300801);
	  var mapOptions = {
	    zoom: 16,
	    disableDoubleClickZoom: false,
	    scrollwheel: false,
	    center: myLatlng
	  }
	  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	
	  var marker = new google.maps.Marker({
	      position: myLatlng,
	      map: map,
	      title: 'ThirtyJin.com!'
	  });
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>	
<div id="map-canvas"></div>

<div id="main" class="clearfix">
	

	<div id="primary">
		<div id="content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>
					
		</div><!-- #content -->
		
	</div><!-- #primary -->

		
		
<?php get_sidebar('two'); ?>
</div><!-- #main -->
<?php get_footer('simple'); ?>