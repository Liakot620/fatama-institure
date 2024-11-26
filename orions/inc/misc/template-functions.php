<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package orions
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function orions_body_classes( $classes ) {
	global $orions_opt;

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// if ( array_key_exists( 'custom_scrollbar', $orions_opt ) && $orions_opt['custom_scrollbar'] ) {
	// }
	$classes[] = 'custom-scrollbar';

	return $classes;
}
add_filter( 'body_class', 'orions_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function orions_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'orions_pingback_header' );

if ( !function_exists( 'get_redux_field' ) ) {
	function get_redux_field( $field, $default ) {
		if ( !class_exists( 'Redux' ) ) {
			return $default;
		}

		global $orions_opt;
		
		if ( isset( $orions_opt[$field] ) ) {
			return $orions_opt[$field];
		} else {
			return $default;
		}
	}
}

if ( ! function_exists( 'orions_get_page_query' ) ) {
	function orions_get_page_query() {
		if ( get_query_var('paged') ) {
			return get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			return get_query_var('page');
		} else {
			return 1;
		}
	}
}

if ( ! function_exists('orions_truncate_title') ) {
	function orions_truncate_title( $title, $id ) {
		if ( is_single( $id ) )
			return $title;
		
		$max = 51;
		if( strlen( $title ) > $max ) {
			return substr( $title, 0, $max ). " ...";
		} else {
			return $title;
		}
	}
}
add_filter( 'the_title', 'orions_truncate_title', 10, 2 );