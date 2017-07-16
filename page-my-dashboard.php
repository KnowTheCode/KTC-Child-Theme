<?php
/**
 * My Dashboard Template.
 *
 * @package     KnowTheCode\MyDashboard
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\MyDashboard;

remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_dashboard_assets', 99999 );
/**
 * Enqueue the specific assets for this template, as there's no load it on every
 * single page.
 *
 * @since 1.0.1
 *
 * @return void
 */
function enqueue_dashboard_assets() {
	$asset_file = '/assets/dist/css/dashboard.min.css';
	wp_enqueue_style(
		'ktc_dashboard_css',
		CHILD_URL . $asset_file,
		array(),
		get_asset_version_number( CHILD_THEME_DIR . $asset_file )
	);
}

genesis();
