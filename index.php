<?php
/**
 * Redirection Template
 *
 * redirection
 *
 * @author BE API
 */

$redirect = get_option( 'redirection_url' );
if ( ! empty( $redirect ) ) {
	/** Hack : striclty redirect to wanted url */
	wp_redirect( $redirect, 301 );
	exit;
} else {
	wp_die( 'Configure theme redirection on BO please' );
}