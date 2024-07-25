<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class Shape_Animation extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Shape Animation', 'panpie-core' );
		$this->rt_base = 'rt-shape-animation';
		parent::__construct( $data, $args );
	}
	
	private function rt_load_scripts(){
		wp_enqueue_script( 'rt-wow' );
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
				'label'   => esc_html__( 'Image Style', 'panpie-core' ),
				'options' => array(
					'style1' => esc_html__( 'Style 1' , 'panpie-core' ),
					'style2' => esc_html__( 'Style 2', 'panpie-core' ),
					'style3' => esc_html__( 'Style 3', 'panpie-core' ),
					'style4' => esc_html__( 'Style 4', 'panpie-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'left_animation',
				'label'   => esc_html__( 'Animation', 'panpie-core' ),
				'options' => array(
                    'none' => esc_html__( 'none', 'panpie-core' ),
					'bounce' => esc_html__( 'bounce', 'panpie-core' ),
					'flash' => esc_html__( 'flash', 'panpie-core' ),
					'pulse' => esc_html__( 'pulse', 'panpie-core' ),
					'rubberBand' => esc_html__( 'rubberBand', 'panpie-core' ),
					'shakeX' => esc_html__( 'shakeX', 'panpie-core' ),
					'shakeY' => esc_html__( 'shakeY', 'panpie-core' ),
					'headShake' => esc_html__( 'headShake', 'panpie-core' ),
					'swing' => esc_html__( 'swing', 'panpie-core' ),					
					'fadeIn' => esc_html__( 'fadeIn', 'panpie-core' ),
					'fadeInDown' => esc_html__( 'fadeInDown', 'panpie-core' ),
					'fadeInLeft' => esc_html__( 'fadeInLeft', 'panpie-core' ),
					'fadeInRight' => esc_html__( 'fadeInRight', 'panpie-core' ),
					'fadeInUp' => esc_html__( 'fadeInUp', 'panpie-core' ),					
					'bounceIn' => esc_html__( 'bounceIn', 'panpie-core' ),
					'bounceInDown' => esc_html__( 'bounceInDown', 'panpie-core' ),
					'bounceInLeft' => esc_html__( 'bounceInLeft', 'panpie-core' ),
					'bounceInRight' => esc_html__( 'bounceInRight', 'panpie-core' ),
					'bounceInUp' => esc_html__( 'bounceInUp', 'panpie-core' ),			
					'slideInDown' => esc_html__( 'slideInDown', 'panpie-core' ),
					'slideInLeft' => esc_html__( 'slideInLeft', 'panpie-core' ),
					'slideInRight' => esc_html__( 'slideInRight', 'panpie-core' ),
					'slideInUp' => esc_html__( 'slideInUp', 'panpie-core' ), 
                ),
				'default' => 'fadeInLeft',
			),
			
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'right_animation',
				'label'   => esc_html__( 'Animation', 'panpie-core' ),
				'options' => array(
                    'none' => esc_html__( 'none', 'panpie-core' ),
					'bounce' => esc_html__( 'bounce', 'panpie-core' ),
					'flash' => esc_html__( 'flash', 'panpie-core' ),
					'pulse' => esc_html__( 'pulse', 'panpie-core' ),
					'rubberBand' => esc_html__( 'rubberBand', 'panpie-core' ),
					'shakeX' => esc_html__( 'shakeX', 'panpie-core' ),
					'shakeY' => esc_html__( 'shakeY', 'panpie-core' ),
					'headShake' => esc_html__( 'headShake', 'panpie-core' ),
					'swing' => esc_html__( 'swing', 'panpie-core' ),					
					'fadeIn' => esc_html__( 'fadeIn', 'panpie-core' ),
					'fadeInDown' => esc_html__( 'fadeInDown', 'panpie-core' ),
					'fadeInLeft' => esc_html__( 'fadeInLeft', 'panpie-core' ),
					'fadeInRight' => esc_html__( 'fadeInRight', 'panpie-core' ),
					'fadeInUp' => esc_html__( 'fadeInUp', 'panpie-core' ),					
					'bounceIn' => esc_html__( 'bounceIn', 'panpie-core' ),
					'bounceInDown' => esc_html__( 'bounceInDown', 'panpie-core' ),
					'bounceInLeft' => esc_html__( 'bounceInLeft', 'panpie-core' ),
					'bounceInRight' => esc_html__( 'bounceInRight', 'panpie-core' ),
					'bounceInUp' => esc_html__( 'bounceInUp', 'panpie-core' ),			
					'slideInDown' => esc_html__( 'slideInDown', 'panpie-core' ),
					'slideInLeft' => esc_html__( 'slideInLeft', 'panpie-core' ),
					'slideInRight' => esc_html__( 'slideInRight', 'panpie-core' ),
					'slideInUp' => esc_html__( 'slideInUp', 'panpie-core' ), 
                ),
				'default' => 'fadeInRight',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'delay',
				'label'   => esc_html__( 'Delay', 'panpie-core' ),
				'default' => '0.50s',
				'description' => esc_html__( 'Use delay 0.50s default', 'panpie-core' ),
			),
			
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'duration',
				'label'   => esc_html__( 'duration', 'panpie-core' ),
				'default' => '2s',
				'description' => esc_html__( 'Use delay 2s default', 'panpie-core' ),
			),
			
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'left_position',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Left Shape Position', 'panpie-core' ),
				'selectors' => array(
				  '{{WRAPPER}} .rt-animate-image .left-holder' => 'top: {{VALUE}}px',
				),
				'default' => '100',
				'description' => esc_html__( 'Use unit px', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'right_position',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Right Shape Position', 'panpie-core' ),
				'selectors' => array(
				  '{{WRAPPER}} .rt-animate-image .right-holder' => 'top: {{VALUE}}px',
				),
				'default' => '100',
				'description' => esc_html__( 'Use unit px', 'panpie-core' ),
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
			case 'style4':
			$template = 'shape-animation-4';
			break;
			case 'style3':
			$template = 'shape-animation-3';
			break;
			case 'style2':
			$template = 'shape-animation-2';
			break;
			default:
			$template = 'shape-animation-1';
			break;
		}
		
		$this->rt_load_scripts();
	
		return $this->rt_template( $template, $data );
	}
}