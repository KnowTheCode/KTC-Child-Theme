<?php

/**
 * Search results template
 *
 * @package     KnowTheCode
 * @since       1.5.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace KnowTheCode;

require_once( __DIR__ . '/lib/structure/class-search.php' );

add_action( 'genesis_doctype', __NAMESPACE__ . '\instantiate_search' );
/**
 * Instantiate the search handler.
 *
 * @since 1.0.0
 *
 * @return void
 */
function instantiate_search() {
	new Structure\SearchTemplate();
}

genesis();
