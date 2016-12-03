<?php
/**
 * Menu structures
 *
 * @package     KTC\Structure
 * @since       1.3.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
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
	remove_action( 'genesis_after_header', 'genesis_do_nav' );
}

add_action( 'genesis_after_header', __NAMESPACE__ . '\render_main_nav' );
/**
 * Render navigation.
 *
 * @since 1.3.0
 *
 * @return void
 */
function render_main_nav() {
	$user_is_logged_in = is_user_logged_in();

	require_once( __DIR__ . '/views/main-nav.php' );
}

add_action( 'genesis_after_header', __NAMESPACE__ . '\render_sub_nav', 12 );
/**
 * Render the subnav (secondary navigation) for specific pages.
 *
 * @since 1.4.8
 *
 * @return void
 */
function render_sub_nav() {

	if ( ! has_subnav() ) {
		return;
	}

	$page_name = get_current_page_name();
	$subnavs   = array(
		'quick-start-guide'    => 'start',
		'library'              => 'start',
		'catalog'              => 'start',
		'glossary'             => 'start',
		'the-docx'             => 'start',
		'insights'             => 'start',
		'my-dashboard'         => 'my',
		'account'              => 'my',
		'your-account-history' => 'my',
	);
	if ( ! array_key_exists( $page_name, $subnavs ) ) {
		return;
	}

	$user_is_logged_in = is_user_logged_in();

	$view = __DIR__ . '/views/' . $subnavs[ $page_name ] . '-subnav.php';
	require( $view );
}

/**
 * Checks if the current page has a subnav.
 *
 * @since 1.4.8
 *
 * @return bool
 */
function has_subnav() {
	if ( is_post_type_archive( 'glossary' ) ) {
		return true;
	}

	if ( is_home() ) {
		return true;
	}

	return is_page();
}

/**
 * Get the page name.
 *
 * @since 1.4.8
 *
 * @return string
 */
function get_current_page_name() {
	if ( is_home() ) {
		return 'insights';
	}

	if ( is_page() ) {
		return get_post_field( 'post_name', get_post() );
	}

	if ( ! is_post_type_archive() ) {
		return '';
	}

	$archive_object = get_queried_object();

	return $archive_object->name;
}
