<?php
/**
 * Template Name: projects
 * Description: A Page Template that no sidebar full width pages
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */

get_header(); ?>


<div class="section white">
	<div class="w-container container_12">
		<div class="grid_12">
		<?php 
			//$iconplay_intro_id = '216';  // for localhost
			$iconplay_intro_id = '216';  // for online
			
			$iconplay_post_id = get_post( $iconplay_intro_id );
			$iconplay_title = $iconplay_post_id->post_title;
			//$iconplay_content = $iconplay_post_id->post_content;
			$iconplay_content = apply_filters( 'the_content', $iconplay_post_id->post_content );	// refer to: https://codex.wordpress.org/Class_Reference/WP_Post
			//$iconplay_excerpt = $iconplay_post_id->post_excerpt;
			$iconplay_excerpt = apply_filters( 'the_excerpt', $iconplay_post_id->post_excerpt );    // refer to: https://codex.wordpress.org/Class_Reference/WP_Post
			$iconplay_permalink = get_permalink( $iconplay_intro_id );
		?>
			<div class="section-title" >
			    <h2><a href="<?php echo $iconplay_permalink; ?>"><?php echo $iconplay_title ; ?></a></h2>
			</div>
			<div class="section-desc" >
				<?php // echo $iconplay_content; ?>
				<?php echo $iconplay_excerpt; ?>
	  		</div>
	  	</div>
	</div>
</div>



<div class="section grey bg_shot">
	<div class="w-container container_12">
		<div class="grid_12">
			<?php echo do_shortcode("[thirtyjin_recent_article_block number='6' header='off' more_url='#' columns='3' title='iconplay' post_type='freebies' freebiestype='iconplay']"); ?>
		</div>
	</div>
</div>


<div class="section white">
	<div class="w-container container_12">
		<div class="grid_12">
		<?php 
			//$axureplay_intro_id = '1196'; // for localhost
			$axureplay_intro_id = '1261'; // for online

			$axureplay_post_id = get_post( $axureplay_intro_id );
			$axureplay_title = $axureplay_post_id->post_title;
			$axureplay_excerpt = apply_filters( 'the_excerpt', $axureplay_post_id->post_excerpt );
			$axureplay_permalink = get_permalink( $axureplay_intro_id );
		?>
			<div class="section-title" >
			    <h2><a href="<?php echo $axureplay_permalink; ?>"><?php echo $axureplay_title ; ?></a></h2>
			</div>
			<div class="section-desc" >
				<?php echo $axureplay_excerpt; ?>
	  		</div>
	  	</div>
	</div>
</div>

<div class="section grey bg_me">
	<div class="w-container container_12">
		<div class="grid_12">
			<?php echo do_shortcode("[thirtyjin_recent_article_block number='3' header='off' more_url='#' columns='3' title='axureplay' post_type='freebies' freebiestype='axureplay']"); ?>
		</div>
	</div>
</div>


<div class="section grey">
	<div class="w-container container_12">
		<div class="grid_12 center">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<ins class="adsbygoogle"
			     style="display:inline-block;width:728px;height:90px"
			     data-ad-client="ca-pub-5495557010989612"
			     data-ad-slot="6526904512"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div>	
	</div>
</div>


<?php get_footer(); ?>