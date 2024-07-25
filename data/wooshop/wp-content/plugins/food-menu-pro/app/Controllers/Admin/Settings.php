<?php
/**
 * Admin Options class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Controllers\Admin;

use RT\FoodMenuPro\Helpers\FnsPro;
use RT\FoodMenuPro\Helpers\OptionsPro;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Admin Options class.
 */
class Settings {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Class Init.
	 *
	 * @return void
	 */
	protected function init() {
		\add_filter( 'fmp_general_settings', [ $this, 'generalSettings' ], 10, 2 );
		\add_filter( 'fmp_detail_page_settings', [ $this, 'detailsSettings' ], 10, 2 );
		\add_filter( 'tlp_fm_hidden_field_option', [ $this, 'detailsPageHiddenOptions' ] );
		\add_filter( 'tlp_fm_settings_tab', [ $this, 'license_tab' ] );
		\add_filter( 'tlp_fm_promotion_tab_title', [ $this, 'promotion_tab_title' ] );
		\add_filter( 'tlp_fm_promotion_product_list', [ $this, 'promotionsFields' ] );
	}

	/**
	 * General Settings
	 *
	 * @param array $general Settings.
	 * @param array $settings Settings.
	 * @return array
	 */
	public function generalSettings( $general, $settings ) {
		$options = OptionsPro::generalSettingsPro();
		$general = array_merge( $general, $options );

		return apply_filters( 'rt_fmp_general_settings', $general, $settings );
	}

	/**
	 * Details Settings
	 *
	 * @param array $details Settings.
	 * @param array $settings Settings.
	 * @return array
	 */
	public function detailsSettings( $details, $settings ) {
		$options = OptionsPro::detailsSettingsPro();
		$details = array_merge( $details, $options );

		return apply_filters( 'rt_fmp_details_settings', $details, $settings );
	}

	/**
	 * Details Page Settings
	 *
	 * @param array $options Settings.
	 * @return array
	 */
	public function detailsPageHiddenOptions( $options ) {
		return array_merge(
			$options,
			OptionsPro::detailsPageSettingsPro()
		);
	}

	/**
	 * Tab Title.
	 *
	 * @return string
	 */
	public function promotion_tab_title() {
		return esc_html__( 'Themes (Pro)', 'food-menu-pro' );
	}

	/**
	 * Promotions Fields
	 *
	 * @param array $products Products.
	 * @return array
	 */
	public function promotionsFields( $products ) {
		unset( $products['plugins'] );

		return $products;
	}

	/**
	 * License Tab
	 *
	 * @param array $tabs Tabs.
	 * @return array
	 */
	public function license_tab( $tabs ) {
		$position = array_search( 'details', array_keys( $tabs ), true );

		if ( $position > -1 ) {
			$tab['license'] = OptionsPro::licenseSettingsPro();

			$tabs = FnsPro::array_insert( $tabs, $position, $tab );
		}

		return $tabs;
	}
}
