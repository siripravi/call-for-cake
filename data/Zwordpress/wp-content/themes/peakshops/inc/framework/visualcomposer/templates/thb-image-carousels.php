<?php
function thb_get_imagecarousel_templates( $template_list ) {
	$template_list['imagecarousel_01'] = array(
		'name'      => esc_html__( 'Image Carousel - 01', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/image-carousels/carousel01.jpg',
		'cat'       => array( 'Image-Carousel' ),
		'sc'        => '[vc_row][vc_column][thb_title style="style7" text_align="text-left" title="Equal Heights"][thb_image_slider thb_columns="small-12 medium-3" lightbox="mfp-gallery" thb_equal_height="true" autoplay="true" images="527,528,529,530,531,532"][/vc_column][/vc_row]',
	);
	$template_list['imagecarousel_02'] = array(
		'name'      => esc_html__( 'Image Carousel - 02', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/image-carousels/carousel02.jpg',
		'cat'       => array( 'Image-Carousel' ),
		'sc'        => '[vc_row css=".vc_custom_1582910661582{padding-top: 6vh !important;}"][vc_column][thb_title style="style7" text_align="text-left" title="Vertically Centered"][thb_image_slider thb_columns="small-12 medium-4" thb_center="true" thb_navigation="true" images="39,519,495,418,526"][/vc_column][/vc_row]',
	);
	return $template_list;
}
