<?php

/**
 * The template for displaying Archive pages.
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */

get_header(); ?>

<div id="main" class="clearfix">

		<section id="primary" class="full_width">
			<div id="content" role="main">

				<header class="page-header">
					<div class="page-title">
							<h3><?php _e( 'Download', 'thirtyone' ); ?></h3>
					</div>
				</header>
				
				<div class="message_box success aligncenter" style="width:auto;">
					<div class="message_box_content">
						<h3>Download Success</h3>
						<h3>The totle downloaded <?php get_total_downloads(); ?> times.</h3>
					</div>
				</div>

			</div><!-- #content -->
		</section><!-- #primary -->

</div>
<!-- #main -->

<?php get_footer(); ?>