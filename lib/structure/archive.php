<?php
/**
 * Archive structures
 *
 * @package     KnowTheCode\Structure
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\Structure;

/**
 * Unregister default archive events.
 *
 * @since 1.3.0
 *
 * @return void
 */
function unregister_archive_events() {
	// nothing to unregister.
}

add_action( 'genesis_meta', __NAMESPACE__ . '\dont_limit_forum_archive_page' );
/**
 * bbPress' forum archive page cannot be content
 * limited; else, the enter forum listing is cut off.
 * Instead, we just want to render out the content.
 *
 * @since 1.4.8
 *
 * @return void
 */
function dont_limit_forum_archive_page() {
	if ( ! is_post_type_archive( 'forum' ) ) {
		return;
	}

	remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
	add_action( 'genesis_entry_content', 'the_content' );
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
	if ( is_category() || is_tax( 'catalog' ) ) {
		do_action( 'fulcrum_grid' );
	}
}
