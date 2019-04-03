<?php
/**
 * Active callback functions.
 *
 * @package iwebunique
 */

function iwebunique_ourservices_row2( $control ) {
	if ( $control->manager->get_setting( 'iwebunique_os_rows' )->value() == '2' ) {
		return true;
	} else {
		return false;
	}
}

function iwebunique_footer_social( $control ) {
	if ( $control->manager->get_setting( 'iwebunique_social_display' )->value() == '1' ) {
		return true;
	} else {
		return false;
	}
}

