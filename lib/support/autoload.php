<?php
/**
 * Autoload files to launch the theme.
 *
 * @package     KnowTheCode
 * @since       1.3.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace KnowTheCode\Support;

/**
 * Initialize the filenames to be loaded.
 *
 * @since 1.4.9
 *
 * @return void
 */
function init_files() {
	$filenames = array(
		'support/dependencies-helpers.php',
		'setup.php',
		'widgets/widget-areas.php',
		'support/formatting.php',
		'support/load-assets.php',
		'structure/archive.php',
//		'structure/comments.php',
		'structure/footer.php',
		'structure/header.php',
		'structure/nav.php',
		'structure/post.php',
		'structure/search.php',
	);

	load_specified_files( $filenames );
}

/**
 * Load each of the specified files.
 *
 * @since 1.3.0
 *
 * @param array $filenames
 * @param string $folder_root
 *
 * @return void
 */
function load_specified_files( array $filenames, $folder_root = '' ) {
	$folder_root = $folder_root ?: CHILD_THEME_DIR . '/lib/';

	foreach ( $filenames as $filename ) {
		require_once( $folder_root . $filename );
	}
}

init_files();
