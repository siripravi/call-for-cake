<?php
/**
 * Admin Shortcode Metabox Class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Controllers\Admin\Metabox;

use RT\FoodMenu\Helpers\Fns;
use RT\FoodMenuPro\Helpers\FnsPro;
use RT\FoodMenuPro\Helpers\OptionsPro;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Admin Shortcode Metabox Class.
 */
class ShortcodeMeta {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Class Init.
	 *
	 * @return void
	 */
	protected function init() {
		\add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue_scripts' ] );
		\add_action( 'fmp_sc_meta_after_columns', [ $this, 'scCaroIsoMetaFields' ] );
		\add_action( 'fmp_sc_meta_after_details', [ $this, 'scExtraMetaFields' ] );
		\add_filter( 'rtfm_sc_meta_fields', [ $this, 'scMetaFields' ] );
		\add_filter( 'fmp_sc_image_settings', [ $this, 'scLayoutImageFields' ] );
		\add_filter( 'fmp_sc_pagination_settings', [ $this, 'scLayoutPaginationFields' ] );
		\add_filter( 'fmp_sc_style', [ $this, 'scStyleFields' ] );
		\add_filter( 'fmp_sc_content_style', [ $this, 'scContentStyleFields' ] );
	}

	/**
	 * Admin Enqueue Scripts.
	 *
	 * @return void
	 */
	public function admin_enqueue_scripts() {
		global $pagenow, $typenow;
		// validate page
		if ( ! in_array( $pagenow, [ 'post.php', 'post-new.php', 'edit.php' ] ) ) {
			return;
		}

		if ( $typenow != TLPFoodMenu()->shortCodePT ) {
			return;
		}

		wp_enqueue_media();
		wp_deregister_script( 'fm-admin-preview' );
		wp_dequeue_script( 'fm-admin-preview' );

		// Scripts.
		wp_enqueue_script(
			[
				'fmp-image-load',
				'fmp-actual-height',
				'fmp-swiper',
				'fmp-isotope',
				'fmp-admin',
				'fmp-admin-sc',
				'fmp-admin-preview',
			]
		);

		// Styles.
		wp_enqueue_style(
			[
				'fmp-swiper',
				'fmp-isotope',
				'fm-frontend',
				'fmp-fontawsome',
				'fmp-admin',
				'fmp-admin-preview',
			]
		);

		$nonce = wp_create_nonce( Fns::nonceText() );

		wp_localize_script(
			'fm-admin',
			'fmp_var',
			[
				'nonceID' => esc_attr( Fns::nonceId() ),
				'nonce'   => esc_attr( $nonce ),
				'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
			]
		);
	}

	/**
	 * SC Meta Fields.
	 *
	 * @return void
	 */
	public function scMetaFields( $metas ) {
		return array_merge(
			$metas,
			OptionsPro::sliderSettingsPro(),
			OptionsPro::isotopeSettingsPro(),
			OptionsPro::miscSettingsPro(),
			OptionsPro::imageSettingsPro(),
			OptionsPro::colorSettingsPro(),
			OptionsPro::styleSettingsPro()
		);
	}

	/**
	 * Conditional Fields.
	 *
	 * @return void
	 */
	public function scCaroIsoMetaFields() {
		?>
		<div class="rt-field-wrapper rt-field-group" id="rtfm_slider">
			<div class="rt-label">Slider Settings</div>
			<div class="rt-field">
				<?php
				Fns::print_html( Fns::rtFieldGenerator( OptionsPro::sliderSettingsPro() ), true );
				?>
			</div>
		</div>
		<div class="rt-field-wrapper rt-field-group" id="rtfm_isotope">
			<div class="rt-label">Isotope Filters Settings</div>
			<div class="rt-field">
				<?php
				Fns::print_html( Fns::rtFieldGenerator( OptionsPro::isotopeSettingsPro() ), true );
				?>
			</div>
		</div>
		<?php
	}

	/**
	 * Extra Fields
	 *
	 * @return void
	 */
	public function scExtraMetaFields() {
		?>
		<div class="rt-field-wrapper rt-field-group" id="rtfm_extra_settings">
			<div class="rt-label">Extra Settings</div>
			<div class="rt-field">
				<?php
				Fns::print_html( Fns::rtFieldGenerator( OptionsPro::miscSettingsPro() ), true );
				?>
			</div>
		</div>
		<?php
	}

	/**
	 * Image Fields
	 *
	 * @param array $fields Fields.
	 * @return array
	 */
	public function scLayoutImageFields( $fields ) {
		$position = array_search( 'fmp_image_size', array_keys( $fields ) );

		if ( $position > -1 ) {
			$imgOption = OptionsPro::imageSettingsPro();

			$fields = FnsPro::array_insert( $fields, $position, $imgOption );
		}

		$fields['fmp_placeholder_image'] = [
			'type'        => 'image',
			'label'       => esc_html__( 'Default preview Image', 'food-menu-pro' ),
			'description' => __( 'Please choose the default preview image. <br>This image will show if there is no featured image available.', 'food-menu-pro' ),
		];

		return $fields;
	}

	/**
	 * Pagination Fields
	 *
	 * @param array $fields Fields.
	 * @return array
	 */
	public function scLayoutPaginationFields( $fields ) {
		$fields['fmp_load_more_button_text'] = [
			'type'        => 'text',
			'label'       => esc_html__( 'Load more button text', 'food-menu-pro' ),
			'holderClass' => 'fmp-load-more-item fmp-hidden',
			'default'     => esc_html__( 'Load more', 'food-menu-pro' ),
		];

		return $fields;
	}

	/**
	 * Style Fields
	 *
	 * @param array $fields Fields.
	 * @return array
	 */
	public function scStyleFields( $fields ) {
		$position = array_search( 'fmp_parent_class', array_keys( $fields ) );

		if ( $position > -1 ) {
			$colorOption = OptionsPro::colorSettingsPro();

			$fields = FnsPro::array_insert( $fields, $position, $colorOption );
		}

		return $fields;
	}

	/**
	 * Style Fields
	 *
	 * @param array $fields Fields.
	 * @return array
	 */
	public function scContentStyleFields( $fields ) {
		$position = array_search( 'fmp_price_style', array_keys( $fields ) );

		if ( $position > -1 ) {
			$typeOption = OptionsPro::styleSettingsPro();

			$fields = FnsPro::array_insert( $fields, $position, $typeOption );
		}

		return $fields;
	}
}
