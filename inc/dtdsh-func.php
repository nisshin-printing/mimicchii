<?php
/*
 * JetpackのPhotonをPHPから利用するため
 */
function dtdsh_photon_img( $id, $case, $size = 'full' ) {
	$get = wp_get_attachment_image_src( $id, $size );
	if ( 'src' == $case ) {
		echo $get[0];
	} elseif ( 'width' == $case ) {
		echo $get[1];
	} elseif ( 'height' == $case ) {
		echo $get[2];
	}
}

/*
 * 検索キーワードをハイライト
 */
function wps_highlight_results( $text ) {
	if ( is_search() ) {
		$sr   = get_query_var( 's' );
		$keys = explode( ' ', $sr );
		$text = preg_replace( '/('.implode('|', $keys) .')/iu', '<span class="bg-line">' . $sr . '</span>', $text );
	}
	return $text;
}
add_filter( 'the_content', 'wps_highlight_results' );
add_filter( 'the_excerpt', 'wps_highlight_results' );



/**
 * Paging
 */
if ( ! function_exists( 'dtdsh_paging' ) ) :
function dtdsh_paging( $pages = '', $range = 4 ) {
	$showitems = ( $range * 2 ) + 1;
	global $paged;
	if ( empty( $paged ) ) $paged = 1;
	if ( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if ( ! $pages ) {
			$pages = 1;
		}
	}
	if ( 1 != $pages ) {
		echo '<div class="pagination">';
		if ( $paged < $pages ) {
			echo '<p><a href="' . get_pagenum_link( $paged + 1 ) . '" class="waves-effect" aria-label="' . ( $paged + 1 ) . '" title="次の' . $wp_query->post_count . '件を見る">次の' . $wp_query->post_count . '件を見る<i class="fa fa-angle-right"></i></a></p>';
		}
		echo '<ul aria-label="Pagination" role="navigation">';
		if ( $paged >= 2 ) {
			echo '<li class="first"><a href="' . get_pagenum_link( 1 ) . '"><i class="fa fa-fast-backward"></i></a></li>';
		} else {
			echo '<li class="first disabled"><i class="fa fa-fast-backward"></i></li>';
		}
		if ( $paged > 1 ) {
			echo '<li class="prev pagination-previous"><a href="' . get_pagenum_link( $paged-1 ) . '" aria-label="Page ' . ( $paged - 1 ) . '"><i class="fa fa-angle-left"></i></a></li>';
		} else {
			echo '<li class="prev pagination-previous disabled"><i class="fa fa-angle-left"></i></li>';
		}
		for( $i=1; $i <= $pages; $i++ ) {
			if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
				if ( $paged == $i ) {
					echo '<li class="current">Page ' . $i . ' of ' . $pages .'</li>';
				} else {
					echo '<li><a href="' . get_pagenum_link( $i ) . '" aria-label="Page ' . $i . '">' . $i . '</a></li>';
				}
			}
		}
		if ( $paged < $pages ) {
			echo '<li class="next pagination-next"><a href="' . get_pagenum_link( $paged + 1 ) . '" aria-label="Page ' . ( $paged + 1 ) .'"><i class="fa fa-angle-right"></i></a></li>';
		} else {
			echo '<li class="next pagination-next disabled"><i class="fa fa-angle-right"></i></li>';
		}
		if ( $paged < $pages ) {
			echo '<li class="last"><a href="' . get_pagenum_link( $pages ) . '" aria-label="Page ' . $pages . '"><i class="fa fa-fast-forward"></i></a></li>';
		} else {
			echo '<li class="last disabled"><i class="fa fa-fast-forward"></i></li>';
		}
		echo '</ul></div>';
	}
}
endif;


/*
 * img srcの記述を拾って画像のURLを取得し表示する
 */
function dtd_catch_content_img() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $imgURL );
	$first_img = isset( $imgURL[1][0] ) ? $imgURL[1][0] : '';
	if ( empty( $first_img ) ) {
		$first_img = 'none';
	}
	return $first_img;
}
//========================  WordPress ========================================================================//
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles', 10 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

//========================  Admin ========================================================================//
// Wordpress update disappear
if ( ! current_user_can( 'administrator' ) ) {
	add_filter( 'pre_site_transient_update_core', create_function( '$a', 'return null;' ) );
}
// Wordpress admin bar disappear
function wp_admin_bar_disappear() {
	global $wp_admin_bar;
	$wp_admin_bar -> remove_menu( 'wp-logo' );
	$wp_admin_bar -> remove_menu( 'update' );
	$wp_admin_bar -> remove_menu( 'comments' );
}
add_action( 'wp_before_admin_bar_render', 'wp_admin_bar_disappear' );
// Admin page at Footer disappear
function custom_admin_footer() {
	echo '<div id="wpfooter" role="contentinfo"><p id="footer-left" class="alignleft"><span id="footer-thankyou">速さの日進</span></p><p id="footer-upgrade" class="alignright"><p id="footer-upgrade" class="alignright">' .apply_filters( 'update_footer', '' ).'</p><div class="clear"></div></div>';
}
add_filter( 'admin_footer_text', 'custom_admin_footer' );