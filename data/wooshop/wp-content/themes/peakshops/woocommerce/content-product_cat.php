<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
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
 * @version 4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $woocommerce_loop;

$shop_product_listing_layout = ot_get_option( 'shop_product_listing_layout', 'style1' );
$products_per_row_get        = filter_input( INPUT_GET, 'products_per_row', FILTER_SANITIZE_STRING );

if ( is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy() ) {
	if ( in_array( $shop_product_listing_layout, array( 'style2', 'style3', 'style4', 'style5', 'style6', 'style7', 'style8' ), true ) ) {
		$columns = thb_get_product_size( $shop_product_listing_layout, $woocommerce_loop['loop'] );
	} else {
		$columns = isset( $products_per_row_get ) ? $products_per_row_get : ot_get_option( 'products_per_row', 'large-3' );
	}
}
$shop_product_category_style_get = filter_input( INPUT_GET, 'shop_product_category_style', FILTER_SANITIZE_STRING );
$shop_product_category_style     = isset( $shop_product_category_style_get ) ? $shop_product_category_style_get : ot_get_option( 'shop_product_category_style', 'style1' );

if ( isset( $thb_shortcode_columns ) ) {
	$shop_product_category_style = $thb_category_style;
	$columns                     = $thb_shortcode_columns;

	set_query_var( 'thb_shortcode_category_style', $shop_product_category_style );

	if ( ! isset( $thb_counts ) || 'true' !== $thb_counts ) {
		remove_filter( 'woocommerce_subcategory_count_html', 'thb_subcategory_count_html', 10 );
		add_filter( 'woocommerce_subcategory_count_html', 'thb_empty_subcategory_count_html', 10, 2 );
	}
}
$classes[] = 'small-6';
$classes[] = isset( $thb_shortcode_columns ) ? '' : 'medium-6';
$classes[] = isset( $columns ) ? $columns : false;
$classes[] = 'columns';
$classes[] = 'thb-category-' . $shop_product_category_style;


?>
<li <?php wc_product_cat_class( $classes, $category ); ?>>
	<?php
	/**
	 * woocommerce_before_subcategory hook.
	 *
	 * @hooked woocommerce_template_loop_category_link_open - 10
	 */
	do_action( 'woocommerce_before_subcategory', $category );
	?>
	<div class="thb-product-category-image">
		<?php
			/**
			 * woocommerce_before_subcategory_title hook.
			 *
			 * @hooked woocommerce_subcategory_thumbnail - 10
			 */
			do_action( 'woocommerce_before_subcategory_title', $category );
		?>
	</div>
	<?php
	/**
	 * woocommerce_shop_loop_subcategory_title hook.
	 *
	 * @hooked woocommerce_template_loop_category_title - 10
	 */
	do_action( 'woocommerce_shop_loop_subcategory_title', $category );

	/**
	 * woocommerce_after_subcategory_title hook.
	 */
	do_action( 'woocommerce_after_subcategory_title', $category );

	/**
	 * woocommerce_after_subcategory hook.
	 *
	 * @hooked woocommerce_template_loop_category_link_close - 10
	 */
	do_action( 'woocommerce_after_subcategory', $category );
	?>
</li>
