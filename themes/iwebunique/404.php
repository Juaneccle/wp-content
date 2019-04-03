<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package iwebunique
 */

get_header();
?>

<div id="iwebunique-bckgr">
	<h1 style="color:#e5e5e5;font-size:55px;font-weight:bold;margin:0 0;line-height:50px;"><?php echo esc_html__( "We're sorry!", 'iwebunique' );?></h1>
	<h3 style="color:#e5e5e5;font-size:36px;"><?php echo  esc_html__( 'But the page you are looking for does not exist.', 'iwebunique' );?></h3>
</div>

<?php
get_footer();
