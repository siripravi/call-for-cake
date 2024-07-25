<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Base;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class Info_Box extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Info Box', 'panpie-core' );
		$this->rt_base = 'rt-info-box';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
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
					'style3' => esc_html__( 'Style 3', 'panpie-core' ),
					'style4' => esc_html__( 'Style 4', 'panpie-core' ),
					'style5' => esc_html__( 'Style 5', 'panpie-core' ),
					'style6' => esc_html__( 'Style 6', 'panpie-core' ),
					'style7' => esc_html__( 'Style 7', 'panpie-core' ),
					'style8' => esc_html__( 'Style 8', 'panpie-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'content_align',
				'label'   => esc_html__( 'Alignment', 'panpie-core' ),
				'options' => array(
					'left' => array(
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					),
					'right' => array(
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					),
					'justify' => array(
						'title' => __( 'Justified', 'elementor' ),
						'icon' => 'eicon-text-align-justify',
					),
				),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				),
				'condition'   => array( 'style' => array( 'style2', 'style7', 'style8' ) ),
			),
			/*Icon Start*/
			array(					 
			   'type'    => Controls_Manager::CHOOSE,
			   'options' => array(
			     'icon' => array(
			       'title' => esc_html__( 'Left', 'panpie-core' ),
			       'icon' => 'fa fa-smile-o',
			     ),
			     'image' => array(
			       'title' => esc_html__( 'Center', 'panpie-core' ),
			       'icon' => 'fa fa-image',
			     ),		     
			   ),
			   'id'      => 'icontype',
			   'label'   => esc_html__( 'Media Type', 'panpie-core' ),
			   'default' => 'icon',
			   'label_block' => false,
			   'toggle' => false,
			   'condition'   => array( 'style' => array( 'style1', 'style2', 'style4', 'style5', 'style6', 'style7', 'style8' ) ),
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon_class',
				'label'   => esc_html__( 'Icon', 'panpie-core' ),
				'default' => array(
			      'value' => 'fas fa-smile-wink',
			      'library' => 'fa-solid',
				),	
			  	'condition'   => array('icontype' => array( 'icon' ), 'style' => array( 'style1', 'style2', 'style4', 'style5', 'style6', 'style7', 'style8' ) ),
			),	
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'icon_image',
				'label'   => esc_html__( 'Image', 'panpie-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'panpie-core' ),
				'condition'   => array('icontype' => array( 'image' ), 'style' => array( 'style1', 'style2', 'style4', 'style5', 'style6', 'style7', 'style8' ) ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'panpie-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',		
				'condition'   => array('icontype' => array( 'image' ), 'style' => array( 'style1', 'style2', 'style4', 'style5', 'style6', 'style7', 'style8' ) ),
			),
			
			/*Icon end*/
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'panpie-core' ),
				'default' => esc_html__( 'BBQ GRILLED CHICKEN', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'panpie-core' ),
				'default' => esc_html__( 'THE KING PIZZA', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'start',
				'label'   => esc_html__( 'Start', 'panpie-core' ),
				'default' => esc_html__( 'START', 'panpie-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'price',
				'label'   => esc_html__( 'Price', 'panpie-core' ),
				'default' => '39',
				'description' => esc_html__( "Including currency sign eg. 39", 'panpie-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'price_symbol',
				'label'   => esc_html__( 'Price Symbol', 'panpie-core' ),
				'default' => '$',
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'faction',
				'label'   => esc_html__( 'Faction', 'panpie-core' ),
				'default' => esc_html__( '.00', 'panpie-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'serial_number',
				'label'   => esc_html__( 'Number', 'panpie-core' ),
				'default' => 1,
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'button_display',
				'label'       => esc_html__( 'Button Display', 'panpie-core' ),
				'label_on'    => esc_html__( 'On', 'panpie-core' ),
				'label_off'   => esc_html__( 'Off', 'panpie-core' ),
				'default'     => false,
				'description' => esc_html__( 'Show or Hide Content. Default: off', 'panpie-core' ),
			),
			array(
				'type'  => Controls_Manager::URL,
				'id'    => 'url',
				'label' => esc_html__( 'Link (Optional)', 'panpie-core' ),
				'placeholder' => 'https://your-link.com',
				'condition'   => array( 'button_display' => array( 'yes' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'buttontext',
				'label'   => esc_html__( 'Button Text', 'panpie-core' ),
				'default' => esc_html__( 'DETAILS', 'panpie-core' ),
				'condition'   => array( 'button_display' => array( 'yes' ) ),
			),			
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'shape_five_color',
				'label'   => esc_html__( 'Background Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-style5 .rtin-item .rtin-header' => 'background: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style5' ) ),
			),
			array (
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'id'         => 'shape_padding',
				'mode'       => 'responsive',
				'label'      => esc_html__( 'Shape Padding', 'panpie-core' ),                 
				'selectors'  => array(
				  '{{WRAPPER}} .info-style5 .rtin-item .rtin-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
				),
				'condition'   => array( 'style' => array( 'style5' ) ),
			),
			array(
				'mode' => 'section_end',
			),			
			/*Style Option*/
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Title Title', 'panpie-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'panpie-core' ),
				'selector' => '{{WRAPPER}} .info-box .rtin-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box .rtin-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box .rtin-title a' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style3', 'style4', 'style6', 'style7', 'style8' ) ),
			),
			
			array(
				'mode' => 'section_end',
			),
			
			// Sub Title style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_sub_title',
				'label'   => esc_html__( 'Sub Title', 'panpie-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_title_typo',
				'label'   => esc_html__( 'Sub Title Typo', 'panpie-core' ),
				'selector' => '{{WRAPPER}} .info-box .rtin-item .rtin-text',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'conent_color',
				'label'   => esc_html__( 'Content Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box .rtin-item .rtin-text' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style3', 'style4', 'style6', 'style7', 'style8' ) ),
			),
			
			array(
				'mode' => 'section_end',
			),
			
			// Icon style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_icon',
				'label'   => esc_html__( 'Icon Style', 'panpie-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),			
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'label'   => esc_html__( 'Icon Size', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box .rtin-item .rtin-icon i' => 'font-size: {{VALUE}}px',
					'{{WRAPPER}} .info-box .rtin-item .rtin-icon i:before' => 'font-size: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box .rtin-item .rtin-icon' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'box_bg_color',
				'label'   => esc_html__( 'Icon Background Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-style8 .rtin-item > span' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style8' ) ),
			),

			array(
				'type'    => Controls_Manager::HEADING,
				'id'      => 'heading',
				'label'   => esc_html__( 'Use same height and width box size', 'panpie-core' ),
				'condition'   => array( 'style' => array( 'style8' ) ),
			),			
			array(
				'type'        => Controls_Manager::SLIDER,
				'id'          => 'icon_box_width',
				'label'       => esc_html__( 'Icon Box Width', 'panpie-core' ),
                'range' => [
                    'px' => [
                        'min' => 30,
                        'max' => 150,
                    ],
                ],
                'size_units' => [ 'px'],
				'selectors' => array(
					'{{WRAPPER}} .info-style8 .rtin-item > span' => 'width:{{SIZE}}{{UNIT}}',
				),
				'condition'   => array( 'style' => array( 'style8' ) ),
			),
			array(
				'type'        => Controls_Manager::SLIDER,
				'id'          => 'icon_box_height',
				'label'       => esc_html__( 'Icon Box Height', 'panpie-core' ),
                'range' => [
                    'px' => [
                        'min' => 30,
                        'max' => 150,
                    ],
                ],
                'size_units' => [ 'px'],
				'selectors' => array(
					'{{WRAPPER}} .info-style8 .rtin-item > span' => 'height:{{SIZE}}{{UNIT}}',
				),
				'condition'   => array( 'style' => array( 'style8' ) ),
			),
			
			array(
				'mode' => 'section_end',
			),
			
			// Price style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_price',
				'label'   => esc_html__( 'Price Style', 'panpie-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style1','style2', 'style4' ) ),
			),			
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'price_typo',
				'label'   => esc_html__( 'Price Typo', 'panpie-core' ),
				'selector' => '{{WRAPPER}} .info-box .rtin-item .rtin-price',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'price_color',
				'label'   => esc_html__( 'Price Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box .rtin-item .rtin-price' => 'color: {{VALUE}}',
				),				
			),
			array (
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'id'         => 'price_margin',
				'mode'       => 'responsive',
				'label'      => esc_html__( 'Price Margin', 'panpie-core' ),                 
				'selectors'  => array(
				  '{{WRAPPER}} .info-box .rtin-item .rtin-price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
				),
				'separator'  => 'before',
			),
			
			array(
				'mode' => 'section_end',
			),
			
			// Image style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_img_position',
				'label'   => esc_html__( 'Image Position', 'panpie-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style4' ) ),
			),			
			array(
				'type'       => Controls_Manager::SLIDER,
				'id'         => 'position_lr',
				'label'      => esc_html__( 'Position Left / Right', 'panpie-core' ),    
				'size_units' => array('px', '%'),
				'range'      => array(
				  'px' => [
					'min' => -2000,
					'max' => 2000,
				  ],
				  '%' => [
					'min' => -100,
					'max' => 100,
				  ],
				),
				'default' => array(
				  'unit' => 'px',
				  'size' => 10,
				),
				'selectors'  => array(
				  '{{WRAPPER}} .info-style4 .rtin-item .rtin-media' => 'right: {{SIZE}}{{UNIT}};',                    
				),
			),
			array(
				'type'       => Controls_Manager::SLIDER,
				'id'         => 'position_tb',
				'label'      => esc_html__( 'Position Top / Bottom', 'panpie-core' ),    
				'size_units' => array('px', '%'),
				'range'      => array(
				  'px' => [
					'min' => -2000,
					'max' => 2000,
				  ],
				  '%' => [
					'min' => -100,
					'max' => 100,
				  ],
				),
				'default' => array(
				  'unit' => '%',
				  'size' => 50,
				),
				'selectors'  => array(
				  '{{WRAPPER}} .info-style4 .rtin-item .rtin-media' => 'top: {{SIZE}}{{UNIT}};',                    
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
			case 'style8':
			$template = 'info-box-8';
			break;
			case 'style7':
			$template = 'info-box-7';
			break;
			case 'style6':
			$template = 'info-box-6';
			break;
			case 'style5':
			$template = 'info-box-5';
			break;
			case 'style4':
			$template = 'info-box-4';
			break;
			case 'style3':
			$template = 'info-box-3';
			break;
			case 'style2':
			$template = 'info-box-2';
			break;
			default:
			$template = 'info-box-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}