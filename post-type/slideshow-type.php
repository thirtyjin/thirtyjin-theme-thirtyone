<?php

/*  Being custom post types */
add_action('init', 'slideshow_register');

function slideshow_register() {

	$labels = array(
			'name' => __('Slideshow', 'thirtyone' ),
			'singular_name' => __('Slideshow Item', 'thirtyone' ),
			'add_new' => __('Add New',  'thirtyone' ),
			'add_new_item' => __('Add New Slideshow Item', 'thirtyone' ),
			'edit_item' => __('Edit Slideshow Item', 'thirtyone' ),
			'new_item' => __('New Slideshow Item', 'thirtyone' ),
			'view_item' => __('View Slideshow Item', 'thirtyone' ),
			'search_items' => __('Search Slideshow', 'thirtyone' ),
			'not_found' =>  __('Nothing found', 'thirtyone' ),
			'not_found_in_trash' => __('Nothing found in Trash', 'thirtyone' ),
			'parent_item_colon' => ''
	);

	$args = array(
			'labels' => $labels,
	    	//'menu_icon' => get_template_directory_uri() .'/inc/images/slideshow_icon.png',
			'menu_icon' => '',
    		'menu_position' => '',
	        'singular_label' => __('slideshow', 'thirtyone' ), 
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array('title', 'thumbnail', 'excerpt'),
			'rewrite' => array('slug' => 'slideshow', 'with_front' => FALSE)
	);

	register_post_type( 'slideshow' , $args );



	
	add_filter("manage_edit-slideshow_columns", "slideshow_edit_columns");
	
	function slideshow_edit_columns($columns){
		$columns = array(
				"cb" => "<input type=\"checkbox\" />",
				"title" => "Slideshow",
				"thumbnail" => "Slideshow image",
            	"description" => "Description", 
		);
	
		return $columns;
	}
	
	
	add_action("manage_slideshow_posts_custom_column", "slideshow_custom_columns");
	
	function slideshow_custom_columns($column){
		global $post;
		switch ($column)
		{
            case "description":  
                the_excerpt();  
                break; 
			case "thumbnail":
				echo the_post_thumbnail('feature_small');
				break;
		}
	}
	
	
	
	
	

}  // END. slideshow_register


?>