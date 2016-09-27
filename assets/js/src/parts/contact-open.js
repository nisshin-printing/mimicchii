!function($) {
	'use strict';

	// Hide for Loading Effects.
	$(window).load(() => {
		$('#loader').addClass('animated');
		$('body').addClass('is-loaded').removeClass('is-loading');
	});
	
	/*
	* Function about Write Fullscreen Contact Form Text.
	 * Functions
	 */
	let content = $('.c-contact_content'),
		contact = $('#js-contact'),
		btnMenu = $('#js-contact .js-contact-step');

	// Get greeting time.
	function getGreetingTime() {
		let now = new Date(),
			hours = now.getHours(),
			greet = null;
		if (6 >= hours) {
			greet = 'morning';
		} else if (11 >= hours) {
			greet = 'afternoon';
		} else if (17 >= hours) {
			greet = 'evening';
		} else {
			greet = 'night';
		}
		return greet;
	}

	// Get title message at Contact-Form.
	function contactMessage() {
		let greet = getGreetingTime(),
			textData = `greeting-${greet}`,
			cT = contact.data(textData);
		return cT;
	}
	
	// 
	// Click Button about Contact Form.
	$('#js-contact-open').click(() => {
		let bgChange = $('body, #header-main .js-header-background, #header-main .js-header-nav'),
			bgCgClass = 'has-contact-open u-background u-alt-background';
		
		// Add toggle class to "*-background"
		bgChange.toggleClass(bgCgClass);
		
		// Change class of Headroom added class.
		if ($('body').hasClass('has-contact-open') && window.matchMedia("(max-width: 1023px)")) {
			$('#header-main .js-container').removeClass('is-pinned').addClass('is-unpinned');
		}
		if (window.matchMedia("(min-width: 1024px)")) {
			$('#header-main .js-header-background, #header-main .js-header-nav')
				.removeClass('is-unpinned').addClass('is-pinned');
		}
		
		// toggle class to ".js-contact-step"
		btnMenu.each((i, ele) => {
			let delayAni = 100 * i;
			setTimeout(() => {
				ele.toggleClass('is-active');
			}, delayAni);
		});
	});
}(jQuery);