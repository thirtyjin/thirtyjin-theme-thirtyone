<?php

// loads the shortcodes class, wordpress is loaded with it
require_once( 'shortcodes.class.php' );

// get popup type
$popup = trim( $_GET['popup'] );
$shortcode = new thirtyjin_shortcodes( $popup );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<body>
<div id="thirtyjin-popup">

	<div id="thirtyjin-shortcode-wrap">
		
		<div id="thirtyjin-sc-form-wrap">
		
			<div id="thirtyjin-sc-form-head">
			
				<?php echo $shortcode->popup_title; ?>
			
			</div>
			<!-- /#thirtyjin-sc-form-head -->
			
			<form method="post" id="thirtyjin-sc-form">
			
				<table id="thirtyjin-sc-form-table">
				
					<?php echo $shortcode->output; ?>
					
					<tbody>
						<tr class="form-row">
							<?php if( ! $shortcode->has_child ) : ?><td class="label">&nbsp;</td><?php endif; ?>
							<td class="field"><a href="#" class="button-primary thirtyjin-insert">Insert Shortcode</a></td>							
						</tr>
					</tbody>
				
				</table>
				<!-- /#thirtyjin-sc-form-table -->
				
			</form>
			<!-- /#thirtyjin-sc-form -->
		
		</div>
		<!-- /#thirtyjin-sc-form-wrap -->
		
		<div class="clear"></div>
		
	</div>
	<!-- /#thirtyjin-shortcode-wrap -->

</div>
<!-- /#thirtyjin-popup -->

</body>
</html>