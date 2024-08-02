<?php

/*************************************************
## Shopwise Get options
*************************************************/
function shopwise_ft(){	
	$getft  = isset( $_GET['ft'] ) ? $_GET['ft'] : '';

	return esc_html($getft);
}

/* Load More */
require_once( __DIR__ . '/load-more/load-more.php' );

/* Product Data Tabs*/
require_once( __DIR__ . '/product-data/product-data-video.php' );

/* Image Zoom */
require_once( __DIR__ . '/image-zoom/image-zoom.php' );

/* Product360 View */
if(get_theme_mod('shopwise_shop_single_product360',0) == 1){
	require_once( __DIR__ . '/product360/product360.php' );
}

/* Recently Viewed */
if(get_theme_mod('shopwise_recently_viewed_products',0) == 1){
	require_once( __DIR__ . '/recently-viewed/recently-viewed.php' );
}

/* Single Ajax */
require_once( __DIR__ . '/single-ajax/single-ajax.php' );

/* Min/Max Quantity */
if(get_theme_mod('shopwise_min_max_quantity',0) == 1){
	require_once( __DIR__ . '/minmax-quantity/minmax-quantity.php' );
}

/* Single Products Navigation */
if(get_theme_mod('shopwise_products_navigation',0) == 1){
	require_once( __DIR__ . '/single-products-navigation/single-products-navigation.php' );
}