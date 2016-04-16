<?php
// Template Name: フロントページ
dtdsh_header();
ob_start();
include( TFRONT . 'fp-news.php' );
include( TFRONT . 'fp-featured.php' );
include( TFRONT . 'fp-service.php' );
include( TFRONT . 'fp-article.php' );
echo '<div id="contact-form" class="fp-contact" data-magellan-target="contact-form">
	<div class="row">
		<div class="column">
			<h2>Contact</h2>
		</div>',
	do_shortcode( '[contact-form-7 id="417" title="お問い合わせ"]' ),
	'</div></div>';
$front = ob_get_contents();
ob_end_clean();
$front = dtdsh_html_format( $front, false );
echo $front;
dtdsh_footer();