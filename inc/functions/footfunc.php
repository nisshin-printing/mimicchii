<?php
// ============================== Footer.php Double navigation ============================================================================= //
if ( ! function_exists( 'dtdsh_double_nav' ) ) :
function dtdsh_double_nav() {
	echo '<nav role="navigation">
		<form action="', DTDSH_HOME_URL, '" method="search" role="search" name="nav-search" itemprop="potentialAction" itemscope="itemscope" itemtype="http://schema.org/SearchAction">
			<input type="search" name="s" placeholder="気になるキーワードを入力" required="required" class="input-search">
			<button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
		</form>
		<a href="', DTDSH_HOME_URL, 'contact" class="button waves-effect expanded" title="お問い合わせ">お問い合わせ</a>
		<h5 class="nav-title">メニュー</h5>';
		wp_nav_menu( array(
			'theme_location' => 'dtdsh-primarynav',
			'container' => false,
			'menu_class' => 'menu vertical',
			'items_wrap' => '<ul class="%2$s">%3$s</ul>',
			'walker' => new Side_Nav_Walker_Nav_Menu()
		) );
	echo '</nav>';
}
endif;
if ( ! function_exists( 'dtdsh_dynamic_inlining_scripts' ) ) :
function dtdsh_dynamic_inlining_scripts() {
	global $is_IE;
	if ( $is_IE ) {
		echo '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>';
	} else {
		echo '<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>';
	}
	if ( ! empty( $_COOKIE['CA'] ) ) {
		echo '<script src="' . TJS . 'dtdsh-app.min.js"></script><script src="' . TJS . 'dtdsh-theme.min.js"></script>';
	} else {
		echo '<script>' . file_get_contents( TJS . 'dtdsh-app.min.js' ) . '</script>' . '<script>' . file_get_contents( TJS . 'dtdsh-theme.min.js' ) . '</script>';
		echo <<<ONLOAD
<script>
function doOnload() {
	setTimeout("downloadComponents()", 1000);
}
window.onload = doOnload;
function downloadComponents() {
	document.cookie = "CA=1";
	downloadJS("//dtdsh.dev/wp-content/themes/dtdsh/assets/js/dtdsh-app.min.js");
	downloadJS("//dtdsh.dev/wp-content/themes/dtdsh/assets/js/dtdsh-theme.min.js");
	downloadCSS("//dtdsh.dev/wp-content/themes/dtdsh/style.css");
}
function downloadJS(url) {
	var elem = document.createElement("script");
	elem.src = url;
	document.body.appendChild(elem);
}
function downloadCSS(url) {
	var elem = document.createElement("link");
	elem.rel = "stylesheet";
	elem.src = url;
	document.body.appendChild(elem);
}
</script>
ONLOAD;
	}
}
endif;
if ( ! function_exists( 'dtdsh_footer' ) ) :
function dtdsh_footer() {
	ob_start();
	get_footer();
	$foot = ob_get_contents();
	ob_end_clean();
	$foot = str_replace( ' type="text/javascript"', '', $foot );
	$foot = str_replace( '" />', '">', $foot );
	$foot = dtdsh_html_format( $foot, false );
	echo $foot;
}
endif;