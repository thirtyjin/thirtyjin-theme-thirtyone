<?php
/**
 * The template for displaying posts in the Link Post Format on index and archive pages
 *
 * @package Thirty One
 * @since Thirty One 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<header class="entry-header">
			
			<!-- thumbnail  Start-->
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="post-media">
					<?php the_post_thumbnail('feature_medium'); ?>
				</div>
				<!--END .post-media -->
			<?php } else {?>
			<!--No thumbnail-->
			<?php } ?>
			<!--END. thumbnail  -->
			
			<?php $thirtyone_post_format_link_url = get_post_meta( $post->ID, 'thirtyone_post_format_link_url', true );
			if (!empty($thirtyone_post_format_link_url)) {?>
			
				<div class="link-url-bg">
					<h3 class="link-url">
						<a href="<?php echo $thirtyone_post_format_link_url; ?>" rel="links">
						<?php echo $thirtyone_post_format_link_url; ?>
						</a>
					</h3>
				</div><!--END .link-entry -->
				
			<?php }?>
			
			<?php if( !is_singular() ) { 
				get_template_part( 'meta', 'header'  ); 
			} ?>
			
			
		</header><!-- .entry-header -->

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
