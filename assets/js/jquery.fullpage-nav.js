/*!
 * Fullpage Navigation handling
 *
 * @package     FullpageNav
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        http://hellofromtonya.com
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

		initMenu();
	}

	function initMenu() {
		var $hamburger = $('#hamburger-menu'),
			menuID = $hamburger.data('menuId');

		$container = $('#' + menuID);
		if ( typeof $container === 'undefined' || $container == null ) {
			return;
		}

		slideIn = $container.data('slidein');
		slideOut = $container.data('slideout');

		$hamburger.on('click', initClickHandler );
	}

	function initClickHandler() {
		if ( $body.hasClass('menu--open') ) {
			closeContainer();

		} else {
			openContainer();
		}
	}

	function closeContainer() {
		$body.removeClass('menu--open');

		$container
			.removeClass( slideIn )
		    .addClass( slideOut );
	}

	function openContainer() {
		$body.addClass('menu--open');

		$container
			.addClass( slideIn )
			.removeClass( slideOut );

		itemClickHandler();
	}

	function itemClickHandler() {
		$container.find('.menu-item a').on( 'click', closeContainer );
	}

	$('document').ready(function(){
		init();
	});

}( jQuery, window, document ) );