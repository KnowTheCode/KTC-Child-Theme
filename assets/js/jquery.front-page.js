/**
 * Front Page JavaScript handling.
 *
 * @package     KTC Front Page
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

;(function ( $, window, document, undefined ) {
	'use strict';

	var $items, containerIsOnScreen = false;

	function init() {
		initAnimation();

		$( document ).scroll( function () {
			initAnimation();
		} );
	}

	function initAnimation() {

		$( '.animated__items' ).each( function( index, container ){
			var $container = $( container );

			containerIsOnScreen = $container.isOnScreen( 0.5, 0.5 );

			$items = $container.find( '.animated__item' );
			if ( $items.length < 1 ) {
				return true;
			}

			animateItems();
		});
	}

	function animateItems() {
		if ( containerIsOnScreen ) {
			$items.removeClass('hide');
		} else {
			$items.addClass('hide');
		}
	}

	$( document ).ready( function () {
		init();
	} );

}( jQuery, window, document ));
