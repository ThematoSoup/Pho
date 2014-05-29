<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Bolt
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php tha_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php tha_head_bottom(); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php tha_body_top(); ?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'bolt' ); ?></a>

	<?php tha_header_before(); ?>
	<header id="masthead" class="site-header" role="banner">
		<?php tha_header_top(); ?>

		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Primary Menu', 'bolt' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'depth' => 3 ) ); ?>
		</nav><!-- #site-navigation -->

		<?php tha_header_bottom(); ?>
	</header><!-- #masthead -->
	<?php tha_header_after(); ?>

	<?php tha_content_before(); ?>
	<div id="content" class="site-content">
		<?php tha_content_top(); ?>