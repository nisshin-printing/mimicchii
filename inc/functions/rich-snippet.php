<?php
//========================  リッチスニペット ========================================================================//
add_action( 'wp_head', function() {
	$logo = TURI . 'assets/img/favicon32x32.png';
	if ( is_front_page() ) {
		echo '
<script type="application/ld+json">
{
	"@context": "http://schema.org",
	"@type": "WebSite",
	"url": "', DTDSH_HOME_URL, '",
	"potentialAction": {
		"@type": "SearchAction",
		"target": "', DTDSH_HOME_URL, '?s={search_term_string}",
		"query-input": "required name=search_term_string"
	}
}
</script>
';
	}
	if ( is_single() ) {
		$excerpt = preg_replace( '#[\r|\n]#', '', strip_tags( get_the_excerpt() ) );
		$get_lawyer_check = get_post_meta( get_the_ID(), 'charge_lawyer', true );
		if ( has_post_thumbnail() ) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
		} elseif ( dtd_catch_content_img() !== 'none' ) {
			$image = dtd_catch_content_img();
		} else {
			$image = $logo;
		}
		if ( is_array( $get_lawyer_check ) ) {
			foreach ( $get_lawyer_check as $member ) {
				$post_status = get_post_status( $member );
				if ( 'publish' == $post_status ) {
					$authorName = get_the_title( $member );
					$authorImage = get_the_post_thumbnail( $member );
					break;
				}
			}
		} else {
			$authorName = 'none';
		}
		echo '
<script type="application/ld+json">
{
	"@context": "http://schema.org",
	"@type": "NewsArticle",
	"mainEntityOfPage": {
		"@type": "WebPage",
		"@id": "', get_the_permalink(), '"
	},
	"headline": "', esc_js( get_the_title() ), '",
	"image": {
		"@type": "ImageObject",
		"url": "', $image, '",
		"width": "250",
		"height": "250"
	},
	"datePublished": "', get_the_date( DateTime::ATOM ), '",
	"dateModified": "', get_the_modified_date( DateTime::ATOM ), '",';
		if ( 'none' !== $authorName ) {
			echo '"author": { "@type": "Person", "name": "', esc_js( $authorName ), '" },';
		}
		echo '
	"publisher": {
		"@type": "Organization",
		"name": "', DTDSH_SITENAME, '",
		"telephone": "082-237-1611",
		"email": "nisshin@dtdsh.com",
		"url": "', DTDSH_HOME_URL, '",
		"logo": {
			"@type": "ImageObject",
			"url": "', $logo, '",
			"width": 30,
			"height": 30
		},
		"sameAs": [
			"http://balance-design.net",
			"https://www.facebook.com/nisshin.dtdsh",
			"https://plus.google.com/+%E6%97%A5%E9%80%B2%E5%8D%B0%E5%88%B7%E6%A0%AA%E5%BC%8F%E4%BC%9A%E7%A4%BE%E8%A5%BF%E5%8C%BA",
			"https://www.youtube.com/c/%E6%97%A5%E9%80%B2%E5%8D%B0%E5%88%B7%E6%A0%AA%E5%BC%8F%E4%BC%9A%E7%A4%BE%E8%A5%BF%E5%8C%BA"
		]
	},
	"description": "', esc_js( $excerpt ), '"
}
</script>
';
	}
	echo '
<script type="application/ld+json">
{
	"@context": "http://schema.org",
	"@type": "LocalBusiness",
	"name": "', DTDSH_SITENAME, '",
	"telephone": "0120-7834-09",
	"email": "nisshin@dtdsh.com",
	"openingHours": [
		"Mo-Fr 09:00-17:00"
	],
	"url": "', DTDSH_HOME_URL, '",
	"logo": "', $logo, '",
	"sameAs": [
		"http://balance-design.net",
			"https://www.facebook.com/nisshin.dtdsh",
			"https://plus.google.com/+%E6%97%A5%E9%80%B2%E5%8D%B0%E5%88%B7%E6%A0%AA%E5%BC%8F%E4%BC%9A%E7%A4%BE%E8%A5%BF%E5%8C%BA",
			"https://www.youtube.com/c/%E6%97%A5%E9%80%B2%E5%8D%B0%E5%88%B7%E6%A0%AA%E5%BC%8F%E4%BC%9A%E7%A4%BE%E8%A5%BF%E5%8C%BA"
	]
}
</script>
';
});