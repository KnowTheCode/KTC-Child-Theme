<?php
/**
 * Insights page template
 *
 * @package     KnowTheCode\Insights
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\Insights;

do_action( 'fulcrum_grid' );

add_action( 'genesis_before_while', __NAMESPACE__ .  '\add_in_blog_page_contents' );
/**
 * Hey let's add in the Page Title and stuff that we put into the editor for
 * this page.
 *
 * @since 1.5.7
 *
 * @return void
 */
function add_in_blog_page_contents() {
	$blog_page = get_post( get_option( 'page_for_posts' ) );
	if ( ! $blog_page ) {
		return;
	}

	$content = do_shortcode( $blog_page->post_content );
	remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

	include( CHILD_THEME_DIR . '/lib/views/home-page-header.php' );
}

genesis();
