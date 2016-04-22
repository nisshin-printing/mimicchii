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
		<div class="column text-center">
			<h2>Contact</h2>
			<p>お問い合わせは、<a href="mailto:nisshin@dtdsh.com" title="お問い合わせ">nisshin@dtdsh.com</a>までご連絡ください。<br>お電話でのお問い合わせは、<a href="tel:0822371611" title="お電話でのお問い合わせ">082-237-1611</a>へどうぞ。<br>受付時間は平日9時～17時です。</p>
		</div>
	</div></div>';
$front = ob_get_contents();
ob_end_clean();
$front = dtdsh_html_format( $front, false );
echo $front;
dtdsh_footer();