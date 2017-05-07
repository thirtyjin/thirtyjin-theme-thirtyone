<?php
/**
 * The other Sidebar containing the main widget area for freebies.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */


?>
	<div id="secondary" class="widget-area" role="complementary">
			
		<?php if ( ! dynamic_sidebar( 'sidebar-6' ) ) : ?>
	
			<aside id="meta" class="widget">
				<h4 class="widget-title"><?php _e( 'Meta', 'thirtyone' ); ?></h4>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>
	
		<?php endif; // end sidebar widget area ?>
			
			
			<aside id="baidu_ads" class="widget">
					
					<div class="ads_block center">
					<div class="ads_info"><?php _e('Ads via Baidu','thirtyone')?></div>
						Ads via Baidu
					</div>
			</aside>
		
			<aside id="ads" class="widget">
				
					<div class="ads_block center">
					<div class="ads_info"><?php _e('Ads via Google','thirtyone')?></div>
						Ads via Google
					</div>
			</aside>
		
	</div><!-- #secondary .widget-area -->
