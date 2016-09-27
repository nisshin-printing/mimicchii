!function($) {
	'use strict';
	
	$(document).ready(() => {
		$('#js-nav-main-button').click(() => {
			$('body').toggleClass('has-nav-open');
		});
	});
}(jQuery);