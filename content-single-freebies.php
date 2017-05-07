<?php
/**
 * The freebies post type template for displaying content
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
					
					<div class="freebies_post_thumb">
							<?php the_post_thumbnail('feature_medium'); ?>
						<div class="counts">
							<span class="likethis">
								<?php printLikes(get_the_ID()); ?> <!--Likes.  -->
				            </span>
						</div>
					</div>
				</div>
				<!--END .post-media -->
			<?php } else {?>
			<!--No thumbnail-->
			<?php } ?>
			<!--END. thumbnail  -->
		
		
		
		<?php 
			$thirtyone_freebies_demo_url = get_post_meta( $post->ID, 'thirtyone_freebies_demo_url', true );
			$thirtyone_freebies_download_id_select = get_post_meta( $post->ID, 'thirtyone_freebies_download_id_select', true );
		?>
		<div class="download-content">
        <?php if (!empty($thirtyone_freebies_demo_url)) {?>	
        	<a href="<?php echo $thirtyone_freebies_demo_url; ?>" target="_blank" class="demo-button icon-demo" title="Demo" > <?php _e('Demo','thirtyone') ?> </a>
        <?php } ?>
        
		<?php if (!empty($thirtyone_freebies_download_id_select)) { ?>
			<a href="<?php echo get_permalink( $thirtyone_freebies_download_id_select ); ?>" target="_blank" class="download-button icon-download" title="Download" > <?php _e('Download','thirtyone') ?> </a>
        <?php } ?>
        
        </div>
        <!-- END .download-col -->
   
		
		</header><!-- .entry-header -->
		
        

		<?php if ( is_search() ) { // Only display Excerpts for Search ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php } else { ?>
        
		<div class="entry-content">
			<?php the_content( __( 'Read More', 'thirtyone' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'thirtyone' ) . '</span>', 'after' => '</div>' ) ); ?>
		</div>
		<!-- END .entry-content -->
		<?php  } ?>


	<?php get_template_part( 'meta', 'footer' ); ?>

	</article><!-- #post-<?php the_ID(); ?> -->
	
