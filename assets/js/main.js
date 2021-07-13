(function($) {
	var menItem = $('.et_mobile_menu li'),
		mobileMenu = $('.et_mobile_menu');
		
		menItem.click(function() {
			mobileMenu.slideUp();
		});
	
})(jQuery);