// ============================== Foundation 6 ============================================================================= //
	$(document).foundation();
// ============================== svg4everybody.min.js Initial ============================================================================= //
	svg4everybody();
// ============================== Full Screen Form Effects ============================================================================= //
	$('#js-contact-open').click(function(event) {
		$('body').toggleClass('has-contact-open');
		$('#header-main .js-headroom').removeClass('is-pinned').addClass('is-unpinned');
	});
// ============================== Main Nav Effects ============================================================================= //
	$('#js-nav-main-button').click(function() {
		$('body').toggleClass('has-nav-open');
	});
	// Headroom
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
	$('.js-swap-text').hover(
		function() {
			var $this = $(this);
			$this.removeClass('is-out').addClass('is-in').addClass('is-swapping');
			swapText( $this, 'hover-text' );
		},
		function() {
			var $this = $(this);
			$this.addClass('is-out').removeClass('is-in').removeClass('is-swapping');
			swapText( $this, 'text' );
		}
	);
	function swapText( ele, changeText ) {
		var $time = 400;
		ele.find('.js-swap-line').each(function() {
			var $this = $(this);
			setTimeout(function() {
				var $text = $this.data( changeText );
				$this.html( $text );
			}, $time );
			$time += 100;
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
