<?php
// ============================== 正規表現チェッカー ============================================================================= //
function regex_preg_match() {
	$pattern = $_POST['pattern'];
	$subject = $_POST['subject'];
	preg_match( $pattern, $subject, $matches );
	print_r( $matches );
}
add_action( 'wp_ajax_regex_preg_match', 'regex_preg_match' );
add_action( 'wp_ajax_nopriv_regex_preg_match', 'regex_preg_match' );