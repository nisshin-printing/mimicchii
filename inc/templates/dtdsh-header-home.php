<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'このページヘアクセスする権限がありません！　　　You do not have sufficient permissions to access this page!' );
}
?>
<div class="header-wrapper hide-for-large home">
	<div class="row">
		<a data-activates="nav-mobile" class="btn-nav top-nav waves-effect hide-for-large float-left" title="<?php _e( 'メニュー', 'dtdsh'); ?>"><i class="fa fa-bars fa-2x"></i></a>
		<a href="tel:0822371611" class="btn-call waves-effect hide-for-large float-right" title="<?php _e( '電話する', 'dtdsh'); ?>"><i class="fa fa-phone fa-2x"></i></a>
		<p class="page-title color-white"><?php bloginfo( 'name' ); ?></p>
	</div>
</div>