/*!
 * Front Page JavaScript handling.
 *
 * @package     KTC Front Page
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
;(function ( $, window, document, undefined ) {
	'use strict';

	var $header, $featureGif, $boxedGrid;

	var init = function() {
		$header = $('.site-header');
		$boxedGrid = $('.boxed-grid');
		$featureGif = $('.boxed-grid--gif');

		headerHandler();
		setFeatureGridHeight();

		$(window)
			.scroll(headerHandler)
			.resize(setFeatureGridHeight);
	}

	var headerHandler = function() {
		var position =  $( this ).scrollTop();

		if ( position > 500 ) {
			$header.slideUp();
		} else if ( ! $header.is(':visible') ) {
			$header.slideDown();
		}
	}

	function setFeatureGridHeight() {
		if ( $(window).width() < 768 ) {
			return;
		}
		var newHeight,
			containerWidth = $featureGif.width(),
			$gif = $featureGif.find('img'),
			gifHeight = $gif.height();

		newHeight = ( gifHeight / $gif.width() ) * containerWidth;

		$boxedGrid.css('height', newHeight);
	}

	$( document ).ready( function () {
		init();
	} );

}( jQuery, window, document ));
