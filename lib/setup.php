<?php
/**
 * Setup the theme.
 *
 * @package     KnowTheCode
 * @since       1.3.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace KnowTheCode;

add_action( 'genesis_setup', __NAMESPACE__ . '\setup_child_theme', 15 );
/**
 * Theme setup.
 *
 * Attach all of the site-wide functions to the correct hooks and filters. All
 * the functions themselves are defined below this setup function.
 *
 * @since 1.0.0
 */
function setup_child_theme() {
	adds_theme_supports();
	unregister_layouts();

	add_filter( 'edit_post_link', '__return_empty_string' );

	unregister_genesis_callbacks();
}

/**
 * Adds theme supports to the site.
 *
 * @since 1.0.0
 *
 * @return void
 */
function adds_theme_supports() {
	$config = array(
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
	);
	foreach ( $config as $feature => $args ) {
		add_theme_support( $feature, $args );
	}
}

/**
 * Unregister the Genesis Layouts.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_layouts() {
	$layouts = array(
		'sidebar-content',
		'content-sidebar',
		'content-sidebar-sidebar',
		'sidebar-content-sidebar',
		'sidebar-sidebar-content',
	);
	foreach( $layouts  as $layout ) {
		genesis_unregister_layout( $layout );
	}

	// temporary fix for Genesis bug 06.22.2016
	genesis_set_default_layout( 'full-width-content' );
}

/**
 * Unregister Genesis callbacks.  We do this here because the child theme loads before Genesis.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_genesis_callbacks() {
	Structure\unregister_header_events();
	Structure\unregister_nav_events();
	Structure\unregister_post_events();
	Structure\unregister_archive_events();
	Structure\unregister_footer_events();
}

add_filter( 'genesis_theme_settings_defaults', __NAMESPACE__ . '\set_theme_settings_defaults' );
/**
 * Set theme settings defaults.
 *
 * @since 1.0.0
 *
 * @param array $defaults
 *
 * @return array
 */
function set_theme_settings_defaults( array $defaults ) {
	$config   = get_theme_settings_defaults();
	$defaults = wp_parse_args( $config, $defaults );

	return $defaults;
}

add_action( 'after_switch_theme', __NAMESPACE__ . '\update_theme_settings_defaults' );
/**
 * Sets the theme setting defaults.
 *
 * @since 1.0.0
 *
 * @return void
 */
function update_theme_settings_defaults() {
	$config = get_theme_settings_defaults();
	if ( function_exists( 'genesis_update_settings' ) ) {
		genesis_update_settings( $config );
	}
	update_option( 'posts_per_page', $config['blog_cat_num'] );
}

/**
 * Get the theme settings defaults.
 *
 * @since 1.0.0
 *
 * @return array
 */
function get_theme_settings_defaults() {
	return array(
		'blog_cat_num'              => 10,
		'content_archive'           => 'full',
		'content_archive_limit'     => 250,
		'content_archive_thumbnail' => 0,
		'posts_nav'                 => 'numeric',
		'site_layout'               => 'full-width-content',
	);
}

add_filter( 'theme_page_templates', __NAMESPACE__ . '\remove_genesis_page_templates' );

/**
 * Remove Genesis Blog page template.
 *
 * @param array $page_templates Existing recognised page templates.
 *
 * @return array Amended recognised page templates.
 */
function remove_genesis_page_templates( $page_templates ) {
	unset( $page_templates['page_blog.php'] );

	return $page_templates;
}

/**
 * If this is the wp-login.php page, then the login-form styling is
 * loaded into the wp-head.
 *
 * @since 1.4.9
 *
 * @return void
 */
fulcrum_load_login_form_styling( CHILD_THEME_DIR . '/config/login-form.php' );
