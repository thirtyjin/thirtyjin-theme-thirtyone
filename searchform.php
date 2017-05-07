<?php
/**
 * The template for displaying search forms in Thirty One
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" class="field" name="s" id="s" value="<?php esc_attr_e( 'Search', 'thirtyone' ); ?>" onfocus=" if(this.value=='<?php esc_attr_e( 'Search', 'thirtyone' ); ?>')this.value='';" onblur="if(this.value=='')this.value='<?php esc_attr_e( 'Search', 'thirtyone' ); ?>';" />
		
		<input type="submit" class="submit thirtyjinfont" name="submit" id="searchsubmit" value="" />
	</form>
