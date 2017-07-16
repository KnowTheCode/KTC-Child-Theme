<?php
/**
 * Search structures
 *
 * @package     KnowTheCode\Structure
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCod\Structure;

/**
 * Unregister default archive events.
 *
 * @since 1.5.0
 *
 * @return void
 */
function unregister_search_events() {
	// nothing to unregister.
}

add_filter('pre_get_posts', __NAMESPACE__ . '\change_search_post_types', 50 );
/**
 * Change the search post types to only include what we want.
 *
 * @since 1.5.0
 *
 * @param $query
 *
 * @return mixed
 */
function change_search_post_types( $query ) {

	if ( $query->is_search && ! is_admin() && $query->is_main_query() ) {
		$query->set(
			'post_type',
			array(
				'lab',
//			'challenge',
				'post',
				'docx',
				'glossary',
				'help-center',
				'page',
			)
		);

		$query->set( 'posts_per_page', 100 );
	}

	return $query;
}

add_filter( 'posts_orderby', __NAMESPACE__ . '\add_orderby_for_search_query', 50 );
/**
 * Add the ORDER BY for the Search Query.
 *
 * @since 1.5.0
 *
 * @param string $orderby_sql
 *
 * @return string
 */
function add_orderby_for_search_query( $orderby_sql ) {
	if ( ! is_search() ) {
		return $orderby_sql;
	}

	global $wpdb;

	$post_type_order = array(
		'lab',
//		'challenge',
//		'explained',
		'post',
		'docx',
		'glossary',
		'help-center',
		'page',
	);

	$sql_query = "CASE {$wpdb->posts}.post_type";
	foreach( $post_type_order as $order => $post_type ) {
		$sql_query .= " WHEN '{$post_type}' THEN " . ( $order + 1 );
	}
	$sql_query .= ' END';

	return $sql_query;
}
