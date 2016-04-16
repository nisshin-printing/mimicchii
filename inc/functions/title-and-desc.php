<?php
//========================  オリジナルタイトル ========================================================================//
if ( ! function_exists( 'dtdsh_create_title' ) ) :
function dtdsh_create_title() {
	global $post, $wp_query;
	$curquer = $wp_query->get_queried_object();
	$head_title = '';
	$head_description = '';
	if ( ! is_front_page() && ! is_home() ) {
		if ( is_search() ) {
			$head_title =  '「' . get_search_query() . '」で検索した結果 | 広島市のWEB制作会社 - 日進印刷';
			$head_description = '「' . get_search_query() . '」で検索した結果の一覧ページです。探しているのはコンテンツですか？それとも「頼れる」広島市のWebマーケティング会社ですか？PageSpeedとYSlowのダブルA評価で速い！Web・印刷・広報・経理・経営など会社のコアを支える会社です。';
		} elseif ( is_archive() ) {
			if ( is_day() ) {
				$head_title = 'アーカイブ : ' . get_the_date( 'Y年m月d日' ) . 'の一覧 | 広島市のWEB制作会社 - 日進印刷</title>';
				$head_description = get_the_date( 'Y年m月d日' ) . 'の記事一覧ページです。探しているのは記事ですか？それとも「頼れる」広島市のWebマーケティング会社ですか？PageSpeedとYSlowのダブルA評価で速い！Web・印刷・広報・経理・経営など会社のコアを支える会社です。';
			} elseif ( is_month() ) {
				$head_title = 'アーカイブ : ' . get_the_date( 'Y年m月' ) . 'の一覧 | 広島市のWEB制作会社 - 日進印刷</title>';
				$head_description = get_the_date( 'Y年m月' ) . 'の記事一覧ページです。探しているのは記事ですか？それとも「頼れる」広島市のWebマーケティング会社ですか？PageSpeedとYSlowのダブルA評価で速い！Web・印刷・広報・経理・経営など会社のコアを支える会社です。';
			} elseif ( is_year() ) {
				$head_title = 'アーカイブ : ' . get_the_date( 'Y年' ) . 'の一覧 | 広島市のWEB制作会社 - 日進印刷</title>';
				$head_description = get_the_date( 'Y年' ) . 'の記事一覧ページです。探しているのは記事ですか？それとも「頼れる」広島市のWebマーケティング会社ですか？PageSpeedとYSlowのダブルA評価で速い！Web・印刷・広報・経理・経営など会社のコアを支える会社です。';
			} elseif ( is_tag() ) {
				$head_title = 'タグ : ' . single_term_title( '', false ) . 'の一覧 | 広島市のWEB制作会社 - 日進印刷</title>';
				$head_description = 'タグ : ' . single_term_title( '', false ) . 'の記事一覧ページです。探しているのは記事ですか？それとも「頼れる」広島市のWebマーケティング会社ですか？PageSpeedとYSlowのダブルA評価で速い！Web・印刷・広報・経理・経営など会社のコアを支える会社です。';
			} elseif ( is_category() || is_tax() ) {
				$head_title = 'カテゴリー : ' . single_term_title( '', false ) . 'の一覧 | 広島市のWEB制作会社 - 日進印刷</title>';
				$head_description = 'カテゴリ : ' . single_term_title( '', false ) . 'の記事一覧ページです。探しているのは記事ですか？それとも「頼れる」広島市のWebマーケティング会社ですか？PageSpeedとYSlowのダブルA評価で速い！Web・印刷・広報・経理・経営など会社のコアを支える会社です。';
			} else {
				$head_title = post_type_archive_title( '', false ) . 'の一覧 | 広島市のWEB制作会社 - 日進印刷</title>';
				$head_description = post_type_archive_title( '', false ) . 'の記事一覧ページです。探しているのは記事ですか？それとも「頼れる」広島市のWebマーケティング会社ですか？PageSpeedとYSlowのダブルA評価で速い！Web・印刷・広報・経理・経営など会社のコアを支える会社です。';
			}
		} elseif ( is_single() || is_page() ) {
			$head_title = single_post_title( '', false ) . ' | 広島市のWEB制作会社 - 日進印刷</title>';
			$head_description = get_the_excerpt();
		} elseif ( is_404() ) {
			$head_title = 'ページが見つかりません！ | 広島市のWEB制作会社 - 日進印刷</title>';
			$head_description = 'ページが見つかりません！探しているのは記事ですか？それとも「頼れる」広島市のWebマーケティング会社ですか？PageSpeedとYSlowのダブルA評価で速い！Web・印刷・広報・経理・経営など会社のコアを支える会社です。';
		} else {
			$head_title = '日進印刷株式会社 - 広島市のWEB制作会社';
			$head_description = '探しているのは「頼れる」広島市のWebマーケティング会社。PageSpeedとYSlowのダブルA評価で速い！Web・印刷・広報・経理・経営など会社のコアを支える会社です。';
		}
	} else {
		$head_title = '日進印刷株式会社 - 広島市のWEB制作会社';
		$head_description = '探しているのは「頼れる」広島市のWebマーケティング会社。PageSpeedとYSlowのダブルA評価で速い！Web・印刷・広報・経理・経営など会社のコアを支える会社です。';
	}
	$ret = '<title>' . $head_title . '</title><meta name="description" content="' . $head_description .'">';
	return $ret;
}
endif;
//========================  オリジナルタイトル挿入 ========================================================================//
if ( ! function_exists( 'dtdsh_load_title_desc' ) && ! is_admin() ) :
function dtdsh_load_title_desc() {
	echo dtdsh_create_title();
}
add_filter( 'wp_head', 'dtdsh_load_title_desc', 3 );
endif;
//========================  OGP挿入 ========================================================================//
if ( ! function_exists( 'dtdsh_load_ogp' ) && ! is_admin() ) :
function dtdsh_load_ogp() {
	global $post;
	$url = '';
	$title = wp_get_document_title();
	$site_name = DTDSH_SITENAME . ' - 広島市のWEB制作会社';
	if ( is_singular() ) {
		$cont = $post->post_content;
		$preg = '/<img.*?src=(["\'])(.+?)\1.*?>i/';
		$url = get_the_permalink();
		$og_img = get_post_meta( $post->ID, 'og_img', true );
		$post_thumbnail = has_post_thumbnail();
		if ( ! empty( $post_thumbnail ) ) {
			$img_id = get_post_thumbnail_id();
			$img_arr = wp_get_attachment_image_src( $img_id, 'full' );
			$img = $img_arr[0];
		} elseif ( preg_match( $preg, $cont, $img_url ) ) {
			$img = $img_url[2];
		} else {
			$img = TURI . '/assets/img/og.png';
		}
	} else {
		$url = DTDSH_HOME_URL;
		if ( get_header_image() ) {
			$img = get_header_image();
		} else {
			$img = TURI . '/assets/img/og.png';
		}
	}
	$desc = '探しているのは「頼れる」広島市のWebマーケティング会社。PageSpeedとYSlowのダブルA評価で速い！Web・印刷・広報・経理・経営など会社のコアを支える会社です。';
?>
<meta property="og:type" content="<?php echo ( is_singular() ? 'article' : 'website' ); ?>">
<meta property="og:url" content="<?php echo $url; ?>">
<meta property="og:title" content="<?php echo $title; ?>">
<meta property="og:description" content="<?php echo $desc; ?>">
<meta property="og:image" content="<?php echo $img; ?>">
<meta property="og:site_name" content="<?php echo $site_name; ?>">
<meta property="og:locale" content="ja_JP">
<meta property="fb:app_id" content="1469026710042384">
<?php
if( is_singular() ) :
	$published_time = get_post( $post->ID )->post_date;
	$published_time = str_replace( ' ', 'T', $published_time ) . 'Z';
	$modified_time = get_post( $post->ID )->post_modified;
	$modified_time = str_replace( ' ', 'T', $modified_time ) . 'Z';
?>
<meta property="article:published_time" content="<?php echo $published_time ?>">
<meta property="article:modified_time" content="<?php echo $modified_time ?>"><?php
endif;
}
add_filter( 'wp_head', 'dtdsh_load_ogp', 3 );
endif;