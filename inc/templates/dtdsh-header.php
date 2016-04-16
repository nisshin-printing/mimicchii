<?php
	// File Security Check
	if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
		die ( 'このページヘアクセスする権限がありません！　　　You do not have sufficient permissions to access this page!' );
	}
	$typearray    = array( 'post', 'page' );
	$curquer      = $wp_query->get_queried_object();
	$header_title = '';
	if ( is_search() ) {
		$header_title = '「' . get_search_query() . '」' . 'で検索した結果';
	} elseif ( is_archive() ) {
		if ( is_day() ) {
			$header_title = 'アーカイブ : ' . get_the_date( 'Y年m月d日' );
		} elseif ( is_month() ) {
			$header_title = 'アーカイブ : ' . get_the_date( 'Y年m月' );
		} elseif ( is_year() ) {
			$header_title = 'アーカイブ : ' . get_the_date( 'Y年' );
		} elseif ( is_tag() ) {
			$header_title = 'タグ : ' . single_cat_title( '', false );
		} elseif ( is_category() ) {
			$header_title = single_cat_title( '', false );
		} else {
			$header_title = post_type_archive_title( '', false );
		}
	} elseif ( is_author() ) {
		$header_title = single_cat_title( '', false );
	} elseif ( is_page() ) {
		$header_title = get_the_title( $post->ID );
	} elseif ( is_single() ) {
		$header_title = ( get_post_type( $post->ID ) == 'post' ) ? 'コラム' : get_post_type_object( get_post_type() )->label;
	} elseif ( is_404() ) {
		$header_title = __( 'ページが見つかりませんでした！', 'dtdsh' );
	} elseif ( is_home() ) {
		$header_title = __( 'コラム', 'dtdsh' );
	}
?>
<div class="header-wrapper">
	<div class="row">
		<a data-activates="nav-mobile" class="btn-nav top-nav waves-effect hide-for-large float-left" title="<?php _e( 'メニュー', 'dtdsh'); ?>"><i class="fa fa-bars fa-2x"></i></a>
		<a href="tel:0822371611" class="btn-call waves-effect hide-for-large float-right" title="<?php _e( '電話する', 'dtdsh'); ?>"><i class="fa fa-phone fa-2x"></i></a>
		<h1 class="page-title color-white"><?php echo $header_title; ?></h1>
	</div>
</div>
<?php
	echo breadcrumbs();