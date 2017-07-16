<?php
/**
 * Search Template Handler
 *
 * @package     KnowTheCode\Structure
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\Structure;

class SearchTemplate {

	protected $grid_count = 0;
	protected $post_type_section = '';
	protected $post_id = 0;
	protected $post_type = '';
	protected $font_icon = '';
	protected $parent_id = 0;
	protected $parent_title = '';

	/**
	 * SearchTemplate constructor.
	 */
	public function __construct() {
		$this->init_events();
	}

	/**
	 * Initialize the events.
	 *
	 * @since 1.5.0
	 *
	 * @return void
	 */
	protected function init_events() {
		remove_action( 'genesis_loop', 'genesis_do_loop' );
		add_action( 'genesis_before_loop', array( $this, 'render_search_archive_description' ) );
		add_action( 'genesis_loop', array( $this, 'do_the_search_loop' ) );
		add_filter( 'post_class', array( $this, 'add_grid_to_post_class' ) );
	}

	/**
	 * Render the search archive description
	 *
	 * @since 1.5.0
	 *
	 * @return void
	 */
	public function render_search_archive_description() {

		$header_text = __( 'Search Results for: ', 'ktc' ) . get_search_query();

		include_once( __DIR__ . '/views/search/search-header.php' );
	}

	/**
	 * Do the search Loop.
	 *
	 * @since 1.5.0
	 *
	 * @return void
	 */
	public function do_the_search_loop() {

		if ( ! have_posts() ) {
			echo '<p>Oh poo, there are no matches to your search request.</p>';

			return;
		}

		do_action( 'genesis_before_while' );
		while ( have_posts() ) :
			the_post();

			$this->init_post_properties();

			if ( $this->is_new_post_type() ) {
				$this->render_new_section();
			}

			$this->render_view();

			$this->increment_grid_count();

		endwhile;

		echo '<div class="clearfix"></div>';

		do_action( 'genesis_after_endwhile' );
	}

	/**
	 * Add grid to the post classes.
	 *
	 * @since 1.5.0
	 *
	 * @param array $post_classes
	 *
	 * @return array
	 */
	public function add_grid_to_post_class( array $post_classes ) {
		if ( $this->post_type == 'docx' ) {
			return $post_classes;
		}

		$post_classes[] = 'one-half';

		if ( $this->grid_count % 2 ) {
			$post_classes[] = 'last';
		}

		return $post_classes;
	}

	/**
	 * Render the new section.
	 *
	 * @since 1.5.0
	 *
	 * @return void
	 */
	protected function render_new_section() {
		$clean_post_type = esc_attr( $this->post_type );

		include( __DIR__ . '/views/search/post-type-section.php' );
	}

	/**
	 * Increment the grid count.
	 *
	 * @since 1.5.0
	 *
	 * @return void
	 */
	protected function increment_grid_count() {
		if ( $this->is_new_post_type() ) {
			$this->post_type_section = $this->post_type;
			$this->grid_count        = 1;
		} else {
			$this->grid_count++;
		}
	}

	/**
	 * Initialize the post properties.
	 *
	 * @since 1.5.0
	 *
	 * @return bool
	 */
	protected function init_post_properties() {
		$this->post_id   = get_the_ID();
		$this->post_type = get_post_type();
		$this->init_font_icon();

		$this->parent_id = wp_get_post_parent_id( $this->post_id );
		$this->init_parent_title();
	}

	/**
	 * Initialize the font icon.
	 *
	 * @since 1.5.0
	 *
	 * @return bool
	 */
	function init_font_icon() {
		$icons = array(
			'post'  => 'map-signs',
			'lab'   => 'flask',
			'docx'  => 'university',
			'forum' => 'life-ring',
		);

		$this->font_icon = array_key_exists( $this->post_type, $icons ) ? $icons[ $this->post_type ] : '';
	}

	/**
	 * Initialize the parent's title.
	 *
	 * @since 1.5.0
	 *
	 * @return bool
	 */
	protected function init_parent_title() {
		if ( $this->parent_id < 1 ) {
			$this->parent_title = '';
			return;
		}

		$prefix = array(
			'lab' => __( 'Lab:', 'ktc' ),
		);

		$this->parent_title = array_key_exists( $this->post_type, $prefix ) ? $prefix[ $this->post_type ] . ' ' : '';

		$this->parent_title .= get_the_title( $this->parent_id );
	}

	/**
	 * Get the section title for the post type.
	 *
	 * @since 1.5.0
	 *
	 * @return bool
	 */
	protected function get_post_type_section_title() {
		if ( $this->post_type == 'post' ) {
			return 'Tips & Insights';
		}

		$post_type_object = get_post_type_object( $this->post_type );
		if ( $post_type_object->description ) {
			return $post_type_object->description;
		}

		return $post_type_object->labels->singular_name;
	}

	/**
	 * Render the view.
	 *
	 * @since 1.5.0
	 *
	 * @return bool
	 */
	protected function render_view() {
		$view_file = $this->post_type == 'docx' ? 'search-docx-entry.php' : 'search-entry.php';

		include( __DIR__ . '/views/search/' . $view_file );
	}

	/**
	 * Checks if this is the new post type in the Loop.
	 *
	 * @since 1.5.0
	 *
	 * @return bool
	 */
	protected function is_new_post_type() {
		return $this->post_type !== $this->post_type_section;
	}
}
