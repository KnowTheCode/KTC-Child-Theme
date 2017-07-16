<?php
/**
 * Theme runtime configuration
 *
 * @package     KnowTheCode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode;

return array(

	//=============================================
	// Theme support features to add
	//=============================================
	'add_theme_support' => array(
		'html5'                       => array(
			'caption',
			'comment-form',
			'comment-list',
			'search-form'
		),
		'genesis-responsive-viewport' => null,
		'genesis-footer-widgets'      => 4,
		'genesis-structural-wraps'    => array(
			'footer',
			'footer-widgets',
			'header',
			'nav',
			'site-inner',
			'site-tagline',
			'partners__footer',
		),
		'genesis-menus'               => array(
			'primary' => __( 'Primary Navigation Menu', CHILD_TEXT_DOMAIN ),
			'footer'  => __( 'Footer Navigation Menu', CHILD_TEXT_DOMAIN ),
		),
//		'genesis-after-entry-widget-area' => null,
	),

	//=============================================
	// Layouts to unregister
	//=============================================

	'genesis_unregister_layout' => array(
		'sidebar-content',
//		'content-sidebar',
		'content-sidebar-sidebar',
		'sidebar-content-sidebar',
		'sidebar-sidebar-content',
	),

	//=============================================
	// Theme Default Settings
	//=============================================

	'theme_default_settings' => array(
		'blog_cat_num'              => 10,
		'content_archive'           => 'full',
		'content_archive_limit'     => 250,
		'content_archive_thumbnail' => 0,
		'posts_nav'                 => 'numeric',
		'site_layout'               => 'full-width-content',
	),
);