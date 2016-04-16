<?php
$news_args = array(
	'posts_per_page' => 3,
	'post_status' => 'publish',
);
$news = new WP_Query( $news_args );
if ( $news->have_posts() ) :
?>
<section id="news" class="fp-news" data-magellan-target="news">
	<div class="row">
		<?php while ( $news->have_posts() ) : $news->the_post(); ?>
		<div <?php post_class('row column');?>>
			<time class="news-date medium-4 column" datetime="<?php the_time('c');?>" itemprop="datePublished"><?php the_time('Y. m. d');?></time>
			<a href="<?php the_permalink();?>" class="news-title medium-8 column" title="<?php the_title();?>"><?php the_title();?></a>
		</div>
		<?php endwhile;?>
		<div class="column"><a href="<?php echo get_page_link('553');?>" title="<?php echo get_the_title('553');?>" class="link-fp-cta waves-effect">一覧を見る</a></div>
	</div>
</section>
<?php
	wp_reset_postdata();
	endif;