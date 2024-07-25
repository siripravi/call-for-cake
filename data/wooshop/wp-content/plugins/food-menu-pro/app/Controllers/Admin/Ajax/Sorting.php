<?php
/**
 * Sorting Ajax Class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Controllers\Admin\Ajax;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Sorting Ajax Class.
 */
class Sorting {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Class Init.
	 *
	 * @return void
	 */
	protected function init() {
		\add_action( 'wp_ajax_fmp-logo-update-menu-order', [ $this, 'logoUpdateOrder' ] );
		\add_action( 'wp_ajax_fmp-cat-update-order', [ $this, 'catUpdateOrder' ] );
	}

	/**
	 * Logo order update.
	 *
	 * @return void|bool
	 */
	public function logoUpdateOrder() {
		global $wpdb;

		$data = ( ! empty( $_POST['post'] ) ? $_POST['post'] : [] );

		if ( ! is_array( $data ) ) {
			return false;
		}

		$id_arr = [];

		foreach ( $data as $position => $id ) {
			$id_arr[] = $id;
		}

		$menu_order_arr = [];

		foreach ( $id_arr as $key => $id ) {
			$results = $wpdb->get_results( "SELECT menu_order FROM $wpdb->posts WHERE ID = " . intval( $id ) );

			foreach ( $results as $result ) {
				$menu_order_arr[] = $result->menu_order;
			}
		}

		sort( $menu_order_arr );

		foreach ( $data as $position => $id ) {
			$wpdb->update( $wpdb->posts, [ 'menu_order' => $menu_order_arr[ $position ] ], [ 'ID' => intval( $id ) ] );
		}

		wp_send_json_success();
	}

	/**
	 * Category order update.
	 *
	 * @return void|bool
	 */
	public function catUpdateOrder() {
		global $wpdb;

		$data = ( ! empty( $_POST['tag'] ) ? $_POST['tag'] : [] );

		if ( ! is_array( $data ) ) {
			return false;
		}

		$order_arr = [];

		foreach ( $data as $id ) {
			$order_arr[] = get_term_meta( $id, '_order', true );
		}

		sort( $order_arr );

		foreach ( $data as $position => $id ) {
			update_term_meta(  $id , '_order', $order_arr[$position] );
		}

		wp_send_json_success();
	}
}
