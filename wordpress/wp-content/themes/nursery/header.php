<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package nursery
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php
  $content_text_color = get_option('content_text_color');
  $content_link_color = get_option('content_link_color');
?>
<style>
  #content { color:  <?php echo $content_text_color; ?>; }
  #content a { color:  <?php echo $content_link_color; ?>; }
</style>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

		
	<header id="masthead" class="site-header" role="banner">
		<div id="background" style="overflow:hidden;">
		<div style="border-top: 2px dashed #fff; border-bottom: 2px dashed #fff; margin: 5px 0; overflow:hidden"> 
			<div class="content-area">
				<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<div id="searchbox"><?php get_search_form(); ?></div>
				</div>

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu(); ?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
		</div>
	</header><!-- #masthead -->
	

	<div id="content" class="site-content">
