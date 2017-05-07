<?php
/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'custom_post_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types
 * in demo-theme-options.php.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function custom_post_meta_boxes() {
  

  
  
  $thirtyone_post_format_links_meta_box = array(
  		'id'          => 'thirtyone_post_format_links_meta_box',
  		'title'       => __( 'Links Settings', 'thirtyone' ),
  		'desc'        => __( 'Input your link', 'thirtyone' ),
  		'pages'       => array( 'post' ),
  		'context'     => 'normal',
  		'priority'    => 'high',
  		'fields'      => array(
  				
  				array(
  						'id'          => 'thirtyone_post_format_link_url',
  						'label'       => __( 'The link', 'thirtyone' ),
  						'desc'        => __( 'Insert your link URL, e.g. http://www.thirtyjin.com.', 'thirtyone' ),
  						'std'         => '',
  						'type'        => 'text',
  						'rows'        => '',
  						'post_type'   => '',
  						'taxonomy'    => '',
  						'class'       => ''
  				)
  		)
  );
  
  ot_register_meta_box( $thirtyone_post_format_links_meta_box );
  
  
  
  
  
  
  $thirtyone_post_format_quote_meta_box = array(
  		'id'          => 'thirtyone_post_format_quote_meta_box',
  		'title'       => __( 'Quote Settings', 'thirtyone' ),
  		'desc'        => __( 'Input your quote', 'thirtyone' ),
  		'pages'       => array( 'post' ),
  		'context'     => 'normal',
  		'priority'    => 'high',
  		'fields'      => array(
  
  				array(
  						'id'          => 'thirtyone_post_format_quote',
  						'label'       => __( 'The quote', 'thirtyone' ),
  						'desc'        => __( 'Input your quote.', 'thirtyone' ),
  						'std'         => '',
  						'type'        => 'textarea-simple',
  						'rows'        => '',
  						'post_type'   => '',
  						'taxonomy'    => '',
  						'class'       => ''
  				)
  		)
  );
  
  ot_register_meta_box( $thirtyone_post_format_quote_meta_box );
  
  
  
  $thirtyone_post_format_audio_meta_box = array(
  		'id'          => 'thirtyone_post_format_audio_meta_box',
  		'title'       => __( 'Audio Settings', 'thirtyone' ),
  		'desc'        => __( 'These settings enable you to embed audio into your posts. You must provide both .mp3 and .agg/.oga file formats in order for self hosted audio to function accross all browsers.', 'thirtyone' ),
  		'pages'       => array( 'post' ),
  		'context'     => 'normal',
  		'priority'    => 'high',
  		'fields'      => array(
  
  
  				array(
  						'id'          => 'thirtyone_post_format_audio_mp3_url',
  						'label'       => __( 'MP3 File URL', 'thirtyone' ),
  						'desc'        => __( 'The URL to the .mp3 audio file.', 'thirtyone' ),
  						'std'         => '',
  						'type'        => 'upload',
  						'rows'        => '',
  						'post_type'   => '',
  						'taxonomy'    => '',
  						'class'       => ''
  				),
  				array(
  						'id'          => 'thirtyone_post_format_audio_oga_url',
  						'label'       => __( 'OGA File URL', 'thirtyone' ),
  						'desc'        => __( 'The URL to the .oga, .ogg audio file.', 'thirtyone' ),
  						'std'         => '',
  						'type'        => 'upload',
  						'rows'        => '',
  						'post_type'   => '',
  						'taxonomy'    => '',
  						'class'       => ''
  				),
  				array(
  						'id'          => 'thirtyone_post_format_audio_poster_image',
  						'label'       => __( 'Audio Poster Image', 'thirtyone' ),
  						'desc'        => __( 'The preview image for this audio track.', 'thirtyone' ),
  						'std'         => '',
  						'type'        => 'upload',
  						'rows'        => '',
  						'post_type'   => '',
  						'taxonomy'    => '',
  						'class'       => ''
  				),
  				array(
  						'id'          => 'thirtyone_post_format_audio_poster_image_height',
  						'label'       => __( 'Audio Poster Image Height', 'thirtyone' ),
  						'desc'        => __( 'The height of the poster image.', 'thirtyone' ),
  						'std'         => '',
  						'type'        => 'text',
  						'rows'        => '',
  						'post_type'   => '',
  						'taxonomy'    => '',
  						'class'       => ''
  				)
  		)
  );
  
  /**
   * Register our meta boxes using the
   * ot_register_meta_box() function.
   */
  ot_register_meta_box( $thirtyone_post_format_audio_meta_box );
  

  
  
  
  
  $thirtyone_post_format_video_meta_box = array(
  		'id'          => 'thirtyone_post_format_video_meta_box',
  		'title'       => __( 'video Settings', 'thirtyone' ),
  		'desc'        => __( 'These settings enable you to embed video into your posts.', 'thirtyone' ),
  		'pages'       => array( 'post' ),
  		'context'     => 'normal',
  		'priority'    => 'high',
  		'fields'      => array(
  
  
  				array(
  						'id'          => 'thirtyone_post_format_video_m4v_url',
  						'label'       => __( 'M4V File URL', 'thirtyone' ),
  						'desc'        => __( 'The URL to the .m4v video file.', 'thirtyone' ),
  						'std'         => '',
  						'type'        => 'upload',
  						'rows'        => '',
  						'post_type'   => '',
  						'taxonomy'    => '',
  						'class'       => ''
  				),
  				array(
  						'id'          => 'thirtyone_post_format_video_ogv_url',
  						'label'       => __( 'OGV File URL', 'thirtyone' ),
  						'desc'        => __( 'The URL to the .ogv video file.', 'thirtyone' ),
  						'std'         => '',
  						'type'        => 'upload',
  						'rows'        => '',
  						'post_type'   => '',
  						'taxonomy'    => '',
  						'class'       => ''
  				),
  				array(
  						'id'          => 'thirtyone_post_format_video_poster_image',
  						'label'       => __( 'Video Poster Image', 'thirtyone' ),
  						'desc'        => __( 'The preview image for this video.', 'thirtyone' ),
  						'std'         => '',
  						'type'        => 'upload',
  						'rows'        => '',
  						'post_type'   => '',
  						'taxonomy'    => '',
  						'class'       => ''
  				),
  				array(
  						'id'          => 'thirtyone_post_format_video_poster_image_height',
  						'label'       => __( 'Video Poster Image Height', 'thirtyone' ),
  						'desc'        => __( 'The height of the poster image.', 'thirtyone' ),
  						'std'         => '',
  						'type'        => 'text',
  						'rows'        => '',
  						'post_type'   => '',
  						'taxonomy'    => '',
  						'class'       => ''
  				),
  				array(
  						'id'          => 'thirtyone_post_format_video_embedded_code',
  						'label'       => __( 'Embedded Code', 'thirtyone' ),
  						'desc'        => __( 'If you are using something other than self hosted video such as Youtube or Vimeo, paste the embed code here. Width is best at 500px with any height. This field will override the above.', 'thirtyone' ),
  						'std'         => '',
  						'type'        => 'textarea-simple',
  						'rows'        => '',
  						'post_type'   => '',
  						'taxonomy'    => '',
  						'class'       => ''
  				)
  		)
  );
  
  /**
   * Register our meta boxes using the
   * ot_register_meta_box() function.
   */
  ot_register_meta_box( $thirtyone_post_format_video_meta_box );
  
  
  
  
}