<?php
dtdsh_header();
ob_start();
if ( is_category( 'portfolio' ) ) {
	$is_layout = 'portfolio';
} elseif ( is_archive() || is_search() || is_home() ) {
	$is_layout = 'archive';
} elseif ( is_single() ) {
	$is_layout = 'post';
} elseif ( is_page() ) {
	$is_layout = 'page';
} elseif ( is_404() ) {
	$is_layout = '404';
} else {
	$is_layout = 'else';
}
echo '<section class="layout-' . $is_layout . '">',
		'<div class="row">',
			'<div class="column article-body">';
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				if ( is_page( 'public-relations' ) ) {
					get_template_part( 'inc/templates/public-relations' );
				} else {
					get_template_part( 'inc/templates/content' );
				}
			endwhile;
		else :
			get_template_part( 'inc/templates/no-content' );
		endif;
		echo '</div>',
		'</div>',
	'</section>';
$index = ob_get_contents();
ob_end_clean();
$index = dtdsh_html_format( $index, false );
echo $index;
dtdsh_footer();