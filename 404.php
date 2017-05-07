<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */

get_header(); ?>

	<div id="primary" class="full_width">
		<div id="content" role="main">

			<article id="post-0" class="post error404 not-found">
				<div class="entry-content">
					<div class="error404-content">
					
					<h1><?php _e( '404 Page', 'thirtyone' ); ?></h1>
					<p><?php _e( 'File or Page not found!', 'thirtyone' ); ?></p>
						
					</div>
				</div><!-- .entry-content -->
				
			</article><!-- #post-0 -->
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>