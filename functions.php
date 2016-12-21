<?php

/**
 *
 * Theme customizations
 * 
 * @package     Green Island Travel and Tours
 * @author      Adam McGrade
 * @link        http://www.adammcgrade.com/
 * @copyright   Copyright (c) 2016, Adam McGrade
 * @license     GPL-2.0+      
 * 
 */

// load child theme text domain
load_child_theme_textdomain( 'green-island-travel-and-tours' );

// load genesis setup
add_action( 'genesis_setup', 'green_island_travel_and_tours_setup', 15 );

/**
 * Theme Setup
 *
 * Attach all of the site-wide functions to the correct hooks and filters. All 
 * the functions themselves are defined below this setup function.
 * 
 * @since 1.0.0
 */
function green_island_travel_and_tours_setup() {

	// Define theme constants.
	define( 'CHILD_THEME_NAME', 'Green Island Travel and Tours');
	define( 'CHILD_THEME_URL', '' );
	define( 'CHILD_THEME_VERSION', '1.0.0' );

	// Add HTML5 markup structure
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption'  ) );

	// Add viewport meta tag for mobile browsers
	add_theme_support( 'genesis-responsive-viewport' );

	// Add theme support for accessibility
	add_theme_support( 'genesis-accessibility', array(
		'404-page',
		'drop-down-menu',
		'headings',
		'rems',
		'search-form',
		'skip-links',
	) );

	// Add theme support for Genesis footer widgets
	add_theme_support( 'genesis-footer-widgets', 3 );

	// Unregister content/sidebar/sidebar layout setting
	genesis_unregister_layout( 'content-sidebar-sidebar' );
 
	// Unregister sidebar/sidebar/content layout setting
	genesis_unregister_layout( 'sidebar-sidebar-content' );
	 
	// Unregister sidebar/content/sidebar layout setting
	genesis_unregister_layout( 'sidebar-content-sidebar' );

	// Unregister secondary sidebar widget
	unregister_sidebar( 'sidebar-alt' );


	//* Register Frontpage Hero Widget Area
	
	genesis_register_sidebar( array(
		'id' => 'homepage-hero',
		'name' => __( 'Homepage Hero', 'genesis' ),
		'description' => __( 'Place an image or slider here for display on the home page.', 'green-island-travel-and-tours' )
	) );

	//* Register Frontpage Newlsetter Widget Area
	genesis_register_sidebar( array(
		'id' => 'homepage-newsletter',
		'name' => __( 'Homepage Newsletter', 'genesis' ),
		'description' => __( 'Place a newsletter signup form for display on the home page.', 'green-island-travel-and-tours' )
	) );



	/**********************************
	 *
	 * Replace Header Site Title with Inline Logo
	 *
	 * @author AlphaBlossom / Tony Eppright
	 * @link http://www.alphablossom.com/a-better-wordpress-genesis-responsive-logo-header/
	 *
	 * @edited by Sridhar Katakam
	 * @link https://sridharkatakam.com/use-inline-logo-instead-background-image-genesis/
	 *
	************************************/
	add_filter( 'genesis_seo_title', 'custom_header_inline_logo', 10, 3 );
	function custom_header_inline_logo( $title, $inside, $wrap ) {

		$logo = '<img src="' . get_stylesheet_directory_uri() . '/images/green_island_travel_and_tours_logo@2x.png" alt="' . esc_attr( get_bloginfo( 'name' ) ) . ' Homepage" width="200" height="100" />';

		$inside = sprintf( '<a href="%s">%s<span class="screen-reader-text">%s</span></a>', trailingslashit( home_url() ), $logo, get_bloginfo( 'name' ) );

		// Determine which wrapping tags to use
		$wrap = genesis_is_root_page() && 'title' === genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : 'p';

		// A little fallback, in case an SEO plugin is active
		$wrap = genesis_is_root_page() && ! genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : $wrap;

		// And finally, $wrap in h1 if HTML5 & semantic headings enabled
		$wrap = genesis_html5() && genesis_get_seo_option( 'semantic_headings' ) ? 'h1' : $wrap;

		return sprintf( '<%1$s %2$s>%3$s</%1$s>', $wrap, genesis_attr( 'site-title' ), $inside );

	}



	// Enqueue Scripts and Styles
	add_action( 'wp_enqueue_scripts', 'custom_enqueue_scripts_styles' );
	function custom_enqueue_scripts_styles() {
		wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700,700i', array(), CHILD_THEME_VERSION );

		wp_enqueue_style( 'dashicons' );

		wp_enqueue_script( 'genesis-sample-responsive-menu', get_stylesheet_directory_uri() . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0', true );
		$output = array(
			'mainMenu' => __( 'Menu', 'genesis-sample' ),
			'subMenu'  => __( 'Menu', 'genesis-sample' ),
		);
		wp_localize_script( 'genesis-sample-responsive-menu', 'genesisSampleL10n', $output );

	}



}


