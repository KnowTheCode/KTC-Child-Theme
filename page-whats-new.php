<?php
/**
 * What's New Page
 *
 * @package     KnowTheCode\WhatsNew
 * @since       1.4.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace KnowTheCode\WhatsNew;


remove_all_actions( 'genesis_entry_content' );
add_action( 'genesis_entry_content', __NAMESPACE__ . '\do_the_whats_new_page' );
function do_the_whats_new_page() {

	$filterby = get_the_uri_filter();
	render_filterby_navigation( $filterby );
	render_new_content( $filterby );
}

/**
 * Render the Filterby Navigation.
 *
 * @since 1.0.0
 *
 * @param string $filterby Filterby URI parameter
 *
 * @return void
 */
function render_filterby_navigation( $filterby ) {
	$permalink = get_the_permalink();

	$filters = array(
		''         => __( 'All', 'ktc' ),
		'labs'     => __( 'Hands-On Labs', 'ktc' ),
		'insights' => __( 'Insights & Tips', 'ktc' ),
		'docx'     => __( 'Docx', 'ktc' ),
	);

	require_once( 'lib/views/whats-new/nav.php' );
}

/**
 * Render the catalog index of titles.
 *
 * @since 1.4.0
 *
 * @return void
 */
function render_new_content( $filterby ) {
	$args = array(
		'post_status'    => 'publish',
		'post_parent'    => 0,
		'posts_per_page' => 20,
		'orderby'        => 'date',
		'order'          => 'DESC',
		'date_query' => array(
			'after' => '-2 month'
		),
	);

	if ( $filterby == 'labs' ) {
		$args['post_type'] = 'lab';
	} elseif ( $filterby == 'docx' ) {
		$args['post_type'] = 'docx';
	} elseif ( $filterby == 'insights' ) {
		$args['post_type'] = 'post';
	} else {
		$args['post_type'] = array( 'post', 'lab', 'docx' );
	}

	$query = new \WP_Query( $args );
	if ( ! $query->have_posts() ) {
		_e( 'Whoopsie, something went wrong.', 'ktc' );

		return;
	}

	require_once( 'lib/views/whats-new/page.php' );

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
function render_new_item( $query ) {

	while ( $query->have_posts() ) {
		$query->the_post();

		include( 'lib/views/whats-new/item.php' );
	}
}

/**
 * Get the catalog filter from the URI.
 *
 * @since 1.4.0
 *
 * @return string
 */
function get_the_uri_filter() {
	if ( ! isset( $_GET['filter'] ) ) {
		return '';
	}

	return strip_tags( $_GET['filter'] );
}

genesis();
