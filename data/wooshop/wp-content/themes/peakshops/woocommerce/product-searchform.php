<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'woocommerce' ); ?></label>
	<input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<?php

	if ( $thb_categories ) {
		$header_search_categories_parent = ot_get_option( 'header_search_categories_parent', 'off' );

		$args = array(
			'name'            => 'product_cat',
			'taxonomy'        => 'product_cat',
			'id'              => 'product_cat_' . ( isset( $index ) ? absint( $index ) : 0 ),
			'class'           => 'thb-category-select',
			'value_field'     => 'slug',
			'show_option_all' => esc_html__( 'All Categories', 'peakshops' ),
		);
		if ( 'on' === $header_search_categories_parent ) {
			$args['parent'] = false;
		}
		wp_dropdown_categories( $args );
	}
	?>
	<button type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>" aria-label="<?php echo esc_attr_e( 'Search', 'peakshops' ); ?>"><?php get_template_part( 'assets/img/svg/search.svg' ); ?></button>
	<input type="hidden" name="post_type" value="product" />
</form>
