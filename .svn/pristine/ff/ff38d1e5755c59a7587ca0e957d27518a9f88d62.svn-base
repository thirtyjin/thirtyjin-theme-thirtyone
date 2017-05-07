<?php

/*-----------------------------------------------------------------------------------

 	Plugin Name: Custom Orangebox Widget
 	Plugin URI: http://www.themethirtyjin.com
 	Description: A widget that displays your latest orangebox
 	Version: 1.0
 	Author: Themethirtyjin
 	Author URI: http://www.themethirtyjin.com
 
-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*  Create the widget
/*-----------------------------------------------------------------------------------*/
add_action( 'widgets_init', 'thirtyjin_orangebox_widgets' );

function thirtyjin_orangebox_widgets() {
	register_widget( 'thirtyjin_orangebox_Widget' );
}

/*-----------------------------------------------------------------------------------*/
/*  Widget class
/*-----------------------------------------------------------------------------------*/
class thirtyjin_orangebox_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
function thirtyjin_orangebox_Widget() {

	/* Widget settings --------------------------------------------------------------*/
	$widget_ops = array(
		'classname' => 'thirtyjin_orangebox_widget',
		'description' => __('Displays your YouTube or Vimeo orangebox.', 'thirtyone')
	);

    /* Widget control settings ------------------------------------------------------*/
	$control_ops = array(
		'width' => 300,
		'height' => 350,
		'id_base' => 'thirtyjin_orangebox_widget'
	);

    /* Create the widget ------------------------------------------------------------*/
	$this->WP_Widget( 'thirtyjin_orangebox_widget', __('Thirtyone Orangebox Widget', 'thirtyone'), $widget_ops, $control_ops );
	
}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
function widget( $args, $instance ) {
	extract( $args );

	/* Our variables from the widget settings ---------------------------------------*/
	$title = apply_filters('widget_title', $instance['title'] );
	$html = $instance['html'];
	$desc = $instance['desc'];

	/* Display widget ---------------------------------------------------------------*/
	echo $before_widget;
	echo '<div class="orangebox">';

	if ( $title ) { echo $before_title . $title . $after_title; }

	if($html) {
		echo '<div class="orangebox_content">';
	    echo $html;
		echo '</div>';
	}
		
	if($desc) {
		echo '<p class="orangebox_desc">' . $desc . '</p>';
    }
	echo '</div>';
	
	echo $after_widget;
}


/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	/* Strip tags to remove HTML (important for text inputs) ------------------------*/
	$instance['title'] = strip_tags( $new_instance['title'] );
	
	/* Stripslashes for html inputs -------------------------------------------------*/
	$instance['desc'] = stripslashes( $new_instance['desc']);
	$instance['html'] = stripslashes( $new_instance['html']);

	return $instance;
}


/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
function form( $instance ) {

	/* Set up some default widget settings ------------------------------------------*/
	$defaults = array(
		'title' => 'My orangebox',
		'html' => stripslashes( '<h1>Hello World !</h1>'),
		'desc' => 'This is my latest orangebox, pretty cool huh!',
	);
	
	$instance = wp_parse_args( (array) $instance, $defaults ); 
	
	/* Build our form ---------------------------------------------------------------*/
	?>

	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'thirtyjin') ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'html' ); ?>"><?php _e('html Code:', 'thirtyjin') ?></label>
		<textarea style="height:200px;" class="widefat" id="<?php echo $this->get_field_id( 'html' ); ?>" name="<?php echo $this->get_field_name( 'html' ); ?>"><?php echo stripslashes(htmlspecialchars(( $instance['html'] ), ENT_QUOTES)); ?></textarea>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e('Short Description:', 'thirtyjin') ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['desc'] ), ENT_QUOTES)); ?>" />
	</p>
		
	<?php
	}
}
?>