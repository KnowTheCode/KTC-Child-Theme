<?php
/**
 * Load up the assets
 *
 * @package     KnowTheCode\Structure
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\Structure;

add_filter( 'stylesheet_uri', __NAMESPACE__ . '\change_stylesheet_uri_to_min' );
/**
 * Change the stylesheet to the minified version.
 *
 * @since 1.0.0
 *
 * @param string $stylesheet_uri
 *
 * @return string
 */
function change_stylesheet_uri_to_min( $stylesheet_uri ) {
	if ( fulcrum_is_dev_environment() ) {
		return $stylesheet_uri;
	}

	return CHILD_URL . '/style.min.css';
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
/**
 * Enqueue theme assets.
 *
 * @since 1.0.0
 */
function enqueue_assets() {
	$asset_file = '/assets/dist/js/jquery.ktc-theme.min.js';
	wp_enqueue_script(
		'ktc_theme_js',
		CHILD_URL . $asset_file,
		array( 'jquery' ),
		get_asset_version_number( CHILD_THEME_DIR . $asset_file ),
		true
	);

}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_fonts' );
/**
 * Load fonts.
 *
 * @since 1.0.0
 */
function enqueue_fonts() {
	wp_enqueue_style( 'ktc-fonts', get_fonts_url(), array(), null );
}

/**
 * Build Google fonts URL.
 *
 * This function enqueues Google fonts in such a way that translators can easily turn on/off
 * the fonts if they do not contain the necessary character sets. Hat tip to Frank Klein for
 * the tutorial.
 *
 * @link http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 *
 * @since  1.0.0
 */
function get_fonts_url() {

	$font_families[] = 'Lato:300,400,700,900';
	$font_families[] = 'Source+Sans+Pro:400,700';


	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);

	$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

	return $fonts_url;
}
