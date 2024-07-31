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

class Text_With_Button extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Title Text With Button', 'panpie-core' );
		$this->rt_base = 'rt-text-with-button';
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
				'label'   => esc_html__( 'Text Style', 'panpie-core' ),
				'options' => array(
					'style1' => esc_html__( 'Text Style 1' , 'panpie-core' ),
					'style2' => esc_html__( 'Text Style 2', 'panpie-core' ),
					'style3' => esc_html__( 'Text Style 3', 'panpie-core' ),
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
				'condition'   => array( 'style' => array( 'style1', 'style2' ) ),
			),
			/*animation*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation_offon',
				'label'   => esc_html__( 'Animation off / on', 'panpie-core' ),
				'options' => array(
					'wow_no' => esc_html__( 'Off' , 'panpie-core' ),
					'wow' => esc_html__( 'On', 'panpie-core' ),
				),
				'default' => 'wow',
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation',
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
				'condition'   => array( 'style' => array( 'style3' ) ),
				'condition'   => array('animation_offon' => array( 'wow' ),'style' => array( 'style3' ) ),
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
			   'condition'   => array( 'style' => array( 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon_class',
				'label'   => esc_html__( 'Icon', 'panpie-core' ),
				'default' => array(
			      'value' => 'fas fa-smile-wink',
			      'library' => 'fa-solid',
			  ),	
			  'condition'   => array('icontype' => array( 'icon' ),'style' => array( 'style3' ) ),
			),	
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'icon_image',
				'label'   => esc_html__( 'Image', 'panpie-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'condition'   => array('icontype' => array( 'image' ),'style' => array( 'style3' ) ),
				'description' => esc_html__( 'Recommended full image', 'panpie-core' ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'panpie-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',		
				'condition'   => array('icontype' => array( 'image' ),'style' => array( 'style3' ) ),
			),
			/*Icon end*/
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'panpie-core' ),
				'default' => esc_html__( 'Wellcome To Panpie', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'sub_title',
				'label'   => esc_html__( 'Sub Title', 'panpie-core' ),
				'default' => esc_html__('ABOUT US', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'panpie-core' ),
				'default' => esc_html__('Lorem Ipsum has been the industrys standard dummy text ever since printer took a galley. Rimply dummy text of the printing and typesetting industry', 'panpie-core' ),
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'button_style',
				'label'   => esc_html__( 'Button Style', 'panpie-core' ),
				'options' => array(
					'panpie-button-1'   => esc_html__( 'Button 1', 'panpie-core' ),
					'panpie-button-2'   => esc_html__( 'Button 2', 'panpie-core' ),
				),
				'default' => 'panpie-button-1',
				'condition'   => array( 'button_display' => array( 'yes' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'button_one',
				'label'   => esc_html__( 'Button Text', 'panpie-core' ),
				'default' => esc_html__( 'Read More', 'panpie-core' ),
				'condition'   => array( 'button_display' => array( 'yes' ) ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'one_buttonurl',
				'label'   => esc_html__( 'Button URL', 'panpie-core' ),
				'placeholder' => 'https://your-link.com',
				'condition'   => array( 'button_display' => array( 'yes' ) ),
			),
			
			array(
				'mode' => 'section_end',
			),
			// Title style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_title_style',
				'label'   => esc_html__( 'Title Typo', 'panpie-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'panpie-core' ),
				'selector' => '{{WRAPPER}} .title-text-button .rtin-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .title-text-button .rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_bar_color',
				'label'   => esc_html__( 'Title Bar Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .barshow .title-bar' => 'background: {{VALUE}}',
				),
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
				'selector' => '{{WRAPPER}} .title-text-button .subtitle',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_color',
				'label'   => esc_html__( 'Sub Title Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .title-text-button .subtitle' => 'color: {{VALUE}}',
				),
			),		
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'sub_title_margin',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Sub Title Space', 'panpie-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .title-text-button .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode' => 'section_end',
			),
			// Text style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_text_style',
				'label'   => esc_html__( 'Text style', 'panpie-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'text_typo',
				'label'   => esc_html__( 'Text Typo', 'panpie-core' ),
				'selector' => '{{WRAPPER}} .title-text-button .rtin-content',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .title-text-button .rtin-content' => 'color: {{VALUE}}',
					'{{WRAPPER}} .title-text-button ul li' => 'color: {{VALUE}}',
				),
			),		
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'content_margin',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Content Space', 'panpie-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .title-text-button .rtin-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
			case 'style3':
			$template = 'text-with-button-3';
			break;
			case 'style2':
			$template = 'text-with-button-2';
			break;
			default:
			$template = 'text-with-button-1';
			break;
		}
	
		return $this->rt_template( $template, $data );
	}
}