<?php
/**
 * Attribute Ajax Class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Controllers\Admin\Ajax;

use RT\FoodMenuPro\Helpers\FnsPro;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Attribute Ajax Class.
 */
class Attribute {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Class Init.
	 *
	 * @return void
	 */
	protected function init() {
		\add_action( 'wp_ajax_fmp_add_attribute_action', [ $this, 'addAttribute' ] );
		\add_action( 'wp_ajax_fmp_save_attributes_action', [ $this, 'saveAttribute' ] );
	}

	/**
	 * Add Attribute.
	 *
	 * @return void
	 */
	public function addAttribute() {
		$i               = absint( $_POST['i'] );
		$position        = 0;
		$metabox_class   = [];
		$attribute       = [
			'name'         => '',
			'value'        => '',
			'is_visible'   => 1,
			'is_variation' => 0,
		];
		$attribute_label = '';
		$flug            = 'open';

		FnsPro::renderView(
			'attribute',
			[
				'i'               => $i,
				'flug'            => $flug,
				'position'        => $position,
				'attribute_label' => $attribute_label,
				'attribute'       => $attribute,
			]
		);

		die();
	}

	/**
	 * Save Attribute.
	 *
	 * @return void
	 */
	public function saveAttribute() {
		$attributes = [];
		$post_id    = ! empty( $_POST['post_id'] ) ? absint( $_POST['post_id'] ) : 0;
		parse_str( $_POST['data'], $data );

		if ( isset( $data['attribute_names'], $data['attribute_values'] ) ) {
			$attribute_names         = $data['attribute_names'];
			$attribute_values        = $data['attribute_values'];
			$attribute_visibility    = isset( $data['attribute_visibility'] ) ? $data['attribute_visibility'] : [];
			$attribute_variation     = isset( $data['attribute_variation'] ) ? $data['attribute_variation'] : [];
			$attribute_position      = $data['attribute_position'];
			$attribute_names_max_key = max( array_keys( $attribute_names ) );

			for ( $i = 0; $i <= $attribute_names_max_key; $i++ ) {

				if ( empty( $attribute_names[ $i ] ) || ! isset( $attribute_values[ $i ] ) ) {
					continue;
				}

				$options                     = isset( $attribute_values[ $i ] ) ? $attribute_values[ $i ] : '';
				$attribute_name              = sanitize_text_field( $attribute_names[ $i ] );
				$attribute_id                = sanitize_title( $attribute_name );
				$attribute['name']           = $attribute_name;
				$attribute['value']          = $options;
				$attribute['position']       = $attribute_position[ $i ];
				$attribute['is_visible']     = isset( $attribute_visibility[ $i ] );
				$attribute['is_variation']   = isset( $attribute_variation[ $i ] );
				$attributes[ $attribute_id ] = $attribute;
			}
		}

		update_post_meta( $post_id, '_fmp_attributes', $attributes );
	}
}
