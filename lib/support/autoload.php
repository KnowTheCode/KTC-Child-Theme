<?php
/**
 * Autoload files to launch the theme.
 *
 * @package     KnowTheCode\Support
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\Support;

use Fulcrum\Config\Config;
use KnowTheCode\Admin\Metabox\Metabox;

/**
 * Initialize the filenames to be loaded.
 *
 * @since 2.0.1
 *
 * @param bool $is_admin
 *
 * @return void
 */
function init_files( $is_admin = false ) {
	$filenames = array(
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

	if ( ! class_exists( 'Fulcrum\Fulcrum' ) ) {
		// If Fulcrum is not loaded, then
		// load the dependencies-helpers file first.
		array_unshift(
			$filenames,
			'support/dependencies-helpers.php'
		);
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
		require_once $folder_root . $filename;
	}
}

/**
 * Autoload the files and dependencies.
 *
 * @since 2.0.0
 *
 * @return void
 */
function do_autoload() {
	$is_admin = is_admin();

	init_files( $is_admin );
}

/**
 * Get runtime configuration parameters.
 *
 * @since 1.3.0
 *
 * @param string $key Configuration parameter key
 * @param string $config_file (Optional) Configuration filename without the extension.
 *
 * @return array|null|mixed
 */
function get_configuration_parameters( $key = '', $config_file = 'theme-setup' ) {
	static $config = array();

	if ( ! $config_file ) {
		return;
	}

	if ( ! array_key_exists( $config_file, $config ) ) {
		$config[ $config_file ] = (array) include( CHILD_THEME_DIR . '/config/' . $config_file . '.php' );
	}

	if ( ! $key ) {
		return $config[ $config_file ];
	}

	if ( array_key_exists( $key, $config[ $config_file ] ) ) {
		return $config[ $config_file ][ $key ];
	}
}

do_autoload();
