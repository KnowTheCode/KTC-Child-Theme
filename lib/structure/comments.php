<?php
/**
 * Comments structures
 *
 * @package     KnowTheCode\Structure
 * @since       1.5.8
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Structure;

add_filter( 'comment_form_defaults', __NAMESPACE__ . '\customize_comments_form_defaults' );
/**
 * Modify the comment form default arguments.
 *
 * @since 1.0.0
 *
 * @param array $parameters
 *
 * @return mixed
 */
function customize_comments_form_defaults( array $parameters ) {
	$parameters['title_reply'] = 'Did you learn something new? Share your thoughts.';

	return $parameters;
}