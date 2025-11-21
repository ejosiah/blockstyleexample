<?php
/**
 * Block Style Example functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Block Style Example 1.0
 */

if ( ! function_exists( 'blockstyleexample_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Block Style Example 1.0
	 *
	 * @return void
	 */
	function blockstyleexample_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );
	}

endif;

add_action( 'after_setup_theme', 'blockstyleexample_support' );

if ( ! function_exists( 'blockstyleexample_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Block Style Example 1.0
	 *
	 * @return void
	 */
	function blockstyleexample_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'twentytwentytwo-style' );
	}

endif;

add_action( 'wp_enqueue_scripts', 'blockstyleexample_styles' );

if ( ! function_exists( 'prefix_remove_core_block_styles' ) ):
	function prefix_remove_core_block_styles() {
		// wp_dequeue_style('wp-block-quote')
	}
endif;

add_action( 'wp_enqueue_scripts', 'prefix_remove_core_block_styles' )

// Add block patterns.
require get_template_directory() . '/inc/block-patterns.php';
