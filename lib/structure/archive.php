<?php
/**
 * Archive structures
 *
 * @package     KnowTheCode
 * @since       1.3.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace KnowTheCode;

/**
 * Unregister default archive events.
 *
 * @since 1.3.0
 *
 * @return void
 */
function unregister_archive_events() {

}

add_action( 'genesis_doctype', __NAMESPACE__ . '\do_grid_for_category_archive' );
/**
 * Category - do the Fulcrum grid.
 *
 * @since 1.0.0
 *
 * @return void
 */
function do_grid_for_category_archive() {
	if ( is_category() || is_search() || is_tax( 'catalog' ) ) {
		do_action( 'fulcrum_grid' );
	}
}