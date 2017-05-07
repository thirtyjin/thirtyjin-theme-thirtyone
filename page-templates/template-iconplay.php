<?php
/**
 * Template Name: Home
 * Description: A Page Template that no sidebar full width pages
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */

get_header('fullmode'); ?>


<div class="section hero" data-stellar-background-ratio="2">
	<div class="w-container container_12">

	<div class="align-block">
	
		<p class="hero-description hero-description-tagline">WELCOME TO THIRTYJIN.COM</p>
		<h1 class="hero-title" data-stellar-ratio="2">ThirtyJin</h1>
		<p class="hero-description hero-description-tagline">Designer's stories and ideas</p>
		<div class="hero-actions btn-set">
			<a class="btn btn-light btn-small" href="<?php echo home_url(); ?>" title="Learn more about Medium">Learn more</a>
		</div>
	</div>
	</div>
</div>


<div class="section white">
	<div class="w-container container_12">
		<div class="grid_6">
		<?php 
			$iconplay_intro_id = '1196';

			$post_id = get_post( $iconplay_intro_id );
			$title = $post_id->post_title;
			$content = $post_id->post_content;
			$permalink = get_permalink( $iconplay_intro_id );
		?>
			<div class="section-title" >
			    <h1><a href="<?php echo $permalink; ?>"><?php echo $title ; ?></a></h1>
			</div>
			<div class="section-desc" >
				<?php echo $content; ?>
	  		</div>
	  	</div>
		<div class="grid_6">
		<?php echo get_the_post_thumbnail(1196,'feature_half','');?>
		</div>
	</div>
</div>

<div class="section black">
	<div class="w-container container_12">
		<div class="grid_12">
			<a class="price-text">11111111111111111111111111111</a>
		</div>	
	</div>
</div>

<div class="section grey bg_me" data-stellar-background-ratio="2">
	<div class="w-container container_12">
		<div class="grid_12">
			<?php echo do_shortcode("[thirtyjin_recent_article_block number='4' header='on' more_url='#' columns='2' title='22222222222222| Freebies' post_type='freebies']"); ?>
		</div>
	</div>
</div>

<div class="section white">
	<div class="w-container container_12">
		<div class="grid_12">
			<?php echo do_shortcode("[thirtyjin_recent_article_block number='6' header='on' more_url='#' columns='3' title='333333333333333| portfolio' post_type='portfolio']"); ?>
		</div>
	</div>
</div>

<div class="section black">
	<div class="w-container container_12">
		<div class="grid_12 center">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- 11111111111   728x90 -->
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

<div class="section grey">
	<div class="w-container container_12">
		<div class="grid_12">
			<?php echo do_shortcode("[thirtyjin_recent_article_block number='8' header='on' more_url='www.baidu.com' columns='4' title='Blog | sddddddddddd' post_type='post']"); ?>
		</div>
	</div>
</div>

<div class="section white">
	<div class="w-container container_12">
		<div class="grid_12">
			<?php echo do_shortcode("[thirtyjin_recent_books_list number='6' header='on' more_url='#' title='Books | ssssssssssss']" )?> 
		</div>
	</div>
</div>






<?php get_footer(); ?>