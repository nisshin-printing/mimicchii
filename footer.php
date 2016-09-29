<?php
include TFUNC . 'change-message.php';
?>
<section class="c-contact u-alt-background">
	<div class="c-row c-contact_content">
		<button class="c-contact_back js-contact-back" type="button" title="お問い合わせの種類に戻る">
			<span class="c-contact_back_arrow">
				<svg class="c-contact_back_icon" role="image"><use xlink:href="<?php echo TSVG, 'locomotive.svg#arrow-back'; ?>"></svg>
			</span>
		</button>
		<div class="contact_textbox js-contact-text" id="contact-form-title" contenteditable="false"></div>
		<div id="js-contact" class="c-contact_wrapper" data-bgColor="#191970">
			<p class="c-contact_message column"><?php getGreetingMS(); ?></p>
			<div class="medium-4 column text-center">
				<button class="button expanded o-hollow c-contact_menuItem js-contact-step" type="button" data-page="project">
					<span class="o-button_text">お仕事の依頼</span>
				</button>
			</div>
			<div class="medium-4 column text-center">
				<button class="button expanded o-hollow c-contact_menuItem js-contact-step" type="button" data-page="join">
					<span class="o-button_text">入社・提携</span>
				</button>
			</div>
			<div class="medium-4 column text-center">
				<button class="button expanded o-hollow c-contact_menuItem js-contact-step" type="button" data-page="message">
					<span class="o-button_text">お問い合わせ</span>
				</button>
			</div>
		</div>
	</div>
</section>
</main><?php // #content-wrapper ?>
<footer>
	<div class="row">
		<div class="column medium-4">
			<p class="footer-title"><i class="fa fa-sitemap"></i>サイトマップ</p>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'dtdsh-footnav',
					'container' => false,
					'menu_class' => 'menu vertical',
					'items_wrap' => '<ul class="%2$s">%3$s</ul>',
				) );
			?>
		</div>
		<div class="column medium-4 large-text-left">
			<p class="footer-title"><i class="fa fa-building"></i>会社情報</p>
			<p class="footer-title b0 m0"><i class="fa fa-map-marker"></i>住所</p>
			<address class="ml1"><a href="https://goo.gl/maps/4P9aVPRdWE12" title="Googleマップを見る" target="_blank">〒733-0001<br>広島県広島市西区大芝一丁目<br>19-20　A2ビル3F（事務所）</a></address>
			<p class="footer-title b0 m0"><i class="fa fa-phone"></i>電話番号</p>
			<p class="ml1"><a href="tel:0822371611" title="電話する">(082) 237-1611</a></p>
			<p class="footer-title b0 m0"><i class="fa fa-fax"></i>FAX番号</p>
			<p class="color-dark-gray ml1">(082) 237-1622</p>
			<p class="footer-title b0 m0"><i class="fa fa-envelope"></i>メール</p>
			<p class="ml1"><a href="mailto:nisshin@dtdsh.com">nisshin@dtdsh.com</a></p>
		</div>
		<div class="column medium-4">
			<p class="footer-title">運営サイト</p>
			<ul class="menu vertical">
				<li><a href="http://balance-design.net" target="_blank" title="雑貨販売のBalance Design">Balance Design</a></li>
			</ul>
		</div>
		<div class="column footer-sns"><a href="<?php echo DTDSH_HOME_URL; ?>" class="bg-teal btn-circle waves-effect"><i class="fa fa-home"></i></a><a href="https://www.facebook.com/nisshin.dtdsh" class="btn-facebook btn-circle waves-effect bg-facebook" target="_blank"><i class="fa fa-facebook"></i></a><a href="https://plus.google.com/+%E6%97%A5%E9%80%B2%E5%8D%B0%E5%88%B7%E6%A0%AA%E5%BC%8F%E4%BC%9A%E7%A4%BE%E8%A5%BF%E5%8C%BA/posts" class="btn-facebook btn-circle waves-effect bg-googleplus" target="_blank"><i class="fa fa-google-plus"></i></a><a href="mailto:nisshin@dtdsh.com" title="お問い合わせ" class="btn-circle bg-pink"><i class="fa fa-envelope"></i></a><a href="#PageTop" class="btn-circle waves-effect bg-lime"><i class="fa fa-angle-up"></i></a><p class="footer-copy">© <?php echo date( 'Y' ); ?> 日進印刷株式会社</p>
		</div>
	</div>
</footer>
<?php
wp_footer();
?>
</body>
</html>