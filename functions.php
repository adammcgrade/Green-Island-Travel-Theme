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

}

// Dont show sidebar on certain pages
add_action( 'genesis_before_loop', 'green_island_travel_and_tours_sidebar_hook' );

/**
 * Dont show the sidebar on certain pages
 *
 * Hides the sidebar on the home and search pages.
 * 
 * @since 1.0.0
 */
function green_island_travel_and_tours_sidebar_hook() {
	if( is_home() || is_search() ) {
		remove_action( 'genesis_sidebar' , 'genesis_do_sidebar' );
	}
}
