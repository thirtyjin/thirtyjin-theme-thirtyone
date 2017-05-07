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
			
			
			<?php 
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			/**
			 * Customize the loop
			 */
			$args = array(
					'post_type' => 'books',
					// don't set on here posts_per_page
					// refer to function set_posts_per_page( $query )
					// Show all books
					//'posts_per_page' => -1,
					'posts_per_page' => 6,
					'post_status' => 'publish',
					'orderby'=> 'date',
					'paged'=>$paged
			);
			query_posts( $args ); 
			?>
			
			
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'books'); ?>

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

<?php get_sidebar('books'); ?>

</div><!-- #main -->
<?php get_footer('simple'); ?>