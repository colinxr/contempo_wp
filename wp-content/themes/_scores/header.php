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

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

		<header class="navbar navbar-default">

			<div class="container-fluid">

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/contempo-media.svg" class="navbar-brand__logo"></a>

				<div class="collapse navbar-collapse">

			    	<ul class="nav navbar-nav navbar-right">

							<li class="dropdown">
				      	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Brands <span class="caret"></span></a>

								<ul class="dropdown-menu">
									<li><a href="#">Sharp</a></li>
				          <li><a href="#">S/ magazine</a></li>
							  </ul></li>
				      <li><a href="#">Contract Publishing</a></li>
				      <li><a href="#">Case Studies</a></li>
				      <li><a href="#">Press</a></li>
				      <li><a href="#">Contact</a></li>

			      </ul>

				</div>

			</div>

		</header>
