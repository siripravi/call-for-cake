<?php
/**
 * Template: Layout 1.
 *
 * @package RT_FoodMenuPro
 */

use RT\FoodMenu\Helpers\Fns;
use RT\FoodMenuPro\Helpers\FnsPro;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

$add_to_cart = null;

if ( $source == 'product' && $wc == true ) {
	global $product;
	$product = $_product = wc_get_product( $pID );
	$price   = $_product->get_price_html();
	$pType   = $_product->get_type();

	if ( $_product->is_purchasable() ) {
		if ( $_product->is_in_stock() ) {
			ob_start();

			woocommerce_template_loop_add_to_cart();
			$add_to_cart .= apply_filters( 'rtfm_add_to_cart_btn', ob_get_contents(), $pLink, $pID, $pType, $add_to_cart_text, $items, $popup );

			ob_end_clean();
		}
	}
} else {
	$price = FnsPro::fmpHtmlPrice( $pID );
}

$class .= ' fmp-item-' . $pID;
?>
<div class="<?php echo esc_attr( $grid . ' ' . $class ); ?>">
	<div class="fmp-box-wrapper">
		<div class="fmp-box">
			<div class="fmp-image-wrap">
				<?php
				if ( in_array( 'image', $items ) ) {
					?>
					<a href="<?php echo esc_url( $pLink ); ?>" data-id="<?php echo esc_attr( $pID ); ?>" class="<?php echo esc_attr( $anchorClass ); ?>">
						<?php
						$image = Fns::getFeatureImage( $pID, $imgSize, $defaultImgId, $customImgSize );
						echo wp_kses_post( $image );
						?>
					</a>
					<?php
				}
				?>
			</div>
			<div class="fmp-title">
				<?php
				if ( in_array( 'title', $items ) ) {
					?>
					<h3>
						<?php if ( $link ) { ?>
							<a class="<?php echo esc_attr( $anchorClass ); ?>" href="<?php echo esc_url( $pLink ); ?>" data-id="<?php echo esc_attr( $pID ); ?>"><?php echo esc_html( $title ); ?></a>
							<?php
						} else {
							echo esc_html( $title );
						}
						?>
					</h3>
					<?php
				}
				?>
				<?php
				if ( ! empty( $price ) ) {
					?>
					<div class="fmp-price-wrapper">
						<?php
						if ( in_array( 'price', $items ) ) {
							?>
							<span class="price rt-d-flex"><?php echo wp_kses_post( $price ); ?></span>
							<?php
						}
						?>
					</div>
					<?php
				}
				?>
			</div>
			<div class="fmp-body">
				<?php
				if ( in_array( 'excerpt', $items ) ) {
					?>
					<p><?php echo wp_kses_post( $excerpt ); ?></p>
					<?php
				}
				?>
			</div>
			<div class="fmp-footer">
				<?php
				if ( in_array( 'read_more', $items ) && $link ) {
					?>
					<a href="<?php echo esc_url( $pLink ); ?>" data-id="<?php echo esc_attr( $pID ); ?>" class="<?php echo esc_attr( $anchorClass ); ?> fmp-btn-read-more type-1"><?php echo esc_html( $read_more ); ?></a>
					<?php
				}
				?>
				<?php
				if ( in_array( 'add_to_cart', $items, true ) ) :
					echo stripslashes_deep( $add_to_cart );
				endif;
				?>
			</div>
		</div>
	</div>
</div>
