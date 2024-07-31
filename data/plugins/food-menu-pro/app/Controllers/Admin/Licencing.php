<?php
/**
 * Licencing Class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Controllers\Admin;

use RT\FoodMenuPro\Models\EDD_Plugin_Updater;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Licencing Class.
 */
class Licencing {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Class Init.
	 *
	 * @return void
	 */
	protected function init() {
		\add_action( 'admin_init', [ $this, 'licencing' ] );
	}

	/**
	 * Licencing
	 *
	 * @return void
	 */
	public function licencing() {
		$settings = get_option( TLPFoodMenu()->options['settings'] );
		$license  = ! empty( $settings['license_key'] ) ? trim( $settings['license_key'] ) : null;

		new EDD_Plugin_Updater(
			EDD_FOOD_MENU_PRO_STORE_URL,
			FOOD_MENU_PRO_PLUGIN_ACTIVE_FILE_NAME,
			[
				'version' => FOOD_MENU_PRO_VERSION,
				'license' => $license,
				'item_id' => EDD_FOOD_MENU_PRO_ITEM_ID,
				'author'  => FOOD_MENU_PRO_AUTHOR,
				'url'     => home_url(),
				'beta'    => false,
			]
		);
	}
}
