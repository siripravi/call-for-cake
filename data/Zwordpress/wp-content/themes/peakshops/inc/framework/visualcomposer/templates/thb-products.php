<?php
function thb_get_product_templates( $template_list ) {
	$template_list['product_01'] = array(
		'name'      => esc_html__( 'Products - 01', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/products/products01.jpg',
		'cat'       => array( 'Products' ),
		'sc'        => '[vc_row][vc_column][thb_title style="style7" title="LARGE SPACING"][thb_product item_count="3" thb_spacing="50" columns="3"][/vc_column][/vc_row]',
	);
	$template_list['product_02'] = array(
		'name'      => esc_html__( 'Products - 02', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/products/products02.jpg',
		'cat'       => array( 'Products' ),
		'sc'        => '[vc_row][vc_column][thb_title style="style7" title="MEDIUM SPACING"][thb_product product_sort="latest-products" columns="4"][/vc_column][/vc_row]',
	);
	$template_list['product_03'] = array(
		'name'      => esc_html__( 'Products - 03', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/products/products03.jpg',
		'cat'       => array( 'Products' ),
		'sc'        => '[vc_row][vc_column][thb_title style="style7" title="SMALL SPACING"][thb_product product_sort="sale-products" thb_spacing="10" columns="4"][/vc_column][/vc_row]',
	);
	$template_list['product_04'] = array(
		'name'      => esc_html__( 'Products - 04', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/products/products04.jpg',
		'cat'       => array( 'Products' ),
		'sc'        => '[vc_row css=".vc_custom_1583431722982{padding-top: 50px !important;}"][vc_column][thb_title style="style7" title="CAROUSEL"][thb_product item_count="8" thb_style="thb-carousel" columns="4" thb_pagination=""][/vc_column][/vc_row]',
	);
	$template_list['product_05'] = array(
		'name'      => esc_html__( 'Products - 05', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/products/products05.jpg',
		'cat'       => array( 'Products', 'Counter' ),
		'sc'        => '[vc_row][vc_column][vc_empty_space height="52px"][thb_title style="style10" title="HOT DEALS" link="url:http%3A%2F%2Fpeakshops.fuelthemes.net%2Fshop%2F|title:Shop%20All||" icon_image="236"][vc_row_inner thb_max_width="" content_placement="middle"][vc_column_inner el_class="text-center" width="1/3"][vc_empty_space mobile_height="0px" height="20px"][vc_column_text]<h2>Winter Sale Up to 40% Off</h2>[/vc_column_text][vc_empty_space height="10px"][thb_countdown date="04/24/2020 12:00:00" offset="-12"][vc_empty_space height="34px"][thb_button color="black" link="url:http%3A%2F%2Fpeakshops.fuelthemes.net%2Fshop%2F|title:View%20All||"][vc_empty_space height="20px"][/vc_column_inner][vc_column_inner width="2/3"][thb_product product_sort="sale-products" thb_style="thb-carousel" columns="3" thb_pagination=""][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]',
	);
	$template_list['product_06'] = array(
		'name'      => esc_html__( 'Products - 06', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/products/products06.jpg',
		'cat'       => array( 'Products' ),
		'sc'        => '[vc_row thb_full_width="true" thb_row_padding="true" thb_column_padding="true" css=".vc_custom_1584432276397{padding-top: 65px !important;padding-bottom: 65px !important;background-color: #e9f6f9 !important;}"][vc_column][thb_title style="style14" title="FEATURED PRODUCTS" description="You can hide so much behind theatrics, and I dont need." title_color="#223a73" description_color="#223a73"][vc_row_inner el_class="align-center"][vc_column_inner width="5/6" offset="vc_col-lg-10 vc_col-md-11 vc_col-xs-12"][thb_hotspots_slider thb_pin_color="pin-accent" animation="animation top-to-bottom" image="656" thb_hotspot_data="%5B%7B%22index%22%3A2%2C%22x%22%3A52.79664855072463%2C%22y%22%3A58.253297018348626%2C%22Product%22%3A%5B%5B%22161%22%2C%22Buttoned%20Shoulder%20T-Shirt%20(71236-1)%22%5D%5D%7D%2C%7B%22index%22%3A3%2C%22x%22%3A32.385076992753625%2C%22y%22%3A36.0199254587156%2C%22Product%22%3A%5B%5B%2286%22%2C%22Kit%20Fuzzy%20Tee%20in%20Black%20(72136)%22%5D%5D%7D%5D" thb_bg_color="#e9f6f9"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]',
	);
	$template_list['product_07'] = array(
		'name'      => esc_html__( 'Products - 07', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/products/products07.jpg',
		'cat'       => array( 'Products' ),
		'sc'        => '[vc_row][vc_column width="1/3"][thb_product_list item_count="7" title="Best Sellers Products"][/vc_column][vc_column width="1/3"][thb_product_list product_sort="top-rated" item_count="7" title="Top Rated Products"][/vc_column][vc_column width="1/3"][thb_product_list product_sort="latest-products" item_count="7" title="Latest Products"][/vc_column][/vc_row]',
	);

	$template_list['product_08'] = array(
		'name'      => esc_html__( 'Products - 08', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/products/products08.jpg',
		'cat'       => array( 'Products' ),
		'sc'        => '[vc_row][vc_column][vc_empty_space mobile_height="22px" height="70px"][thb_title style="style12" title="BEST SELLERS" link="url:https%3A%2F%2Fpeakshops.fuelthemes.net%2Fpeakshops-organicmarket%2Fshop%2F|title:Shop%20All%20Products||" description="Shop from a single store or combine items from multiple merchants." title_color="#074e37" description_color="#074e37"][thb_product columns="4"][/vc_column][/vc_row]',
	);

	$template_list['product_09'] = array(
		'name'      => esc_html__( 'Products - 09', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/products/products09.jpg',
		'cat'       => array( 'Products' ),
		'sc'        => '[vc_row][vc_column][thb_title style="style12" title="WEEKLY DEALS" link="|||" title_color="#074e37" description_color="#074e37"][/vc_column][/vc_row][vc_row][vc_column width="1/4"][thb_image retina="retina_size" image="705" img_link="url:https%3A%2F%2Fpeakshops.fuelthemes.net%2Fpeakshops-organicmarket%2Fshop%2F|title:Shop||"][/thb_image][/vc_column][vc_column width="3/4"][thb_product thb_spacing="10" thb_style="thb-carousel" columns="3" thb_navigation=""][/vc_column][/vc_row][vc_row]',
	);

	$template_list['product_10'] = array(
		'name'      => esc_html__( 'Products - 10', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/products/products10.jpg',
		'cat'       => array( 'Products' ),
		'sc'        => '[vc_row][vc_column][vc_empty_space mobile_height="40px" height="100px"][thb_title style="style13" title="New Arrivals: Best Sellers" description="Shop women’s clothing best sellers at Pandora. Enjoy free shipping on all orders." title_color="#0a294c"][thb_product product_sort="latest-products" item_count="8" columns="4" thb_pagination=""][vc_empty_space mobile_height="30px" height="90px"][/vc_column][/vc_row]',
	);

	$template_list['product_11'] = array(
		'name'      => esc_html__( 'Products - 11', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/products/products11.jpg',
		'cat'       => array( 'Products' ),
		'sc'        => '[vc_row][vc_column][vc_empty_space][thb_title style="style10" icon="ecommerce_sale.svg" title="WEEKLY DEALS" link="url:http%3A%2F%2Fpeakshops.fuelthemes.net/peakshops-ppe%2Fshop%2F|title:Shop%20All||"][vc_row_inner thb_max_width="" content_placement="middle"][vc_column_inner el_class="text-center" width="1/3" css=".vc_custom_1591180727762{padding-top: 20px !important;padding-bottom: 20px !important;background-color: #e2edf1 !important;}" thb_border_radius="3px"][thb_image retina="retina_size" alignment="aligncenter" image="731"][/thb_image][vc_empty_space mobile_height="0px" height="20px"][vc_column_text]<h2 style="line-height: 1.2;"><span style="font-weight: 400;">Winter Sale</span>Up to 40% Off</h2>[/vc_column_text][vc_empty_space height="14px"][thb_button color="black" link="url:http%3A%2F%2Fpeakshops.fuelthemes.net/peakshops-ppe%2Fshop%2F|title:View%20All||"][/vc_column_inner][vc_column_inner width="2/3"][thb_product product_sort="sale-products" thb_style="thb-carousel" columns="3" thb_pagination="" thb_navigation=""][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]',
	);
	return $template_list;
}
