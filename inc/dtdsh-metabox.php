<?php
// ============================== SEO対策用メタボックス ============================================================================= //
function add_dtdsh_seo_settings() {
	add_meta_box(
		'dtdsh_metas',
		'SEO設定',
		'add_metabox_dtdsh_seo_settings',
		'page',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'add_dtdsh_seo_settings' );
function add_metabox_dtdsh_seo_settings() {
	global $post;
	wp_nonce_field( wp_create_nonce( __FILE__ ), 'my_nonce' );
	$check_title = get_post_meta( $post->ID, 'dtdsh_title_h1', true );
	$check_keywords = get_post_meta( $post->ID, 'dtdsh_keywords', true );
	echo '
		<div id="dtdsh-metas">
			<p>h1とmeta-keywordsをカスタムできます。</p>
			<p>
				<label>ヘッダー用タイトル<br><input type="text" name="dtdsh_title_h1" value="', $check_title, '" style="width: 100%;"></label>
			</p>
			<p>
				<label>メタキーワード（複数指定時は半角スペースで区切る）<br><input type="text" name="dtdsh_keywords" value="', $check_keywords, '" style="width: 100%;"></label>
			</p>
		</div>
	';
}
function save_dtdsh_seo_settings( $post_id ) {
	global $post;
	$my_nonce = isset( $_POST['my_nonce'] ) ? $_POST['my_nonce'] : null;
	if ( ! wp_verify_nonce( $my_nonce, wp_create_nonce( __FILE__ ) ) ) {
		$post_id = isset( $_GET['post_id'] ) ? htmlspecialchars( $_GET['post_id'] ) : null;
		return $post_id;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return $post_id; }
	if ( ! current_user_can( 'edit_post', $post->ID ) ) { return $post_id; }
	if ( 'post' == $_POST['post_type'] ) {
		update_post_meta( $post->ID, 'dtdsh_title_h1', $_POST['dtdsh_title_h1'] );
		update_post_meta( $post->ID, 'dtdsh_keywords', $_POST['dtdsh_keywords'] );
	}
}
add_action( 'save_post', 'save_dtdsh_seo_settings' );