<?php
/**
 * Sidebars and widgets functionality
 *
 * @package     KnowTheCode\Widgets
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
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
	$config = include( CHILD_THEME_DIR . '/config/widgets/widget-areas.php' );

	foreach( (array) $config as $function_name => $specific_configuration ) {
		$function_name = sprintf( '%s\%s', __NAMESPACE__, $function_name );

		$function_name( $specific_configuration );
	}

	add_filter( 'widget_text', 'do_shortcode' );
}

/**
 * Unregister the widget areas
 *
 * @since  1.0.0
 *
 * @param array $config Runtime configuration parameters
 *
 * @return void
 */
function unregister_widget_areas( array $config ) {
	foreach ( $config as $sidebar_name ) {
		unregister_sidebar( $sidebar_name );
	}
}

/**
 * Register the widget areas
 *
 * @since  1.0.0
 *
 * @param array $config Runtime configuration parameters
 *
 * @return void
 */
function register_widget_areas( array $config ) {
	foreach ( $config as $widget_area ) {
		genesis_register_sidebar( $widget_area );
	}
}
