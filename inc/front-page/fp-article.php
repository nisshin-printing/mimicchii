<?php
$article_args = array(
		'posts_per_page' => 6,
);
$articles = new WP_Query( $article_args );
?>
<section class="fp-article">
	<div class="row">
		<div class="text-center">
			<h2 class="color-primary">コラム</h2>
			<p class="color-dark-gray">WEB制作・印刷・DTP・マーケティングについての記事を掲載しています。</p>
		</div>
		<?php if ( $articles->have_posts() ) : ?>
		<div class="article-wrapper row column">
			<?php while ( $articles->have_posts() ): $articles->the_post(); ?>
			<div class="column">
				<div class="card post-list">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="waves-effect"></a>
					<?php
						$cat = get_the_category();
						$cat = $cat[0];
					?>
					<div class="card-img">
					<a href="<?php echo get_category_link($cat->term_id); ?>" class="category-<?php echo $cat->category_nicename; ?>"><?php echo $cat->cat_name; ?></a><?php the_post_thumbnail(); ?>
					</div>
					<div class="card-content">
						<p class="card-time"><time datetime="<?php the_time( 'c' ); ?>" itemprop="datePublished"><?php the_time( 'Y. m. d' ); ?></time></p>
						<p class="card-title"><?php the_title(); ?></p>
					</div>
				</div>
			</div>
		<?php endwhile;?>
	</div>
	<div class="column"><a href="<?php echo get_category_link( '21' );?>" title="コラムの一覧を見る" class="link-fp-cta waves-effect">一覧を見る</a></div>
	</div>
</section>
<?php
	wp_reset_postdata();
	endif;
?>