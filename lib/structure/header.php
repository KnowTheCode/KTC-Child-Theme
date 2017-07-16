<?php
/**
 * Header structure functionality
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
function unregister_header_events() {

}

add_filter( 'body_class', __NAMESPACE__ . '\add_site_header_as_sidebar', 999999 );
/**
 * If this web page is NOT using a custom site-header, then:
 *
 * 1. Relocate the site-header
 * 2. Add our site-header as sidebar
 *
 * @since 1.0.0
 *
 * @param array $body_classes
 *
 * @return array
 */
function add_site_header_as_sidebar( array $body_classes ) {
	if ( ! in_array( 'custom-site-header', $body_classes ) ) {
		remove_all_actions( 'genesis_header' );

		add_action( 'genesis_before', __NAMESPACE__ . '\render_site_header_as_sidebar' );

		$body_classes[] = 'site-header-as-sidebar';
	}

	return $body_classes;
}

/**
 * Render the site header as sidebar.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_site_header_as_sidebar() {
	require( __DIR__ . '/views/site-header/site-header.php' );
}
