<?php
if ( is_single() ) {
	$prefix = 'article: http://ogp.me/ns/article#';
} else {
	$prefix = 'website: http://ogp.me/ns/website#';
}
$is_front = ( ! is_front_page() ) ? ' not-front' : '';

echo '<!DOCTYPE html><html lang="ja" dir="ltr">',
'<html lang="ja" dir="ltr"><head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# ',
$prefix, '">',
'<meta charset="UTF-8">',
'<meta http-equiv="X-UA-Compatible" content="IE=edge,chorme=1"><meta name="viewport" content="width=device-width, initial-scale=1.0">',
'<!--[if lt IE 9]><script src="//cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script><script src="//cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script><![endif]--><script>' . file_get_contents( TJS . 'prefetch.min.js' ) . '</script><meta name="theme-color" content="#FFF">',
'<script>svg4everybody();</script>';
wp_head();
?></head>
<body id="PageTop" <?php body_class( 'u-background' ); ?>>
	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-WV7S6J" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-WV7S6J');</script>
	<div class="loader bg-blue">
		<div class="loader-figure"></div>
	</div>
	<div id="" class="c-fab" data-widget="contact">
		<div class="c-fab_ripple u-background-accent"></div>
		<button type="button" class="c-fab_button u-background-accent u-foreground-accent js-fab" id="js-contact-open" title="お問い合わせ">
			<svg class="c-fab_icon -create" role="image">
				<use xlink:href="<?php echo TSVG, 'locomotive.svg#icon-create'; ?>">
			</svg>
			<svg class="c-fab_icon -close" role="image">
				<use xlink:href="<?php echo TSVG, 'locomotive.svg#icon-close'; ?>">
			</svg>
		</button>
	</div>
	<header id="header-main" class="header-main" role="banner">
		<div class="header-main-container u-background js-headroom">
			<div id="js-nav-main-button" class="header-main-nav-button">
				<button type="button" class="waves-effect" title="メニュー">
					<span></span>
					<p>メニュー</p>
				</button>
			</div>
			<a href="<?php echo DTDSH_HOME_URL; ?>" class="header-main-logo">
				<svg role="image" class="icon hide-for-large">
					<title>日進印刷株式会社</title>
					<desc>日進印刷株式会社のロゴです。</desc>
					<use xlink:href="<?php echo TSVG, 'icons.svg#logo-main'; ?>">
				</svg>
				<svg role="image" class="icon show-for-large">
					<title>日進印刷株式会社</title>
					<desc>日進印刷株式会社のロゴです。</desc>
					<use xlink:href="<?php echo TSVG, 'icons.svg#logo-vertical'; ?>">
				</svg>
			</a>
			<div class="nav-main-wrapper u-background">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'dtdsh-primarynav',
						'container' => 'nav',
						'container_class' => 'nav-main',
						'container_id' => 'js-nav-main',
						'menu_class' => 'menu u-background',
						'items_wrap' => '<ul class="%2$s">%3$s</ul>'
					) );
				?>
			</div>
			<div class="nav-overlay"></div>
		</div>
	</header>
	<main id="content-wrapper" role="main">