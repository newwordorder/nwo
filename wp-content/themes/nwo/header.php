<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre:400,700|Libre+Franklin:400,700" rel="stylesheet">
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>



	<!-- ******************* The Navbar Area ******************* -->
	<div id="site-header" class="site-header">

		<a href="<?php echo get_home_url(); ?>" id="site-logo" class="header__logo">

				<img class="logo logo--white" src="<?php bloginfo('template_directory'); ?>/img/logo--white.svg" alt="New Life">
				<img class="logo logo--black" src="<?php bloginfo('template_directory'); ?>/img/logo--black.svg" alt="New Life">

			</a>

			<a class="navicon">
				<span class="lines"></span>
				<span class="navicon-text navicon-text--menu">Menu</span>
				<span class="navicon-text navicon-text--close">Close</span>
			</a>

		</div>
		<nav class="nav" role="navigation">
	            <div class="nav__content">
	                <div class="wrapper">
	                    <div class="wrapper__scroll">

	                        <div class="site-nav">
														<?php wp_nav_menu(
															array(
																'theme_location'  => 'primary',
																'menu_id'         => 'main-menu',
															)
														); ?>
													</div>

	                    </div>
	                </div>
	            </div>

	        </nav>

	<section id="page">
