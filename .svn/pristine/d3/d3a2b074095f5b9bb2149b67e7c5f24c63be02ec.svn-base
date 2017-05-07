<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */

get_header(); ?>

<div id="main" class="clearfix">
		<section id="primary">
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<?php
					/* Queue the first post, that way we know
					 * what author we're dealing with (if that is the case).
					 *
					 * We reset this later so we can run the loop
					 * properly with a call to rewind_posts().
					 */
					the_post();
					
					/* Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();
				?>

				<?php
				// If a user has filled out their description, show a bio on their entries.
				if ( get_the_author_meta( 'description' ) ) : ?>
				<div id="author-info">
					<div id="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'thirtyone_author_bio_avatar_size', 60 ) ); ?>
					</div><!-- #author-avatar -->
					<div id="author-description">
						<h2><?php printf( __( 'About %s', 'thirtyone' ), get_the_author() ); ?></h2>
						<?php the_author_meta( 'description' ); ?>
					</div><!-- #author-description	-->
				</div><!-- #entry-author-info -->
				<?php endif; ?>

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
	
</div> <!-- #main -->

<?php get_footer(); ?>