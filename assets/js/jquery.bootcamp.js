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
		$header, $teacherBio,
		slideIn = 'fadeIn',
		slideOut = 'fadeOut';

	var init = function() {
		$window = $( window );
		$body = $('body');

		$header = $('.site-header');
		$('.aniview').AniView();

		$('.teacher-card').on('click', teacherBio);
		$('.teacher-bio--close-button').on('click', closeContainer );

		headerHandler();
	}

	function headerHandler() {
		var position =  $( this ).scrollTop();

		if ( position > 500 ) {
			$header.slideUp();
		} else if ( ! $header.is(':visible') ) {
			$header.slideDown();
		}
	}

	var teacherBio = function() {
		var $teacherCard = $(this),
			teacherId = $teacherCard.data('teacher');

		$teacherBio = $('#' + teacherId);

		if ( $teacherBio.hasClass('teacher-bio--is-open') ) {
			closeContainer();

		} else {
			openContainer();
		}
	}


	function closeContainer() {
		$teacherBio
			.removeClass('teacher-bio--is-open')
			.removeClass( slideIn )
			.addClass( slideOut );
	}

	function openContainer() {
		$teacherBio
			.addClass('teacher-bio--is-open')
			.addClass( slideIn )
			.removeClass( slideOut );
	}

	$( document ).ready( function () {
		init();
	} );

}( jQuery, window, document ));