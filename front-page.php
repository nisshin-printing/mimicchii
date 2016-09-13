<?php
// Template Name: フロントページ
dtdsh_header();
ob_start();
?>
<div class="front-grid">
	<div class="block-grid-whole ">
		<a class="c-block -link -image color-white" style="background-image: url(<?php echo TIMG, 'front/featured-about.jpg'; ?>);">
			<article>
				<h1 class="block-category">会社案内</h1>
				<h2 class="block-title -big"><span>Since</span><span>1928.</span></h2>
				<div class="block-description">
					<p>蓄積されたマーケティング知識でWeb・営業・経営コンサルティングによる売上向上をサポートする企業です。</p>
				</div>
				<span class="block-arrow"><svg role="image" class="icon"><title>詳しく見る</title>
					<desc>詳しく見る</desc><use xlink:href="<?php echo TSVG, 'icons.svg#arrow-right'; ?>"></use></svg></span>
			</article>
		</a>
	</div>
	<div class="block-grid-half">
		<a class="c-block -link block-text bg-teal color-white">
			<article>
				<h1 class="block-category">会社案内</h1>
				<h2 class="block-title">中小企業に<br>マーケティングを。</h2>
				<div class="block-description">
					<p>優れたマーケティング理論は、どのような企業のマーケットでも効果があります。</p>
				</div>
				<span class="block-arrow"><svg role="image" class="icon"><title>詳しく見る</title>
					<desc>詳しく見る</desc><use xlink:href="<?php echo TSVG, 'icons.svg#arrow-right'; ?>"></use></svg></span>
			</article>
		</a>
	</div>
	<div class="block-grid-half">
		<a class="c-block -link -image" style="background-image:url(<?php echo TIMG, 'google-partner-badge.png'; ?>);background-size:80%">
			<article>
				<h1 class="block-category">会社案内</h1>
				<div class="block-description">
					<p>日進印刷がGoogleパートナーであり、Yahoo!正規代理店でないことには理由があります。</p>
				</div>
				<span class="block-arrow"><svg role="image" class="icon"><title>詳しく見る</title>
					<desc>詳しく見る</desc><use xlink:href="<?php echo TSVG, 'icons.svg#arrow-right'; ?>"></use></svg></span>
			</article>
		</a>
	</div>
	<div class="block-grid-whole block-text bg-passion -right color-white">
		<a class="c-block -link js-swap-text">
			<article>
				<h1 class="block-category">サービス</h1>
				<h2 class="block-title"><span class="js-swap-box"><span class="js-swap-line" data-text="Web・経営・営業の" data-hover-text="マーケティングで" style="animation-delay:.1s;">Web・経営・営業の</span></span><span class="js-swap-box"><span class="js-swap-line" data-text="トータルサポート" data-hover-text="売上向上に貢献します。" style="animation-delay:.2s;">トータルサポート</span></span></h2>
				<div class="block-description">
					<p>どんなことでも対応可能なホームページ制作技術と経験豊富なマーケティング知識を武器に売上向上に貢献します。</p>
				</div>
				<span class="block-arrow"><svg role="image" class="icon"><title>詳しく見る</title>
					<desc>詳しく見る</desc><use xlink:href="<?php echo TSVG, 'icons.svg#arrow-right'; ?>"></use></svg></span>
			</article>
		</a>
	</div>
</div>
<aside class="call-to-action">
	<div class="cta-container">
		<a class="action-link hover-blue" title="提供サービス"><span>提</span><span>供</span><span>サ</span><span>ー</span><span>ビ</span><span>ス</span></a>
	</div>
</aside>
<?php
$front = ob_get_contents();
ob_end_clean();
$front = dtdsh_html_format( $front, false );
echo $front;
dtdsh_footer();