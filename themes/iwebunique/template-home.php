<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Template Name: Front Page
 * @package iwebunique
 */

  get_header();
?>

<div  class="content-area">
	<main id="main" class="site-main" role="main">

		<?php  get_template_part( 'template-parts/iwebunique-slider' ); ?>

<!-- Featured Services Section  -->

<?php if ( get_theme_mod( 'iwebunique_display_fdservices','0' ) === '1' ) :?>
	<div class="iwebunique-fds">
		<div class="iwebunique-fds-w">
			<div class="iwebunique-fds-w1">
			<?php
				$iwebunique_fdservices_cat = get_theme_mod( 'iwebunique_fdservices_catg' );
				$iwebunique_fdservices_htext = '';
				$iwebunique_fdservices_dtext = '';
			if ( '0' != $iwebunique_fdservices_cat ) : ?>
			<?php
				$iwebunique_fdservices_args = array(
				'cat' => $iwebunique_fdservices_cat,
				'post_status' => 'publish',
				'posts_per_page' => 4,
				);
				$iwebunique_fdservices_query = new WP_Query( $iwebunique_fdservices_args );
				$iwebunique_fdservices = 0;
			if ( $iwebunique_fdservices_query->have_posts() ) :
				while ( $iwebunique_fdservices_query->have_posts() ) :
					$iwebunique_fdservices_query->the_post();
			?>
			<?php if ( 3 == $iwebunique_fdservices ) : ?>
				<?php $iwebunique_fdservices_htext = get_the_title();
				add_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_short' );
				add_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );
					$iwebunique_fdservices_dtext = get_the_excerpt();
				remove_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );
				remove_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_short' );
				?>
			<?php else : ?><!--
				--><div class="iwebunique-fds-a">
					<?php if ( 1 == esc_html( get_theme_mod( 'iwebunique_fdservices_hyplnk' ) ) ) :?>
						<a href="<?php the_permalink();?>">
					<?php endif; ?>
					<div class="iwebunique-fds-a1">
						<?php if ( has_post_thumbnail() ) :?>
							<?php the_post_thumbnail( 'medium' );?>
						<?php else : ?>
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/defaultimage.jpg" alt="<?php echo esc_attr__( 'No Image Found','iwebunique' ); ?>" />
						<?php endif; ?>
					</div>
					<div class="iwebunique-fds-a2">
						<?php the_title(); ?>
					</div>
					<?php if ( 1 == esc_html( get_theme_mod( 'iwebunique_fdservices_hyplnk' ) ) ) :?>
						</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
				<?php $iwebunique_fdservices++; ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>

			<?php endif; ?>
			</div><!--
		   --><div class="iwebunique-fds-w2">
				<p class="allmarg-0"><?php echo esc_html( $iwebunique_fdservices_dtext );?></p>
				<h1 class="allmarg-0 txtcolfff"><?php echo esc_html( $iwebunique_fdservices_htext );?></h1>
			</div>
		</div>
	</div>
<?php endif; ?>

<!-- END - Featured Services Section  -->

<!-- Our Services Section  -->

<?php if ( get_theme_mod( 'iwebunique_display_ourservices','0' ) === '1' ) :?>
		<div class="iwebunique-os">
		   <div class="iwebunique-os-a">
				<h1 class="iwebunique-sectitle"><?php echo esc_html( get_theme_mod( 'iwebunique_ourservices_title',__( 'Our Services','iwebunique' ) ) );?></h1>
				<p id="iwebunique-os-cuslive" class="iwebunique-secdesc"><?php echo esc_html( get_theme_mod( 'iwebunique_ourservices_desc' ) );?></p>
				<?php
					$iwebunique_os_row = get_theme_mod( 'iwebunique_os_rows', '1' );
					$iwebunique_os_col = get_theme_mod( 'iwebunique_os_cols', '3' );
					$iwebunique_os_rxc = $iwebunique_os_row * $iwebunique_os_col;
				;?>
				<?php for ( $i = 1; $i <= $iwebunique_os_rxc; $i++ ) {
					$iwebunique_ourservices_p1 = esc_html( get_theme_mod( 'iwebunique_ourservices_p' . $i . '','0' ) );
					if ( 0 == $iwebunique_ourservices_p1 ) :
						$i++;
						$iwebunique_os_rxc++;
						$iwebunique_ourservices_p1 = esc_html( get_theme_mod( 'iwebunique_ourservices_p' . $i . '' ) );
					endif;

					if ( 0 != $iwebunique_ourservices_p1 ) :
						$iwebunique_ourservices_args = array(
						'page_id' => $iwebunique_ourservices_p1,
						'post_type' => 'page',
						'post_status' => 'publish',
							);
							$iwebunique_ourservices_query = new WP_Query( $iwebunique_ourservices_args );
							$iwebunique_ourservices_query->have_posts();
							$iwebunique_ourservices_query->the_post();
				?>
			   <div id="<?php echo esc_attr( 'botbor' . $i . '' );?>" class="iwebunique-os-a1">
				   <i class="fa <?php echo esc_attr( get_theme_mod( 'iwebunique_ourservices_ic' . $i . '','1' ) );?>"></i>
				   <h4 class="subtit1 ianim-t"><?php the_title(); ?></h4>
					<?php add_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_others' );
					add_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );?>
						<?php the_excerpt();?>
					<?php remove_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );
					remove_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_others' );?>
			   </div>
				<?php endif;
					if ( 3 == $iwebunique_os_col and 2 == $iwebunique_os_row and 3 == $i ) : ?><br>
				<?php endif;
					if ( 4 == $iwebunique_os_col and 2 == $iwebunique_os_row and 4 == $i ) : ?><br>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
				<?php } ;?>
			</div>
		</div>
		<?php endif;?>


<!-- END - Our Services Section  -->

<!-- About Us Section  -->

<?php if ( get_theme_mod( 'iwebunique_display_abtus','0' ) === '1' ) :?>
	<div class="iwebunique-abus">
		<div class="iwebunique-abus-a">
			<?php
			   $iwebunique_abus_cat = esc_html( get_theme_mod( 'iwebunique_aboutus_catg' ) );

			if ( '0' != $iwebunique_abus_cat ) :
				$iwebunique_abus_args = array(
					'page_id' => $iwebunique_abus_cat,
					'post_type' => 'page',
					'post_status' => 'publish',
					'posts_per_page' => 1,
				);
				$iwebunique_abus_query = new WP_Query( $iwebunique_abus_args );
				if ( $iwebunique_abus_query->have_posts() ) {
					while ( $iwebunique_abus_query->have_posts() ) :
						$iwebunique_abus_query->the_post();
			?>
			<div class="iwebunique-abus-a1 iwebunique-uline-lf">
				<h1 class="tmarg-0 ianim-t"><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
				<?php add_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_others' );
				add_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );?>
					<?php the_excerpt();?>
				<a class="iwebunique-button" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more','iwebunique' );?></a>
				<?php remove_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );
					remove_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_others' );?>
			</div>
			<div class="iwebunique-abus-a2">
				<?php if ( has_post_thumbnail() ) :?>
				<a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'full' );?></a>
				<?php else : ?>
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/defaultimage.jpg" alt="<?php echo esc_attr__( 'No Image Found','iwebunique' ); ?>" />
				<?php endif; ?>
			</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
			<?php } ?>

			<?php endif; ?>
		</div><div style="clear:both"></div>
	</div>
<?php endif; ?>

<!-- END - About Us Section  -->

<!-- Featured Section-1  -->

<?php if ( get_theme_mod( 'iwebunique_display_fs1','0' ) === '1' ) :?>
<div class="iwebunique-fs1">
		<?php
			$iwebunique_fs1_cat = get_theme_mod( 'iwebunique_fs1_catg' );

		if ( '0' != $iwebunique_fs1_cat ) : ?>
	<?php
			$iwebunique_fs1_args = array(
			'cat' => $iwebunique_fs1_cat,
			'post_status' => 'publish',
			'posts_per_page' => 2,
			);
			$iwebunique_fs1_query = new WP_Query( $iwebunique_fs1_args );
			$iwebunique_fs1 = 0;
	if ( $iwebunique_fs1_query->have_posts() ) :
		while ( $iwebunique_fs1_query->have_posts() ) :
				$iwebunique_fs1_query->the_post();
	?>
	<?php if ( 0 == $iwebunique_fs1 ) :?>
	<div class="iwebunique-fs1-a">
		<div class="iwebunique-fs1-a1">
			<?php if ( has_post_thumbnail() ) :?>
				<a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'full' );?></a>
			<?php else : ?>
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/defaultimage.jpg" alt="<?php echo esc_attr__( 'No Image Found','iwebunique' ); ?>" />
			<?php endif; ?>
		</div><!--
		--><div class="iwebunique-fs1-b1">
			<h1 class="iwebunique-sectitle"><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
				<?php add_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_others' );
				add_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );?>
					<?php the_excerpt();?>
				<a class="iwebunique-button" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more','iwebunique' );?></a>
				<?php remove_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );
				remove_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_others' );?>
		</div>
	</div>
	<?php endif; ?>      <!-- iwebunique_fs1=0 -->

	<?php if ( 1 == $iwebunique_fs1 ) :?>  <!-- iwebunique_fs1=1 -->
	<div class="iwebunique-fs1-a" style="margin-top: -6px;margin-bottom: -6px;">
		<div class="iwebunique-fs1-a1 iweb-hide">
			<?php if ( has_post_thumbnail() ) :?>
				<a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'full' );?></a>
			<?php else : ?>
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/defaultimage.jpg" alt="<?php echo esc_attr__( 'No Image Found','iwebunique' ); ?>" />
			<?php endif; ?>
		</div>
		<div class="iwebunique-fs1-b1" style="padding: 0 4% 0 0;">
			<h1 class="iwebunique-sectitle"><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
				<?php add_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_others' );
				add_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );?>
					<?php the_excerpt();?>
				<a class="iwebunique-button" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more','iwebunique' );?></a>
				<?php remove_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );
				remove_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_others' );?>
		</div><!--
		--><div class="iwebunique-fs1-a1 iweb-show">
			<?php if ( has_post_thumbnail() ) :?>
				<a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'full' );?></a>
			<?php else : ?>
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/defaultimage.jpg" alt="<?php echo esc_attr__( 'No Image Found','iwebunique' ); ?>" />
			<?php endif; ?>
		</div>
	</div><div style="clear:both"></div>
	<?php endif; ?>      <!-- iwebunique_fs1=1 -->
		<?php $iwebunique_fs1 = 1 ;?>
	<?php  endwhile; ?>
	<?php wp_reset_postdata(); ?>
	<?php endif; ?>
	<?php endif; ?>
</div>

<?php endif; ?>

<!-- END - Featured Section-1  -->

<!-- Featured Section 2 -->

<?php if ( get_theme_mod( 'iwebunique_display_fs2', '0' ) === '1' ) :?>

		<?php
			   $iwebunique_fs2_cat = esc_html( get_theme_mod( 'iwebunique_fs2_catg' ) );

		if ( '0' != $iwebunique_fs2_cat ) :
			$iwebunique_fs2_args = array(
				'cat' => $iwebunique_fs2_cat,
				'post_status' => 'publish',
				'posts_per_page' => 1,
				);
				$iwebunique_fs2_query = new WP_Query( $iwebunique_fs2_args );
			if ( $iwebunique_fs2_query->have_posts() ) :
				while ( $iwebunique_fs2_query->have_posts() ) :
					$iwebunique_fs2_query->the_post();
			?>
		<?php if ( has_post_thumbnail() ) : ?>
			<?php $iwebunique_fs2_img = get_the_post_thumbnail_url( get_the_ID(),'full' ); ?>
		<?php else : ?>
			<?php $iwebunique_fs2_img = esc_url( get_template_directory_uri() . '/img/defaultimage.jpg' );?>
		<?php endif; ?>

   <div class="iwebunique-fs2" style="background: url(<?php echo esc_url( $iwebunique_fs2_img );?>) fixed;">
		<div class="iwebunique-fs2-a">
			<div class="iwebunique-fs2-a1">
				<?php add_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_others' );
				add_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );?>
					<?php the_excerpt(); ?>
				<?php remove_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );
				remove_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_others' );?>
			</div>
			<?php if ( null != get_theme_mod( 'iwebunique_fs2_btntext' ) ) :?>
			<div id="iwebunique-fs2-cuslive" class="iwebunique-fs2-a2">
				<a class="iwebunique-button" style="padding: 6px 25px;" href="<?php echo esc_url( get_theme_mod( 'iwebunique_fs2_btnlink' ) );?>"><?php echo esc_html( get_theme_mod( 'iwebunique_fs2_btntext' ) );?></a>
			</div>
			<?php endif; ?>
		</div>
	</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php endif; ?>
<?php endif; ?>
<?php endif; ?>

<!-- END - Featured Section 2 -->

<!-- Our Skills -->

<?php if ( get_theme_mod( 'iwebunique_display_oskil', '0' ) === '1' ) :?>
<div class="iwebunique-oskil">
	<div class="iwebunique-oskil-a">
		<div class="iwebunique-oskil-b">
			<p id="iwebunique-sk1a-cuslive" class="tmarg-0 bmarg-5"><?php echo esc_html( get_theme_mod( 'iwebunique_oskil1_text' ) );?></p>
			<div class="iwebunique-oskil-bb">
				<div class="iwebunique-oskil-bbtxt iwebunique-oskil-b1"><p id="iwebunique-sk1b-cuslive" class="tbmarg-0"><?php echo esc_html( get_theme_mod( 'iwebunique_oskil1_prct' ) ) . esc_html__( '%','iwebunique' );?></p></div>
			</div>
			<p id="iwebunique-sk2a-cuslive" class="bmarg-5"><?php echo esc_html( get_theme_mod( 'iwebunique_oskil2_text' ) );?></p>
			<div class="iwebunique-oskil-bb">
				<div class="iwebunique-oskil-bbtxt iwebunique-oskil-b2"><p id="iwebunique-sk2b-cuslive" class="tbmarg-0"><?php echo esc_html( get_theme_mod( 'iwebunique_oskil2_prct' ) ) . esc_html__( '%','iwebunique' );?></p></div>
			</div>
			<p id="iwebunique-sk3a-cuslive" class="bmarg-5"><?php echo esc_html( get_theme_mod( 'iwebunique_oskil3_text' ) );?></p>
			<div class="iwebunique-oskil-bb">
				<div class="iwebunique-oskil-bbtxt iwebunique-oskil-b3"><p id="iwebunique-sk3b-cuslive" class="tbmarg-0"><?php echo esc_html( get_theme_mod( 'iwebunique_oskil3_prct' ) ) . esc_html__( '%','iwebunique' );?></p></div>
			</div>
			<p id="iwebunique-sk4a-cuslive" class="bmarg-5"><?php echo esc_html( get_theme_mod( 'iwebunique_oskil4_text' ) );?></p>
			<div class="iwebunique-oskil-bb">
				<div class="iwebunique-oskil-bbtxt iwebunique-oskil-b4"><p id="iwebunique-sk4b-cuslive" class="tbmarg-0"><?php echo esc_html( get_theme_mod( 'iwebunique_oskil4_prct' ) ) . esc_html__( '%','iwebunique' );?></p></div>
			</div>

		</div>

			<?php
			   $iwebunique_oskil_pg = esc_html( get_theme_mod( 'iwebunique_oskil_page' ) );

			if ( '0' != $iwebunique_oskil_pg ) :
				$iwebunique_oskil_args = array(
					'page_id' => $iwebunique_oskil_pg,
					'post_type' => 'page',
					'post_status' => 'publish',
					'posts_per_page' => 1,
				);
				$iwebunique_oskil_query = new WP_Query( $iwebunique_oskil_args );
				if ( $iwebunique_oskil_query->have_posts() ) :
					while ( $iwebunique_oskil_query->have_posts() ) :
						$iwebunique_oskil_query->the_post();
			?>
			<div class="iwebunique-oskil-c">
				<h1 class="iwebunique-sectitle"><?php the_title();?></h1>
					<?php add_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_others' );
					add_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );?>
						<?php the_excerpt();?>
					<?php remove_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );
						remove_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_others' );?>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php endif; ?>
			<?php endif; ?>
	</div><div style="clear:both"></div>
</div>
<?php endif; ?>  <!-- section display enable -->

<!-- END - Our Skills -->

<!-- Portfolio Section  -->

<?php if ( get_theme_mod( 'iwebunique_pfolio_display', '0' ) === '1' ) :?>
	<div class="iwebunique-pfolio">
			<div class="iwebunique-pfolio-a iwebunique-pfolio-cuslive">
				<p class="allmarg-0 ianim-t"><?php echo esc_html( get_theme_mod( 'iwebunique_pfolio_stitle',__( 'PORTFOLIO','iwebunique' ) ) );?></p>
				<h1 class="iwebunique-sectitle"><?php echo esc_html( get_theme_mod( 'iwebunique_pfolio_title',__( 'Checkout our latest projects','iwebunique' ) ) );?></h1>
			</div>
		<?php
		$iwebunique_pfolio_ppp = '4';
		$iwebunique_pfolio_rw = esc_html( get_theme_mod( 'iwebunique_pfolio_rows' ) );
		if ( '2' == $iwebunique_pfolio_rw ) :
				$iwebunique_pfolio_ppp = '8';
		endif ;
		$iwebunique_pfolio_cat = esc_html( get_theme_mod( 'iwebunique_pfolio_catg' ) );
		if ( 0 != $iwebunique_pfolio_cat ) :
				$iwebunique_pfolio_args = array(
					'cat' => $iwebunique_pfolio_cat,
					'post_status' => 'publish',
					'posts_per_page' => $iwebunique_pfolio_ppp,
				);
				$iwebunique_pfolio_query = new WP_Query( $iwebunique_pfolio_args );

			if ( $iwebunique_pfolio_query->have_posts() ) :
				while ( $iwebunique_pfolio_query->have_posts() ) :
					  $iwebunique_pfolio_query->the_post();
		?><!--
		--><div class="iwebunique-pfolio-b1">
			<?php if ( 1 == esc_html( get_theme_mod( 'iwebunique_pfolio_hyplnk', '1' ) ) ) :?>
				<a href="<?php the_permalink();?>">
			<?php endif; ?>
			<?php if ( has_post_thumbnail() ) :?>
				<?php the_post_thumbnail( 'full' );?>
			<?php else : ?>
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/defaultimage.jpg" alt="<?php echo esc_html__( 'No Image Found','iwebunique' ); ?>" />
			<?php endif; ?>
			<div class="iwebunique-pfolio-overlay">
				<div class="iwebunique-pfolio-overlay-text"><?php the_title();?></div>
			</div>
			<?php if ( 1 == esc_html( get_theme_mod( 'iwebunique_pfolio_hyplnk', '1' ) ) ) :?>
				</a>
			<?php endif; ?>
		</div><!--
			--><?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		<?php endif;?>
	</div>
<?php endif; ?><!-- portfolio section display enable -->

<!-- END - Portfolio Section  -->

<!-- Our Team Section  -->

<?php if ( get_theme_mod( 'iwebunique_ourtim_display', '0' ) === '1' ) :?>
<div class="iwebunique-ourtim">
	<div class="iwebunique-ourtim-w">
			<h1 class="iwebunique-sectitle"><?php echo esc_html( get_theme_mod( 'iwebunique_ourtim_title',__( 'Our Team','iwebunique' ) ) );?></h1>
				<p id="iwebunique_ourtim-cuslive" class="iwebunique-secdesc"><?php echo esc_html( get_theme_mod( 'iwebunique_ourtim_desc' ) );?></p>
		<?php
		$iwebunique_ourtim_cat = esc_html( get_theme_mod( 'iwebunique_ourtim_catg' ) );
		if ( 0 != $iwebunique_ourtim_cat ) :
				$iwebunique_ourtim_args = array(
					'cat' => $iwebunique_ourtim_cat,
					'post_status' => 'publish',
					'posts_per_page' => 4,
				);
				$iwebunique_ourtim_query = new WP_Query( $iwebunique_ourtim_args );
				$iwebunique_ourtim_lr = 1 ;

			if ( $iwebunique_ourtim_query->have_posts() ) :
				while ( $iwebunique_ourtim_query->have_posts() ) :
					$iwebunique_ourtim_query->the_post();
					$iwebunique_ourtim_v1 = 0 ;
					$iwebunique_ourtim_title1 = esc_html( get_the_title() );

					if ( strpos( $iwebunique_ourtim_title1, ',' ) !== false ) {
						$iwebunique_ourtim_title = explode( ',', $iwebunique_ourtim_title1, 2 );
						$iwebunique_ourtim_v1 = 1 ;
					}
		?>
		<?php if ( has_post_thumbnail() ) : ?>
			<?php $iwebunique_ourtim_thum = get_the_post_thumbnail_url( get_the_ID(),'full' ); ?>
		<?php else : ?>
			<?php $iwebunique_ourtim_thum = esc_url( get_template_directory_uri() . '/img/defaultimage.jpg' );?>
		<?php endif; ?>
		<?php if ( 1 == $iwebunique_ourtim_lr || 3 == $iwebunique_ourtim_lr ) : ?>
		<div class="iwebunique-ourtim-a iwebfloat-l">
			<div class="iwebunique-ourtim-a1" style="background-image: url( <?php echo esc_url( $iwebunique_ourtim_thum ); ?> );">
				<div class="iweb-show600"><i class="fa fa-caret-left fa-4x"></i></div>
			</div><!--
			--><div class="iwebunique-ourtim-a2">
				<?php if ( 1 == $iwebunique_ourtim_v1 ) : ?>
					<?php if ( null != $iwebunique_ourtim_title[0] ) : ?>
						<p class="bmarg-0 iwebold upcase ianim-t" style="letter-spacing: 1px;"><?php echo esc_html( $iwebunique_ourtim_title[0] );?></p>
					<?php endif; ?>
					<?php if ( null != $iwebunique_ourtim_title[1] ) : ?>
						<p style="font-size:13px;margin:0;color:#b0b0b0;"><?php echo esc_html( $iwebunique_ourtim_title[1] );?></p>
					<?php endif; ?>
				<?php else : ?>
					<p class="bmarg-0 iwebold ianim-t"><?php echo esc_html( $iwebunique_ourtim_title1 );?></p>
				<?php endif; ?>
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/iweb_dline.png" alt="<?php echo esc_attr__( 'Image not found','iwebunique' ); ?>" />
				<?php add_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_short' );
				add_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );?>
					<?php the_excerpt();?>
				<?php remove_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );
				remove_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_short' );?>
			</div>
		</div>
		<?php endif; ?>         <!-- For $iwebunique_ourtim_lr=1 -->

		<?php if ( 2 == $iwebunique_ourtim_lr || 4 == $iwebunique_ourtim_lr ) : ?>
		<div class="iwebunique-ourtim-a iwebfloat-r">
			<div class="iwebunique-ourtim-a3 iweb-hide600" style="background-image: url( <?php echo esc_url( $iwebunique_ourtim_thum ); ?> );">
			</div><!--
			  --><div class="iwebunique-ourtim-a4">
				<?php if ( 1 == $iwebunique_ourtim_v1 ) : ?>
					<?php if ( null != $iwebunique_ourtim_title[0] ) : ?>
						<p class="bmarg-0 iwebold upcase ianim-t" style="letter-spacing: 1px;"><?php echo esc_html( $iwebunique_ourtim_title[0] );?></p>
					<?php endif; ?>
					<?php if ( null != $iwebunique_ourtim_title[1] ) : ?>
						<p style="font-size:13px;margin:0;color:#b0b0b0;"><?php echo esc_html( $iwebunique_ourtim_title[1] );?></p>
					<?php endif; ?>
				<?php else : ?>
					<p class="bmarg-0 iwebold ianim-t"><?php echo esc_html( $iwebunique_ourtim_title1 );?></p>
				<?php endif; ?>
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/iweb_dline.png" alt="<?php echo esc_attr__( 'Image not found','iwebunique' ); ?>" />
				<?php add_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_short' );
				add_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );?>
					<?php the_excerpt();?>
				<?php remove_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );
				remove_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_short' );?>
			</div><!--
			--><div class="iwebunique-ourtim-a3 iweb-show600" style="background-image: url( <?php echo esc_url( $iwebunique_ourtim_thum ); ?> );">
				<i class="fa fa-caret-right fa-4x"></i>
			</div>
		</div>
		<?php endif; ?>         <!-- For $iwebunique_ourtim_lr=1 -->

		<?php $iwebunique_ourtim_lr++ ;?>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		<?php endif;?>

	</div>
</div>
<?php endif; ?>  <!-- Our Team section display enable -->

<!-- END - Our Team Section  -->

<!-- Testimonials Section  -->

<?php if ( get_theme_mod( 'iwebunique_tmonials_display', '0' ) === '1' ) :?>
<div class="iwebunique-tmonials">
	<div class="iwebunique-tmonials-a iwebunique-uline">
			<h1 class="tmarg-0 txtcolfff ianim-t"><?php echo esc_html( get_theme_mod( 'iwebunique_tmonials_title',__( 'Testimonials','iwebunique' ) ) );?></h1>

		<?php
		$iwebunique_tmonials_cat = esc_html( get_theme_mod( 'iwebunique_tmonials_catg' ) );
		if ( 0 != $iwebunique_tmonials_cat ) :
				$iwebunique_tmonials_args = array(
					'cat' => $iwebunique_tmonials_cat,
					'post_status' => 'publish',
					'posts_per_page' => 3,
				);
				$iwebunique_tmonials_query = new WP_Query( $iwebunique_tmonials_args );

			if ( $iwebunique_tmonials_query->have_posts() ) :
				while ( $iwebunique_tmonials_query->have_posts() ) :
					$iwebunique_tmonials_query->the_post();
		?>
		<div class="iwebunique-tmonials-a1">
			<i class="fa fa-quote-left fa-3x fa-pull-left"></i>
			<?php if ( 1 == esc_html( get_theme_mod( 'iwebunique_tmonials_hyplnk', '0' ) ) ) :?>
				<a href="<?php the_permalink();?>">
			<?php endif; ?>
			<?php if ( has_post_thumbnail() ) :?>
					<?php the_post_thumbnail( 'full' );?>
			<?php else : ?>
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/defaultimage.jpg" alt="<?php echo esc_attr__( 'No Image Found','iwebunique' ); ?>" />
			<?php endif; ?>
			<h5 class="iwebunique-tmonials-name ianim-t"><?php the_title();?></h5>
			<?php if ( 1 == esc_html( get_theme_mod( 'iwebunique_tmonials_hyplnk', '0' ) ) ) :?>
				</a>
			<?php endif; ?>
				<?php add_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_others' );
				add_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );?>
					<?php the_excerpt();?>
				<?php remove_filter( 'excerpt_more', 'iwebunique_change_link_excerpt' );
					remove_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_others' );?>
		</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		<?php endif;?>

	</div>
</div>
<?php endif; ?>  <!-- Testimonials section display enable -->

<!-- END - Testimonials Section  -->

<!-- Latest News  -->

<?php if ( get_theme_mod( 'iwebunique_lnews_display', '0' ) == '1' ) : ?>
<div class="iwebunique-lnews">
	<div class="iwebunique-lnews-w">
			<h1 class="iwebunique-sectitle"><?php echo esc_html( get_theme_mod( 'iwebunique_lnews_title',__( 'Latest News','iwebunique' ) ) );?></h1>
				<p id="iwebunique_lnews-cuslive" class="iwebunique-secdesc"><?php echo esc_html( get_theme_mod( 'iwebunique_lnews_desc' ) );?></p>
		<?php
			   $iwebunique_news_cat = esc_html( get_theme_mod( 'iwebunique_lnews_catg' ) );
		if ( 0 != $iwebunique_news_cat ) :
		?>
			<?php
				$iwebunique_news_args = array(
					'cat' => $iwebunique_news_cat,
					'post_status' => 'publish',
					'posts_per_page' => 3,
				);
				$iwebunique_news_query = new WP_Query( $iwebunique_news_args );
				$iwebunique_news_sbar = 3;

			if ( $iwebunique_news_query->have_posts() ) :
				while ( $iwebunique_news_query->have_posts() ) :
						$iwebunique_news_query->the_post();
			?>
			<?php if ( has_post_thumbnail() ) : ?>
				<?php $iwebunique_lnews_thum = get_the_post_thumbnail_url( get_the_ID(),'full' ); ?>
			<?php else : ?>
				<?php $iwebunique_lnews_thum = esc_url( get_template_directory_uri() . '/img/defaultimage.jpg' );?>
			<?php endif; ?>

		<div class="iwebunique-lnews-a1">
				<a href="<?php the_permalink(); ?>">
				<div class="iwebunique-lnews-b1" style="background-image: url( <?php echo esc_url( $iwebunique_lnews_thum ); ?> );">
					<div class="iwebunique-lnews-title">
						<h5><?php the_title();?></h5>
					</div>
				</div></a>
			<div class="iwebunique-lnews-exp">
				<p style="color:#b0b0b0;"><?php the_time( 'F j, Y' );?></p>
				<?php add_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_short' );
				add_filter( 'excerpt_more', 'iwebunique_change_link_excerpt_oth' );
					the_excerpt();
				remove_filter( 'excerpt_more', 'iwebunique_change_link_excerpt_oth' );
				remove_filter( 'excerpt_length', 'iwebunique_custom_excerpt_length_short' );?>
			</div>
		</div>
		<?php  endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		<?php endif; ?>
	 </div>
</div>
<?php endif; ?>

<!-- END - Latest News  -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
