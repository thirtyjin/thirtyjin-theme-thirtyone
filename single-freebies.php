<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */

get_header(); ?>
<div id="main" class="clearfix">

		<?php get_template_part( 'meta', 'header'  ); ?>

		<div id="primary">
			<div id="content" role="main">
			
			<?php 
			if (have_posts()) : 
			
				while (have_posts()) : the_post(); 
				get_template_part( 'content', 'single-freebies' ); 
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
				Ads via Google
			</div>
					
    		<?php comments_template( '', true ); ?>
    		     
			</div><!-- #content -->
		</div><!-- #primary -->
		
		<?php get_sidebar(); ?>
	</div>
	<!-- #main -->
<?php get_footer(); ?>