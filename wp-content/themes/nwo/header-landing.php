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
	<?php wp_head(); ?>

	<script src="<?php echo get_template_directory_uri(); ?>/js/mixitup.js"></script>

</head>

<body <?php body_class(); ?>>

<div class="navbar__landing-page">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-6">
        <a href="<?php echo get_home_url(); ?>" id="site-logo" class="header__logo">
          <img class="logo__landing-page" src="<?php bloginfo('template_directory'); ?>/img/nwo-horizontal.svg" alt="New Word Order">
        </a>
    </div>
    <div class="col-6 text-right">
      <a href="<?php echo get_home_url(); ?>" class="btn btn--outline">NWO home</a>
    </div>
  
  </div>
  </div>
</div>


	<section id="landing-page">
