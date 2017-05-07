<?php

error_reporting(E_ALL & ~E_NOTICE);

/**
 * Custom "download" custom type
 *
 * @link http://thirtyjin.com/
 */

add_action( 'init', 'thirtyjin_create_download_post_type' );

function thirtyjin_create_download_post_type() {
	
	$args = array(
					'labels' => array(
								'name' => __( 'Downloads' , 'thirtyone' ),
								'singular_name' => __( 'download' , 'thirtyone' ),
								'add_new' => __( 'Add New', 'thirtyone' ),
								'add_new_item' => __( 'Add New Download', 'thirtyone' ),
								'edit' => __( 'Edit', 'thirtyone' ),
								'edit_item' => __( 'Edit Download', 'thirtyone' ),
								'new_item' => __( 'New Download', 'thirtyone' ),
								'view' => __( 'View Download', 'thirtyone' ),
								'view_item' => __( 'View Download', 'thirtyone' ),
								'search_items' => __( 'Search Downloads', 'thirtyone' ),
								'not_found' => __( 'No downloads found', 'thirtyone' ),
								'not_found_in_trash' => __( 'No downloads found in Trash', 'thirtyone' ),
							),
					//'menu_icon' => get_template_directory_uri() .'/inc/images/download_icon.png',
					'menu_icon' => '',
    				'menu_position' => '',
					'description' => 'The latest downloads',
					'public' => true,
					'show_ui' => true,
					'exclude_from_search' => true,
					'supports' => array( 'title', 'thumbnail'),
					'has_archive' => 'downloads', // The archive slug
					'rewrite' => array( 'slug' => 'download', 'with_front' => false ), 
  );

  register_post_type( 'download', $args );
  
  
  
  /**
   * Custom "Download Categories" taxonomy
   */
  register_taxonomy( 
  		'download-categories', 
  		array( 'download' ),
		array(
				'public' => true,
				"label" => __('Download Categories', 'thirtyone' ),
				'labels' => array( 
						'name' => __('Download Categories', 'thirtyone' ), 
						'singular_name' => __('Download Category', 'thirtyone' ), 
						),
				'hierarchical' => true,
				'rewrite' => array( 'slug' => 'download-types' )
			 )
  );
  	
}


/* Customizing Admin Columns */

add_filter("manage_edit-download_columns", "download_edit_columns");

function download_edit_columns($columns){
	$columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" 		=> __( 'Project', 'thirtyone' ),  
        	"thumbnail" 	=> __( 'Thumbnail', 'thirtyone' ),  
            "description" 	=> __( 'Description', 'thirtyone' ),  
            "type" 			=> __( 'Type of Project', 'thirtyone' ),
        );  

	return $columns;
}


add_action("manage_download_posts_custom_column", "download_custom_columns");

function download_custom_columns($column){
	global $post;
	switch ($column)
	{
		case "type":
			echo get_the_term_list($post->ID, 'download-categories', '', ', ','');
			break;
		case "download_times":
			echo get_post_meta( $post->ID, 'download_count', true );
			break;
		case "thumbnail":
			echo the_post_thumbnail('feature_small');
			break;
	}
}







/**
 * Custom "Download" post type metabox
 */

/**
 * Adds the download meta box for the download post type
 */
function thirtyjin_meta_box_download() {
	add_meta_box( 
			'thirtyjin-meta-box-download', 
			'Download Settings', 
			'thirtyjin_meta_box_download_display', 
			'download', 
			'normal', 
			'high' );
}

add_action( 'add_meta_boxes', 'thirtyjin_meta_box_download' );



/**
 * Displays the download meta box
 */
function thirtyjin_meta_box_download_display( $object, $box ) {
	
	// Setup some default values
	$defaults = array( 
		'file' => '',
		'version' => '1.0',
		'postid' => '',
		// Add more!
	);

	// Get the post meta
	$download = get_post_meta( $object->ID, 'download', true );

	// Merge them
	$download = wp_parse_args( $download, $defaults );
?>

	<input type="hidden" name="thirtyjin-meta-box-download" value="<?php echo wp_create_nonce( basename( __FILE__ ) ); ?>" />

    <br />

    <table class="form-table">
		
        <thead><tr><th><span class="description">None of the fields are required</span></th></tr></thead>
        
        <tr>
            <th><label for="download-hide">Hide download</label></th>
            <td>
            	<?php $hide = get_post_meta( $object->ID, '_hide_download', true ); ?>
				<label><input type="checkbox" name="download-hide" id="download-hide" value="1" <?php checked( '1', $hide ); ?> />
				<span class="description">Check this if you don't want to show the download at the archive page</span></label>
            </td>
        </tr>

        <tr>
            <th><label for="download-file">File</label></th>
            <td>
                <input type="text" id="download-file" size="60" name="download-file" value="<?php echo esc_url( $download['file'] ); ?>" />
                <input type="button" id="upload-file-button"  class="button" value="Upload file" />
                <label for="download-file"><span class="description">Upload or link to download file</span></label>
            </td>
        </tr>
        
        <tr>
            <th><label for="download-version">Version</label></th>
            <td>
                <input type="text" id="download-version" name="download-version" value="<?php echo esc_attr( $download['version'] ); ?>" size="3" />
            </td>
        </tr>
        
        <tr>
            <th><label for="download-count">Download count</label></th>
            <td>
            	<?php $count = isset( $object->ID ) ? get_post_meta( $object->ID, 'download_count', true ) : 0; ?>
            	<input type="number" id="download-count" name="download-count" value="<?php echo absint( $count ); ?>" size="7" min="0" />
				<?php printf( '<p>This file has been downloaded <b>%d</b> times</p>', absint( $count ) ); ?>
            </td>
        </tr>

        <tr>
            <th><label for="download-postid">Post ID</label></th>
            <td>
            	<label><input type="text" id="download-postid" name="download-postid" value="<?php echo absint( $download['postid'] ); ?>" size="3" />
            	<span class="description">ID of the post which the download is associated with</span></label>
                <?php if ( !empty( $download['postid'] ) ) { ?>
                	<p>This download is associated with <a href="<?php echo get_permalink( $download['postid'] ); ?>"><?php echo get_the_title( $download['postid'] ); ?></a></p>
                <?php } ?>
            </td>
        </tr>

    </table>
    
<?php
}

/**
 * Save the download information
 */
function thirtyjin_meta_box_download_save( $post_id, $post ) {
	
	/* Verify that the post type supports the meta box and the nonce before preceding. */
	if ( ! isset( $_POST['thirtyjin-meta-box-download'] ) || ! wp_verify_nonce( $_POST['thirtyjin-meta-box-download'], basename( __FILE__ ) ) )
		return $post_id;

	/* Don't save them if... */
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) return;
	if ( defined( 'DOING_CRON' ) && DOING_CRON ) return;
	if ( $post->post_type == 'revision' ) return;
	
	/* Get the post type object. */
	$post_type = get_post_type_object( $post->post_type );

	/* Check if the current user has permission to edit the post. */
	if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;
	
	/**
	 * Add the download meta
	 */
	update_post_meta( $post_id, 'download', array( 
		'file' => esc_url_raw( $_POST['download-file'] ),
		'version' => strip_tags( $_POST['download-version'] ),
		'postid' => absint( $_POST['download-postid'] ),
		// Add your own if you've added fields
	) );

	// Seperate the download count and "hide" from the rest
	update_post_meta( $post_id, 'download_count', absint( $_POST['download-count'] ) ); 
	update_post_meta( $post_id, '_hide_download', ( $_POST['download-hide'] == 1 ? 1 : 0 ) ); 
}

add_action( 'save_post', 'thirtyjin_meta_box_download_save', 10, 2 );

/**
 * Adds the script needed for the download upload 
 */
function thirtyjin_download_metabox_script() {

	$screen = get_current_screen(); 

	// Make sure we are on the Download screen
	if ( isset( $screen->post_type ) && $screen->post_type == 'download' ) : ?>

	<script type="text/javascript">
		jQuery(document).ready(function($){
		
			var formfield;
				
			// Open upload window
			$('#upload-file-button').click(function() {
				formfield = $('#download-file').attr('name');
				tb_show( '','media-upload.php?type=image&amp;TB_iframe=true' );
				return false;
			});
				
			// user inserts file into post. only run custom if user started process using the above process
			// window.send_to_editor(html) is how wp would normally handle the received data
			window.original_send_to_editor = window.send_to_editor;
				
			window.send_to_editor = function(html) {
				if (formfield) {
						
					// Get the src value from the image
					fileurl = $('img', html).attr('src');
				
					// The upload is not an image! Get the href instead
					if( fileurl === undefined )
						fileurl = $(html).attr('href');
				
					// Insert it into the text box and close
					$('#download-file').val(fileurl);
						
					tb_remove();
				} else {
					window.original_send_to_editor(html);
				}
			};
		});
        </script>
       
	<?php
	endif;
}

add_action( 'admin_footer', 'thirtyjin_download_metabox_script' );

/**
 * Alternative to the inline script
 * Change path so it fits
 */
/*
thirtyjin_download_metabox_enqueue_script() {
	
	$screen = get_current_screen(); 
	
	if ( $screen->post_type == 'download' )
		wp_enqueue_script( 'thirtyjin-download-upload', get_stylesheet_directory_uri() . '/admin/upload.js', array( 'jquery' ), null, true ); 
}

add_action( 'admin_enqueue_scripts', 'thirtyjin_download_metabox_enqueue_script' );
*/

/**
 * Download counter function
 */
function thirtyjin_count_and_redirect() {

	// Return if not download
	if ( ! is_singular( 'download' ) )
		return;
	
	$download_id = get_queried_object_id();
	
	$postmeta = get_post_meta( $download_id, 'download', true );
	$count_meta = get_post_meta( $download_id, 'download_count', true );
	
	// Get the count
	$count = isset( $download_id ) ? $count_meta : 0;
	
	// Handle the redirect
	$redirect = isset( $download_id ) ? $postmeta['file'] : '';
	
	if ( ! empty( $redirect ) ) :
	
		wp_redirect( esc_url_raw( $redirect ), 301 );
		update_post_meta( $download_id, 'download_count', $count + 1 ); // Update the count
		exit;
	else :
		wp_redirect( home_url(), 302 );
		exit;
	endif;	
}

add_action( 'template_redirect', 'thirtyjin_count_and_redirect' );
add_action( 'admin_footer', 'thirtyjin_count_and_redirect' );





/**
 * Total Download counter function
 */
function get_total_downloads($before = '( ', $after = ' )',$echo = 1) {
	global $wpdb;
	$total_downloads = $wpdb->get_var("SELECT SUM(meta_value+0) FROM $wpdb->postmeta WHERE meta_key = 'download_count'");
	if ($echo) echo $before, $total_downloads, $after;
	else return $total_downloads;
}




?>