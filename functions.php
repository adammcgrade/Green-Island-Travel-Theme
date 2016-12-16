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


