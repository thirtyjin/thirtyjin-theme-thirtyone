<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a theme
 * and one of the two required files for a theme (the other being style.css).
 *
 * @package Thirty_One
 * 
 */

get_header(); ?>
				
<div id="main" class="clearfix">
		<div id="primary">
			<div id="content" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				
				<!--BEGIN .hentry -->
				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">				

				    
				    <?php 
				        $format = get_post_format();
				        if( false === $format ) { $format = 'standard'; }
			        ?>
			        
			        <?php get_template_part( 'content-post', $format ); ?>		
                
				<!--END .hentry-->  
				</div>
				

				<?php endwhile; ?>
				
			<?php thirtyone_paging_nav(); ?>
				

			<?php else : 
    		     
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif; ?>
			<!--END #primary .hfeed-->

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
</div>
<!-- #main -->
<?php get_footer(); ?>