<?php
/**
 * IWeb unique Theme Customizer
 *
 * @package iwebunique
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

	// Load customize sanitize.
	get_template_part( '/inc/active-callback' );

function iwebunique_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'iwebunique_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'iwebunique_customize_partial_blogdescription',
		) );
	}

	// ----------------------------------------------------------------------
	// Add Theme Options Panel
	$wp_customize->add_panel('iwebunique_options_panel',array(
			'priority' => '51',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => esc_html__( 'Theme Options','iwebunique' ),
			'description' => __( 'Visit <a target="_blank" href="http://www.iwebdm.com/wordpress-themes/documentation-unique/">Documentation</a> for creating these sections.', 'iwebunique' ),
	));

	// Theme Color ----------------------------------

		   $wp_customize->add_section('iwebunique_themesettings',array(
				'title' => __( 'Theme Settings','iwebunique' ),
				'priority' => '10',
				'capability' => 'edit_theme_options',
				'panel' => 'iwebunique_options_panel',
		   ));

					$wp_customize->add_setting('iweb_theme_color', array(
						'default' => '#e6be1e',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'iwebunique_color_sanitize_radio',
					));

					$wp_customize->add_control('iweb_theme_color',array(
						'type' => 'radio',
						'label' => __( 'Select Theme Color', 'iwebunique' ),
						'section' => 'iwebunique_themesettings',
						'choices' => array(
							'#e6be1e' => __( 'Yellow','iwebunique' ),
							'#4d94ff' => __( 'Blue','iwebunique' ),
							'#00bd86' => __( 'Green','iwebunique' ),
							),
					));
	// Breadcrumb
					$wp_customize->add_setting('iwebunique_display_breadcrumb', array(
						'default' => '1',
						'sanitize_callback' => 'iwebunique_sanitize_radio',
					));

					$wp_customize->add_control('iwebunique_display_breadcrumb',array(
						'type' => 'radio',
						'label' => __( 'Display Breadcrumb', 'iwebunique' ),
						'section' => 'iwebunique_themesettings',
						'choices' => array(
							'1' => __( 'Enable','iwebunique' ),
							'0' => __( 'Disable','iwebunique' ),
							),
					));
	// Post/Page Header Background Image
						$wp_customize->add_setting('iwebunique_pheader_bgimg', array(
							'default' => '',
							'capability' => 'edit_theme_options',
							'sanitize_callback' => 'iwebunique_sanitize_file',
						));

						$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'iwebunique_pheader_bgimg', array(
							'label' => __( 'Page/Post Header Background Image', 'iwebunique' ),
							'description' => __( 'Your theme works best with an image with a header size of 1920 x 400 pixels', 'iwebunique' ),
							'section' => 'iwebunique_themesettings',
							'setting' => 'iwebunique_pheader_bgimg',
						)));

	// Slider ----------------------------------

			$wp_customize->add_section('iwebunique_slider',array(
				'title' => __( 'Slider','iwebunique' ),
				'priority' => '20',
				'capability' => 'edit_theme_options',
				'panel' => 'iwebunique_options_panel',
			));

					  $wp_customize->add_setting('iwebunique_display_mslider', array(
						  'default' => '1',
						  'sanitize_callback' => 'iwebunique_sanitize_radio',
					  ));

					$wp_customize->add_control('iwebunique_display_mslider',array(
						'type' => 'radio',
						'label' => __( 'Display Slider or A Static Image', 'iwebunique' ),
						'description' => __( 'Recommended Size for Featured Image in Post is 1600px x 600px','iwebunique' ),
						'section' => 'iwebunique_slider',
						'choices' => array(
							'1' => __( 'A Static Image','iwebunique' ),
							'0' => __( 'Slider','iwebunique' ),
						),
					));

		   //select category
					$wp_customize->add_setting('iwebunique_slider_category',array(
						'default' => '',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'absint',
					));

					$wp_customize->add_control( new Iwebunique_WP_Customize_Category_Control( $wp_customize,'iwebunique_slider_category', array(
						'label' => __( 'Select a category to show in slider','iwebunique' ),
						'section' => 'iwebunique_slider',
						'setting' => 'iwebunique_slider_category',
					)));

	// ------------------------------- Featured Services

			$wp_customize->add_section('iwebunique_fdservices',array(
				'title' => __( 'Featured Services','iwebunique' ),
				 'description' => __( 'Creat 4 posts in a category. First 3 posts will be displayed with Featured Image and Title. Oldest will be displayed with Excerpt and Title. <br>Visit <a target="_blank" href="http://www.iwebdm.com/wordpress-themes/documentation-unique/">Documentation</a> for creating this section.', 'iwebunique' ),
				'priority' => '30',
				'capability' => 'edit_theme_options',
				'panel' => 'iwebunique_options_panel',
			));

	// Display
					 $wp_customize->add_setting('iwebunique_display_fdservices', array(
						 'default' => '0',
						 'sanitize_callback' => 'iwebunique_sanitize_radio',
					 ));

					$wp_customize->add_control('iwebunique_display_fdservices',array(
						'type' => 'radio',
						'label' => __( 'Display Featured Services Section', 'iwebunique' ),
						'section' => 'iwebunique_fdservices',
						'choices' => array(
							'1' => __( 'Enable','iwebunique' ),
							'0' => __( 'Disable','iwebunique' ),
							),
					));
		   //select category
					$wp_customize->add_setting('iwebunique_fdservices_catg',array(
						'default' => '',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'absint',
					));

					$wp_customize->add_control( new Iwebunique_WP_Customize_Category_Control( $wp_customize,'iwebunique_fdservices_catg', array(
						'label' => __( 'Select a category','iwebunique' ),
						'section' => 'iwebunique_fdservices',
						'setting' => 'iwebunique_fdservices_catg',
					)));
	// Post Hyperlink
					$wp_customize->add_setting('iwebunique_fdservices_hyplnk', array(
						'default' => '0',
						'sanitize_callback' => 'iwebunique_sanitize_radio',
					));

					$wp_customize->add_control('iwebunique_fdservices_hyplnk',array(
						'type' => 'radio',
						'label' => __( 'Post Hyperlink', 'iwebunique' ),
						'section' => 'iwebunique_fdservices',
						'choices' => array(
							'1' => __( 'Enable','iwebunique' ),
							'0' => __( 'Disable','iwebunique' ),
							),
					));

	// ------------------------------- Our Services

			$wp_customize->add_section('iwebunique_ourservice',array(
				'title' => __( 'Our Services','iwebunique' ),
				'description' => __( 'Visit <a target="_blank" href="http://www.iwebdm.com/wordpress-themes/documentation-unique/">Documentation</a> for creating this section.','iwebunique' ),
				'priority' => '35',
				'capability' => 'edit_theme_options',
				'panel' => 'iwebunique_options_panel',
			));

	// Display
					 $wp_customize->add_setting('iwebunique_display_ourservices', array(
						 'default' => '0',
						 'sanitize_callback' => 'iwebunique_sanitize_radio',
					 ));

					$wp_customize->add_control('iwebunique_display_ourservices',array(
						'type' => 'radio',
						'label' => __( 'Display Our Services Section', 'iwebunique' ),
						'section' => 'iwebunique_ourservice',
						'choices' => array(
							'1' => __( 'Enable','iwebunique' ),
							'0' => __( 'Disable','iwebunique' ),
							),
					));

	//  Title
				   $wp_customize->add_setting('iwebunique_ourservices_title', array(
						'default' => __( 'Our Services','iwebunique' ),
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
				   ));
					$wp_customize->add_control( 'iwebunique_ourservices_title',array(
						'type' => 'text',
						'label' => __( 'Title','iwebunique' ),
						'section' => 'iwebunique_ourservice',
						'setting' => 'iwebunique_ourservices_title',
					));
	// Description
				  $wp_customize->add_setting('iwebunique_ourservices_desc', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_textarea_field',
				  ));
					$wp_customize->add_control( 'iwebunique_ourservices_desc',array(
						'type' => 'textarea',
						'label' => __( 'Description','iwebunique' ),
						'section' => 'iwebunique_ourservice',
						'setting' => 'iwebunique_ourservices_desc',
					));
	// No of Rows
					 $wp_customize->add_setting('iwebunique_os_rows', array(
						 'default' => '1',
						 'capability'        => 'edit_theme_options',
						 'sanitize_callback' => 'iwebunique_sanitize_number_range',
					 ));

					$wp_customize->add_control('iwebunique_os_rows',array(
						'label' => __( 'No. of Rows', 'iwebunique' ),
						'section' => 'iwebunique_ourservice',
						'type'        => 'number',
						'input_attrs' => array(
								'min'	=> 1,
								'max'	=> 2,
								'step'	=> 1,
							),
					));
	// No of Cols in a Row
					 $wp_customize->add_setting('iwebunique_os_cols', array(
						 'default' => '3',
						 'capability'        => 'edit_theme_options',
						 'sanitize_callback' => 'iwebunique_sanitize_number_range',
					 ));

					$wp_customize->add_control('iwebunique_os_cols',array(
						'label' => __( 'No. of Column Per Row', 'iwebunique' ),
						'section' => 'iwebunique_ourservice',
						'type'        => 'number',
						'input_attrs' => array(
								'min'	=> 3,
								'max'	=> 4,
								'step'	=> 1,
							),
					));

	// Select Icon #1
				  $wp_customize->add_setting('iwebunique_ourservices_ic1', array(
						'default' => '',
						'sanitize_callback' => 'sanitize_text_field',
				  ));
					$wp_customize->add_control( 'iwebunique_ourservices_ic1',array(
						'type' => 'text',
						'label' => __( 'Select Icon #1','iwebunique' ),
						'description' => __( 'Please input icon as eg: fa-archive. Find Font-awesome icons <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">here</a>', 'iwebunique' ),
						'section' => 'iwebunique_ourservice',
						'setting' => 'iwebunique_ourservices_ic1',
					));
	//select Page #1
				$wp_customize->add_setting('iwebunique_ourservices_p1',array(
					'default' => '0',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'absint',
				));

				$wp_customize->add_control( 'iwebunique_ourservices_p1',array(
					'type' => 'dropdown-pages',
					'label' => __( 'Select Page "#"1','iwebunique' ),
					'section' => 'iwebunique_ourservice',
					'setting' => 'iwebunique_ourservices_p1',
				));
	// Select Icon #2
				  $wp_customize->add_setting('iwebunique_ourservices_ic2', array(
						'default' => '',
						'sanitize_callback' => 'sanitize_text_field',
				  ));
					$wp_customize->add_control( 'iwebunique_ourservices_ic2',array(
						'type' => 'text',
						'label' => __( 'Select Icon #2','iwebunique' ),
						'description' => __( 'Please input icon as eg: fa-archive. Find Font-awesome icons <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">here</a>', 'iwebunique' ),
						'section' => 'iwebunique_ourservice',
						'setting' => 'iwebunique_ourservices_ic2',
					));
	//select Page #2
				$wp_customize->add_setting('iwebunique_ourservices_p2',array(
					'default' => '0',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'absint',
				));

				$wp_customize->add_control( 'iwebunique_ourservices_p2',array(
					'type' => 'dropdown-pages',
					'label' => __( 'Select Page #2','iwebunique' ),
					'section' => 'iwebunique_ourservice',
					'setting' => 'iwebunique_ourservices_p2',
				));
	// Select Icon #3
				  $wp_customize->add_setting('iwebunique_ourservices_ic3', array(
						'default' => '',
						'sanitize_callback' => 'sanitize_text_field',
				  ));
					$wp_customize->add_control( 'iwebunique_ourservices_ic3',array(
						'type' => 'text',
						'label' => __( 'Select Icon #3','iwebunique' ),
						'description' => __( 'Please input icon as eg: fa-archive. Find Font-awesome icons <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">here</a>', 'iwebunique' ),
						'section' => 'iwebunique_ourservice',
						'setting' => 'iwebunique_ourservices_ic3',
					));
	//select Page #3
				$wp_customize->add_setting('iwebunique_ourservices_p3',array(
					'default' => '0',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'absint',
				));

				$wp_customize->add_control( 'iwebunique_ourservices_p3',array(
					'type' => 'dropdown-pages',
					'label' => __( 'Select Page #3','iwebunique' ),
					'section' => 'iwebunique_ourservice',
					'setting' => 'iwebunique_ourservices_p3',
				));
	// Select Icon #4
				  $wp_customize->add_setting('iwebunique_ourservices_ic4', array(
						'default' => '',
						'sanitize_callback' => 'sanitize_text_field',
				  ));
					$wp_customize->add_control( 'iwebunique_ourservices_ic4',array(
						'type' => 'text',
						'label' => __( 'Select Icon #4','iwebunique' ),
						'description' => __( 'Please input icon as eg: fa-archive. Find Font-awesome icons <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">here</a>', 'iwebunique' ),
						'section' => 'iwebunique_ourservice',
						'setting' => 'iwebunique_ourservices_ic4',
					));
	//select Page #4
				$wp_customize->add_setting('iwebunique_ourservices_p4',array(
					'default' => '0',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'absint',
				));

				$wp_customize->add_control( 'iwebunique_ourservices_p4',array(
					'type' => 'dropdown-pages',
					'label' => __( 'Select Page #4','iwebunique' ),
					'section' => 'iwebunique_ourservice',
					'setting' => 'iwebunique_ourservices_p4',
				));
	// Select Icon #5
				  $wp_customize->add_setting('iwebunique_ourservices_ic5', array(
						'default' => '',
						'sanitize_callback' => 'sanitize_text_field',
				  ));
					$wp_customize->add_control( 'iwebunique_ourservices_ic5',array(
						'type' => 'text',
						'label' => __( 'Select Icon #5','iwebunique' ),
						'description' => __( 'Please input icon as eg: fa-archive. Find Font-awesome icons <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">here</a>', 'iwebunique' ),
						'section' => 'iwebunique_ourservice',
						'setting' => 'iwebunique_ourservices_ic5',
						'active_callback' => 'iwebunique_ourservices_row2',
					));
	//select Page #5
				$wp_customize->add_setting('iwebunique_ourservices_p5',array(
					'default' => '0',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'absint',
				));

				$wp_customize->add_control( 'iwebunique_ourservices_p5',array(
					'type' => 'dropdown-pages',
					'label' => __( 'Select Page #5','iwebunique' ),
					'section' => 'iwebunique_ourservice',
					'setting' => 'iwebunique_ourservices_p5',
					'active_callback' => 'iwebunique_ourservices_row2',
				));
	// Select Icon #6
				  $wp_customize->add_setting('iwebunique_ourservices_ic6', array(
						'default' => '',
						'sanitize_callback' => 'sanitize_text_field',
				  ));
					$wp_customize->add_control( 'iwebunique_ourservices_ic6',array(
						'type' => 'text',
						'label' => __( 'Select Icon #6','iwebunique' ),
						'description' => __( 'Please input icon as eg: fa-archive. Find Font-awesome icons <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">here</a>', 'iwebunique' ),
						'section' => 'iwebunique_ourservice',
						'setting' => 'iwebunique_ourservices_ic6',
						'active_callback' => 'iwebunique_ourservices_row2',
					));
	//select Page #6
				$wp_customize->add_setting('iwebunique_ourservices_p6',array(
					'default' => '0',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'absint',
				));

				$wp_customize->add_control( 'iwebunique_ourservices_p6',array(
					'type' => 'dropdown-pages',
					'label' => __( 'Select Page #6','iwebunique' ),
					'section' => 'iwebunique_ourservice',
					'setting' => 'iwebunique_ourservices_p6',
					'active_callback' => 'iwebunique_ourservices_row2',
				));
	// Select Icon #7
				  $wp_customize->add_setting('iwebunique_ourservices_ic7', array(
						'default' => '',
						'sanitize_callback' => 'sanitize_text_field',
				  ));
					$wp_customize->add_control( 'iwebunique_ourservices_ic7',array(
						'type' => 'text',
						'label' => __( 'Select Icon #7','iwebunique' ),
						'description' => __( 'Please input icon as eg: fa-archive. Find Font-awesome icons <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">here</a>', 'iwebunique' ),
						'section' => 'iwebunique_ourservice',
						'setting' => 'iwebunique_ourservices_ic7',
						'active_callback' => 'iwebunique_ourservices_row2',
					));
	//select Page #7
				$wp_customize->add_setting('iwebunique_ourservices_p7',array(
					'default' => '0',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'absint',
				));

				$wp_customize->add_control( 'iwebunique_ourservices_p7',array(
					'type' => 'dropdown-pages',
					'label' => __( 'Select Page #7','iwebunique' ),
					'section' => 'iwebunique_ourservice',
					'setting' => 'iwebunique_ourservices_p7',
					'active_callback' => 'iwebunique_ourservices_row2',
				));
	// Select Icon #8
				  $wp_customize->add_setting('iwebunique_ourservices_ic8', array(
						'default' => '',
						'sanitize_callback' => 'sanitize_text_field',
				  ));
					$wp_customize->add_control( 'iwebunique_ourservices_ic8',array(
						'type' => 'text',
						'label' => __( 'Select Icon #8','iwebunique' ),
						'description' => __( 'Please input icon as eg: fa-archive. Find Font-awesome icons <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">here</a>', 'iwebunique' ),
						'section' => 'iwebunique_ourservice',
						'setting' => 'iwebunique_ourservices_ic8',
						'active_callback' => 'iwebunique_ourservices_row2',
					));
	//select Page #8
				$wp_customize->add_setting('iwebunique_ourservices_p8',array(
					'default' => '0',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'absint',
				));

				$wp_customize->add_control( 'iwebunique_ourservices_p8',array(
					'type' => 'dropdown-pages',
					'label' => __( 'Select Page #8','iwebunique' ),
					'section' => 'iwebunique_ourservice',
					'setting' => 'iwebunique_ourservices_p8',
					'active_callback' => 'iwebunique_ourservices_row2',
				));

	// ------------------------------- About Us

		   $wp_customize->add_section('iwebunique_aboutus',array(
				'title' => __( 'About Us','iwebunique' ),
				'description' => __( 'Select background image from media library with recommended size 1920x900 px. Select a page from dropdown and setting a featured image in page editor.<br>Visit <a target="_blank" href="http://www.iwebdm.com/wordpress-themes/documentation-unique/">Documentation</a> for creating this section.','iwebunique' ),
				'priority' => '40',
				'capability' => 'edit_theme_options',
				'panel' => 'iwebunique_options_panel',
		   ));

	// Display
					 $wp_customize->add_setting('iwebunique_display_abtus', array(
						 'default' => '0',
						 'sanitize_callback' => 'iwebunique_sanitize_radio',
					 ));

					$wp_customize->add_control('iwebunique_display_abtus',array(
						'type' => 'radio',
						'label' => __( 'Display About Us Section', 'iwebunique' ),
						'section' => 'iwebunique_aboutus',
						'choices' => array(
							'1' => __( 'Enable','iwebunique' ),
							'0' => __( 'Disable','iwebunique' ),
							),
					));

	// BG Image
						$wp_customize->add_setting('iwebunique_abtus_bg_img', array(
							'default' => '',
							'capability' => 'edit_theme_options',
							'sanitize_callback' => 'iwebunique_sanitize_file',
						));

						$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'iwebunique_abtus_bg_img', array(
							'label' => __( 'Background Image', 'iwebunique' ),
							'description' => __( 'Recommended Size 1600x1200', 'iwebunique' ),
							'section' => 'iwebunique_aboutus',
							'setting' => 'iwebunique_abtus_bg_img',
						)));
	//select a page for About Us
				$wp_customize->add_setting('iwebunique_aboutus_catg',array(
					'default' => '',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'absint',
				));

				$wp_customize->add_control( 'iwebunique_aboutus_catg',array(
					'type' => 'dropdown-pages',
					'label' => __( 'Select a Page','iwebunique' ),
					'section' => 'iwebunique_aboutus',
					'setting' => 'iwebunique_aboutus_catg',
				));

	// Featured Section-1 -------------------------------

			 $wp_customize->add_section('iwebunique_fs1',array(
				 'title' => __( 'Featured Section 1','iwebunique' ),
				 'description' => __( 'if you select a category with minimum 2 posts, this will give a better look.<br>Visit <a target="_blank" href="http://www.iwebdm.com/wordpress-themes/documentation-unique/">Documentation</a> for creating this section.','iwebunique' ),
				 'priority' => '45',
				 'capability' => 'edit_theme_options',
				 'panel' => 'iwebunique_options_panel',
			 ));
		// Display
					$wp_customize->add_setting('iwebunique_display_fs1', array(
						'default' => '0',
						'sanitize_callback' => 'iwebunique_sanitize_radio',
					));

					$wp_customize->add_control('iwebunique_display_fs1',array(
						'type' => 'radio',
						'label' => __( 'Display Featured Section 1', 'iwebunique' ),
						'section' => 'iwebunique_fs1',
						'choices' => array(
							'1' => __( 'Enable','iwebunique' ),
							'0' => __( 'Disable','iwebunique' ),
							),
					));
		//select category
					$wp_customize->add_setting('iwebunique_fs1_catg',array(
						'default' => '',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'absint',
					));

					$wp_customize->add_control( new Iwebunique_WP_Customize_Category_Control( $wp_customize,'iwebunique_fs1_catg', array(
						'label' => __( 'Select a Category','iwebunique' ),
						'section' => 'iwebunique_fs1',
						'setting' => 'iwebunique_fs1_catg',
					)));

	// Featured Section 2 --------------------------------

			 $wp_customize->add_section('iwebunique_fs2',array(
				 'title' => __( 'Featured Section 2','iwebunique' ),
				 'description' => __( 'In this section a single post is required, Featured Image will be displayed as background image and excerpt will be displayed as text.<br>Empty button text will not display the button.<br>Visit <a target="_blank" href="http://www.iwebdm.com/wordpress-themes/documentation-unique/">Documentation</a> for creating this section.','iwebunique' ),
				 'priority' => '50',
				 'capability' => 'edit_theme_options',
				 'panel' => 'iwebunique_options_panel',
			 ));

		// Display
					$wp_customize->add_setting('iwebunique_display_fs2', array(
						'default' => '0',
						'sanitize_callback' => 'iwebunique_sanitize_radio',
					));

					$wp_customize->add_control('iwebunique_display_fs2',array(
						'type' => 'radio',
						'label' => __( 'Display Featured Section 2', 'iwebunique' ),
						'section' => 'iwebunique_fs2',
						'choices' => array(
							'1' => __( 'Enable','iwebunique' ),
							'0' => __( 'Disable','iwebunique' ),
							),
					));
		//select category
					$wp_customize->add_setting('iwebunique_fs2_catg',array(
						'default' => '',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'absint',
					));

					$wp_customize->add_control( new Iwebunique_WP_Customize_Category_Control( $wp_customize,'iwebunique_fs2_catg', array(
						'label' => __( 'Select a Category','iwebunique' ),
						'section' => 'iwebunique_fs2',
						'setting' => 'iwebunique_fs2_catg',
					)));
	  // Button Text
					$wp_customize->add_setting('iwebunique_fs2_btntext', array(
						'default' => '',
						'capability' => 'edit_theme_options',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					));
					$wp_customize->add_control('iwebunique_fs2_btntext',array(
						'type' => 'text',
						'label' => __( 'Button Text', 'iwebunique' ),
						'section' => 'iwebunique_fs2',
						'setting' => 'iwebunique_fs2_btntext',
					));
		// button link
					$wp_customize->add_setting('iwebunique_fs2_btnlink', array(
						'default' => '#',
						'capability' => 'edit_theme_options',
						'transport' => 'postMessage',
						'sanitize_callback' => 'esc_url_raw',
					));
					$wp_customize->add_control('iwebunique_fs2_btnlink',array(
						'type' => 'url',
						'label' => __( 'Button Url', 'iwebunique' ),
						'section' => 'iwebunique_fs2',
						'setting' => 'iwebunique_fs2_btnlink',
					));

	// Our Skills --------------------------------

			 $wp_customize->add_section('iwebunique_oskil',array(
				 'title' => __( 'Our Skills','iwebunique' ),
				 'description' => __( 'Visit <a target="_blank" href="http://www.iwebdm.com/wordpress-themes/documentation-unique/">Documentation</a> for creating this section.','iwebunique' ),
				 'priority' => '55',
				 'capability' => 'edit_theme_options',
				 'panel' => 'iwebunique_options_panel',
			 ));

		// Display
					$wp_customize->add_setting('iwebunique_display_oskil', array(
						'default' => '0',
						'sanitize_callback' => 'iwebunique_sanitize_radio',
					));

					$wp_customize->add_control('iwebunique_display_oskil',array(
						'type' => 'radio',
						'label' => __( 'Display Our Skills Section', 'iwebunique' ),
						'section' => 'iwebunique_oskil',
						'choices' => array(
							'1' => __( 'Enable','iwebunique' ),
							'0' => __( 'Disable','iwebunique' ),
							),
					));
	   // Skill 1
					$wp_customize->add_setting('iwebunique_oskil1_text', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					));

					$wp_customize->add_control('iwebunique_oskil1_text',array(
						'type' => 'text',
						'label' => __( 'Skill 1','iwebunique' ),
						'section' => 'iwebunique_oskil',
						'setting' => 'iwebunique_oskil1_text',
					));
					$wp_customize->add_setting('iwebunique_oskil1_prct', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'absint',
					));

					$wp_customize->add_control('iwebunique_oskil1_prct',array(
						'type' => 'number',
						'description' => __( 'Percentage','iwebunique' ),
						'section' => 'iwebunique_oskil',
						'setting' => 'iwebunique_oskil1_prct',
					));
		// Skill 2
					$wp_customize->add_setting('iwebunique_oskil2_text', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					));

					$wp_customize->add_control('iwebunique_oskil2_text',array(
						'type' => 'text',
						'label' => __( 'Skill 2','iwebunique' ),
						'section' => 'iwebunique_oskil',
						'setting' => 'iwebunique_oskil2_text',
					));
					$wp_customize->add_setting('iwebunique_oskil2_prct', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'absint',
					));

					$wp_customize->add_control('iwebunique_oskil2_prct',array(
						'type' => 'number',
						'description' => __( 'Percentage','iwebunique' ),
						'section' => 'iwebunique_oskil',
						'setting' => 'iwebunique_oskil2_prct',
					));
	   // Skill 3
					$wp_customize->add_setting('iwebunique_oskil3_text', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					));

					$wp_customize->add_control('iwebunique_oskil3_text',array(
						'type' => 'text',
						'label' => __( 'Skill 3','iwebunique' ),
						'section' => 'iwebunique_oskil',
						'setting' => 'iwebunique_oskil3_text',
					));
					$wp_customize->add_setting('iwebunique_oskil3_prct', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'absint',
					));

					$wp_customize->add_control('iwebunique_oskil3_prct',array(
						'type' => 'number',
						'description' => __( 'Percentage','iwebunique' ),
						'section' => 'iwebunique_oskil',
						'setting' => 'iwebunique_oskil3_prct',
					));
	   // Skill 4
					$wp_customize->add_setting('iwebunique_oskil4_text', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					));

					$wp_customize->add_control('iwebunique_oskil4_text',array(
						'type' => 'text',
						'label' => __( 'Skill 4','iwebunique' ),
						'section' => 'iwebunique_oskil',
						'setting' => 'iwebunique_oskil4_text',
					));
					$wp_customize->add_setting('iwebunique_oskil4_prct', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'absint',
					));

					$wp_customize->add_control('iwebunique_oskil4_prct',array(
						'type' => 'number',
						'description' => __( 'Percentage','iwebunique' ),
						'section' => 'iwebunique_oskil',
						'setting' => 'iwebunique_oskil4_prct',
					));
	//select a page for Our Skills
				$wp_customize->add_setting('iwebunique_oskil_page',array(
					'default' => '',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'absint',
				));

				$wp_customize->add_control( 'iwebunique_oskil_page',array(
					'type' => 'dropdown-pages',
					'label' => __( 'Select a Page','iwebunique' ),
					'section' => 'iwebunique_oskil',
					'setting' => 'iwebunique_oskil_page',
				));

	// Portfolio --------------------------------

			 $wp_customize->add_section('iwebunique_pfolio',array(
				 'title' => __( 'Portfolio','iwebunique' ),
				 'description' => __( 'Select a category with minimum 4 posts. Minimum 8 posts required for 2 rows. You can Enable/Disable post hyperlink. Always use same width and height images for all the posts as a featured image for better look.<br>Visit <a target="_blank" href="http://www.iwebdm.com/wordpress-themes/documentation-unique/">Documentation</a> for creating this section.','iwebunique' ),
				 'priority' => '60',
				 'capability' => 'edit_theme_options',
				 'panel' => 'iwebunique_options_panel',
			 ));

		// Display
					$wp_customize->add_setting('iwebunique_pfolio_display', array(
						'default' => '0',
						'sanitize_callback' => 'iwebunique_sanitize_radio',
					));

					$wp_customize->add_control('iwebunique_pfolio_display',array(
						'type' => 'radio',
						'label' => __( 'Display Portfolio Section', 'iwebunique' ),
						'section' => 'iwebunique_pfolio',
						'choices' => array(
							'1' => __( 'Enable','iwebunique' ),
							'0' => __( 'Disable','iwebunique' ),
							),
					));
		// Sub-Title
					$wp_customize->add_setting('iwebunique_pfolio_stitle', array(
						'default' => __( 'PORTFOLIO','iwebunique' ),
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					));

					$wp_customize->add_control('iwebunique_pfolio_stitle',array(
						'type' => 'text',
						'label' => __( 'SubTitle','iwebunique' ),
						'section' => 'iwebunique_pfolio',
						'setting' => 'iwebunique_pfolio_stitle',
					));
	   // Title
					$wp_customize->add_setting('iwebunique_pfolio_title', array(
						'default' => __( 'Checkout our latest projects','iwebunique' ),
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					));

					$wp_customize->add_control('iwebunique_pfolio_title',array(
						'type' => 'text',
						'label' => __( 'Title','iwebunique' ),
						'section' => 'iwebunique_pfolio',
						'setting' => 'iwebunique_pfolio_title',
					));
	   //select category
					$wp_customize->add_setting('iwebunique_pfolio_catg',array(
						'default' => '0',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'absint',
					));

					$wp_customize->add_control( new Iwebunique_WP_Customize_Category_Control( $wp_customize,'iwebunique_pfolio_catg', array(
						'label' => __( 'Select a Category','iwebunique' ),
						'section' => 'iwebunique_pfolio',
						'setting' => 'iwebunique_pfolio_catg',
					)));
	// No of Rows
					 $wp_customize->add_setting('iwebunique_pfolio_rows', array(
						 'default' => '1',
						 'capability'        => 'edit_theme_options',
						 'sanitize_callback' => 'iwebunique_sanitize_number_range',
					 ));

					$wp_customize->add_control('iwebunique_pfolio_rows',array(
						'label' => __( 'No. of Rows', 'iwebunique' ),
						'section' => 'iwebunique_pfolio',
						'type'        => 'number',
						'input_attrs' => array(
								'min'	=> 1,
								'max'	=> 2,
								'step'	=> 1,
							),
					));
	   // Post Hyperlink
					$wp_customize->add_setting('iwebunique_pfolio_hyplnk', array(
						'default' => '1',
						'sanitize_callback' => 'iwebunique_sanitize_radio',
					));

					$wp_customize->add_control('iwebunique_pfolio_hyplnk',array(
						'type' => 'radio',
						'label' => __( 'Post Hyperlink', 'iwebunique' ),
						'section' => 'iwebunique_pfolio',
						'choices' => array(
							'1' => __( 'Enable','iwebunique' ),
							'0' => __( 'Disable','iwebunique' ),
							),
					));

	// Our Team --------------------------------

			 $wp_customize->add_section('iwebunique_ourtim',array(
				 'title' => __( 'Our Team','iwebunique' ),
				 'description' => __( '<strong>Important: </strong>Visit <a target="_blank" href="http://www.iwebdm.com/wordpress-themes/documentation-unique/">Documentation</a> for creating this section.', 'iwebunique' ),
				 'priority' => '65',
				 'capability' => 'edit_theme_options',
				 'panel' => 'iwebunique_options_panel',
			 ));

		// Display
					$wp_customize->add_setting('iwebunique_ourtim_display', array(
						'default' => '0',
						'sanitize_callback' => 'iwebunique_sanitize_radio',
					));

					$wp_customize->add_control('iwebunique_ourtim_display',array(
						'type' => 'radio',
						'label' => __( 'Display Our Team Section', 'iwebunique' ),
						'section' => 'iwebunique_ourtim',
						'choices' => array(
							'1' => __( 'Enable','iwebunique' ),
							'0' => __( 'Disable','iwebunique' ),
							),
					));
	//  Title
				   $wp_customize->add_setting('iwebunique_ourtim_title', array(
						'default' => __( 'Our Team','iwebunique' ),
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
				   ));
					$wp_customize->add_control( 'iwebunique_ourtim_title',array(
						'type' => 'text',
						'label' => __( 'Title','iwebunique' ),
						'section' => 'iwebunique_ourtim',
						'setting' => 'iwebunique_ourtim_title',
					));
	// Description
				  $wp_customize->add_setting('iwebunique_ourtim_desc', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_textarea_field',
				  ));
					$wp_customize->add_control( 'iwebunique_ourtim_desc',array(
						'type' => 'textarea',
						'label' => __( 'Description','iwebunique' ),
						'section' => 'iwebunique_ourtim',
						'setting' => 'iwebunique_ourtim_desc',
					));
	//select category
					$wp_customize->add_setting('iwebunique_ourtim_catg',array(
						'default' => '0',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'absint',
					));

					$wp_customize->add_control( new Iwebunique_WP_Customize_Category_Control( $wp_customize,'iwebunique_ourtim_catg', array(
						'label' => __( 'Select a Category','iwebunique' ),
						'section' => 'iwebunique_ourtim',
						'setting' => 'iwebunique_ourtim_catg',
					)));

	// Testimonials --------------------------------

			 $wp_customize->add_section('iwebunique_tmonials',array(
				 'title' => __( 'Testimonials','iwebunique' ),
				 'description' => __( 'Visit <a target="_blank" href="http://www.iwebdm.com/wordpress-themes/documentation-unique/">Documentation</a> for creating this section.','iwebunique' ),
				 'priority' => '70',
				 'capability' => 'edit_theme_options',
				 'panel' => 'iwebunique_options_panel',
			 ));

		// Display
					$wp_customize->add_setting('iwebunique_tmonials_display', array(
						'default' => '0',
						'sanitize_callback' => 'iwebunique_sanitize_radio',
					));

					$wp_customize->add_control('iwebunique_tmonials_display',array(
						'type' => 'radio',
						'label' => __( 'Display Testimonials Section', 'iwebunique' ),
						'section' => 'iwebunique_tmonials',
						'choices' => array(
							'1' => __( 'Enable','iwebunique' ),
							'0' => __( 'Disable','iwebunique' ),
							),
					));
	// BG Image
						$wp_customize->add_setting('iwebunique_tmonials_bg_img', array(
							'default' => '',
							'capability' => 'edit_theme_options',
							'sanitize_callback' => 'iwebunique_sanitize_file',
						));

						$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'iwebunique_tmonials_bg_img', array(
							'label' => __( 'Background Image', 'iwebunique' ),
							'description' => __( 'Recommended Size 1600x1200', 'iwebunique' ),
							'section' => 'iwebunique_tmonials',
							'setting' => 'iwebunique_tmonials_bg_img',
						)));
	//  Title
				   $wp_customize->add_setting('iwebunique_tmonials_title', array(
						'default' => __( 'Testimonials','iwebunique' ),
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
				   ));
					$wp_customize->add_control( 'iwebunique_tmonials_title',array(
						'type' => 'text',
						'label' => __( 'Title','iwebunique' ),
						'section' => 'iwebunique_tmonials',
						'setting' => 'iwebunique_tmonials_title',
					));
	//select category
					$wp_customize->add_setting('iwebunique_tmonials_catg',array(
						'default' => '0',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'absint',
					));

					$wp_customize->add_control( new Iwebunique_WP_Customize_Category_Control( $wp_customize,'iwebunique_tmonials_catg', array(
						'label' => __( 'Select a Category','iwebunique' ),
						'section' => 'iwebunique_tmonials',
						'setting' => 'iwebunique_tmonials_catg',
					)));
	// Post Hyperlink
					$wp_customize->add_setting('iwebunique_tmonials_hyplnk', array(
						'default' => '0',
						'sanitize_callback' => 'iwebunique_sanitize_radio',
					));

					$wp_customize->add_control('iwebunique_tmonials_hyplnk',array(
						'type' => 'radio',
						'label' => __( 'Post Hyperlink', 'iwebunique' ),
						'section' => 'iwebunique_tmonials',
						'choices' => array(
							'1' => __( 'Enable','iwebunique' ),
							'0' => __( 'Disable','iwebunique' ),
							),
					));

	// Latest News --------------------------------

			 $wp_customize->add_section('iwebunique_lnews',array(
				 'title' => __( 'Latest News','iwebunique' ),
				 'description' => __( 'Visit <a target="_blank" href="http://www.iwebdm.com/wordpress-themes/documentation-unique/">Documentation</a> for creating this section.','iwebunique' ),
				 'priority' => '75',
				 'capability' => 'edit_theme_options',
				 'panel' => 'iwebunique_options_panel',
			 ));

		// Display
					$wp_customize->add_setting('iwebunique_lnews_display', array(
						'default' => '0',
						'sanitize_callback' => 'iwebunique_sanitize_radio',
					));

					$wp_customize->add_control('iwebunique_lnews_display',array(
						'type' => 'radio',
						'label' => __( 'Display Our Team Section', 'iwebunique' ),
						'section' => 'iwebunique_lnews',
						'choices' => array(
							'1' => __( 'Enable','iwebunique' ),
							'0' => __( 'Disable','iwebunique' ),
							),
					));
	   //  Title
				   $wp_customize->add_setting('iwebunique_lnews_title', array(
						'default' => __( 'Latest News','iwebunique' ),
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
				   ));
					$wp_customize->add_control( 'iwebunique_lnews_title',array(
						'type' => 'text',
						'label' => __( 'Title','iwebunique' ),
						'section' => 'iwebunique_lnews',
						'setting' => 'iwebunique_lnews_title',
					));
		// Description
				  $wp_customize->add_setting('iwebunique_lnews_desc', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_textarea_field',
				  ));
					$wp_customize->add_control( 'iwebunique_lnews_desc',array(
						'type' => 'textarea',
						'label' => __( 'Description','iwebunique' ),
						'section' => 'iwebunique_lnews',
						'setting' => 'iwebunique_lnews_desc',
					));
		//select category
					$wp_customize->add_setting('iwebunique_lnews_catg',array(
						'default' => '0',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'absint',
					));

					$wp_customize->add_control( new Iwebunique_WP_Customize_Category_Control( $wp_customize,'iwebunique_lnews_catg', array(
						'label' => __( 'Select a Category','iwebunique' ),
						'section' => 'iwebunique_lnews',
						'setting' => 'iwebunique_lnews_catg',
					)));

	// Footer Section ------------------------------------------

			   $wp_customize->add_section('iwebunique_footer_bg',array(
				   'title' => __( 'Footer Section','iwebunique' ),
				   'description' => __( 'Visit <a target="_blank" href="http://www.iwebdm.com/wordpress-themes/documentation-unique/">Documentation</a> for creating this section.','iwebunique' ),
				   'priority' => '80',
				   'capability' => 'edit_theme_options',
				   'panel' => 'iwebunique_options_panel',
			   ));

	   // Copyright Text
				$wp_customize->add_setting('iweb_copyright_text', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
				));

				$wp_customize->add_control('iweb_copyright_text',array(
						'type' => 'text',
						'label' => __( 'Footer Copyright Text','iwebunique' ),
						'section' => 'iwebunique_footer_bg',
						'setting' => 'iweb_copyright_text',
				));

	   // BG Image
				  $wp_customize->add_setting('iwebunique_footer_bgimg', array(
						'default' => '',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'iwebunique_sanitize_file',
				  ));

				   $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'iwebunique_footer_bgimg', array(
						'label' => __( 'Background Image for Footer Widgets', 'iwebunique' ),
						'description' => __( 'Recommended Size- 1600x600px', 'iwebunique' ),
						'section' => 'iwebunique_footer_bg',
						'setting' => 'iwebunique_footer_bgimg',
				   )));

		// Display Social Icons
					$wp_customize->add_setting('iwebunique_social_display', array(
						'default' => '0',
						'sanitize_callback' => 'iwebunique_sanitize_radio',
					));

					$wp_customize->add_control('iwebunique_social_display',array(
						'type' => 'radio',
						'label' => __( 'Display Social Icons Section', 'iwebunique' ),
						'section' => 'iwebunique_footer_bg',
						'choices' => array(
							'1' => __( 'Enable','iwebunique' ),
							'0' => __( 'Disable','iwebunique' ),
							),
					));
		// Social Icon #1
				  $wp_customize->add_setting('iwebunique_social1_icon', array(
						'default' => '',
						'sanitize_callback' => 'sanitize_text_field',
				  ));
					$wp_customize->add_control( 'iwebunique_social1_icon',array(
						'type' => 'text',
						'label' => __( 'Select Icon #1','iwebunique' ),
						'description' => __( 'Please input icon as eg: fa-facebook-square. Find Font-awesome icons <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">here</a>', 'iwebunique' ),
						'section' => 'iwebunique_footer_bg',
						'setting' => 'iwebunique_social1_icon',
						'active_callback' => 'iwebunique_footer_social',
					));
		  // Social Icon #1 URL
					$wp_customize->add_setting('iwebunique_social1_url', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'esc_url_raw',
					));

					$wp_customize->add_control('iwebunique_social1_url',array(
						'type' => 'url',
						'description' => __( 'Icon URL','iwebunique' ),
						'section' => 'iwebunique_footer_bg',
						'setting' => 'iwebunique_social1_url',
						'active_callback' => 'iwebunique_footer_social',
					));
		// Social Icon #2
				  $wp_customize->add_setting('iwebunique_social2_icon', array(
						'default' => '',
						'sanitize_callback' => 'sanitize_text_field',
				  ));
					$wp_customize->add_control( 'iwebunique_social2_icon',array(
						'type' => 'text',
						'label' => __( 'Select Icon #2','iwebunique' ),
						'description' => __( 'Please input icon as eg: fa-twitter-square. Find Font-awesome icons <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">here</a>', 'iwebunique' ),
						'section' => 'iwebunique_footer_bg',
						'setting' => 'iwebunique_social2_icon',
						'active_callback' => 'iwebunique_footer_social',
					));
		  // Social Icon #2 URL
					$wp_customize->add_setting('iwebunique_social2_url', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'esc_url_raw',
					));

					$wp_customize->add_control('iwebunique_social2_url',array(
						'type' => 'url',
						'description' => __( 'Icon URL','iwebunique' ),
						'section' => 'iwebunique_footer_bg',
						'setting' => 'iwebunique_social2_url',
						'active_callback' => 'iwebunique_footer_social',
					));
		// Social Icon #3
				  $wp_customize->add_setting('iwebunique_social3_icon', array(
						'default' => '',
						'sanitize_callback' => 'sanitize_text_field',
				  ));
					$wp_customize->add_control( 'iwebunique_social3_icon',array(
						'type' => 'text',
						'label' => __( 'Select Icon #3','iwebunique' ),
						'description' => __( 'Please input icon as eg: fa-linkedin-square. Find Font-awesome icons <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">here</a>', 'iwebunique' ),
						'section' => 'iwebunique_footer_bg',
						'setting' => 'iwebunique_social3_icon',
						'active_callback' => 'iwebunique_footer_social',
					));
		  // Social Icon #3 URL
					$wp_customize->add_setting('iwebunique_social3_url', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'esc_url_raw',
					));

					$wp_customize->add_control('iwebunique_social3_url',array(
						'type' => 'url',
						'description' => __( 'Icon URL','iwebunique' ),
						'section' => 'iwebunique_footer_bg',
						'setting' => 'iwebunique_social3_url',
						'active_callback' => 'iwebunique_footer_social',
					));
		// Social Icon #4
				  $wp_customize->add_setting('iwebunique_social4_icon', array(
						'default' => '',
						'sanitize_callback' => 'sanitize_text_field',
				  ));
					$wp_customize->add_control( 'iwebunique_social4_icon',array(
						'type' => 'text',
						'label' => __( 'Select Icon #4','iwebunique' ),
						'description' => __( 'Please input icon as eg: fa-youtube-square. Find Font-awesome icons <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">here</a>', 'iwebunique' ),
						'section' => 'iwebunique_footer_bg',
						'setting' => 'iwebunique_social4_icon',
						'active_callback' => 'iwebunique_footer_social',
					));
		  // Social Icon #4 URL
					$wp_customize->add_setting('iwebunique_social4_url', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'esc_url_raw',
					));

					$wp_customize->add_control('iwebunique_social4_url',array(
						'type' => 'url',
						'description' => __( 'Icon URL','iwebunique' ),
						'section' => 'iwebunique_footer_bg',
						'setting' => 'iwebunique_social4_url',
						'active_callback' => 'iwebunique_footer_social',
					));

	// ----------------------------------------------------------------------

}
add_action( 'customize_register', 'iwebunique_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function iwebunique_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function iwebunique_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function iwebunique_customize_preview_js() {
	wp_enqueue_script( 'iwebunique-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'iwebunique_customize_preview_js' );



function iwebunique_sanitize_dropdown_pages( $page_id, $setting ) {
	// Ensure $input is an absolute integer.
	$page_id = absint( $page_id );

	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}


