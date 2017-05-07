<?php

/* Step 2 Registering the New Type */
/* Thumbnail & Featured Image Support */


/* Creating a New Post Type */

add_action('init', 'books_register');  

function books_register() {  
	
	
	$labels = array(
			'name' => __('books', 'thirtyone' ),
			'singular_name' => __('books Item', 'thirtyone' ),
			'add_new' => __('Add New', 'thirtyone' ),
			'add_new_item' => __('Add New books Item', 'thirtyone' ),
			'edit_item' => __('Edit books Item', 'thirtyone' ),
			'new_item' => __('New books Item', 'thirtyone' ),
			'view_item' => __('View books Item', 'thirtyone' ),
			'search_items' => __('Search books', 'thirtyone' ),
			'not_found' => __( 'No books found', 'thirtyone' ),
			'not_found_in_trash' => __( 'No books found in Trash', 'thirtyone' )
	);
	
    $args = array(  
        'labels' => $labels,  
    	'label' => __( 'books', 'thirtyone' ),
    	//'menu_icon' => get_template_directory_uri() .'/inc/images/books_icon.png',
    	'menu_icon' => '',
    	'menu_position' => '',
        'singular_label' => __('books_project', 'thirtyone'),  
        'public' => true,  
    	'description'=> __('Recommend good books', 'thirtyone'),  
    	'exclude_from_search' => true,  
        'show_ui' => true,  
    	'show_in_nav_menus' => true,
    	'show_in_menu' => true,
    	'show_in_admin_bar' => true,
        'capability_type' => 'post',  
        'hierarchical' => false,  
    	'map_meta_cap' => true,
    	'has_archive' => 'books', // The archive slug
    	'rewrite' => array( 'slug' => 'books', 'with_front' => false ),
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'trackbacks', 'revisions', 'comments', 'excerpt'),
    	'taxonomies' => array('post_tag') // this is IMPORTANT
       );  
  
    register_post_type( 'books' , $args );  
}  


/* Adding a Custom Taxonomy */
register_taxonomy(
		"books-type", 
		array("books"), 
		array(
			"public" => true,
			"hierarchical" => true, 
			"label" => __('books Types', 'thirtyone' ),
			"labels" => array(
					'name' => __('books Types', 'thirtyone' ),
					'singular_name' => __('books Type', 'thirtyone' ),
			),
			"singular_label" => __('books Type', 'thirtyone' ),
			"show_in_nav_menus" => true,
			"rewrite" => true
				)
		);



/* Step 3 Customizing Admin Columns */

add_filter("manage_edit-books_columns", "books_edit_columns");   
  
function books_edit_columns($columns){  
        $columns = array(  
            "cb" 			=> "<input type=\"checkbox\" />",  
            "title" 		=> __( 'Project', 'thirtyone' ),  
        	"thumbnail" 	=> __( 'Thumbnail', 'thirtyone' ),  
            "description" 	=> __( 'Description', 'thirtyone' ),  
            "type" 			=> __( 'Type of Project', 'thirtyone' ),
        );   
  
        return $columns;  
}  

add_action("manage_books_posts_custom_column",  "books_custom_columns"); 
  
function books_custom_columns($column){  
        global $post;  
        switch ($column)  
        {  
            case "description":  
                the_excerpt();  
                break;  
            case "type":  
                echo get_the_term_list($post->ID, 'books-type', '', ',','');  
                break;  
            case "thumbnail":
                echo the_post_thumbnail('thumbnail');
                break;
        }  
}  




//http://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts

function set_admin_books_posts_per_page( $query ) {

	if ( is_admin() && is_post_type_archive( 'books' ) ) {
		$query->set( 'posts_per_page', 8 );
		return;
	}

}
add_action( 'pre_get_posts',  'set_admin_books_posts_per_page'  );




?>