/*!
 * Fullpage Navigation handling
 *
 * @package     FullpageNav
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */
;(function( $, window, document, undefined ) {
	"use strict";

	var $window,
		$body,
		$container, slideIn, slideOut;

	function init() {
		$window = $( window );
		$body = $('body');

		$container = $('#fullpage-optin');

		slideIn = $container.data('slidein');
		slideOut = $container.data('slideout');

		$('.fullpage-optin--open-button').on('click', clickHandler );

		$('.fullpage-optin--close-button').on('click', closeContainer );
	}

	var clickHandler = function() {
		if ( $body.hasClass('fullpage-optin__open') ) {
			closeContainer();

		} else {
			openContainer();
		}
	}

	function closeContainer() {
		$body.removeClass('fullpage-optin__open');

		$container
			.removeClass( slideIn )
			.addClass( slideOut );
	}

	function openContainer() {
		$body.addClass('fullpage-optin__open');
		$container
			.addClass( slideIn )
			.removeClass( slideOut );
	}

	$('document').ready(function(){
		init();
	});

}( jQuery, window, document ) );