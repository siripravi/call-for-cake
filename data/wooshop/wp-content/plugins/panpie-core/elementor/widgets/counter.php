<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Counter extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'RT Counter', 'panpie-core' );
		$this->rt_base = 'rt-Counter';
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_style( 'animate' );
		wp_enqueue_script( 'counterup' );
		wp_enqueue_script( 'rt-waypoints' );
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
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'iconalign',
				'label'   => esc_html__( 'Icon Align', 'panpie-core' ),
				'options' => array(
					'left' => esc_html__( 'left', 'panpie-core' ),
					'center' => esc_html__( 'Center', 'panpie-core' ),
					'right' => esc_html__( 'Right', 'panpie-core' ),
				),
				'default' => 'center',
			),
			array(
				'type'    => Controls_Manager::SWITCHER,
				'id'      => 'showhide',
				'label'   => esc_html__( 'Icon/image', 'panpie-core' ),
				'label_on'    => esc_html__( 'Show', 'panpie-core' ),
				'label_off'   => esc_html__( 'Hide', 'panpie-core' ),
				'default'     => 'yes',
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			/*Icon Start*/
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon_class',
				'label'   => esc_html__( 'Icon', 'panpie-core' ),
				'default' => array(
			      'value' => 'flaticon-heart',
			      'library' => 'far fa-map',
				),
				'condition'   => array( 'style' => array( 'style1' ) ),
				'condition'   => array( 'showhide' =>'yes', 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'panpie-core' ),
				'default' => esc_html__( 'Total Claim', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number',
				'label'   => esc_html__( 'Counter Number', 'panpie-core' ),
				'default' => 243,
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'speed',
				'label'   => esc_html__( 'Animation Speed', 'panpie-core' ),
				'default' => 2000,
				'description' => esc_html__( 'The total duration of the count animation in milisecond eg. 5000', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'steps',
				'label'   => esc_html__( 'Animation Steps', 'panpie-core' ),
				'default' => 50,
				'description' => esc_html__( 'Counter steps eg. 10', 'panpie-core' ),
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
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'counter_color',
				'label'   => esc_html__( 'Counter Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-counter' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-media i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-media i:before' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'svg_color',
				'label'   => esc_html__( 'SVG Icon Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter.rtin-counter-style2 .rtin-item svg path' => 'stroke: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style2' ) ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_size',
				'mode'       => 'responsive',
				'label'   => esc_html__( 'Title Font Size', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-title' => 'font-size: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'counter_size',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Counter Font Size', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-counter' => 'font-size: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Icon Font Size', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-media i' => 'font-size: {{VALUE}}px',
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-media i:before' => 'font-size: {{VALUE}}px',
				),
				'condition'   => array( 'style' => array( 'style1' ) ),
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
		
		switch ( $data['style'] ) {
			case 'style3':
			$template = 'counter-3';
			break;
			case 'style2':
			$template = 'counter-2';
			break;
			default:
			$template = 'counter-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}