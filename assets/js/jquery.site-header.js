/*!
 * Site Header Navigation handling
 *
 * @package     Site Header
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        http://KnowTheCode.io
 * @license     GPL-2.0+
 */
;(function( $, window, document, undefined ) {
	"use strict";

	var $body,
		$siteHeader,
		$mainNav,
		$subNavs,
		openClass = 'subnav-open';

	var init = function() {
		$body = $('body');
		$siteHeader = $('.site-header');
		$mainNav = $('.main-nav li.--has-subnav');
		$subNavs = $('.site-header--subnav');

		initMobile();
		initMenu();
	}

	function initMobile() {
		$('#hamburger-button').on('click', toggleMobileMainMenu);
	}

	var toggleMobileMainMenu = function() {
		var bodyClass = 'main-nav--open';

		if ( $body.hasClass( bodyClass ) ) {
			$body.removeClass( bodyClass );
		} else {
			$body.addClass( bodyClass );
		}

		return false;
	}

	function initMenu() {
// 		$mainNav.on('mouseenter', initClickHandler );
		$mainNav.on('click', initClickHandler );
	}

	function initClickHandler() {
		var index = $mainNav.index( this );

		if ( $siteHeader.hasClass( openClass ) ) {
			resetSubNavs();
		}

		$body.addClass(openClass);
		$siteHeader.addClass( openClass );

		setSubnav( index );
		initClose();
	}

	function setSubnav( index ) {
		var $subNav = $( $subNavs[ index ] );
		$subNav
			.addClass(openClass)
			.css('visibility', '');
	}

	function initClose() {
		$('.subnav-close--button').on('click', function(){
			$siteHeader.removeClass( openClass );
			resetSubNavs();
			$body.removeClass(openClass);
		});
	}

	function resetSubNavs() {
		$subNavs.removeClass(openClass);
	}

	$('document').ready(function(){
		init();
	});

}( jQuery, window, document ) );