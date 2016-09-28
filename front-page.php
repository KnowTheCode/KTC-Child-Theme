<?php

/**
 * Front page template
 *
 * @package     KnowTheCode\Front_Page
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+ and MIT Licence (MIT)
 */
namespace KnowTheCode\Front_Page;

remove_all_actions( 'genesis_entry_header' );
remove_all_actions( 'genesis_entry_footer' );
remove_action( 'genesis_before_header', 'KnowTheCode\render_hello_bar', 9 );

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
	wp_enqueue_style( 'ktc_front_page_css', CHILD_URL . '/assets/dist/css/front-page.min.css' );
}

genesis();
