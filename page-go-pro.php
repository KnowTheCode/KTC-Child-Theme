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

add_filter( 'body_class', __NAMESPACE__ . '\add_body_class_for_custom_site_header', 1 );
/**
 * Add "custom-site-header" body class
 *
 * @since 2.0.0
 *
 * @param array $body_classes Array of body classes
 *
 * @return array
 */
function add_body_class_for_custom_site_header( array $body_classes ) {
	$body_classes[] = 'go-pro';
	$body_classes[] = 'custom-site-header';

	return $body_classes;
}

add_action( 'genesis_header', __NAMESPACE__ . '\render_main_nav', 11 );
/**
 * Render navigation.
 *
 * @since 2.0.0
 *
 * @return void
 */
function render_main_nav() {
	$user_is_logged_in = is_user_logged_in();
	$show_library = true;

	require_once __DIR__ . '/lib/structure/views/gopro-main-nav.php';
}

genesis();