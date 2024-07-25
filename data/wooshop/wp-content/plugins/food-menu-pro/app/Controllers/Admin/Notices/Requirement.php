<?php
/**
 * Requirement Notice Class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Controllers\Admin\Notices;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Requirement Notice Class.
 */
class Requirement {
	/**
	 * Class Init.
	 *
	 * @return void
	 */
	public static function notice() {
		\add_action( 'admin_init', [ __CLASS__, 'render' ] );
	}

	/**
	 * Render Notice.
	 *
	 * @return void
	 */
	public static function render() {
		$class    = 'notice notice-error';
		$text     = esc_html__( 'Food Menu', 'food-menu-pro' );
		$link     = add_query_arg(
			[
				'tab'       => 'plugin-information',
				'plugin'    => 'tlp-food-menu',
				'TB_iframe' => 'true',
				'width'     => '640',
				'height'    => '500',
			],
			admin_url( 'plugin-install.php' )
		);
		$link_pro = 'https://www.radiustheme.com/downloads/food-menu-pro-wordpress';

		printf(
			'<div class="%1$s"><p><a target="_blank" href="%3$s"><strong>Food Menu Pro</strong></a> is not working, You need to install and activate <a class="thickbox open-plugin-details-modal" href="%2$s"><strong>%4$s</strong></a> free version 4.0.0 or more to get the pro features.</p></div>',
			esc_attr( $class ),
			esc_url( $link ),
			esc_url( $link_pro ),
			esc_html( $text )
		);
	}
}
