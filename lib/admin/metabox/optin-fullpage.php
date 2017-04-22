<?php
/**
 * Membership Metabox
 *
 * @package     UpTechLabs\FulcrumSite\Admin\Metabox
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace KnowTheCode\BootcampTeaser\Admin\Metabox;

add_action( 'admin_menu', __NAMESPACE__ . '\add_optin_metabox' );
/**
 * Register a new meta box to the post or page edit screen.
 *
 * @since 1.0.0
 *
 * @retun void
 */
function add_optin_metabox() {
	$post_id = fulcrum_get_post_id();

	if ( 'templates/template-bootcamp.php' !== fulcrum_get_template_file( $post_id ) ) {
		return;
	}

	add_meta_box(
		'ktc_optin_fullpage_metabox',
		'Optin Full Page',
		__NAMESPACE__ . '\render_optin_fullpage_metabox',
		'page',
		'normal',
		'high'
	);
}

/**
 * Callback for Library Options Metabox
 *
 * @since 1.0.0
 *
 * @uses genesis_get_custom_field() Get custom field value.
 */
function render_optin_fullpage_metabox() {

	wp_nonce_field( 'ktc_optin_fullpage_save', 'ktc_optin_fullpage_nonce' );

	include( 'views/optin-fullpage.php' );
}

add_action( 'save_post', __NAMESPACE__ . '\optin_fullpage_save', 1, 2 );
/**
 * Save the page header settings when we save a page.
 *
 * @since 1.0.0
 *
 * @uses genesis_save_custom_fields() Perform checks and saves post meta / custom field data to a post or page.
 *
 * @param integer $post_id Post ID.
 * @param stdClass $post Post object.
 *
 * @return mixed Returns post id if permissions incorrect, null if doing autosave, ajax or future post, false if update
 *               or delete failed, and true on success.
 */
function optin_fullpage_save( $post_id, $post ) {
	if ( ! isset( $_POST['ktc_optin_fullpage'] ) ) {
		return;
	}
	$data = $_POST['ktc_optin_fullpage'];

	genesis_save_custom_fields( $data, 'ktc_optin_fullpage_save', 'ktc_optin_fullpage_nonce', $post );
}
