<?php
/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'custom_page_meta_boxes' );

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
function custom_page_meta_boxes() {
  
  $thirtyone_page_settings = array(
  		'id'          => '$thirtyone_page_settings',
  		'title'       => __( 'page options', 'thirtyone' ),
  		'desc'        => __( 'Page description text', 'thirtyone' ),
  		'pages'       => array( 'page' ),
  		'context'     => 'normal',
  		'priority'    => 'high',
  		'fields'      => array(
  				
          array(
              'id'          => 'thirtyone_page_title_meta_box',
              'label'       => 'Page Title',
              'desc'        => 'The title display on the page header!',
              'std'         => '',
              'type'        => 'text',
              'rows'        => '',
              'post_type'   => '',
              'taxonomy'    => '',
              'class'       => ''
          ),
  				array(
  						'id'          => 'thirtyone_page_intro_meta_box',
  						'label'       => 'Page Description',
  						'desc'        => 'The Description display on the page header!',
  						'std'         => '',
  						'type'        => 'text',
  						'rows'        => '',
  						'post_type'   => '',
  						'taxonomy'    => '',
  						'class'       => ''
  				)
  		)
  );
  
  ot_register_meta_box( $thirtyone_page_settings );
  
  
}