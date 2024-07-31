<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Progress_Bar extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'RT Progress Bar', 'panpie-core' );
		$this->rt_base = 'rt-progress-bar';
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_style( 'animate' );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'panpie-core' ),
				'default' => esc_html__( 'Total Posts', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'number',
				'label'   => esc_html__( 'Percentage', 'panpie-core' ),
				'default' => array( 'size' => 77 ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'number_height',
				'label'   => esc_html__( 'Percentage Height', 'panpie-core' ),
				'default' => '10',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bgcolor_color',
				'label'   => esc_html__( 'Bgcolor', 'panpie-core' ),
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .progress' => 'background-color: {{VALUE}}' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'fgcolor_color',
				'label'   => esc_html__( 'Fgcolor', 'panpie-core' ),
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .progress .progress-bar' => 'background-color: {{VALUE}}' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'per_color',
				'label'   => esc_html__( 'Percent Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .rtin-progress-bar .progress .progress-bar > span' => 'color: {{VALUE}}' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'shap_color',
				'label'   => esc_html__( 'Shap Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .rtin-progress-bar .progress .progress-bar > span:before' => 'border-top-color: {{VALUE}}' ),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		$this->rt_load_scripts();

		$template = 'progress-bar';

		return $this->rt_template( $template, $data );
	}
}