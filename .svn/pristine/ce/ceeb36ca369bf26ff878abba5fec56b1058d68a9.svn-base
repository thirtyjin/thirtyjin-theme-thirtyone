<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */

get_header(); ?>

<div id="main" class="clearfix">
		<section id="primary">
			<div id="content" class="search_result" role="main">
			
			
		
			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<div class="page-title">
						<h2><?php printf( __( 'Search Results for: %s', 'thirtyone' ), '<span class="search_keywords">' . get_search_query() . '</span>' ); ?></h2>
					</div>
				</header>

			
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); 
				
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					//get_template_part( 'content', get_post_format() );
						
					if ( 'books' == get_post_type() ) {
						get_template_part( 'content', 'books');
					}elseif ('portfolio' == get_post_type() ){
						get_template_part( 'content', 'portfolio');
					}elseif ('freebies' == get_post_type() ){
						get_template_part( 'content', 'freebies');
					} else {
						get_template_part( 'content', '');
					}
					 endwhile; 
					 
				else : 
				 
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );
				
				endif; ?>
				
			<?php thirtyone_paging_nav(); ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_sidebar('two'); ?>
</div>
<!-- #main -->
<?php get_footer('simple'); ?>