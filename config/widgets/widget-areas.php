<?php
/**
 * Sidebars and widget area runtime configuration
 *
 * @package     KnowTheCode\LiveEvent\Widgets
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\LiveEvent\Widgets;

return array(
	'unregister_widget_areas' => array(
		'sidebar-alt',
	),

	'register_widget_areas' => array(
		array(
			'id'          => 'hello_bar',
			'name'        => __( 'Hello Bar', 'ktc' ),
			'description' => __( 'This is the message bar under very top of the page.', 'ktc' ),
		),
		array(
			'id'          => 'promotions',
			'name'        => __( 'Promotions', 'ktc' ),
			'description' => __( 'This is the promotions section to help us promote different events or whatever.', 'ktc' ),
		),
		array(
			'id'          => 'asktonya_form',
			'name'        => __( 'Ask Tonya Form', 'ktc' ),
			'description' => __( 'This area is the form to submit a question for Ask Tonya.', 'ktc' ),
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
	),
);