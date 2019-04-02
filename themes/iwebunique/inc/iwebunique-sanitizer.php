<?php
/**
 *
 * @package iwebunique
 */

// radio box sanitization function.
function iwebunique_sanitize_radio( $input ) {
			$valid_keys = array(
				'1' => __( 'Enable','iwebunique' ),
				'0' => __( 'Disable','iwebunique' ),
				);
	if ( array_key_exists( $input, $valid_keys ) ) {
				return $input;
	} else {
				return '';
	}
}

// radio box for theme color sanitization function.
function iwebunique_color_sanitize_radio( $input ) {
			$valid_keys = array(
				'#e6be1e' => __( 'Yellow','iwebunique' ),
				'#4d94ff' => __( 'Blue','iwebunique' ),
				'#00bd86' => __( 'Green','iwebunique' ),
				);
	if ( array_key_exists( $input, $valid_keys ) ) {
				return $input;
	} else {
				return '';
	}
}

// file input sanitization function.
function iwebunique_sanitize_file( $file, $setting ) {

			//allowed file types
			$mimes = array(
				'jpg|jpeg|jpe' => 'image/jpeg',
				'gif'          => 'image/,gif',
				'png'          => 'image/png',
			);

			//check file type from file name
			$file_ext = wp_check_filetype( $file, $mimes );

			//if file has a valid mime type return it, otherwise return default
			return ( $file_ext['ext'] ? $file : $setting->default );
}


if ( ! function_exists( 'iwebunique_sanitize_number_range' ) ) :

	/**
	 * Sanitize number range.
	 *
	 */
	function iwebunique_sanitize_number_range( $input, $setting ) {

		$input = absint( $input );

		$atts = $setting->manager->get_control( $setting->id )->input_attrs;

		$min = ( isset( $atts['min'] ) ? $atts['min'] : $input );

		$max = ( isset( $atts['max'] ) ? $atts['max'] : $input );

		$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

		return ( $min <= $input && $input <= $max && is_int( $input / $step ) ? $input : $setting->default );

	}

endif;
