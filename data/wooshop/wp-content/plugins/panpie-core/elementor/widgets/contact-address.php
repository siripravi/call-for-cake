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

class Contact_Address extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Contact Address', 'panpie-core' );
		$this->rt_base = 'rt-contact-address';
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
				'label'   => esc_html__( 'Address Style', 'panpie-core' ),
				'options' => array(
					'style1' => esc_html__( 'Style 1' , 'panpie-core' ),
					'style2' => esc_html__( 'Style 2', 'panpie-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'    => 'address_title',
				'label'   => esc_html__( 'Address Tile', 'panpie-core' ),
				'default' => esc_html__( 'Our Office Address', 'panpie-core' ),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'    => 'address_content',
				'label'   => esc_html__( 'Address Content', 'panpie-core' ),
				'default' => esc_html__( 'Worem Ipsum Nam nec tellus a odio tincidunt auctor. Proin gravida nibh vel velit auctor aliquet. Bendum auctor, nisi elit conseq aeuat ipsum, nec sagittis sem nibhety.', 'panpie-core' ),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array (
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'address_info',
				'label'   => esc_html__( 'Address', 'panpie-core' ),
				'fields'  => array(
					array(
						'type'    => Controls_Manager::TEXTAREA,
						'name'    => 'address_icon',
						'label'   => esc_html__( 'Address Icon', 'panpie-core' ),
						'default' => '<i class="fas fa-map-marker-alt"></i>',
					),
					array(
						'type'    => Controls_Manager::TEXT,
						'name'    => 'address_label',
						'label'   => esc_html__( 'Address Label', 'panpie-core' ),
						'default' => 'Office Name',
					),
					array(
						'type'    => Controls_Manager::TEXTAREA,
						'name'    => 'address_infos',
						'label'   => esc_html__( 'Add Address', 'panpie-core' ),
						'default' => 'City Hall<br>The Queen\'s Walk<br>London<br>SE1 2AA<br><a href="tel:01234564">0123456</a> ',
					),
				),
			),			
			array(
				'mode' => 'section_end',
			),			
			/*Style Option*/
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Style', 'panpie-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),			
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'panpie-core' ),
				'selector' => '{{WRAPPER}} .rtin-address-default .rtin-title',
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'label'   => esc_html__( 'Icon Size', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-address-default .rtin-item .rtin-icon i' => 'font-size: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-address-default .rtin-item .rtin-icon i' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-address-default .rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-address-default .rtin-content' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'label_color',
				'label'   => esc_html__( 'Label Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-address-default .rtin-address h3' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'info_color',
				'label'   => esc_html__( 'Info Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-address-default .rtin-address .rtin-info' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-address-default .rtin-address .rtin-info a' => 'color: {{VALUE}}',
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
			case 'style2':
			$template = 'contact-address-2';
			break;
			default:
			$template = 'contact-address-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}