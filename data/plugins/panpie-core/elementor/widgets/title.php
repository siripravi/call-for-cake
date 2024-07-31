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

if ( ! defined( 'ABSPATH' ) ) exit;

class Title extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Section Title', 'panpie-core' );
		$this->rt_base = 'rt-title';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'News Title', 'panpie-core' ),
			),
			/*box title*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Title Style', 'panpie-core' ),
				'options' => array(
					'style1' => esc_html__( 'Title Style 1' , 'panpie-core' ),
					'style2' => esc_html__( 'Title Style 2', 'panpie-core' ),
					'style3' => esc_html__( 'Title Style 3', 'panpie-core' ),
					'style4' => esc_html__( 'Title Style 4 ( left Bar )', 'panpie-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'content_align',
				'mode'    => 'responsive',
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
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'showhide',
				'label'   => esc_html__( 'Title Bar', 'panpie-core' ),
				'options' => array(
					'barshow'        => esc_html__( 'Show', 'panpie-core' ),
					'barhide'        => esc_html__( 'Hide', 'panpie-core' ),
				),
				'default' => 'barhide',
				'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
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
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon_class',
				'label'   => esc_html__( 'Icon', 'panpie-core' ),
				'default' => array(
			      'value' => 'fas fa-smile-wink',
			      'library' => 'fa-solid',
			  ),	
			  	'condition'   => array('icontype' => array( 'icon' ) ),
			),	
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'icon_image',
				'label'   => esc_html__( 'Image', 'panpie-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'condition'   => array('icontype' => array( 'image' ) ),
				'description' => esc_html__( 'Recommended full image', 'panpie-core' ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'panpie-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',		
				'condition'   => array('icontype' => array( 'image' ) ),
			),
			/*Icon end*/
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'panpie-core' ),
				'default' => 'Wellcome To Panpie',
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'sub_title',
				'label'   => esc_html__( 'Sub Title', 'panpie-core' ),
				'default' => esc_html__( 'SUB TITLE', 'panpie-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3' ) ),
			),			
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'panpie-core' ),
				'default' => esc_html__( 'Perspiciatis unde omnis iste natus error sit voluptatem accusantium dol oremque laudantium, totam remeaque ipsa.', 'panpie-core' ),
				'condition'   => array( 'style' => array( 'style2', 'style4' ) ),
			),
			/*Title Style Option*/			
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'panpie-core' ),
				'selector' => '{{WRAPPER}} .sec-title .rtin-title',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_title_typo',
				'label'   => esc_html__( 'Sub Title Style', 'panpie-core' ),
				'selector' => '{{WRAPPER}} .sec-title .sub-title',
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .sec-title .rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_bar_color',
				'label'   => esc_html__( 'Title Bar Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .barshow .title-bar' => 'background: {{VALUE}}',
					'{{WRAPPER}} .sec-title.style4 .rtin-title:after' => 'background: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1', 'style3', 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_color',
				'label'   => esc_html__( 'Sub Title Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .sec-title .sub-title' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .sec-title.style2 .rtin-text' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style2' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .sec-title .rtin-icon i' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
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
			$template = 'title-4';
			break;
			case 'style3':
			$template = 'title-3';
			break;
			case 'style2':
			$template = 'title-2';
			break;
			default:
			$template = 'title-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}