<?php
/**
 * Description
 *
 * @package     KnowTheCode\MyDashboard
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\MyDashboard;


remove_all_actions( 'genesis_entry_header' );
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

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
	wp_enqueue_style( 'ktc_front_page_css', CHILD_URL . '/assets/dist/css/dashboard.min.css', array(), '1.0.0' );
}

genesis();