<?php
/**
 * The template for displaying Archive pages.
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */

get_header(); ?>

<div id="main" class="clearfix">

		<section id="primary">
			<div id="content" role="main">
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */

					if ( 'books' == get_post_type() ) {
						get_template_part( 'content', 'books');
					}elseif ('page' == get_post_type() ){
						get_template_part( 'content', 'page');
					}elseif ('portfolio' == get_post_type() ){
						get_template_part( 'content', 'portfolio');
					}elseif ('freebies' == get_post_type() ){
						get_template_part( 'content', 'freebies');
					} else {
						get_template_part( 'content', '');
					}
					?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php 
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );
				?>

			<?php endif; ?>
			
			<?php thirtyone_paging_nav(); ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_sidebar('two'); ?>
</div>
<!-- #main -->
<?php get_footer('simple'); ?>