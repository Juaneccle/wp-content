/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 * @package iwebunique
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Copyright
		wp.customize( 'iweb_copyright_text', function( value ) {
				value.bind( function( to ) {
					$( '#iweb-cuscr' ).text( to );
				} );
		} );

	// Featured Service

	wp.customize( 'iwebunique_fdservices_stitle', function( value ) {
		value.bind( function( to ) {
			$( '.iwebunique-fds-w2 p' ).text( to );
		} );
	} );
	wp.customize( 'iwebunique_fdservices_title', function( value ) {
		value.bind( function( to ) {
			$( '.iwebunique-fds-w2 h1' ).text( to );
		} );
	} );

	// Our Services

	wp.customize( 'iwebunique_ourservices_title', function( value ) {
		value.bind( function( to ) {
			$( '.iwebunique-os-a h1' ).text( to );
		} );
	} );
	wp.customize( 'iwebunique_ourservices_desc', function( value ) {
		value.bind( function( to ) {
			$( 'p#iwebunique-os-cuslive' ).text( to );
		} );
	} );

	// Featured Section 2

	wp.customize( 'iwebunique_fs2_text', function( value ) {
		value.bind( function( to ) {
			$( '.iwebunique-fs2-a1 p' ).text( to );
		} );
	} );
	wp.customize( 'iwebunique_fs2_btntext', function( value ) {
		value.bind( function( to ) {
			$( '#iwebunique-fs2-cuslive a' ).text( to );
		} );
	} );

	// Our Skills

	wp.customize( 'iwebunique_oskil1_text', function( value ) {
		value.bind( function( to ) {
			$( 'p#iwebunique-sk1a-cuslive' ).text( to );
		} );
	} );
	wp.customize( 'iwebunique_oskil1_prct', function( value ) {
		value.bind( function( to ) {
			$( 'p#iwebunique-sk1b-cuslive' ).text( to );
		} );
	} );
	wp.customize( 'iwebunique_oskil2_text', function( value ) {
		value.bind( function( to ) {
			$( 'p#iwebunique-sk2a-cuslive' ).text( to );
		} );
	} );
	wp.customize( 'iwebunique_oskil2_prct', function( value ) {
		value.bind( function( to ) {
			$( 'p#iwebunique-sk2b-cuslive' ).text( to );
		} );
	} );
	wp.customize( 'iwebunique_oskil3_text', function( value ) {
		value.bind( function( to ) {
			$( 'p#iwebunique-sk3a-cuslive' ).text( to );
		} );
	} );
	wp.customize( 'iwebunique_oskil3_prct', function( value ) {
		value.bind( function( to ) {
			$( 'p#iwebunique-sk3b-cuslive' ).text( to );
		} );
	} );
	wp.customize( 'iwebunique_oskil4_text', function( value ) {
		value.bind( function( to ) {
			$( 'p#iwebunique-sk4a-cuslive' ).text( to );
		} );
	} );
	wp.customize( 'iwebunique_oskil4_prct', function( value ) {
		value.bind( function( to ) {
			$( 'p#iwebunique-sk4b-cuslive' ).text( to );
		} );
	} );

	// Portfolio

	wp.customize( 'iwebunique_pfolio_stitle', function( value ) {
		value.bind( function( to ) {
			$( '.iwebunique-pfolio-cuslive p' ).text( to );
		} );
	} );
	wp.customize( 'iwebunique_pfolio_title', function( value ) {
		value.bind( function( to ) {
			$( '.iwebunique-pfolio-cuslive h1' ).text( to );
		} );
	} );

	// Our Team

	wp.customize( 'iwebunique_ourtim_title', function( value ) {
		value.bind( function( to ) {
			$( '.iwebunique-ourtim-w h1' ).text( to );
		} );
	} );
	wp.customize( 'iwebunique_ourtim_desc', function( value ) {
		value.bind( function( to ) {
			$( 'p#iwebunique_ourtim-cuslive' ).text( to );
		} );
	} );

	// Testimonials

	wp.customize( 'iwebunique_tmonials_title', function( value ) {
		value.bind( function( to ) {
			$( '.iwebunique-tmonials-a h1' ).text( to );
		} );
	} );
	wp.customize( 'iwebunique_tmonials_desc', function( value ) {
		value.bind( function( to ) {
			$( 'p#iwebunique_tmonials-cuslive' ).text( to );
		} );
	} );

	// Latest News

	wp.customize( 'iwebunique_lnews_title', function( value ) {
		value.bind( function( to ) {
			$( '.iwebunique-lnews-w h1' ).text( to );
		} );
	} );
	wp.customize( 'iwebunique_lnews_desc', function( value ) {
		value.bind( function( to ) {
			$( 'p#iwebunique_lnews-cuslive' ).text( to );
		} );
	} );

} )( jQuery );
