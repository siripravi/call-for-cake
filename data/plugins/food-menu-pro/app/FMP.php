<?php
/**
 * Main initialization class.
 *
 * @package RT_FoodMenuPro
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

require_once __DIR__ . './../vendor/autoload.php';

use RT\FoodMenu\Helpers as Helpers;
use RT\FoodMenuPro\Controllers as Controllers;

if ( ! class_exists( FMP::class ) ) {
	/**
	 * Main initialization class.
	 */
	final class FMP {

		use RT\FoodMenuPro\Traits\SingletonTrait;

		/**
		 * Options
		 *
		 * @var array
		 */
		public $options;

		/**
		 * Class init.
		 *
		 * @return void
		 */
		protected function init() {
			if ( ! $this->has_free() ) {
				return;
			}

			// Checks for Free and checks version.
			$this->check_free();

			// Defaults.
			$this->defaults();

			// Hooks.
			$this->init_hooks();
		}

		/**
		 * Checks for Free and checks version
		 *
		 * @return void
		 */
		private function check_free() {
			if ( in_array(
				'tlp-food-menu/tlp-food-menu.php',
				apply_filters( 'active_plugins', get_option( 'active_plugins' ) ),
				true
			) && false === \RT\FoodMenuPro\Helpers\Upgrade::check_plugin_version() ) {
				\add_action( 'admin_init', [ \RT\FoodMenu\Helpers\Upgrade::class, 'deactivate' ] );

				return;
			}

			if ( ! function_exists( 'get_plugin_data' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}

			$fm_free_path = WP_PLUGIN_DIR . '/tlp-food-menu/tlp-food-menu.php';

			if ( file_exists( $fm_free_path ) ) {
				$plugin_path = get_plugin_data( $fm_free_path );

				if ( isset( $plugin_path['Version'] ) ) {

					if ( version_compare( $plugin_path['Version'], '4', '<' ) ) {
						\add_action( 'admin_init', [ \RT\FoodMenu\Helpers\Upgrade::class, 'notice' ] );
					}
				}
			}
		}

		/**
		 * Defaults
		 *
		 * @return void
		 */
		private function defaults() {
			$this->options = [
				'version'           => FOOD_MENU_PRO_VERSION,
				'installed_version' => 'fmp-installed-version',
			];

			TLPFoodMenu()->taxonomies['tag']        = TLPFoodMenu()->post_type . '-tag';
			TLPFoodMenu()->taxonomies['ingredient'] = TLPFoodMenu()->post_type . '-ingredient';
			TLPFoodMenu()->taxonomies['nutrition']  = TLPFoodMenu()->post_type . '-nutrition';
			TLPFoodMenu()->taxonomies['unit']       = TLPFoodMenu()->post_type . '-unit';
		}

		/**
		 * Init Hooks.
		 *
		 * @return void
		 */
		private function init_hooks() {
			\add_action( 'plugins_loaded', [ $this, 'on_plugins_loaded' ], -1 );
			\add_action( 'init', [ $this, 'initialize' ], 0 );
			// \add_filter( 'tlp_fm_template_path', [ $this, 'plugin_template_path' ] );
		}

		/**
		 * Init Hooks.
		 *
		 * @return void
		 */
		public function initialize() {
			\do_action( 'rtfmp_init' );

			$this->load_text_domain();
			$this->update_version();

			Helpers\Fns::instances( $this->controllers() );
		}

		/**
		 * Load plugin text domain.
		 *
		 * @return void
		 */
		public function load_text_domain() {
			$locale = determine_locale();
			$locale = apply_filters( 'rtfm_plugin_locale', $locale );

			unload_textdomain( 'food-menu-pro' );
			load_textdomain( 'food-menu-pro', WP_LANG_DIR . '/food-menu-pro/food-menu-pro-' . $locale . '.mo' );
			load_plugin_textdomain( 'food-menu-pro', false, FOOD_MENU_PRO_LANGUAGE_PATH );
		}

		/**
		 * Update Version.
		 *
		 * @return void
		 */
		public function update_version() {
			\update_option( FMP()->options['installed_version'], FMP()->options['version'] );
		}

		/**
		 * Controllers.
		 *
		 * @return array
		 */
		public function controllers() {
			$controllers = [];

			if ( is_admin() ) {
				$controllers[] = Controllers\AdminController::class;
			}

			$controllers[] = Controllers\PostTypesController::class;
			$controllers[] = Controllers\ScriptsController::class;
			$controllers[] = Controllers\FrontendController::class;
			$controllers[] = Controllers\AjaxController::class;

			return $controllers;
		}

		/**
		 * Actions on Plugins Loaded.
		 *
		 * @return void
		 */
		public function on_plugins_loaded() {
			\do_action( 'rtfmp_loaded' );
		}

		/**
		 * PRO plugin path
		 *
		 * @return string
		 */
		public function pro_plugin_path() {
			return untrailingslashit( plugin_dir_path( FOOD_MENU_PRO_PLUGIN_PATH ) );
		}

		/**
		 * Plugin Template path
		 *
		 * @return string
		 */
		public function plugin_template_path() {
			return $this->pro_plugin_path() . '/templates/';
		}

		/**
		 * Checks if Free version installed
		 *
		 * @return boolean
		 */
		public function has_free() {
			return class_exists( 'TLPFoodMenu' );
		}

		/**
		 * Assets URL.
		 *
		 * @return string
		 */
		public function assets_url() {
			return esc_url( FOOD_MENU_PRO_PLUGIN_URL . '/assets/' );
		}
	}

	/**
	 * Returns FMP.
	 *
	 * @return FMP
	 */
	function FMP() {
		return FMP::get_instance();
	}

	/**
	 * App Init.
	 */
	\add_action( 'plugins_loaded', 'FMP', 20 );
}
