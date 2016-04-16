<?php
$on_load = ( is_page( 'company' ) ) ? ' onload="initialize();"' : '';
$head = ( is_singular() ) ? '<html lang="ja" dir="ltr"><head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">' : '<html lang="ja" dir="ltr"><head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">';
$is_hide = ( ! is_front_page() ) ? 'li-nav hide-for-large' : 'li-nav';
$is_magellan = ( is_front_page() ) ? ' data-magellan-target="PageTop"' : '';
echo '<!DOCTYPE html><html lang="ja" dir="ltr">',
$head,
'<meta charset="UTF-8">',
'<meta http-equiv="X-UA-Compatible" content="IE=edge,chorme=1"><meta name="viewport" content="width=device-width, initial-scale=1.0">',
'<!--[if lt IE 9]><script src="//cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script><script src="//cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script><![endif]--><script>' . file_get_contents( TJS . 'prefetch-onload.min.js' ) . '</script><meta name="theme-color" content="#000">';
dtdsh_dynamic_inlining_style();
wp_head();
?></head>
<body id="PageTop" <?php body_class(); echo $on_load, $is_magellan; ?>>
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-WV7S6J" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-WV7S6J');</script>
<header role="banner">
	<div class="top-marketing-bar row expanded">
		<div class="medium-8 column show-for-large">
			<p>広島でWEB戦略・広告戦略のご相談は日進印刷へ</p>
		</div>
		<div class="medium-4 column"><?php echo dtdsh_get_sociallist(); ?></div>
	</div>
	<div id="header">
		<div id="sticky-topbar">
			<nav class="top-bar" role="navigation">
				<ul class="title">
					<li class="<?php echo $is_hide; ?>"><a id="btn-nav" class="waves-effect" data-open="spNav" title="メニュー"><i class="fa fa-bars"></i>メニュー</a></li>
					<li class="title-logo"><a class="waves-effect" href="<?php echo DTDSH_HOME_URL; ?>" title="<?php echo DTDSH_SITENAME; ?>"><?php echo DTDSH_SITENAME; ?></a></li>
				</ul>
				<?php
					if ( is_front_page() ) :
						echo '<div class="top-bar-right show-for-medium"><ul class="menu" data-magellan>',
							'<li><a href="#PageTop" title="ページの一番上まで戻る">Top</a></li>',
							'<li><a href="#news" title="お知らせ">News</a></li>',
							'<li><a href="#about" title="日進印刷株式会社について">About</a></li>',
							'<li><a href="#service" title="提供サービス">Service</a></li>',
							'<li><a href="#blog" title="コラム">Column</a></li>',
							'<li><a href="#contact-form" title="お問い合わせ">Contact</a></li>',
							'</ul></div>';
					else :
						wp_nav_menu( array(
							'theme_location' => 'dtdsh-primarynav',
							'container_class' => 'top-bar-right show-for-medium',
							'menu_class' => 'dropdown menu',
							'items_wrap' => '<ul class="%2$s" data-dropdown-menu role="menubar">%3$s</ul>',
							'walker' => new Top_Bar_Walker_Nav_Menu()
						) );
					endif;
				?>
			</nav>
		</div>
		<div class="inner"><?php dtdsh_header_title(); ?></div>
	</div>
<?php
if ( is_front_page() ) {
	echo '</header>', '<div id="content-wrapper" role="main">';
} else {
	echo '</header>', '<div class="row expanded"><div id="content-wrapper" class="medium-9 medium-push-3 column pr0" role="main">';
}