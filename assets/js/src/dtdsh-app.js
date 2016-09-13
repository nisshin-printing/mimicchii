// svg4everybody
require('../../../node_modules/svg4everybody/dist/svg4everybody.js');
// ============================== Foundation 6 ============================================================================= //
require('../../../node_modules/foundation-sites/dist/foundation.js');
$(document).foundation();

// ============================== Full Screen Form Effects ============================================================================= //
$('#js-contact-open').click(function () {
	$('body').toggleClass('has-contact-open');
	$('#header-main .js-headroom').removeClass('is-pinned').addClass('is-unpinned');
});
// ============================== Main Nav Effects ============================================================================= //
$('#js-nav-main-button').click(function () {
	$('body').toggleClass('has-nav-open');
});
// Headroom
require('./headroom.js');
require('./jquery.headroom.js');
$('#header-main .js-headroom').headroom({
	'classes': {
		initial: 'js-headroom',
		pinned: 'is-pinned',
		unpinned: 'is-unpinned',
		top: 'is-top',
		notTop: 'is-not-top'
	}
});
// ============================== Block hover Effects ============================================================================= //
$('.js-swap-text').hover(function() {
		$(this).removeClass('is-out').addClass('is-in').addClass('is-swapping');
		swapText($(this), 'hover-text');
	},
	function() {
		$(this).addClass('is-out').removeClass('is-in').removeClass('is-swapping');
		swapText($(this), 'text');
	}
);

function swapText(ele, changeText) {
	duration = 400;
	ele.find('.js-swap-line').each(function () {
		setTimeout(function () {
			$text = $(this).data(changeText);
			$(this).html($text);
		}, duration);
		duration += 100;
	});
}
// ============================== Page Up Effects ============================================================================= //
$(window).scroll(function() {
	if ($(this).scrollTop() > 200) {
		actionsBtn.fadeIn('slow');
	} else {
		actionsBtn.fadeOut('slow');
	};
});
$('[href^="#"]').on('click', function() {
	href = $(this).attr('href');
	target = $(href === '#' || href === '' ? 'html' : href);
	position = target.offset().top - headerHeight;
	$('html, body').animate({
		scrollTop: position
	}, 550, 'swing');
});
// 郵便番号から住所自動入力
if ($('#zip').length !== 0) {
	$('#zip').keyup(function() {
		AjaxZip3.zip2addr(this, '', 'addr', 'addr');
	});
}
// 名前のフリガナを自動入力
if ($('#user-name,#user-name-kana').length !== 0) {
	$.fn.autoKana('#user-name', '#user-name-kana', {
		katakana: true
	});
}