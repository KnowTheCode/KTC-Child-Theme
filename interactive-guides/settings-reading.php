<?php
/**
 * Interactive Guide for Settings Reading.
 *
 * Template Name: Interactive - Settings Reading
 *
 * @package     KnowTheCode\Interactive\SettingsReading
 * @since       1.0.1
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Interactive\SettingsReading;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
/**
 * Enqueue the specific assets for this template, as there's no load it on every
 * single page.
 *
 * @since 1.0.1
 *
 * @return void
 */
function enqueue_assets() {
	wp_enqueue_style(
		'ktc_settings_reading_interactive_css',
		CHILD_URL . '/interactive-guides/assets/settings-reading.css',
		array(),
		'1.0.1' );
}

if ( isset( $_GET['tryitout'] ) ) {
	add_filter( 'the_content', __NAMESPACE__ . '\show_the_appropriate_message' );
}

/**
 * If the form has been submitted, let's filter the page's content to
 * set the radio input, select option, and messages.
 *
 * @since 1.0.0
 *
 * @param string $content Page's content
 *
 * @return string
 */
function show_the_appropriate_message( $content ) {
	$reading_settings = get_settings();
	$content          = set_form_states( $content, $reading_settings );
	$content          = set_the_message( $content, $reading_settings );

	return $content;
}

/**
 * Set the form states. As we are processing on the web server,
 * we'll use string replace functions to change the checked and
 * selected states as well as set the messaging.
 *
 * @since 1.0.0
 *
 * @param string $content Page's content
 * @param array $reading_settings Array of reading settings
 *
 * @return string
 */
function set_form_states( $content, array $reading_settings ) {

	$content = set_show_on_front_radio( $content, $reading_settings['show_on_front'] );

	$content = str_replace( ' selected="selected"', '', $content );

	if ( $reading_settings['page_on_front'] > 0 ) {
		$content = set_selects( $content, 'page_on_front', $reading_settings['page_on_front'] );
	}

	if ( $reading_settings['page_for_posts'] > 0 ) {
		$content = set_selects( $content, 'page_for_posts', $reading_settings['page_for_posts'] );
	}

	$content = set_static_warning_if_applicable( $content, $reading_settings );

	return $content;
}

/**
 * Set the "show on front" radio input.
 *
 * @since 1.0.0
 *
 * @param string $content Page's content
 * @param string $value Radio input's value
 *
 * @return mixed
 */
function set_show_on_front_radio( $content, $value = 'posts' ) {
	$content = str_replace( ' checked="checked"', '', $content );
	$pattern = sprintf( 'name="show_on_front" value="%s"', $value );

	return str_replace(
		$pattern,
		$pattern . ' checked="checked"',
		$content
	);
}

/**
 * Sets the appropriate form <select>.
 *
 * @since 1.0.0
 *
 * @param string $content Page's content
 * @param string $class The class attribute to set.
 * @param string|int $reading_setting The applicable select setting.
 *
 * @return string
 */
function set_selects( $content, $class, $reading_setting ) {
	$class_attribute = sprintf( 'class="%s--%s"', $class, (int) $reading_setting );

	return str_replace(
		$class_attribute,
		$class_attribute . ' selected="selected"',
		$content
	);
}

/**
 * If both static options are set to the same page, we want to display
 * a warning message. Else, just hide the message away.
 *
 * @since 1.0.1
 *
 * @param string $content Page's content
 * @param array $reading_settings Array of reading settings
 *
 * @return string
 */
function set_static_warning_if_applicable( $content, array $reading_settings ) {
	if ( ! are_same_static_page( $reading_settings ) ) {
		return $content;
	}

	return str_replace( 'static-page--warning hide', 'static-page--warning', $content );
}

/**
 * Set the appropriate message based upon the form's settings.
 *
 * @since 1.0.0
 *
 * @param string $content Page's content
 * @param array $reading_settings Array of reading settings
 *
 * @return string
 */
function set_the_message( $content, array $reading_settings ) {

	if ( is_your_latest_posts_set( $reading_settings ) ) {
		return strip_hide_from_message( $content, 'your-latest-posts' );
	}

	$static_front_page_set = is_static_front_page_set( $reading_settings );
	$static_posts_page_set = is_static_posts_page_set( $reading_settings );

	if ( $static_front_page_set && ! $static_posts_page_set ) {
		$class = 'static-front-page-only';
	} else if ( $static_posts_page_set && ! $static_front_page_set ) {
		$class = 'static-posts-page-only';
	} else if ( $static_posts_page_set && $static_front_page_set ) {
		$class = 'both-static-pages-set';
	} else {
		$class = 'neither-static-page-set';
	}

	return $class ? strip_hide_from_message( $content, $class ) : $content;
}

/**
 * Strip the hide off of the class message attribute.
 *
 * @since 1.0.0
 *
 * @param string $content Page's content
 * @param string $class
 *
 * @return mixed
 */
function strip_hide_from_message( $content, $class ) {
	$pattern     = sprintf( 'class="message--%s hide"', $class );
	$new_pattern = '';

	return str_replace( $pattern, $new_pattern, $content );
}

/**
 * Checks if the "Your latest posts" is set.
 *
 * @since 1.0.0
 *
 * @param array $reading_settings Array of reading settings
 *
 * @return bool
 */
function is_your_latest_posts_set( array $reading_settings ) {
	return $reading_settings['show_on_front'] === 'posts';
}

/**
 * Checks if the static Posts page is set
 *
 * @since 1.0.0
 *
 * @param array $reading_settings Array of reading settings
 *
 * @return bool
 */
function is_static_posts_page_set( array $reading_settings ) {
	return $reading_settings['show_on_front'] === 'page' &&
	       $reading_settings['page_for_posts'] > 0;
}

/**
 * Checks if the static front page is set.
 *
 * @since 1.0.0
 *
 * @param array $reading_settings Array of reading settings
 *
 * @return bool
 */
function is_static_front_page_set( array $reading_settings ) {
	return $reading_settings['show_on_front'] === 'page' &&
	       $reading_settings['page_on_front'] > 0;
}

/**
 * Checks if the static page selects are set to the exact same page.
 *
 * @since 1.0.0
 *
 * @param array $reading_settings Array of reading settings
 *
 * @return bool
 */
function are_same_static_page( array $reading_settings ) {
	return $reading_settings['page_on_front'] > 0 &&
	       $reading_settings['page_on_front'] === $reading_settings['page_for_posts'];
}

/**
 * Gets the form settings and caches them.
 *
 * @since 1.0.0
 *
 * @return array
 */
function get_settings() {
	static $reading_settings = array();

	if ( ! empty( $reading_settings ) ) {
		return $reading_settings;
	}

	$reading_settings = array();

	$settings = array(
		'show_on_front'  => 'strip_tags',
		'page_on_front'  => 'intval',
		'page_for_posts' => 'intval',
	);

	foreach ( $settings as $key => $filter ) {
		if ( ! array_key_exists( $key, $_GET ) ) {
			return false;
		}

		$reading_settings[ $key ] = $filter( trim( $_GET[ $key ] ) );
	}

	return $reading_settings;
}

genesis();
