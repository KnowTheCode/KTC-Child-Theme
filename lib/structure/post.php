<?php
/**
 * Post structures
 *
 * @package     KnowTheCode
 * @since       1.3.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace KnowTheCode;

/**
 * Unregister all of the post default events.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_post_events() {
	remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );
	remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

	if ( is_post_type_archive( 'forum' ) ) {
		remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
	}
}

add_action( 'genesis_before_loop', __NAMESPACE__ . '\change_breadcrumb_from_single_posts', 1 );
/**
 * Let's remove the breadcrumb from single posts, as it's just not needed
 * (and frankly it's darn confusing with the terms in it).
 *
 * @since 1.0.0
 *
 * @return void
 */
function change_breadcrumb_from_single_posts() {
	if ( ! is_single() || get_post_type() != 'post' ) {
		return;
	}

	remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
}

add_action( 'genesis_after_endwhile', __NAMESPACE__ . '\do_post_pagination' );
/**
 * Use WordPress archive pagination.
 *
 * Return a paginated navigation to next/previous set of posts, when
 * applicable. Includes screen reader text for better accessibility.
 *
 * @since  1.0.1
 *
 * @see the_posts_pagination()
 */
function do_post_pagination() {
	$post_type = get_post_type();

	if ( 'forum' == $post_type  ) {
		return;
	}

	if ( is_single() ) {
		return add_post_prev_next_to_singles( $post_type );
	}

	$args = array(
		'mid_size' => 2,
		'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', 'ktc' ) . ' </span>',
	);

	if ( 'numeric' === genesis_get_option( 'posts_nav' ) ) {
		the_posts_pagination( $args );
	}
}

add_filter( 'genesis_noposts_text', '__return_empty_string' );

/**
 * Add Prev/Next to bottom of the singles.
 *
 * @since 1.0.0
 *
 * @param string $post_type
 *
 * @return void
 */
function add_post_prev_next_to_singles( $post_type ) {
	if ( ! is_single() || ! in_array( $post_type, array( 'post', 'lab' ) ) ) {
		return;
	}

	$previous = get_previous_post();
	$next = get_next_post();

	include( CHILD_THEME_DIR . '/lib/views/single-navigation.php' );
}
