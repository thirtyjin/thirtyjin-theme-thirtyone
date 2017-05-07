<?php
/**
 * The template for displaying all pages.
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */

get_header(); ?>

	<div id="main" class="clearfix">

		<div id="primary" class="full_width">
			<div id="content" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
				
					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>
				
				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
		
	</div>
	<!-- #main -->
				
<?php get_footer(); ?>