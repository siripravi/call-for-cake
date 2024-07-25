<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace radiustheme\Panpie_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;
use PanpieTheme;
use PanpieTheme_Helper;

if ( ! defined( 'ABSPATH' ) ) exit;

class Woo_Cat_Box extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Woo Category Box', 'panpie-core' );
		$this->rt_base = 'rt-woo-category-box';
		$this->rt_translate = array(
			'cols'  => array(
				'12' => esc_html__( '1 Col', 'panpie-core' ),
				'6'  => esc_html__( '2 Col', 'panpie-core' ),
				'4'  => esc_html__( '3 Col', 'panpie-core' ),
				'3'  => esc_html__( '4 Col', 'panpie-core' ),
				'2'  => esc_html__( '6 Col', 'panpie-core' ),
			),
		);
		
		parent::__construct( $data, $args );
	}
	 
	public function rt_fields(){
		
		/*For woo category*/
		$woo_categories = get_terms( 'product_cat', 'orderby=count&hide_empty=0' );
		
		$woo_category_dropdown = array( '0' => esc_html__( 'Select Categories', 'panpie-core' ) );

		foreach ( $woo_categories as $woo_category ) {
			$woo_category_dropdown[$woo_category->term_id] = $woo_category->name;
		}

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'panpie-core' ),
			),			
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Category Style', 'panpie-core' ),
				'options' => array(
					'style1' => esc_html__( 'Style 1' , 'panpie-core' ),
					'style2' => esc_html__( 'Style 2', 'panpie-core' ),
				),
				'default' => 'style1',
			),
			/*Recipe Multi Select*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'    => 'cat_multi_category',
				'label'   => __( 'Categories', 'panpie-core' ),
				'options' => $woo_category_dropdown,
				'multiple'=> false,
				'default' => '1',
			),
			//for icon category-start
			array(
			   'type'    => Controls_Manager::CHOOSE,
			   'options' => [
				 'icon' => [
				   'title' => esc_html__( 'Icon', 'panpie-core' ),
				   'icon' => 'fa fa-smile-o',
				 ],
				 'image' => [
				   'title' => esc_html__( 'Image', 'panpie-core' ),
				   'icon' => 'fa fa-image',
				 ],
			   ],
			   'id'    => 'icontype',
			   'label'   => esc_html__( 'Media Type', 'panpie-core' ),
			   'default' => 'icon',
			   'label_block' => false,
			   'toggle' => false,
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'    => 'icon_class',
				'label'   => esc_html__( 'Icon', 'panpie-core' ),
				'default' => [
				  'value' => 'fas fa-smile-wink',
				  'library' => 'fa-solid',
			  ],
			  'condition'   => array('icontype' => array( 'icon' ) ),
			),
			
			//for Image selection category-start
			array(
			   'type'    => Controls_Manager::CHOOSE,
			   'options' => [
				 'active_image_tab' => [
				   'title' => esc_html__( 'Active Image', 'panpie-core' ),
				   'icon' => 'fa fa-image',
				 ],
				 'hover_image_tab' => [
				   'title' => esc_html__( 'Hover Image', 'panpie-core' ),
				   'icon' => 'fa fa-image',
				 ],
			   ],
			   'id'    => 'imagetype',
			   'label'   => esc_html__( 'Image Type', 'panpie-core' ),
			   'default' => 'active_image',
			   'label_block' => false,
			   'toggle' => false,
			   'condition'   => array('icontype' => array( 'image' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'    => 'active_image',
				'label'   => esc_html__( 'Image', 'panpie-core' ),
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],						
				'description' => esc_html__( 'Recommended full image', 'panpie-core' ),
				'condition'   => array( 'icontype' => array( 'image' ) , 'imagetype' => array( 'active_image_tab' ) ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'panpie-core' ),	
				'name' => 'active_image_size', 
				'separator' => 'none',		
				'condition'   => array('icontype' => array( 'image' ) , 'imagetype' => array( 'active_image_tab' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'    => 'hover_image',
				'label'   => esc_html__( 'Image', 'panpie-core' ),
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],						
				'description' => esc_html__( 'Recommended full image', 'panpie-core' ),
				'condition'   => array( 'icontype' => array( 'image' ) , 'imagetype' => array( 'hover_image_tab' ) ),
			),			
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'panpie-core' ),	
				'name' => 'hover_image_size', 
				'separator' => 'none',		
				'condition'   => array('icontype' => array( 'image' ) , 'imagetype' => array( 'hover_image_tab' ) ),
			),
			
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'    => 'icon_size',						
				'label'   => esc_html__( 'Icon Size', 'panpie-core' ),
				'default' => 50,
				'condition'   => array('icontype' => array( 'icon' ) ),
			),
			
			//recipe Icon color
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'    => 'img_scale',
				'label'   => __( 'Image Brightness', 'panpie-core' ),
				'options' => array(
					'normal' => esc_html__( 'Default' , 'panpie-core' ),
					'grayscale' => esc_html__( 'Grayscale', 'panpie-core' ),
				),
				'default' => 'normal',
			),
			array (
				'type'    => Controls_Manager::COLOR,						
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'panpie-core' ),
				'default' => panpieTheme::$options['primary_color'],
				'selectors' => array( 
					'{{WRAPPER}} .default-category-box a' => 'color: {{VALUE}}',
				),
				'condition'   => array('icontype' => array( 'icon' ) ),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'    => 'icon_hover_color',
				'label'   => esc_html__( 'Icon Hover Color', 'panpie-core' ),
				'default' => '#FFFFFF',
				'selectors' => array( 
					'{{WRAPPER}} .default-category-box a:hover' => 'color: {{VALUE}}',
				),
				'condition'   => array('icontype' => array( 'icon' ) ),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'    => 'shape_color',
				'label'   => esc_html__( 'Hover Shape Color', 'panpie-core' ),
				'default' => '#ffffff',
				'selectors' => array( 
					'{{WRAPPER}} .default-category-box .media .rt-categoty-icon svg' => 'fill: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			//category text color
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'category_title_color',
				'label'   => esc_html__( 'Category Title Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(				
					'{{WRAPPER}} .default-category-box .rtin-title' => 'color: {{VALUE}}',					
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'category_title_hover_color',
				'label'   => esc_html__( 'Category Title Hover Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .default-category-box a:hover .rtin-title' => 'color: {{VALUE}}',
				),
			),
			//Recipe Category - Typo
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'      => 'category_title_typo',
				'label'   => esc_html__( 'Category Title Typography', 'panpie-core' ),
				'selector' => '{{WRAPPER}} .default-category-box .rtin-title',	
			),
			//recipe number color
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'category_number_color',
				'label'   => esc_html__( 'Category Number Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .default-category-box .rtin-sub-title' => 'color: {{VALUE}}',
				),
			),
			//Recipe Number - Typo
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'      => 'category_number_typo',
				'label'   => esc_html__( 'Category Count Typography', 'panpie-core' ),
				'selector' => '{{WRAPPER}} .default-category-box .rtin-sub-title',	
			),	
			array(
				'mode' => 'section_end',
			),						
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_option',
				'label'   => esc_html__( 'Custom Option', 'panpie-core' ),
			),			
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'cat_num_display',
				'label'       => esc_html__( 'Category Number Display', 'panpie-core' ),
				'label_on'    => esc_html__( 'On', 'panpie-core' ),
				'label_off'   => esc_html__( 'Off', 'panpie-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide. Default: on', 'panpie-core' ),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'svg_bg_color',
				'label'   => esc_html__( 'Icon Background Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(				
					'{{WRAPPER}} .category-box-style2 .media .rt-categoty-icon .svg-shape .shape-1' => 'fill: {{VALUE}}',					
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'svg_bghov_color',
				'label'   => esc_html__( 'Icon Background Hover Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(				
					'{{WRAPPER}} .category-box-style2 .media:hover .rt-categoty-icon .svg-shape .shape-1' => 'fill: {{VALUE}}',					
				),
			),
			array(
				'mode' => 'section_end',
			),
			
		);
		return $fields;
	}

	protected function render() {
		
		$data = $this->get_settings();
		
		switch ( $data['style'] ) {
			case 'style2':
			$template = 'woo-category-box-2';
			break;
			default:
			$template = 'woo-category-box-1';
			break;
		}
		
		return $this->rt_template( $template, $data );
		
	}
	
}