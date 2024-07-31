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

class Progress_Circle extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'RT Progress Circle', 'panpie-core' );
		$this->rt_base = 'rt-progress-circle';
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_script( 'knob' );
		wp_enqueue_script( 'appear' );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number',
				'label'   => esc_html__( 'Circle Number', 'panpie-core' ),
				'default' => 50,
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'circle_width',
				'label'   => esc_html__( 'Circle Width', 'panpie-core' ),
				'default' => 200,
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'circle_height',
				'label'   => esc_html__( 'Circle Height', 'panpie-core' ),
				'default' => 200,
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'circle_border',
				'label'   => esc_html__( 'Circle thickness', 'panpie-core' ),
				'default' => 0.09,
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'panpie-core' ),
				'default' => esc_html__( 'Feature works', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'panpie-core' ),
				'default' => esc_html__( 'All our projects incorporate a unique artistic image functional.', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'speed',
				'label'   => esc_html__( 'Animation Speed', 'panpie-core' ),
				'default' => 5000,
				'description' => esc_html__( 'The total duration of the count animation in milisecond eg. 5000', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'steps',
				'label'   => esc_html__( 'Animation Steps', 'panpie-core' ),
				'default' => 10,
				'description' => esc_html__( 'Counter steps eg. 10', 'panpie-core' ),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Style', 'panpie-core' ),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'panpie-core' ),
				'selector' => '{{WRAPPER}} .progress-circular-layout .rtin-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .progress-circular-layout .rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .progress-circular-layout .rtin-content' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bgcolor_color',
				'label'   => esc_html__( 'bgcolor Color', 'panpie-core' ),
				'default' => '',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'fgcolor_color',
				'label'   => esc_html__( 'fgcolor Color', 'panpie-core' ),
				'default' => '',
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
		
		$template = 'progress-circle';

		return $this->rt_template( $template, $data );
	}
}