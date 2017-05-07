<?php
/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'custom_seo_meta_boxes' );

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
function custom_seo_meta_boxes() {
  
	
  
  $thirtyone_seo_meta_box = array(
  		'id'          => 'thirtyone_seo_meta_box',
  		'title'       => __( 'SEO Settings', 'thirtyone' ),
  		'desc'        => __( 'These settings enable you to customize the SEO settings for this post/page/portfolio.', 'thirtyone' ),
  		'pages'       => array( 'post', 'page', 'portfolio', 'books', 'freebies' ),
  		'context'     => 'normal',
  		'priority'    => 'high',
  		'fields'      => array(
  
  				
			      array(
			        'id'          => 'thirtyone_seo_title',
			        'label'       => __( 'Title', 'thirtyone' ),
			        'desc'        => __( 'Most search engines use a maximum of 60 chars for the title.', 'thirtyone' ),
			        'std'         => '',
			        'type'        => 'text',
			        'rows'        => '',
			        'post_type'   => '',
			        'taxonomy'    => '',
			        'class'       => ''
			      ),
			      array(
			        'id'          => 'thirtyone_seo_description',
			        'label'       => __( 'Description', 'thirtyone' ),
			        'desc'        => __( 'Most search engines use a maximum of 160 chars for the description.', 'thirtyone' ),
			        'std'         => '',
			        'type'        => 'text',
			        'rows'        => '',
			        'post_type'   => '',
			        'taxonomy'    => '',
			        'class'       => ''
			      ),
			      array(
			        'id'          => 'thirtyone_seo_keywords',
			        'label'       => __( 'Keywords', 'thirtyone' ),
			        'desc'        => __( 'A comma separated list of keywords.', 'thirtyone' ),
			        'std'         => '',
			        'type'        => 'text',
			        'rows'        => '',
			        'post_type'   => '',
			        'taxonomy'    => '',
			        'class'       => ''
			      ),
  		)
  );
  
  /**
   * Register our meta boxes using the
   * ot_register_meta_box() function.
   */
  ot_register_meta_box( $thirtyone_seo_meta_box );

  
 
  
  
  
}