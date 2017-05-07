<?php
/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'custom_portfolio_meta_boxes' );

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
function custom_portfolio_meta_boxes() {
  

  
  
  /**
   * Create a custom meta boxes array that we pass to
   * the OptionTree Meta Box API Class.
   */
  $thirtyone_portfolio_meta_box = array(
  		'id'          => 'thirtyone_portfolio_meta_box',
  		'title'       => __( 'Portfolio Meta Box', 'thirtyone' ),
  		'desc'        => __( 'Portfolio Meta Box Optionds', 'thirtyone' ),
  		'pages'       => array( 'portfolio' ),
  		'context'     => 'normal',
  		'priority'    => 'high',
  		'fields'      => array(
  
  				
  				array(
  						'id'          => 'thirtyone_portfolio_time',
  						'label'       => __( 'Time', 'thirtyone' ),
  						'desc'        => __( 'Project time period.', 'thirtyone' ),
  						'std'         => '',
  						'type'        => 'text',
  						'rows'        => '',
  						'post_type'   => '',
  						'taxonomy'    => '',
  						'class'       => 'thirtyone_portfolio_time'
  				),
  				array(
  						'id'          => 'thirtyone_portfolio_role',
  						'label'       => __( 'Role', 'thirtyone' ),
  						'desc'        => __( 'The Role in the project.', 'thirtyone' ),
  						'std'         => '',
  						'type'        => 'text',
  						'rows'        => '',
  						'post_type'   => '',
  						'taxonomy'    => '',
  						'class'       => 'thirtyone_portfolio_role'
  				),
  				array(
  						'id'          => 'thirtyone_portfolio_client',
  						'label'       => __( 'Client', 'thirtyone' ),
  						'desc'        => __( 'Project client.', 'thirtyone' ),
  						'std'         => '',
  						'type'        => 'text',
  						'rows'        => '',
  						'post_type'   => '',
  						'taxonomy'    => '',
  						'class'       => 'thirtyone_portfolio_client'
  				)
  			)
  	);

  
	/**
	 * Register our meta boxes using the
	 * ot_register_meta_box() function.
	 */
	ot_register_meta_box( $thirtyone_portfolio_meta_box );

  
}