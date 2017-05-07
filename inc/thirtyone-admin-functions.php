<?php

/**
 * Are there any third party SEO plugins active
 *
 * @return bool True is other plugin is detected
 */
function thirtyjin_is_third_party_seo()
{
	include_once( ABSPATH .'wp-admin/includes/plugin.php' );
	
	if( is_plugin_active('headspace2/headspace.php') ) return true;
	if( is_plugin_active('all-in-one-seo-pack/all_in_one_seo_pack.php') ) return true;
	if( is_plugin_active('wordpress-seo/wp-seo.php') ) return true;
	
	return false;
}

?>