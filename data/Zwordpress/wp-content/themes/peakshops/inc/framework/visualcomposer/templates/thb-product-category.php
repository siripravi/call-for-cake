<?php
function thb_get_productcategory_templates( $template_list ) {
	$template_list['productcategory_01'] = array(
		'name'      => esc_html__( 'Product Category - 01', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/product-category/category01.jpg',
		'cat'       => array( 'Product-Category' ),
		'sc'        => '[vc_row][vc_column][thb_title style="style7" title="Style 1"][vc_empty_space height="8px"][thb_product_categories cat="jacket,knitwear,leggings,sweat" columns="4"][/vc_column][/vc_row]',
	);
	$template_list['productcategory_02'] = array(
		'name'      => esc_html__( 'Product Category - 02', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/product-category/category02.jpg',
		'cat'       => array( 'Product-Category' ),
		'sc'        => '[vc_row][vc_column][thb_title style="style7" title="Style 2"][vc_empty_space height="8px"][thb_product_categories cat="swimwear,topcoats,trousers,wallet" category_style="style2" columns="4"][/vc_column][/vc_row]',
	);
	$template_list['productcategory_03'] = array(
		'name'      => esc_html__( 'Product Category - 03', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/product-category/category03.jpg',
		'cat'       => array( 'Product-Category' ),
		'sc'        => '[vc_row][vc_column][thb_title style="style7" title="Style 3"][vc_empty_space height="8px"][thb_product_categories cat="jacket,knitwear,leggings,sweat,swimwear,topcoats,trousers,wallet" category_style="style3" thb_style="thb-carousel" columns="3"][/vc_column][/vc_row]',
	);
	$template_list['productcategory_04'] = array(
		'name'      => esc_html__( 'Product Category - 04', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/product-category/category04.jpg',
		'cat'       => array( 'Product-Category' ),
		'sc'        => '[vc_row css=".vc_custom_1583231753044{padding-top: 60px !important;}"][vc_column][thb_title style="style7" title="Style 4"][vc_empty_space height="8px"][thb_product_categories cat="jacket,swimwear,topcoats,trousers,wallet" category_style="style4" columns="5"][/vc_column][/vc_row]',
	);
	$template_list['productcategory_05'] = array(
		'name'      => esc_html__( 'Product Category - 05', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/product-category/category05.jpg',
		'cat'       => array( 'Product-Category' ),
		'sc'        => '[vc_row][vc_column][thb_title style="style7" title="Style 5"][vc_empty_space height="8px"][thb_product_categories cat="knitwear,leggings,sweat,topcoats" category_style="style5" columns="4"][/vc_column][/vc_row]',
	);
	$template_list['productcategory_06'] = array(
		'name'      => esc_html__( 'Product Category - 06', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/product-category/category06.jpg',
		'cat'       => array( 'Product-Category' ),
		'sc'        => '[vc_row][vc_column][vc_empty_space height="8px"][thb_title style="style7" title="Style 6"][vc_empty_space height="8px"][thb_product_categories cat="knitwear,sweat,topcoats,trousers,wallet" category_style="style6" columns="5"][/vc_column][/vc_row]',
	);
	$template_list['productcategory_07'] = array(
		'name'      => esc_html__( 'Product Category - 07', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/product-category/category07.jpg',
		'cat'       => array( 'Product-Category' ),
		'sc'        => '[vc_row][vc_column][vc_empty_space height="16px"][thb_title style="style7" title="Style 7"][vc_empty_space height="8px"][thb_product_categories cat="jacket,knitwear,leggings,sweat,swimwear,topcoats,trousers,wallet" category_style="style7" thb_style="thb-carousel" columns="5"][/vc_column][/vc_row]',
	);
	$template_list['productcategory_08'] = array(
		'name'      => esc_html__( 'Product Category - 08', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/product-category/category08.jpg',
		'cat'       => array( 'Product-Category' ),
		'sc'        => '[vc_row][vc_column][vc_empty_space mobile_height="16px" height="46px"][thb_title style="style12" title="SHOP BY CATEGORIES" link="url:https%3A%2F%2Fpeakshops.fuelthemes.net%2Fpeakshops-organicmarket%2Fshop%2F|title:Shop%20All%20Products||" description="Shop from a single store or combine items from multiple merchants." title_color="#074e37" description_color="#074e37"][thb_product_categories cat="bakery,fruits,healthy,seafood,vegetables" thb_orderby="menu_order" category_style="style6" category_counts="" columns="5"][/vc_column][/vc_row]',
	);
	return $template_list;
}
