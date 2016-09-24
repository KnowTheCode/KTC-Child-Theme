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
namespace KnowTheCode;

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

	require_once( 'views/main-nav.php' );
}
