<?php

/**
 * Sidebars and widgets functionality
 *
 * @package     KnowTheCode\Insights
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+ and MIT Licence (MIT)
 */
namespace KnowTheCode\Widgets;

add_action( 'genesis_setup', __NAMESPACE__ . '\setup', 15 );
/**
 * Setup the sidebars/widget areas.
 *
 * @since 1.0.0
 *
 * @return void
 */
function setup() {
	unregister_sidebar( 'sidebar-alt' );
	add_filter( 'widget_text', 'do_shortcode' );

	register_widget_areas();
}

/**
 * Register the widget areas enabled by default in Utility.
 *
 * @since  1.0.0
 *
 * @return void
 */
function register_widget_areas() {

	$widget_areas = array(
		array(
			'id'          => 'hello_bar',
			'name'        => __( 'Hello Bar', 'ktc' ),
			'description' => __( 'This is the message bar under very top of the page.', 'ktc' ),
		),
		array(
			'id'          => 'search_bar',
			'name'        => __( 'Search Bar', 'ktc' ),
			'description' => __( 'This is the search bar.', 'ktc' ),
		),
		array(
			'id'          => 'utility-bar',
			'name'        => __( 'Utility Bar', 'ktc' ),
			'description' => __( 'This is the utility bar across the top of page.', 'ktc' ),
		),
		array(
			'id'          => 'blog',
			'name'        => __( 'Insights', 'ktc' ),
			'description' => __( 'This is the Insights section which appears on the Insights page.', 'ktc' ),
		),
		array(
			'id'          => 'pre_footer',
			'name'        => __( 'Pre-Footer', 'ktc' ),
			'description' => __( 'This is the Pre-Footer section, just before the footer widgets.', 'ktc' ),
		),
		array(
			'id'          => 'disclaimer',
			'name'        => __( 'Disclaimer', 'ktc' ),
			'description' => __( 'This is the Disclaimer section on very bottom of the site.', 'ktc' ),
		),
	);

	foreach ( $widget_areas as $widget_area ) {
		genesis_register_sidebar( $widget_area );
	}
}
