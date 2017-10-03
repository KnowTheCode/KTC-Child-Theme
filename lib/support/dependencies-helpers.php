<?php
/**
 * Dependency helpers - here in case Fulcrum is not installed.
 *
 * @package     KnowTheCode
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

if ( ! function_exists( 'get_asset_version_number' ) ) {
	/**
	 * Get the version number for an asset file using the file's timestamp.
	 *
	 * @since 1.0.0
	 *
	 * @param string $asset_file Absolute path to the asset file.
	 *
	 * @return bool|int
	 */
	function get_asset_version_number( $asset_file ) {
		return filemtime( $asset_file );
	}
}

/**
 * Missing plugin function helpers.
 *
 * This child theme uses multiple plugins to create the unique experience
 * for our website.  If these plugins are not installed, for example, you
 * are using this on a different website, then this helper file recreates
 * the dependent functions.
 *
 * @package     KnowTheCode
 * @since       1.4.9
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

if ( ! function_exists( 'is_help_center_page' ) ) {
	/**
	 * If the Help Center plugin is not installed,
	 * then return false for this function call.
	 *
	 * @since 1.4.9
	 *
	 * @return bool
	 */
	function is_help_center_page() {
		return false;
	}
}

if ( ! function_exists( 'fulcrum_is_dev_environment' ) ) {
	/**
	 * If Fulcrum is not loaded, then return the value of WP_DEBUG.
	 * When it's `true`, then we assume you are in the development
	 * environment.
	 *
	 * @since 1.4.9
	 *
	 * @return bool
	 */
	function fulcrum_is_dev_environment() {
		return ( SCRIPT_DEBUG === true );
	}
}

if ( ! function_exists( 'fulcrum_is_parent_post' ) ) {
	/**
	 * Fulcrum plugin is missing.  Just return false for this function.
	 *
	 * @since 1.4.9
	 *
	 * @return bool
	 */
	function fulcrum_is_parent_post() {
		return false;
	}
}

if ( ! function_exists( 'fulcrum_load_login_form_styling' ) ) {
	/**
	 * If Fulcrum is missing, then this dummy function does nothing,
	 * except prevent the theme from tossing a fatal error.
	 *
	 * @since 1.4.9
	 *
	 * @param string $stylesheet
	 *
	 * @return void
	 */
	function fulcrum_load_login_form_styling( $stylesheet ) {
		// do nothing.
	}
}

if ( ! function_exists( 'is_help_center_page' ) ) {
	function is_help_center_page() {
		return false;
	}
}

if ( ! function_exists( 'fulcrum_get_url_relative_to_home_url' ) ) {
	/**
	 * Get the URL relative to the site's root (home url).
	 *
	 * Performance function.
	 *
	 * This function uses `get_home_url()` and caches it.  It allows us to speed up
	 * building links and menus as we don't have to call `home_url( 'some-path' );`
	 * over and over again.
	 *
	 * @since 1.2.3
	 *
	 * @param  string      $path    Optional. Path relative to the home URL. Default empty.
	 * @param  string|null $scheme  Optional. Scheme to give the home URL context. Accepts
	 *                              'http', 'https', 'relative', 'rest', or null. Default null.
	 *
	 * @return string Home URL link with optional path appended.
	 */
	function fulcrum_get_url_relative_to_home_url( $path = '', $scheme = null ) {
		static $home_url;

		if ( ! $home_url ) {
			$home_url = get_home_url( null, '', $scheme );
		}

		if ( ! $home_url ) {
			return '';
		}

		return sprintf( '%s/%s', $home_url, ltrim( $path, '/' ) );
	}
}
