<?php
//========================  Template Redirect ========================================================================//
if ( ! function_exists( 'dtdsh_get_header' ) ) :
function dtdsh_get_header() {
	require_once( TFUNC . 'title-and-desc.php' );
}
add_action( 'template_redirect', 'dtdsh_get_header', 99 );
endif;


//========================  HTML圧縮 ========================================================================//
if ( ! function_exists( 'dtdsh_header' ) ) :
function dtdsh_header() {
	ob_start();
	get_header();
	$head = ob_get_contents();
	ob_end_clean();
	$head = str_replace( "'", '"', $head );
	$head = str_replace( ' type="text/javascript"', '', $head );
	$head = str_replace( ' type="text/css"', '', $head );
	$head = str_replace( '" />', '">', $head );
	$head = dtdsh_html_format( $head, false );
	echo $head;
}
endif;

//========================  カスタムメニューWalker ========================================================================//
// Custom Menu Walker
class Top_Bar_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "\n" . '<ul class="submenu menu vertical is-dropdown-submenu" data-submenu role="menu">' . "\n";
	}
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$classes = 'menu-item-' . $item->object_id;
		if ( ! empty( $item->classes ) ) {
			$classes .= in_array('menu-item-has-children',$item->classes) ? ' is-dropdown-submenu-parent opens-right' : '';
			$classes .= in_array('current-menu-item',$item->classes) ? ' active' : '';
		}
		$class_att = ! empty( $classes ) ? ' class="' . trim( $classes ) . '"' : '';
		if ( $depth ) {
			$output .= '<li' . $class_att . ' role="menuitem" data-is-click="false">';
		} else {
			$output .= '<li' . $class_att . ' role="menuitem">';
		}
		$attributes    = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes    .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target )  . '"' : '';
		$attributes    .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes    .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
		$attributes    .= ' class="waves-effect"';
		$item_output   = $args->before;
		$item_output   .= '<a' . $attributes . '>';
		$item_output   .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output   .= '</a>';
		$item_output   .= $args->after;
		$output        .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
class Side_Nav_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "\n" . '<ul class="submenu menu vertical is-dropdown-submenu" data-submenu role="menu">' . "\n";
	}
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$classes = 'menu-item-' . $item->object_id;
		if ( ! empty( $item->classes ) ) {
			$classes .= in_array('menu-item-has-children',$item->classes) ? ' is-dropdown-submenu-parent opens-right' : '';
			$classes .= in_array('current-menu-item',$item->classes) ? ' active' : '';
		}
		$class_att = ! empty( $classes ) ? ' class="' . trim( $classes ) . '"' : '';
		if ( $depth ) {
			$output .= '<li' . $class_att . ' role="menuitem" data-is-click="false">';
		} else {
			$output .= '<li' . $class_att . ' role="menuitem">';
		}
		$attributes    = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes    .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target )  . '"' : '';
		$attributes    .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes    .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
		$attributes    .= ' class="waves-effect"';
		$item_output   = $args->before;
		$item_output   .= '<a' . $attributes . '>';
		$item_output   .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output   .= '</a>';
		$item_output   .= $args->after;
		$output        .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}


//========================  ソーシャルリンクのリスト ========================================================================//
function dtdsh_get_sociallist() {
	$facebook = '<li><a class="color-facebook hover-bg-facebook" href="https://www.facebook.com/hiroshima.seo.nisshin" target="_blank"><i class="fa fa-facebook"></i></a></li>';
	$googleplus = '<li><a class="hover-bg-googleplus color-googleplus" href="https://plus.google.com/+%E6%97%A5%E9%80%B2%E5%8D%B0%E5%88%B7%E6%A0%AA%E5%BC%8F%E4%BC%9A%E7%A4%BE%E8%A5%BF%E5%8C%BA" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
	$youtube = '<li><a class="hover-bg-youtube color-youtube" href="https://www.youtube.com/channel/UCAvo9rI_LB46WbQ9_Gc9ibw" target="_blank"><i class="fa fa-youtube"></i></a></li>';
	echo '<ul class="social-box">', $facebook, $googleplus, $youtube, '</ul>';
}