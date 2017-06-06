<?php
/**
 * Metaboxes - runtime configuration.
 *
 * @package     KnowTheCode\BootcampTeaser\Admin\Metabox
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */

namespace KnowTheCode\BootcampTeaser\Admin\Metabox;

return array(
	/*===================================
	 * Full page optin
	 *==================================*/
	array(
		'template'     => 'templates/template-bootcamp.php',
		'add_meta_box' => array(
			'id'            => 'ktc_optin_fullpage_metabox',
			'title'         => 'Optin Full Page',
			'screen'        => 'page',
			'context'       => 'normal',
			'priority'      => 'high',
			'callback_args' => array(
				'metakey' => '_optin_fullpage_content',
			),
		),
		'nonce_key'    => 'ktc_optin_fullpage_nonce',
		'save_key'     => 'ktc_optin_fullpage_save',
		'view'         => CHILD_THEME_DIR . '/lib/admin/metabox/views/editor.php',
		'metadata'     => array(
			'post_key' => 'ktc_optin_fullpage',
			'defaults' => array(
				'_optin_fullpage_content' => '',
			),
		),
	),

	/*===================================
	 * Technical Popup
	 *==================================*/
	array(
		'add_meta_box' => array(
			'id'            => 'ktc_bootcamp_topic_technical_metabox',
			'title'         => 'Technical Popup',
			'screen'        => 'page',
			'context'       => 'normal',
			'priority'      => 'high',
			'callback_args' => array(
				'metakey' => '_bootcamp_topic_technical',
			),
		),
		'nonce_key'    => 'ktc_bootcamp_topic_technical_nonce',
		'save_key'     => 'ktc_bootcamp_topic_technical_save',
		'view'         => CHILD_THEME_DIR . '/lib/admin/metabox/views/editor.php',
		'metadata'     => array(
			'post_key' => 'ktc_bootcamp_topic_technical',
			'defaults' => array(
				'_bootcamp_topic_technical' => '',
			),
		),
	),

	/*===================================
	 * Project Management Popup
	 *==================================*/
	array(
		'add_meta_box' => array(
			'id'            => 'ktc_bootcamp_topic_pm_metabox',
			'title'         => 'Project Management Popup',
			'screen'        => 'page',
			'context'       => 'normal',
			'priority'      => 'high',
			'callback_args' => array(
				'metakey' => '_bootcamp_topic_pm',
			),
		),
		'nonce_key'    => 'ktc_bootcamp_topic_pm_nonce',
		'save_key'     => 'ktc_bootcamp_topic_pm_save',
		'view'         => CHILD_THEME_DIR . '/lib/admin/metabox/views/editor.php',
		'metadata'     => array(
			'post_key' => 'ktc_bootcamp_topic_pm',
			'defaults' => array(
				'_bootcamp_topic_pm' => '',
			),
		),
	),

	/*===================================
	 * Business Popup
	 *==================================*/
	array(
		'add_meta_box' => array(
			'id'            => 'ktc_bootcamp_topic_business_metabox',
			'title'         => 'Business Popup',
			'screen'        => 'page',
			'context'       => 'normal',
			'priority'      => 'high',
			'callback_args' => array(
				'metakey' => '_bootcamp_topic_business',
			),
		),
		'nonce_key'    => 'ktc_bootcamp_topic_business_nonce',
		'save_key'     => 'ktc_bootcamp_topic_business_save',
		'view'         => CHILD_THEME_DIR . '/lib/admin/metabox/views/editor.php',
		'metadata'     => array(
			'post_key' => 'ktc_bootcamp_topic_business',
			'defaults' => array(
				'_bootcamp_topic_business' => '',
			),
		),
	),

	/*===================================
	 * Venue Popup
	 *==================================*/
	array(
		'add_meta_box' => array(
			'id'            => 'ktc_venue_metabox',
			'title'         => 'Venue Page',
			'screen'        => 'page',
			'context'       => 'normal',
			'priority'      => 'high',
			'callback_args' => array(
				'metakey' => '_bootcamp_venue',
			),
		),
		'nonce_key'    => 'ktc_bootcamp_venue_nonce',
		'save_key'     => 'ktc_bootcamp_venue_save',
		'view'         => CHILD_THEME_DIR . '/lib/admin/metabox/views/editor.php',
		'metadata'     => array(
			'post_key' => 'ktc_venue',
			'defaults' => array(
				'_bootcamp_venue',
			),
		),
	),

	/*===================================
	 * Become a Sponsor Popup
	 *==================================*/
	array(
		'add_meta_box' => array(
			'id'            => 'ktc_sponsor_metabox',
			'title'         => 'Become a Sponsor',
			'screen'        => 'page',
			'context'       => 'normal',
			'priority'      => 'high',
			'callback_args' => array(
				'metakey' => '_bootcamp_become_a_sponsor',
			),
		),
		'nonce_key'    => 'ktc_bootcamp_sponsor_nonce',
		'save_key'     => 'ktc_bootcamp_sponsor_save',
		'view'         => CHILD_THEME_DIR . '/lib/admin/metabox/views/editor.php',
		'metadata'     => array(
			'post_key' => 'ktc_sponsor',
			'defaults' => array(
				'_bootcamp_become_a_sponsor',
			),
		),
	),
);