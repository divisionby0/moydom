<?php
/**
 * Biznesspack back compat functionality
 *
 * Prevents Biznesspack from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package Biznesspack
 */

/**
 * Prevent switching to Biznesspack on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 */
function biznesspack_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'biznesspack_upgrade_notice' );
}
add_action( 'after_switch_theme', 'biznesspack_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Biznesspack on WordPress versions prior to 4.7.
 * @global string $wp_version WordPress version.
 */
function biznesspack_upgrade_notice() {
	$message = sprintf( __( 'Biznesspack requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'biznesspack' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 * @global string $wp_version WordPress version.
 */
function biznesspack_customize() {
	wp_die( sprintf( __( 'Biznesspack requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'biznesspack' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'biznesspack_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 * @global string $wp_version WordPress version.
 */
function biznesspack_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Biznesspack requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'biznesspack' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'biznesspack_preview' );
