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

use Fulcrum\Config\Config;
use KnowTheCode\Admin\Metabox\Metabox;

/**
 * Initialize the filenames to be loaded.
 *
 * @since 1.6.0
 *
 * @param bool $is_admin
 *
 * @return void
 */
function init_files( $is_admin = false ) {
	$filenames = array(
		'support/dependencies-helpers.php',
		'setup.php',
		'widgets/widget-areas.php',
		'support/formatting.php',
		'support/load-assets.php',
		'structure/archive.php',
		'structure/comments.php',
		'structure/footer.php',
		'structure/header.php',
		'structure/nav.php',
		'structure/post.php',
		'structure/search.php',
	);

	if ( $is_admin ) {
		$filenames[] = 'admin/metabox/class-metabox.php';
	}

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

/**
 * Create the metaboxes.
 *
 * @since 1.0.0
 *
 * @return void
 */
function create_metaboxes() {
	$metabox_configs = (array) include( CHILD_THEME_DIR . '/config/admin/metabox/metaboxes.php' );
	if ( ! $metabox_configs ) {
		return;
	}

	foreach( $metabox_configs as $config ) {
		new Metabox( new Config( $config ) );
	}
}

/**
 * Autoload the files and dependencies.
 *
 * @since 1.0.0
 *
 * @return void
 */
function do_autoload() {
	$is_admin = is_admin();

	init_files( $is_admin );

	if ( $is_admin ) {
		create_metaboxes();
	}
}

do_autoload();
