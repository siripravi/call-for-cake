<?php
if ( ! thb_wc_supported() ) {
	return;
}
// Product Badge.
function thb_product_badge() {
	global $product;
	$badge_style = ot_get_option( 'shop_product_listing_tag', 'style1' );
	if ( ! $product->is_in_stock() ) {
		echo '<span class="badge out-of-stock ' . esc_attr( $badge_style ) . '"><span>' . esc_html__( 'Out of Stock', 'peakshops' ) . '</span></span>';
	} else {
		if ( $product->is_on_sale() ) {
			if ( 'discount_amount' === ot_get_option( 'shop_sale_badge', 'text' ) ) {
				$discount = '';

				if ( 'variable' === $product->get_type() ) {

					$available_variations = $product->get_variation_prices();
					$max_discount         = 0;

					foreach ( $available_variations['regular_price'] as $key => $regular_price ) {
						$sale_price = $available_variations['sale_price'][ $key ];

						if ( $sale_price < $regular_price ) {
							$discount = round( $regular_price - $sale_price );

							if ( $discount > $max_discount ) {
								$max_discount = $discount;
							}
						}
					}
					$discount = $max_discount;
				} elseif ( ( $product->get_type() === 'simple' || $product->get_type() === 'external' ) ) {
					$discount = round( $product->get_regular_price() - $product->get_sale_price() );
				}

				if ( $discount ) {
					echo '<span class="badge onsale perc thb-sale-ammount ' . esc_attr( $badge_style ) . '"><span>&darr; ' . wc_price( $discount ) . '</span></span>';
				} else {
					echo '<span class="badge onsale perc thb-sale-ammount ' . esc_attr( $badge_style ) . '"><span>&darr; ' . esc_html__( 'Sale', 'peakshops' ) . '</span></span>';
				}
			} elseif ( 'discount' === ot_get_option( 'shop_sale_badge', 'text' ) ) {

				$percentage = '';

				if ( 'variable' === $product->get_type() ) {

					$available_variations = $product->get_variation_prices();
					$max_percentage       = 0;

					foreach ( $available_variations['regular_price'] as $key => $regular_price ) {
						$sale_price = $available_variations['sale_price'][ $key ];

						if ( $sale_price < $regular_price ) {
							$percentage = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );

							if ( $percentage > $max_percentage ) {
								$max_percentage = $percentage;
							}
						}
					}
					$percentage = $max_percentage;
				} elseif ( ( $product->get_type() === 'simple' || $product->get_type() === 'external' ) ) {
					$percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
				}

				if ( $percentage ) {
					echo '<span class="badge onsale perc ' . esc_attr( $badge_style ) . '"><span>&darr; ' . esc_html( $percentage ) . '%</span></span>';
				} else {
					echo '<span class="badge onsale perc ' . esc_attr( $badge_style ) . '"><span>&darr; ' . esc_html__( 'Sale', 'peakshops' ) . '</span></span>';
				}
			} else {
				echo '<span class="badge onsale ' . esc_attr( $badge_style ) . '"><span>' . esc_html__( 'On Sale!', 'peakshops' ) . '</span></span>';
			}
		}
		if ( 'on' === ot_get_option( 'shop_new_badge', 'on' ) ) {
			$postdate      = get_the_time( 'Y-m-d' );           // Post date
			$postdatestamp = strtotime( $postdate );            // Timestamped post date
			$newness       = ot_get_option( 'shop_newness', 7 );
			if ( ( time() - ( 60 * 60 * 24 * $newness ) ) < $postdatestamp ) { // If the product was published within the newness time frame
				echo '<span class="badge new ' . esc_attr( $badge_style ) . '"><span>' . esc_html__( 'New', 'peakshops' ) . '</span></span>';
			}
		}
	}
}

// Wishlist.
function thb_wishlist_button( $singular = false ) {
	if ( class_exists( 'YITH_WCWL' ) ) {

		global $product;
		$url               = YITH_WCWL()->get_wishlist_url();
		$product_type      = $product->get_type();
		$default_wishlists = is_user_logged_in() ? YITH_WCWL()->get_wishlists( array( 'is_default' => true ) ) : false;

		if ( ! empty( $default_wishlists ) ) {
			$default_wishlist = $default_wishlists[0]['ID'];
		} else {
			$default_wishlist = false;
		}

		$exists  = YITH_WCWL()->is_product_in_wishlist( $product->get_id(), $default_wishlist );
		$classes = get_option( 'yith_wcwl_use_button' ) === 'yes' ? 'add_to_wishlist single_add_to_wishlist button alt' : 'add_to_wishlist';

		?>
		<div class="
		<?php
		if ( ! $singular ) {
			?>
			thb-product-icon<?php } ?> yith-wcwl-add-to-wishlist add-to-wishlist-<?php echo esc_attr( $product->get_id() ); ?> <?php echo esc_attr( $exists ? 'exists' : '' ); ?>">
			<div class="yith-wcwl-add-button" style="display: <?php echo esc_attr( $exists ? 'none' : 'block' ); ?>">
				<a href="<?php echo esc_url( add_query_arg( 'add_to_wishlist', $product->get_id() ) ); ?>"
					data-product-id="<?php echo esc_attr( $product->get_id() ); ?>"
					data-product-type="<?php echo esc_attr( $product_type ); ?>"
					class="<?php echo esc_attr( $classes ); ?>">
					<span class="
					<?php
					if ( ! $singular ) {
						?>
						thb-icon-<?php } ?>text"><?php echo esc_html__( 'Add To Wishlist', 'peakshops' ); ?></span><i class="thb-icon-favorite"></i>
				</a>
			</div>
			<div class="yith-wcwl-wishlistexistsbrowse">
				<a href="<?php echo esc_url( $url ); ?>">
					<span class="
					<?php
					if ( ! $singular ) {
						?>
						thb-icon-<?php } ?>text"><?php echo esc_html__( 'View Wishlist', 'peakshops' ); ?></span><i class="thb-icon-heart"></i>
				</a>
			</div>
		</div>
		<?php
	}
}
add_action( 'thb_loop_after_product_image', 'thb_wishlist_button', 38, 1 );

// Wishlist Counts.
function thb_update_wishlist_count() {
	if ( class_exists( 'YITH_WCWL' ) ) {
		wp_send_json( YITH_WCWL()->count_products() );
	}
}
add_action( 'wp_ajax_thb_update_wishlist_count', 'thb_update_wishlist_count' );
add_action( 'wp_ajax_nopriv_thb_update_wishlist_count', 'thb_update_wishlist_count' );


// Wishlist Page Responsive:
add_filter( 'yith_wcwl_is_wishlist_responsive', '__return_false' );

// Quick View.
function thb_quickview_button() {
	if ( 'on' !== ot_get_option( 'shop_product_quickview', 'on' ) ) {
		return;
	}
	global $product;
	?>
	<div class="thb-product-icon thb-quick-view" data-id="<?php echo esc_attr( $product->get_id() ); ?>">
		<span class="thb-icon-text"><?php echo esc_html__( 'Quick View', 'peakshops' ); ?></span>
		<i class="thb-icon-eye"></i>
	</div>
	<?php
}
add_action( 'thb_loop_after_product_image', 'thb_quickview_button', 39 );

// Mini Cart Buttons.
remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );

add_action( 'woocommerce_widget_shopping_cart_buttons', 'thb_woocommerce_widget_shopping_cart_button_view_cart', 10 );
function thb_woocommerce_widget_shopping_cart_button_view_cart() {
	echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="button style2">' . esc_html__( 'View cart', 'peakshops' ) . '</a>';
}
