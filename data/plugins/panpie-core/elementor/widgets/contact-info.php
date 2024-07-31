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

class Contact_Info extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Contact Info', 'panpie-core' );
		$this->rt_base = 'rt-contact-info';
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
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'panpie-core' ),
				'default' => esc_html__( 'Contact Information', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'panpie-core' ),
				'default' => esc_html__( 'Lorem Ipsum hasbeen standard daand scrambled. Rimply dummy text of the printing and typesetting industry', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'address',
				'label'   => esc_html__( 'Address', 'panpie-core' ),
				'default' => esc_html__( '29 Street, Melbourne City, Australia # 34 Road, House #10.', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'phone1',
				'label'   => esc_html__( 'Phone 1', 'panpie-core' ),
				'default' => '+0000000000',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'phone2',
				'label'   => esc_html__( 'Phone 2', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'email',
				'label'   => esc_html__( 'Email', 'panpie-core' ),
				'default' => 'info@example.com',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'fax',
				'label'   => esc_html__( 'Fax', 'panpie-core' ),
				'default' => '+0000000000',
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
				'selector' => '{{WRAPPER}} .rtin-contact-info .rtin-title',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'label'   => esc_html__( 'Icon Size', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-contact-info ul li i' => 'font-size: {{VALUE}}px',
				),
			),			
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-contact-info ul li i' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-contact-info .rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'info_color',
				'label'   => esc_html__( 'Info Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-contact-info ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-contact-info ul li a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-contact-info .rtin-text' => 'color: {{VALUE}}',
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

		$template = 'contact-info';

		return $this->rt_template( $template, $data );
	}
}