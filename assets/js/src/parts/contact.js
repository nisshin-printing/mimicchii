! function ($) {
	'use strict';

	/*
	 * Function about Write Fullscreen Contact Form Text.
	 * Functions
	 */
	let bgChange = $('body, #header-main .js-header-background, #header-main .js-header-nav'),
		bgCgClass = 'has-contact-open u-background u-alt-background',
		metaBg = $('meta[theme-color]'),
		contact = $('#js-contact'),
		ctStep = contact.find('.js-contact-step');

	/*
	 * Fuctions
	 */
	// Show message animations.
	function contactMessages() {
		// toggle class to ".js-contact-step"
		ctStep.each(function (i) {
			let _this = $(this),
				delayAni = 200 * i;
			setTimeout(function () {
				_this.toggleClass('is-active');
			}, delayAni);
		});
	};
	// JS-contact-open OPEN/CLOSE functions
	function toggleContact() {
		if ($('body').hasClass('has-contact-open')) {
			// Change meta[theme-color]
			metaBg.attr('content', contact.data('bgColor'));
		} else {
			// Change meta[theme-color]
			metaBg.attr('content', '#FFF');
		}

		// Change class of Headroom added class.
		if (window.matchMedia("(max-width: 640px)").matches) {
			$('#header-main .js-header-container, #header-main .js-header-background')
				.removeClass('is-pinned').addClass('is-unpinned');
		} else {
			$('#header-main .js-header-nav, #header-main .js-header-background')
				.removeClass('is-unpinned').addClass('is-pinned');
		}
	};
	// Welcome message event.
	function showWelcome() {
		contactMessages();
		toggleContact();
		setTimeout(function () {
			bgChange.toggleClass(bgCgClass);
			ctStep.removeClass('is-active');
		}, 3000);
	};
	// Click for Contact-CTA-button 
	function clickContact(ele) {
		$(ele).click(() => {
			bgChange.toggleClass(bgCgClass);
			toggleContact();
			contactMessages();
		});
	}



	// Hide for Loading Effects.
	$(window).load(() => {
		$('#loader').addClass('animated');
		$('body').addClass('is-loaded').removeClass('is-loading');
		showWelcome();
	});
	// Click Button about Contact Form.
	clickContact('#js-contact-open');
}(jQuery);