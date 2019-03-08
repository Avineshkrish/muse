<?php
/**
 * @package  PrimeExtVc
 */
/*
Plugin Name: Prime Extensions For Visual Composer
Plugin URI: https://wordpress.org/plugins/prime-extensions-for-visual-composer/
Description: Add 26+ new elements to Visual Composer, includes: Draggable Timeline, Metro Carousel and Tile, Zooma or Magnify, Carousel & Gallery, Tabs, Accordion, Image Hotspot with Tooltip, Parallax, Medium Gallery, Stack Gallery, Testimonial Carousel, iHover, Scrolling Notification and Masonry Gallery etc.
Author: codecans
Version: 2.6.6
Requires at least: 3.8
Tested up to:      4.9.5
Author URI: http://codecans.com
License: GPL2
Text Domain: prime_vc
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

// prevent direct access
defined( 'ABSPATH' ) or die( 'Hey, you can\t access this file, you silly human!' );

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

	// Vendor Composer Autoload
	if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
		require_once dirname( __FILE__ ) . '/vendor/autoload.php';
	}

	// Redirect Settings Page After Plugin Activation
	function prime_activation_redirect( $plugin ) {
		if ( $plugin == plugin_basename( __FILE__ ) ) {
			exit( wp_redirect( admin_url( 'admin.php?page=prime_vc' ) ) );
		}
	}

	add_action( 'activated_plugin', 'prime_activation_redirect' );

	//The code that runs during plugin activation
	function activate_primevc_plugin() {
		Inc\Base\Activate::activate();
	}

	register_activation_hook( __FILE__, 'activate_primevc_plugin' );


	//The code that runs during plugin deactivation
	function deactivate_primevc_plugin() {
		Inc\Base\Deactivate::deactivate();
	}

	register_deactivation_hook( __FILE__, 'deactivate_primevc_plugin' );

	//Param Slider
	require_once 'assets/slider/slider-params.php';

	// Register ALL Services
	if ( class_exists( 'Inc\\Init' ) ) {
		Inc\Init::register_services();
	}
	// Register Extensions Services
	if ( class_exists( 'Inc\\Extensions' ) ) {
		Inc\Extensions::register_services();
	}

} else {
	function prime_vc_required_plugin() {
		if ( is_admin() && current_user_can( 'activate_plugins' ) && ! is_plugin_active( 'js_composer/js_composer.php' ) ) {
			add_action( 'admin_notices', 'prime_vc_required_plugin_notice' );

			deactivate_plugins( plugin_basename( __FILE__ ) );

			if ( isset( $_GET['activate'] ) ) {
				unset( $_GET['activate'] );
			}
		}
	}

	add_action( 'admin_init', 'prime_vc_required_plugin' );

	function prime_vc_required_plugin_notice() {
		?>
        <div class="error"><p>Error! you need to install or activate the <a href="https://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431?ref=Rakibur_Rahman_Sagar">Visual
                    Composer</a> plugin to run "<span style="font-weight: bold;">Prime Extension Visual Composer</span>" plugin.</p></div><?php
	}
}