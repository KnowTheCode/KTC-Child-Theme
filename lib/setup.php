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

add_action( 'genesis_setup', __NAMESPACE__ . '\setup', 15 );
/**
 * Theme setup.
 *
 * Attach all of the site-wide functions to the correct hooks and filters. All
 * the functions themselves are defined below this setup function.
 *
 * @since 1.0.0
 */
function setup() {

	add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

	add_theme_support( 'genesis-responsive-viewport' );

	add_theme_support( 'genesis-footer-widgets', 4 );

	add_theme_support(
		'genesis-structural-wraps',
		array(
			'footer',
			'footer-widgets',
			'header',
			'nav',
			'site-inner',
			'site-tagline',
			'partners__footer',
		)
	);

	add_theme_support(
		'genesis-menus',
		array(
			'primary' => __( 'Primary Navigation Menu', 'ktc' ),
			'footer'  => __( 'Footer Navigation Menu', 'ktc' ),
		)
	);

	genesis_unregister_layout( 'sidebar-content' );
	genesis_unregister_layout( 'content-sidebar' );
	genesis_unregister_layout( 'content-sidebar-sidebar' );
	genesis_unregister_layout( 'sidebar-content-sidebar' );
	genesis_unregister_layout( 'sidebar-sidebar-content' );
	
	// temporary fix for Genesis bug 06.22.2016
	genesis_set_default_layout( 'full-width-content' );

	add_filter( 'edit_post_link', '__return_empty_string' );

	unregister_genesis_defaults();
}

function unregister_genesis_defaults() {
	unregister_header_events();
	unregister_nav_events();
	unregister_post_events();
	unregister_archive_events();
	unregister_footer_events();
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
 * @since 1.0.0
 *
 * @return void
 */
fulcrum_load_login_form_styling( CHILD_THEME_DIR . '/config/login-form.php' );
