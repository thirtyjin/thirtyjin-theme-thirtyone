<?php





/**
 * Custom Login Logo Support
 *
 * @since v1.0
 */

function thirtyone_custom_login_logo() {
	/*
	 if a admin login logo url has been set in theme options then use that
	*/
	$thirtyone_login_logo = ot_get_option( 'thirtyone_login_logo' );
	if( !empty($thirtyone_login_logo) )
		{
			echo '<style type="text/css">h1 a { background-image:url('. $thirtyone_login_logo .') !important; background-size: contain!important; width: auto!important; }</style>' . "\n";
		}
}

add_action('login_head', 'thirtyone_custom_login_logo');



function thirtyone_wp_login_url() {
	return home_url();
}

add_filter('login_headerurl', 'thirtyone_wp_login_url');


function thirtyone_wp_login_title() {
	return get_option('blogname');
}

add_filter('login_headertitle', 'thirtyone_wp_login_title');
 





/**
 * Output main layout
 */
function thirtyone_style_main_layout( $classes ) {
	$thirtyone_layout = ot_get_option( 'thirtyone_layout', array(), true);
	
	if( !empty($thirtyone_layout) ){
		$classes[]  = $thirtyone_layout;
	}
	return $classes;
}
add_filter( 'body_class', 'thirtyone_style_main_layout' );




/**
 * Custom Shortcut Icon
 */

function thirtyone_custom_shortcut_icon () {
	$thirtyone_favicon = ot_get_option('thirtyone_favicon',array());
	
	if (!empty($thirtyone_favicon)){
		echo '<link rel="shortcut icon" href="'. $thirtyone_favicon .'" />' . "\n";
	}else {
		echo '<link rel="shortcut icon" href="'. get_template_directory_uri() .'/images/favicon.png" />' . "\n";
	}
}

add_action('wp_head', 'thirtyone_custom_shortcut_icon');




/**
 * Custom apple touch icon
 */
function thirtyone_custom_apple_touch_icon () {
	
	$thirtyone_apple_touch_startup_image = ot_get_option('thirtyone_apple_touch_startup_image');
	$thirtyone_touch_icon_iphone = ot_get_option('thirtyone_touch_icon_iphone');
	$thirtyone_touch_icon_ipad = ot_get_option('thirtyone_touch_icon_ipad');
	
	if (!empty($thirtyone_apple_touch_startup_image)) {
		echo '<link rel="apple-touch-startup-image" href="' . $thirtyone_apple_touch_startup_image . '" media="screen and (max-device-width: 320px)"> <!-- iphone startup image -->' . "\n";
	} else {
		echo '<link rel="apple-touch-startup-image" href="' . get_template_directory_uri() . '/images/startup.png" media="screen and (max-device-width: 320px)"> <!-- iphone startup image -->' . "\n";
	}

	if (!empty($thirtyone_touch_icon_iphone)) {
		echo '<link rel="apple-touch-icon" sizes="57x57" href="' . $thirtyone_touch_icon_iphone . '"> <!-- touch-icon-iphone -->' . "\n";
	} else {
		echo '<link rel="apple-touch-icon" sizes="57x57" href="' . get_template_directory_uri() . '/images/icon_57.png"> <!-- touch-icon-iphone -->' . "\n";
	}

	if (!empty($thirtyone_touch_icon_ipad)) {
		echo '<link rel="apple-touch-icon" sizes="72x72" href="' . $thirtyone_touch_icon_ipad . '"> <!-- touch-icon-ipad -->' . "\n";
	} else {
		echo '<link rel="apple-touch-icon" sizes="72x72" href="' . get_template_directory_uri() . '/images/icon_72.png"> <!-- touch-icon-ipad -->' . "\n";
	}
	
}

add_action('wp_head', 'thirtyone_custom_apple_touch_icon');




/**
 * Output the apple mobile web app options
 */
function thirtyone_apple_mobile_web_app () {
	$thirtyone_apple_mobile_web_app_capable = ot_get_option( 'thirtyone_apple_mobile_web_app_capable', array() );
	$thirtyone_apple_mobile_web_app_status_bar_style = ot_get_option( 'thirtyone_apple_mobile_web_app_status_bar_style', array() );
	
	if (!empty($thirtyone_apple_mobile_web_app_capable)) {
		echo '<meta name="apple-mobile-web-app-capable" content="'.$thirtyone_apple_mobile_web_app_capable.'"/>' . "\n";
	}
	
	if (!empty($thirtyone_apple_mobile_web_app_status_bar_style)) {
		echo '<meta name="apple-mobile-web-app-status-bar-style" content="'.$thirtyone_apple_mobile_web_app_status_bar_style.'" />' . "\n";
	}
}
add_action('wp_head', 'thirtyone_apple_mobile_web_app');




/**
 * Output the tracking code
 */
function thirtyone_tracking_code(){
	$thirtyone_tracking_code = ot_get_option( 'thirtyone_tracking_code' );
	if (!empty($thirtyone_tracking_code)) {
		echo '<div id="tracking_code">' . stripslashes($thirtyone_tracking_code) . '</div>';
	}
		
}
add_action( 'wp_footer', 'thirtyone_tracking_code' );





/**
 * Output the google font families
 */
function filter_ot_recognized_font_families( $array, $field_id ) {

	/* only run the filter when the field ID is my_google_fonts_headings */
	if ( $field_id == 'thirtyone_google_fonts' ) {
		$array = array(
				'open-sans'     => '"Open Sans", "Microsoft YaHei", sans-serif',
				'droid-sans'    => '"Droid Sans", "Microsoft YaHei", sans-serif',
				'droid-serif'   => '"Droid Serif", "Microsoft YaHei", serif;',
				'oswald'    	=> '"Oswald", "Microsoft YaHei", sans-serif'
		);
	}

	return $array;

}
add_filter( 'ot_recognized_font_families', 'filter_ot_recognized_font_families', 10, 2 );





/**
 * Add the theme Robots Setting
 */
function thirtyone_theme_seo_robots_setting() {


	if( !thirtyjin_is_third_party_seo() && get_option('blog_public') == 1 ){
		
		$seo_robots_index = ot_get_option('thirtyone_seo_robots_index_setting', array() );
		$seo_robots_follow = ot_get_option('thirtyone_seo_robots_follow_setting', array() );
		
		if( $seo_robots_index == 'on' ) { 
			$seo_robots_index = 'index';
		}else {
			$seo_robots_index = 'noindex';
		}
		
		if( $seo_robots_follow == 'on' ) { 
			$seo_robots_follow = 'follow';
		}else {
			$seo_robots_follow = 'nofollow';
		}
		
		echo '<meta name="robots" content="'. $seo_robots_index .','. $seo_robots_follow. '" />' . "\n";
	}
}
add_action('thirtyjin_meta_head', 'thirtyone_theme_seo_robots_setting');




 ?>