<?php
if ( is_page() ) {
	the_content();
} elseif ( is_single() ) {
?>
<article>
	<h2><?php the_title(); ?></h2>
	<div class="post-meta"><i class="fa fa-calendar"></i>
		<time datetime="<?php the_time( 'c' ); ?>" itemprop="datePublished"><?php the_time( 'm/d' ); ?></time>
	</div>
	<?php the_content(); ?>
</article>
<?php
	} elseif ( is_search() ) {
		if ( have_posts() ) {
			while ( have_posts() ) : the_post();
?>
<article class="card post-list">
	<a class="waves-effect" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a>
	<?php
		if ( has_post_thumbnail() ) {
			echo '<figure class="card-img">', get_the_post_thumbnail() , '</figure>';
		}
	?>
	<div class="card-content">
		<p class="card-time">
			<time datetime="<?php the_time( 'c' ); ?>" itemprop="datePublished"><?php the_time( 'Y.m.d' ); ?></time>
		</p>
		<h1 class="card-title text-black"><?php the_title(); ?></h1>
	</div>
</article>
<?php
			endwhile;
		} else {
?>
<div class="page-404">
	<i class="fa fa-exclamation-triangle"></i>
	<p>お探しの記事は見つかりませんでした。</p>
	<p><a href="<?php echo DTDSH_HOME_URL; ?>" title="トップページへ戻る"><i class="fa fa-home mr1 fa-2x"></i>トップページへ戻る</a></p>
</div>
<?php
		}
	} elseif ( is_category( 'portfolio' ) ) {
?>
<article class="portfolio-item">
	<a class="waves-effect" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<div class="portfolio-img"><?php the_post_thumbnail(); ?></div>
		<div class="portfolio-box">
			<div class="box-info">
				<h3><?php the_title(); ?></h3>
			</div>
		</div>
	</a>
</article>
<?php
	} else {
		$cat = get_the_category();
		$cat = $cat[0];
?>
<article class="column">
	<div class="card post-list">
		<a class="waves-effect" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a>
		<div class="card-img">
			<a href="<?php echo get_category_link( $cat->term_id ); ?>" class="category-<?php echo $cat->category_nicename; ?>"><?php echo $cat->cat_name; ?></a>
			<?php the_post_thumbnail(); ?>
		</div>
		<div class="card-content">
			<p class="card-time">
				<time datetime="<?php the_time( 'c' ); ?>" itemprop="datePublished"><?php the_time( 'Y.m.d' ); ?></time>
			</p>
			<p class="card-title text-black"><?php the_title(); ?></p>
		</div>
	</div>
</article>
<?php
	}