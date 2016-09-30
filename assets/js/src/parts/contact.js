! function ($) {
	'use strict';

	/*
	 * Function about Write Fullscreen Contact Form Text.
	 * Functions
	 */
	let metaBg = $('meta[theme-color]'),
		contact = $('#js-contact'),
		ctsWel = $('#js-welcome .js-contact-step'),
		ctsCta = $('#js-ctform .js-contact-step');

	// Loading Effects.
	$(window).load(() => {
		$('body').toggleClass('is-loading is-loaded');
		$('#loader').addClass('animated');
		if ($('body').hasClass('has-contact-open')) {
			isHeadroomPin(false);
			contactMessage(ctsWel);
			setTimeout(function() {
				ctsWel.removeClass('is-active');
				$('body').toggleClass('has-contact-open u-background u-alt-background is-welcome');
				metaBg.attr('content', '#FFF');
				isHeadroomPin(true);
			}, 3000);
		}
	});
	
	// Click the Contact-Button.
	$('#js-contact-open').click(() => {
		if (!$('body').hasClass('has-contact-open')) {
			// Opening function.
			$('body').toggleClass('has-contact-open u-background u-alt-background');
			metaBg.attr('content', contact.data('bgColor'));
			isHeadroomPin(true);
			contactMessage(ctsCta);
		} else {
			// Closing function.
			$('body').toggleClass('has-contact-open u-background u-alt-background');
			metaBg.attr('content', '#FFF');
			ctsCta.removeClass('is-active');
		}
	});
	
	/*
	 * Functions
	 */
	function contactMessage(ele) {
		ele.each(function(i) {
			let _this = $(this),
				delayAni = 200 * i;
			setTimeout(function() {
				_this.addClass('is-active');
			}, delayAni);
		});
	}
	function isHeadroomPin(pin = true) {
		let sp = $('#header-main .js-header-container, #header-main .js-header-background'),
			pc = $('#header-main .js-header-nav, #header-main .js-header-background');
		if (pin) {
			if (window.matchMedia("(max-width: 640px)").matches) {
				sp.addClass('is-pinned').removeClass('is-unpinned');
			} else {
				pc.removeClass('is-pinned').addClass('is-unpinned');
			}
		} else {
			if (window.matchMedia("(max-width: 640px)").matches) {
				sp.removeClass('is-pinned').removeClass('is-unpinned');
			} else {
				pc.removeClass('is-pinned').removeClass('is-unpinned');
			}
		}
	}
}(jQuery);