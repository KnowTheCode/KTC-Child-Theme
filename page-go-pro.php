<?php
/**
 * Go Pro landing page
 *
 * @package     KnowTheCode\GoPro
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\GoPro;

remove_all_actions( 'genesis_entry_header' );
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
remove_all_actions( 'genesis_entry_footer' );

add_action( 'genesis_header', 'genesis_header_markup_open', 5 );
add_action( 'genesis_header', 'genesis_do_header' );
add_action( 'genesis_header', 'genesis_header_markup_close', 15 );
remove_action('genesis_header', 'KnowTheCode\Structure\render_site_header' );

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
/**
 * Enqueue the specific assets for this template, as there's no load it on every
 * single page.
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_assets() {
	$asset_file = '/assets/dist/css/gopro.min.css';
	wp_enqueue_style(
		'ktc_gopro_css',
		CHILD_URL . $asset_file,
		array(),
		get_asset_version_number( CHILD_THEME_DIR . $asset_file )
	);
}

add_action( 'genesis_header', __NAMESPACE__ . '\render_front_page_main_nav', 11 );
/**
 * Render navigation.
 *
 * @since 1.3.0
 *
 * @return void
 */
function render_front_page_main_nav() {
	$user_is_logged_in = is_user_logged_in();

	require_once( __DIR__ . '/lib/structure/views/gopro-main-nav.php' );
}

genesis();