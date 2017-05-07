<?php
/**
 * The default template for displaying portfolio content
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		
		<header class="entry-header">
		
			<!-- thumbnail  Start-->
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="post-media">
					<?php if ( is_tag() || is_category() || is_search() || is_archive() ) {
						the_post_thumbnail('feature_medium');
					} else { ?>
						<div class="portfolio_post_thumb_full">
							<?php the_post_thumbnail('feature_large'); ?>
						</div>
					<?php }?>
				</div>
			<!--END .post-media -->
			<?php } else {?>
			<!--No thumbnail-->
			<?php } ?>
			<!--END. thumbnail  -->
		
		
	        <?php get_template_part( 'meta', 'header'  ); ?>
		</header><!-- .entry-header -->
		
		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>

		
		<div class="entry-content">
		
				<?php the_content( __( 'Read More', 'thirtyone' ) ); ?>
			
				<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'thirtyone' ) . '</span>', 'after' => '</div>' ) ); ?>
		
		</div><!-- .entry-content -->
		
		
		<div class="divider top slash light"></div>

		
		<?php endif; ?>

	</article><!-- #post-<?php the_ID(); ?> -->
	
