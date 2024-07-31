<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit;

class CTA extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Call to Action', 'panpie-core' );
		$this->rt_base = 'rt-cta';
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
				'label'   => esc_html__( 'CTA Style', 'panpie-core' ),
				'options' => array(
					'style1' => esc_html__( 'Style 1' , 'panpie-core' ),
					'style2' => esc_html__( 'Style 2', 'panpie-core' ),
					'style3' => esc_html__( 'Style 3', 'panpie-core' ),
					'style4' => esc_html__( 'Style 4', 'panpie-core' ),
					'style5' => esc_html__( 'Style 5', 'panpie-core' ),
					'style6' => esc_html__( 'Style 6', 'panpie-core' ),
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
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'panpie-core' ),
				'default' => esc_html__( 'Get Free Delivery!', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'content',
				'label'   => esc_html__( 'Content Text ', 'panpie-core' ),
				'default' => esc_html__( 'As well known and we are very busy all days advice you. advice you to call us of before arriving, so we can guarantee your seat.', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'phone_text',
				'label'   => esc_html__( 'Phone Text', 'panpie-core' ),
				'default' => esc_html__( 'Call:', 'panpie-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'pho_number',
				'label'   => esc_html__( 'Phone Number', 'panpie-core' ),
				'default' => '+123-666-604',
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'sub_title',
				'label'   => esc_html__( 'Sub Title', 'panpie-core' ),
				'default' => esc_html__('Order Now & Get', 'panpie-core' ),
				'condition'   => array( 'style' => array( 'style6' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'button_style',
				'label'   => esc_html__( 'Button Style', 'panpie-core' ),
				'options' => array(
					'panpie-button-1' => esc_html__( 'Button 1', 'panpie-core' ),
					'panpie-button-2' => esc_html__( 'Button 2', 'panpie-core' ),
				),
				'default' => 'panpie-button-1',
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    	  => Controls_Manager::TEXT,
				'id'      	  => 'buttontext',
				'label'   	  => esc_html__( 'Button Text', 'panpie-core' ),
				'default' 	  => esc_html__( 'ORDER NOW', 'panpie-core' ),
				'condition'   => array( 'style' => array( 'style1','style3' ) ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'buttonurl',
				'label'   => esc_html__( 'Button URL', 'panpie-core' ),
				'placeholder' => 'https://your-link.com',
				'condition'   => array( 'style' => array( 'style1','style3' ) ),
			),
			array(
				'type'    	  => Controls_Manager::TEXT,
				'id'      	  => 'buttontext2',
				'label'   	  => esc_html__( 'Button Text', 'panpie-core' ),
				'default' 	  => esc_html__( 'ORDER NOW', 'panpie-core' ),
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'buttonurl2',
				'label'   => esc_html__( 'Button URL', 'panpie-core' ),
				'placeholder' => 'https://your-link.com',
				'condition'   => array( 'style' => array( 'style3' ) ),
			),		
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_margin',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Button Space', 'panpie-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cta-default .action-box .rtin-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .cta-style4 .action-box .rtin-phone' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'   => array( 'style' => array( 'style1', 'style4' ) ),
			),
			array(
				'mode' => 'section_end',
			),
			// Title style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_title_style',
				'label'   => esc_html__( 'Title Style', 'panpie-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'panpie-core' ),
				'selector' => '{{WRAPPER}} .cta-default .action-box h2',
			),			
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .cta-default .action-box h2' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'phone_color',
				'label'   => esc_html__( 'Phone Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .cta-default .action-box h3' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			
			array(
				'mode' => 'section_end',
			),
			// Content style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_text_style',
				'label'   => esc_html__( 'Text Style', 'panpie-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'text_typo',
				'label'   => esc_html__( 'Content Typo', 'panpie-core' ),
				'selector' => '{{WRAPPER}} .cta-default .action-box p',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .cta-default .action-box p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .cta-style2 .item-phone .phone-content .call-text' => 'color: {{VALUE}}',
				),
			),			
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'content_margin',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Content Space', 'panpie-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cta-default .action-box p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode' => 'section_end',
			),
			// Phone style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_phone_style',
				'label'   => esc_html__( 'Phone Style', 'panpie-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style2', 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'phone2_text_color',
				'label'   => esc_html__( 'Phone Text Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .cta-style2 .action-box .rtin-phone' => 'color: {{VALUE}}',
					'{{WRAPPER}} .cta-style4 .action-box .rtin-phone' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'phone2_no_color',
				'label'   => esc_html__( 'Phone No Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .cta-style2 .action-box .rtin-phone a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .cta-style4 .action-box .rtin-phone a' => 'color: {{VALUE}}',
				),
			),	
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'phone_bg_color',
				'label'   => esc_html__( 'Phone Bg Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .cta-style2 .action-box .rtin-phone' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .cta-style4 .action-box .rtin-phone' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'phone_margin',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Phone Margin', 'panpie-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cta-style2 .action-box .rtin-phone' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'   => array( 'style' => array( 'style2' ) ),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'phone_padding',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Phone Padding', 'panpie-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cta-style2 .action-box .rtin-phone' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'   => array( 'style' => array( 'style2' ) ),
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
			case 'style6':
			$template = 'cta-6';
			break;
			case 'style5':
			$template = 'cta-5';
			break;
			case 'style4':
			$template = 'cta-4';
			break;
			case 'style3':
			$template = 'cta-3';
			break;
			case 'style2':
			$template = 'cta-2';
			break;
			default:
			$template = 'cta-1';
			break;
		}
		
		return $this->rt_template( $template, $data );
	}
}