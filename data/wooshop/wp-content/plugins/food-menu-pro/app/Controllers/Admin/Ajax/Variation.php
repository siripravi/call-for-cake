<?php
/**
 * Variation Ajax Class.
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
 * Variation Ajax Class.
 */
class Variation {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Class Init.
	 *
	 * @return void
	 */
	protected function init() {
		\add_action( 'wp_ajax_fmp_add_variation_action', [ $this, 'addVariation' ] );
		\add_action( 'wp_ajax_fmp_remove_variation_action', [ $this, 'removeVariation' ] );
		\add_action( 'wp_ajax_fmp_save_variations_action', [ $this, 'saveVariation' ] );
	}

	/**
	 * Add Variation.
	 *
	 * @return void
	 */
	public function addVariation() {
		$parent_id       = absint( $_POST['parent_id'] );
		$variation_id    = wp_insert_post(
			[
				'post_parent' => $parent_id,
				'post_type'   => 'fmp_variation',
			]
		);

		$variation_name  = '';
		$variation_price = '';
		$flug            = 'open';

		FnsPro::renderView(
			'variation',
			[
				'flug'            => $flug,
				'variation_id'    => $variation_id,
				'variation_name'  => $variation_name,
				'variation_price' => $variation_price,
			]
		);

		die();
	}

	/**
	 * Remove Variation.
	 *
	 * @return void
	 */
	public function removeVariation() {
		$error = true;
		$id    = ! empty( $_POST['post_id'] ) ? absint( $_POST['post_id'] ) : 0;

		if ( $id && wp_delete_post( $id, true ) ) {
			$error = false;
		}

		wp_send_json( [ 'error' => $error ] );
	}

	/**
	 * Save Variation.
	 *
	 * @return void
	 */
	public function saveVariation() {
		$error = true;
		parse_str( $_POST['data'], $data );

		if ( ! empty( $data['variation'] ) ) {
			$error = false;

			foreach ( $data['variation'] as $id => $field ) {
				$name  = ! empty( $field['name'] ) ? sanitize_text_field( $field['name'] ) : null;
				$price = ! empty( $field['name'] ) ? $field['price'] : null;
				update_post_meta( $id, '_name', $name );
				update_post_meta( $id, '_price', $price );
			}
		}

		wp_send_json( [ 'error' => $error ] );

		die();
	}
}
