<?php

/**
 * Library Skills page
 *
 * @package     KnowTheCode\Library
 * @since       1.3.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+ and MIT Licence (MIT)
 */
namespace KnowTheCode\Library;

remove_all_actions( 'genesis_entry_header' );
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

genesis();
