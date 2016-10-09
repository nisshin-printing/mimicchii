<?php
if ( is_single() ) {
	$prefix = 'article: http://ogp.me/ns/article#';
} else {
	$prefix = 'website: http://ogp.me/ns/website#';
}
$is_front = ( ! is_front_page() ) ? ' not-front' : '';

// Echo
echo '<!DOCTYPE html><html lang="ja" dir="ltr">',
'<html lang="ja" dir="ltr"><head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# ',
$prefix, '">',
'<meta charset="UTF-8">',
'<meta http-equiv="X-UA-Compatible" content="IE=edge,chorme=1">',
'<meta name="viewport" content="width=device-width, initial-scale=1.0">',
'<!--[if lt IE 9]><script src="//cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script><script src="//cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script><![endif]--><script>' . file_get_contents( TJS . 'prefetch-onload.min.js' ) . '</script>',
wp_head();
?></head>
<body id="PageTop" <?php body_class( 'is-loading' ); ?>>
	<header>
		<div class="row">
			<h1><a href="<?php echo DTDSH_HOME_URL; ?>" title="<?php echo DTDSH_SITENAME; ?>">みみっちぃ訳ではない。</a><a href="http://dtdsh.com/" title="By 日進印刷株式会社" target="_blank">by 日進印刷株式会社</a></h1>
		</div>
	</header>