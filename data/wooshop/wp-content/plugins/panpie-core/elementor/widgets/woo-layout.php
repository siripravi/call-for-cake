<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) exit;

class Woo_Product_Layout extends Custom_Widget_Base {
	
	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'RT Woo Layout', 'panpie-core' );
		$this->rt_base = 'rt-woo-layout';
		$this->rt_translate = array(
			'cols'  => array(
				'1' => esc_html__( '1 Col', 'panpie-core' ),
				'6'  => esc_html__( '6 Col', 'panpie-core' ),
				'4'  => esc_html__( '4 Col', 'panpie-core' ),
				'3'  => esc_html__( '3 Col', 'panpie-core' ),
				'2'  => esc_html__( '2 Col', 'panpie-core' ),
			),
		);
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_script( 'isotope-pkgd' );
	}
	private function rt_load_carousel_scripts(){
		wp_enqueue_style(  'owl-carousel' );
		wp_enqueue_style(  'owl-theme-default' );
		wp_enqueue_script( 'owl-carousel' );
	}

	public function rt_fields(){		
		
		// find the variations
		$lists = wp_list_pluck(wc_get_attribute_taxonomies(), 'attribute_label', 'attribute_name');
		
		$list_dropdown = array( '0' => esc_html__( 'All Variation', 'panpie-core' ) );	

		foreach ( $lists as $key=>$value ) {
			$list_dropdown[$key] = $value;
		}
		
		// find the category of products
		
		$terms  = get_terms( array( 'taxonomy' => 'product_cat', 'fields' => 'id=>name' ) );
		$category_dropdown = array( '0' => __( 'Please Selecet category', 'digeco-core' ) );

		foreach ( $terms as $id => $name ) {
			$category_dropdown[$id] = $name;
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
				'label'   => esc_html__( 'Style', 'panpie-core' ),
				'options' => array(
					'style1' => esc_html__( 'Style 1', 'panpie-core' ),
					'style2' => esc_html__( 'Style 2', 'panpie-core' ),
					'style5' => esc_html__( 'Style 3', 'panpie-core' ),
					'style6' => esc_html__( 'Style 4', 'panpie-core' ),
					'style10' => esc_html__( 'Style 5', 'panpie-core' ),
					'style3' => esc_html__( 'Food Menu Isotope', 'panpie-core' ),
					'style8' => esc_html__( 'Food Menu Isotope 2', 'panpie-core' ),
					'style9' => esc_html__( 'Food Menu Isotope 3', 'panpie-core' ),
					'style11' => esc_html__( 'Food Menu Isotope 4', 'panpie-core' ),
					'style4' => esc_html__( 'Food Menu Carousel', 'panpie-core' ),
					'style7' => esc_html__( 'Food Menu Carousel 2', 'panpie-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::SWITCHER,
				'id'      => 'title_showhide',
				'label'   => esc_html__( 'Title', 'panpie-core' ),
				'label_on'    => esc_html__( 'Show', 'panpie-core' ),
				'label_off'   => esc_html__( 'Hide', 'panpie-core' ),
				'default'     => 'yes',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_count',
				'label'   => esc_html__( 'Title Word count', 'panpie-core' ),
				'default' => 5,
				'description' => esc_html__( 'Maximum number of words', 'panpie-core' ),				
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'variation_cat',
				'label'   => esc_html__( 'Variations', 'panpie-core' ),
				'options' => $list_dropdown,
				'default' => '0',
				'condition'   => array( 'style' => array( 'style2',  'style6', 'style10', 'style3', 'style8', 'style9' ) ),  
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'attribute_limit',
				'label'   => esc_html__( 'Product Attribute Limit', 'panpie-core' ),
				'description' => esc_html__( 'Note: This is not attribute item.', 'panpie-core' ),	
				'options' => array(
					1 => esc_html__( '1', 'panpie-core' ), 
					2 => esc_html__( '2', 'panpie-core' ), 
					3 => esc_html__( '3', 'panpie-core' ), 
					4 => esc_html__( '4', 'panpie-core' ),  
					5 => esc_html__( '5', 'panpie-core' ),  
				),
				'default' => 1,
				'condition'   => array( 'style' => array('style1', 'style4', 'style5', 'style7' ) ), 
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'cat_single_box',
				'label'   => esc_html__( 'Categories', 'panpie-core' ),
				'options' => $category_dropdown,
				'default'   => '0',
				'multiple'  => false,
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4', 'style6', 'style7', 'style10' ) ),
			),
			array (
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'category_list',
				'label'   => esc_html__( 'Add as many Categories as you want', 'panpie-core' ),
				'fields'  => array(
					array(
						'type'    => Controls_Manager::SELECT2,
						'name'    => 'cat_multi_box',
						'label'   => esc_html__( 'Categories', 'panpie-core' ),
						'options' => $category_dropdown,
						'multiple'=> false,
						'default' => '1',
					),
				),
				'condition'   => array( 'style' => array( 'style5', 'style3', 'style8', 'style9', 'style11' ) ),
			),		
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'posts_not_in',
				'label'   => esc_html__( 'Enter Post ID that will not display', 'panpie-core' ),
				'fields'  => array(
					array(
						'type'    => Controls_Manager::NUMBER,
						'name'    => 'post_not_in',
						'label'   => esc_html__( 'Post ID', 'panpie-core' ),
						'default' => '0',
					),
				),
				'condition'   => array( 'style' => array( 'style5', 'style3', 'style8', 'style9', 'style11' ) ),
			),
			array(
				'type'    => Controls_Manager::SWITCHER,
				'id'      => 'price_showhide',
				'label'   => esc_html__( 'Price Show/Hide', 'panpie-core' ),
				'label_on'    => esc_html__( 'Show', 'panpie-core' ),
				'label_off'   => esc_html__( 'Hide', 'panpie-core' ),
				'default'     => 'yes',
			),
			array(
				'type'    => Controls_Manager::SWITCHER,
				'id'      => 'rating_showhide',
				'label'   => esc_html__( 'Rating Show/Hide', 'panpie-core' ),
				'label_on'    => esc_html__( 'Show', 'panpie-core' ),
				'label_off'   => esc_html__( 'Hide', 'panpie-core' ),
				'default'     => 'yes',
				'condition'   => array( 'style' => array( 'style7', 'style10', 'style11' ) ),
			),
			array(
				'type'    => Controls_Manager::SWITCHER,
				'id'      => 'excerpt_display',
				'label'   => esc_html__( 'Short Detail Show/Hide', 'panpie-core' ),
				'label_on'    => esc_html__( 'Show', 'panpie-core' ),
				'label_off'   => esc_html__( 'Hide', 'panpie-core' ),
				'default'     => 'yes',
				'condition'   => array( 'style' => array( 'style2', 'style3', 'style5', 'style6', 'style8', 'style9', 'style10', 'style11' ) ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'excerpt_count',
				'label'   => esc_html__( 'Word count', 'panpie-core' ),
				'default' => 13,
				'description' => esc_html__( 'Maximum number of words', 'panpie-core' ),
				'condition'   => array( 'excerpt_display' => array( 'yes' ), 'style' => array( 'style2', 'style3', 'style5', 'style6', 'style8', 'style9', 'style10', 'style11' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'all_button',
				'label'   => esc_html__( 'Show All Button', 'panpie-core' ),
				'options' => array(
					'show'        => esc_html__( 'Show', 'panpie-core' ),
					'hide'        => esc_html__( 'Hide', 'panpie-core' ),
				),
				'default' => 'show',
				'condition'   => array( 'style' => array( 'style3', 'style5', 'style8', 'style9', 'style11' ) ),
			),
			/*Isotope End*/
			
			
			/*Post Order*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'post_ordering',
				'label'   => esc_html__( 'Post Ordering', 'panpie-core' ),
				'options' => array(
					'DESC'	=> esc_html__( 'Desecending', 'panpie-core' ),
					'ASC'	=> esc_html__( 'Ascending', 'panpie-core' ),
				),
				'default' => 'DESC',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'orderby',
				'label'   => esc_html__( 'Post Sorting', 'panpie-core' ),				
				'options' => array(
					'recent' 		=> esc_html__( 'Recent Post', 'panpie-core' ),
					'rand' 			=> esc_html__( 'Random Post', 'panpie-core' ),
					'menu_order' 	=> esc_html__( 'Custom Order', 'panpie-core' ),
					'title' 		=> esc_html__( 'By Name', 'panpie-core' ),
				),
				'default' => 'recent',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'itemnumber',
				'label'   => esc_html__( 'Item Number', 'panpie-core' ),
				'default' => -1,
				'description' => esc_html__( 'Use -1 for showing all items( Showing items per category )', 'panpie-core' ),
			),			
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'more_button',
				'label'   => esc_html__( 'More Button', 'panpie-core' ),
				'options' => array(
					'show'        => esc_html__( 'Show', 'panpie-core' ),
					'hide'        => esc_html__( 'Hide', 'panpie-core' ),
				),
				'default' => 'hide',
				'condition'   => array( 'style' => array( 'style1','style2','style3', 'style6', 'style8', 'style9', 'style10', 'style11' ) ),
			),
			array (
				'type'    => Controls_Manager::TEXT,
				'id'      => 'see_button_text',
				'label'   => esc_html__( 'Button Text', 'panpie-core' ),
				'condition'   => array( 'more_button' => array( 'show' ), 'style' => array( 'style1','style2','style3', 'style6', 'style8', 'style9', 'style10', 'style11' ) ),
				'default' => esc_html__( 'Show More', 'panpie-core' ),
			),
			array (
				'type'    => Controls_Manager::TEXT,
				'id'      => 'see_button_link',
				'label'   => esc_html__( 'Button Link', 'panpie-core' ),
				'condition'   => array( 'more_button' => array( 'show' ), 'style' => array( 'style1','style2','style3', 'style6', 'style8', 'style9', 'style10', 'style11' )),
			),
			array(
				'mode' => 'section_end',
			),			
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_colors',
				'label'   => esc_html__( 'Colors', 'panpie-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .food-box .item-content .item-title a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .shop-layout-style7 .food-box .item-header .item-title a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .food-menu-combo .food-box-2 .item-content .item-title a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .food-menu-isotop-style11 .item-box .item-body .item-title a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_size',
				'label'   => esc_html__( 'Title Font Size', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .food-box .item-content .item-title' => 'font-size: {{VALUE}}px',
					'{{WRAPPER}} .shop-layout-style7 .food-box .item-header .item-title' => 'font-size: {{VALUE}}px',
					'{{WRAPPER}} .food-menu-combo .food-box-2 .item-content .item-title' => 'font-size: {{VALUE}}px',
					'{{WRAPPER}} .food-menu-isotop-style11 .item-box .item-body .item-title' => 'font-size: {{VALUE}}px',
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Responsive Columns
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_responsive',
				'label'   => esc_html__( 'Number of Responsive Columns', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xl',
				'label'   => esc_html__( 'Desktops: > 1199px', 'panpie-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_lg',
				'label'   => esc_html__( 'Desktops: > 991px', 'panpie-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_md',
				'label'   => esc_html__( 'Tablets: > 767px', 'panpie-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_sm',
				'label'   => esc_html__( 'Phones: > 576px', 'panpie-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col',
				'label'   => esc_html__( 'Phones: < 576px', 'panpie-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			),
			array(
				'mode' => 'section_end',
			),
			
			// Slider options
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider',
				'label'       => esc_html__( 'Slider Options', 'panpie-core' ),
				'condition'   => array( 'style' => array( 'style4', 'style7' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'button_style',
				'label'   => esc_html__( 'Button Style', 'panpie-core' ),
				'options' => array(
					'rt-owl-nav-1' => esc_html__( 'Button 1', 'panpie-core' ),
					'rt-owl-nav-2' => esc_html__( 'Button 2', 'panpie-core' ),
				),
				'default' => 'rt-owl-nav-1',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_nav',
				'label'       => esc_html__( 'Navigation Arrow', 'panpie-core' ),
				'label_on'    => esc_html__( 'On', 'panpie-core' ),
				'label_off'   => esc_html__( 'Off', 'panpie-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable navigation arrow. Default: On', 'panpie-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_dots',
				'label'       => esc_html__( 'Navigation Dots', 'panpie-core' ),
				'label_on'    => esc_html__( 'On', 'panpie-core' ),
				'label_off'   => esc_html__( 'Off', 'panpie-core' ),
				'default'     => '',
				'description' => esc_html__( 'Enable or disable navigation dots. Default: Off', 'panpie-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_autoplay',
				'label'       => esc_html__( 'Autoplay', 'panpie-core' ),
				'label_on'    => esc_html__( 'On', 'panpie-core' ),
				'label_off'   => esc_html__( 'Off', 'panpie-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable autoplay. Default: On', 'panpie-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_stop_on_hover',
				'label'       => esc_html__( 'Stop on Hover', 'panpie-core' ),
				'label_on'    => esc_html__( 'On', 'panpie-core' ),
				'label_off'   => esc_html__( 'Off', 'panpie-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Stop autoplay on mouse hover. Default: On', 'panpie-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'slider_interval',
				'label'   => esc_html__( 'Autoplay Interval', 'panpie-core' ),
				'options' => array(
					'5000' => esc_html__( '5 Seconds', 'panpie-core' ),
					'4000' => esc_html__( '4 Seconds', 'panpie-core' ),
					'3000' => esc_html__( '3 Seconds', 'panpie-core' ),
					'2000' => esc_html__( '2 Seconds', 'panpie-core' ),
					'1000' => esc_html__( '1 Second',  'panpie-core' ),
				),
				'default' => '5000',
				'description' => esc_html__( 'Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds', 'panpie-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'slider_autoplay_speed',
				'label'   => esc_html__( 'Autoplay Slide Speed', 'panpie-core' ),
				'default' => 200,
				'description' => esc_html__( 'Slide speed in milliseconds. Default: 200', 'panpie-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_loop',
				'label'       => esc_html__( 'Loop', 'panpie-core' ),
				'label_on'    => esc_html__( 'On', 'panpie-core' ),
				'label_off'   => esc_html__( 'Off', 'panpie-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Loop to first item. Default: On', 'panpie-core' ),
			),
			array(
				'mode' => 'section_end',
			),			
			
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		
		$owl_data = array( 
			'nav'                => $data['slider_nav'] == 'yes' ? true : false,
			'dots'               => $data['slider_dots'] == 'yes' ? true : false,
			'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
			'autoplay'           => $data['slider_autoplay'] == 'yes' ? true : false,
			'autoplayTimeout'    => $data['slider_interval'],
			'autoplaySpeed'      => $data['slider_autoplay_speed'],
			'autoplayHoverPause' => $data['slider_stop_on_hover'] == 'yes' ? true : false,
			'loop'               => $data['slider_loop'] == 'yes' ? true : false,
			'margin'             => 30,
			'responsive'         => array(
				'0'    => array( 'items' => 12 / $data['col'] ),
				'480'  => array( 'items' => 12 / $data['col_sm'] ),
				'768'  => array( 'items' => 12 / $data['col_md'] ),
				'992'  => array( 'items' => 12 / $data['col_lg'] ),
				'1200' => array( 'items' => 12 / $data['col_xl'] ),
			)
		);		
		
		switch ( $data['style'] ) {
			case 'style10':
			$template = 'woo-layout-5';
			break;
			case 'style11':
			$this->rt_load_scripts();
			$template = 'woo-layout-isotope-4';
			break;
			case 'style9':
			$this->rt_load_scripts();
			$template = 'woo-layout-isotope-3';
			break;
			case 'style8':
			$this->rt_load_scripts();
			$template = 'woo-layout-isotope-2';
			break;
			case 'style7':
			$data['owl_data'] = json_encode( $owl_data );
			$this->rt_load_carousel_scripts();
			$template = 'woo-layout-carousel-2';
			break;
			case 'style6':
			$template = 'woo-layout-4';
			break;
			case 'style5':
			$this->rt_load_scripts();
			$template = 'woo-layout-3';
			break;
			case 'style4':
			$data['owl_data'] = json_encode( $owl_data );
			$this->rt_load_carousel_scripts();
			$template = 'woo-layout-carousel';
			break;
			case 'style3':
			$this->rt_load_scripts();
			$template = 'woo-layout-isotope';
			break;
			case 'style2':
			$template = 'woo-layout-2';
			break;
			default:
			$template = 'woo-layout-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}