<?php

/**
 *
 * Front page template
 * 
 * @package     Green Island Travel and Tours
 * @author      Adam McGrade
 * @link        http://www.adammcgrade.com/
 * @copyright   Copyright (c) 2016, Adam McGrade
 * @license     GPL-2.0+      
 * 
 */

//* Force full-width-content layout setting
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

//* Remove default content loop
remove_action( 'genesis_loop', 'genesis_do_loop' );

//* Register Widget Areas
add_action( 'genesis_before_content', 'green_island_travel_and_tours_homepage_widgets' );
function green_island_travel_and_tours_homepage_widgets() {
	// Home Page Hero / Slider
	genesis_widget_area( 'homepage-hero', array(
		'before' => '<div class="homepage-hero widget-area">',
		'after' => '</div>'
	) );

	// Home Page Newsletter Signup
	genesis_widget_area( 'homepage-newsletter', array( 
		'before' => '<div class="horizontal-newsletter-signup homepage-newsletter widget-area">',
		'after'	 => '</div>'
	) );
}

genesis();