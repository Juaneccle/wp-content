<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package iwebunique
 */

?>
	</div><!-- #content -->

<?php
if ( ! is_active_sidebar( 'footer-1' )
&& ! is_active_sidebar( 'footer-2' )
&& ! is_active_sidebar( 'footer-3' )
&& ! is_active_sidebar( 'footer-4' )

) : ?>
<div id="footer-sidebar-w" style="display:none;"></div>
<?php else : ?>
	<div id="footer-sidebar-w">
		<div id="footer-sidebar">
			<div class="footer-sidebar1">
			<?php
			if ( is_active_sidebar( 'footer-1' ) ) {
				dynamic_sidebar( 'footer-1' );
			}
			?>
			</div><!--
			--><div class="footer-sidebar1">
			<?php
			if ( is_active_sidebar( 'footer-2' ) ) {
				dynamic_sidebar( 'footer-2' );
			}
			?>
			</div><!--
			--><div class="footer-sidebar1">
			<?php
			if ( is_active_sidebar( 'footer-3' ) ) {
				dynamic_sidebar( 'footer-3' );
			}
			?>
			</div><!--
			--><div class="footer-sidebar1">
			<?php
			if ( is_active_sidebar( 'footer-4' ) ) {
				dynamic_sidebar( 'footer-4' );
			}
			?>
			</div>
		</div>
	</div>
<?php endif; ?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
		<?php if ( get_theme_mod( 'iwebunique_social_display','0' ) === '1' ) :?>
			<div class="iwebunique_social">
				<?php if ( esc_html( get_theme_mod( 'iwebunique_social1_icon' ) ) != null ) :?>
				<a href='<?php echo esc_url( get_theme_mod( 'iwebunique_social1_url' ) );?>'>
					<i class="fa <?php echo esc_attr( get_theme_mod( 'iwebunique_social1_icon' ) );?>"></i>
				</a><?php endif; ?>
				<?php if ( esc_html( get_theme_mod( 'iwebunique_social2_icon' ) ) != null ) :?>
				<a href='<?php echo esc_url( get_theme_mod( 'iwebunique_social2_url' ) );?>'>
					<i class="fa <?php echo esc_attr( get_theme_mod( 'iwebunique_social2_icon' ) );?>"></i>
				</a><?php endif; ?>
				<?php if ( esc_html( get_theme_mod( 'iwebunique_social3_icon' ) ) != null ) :?>
				 <a href='<?php echo esc_url( get_theme_mod( 'iwebunique_social3_url' ) );?>'>
					 <i class="fa <?php echo esc_html( get_theme_mod( 'iwebunique_social3_icon' ) );?>"></i>
				</a><?php endif; ?>
				<?php if ( esc_html( get_theme_mod( 'iwebunique_social4_icon' ) ) != null ) :?>
				 <a href='<?php echo esc_url( get_theme_mod( 'iwebunique_social4_url' ) );?>'>
					 <i class="fa <?php echo esc_html( get_theme_mod( 'iwebunique_social4_icon' ) );?>"></i>
				</a><?php endif; ?>
			</div><br>
		<?php endif; ?>

			<?php if ( get_theme_mod( 'iweb_copyright_text' ) != null ) : ?>
				<div id="iweb-cuscr">
					<?php echo esc_html( get_theme_mod( 'iweb_copyright_text' ) ); ?>
				</div>
			<?php endif; ?>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'iwebunique' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s','iwebunique' ),'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<a href="<?php echo esc_url( __( 'http://iwebdm.com/wordpress-theme/unique', 'iwebunique' ) ); ?>">
				<?php
					/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'iwebunique' ), 'IWeb Unique', 'IWEBDM.com' );
				?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<button onclick="iwebunique_topFunction()" id="topBtn" title="<?php echo esc_attr__( 'Go to top','iwebunique' ); ?>"><i class="fa fa-circle-up"></i></button>

<?php wp_footer(); ?>
</body>
</html>
