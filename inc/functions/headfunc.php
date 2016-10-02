<?php
//========================  Template Redirect ========================================================================//
if ( ! function_exists( 'dtdsh_get_header' ) ) :
function dtdsh_get_header() {
	require_once( TFUNC . 'title-and-desc.php' );
}
add_action( 'template_redirect', 'dtdsh_get_header', 99 );
endif;


//========================  HTML圧縮 ========================================================================//
if ( ! function_exists( 'dtdsh_header' ) ) :
function dtdsh_header() {
	ob_start();
	get_header();
	$head = ob_get_contents();
	ob_end_clean();
	$head = str_replace( "'", '"', $head );
	$head = str_replace( ' type="text/javascript"', '', $head );
	$head = str_replace( ' type="text/css"', '', $head );
	$head = str_replace( '" />', '">', $head );
	$head = dtdsh_html_format( $head, false );
	echo $head;
}
endif;



//========================  minneから画像を取得 ========================================================================//
function getMinneImage() {
	require_once TFUNC . 'simple_html_dom.php';
	$productsPage = file_get_html( 'https://minne.com/mimicchii/' );
	$itemLink = $productsPage->find( '.gallery_img_roop_inner > a' );
	
	$output = $itemLink[0]->outertext . $itemLink[2]->outertext;
	$output = str_replace( ' href="/items/', 'href="https://minne.com/items/', $output );
	echo $output;
}



//========================  ソーシャルリンクのリスト ========================================================================//
function dtdsh_get_sociallist() {
	$facebook = '<li><a class="color-facebook hover-bg-facebook" href="https://www.facebook.com/hiroshima.seo.nisshin" target="_blank"><i class="fa fa-facebook"></i></a></li>';
	$googleplus = '<li><a class="hover-bg-googleplus color-googleplus" href="https://plus.google.com/+%E6%97%A5%E9%80%B2%E5%8D%B0%E5%88%B7%E6%A0%AA%E5%BC%8F%E4%BC%9A%E7%A4%BE%E8%A5%BF%E5%8C%BA" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
	$youtube = '<li><a class="hover-bg-youtube color-youtube" href="https://www.youtube.com/channel/UCAvo9rI_LB46WbQ9_Gc9ibw" target="_blank"><i class="fa fa-youtube"></i></a></li>';
	echo '<ul class="social-box">', $facebook, $googleplus, $youtube, '</ul>';
}