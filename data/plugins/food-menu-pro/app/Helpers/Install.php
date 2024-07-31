<?php
/**
 * Activation & Deactivation actions.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Helpers;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Activation & Deactivation actions.
 */
class Install {
	/**
	 * Activation actions.
	 *
	 * @return void
	 */
	public static function activate() {
		\flush_rewrite_rules();
	}

	/**
	 * Deactivation actions.
	 *
	 * @return void
	 */
	public static function deactivate() {
		\flush_rewrite_rules();
	}
}
