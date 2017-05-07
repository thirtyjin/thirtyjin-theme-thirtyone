<?php

/*-----------------------------------------------------------------------------------

 	Plugin Name: Newsletter Widget
 	Plugin URI: http://www.themethirtyjin.com
 	Description: A widget that displays your latest newsletter
 	Version: 1.0
 	Author: Themethirtyjin
 	Author URI: http://www.themethirtyjin.com
 
-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*  Create the widget
/*-----------------------------------------------------------------------------------*/
add_action( 'widgets_init', 'thirtyjin_newsletter_widgets' );

function thirtyjin_newsletter_widgets() {
	register_widget( 'thirtyjin_newsletter_Widget' );
}

/*-----------------------------------------------------------------------------------*/
/*  Widget class
/*-----------------------------------------------------------------------------------*/
class thirtyjin_newsletter_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
function thirtyjin_newsletter_Widget() {

	/* Widget settings --------------------------------------------------------------*/
	$widget_ops = array(
		'classname' => 'thirtyjin_newsletter_widget',
		'description' => __('Join our Newsletter!', 'thirtyone')
	);

    /* Widget control settings ------------------------------------------------------*/
	$control_ops = array(
		'width' => 300,
		'height' => 350,
		'id_base' => 'thirtyjin_newsletter_widget'
	);

    /* Create the widget ------------------------------------------------------------*/
	$this->WP_Widget( 'thirtyjin_newsletter_widget', __('Newsletter', 'thirtyone'), $widget_ops, $control_ops );
	
}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
function widget( $args, $instance ) {
	extract( $args );

	/* Our variables from the widget settings ---------------------------------------*/
	$title = apply_filters('widget_title', $instance['title'] );
	$desc = $instance['desc'];

	/* Display widget ---------------------------------------------------------------*/
	echo $before_widget;

	if ( $title ) { echo $before_title . $title . $after_title; }
	
	?>
	
	<div class="newsletter">
		<form style="text-align:left;" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=thirtyjin', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
		<div class="joinus"><?php echo $desc ; ?></div>
		<div class="email">
		<input type="text"  name="email" value="your@email.com" onfocus=" if(this.value=='your@email.com')this.value='';" onblur="if(this.value=='')this.value='your@email.com';"/>
		</div>
		<input type="hidden" value="thirtyjin" name="uri"/>
		<input type="hidden" name="loc" value="en_US"/>
		<input type="submit" class="submit" value="<?php _e('Subscribe', 'thirtyone'); ?>" />
		</form>
	</div>
	
	<?php  
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

	return $instance;
}


/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
function form( $instance ) {

	/* Set up some default widget settings ------------------------------------------*/
	$defaults = array(
		'title' => 'Newsletter',
		'desc' => 'This is my latest newsletter, pretty cool huh!',
	);
	
	$instance = wp_parse_args( (array) $instance, $defaults ); 
	
	/* Build our form ---------------------------------------------------------------*/
	?>

	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'thirtyjin') ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</label>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e('Short Description:', 'thirtyjin') ?>
		<textarea style="height:100px;" class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>"><?php echo stripslashes(htmlspecialchars(( $instance['desc'] ), ENT_QUOTES)); ?></textarea>
		</label>
	</p>
		
	<?php
	}
}
?>