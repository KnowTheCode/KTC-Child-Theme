<?php
/**
 * My Dashboard Template.
 *
 * @package     KnowTheCode\MyDashboard
 * @since       1.0.1
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\MyDashboard;


remove_all_actions( 'genesis_entry_header' );
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

remove_action( 'genesis_before_header', 'KnowTheCode\Structure\render_hello_bar', 9 );

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_dashboard_assets' );
/**
 * Enqueue the specific assets for this template, as there's no load it on every
 * single page.
 *
 * @since 1.0.1
 *
 * @return void
 */
function enqueue_dashboard_assets() {
	wp_enqueue_style( 'ktc_dashboard_css', CHILD_URL . '/assets/dist/css/dashboard.min.css', array(), '1.0.1' );
}

genesis();