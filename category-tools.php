<?php
dtdsh_header();
ob_start();

if ( have_posts() ) :
	get_template_part( 'inc/templates/content' );
else :
	get_template_part( 'inc/templates/no-content' );
endif;

$tools = ob_get_contents();
ob_end_clean();
$tools = dtdsh_html_format( $tools, false );
echo $tools;
dtdsh_footer();