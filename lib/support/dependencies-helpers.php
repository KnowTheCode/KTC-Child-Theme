<?php
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
		return WP_DEBUG === true;
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
