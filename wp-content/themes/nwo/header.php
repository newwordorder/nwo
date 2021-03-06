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
	<link rel="stylesheet" href="https://use.typekit.net/zou2ssf.css">

	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<?php wp_head(); ?>

	<script src="<?php echo get_template_directory_uri(); ?>/js/mixitup.js"></script>

</head>

<body <?php body_class(); ?>>



	<!-- ******************* The Navbar Area ******************* -->
	<div id="site-header" class="site-header">

		<a href="<?php echo get_home_url(); ?>" id="site-logo" class="header__logo">

				<img class="logo logo__desktop logo__desktop--white" src="<?php bloginfo('template_directory'); ?>/img/logo--white.svg" alt="New Word Order">
				<img class="logo logo__desktop logo__desktop--black" src="<?php bloginfo('template_directory'); ?>/img/logo--black.svg" alt="New Word Order">
				<img class="logo logo__mobile logo__mobile--white" src="<?php bloginfo('template_directory'); ?>/img/mobile__logo--white.svg" alt="New Word Order">
				<img class="logo logo__mobile logo__mobile--black" src="<?php bloginfo('template_directory'); ?>/img/mobile__logo--black.svg" alt="New Word Order">

			</a>

			<a class="navicon">
				<span class="lines"></span>
				<!--<span class="navicon-text navicon-text--menu">Menu</span>
				<span class="navicon-text navicon-text--close">Close</span>-->
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
