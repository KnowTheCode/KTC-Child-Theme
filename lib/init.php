<?php
/**
 * Theme initialization
 *
 * @package     KnowTheCode
 * @since       1.3.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace KnowTheCode;

/**
 * Initialize the theme's constants.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_constants() {

	$child_theme = wp_get_theme();

	define( 'CHILD_THEME_NAME', $child_theme->get( 'Name' ) );
	define( 'CHILD_THEME_URL', $child_theme->get( 'ThemeURI' ) );
	define( 'CHILD_THEME_VERSION', $child_theme->get( 'Version' ) );
	define( 'CHILD_TEXT_DOMAIN', $child_theme->get( 'TextDomain' ) );

	define( 'CHILD_THEME_DIR', get_stylesheet_directory() );
	define( 'CHILD_CONFIG_DIR', CHILD_THEME_DIR . '/config/' );

	define( 'CHILD_DIST_URL', get_stylesheet_directory_uri() . '/assets/dist/' );
}

add_filter( 'genesis_load_deprecated', '__return_false', 99999999999999 );

/***********************************************
 * TEMPORARY FIX for BUG
 *
 * Genesis v. 2.5 has a bug -
 * 1. GENESIS_CLASSES_DIR is needed
 * 2. But when you filter the `genesis_load_deprecated` is OFF,
 *    you get a fatal error.
 *
 * Issue report submitted to the Genesis repository.
 ************************************************/
add_action( 'genesis_init', __NAMESPACE__ . '\bug_fix_for_genesis' );
function bug_fix_for_genesis() {
	define( 'GENESIS_CLASSES_DIR', get_template_directory() . '/lib/classes' );
}

init_constants();
