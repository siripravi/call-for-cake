<?php
/*======
*
* Kirki Settings
*
======*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_config(
	'shopwise_customizer', array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	)
);

/*======
*
* Sections
*
======*/
$sections = array(
	'shop_settings' => array (
		esc_attr__( 'Shop Settings', 'shopwise' ),
		esc_attr__( 'You can customize the shop settings.', 'shopwise' ),
	),
	
	'blog_settings' => array (
		esc_attr__( 'Blog Settings', 'shopwise' ),
		esc_attr__( 'You can customize the blog settings.', 'shopwise' ),
	),

	'header_settings' => array (
		esc_attr__( 'Header Settings', 'shopwise' ),
		esc_attr__( 'You can customize the header settings.', 'shopwise' ),
	),

	'main_color' => array (
		esc_attr__( 'Main Color', 'shopwise' ),
		esc_attr__( 'You can customize the main color.', 'shopwise' ),
	),
	
	'elementor_templates' => array (
		esc_attr__( 'Elementor Templates', 'shopwise-core' ),
		esc_attr__( 'You can customize the elementor templates.', 'shopwise-core' ),
	),
	
	'map_settings' => array (
		esc_attr__( 'Map Settings', 'shopwise' ),
		esc_attr__( 'You can customize the map settings.', 'shopwise' ),
	),

	'footer_settings' => array (
		esc_attr__( 'Footer Settings', 'shopwise' ),
		esc_attr__( 'You can customize the footer settings.', 'shopwise' ),
	),
	
	'shopwise_widgets' => array (
		esc_attr__( 'Shopwise Widgets', 'shopwise' ),
		esc_attr__( 'You can customize the shopwise widgets.', 'shopwise' ),
	),

);

foreach ( $sections as $section_id => $section ) {
	$section_args = array(
		'title' => $section[0],
		'description' => $section[1],
	);

	if ( isset( $section[2] ) ) {
		$section_args['type'] = $section[2];
	}

	if( $section_id == "colors" ) {
		Kirki::add_section( str_replace( '-', '_', $section_id ), $section_args );
	} else {
		Kirki::add_section( 'shopwise_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
	}
}


/*======
*
* Fields
*
======*/
function shopwise_customizer_add_field ( $args ) {
	Kirki::add_field(
		'shopwise_customizer',
		$args
	);
}

	/*====== Shop ======*/
		/*====== Shop Panels ======*/
		Kirki::add_panel (
			'shopwise_shop_panel',
			array(
				'title' => esc_html__( 'Shop Settings', 'shopwise' ),
				'description' => esc_html__( 'You can customize the shop from this panel.', 'shopwise' ),
			)
		);

		$sections = array (
			'shop_general' => array(
				esc_attr__( 'General', 'shopwise' ),
				esc_attr__( 'You can customize shop settings.', 'shopwise' )
			),
			
			'single_product' => array(
				esc_attr__( 'Single Product', 'shopwise' ),
				esc_attr__( 'You can customize shop single settings.', 'shopwise' )
			),
			
			'testimonial_slider_widget' => array(
				esc_attr__( 'Testimonial Slider Widget', 'shopwise' ),
				esc_attr__( 'When you add the Testimonial Slider Widget in Dashboard > Appearance > Widgets, you can customize the settings from there.', 'shopwise' )
			),
			
			'mobile_menu_style' => array(
				esc_attr__( 'Mobile Bottom Menu Style ', 'shopwise-core' ),
				esc_attr__( 'You can customize the mobile menu.', 'shopwise-core' )
			),

		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'shopwise_shop_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'shopwise_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}
		
		/*====== Shop Layouts ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'shopwise_product_type',
				'label' => esc_attr__( 'Product Type', 'shopwise' ),
				'description' => esc_attr__( 'You can choose a type for the products.', 'shopwise' ),
				'section' => 'shopwise_shop_general_section',
				'default' => 'type1',
				'choices' => array(
					'type1' => esc_attr__( 'Type 1', 'shopwise' ),
					'type2' => esc_attr__( 'Type 2', 'shopwise' ),
					'type3' => esc_attr__( 'Type 3', 'shopwise' ),
				),
			)
		);
		
		/*====== Shop Layouts ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'shopwise_shop_layout',
				'label' => esc_attr__( 'Layout', 'shopwise' ),
				'description' => esc_attr__( 'You can choose a layout for the shop.', 'shopwise' ),
				'section' => 'shopwise_shop_general_section',
				'default' => 'left-sidebar',
				'choices' => array(
					'left-sidebar' => esc_attr__( 'Left Sidebar', 'shopwise' ),
					'full-width' => esc_attr__( 'Full Width', 'shopwise' ),
					'right-sidebar' => esc_attr__( 'Right Sidebar', 'shopwise' ),
				),
			)
		);
		
		/*====== View Type ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'shopwise_view_type',
				'label' => esc_attr__( 'Default View', 'shopwise' ),
				'description' => esc_attr__( 'You can choose a view type for the shop page.', 'shopwise' ),
				'section' => 'shopwise_shop_general_section',
				'default' => 'grid-view',
				'choices' => array(
					'grid-view' => esc_attr__( 'Grid View', 'shopwise' ),
					'list-view' => esc_attr__( 'List view', 'shopwise' ),
				),
			)
		);
		
		/*====== Pagination Type ======*/
		shopwise_customizer_add_field(
			array (
			'type'        => 'radio-buttonset',
			'settings'    => 'shopwise_paginate_type',
			'label'       => esc_html__( 'Pagination Type', 'shopwise' ),
			'section'     => 'shopwise_shop_general_section',
			'default'     => 'default',
			'priority'    => 10,
			'choices'     => array(
				'default' => esc_attr__( 'Default', 'shopwise' ),
				'loadmore' => esc_attr__( 'Load More', 'shopwise' ),
				'infinite' => esc_attr__( 'Infinite', 'shopwise' ),
			),
			) 
		);
		
		/*====== Breadcrumb Toggle ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_shop_breadcrumb',
				'label' => esc_attr__( 'Breadcrumb', 'shopwise' ),
				'description' => esc_attr__( 'Disable or Enable breadcrumb on shop pages.', 'shopwise' ),
				'section' => 'shopwise_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Breadcrumb Text ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'shopwise_breadcrumb_title',
				'label' => esc_attr__( 'Breadcrumb Title', 'shopwise' ),
				'description' => esc_attr__( 'You can set a title for the breadcrumb..', 'shopwise' ),
				'section' => 'shopwise_shop_general_section',
				'default' => 'Products',
				'required' => array(
					array(
					  'setting'  => 'shopwise_shop_breadcrumb',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Cart Toggle ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_header_cart',
				'label' => esc_attr__( 'Header Cart', 'shopwise' ),
				'description' => esc_attr__( 'You can choose status of the mini cart on the header.', 'shopwise' ),
				'section' => 'shopwise_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Search Button Toggle ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_header_search_button',
				'label' => esc_attr__( 'Header Search Button', 'shopwise' ),
				'description' => esc_attr__( 'You can choose status of the search button on the header.', 'shopwise' ),
				'section' => 'shopwise_shop_general_section',
				'default' => '0',
			)
		);
		
		
		/*====== Gris-List View Toggle ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_grid_list_view',
				'label' => esc_attr__( 'Grid-List View', 'shopwise' ),
				'description' => esc_attr__( 'You can choose status of the product view button on the shop page.', 'shopwise' ),
				'section' => 'shopwise_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Quick View Toggle ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_quick_view_button',
				'label' => esc_attr__( 'Quick View Button', 'shopwise' ),
				'description' => esc_attr__( 'You can choose status of the quick view button.', 'shopwise' ),
				'section' => 'shopwise_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Wishlist Toggle ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_wishlist_button',
				'label' => esc_attr__( 'Custom Wishlist Button', 'shopwise' ),
				'description' => esc_attr__( 'You can choose status of the wishlist button.', 'shopwise' ),
				'section' => 'shopwise_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Compare Toggle ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_compare_button',
				'label' => esc_attr__( 'Custom Compare Button', 'shopwise' ),
				'description' => esc_attr__( 'You can choose status of the compare button.', 'shopwise' ),
				'section' => 'shopwise_shop_general_section',
				'default' => '0',
			)
		);
	
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_mobile_bottom_menu',
				'label' => esc_attr__( 'Mobile Bottom Menu', 'shopwise' ),
				'description' => esc_attr__( 'Disable or Enable the bottom menu on mobile.', 'shopwise' ),
				'section' => 'shopwise_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Mobile Bottom Menu Edit Toggle======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_mobile_bottom_menu_edit_toggle',
				'label' => esc_attr__( 'Mobile Bottom Menu Edit', 'shopwise-core' ),
				'description' => esc_attr__( 'Edit the mobile bottom menu.', 'shopwise-core' ),
				'section' => 'shopwise_shop_general_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'shopwise_mobile_bottom_menu',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
				
			)
			
		);
		
		/*====== Mobile Menu Repeater ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'repeater',
				'settings' => 'shopwise_mobile_bottom_menu_edit',
				'label' => esc_attr__( '', 'shopwise-core' ),
				'description' => esc_attr__( '', 'shopwise-core' ),
				'section' => 'shopwise_shop_general_section',
				'required' => array(
					array(
					  'setting'  => 'shopwise_mobile_bottom_menu_edit_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
				'fields' => array(
					'mobile_menu_type' => array(
						'type' => 'select',
						'label' => esc_attr__( 'Select Type', 'shopwise-core' ),
						'description' => esc_attr__( 'You can select a type', 'shopwise-core' ),
						'default' => 'default',
						'choices' => array(
							'default' 	=> esc_attr__( 'Default', 'shopwise-core' ),
							'Home'		=> esc_attr__( 'Home', 'shopwise-core' ),
							'Shop' 		=> esc_attr__( 'Shop', 'shopwise-core' ),
							'Category' 	=> esc_attr__( 'Category', 'shopwise-core' ),
							'Cart' 		=> esc_attr__( 'Cart', 'shopwise-core' ),
							'Myaccount' => esc_attr__( 'Myaccount', 'shopwise-core' ),
						),
					),
				
					'mobile_menu_icon' => array(
						'type' 			=> 'text',
						'label' 		=> esc_attr__( 'Icon', 'shopwise-core' ),
						'description' 	=> esc_attr__( 'You can set an icon. for example; "ion-ios-cart"', 'shopwise-core' ),
					),

					'mobile_menu_url' => array(
						'type'			=> 'text',
						'label' 		=> esc_attr__( 'URL', 'shopwise-core' ),
						'description' 	=> esc_attr__( 'You can set url for the item.', 'shopwise-core' ),
					),
				),
				
			)
		);
		
		/*====== Recently Viewed Products ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_recently_viewed_products',
				'label' => esc_attr__( 'Recently Viewed Products', 'shopwise-core' ),
				'description' => esc_attr__( 'Disable or Enable Recently Viewed Products.', 'shopwise-core' ),
				'section' => 'shopwise_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Product Stock Quantity ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_stock_quantity',
				'label' => esc_attr__( 'Stock Quantity', 'shopwise-core' ),
				'description' => esc_attr__( 'Show stock quantity on the label.', 'shopwise-core' ),
				'section' => 'shopwise_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Product Min/Max Quantity ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_min_max_quantity',
				'label' => esc_attr__( 'Min/Max Quantity', 'shopwise-core' ),
				'description' => esc_attr__( 'Enable the additional quantity setting fields in product detail page.', 'shopwise-core' ),
				'section' => 'shopwise_shop_general_section',
				'default' => '0',
			)
		);


		/*====== Product Image Size ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'shopwise_product_image_size',
				'label' => esc_attr__( 'Product Image Size', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set size of the product image for the shop page.', 'shopwise-core' ),
				'section' => 'shopwise_shop_general_section',
				'default' => array(
					'width' => '',
					'height' => '',
				),
			)
		);
		
		/*====== Shop Single Image Column ======*/
		shopwise_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'shopwise_shop_single_image_column',
				'label'       => esc_html__( 'Image Column', 'shopwise-core' ),
				'section'     => 'shopwise_single_product_section',
				'default'     => 6,
				'transport'   => 'auto',
				'choices'     => [
					'min'  => 3,
					'max'  => 12,
					'step' => 1,
				],
			)
		);
		
		/*====== Shop Single Ajax Add To Cart ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_shop_single_ajax_addtocart',
				'label' => esc_attr__( 'Ajax Add to Cart', 'shopwise-core' ),
				'description' => esc_attr__( 'Disable or Enable ajax add to cart button.', 'shopwise-core' ),
				'section' => 'shopwise_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Shop Products Navigation  ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_products_navigation',
				'label' => esc_attr__( 'Products Navigation', 'shopwise-core' ),
				'section' => 'shopwise_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Shop Single Image Zoom  ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_single_image_zoom',
				'label' => esc_attr__( 'Image Zoom', 'shopwise-core' ),
				'description' => esc_attr__( 'You can choose status of the zoom feature.', 'shopwise-core' ),
				'section' => 'shopwise_single_product_section',
				'default' => '0',
			)
		); 
		
		/*====== Mobile Sticky Single Cart ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_mobile_single_sticky_cart',
				'label' => esc_attr__( 'Mobile Sticky Add to Cart', 'shopwise-core' ),
				'description' => esc_attr__( 'Disable or Enable sticky cart button on mobile.', 'shopwise-core' ),
				'section' => 'shopwise_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Product360 View ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_shop_single_product360',
				'label' => esc_attr__( 'Product360 View', 'shopwise' ),
				'section' => 'shopwise_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Single Social Share ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_shop_social_share',
				'label' => esc_attr__( 'Social Share', 'shopwise' ),
				'description' => esc_attr__( 'Disable or Enable social share buttons.', 'shopwise' ),
				'section' => 'shopwise_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Shop Single Social Share ======*/
		shopwise_customizer_add_field (
			array(
				'type'        => 'multicheck',
				'settings'    => 'shopwise_shop_single_share',
				'section'     => 'shopwise_single_product_section',
				'default'     => array('facebook','twitter', 'pinterest', 'linkedin', 'tumblr'  ),
				'priority'    => 10,
				'choices'     => [
					'facebook'  => esc_html__( 'Facebook', 	'shopwise-core' ),
					'twitter' 	=> esc_html__( 'Twitter', 	'shopwise-core' ),
					'pinterest' => esc_html__( 'Pinterest', 'shopwise-core' ),
					'linkedin'  => esc_html__( 'Linkedin', 	'shopwise-core' ),
					'tumblr'  	=> esc_html__( 'Tumblr', 	'shopwise-core' ),
				],
				'required' => array(
					array(
					  'setting'  => 'shopwise_shop_social_share',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Related By Tags ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_related_by_tags',
				'label' => esc_attr__( 'Related Products with Tags', 'shopwise-core' ),
				'description' => esc_attr__( 'Display the related products by tags.', 'shopwise-core' ),
				'section' => 'shopwise_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Product Related Post Column ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'shopwise_shop_related_post_column',
				'label' => esc_attr__( 'Related Post Column', 'shopwise-core' ),
				'description' => esc_attr__( 'You can control related post column with this option.', 'shopwise-core' ),
				'section' => 'shopwise_single_product_section',
				'default' => '4',
				'choices' => array(
					'5' => esc_attr__( '5 Columns', 'shopwise-core' ),
					'4' => esc_attr__( '4 Columns', 'shopwise-core' ),
					'3' => esc_attr__( '3 Columns', 'shopwise-core' ),
					'2' => esc_attr__( '2 Columns', 'shopwise-core' ),
				),
			)
		);
		
		/*====== Featured List Single ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'repeater',
				'settings' => 'shopwise_featured_listem',
				'label' => esc_attr__( 'Featured List', 'shopwise' ),
				'description' => esc_attr__( 'You can create featured list.', 'shopwise' ),
				'section' => 'shopwise_single_product_section',
				'row_label' => array (
					'type' => 'field',
					'field' => 'link_text',
				),
				'fields' => array(
					'featured_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Featured Icon', 'shopwise' ),
						'description' => esc_attr__( 'You can set a icon.For example; linearicons-bag-dollar.', 'shopwise' ),
					),
				
					'featured_text' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Featured Content', 'shopwise' ),
						'description' => esc_attr__( 'You can enter a text.', 'shopwise' ),
					),
				),
			)
		);
		
		/*======  Mobile Menu Background Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'shopwise_mobile_menu_bg_color',
				'label' => esc_attr__( 'Mobile Menu Background Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a background color.', 'shopwise-core' ),
				'section' => 'shopwise_mobile_menu_style_section',
			)
		);
		
		/*======  Mobile Menu Border Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#edf1f4',
				'settings' => 'shopwise_mobile_menu_border_color',
				'label' => esc_attr__( 'Mobile Menu Border Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a border color.', 'shopwise-core' ),
				'section' => 'shopwise_mobile_menu_style_section',
			)
		);
		
		/*======  Mobile Menu Icon Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#9b9b9b',
				'settings' => 'shopwise_mobile_menu_icon_color',
				'label' => esc_attr__( 'Mobile Menu Icon Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a color.', 'shopwise-core' ),
				'section' => 'shopwise_mobile_menu_style_section',
			)
		);
		
		/*======  Mobile Menu Icon Hover Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#9b9b9b',
				'settings' => 'shopwise_mobile_menu_icon_hvrcolor',
				'label' => esc_attr__( 'Mobile Menu Icon Hover Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a color.', 'shopwise-core' ),
				'section' => 'shopwise_mobile_menu_style_section',
			)
		);
		

	/*====== Blog Settings ======*/
		/*====== Layouts ======*/
		
		shopwise_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'shopwise_blog_layout',
				'label' => esc_attr__( 'Layout', 'shopwise' ),
				'description' => esc_attr__( 'You can choose a layout.', 'shopwise' ),
				'section' => 'shopwise_blog_settings_section',
				'default' => 'right-sidebar',
				'choices' => array(
					'left-sidebar' => esc_attr__( 'Left Sidebar', 'shopwise' ),
					'full-width' => esc_attr__( 'Full Width', 'shopwise' ),
					'right-sidebar' => esc_attr__( 'Right Sidebar', 'shopwise' ),
				),
			)
		);
		
		/*====== Blog Breadcrumb Toggle ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_blog_breadcrumb',
				'label' => esc_attr__( 'Breadcrumb', 'shopwise' ),
				'description' => esc_attr__( 'Disable or Enable breadcrumb on blog pages.', 'shopwise' ),
				'section' => 'shopwise_blog_settings_section',
				'default' => '1',
			)
		);
		
		/*====== Blog Breadcrumb Text ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'shopwise_blog_breadcrumb_title',
				'label' => esc_attr__( 'Breadcrumb Title', 'shopwise' ),
				'description' => esc_attr__( 'You can set a title for the breadcrumb..', 'shopwise' ),
				'section' => 'shopwise_blog_settings_section',
				'default' => 'Our Blog',
				'required' => array(
					array(
					  'setting'  => 'shopwise_blog_breadcrumb',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Main color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#FF324D',
				'settings' => 'shopwise_main_color',
				'label' => esc_attr__( 'Main Color', 'luxe' ),
				'description' => esc_attr__( 'You can customize the main color.', 'luxe' ),
				'section' => 'shopwise_main_color_section',
			)
		);
		
	/*====== Elementor Templates =======================================================*/
		/*====== Before Shop Elementor Templates ======*/
		shopwise_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'shopwise_before_main_shop_elementor_template',
				'label'       => esc_html__( 'Before Shop Elementor Template', 'shopwise-core' ),
				'section'     => 'shopwise_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'shopwise-core' ),
				'choices'     => shopwise_get_elementorTemplates('section'),
			)
		);
		
		/*====== After Shop Elementor Templates ======*/
		shopwise_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'shopwise_after_main_shop_elementor_template',
				'label'       => esc_html__( 'After Shop Elementor Template', 'shopwise-core' ),
				'section'     => 'shopwise_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'shopwise-core' ),
				'choices'     => shopwise_get_elementorTemplates('section'),
			)
		);
		
		/*====== Before Header Elementor Templates ======*/
		shopwise_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'shopwise_before_main_header_elementor_template',
				'label'       => esc_html__( 'Before Header Elementor Template', 'shopwise-core' ),
				'section'     => 'shopwise_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'shopwise-core' ),
				'choices'     => shopwise_get_elementorTemplates('section'),
			)
		);
	
		/*====== After Header Elementor Templates ======*/
		shopwise_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'shopwise_after_main_header_elementor_template',
				'label'       => esc_html__( 'After Header Elementor Template', 'shopwise-core' ),
				'section'     => 'shopwise_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'shopwise-core' ),
				'choices'     => shopwise_get_elementorTemplates('section'),
			)
		);
		
		/*====== Before Footer Elementor Template ======*/
		shopwise_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'shopwise_before_main_footer_elementor_template',
				'label'       => esc_html__( 'Before Footer Elementor Template', 'shopwise-core' ),
				'section'     => 'shopwise_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'shopwise-core' ),
				'choices'     => shopwise_get_elementorTemplates('section'),
			)
		);
		
		/*====== After Footer Elementor  Template ======*/
		shopwise_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'shopwise_after_main_footer_elementor_template',
				'label'       => esc_html__( 'After Footer Elementor Templates', 'shopwise-core' ),
				'section'     => 'shopwise_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'shopwise-core' ),
				'choices'     => shopwise_get_elementorTemplates('section'),
			)
		);

		/*====== Templates Repeater For each category ======*/
		add_action( 'init', function() {
			shopwise_customizer_add_field (
				array(
					'type' => 'repeater',
					'settings' => 'shopwise_elementor_template_each_shop_category',
					'label' => esc_attr__( 'Template For Categories', 'shopwise-core' ),
					'description' => esc_attr__( 'You can set template for each category.', 'shopwise-core' ),
					'section' => 'shopwise_elementor_templates_section',
					'fields' => array(
						
						'category_id' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Select Category', 'shopwise-core' ),
							'description' => esc_html__( 'Set a category', 'shopwise-core' ),
							'priority'    => 10,
							'default'     => '',
							'choices'     => Kirki_Helper::get_terms( array('taxonomy' => 'product_cat') )
						),
						
						'shopwise_before_main_shop_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Shop Elementor Template', 'shopwise-core' ),
							'choices'     => shopwise_get_elementorTemplates('section'),
							'default'     => '',
							'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'shopwise-core' ),
						),
						
						'shopwise_after_main_shop_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Shop Elementor Template', 'shopwise-core' ),
							'choices'     => shopwise_get_elementorTemplates('section'),
						),
						
						'shopwise_before_main_header_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Header Elementor Template', 'shopwise-core' ),
							'choices'     => shopwise_get_elementorTemplates('section'),
						),
						
						'shopwise_after_main_header_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Header Elementor Template', 'shopwise-core' ),
							'choices'     => shopwise_get_elementorTemplates('section'),
						),
						
						'shopwise_before_main_footer_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Footer Elementor Template', 'shopwise-core' ),
							'choices'     => shopwise_get_elementorTemplates('section'),
						),
						
						'shopwise_after_main_footer_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Footer Elementor Template', 'shopwise-core' ),
							'choices'     => shopwise_get_elementorTemplates('section'),
						),
						

					),
				)
			);
		} );

		/*====== Map Settings ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'shopwise_mapapi',
				'label' => esc_attr__( 'Google Map Api key', 'shopwise' ),
				'description' => esc_attr__( 'Add your google map api key', 'shopwise' ),
				'section' => 'shopwise_map_settings_section',
				'default' => '',
			)
		);
		
	/*====== Header ======*/
		/*====== Header Panels ======*/
		Kirki::add_panel (
			'shopwise_header_panel',
			array(
				'title' => esc_html__( 'Header Settings', 'shopwise' ),
				'description' => esc_html__( 'You can customize the header from this panel.', 'shopwise' ),
			)
		);

		$sections = array (
			'header_logo' => array(
				esc_attr__( 'Logo', 'shopwise' ),
				esc_attr__( 'You can customize the logo which is on header..', 'shopwise' )
			),
			
			'header_contact_detail' => array(
				esc_attr__( 'Contact Detail', 'shopwise' ),
				esc_attr__( 'You can customize contact detail which is on top header..', 'shopwise' )
			),
		
			'header_general' => array(
				esc_attr__( 'Header General', 'shopwise' ),
				esc_attr__( 'You can customize the header.', 'shopwise' )
			),
			
			'header_sidebar_menu' => array(
				esc_attr__( 'Header Sidebar Menu', 'shopwise-core' ),
				esc_attr__( 'You can customize the header sidebar style.', 'shopwise-core' )
			),

			'header_color' => array(
				esc_attr__( 'Header Color', 'shopwise-core' ),
				esc_attr__( 'You can customize the header color.', 'shopwise-core' )
			),

			'header_loader' => array(
				esc_attr__( 'Preloader', 'shopwise' ),
				esc_attr__( 'You can customize the loader.', 'shopwise' )
			),
			
			'subscribe_popup' => array(
				esc_attr__( 'Subscribe Popup', 'shopwise' ),
				esc_attr__( 'You can customize the subscribe popup.', 'shopwise' )
			),

		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'shopwise_header_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'shopwise_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}
		
		/*====== Logo ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'shopwise_logo',
				'label' => esc_attr__( 'Logo', 'shopwise' ),
				'description' => esc_attr__( 'You can upload a logo.', 'shopwise' ),
				'section' => 'shopwise_header_logo_section',
				'choices' => array(
					'save_as' => 'id',
				),
			)
		);
		
		/*====== Logo Text ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'shopwise_logo_text',
				'label' => esc_attr__( 'Set Logo Text', 'shopwise' ),
				'description' => esc_attr__( 'You can set logo as text.', 'shopwise' ),
				'section' => 'shopwise_header_logo_section',
				'default' => 'Shopwise',
			)
		);
		
		/*====== Logo Size ======*/
		shopwise_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'shopwise_logo_size',
				'label'       => esc_html__( 'Logo Size', 'shopwise' ),
				'description' => esc_attr__( 'You can set size of the logo.', 'shopwise' ),
				'section'     => 'shopwise_header_logo_section',
				'default'     => 182,
				'priority'    => 30,
				'transport'   => 'auto',
				'choices'     => [
					'min'  => 20,
					'max'  => 300,
					'step' => 1,
				],
				'output' => [
				[
					'element' => '.navbar-brand .logo_dark',
					'property'    => 'width',
					'units' => 'px',
				], ],
			)
		);
		
		
		/*====== Header Contact Text ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'shopwise_header_contact_text',
				'label' => esc_attr__( 'Text', 'shopwise' ),
				'description' => esc_attr__( 'You can set contact details.', 'shopwise' ),
				'section' => 'shopwise_header_contact_detail_section',
				'default' => '',
			)
		);

		/*====== Header Contact Text ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'shopwise_header_contact_text',
				'label' => esc_attr__( 'Text', 'shopwise' ),
				'description' => esc_attr__( 'You can set contact details.', 'shopwise' ),
				'section' => 'shopwise_header_contact_detail_section',
				'default' => '',
			)
		);

		/*====== Header Contact Icon ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'shopwise_header_contact_icon',
				'label' => esc_attr__( 'Icon', 'shopwise' ),
				'description' => esc_attr__( 'You can set contact icon e.g: linearicons-phone-wave .', 'shopwise' ),
				'section' => 'shopwise_header_contact_detail_section',
				'default' => 'linearicons-phone-wave',
			)
		);
		
		/*====== Header Contact URL ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'shopwise_header_contact_url',
				'label' => esc_attr__( 'URL', 'shopwise' ),
				'description' => esc_attr__( 'Add an url.', 'shopwise' ),
				'section' => 'shopwise_header_contact_detail_section',
				'default' => 'tel:1234567689',
			)
		);
		
		shopwise_customizer_add_field(
			array (
			'type'        => 'select',
			'settings'    => 'shopwise_header_type',
			'label'       => esc_html__( 'Header Type', 'shopwise' ),
			'section'     => 'shopwise_header_general_section',
			'default'     => 'type-1',
			'priority'    => 10,
			'choices'     => array(
				'type1' => esc_attr__( 'Type 1', 'shopwise' ),
				'type2' => esc_attr__( 'Type 2', 'shopwise' ),
				'type3' => esc_attr__( 'Type 3', 'shopwise' ),
				'type4' => esc_attr__( 'Type 4', 'shopwise' ),
				'type5' => esc_attr__( 'Type 5', 'shopwise' ),
			),
			) 
		);

		
		/*====== Header Sidebar Menu ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_header_sidebar_menu',
				'label' => esc_attr__( 'Sidebar Menu', 'shopwise' ),
				'description' => esc_attr__( 'You can choose status of the sidebar menu on the cart.', 'shopwise' ),
				'section' => 'shopwise_header_general_section',
				'default' => '0',
			)
		);

		/*====== Header Sidebar Menu Display Item ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'number',
				'settings' => 'shopwise_sidebar_menu_display_item',
				'label' => esc_attr__( 'Display Menu Item', 'shopwise' ),
				'description' => esc_attr__( 'You can set a count for the sidebar menu.', 'shopwise' ),
				'section' => 'shopwise_header_general_section',
				'default' => 11,
				'choices'     => [
					'min'  => 0,
					'max'  => 80,
					'step' => 1,
				],
				'required' => array(
					array(
					  'setting'  => 'shopwise_header_sidebar_menu',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Top Header Toggle ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_top_header',
				'label' => esc_attr__( 'Top Header', 'shopwise' ),
				'description' => esc_attr__( 'Disable or Enable the top header', 'shopwise' ),
				'section' => 'shopwise_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Sidebar Menu Header Style ======*/
		shopwise_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'shopwise_header_sidebar_menu_header_typography',
				'label'       => esc_attr__( 'Sidebar Menu Header Featured Typography', 'shopwise' ),
				'section'     => 'shopwise_header_sidebar_menu_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '16px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.bottom_header .categories_wrap .categories_btn span ',
					],
				],		
			)
		);
		
		/*====== Header Sidebar Menu Background Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#FF324D',
				'settings' => 'shopwise_header_sidebar_menu_bg',
				'label' => esc_attr__( 'Sidebar Menu Background', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a background color.', 'shopwise-core' ),
				'section' => 'shopwise_header_sidebar_menu_section',
			)
		);
		
		/*====== Header Sidebar Menu Border Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#FF324D',
				'settings' => 'shopwise_header_sidebar_menu_border_color',
				'label' => esc_attr__( 'Sidebar Menu Border Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a border color.', 'shopwise-core' ),
				'section' => 'shopwise_header_sidebar_menu_section',
			)
		);
		
		/*====== Header Sidebar Menu Header Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'shopwise_header_sidebar_menu_header_color',
				'label' => esc_attr__( 'Sidebar Menu Header Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a color .', 'shopwise-core' ),
				'section' => 'shopwise_header_sidebar_menu_section',
			)
		);
		
		/*====== Header Sidebar Menu Header Hover Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'shopwise_header_sidebar_menu_header_hvrcolor',
				'label' => esc_attr__( 'Sidebar Menu Header Hover Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a hover color.', 'shopwise-core' ),
				'section' => 'shopwise_header_sidebar_menu_section',
			)
		);
		
		/*====== Header Sidebar Menu Style ======*/
		shopwise_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'shopwise_header_sidebar_menu_typography',
				'label'       => esc_attr__( 'Sidebar Menu Featured Typography', 'shopwise' ),
				'section'     => 'shopwise_header_sidebar_menu_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '14px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '#navCatContent li a span ',
					],
				],		
			)
		);
		
		/*====== Header Sidebar Menu Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'shopwise_header_sidebar_menu_color',
				'label' => esc_attr__( 'Sidebar Menu Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a color .', 'shopwise-core' ),
				'section' => 'shopwise_header_sidebar_menu_section',
			)
		);
		
		/*====== Header Sidebar Menu Hover Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'shopwise_header_sidebar_menu_hvrcolor',
				'label' => esc_attr__( 'Sidebar Menu Hover Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a hover color.', 'shopwise-core' ),
				'section' => 'shopwise_header_sidebar_menu_section',
			)
		);
		
		/*====== Header Sidebar Menu Bottom Style ======*/
		shopwise_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'shopwise_header_sidebar_menu_bottom_typography',
				'label'       => esc_attr__( 'Sidebar Menu Bottom Featured Typography', 'shopwise' ),
				'section'     => 'shopwise_header_sidebar_menu_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '16px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .bottom_header .categories_wrap .more_categories ',
					],
				],		
			)
		);
		
		/*====== Header Sidebar Menu Bottom Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#FF324D',
				'settings' => 'shopwise_header_sidebar_menu_bottom_color',
				'label' => esc_attr__( 'Sidebar Menu Bottom Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a color .', 'shopwise-core' ),
				'section' => 'shopwise_header_sidebar_menu_section',
			)
		);
		
		/*====== Header Sidebar Menu Bottom Hover Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#FF324D',
				'settings' => 'shopwise_header_sidebar_menu_bottom_hvrcolor',
				'label' => esc_attr__( 'Sidebar Menu Hover Bottom Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a hover color.', 'shopwise-core' ),
				'section' => 'shopwise_header_sidebar_menu_section',
			)
		);

		/*====== Header BG color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'shopwise_header_bg',
				'label' => esc_attr__( 'Header Background', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a color for top header background.', 'shopwise-core' ),
				'section' => 'shopwise_header_color_section',
			)
		);
		
		/*====== Header Border color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#dee2e6',
				'settings' => 'shopwise_header_border',
				'label' => esc_attr__( 'Header Border Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a color for top header border.', 'shopwise-core' ),
				'section' => 'shopwise_header_color_section',
			)
		);
		
		/*====== Header Font color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#292b2c',
				'settings' => 'shopwise_header_font_color',
				'label' => esc_attr__( 'Header Font Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a color for header font.', 'shopwise-core' ),
				'section' => 'shopwise_header_color_section',
			)
		);

		/*====== Loader Toggle ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_loader',
				'label' => esc_attr__( 'Disable Loader', 'shopwise' ),
				'description' => esc_attr__( 'Disable or Enable the loader.', 'shopwise' ),
				'section' => 'shopwise_header_loader_section',
				'default' => '0',
			)
		);

		/*====== Loader Image ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'shopwise_loader_image',
				'label' => esc_attr__( 'Image', 'shopwise' ),
				'description' => esc_attr__( 'You can upload an image.', 'shopwise' ),
				'section' => 'shopwise_header_loader_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'required' => array(
					array(
					  'setting'  => 'shopwise_loader',
					  'operator' => '==',
					  'value'    => '0',
					),
				),
			)
		);

		/*====== Subscribe Popup Toggle ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_subscribe_popup',
				'label' => esc_attr__( 'Subscribe Popup', 'shopwise' ),
				'description' => esc_attr__( 'Disable or Enable the subscribe popup.', 'shopwise' ),
				'section' => 'shopwise_subscribe_popup_section',
				'default' => '0',
			)
		);
		
		/*====== Subscribe Popup Image ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'shopwise_subscribe_popup_image',
				'label' => esc_attr__( 'Image', 'shopwise' ),
				'description' => esc_attr__( 'You can upload an image for the popup.', 'shopwise' ),
				'section' => 'shopwise_subscribe_popup_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'required' => array(
					array(
					  'setting'  => 'shopwise_subscribe_popup',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subscribe Popup Title======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'shopwise_subscribe_popup_title',
				'label' => esc_attr__( 'Title', 'shopwise' ),
				'description' => esc_attr__( 'You can set the title for the popup.', 'shopwise' ),
				'section' => 'shopwise_subscribe_popup_section',
				'default' => 'Subscribe Our Newsletter',
				'required' => array(
					array(
					  'setting'  => 'shopwise_subscribe_popup',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subscribe Popup Subtitle======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'shopwise_subscribe_popup_subtitle',
				'label' => esc_attr__( 'Subtitle', 'shopwise' ),
				'description' => esc_attr__( 'You can set the subtitle for the popup.', 'shopwise' ),
				'section' => 'shopwise_subscribe_popup_section',
				'default' => 'Subscribe to the newsletter to receive updates about new products.',
				'required' => array(
					array(
					  'setting'  => 'shopwise_subscribe_popup',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subcribe Popup FORM ID======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'shopwise_subscribe_popup_formid',
				'label' => esc_attr__( 'Subscribe Form Id.', 'shopwise' ),
				'description' => esc_attr__( 'You can find the form id in Dashboard > Mailchimp For Wp > Form.', 'shopwise' ),
				'section' => 'shopwise_subscribe_popup_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'shopwise_subscribe_popup',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
	/*====== Shopwise Widgets ======*/
		/*====== Widgets Panels ======*/
		Kirki::add_panel (
			'shopwise_widgets_panel',
			array(
				'title' => esc_html__( 'Shopwise Widgets', 'shopwise' ),
				'description' => esc_html__( 'You can customize the shopwise widgets.', 'shopwise' ),
			)
		);

		$sections = array (
			'footer_about' => array(
				esc_attr__( 'Footer About', 'shopwise' ),
				esc_attr__( 'You can customize the footer about widget.', 'shopwise' )
			),
		
			'contact_box' => array(
				esc_attr__( 'Contact Box', 'shopwise' ),
				esc_attr__( 'You can customize the contact box widget.', 'shopwise' )
			),
		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'shopwise_widgets_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'shopwise_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}
		
		/*====== Footer About Widget Logo ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'shopwise_footer_about_logo',
				'label' => esc_attr__( 'Logo', 'shopwise' ),
				'description' => esc_attr__( 'You can upload a logo.', 'shopwise' ),
				'section' => 'shopwise_footer_about_section',
				'choices' => array(
					'save_as' => 'id',
				),
			)
		);
		
		/*====== Footer About Widget Logo Size ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'shopwise_footer_about_logo_size',
				'label' => esc_attr__( 'Logo Size', 'shopwise' ),
				'description' => esc_attr__( 'You can set size of the logo.', 'shopwise' ),
				'section' => 'shopwise_footer_about_section',
				'default' => array(
					'width' => '182',
					'height' => '47',
				),
			)
		);
		
		
		/*====== Footer About Widget Textarea ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'shopwise_footer_about_text',
				'label' => esc_attr__( 'Content', 'shopwise' ),
				'description' => esc_attr__( 'You can set text for the about widget.', 'shopwise' ),
				'section' => 'shopwise_footer_about_section',
				'default' => '',
			)
		);
		
		/*====== Footer About Widget Social======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'repeater',
				'settings' => 'shopwise_footer_about_social',
				'label' => esc_attr__( 'Footer About Social', 'shopwise' ),
				'description' => esc_attr__( 'You can set the widget settings.', 'shopwise' ),
				'section' => 'shopwise_footer_about_section',
				'fields' => array(
					'social_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Icon', 'shopwise' ),
						'description' => esc_attr__( 'You can set an icon from fontawesome.com for example; "ion-social-facebook"', 'shopwise' ),
					),

					'social_url' => array(
						'type' => 'text',
						'label' => esc_attr__( 'URL', 'shopwise' ),
						'description' => esc_attr__( 'You can set url for the item.', 'shopwise' ),
					),

				),
			)
		);
		
		
		
		/*====== Contact Box Widget ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'repeater',
				'settings' => 'shopwise_contact_box_widget',
				'label' => esc_attr__( 'Contact Box Widget', 'shopwise' ),
				'description' => esc_attr__( 'You can set contact detail.', 'shopwise' ),
				'section' => 'shopwise_contact_box_section',
				'fields' => array(
					'contact_detail' => array(
						'type' => 'textarea',
						'label' => esc_attr__( 'Content', 'shopwise' ),
						'description' => esc_attr__( 'You can enter a text.', 'shopwise' ),
					),
					
					'contact_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Icon', 'shopwise' ),
						'description' => esc_attr__( 'You can set an icon from fontawesome.com for example; "ti-location-pin"', 'shopwise' ),
					),

					'contact_url' => array(
						'type' => 'text',
						'label' => esc_attr__( 'URL', 'shopwise' ),
						'description' => esc_attr__( 'You can set url for the list.', 'shopwise' ),
					),

				),
			)
		);
		
	/*====== Footer ======*/
		/*====== Footer Panels ======*/
		Kirki::add_panel (
			'shopwise_footer_panel',
			array(
				'title' => esc_html__( 'Footer Settings', 'shopwise' ),
				'description' => esc_html__( 'You can customize the footer from this panel.', 'shopwise' ),
			)
		);

		$sections = array (
			'footer_subscribe' => array(
				esc_attr__( 'Subscribe', 'shopwise' ),
				esc_attr__( 'You can customize the subscribe area..', 'shopwise' )
			),

			'top_footer' => array(
				esc_attr__( 'Top Footer', 'shopwise' ),
				esc_attr__( 'You can customize the top footer settings.', 'shopwise' )
			),
			
			'footer_general' => array(
				esc_attr__( 'Footer General', 'shopwise' ),
				esc_attr__( 'You can customize the footer settings.', 'shopwise' )
			),
			
			'footer_subscribe_color' => array(
				esc_attr__( 'Footer Subscribe Color', 'shopwise' ),
				esc_attr__( 'You can customize the subscribe color.', 'shopwise' )
			),
			
			'footer_color' => array(
				esc_attr__( 'Footer Color', 'shopwise' ),
				esc_attr__( 'You can customize the footer color.', 'shopwise' )
			),
		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'shopwise_footer_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'shopwise_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}
		
		
		/*====== Subcribe Toggle ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shopwise_footer_subscribe_area',
				'label' => esc_attr__( 'Subcribe', 'shopwise' ),
				'description' => esc_attr__( 'Disable or Enable subscribe section on the footer.', 'shopwise' ),
				'section' => 'shopwise_footer_subscribe_section',
				'default' => '0',
			)
		);
		
		/*====== Subscribe Title ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'shopwise_footer_subscribe_title',
				'label' => esc_attr__( 'Title', 'shopwise' ),
				'description' => esc_attr__( 'You can set text for subscribe section.', 'shopwise' ),
				'section' => 'shopwise_footer_subscribe_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'shopwise_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subcribe FORM ID======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'shopwise_footer_subscribe_formid',
				'label' => esc_attr__( 'Subscribe Form Id.', 'shopwise' ),
				'description' => esc_attr__( 'You can find the form id in Dashboard > Mailchimp For Wp > Form.', 'shopwise' ),
				'section' => 'shopwise_footer_subscribe_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'shopwise_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		
		/*====== Copyright ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'shopwise_copyright',
				'label' => esc_attr__( 'Copyright', 'shopwise' ),
				'description' => esc_attr__( 'You can set a copyright text for the footer.', 'shopwise' ),
				'section' => 'shopwise_footer_general_section',
				'default' => '',
			)
		);

		/*====== Payment Images ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'repeater',
				'settings' => 'shopwise_footer_payment',
				'label' => esc_attr__( 'Payment Images', 'shopwise' ),
				'description' => esc_attr__( 'You can create payment images for the footer.', 'shopwise' ),
				'section' => 'shopwise_footer_general_section',
				'fields' => array(
					'payment_image' => array(
						'type' => 'image',
						'label' => esc_attr__( 'Image', 'shopwise' ),
						'description' => esc_attr__( 'Upload an image.', 'shopwise' ),
					),
				),
			)
		);

		/*====== Footer Column ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'shopwise_footer_column',
				'label' => esc_attr__( 'Footer Column', 'shopwise' ),
				'description' => esc_attr__( 'You can set footer column.', 'shopwise' ),
				'section' => 'shopwise_footer_general_section',
				'default' => 'type1',
				'choices' => array(
					'5columns' => esc_attr__( '5 Columns', 'shopwise' ),
					'4columns' => esc_attr__( '4 Columns', 'shopwise' ),
					'3columns' => esc_attr__( '3 Columns', 'shopwise' ),
				),
			)
		);
		
		/*====== Footer Subscribe Style ======*/
		shopwise_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'shopwise_Subscribe_typography',
				'label'       => esc_attr__( 'Subscribe Featured Typography', 'shopwise' ),
				'section'     => 'shopwise_footer_subscribe_color_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '26px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.main_content .section .heading_light *',
					],
				],		
			)
		);
		
		/*====== Subscribe Background Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#FF324D ',
				'settings' => 'shopwise_subscribe_bg_color',
				'label' => esc_attr__( 'Subscribe Background Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a Background.', 'shopwise-core' ),
				'section' => 'shopwise_footer_subscribe_color_section',
			)
		);
		
		/*====== Subscribe Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'shopwise_subscribe_color',
				'label' => esc_attr__( 'Subscribe Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a color.', 'shopwise-core' ),
				'section' => 'shopwise_footer_subscribe_color_section',
			)
		);
		
		/*====== Subscribe Hover Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'shopwise_subscribe_hvrcolor',
				'label' => esc_attr__( 'Subscribe Hover Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a color.', 'shopwise-core' ),
				'section' => 'shopwise_footer_subscribe_color_section',
			)
		);
		
		/*====== Footer Background Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#202325',
				'settings' => 'shopwise_footer_bg',
				'label' => esc_attr__( 'Footer Background Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a background.', 'shopwise-core' ),
				'section' => 'shopwise_footer_color_section',
			)
		);
		
		/*====== Footer Border Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => 'rgba(255,255,255,0.1)',
				'settings' => 'shopwise_footer_border_color',
				'label' => esc_attr__( 'Footer Border Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a border.', 'shopwise-core' ),
				'section' => 'shopwise_footer_color_section',
			)
		);
		
		/*====== Footer Header Style ======*/
		shopwise_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'shopwise_footer_header_size',
				'label'       => esc_attr__( 'Footer Header Featured Typography', 'shopwise' ),
				'section'     => 'shopwise_footer_color_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '18px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
					
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => 'footer .widget .widget_title',
					],
				],
			)
		);
		
		/*====== Footer Header Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'shopwise_footer_header_color',
				'label' => esc_attr__( 'Footer Header Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a color.', 'shopwise-core' ),
				'section' => 'shopwise_footer_color_section',
			)
		);
		
		/*====== Footer Header Hover Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'shopwise_footer_header_hvrcolor',
				'label' => esc_attr__( 'Footer Header Hover Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a color.', 'shopwise-core' ),
				'section' => 'shopwise_footer_color_section',
			)
		);
		
		/*====== Footer Style ======*/
		shopwise_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'shopwise_footer_size',
				'label'       => esc_attr__( 'Footer Featured Typography', 'shopwise' ),
				'section'     => 'shopwise_footer_color_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '14px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
					
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => 'footer .widget_categories li a',
					],
				],
			)
		);
		
		/*====== Footer Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'shopwise_footer_color',
				'label' => esc_attr__( 'Footer Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a color.', 'shopwise-core' ),
				'section' => 'shopwise_footer_color_section',
			)
		);
		
		/*====== Footer Hover Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#FF324D',
				'settings' => 'shopwise_footer_hvrcolor',
				'label' => esc_attr__( 'Footer Hover Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a color.', 'shopwise-core' ),
				'section' => 'shopwise_footer_color_section',
			)
		);
		
		/*====== Footer Copyright Style ======*/
		shopwise_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'shopwise_footer_cpy_typography',
				'label'       => esc_attr__( 'Footer Copyright Featured Typography', 'shopwise' ),
				'section'     => 'shopwise_footer_color_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '14px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => 'footer .bottom_footer p',
					],
				],		
			)
		);
		
		/*====== Footer Copyright Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'shopwise_footer_cpy_color',
				'label' => esc_attr__( 'Footer Copyright Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a color.', 'shopwise-core' ),
				'section' => 'shopwise_footer_color_section',
			)
		);
		
		/*====== Footer Copyright Hover Color ======*/
		shopwise_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'shopwise_footer_cpy_hvrcolor',
				'label' => esc_attr__( 'Footer Copyright Hover Color', 'shopwise-core' ),
				'description' => esc_attr__( 'You can set a hover color.', 'shopwise-core' ),
				'section' => 'shopwise_footer_color_section',
			)
		);
		

