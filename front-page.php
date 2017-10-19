<?php
/**
 * Front page template
 *
 * @package     KnowTheCode\Front_Page
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\FrontPage;

remove_all_actions( 'genesis_entry_header' );
remove_all_actions( 'genesis_entry_footer' );
add_action( 'genesis_header', 'genesis_header_markup_open', 5 );
add_action( 'genesis_header', 'genesis_do_header' );
add_action( 'genesis_header', 'genesis_header_markup_close', 15 );

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_front_page_assets' );
/**
 * Enqueue the specific assets for this template, as there's no load it on every
 * single page.
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_front_page_assets() {
	$asset_file = '/assets/dist/css/front-page.min.css';
	wp_enqueue_style(
		'ktc_front_page_css',
		CHILD_URL . $asset_file,
		array(),
		get_asset_version_number( CHILD_THEME_DIR . $asset_file )
	);

	$asset_file = '/assets/js/templates/jquery.front-page.js';
	wp_enqueue_script(
		'ktc_front_page_js',
		CHILD_URL . $asset_file,
		array( 'jquery' ),
		get_asset_version_number( CHILD_THEME_DIR . $asset_file ),
		true
	);
}

add_filter( 'body_class', __NAMESPACE__ . '\add_body_class_for_custom_site_header', 1 );
/**
 * Description.
 *
 * @since 1.0.0
 *
 * @param array $body_classes Array of body classes
 *
 * @return array
 */
function add_body_class_for_custom_site_header( array $body_classes ) {
	$body_classes[] = 'custom-site-header';

	return $body_classes;
}

add_action( 'genesis_header', __NAMESPACE__ . '\render_front_page_main_nav', 11 );
/**
 * Render navigation.i
 *
 * @since 1.3.0
 *
 * @return void
 */
function render_front_page_main_nav() {
	$user_is_logged_in = is_user_logged_in();

	require_once __DIR__ . '/lib/structure/views/front-page-main-nav.php';
}

genesis();
