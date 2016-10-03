<?php
dtdsh_header();
ob_start();
?>
<main>
	<div class="row">
		<div class="column small-6">
			<?php
			$count = 1;
			$args = array(
				'posts_per_page' => 3,
				'post_status' => 'publish'
			);
			$news = new WP_Query( $args );
			if ( $news->have_posts() ) :
			?>
			<div class="c-news">
			<?php
				while ( $news->have_posts() ) : $news->the_post();
				$cat = get_categories();
				$cat = $cat[0];
				$isPermalink = ( $count === 1 ) ? get_the_permalink() : get_category_link( $cat->term_id );
			?>
				<article>
					<div class="row align-middle">
						<div class="small-3 column"><time datetime="<?php the_time( 'c' ); ?>" itemprop="datePublished"><?php the_time( 'm/d' ); ?></time></div>
						<div class="small-9 column">
							<h2 class="c-news_title"><a href="<?php echo $isPermalink; ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
							<div class="c-news_content"><a href="<?php echo $isPermalink; ?>" title="<?php the_title(); ?>"><?php the_excerpt(); ?></a></div>
						</div>
					</div>
				</article>
				<?php
					if ( $count === 1 ) {
						echo '<div class="c-product">', getMinneImage(), '</div>';
					}
					$count++;
					endwhile;endif;
				?>
			</div>
		</div>
		<div class="column small-6">
			<div class="c-minne"><a href="https://minne.com/mimicchii/" target="_blank" title="ミンネやってます。"><img src="//img-cdn.jg.jugem.jp/9df/2726016/20140401_62319.png" alt="みみっちぃ。ミンネ"></a></div>
			<div class="c-sns">
				<p><a href="https://twitter.com/nisshin_inc" class="c-sns_link" title="日進印刷株式会社のtwitter" target="_blank"><span class="fa-stack fa-2x"><i class="fa fa-square fa-stack-2x color-twitter"></i><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></span>Twitter</a></p>
				
				<p><a href="https://www.instagram.com/nisshin_inc/" class="c-sns_link" title="日進印刷株式会社のinstagram" target="_blank"><span class="fa-stack fa-2x"><i class="fa fa-square fa-stack-2x color-instagram"></i><i class="fa fa-instagram fa-stack-1x fa-inverse"></i></span>Instagram</a></p>
				<p><a href="https://www.facebook.com/dtdsh.nisshin" class="c-sns_link" title="日進印刷株式会社のfacebook" target="_blank"><span class="fa-stack fa-2x"><i class="fa fa-square fa-stack-2x color-facebook"></i><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></span>Facebook</a></p>
			</div>
			<div class="c-profile">
				<h2>プロフィール</h2>
				<p>＊はじめまして＊<br>
					▽みみっちぃと申します▽<br>
					印刷会社の片隅でコツコツ作っています◯</p>

				<p>犬もスキ、猫もスキ、手芸もスキ。で展開しています。<br>
					紙、印刷もお任せ下さいっ＊</p>

				<p>＼よろしくお願い致します／</p>
			</div>
		</div>
	</div>
</main>
<?php
$front = ob_get_contents();
ob_end_clean();
$front = dtdsh_html_format( $front, false );
echo $front;
dtdsh_footer();