<?php
/**
 * Footer structure
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
function unregister_footer_events() {

}

add_action( 'genesis_before_footer', __NAMESPACE__ . '\render_pre_footer' );
/**
 * Renders out the pre-footer.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_pre_footer() {
	genesis_widget_area( 'pre_footer', array(
		'before' => '<div class="prefooter"><div class="wrap">',
		'after'  => '</div></div>',
	) );
}

add_action( 'genesis_after_footer', __NAMESPACE__ . '\do_disclaimer' );
/**
 * Output footer navigation menu.
 *
 * @since  1.0.25
 *
 * @return void
 */
function do_disclaimer() {
//	include( CHILD_THEME_DIR . '/lib/views/scrollup.php' );

	genesis_widget_area( 'disclaimer', array(
		'before' => '<div class="disclaimer"><div class="wrap">',
		'after'  => '</div></div>',
	) );
}

// Add schema markup to Footer Navigation Menu.
add_filter( 'genesis_attr_nav-footer', 'genesis_attributes_nav' );

add_filter( 'wp_nav_menu_args', __NAMESPACE__ . '\footer_menu_args' );
/**
 * Reduce the footer navigation menu to one level depth.
 *
 * @since  1.0.0
 *
 * @param  array $args Existing footer menu args.
 *
 * @return array Amended footer menu args.
 */
function footer_menu_args( $args ) {

	if ( 'footer' !== $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;
}

add_filter( 'genesis_footer_creds_text', __NAMESPACE__ . '\do_footer_creds' );
/**
 * Change the footer text.
 *
 * @since  1.3.0
 *
 * @param string $creds Existing credentials.
 *
 * @return string Footer credentials, as shortcodes.
 */
function do_footer_creds( $creds ) {

	ob_start();
	require_once( 'views/footer-credits.php' );

	return ob_get_clean();
}