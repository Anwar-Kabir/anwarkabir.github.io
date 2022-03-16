<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package seven_mart
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function seven_mart_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add a class if there is a custom header.
	if ( has_header_image() ) {
		$classes[] = 'has-header-image';
	}

	// Add class if sidebar is used.
	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'has-sidebar';
	}

	if ( !is_front_page() && is_home() ) {
		$classes[] = 'no-sidebar';
	}

	if( is_archive() || is_search() || is_404() ) {
		$classes[] = 'no-sidebar';
	}

	if( is_page() ) {
		$classes[] = 'no-sidebar';
	}

	if( is_single() ) {
		$classes[] = 'right-sidebar';
	}

	if( class_exists('WooCommerce') && is_product() ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'seven_mart_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function seven_mart_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'seven_mart_pingback_header' );

/**
 * seven_mart Excerpt Length
 *
 * @since seven_mart 1.0.0
 *
 * @param null
 * @return void
 */
function seven_mart_excerpt_length( $length ) {
	if ( ! is_admin() ) {
		return absint( get_theme_mod( 'seven-mart-blog-excerpt', 20 ) );
	}
}
add_filter( 'excerpt_length', 'seven_mart_excerpt_length', 999 );
