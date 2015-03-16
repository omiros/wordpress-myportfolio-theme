<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Posh Industries
 * @subpackage PACKAGE NAME
 * @since PACKAGE VERSION
 */

?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?> >
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|',true, 'right' ); bloginfo('name')?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>

  <body <?php body_class(); ?>>
    <header class="row no-max pad main">
  <h1><a class='current' href="<?php bloginfo('url') ?>"><?php bloginfo('name') ?></a></h1>
  <a href="" class="nav-toggle"><span></span>Menu</a>
  <nav>
    <h1 class="open"><a class='current' href="<?php bloginfo('url') ?>"><?php bloginfo('name') ?></a></h1>
    <?php 
    	$defaults = array(
    		'container' => false,
    		'theme_location' => 'primary-menu',
    		'menu_class' => 'no-bullet'
    	 );

    	wp_nav_menu( $defaults );
    ?>
  </nav>
</header>