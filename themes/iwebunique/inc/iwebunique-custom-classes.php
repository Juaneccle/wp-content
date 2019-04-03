<?php
/**
 *
 * @package iwebunique
 */

function iwebunique_bg_custom_css() {
		?>
	<style type="text/css">
		<?php $iweb_header_img = get_header_image();?>
		<?php if ( null != $iweb_header_img ) : ?>
			<?php if ( is_home() || is_front_page() ) : ?>
				.fixed-header
				 {background-image: linear-gradient( rgba(0,0,0,.6), rgba(0,0,0,.6) ), url( <?php echo esc_url( get_theme_mod( header_image() ) );?>) ;}
			<?php else : ?>
				.fullwidth
				 {background-image: linear-gradient( rgba(0,0,0,.6), rgba(0,0,0,.6) ), url( <?php echo esc_url( get_theme_mod( header_image() ) );?>) ;}
			<?php endif; ?>
		<?php else : ?>
		@media screen and (min-width: 968px) {
			.fixed-header
			{background-color: rgba(51, 51, 51, 0.8);}
		}
		<?php endif; ?>

		<?php if ( is_home() || is_front_page() ) : ?>

		<?php else : ?>
			.fullwidth {border-bottom: 1px solid;}
			.fullwidth {border-color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#e6be1e' ) ); ?>;}
		<?php endif; ?>


		<?php if ( get_theme_mod( 'iwebunique_pheader_bgimg' ) != null ) :?>
			.iwebunique-page-header
			{background: url(<?php echo esc_url( get_theme_mod( 'iwebunique_pheader_bgimg' ) );?>) ;}
		<?php else : ?>
			.iwebunique-page-header
			{background: url(<?php echo esc_url( get_template_directory_uri() ); ?>/img/pheaderimg.jpg) ;}
		<?php endif; ?>



		.iwebunique-page-header h1:after, .iwebunique-uline h1:after, .iwebunique-uline-lf h1:after
		{background-color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#e6be1e' ) ); ?>;}

		<?php if ( get_theme_mod( 'iwebunique_footer_bgimg' ) != null ) :?>
		 #footer-sidebar-w {
			background-image: linear-gradient( rgba(0,0,0,.8), rgba(0,0,0,.8) ), url(<?php echo esc_url( get_theme_mod( 'iwebunique_footer_bgimg' ) ); ?>) ;}
		<?php endif; ?>

		h2.entry-title
		{color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#e6be1e' ) ); ?>;}

	</style>
<?php  }
add_action( 'wp_head','iwebunique_bg_custom_css' );

function iwebunq_themecolor1_custom_css() {
		?>
	<style type="text/css">
		.post-thumbnail img, #footer-sidebar .widget h2
		{border-color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#e6be1e' ) ); ?>;}

		.fixed-header
		{border-bottom-color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#e6be1e' ) ); ?>;}

		a:hover, .site-title a:hover, .site-info a:hover, .breadcrumb a, .ppost span, .npost span, .iweb-moretag
		{color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#e6be1e' ) ); ?>;}

		.iwebunique-button
		{background-color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#e6be1e' ) ); ?>;}

			button,
			input[type="button"],
			input[type="reset"],
			input[type="submit"] {
		background-color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#e6be1e' ) ); ?>;
		border-color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#e6be1e' ) ); ?>;}

	   @media screen and (min-width: 968px) {

		.search-form input[type="submit"], .form-submit input[type="submit"],
		.main-navigation ul li:hover > a, .main-navigation li ul li a:hover, .main-navigation li ul li a:focus
			{background-color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#e6be1e' ) ); ?>;}
		.ppost span, .npost span {
			color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#e6be1e' ) ); ?>;}

		.main-navigation li > a:after, .main-navigation li li > a:before,
		.main-navigation .current-menu-item > a,
		.main-navigation .current-menu-ancestor > a,
		.main-navigation .current_page_item > a,
		.main-navigation .current_page_ancestor > a {
			color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#e6be1e' ) );?>;}
		}


	   @media screen and (max-width: 967px) {

		.search-submit, .form-submit input[type="submit"] {
			background-color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#e6be1e' ) ); ?> ;}
		.main-navigation a:hover, .main-navigation a:focus, .main-navigation li ul li a:hover,
		.main-navigation li ul li a:focus {
			color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#e6be1e' ) ); ?> ;}
	   }
	</style>
<?php  }

add_action( 'wp_head','iwebunq_themecolor1_custom_css' );


function iwebunique_themecolor_main_custom_css() {
?>
	<style type="text/css">
		.iSlides1:after, .iwebunique-page-header:after
			{background: rgba(0,0,0,0.2) url(<?php echo esc_url( get_template_directory_uri() ); ?>/img/pattern.png) ;}
		body #iwebunique-bckgr {
			background: linear-gradient( rgba(0,0,0,.1), rgba(0,0,0,.1) ), url(<?php echo esc_url( get_template_directory_uri() ); ?>/img/404.jpg) center repeat ;}
		.iwebunique-os-a1 .fa, .iwebfirstword, .iwebunique-tmonials-a1 .fa, .iwebunique_social .fa:hover
		{color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#e6be1e' ) ); ?> ;}

		<?php if ( get_theme_mod( 'iwebunique_os_cols' ) == 3 ) :?>
			.iwebunique-os-a1 {width: 340px;}
		<?php else : ?>
			.iwebunique-os-a1 {width: 280px;}
		<?php endif; ?>

		<?php if ( get_theme_mod( 'iwebunique_abtus_bg_img' ) != null ) :?>
			.iwebunique-abus
			{background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url(<?php echo esc_url( get_theme_mod( 'iwebunique_abtus_bg_img' ) );?>) center fixed ;}
		<?php else : ?>
			.iwebunique-abus
			{background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url(<?php echo esc_url( get_template_directory_uri() ); ?>/img/defaultimage.jpg) center fixed ;}
		<?php endif; ?>

		.iwebunique-abus-a2 img, .iwebunique-tmonials-a1 img, .iwebunique-ourtim-a2, .iwebunique-ourtim-a4
		{border-color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#e6be1e' ) ); ?> ;}

		.iwebunique-oskil-b1 {width: <?php echo esc_attr( get_theme_mod( 'iwebunique_oskil1_prct','90' ) ) . '%';?>;}
		.iwebunique-oskil-b2 {width: <?php echo esc_attr( get_theme_mod( 'iwebunique_oskil2_prct','80' ) ) . '%';?>;}
		.iwebunique-oskil-b3 {width: <?php echo esc_attr( get_theme_mod( 'iwebunique_oskil3_prct','75' ) ) . '%';?>;}
		.iwebunique-oskil-b4 {width: <?php echo esc_attr( get_theme_mod( 'iwebunique_oskil4_prct','60' ) ) . '%';?>;}

		<?php if ( get_theme_mod( 'iwebunique_tmonials_bg_img' ) != null ) :?>
			.iwebunique-tmonials
			{background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url(<?php echo esc_url( get_theme_mod( 'iwebunique_tmonials_bg_img' ) );?>) center fixed ;}
		<?php else : ?>
			.iwebunique-tmonials
			{background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url(<?php echo esc_url( get_template_directory_uri() ); ?>/img/defaultimage.jpg) center fixed ;}
		<?php endif; ?>

		.iwebunique-fds-w2, .iwebunique-lnews-title
		{background-color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#e6be1e' ) ); ?> ;}

	</style>
<?php  }

add_action( 'wp_head','iwebunique_themecolor_main_custom_css' );

