<?php
/**
 * Viewing History Template
 *
 * Template Name: Viewing History
 *
 * @package     KnowTheCode\ViewingHistory
 * @since       1.5.1
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace KnowTheCode\ViewingHistory;

remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

remove_action( 'genesis_before_header', 'KnowTheCode\Structure\render_hello_bar', 9 );

remove_all_actions( 'genesis_entry_header' );
genesis();