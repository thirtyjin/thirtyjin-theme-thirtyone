<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	
	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'thirtyone' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	
	
	<footer class="entry-meta clearfix">
		<?php edit_post_link( __( 'Edit', 'thirtyone' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
	
</article><!-- #post-<?php the_ID(); ?> -->
