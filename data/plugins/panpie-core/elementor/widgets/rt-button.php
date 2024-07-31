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

class RT_Button extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Button', 'panpie-core' );
		$this->rt_base = 'rt-button';
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
				'label'   => esc_html__( 'Button Style', 'panpie-core' ),
				'options' => array(
					'style1' => esc_html__( 'Button 1' , 'panpie-core' ),
					'style2' => esc_html__( 'Button 2', 'panpie-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'content_align',
				'mode'	  => 'responsive',
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
				),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				),
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon_class',
				'label'   => esc_html__( 'Icon', 'panpie-core' ),
				'default' => array(
			      'value' => 'fas fa-smile-wink',
			      'library' => 'fa-solid',
				),	
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'icon_position',
				'label'   => esc_html__( 'Icon Position', 'panpie-core' ),
				'options' => array(
					'icon-left'   => esc_html__( 'Icon Left', 'panpie-core' ),
					'icon-right'   => esc_html__( 'Icon Right', 'panpie-core' ),
				),
				'default' => 'icon-left',
			),
			array(
				'type'    	  => Controls_Manager::TEXT,
				'id'      	  => 'buttontext',
				'label'   	  => esc_html__( 'Button Text', 'panpie-core' ),
				'default' 	  => esc_html__( 'Read More', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'buttonurl',
				'label'   => esc_html__( 'Button URL', 'panpie-core' ),
				'placeholder' => 'https://your-link.com',
			),
			array(
				'mode' => 'section_end',
			),

			// Button style 1
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_button_style',
				'label'   => esc_html__( 'Button Style', 'panpie-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'button_typo',
				'label'   => esc_html__( 'Button Typo', 'panpie-core' ),
				'selector' => '{{WRAPPER}} .rt-button .button',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text_color',
				'label'   => esc_html__( 'Button Text Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text_hover_color',
				'label'   => esc_html__( 'Button Text Hover Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button:hover' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bg_color',
				'label'   => esc_html__( 'Button Background Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button' => 'background-color: {{VALUE}}',
				),
			),	
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bg_hover_color',
				'label'   => esc_html__( 'Button Background Hover Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button-style1 .button:hover' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .rt-button-style2 .button:before' => 'background-color: {{VALUE}}',
				),
			),	
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_space',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Button Spacing', 'panpie-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rt-button .button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_radius',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Button Radius', 'panpie-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rt-button .button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',
			),
			array(
				'mode' => 'section_end',
			),

			// Button style 1
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_icon_style',
				'label'   => esc_html__( 'Icon Style', 'panpie-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'Icon_typo',
				'label'   => esc_html__( 'Button Typo', 'panpie-core' ),
				'selector' => '{{WRAPPER}} .rt-button .button i',
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'icon_space',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Icon Spacing', 'panpie-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rt-button .button i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',
			),




			array(
				'mode' => 'section_end',
			),

		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$template = 'rt-button';

		return $this->rt_template( $template, $data );
	}
}