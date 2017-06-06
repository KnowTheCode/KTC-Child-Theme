/*!
 * Bootcamp Teaser Page JavaScript handling.
 *
 * @package     Bootcamp Teaser
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
;(function ( $, window, document, undefined ) {
	'use strict';

	var $window, $body,
		$header;

	var init = function() {
		$window = $( window );
		$body = $('body');

		$('.aniview').AniView();

		initHeader();
		initTeachersBio();
		initPopups();
	}

	//==========================
	// Header Handlers
	//==========================

	function initHeader() {
		$header = $('.site-header');
		$(window)
			.scroll(headerHandler);

		headerHandler();
	}

	function headerHandler() {

		var position =  $( this ).scrollTop();

		if ( position > 500 & $window.width() < 766 ) {
			$header.slideUp();
			return;
		}

		if ( position > 500 ) {
			$header.addClass('--is-onscroll');
		}

		if ( ! $header.is(':visible') ) {
			$header.slideDown();
			$header.removeClass('--is-onscroll');
		}
	}

	//==========================
	// Teacher Bio Handlers
	//==========================

	function initTeachersBio() {
		var data = {
			panelOpenClass: 'panel--is-open'
		}
		$('.teacher-card').on('click', data, popupHandler);
		$('.panel-close--button').on('click', data, popupHandler );
	}

	//==========================
	// Topic Handlers
	//==========================

	function initPopups() {
		var data = {
			panelOpenClass: 'panel--is-open'
		}
		$('.popup-reveal-button').on('click', data, popupHandler );
		$('.popup-close--button').on('click', data, popupHandler );
	}

	//==========================
	// Popup Handlers
	//==========================

	var popupHandler = function( event ) {
		var $button = $(this),
			panelID = $button.data('popupId'),
			data;

		var $panel = $('#' + panelID);

		data = {
			slideInClass : $panel.data( 'slidein' ),
			slideOutClass : $panel.data( 'slideout' ),
			panelOpenClass: event.data.panelOpenClass
		}

		if ( $panel.hasClass( data.panelOpenClass ) ) {
			closeContainer( $panel, data );

		} else {
			openContainer( $panel, data );
		}
	}

	function closeContainer( $el, data ) {
		$el
			.removeClass( data.panelOpenClass )
			.removeClass( data.slideInClass )
			.addClass( data.slideOutClass );
	}

	function openContainer( $el, data ) {
		$el
			.addClass( data.panelOpenClass )
			.addClass( data.slideInClass )
			.removeClass( data.slideOutClass );
	}

	$( document ).ready( function () {
		init();
	} );

}( jQuery, window, document ));