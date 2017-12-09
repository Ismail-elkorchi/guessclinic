<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Guess_Clinic
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function guessclinic_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of full-width to non-blog pages.
	if ( ! is_home() && ! is_single() && ! is_archive() ) {
		$classes[] = 'full-width';
	}

	return $classes;
}
add_filter( 'body_class', 'guessclinic_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function guessclinic_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'guessclinic_pingback_header' );
