<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
	
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php else : ?>
	
	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'thirtyone' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<?php endif; ?>

	<?php get_template_part('meta', 'header' ); ?> 

</article><!-- #post-<?php the_ID(); ?> -->

<?php 
    thirtyjin_comments_before();
    comments_template('', true); 
    thirtyjin_comments_after();
?>

			
<?php thirtyone_single_nav(); ?>
