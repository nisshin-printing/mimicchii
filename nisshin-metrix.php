<?php
// Template Name: NMetrix
//========================  OAuth ========================================================================//
// クライアントID
$client_id = '1a63bdebeb4a47c0a541bf2818501385';
// クライアントシークレット
$client_secret = 'd7f187edc26d4799bdc4d7aa1284a141';
// このプログラムを設置するURL
$redirect_uri = explode( '?' , ( ! isset( $_SERVER['HTTPS'] ) || empty( $_SERVER['HTTPS'] ) ? 'http://' : 'https://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] )[0];
// スコープ
$scope = 'basic+comments+relationships+likes';
// セッションスタート
session_start();
// HTML用
$front = '';
// [手順2]リクエストトークン( $_GET['code'] )とアクセストークンの交換
if ( isset( $_GET['code'] ) && ! empty( $_GET['code'] ) && isset( $_SESSION['state'] ) && ! empty( $_SESSION['state'] ) & ! empty( $_GET['state'] ) && $_SESSION['state'] == $_GET['state'] ) {
	// リクエスト用のコンテキスト
	$context = array(
		'http' => array(
			'method' => 'POST',
			'content' => http_build_query( array(
				'client_id' => $client_id,
				'client_secret' => $client_secret,
				'grant_type' => 'authorization_code',
				'redirect_uri' => $redirect_uri,
				'code' => $_GET['code'],
			) ),
		),
	);
	// cURLを使ってリクエスト
	$curl = curl_init();
	// オプションのセット
	curl_setopt( $curl, CURLOPT_URL, 'https://api.instagram.com/oauth/access_token' );
	curl_setopt( $curl, CURLOPT_HEADER, 1 );
	// メソッド
	curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, $context['http']['method'] );
	// 証明書の検証を行わない
	curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, FALSE );
	// cURL_execの結果を文字列で返す
	curl_setopt( $curl, CURLOPT_RETURNTRANSFER, TRUE );
	// リクエストボディ
	curl_setopt( $curl, CURLOPT_POSTFIELDS, $context['http']['content'] );
	// タイムアウトの秒数
	curl_setopt( $curl, CURLOPT_TIMEOUT, 5 );
	// 実行
	$res1 = curl_exec( $curl );
	$res2 = curl_getinfo( $curl );
	// 終了
	curl_close( $curl );
	// 取得したデータ
	$json = substr( $res1, $res2['header_size'] );
	// 取得したデータ(JSONなど)
	$header = substr( $res1, 0, $res2['header_size'] );
	// レスポンスヘッダー
	// 取得したJSONをオブジェクトに変換
	$obj = json_decode( $json );
	// エラー判定
	if ( ! $obj || ! isset( $obj->user->id ) || ! isset( $obj->user->username ) || ! isset( $obj->user->profile_picture ) || ! isset( $obj->access_token ) ) {
		$error = 'データを上手く取得できませんでした...。';
	} else {
		// 各データを整理
		$user_id = $obj->user->id;
		$user_name = $obj->user->username;
		$user_picture = $obj->user->profile_picture;
		$access_token = $obj->access_token;
		// セッション終了
		$_SESSION = array();
		session_destroy();
		// 出力する
		$front .= '<h2>実行結果</h2>
			<dl>
				<dt>ユーザーID</dt>
				<dd>' . $user_id . '</dd>
				<dt>ユーザー名</dt>
				<dd>' . $user_name . '</dd>
				<dt>アイコン画像</dt>
				<dd><img class="_img" src="' . $user_picture . '"></dd>
				<dt>アクセストークン</dt>
				<dd>' . $access_token . '</dd>
			</dl>';
	}
	$front .= '<h2>取得したデータ</h2>
		<p>下記のデータを取得できました。</p>
		<h3>JSON</h3>
		<p><textarea rows="8">' . $json . '</textarea></p>
		<h3>レスポンスヘッダー</h3>
		<p><textarea rows="8">' . $header . '</textarea></p>';
} else {
	// [手順1]初回アクセスの場合、ユーザーをアプリ認証画面へアクセスさせる
	// CSRF対策
	session_regenerate_id( true );
	$state = sha1( uniqid( mt_rand(), true ) );
	$_SESSION['state'] = $state;
	// リダイレクトさせる
	header( 'Location: https://api.instagram.com/oauth/authorize/?client_id=' . $client_id . '&redirect_uri=' . rawurlencode( $redirect_uri ) . '&scope=' . $scope . '&response_type=code&state=' . $state );
	exit;
}
// エラー時の処理
if ( ! isset( $error ) || ! empty( $error ) ) {
	$front = '<p><mark>' . $error . '</mark>もう一度、認証をするには、<a href="' . explode( '?', $_SERVER['REQUEST_URI'] )[0] . '">こちら</a>をクリックしてください。</p>';
}
$front = dtdsh_html_format( $front, false );
dtdsh_header();
echo $front;
dtdsh_footer();