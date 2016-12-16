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

genesis();