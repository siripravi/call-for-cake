<?php
/**
 * Template: Layout 5.
 *
 * @package RT_FoodMenuPro
 */

use RT\FoodMenu\Helpers\Fns;
use RT\FoodMenuPro\Helpers\FnsPro;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

$price_box    = null;
$leftWrapper  = null;
$rightWrapper = null;
$priceClass   = null;
$wooClass     = 'product' === $source ? ' woo-template' : null;

if ( $source == 'product' && $wc == true ) {
	$_product    = wc_get_product( $pID );
	$pType       = $_product->get_type();
	$priceClass .= $_product->is_on_sale() ? ' is-sale' : '';

	if ( $pType == 'variable' ) {
		$variations = $_product->get_available_variations();

		if ( ! empty( $variations ) ) {
			foreach ( $variations as $key => $value ) {
				$variation_id            = $value['variation_id'];
				$variable_product        = wc_get_product( $variation_id );
				$variant_attributes_html = null;

				if ( ! empty( $value['attributes'] ) ) {
					foreach ( $value['attributes'] as $attr_key => $attr_value ) {
						$term                     = get_term_by( 'slug', $attr_value, str_replace( 'attribute_', '', $attr_key ) );
						$variant_attributes_html .= sprintf( '<span class="fmp-attr-variation %s">%s</span>', $attr_key, $term ? $term->name : $attr_value );
					}
				}

				$price_box .= sprintf(
					'<div class="fmp-price-box">%s%s%s</div>',
					$variant_attributes_html ? sprintf( '<div class="fmp-attr-variation-wrapper">%s</div>', $variant_attributes_html ) : null,
					in_array( 'price', $items ) ? sprintf( '<span class="fmp-price">%s</span>', $variable_product->get_price_html() ) : null,
					( in_array( 'add_to_cart', $items ) && $variable_product->is_purchasable() && $variable_product->is_in_stock() ) ?
						sprintf(
							'<div class="fmp-box-wrapper">
								<div class="fmp-wc-add-to-cart-wrap">
									<div class="fmp-wc-quantity-wrap">
										<input class="fmp-input-text" type="number" class="input-text qty text" step="1" min="0" name="quantity" value="1" title="Quantity" size="4" pattern="[0-9]*" inputmode="numeric">
										<div class="input-group-btn">
											<span class="quantity-btn quantity-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
											<span class="quantity-btn quantity-minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
										</div>
									</div>
									<a href="%1$s?add-to-cart=%2$d" class="fmp-wc-add-to-cart-btn" data-id="%2$d" data-type="%3$s" data-variation-id="%4$d">%5$s<span></span></a>
								</div>
							</div>',
							$pLink,
							$pID,
							$pType,
							$variation_id,
							esc_html( $add_to_cart_text )
						) : null
				);
			}
		}
	} else {
		$price_box = sprintf(
			'<div class="fmp-price-box%s">%s%s</div>',
			$priceClass,
			in_array( 'price', $items ) ? sprintf( '<span class="fmp-price">%s</span>', $_product->get_price_html() ) : null,
			( in_array( 'add_to_cart', $items ) && $_product->is_purchasable() && $_product->is_in_stock() ) ?
				sprintf(
					'<div class="fmp-box-wrapper">
						<div class="fmp-wc-add-to-cart-wrap">
							<div class="fmp-wc-quantity-wrap">
								<input class="fmp-input-text" type="number" class="input-text qty text" step="1" min="0" name="quantity" value="1" title="Quantity" size="4" pattern="[0-9]*" inputmode="numeric">
								<div class="input-group-btn">
									<span class="quantity-btn quantity-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
									<span class="quantity-btn quantity-minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
								</div>
							</div>
							<a href="%1$s?add-to-cart=%2$d" class="fmp-wc-add-to-cart-btn" data-id="%2$d" data-type="%3$s">%4$s<span></span></a>
						</div>
					</div>',
					$pLink,
					$pID,
					$pType,
					esc_html( $add_to_cart_text )
				) : null
		);
	}
} else {
	$price_box = sprintf(
		'<div class="fmp-price-box">%s</div>',
		in_array( 'price', $items ) ? sprintf( '<span class="fmp-price price">%s</span>', FnsPro::fmpHtmlPrice( $pID ) ) : null
	);
}

$class .= ' fmp-item-' . $pID;
?>
<div class="<?php echo esc_attr( $grid . ' ' . $class ); ?>">
	<div class="fmp-box">
		<div class="fmp-media<?php echo esc_attr( $wooClass ); ?>">
			<?php
			if ( in_array( 'image', $items ) ) {
				$image = Fns::getFeatureImage( $pID, $imgSize, $defaultImgId, $customImgSize );
				if ( $link ) {
					printf(
						'<div class="fmp-image-wrap"><a class="%s fmp-pull-left" href="%s" data-id="%d">%s</a></div>',
						esc_attr( $anchorClass ),
						esc_url( $pLink ),
						absint( $pID ),
						$image
					);
					?>
					<?php
				} else {
					printf( '<span class="fmp-pull-left">%s</span>', $image );
				}
			}

			$leftWrapper  = $source == 'product' ? 'fmp-col-lg-6 fmp-col-md-7' : 'fmp-col-lg-9 fmp-col-md-9';
			$rightWrapper = $source == 'product' ? 'fmp-col-lg-6 fmp-col-md-5' : 'fmp-col-lg-3 fmp-col-md-3';
			?>
			<div class="fmp-media-body">
				<div class="fmp-row">
					<div class="<?php echo esc_attr( $leftWrapper ); ?> fmp-col-sm-12 fmp-col-xs-12 info-part">
						<?php if ( in_array( 'title', $items ) ) : ?>
							<div class="fmp-title">
								<h3>
									<?php if ( $link ) { ?>
										<a class="<?php echo esc_attr( $anchorClass ); ?>" href="<?php echo esc_url( $pLink ); ?>" data-id="<?php echo absint( $pID ); ?>"><?php echo esc_html( $title ); ?></a>
										<?php
									} else {
										echo esc_html( $title );
									}
									?>
								</h3>
							</div>
						<?php endif; ?>

						<?php if ( in_array( 'excerpt', $items ) ) : ?>
							<p><?php echo wp_kses_post( $excerpt ); ?></p>
						<?php endif; ?>

						<?php if ( in_array( 'read_more', $items ) && $link ) : ?>
							<a href="<?php echo esc_url( $pLink ); ?>" data-id="<?php echo esc_attr( $pID ); ?>" class="<?php echo esc_attr( $anchorClass ); ?> fmp-btn-read-more"><?php echo esc_html( $read_more ); ?></a>
						<?php endif; ?>
					</div>
					<div class="<?php echo esc_attr( $rightWrapper ); ?> fmp-col-sm-12 fmp-col-xs-12 no-pad action-part">
						<div class="fmp-price-box-wrap"><?php Fns::print_html( $price_box ); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
