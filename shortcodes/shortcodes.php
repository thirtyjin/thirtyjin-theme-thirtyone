<?php



/**
 * Disable auto-formatting for shortcodes
 *
 * @param string $content
 * @return string Formatted content with clean shortcodes content
 */
function thirtyjin_custom_formatter( $content ) {
	$new_content = '';

	// Matches the contents and the open and closing tags
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';

	// Matches just the contents
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';

	// Divide content into pieces
	$pieces = preg_split( $pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE );

	// Loop over pieces
	foreach ( $pieces as $piece ) {

		// Look for presence of the shortcode
		if ( preg_match( $pattern_contents, $piece, $matches ) ) {

			// Append to content (no formatting)
			$new_content .= $matches[1];
		} else {

			// Format and append to content
		    $new_content .= wptexturize( wpautop( $piece ) );
		}
	}

	return $new_content;
}


// Apply custom formatter function
//add_filter( 'the_content', 'thirtyjin_custom_formatter', 99 );
//add_filter( 'the_excerpt', 'thirtyjin_custom_formatter', 99 );



/*-----------------------------------------------------------------------------------*/
/*	Add the custom quicktags to the TinyMCE Editor
/*-----------------------------------------------------------------------------------*/


function my_custom_quicktags() {
	wp_enqueue_script(
			'my_custom_quicktags',
			get_bloginfo('template_url').'/shortcodes/js/custom-quicktags.js',
			array( 'quicktags' )
	);
}
add_action( 'admin_print_scripts', 'my_custom_quicktags' );




/*
 * Shortcode Function
* @author thirtyjin
* @since 1.0
* @date 2012-06-10
*
*/

/* ======================================================= */
/*
*  1. checklist
*  2. a icon
*  3. span icon
*  4. columns
*  5. divider
*  6. hightlight
*  7. quote
*  8. dropcap
*  9. box
*  10.button
*  11.tooltip
*  12.toggle
*  13.tab
*  14.mini tab
*  15.accordion
*  16.Alert
*
*/
/* ======================================================= */


/*-----------------------------------------------------------------------------------*/
/*	Column Shortcodes
/*-----------------------------------------------------------------------------------*/


if (!function_exists('thirtyjin_columns')) {
function thirtyjin_columns($atts, $content = null) {
	extract(shortcode_atts(array(
			"style" => '',
			"last" => ''
	), $atts));
	return '<div class="columns '.$style.' '.$last.'">'.do_shortcode($content).'</div>'; 
}
add_shortcode('thirtyjin_columns', 'thirtyjin_columns');
}

/*-----------------------------------------------------------------------------------*/
/*	Buttons
/*-----------------------------------------------------------------------------------*/

if (!function_exists('thirtyjin_button')) {
	function thirtyjin_button( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'url' => '#',
			'target' => '_self',
			'style' => 'grey',
			'size' => 'small',
			'type' => 'round',
			'full' => false,
			'align' =>'alignleft'
	    ), $atts));
		
		if ($full) {
			$full_width = 'full';
		} else {
			$full_width = '';
		}
		
	   return '<a target="'.$target.'" class="thirtyjin-button '.$size.' '.$style.' '.$align.' '. $type .' '.$full_width.' " href="'.$url.'">' . do_shortcode($content) . '</a>';
	}
	add_shortcode('thirtyjin_button', 'thirtyjin_button');
}


/*-----------------------------------------------------------------------------------*/
/*	Table
/*-----------------------------------------------------------------------------------*/

if (!function_exists('thirtyjin_table')) {
	function thirtyjin_table( $atts, $content ) {
		extract(shortcode_atts(array(
				'style'   => 'style1'
		), $atts));
		
		$return = '<div class="styled_table '.$style.'">'."\n". do_shortcode($content) . '</div>'."\n";
		return $return;
		
	}
	add_shortcode('thirtyjin_table', 'thirtyjin_table');
}



/*-----------------------------------------------------------------------------------*/
/*	Toggle Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('thirtyjin_toggle')) {
	function thirtyjin_toggle( $atts, $content = null ) {
	    extract(shortcode_atts(array(
			'title'    	 => 'Title goes here',
	    	'style'    	 => 'one',
			'state'		 => 'open'
	    ), $atts));
	
		return '<div data-id="'.$state.'" class="thirtyjin-toggle toggle-'.$style.'"><div class="thirtyjin-toggle-title toggle-'.$style.'"><a href="#">'. $title .'</a></div><div class="thirtyjin-toggle-inner inner-toggle-'.$style.'">'. do_shortcode($content) .'</div></div>';
	}
	add_shortcode('thirtyjin_toggle', 'thirtyjin_toggle'); 
}


/*-----------------------------------------------------------------------------------*/
/*	jQuery UI Tabs Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('thirtyjin_tabs')) {
	function thirtyjin_tabs( $atts, $content ){
		$GLOBALS['tab_count'] = 0;
	
		do_shortcode($content);
	
		if( is_array( $GLOBALS['tabs'] ) ){
			$int = '1';
			foreach( $GLOBALS['tabs'] as $tab ){
				$tabs[] = '<li><a href="#thirtyjin-tab-'.$int.'">'.$tab['title'].'</a></li>';
				$panes[] = '<div id="thirtyjin-tab-'.$int.'" class="thirtyjin-tab">'.$tab['content'].'</div>';
				$int++;
			}
			$return = "\n".'<div class="thirtyjin-tabs"><ul class="thirtyjin-nav clearfix">'.implode( "\n", $tabs ).'</ul>'."\n".' '.implode( "\n", $panes ).'</div>'."\n";
		}
		return $return;
	}
add_shortcode( 'thirtyjin_tabs', 'thirtyjin_tabs' );
}

if (!function_exists('thirtyjin_tab')) {

	function thirtyjin_tab( $atts, $content ){
		extract(shortcode_atts(array(
		'title' => 'Tab %d'
		), $atts));
	
		$x = $GLOBALS['tab_count'];
		$GLOBALS['tabs'][$x] = array( 
				'title' => sprintf( $title, $GLOBALS['tab_count'] ), 
				'content' => do_shortcode($content) );
	
		$GLOBALS['tab_count']++;
	}
add_shortcode( 'thirtyjin_tab', 'thirtyjin_tab' );
}



/* ======================================================= */
/*          jQuery UI Accordion - Accordion shortcode             */
/* ======================================================= */
if (!function_exists('thirtyjin_accordions')) {
	function thirtyjin_accordions( $atts, $content ){
		$return = '<div class="thirtyjin_accordion">'."\n".do_shortcode($content).'</div>'."\n";
		return $return;
	}
}

add_shortcode( 'thirtyjin_accordions', 'thirtyjin_accordions' );

// Tab marks
if (!function_exists('thirtyjin_accordion')) {
function thirtyjin_accordion( $atts, $content ){
	extract(shortcode_atts(array(
			'title' => 'Tab %d'
	), $atts));
	return '<div class="accordion_title"><a href="#">'.do_shortcode($title).'</a></div>'."\n".
			'<div class="accordion_content">'.do_shortcode($content).'</div>'."\n";
}

add_shortcode( 'thirtyjin_accordion', 'thirtyjin_accordion' );
}



/* ======================================================= */
/*                         checklist                       */
/* ======================================================= */
if (!function_exists('thirtyjin_checklist')) {
function thirtyjin_checklist($atts, $content = null) {
	extract(shortcode_atts(array(
			"style" => 'list1',
			"color" => 'black'
	), $atts));
	return '<div class="checklist '.$style.' list_color_'.$color.'">'.do_shortcode($content).'</div>';
}
add_shortcode('thirtyjin_checklist', 'thirtyjin_checklist');
}


/* ======================================================= */
/*                         a_icon                          */
/* ======================================================= */
if (!function_exists('thirtyjin_icon_text')) {
function thirtyjin_icon_text($atts, $content = null) {
	extract(shortcode_atts(array(
			"style" => 'home',
			"color" => 'grey',
			"rel" => '',
			"url" => ''
	), $atts));
	return '<a class="icon_text icon_'.$style.' '.$color.'" rel="'.$rel.'" href="'.$url.'">'.do_shortcode($content).'</a>';
}
add_shortcode('thirtyjin_icon_text', 'thirtyjin_icon_text');
}


/* ======================================================= */
/*                         span_icon                       */
/* ======================================================= */
if (!function_exists('thirtyjin_span_icon')) {
function thirtyjin_span_icon($atts, $content = null) {
	extract(shortcode_atts(array(
			"style" => 'home',
			"color" => 'grey'
	), $atts));
	return '<span class="icon_text icon_'.$style.' '.$color.'">'.do_shortcode($content).'</span>';
}
add_shortcode('thirtyjin_span_icon', 'thirtyjin_span_icon');
}




/* ======================================================= */
/*                         quote                           */
/* ======================================================= */
if (!function_exists('thirtyjin_quote')) {
function thirtyjin_quote($atts, $content = null) {
	extract(shortcode_atts(array(
			"cite"=> '',
			"align" => 'aligncenter',
			"width" => 'auto'
	), $atts));
	return '<blockquote class="'.$align.'" style="width:'.$width.'">'.do_shortcode($content). '<p><cite>'.$cite.'</cite></p></blockquote>';
}
add_shortcode('thirtyjin_quote', 'thirtyjin_quote');
}

/* ======================================================= */
/*                         Divider                         */
/* ======================================================= */
if (!function_exists('thirtyjin_divider')) {

function thirtyjin_divider($atts, $content = null) {
	extract(shortcode_atts(array(
			"color" => 'light',
			'style' => 'solid',
			'title' => ''
			
	), $atts));
	return '<div class="divider top '.$style.' '.$color.'"><a class="'.$color.'" href="#">'.$title.'</a></div>';
}
add_shortcode('thirtyjin_divider', 'thirtyjin_divider');
}

/* ======================================================= */
/*                         highlight                       */
/* ======================================================= */
if (!function_exists('thirtyjin_highlight')) {
function thirtyjin_highlight($atts, $content = null) {
	extract(shortcode_atts(array(
			"color" => ''
	), $atts));
	return '<span class="highlight '.$color.'">'.do_shortcode($content).'</span>';
}
add_shortcode('thirtyjin_highlight', 'thirtyjin_highlight');
}



/* ======================================================= */
/*                         box                             */
/* ======================================================= */
if (!function_exists('thirtyjin_box')) {
function thirtyjin_box( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'style' => 'info',
			'align' => '',
			'width' => '100%'
	), $atts ) );

	return '<div class="boxes '.$style.'_box '.$align.'" style="width:'.$width.'">'."\n".'
				<div class="boxes_content">'."\n".'
					<div class="box_content">' .do_shortcode($content). '</div>'."\n".'
					<div class="clearboth"></div>'."\n".'</div>'."\n".'</div>';
}
add_shortcode('thirtyjin_box', 'thirtyjin_box');
}


/* ======================================================= */
/*                      Messages                           */
/* ======================================================= */

if (!function_exists('thirtyjin_messages')) {
	function thirtyjin_messages( $atts, $content = null ) {
		extract(shortcode_atts(array(
				'style'   => 'info',
				'align' => '',
				'width' => 'auto'
		), $atts));

		return '<div class="message_box '.$style.' '.$align.'" style="width:'.$width.'">'."\n".'
		<div class="message_box_content">' .do_shortcode($content). '</div>'."\n".'</div>';
	}
	add_shortcode('thirtyjin_messages', 'thirtyjin_messages');
}

/* ======================================================= */
/*                      framed box                         */
/* ======================================================= */

if (!function_exists('thirtyjin_framed_box')) {
	function thirtyjin_framed_box( $atts, $content = null ) {
		extract(shortcode_atts(array(
				'type' => 'round',
				'align' => '',
				'width' => 'auto'
		), $atts));

		return '<div class="framed_box '.$type.' '.$align.'" style="width:'.$width.'">
		<div class="framed_box_content">' .do_shortcode($content). '</div>
		</div>
		<div class="clearboth"></div>';
	}
	add_shortcode('thirtyjin_framed_box', 'thirtyjin_framed_box');
}


/* ======================================================= */
/*                         tooltip_shortcode               */
/* ======================================================= */
if (!function_exists('thirtyjin_tooltip')) {
function thirtyjin_tooltip ($atts, $content = null) {
	extract(shortcode_atts(array(
			"tip" => 'tip'
	), $atts));
	return '<span class="et-tooltip"><strong>'.do_shortcode($content).'</strong><span class="et-tooltip-box">'.$tip.'</span></span>';
}
add_shortcode('thirtyjin_tooltip', 'thirtyjin_tooltip');
}




/* ======================================================= */
/*                         dropcap                         */
/* ======================================================= */
if (!function_exists('thirtyjin_dropcap')) {
function thirtyjin_dropcap($atts, $content = null) {
	extract(shortcode_atts(array(
			"style" => '1',
			"color" => 'black'
	), $atts));
	return '<span class="dropcap'.$style.' '.$color.'">'.do_shortcode($content).'</span>';
}
add_shortcode('thirtyjin_dropcap', 'thirtyjin_dropcap');
}


/* ======================================================= */
/*                         image                           */
/* ======================================================= */

if (!function_exists('thirtyjin_image')) {
	function thirtyjin_image( $atts, $content = null ) {
		extract(shortcode_atts(array(
			"size" => 'small',
			"url" => '',
			"icon" => 'zoom',
			"lightbox" => 'on',
			"align" => 'alignleft',
			"title" => '',
			"width" => '',
			"height" => ''
	), $atts));
		
		if($lightbox == 'on') {
			$lightbox_open = 'lightbox';
		}elseif ($lightbox =='off') {
			$lightbox_open = '';
		}
		
		if(!$url) {
			$url_no = 'image_no_link';
		}else {
			$url_no = '';
		}
		
		if($title) {
			$image_title = '<a class="image_caption_title" href="'.$url.'" >'.$title.'</a>';
		}else {
			$image_title = '';
		}

		$output = '';
		$output .= '<div class="image_style '.$align.'">';
		$output .= '<div class="image_frame" style="width: '.$width.'; height: '.$height.';">';
		$output .= '<a class="image_size_'.$size.' '.$url_no.' image_icon_'.$icon.'" title="'.$title.'" href="'.$url.'" rel="'.$lightbox_open.'">';
		$output .= '<span class="image_overlay"></span>';
		$output .= '<img width="'.$width.'" height="'.$height.'" src="'.do_shortcode($content).'">';
		$output .= '</a></div>'.$image_title.'</div>';

		return $output;
	}
	add_shortcode( 'thirtyjin_image', 'thirtyjin_image' );
}


/* ======================================================= */
/*               thirtyjin googlemap                       */
/* ======================================================= */

if (!function_exists('thirtyjin_googlemap')) {

function thirtyjin_googlemap ($atts, $content = null) {
	extract(shortcode_atts(array(
			"width" => '640',
			"height" => '480',
			"src" => ''
	), $atts));
	return '<iframe width="'.$width.'" height="'.$height.'" src="'.$src.'&output=embed" ></iframe>';
}
add_shortcode("thirtyjin_googlemap", "thirtyjin_googlemap");
}




/* ======================================================= */
/*               thirtyjin pdf                       */
/* ======================================================= */

if (!function_exists('thirtyjin_pdf')) {
	function thirtyjin_pdf($attr, $url) {
		extract(shortcode_atts(array(
				'width' => '640',
				'height' => '960'
		), $attr));
		return '<iframe src="http://docs.google.com/viewer?url=' . $url . '&embedded=true" style="width:' .$width. '; height:' .$height. ';">Your browser does not support iframes</iframe>';
	}
	add_shortcode('thirtyjin_pdf', 'thirtyjin_pdf');
}







?>