<?php
//========================  Breadcrumbs ========================================================================//
if ( ! function_exists( 'breadcrumbs' ) ) :
function breadcrumbs( $args = array() ){
	global $post;
	$str ='';
	$defaults = array(
		'id'         => 'breadcrumbs',
		'home'       => 'トップページ',
		'search'     => 'で検索した結果',
		'tag'        => 'タグ',
		'author'     => 'タグ',
		'notfound'   => 'ページがありません！',
		'liOption'   => 'itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem"',
		'aOption'    => 'itemscope itemtype="http://schema.org/Thing" itemprop="item"',
		'spanOption' => 'itemprop="name"',
		'metaOption' => 'itemprop="position"',
	);
	$args = wp_parse_args( $args, $defaults );
	extract( $args, EXTR_SKIP );
	if ( ! is_front_page() && ! is_admin() ){
		$str .= '<ul class="' . $id . '" itemscope itemtype="http://schema.org/BreadcrumbList">';
		$str .= '<li ' . $liOption . '>';
		$str .= '<a href="' . DTDSH_HOME_URL . '" ' . $aOption . '><span ' . $spanOption . '>' . $home . '</span></a><meta ' . $metaOption . ' content="1"></li>';
		$my_taxonomy = get_query_var( 'taxonomy' );
		$cpt = get_query_var( 'post_type' );

		// カスタムタクソノミー
		if ( $my_taxonomy && is_tax( $my_taxonomy ) ) {
			$my_tax = get_queried_object();
			$post_types = get_taxonomy( $my_taxonomy )->object_type;
			$cpt = $post_types[0];
			$str .= '<li ' . $liOption . '><a href="' . get_post_type_archive_link( $cpt ) . '" ' . $aOption . '><span ' . $spanOption . '>' . get_post_type_object( $cpt )->label . '</span></a><meta ' . $metaOption . ' content="2"></li>';
			$count = 3;
			if ( $my_tax->parent != 0 ) {
				$ancestors = array_reverse( get_ancestors( $my_tax->term_id, $my_tax->taxonomy ) );
				$ancestor_Num = count( $ancestors );
				$count = $ancestor_Num + 2;
				while ( $count < $ancestor_Num + 3 ) {
					$str .= '<li ' . $liOption . '><a href="' . get_term_link( $ancestors[$count - 3], $my_tax->taxonomy ) . '" ' . $aOption . '><span ' . $spanOption . '>' . get_term( $ancestors[$count - 3], $my_tax->taxonomy )->name . '</span></a><meta ' . $metaOption . ' content="' . $count . '"></li>';
					$count++;
				}
			}
			$str .= '<li class="current hide-for-small-only" ' . $liOption . '><span ' . $spanOption . '>' . $my_tax->name . '</span><meta ' . $metaOption . ' content="' . $count . '"></li>';

			//カテゴリー - Archive
		} elseif ( is_category() ) {
			$cat = get_queried_object();
			$str .= '<li ' . $liOption . '><a href="' . DTDSH_HOME_URL . 'topics/" ' . $aOption . '><span ' . $spanOption . '>ブログ</span></a><meta ' . $metaOption . ' content="2"></li>';
			$count = 3;
			if ( $cat->parent != 0 ){
				$ancestors = array_reverse( get_ancestors( $cat->cat_ID, 'category' ) );
				$ancestor_Num = count( $ancestors );
				$count = $ancestor_Num + 2;
				while ( $count < $ancestor_Num + 3 ) {
					$str .= '<li ' . $liOption . '><a href="' . get_category_link( $ancestors[$count - 3] ) . '" ' . $aOption . '><span ' . $spanOption . '>' . get_cat_name( $ancestors[$count - 3] ) . '</span></a><meta ' . $metaOption . ' content="' . $count . '"></li>';
					$count++;
				}
			}
			$str .= '<li class="current hide-for-small-only" ' . $liOption . '><span ' . $spanOption . '>' . $cat->name . '</span><meta ' . $metaOption . ' content="' . $count . '"></li>';

			//カスタム投稿 - Archive
		} elseif ( is_post_type_archive() ) {
			$cpt = get_query_var( 'post_type' );
			$str .= '<li class="current hide-for-small-only" ' . $liOption . '><span ' . $spanOption . '>' . get_post_type_object( $cpt )->label . '</span><meta ' . $metaOption . ' content="2"></li>';

			// メンバー - Single
		} elseif( is_singular( 'members' ) ) {
			$str .= '<li ' . $liOption . '><a ' . $aOption . ' href="' . get_page_link( '125' ) . '"><span ' . $spanOption . '>' . get_post_type_object( get_post_type() )->label . '</span></a><meta ' . $metaOption . ' content="2"></li><li class="current hide-for-small-only" ' . $liOption . '><span ' . $spanOption . '>' . $post->post_title . '</span><meta ' . $metaOption . ' content="3"></li>';

			// カスタム投稿 - Single
		} elseif ( $cpt && is_singular( $cpt ) ) {
			$taxes = get_object_taxonomies( $cpt );
			$mytax = $taxes[0];
			$str .= '<li ' . $liOption . '><a href="' . get_post_type_archive_link( $cpt ) . '" ' . $aOption . '><span ' . $spanOption . '>' . get_post_type_object( $cpt )->label . '</span></a><meta ' . $metaOption . ' content="2"></li>';
			$count = 3;
			if ( has_term( '', $mytax ) ) {
				$taxes = get_the_terms( $post->ID, $mytax );
				$tax = get_youngest_tax( $taxes, $mytax );
				if ( $tax->parent != 0 ) {
					$ancestors = array_reverse( get_ancestors( $tax->term_id, $mytax ) );
					$ancestor_Num = count( $ancestors );
					$count = $ancestor_Num + 2;
					while ( $count < $ancestor_Num + 3 ) {
						$str .= '<li ' . $liOption . '><a href="' . get_term_link( $ancestors[$count - 3], $mytax ) . '" ' . $aOption . '><span ' . $spanOption . '>' . get_term( $ancestors[$count - 3], $mytax )->name . '</span></a><meta ' . $metaOption . ' content="' . $count . '"></li>';
						$count++;
					}
				}
				$str .= '<li ' . $liOption . '><a href="' . get_term_link( $tax, $mytax ) . '" ' . $aOption . '><span ' . $spanOption . '>' . $tax->name . '</span></a><meta ' . $metaOption . ' content="' . $count . '"></li>';
				$count++;
			}
			$str .= '<li class="current hide-for-small-only" ' . $liOption . '><span ' . $spanOption . '>' . $post->post_title . '</span><meta ' . $metaOption . ' content="' . $count . '"></li>';

			// Single
		} elseif ( is_single() ) {
			$str .= '<li ' . $liOption . '><a href="' . DTDSH_HOME_URL . 'topics" ' . $aOption . '><span ' . $spanOption . '>ブログ</span></a><meta ' . $metaOption . ' content="2"></li>';
			$count = 3;
			if ( has_category() ) {
				$categories = get_the_category( $post->ID );
				$cat = get_youngest_cat( $categories );
				if ( $cat->parent != 0 ) {
					$ancestors = array_reverse( get_ancestors( $cat->cat_ID, 'category' ) );
					$ancestor_Num = count( $ancestors );
					$count = $ancestor_Num + 2;
					while ( $count < $ancestor_Num + 3 ) {
						$str .= '<li ' . $liOption . '><a href="' . get_category_link( $ancestors[$count - 3] ) . '" ' . $aOption . '><span ' . $spanOption . '>' . get_cat_name( $ancestors[$count - 3] ) . '</span></a><meta ' . $metaOption . ' content="' . $count . '"></li>';
						$count++;
					}
				}
				$str .= '<li ' . $liOption . '><a href="' . get_category_link( $cat->term_id ) . '" ' . $aOption . '><span ' . $spanOption . '>' . $cat->cat_name . '</span></a><meta ' . $metaOption . ' content="' . $count . '"></li>';
				$count++;
			}
			$str.= '<li class="current hide-for-small-only" ' . $liOption . '><span ' . $spanOption . '>' . $post->post_title . '</span><meta ' . $metaOption . ' content="' . $count . '"></li>';

			// Page
		} elseif ( is_page() ) {
			$count = 2;
			if ( $post->post_parent != 0 ) {
				$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
				$ancestor_Num = count( $ancestors );
				$count = $ancestor_Num + 1;
				while ( $count < $ancestor_Num + 2 ) {
					$str .= '<li ' . $liOption . '><a href="' . get_permalink( $ancestors[$count - 2] ) . '" ' . $aOption . '><span ' . $spanOption . '>' . get_the_title( $ancestors[$count - 2] ) . '</span></a><meta ' . $metaOption . ' content="' . $count . '"></li>';
					$count++;
				}
			}
			$str .= '<li class="current hide-for-small-only" ' . $liOption . '><span ' . $spanOption . '>' . $post->post_title . '</span><meta ' . $metaOption . ' content="' . $count . '"></li>';

			// 日付 - Archive
		} elseif ( is_date() ) {
			$str .= '<li ' . $liOption . '><a href="' . DTDSH_HOME_URL . 'topics/" ' . $aOption . '><span ' . $spanOption . '>ブログ</span></a></li>';
			if ( get_query_var( 'day' ) != 0 ){
				$str .= '<li ' . $liOption . '><a href="'. get_year_link( get_query_var( 'year' ) ) . '" ' . $aOption . '><span ' . $spanOption . '>' . get_query_var( 'year' ) . '年</span></a><meta ' . $metaOption . ' content="2"></li>';
				$str .= '<li ' . $liOption . '><a href="' . get_month_link( get_query_var( 'year' ), get_query_var( 'monthnum' ) ) . '" ' . $aOption . '><span ' . $spanOption . '>'. get_query_var( 'monthnum' ) .'月</span></a><meta ' . $metaOption . ' content="3"></li>';
				$str .= '<li class="current hide-for-small-only" ' . $liOption . '><span ' . $spanOption . '>'. get_query_var( 'day' ) . '日</span><meta ' . $metaOption . ' content="4"></li>';
			} elseif ( get_query_var( 'monthnum' ) != 0 ) {
				$str .= '<li ' . $liOption . '><a href="' . get_year_link( get_query_var( 'year' ) ) . '" ' . $aOption . '><span ' . $spanOption . '>' . get_query_var( 'year' ) . '年</span></a><meta ' . $metaOption . ' content="2"></li>';
				$str .= '<li class="current hide-for-small-only" ' . $liOption . '><span ' . $spanOption . '>' . get_query_var( 'monthnum' ) . '月</span><meta ' . $metaOption . ' content="3"></li>';
			} else {
				$str .= '<li class="current hide-for-small-only" ' . $liOption . '><span ' . $spanOption . '>' . get_query_var( 'year' ) . '年</span><meta ' . $metaOption . ' content="2"></li>';
			}

			// 検索結果 - Search
		} elseif ( is_search() ) {
			$str .= '<li class="current hide-for-small-only" ' . $liOption . '><span ' . $spanOption . '>「' . get_search_query() . '」' . $search . '</span><meta ' . $metaOption . ' content="2"></li>';

			// 投稿者 - Archive
		} elseif ( is_author() ) {
			$str .= '<li class="current hide-for-small-only" ' . $liOption . '><span ' . $spanOption . '>' . $author . ' : ' . get_the_author_meta( 'display_name', get_query_var( 'author' ) ) . '</span><meta ' . $metaOption . ' content="2"></li>';

			// タグ - Archive
		} elseif ( is_tag() ) {
			$str .= '<li ' . $liOption . '><a href="' . DTDSH_HOME_URL . 'topics" ' . $aOption . '><span ' . $spanOption . '>ブログ</span></a><meta ' . $metaOption . ' content="2"></li>';
			$str .= '<li class="current hide-for-small-only" ' . $liOption . '><span ' . $spanOption . '>' . $tag . ' : ' . single_tag_title( '' , false ) . '</span><meta ' . $metaOption . ' content="3"></li>';

			// 添付ファイル - Archive
		} elseif ( is_attachment() ) {
			$str.= '<li class="current hide-for-small-only" ' . $liOption . '><span ' . $spanOption . '>' . $post->post_title . '</span><meta ' . $metaOption . ' content="2"></li>';

			// 404 Not Found
		} elseif ( is_404() ) {
			$str .= '<li class="current hide-for-small-only" ' . $liOption . '><span ' . $spanOption . '>' . $notfound . '</span><meta ' . $metaOption . ' content="2"></li>';

			// Home - Archive
		} elseif ( is_home() ) {
			$str .= '<li class="current hide-for-small-only" ' . $liOption . '><span ' . $spanOption . '>ブログ</span><meta ' . $metaOption . ' content="2"></li>';

			// Else
		} else{
			$str .= '<li class="current hide-for-small-only" ' . $liOption . '><span ' . $spanOption . '>' . wp_title( '', false ) . '</span><meta ' . $metaOption . ' content="2"></li>';
		}
		$str .= '</ul>';
	}
	echo $str;
}
endif;
if ( ! function_exists( 'get_youngest_cat' ) ) :
//一番下の階層のカテゴリーを返す関数
function get_youngest_cat( $categories ) {
	global $post;
	if ( count( $categories ) == 1 ) {
		$youngest = $categories[0];
	} else {
		$count = 0;
		foreach ( $categories as $category ) {
			$children = get_term_children( $category->term_id, 'category' );
			if ( $children ) {
				if ( $count < count( $children ) ) {
					$count = count( $children );
					$lot_children = $children;
					foreach( $lot_children as $child ) {
						if( in_category( $child, $post->ID ) ){
							$youngest = get_category( $child );
						}
					}
				}
			} else {
				$youngest = $category;
			}
		}
	}
	return $youngest;
}
endif;
if ( ! function_exists( 'get_youngest_tax' ) ) :
//一番下の階層のタクソノミーを返す関数
function get_youngest_tax( $taxes, $mytaxonomy ) {
	global $post;
	if( count( $taxes ) == 1 ) {
		$youngest = $taxes[key( $taxes )];
	} else {
		$count = 0;
		foreach ( $taxes as $tax ) {
			$children = get_term_children( $tax->term_id, $mytaxonomy );
			if( $children ) {
				if ( $count < count( $children ) ) {
					$count = count( $children );
					$lot_children = $children;
					foreach( $lot_children as $child ) {
						if ( is_object_in_term( $post->ID, $mytaxonomy ) ) {
							$youngest = get_term( $child, $mytaxonomy );
						}
					}
				}
			} else {
				$youngest = $tax;
			}
		}
	}
	return $youngest;
}
endif;