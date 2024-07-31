<?php
/**
 * Add to Cart Ajax Class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Controllers\Frontend\Ajax;

use WC_AJAX;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Add to Cart Ajax Class.
 */
class AddToCart {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Class Init.
	 *
	 * @return void
	 */
	protected function init() {
		\add_action( 'wp_ajax_fmp_wc_ajax_add_to_cart', [ $this, 'response' ] );
		\add_action( 'wp_ajax_nopriv_fmp_wc_ajax_add_to_cart', [ $this, 'response' ] );
	}

	/**
	 * Ajax Response.
	 *
	 * @return void
	 */
	public function response() {
		if ( TLPFoodMenu()->isWcActive() ) {
			$product_id        = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $_POST['product_id'] ) );
			$quantity          = empty( $_POST['quantity'] ) ? 1 : apply_filters( 'woocommerce_stock_amount', $_POST['quantity'] );
			$variation_id      = isset( $_POST['variation_id'] ) ? absint( $_POST['variation_id'] ) : 0;
			$passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );

			if ( $passed_validation && WC()->cart->add_to_cart( $product_id, $quantity, $variation_id ) ) {
				do_action( 'woocommerce_ajax_added_to_cart', $product_id );
				WC_AJAX::get_refreshed_fragments();
			} else {
				$data = [
					'error'       => true,
					'product_url' => apply_filters( 'woocommerce_cart_redirect_after_error', get_permalink( $product_id ), $product_id ),
				];

				wp_send_json( $data );
			}
		}

		wp_send_json(
			[
				'error' => true,
				'msg'   => esc_html__( 'WooCommerce not installed', 'food-menu-pro' ),
			]
		);
	}
}
