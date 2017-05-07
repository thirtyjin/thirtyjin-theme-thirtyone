<?php
/**
 * Template Name: Sidebar Template
 * Description: A Page Template that adds a sidebar to pages
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */

get_header(); ?>

<div id="main" class="clearfix">
		
		<?php while ( have_posts() ) : the_post(); ?>

		<div id="primary">
			<div id="content" role="main">
					<?php get_template_part( 'content', 'page-notitle' ); ?>
					<?php comments_template( '', true ); ?>
			</div><!-- #content -->
		</div><!-- #primary -->

			
		<?php endwhile; // end of the loop. ?>
		
<?php get_sidebar('two'); ?>
</div><!-- #main -->
<?php get_footer('simple'); ?>