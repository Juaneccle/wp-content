<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package iwebunique
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php iwebunique_post_thumbnail(); ?>
	<div class="entry-meta">
		<?php the_category( ' | ' ) ?>
	</div>

	<header class="entry-header">
		<?php
		if ( is_singular() ) :?>
			<?php the_title( '<h2 class="entry-title">', '</h2>' );?>
		<?php else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				iwebunique_posted_on();
				iwebunique_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'iwebunique' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
		?>
	<!-- Next-Previous Post  -->
		<div class="ppost"><?php previous_post_link( __( 'Previous post: <span>%link</span>', 'iwebunique' ), '[ %title ]', __( 'Previous in category', 'iwebunique' ), true ); ?> </div>
		<div class="npost"><?php next_post_link( __( 'Next post: <span>%link</span>', 'iwebunique' ), '[ %title ]', __( 'Next post in category', 'iwebunique' ), true ); ?> </div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
