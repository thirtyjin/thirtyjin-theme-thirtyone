<?php
/* Template Name: slideshow */


get_header(); ?>
<div id="main" class="clearfix">
<div id="primary">
	<div id="content" role="main">

<div id="container">

    <div class="slidershow">
        <div class="list_carousel">
			<ul id="slideshow_page">
        <?php 
          $temp = $wp_query;
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $post_per_page = 100; // -1 shows all posts
          $args=array(
            'post_type' => 'slideshow',
            'orderby' => 'date',
            'order' => 'ASC',
            'paged' => $paged,
            'posts_per_page' => $post_per_page
          );
            $wp_query = new WP_Query($args); 

            if( have_posts() ) : while ($wp_query->have_posts()) : $wp_query->the_post();
            $custom = get_post_custom($post->ID);
            $url = $custom["url"][0]; 
            $url_open = $custom["url_open"][0];
            $custom_title = "#".$post->ID;
            
            $thirtyone_slideshow_url = get_post_meta( $post->ID, 'thirtyone_slideshow_url', true );
            $thirtyone_slideshow_open_target = get_post_meta( $post->ID, 'thirtyone_slideshow_open_target', true );
         
             if (!empty($thirtyone_slideshow_url)) { ?>
		        <li><a href="<?php echo $thirtyone_slideshow_url; ?>"<?php if (!empty($thirtyone_slideshow_open_target[0])) echo " target='_blank'"; ?>><?php the_post_thumbnail('feature_large', array('alt' => '', 'title' => '' )); ?></a></li>
		        <?php } else { ?>
		        <li><?php the_post_thumbnail('feature_large', array('alt' => '', 'title' => '' )); ?></li>
		        <?php }?>
        
			

        <?php endwhile; 
        	  else: ?>
        <?php endif; wp_reset_query(); $wp_query = $temp ?>
        
        </ul>
			<div class="clearfix"></div>
			<a id="prev_slideshow_page" class="prev" href="#">&lt;</a>
			<a id="next_slideshow_page" class="next" href="#">&gt;</a>
			<div id="pagination_slideshow_pager" class="pager"></div>
		</div>
		
    </div>
    


				
	
	
	
<!-- thirtyone_ot_my_slider 2 -->	
	
	
<?php if ( function_exists( 'ot_get_option' ) ) {
	
		/* get the slider array */
		$slides = ot_get_option( 'thirtyone_ot_my_slider', array() );
	
		if ( ! empty( $slides ) ) { ?>

	<div class="freebies_slidershow">
	<a>test ot_get_option </a>
 		<div class="list_carousel">
			<ul id="freebies_slidershow_2">

			<?php foreach( $slides as $slide ) {
						echo '
		 		<li>
 					<a href="' . $slide['link'] . '"><img width="660" height="330" src="' . $slide['image'] . '" alt="' . $slide['title'] . '" /></a>
			    </li>'; 
			} ?>
			
			</ul>
			<div class="clearfix"></div>
			<a id="prev_slideshow_page_2" class="prev" href="#">&lt;</a>
			<a id="next_slideshow_page_2" class="next" href="#">&gt;</a>
			<div id="pagination_slideshow_pager_2" class="pager"></div>
		</div>
	</div>
	<?php } // end if	
} ?>
			
	    

    
    
    
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
        <?php get_template_part( 'content', 'page-full' ); ?>
        
        <?php endwhile; else: ?>
        
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

    

</div>



	</div> <!-- #content -->
</div><!-- #primary -->


<?php get_sidebar('two'); ?>

</div><!-- #main -->
<?php get_footer(); ?>