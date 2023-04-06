<?php
/**
 * Redirection Template
 *
 * redirection
 *
 * @author BE API
 */

$redirect = get_option( 'redirection_url' );

// Exec redirection only on production, otherwise only display a user message
if ( defined( 'WP_ENV' ) && ! in_array( constant( 'WP_ENV' ), array( 'production', 'PROD' ) ) ) {
	wp_die( sprintf( 'This theme make a 301 redirection on production to this URL: %s', $redirect ) );
}

if ( ! empty( $redirect ) ) {
	/** Hack : strictly redirect to wanted url */
	wp_redirect( $redirect, 301, 'bea-redirection' );
	exit;
}

wp_die( sprintf( 'Please configure theme redirection on <a href="%s">back-end settings page</a>', admin_url( 'themes.php?page=redirection-theme-settings' ) ) );
