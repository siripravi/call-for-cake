<?php
if ( ! thb_wc_supported() ) {
	return;
}
// Change Category Thumbnail.
function thb_template_loop_category_link_open( $category ) {
	echo '<a href="' . esc_url( get_term_link( $category, 'product_cat' ) ) . '" class="thb-category-link">';
}
remove_action( 'woocommerce_before_subcategory', 'woocommerce_template_loop_category_link_open', 10 );
add_action( 'woocommerce_before_subcategory', 'thb_template_loop_category_link_open', 10 );

function thb_subcategory_count_html( $markup, $category ) {
	$shop_product_category_style_get = filter_input( INPUT_GET, 'shop_product_category_style', FILTER_SANITIZE_STRING );
	$shop_product_category_style     = isset( $shop_product_category_style_get ) ? $shop_product_category_style_get : ot_get_option( 'shop_product_category_style', 'style1' );
	$shop_product_category_style     = get_query_var( 'thb_shortcode_category_style' ) ? get_query_var( 'thb_shortcode_category_style' ) : $shop_product_category_style;
	$text                            = in_array( $shop_product_category_style, array( 'style2', 'style5' ), true ) ? esc_html__( ' items', 'peakshops' ) : '';

	return '<mark class="count">' . esc_html( $category->count ) . $text . '</mark>';
}
add_filter( 'woocommerce_subcategory_count_html', 'thb_subcategory_count_html', 10, 2 );

function thb_empty_subcategory_count_html() {
	return '';
}
