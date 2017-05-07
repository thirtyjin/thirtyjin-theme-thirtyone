<?php
/* 
Template Name: Blog 
*/
?>

<?php get_header(); ?>

<div id="main" class="clearfix">

	<?php // Display blog page content.
		  while ( have_posts() ) : the_post(); ?>
	
		<?php get_template_part( 'content', 'page-full' ); ?>
		
		<div class="clearboth"></div>
	<?php endwhile; ?>
	
	
<div id="primary">
	<div id="content" role="main">
	

	
	<?php global $more; $more = 0; // allow more quicktag ?>
	
	<?php
	
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		query_posts( array(
				//'posts_per_page' => 8,  // ues default unmber setting.
				'post_type' => 'post',
				'post_status' => 'publish',
				'orderby'=> 'date',
				'paged'=>$paged )
				); 
		
	?>
	

	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	
		<!--BEGIN .hentry -->
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">	
		
			<?php 
		        $format = get_post_format();
		        if( false === $format ) { $format = 'standard'; }
		        get_template_part( 'content-post', $format ); 
	        ?>
	        	
		<!--END .hentry-->  
		</div>

		<?php endwhile; ?>
		
		<div class="page-nav">
		<?php  // Page navigation
		
			  global $wp_query;
			  $big = 999999999; // need an unlikely integer
			  echo paginate_links( 
				 array( 'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages  ) ); 
		?>
		</div>  <!-- End. class="page-nav" -->
		
		
	<?php else : ?>

		<article id="post-0" class="post no-results not-found">
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Nothing Found', 'thirtyone' ); ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'thirtyone' ); ?></p>
				<?php get_search_form(); ?>
			</div><!-- .entry-content -->
		</article><!-- #post-0 -->

	<?php endif; ?>

	</div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
</div><!-- #main -->
<?php get_footer(); ?>