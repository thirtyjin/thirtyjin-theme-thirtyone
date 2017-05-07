<?php

error_reporting(E_ALL & ~E_NOTICE);

/* Step 2 Registering the New Type */
/* Thumbnail & Featured Image Support */


/* Creating a New Post Type */

add_action('init', 'portfolio_register');  

function portfolio_register() {  
	
	
	$labels = array(
			'name' => __('Portfolio', 'thirtyone' ),
			'singular_name' => __('Portfolio Item', 'thirtyone' ),
			'add_new' => __('Add New', 'thirtyone' ),
			'add_new_item' => __('Add New Portfolio Item', 'thirtyone' ),
			'edit_item' => __('Edit Portfolio Item', 'thirtyone' ),
			'new_item' => __('New Portfolio Item', 'thirtyone' ),
			'view_item' => __('View Portfolio Item', 'thirtyone' ),
			'search_items' => __('Search Portfolio', 'thirtyone' ),
			'not_found' => __( 'No Portfolio found', 'thirtyone' ),
			'not_found_in_trash' => __( 'No Portfolio found in Trash', 'thirtyone' )
	);
	
    $args = array(  
        'labels' => $labels,  
    	'label' => __( 'Portfolio', 'thirtyone' ),
    	//'menu_icon' => get_template_directory_uri() .'/inc/images/portfolio_icon.png',
    	'menu_icon' => '',
    	'menu_position' => '',
        'singular_label' => __('portfolio_project', 'thirtyone'),  
        'public' => true,  
        'show_ui' => true,  
    	'show_in_nav_menus' => true,
    	'show_in_menu' => true,
        'capability_type' => 'post',  
        'hierarchical' => false,  
    	//'has_archive' => true,
    	//'rewrite' =>true,
    	'has_archive' => 'portfolio', // The archive slug ; Default: false ;
    	'rewrite' => array( 'slug' => 'portfolio', 'with_front' => false ),
    	'supports' => array('title', 'editor', 'thumbnail', 'comments', 'excerpt'),
    	'taxonomies' => array('post_tag') // this is IMPORTANT
       );  
  
    register_post_type( 'portfolio' , $args );  
}  


/* Adding a Custom Taxonomy */
register_taxonomy(
		//'portfolio-type', 
		'project-type', 
		array('portfolio'), 
		array(
			'public' => true,
			'hierarchical' => true, 
			'label' => __('Portfolio Types', 'thirtyone' ),
			"labels" => array(
					'name' => __('Portfolio Types', 'thirtyone' ),
					'singular_name' => __('Portfolio Type', 'thirtyone' ),
			),
			'singular_label' => __('Portfolio Type', 'thirtyone' ),
			'show_in_nav_menus' => true,
			'rewrite' => true
				)
		);



/* Step 3 Customizing Admin Columns */

add_filter("manage_edit-portfolio_columns", "project_edit_columns");   
  
function project_edit_columns($columns){  
        $columns = array(  
            "cb" 			=> "<input type=\"checkbox\" />",  
            "title" 		=> __( 'Project', 'thirtyone' ),  
        	"thumbnail" 	=> __( 'Thumbnail', 'thirtyone' ),  
            "description" 	=> __( 'Description', 'thirtyone' ),  
            "type" 			=> __( 'Type of Project', 'thirtyone' ),
        );  
  
        return $columns;  
}  

add_action("manage_portfolio_posts_custom_column",  "project_custom_columns"); 
  
function project_custom_columns($column){  
        global $post;  
        switch ($column)  
        {  
            case "description":  
                the_excerpt();  
                break;  
            case "type":  
                echo get_the_term_list($post->ID, 'project-type', '', ',','');  
                break;  
            case "thumbnail":
                echo the_post_thumbnail('thumbnail');
                break;
        }  
}  




//http://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts

function set_admin_portfolio_posts_per_page( $query ) {

	if ( is_admin() && is_post_type_archive( 'portfolio' ) ) {
		$query->set( 'posts_per_page', 6 );
		return;
	}

}
add_action( 'pre_get_posts',  'set_admin_portfolio_posts_per_page'  );




/**
 * Retrieve a post's terms as a list text with specified format.
 *
 * @since 2.5.0
 * Referenced via get_the_term_list () in category-template.php 
 * @param int $id Post ID.
 * @param string $taxonomy Taxonomy name.
 * @param string $before Optional. Before list.
 * @param string $sep Optional. Separate items using this.
 * @param string $after Optional. After list.
 * @return string
 */

function get_the_term_list_text( $id = 0, $taxonomy, $before = '', $sep = '', $after = '' ) {
	$terms = get_the_terms( $id, $taxonomy );

	if ( is_wp_error( $terms ) )
		return $terms;

	if ( empty( $terms ) )
		return false;

	foreach ( $terms as $term ) {
		$term_links[] = $term->name ;
	}

	$term_links = apply_filters( "term_links-$taxonomy", $term_links );

	return $before . join( $sep, $term_links ) . $after;
}










?>