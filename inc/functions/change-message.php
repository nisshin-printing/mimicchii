<?php
// Get greeting time.
function getGreetingMS() {
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
	echo $greet;
}