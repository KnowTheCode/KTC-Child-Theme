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

namespace KnowTheCode\Admin\Metabox;

use Fulcrum\Config\Config_Contract;

class Metabox {
	/**
	 * Instance of the runtime configuration
	 *
	 * @var Config_Contract
	 */
	protected $config;

	public function __construct( Config_Contract $config ) {
		$this->config = $config;

		$this->init_events();
	}

	protected function init_events() {
		add_action( 'add_meta_boxes', array( $this, 'register_metabox' ), 10, 2 );
		add_action( 'save_post', array( $this, 'save_metabox' ), 1, 2 );
	}

	/**
	 * Register a new meta box to the post or page edit screen.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function register_metabox() {
		if ( ! $this->is_correct_template_file() ) {
			return;
		}

		add_meta_box(
			$this->config->add_meta_box['id'],
			$this->config->add_meta_box['title'],
			array( $this, 'render_metabox' ),
			$this->config->add_meta_box['screen'],
			$this->config->add_meta_box['context'],
			$this->config->add_meta_box['priority'],
			$this->config->add_meta_box['callback_args']
		);
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
	public function render_metabox( $post, $metabox ) {
		if ( ! is_readable( $this->config->view ) ) {
			return;
		}

		wp_nonce_field( $this->config->save_key, $this->config->nonce_key );

		$post_key = $this->config->metadata['post_key'];
		$metakey  = $metabox['args']['metakey'];

		include( $this->config->view );
	}

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
	public function save_metabox( $post_id, $post ) {
		$post_key = $this->config->metadata['post_key'];

		if ( ! isset( $_POST[ $post_key ] ) ) {
			return;
		}
		$data = array_merge( $this->config->metadata['defaults'], (array) $_POST[ $post_key ] );

		genesis_save_custom_fields( $data, $this->config->save_key, $this->config->nonce_key, $post );
	}

	protected function is_correct_template_file() {
		if ( ! $this->config->has( 'template' ) || ! $this->config->template ) {
			return true;
		}

		$post_id = fulcrum_get_post_id();

		return $this->config->template === fulcrum_get_template_file( $post_id );
	}
}
