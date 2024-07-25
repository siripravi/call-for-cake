<?php
/**
 * Licence Ajax Class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Controllers\Admin\Ajax;

use RT\FoodMenu\Helpers\Fns;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Licence Ajax Class.
 */
class Licence {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Class Init.
	 *
	 * @return void
	 */
	protected function init() {
		\add_action( 'wp_ajax_rtFmpManageLicencing', [ $this, 'manageLicence' ] );
		\add_action( 'wp_ajax_rtFmp_active_Licence', [ $this, 'activeLicence' ] );
	}

	/**
	 * Manage Licence.
	 *
	 * @return void
	 */
	public function manageLicence() {
		$error = true;
		$name  = $value = $data = $class = $message = null;

		if ( Fns::verifyNonce() ) {
			$settings = get_option( TLPFoodMenu()->options['settings'] );
			$license  = ! empty( $settings['license_key'] ) ? trim( $settings['license_key'] ) : null;

			if ( ! empty( $_REQUEST['type'] ) && $_REQUEST['type'] == 'license_activate' ) {
				$api_params = [
					'edd_action' => 'activate_license',
					'license'    => $license,
					'item_id'    => EDD_FOOD_MENU_PRO_ITEM_ID,
					'url'        => home_url(),
				];
				$response   = wp_remote_post(
					EDD_FOOD_MENU_PRO_STORE_URL,
					[
						'timeout'   => 15,
						'sslverify' => false,
						'body'      => $api_params,
					]
				);

				if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
					$err     = $response->get_error_message();
					$message = ( is_wp_error( $response ) && ! empty( $err ) ) ? $err : esc_html__( 'An error occurred, please try again.', 'food-menu-pro' );
				} else {
					$license_data = json_decode( wp_remote_retrieve_body( $response ) );
					if ( false === $license_data->success ) {
						switch ( $license_data->error ) {
							case 'expired':
								$message = sprintf(
									esc_html__( 'Your license key expired on %s.' ),
									date_i18n(
										get_option( 'date_format' ),
										strtotime( $license_data->expires, current_time( 'timestamp' ) )
									)
								);
								break;
							case 'revoked':
								$message = esc_html__( 'Your license key has been disabled.', 'food-menu-pro' );
								break;
							case 'missing':
								$message = esc_html__( 'Invalid license.', 'food-menu-pro' );
								break;
							case 'invalid':
							case 'site_inactive':
								$message = esc_html__( 'Your license is not active for this URL.', 'food-menu-pro' );
								break;
							case 'item_name_mismatch':
								$message = sprintf( esc_html__( 'This appears to be an invalid license key for %s.', 'food-menu-pro' ), EDD_FOOD_MENU_PRO_ITEM_NAME );
								break;
							case 'no_activations_left':
								$message = esc_html__( 'Your license key has reached its activation limit.', 'food-menu-pro' );
								break;
							default:
								$message = esc_html__( 'An error occurred, please try again.', 'food-menu-pro' );
								break;
						}
					}

					// Check if anything passed on a message constituting a failure.
					if ( empty( $message ) ) {
						$settings['license_status'] = $license_data->license;

						update_option( TLPFoodMenu()->options['settings'], $settings );

						$error = false;
						$name  = 'license_deactivate';
						$value = 'Deactivate License';
						$class = 'button-primary';
					}
				}
			}

			if ( ! empty( $_REQUEST['type'] ) && $_REQUEST['type'] == 'license_deactivate' ) {
				$api_params = [
					'edd_action' => 'deactivate_license',
					'license'    => $license,
					'item_id'    => EDD_FOOD_MENU_PRO_ITEM_ID,
					'url'        => home_url(),
				];
				$response   = wp_remote_post(
					EDD_FOOD_MENU_PRO_STORE_URL,
					[
						'timeout'   => 15,
						'sslverify' => false,
						'body'      => $api_params,
					]
				);

				// Make sure there are no errors.
				if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
					$err     = $response->get_error_message();
					$message = ( is_wp_error( $response ) && ! empty( $err ) ) ? $err : esc_html__( 'An error occurred, please try again.' );
				} else {
					unset( $settings['license_status'] );

					update_option( TLPFoodMenu()->options['settings'], $settings );

					$error = false;
					$name  = 'license_activate';
					$value = 'Activate License';
					$class = 'button-primary';
				}
			}
		} else {
			$message = esc_html__( 'Security Error !!', 'food-menu-pro' );
		}

		$data     = $_REQUEST;
		$response = [
			'error' => $error,
			'msg'   => $message,
			'name'  => $name,
			'value' => $value,
			'class' => $class,
			'data'  => $data,
		];

		wp_send_json( $response );
		die();
	}

	/**
	 * Active Licence.
	 *
	 * @return void
	 */
	public function activeLicence() {
		$error = true;
		$html  = $message = null;

		if ( Fns::verifyNonce() ) {
			$settings   = get_option( TLPFoodMenu()->options['settings'] );
			$license    = ! empty( $settings['license_key'] ) ? trim( $settings['license_key'] ) : null;
			$api_params = [
				'edd_action' => 'activate_license',
				'license'    => $license,
				'item_id'    => EDD_FOOD_MENU_PRO_ITEM_ID,
				'url'        => home_url(),
			];
			$response   = wp_remote_post(
				EDD_FOOD_MENU_PRO_STORE_URL,
				[
					'timeout'   => 15,
					'sslverify' => false,
					'body'      => $api_params,
				]
			);

			if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
				$err     = $response->get_error_message();
				$message = ( is_wp_error( $response ) && ! empty( $err ) ) ? $err : esc_html__( 'An error occurred, please try again.', 'food-menu-pro' );
			} else {
				$license_data = json_decode( wp_remote_retrieve_body( $response ) );

				if ( false === $license_data->success ) {
					switch ( $license_data->error ) {
						case 'expired':
							$message = sprintf(
								esc_html__( 'Your license key expired on %s.', 'food-menu-pro' ),
								date_i18n(
									get_option( 'date_format' ),
									strtotime( $license_data->expires, current_time( 'timestamp' ) )
								)
							);
							break;
						case 'revoked':
							$message = esc_html__( 'Your license key has been disabled.', 'food-menu-pro' );
							break;
						case 'missing':
							$message = esc_html__( 'Invalid license.', 'food-menu-pro' );
							break;
						case 'invalid':
						case 'site_inactive':
							$message = esc_html__( 'Your license is not active for this URL.', 'food-menu-pro' );
							break;
						case 'item_name_mismatch':
							$message = sprintf(
								esc_html__( 'This appears to be an invalid license key for %s.', 'food-menu-pro' ),
								EDD_FOOD_MENU_PRO_ITEM_NAME
							);
							break;
						case 'no_activations_left':
							$message = esc_html__( 'Your license key has reached its activation limit.', 'food-menu-pro' );
							break;
						default:
							$message = esc_html__( 'An error occurred, please try again.', 'food-menu-pro' );
							break;
					}
				}

				// Check if anything passed on a message constituting a failure.
				if ( empty( $message ) ) {
					$settings['license_status'] = $license_data->license;

					update_option( TLPFoodMenu()->options['settings'], $settings );

					$error   = false;
					$message = esc_html__( 'Successfully activated', 'food-menu-pro' );
				}

				$html = ( $license_data->license === 'valid' ) ? "<input type='submit' class='button-secondary rt-licensing-btn danger' name='license_deactivate' value='Deactivate License'/>"
					: "<input type='submit' class='button-secondary rt-licensing-btn button-primary' name='license_activate' value='Activate License'/>";
			}
		} else {
			$message = esc_html__( 'Session Error !!', 'food-menu-pro' );
		}

		$response = [
			'error' => $error,
			'msg'   => $message,
			'html'  => $html,
		];

		wp_send_json( $response );
	}
}
