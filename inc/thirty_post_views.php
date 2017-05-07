<?php

/* 
Function Name: record_visitors 
Version: 1.0
Author: thirtyjin

*/

function record_visitors()
{
	if (is_singular()) 
	{
	  global $post;
	  $post_ID = $post->ID;
	  if($post_ID) 
	  {
		  $post_views = (int)get_post_meta($post_ID, 'views', true);
		  if(!update_post_meta($post_ID, 'views', ($post_views+1))) 
		  {
			add_post_meta($post_ID, 'views', 1, true);
		  }
	  }
	}
}
add_action('wp_head', 'record_visitors');  
 
// Name: post_views 

function post_views($before = '( ', $after = ' )', $echo = 1)
{
  global $post;
  $post_ID = $post->ID;
  $views = (int)get_post_meta($post_ID, 'views', true);
  if ($echo) echo $before, number_format($views), $after;
  else return $views;
}
 
// get_most_viewed_format 

function get_most_viewed_format($mode = '', $limit = 10, $show_date = 0, $term_id = 0, $beforetitle= '(', $aftertitle = ')', $beforedate= '(', $afterdate = ')', $beforecount= '(', $aftercount = ')') {
  global $wpdb, $post;
  $output = '';
  $mode = ($mode == '') ? 'post' : $mode;
  $type_sql = ($mode != 'both') ? "AND post_type='$mode'" : '';
  $term_sql = (is_array($term_id)) ? "AND $wpdb->term_taxonomy.term_id IN (" . join(',', $term_id) . ')' : ($term_id != 0 ? "AND $wpdb->term_taxonomy.term_id = $term_id" : '');
  $term_sql.= $term_id ? " AND $wpdb->term_taxonomy.taxonomy != 'link_category'" : '';
  $inr_join = $term_id ? "INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) INNER JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)" : '';
 
  // database query
  $most_viewed = $wpdb->get_results("SELECT ID, post_date, post_title, (meta_value+0) AS views FROM $wpdb->posts LEFT JOIN $wpdb->postmeta ON ($wpdb->posts.ID = $wpdb->postmeta.post_id) $inr_join WHERE post_status = 'publish' AND post_password = '' $term_sql $type_sql AND meta_key = 'views' GROUP BY ID ORDER BY views DESC LIMIT $limit");
  if ($most_viewed) {
   foreach ($most_viewed as $viewed) {
    $post_ID    = $viewed->ID;
    $post_views = number_format($viewed->views);
    $post_title = esc_attr($viewed->post_title);
    $get_permalink = esc_attr(get_permalink($post_ID));
    $output .= "<li>$beforetitle<a href='$get_permalink' title='$post_title'>$post_title</a>$aftertitle";
    if ($show_date) {
      $posted = date(get_option('date_format'), strtotime($viewed->post_date));
      $output .= "$beforedate $posted $afterdate";
    }
    $output .= "$beforecount $post_views $aftercount</li>";
   }   
  } else {
   $output = "<li>N/A</li>\n";
  }
  echo $output;
}
 
function get_totalviews($before = '( ', $after = ' )',$echo = 1) {
  global $wpdb;
  $total_views = $wpdb->get_var("SELECT SUM(meta_value+0) FROM $wpdb->postmeta WHERE meta_key = 'views'");
  if ($echo) echo $before, $total_views, $after;
  else return $total_views;
 }
 
 ?>