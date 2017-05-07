<?php
/**
 * The template for displaying posts in the Gallery Post Format on index and archive pages
 *
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */
?>

<?php 
	wp_enqueue_script ( 'jquery_carouFredSel' );
	wp_enqueue_script ( 'jquery_touchSwipe_min' ); 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!--BEGIN .post-media -->

<header class="entry-header">

<div class="post-media">
    <?php thirtyjin_gallery_post($post->ID, 'feature_medium'); ?>
<!--END .post-media -->
</div>

<?php if( !is_singular() ) { 
				get_template_part( 'meta', 'header'  ); 
			} ?>

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


<?php get_template_part( 'meta', 'footer' ); ?> 

</article><!-- #post-<?php the_ID(); ?> -->
