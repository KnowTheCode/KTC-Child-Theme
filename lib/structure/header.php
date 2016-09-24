<?php
/**
 * Header structure functionality
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
function unregister_header_events() {

}

add_action( 'genesis_before_header', __NAMESPACE__ . '\render_hello_bar', 9 );
/**
 * Renders out the under_main_nav.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_hello_bar() {
	genesis_widget_area( 'hello_bar', array(
		'before' => '<div class="hello-bar" style="display: none;"><div class="wrap">',
		'after'  => '</div></div>',
	) );
}

add_action( 'genesis_before_header', __NAMESPACE__ . '\render_utility_bar' );
/**
 * Add Utility Bar above header.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_utility_bar() {
	genesis_widget_area( 'utility-bar', array(
		'before' => '<div class="utility-bar"><div class="wrap">',
		'after'  => '</div></div>',
	) );
}
