<?php
/**
 * Makes a custom Widget for displaying Aside, Link, Status, and Quote Posts available with Thirty One
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */
class Thirty_One_Ephemera_Widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	function Thirty_One_Ephemera_Widget() {
		$widget_ops = array( 'classname' => 'widget_thirtyone_ephemera', 'description' => __( 'Use this widget to list your recent Aside, Status, Quote, and Link posts', 'thirtyone' ) );
		$this->WP_Widget( 'widget_thirtyone_ephemera', __( 'ThirtyOne Ephemera', 'thirtyone' ), $widget_ops );
		$this->alt_option_name = 'widget_thirtyone_ephemera';

		add_action( 'save_post', array(&$this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache' ) );
	}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	function widget( $args, $instance ) {
		$cache = wp_cache_get( 'widget_thirtyone_ephemera', 'widget' );

		if ( !is_array( $cache ) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = null;

		if ( isset( $cache[$args['widget_id']] ) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract( $args, EXTR_SKIP );

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Ephemera', 'thirtyone' ) : $instance['title'], $instance, $this->id_base);

		if ( ! isset( $instance['number'] ) )
			$instance['number'] = '10';

		if ( ! $number = absint( $instance['number'] ) )
 			$number = 10;

		$ephemera_args = array(
			'order' => 'DESC',
			'posts_per_page' => $number,
			'no_found_rows' => true,
			'post_status' => 'publish',
			'post__not_in' => get_option( 'sticky_posts' ),
			'tax_query' => array(
				array(
					'taxonomy' => 'post_format',
					'terms' => array( 'post-format-standard', 'post-format-aside', 'post-format-link', 'post-format-status', 'post-format-quote', 'post-format-image', 'post-format-gallery', 'post-format-video', 'post-format-audio' ),
					'field' => 'slug',
					'operator' => 'IN',
				),
			),
		);
		$ephemera = new WP_Query( $ephemera_args );

		if ( $ephemera->have_posts() ) :
			echo $before_widget;
			echo $before_title;
			echo $title; // Can set this with a widget option, or omit altogether
			echo $after_title;
			?>
			<ul class="clearfix">
			<?php while ( $ephemera->have_posts() ) : $ephemera->the_post(); ?>

				<li class="ephemera">
					
					<?php $widget_post_format ;
					
					if ('standard' == get_post_format()) {
						$widget_post_format = 'standard-icon' ;
					} elseif ('quote' == get_post_format()) {
						$widget_post_format = 'quote-icon' ;
					} elseif ('aside' == get_post_format()) {
						$widget_post_format = 'aside-icon' ;
					} elseif ('status' == get_post_format()) {
						$widget_post_format = 'status-icon' ;
					} elseif ('image' == get_post_format()) {
						$widget_post_format = 'image-icon' ;
					} elseif ('gallery' == get_post_format()) {
						$widget_post_format = 'gallery-icon' ;
					} elseif ('audio' == get_post_format()) {
						$widget_post_format = 'audio-icon' ;
					} elseif ('video' == get_post_format()) {
						$widget_post_format = 'video-icon' ;
					} elseif ('link' == get_post_format()) {
						$widget_post_format = 'link-icon' ;
					} else {
						$widget_post_format = 'standard-icon' ;
					} ?>
					
					<a class="widget-entry-title widget-post-format <?php echo $widget_post_format ?>" href="<?php echo esc_url( get_permalink() ); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'thirtyone' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
					
					<div class="meta-info">
						<span class="published"><?php the_date('m / d', '<a>', '</a>'); ?></span><span> · </span>
						<span class="comment-count"><?php comments_popup_link(__('Comment', 'thirtyone'), __('1 Comment', 'thirtyone'), __('% Comments', 'thirtyone')); ?></span>
					</div>
					
				</li>
				
			<?php endwhile; ?>
			</ul>
			<?php

			echo $after_widget;

			// Reset the post globals as this query will have stomped on it
			wp_reset_postdata();

		// end check for ephemeral posts
		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set( 'widget_thirtyone_ephemera', $cache, 'widget' );
	}

	/**
	 * Deals with the settings when they are saved by the admin. Here is
	 * where any validation should be dealt with.
	 **/
/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*  Deals with the settings when they are saved by the admin. Here is
/*  where any validation should be dealt with.
/*-----------------------------------------------------------------------------------*/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions['widget_thirtyone_ephemera'] ) )
			delete_option( 'widget_thirtyone_ephemera' );

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete( 'widget_thirtyone_ephemera', 'widget' );
	}

	/**
	 * Displays the form for this widget on the Widgets page of the WP Admin area.
	 **/
/*-----------------------------------------------------------------------------------*/
/*	Widget Settings
/*  Displays the form for this widget on the Widgets page of the WP Admin area.
/*-----------------------------------------------------------------------------------*/
	function form( $instance ) {
		$title = isset( $instance['title']) ? esc_attr( $instance['title'] ) : '';
		$number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 10;
?>
			<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'thirtyone' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

			<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php _e( 'Number of posts to show:', 'thirtyone' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3" /></p>
		<?php
	}
}












/*-----------------------------------------------------------------------------------

Name: Recent Comments widget
Description: Recent_Comments widget class
Version: 1.0
Author: thirty jin
Author URI: http://www.thirtyjin.com

-----------------------------------------------------------------------------------*/



class Thirty_One_Widget_Recent_Comments extends WP_Widget {
	
/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	function __construct() {
		$widget_ops = array('classname' => 'widget_recent_comments', 'description' => __( 'The most recent comments' ) );
		parent::__construct('recent-comments', __('ThirtyOne Recent Comments'), $widget_ops);
		$this->alt_option_name = 'widget_recent_comments';

		if ( is_active_widget(false, false, $this->id_base) )
			
		//add_action( 'wp_head', array(&$this, 'recent_comments_style') );

		add_action( 'comment_post', array(&$this, 'flush_widget_cache') );
		add_action( 'transition_comment_status', array(&$this, 'flush_widget_cache') );
	}

	function recent_comments_style() {
		if ( ! current_theme_supports( 'widgets' ) // Temp hack #14876
				|| ! apply_filters( 'show_recent_comments_widget_style', true, $this->id_base ) )
			return;
		?>
	<style type="text/css">.recentcomments a{/* display:inline !important; */padding:0 !important;margin:0 !important;}</style>
<?php
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_recent_comments', 'widget');
	}
/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	function widget( $args, $instance ) {
		global $comments, $comment;

		$cache = wp_cache_get('widget_recent_comments', 'widget');

		if ( ! is_array( $cache ) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

 		extract($args, EXTR_SKIP);
 		$output = '';
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Recent Comments' ) : $instance['title'], $instance, $this->id_base );

		if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
 			$number = 5;

		$comments = get_comments( array( 'number' => $number, 'status' => 'approve', 'post_status' => 'publish' ) );
		$output .= $before_widget;
		if ( $title )
			$output .= $before_title . $title . $after_title;

		$output .= '<ul id="recentcomments" class="clearfix">';
		if ( $comments ) {
			foreach ( (array) $comments as $comment) {
				
				$output .=  '<li class="recentcomments clearfix">';
				$output .=  '<div class="widget-entry-avatar"><a class="avatar" href="' . get_permalink($comment->ID) . '#comment-' . $comment->comment_ID . '" title="' . strip_tags($comment->comment_author) . $comment->post_title . '">' . get_avatar( $comment, '32' ) . '</a></div>';
				$output .=  '<div class="widget-entry-author">';
				$output .=  get_comment_author_link() . ' · '. '<time>' . get_comment_date('m / d') .'</time>';
				$output .=  '</div>';
				$output .=  '<div class="widget-entry-comment-excerpt">';
				$output .=  '<p>'. get_comment_excerpt() . '</p>';
				$output .=  '</div>';
				$output .=  '<div class="widget-entry-title">';
				$output .=  '<a href="' . esc_url( get_comment_link($comment->comment_ID) ) . '">' . get_the_title($comment->comment_post_ID) . '</a>';
				$output .=  '</div>';
				$output .=  '</li>';
			}
 		}
		$output .= '</ul>';
		$output .= $after_widget;

		echo $output;
		$cache[$args['widget_id']] = $output;
		wp_cache_set('widget_recent_comments', $cache, 'widget');
	}
/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = absint( $new_instance['number'] );
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_recent_comments']) )
			delete_option('widget_recent_comments');

		return $instance;
	}
/*-----------------------------------------------------------------------------------*/
/*	Widget Settings 
/*-----------------------------------------------------------------------------------*/
	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 5;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of comments to show:'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
<?php
	}
}




/*-----------------------------------------------------------------------------------

Name: Recent Posts widget
Description: Recent_Posts widget class
Version: 1.0
Author: thirty jin
Author URI: http://www.thirtyjin.com

-----------------------------------------------------------------------------------*/

class Thirty_One_Widget_Recent_Posts extends WP_Widget {
	
/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
	function __construct() {
		$widget_ops = array('classname' => 'widget_recent_entries', 'description' => __( "The recent posts on your site") );
		parent::__construct('recent-posts', __('ThirtyOne Recent Posts'), $widget_ops);
		$this->alt_option_name = 'widget_recent_entries';

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	function widget($args, $instance) {
		$cache = wp_cache_get('widget_recent_posts', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);
		if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
			$number = 10;

		$r = new WP_Query(array('posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true));
		if ($r->have_posts()) :
		?>
		<?php echo $before_widget; ?>
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>
		<ul class="clearfix">
		<?php  while ($r->have_posts()) : $r->the_post(); ?>
		<li class="recentposts clearfix">
		<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
			<div class="post_thumb">
				<a href="<?php the_permalink();?>" class="thumb"><?php the_post_thumbnail(array(52,52)); ?></a>
			</div>
		<?php } else { ?>
			<div class="post_thumb">
				<a href="<?php the_permalink();?>" class="thumb"><img style="width: 52px; height: 52px;" src="<?php echo get_template_directory_uri(); ?>/images/default_post_pic.png"></a>
			</div>
		<?php }?>
		<div class="widget-entry-title">
			<a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>
		</div>
		<div class="meta-info">
			<span class="published"><?php the_date('m / d', '<time>', '</time>'); ?></span><span> · </span>
			<span class="comment-count"><?php comments_popup_link(__('Comment', 'thirtyone'), __('1 Comment', 'thirtyone'), __('% Comments', 'thirtyone')); ?></span>
		</div>
		
		</li>
		<?php endwhile; ?>
		</ul>
		<?php echo $after_widget; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_recent_posts', $cache, 'widget');
	}
/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_recent_entries']) )
			delete_option('widget_recent_entries');

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_recent_posts', 'widget');
	}
/*-----------------------------------------------------------------------------------*/
/*	Widget Settings
/*-----------------------------------------------------------------------------------*/
	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 5;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
<?php
	}
}


/*-----------------------------------------------------------------------------------

Name: Popular Posts widget
Description: Popular_Posts widget class
Version: 1.0
Author: thirty jin
Author URI: http://www.thirtyjin.com

-----------------------------------------------------------------------------------*/
class Thirty_One_Widget_Pop_Posts extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	function __construct() {
		$widget_ops = array('classname' => 'widget_pop_entries', 'description' => __( "The most popular posts on your site") );
		parent::__construct('pop-posts', __('Thirtyone Pop Posts'), $widget_ops);
		$this->alt_option_name = 'widget_pop_entries';

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}
	
/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	function widget($args, $instance) {
		$cache = wp_cache_get('widget_pop_posts', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Pop Posts') : $instance['title'], $instance, $this->id_base);
		if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
			$number = 10;

		$r = new WP_Query(array('orderby' => 'comment_count', 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true));
		if ($r->have_posts()) :
		?>
		<?php echo $before_widget; ?>
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>
		<ul class="clearfix">
		<?php  while ($r->have_posts()) : $r->the_post(); ?>
		<li class="popposts clearfix">
		<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
			<div class="post_thumb">
				<a href="<?php the_permalink();?>" class="thumb"><?php the_post_thumbnail(array(52,52)); ?></a>
			</div>
		<?php } else { ?>
			<div class="post_thumb">
				<a href="<?php the_permalink();?>" class="thumb"><img style="width: 52px; height: 52px;" src="<?php echo get_template_directory_uri(); ?>/images/default_post_pic.png"></a>
			</div>
		<?php }?>
		<a class="widget-entry-title" href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>

		<div class="meta-info">
			<span class="published"><?php the_date('m / d', '<time>', '</time>'); ?></span><span> · </span>
			<span class="comment-count"><?php comments_popup_link(__('Comment', 'thirtyone'), __('1 Comment', 'thirtyone'), __('% Comments', 'thirtyone'),'' , __('No Comment', 'thirtyone')); ?></span>
		</div>
		
		</li>
		<?php endwhile; ?>
		</ul>
		<?php echo $after_widget; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_pop_posts', $cache, 'widget');
	}
/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_pop_entries']) )
			delete_option('widget_pop_entries');

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_pop_posts', 'widget');
	}
/*-----------------------------------------------------------------------------------*/
/*	Widget Settings
/*-----------------------------------------------------------------------------------*/
	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 5;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
<?php
	}
}












/*-----------------------------------------------------------------------------------

Name: Popular likes Posts widget
Description: Popular likes Post Widget Class
Version: 1.0
Author: thirty jin
Author URI: http://www.thirtyjin.com

-----------------------------------------------------------------------------------*/

class Thirty_One_MostLikedPosts extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
	function __construct()
	{
		$widget_ops = array('classname' => 'widget_liked_entries', 'description' => __( "The Most Liked posts on your site") );
		parent::__construct( 'mostlikedposts', 'Thirtyone Liked Posts' );
		$this->alt_option_name = 'widget_liked_entries';
		
		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}
	
	
/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget( $args, $instance ) {
		$cache = wp_cache_get('widget_liked_entries', 'widget');
		
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$numberOfPostsToShow = apply_filters('widget_numberOfPostsToShow',$instance['numberOfPostsToShow']);
		print $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
			
			
		global $wpdb;
		$querystr = "
		SELECT $wpdb->posts.*
		FROM $wpdb->posts, $wpdb->postmeta
		WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id
		AND $wpdb->postmeta.meta_key = '_likes'
		AND $wpdb->posts.post_status = 'publish'
		AND $wpdb->posts.post_type = 'post'
		ORDER BY $wpdb->postmeta.meta_value DESC
		LIMIT " . $numberOfPostsToShow;

		$pageposts = $wpdb->get_results($querystr, OBJECT);
		if ($pageposts):
		global $post;
		print "<ul class='clearfix'>";
		foreach ($pageposts as $post):
		setup_postdata($post);
		?>
  		<li>
  			<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a> (<?php print get_post_meta(get_the_id(),"_likes",1);  ?> likes)
  		</li>
     	<?php endforeach;
   		print "</ul>"; ?>
 <?php endif; 

		print $after_widget;
			
		}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		
		if(is_numeric($new_instance['numberOfPostsToShow'])) { 
		 $instance['numberOfPostsToShow'] = strip_tags($new_instance['numberOfPostsToShow']);
		} else {
		 
		 $instance['numberOfPostsToShow'] = strip_tags("5");
		}
		return $instance;
	}
	
	function flush_widget_cache() {
		wp_cache_delete('widget_liked_entries', 'widget');
	}
/*-----------------------------------------------------------------------------------*/
/*  Widget Settings
/*-----------------------------------------------------------------------------------*/
	function form( $instance ) {
		if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
			$numberOfPostsToShow = esc_attr( $instance[ 'numberOfPostsToShow' ] );
		}
		else {
			$title = __( 'Most Liked Posts', 'text_domain' );
			$numberOfPostsToShow = __( '5', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		
		
		<p>
		<label for="<?php echo $this->get_field_id('numberOfPostsToShow'); ?>"><?php _e('Number of Posts to Show:'); ?></label> 
		<input class="shortfat" id="<?php echo $this->get_field_id('numberOfPostsToShow'); ?>" name="<?php echo $this->get_field_name('numberOfPostsToShow'); ?>" width="3" type="text" value="<?php echo $numberOfPostsToShow; ?>" />
		</p>
		<?php 
	}

} // class MostLikedPosts








