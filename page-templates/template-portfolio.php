<?php
/* Template Name: Portfolio */

/**
 * The template for displaying Archive pages.
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */

get_header('fullmode'); ?>

<?php wp_enqueue_script ( 'jquery_isotope_min_js' ); // need load for isotope.js ?>


<div id="main" class="clearfix">

<?php 
	$thirtyone_portfolio_columns = ot_get_option('thirtyone_portfolio_columns', array());
	$thirtyone_portfolio_number_pre_page = ot_get_option('thirtyone_portfolio_number_pre_page');
?>

<div id="primary" class="full_width">

	<div id="content" class="<?php echo $thirtyone_portfolio_columns ?>" role="main">

	
		<?php
		// portfolio type multi page; 
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			/**
			 * Customize the loop
			 */
		$args = array (
				'post_type' => array( 'portfolio' ),
				// don't set on here posts_per_page
				// refer to function set_posts_per_page( $query )
				
				'posts_per_page' => $thirtyone_portfolio_number_pre_page, 
				//'posts_per_page'  => -1,
				'post_status' => 'publish',
				'orderby'=> 'date',
				'paged'=>$paged 
				);	

		query_posts( $args );	
		?>


		<div id="filters" class="filters-button-group">
		<button class="filters-button is-checked" data-filter="*" ><?php echo __( 'Show All' , 'thirtyone'); ?></button>
		  <?php 
		  		// dispaly the project-type category without href link. 
		  		$categories=get_categories('taxonomy=project-type');
				foreach($categories as $category) {
					//and format them for use as isotope filters
					echo '<button class="filters-button" data-filter=".'.$category->category_nicename.'" '.'>' . $category->name.'</button>';
				}
			?>
		</div>



		<div class="isotope">
		
		<?php if (have_posts()) : ?>
		
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts()) :  the_post(); ?>
		
			<?php
				$title = str_ireplace('"', '', trim(get_the_title()));
				$desc  = str_ireplace('"', '', trim(get_the_content()));
			?>	
			
			<article class="element-item isotope-item <?php echo get_the_term_list_text($post->ID, 'project-type', '', ', ',''); ?>" data-category="<?php echo get_the_term_list_text($post->ID, 'project-type', '', ', ',''); ?>">
				<header class="post-thumb portfolio_post_thumb clearfix">
				
					<a title="<?php print $title ?>" rel="lightbox" href="<?php print  portfolio_thumbnail_url($post->ID) ?>">
					
					<?php 
					
					if ( 'one-column' == $thirtyone_portfolio_columns ) {
						the_post_thumbnail('feature_large');
					} elseif ( 'two-columns' == $thirtyone_portfolio_columns ) {
						the_post_thumbnail('feature_half');
					}elseif ('three-columns' == $thirtyone_portfolio_columns) {
						the_post_thumbnail('feature_small');
					}elseif ('four-columns' == $thirtyone_portfolio_columns) {
						the_post_thumbnail('feature_fourth');
					}else {
						the_post_thumbnail('feature_small');
					}
					 ?>
					 <div class="overlay"><?php _e('View More.', 'thirtyone'); ?></div>
					</a>
				</header> <!-- End .post-thumb -->
				<div class="project_content">
					<h2 class="entry-title">
					<a title="<?php print $title ?>" href="<?php the_permalink(); ?>"><?php print $title ?></a>
					</h2>
					
					<div class="entry-meta">	
						
						<span class="cat-links">
						<?php // get the current project-type. 
						echo get_the_term_list($post->ID, 'project-type', '', ' / ',''); ?>
						</span>
						
						<!--Edit.  -->         
			            <?php edit_post_link( __( 'Edit', 'thirtyone' ), '<span class="edit-link">', '</span>' ); ?>
						
					</div> <?php // End .entry-meta ?>
					
				
					
				</div>
				
			</article> <!-- .item -->
			
				
			<?php endwhile; ?>
			
			<?php else : ?>

			<?php 
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );
				?>

			<?php endif; ?>
					
		
		</div> <!-- .isotope -->
		
		<?php thirtyone_paging_nav(); ?>


	</div> <!-- #content -->

</div><!-- #primary -->

</div>
<!-- #main -->

<?php get_footer('simple'); ?>