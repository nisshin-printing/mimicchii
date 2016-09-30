<?php
// Get greeting time.
function isWelcomeMessage( $is_welcome = true ) {
	if ( $is_welcome ) {
		$howLongWidth = mb_convert_kana( date( 'Y' ) - 1928, 'N' );
		$greet = "
			<span class=\"js-contact-step hide-for-large\">日進印刷株式会社は</span>
			<span class=\"js-contact-step\">紹介だけで${howLongWidth}年続く</span>
			<span class=\"js-contact-step\">広島最古の印刷会社です。</span>
";
	} else {
		$hours = date('G') + 9;
		if ( $hours <= 10 ) {
			$greet = '<span class="js-contact-step">おはようございます。</span><span class="js-contact-step">何か、お探しですか？</span>';
		} elseif ( $hours <= 16 ) {
			$greet = '<span class="js-contact-step">こんにちは。</span><span class="js-contact-step">何か、お探しですか？</span>';
		} elseif ( $hours <= 21 ) {
			$greet = '<span class="js-contact-step">こんばんは。</span><span class="js-contact-step">何か、お探しですか？</span>';
		} elseif ( $hours <= 24 ) {
			$greet = '<span class="js-contact-step">遅くまでお疲れ様です。</span><span class="js-contact-step">何か、お探しですか？</span>';
		} else {
			$greet = '<span class="js-contact-step">何か、お探しですか？</span>';
		}
	}
	echo $greet;
}