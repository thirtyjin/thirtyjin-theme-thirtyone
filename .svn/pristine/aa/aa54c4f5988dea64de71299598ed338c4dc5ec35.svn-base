<?php



/**
 * Edit the Title
 */
function thirtyone_metabox_seo_title($title) {
	global $post;

	if( $post && !thirtyjin_is_third_party_seo() ) {
		if( is_home() || is_archive() || is_search() ) {
			$postid = get_option('page_for_posts');
		} else {
			$postid = $post->ID;
		}
	  
		if( $seo_title = get_post_meta( $postid, 'thirtyone_seo_title', true ) ) {
			return "$seo_title | " ;
		}
	}
	return  $title;
}
add_filter('wp_title', 'thirtyone_metabox_seo_title', 15);


/**
 * Add the Description
 */
function thirtyone_metabox_seo_description() {
	global $post;

	if( $post && !thirtyjin_is_third_party_seo() ) {
		if( is_home() || is_archive() || is_search() ) {
			$postid = get_option('page_for_posts');
		} else {
			$postid = $post->ID;
		}
	  
		if( $seo_description = get_post_meta( $postid, 'thirtyone_seo_description', true ) ){
			echo '<meta name="description" content="'. esc_html(strip_tags($seo_description)) .'" />' . "\n";
		}
	}
}
add_action('thirtyjin_meta_head', 'thirtyone_metabox_seo_description');


/**
 * Add the Keywords
 */
function thirtyone_metabox_seo_keywords() {
	global $post;

	if( $post && !thirtyjin_is_third_party_seo() ) {
		if( is_home() || is_archive() || is_search() ) {
			$postid = get_option('page_for_posts');
		} else {
			$postid = $post->ID;
		}
	  
		if( $seo_keywords = get_post_meta( $postid, 'thirtyone_seo_keywords', true ) ){
			echo '<meta name="keywords" content="'. esc_html(strip_tags($seo_keywords)) .'" />' . "\n";
		}
	}
}
add_action('thirtyjin_meta_head', 'thirtyone_metabox_seo_keywords');




/**
 * Add the page intro
 */
function thirtyone_page_intro_meta_box() {
	
	
	$page_intro = get_post_meta( get_the_ID(), 'thirtyone_page_intro_meta_box', true );
	
	if (!empty($page_intro)) {
		echo '<div class="page-intro">'. $page_intro .'</div>' . "\n";
	}
	
}





 ?>