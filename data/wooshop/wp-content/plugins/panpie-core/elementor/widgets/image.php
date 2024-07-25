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
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class Image extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Image', 'panpie-core' );
		$this->rt_base = 'rt-image';
		parent::__construct( $data, $args );
	}
	
	private function rt_load_scripts(){
		wp_enqueue_script( 'parallax-scroll' );
	}	
	private function rt_wow_load_scripts(){
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
					'style5' => esc_html__( 'Style 5', 'panpie-core' ),
					'style6' => esc_html__( 'Style 6', 'panpie-core' ),
					'style7' => esc_html__( 'Style 7', 'panpie-core' ),
					'style8' => esc_html__( 'Style 8', 'panpie-core' ),
					'style9' => esc_html__( 'Style 9', 'panpie-core' ),
					'style10' => esc_html__( 'Style 10', 'panpie-core' ),
					'style11' => esc_html__( 'Style 11', 'panpie-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'rt_image',
				'label'   => esc_html__( 'Image', 'panpie-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'rt_image2',
				'label'   => esc_html__( 'Animate Image ', 'panpie-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'panpie-core' ),
				'condition'   => array( 'style' => array( 'style2', 'style5', 'style8', 'style10' , 'style11' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'rt_image3',
				'label'   => esc_html__( 'Animate Image ', 'panpie-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'panpie-core' ),
				'condition'   => array( 'style' => array( 'style2', 'style8', 'style10', 'style11' ) ),
			),			
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'panpie-core' ),
				'default' => esc_html__( 'Burger', 'panpie-core' ),
				'condition'   => array( 'style' => array( 'style9' ) ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'panpie-core' ),
				'selector' => '{{WRAPPER}} .image-style9 .rtin-image .rtin-title',
				'condition'   => array( 'style' => array( 'style9' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .image-style9 .rtin-image .rtin-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .image-style9 .rtin-image .rtin-title a' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style9' ) ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'panpie-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',		
			),			
			array(
				'type'  => Controls_Manager::URL,
				'id'    => 'url',
				'label' => esc_html__( 'Link (Optional)', 'panpie-core' ),
				'placeholder' => 'https://your-link.com',
			),
			
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'border_radius',
				'label'   => esc_html__( 'Border Radius', 'panpie-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rtin-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),			
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'range',
				'label'   => esc_html__( 'Vertical Range', 'panpie-core' ),
				'default' => '200',
				'condition'   => array( 'style' => array( 'style3' ) ),
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
			case 'style11':
			$this->rt_wow_load_scripts();
			$template = 'image-11';
			break;
			case 'style10':
			$this->rt_wow_load_scripts();
			$template = 'image-10';
			break;
			case 'style9':
			$template = 'image-9';
			break;
			case 'style8':
			$this->rt_load_scripts();
			$template = 'image-8';
			break;
			case 'style7':
			$template = 'image-7';
			break;
			case 'style6':
			$this->rt_load_scripts();
			$template = 'image-6';
			break;
			case 'style5':
			$this->rt_load_scripts();
			$template = 'image-5';
			break;
			case 'style4':
			$template = 'image-4';
			break;
			case 'style3':
			$this->rt_load_scripts();
			$template = 'image-3';
			break;
			case 'style2':
			$this->rt_wow_load_scripts();
			$template = 'image-2';
			break;
			default:
			$template = 'image-1';
			break;
		}
	
		return $this->rt_template( $template, $data );
	}
}