(function($) {
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
		splashContainer.css('padding-top', header.height());
	}
	
	// HIDE/SHOW HEADER ON SCROLL
	var lastScrollTop = 0;
	var delta = 5;
	$(window).on('scroll', function() {
		var st = $(this).scrollTop();
		if (st < lastScrollTop) {
			$('header').addClass('up').removeClass('down');
		} else if (st > lastScrollTop && st > delta) {
			$('header').addClass('down').removeClass('up');
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