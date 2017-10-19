<?php
/**
 * Post structures
 *
 * @package     KnowTheCode\Structure
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\Structure;

/**
 * Unregister all of the post default events.
 *
 * @since 1.4.8
 *
 * @return void
 */
function unregister_post_events() {
	remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );
	remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
}

add_action( 'genesis_before_content', __NAMESPACE__ . '\remove_insights_defaults', 1 );
/**
 * Let's remove the breadcrumb from single posts, as it's just not needed
 * (and frankly it's darn confusing with the terms in it).
 *
 * @since 1.5.8
 *
 * @return void
 */
function remove_insights_defaults() {
	if ( ! is_insights() ) {
		return;
	}

	remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
	remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
}

add_action( 'genesis_after_endwhile', __NAMESPACE__ . '\do_post_pagination' );
/**
 * Use WordPress archive pagination.
 *
 * Return a paginated navigation to next/previous set of posts, when
 * applicable. Includes screen reader text for better accessibility.
 *
 * @since  1.5.8
 *
 * @see the_posts_pagination()
 */
function do_post_pagination() {
	if ( in_array( get_post_type(), array( 'forum', 'lab' ) ) || is_single() ) {
		return;
	}

	$args = array(
		'mid_size'           => 2,
		'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', 'ktc' ) . ' </span>',
	);

	if ( 'numeric' === genesis_get_option( 'posts_nav' ) ) {
		the_posts_pagination( $args );
	}
}

add_filter( 'genesis_noposts_text', '__return_empty_string' );

add_action( 'genesis_after_entry', __NAMESPACE__ . '\render_inpost_after_content', 7 );
/**
 * Render the after entry content for blog posts.
 *
 * @since 1.5.8
 *
 * @return void
 */
function render_inpost_after_content() {
	if ( ! is_single() || get_post_type() != 'post' ) {
		return;
	}

	if ( ! fulcrum_is_parent_post() ) {
		return;
	}

	render_inpost_navigation();

	render_promotions();
}

add_action( 'render_single_next_prev_navigation', __NAMESPACE__ . '\render_inpost_navigation' );
/**
 * Add Prev/Next to bottom of the singles.
 *
 * The `render_single_next_prev_navigation` event is called externally by
 * plugins to embed the previous and next navigation into a custom post
 * type.
 *
 * @since 2.0.1
 *
 * @return void
 */
function render_inpost_navigation() {
	$previous = fulcrum_get_previous_parent_post();
	$next     = fulcrum_get_next_parent_post();

	include CHILD_THEME_DIR . '/lib/views/single-navigation.php';
}

/**
 * Render out the promotions widget area.
 *
 * @since 1.6.0
 *
 * @return void
 */
function render_promotions() {

	genesis_widget_area( 'promotions', array(
		'before' => '<div class="promotions"><div class="wrap">',
		'after'  => '</div></div>',
	) );
}

add_action( 'genesis_after_entry', __NAMESPACE__ . '\render_inpost_marketing', 10 );
/**
 * Render the inpost marketing
 *
 * @since 1.5.8
 *
 * @return void
 */
function render_inpost_marketing() {
	if ( ! is_single() || get_post_type() != 'post' ) {
		return;
	}
	include __DIR__ . '/views/marketing.php';
}

/**
 * Checks if the page is Posts Page or a single post.
 *
 * @since 1.5.7
 *
 * @return bool
 */
function is_insights() {
	return is_home() ||
	       ( is_single() && get_post_type() == 'post' );
}

add_filter( 'genesis_author_box_gravatar_size', __NAMESPACE__ . '\set_author_box_gravatar_size' );
/**
 * Set the author box gravatar size.
 *
 * @since 1.5.8
 *
 * @return int
 */
function set_author_box_gravatar_size() {
	return 125;
}
