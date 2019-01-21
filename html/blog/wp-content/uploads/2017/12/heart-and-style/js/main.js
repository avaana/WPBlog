"use strict";
	
	function heart_and_style_build_wave(w, h) {

		if ( document.getElementById('featured-posts-slider') != null || document.getElementById('blog-posts-carousel') ) {

			var path = document.querySelector('#wave');
			var animation = document.querySelector('#moveTheWave');
			var m = 0.5122866232565925;	

		    var a = h / 4;
		    var y = h / 2;
		    var pathData = [
		        'M',
		        w * 0,
		        y + a / 2,
		        'c',
		        a * m,
		        0,
		        -(1 - a) * m,
		        -a,
		        a,
		        -a,
		        's',
		        -(1 - a) * m,
		        a,
		        a,
		        a,
		        's',
		        -(1 - a) * m,
		        -a,
		        a,
		        -a,
		        's',
		        -(1 - a) * m,
		        a,
		        a,
		        a,
		        's',
		        -(1 - a) * m,
		        -a,
		        a,
		        -a,
		        's',
		        -(1 - a) * m,
		        a,
		        a,
		        a,
		        's',
		        -(1 - a) * m,
		        -a,
		        a,
		        -a,
		        's',
		        -(1 - a) * m,
		        a,
		        a,
		        a,
		        's',
		        -(1 - a) * m,
		        -a,
		        a,
		        -a,
		        's',
		        -(1 - a) * m,
		        a,
		        a,
		        a,
		        's',
		        -(1 - a) * m,
		        -a,
		        a,
		        -a,
		        's',
		        -(1 - a) * m,
		        a,
		        a,
		        a,
		        's',
		        -(1 - a) * m,
		        -a,
		        a,
		        -a,
		        's',
		        -(1 - a) * m,
		        a,
		        a,
		        a,
		        's',
		        -(1 - a) * m,
		        -a,
		        a,
		        -a
		    ].join(' ');
		    path.setAttribute('d', pathData);
		}

	} heart_and_style_build_wave(90, 60);

/**
 * Social Sharing
 */

function heart_and_style_social_share( width, height, url ) {

	var leftPosition, topPosition, u, t;
	leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
	topPosition = (window.screen.height / 2) - ((height / 2) + 50);
	var windowFeatures = "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";
	u=location.href;
	t=document.title;
	window.open(url,'sharer', windowFeatures);
	return false;

}

/**
 * Carousel Center
 */

function heart_and_style_carousel_center() {

	// Center textual part
	jQuery('.blog-post-slider-thumb').each(function(){

		var thumbHeight = jQuery(this).height(),
		mainHeight = jQuery(this).siblings('.blog-post-slider-main').outerHeight(),
		topOffset = 0;

		if ( thumbHeight > mainHeight ) {
			topOffset = thumbHeight / 2 - mainHeight / 2;
			jQuery(this).siblings('.blog-post-slider-main').css({ top : topOffset });
		}

	});

}

/**
 * Carousel
 */

function heart_and_style_carousel() {

	jQuery('.blog-posts-slider-loader').hide();
	jQuery('.blog-posts-slider').show();
	
	// If more than 1 slide
	if ( jQuery('.blog-post-slider').length > 1 ) {

		var firstItem = jQuery('.blog-posts-slider').find('.blog-post-slider:first'),
		slider = jQuery('.blog-posts-slider');

		var duplicateContent = jQuery('.blog-posts-slider').html();

		if( ! navigator.userAgent.match(/iPhone/i) ) {

			if ( slider.find('.blog-post-slider').length < 12 ) {

				slider.prepend( duplicateContent );
				slider.prepend( duplicateContent );
				slider.append( duplicateContent );
				slider.append( duplicateContent );		

			} else {

				slider.prepend( duplicateContent );
				slider.append( duplicateContent );

			}

		}

		firstItem.addClass('first-carousel-blog-post');

		// Center main text
		heart_and_style_carousel_center();

		// Initiate carousel
		jQuery('.blog-posts-slider').owlCarousel({
			slideSpeed : 500,
			mouseDrag : false,
			pagination : false,
			singleItem : true,
			scrollPerPage: true,
			afterAction: function( carousel ){
				var visible_items = this.owl.visibleItems;
				carousel.find('.carousel-item-visible').removeClass('carousel-item-visible');
				carousel.find('.owl-item').filter(function(index) {
					return visible_items.indexOf(index) > -1;
				}).addClass('carousel-item-visible');				
			},
			afterInit: function(){
				setTimeout( function(){			
					heart_and_style_carousel_center();
				}, 100 );
			}
		});

		// Jump to first
		if ( jQuery('.blog-posts-slider.owl-carousel').length ) {
			var owl = jQuery('.blog-posts-slider').data('owlCarousel');
			owl.jumpTo( jQuery('.first-carousel-blog-post').closest('.owl-item').index() );
		}

		// Prev
		jQuery(document).on( 'click', '.blog-posts-slider-nav-prev', function() {

			var carousel = jQuery('.blog-posts-slider'),
			owl = jQuery('.blog-posts-slider').data('owlCarousel'),		
			carouselNext = carousel.find('.carousel-item-visible:first').prev('.owl-item');
				
			if ( carouselNext.length ) {

				// Get vars
				var currentSlideInfo = carousel.find('.carousel-item-visible .blog-post-slider-main'),
				topOffset = currentSlideInfo.position().top + 20;	

				// Hide the text on the next one
				carouselNext.find( '.blog-post-slider-main' ).css({ opacity : 0 });

				// Animate
				currentSlideInfo.stop().animate( { top : topOffset, opacity : 0 }, 600, 'easeInOutCubic', function() {

					// Make it slide
					carousel.data( 'owlCarousel' ).goTo( carouselNext.index() );

					setTimeout( function(){
						
						var currentSlideInfo = carousel.find('.carousel-item-visible .blog-post-slider-main'),
						topOffset = currentSlideInfo.position().top - 20;

						currentSlideInfo.css({ top : topOffset }).stop().animate({ top : topOffset + 20, opacity : 1 }, 600, 'easeInOutCubic');

					}, 500);

				});

			}

		});

		// Next
		jQuery(document).on( 'click', '.blog-posts-slider-nav-next', function() {

			var carousel = jQuery('.blog-posts-slider'),
			owl = jQuery('.blog-posts-slider').data('owlCarousel'),		
			carouselNext = carousel.find('.carousel-item-visible:first').next('.owl-item');
				
			if ( carouselNext.length ) {

				// Get vars
				var currentSlideInfo = carousel.find('.carousel-item-visible .blog-post-slider-main'),
				topOffset = currentSlideInfo.position().top + 20;	

				// Hide the text on the next one
				carouselNext.find( '.blog-post-slider-main' ).css({ opacity : 0 });

				// Animate
				currentSlideInfo.stop().animate( { top : topOffset, opacity : 0 }, 600, 'easeInOutCubic', function() {

					// Make it slide
					carousel.data( 'owlCarousel' ).goTo( carouselNext.index() );

					setTimeout( function(){
						
						var currentSlideInfo = carousel.find('.carousel-item-visible .blog-post-slider-main'),
						topOffset = currentSlideInfo.position().top - 20;

						currentSlideInfo.css({ top : topOffset }).stop().animate({ top : topOffset + 20, opacity : 1 }, 600, 'easeInOutCubic');

					}, 500);

				});

			}

		});
	
	} else {

		setTimeout( function(){
			heart_and_style_carousel_center();
		}, 100);

	}

}

/** 
 * Slider V2 
 */

function heart_and_style_slider_v2() {

	jQuery('.blog-posts-carousel-loader').hide();

	var firstItem = jQuery('.blog-posts-carousel').find('.blog-post-carousel:first'),
	slider = jQuery('.blog-posts-carousel'),
	spacing = jQuery('.wrapper').width() / 100 * 2.76 / 2;

	slider.find('.blog-post-carousel').css({ 'padding-left' : spacing, 'padding-right' : spacing });
	slider.css({ 'margin-left' : spacing * -1, 'width' : jQuery('.wrapper').width() + spacing * 2 });

	var duplicateContent = jQuery('.blog-posts-carousel').html();

	if( ! navigator.userAgent.match(/iPhone/i) ) {

		if ( slider.find('.blog-post-carousel').length < 12 ) {

			slider.prepend( duplicateContent );
			slider.prepend( duplicateContent );
			slider.append( duplicateContent );
			slider.append( duplicateContent );		

		} else {

			slider.prepend( duplicateContent );
			slider.append( duplicateContent );

		}

	}

	firstItem.addClass('first-carousel-blog-post');

	// Initiate carousel
	jQuery('.blog-posts-carousel').owlCarousel({
		items : 3,
		itemsDesktop : [1199,2],
		itemsDesktopSmall : [979,2],
		itemsTablet : [ 768, 1 ],
		itemsMobile : [479,1],
		slideSpeed : 500,
		mouseDrag : false,
		pagination : false,
		scrollPerPage: true,
		afterAction: function( carousel ){
			var visible_items = this.owl.visibleItems;
			carousel.find('.carousel-item-visible').removeClass('carousel-item-visible');
			carousel.find('.owl-item').filter(function(index) {
				return visible_items.indexOf(index) > -1;
			}).addClass('carousel-item-visible');				
		},
	});

	// Jump to first
	if ( jQuery('.blog-posts-carousel.owl-carousel').length ) {
		var owl = jQuery('.blog-posts-carousel').data('owlCarousel');
		owl.jumpTo( jQuery('.first-carousel-blog-post').closest('.owl-item').index() );
	}

	// Prev
	jQuery(document).on( 'click', '.blog-posts-carousel-nav-prev', function() {

		var carousel = jQuery('.blog-posts-carousel'),
		owl = jQuery('.blog-posts-slider').data('owlCarousel'),		
		carouselNext = carousel.find('.carousel-item-visible:first').prev('.owl-item');
		
		var carouselData = carousel.data( 'owlCarousel' );
		carouselData.prev();

	});

	// Next
	jQuery(document).on( 'click', '.blog-posts-carousel-nav-next', function() {

		var carousel = jQuery('.blog-posts-carousel'),
		owl = jQuery('.blog-posts-slider').data('owlCarousel'),		
		carouselNext = carousel.find('.carousel-item-visible:first').prev('.owl-item');
		
		var carouselData = carousel.data( 'owlCarousel' );
		carouselData.next();

	});

}

/**
 * Retina Images
 */
function heart_and_style_retina_img_replace() {

	jQuery('img.has-retina-ver').each(function(){

		jQuery(this)
			.css({ height : jQuery(this).height(), width : jQuery(this).width() })
			.attr( 'src', jQuery(this).data('retina-ver') );		

	});

}

jQuery(document).ready(function($){

	/**
	 * Navigation Arrows
	 */

	$('#navigation #primary-menu > li:has(ul) > a').append('<span class="fa fa-chevron-down"></span>');
	
	/**
	 * Scroll To Top
	 */

	$('.scroll-to-top').on( 'click', function(){
		$('html, body').animate({ scrollTop: 0 }, 1000);
	});

	/**
	 * Header Search
	 */

	// Show/Hide Placeholder
	$('.header-search input[type="text"]').keyup(function() {
		if ( $(this).val() == '' ) {
			$('.header-search-placeholder').show();
		} else {
			$('.header-search-placeholder').hide();
		}
	});

	// Focus on click
	$('.header-search-placeholder').click(function(){
		$('.header-search input[type="text"]').focus();
	});

	// Show Search
	$(document).on( 'click', '.header-search-hook-show', function(e) {

		e.preventDefault();

		var parent = $(this).closest('#header-social'),
		holder = parent.find('.header-search'),
		form = holder.find('form'),
		input = holder.find('input[type="text"]');

		input.focus();

		holder.stop().animate({ width : form.outerWidth() }, 300, function(){
			holder.find( '.header-search-hook-hide' ).stop().animate({ opacity : 1 }, 200);
			holder.find( '.header-search-placeholder' ).stop().animate({ opacity : 0.6 }, 200);
		});

	});

	// Hide Search
	$(document).on( 'click', '.header-search-hook-hide', function(e) {

		e.preventDefault();

		var parent = $(this).closest('#header-social'),
		holder = parent.find('.header-search'),
		form = holder.find('form');

		holder.find( '.header-search-placeholder, .header-search-hook-hide' ).stop().animate({ opacity : 0 }, 200, function(){
			holder.stop().animate({ width : 0 }, 300 );
		});

	});

	// Load More
	$(document).on( 'click', '.pagination-load-more a', function(e) {

		e.preventDefault();

		if ( $(this).parent().hasClass('active') ) {

			var _this = $(this),
			module = $(this).closest('.blog-posts-listing'),
			pagination = module.find('.pagination'),
			postsContainer = module.find('.blog-posts-listing-inner'),
			moduleID = module.attr('id'),
			pagLink = _this.attr('href'),
			tempHolder = module.find('.load-more-temp');

			_this.find('.fa').addClass('fa-spin');

			tempHolder.load( pagLink + ' .blog-posts-listing', function(){

				postsContainer.append( tempHolder.find('.blog-posts-listing-inner').html() );

				module.find('.pagination').html( tempHolder.find('.pagination').html() );

				pagination.replaceWith( tempHolder.find('.pagination') );

				tempHolder.html('');

			});
		}	

	});

	/**
	 * Mobile Nav
	 */

	$('.header-search-mobile-nav-hook select').change(function() {
		window.location = $(this).val();
	});	

	 $('.hidden-lightbox-gallery').magnificPopup({
		delegate: 'a',
		gallery: {
			enabled: true
		},
		type: 'image'
	});

});

jQuery(window).load(function(){

	// post count
	if ( jQuery('.heart-and-style-count-views').length ) {

		var postID = jQuery('.heart-and-style-count-views').data('post-id');

		jQuery.post(
			MTAjax.ajaxurl,
			{
				action : 'heart-and-style-increment-viewcount',
				mt_post_id : postID
			}
		);

	}

	// Make sure tagline image is large enough 
	if ( jQuery('#tagline').length ) { 
		var taglineImgURL = jQuery('#tagline').css('background-image'),
		taglineHeight = jQuery('#tagline').outerHeight(),
		taglineImg,
		taglineNewW,
		taglineNewH,
		taglineNewSize;

		// Remove url() or in case of Chrome url("")
		taglineImgURL = taglineImgURL.match(/^url\("?(.+?)"?\)$/);

		if (taglineImgURL !== null) {

		    taglineImgURL = taglineImgURL[1];
		    taglineImg = new Image();

		    // just in case it is not already loaded
		    jQuery(taglineImg).load(function () {

		    	if ( taglineHeight > taglineImg.height ) {
		    		
		    		taglineNewH = taglineHeight + taglineHeight / 100 * 10;
		    		taglineNewW = taglineImg.width * ( taglineNewH / taglineImg.height );
		    			
		    		taglineNewSize = taglineNewW + 'px ' + taglineNewH + 'px';

		    		jQuery('#tagline').css({ 'background-size' : taglineNewSize });

		    	} else {

		    		jQuery('#tagline').css({ 'background-size' : 'cover' });

		    	}

		    });

		    taglineImg.src = taglineImgURL;

		}
	}

	// sticky sidebar
	if ( jQuery(window).width() > 767 ) {
		jQuery('body.sticky-sidebar-enabled #sidebar').stick_in_parent({
			offset_top : 80
		});
	}

	// Init stellar
	if ( jQuery(window).width() > 959 ) {
		jQuery(window).stellar({
			horizontalOffset : 0
		});
	}

	// Init carousel
	heart_and_style_carousel();
	heart_and_style_slider_v2();

	/**
	 * Retina
	 */
	var retina = window.devicePixelRatio > 1;
	if ( retina ) {
		jQuery('body').addClass('retina');
		heart_and_style_retina_img_replace();
	} else {
		jQuery('body').addClass('not-retina');		
	}

	/**
	 * Reloading page
	 */

	jQuery('#page').data( 'start-width', jQuery(window).width() );

	jQuery(window).resize(function(){

		if ( jQuery('#page.reloading').length < 1 ) {

				var startWidth = jQuery('#page').data('start-width');
				var currentWidth = jQuery(window).width();
				var startID;

				if ( startWidth < 480 )
					startID = 'portrait'
				else if ( startWidth < 768 )
					startID = 'landscape';
				else if ( startWidth < 959 )
					startID = 'tablet';
				else if ( startWidth < 1200 )
					startID = 'monitor';
				else
					startID = 'big'

				if ( startID == 'big' && currentWidth < 1200 ) {
					location.reload();
					jQuery('#page').addClass('reloading');
				} else if ( startID == 'monitor' && ( currentWidth < 959 || currentWidth > 1200 ) ) {
					location.reload();
					jQuery('#page').addClass('reloading');
				} else if ( startID == 'tablet' && ( currentWidth < 768 || currentWidth > 959 ) ) {
					location.reload();
					jQuery('#page').addClass('reloading');
				} else if ( startID == 'landscape' && ( currentWidth < 480 || currentWidth > 768 ) ) {
					location.reload();			
					jQuery('#page').addClass('reloading');
				} else if ( startID == 'portrait' && ( currentWidth > 479 ) ) {
					location.reload();
					jQuery('#page').addClass('reloading');
				}

			}

		});

});

jQuery(window).resize(function(){

	setTimeout( function(){
		heart_and_style_carousel_center();
	}, 300 );

});

jQuery(window).load(function(){

	var delay = 300;
	var cssDelay = 1000;
	var timeout = 0;

	jQuery('.blog-posts-carousel').show();

	jQuery('.blog-post-carousel').each(function(){

		var panelHeight = jQuery(this).find('.blog-post-carousel-back').height() - 50,
		contentHeight = jQuery(this).find('.blog-post-carousel-back-main').height(),
		newHeight = panelHeight / 2 - contentHeight / 2;

		if ( newHeight > 0 ) {
			jQuery(this).find('.blog-post-carousel-back-main').css({ 'margin-top' : newHeight });
		}

	});

	if ( jQuery('.blog-posts-carousel').length ) {

		var windowWidth = jQuery(window).width(),
		itemWidth = jQuery('.blog-post-carousel').outerWidth(),
		itemVisible = Math.floor( windowWidth / itemWidth ) + 2,
		itemExtraAdjacent = ( itemVisible - 3 ) / 2;

		jQuery('.carousel-item-visible').addClass('blog-post-carousel-anim-on-load');
		jQuery('.carousel-item-visible:first').prevAll('.owl-item').slice(0, 2).addClass('blog-post-carousel-anim-on-load');
		jQuery('.carousel-item-visible:last').nextAll('.owl-item').slice(0, 2).addClass('blog-post-carousel-anim-on-load');

		setTimeout( function() {
			
			jQuery('.blog-posts-carousel .owl-item:not(.blog-post-carousel-anim-on-load) .blog-post-carousel').each(function(){
					
				var _this = jQuery(this);

				setTimeout( function(){
					_this.addClass('blog-post-carousel-show');
				}, 500);

				setTimeout( function(){
					_this.removeClass('blog-post-carousel-hovered');
				}, 500 );

			});

		}, 200 );

		timeout = 0;

		setTimeout( function() {
			
			jQuery('.blog-posts-carousel .blog-post-carousel-anim-on-load .blog-post-carousel').each(function(){
					
				var _this = jQuery(this);

				setTimeout( function(){
					_this.addClass('blog-post-carousel-show');
				}, timeout);

				setTimeout( function(){
					_this.removeClass('blog-post-carousel-hovered');
				}, timeout );

				timeout = timeout + delay;

			});

		}, 200 );

	}

});