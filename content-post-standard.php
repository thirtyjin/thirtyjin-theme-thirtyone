<?php
/**
 * The default template for displaying content
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
					<?php the_post_thumbnail('feature_medium'); ?>
				</div>
				<!--END .post-media -->
			<?php } ?>
			<!--END. thumbnail  -->
		
		
			<?php if ( is_sticky() ) : ?>
				<hgroup>
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'thirtyone' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<h3 class="entry-format"><?php _e( 'Featured', 'thirtyone' ); ?></h3>
				</hgroup>
			<?php else : ?>
			
				
		    <?php if( !is_singular() ) { 
				get_template_part( 'meta', 'header'  ); 
			} ?>
				
			
			<?php endif; ?>

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
						<?php the_content( __( 'Read More', 'thirtyone' ) ); ?>
						<?php wp_link_pages( 
							array( 
							'before' => '<div class="page-link"><span>' . __( 'Pages:', 'thirtyone' ) . '</span>', 
							'after' => '</div>' 
							) ); ?>
				</div><!-- .entry-content -->
			<?php endif; ?>

		<?php endif; ?>

    	<?php get_template_part( 'meta', 'footer'  ); ?> 

	</article><!-- #post-<?php the_ID(); ?> -->
	
