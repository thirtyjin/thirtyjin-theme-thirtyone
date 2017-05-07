<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> >
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="imagetoolbar" content="no"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>


<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php 
	thirtyjin_meta_head(); 
	thirtyjin_head(); 
	wp_head();
?>	

<title>
<?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'thirtyone' ), max( $paged, $page ) );

	?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />


<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />



<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

	
</head>

<body <?php body_class(); ?>>



<div id="page" class="hfeed">
	
	<div id="page-header-mask"></div>
	<div id="main-navigation">
		<div id="main-navigation-content" class="w-container container_12">
			<nav id="access" role="navigation"  class="grid_9">
			123123
				<div id="site-logo-name">
	    			<a href="<?php echo home_url(); ?>" class="icon-logo animated slideInRight" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>
	    		</div>
				<?php wp_nav_menu( 
							array( 
								'theme_location' => 'primary',
								'menu_class' => 'home-page-nav',
								'container_class' => 'home-nav'
								 ) 
							); ?>
			</nav><!-- #access -->    
			<div id="nav-search" class="grid_3">
				<?php /* search form */
				$thirtyone_header_search = ot_get_option('thirtyone_header_search',array());
				if ($thirtyone_header_search=='on'){ 
					get_search_form(); 
				 }?>
			</div>
		</div>
	</div>
	<div id="main-content" class="clearfix">
	