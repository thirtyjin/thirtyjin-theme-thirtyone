<?php
/**
 * The template for displaying Archive pages.
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */

get_header(); ?>

<div id="main" class="container_12 clearfix">

		<section id="primary" class="grid_12 full_width">
			<div id="content" role="main">

			
<div class="freebies-hot-area">

	<!-- Freebies header Slider -->
	<?php //global $post;
	
		wp_enqueue_script ( 'jquery_carouFredSel' );
		wp_enqueue_script ( 'jquery_touchSwipe_min' ); 
		
		$args = array(
				'post_type'       => 'freebies',
				'numberposts'     => 6,
				'posts_per_page'  => 6,
				//'offset'          => 0,
				'category'		  => 'showcase',
				'orderby'         => 'post_date',
				'order'           => 'DESC',
				'post_status'     => 'publish'
		);
	
		$recentpost = get_posts($args); 
	?>


	<div class="grid_8 freebies_slidershow">
		<div class="list_carousel">
			<div id="freebies_slidershow_3">
	
			<?php foreach($recentpost as $post) : setup_postdata( $post );
				if( has_post_thumbnail() ) { ?>
			
				<div class="slider_item">
					<a><?php the_post_thumbnail( array(600, 300) , array('alt' => '', 'title' => '' )); ?></a>
					<div class="slider_post_title"><a href="<?php permalink_link() ?>"><?php the_title(); ?></a></div>
				</div>
			
				<?php } // end if has_post_thumbnail 
			endforeach; 
			wp_reset_postdata();?>
	
			</div>
			<div class="clearfix"></div>
			<a id="prev_slideshow_page_3" class="prev" href="#">&lt;</a>
			<a id="next_slideshow_page_3" class="next" href="#">&gt;</a>
			<div id="pagination_slideshow_pager_3" class="pager"></div>
		</div>
	</div>
					
	<div class="grid_4 ads_block center clearfix" style="margin-top:0; padding:0; height: 360px;"> 
		<script type="text/javascript">
		    var cpro_id = "u1643274";
		</script>
		<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
	</div>			
			

</div>				
			
			
			
			
			
<?php   $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$args = array(
				'post_type' => 'freebies',
				'posts_per_page' => 6,
				'post_status' => 'publish',
				'orderby' => 'date',
				'paged' => $paged
		);
		
		query_posts( $args ); ?>


<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" class="card grid_4" <?php post_class(); ?> >
		
			<!-- thumbnail  Start-->
			<div class="freebies_post_thumb">
			
			<?php $feature_three = get_post_meta( $post->ID, 'feature_small', true );
			
			if ( !empty($feature_three) ) { ?>
			
					<a class="thumb_img empty_img" href="<?php the_permalink(); ?>"  title="<?php the_title(); ?>"> 
						<img src="<?php echo $feature_three; ?>" class="attachment-feature_small wp-post-image">
						<div class="overlay"><?php _e('View More.', 'thirtyone'); ?></div>
					</a>
				
			<?php } else { ?>
				
					<?php if ( has_post_thumbnail() ) { ?>
						
							<a class="thumb_img empty_img" href="<?php the_permalink(); ?>"  title="<?php the_title(); ?>"> 
								<?php the_post_thumbnail('feature_small'); ?>
								<div class="overlay"><?php _e('View More.', 'thirtyone'); ?></div>
							</a>
					<?php } else {?>
							<a class="thumb_img empty_img" href="<?php the_permalink(); ?>"  title="<?php the_title(); ?>"> 
								<div class="overlay"><?php _e('View More.', 'thirtyone'); ?></div>
							</a>
					<?php } ?>
				
			<?php } ?>
			
				<div class="counts">
					<?php $thirtyone_freebies_demo_url = get_post_meta( $post->ID, 'thirtyone_freebies_demo_url', true ); ?>
					<?php if (!empty($thirtyone_freebies_demo_url)) {?>
					<span class="demo_url">	
		        		<a href="<?php echo $thirtyone_freebies_demo_url; ?>" target="_blank" class="icon-demo" title="Demo" ></a>
		        	</span>
		        	<?php } ?>
				
					<?php $thirtyone_freebies_download_id_select = get_post_meta( $post->ID, 'thirtyone_freebies_download_id_select', true ); ?>
					<?php if (!empty($thirtyone_freebies_download_id_select)) {?>
					<span class="download_counts">	
		        		<a href="<?php echo get_permalink( $thirtyone_freebies_download_id_select ); ?>" target="_blank" class="icon-type-download icon-download" title="Download" ></a>
		        	</span>
		        	<?php } ?>
				
					<span class="likethis">
						<?php printLikes(get_the_ID()); ?> <!--Likes.  -->
		            </span>
				</div>
			</div>
			<!--END. thumbnail  -->
		
		
		
		
		<section class="pd-10">
		
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'thirtyone' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>

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
			
			<div class="entry-meta">	
				
				<span class="cat-links icon-category">
				<?php // get the current project-type. 
				echo get_the_term_list($post->ID, 'freebies-type', '', ' / ',''); ?>
				</span>
				
				<!--Edit.  -->         
	            <?php edit_post_link( __( 'Edit', 'thirtyone' ), '<span class="edit-link icon-editor">', '</span>' ); ?>
				
			</div> <?php // End .entry-meta?>
			
		</section><!-- .entry-all -->
		
		<?php endif; ?>

	</article><!-- #post-<?php the_ID(); ?> -->
					
					

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


</div>
<!-- #main -->
<?php get_footer('simple'); ?>