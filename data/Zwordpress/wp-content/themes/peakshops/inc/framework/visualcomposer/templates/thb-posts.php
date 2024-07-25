<?php
function thb_get_posts_templates( $template_list ) {
	$template_list['posts_01'] = array(
		'name'      => esc_html__( 'Blog - 01', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/posts/post01.jpg',
		'cat'       => array( 'Blog' ),
		'sc'        => '[vc_row][vc_column][thb_title style="style12" title="Style 1"][thb_post columns="3" source="size:3|post_type:post"][/vc_column][/vc_row]',
	);
	$template_list['posts_02'] = array(
		'name'      => esc_html__( 'Blog - 02', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/posts/post02.jpg',
		'cat'       => array( 'Blog' ),
		'sc'        => '[vc_row][vc_column][thb_title style="style12" title="Style 2"][thb_post style="style2" columns="4" thb_carousel="true" source="size:6|post_type:post"][vc_empty_space height="30px"][/vc_column][/vc_row]',
	);
	$template_list['posts_03'] = array(
		'name'      => esc_html__( 'Blog - 03', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/posts/post03.jpg',
		'cat'       => array( 'Blog' ),
		'sc'        => '[vc_row][vc_column][thb_title style="style12" title="Style 3"][thb_post style="style3" columns="3" source="size:3|post_type:post|categories:39,30"][/vc_column][/vc_row]',
	);
	$template_list['posts_04'] = array(
		'name'      => esc_html__( 'Blog - 04', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/posts/post04.jpg',
		'cat'       => array( 'Blog' ),
		'sc'        => '[vc_row][vc_column][thb_title style="style12" title="Style 4"][thb_post style="style4" columns="3" source="size:3|order_by:rand|post_type:post|categories:25"][/vc_column][/vc_row]',
	);
	$template_list['posts_05'] = array(
		'name'      => esc_html__( 'Blog - 05', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/posts/post05.jpg',
		'cat'       => array( 'Blog' ),
		'sc'        => '[vc_row][vc_column][thb_title style="style11" title="HOW TO GUIDES" link="url:http%3A%2F%2Fpeakshops.fuelthemes.net%2Fpeakshops-garage%2Fblog%2F|title:SEE%20ALL%20GUIDES||" description="Attention to detail is of utmost importance when you want to look good."][/vc_column][/vc_row][vc_row][vc_column][thb_post style="style5" columns="2" source="size:2|post_type:post"][/vc_column][/vc_row]',
	);
	$template_list['posts_06'] = array(
		'name'      => esc_html__( 'Blog - 06', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/posts/post06.jpg',
		'cat'       => array( 'Blog' ),
		'sc'        => '[vc_row][vc_column][vc_empty_space mobile_height="32px" height="76px"][thb_title style="style12" title="DELICIOUS RECIPES" link="|||" title_color="#074e37" description_color="#074e37"][thb_post style="style5" columns="3" thb_carousel="true" thb_cat="" thb_date="" source="size:3|post_type:post"][vc_empty_space mobile_height="32px" height="70px"][/vc_column][/vc_row]',
	);
	$template_list['posts_07'] = array(
		'name'      => esc_html__( 'Blog - 07', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/posts/post07.jpg',
		'cat'       => array( 'Blog' ),
		'sc'        => '[vc_row][vc_column][vc_empty_space mobile_height="30px" height="90px"][thb_slidetype slide_text="<h3>*THE LATEST <strong>FASHION NEWS</strong>*</h3>" style="style2" thb_animated_color="#0a294c" extra_class="text-center"][vc_empty_space mobile_height="10px" height="30px"][thb_post columns="3" thb_carousel="true" source="size:3|post_type:post"][vc_empty_space mobile_height="10px" height="40px"][vc_row_inner][vc_column_inner el_class="text-center"][thb_button border_radius="no-radius" link="url:https%3A%2F%2Fpeakshops.fuelthemes.net%2Fpeakshops-pandora%2Fblog%2F|title:VIEW%20ALL%20POSTS||"][/vc_column_inner][/vc_row_inner][vc_empty_space mobile_height="30px" height="90px"][/vc_column][/vc_row]',
	);
	return $template_list;
}
