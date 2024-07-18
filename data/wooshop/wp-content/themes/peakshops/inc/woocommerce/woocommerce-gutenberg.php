<?php
/**
 * WooCommerce Gutenberg functions
 *
 * @package WordPress
 * @subpackage fifthavenue
 * @since 1.0
 * @version 1.0
 */

function thb_woocommerce_blocks_product_grid_item_html( $html, $data, $product ) {
	$out = '';
	ob_start();
	$html = "<li class=\"wc-block-grid__product product\">
				<div class=\"thb-product-inner-wrapper\">
					{$data->badge}
					<figure class=\"product-thumbnail\">
						<a href=\"{$data->permalink}\" class=\"wc-block-grid__product-link thb-product-image-link\">
							{$data->image}
						</a>
					</figure>
					<div class=\"thb-product-inner-content\">
						<h2 class=\"woocommerce-loop-product__title\"><a href=\"{$data->permalink}\">{$data->title}</a></h2>
						{$data->rating}
						{$data->price}
						{$data->button}
					</div>
				</div>
			</li>";

	echo $html;

	$out = ob_get_clean();
	return $html;
}
add_filter( 'woocommerce_blocks_product_grid_item_html', 'thb_woocommerce_blocks_product_grid_item_html', 10, 3 );
