<?php
/**
 * Template: Carousel 1.
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
	$_product = wc_get_product( $pID );
	$price    = $_product->get_price_html();
	$pType    = $_product->get_type();

	if ( $_product->is_purchasable() ) {
		if ( $_product->is_in_stock() ) {
			ob_start();

			woocommerce_template_loop_add_to_cart();
			$add_to_cart .= apply_filters( 'rtfm_add_to_cart_btn', ob_get_contents(), $pLink, $pID, $pType, $add_to_cart_text, $items );

			ob_end_clean();
		}
	}
} else {
	$price = FnsPro::fmpHtmlPrice( $pID );
}

$class .= ' fmp-item-' . $pID;
?>
<div class="<?php echo esc_attr( $grid . ' ' . $class ); ?>">
	<div class="fmp-layout1 fmp-box-wrapper">
		<?php
		if ( ! empty( $price ) ) {
			?>
			<div class="fmp-price-wrapper">
				<?php
				if ( in_array( 'price', $items ) ) {
					?>
					<span class="fmp-price"><?php echo wp_kses_post( $price ); ?></span>
					<?php
				}
				?>
			</div>
			<?php
		}
		?>
		<div class="fmp-box">
			<?php
			if ( in_array( 'image', $items ) ) {
				$image = Fns::getFeatureImage( $pID, $imgSize, $defaultImgId, $customImgSize, $lazyLoad );
				echo wp_kses_post( $image );
			}
			?>
			<span class="fmp-price"><?php echo wp_kses_post( $price ); ?></span>
			<div class="fmp-title">
				<h3><?php if ( $link ) { ?>
						<a class="<?php echo esc_attr( $anchorClass ); ?>" href="<?php echo esc_url( $pLink ); ?>" data-id="<?php echo absint( $pID ); ?>"><?php echo esc_html( $title ); ?></a>
					<?php
					} else {
						echo esc_html( $title );
					}
					?>
					</h3>
				<div class="fmp-info">
					<?php if ( in_array( 'excerpt', $items ) ) : ?>
						<p><?php echo wp_kses_post( $excerpt ); ?></p>
					<?php endif; ?>
					<?php if ( in_array( 'read_more', $items ) && $link ) : ?>
						<a href="<?php echo esc_url( $pLink ); ?>" data-id="<?php echo esc_attr( $pID ); ?>" class="<?php echo esc_attr( $anchorClass ); ?> fmp-btn-read-more type-2"><?php echo esc_html( $read_more ); ?></a>
					<?php endif; ?>
					<?php
					if ( in_array( 'add_to_cart', $items, true ) ) :
						echo stripslashes_deep( $add_to_cart );
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</div>