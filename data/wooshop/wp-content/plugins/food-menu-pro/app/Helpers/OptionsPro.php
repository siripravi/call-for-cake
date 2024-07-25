<?php
/**
 * Options helper class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Helpers;

use RT\FoodMenu\Helpers\Fns;
use RT\FoodMenu\Helpers\Options;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Options helper class.
 */
class OptionsPro {
	/**
	 * General Settings Pro.
	 *
	 * @return array
	 */
	public static function generalSettingsPro() {
		$settings = get_option( TLPFoodMenu()->options['settings'] );

		return [
			'price_thousand_sep' => [
				'label' => esc_html__( 'Thousand Separator', 'food-menu-pro' ),
				'type'  => 'text',
				'class' => 'small-text',
				'value' => ( ! empty( $settings['price_thousand_sep'] ) ? $settings['price_thousand_sep'] : ',' ),
			],

			'price_decimal_sep'  => [
				'label' => esc_html__( 'Decimal Separator', 'food-menu-pro' ),
				'type'  => 'text',
				'class' => 'small-text',
				'value' => ( ! empty( $settings['price_decimal_sep'] ) ? stripslashes( $settings['price_decimal_sep'] ) : '.' ),
			],

			'price_num_decimals' => [
				'label' => esc_html__( 'Number of Decimals', 'food-menu-pro' ),
				'type'  => 'number',
				'class' => 'small-text',
				'attr'  => 'min="0" step="1"',
				'value' => ( ! empty( $settings['price_num_decimals'] ) ? ( absint( $settings['price_num_decimals'] ) > 0 ? absint( $settings['price_num_decimals'] ) : 2 ) : 2 ),
			],
		];
	}

	/**
	 * Details Settings Pro.
	 *
	 * @return array
	 */
	public static function detailsSettingsPro() {
		$settings = get_option( TLPFoodMenu()->options['settings'] );

		return [
			'fmp_single_secondary_color' => [
				'type'  => 'colorpicker',
				'label' => esc_html__( 'Secondary Color', 'food-menu-pro' ),
				'value' => ! empty( $settings['fmp_single_secondary_color'] ) ? $settings['fmp_single_secondary_color'] : null,
			],
		];
	}

	/**
	 * Details Page Settings Pro.
	 *
	 * @return array
	 */
	public static function detailsPageSettingsPro() {
		return [
			'summery'     => esc_html__( 'Short Description', 'food-menu-pro' ),
			'taxonomy'    => esc_html__( 'Taxonomy (Category , Tag)', 'food-menu-pro' ),
			'description' => esc_html__( 'Description', 'food-menu-pro' ),
			'ingredient'  => esc_html__( 'Ingredient', 'food-menu-pro' ),
			'nutrition'   => esc_html__( 'Nutrition', 'food-menu-pro' ),
			'reviews'     => esc_html__( 'Reviews', 'food-menu-pro' ),
		];
	}

	/**
	 * License Settings Pro.
	 *
	 * @return array
	 */
	public static function licenseSettingsPro() {
		return [
			'id'      => 'plugin-license',
			'title'   => esc_html__( 'Plugin License', 'food-menu-pro' ),
			'icon'    => 'dashicons-admin-network',
			'content' => Fns::rtFieldGenerator( self::rtLicenceField() ),
		];
	}

	/**
	 * License Field.
	 *
	 * @return array
	 */
	public static function rtLicenceField() {
		$settings       = get_option( TLPFoodMenu()->options['settings'] );
		$status         = ! empty( $settings['license_status'] ) && $settings['license_status'] === 'valid' ? true : false;
		$license_status = ! empty( $settings['license_key'] ) ? sprintf(
			"<span class='license-status'>%s</span>",
			$status ? "<input type='submit' class='button-secondary rt-licensing-btn danger' name='license_deactivate' value='" . esc_html__( 'Deactivate License', 'food-menu-pro' ) . "'/>"
			: "<input type='submit' class='button-secondary rt-licensing-btn button-primary' name='license_activate' value='" . esc_html__( 'Activate License', 'food-menu-pro' ) . "'/>"
		) : ' ';

		return [
			'license_key' => [
				'type'        => 'text',
				'attr'        => 'style="min-width:300px;"',
				'label'       => esc_html__( 'Enter your license key', 'food-menu-pro' ),
				'description' => $license_status,
				'id'          => 'rt_fmp_license_key',
				'value'       => isset( $settings['license_key'] ) ? $settings['license_key'] : '',
			],
		];
	}

	/**
	 * Slider Settings Pro.
	 *
	 * @return array
	 */
	public static function sliderSettingsPro() {
		return [
			'fmp_carousel_items_per_slider' => [
				'label'       => esc_html__( 'Number of Slide Items', 'food-menu-pro' ),
				'holderClass' => 'fmp-hidden fmp-carousel-item',
				'class'       => 'fmp-select2',
				'type'        => 'select',
				'default'     => 0,
				'options'     => Options::scColumns(),
				'description' => esc_html__( 'Please enter the number of slide items to display.', 'food-menu-pro' ),
			],
			'fmp_carousel_speed'            => [
				'label'       => esc_html__( 'Slide Transition Speed', 'food-menu-pro' ),
				'holderClass' => 'fmp-hidden fmp-carousel-item',
				'type'        => 'number',
				'default'     => 2000,
				'description' => esc_html__( 'Please enter the slide transition speed in milliseconds.', 'food-menu-pro' ),
			],
			'fmp_carousel_options'          => [
				'label'       => esc_html__( 'Slider Settings', 'food-menu-pro' ),
				'holderClass' => 'fmp-hidden fmp-carousel-item',
				'type'        => 'checkbox',
				'multiple'    => true,
				'alignment'   => 'vertical',
				'options'     => self::carouselProperty(),
				'default'     => [ 'autoplay', 'nav', 'dots', 'loop' ],
			],
			'fmp_carousel_autoplay_timeout' => [
				'label'       => esc_html__( 'Autoplay Timeout', 'food-menu-pro' ),
				'holderClass' => 'fmp-hidden fmp-carousel-auto-play-timeout',
				'type'        => 'number',
				'default'     => 5000,
				'description' => esc_html__( 'Please enter the autoplay timeout in milliseconds.', 'food-menu-pro' ),
			],
		];
	}

	public static function isotopeSettingsPro() {
		return [
			'fmp_isotope_filter_tyle'          => [
				'type'        => 'select',
				'label'       => esc_html__( 'Isotope Filter Style Type', 'food-menu-pro' ),
				'holderClass' => 'fmp-isotope-item fmp-hidden',
				'class'       => 'fmp-select2',
				'options'     => FnsPro::getAllFmpIsoFilterType(),
				'description' => esc_html__( 'Please select the isotope filter style type.', 'food-menu-pro' ),
			],
			'fmp_isotope_selected_filter'      => [
				'type'        => 'select',
				'label'       => esc_html__( 'Isotope Filter (Default Selected Item)', 'food-menu-pro' ),
				'holderClass' => 'fmp-isotope-item fmp-hidden',
				'class'       => 'fmp-select2',
				'blank'       => esc_html__( 'Show All', 'food-menu-pro' ),
				'options'     => Fns::getAllFmpCategoryList(),
				'description' => esc_html__( 'Please select the default selected filter term (Selected item).', 'food-menu-pro' ),
			],
			'fmp_isotope_filter_show_all'      => [
				'type'        => 'checkbox',
				'label'       => 'Display \'Show All\' Button?',
				'holderClass' => 'fmp-isotope-item fmp-hidden',
				'id'          => 'rt-tpg-sc-isotope-filter-show-all',
				'optionLabel' => esc_html__( 'Disable', 'food-menu-pro' ),
				'option'      => 1,
				'default'     => 1,
				'description' => esc_html__( 'Switch on to display show all button.', 'food-menu-pro' ),
			],
			'fmp_isotope_filter_show_all_text' => [
				'type'        => 'text',
				'label'       => '\'Show All\' Button Text?',
				'holderClass' => 'fmp-isotope-item fmp-hidden',
				'id'          => 'rt-tpg-sc-isotope-filter-show-all',
				'default'     => esc_html__( 'Show All', 'food-menu-pro' ),
				'description' => esc_html__( 'Switch on to display show all button.', 'food-menu-pro' ),
			],
			'fmp_isotope_search_filtering'     => [
				'type'        => 'checkbox',
				'label'       => 'Enable Search Filter?',
				'holderClass' => 'fmp-isotope-item fmp-hidden',
				'optionLabel' => 'Enable',
				'option'      => 1,
				'description' => esc_html__( 'Switch on to enable search filter.', 'food-menu-pro' ),
			],
		];
	}

	/**
	 * Pagination Settings Pro.
	 *
	 * @return array
	 */
	public static function paginationSettingsPro() {
		return [
			'fmp_pagination'            => [
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Pagination', 'food-menu-pro' ),
				'holderClass' => 'pagination',
				'optionLabel' => esc_html__( 'Enable', 'food-menu-pro' ),
				'option'      => 1,
			],
			'fmp_posts_per_page'        => [
				'type'        => 'number',
				'label'       => esc_html__( 'Display per page', 'food-menu-pro' ),
				'holderClass' => 'fmp-pagination-item fmp-hidden',
				'default'     => 5,
				'description' => esc_html__(
					'If value of Limit setting is not blank (empty), this value should be smaller than Limit value.',
					'food-menu-pro'
				),
			],
			'fmp_pagination_type'       => [
				'type'        => 'radio',
				'label'       => esc_html__( 'Pagination type', 'food-menu-pro' ),
				'holderClass' => 'fmp-pagination-item fmp-hidden',
				'alignment'   => 'vertical',
				'default'     => 'pagination',
				'options'     => self::paginationType(),
			],
			'fmp_load_more_button_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Load more button text', 'food-menu-pro' ),
				'holderClass' => 'fmp-load-more-item fmp-hidden',
				'default'     => esc_html__( 'Load more', 'food-menu-pro' ),
			],
		];
	}

	/**
	 * Style Settings Pro.
	 *
	 * @return array
	 */
	public static function styleSettingsPro() {
		return [
			'fmp_short_description_style' => [
				'type'  => 'style',
				'label' => esc_html__( 'Short description', 'food-menu-pro' ),
			],
		];
	}

	/**
	 * Color Settings Pro.
	 *
	 * @return array
	 */
	public static function colorSettingsPro() {
		return [
			'fmp_primary_color'   => [
				'type'    => 'colorpicker',
				'label'   => esc_html__( 'Primary Color', 'food-menu-pro' ),
				'default' => '#0367bf',
			],
			'fmp_overlay_color'   => [
				'type'  => 'colorpicker',
				'label' => esc_html__( 'Overlay Color', 'food-menu-pro' ),
			],
			'fmp_overlay_opacity' => [
				'type'        => 'select',
				'label'       => esc_html__( 'Overlay Opacity', 'food-menu-pro' ),
				'class'       => 'fmp-select2',
				'default'     => .8,
				'options'     => self::overflowOpacity(),
				'description' => esc_html__( 'Please choose the overlay opacity', 'food-menu-pro' ),
			],
		];
	}

	/**
	 * Image Settings Pro.
	 *
	 * @return array
	 */
	public static function imageSettingsPro() {
		return [
			'fmp_custom_image_size' => [
				'type'        => 'image_size',
				'label'       => esc_html__( 'Custom Image Size', 'food-menu-pro' ),
				'holderClass' => 'hidden',
				'description' => __( '<span style="margin-top: 20px; display: block; color: #9A2A2A; font-weight: 600;">Please note that, if you enter image size larger than the actual image iteself, the image sizes will fallback to the default thumbnail dimension (150x150 px).</span>', 'food-menu-pro' ),
			],
		];
	}

	/**
	 * Misc Settings Pro.
	 *
	 * @return array
	 */
	public static function miscSettingsPro() {
		return [
			'fmp_read_more_button_text' => [
				'type'        => 'text',
				'label'       => esc_html__( '\'Read More\' button Text', 'food-menu-pro' ),
				'default'     => esc_html__( 'Read more', 'food-menu-pro' ),
				'description' => esc_html__( 'Please enter read more button text.', 'food-menu-pro' ),
			],
			'fmp_add_to_cart_text'      => [
				'type'        => 'text',
				'label'       => esc_html__( '\'Add to Cart\' Button Text (WooCommerce)', 'food-menu-pro' ),
				'default'     => esc_html__( 'Add to cart', 'food-menu-pro' ),
				'description' => esc_html__( 'Please enter add to cart button text.', 'food-menu-pro' ),
			],
			'fmp_margin'                => [
				'type'        => 'radio',
				'label'       => esc_html__( 'Element Margin', 'food-menu-pro' ),
				'alignment'   => 'vertical',
				'description' => esc_html__( 'Select the element margin for the layout.', 'food-menu-pro' ),
				'default'     => 'default',
				'options'     => self::scMarginOpt(),
			],
		];
	}

	/**
	 * Carousel Property
	 *
	 * @return array
	 */
	private static function carouselProperty() {
		$oelProperty = [
			'loop'               => esc_html__( 'Loop', 'food-menu-pro' ),
			'autoplay'           => esc_html__( 'Auto Play', 'food-menu-pro' ),
			'autoplayHoverPause' => esc_html__( 'Pause on mouse hover', 'food-menu-pro' ),
			'nav'                => esc_html__( 'Nav Button', 'food-menu-pro' ),
			'dots'               => esc_html__( 'Pagination', 'food-menu-pro' ),
			'auto_height'        => esc_html__( 'Auto Height', 'food-menu-pro' ),
			'lazy_load'          => esc_html__( 'Lazy Load', 'food-menu-pro' ),
			'rtl'                => esc_html__( 'Right to left (RTL)', 'food-menu-pro' ),
		];

		return apply_filters( 'fmp_sc_owl_property', $oelProperty );
	}

	/**
	 * Image Shape Type.
	 *
	 * @return array
	 */
	private static function get_image_shapes() {
		return [
			'normal' => esc_html__( 'Normal', 'food-menu-pro' ),
			'circle' => esc_html__( 'Circle', 'food-menu-pro' ),
		];
	}

	/**
	 * Margin Type.
	 *
	 * @return array
	 */
	private static function scMarginOpt() {
		return [
			'default' => esc_html__( 'Default Margin', 'food-menu-pro' ),
			'no'      => esc_html__( 'No Margin', 'food-menu-pro' ),
		];
	}

	/**
	 * Grid Type.
	 *
	 * @return array
	 */
	private static function scGridOpt() {
		return [
			'even'    => esc_html__( 'Even', 'food-menu-pro' ),
			'masonry' => esc_html__( 'Masonry', 'food-menu-pro' ),
		];
	}

	/**
	 * Opacity Type.
	 *
	 * @return array
	 */
	private static function overflowOpacity() {
		return [
			10 => esc_html__( '10%', 'food-menu-pro' ),
			20 => esc_html__( '20%', 'food-menu-pro' ),
			30 => esc_html__( '30%', 'food-menu-pro' ),
			40 => esc_html__( '40%', 'food-menu-pro' ),
			50 => esc_html__( '50%', 'food-menu-pro' ),
			60 => esc_html__( '60%', 'food-menu-pro' ),
			70 => esc_html__( '70%', 'food-menu-pro' ),
			80 => esc_html__( '80%', 'food-menu-pro' ),
			90 => esc_html__( '90%', 'food-menu-pro' ),
		];
	}
}
