<!DOCTYPE HTML>
<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package contempo
 */

?>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<?php wp_head(); ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php $img = contempo_get_option( 'home_jumbotron_img' );?>
	<link rel="canonical" href="<?php echo esc_url( home_url( '/' ) ); ?>">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta property="og:type" content="business.business">
	<meta property="og:title" content="Contempo Media">
	<meta property="og:description" content="Canada's leading luxury content marketer." />
	<meta property="og:url" content="<?php echo esc_url( home_url( '/' ) ); ?>">
	<meta property="og:image" content="<?php echo esc_html($img); ?>	">
	<meta property="business:contact_data:street_address" content="372 Richmond St">
	<meta property="business:contact_data:locality" content="Toronto">
	<meta property="business:contact_data:region" content="Ontario">
	<meta property="business:contact_data:postal_code" content="m5v 1x6">
	<meta property="business:contact_data:country_name" content="Canada">
</head>

<body <?php body_class(); ?>>
	<div class="sprite_hide">
		<?php require get_template_directory() . '/assets/svg/svg/symbols.svg';?>
	</div>

	<header class="navbar navbar-default nav-show <?php echo ( is_user_logged_in() ? 'wp-nav' : '' );?>">

		<div class="container-fluid">

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand"><svg class="icon contempo-media navbar-brand__logo"><use xlink:href="#contempo-media"></use></svg></a>

			<?php
				wp_nav_menu( array(
					'menu' => 'header-menu',
					'theme_location' => 'header-menu',
					'container' => 'div',
					'container_class' => 'collapse navbar-collapse',
					'menu_class' => 'nav navbar-nav navbar-right',
					'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
					'walker' => new wp_bootstrap_navwalker()
					)
				);
			?>

			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

			</div>
	</header>
