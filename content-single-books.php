<?php
/**
 * The freebies post type template for displaying content
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" class="archive-books" <?php post_class(); ?>>
		<div class="books-thumb">
		
			<!-- post-media  Start-->
			<div class="post-media">
				
			<div class="books_post_thumb">
			<?php if ( has_post_thumbnail() ) { ?>
				
				<a class="thumb_img empty_img" href="<?php the_permalink(); ?>"  title="<?php the_title(); ?>"> 
					<?php the_post_thumbnail('feature_book'); ?>
					<div class="overlay"><?php _e('View More.', 'thirtyone'); ?></div>
				</a>
			<?php } else {?>
				<a class="thumb_img empty_img" href="<?php the_permalink(); ?>"  title="<?php the_title(); ?>"> 
					<div class="overlay"><?php _e('View More.', 'thirtyone'); ?></div>
				</a>
			<?php } ?>
			</div>

			</div>
			<!-- END. post-media -->
	
		</div><!-- .books-thumb -->


		<div class="books-content entry-header">
		
			<header class="entry-header">
			<?php get_template_part( 'meta', 'header' ); ?>
			</header>
		
			<?php if ( is_search() ) : // Only display Excerpts for Search ?>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
			<?php else : ?>
			
				<?php if ( has_excerpt() ) : ?>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
				<?php else : ?>
				
				<div class="entry-content">
					<?php
						the_content( __( 'Read More', 'thirtyone' )  );
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'thirtyone' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						) );
					?>
				</div><!-- .entry-content -->
				<?php endif; ?>
			
			<?php endif; ?>

		</div><!-- .books-content -->
		
	<?php get_template_part( 'meta', 'footer' ); ?>
		
	</article><!-- #post-<?php the_ID(); ?> -->
	
