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
	wp_die( sprintf( __( 'This theme make a 301 redirection on production to this URL: %s', 'bea-redirection' ), $redirect ) );
}

if ( ! empty( $redirect ) ) {
	/** Hack : strictly redirect to wanted url */
	wp_redirect( esc_url_raw( $redirect ), 301, 'bea-redirection' );
	exit;
}

wp_die( sprintf( __( 'Please configure theme redirection on <a href="%s">back-end settings page</a>', 'bea-redirection' ), admin_url( 'themes.php?page=redirection-theme-settings' ) ) );
