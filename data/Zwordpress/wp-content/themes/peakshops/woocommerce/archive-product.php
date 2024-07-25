<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header( 'shop' );
$shop_listing_filter_style_get = filter_input( INPUT_GET, 'shop_listing_filter_style', FILTER_SANITIZE_STRING );
$shop_listing_filter_style     = isset( $shop_listing_filter_style_get ) ? $shop_listing_filter_style_get : ot_get_option( 'shop_listing_filter_style', 'style1' );

wc_get_template_part( 'layouts/archive', $shop_listing_filter_style );

get_footer( 'shop' );
