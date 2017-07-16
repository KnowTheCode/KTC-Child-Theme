<?php
/**
 * Menu structures
 *
 * @package     KnowTheCode\Structure
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\Structure;

/**
 * Unregister default navigation events.
 *
 * @since 1.3.0
 *
 * @return void
 */
function unregister_nav_events() {

}

/**
 * Render navigation.
 *
 * @since 2.0.0
 *
 * @return void
 */
function render_main_nav() {
	$user_is_logged_in  = is_user_logged_in();
	$signinout_redirect = site_url( $_SERVER['REQUEST_URI'] );

	require( __DIR__ . '/views/site-header/main-nav.php' );
}

/**
 * Render the subnav (secondary navigation) for specific pages.
 *
 * @since 2.0.0
 *
 * @return void
 */
function render_subnavs() {
	$user_is_logged_in  = is_user_logged_in();
	$signinout_redirect = $_SERVER['REQUEST_URI'];

	if ( $user_is_logged_in ) {
		$user       = wp_get_current_user();
		$first_name = $user->user_firstname;
	}

	$subnavs = array(
		'my',
		'build-learn',
		'insights',
		'help',
	);

	foreach ( $subnavs as $filename ) {
		$file = __DIR__ . '/views/site-header/subnavs/' . $filename . '.php';
		require( $file );
	}

}
