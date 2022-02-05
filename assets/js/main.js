(function($) {
	var 
	menuOverlay = $('.menuOverlay'),
	clientOverlay = $('.clientsContainer'),
	hamburgerIcon = $('.hamburger'),
	header = $('header');
	function toggleMenu() {
		$('body').toggleClass('menuOpen');

		hamburgerIcon.toggleClass('is-active');

		header.toggleClass('is-active');

		menuOverlay.fadeToggle('fast');

		/*
		if ( subMenuLink.href.indexOf("#") != -1 ) {
			hamburgerIcon.removeClass('is-active');
			$('body').removeClass('menuOpen');
		}
		*/
	}

	// MOBILE MENU
	$('.hamburger').click(function(e) {
		e.preventDefault();
		toggleMenu();
	});
	
	$('.menuInner .menu-item a').click(function(e) {
		e.stopPropagation();
		toggleMenu();
	});
	
	/*
	// REVEAL FLYER CONTAINER ON CLICK
	var pdfContainer = $('.flyer-container'),
		viewPDFButton = $('.view-pdf-container');
	viewPDFButton.click(function(e) {
		e.preventDefault();
		pdfContainer.slideDown();
	});
	*/

	// CLICK TO OPEN BIOS
	var 
	bioContainer = $('.bio-container'),
	leahButton = $('.leah'),
	johnnaButton = $('.johnna'),
	leahBio = $('#bio-390'),
	johnnaBio = $('#bio-391');
	topHeaderHeight = $('#top-header').height();
	
	leahButton.on('click', function(e) {
		e.preventDefault();
		bioContainer.fadeIn();
		bioContainer.find(leahBio).addClass('reveal');
	});

	johnnaButton.on('click', function(e) {
		e.preventDefault();
		bioContainer.fadeIn();
		bioContainer.find(johnnaBio).addClass('reveal');
	});

	// CLOSE BIOS VIA ESC BUTTON
	$(document).on('keydown', function(e) {
		if ( e.keyCode == 27 || e.keyCode == 'ESC' ) {
			bioContainer.fadeOut();
			bioContainer.find('.bio-container-table').removeClass('reveal');
		}
	});

	// CLOSE MODAL VIA OUTER OVERLAY
	bioContainer.on('click', function() {
		$(this).fadeOut();
		$(this).find('.bio-container-table').removeClass('reveal');
	});

	$('.bio-container-inner').on('click', function(e) {
		e.stopPropagation();
	});

	$('.close-bio-container').on('click', function() {
		bioContainer.fadeOut();
		bioContainer.find('.bio-container-table').removeClass('reveal');
	});
	
	// CLOSE MENU ON LINK CLICK
	var menItem = $('.et_mobile_menu li'),
		mobileMenu = $('.et_mobile_menu'),
		header = $('#main-header'),
		splashContainer = $('.splash-container'),
		splash = $('.splash'),
		viewport = $(window);
		
	menItem.click(function() {
		mobileMenu.slideUp();
	});
	
	function splashHeight() {
		splash.height(viewport.height() - header.height());
	}
	
	function splashContainerPadding() {
		splashContainer.css('padding-top', header.height() + topHeaderHeight);
	}
	
	// HIDE/SHOW HEADER ON SCROLL
	var lastScrollTop = 0;
	var delta = 5;
	$(window).on('scroll', function() {
		var st = $(this).scrollTop();
		if (st < lastScrollTop) {
			$('header, body').addClass('up').removeClass('down');
		} else if (st > lastScrollTop && st > delta) {
			$('header, body').addClass('down').removeClass('up');
		}
		
		lastScrollTop = st;
	});
	
	$(function ($) {
		//splashHeight();
		splashContainerPadding();
	});
	
	viewport.resize(function() {
		//splashHeight();
		splashContainerPadding();
	});
	
})(jQuery);