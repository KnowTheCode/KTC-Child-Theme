<?php

/**
 * Catalog Template
 *
 * @package     KnowTheCode
 * Template Name: Catalog
 * @since       1.3.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace KnowTheCode;

remove_all_actions( 'genesis_entry_content' );
add_action( 'genesis_entry_content', __NAMESPACE__ . '\do_the_catalog_index' );
function do_the_catalog_index() {

	$args = array(
		'taxonomy' => 'catalog',
		'hide_empty' => false,
	);
	$catalog_items = get_terms( $args );
	if ( empty( $catalog_items ) || is_wp_error( $catalog_items ) ) {
		_e( 'Whoopsie, something went wrong.', 'ktc' );
	}

	require_once( 'lib/views/catalog.php' );
}

genesis();