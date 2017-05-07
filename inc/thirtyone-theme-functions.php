<?php


/**
 * Create a custom hook definitions
 *
 * @since 0.1
 */
/* header.php -----------------------------------------------------------------*/
function thirtyjin_meta_head() { thirtyjin_do_contextual_hook('thirtyjin_meta_head'); }
function thirtyjin_head() { thirtyjin_do_contextual_hook('thirtyjin_head'); }
function thirtyjin_body_start() { thirtyjin_do_contextual_hook('thirtyjin_body_start'); }
function thirtyjin_header_before() { thirtyjin_do_contextual_hook('thirtyjin_header_before'); }
function thirtyjin_header_after() { thirtyjin_do_contextual_hook('thirtyjin_header_after'); }
function thirtyjin_header_start() { thirtyjin_do_contextual_hook('thirtyjin_header_start'); }
function thirtyjin_header_end() { thirtyjin_do_contextual_hook('thirtyjin_header_end'); }
function thirtyjin_nav_before() { thirtyjin_do_contextual_hook('thirtyjin_nav_before'); }
function thirtyjin_nav_after() { thirtyjin_do_contextual_hook('thirtyjin_nav_after'); }
function thirtyjin_content_start() { thirtyjin_do_contextual_hook('thirtyjin_content_start'); }

/* index.php, single.php, search.php, archive.php -----------------------------*/
function thirtyjin_post_before() { thirtyjin_do_contextual_hook('thirtyjin_post_before'); }
function thirtyjin_post_after() { thirtyjin_do_contextual_hook('thirtyjin_post_after'); }
function thirtyjin_post_start() { thirtyjin_do_contextual_hook('thirtyjin_post_start'); }
function thirtyjin_post_end() { thirtyjin_do_contextual_hook('thirtyjin_post_end'); }

/* page.php -------------------------------------------------------------------*/
function thirtyjin_page_before() { thirtyjin_do_contextual_hook('thirtyjin_page_before'); }
function thirtyjin_page_after() { thirtyjin_do_contextual_hook('thirtyjin_page_after'); }
function thirtyjin_page_start() { thirtyjin_do_contextual_hook('thirtyjin_page_start'); }
function thirtyjin_page_end() { thirtyjin_do_contextual_hook('thirtyjin_page_end'); }

/* single.php, page.php, templates with comments ------------------------------*/
function thirtyjin_comments_before() { thirtyjin_do_contextual_hook('thirtyjin_comments_before'); }
function thirtyjin_comments_after() { thirtyjin_do_contextual_hook('thirtyjin_comments_after'); }

/* sidebar.php ----------------------------------------------------------------*/
function thirtyjin_sidebar_before() { thirtyjin_do_contextual_hook('thirtyjin_sidebar_before'); }
function thirtyjin_sidebar_after() { thirtyjin_do_contextual_hook('thirtyjin_sidebar_after'); }
function thirtyjin_sidebar_start() { thirtyjin_do_contextual_hook('thirtyjin_sidebar_start'); }
function thirtyjin_sidebar_end() { thirtyjin_do_contextual_hook('thirtyjin_sidebar_end'); }

/* footer.php -----------------------------------------------------------------*/
function thirtyjin_content_end() { thirtyjin_do_contextual_hook('thirtyjin_content_end'); }
function thirtyjin_footer_before() { thirtyjin_do_contextual_hook('thirtyjin_footer_before'); }
function thirtyjin_footer_after() { thirtyjin_do_contextual_hook('thirtyjin_footer_after'); }
function thirtyjin_footer_start() { thirtyjin_do_contextual_hook('thirtyjin_footer_start'); }
function thirtyjin_footer_end() { thirtyjin_do_contextual_hook('thirtyjin_footer_end'); }
function thirtyjin_body_end() { thirtyjin_do_contextual_hook('thirtyjin_body_end'); }


/**
 * Adds contextual action hooks. Users do not need to use WordPress conditional tags
 * because this function handles the logic.
 * 
 * Basic hook would be 'thirtyjin_head'. thirtyjin_do_contextual_hook() function extends
 * the hook with context (i.e., 'thirtyjin_head_singular' or 'thirtyjin_head_home')
 * 
 * Thanks to Ptah Dunbar for this function
 * @link https://twitter.com/ptahdunbar
 * 
 * @since 0.1
 * @uses thirtyjin_get_query_context() Gets the context of the current page
 * @param string $tag Usually the location of the hook but defines the base hook
 */
if ( !function_exists( 'thirtyjin_do_contextual_hook' ) ) {
    function thirtyjin_do_contextual_hook( $tag = '', $args = '' ) {
        if ( !$tag ) { return false; }
        
        do_action( $tag, $args );
        
        foreach( (array) thirtyjin_get_query_context() as $context ) {
            do_action( "{$tag}_{$context}", $args );
        }
    }
}



/**
 * Retrieve the context of the queried template
 *
 * @since 0.1
 * @return array $query_context
 */

if ( ! function_exists( 'thirtyjin_get_query_context' ) ) {
	function thirtyjin_get_query_context() {
		global $wp_query, $query_context;

		/* Return query_context if set -------------------------------------------*/
		if ( isset( $query_context->context ) && is_array( $query_context->context ) ) {
			return $query_context->context;
		}

		/* Figure out the context ------------------------------------------------*/
		$query_context->context = array();

		/* Front page */
		if ( is_front_page() ) {
			$query_context->context[] = 'home';
		}

		/* Blog page */
		if ( is_home() && ! is_front_page() ) {
			$query_context->context[] = 'blog';
				
			/* Singular views. */
		} elseif ( is_singular() ) {

			$query_context->context[] = 'singular';
			$query_context->context[] = "singular-{$wp_query->post->post_type}";

			/* Page Templates. */
			if ( is_page_template() ) {
				$to_skip = array( 'page', 'post' );
					
				$page_template = basename( get_page_template() );
				$page_template = str_replace( '.php', '', $page_template );
				$page_template = str_replace( '.', '-', $page_template );
					
				if ( $page_template && ! in_array( $page_template, $to_skip ) ) {
					$query_context->context[] = $page_template;
				}
			}
				
			$query_context->context[] = "singular-{$wp_query->post->post_type}-{$wp_query->post->ID}";
		}

		/* Archive views. */
		elseif ( is_archive() ) {
			$query_context->context[] = 'archive';

			/* Taxonomy archives. */
			if ( is_tax() || is_category() || is_tag() ) {
				$term = $wp_query->get_queried_object();
				$query_context->context[] = 'taxonomy';
				$query_context->context[] = $term->taxonomy;
				$query_context->context[] = "{$term->taxonomy}-" . sanitize_html_class( $term->slug, $term->term_id );
			}

			/* User/author archives. */
			elseif ( is_author() ) {
				$query_context->context[] = 'user';
				$query_context->context[] = 'user-' . sanitize_html_class( get_the_author_meta( 'user_nicename', get_query_var( 'author' ) ), $wp_query->get_queried_object_id() );
			}

			/* Time/Date archives. */
			else {
				if ( is_date() ) {
					$query_context->context[] = 'date';
					if ( is_year() )
						$query_context->context[] = 'year';
					if ( is_month() )
						$query_context->context[] = 'month';
					if ( get_query_var( 'w' ) )
						$query_context->context[] = 'week';
					if ( is_day() )
						$query_context->context[] = 'day';
				}
				if ( is_time() ) {
					$query_context->context[] = 'time';
					if ( get_query_var( 'hour' ) )
						$query_context->context[] = 'hour';
					if ( get_query_var( 'minute' ) )
						$query_context->context[] = 'minute';
				}
			}
		}

		/* Search results. */
		elseif ( is_search() ) {
			$query_context->context[] = 'search';
				
			/* Error 404 pages. */
		} elseif ( is_404() ) {
			$query_context->context[] = 'error-404';
		}

		return $query_context->context;
	}
}


/**
 * Add browser detection and post name to body class
 * Add post title to body class on single pages
 *
 * @link http://www.wprecipes.com/wordpress-hack-automatically-add-post-name-to-the-body-class
 * @param array $classes The current body classes
 * @return array The new body classes
 */
if ( !function_exists( 'thirtyjin_browser_body_class' ) ) {
	function thirtyjin_body_classes($classes) {
	    // Add our browser class
		global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	
		if($is_lynx) $classes[] = 'lynx';
		elseif($is_gecko) $classes[] = 'gecko';
		elseif($is_opera) $classes[] = 'opera';
		elseif($is_NS4) $classes[] = 'ns4';
		elseif($is_safari) $classes[] = 'safari';
		elseif($is_chrome) $classes[] = 'chrome';
		elseif($is_IE){ 
			$classes[] = 'ie';
			if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version)) $classes[] = 'ie'.$browser_version[1];
		} else $classes[] = 'unknown';
	
		if($is_iphone) $classes[] = 'iphone';
		
		// Add the post title
		if( is_singular() ) {
    		global $post;
    		array_push( $classes, "{$post->post_type}-{$post->post_name}" );
    	}
    	
    	// Add 'thirtyjin'
    	array_push( $classes, "thirtyjin" );
    	
		return $classes;
	}
}
add_filter('body_class','thirtyjin_body_classes');



/**
 * Get "blog" URL
 *
 * @return string The URL of the "blog" page
 */
if ( !function_exists( 'thirtyjin_blog_url' ) ) {
    function thirtyjin_blog_url(){
        if( $posts_page_id = get_option('page_for_posts') ){
            return home_url(get_page_uri($posts_page_id));
        } else {
            return home_url();
        }
    }
}



/*-----------------------------------------------------------------------------------*/
/*	Filters that allow shortcodes in Text Widgets
 /*-----------------------------------------------------------------------------------*/

add_filter('widget_text', 'do_shortcode');






/*
 *
* -----------------------------------------------------------------------------------
*/
/*  thirtyone sns channels
 /*
/*  @param
/*  @param
/*-----------------------------------------------------------------------------------*/

if (! function_exists ( 'thirtyone_sns_channels' )) {
	function thirtyone_sns_channels() { ?>
			<?php if (ot_get_option ( 'thirtyone_sns_sina_weibo' )) :?>
<li><a class="weibo icon icon-weibo" 
	href="<?php echo ot_get_option('thirtyone_sns_sina_weibo'); ?>"
	title="<?php _e('Follow us on weibo!', 'thirtyone'); ?>"></a></li>
<?php endif; ?>
			<?php if (ot_get_option('thirtyone_sns_facebook')): ?>
<li><a class="facebook icon icon-facebook"
	href="<?php echo ot_get_option('thirtyone_sns_facebook'); ?>"
	title="<?php _e('Join our Facebook page!', 'thirtyone'); ?>"></a></li>
<?php endif; ?>
			<?php if (ot_get_option('thirtyone_sns_twitter')): ?>
<li><a class="twitter icon icon-twitter"
	href="<?php echo ot_get_option('thirtyone_sns_twitter'); ?>"
	title="<?php _e('Follow us on Twitter!', 'thirtyone'); ?>"></a></li>
<?php endif; ?>
			<?php if (ot_get_option('thirtyone_sns_linkedin')): ?>
<li><a class="linkedin icon icon-linkedin"
	href="<?php echo ot_get_option('thirtyone_sns_linkedin'); ?>"
	title="<?php _e('Follow us on Linkedin!', 'thirtyone'); ?>"></a></li>
<?php endif; ?>
			<?php if (ot_get_option('thirtyone_sns_dribbble')): ?>
<li><a class="dribbble icon icon-dribbble"
	href="<?php echo ot_get_option('thirtyone_sns_dribbble'); ?>"
	title="<?php _e('Follow us on Dribbble!', 'thirtyone'); ?>"></a></li>
<?php endif; ?>
			<?php if (ot_get_option('thirtyone_sns_googleplus')): ?>
<li><a class="googleplus icon icon-googleplus"
	href="<?php echo ot_get_option('thirtyone_sns_googleplus'); ?>"
	title="<?php _e('Follow us on Google+ !', 'thirtyone'); ?>"></a></li>
<?php endif; ?>
			<?php if (ot_get_option('thirtyone_sns_tumblr')): ?>
<li><a class="tumblr icon icon-tumblr"
	href="<?php echo ot_get_option('thirtyone_sns_tumblr'); ?>"
	title="<?php _e('Follow us on Tumblr!', 'thirtyone'); ?>"></a></li>
<?php endif; ?>
			<?php if (ot_get_option('thirtyone_sns_flickr')): ?>
<li><a class="flickr icon icon-flickr"
	href="<?php echo ot_get_option('thirtyone_sns_flickr'); ?>"
	title="<?php _e('Follow us on Flickr!', 'thirtyone'); ?>"></a></li>
<?php endif; ?>
			<?php if (ot_get_option('thirtyone_sns_rss')): ?>
<li><a class="rss icon icon-rss"
	href="<?php echo ot_get_option('thirtyone_sns_rss'); ?>"
	title="<?php _e('Subscribe to our RSS-feed.', 'thirtyone'); ?>"></a></li>
<?php endif; ?>
			<?php if (ot_get_option('thirtyone_sns_email')): ?>
<li><a class="email icon icon-email"
	href="mailto:<?php echo ot_get_option('thirtyone_sns_email'); ?>"
	title="<?php _e('Contact us with Email.', 'thirtyone'); ?>"></a></li>
<?php endif; ?>
			<?php if (ot_get_option('thirtyone_sns_weixin')): ?>
			<?php $thirtyone_sns_weixin_rqcode = ot_get_option('thirtyone_sns_weixin'); ?>
<li><a class="weixin icon icon-weixin"
	href="<?php echo $thirtyone_sns_weixin_rqcode; ?>"
	title="<?php echo $thirtyone_sns_weixin_rqcode; ?>"></a></li>
<?php endif; 
	
	}
}




if (! function_exists ( 'thirtyone_sns_lists' )) {

	function thirtyone_sns_lists() {
		echo '<ul class="social-channels right">';

		if ( function_exists( 'ot_get_option' ) ) {
			/* get the sns_lists array */
			$sns_lists = ot_get_option( 'thirtyone_social_links', array() );
			  
			if ( ! empty( $sns_lists ) ) {
			    foreach( $sns_lists as $sns_list ) {

			    	if ($sns_list['name'] == 'weixin') {
			    		echo '<li>
			        		<a class="' . $sns_list['name'] . ' icon-' . $sns_list['name'] . '" href="#"  title="' . $sns_list['href'] . '" ></a>
			      		</li>';
			    	}else {
			        echo '<li>
			        		<a class="' . $sns_list['name'] . ' icon-' . $sns_list['name'] . '" href="'   . $sns_list['href'] . '"  title="' . $sns_list['title'] . '" ></a>
			      		</li>';
			      	}
			    }
			}
		}

		echo '</ul>';
	}
}




/*
 *
* -----------------------------------------------------------------------------------
*/
/*  breadcrumbs navigation
 /*
/*  @param
/*-----------------------------------------------------------------------------------*/

function thirtyone_breadcrumbs() {

	$delimiter = '&nbsp; &frasl; &nbsp;';
	$name = __( 'Home', 'thirtyone' ); // text for the 'Home' link
	$currentBefore = '<span>';
	$currentAfter = '</span>';

	if (! is_front_page () || is_paged ()) {

		echo '<div class="mbx-navigation">';

		global $post;
		$home = get_bloginfo ( 'url' );
		echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';

		if (is_category ()) {
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object ();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category ( $thisCat );
			$parentCat = get_category ( $thisCat->parent );
			if ($thisCat->parent != 0)
				echo (get_category_parents ( $parentCat, TRUE, ' ' . $delimiter . ' ' ));
			echo $currentBefore . __( 'Archive by category', 'thirtyone' ) ;
			echo $currentAfter;

		} elseif (is_home()) {
			echo $currentBefore;
			echo _e('Blogs', 'thirtyone');
			echo $currentAfter;

		} elseif (is_day ()) {
			echo '<a href="' . get_year_link ( get_the_time ( 'Y' ) ) . '">' . get_the_time ( 'Y' ) . '</a> ' . $delimiter . ' ';
			echo '<a href="' . get_month_link ( get_the_time ( 'Y' ), get_the_time ( 'm' ) ) . '">' . get_the_time ( 'F' ) . '</a> ' . $delimiter . ' ';
			echo $currentBefore . get_the_time ( 'd' ) . $currentAfter;

		} elseif (is_month ()) {
			echo '<a href="' . get_year_link ( get_the_time ( 'Y' ) ) . '">' . get_the_time ( 'Y' ) . '</a> ' . $delimiter . ' ';
			echo $currentBefore . get_the_time ( 'F' ) . $currentAfter;

		} elseif (is_year ()) {
			echo $currentBefore . get_the_time ( 'Y' ) . $currentAfter;

		} elseif (is_post_type_archive ( array('books','freebies','portfolio') )) {
			echo $currentBefore;
			post_type_archive_title ();
			echo $currentAfter;

		} elseif (is_singular(array('books','freebies','portfolio'))) {
			
			$post_type = get_post_type ();
			echo '<a href="';
			echo get_post_type_archive_link ( $post_type );
			echo '">' . $post_type . '</a> ';
			//echo $currentBefore;
			//the_title ();
			//echo $currentAfter;

		} elseif (is_single() && !is_attachment()){
			$cat = get_the_category ();
			$cat = $cat [0];
			echo get_category_parents ( $cat, TRUE, '' );
			//echo $currentBefore;
			//the_title ();
			//echo $currentAfter;
			
		} elseif (is_page () && ! $post->post_parent) {
			echo $currentBefore;
			the_title ();
			echo $currentAfter;

		} elseif (is_page () && $post->post_parent) {
			$parent_id = $post->post_parent;
			$breadcrumbs = array ();
			while ( $parent_id ) {
				$page = get_page ( $parent_id );
				$breadcrumbs [] = '<a href="' . get_permalink ( $page->ID ) . '">' . get_the_title ( $page->ID ) . '</a>';
				$parent_id = $page->post_parent;
			}
			$breadcrumbs = array_reverse ( $breadcrumbs );
			foreach ( $breadcrumbs as $crumb )
				echo $crumb . ' ' . $delimiter . ' ';
			echo $currentBefore;
			the_title ();
			echo $currentAfter;

		} elseif (is_search ()) {
			echo $currentBefore . __( 'Search results', 'thirtyone' ) . $currentAfter;

		} elseif (is_tag ()) {
			echo $currentBefore . __( 'Posts Tagged', 'thirtyone' ) . $currentAfter;

		} elseif (is_author ()) {
			global $author;
			$userdata = get_userdata ( $author );
			echo $currentBefore . __( 'Articles posted by', 'thirtyone' ) .' '. $userdata->display_name . $currentAfter;

		} elseif (is_404 ()) {
			echo $currentBefore . __( 'Error 404', 'thirtyone' ) . $currentAfter;

		} elseif (is_attachment ()) {
			echo $currentBefore . __( 'Attachment', 'thirtyone' ) . $currentAfter;

		} elseif (is_attachment () && is_single ()) {
			echo $currentBefore .__( 'Attachment', 'thirtyone' ) . $currentAfter;
		} else {
			echo $currentBefore . __( 'Unknow', 'thirtyone' ) . $currentAfter;
		}

		if (get_query_var ( 'paged' )) {
			if (is_category () || is_day () || is_month () || is_year () || is_search () || is_tag () || is_author ()) {
				echo ' (';
			}
				
			echo ' ' . $delimiter . ' ' . __ ( 'Page', 'thirtyone' ) . ' ' . get_query_var ( 'paged', 'thirtyone' );
				
			if (is_category () || is_day () || is_month () || is_year () || is_search () || is_tag () || is_author ()) {
				echo ')';
			}
		}

		echo '</div>';

	}
}








/*
 *
* -----------------------------------------------------------------------------------
*/
/*  Output gallery slideshow
 /*
/*  @param int $postid the post id
/*  @param int $imagesize the image size
/*-----------------------------------------------------------------------------------*/

if (! function_exists ( 'thirtyjin_gallery_post' )) {
	function thirtyjin_gallery_post($postid, $imagesize) {
		?>
        <script type="text/javascript">
    		
    		jQuery(document).ready(function($){
	    		$('#slider-<?php echo $postid; ?>').carouFredSel({
	    			responsive: true,
					width: '100%',
	    			auto: false,
	    			prev: '#prev_<?php echo $postid; ?>',
	    			next: '#next_<?php echo $postid; ?>',
	    			pagination: "#pager_<?php echo $postid; ?>",
	    			//align: 'left',
	    			items: 1,
					swipe: {
						onMouse: true,
						onTouch: true
					}
	    		});  
    		});  
    	</script>
    <?php
		$thumbid = 0;
		
		// get the featured image for the post
		if (has_post_thumbnail ( $postid )) {
			$thumbid = get_post_thumbnail_id ( $postid );
		}
		echo "<!-- BEGIN #slider-$postid -->\n<div class='gallery-slider' >";
		
		$posttitle = the_title_attribute ( array ('echo' => 0 ) );
		
		// get all of the attachments for the post
		$args = array ('orderby' => 'menu_order', 'order' => 'ASC', 'post_type' => 'attachment', 'post_parent' => $postid, 'post_mime_type' => 'image', 'post_status' => null, 'numberposts' => - 1 );
		$attachments = get_posts ( $args );
		if (! empty ( $attachments )) {
			echo '<ul id=slider-' . $postid . '>';
			$i = 0;
			foreach ( $attachments as $attachment ) {
				if ($attachment->ID == $thumbid)
					continue;
				$src = wp_get_attachment_image_src ( $attachment->ID, $imagesize );
				$caption = $attachment->post_excerpt;
				$caption = ($caption) ? $caption : $posttitle;
				$alt = (! empty ( $attachment->post_content )) ? $attachment->post_content : $attachment->post_title;
				echo "<li><img height='$src[2]' width='$src[1]' src='$src[0]' alt='$alt' title='$caption' /></li>";
				$i ++;
			}
			echo '</ul>';
			
			echo '<div class="clearfix"></div>
	<a class="prev" id="prev_' . $postid . '" href="#"><span>prev</span></a>
	<a class="next" id="next_' . $postid . '" href="#"><span>next</span></a>
	<div class="pager" id="pager_' . $postid . '"></div>';
		}
		echo "<!-- END #slider-$postid -->\n</div>";
	}
}

/*
 *
 * -----------------------------------------------------------------------------------
 */
/*	Output Audio
/* 
/*  @param int $postid the post id
/*  @param int $width the width of the audio player
/*-----------------------------------------------------------------------------------*/

if (! function_exists ( 'thirtyjin_audio' )) {
	function thirtyjin_audio($postid, $width = 'auto') {
		
		$mp3 = get_post_meta ( $postid, 'thirtyone_post_format_audio_mp3_url', true );
		$ogg = get_post_meta ( $postid, 'thirtyone_post_format_audio_oga_url', true );
		$poster = get_post_meta ( $postid, 'thirtyone_post_format_audio_poster_image', true );
		$height = get_post_meta ( $postid, 'thirtyone_post_format_audio_poster_image_height', true );
		
		$height = ($height) ? $height : 40;
		
		?>

    		<script type="text/javascript">
		
    			jQuery(document).ready(function($){
	
    				if($().jPlayer) {
    					$("#jquery_jplayer_<?php echo $postid; ?>").jPlayer({
    						ready: function () {
    							$(this).jPlayer("setMedia", {
    							    <?php if($poster != '') : ?>
    							    poster: "<?php echo $poster; ?>",
    							    <?php endif; ?>
    							    <?php if($mp3 != '') : ?>
    								mp3: "<?php echo $mp3; ?>",
    								<?php endif; ?>
    								<?php if($ogg != '') : ?>
    								oga: "<?php echo $ogg; ?>",
    								<?php endif; ?>
    								end: ""
    							});
    						},
    						size: {

            				    <?php if($width != 'auto') { ?>
            				    	width: "<?php echo $width . 'px'; ?>",
	        				    <?php } else { ?>
	        				    	width: "<?php echo $width ; ?>",
	        				    <?php }  ?>
            				    
            				    <?php if($height != 'auto') { ?>
            				    	height: "<?php echo $height . 'px'; ?>"
            				    <?php } else { ?>
            				    	height: "<?php echo $height ; ?>"
            				    <?php }  ?>
            				},
    						swfPath: "<?php echo get_template_directory_uri(); ?>/js",
    						cssSelectorAncestor: "#jp_interface_<?php echo $postid; ?>",
    						supplied: "<?php if($ogg != '') : ?>oga,<?php endif; ?><?php if($mp3 != '') : ?>mp3, <?php endif; ?> all"
    					});
					    
    				}
    			});
    		</script>

	<div id="jquery_jplayer_<?php echo $postid; ?>"
		class="jp-jplayer jp-jplayer-audio"></div>

	<div class="jp-audio-container">
		<div class="jp-audio">
			<div class="jp-type-single">
				<div id="jp_interface_<?php echo $postid; ?>" class="jp-interface">
					<ul class="jp-controls">
						<li><div class="seperator-first"></div></li>
						<li><div class="seperator-second"></div></li>
						<li><a href="#" class="jp-play" tabindex="1" title="play">play</a></li>
						<li><a href="#" class="jp-pause" tabindex="1" title="pause">pause</a></li>
						<li><a href="#" class="jp-stop" tabindex="1" title="stop">stop</a></li>
						<li><a href="#" class="jp-mute" tabindex="1" title="mute">mute</a></li>
						<li><a href="#" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
						<li><a href="#" class="jp-volume-max" tabindex="1"
							title="max volume">max volume</a></li>
					</ul>
					<div class="jp-progress-container">
						<div class="jp-progress">
							<div class="jp-seek-bar">
								<div class="jp-play-bar"></div>
							</div>
						</div>
					</div>
					<div class="jp-volume-bar-container">
						<div class="jp-volume-bar">
							<div class="jp-volume-bar-value"></div>
						</div>
					</div>
					<div class="jp-time-holder">
						<div class="jp-current-time"></div>
						<div class="jp-duration"></div>

						<ul class="jp-toggles">
							<li><a href="javascript:;" class="jp-repeat" tabindex="1"
								title="repeat">repeat</a></li>
							<li><a href="javascript:;" class="jp-repeat-off" tabindex="1"
								title="repeat off">repeat off</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
    	<?php
	}
}

/*
 *
 * -----------------------------------------------------------------------------------
 */
/*  Output video
/*
/*  @param int $postid the post id
/*  @param int $width the width of the video player
/*-----------------------------------------------------------------------------------*/

if (! function_exists ( 'thirtyjin_video' )) {
	function thirtyjin_video($postid, $width = 'auto') {
		
		$m4v = get_post_meta ( $postid, 'thirtyone_post_format_video_m4v_url', true );
		$ogv = get_post_meta ( $postid, 'thirtyone_post_format_video_ogv_url', true );
		$poster = get_post_meta ( $postid, 'thirtyone_post_format_video_poster_image', true );
		
		$height = get_post_meta ( $postid, 'thirtyone_post_format_video_poster_image_height', true );
		$height = ($height) ? $height : auto;
		
		if (! $poster) {
			$poster = get_template_directory_uri () . '/images/logo.png';
		}
		
		?>
    <script type="text/javascript">
    	jQuery(document).ready(function($){
		
    		if($().jPlayer) {
    			$("#jquery_jplayer_<?php echo $postid; ?>").jPlayer({
    				ready: function () {
    					$(this).jPlayer("setMedia", {
    						<?php if($m4v != '') : ?>
    						m4v: "<?php echo $m4v; ?>",
    						<?php endif; ?>
    						<?php if($ogv != '') : ?>
    						ogv: "<?php echo $ogv; ?>",
    						<?php endif; ?>
    						<?php if ($poster != '') : ?>
    						poster: "<?php echo $poster; ?>"
    						<?php endif; ?>
    					});
    				},
    				size: {

        				<?php if($width != 'auto') { ?>
    				    	width: "<?php echo $width . 'px'; ?>",
    				    <?php } else { ?>
    				    	width: "<?php echo $width ; ?>",
    				    <?php }  ?>
    				    
    				    <?php if($height != 'auto') { ?>
    				    	height: "<?php echo $height . 'px'; ?>"
    				    <?php } else { ?>
    				    	height: "<?php echo $height ; ?>"
    				    <?php }  ?>

        				    
    				},
    				swfPath: "<?php echo get_template_directory_uri(); ?>/js",
    				cssSelectorAncestor: "#jp_interface_<?php echo $postid; ?>",
    				supplied: "<?php if($m4v != '') : ?>m4v, <?php endif; ?><?php if($ogv != '') : ?>ogv, <?php endif; ?> all"
    			});
    			
    			$('#jquery_jplayer_<?php echo $postid; ?>').bind($.jPlayer.event.playing, function(event) {
    			    $(this).add('#jp_interface_<?php echo $postid; ?>').hover( function() {
    			        $('#jp_interface_<?php echo $postid; ?>').stop().animate({ opacity: 1 }, 400);
			        }, function() {
			            $('#jp_interface_<?php echo $postid; ?>').stop().animate({ opacity: 0 }, 400);
			        });
    			});
    			
    			$('#jquery_jplayer_<?php echo $postid; ?>').bind($.jPlayer.event.pause, function(event) {
    			    $('#jquery_jplayer_<?php echo $postid; ?>').add('#jp_interface_<?php echo $postid; ?>').unbind('hover');
    			    
    			    $('#jp_interface_<?php echo $postid; ?>').stop().animate({ opacity: 1 }, 400);
			        
    			});
    		}
    	});
    </script>

	<div id="jquery_jplayer_<?php echo $postid; ?>"
		class="jp-jplayer jp-jplayer-video"></div>

	<div class="jp-video-container">
		<div class="jp-video">
			<div class="jp-type-single">
				<div id="jp_interface_<?php echo $postid; ?>" class="jp-interface">
					<ul class="jp-controls">
						<li><div class="seperator-first"></div></li>
						<li><div class="seperator-second"></div></li>
						<li><a href="#" class="jp-play" tabindex="1" title="play">play</a></li>
						<li><a href="#" class="jp-pause" tabindex="1" title="pause">pause</a></li>
						<li><a href="#" class="jp-stop" tabindex="1" title="stop">stop</a></li>
						<li><a href="#" class="jp-mute" tabindex="1" title="mute">mute</a></li>
						<li><a href="#" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
						<li><a href="#" class="jp-volume-max" tabindex="1"
							title="max volume">max volume</a></li>
					</ul>
					<div class="jp-progress-container">
						<div class="jp-progress">
							<div class="jp-seek-bar">
								<div class="jp-play-bar"></div>
							</div>
						</div>
					</div>
					<div class="jp-volume-bar-container">
						<div class="jp-volume-bar">
							<div class="jp-volume-bar-value"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <?php
	
}
}

