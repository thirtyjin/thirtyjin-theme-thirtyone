<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */

?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
				<aside id="archives" class="widget">
				<div class="widget-title-bg"><h4 class="widget-title"><?php _e( 'Archives', 'thirtyone' ); ?></h4></div>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
				<div class="widget-title-bg"><h4 class="widget-title"><?php _e( 'Meta', 'thirtyone' ); ?></h4></div>
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
