<?php

/* Step 2 Registering the New Type */
/* Thumbnail & Featured Image Support */


/* Creating a New Post Type */

add_action('init', 'freebies_register');  

function freebies_register() {  
	
	
	$labels = array(
			'name' => __('Freebies', 'thirtyone' ),
			'singular_name' => __('Freebies Item', 'thirtyone' ),
			'add_new' => __('Add New', 'thirtyone' ),
			'add_new_item' => __('Add New Freebies Item', 'thirtyone' ),
			'edit_item' => __('Edit Freebies Item', 'thirtyone' ),
			'new_item' => __('New Freebies Item', 'thirtyone' ),
			'view_item' => __('View Freebies Item', 'thirtyone' ),
			'search_items' => __('Search Freebies', 'thirtyone' ),
			'not_found' => __( 'No Freebies found', 'thirtyone' ),
			'not_found_in_trash' => __( 'No Freebies found in Trash', 'thirtyone' )
	);
	
    $args = array(  
        'labels' => $labels,  
    	'label' => __( 'Freebies', 'thirtyone' ),
    	//'menu_icon' => get_template_directory_uri() .'/inc/images/freebies_icon.png',
    	'menu_icon' => '',
    	'menu_position' => '',
        'singular_label' => __('freebies_project', 'thirtyone'),  
        'public' => true,  
        'show_ui' => true,  
    	'show_in_nav_menus' => true,
    	'show_in_menu' => true,
        'capability_type' => 'post',  
        'hierarchical' => false,  
        //'rewrite' => true,  
    	//'has_archive' => true,
    	'has_archive' => 'freebies', // The archive slug
    	'rewrite' => array( 'slug' => 'freebies', 'with_front' => false ),
        'supports' => array('title', 'editor', 'thumbnail', 'comments', 'excerpt'),
    	'taxonomies' => array('post_tag') // this is IMPORTANT  
       );  
  
    register_post_type( 'freebies' , $args );  
}  


/* Adding a Custom Taxonomy */




register_taxonomy (
		"freebies-type", 
		array("freebies"), 
		array(
			"public" => true,
			"hierarchical" => true, 
			"label" => __('Freebies Types', 'thirtyone' ),
			"labels" => array(
					'name' => __('Freebies Types', 'thirtyone' ),
					'singular_name' => __('Freebies Type', 'thirtyone' ),
					'search_items'      => __( 'Search Freebies' , 'thirtyone' ),
					'all_items'         => __( 'All Freebies' , 'thirtyone' ),
					'parent_item'       => __( 'Parent Freebie' , 'thirtyone' ),
					'parent_item_colon' => __( 'Parent Freebie:', 'thirtyone'  ),
					'edit_item'         => __( 'Edit Freebie', 'thirtyone'  ),
					'update_item'       => __( 'Update Freebie', 'thirtyone'  ),
					'add_new_item'      => __( 'Add New Freebie' , 'thirtyone' ),
					'new_item_name'     => __( 'New Freebie Name', 'thirtyone'  ),
					'menu_name'         => __( 'Freebie' ),
			),
			"singular_label" => __('Freebies Type', 'thirtyone' ),
			"show_in_nav_menus" => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			"rewrite" 			=> true
				)
		);



/* Step 3 Customizing Admin Columns */

add_filter("manage_edit-freebies_columns", "freebies_edit_columns");   
  
function freebies_edit_columns($columns){  
        $columns = array(  
            "cb" 			=> "<input type=\"checkbox\" />",  
            "title" 		=> __( 'Project', 'thirtyone' ),  
        	"thumbnail" 	=> __( 'Thumbnail', 'thirtyone' ),  
            "description" 	=> __( 'Description', 'thirtyone' ),  
            "type" 			=> __( 'Type of Project', 'thirtyone' ),
        );   
  
        return $columns;  
}  

add_action("manage_freebies_posts_custom_column",  "freebies_custom_columns"); 
  
function freebies_custom_columns($column){  
        global $post;  
        switch ($column)  
        {  
            case "description":  
                the_excerpt();  
                break;  
            case "type":  
                echo get_the_term_list($post->ID, 'freebies-type', '', ',','');  
                break;  
            case "thumbnail":
                echo the_post_thumbnail('thumbnail');
                break;
        }  
}  




//http://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts

function set_admin_freebies_posts_per_page( $query ) {

	if ( is_admin() && is_post_type_archive( 'freebies' ) ) {
		$query->set( 'posts_per_page', 8 );
		return;
	}

}
add_action( 'pre_get_posts',  'set_admin_freebies_posts_per_page'  );


?>