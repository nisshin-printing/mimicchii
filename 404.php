<?php
	// File Security Check
	if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
		die ( 'このページヘアクセスする権限がありません！　　　You do not have sufficient permissions to access this page!' );
	}
	get_header();
?>
<section class="mt2">
	<div class="row">
		<div class="page-404 text-center">
			<i class="fa fa-exclamation-triangle fa-5x color-light-gray"></i>
			<p>このページは存在しません！</p>
			<p><a href="<?php echo home_url(); ?>" title="<?php __( 'トップページへ戻る', 'dtdsh' ) ?>"><i class="fa fa-home mr1 fa-2x"></i><?php _e( 'トップページへ戻る', 'dtdsh' ) ?></a></p>
		</div>
	</div>
</section>
<?php
	get_footer();
?>