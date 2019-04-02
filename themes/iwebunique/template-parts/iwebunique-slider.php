<?php
/**
 * Template part for Slider
 *
 * @package iwebunique
 */

?>

<div class="i-content">

	<div class="i-slideshow">
		<?php
			$iwebunique_slider_cat = esc_html( get_theme_mod( 'iwebunique_slider_category' ) );
				$iwebunique_slider_args = array(
					'cat' => $iwebunique_slider_cat,
					'post_status' => 'publish',
					'posts_per_page' => 4,
				);
				$iwebunique_slider_query = new WP_Query( $iwebunique_slider_args );
				$iwebunique_sld = 0;
				if ( get_theme_mod( 'iwebunique_slider_category' ) != null ) :
					function iwebunique_postcount( $id ) {
						$category = get_category( $id );
						return $category->category_count;
					}
					$iwebcount = iwebunique_postcount( $iwebunique_slider_cat );
				else :
					$iwebcount = 0;
				endif;
		?>

		<?php if ( get_theme_mod( 'iwebunique_display_mslider','1' ) === '1' || '1' == $iwebcount ) : ?>
			<?php
			if ( $iwebunique_slider_query->have_posts() ) :
					  $iwebunique_slider_query->the_post();
		?>
			<?php if ( has_post_thumbnail() ) : ?>
				<?php $iwebunique91_img = get_the_post_thumbnail_url( get_the_ID(),'full' ); ?>
			<?php else : ?>
				<?php $iwebunique91_img = esc_url( get_template_directory_uri() . '/img/defaultimage.jpg' );?>
			<?php endif; ?>
			<div class="iSlides1" style="background-image: url( <?php echo esc_url( $iwebunique91_img ); ?> );">
				<div class="iwrapper">
					<div class="itext">
						<h1><?php the_title();?></h1>
						<?php add_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_short' );
						add_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );
							the_excerpt();
						remove_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_short' );
						remove_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );?>
							<div class="tmarg-25">
							<a class="iwebunique-button" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more','iwebunique' );?></a>
							</div>
					</div>
				</div>
			</div>
				<?php endif; ?>
		<?php endif; ?>

		<?php if ( get_theme_mod( 'iwebunique_display_mslider' ) === '0' and '1' < $iwebcount ) : ?>
		<?php
		if ( $iwebunique_slider_query->have_posts() ) :
			while ( $iwebunique_slider_query->have_posts() ) :
					  $iwebunique_slider_query->the_post();
		?>
		<?php if ( has_post_thumbnail() ) : ?>
			<?php $iwebunique91_img = get_the_post_thumbnail_url( get_the_ID(),'full' ); ?>
		<?php else : ?>
			<?php $iwebunique91_img = esc_url( get_template_directory_uri() . '/img/defaultimage.jpg' );?>
		<?php endif; ?>

		<div class="iSlides iSlides1" style="background-image: url(<?php echo esc_url( $iwebunique91_img );?>);">
				<div class="iwrapper">
					<div class="itext sldanimtx">
						<h1><?php the_title();?></h1>
						<?php add_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_short' );
						add_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );
							the_excerpt();
						remove_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_short' );
						remove_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );?>
							<div class="tmarg-25">
							<a class="iwebunique-button" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more','iwebunique' );?></a>
							</div>
					</div>
				</div>
		</div>
		<?php $iwebunique_sld++ ;?>
		<?php  endwhile; ?>
		<?php wp_reset_postdata();?>
		<?php endif; ?>
		<?php endif; ?>
	</div>
</div><!-- i-content div -->
