<?php
/**
 * Mentoring Program template
 *
 * Template Name: Mentoring Program
 *
 * @package     KnowTheCode\MentoringProgram
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\MentoringProgram;

remove_all_actions( 'genesis_entry_header' );
remove_all_actions( 'genesis_entry_footer' );


add_filter( 'body_class', __NAMESPACE__ . '\add_body_class' );
function add_body_class( $classes ) {
	$classes[] = 'mentoring-program';

	return $classes;
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets', 9999 );
/**
 * Enqueue the specific assets for this template, as there's no load it on every
 * single page.
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_assets() {
	$asset_file = '/assets/dist/css/mentoring-program.min.css';
	wp_enqueue_style(
		'ktc_mentoring_program_css',
		CHILD_URL . $asset_file,
		array(),
		get_asset_version_number( CHILD_THEME_DIR . $asset_file )
	);
}

genesis();
