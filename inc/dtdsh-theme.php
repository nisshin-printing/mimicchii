<?php
/*
 *
 * define( 'DTDSH_HOME_URL', home_url( '/' ) );
 * define( 'DTDSH_SITENAME', get_bloginfo( 'name' ) );
 * define( 'DTDSH_DESCRIPTION', get_bloginfo( 'description' ) );
 * define( 'DSEP', DIRECTORY_SEPARATOR );
 * define( 'TPATH', get_template_directory() . DSEP );
 * define( 'TURI', get_template_directory_uri() . DSEP );
 * define( 'INC', TPATH . 'inc' . DSEP );
 * define( 'SURI', get_stylesheet_uri() );
 * define( 'TASSETS', TURI . 'assets' . DSEP );
 * define( 'TIMG', TURI . 'assets' . DSEP . 'img' . DSEP );
 * define( 'TCSS', TURI . 'assets' . DSEP . 'css' . DSEP );
 * define( 'TJS', TURI . 'assets' . DSEP . 'js' . DSEP );
 * define( 'TFRONT', INC . 'front-page' . DSEP );
 * define( 'TADMIN', INC . 'admin' . DSEP );
 * define( 'TFUNC', INC . 'functions' . DSEP );
 *
 *
 */

/*
 * Functionsファイル各種を読み込み
 */
if ( ! function_exists( 'dtdsh_theme' ) ) :
function dtdsh_theme() {
	require_once( TFUNC . 'headfunc.php' );
	require_once( TFUNC . 'footfunc.php' );
	require_once( TFUNC . 'breadcrumb.php' );
}
add_action( 'after_setup_theme', 'dtdsh_theme' );
endif;

/*
 * JSファイル
 */
function dtdshtheme_scripts() {
	// Jetpackの不要JSを削除
	wp_deregister_script( 'devicepx' );
	wp_deregister_script( 'devicepx-jetpack' );
	// Contact Form 7のCSSは不要
	add_filter( 'wpcf7_load_js', '__return_false' );
	// JS登録
	wp_register_script( 'google-map', '//maps.googleapis.com/maps/api/js?key=AIzaSyAN4kMQJOMnCR-Y0GR8QylbjAZiHLGm2UE', array(), NULL, true );
	// 発行
}
add_action( 'wp_enqueue_scripts', 'dtdshtheme_scripts' );

/*
 * CSSファイル
 */
function dtdshtheme_styles() {
	// Contact Form 7のCSSは不要
	add_filter( 'wpcf7_load_css', '__return_false' );
	// JetPackは不要
	add_filter( 'jetpack_implode_frontend_css', '__return_false' );
	// CSS登録
	wp_register_style( 'theme-style', TCSS . 'style.css', array(), NULL, false );
	// CSS発行
	wp_enqueue_style( 'theme-style' );
}
add_action( 'wp_enqueue_scripts', 'dtdshtheme_styles' );
/*
 * Favicons
 */
if ( ! function_exists( 'dtdsh_favicons' ) ) :
function dtdsh_favicons() {
	$favicons_default = TIMG . 'favicon.ico';
	$faviconarray = '<link rel="icon" href="' . $favicons_default . '">';
	$faviconarray .=  '<link rel="apple-touch-icon" href="' . $favicons_default . '" sizes="76x76">';
	$faviconarray .=  '<link rel="apple-touch-icon"  href="' . $favicons_default . '"  sizes="120x120">';
	$faviconarray .=  '<link rel="apple-touch-icon"  href="' . $favicons_default . '"  sizes="152x152">';
	$faviconarray .=  '<name="msapplication-TileImage" content="' . $favicons_default . '"><meta name="msapplication-TileColor"> <meta name="application-name" content="' .  DTDSH_SITENAME . '">';
	$faviconarray .=  '<meta name="msapplication-square70x70logo" content="' . $favicons_default . '">';
	$faviconarray .=  '<meta name="msapplication-square150x150logo" content="' . $favicons_default . '">';
	$faviconarray .=  '<meta name="msapplication-square310x310logo" content="' . $favicons_default . '">';
	echo $faviconarray;
}
add_action( 'wp_head', 'dtdsh_favicons' );
add_action( 'admin_head', 'dtdsh_favicons');
endif;


/*
 * ビジュアルエディタ用CSS
 */
add_editor_style( TCSS . 'editor-style.css' );

/*
 HTML圧縮
 */
if ( ! function_exists( 'dtdsh_html_format' ) ) :
function dtdsh_html_format( $contents, $on_s = true ) {
	// 連続改行削除
	if ( ! $on_s ) {
		$contents = preg_replace( '/(\n|\r|\r\n)+/us', "", $contents );
	} else {
		$contents = preg_replace( '/(\n|\r|\r\n)+/us', "\n", $contents );
	}
	// 行頭の余計な空白削除
	$contents = preg_replace( '/\n+\s*</', "\n" . '<', $contents );
	// タグ間の余計な空白や改行の削除
	$contents = preg_replace( '/>\s*?</', '><',$contents );
	// タブの削除
	$contents = str_replace( "\t", '', $contents );
	return $contents;
}
add_filter( 'wp_nav_menu', 'dtdsh_html_format', 10, 2 );
endif;

// バージョン番号のせいで、キャッシュができない...
// 全部消せます！　そう、日進印刷ならね。
if ( ! function_exists( 'remove_url_version' ) ) :
function remove_url_version( $arg ) {
	if ( strpos( $arg, 'ver=' ) ) {
		$arg = esc_url( remove_query_arg( 'ver', $arg ) );
	}
	return $arg;
}
apply_filters( 'style_loader_src', 'remove_url_version', 99 );
apply_filters( 'script_loader_src', 'remove_url_version', 99 );
endif;