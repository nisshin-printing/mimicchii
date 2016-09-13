<?php
// ============================== HTML圧縮 ============================================================================= //
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