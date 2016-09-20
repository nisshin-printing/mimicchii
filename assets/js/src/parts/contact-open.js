!function($) {
	'use strict';

	// Hide for Loading Effects.
	$(window).load(() => {
		$('#loader').addClass('animated');
		$('body').removeClass('is-loading').addClass('is-loaded');
	});
	
	// Function about Write Fullscreen Contact Form Text.
	function writeText( text) {
		let ele = $('c-contact_textbox');
		ele.text('').
	}
	// Click Button about Contact Form.
	$('#js-contact-open').click(() => {
		$('body, #header-main .js-header-background').toggleClass('has-contact-open u-background u-alt-background');
		if ($('body').hasClass('has-contact-open') && window.matchMedia("(max-width: 1023px)")) {
			$('#header-main .js-container').removeClass('is-pinned').addClass('is-unpinned');
		}
		if (window.matchMedia("(min-width: 1024px)")) {
			$('#header-main .js-header-background, #header-main .js-header-nav')
				.removeClass('is-unpinned').addClass('is-pinned');
		}
	});
}(jQuery);