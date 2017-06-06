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

add_action( 'admin_menu', __NAMESPACE__ . '\add_bootcamp_topic_metabox' );
/**
 * Register a new meta box to the post or page edit screen.
 *
 * @since 1.0.0
 *
 * @retun void
 */
function add_bootcamp_topic_metabox() {
	$post_id = fulcrum_get_post_id();

	if ( 'templates/template-bootcamp.php' !== fulcrum_get_template_file( $post_id ) ) {
		return;
	}

	$topics = array(
		'technical' => 'Technical',
		'pm'        => 'Project Management',
		'business'  => 'Business',
	);

	foreach ( $topics as $topic => $label ) {

		add_meta_box(
			"ktc_bootcamp_topic_{$topic}_metabox",
			$label,
			__NAMESPACE__ . '\render_bootcamp_topic_metabox',
			'page',
			'normal',
			'high',
			array(
				'metakey' => '_bootcamp_topic_' . $topic,
				'label'   => $label,
			)
		);
	}
}

/**
 * Callback for the Metabox
 *
 * @since 1.0.0
 *
 * @param WP_Post $post Current post object.
 * @param array $metabox Array of metabox information
 *
 * @return void
 */
function render_bootcamp_topic_metabox( $post, $metabox ) {

	$metakey = $metabox['args']['metakey'];

	wp_nonce_field( 'ktc_bootcamp_topic_save', 'ktc_bootcamp_topic_nonce' );

	include( 'views/bootcamp-topic.php' );
}

add_action( 'save_post', __NAMESPACE__ . '\bootcamp_topic_save', 1, 2 );
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
function bootcamp_topic_save( $post_id, $post ) {
	if ( ! isset( $_POST['ktc_bootcamp_topic'] ) ) {
		return;
	}
	$data = $_POST['ktc_bootcamp_topic'];

	genesis_save_custom_fields( $data, 'ktc_bootcamp_topic_save', 'ktc_bootcamp_topic_nonce', $post );
}
