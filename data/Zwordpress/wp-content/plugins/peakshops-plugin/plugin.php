<?php
/**
 * Plugin Name: PeakShops - Required Plugin
 * Description: This plugin adds necessary functionality to the Issue theme.
 * Version: 1.1.3
 * Author: fuelthemes
 * Author URI: http://themeforest.net/user/fuelthemes
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}
class PeakShops_Plugin {
	private static $instance = null;
	private $plugin_path;
	private $plugin_url;

	/**
	 * Creates or returns an instance of this class.
	 */
	public static function get_instance() {
		global $peak_shops_plugin;
		// If an instance hasn't been created and set to $instance create an instance and set it to $instance.
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		$peak_shops_plugin = self::$instance;
		return $peak_shops_plugin;
	}

	/**
	 * Initializes the plugin by setting localization, hooks, filters, and administrative functions.
	 */
	private function __construct() {
		$this->plugin_path = plugin_dir_path( __FILE__ );
		$this->plugin_url  = plugin_dir_url( __FILE__ );
		$this->plugin_name = '';
		if ( is_admin() ) {
			if ( ! function_exists( 'get_plugin_data' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}
			$plugin_data       = get_plugin_data( __FILE__ );
			$this->plugin_name = $plugin_data['Name'];
		}
		$this->run_plugin();
	}

	public function get_plugin_url() {
		return $this->plugin_url;
	}

	public function get_plugin_path() {
		return $this->plugin_path;
	}

	/**
	 * Place code for your plugin's functionality here.
	 */
	private function run_plugin() {
		$theme = wp_get_theme();
		$cond  = class_exists( 'OCDI_Plugin' );
		if ( $cond ) {
			add_action( 'admin_notices', array( &$this, 'thb_plugin_admin_notices' ) );
			deactivate_plugins( plugin_basename( __FILE__ ) );
			unset( $_GET['activate'] );
			return false;
		}
		if ( is_admin() ) {
			define( 'PT_OCDI_PATH', plugin_dir_path( __FILE__ ) . 'inc/one-click-demo-import/' );
			define( 'PT_OCDI_URL', plugin_dir_url( __FILE__ ) . 'inc/one-click-demo-import/' );
			require_once $this->plugin_path . 'inc/one-click-demo-import/one-click-demo-import.php';
		}

		// Add Shortcodes.
		if ( ! function_exists( 'thb_add_short' ) ) {
			function thb_add_short( $name, $call ) {
				return add_shortcode( $name, $call );
			}
		}
		// WooCommerce Check.
		if ( ! function_exists( 'thb_wc_supported' ) ) {
			function thb_wc_supported() {
				return class_exists( 'WooCommerce' );
			}
		}
		if ( ! function_exists( 'thb_is_woocommerce' ) ) {
			function thb_is_woocommerce() {
				if ( ! thb_wc_supported() ) {
					return false;
				}
				return ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() );
			}
		}
		// VC Templates.
		$shortcodes = $this->plugin_path . 'inc/vc_templates/';
		$files      = glob( $shortcodes . 'thb_?*.php' );
		if ( function_exists( 'vc_map_get_attributes' ) ) {
			foreach ( $files as $filename ) {
				require_once $this->plugin_path . 'inc/vc_templates/' . basename( $filename );
			}
		}
		// Widgets.
		require_once $this->plugin_path . 'inc/widgets/widgets-init.php';

		// Misc.
		require_once $this->plugin_path . 'inc/misc.php';
	}
	private function thb_plugin_admin_notices() {
		echo '<div class="notice error thb_admin_notices">
		<p>Please disable the <strong>One Click Import</strong> or <strong>other theme plugins</strong> before activating <em>' . esc_html( $this->plugin_name ) . '</em>.</p>
		</div>';
	}
}
function peakshops_plugin() {
	global $peak_shops_plugin;
	return $peak_shops_plugin;
}

function thb_peakshops_plugin() {
	PeakShops_Plugin::get_instance();
}
add_action( 'after_setup_theme', 'thb_peakshops_plugin', 5 );
