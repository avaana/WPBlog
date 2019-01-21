"use strict";

/**
 * Tablet of Contents
 *
 * # Document Ready
 */

/**
 * # Document Ready
 */
jQuery(document).ready(function($){

	// Add a chevron icon to menu items with children
	$('#navigation #primary-menu > li:has(ul) > a').append('<span class="fa fa-chevron-down"></span>');
	
	// Scroll to top
	$('.scroll-to-top').on( 'click', function(){
		$('html, body').animate({ scrollTop: 0 }, 1000);
	});

	// Show header search form
	$(document).on( 'click', '.header-search-hook-show', function(e) {

		e.preventDefault();

		var parent = $(this).closest('#header-social'),
		holder = parent.find('.header-search'),
		form = holder.find('form'),
		input = holder.find('input[type="search"]');

		holder.stop().animate({ width : form.outerWidth() }, 300, function(){
			holder.find( '.header-search-hook-hide' ).stop().animate({ opacity : 1 }, 200);
			holder.find( '.header-search-placeholder' ).stop().animate({ opacity : 0.6 }, 200);
			input.focus();
		});

	});

	// Hide header search form
	$(document).on( 'click', '.header-search-hook-hide', function(e) {

		e.preventDefault();

		var parent = $(this).closest('#header-social'),
		holder = parent.find('.header-search'),
		form = holder.find('form');

		holder.find( '.header-search-placeholder, .header-search-hook-hide' ).stop().animate({ opacity : 0 }, 200, function(){
			holder.stop().animate({ width : 0 }, 300 );
		});

	});

	// Mobile navigation, go to URL when changed
	$('.header-search-mobile-nav-hook select').change(function() {
		window.location = $(this).val();
	});	

});