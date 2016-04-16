jQuery(document).ready(function($) {
	var adminBar = ( document.getElementById('wpadminbar') != null ) ? $('#wpadminbar').height() : 0,
		mainNav = ( document.getElementById('sticky-topbar') != null ) ? $('#sticky-topbar').height() : 0,
		actionsBtn = $('#btn-fixed-actions'),
		headerHeight = parseInt(adminBar) + parseInt(mainNav);
// ============================== Foundation 6 ============================================================================= //
	// Default Settings
	Foundation.Accordion.defaults.allowAllClosed = true;
	Foundation.Magellan.defaults.barOffset = headerHeight - 27;
	// Foundation Init
	$(document).foundation();
// ============================== Sticky Nav ============================================================================= //
	$('#sticky-topbar').sticky({
		topSpacing: adminBar,
		getWidthFrom: 'header'
	});
// ============================== Page Up Effects ============================================================================= //
	$(window).scroll(function() {
		if ($(this).scrollTop() > 200) {
			actionsBtn.fadeIn('slow');
		} else {
			actionsBtn.fadeOut('slow');
		};
	});
	$('[href^="#"]').on('click', function() {
		var href = $(this).attr('href'),
			target = $(href == '#' || href == '' ? 'html' : href),
			position = target.offset().top - headerHeight;
		$('html, body').animate({
			scrollTop: position
		}, 550, 'swing');
	});
	// 郵便番号から住所自動入力
	if ($('#zip').length != 0) {
		$('#zip').keyup(function(event) {
			AjaxZip3.zip2addr(this, '', 'addr', 'addr');
		});
	};
	// 名前のフリガナを自動入力
	if ($('#user-name,#user-name-kana').length != 0) {
		$.fn.autoKana('#user-name', '#user-name-kana', {
			katakana: true
		});
	};
});
// ============================== 正規表現チェッカー ============================================================================= //