<?php
/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'custom_slideshow_meta_boxes' );

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
function custom_slideshow_meta_boxes() {
  

  
  
  /**
   * Create a custom meta boxes array that we pass to
   * the OptionTree Meta Box API Class.
   */
  $thirtyone_slideshow_meta_box = array(
  		'id'          => 'thirtyone_slideshow_meta_box',
  		'title'       => __( 'slideshow Meta Box', 'thirtyone' ),
  		'desc'        => __( 'slideshow Meta Box options', 'thirtyone' ),
  		'pages'       => array( 'slideshow' ),
  		'context'     => 'normal',
  		'priority'    => 'high',
  		'fields'      => array(
  
  				
  				array(
  						'id'          => 'thirtyone_slideshow_url',
  						'label'       => __( 'The link URL', 'thirtyone' ),
  						'desc'        => __( 'Link URL.', 'thirtyone' ),
  						'std'         => '',
  						'type'        => 'text',
  						'rows'        => '',
  						'post_type'   => '',
  						'taxonomy'    => '',
  						'class'       => 'thirtyone_slideshow_url'
  				),
  				array(
  						'id'          => 'thirtyone_slideshow_open_target',
  						'label'       => __( 'URL open in new window ?', 'thirtyone' ),
  						'desc'        => __( 'URL open in new window ?', 'thirtyone' ),
  						'std'         => '',
  						'type'        => 'checkbox',
  						'rows'        => '',
  						'post_type'   => '',
  						'taxonomy'    => '',
  						'class'       => 'thirtyone_slideshow_open_target',
				        'choices'     => array( 
						          array(
						            'value'       => 'new',
						            'label'       => __( 'URL open in new window ?', 'thirtyone' ),
						            'src'         => ''
						          )
				        	),
  				)
  			)
  	);

  
	/**
	 * Register our meta boxes using the
	 * ot_register_meta_box() function.
	 */
	ot_register_meta_box( $thirtyone_slideshow_meta_box );

  
  
}