<?php
/**
 * Bootcamp Teaser
 *
 * Template Name: Bootcamp Teaser
 *
 * @package     KnowTheCode\BootcampTeaser
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace KnowTheCode\BootcampTeaser;

remove_all_actions( 'genesis_entry_header' );
remove_all_actions( 'genesis_entry_footer' );
remove_action( 'genesis_before_header', 'KnowTheCode\Structure\render_hello_bar', 9 );
remove_action( 'genesis_before_header', 'KnowTheCode\Structure\render_utility_bar' );
remove_action( 'genesis_after_header', 'KnowTheCode\Structure\render_sub_nav', 12 );
remove_action( 'genesis_after_header', 'KnowTheCode\Structure\render_main_nav' );

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
/**
 * Enqueue the specific assets for this template, as there's no load it on every
 * single page.
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_assets() {
	$version_number = WP_DEBUG
		? filemtime( CHILD_THEME_DIR . '/assets/dist/css/bootcamp-teaser.min.css' )
		: '1.0.8';

	wp_enqueue_style( 'ktc_bootcamp_css', CHILD_URL . '/assets/dist/css/bootcamp-teaser.min.css', array(), $version_number );
	wp_enqueue_script( 'ktc_bootcamp_teaser_js', CHILD_URL . '/assets/dist/js/jquery.bootcamp.min.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script( 'aniview_js', CHILD_URL . '/assets/dist/js/jquery.aniview.min.js', array('jquery'), '1.0.2', true );
	wp_enqueue_script( 'ktc_fullpage_option_js', CHILD_URL . '/assets/dist/js/jquery.fullpage-optin.min.js', array('jquery'), '1.0.1', true );
}

add_action( 'genesis_before', __NAMESPACE__ . '\render_fullpage_optin' );
function render_fullpage_optin() {
	$html = get_post_meta( get_the_ID(), '_optin_fullpage_content', true );
	if ( ! $html ) {
		return;
	}

	echo wpautop( do_shortcode( $html ) );
}

add_action( 'genesis_header', __NAMESPACE__ . '\render_main_nav', 11 );
/**
 * Render navigation.
 *
 * @since 1.3.0
 *
 * @return void
 */
function render_main_nav() {
	$user_is_logged_in = is_user_logged_in();

	require_once( CHILD_THEME_DIR . '/lib/structure/views/front-page-main-nav.php' );
}

add_action( 'genesis_footer', __NAMESPACE__ . '\render_catfish', 99 );
/**
 * Render navigation.
 *
 * @since 1.3.0
 *
 * @return void
 */
function render_catfish() {
	include_once( CHILD_THEME_DIR . '/lib/views/bootcamp-teaser/catfish.php' );
}

genesis();
