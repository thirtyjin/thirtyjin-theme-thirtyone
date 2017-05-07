<?php 



/*-----------------------------------------------------------------------------------
Name: Recent post block Shortcode
Description: Recent Article
Version: 1.0
Author: thirty jin
Author URI: http://www.thirtyjin.com
-----------------------------------------------------------------------------------*/
if (!function_exists('thirtyjin_recent_article_block')) {
	function thirtyjin_recent_article_block($atts , $content = null) {

		extract( 
			shortcode_atts (
				array(
					"number" 	=> '3',
					"header" 	=> 'on',
					"columns"   => '3',
					"post_type" => 'portfolio',
					"summary"   => 'on',
					"taxonomy"  => 'freebies-type',
					"freebiestype"	=> '',
					"title" 	=> 'Recent Article',
					"more_url"  => ''
					), $atts ) 
				);


		$columns = intval($columns);
		$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
		$float = is_rtl() ? 'right' : 'left';
		
		if ('post' == $post_type ) {
			$more_url = home_url();
		}else {
			$more_url = get_post_type_archive_link($post_type); 
		}

		// make sure the id is unique
		$id = rand(1, 100);

		$r = new WP_Query(
				array(
					'posts_per_page' => $number,
					'post_type' => $post_type,
					'freebies-type' => $freebiestype,
					'no_found_rows' => true,
					'post_status' => 'publish',
					'ignore_sticky_posts' => true 
				)
		);
		if ($r->have_posts()) :

		
		$output .= '<div class="recent_articles">';
		
		if ( $header == 'on' ) { 
			$output .= '<div class="recent_articles-header">
						<h1 class="recent_articles-title">';
						if ($more_url) {
							$output .= '<a href="'.$more_url.'">'.$title.'</a>';
						} else {
							$output .= $title;
						}
			$output .= '</h1>';
			
			$output .= '<div class="next-prev-nav">';
			if ($more_url) {
			$output .= '<a href="'.$more_url.'" class="more_articles" title="'. __(More,thirtyone) .'"></a>';
			}
			$output .= '</div></div>';
		}
		
		$output .= '<div class="recent_articles-content recent_articles-columns-'.$columns.'">
					<ul id="recent_article_'.$id.'" class="clearfix">';
		
		  while ($r->have_posts()) { 
		  
		  	$r->the_post(); 
		  
		  $output .= '<li class="recent_articles-'.$columns.'">';
		  
		  if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { 
		  
		  $output .= '<div class="post_thumb empty_img">';
		  $output .= '<a class="thumb_img">';
		  //$output .= '<a href="' .get_permalink(). '" class="thumb">';
		  
				if ( $columns == 1 ) {
					$output .= get_the_post_thumbnail( $r->id, 'feature_large');
				}elseif ( $columns == 2 ) {
					$output .= get_the_post_thumbnail( $r->id, 'feature_half');
				}elseif ( $columns == 3 ) {
					$output .= get_the_post_thumbnail( $r->id, 'feature_small');
				}elseif ( $columns == 4 ) {
					$output .= get_the_post_thumbnail( $r->id, 'feature_fourth');
				}
				$output .= '</a></div>';
				//$output .= '<span class="post-thumb-overlay"></span></a></div>';
		    }else {
			
		    	$output .= '<div class="post_thumb empty_img">';
		    	$output .= '<a class="thumb_img">';
				
				
				$output .= '</a></div>';
			} 
		    
		  	$output .= '<div class="entry-title-meta"><h4 class="entry-title"><a href="' .get_permalink(). '">';
		  	
				  	if ( get_the_title() )  {
				  		$output .= get_the_title();
				  	} else { 
				  		$output .= get_the_ID();
				  	}
		  	
		  	$output .= '</a></h4></div>';
		  	$output .= '<div class="entry-summary">';
		    //$output .= get_the_content('Read more');
		    //$output .= apply_filters('the_content', get_the_content( 'Read more'));
		    //$output .= get_the_excerpt(); 
			$output .= apply_filters('the_excerpt', get_the_excerpt() );
		  	$output .= '</div>';
		  	$output .= '</li>';
		  }
		  	
		  	$output .= '</ul>
			<div class="clearfix"></div>
				</div>
			</div>';
		  	 	
			endif;
			
			return $output;
			
	}
	add_shortcode('thirtyjin_recent_article_block', 'thirtyjin_recent_article_block');
}



/*-----------------------------------------------------------------------------------
Name: Recent Portfolio Shortcode
Description: Recent Portfolio 
Version: 1.0
Author: thirty jin
Author URI: http://www.thirtyjin.com
-----------------------------------------------------------------------------------*/
if (!function_exists('thirtyjin_recent_article')) {
	function thirtyjin_recent_article($atts , $content = null) {
		
		extract(shortcode_atts(array(
				"number" => '3',
				"header" => 'on',
				'columns'    => '3',
				"post_type" => 'portfolio',
				//"post_type" => array('portfolio','post') ,
				//"id" => '1',
				"title" => 'Recent Portfolio',
				"more_url"=>''
		), $atts)); 
		
		
		$columns = intval($columns);
		$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
		$float = is_rtl() ? 'right' : 'left';
		if ('post' == $post_type ) {
			$more_url = home_url();
		}else {
			$more_url = get_post_type_archive_link($post_type); 
		}
		
		// make sure the id is unique
		$id = rand(1, 100);
		
		$r = new WP_Query(
				array(
						'posts_per_page' => $number, 
						'post_type' => $post_type, 
						'no_found_rows' => true, 
						'post_status' => 'publish', 
						'ignore_sticky_posts' => true)
				);
		if ($r->have_posts()) :
		
		?>
			<script type="text/javascript">
	    		jQuery(document).ready(function($){
	    		    jQuery('#recent_article_<?php echo $id; ?>').carouFredSel({
	    			
	    				width: '100%',
	    				height : "variable",
	    				items: {
	    					height: "variable"
	    				},
	    				prev: '#prev<?php echo $id; ?>',
	    				next: '#next<?php echo $id; ?>',
	    				scroll:{
	    					items			: 1,
	    					easing			: "linear",
	    					duration		: 200,							
	    					pauseOnHover	: true
	    				},
	    				align: "left",
	    				auto: false,
	    				swipe: {
	    					onMouse: true,
	    					onTouch: true
	    				}
	    			}); 
	    			
	    		});
	    	</script>
			<?php 
	
		
		$output = '';
		$output .= '<div class="recent_articles">';
		
		if ( $header == 'on' ) { 
			$output .= '<div class="recent_articles-header">
						<h1 class="recent_articles-title">';
						if ($more_url) {
							$output .= '<a href="'.$more_url.'">'.$title.'</a>';
						} else {
							$output .= $title;
						}
			$output .= '</h1>';
			
			
			//$output .= '<div class="recent_articles-morelink"><a class=" more-link" href="'.$more_url.'" class="more-link">'. __(More,thirtyone) .'</a></div>';
			$output .= '<div class="next-prev-nav"><a id="prev'.$id.'" class="prev" href="#">&lt;</a><a id="next'.$id.'" class="next" href="#">&gt;</a>';
			if ($more_url) {
			$output .= '<a href="'.$more_url.'" class="more_articles" title="'. __(More,thirtyone) .'"></a>';
			}
			$output .= '</div></div>';
		}
		$output .= '<div class="recent_articles-content recent_articles-columns-'.$columns.'">
					<ul id="recent_article_'.$id.'" class="clearfix">';
		
		  while ($r->have_posts()) { 
		  
		  	$r->the_post(); 
		  
		  $output .= '<li class="recent_articles-'.$columns.'">';
		  
		  if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { 
		  
		  $output .= '<div class="post_thumb empty_img">';
		  $output .= '<a class="thumb">';
		  //$output .= '<a href="' .get_permalink(). '" class="thumb">';
		  
				if ( $columns == 1 ) {
					$output .= get_the_post_thumbnail( $r->id, 'feature_large');
				}elseif ( $columns == 2 ) {
					$output .= get_the_post_thumbnail( $r->id, 'feature_half');
				}elseif ( $columns == 3 ) {
					$output .= get_the_post_thumbnail( $r->id, 'feature_small');
				}elseif ( $columns == 4 ) {
					$output .= get_the_post_thumbnail( $r->id, 'feature_fourth');
				}
				$output .= '</a></div>';
				//$output .= '<span class="post-thumb-overlay"></span></a></div>';
		    }else {
			
				$output .= '<div class="post_excerpt">';
				
				if ( $columns == 1 ) {
					$output .= get_the_excerpt(); 
				}elseif ( $columns == 2 ) {
				  	$output .= '<div style="width:470px">'.get_the_excerpt().'</div>'; 
				}elseif ( $columns == 3 ) {
				  	$output .= '<div style="width:300px">'.get_the_excerpt().'</div>'; 
				}elseif ( $columns == 4 ) {
				  	$output .= '<div style="width:220px">'.get_the_excerpt().'</div>'; 
				}
				
				$output .= '</div>';
			} 
		    
		  	$output .= '<div class="widget-entry-title">
						<a href="' .get_permalink(). '">';
		  	
		  	if ( get_the_title() )  
		  		$output .= get_the_title();
		  	else 
		  		$output .= get_the_ID();
		  	
		  	$output .= '</a>
					</div>
		  			</li>';
		  }
		  	
		  	$output .= '</ul>
			<div class="clearfix"></div>
				</div>
			</div>';
		  	 	
			endif;
			
			return $output;
			
	}
	add_shortcode('thirtyjin_recent_article', 'thirtyjin_recent_article');
}





/* ======================================================= */
/*                   Recent Posts list                     */
/* ======================================================= */
if (!function_exists('thirtyjin_recent_article_list')) {
	function thirtyjin_recent_article_list($atts) {
		extract(shortcode_atts(array(
				"number"=> 6,
				"post_type" => 'post',
				"thumbnail"=> 'on'
		), $atts));
		
		global $post;
		
		$args = array(
				'numberposts'     => $number,
				'offset'          => 0,
				'orderby'         => 'post_date',
				'order'           => 'DESC',
				'post_type'       => $post_type,
				'post_status'     => 'publish' 
		);
		
		
		$output = '';
		$output .= '<div class="widget widget_recent_entries"><ul>';
		$recentpost = get_posts($args);
		foreach($recentpost as $post) : 
		$output .= '<li>';
		
		if ($thumbnail == 'on') {
			
			if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
				$output .= '<div class="post_thumb"><a href="'.get_permalink().'">' .get_the_post_thumbnail($post->ID,array(52,52)). '</a></div>';
					
			}else{
				$output .= '<div class="post_thumb"><a href="'.get_permalink().'"><img style="width: 52px; height: 52px;" src="' .get_template_directory_uri(). '/images/default_post_pic.png"></a></div>';
					
			}
			
		}elseif ($thumbnail == 'off') {
			
		}
		
		$output .= '<div class="widget-entry-title"><a href="'.get_permalink().'">'.get_the_title().'</a></div>';
		$output .= '<div class="meta-info">'. get_the_date() .'</div></li>' ;
		$output .= '';
		endforeach;
		
		$output .= '</ul></div>';
		
		return $output;
	}
	add_shortcode('thirtyjin_recent_article_list', 'thirtyjin_recent_article_list');
}






/* ======================================================= */
/*                Recent books image list                  */
/* ======================================================= */
if (!function_exists('thirtyjin_recent_books_list')) {
	function thirtyjin_recent_books_list($atts) {
		extract(shortcode_atts(
		array(
		"number"=> 6,
		"header" 	=> 'on',
		"post_type" => 'books',
		"title" 	=> 'Recent Books',
		"more_url"  => '',
		), $atts));

		global $post;

		$args = array(
				'numberposts'     => $number,
				'offset'          => 0,
				'orderby'         => 'post_date',
				'order'           => 'DESC',
				'post_type'       => $post_type,
				'post_status'     => 'publish'
		);
		
		if ('post' == $post_type ) {
			$more_url = home_url();
		}else {
			$more_url = get_post_type_archive_link($post_type);
		}



		$output = '';
		$output .= '<div class="recent_books">';
		if ( $header == 'on' ) {
			$output .= '<div class="recent_articles-header">
						<h1 class="recent_articles-title">';
			if ($more_url) {
				$output .= '<a href="'.$more_url.'">'.$title.'</a>';
			} else {
				$output .= $title;
			}
			$output .= '</h1>';
				
			$output .= '<div class="next-prev-nav">';
			if ($more_url) {
				$output .= '<a href="'.$more_url.'" class="more_articles" title="'. __(More,thirtyone) .'"></a>';
			}
			$output .= '</div></div>';
		}
		
		$output .= '<div class="widget widget_recent_books"><ul>';
		$recentpost = get_posts($args);
		foreach($recentpost as $post) :
		$output .= '<li>';

		if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
			$output .= '<div class="post_thumb"><a href="'.get_permalink().'">' .get_the_post_thumbnail($post->ID,'feature_book'). '</a></div>';
				
		}else{
			$output .= '<div class="post_thumb"><a href="'.get_permalink().'" style="width: 140px; height: 187px;"></a></div>';
				
		}
				
		$output .= '<div class="widget-entry-title"><h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4></div>';
		$output .= '</li>' ;
		$output .= '';
		endforeach;

		$output .= '</ul></div></div>';

		return $output;
	}
	add_shortcode('thirtyjin_recent_books_list', 'thirtyjin_recent_books_list');
}








/*-----------------------------------------------------------------------------------*/
/*  Output theme options slider shortcode
/*
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'thirtyjin_theme_option_slider' ) ) {
	function thirtyjin_theme_option_slider( $atts ) {
	
	// make sure the id is unique
	$id = rand(1, 100);

	?>
	
	<script type="text/javascript">
	    		jQuery(document).ready(function($){
	    		    jQuery('#slider_<?php echo $id; ?>').carouFredSel({
	    			
	    				width: 'auto',
	    				height : "variable",
	    				items: {
	    					visible: {
	    						min: 1,
	    						max: 1
	    					},
	    					height 		: "variable" 
	    				},
	    				prev: "#prev_<?php echo $id; ?>",
	    				next: "#next_<?php echo $id; ?>",
	    				pagination: "#pagination_slider_<?php echo $id; ?>",
	    				scroll:{
	    					items			: 1,
	    					easing			: "linear",
	    					duration		: 200,							
	    					pauseOnHover	: true
	    				},
	    				align: "center",
	    				auto: false,
	    				swipe: {
	    					onMouse: true,
	    					onTouch: true
	    				}
	    			}); 
	    			
	    		});
	    	</script>
	
	<?php 

	$output ='';
	
	$output .='<div class="slidershow post-media"><div class="list_carousel"><ul id="slider_'.$id.'">';


	/* get the slider array */
	$slides = ot_get_option( 'thirtyone_ot_my_slider', array() );

	if ( ! empty( $slides ) ) {
		foreach( $slides as $slide ) {
			$output .='<li><a href="' . $slide['link'] . '"><img src="' . $slide['image'] . '" alt="' . $slide['title'] . '" /></a><div class="description">' . $slide['description'] . '</div></li>';
		}
	
	$output .='</ul><div class="clearfix"></div><a id="prev_'.$id.'" class="prev" href="#">&lt;</a><a id="next_'.$id.'" class="next" href="#">&gt;</a><div id="pagination_slider_'.$id.'" class="pager"></div></div></div>';
	}
    //return $output;
    return do_shortcode($output);
}
    add_shortcode('thirtyjin_slider', 'thirtyjin_theme_option_slider');
}






/* ======================================================= */
/*                  subpage_list                           */
/* ======================================================= */
if (!function_exists('thirtyjin_subpage_list')) {
	function thirtyjin_subpage_list($atts, $content = null) {
		extract(shortcode_atts(array(
				"title"=> 'subpage list'
		), $atts));
		
		
		if ( is_page() ) {
			
			global $post;
			
			if ($post->post_parent) {
				$children = wp_list_pages('title_li=&child_of='.$post->post_parent.'&echo=0');
			} else {
				$children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
			}
			if ($children) {
				$output .= ($title == '' ? '' : "<h3>$title</h3>");
			 	/* $output .= '<h3>';
				$parent_title = get_the_title ( $post->post_parent );
				$output .= $parent_title;
				$output .= '</h3>'; */
				$output .= '<ul>';
				$output .= $children;
				$output .= '</ul>';
			}else {
				$output .= '<ul>';
				$output .= wp_list_pages('echo=0&depth=1&title_li=' );
				$output .= '</ul>';
			}
		}else {
				$output .= '<ul>';
				$output .= wp_list_pages('echo=0&depth=1&title_li=' );
				$output .= '</ul>';
				
		}
		
		return $output;
	}
	add_shortcode('thirtyjin_subpage_list', 'thirtyjin_subpage_list');
}





/*-----------------------------------------------------------------------------------

Name: thirtyjin_sitemap
Description: Site map shortcoode
Version: 1.0
Author: thirty jin
Author URI: http://www.thirtyjin.com

-----------------------------------------------------------------------------------*/
if (!function_exists('thirtyjin_sitemap')) {
function thirtyjin_sitemap($atts) {
	// default parameters
	extract(shortcode_atts(array(
			'title' => 'Site Map',
			'id' => 'sitemap',
			'depth' => 2
	), $atts));
	// create sitemap
	$sitemap = wp_list_pages("title_li=&depth=$depth&sort_column=menu_order&echo=0");
	if ($sitemap != '') {
		$sitemap = ($title == '' ? '' : "<h3>$title</h3>") . '<div class="checklist list2 list_color_orange"><ul' . ($id == '' ? '' : " id=\"$id\"") . ">$sitemap</ul></div>";
	}
	return $sitemap;
}
add_shortcode('thirtyjin_sitemap', 'thirtyjin_sitemap');
}


/*-----------------------------------------------------------------------------------

Name: thirtyjin_archive
Description: archive shortcoode
Version: 1.0
Author: thirty jin
Author URI: http://www.thirtyjin.com

-----------------------------------------------------------------------------------*/
if (!function_exists('thirtyjin_archive')) {
	function thirtyjin_archive($atts) {
		// default parameters
		extract(shortcode_atts(array(
				'number' => '30',
				'title' => 'Last 30 Posts'
		), $atts));
		
		$args = array(
				'numberposts'  	  => $number,
				'post_type'       => array( 'post','portfolio' ),
				'post_status'     => 'publish'
		);
		
		global $post;
		$archive_30 = get_posts( $args );
		$output = '';
		$output .= ($title == '' ? '' : "<h3>$title</h3>");
		$output .= '<div class="checklist list2 list_color_orange"><ul>';
		foreach($archive_30 as $post) :
			$output .='<li>'. get_the_date() . ' - <a href="'.get_permalink().'">'.get_the_title().'</a> </li>'; 
		endforeach;
		$output .= '</ul></div>';
		
		
		return $output;
	}
	add_shortcode('thirtyjin_archive', 'thirtyjin_archive');
}





/*-----------------------------------------------------------------------------------

Name: thirtyjin_archive_by
Description: archive shortcoode
Version: 1.0
Author: thirty jin
Author URI: http://www.thirtyjin.com

-----------------------------------------------------------------------------------*/
if (!function_exists('thirtyjin_archive_by')) {
	function thirtyjin_archive_by($atts) {
		// default parameters
		extract(shortcode_atts(array(
				'title' => 'Archives by Month:',
				'archive_by' => 'monthly'
		), $atts));

		$args = array(
				'type'	 => $archive_by ,
				'echo'   => 0
		);
		
		$output = '';
		$output .= ($title == '' ? '' : "<h3>$title</h3>");
		$output .= '<div class="checklist list2 list_color_orange"><ul>';
		$output .= wp_get_archives( $args );
		$output .= '</ul></div>';

		return $output;
	}
	add_shortcode('thirtyjin_archive_by', 'thirtyjin_archive_by');
}






/*-----------------------------------------------------------------------------------

Name: thirtyjin_archive_categories
Description: archive by categories shortcoode
Version: 1.0
Author: thirty jin
Author URI: http://www.thirtyjin.com

-----------------------------------------------------------------------------------*/
if (!function_exists('thirtyjin_archive_categories')) {
	function thirtyjin_archive_categories($atts) {
		// default parameters
		extract(shortcode_atts(array(
				'title' => 'Archives by Subject:'
		), $atts));

		$args = array(
				'title_li'   => '',
				'echo'   => 0
		);

		$output = '';
		$output .= ($title == '' ? '' : "<h3>$title</h3>");
		$output .= '<div class="checklist list2 list_color_orange"><ul>';
		$output .= wp_list_categories( $args );
		$output .= '</ul></div>';

		return $output;
	}
	add_shortcode('thirtyjin_archive_categories', 'thirtyjin_archive_categories');
}



/* ======================================================= */
/*             thirtyjin_gallery                           */
/* ======================================================= */
if (!function_exists('thirtyjin_gallery')) {
	function thirtyjin_gallery($attr) {
		global $post;
	
		static $instance = 0;
		$instance++;
	
		// Allow plugins/themes to override the default gallery template.
		$output = apply_filters('post_gallery', '', $attr);
		if ( $output != '' )
			return $output;
	
		// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
		if ( isset( $attr['orderby'] ) ) {
			$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
			if ( !$attr['orderby'] )
				unset( $attr['orderby'] );
		}
	
		extract(shortcode_atts(array(
				'order'      => 'ASC',
				'orderby'    => 'menu_order ID',
				'id'         => $post->ID,
				'itemtag'    => 'dl',
				'icontag'    => 'dt',
				'captiontag' => 'dd',
				'columns'    => 3,
				'size'       => 'thumbnail',
				'include'    => '',
				'exclude'    => '',
				'link'       => 'file',
				'lightbox'   => 'on'
		), $attr));
	
		$id = intval($id);
		if ( 'RAND' == $order )
			$orderby = 'none';
		
		
		if ( !empty($include) ) {
			$include = preg_replace( '/[^0-9,]+/', '', $include );
			$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	
			$attachments = array();
			foreach ( $_attachments as $key => $val ) {
				$attachments[$val->ID] = $_attachments[$key];
			}
		} elseif ( !empty($exclude) ) {
			$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
			$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		} else {
			$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		}
	
		if ( empty($attachments) )
			return '';
	
		if ( is_feed() ) {
			$output = "\n";
			foreach ( $attachments as $att_id => $attachment )
				$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
			return $output;
		}
	
		$itemtag = tag_escape($itemtag);
		$captiontag = tag_escape($captiontag);
		$columns = intval($columns);
		$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
		$float = is_rtl() ? 'right' : 'left';
	
		$selector = "gallery-{$instance}";
	
		$gallery_style = $gallery_div = '';
		if ( apply_filters( 'use_default_gallery_style', true ) )
			$gallery_style = "
			<style type='text/css'>
			#{$selector} {
			margin: auto;
			}
			#{$selector} .gallery-item {
			float: {$float};
			margin-top: 10px;
			text-align: center;
			width: {$itemwidth}%;
			}
			#{$selector} img {
				border: 2px solid #cfcfcf;
			}
			#{$selector} .gallery-caption {
			margin-left: 0;
		}
		</style>
		<!-- see gallery_shortcode() in wp-includes/media.php -->";
		$size_class = sanitize_html_class( $size );
		$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
		$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );
	
		$i = 0;
		foreach ( $attachments as $id => $attachment ) {
		
		// lightbox 
		if ('off' == $attr['lightbox']){
			$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
			
		}else {
			
			$link = '<a href="'.wp_get_attachment_url($id).'" rel="lightbox['.$selector.']">';
			$link .= wp_get_attachment_image($attachment->ID,$size,false,false);
			$link .= '</a>';
			
		}
		
		$output .= "<{$itemtag} class='gallery-item'>";
		$output .= "
		<{$icontag} class='gallery-icon'>
		$link
		</{$icontag}>";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
		$output .= "
		<{$captiontag} class='wp-caption-text gallery-caption'>
		" . wptexturize($attachment->post_excerpt) . "
		</{$captiontag}>";
		}
		$output .= "</{$itemtag}>";
		if ( $columns > 0 && ++$i % $columns == 0 )
			$output .= '<br style="clear: both" />';
		}
	
		$output .= "
		<br style='clear: both;' />
		</div>\n";
	
		return $output;
	}
	
	add_shortcode('thirtyjin_gallery', 'thirtyjin_gallery');
}








/* ======================================================= */
/*             thirtyjin_contact_form                      */
/* ======================================================= */

if (!function_exists('thirtyjin_contact_form')) {
	function thirtyjin_contact_form($atts) {
		
		extract(shortcode_atts(array(
				"title" => 'Contact Form',
				"description" => 'Proin tortor eros, vestibulum ac molestie in, accumsan ut nisi.'
		), $atts));
		
		$output = '';
		
		
		/* Edit the error messages here --------------------------------------------------*/
		$nameError = __( 'Please enter your name.', 'thirtyone' );
		$emailError = __( 'Please enter your email address.', 'thirtyone' );
		$emailInvalidError = __( 'You entered an invalid email address.', 'thirtyone' );
		$commentError = __( 'Please enter a message.', 'thirtyone' );
		/*--------------------------------------------------------------------------------*/
		
		
		$errorMessages = array();
		if(isset($_POST['submitted'])) {
			if(trim($_POST['contactName']) === '') {
				$errorMessages['nameError'] = $nameError;
				$hasError = true;
			} else {
				$name = trim($_POST['contactName']);
			}
		
			if(trim($_POST['email']) === '')  {
				$errorMessages['emailError'] = $emailError;
				$hasError = true;
			} else if (!preg_match("/^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$/i", trim($_POST['email']))) {
				$errorMessages['emailInvalidError'] = $emailInvalidError;
				$hasError = true;
			} else {
				$email = trim($_POST['email']);
			}
				
			if(trim($_POST['comments']) === '') {
				$errorMessages['commentError'] = $commentError;
				$hasError = true;
			} else {
				if(function_exists('stripslashes')) {
					$comments = stripslashes(trim($_POST['comments']));
				} else {
					$comments = trim($_POST['comments']);
				}
			}
				
			if(!isset($hasError)) {
				$emailTo = ot_get_option('thirtyone_contact_email');
				if (!isset($emailTo) || ($emailTo == '') ){
					$emailTo = get_option('admin_email');
				}
				$subject = __('[Contact Form] From', 'thirtyone') .$name;
				$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
				$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
					
				mail($emailTo, $subject, $body, $headers);
				$emailSent = true;
			}
		
		}
		
		?>
		<script type="text/javascript">
    			jQuery(document).ready(function(){
    				jQuery("#contactForm").validate({
    					messages: {
    						contactName: '<?php echo $nameError; ?>',
    						email: {
    							required: '<?php echo $emailError; ?>',
    							email: '<?php echo $emailInvalidError; ?>'
    						},
    						comments: '<?php echo $commentError; ?>'
    					}
    				});
    			});
			</script>
		
		
		
		<?php 
		$output .= '<div id="contact" class="contact-form clearfix">';
		$output .= '<h4>'. $title .'</h4>';
		$output .= '<p>'. $description .'</p>';
		
		if(isset($emailSent) && $emailSent == true) {
			$output .= '<div class="thanks"><p>'. __('Thanks, your email was sent successfully.', 'thirtyone') .'</p></div>';
		} else {
			if(isset($hasError) || isset($captchaError)){
				$output .= '<p class="error">'. __('Sorry, an error occured.', 'thirtyone') .'</p>';
			}
			
			$output .= '<form action="'. get_permalink() .'" id="contactForm" method="post">'; //
			$output .='<ul class="contactform">';
			$output .='<li class="contact-form-author">';
				$output .= '<label for="contactName">';
					$output .= __('Name:', 'thirtyone');
				$output .= '</label>';;
				$output .= '<input type="text" name="contactName" id="contactName" value="';
				if(isset($_POST['contactName'])){
					echo $_POST['contactName'];
				} 
				$output .='" class="required requiredField" />';
				if(isset($errorMessages['nameError'])) {
					$output .='<span class="error">';
					echo $errorMessages['nameError']; //
					$output .='</span>';
				}
			$output .='</li>';
			
			$output .='<li class="contact-form-email">';
				$output .= '<label for="email">'. __('Email:', 'thirtyone') .'</label>';
				$output .= '<input type="text" name="email" id="email" value="';
				if(isset($_POST['email']))  echo $_POST['email']; //
				$output .='" class="required requiredField email" />';
				if(isset($errorMessages['emailError'])) {
					$output .='<span class="error">';
					echo $errorMessages['emailError'];
					$output .='</span>';
				}
				if(isset($errorMessages['emailInvalidError'])) {
					$output .='<span class="error">';
					echo $errorMessages['emailInvalidError'];
					$output .='</span>';
				}
			$output .='</li>';
			
			$output .='<li class="contact-form-comment textarea">';
				$output .= '<label for="commentsText">'. __('Message:', 'thirtyone') .'</label>';
				$output .= '<textarea name="comments" id="commentsText" rows="20" cols="30" class="required requiredField">';
				if(isset($_POST['comments'])) {
					if(function_exists('stripslashes')) {
						echo stripslashes($_POST['comments']);
					} else { echo $_POST['comments'];
					}
				}
				$output .= '</textarea>';
				if(isset($errorMessages['commentError'])) {
					$output .='<span class="error">';
					echo $errorMessages['commentError'];
					$output .='</span>';
				}
			$output .='</li>';
			
			$output .='<li class="buttons">';
			$output .='<input name="submitted" type="submit" id="submitted" value="Send Email" />';
			$output .='</li>';
			
			$output .='</ul></form>';
			
		}
		
		
		$output .= '</div>'; //id="contact"
		
		return $output;
		
	}
	
	add_shortcode('thirtyjin_contact_form', 'thirtyjin_contact_form');
}







?>