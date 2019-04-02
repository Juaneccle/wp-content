<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package iwebunique
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'iwebunique' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="fullwidth">
			<div id="header-90">
				<div class="site-branding">
					<div class="logo-l">
						<?php
						the_custom_logo(); ?>
					</div>
					<div class="title-r">
						<?php
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						else :
							?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						endif;
						$iwebunique_description = get_bloginfo( 'description', 'display' );
						if ( $iwebunique_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $iwebunique_description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div>
				</div><!-- .site-branding -->
				<div class="inavbar">
				<?php if ( function_exists( 'max_mega_menu_is_enabled' ) && max_mega_menu_is_enabled( 'primary' ) ) : ?>
					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
					) ); ?>
				<?php else : ?>
					<nav id="site-navigation" class="main-navigation" role="navigation">
							<button class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></button>
							<?php wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu_class' => 'nav-menu',
							) ); ?>
					</nav>
				<?php endif; ?>
				</div>
			</div>
		</div>
		</header><!-- #masthead -->

	<div id="content" class="site-content">
