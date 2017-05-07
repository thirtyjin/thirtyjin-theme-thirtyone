<?php
/**
 * The other Sidebar containing the main widget area for Books Channel.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */


?>
	<div id="secondary" class="widget-area" role="complementary">
			
		<?php if ( ! dynamic_sidebar( 'sidebar-7' ) ) : ?>
	
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
						<script type="text/javascript">
						/*200-200标签云，创建于2014-4-29*/
						var cpro_id = "u1538717";
						</script>
						<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
					</div>
			</aside>
			
			<aside id="ads" class="widget">
				
					<div class="ads_block center">
					<div class="ads_info"><?php _e('Ads via Google','thirtyone')?></div>
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- 120x240 竖幅 -->
						<ins class="adsbygoogle"
						     style="display:inline-block;width:120px;height:240px"
						     data-ad-client="ca-pub-5495557010989612"
						     data-ad-slot="9840408119"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>
			</aside>
	</div><!-- #secondary .widget-area -->
