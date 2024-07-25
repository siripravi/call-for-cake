<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
// Get
$shop_product_listing_layout_get = filter_input( INPUT_GET, 'shop_product_listing_layout', FILTER_SANITIZE_STRING );
$shop_product_listing_get        = filter_input( INPUT_GET, 'shop_product_listing', FILTER_SANITIZE_STRING );
$products_per_row_get            = filter_input( INPUT_GET, 'products_per_row', FILTER_SANITIZE_STRING );

// Settings.
$shop_product_listing_text_alignment = ot_get_option( 'shop_product_listing_text_alignment', 'thb-align-left' );
$shop_product_listing_layout         = isset( $shop_product_listing_layout_get ) ? $shop_product_listing_layout_get : ot_get_option( 'shop_product_listing_layout', 'style1' );
$shop_product_listing                = isset( $shop_product_listing_get ) ? $shop_product_listing_get : ot_get_option( 'shop_product_listing', 'style2' );
$shop_product_listing_button         = ot_get_option( 'shop_product_listing_button', 'style4' );
$shop_product_hover                  = ot_get_option( 'shop_product_hover', 'on' );
$columns                             = isset( $products_per_row_get ) ? $products_per_row_get : ot_get_option( 'products_per_row', 'large-3' );

if ( in_array( $shop_product_listing_layout, array( 'style2', 'style3', 'style4', 'style5', 'style6', 'style7', 'style8' ), true ) && ( is_shop() || is_product_category() || is_product_tag() ) ) {
	$columns = thb_get_product_size( $shop_product_listing_layout, $woocommerce_loop['loop'] );
}
$columns = get_query_var( 'thb_columns' ) ? get_query_var( 'thb_columns' ) : $columns;

$classes[] = 'small-6';
$classes[] = $columns;
$classes[] = 'columns';
$classes[] = 'thb-listing-' . $shop_product_listing;
$classes[] = $shop_product_listing_text_alignment;
$classes[] = 'thb-listing-button-' . $shop_product_listing_button;


?>
<li <?php wc_product_class( $classes, $product ); ?>>
	<div class="thb-product-inner-wrapper">
		<?php
			/**
			 * Hook: woocommerce_before_shop_loop_item.
			 *
			 * @hooked woocommerce_template_loop_product_link_open - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item' );
		?>
		<figure class="product-thumbnail">
			<?php wc_get_template_part( 'layouts/content-product', $shop_product_hover ); ?>
			<?php
				/**
				 * Hook: woocommerce_before_shop_loop_item.
				 *
				 * @hooked woocommerce_template_loop_product_link_open - 10
				 */
				do_action( 'thb_loop_after_product_image' );
			?>
		</figure>
		<div class="thb-product-inner-content">
			<?php

			/**
			 * Hook: woocommerce_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action( 'woocommerce_shop_loop_item_title' );
			/**
			 * Hook: woocommerce_after_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
			/**
			 * Hook: woocommerce_after_shop_loop_item.
			 *
			 * @hooked woocommerce_template_loop_product_link_close - 5
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item' );
			?>
		</div>
	</div>
</li>
