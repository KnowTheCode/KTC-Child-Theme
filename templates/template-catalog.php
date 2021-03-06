<?php
/**
 * Catalog Template
 *
 * @package     KnowTheCode
 *
 * Template Name: Catalog
 *
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\Catalog;

function get_catalog_view_dir() {
	return CHILD_THEME_DIR .'/lib/views/catalog/';
}

remove_all_actions( 'genesis_entry_content' );
add_action( 'genesis_entry_content', __NAMESPACE__ . '\do_the_catalog_page' );
/**
 * Callback to do the catalog page.
 *
 * @since 1.0.0
 *
 * @return void
 */
function do_the_catalog_page() {
	$permalink = get_the_permalink();
	$filter    = get_catalog_filter();

	require_once( get_catalog_view_dir() . 'nav.php' );

	if ( $filter === 'index' ) {
		render_catalog_index();
	} else if ( $filter === 'series' ) {
		render_catalog_series();
	} else {
		render_catalog_topics();
	}
}

/**
 * Render the catalog topics.
 *
 * @since 1.4.0
 *
 * @return void
 */
function render_catalog_topics() {
	$args          = array(
		'taxonomy'   => 'catalog',
		'hide_empty' => false,
	);
	$catalog_items = get_terms( $args );
	if ( empty( $catalog_items ) || is_wp_error( $catalog_items ) ) {
		_e( 'Whoopsie, something went wrong.', 'ktc' );

		return;
	}

	require_once( get_catalog_view_dir() .'catalog.php' );
}

/**
 * Render the catalog index of titles.
 *
 * @since 1.4.0
 *
 * @return void
 */
function render_catalog_index() {
	$args = array(
		'post_type'      => array( 'post', 'lab' ),
		'post_status'    => 'publish',
		'post_parent'    => 0,
		'posts_per_page' => 20,
		'orderby'        => 'title',
	);

	render_catalog_query( $args, get_catalog_view_dir() . 'index.php' );
}

/**
 * Render the catalog topics.
 *
 * @since 1.4.0
 *
 * @return void
 */
function render_catalog_series() {
	$args = array(
		'post_type'      => array( 'page' ),
		'post_status'    => 'publish',
		'post_parent'    => 2239,
		'posts_per_page' => - 1,
		'orderby'        => 'title',
	);

	render_catalog_query( $args, get_catalog_view_dir() . 'index.php' );
}


/**
 * Renders the Catalog Query based upon the args and view file.
 *
 * @since 1.4.0
 *
 * @param array $args
 * @param string $view_file
 *
 * @return void
 */
function render_catalog_query( array $args, $view_file ) {
	$query = new \WP_Query( $args );
	if ( ! $query->have_posts() ) {
		_e( 'Whoopsie, something went wrong.', 'ktc' );

		return;
	}

	require_once( $view_file );

	wp_reset_postdata();
}

/**
 * Renders each catalog index item.
 *
 * @since 1.4.0
 *
 * @param \WP_Query $query
 *
 * @return void
 */
function render_catalog_index_items( $query ) {
	$view_filename = get_catalog_filter() == 'series'
		? 'series-item.php'
		: 'index-item.php';

	while ( $query->have_posts() ) {
		$query->the_post();

		include( get_catalog_view_dir() . $view_filename );
	}
}

/**
 * Get the catalog filter from the URI.
 *
 * @since 1.4.0
 *
 * @return string
 */
function get_catalog_filter() {
	if ( ! isset( $_GET['filter'] ) ) {
		return '';
	}

	return strip_tags( $_GET['filter'] );
}

genesis();
