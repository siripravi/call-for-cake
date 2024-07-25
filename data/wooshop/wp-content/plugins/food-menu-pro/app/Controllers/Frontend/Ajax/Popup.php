<?php
/**
 * Single Popup Ajax Class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Controllers\Frontend\Ajax;

use RT\FoodMenuPro\Helpers\FnsPro;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Single Popup Ajax Class.
 */
class Popup {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Class Init.
	 *
	 * @return void
	 */
	protected function init() {
		\add_action( 'wp_ajax_fmp_ajax', [ $this, 'response' ] );
		\add_action( 'wp_ajax_nopriv_fmp_ajax', [ $this, 'response' ] );
	}

	/**
	 * Ajax Response.
	 *
	 * @return void
	 */
	public function response() {
		$content = '';

		if ( ! empty( $_REQUEST['id'] ) && $id = absint( $_REQUEST['id'] ) ) {
			global $post;

			$post = get_post( absint( $id ) );
			setup_postdata( $post );

			$ingredient = get_post_meta( $id, '_ingredient_status', true );
			$nutrition  = get_post_meta( $id, '_nutrition_status', true );
			$tabs       = apply_filters( 'fmp_food_menu_tabs', [] );
			ob_start();

			echo "<div class='fmp-wrapper fmp-popup-container fmp-row'>";
			do_action( 'fmp_single_summery' );

			if ( ! empty( $tabs ) ) :
				unset( $tabs['reviews'] );
				?>
				<div class="fmp-tabs-wrapper">
					<ul class="fmp-tabs">
						<?php foreach ( $tabs as $key => $tab ) : ?>
							<li class="<?php echo esc_attr( $key ); ?>_tab" data-id="tab-fmp-<?php echo esc_attr( $key ); ?>">
								<?php echo esc_html( $tab['title'] ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
					<?php foreach ( $tabs as $key => $tab ) : ?>
						<div class="fmp-tab-panel fmp-tab-panel-<?php echo esc_attr( $key ); ?>" id="tab-fmp-<?php echo esc_attr( $key ); ?>">
							<?php call_user_func( $tab['callback'], $key, $tab ); ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif;

			echo '</div>';

			$content = ob_get_clean();
			wp_reset_postdata();
		}

		wp_send_json( [ 'html' => $content ] );

		die();
	}
}
