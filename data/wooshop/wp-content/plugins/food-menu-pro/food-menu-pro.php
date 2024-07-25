<?php
/**
 * Plugin Name: Food Menu Pro - Restaurant Menu & Online Ordering for WooCommerce
 * Plugin URI: http://demo.radiustheme.com/wordpress/plugins/food-menu/
 * Description: A Simple Food & Restaurant Menu Display Plugin for Restaurant, Cafes, Fast Food, Coffee House with WooCommerce Online Ordering.
 * Author: RadiusTheme
 * Version: 4.0.1
 * Text Domain: food-menu-pro
 * Domain Path: /languages
 * Author URI: https://radiustheme.com/
 *
 * @package RT_FoodMenuPro
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

$plugin_data = get_file_data(
	__FILE__,
	[
		'name'    => 'Plugin Name',
		'version' => 'Version',
		'author'  => 'Author',
	],
	false
);

define( 'FOOD_MENU_PRO_VERSION', $plugin_data['version'] );
define( 'FOOD_MENU_PRO_AUTHOR', $plugin_data['author'] );
define( 'EDD_FOOD_MENU_PRO_STORE_URL', 'https://www.radiustheme.com' );
define( 'EDD_FOOD_MENU_PRO_ITEM_ID', 5265 );
define( 'EDD_FOOD_MENU_PRO_ITEM_NAME', $plugin_data['name'] );
define( 'FOOD_MENU_PRO_PLUGIN_PATH', __FILE__ );
define( 'FOOD_MENU_PRO_PLUGIN_ACTIVE_FILE_NAME', __FILE__ );
define( 'FOOD_MENU_PRO_PLUGIN_URL', plugins_url( '', __FILE__ ) );
define( 'FOOD_MENU_PRO_LANGUAGE_PATH', dirname( plugin_basename( __FILE__ ) ) . '/languages' );

/**
 * Autoload.
 */
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * Dependancy check.
 */
if ( ! in_array(
	'tlp-food-menu/tlp-food-menu.php',
	apply_filters( 'active_plugins', get_option( 'active_plugins' ) ),
	true
) ) {
	\RT\FoodMenuPro\Controllers\Admin\Notices\Requirement::notice();
}

/**
 * App Init.
 */
if ( ! class_exists( 'FMP' ) ) {
	require_once 'app/FMP.php';
}

register_activation_hook( __FILE__, 'activate_rt_food_menu_pro' );
/**
 * Plugin activation action.
 *
 * Plugin activation will not work after "plugins_loaded" hook
 * that's why activation hooks run here.
 */
function activate_rt_food_menu_pro() {
	\RT\FoodMenuPro\Helpers\Install::activate();
}

register_deactivation_hook( __FILE__, 'deactivate_rt_food_menu_pro' );
/**
 * Plugin deactivation action.
 *
 * Plugin deactivation will not work after "plugins_loaded" hook
 * that's why deactivation hooks run here.
 */
function deactivate_rt_food_menu_pro() {
	\RT\FoodMenuPro\Helpers\Install::deactivate();
}
