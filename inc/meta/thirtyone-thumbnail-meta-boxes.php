<?php
/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'custom_thumbnail_meta_boxes' );

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
function custom_thumbnail_meta_boxes() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  $thirtyone_thumbnail_meta_box = array(
    'id'          => 'thirtyone_thumbnail_meta_box',
    'title'       => __( 'Thumbnail Meta Box', 'thirtyone' ),
    'desc'        => __( 'Thumbnail Meta Box options', 'thirtyone' ),
    'pages'       => array( 'portfolio' , 'freebies' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
    	array(
              'label'       => __( 'Thumbnail-Four', 'theme-text-domain' ),
              'id'          => 'Thumb-220',
              'type'        => 'tab'
          ),	
      array(
      	'id'          => 'thumbnail_four',
      	'label'       => __( 'thumbnail-four', 'thirtyone' ),
      	'desc'        => __( '220px thumbnail image', 'thirtyone' ),
        	'std'         => '',
      	'type'        => 'upload',
      	'rows'        => '',
      	'post_type'   => 'post,page',
      	'taxonomy'    => '',
      	'class'       => 'thumbnail_four'
      ),
      array(
              'label'       => __( 'Thumbnail-three', 'theme-text-domain' ),
              'id'          => 'Thumb-300',
              'type'        => 'tab'
          ),  
      array(
      		'id'          => 'thumbnail_three',
      		'label'       => __( 'thumbnail-three', 'thirtyone' ),
      		'desc'        => __( '300px thumbnail image', 'thirtyone' ),
      		'std'         => '',
      		'type'        => 'upload',
      		'rows'        => '',
      		'post_type'   => 'post,page',
      		'taxonomy'    => '',
      		'class'       => 'thumbnail_three'
      ),
      array(
              'label'       => __( 'Thumbnail-Two', 'theme-text-domain' ),
              'id'          => 'Thumb-460',
              'type'        => 'tab'
          ),  
      array(
      		'id'          => 'thumbnail_two',
      		'label'       => __( 'thumbnail-two', 'thirtyone' ),
      		'desc'        => __( '460px thumbnail image', 'thirtyone' ),
      		'std'         => '',
      		'type'        => 'upload',
      		'rows'        => '',
      		'post_type'   => 'post,page',
      		'taxonomy'    => '',
      		'class'       => 'thumbnail_two'
      ),
      array(
              'label'       => __( 'Thumbnail-One', 'theme-text-domain' ),
              'id'          => 'Thumb-940',
              'type'        => 'tab'
          ),  
      array(
      		'id'          => 'thumbnail_one',
      		'label'       => __( 'thumbnail-one', 'thirtyone' ),
      		'desc'        => __( '940px full thumbnail image', 'thirtyone' ),
      		'std'         => '',
      		'type'        => 'upload',
      		'rows'        => '',
      		'post_type'   => 'post,page',
      		'taxonomy'    => '',
      		'class'       => 'thumbnail_one'
      )
  	)
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  ot_register_meta_box( $thirtyone_thumbnail_meta_box );
  
  
  
}