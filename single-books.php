<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */

get_header(); ?>
<div id="main" class="clearfix">
		<div id="primary">
			<div id="content" role="main">
			
			<?php 
			if (have_posts()) : 
			
				while (have_posts()) : the_post(); 
				get_template_part( 'content', 'single-books' );
				endwhile; 
			
			else: 
    		     
    		    // If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );
    		     
			endif; ?>
			<!--END #primary .hfeed-->
			
			
			<?php thirtyone_single_nav(); ?>
					
			<!-- ads block -->
			<div class="ads_block center">
			<div class="ads_info"><?php _e('Ads via Google','thirtyone')?></div>
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- single-freebies-468x60 -->
				<ins class="adsbygoogle"
				     style="display:inline-block;width:468px;height:60px"
				     data-ad-client="ca-pub-5495557010989612"
				     data-ad-slot="6545094112"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
			
    		<?php comments_template( '', true ); ?>
			
    		     
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_sidebar('books'); ?>
	</div>
	<!-- #main -->
<?php get_footer(); ?>