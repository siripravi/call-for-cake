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

class Pricing_Table extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Pricing Table', 'panpie-core' );
		$this->rt_base = 'rt-pricing-table';
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
				'id'      => 'layout',
				'label'   => esc_html__( 'Layout', 'panpie-core' ),
				'options' => array(
					'layout1' => esc_html__( 'Layout 1', 'panpie-core' ),
					'layout2' => esc_html__( 'Layout 2', 'panpie-core' ),
				),
				'default' => 'layout1',
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'panpie-core' ),
				'default' => esc_html__( 'Basic', 'panpie-core' ),
			),			
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'price',
				'label'   => esc_html__( 'Price', 'panpie-core' ),
				'default' => '39',
				'description' => esc_html__( "Including currency sign eg. $59", 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'price_symbol',
				'label'   => esc_html__( 'Price Symbol', 'panpie-core' ),
				'default' => '$',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'unit',
				'label'   => esc_html__( 'Unit Name', 'panpie-core' ),
				'default' => esc_html__( 'month', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'features',
				'label'   => esc_html__( 'Features', 'panpie-core' ),
				'default' => esc_html__( 'One line per feature', 'panpie-core' ),
				'description' => esc_html__( "One line per feature. Put BLANK keyword if you want blank line. eg.<br/>Investment Plan</br>Education Loan</br>Tax Planning</br>BLANK", 'panpie-core' ),
			),
			array(
				'type'  => Controls_Manager::URL,
				'id'    => 'url',
				'label' => esc_html__( 'Link (Optional)', 'panpie-core' ),
				'placeholder' => 'https://your-link.com',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'buttontext',
				'label'   => esc_html__( 'Button Text', 'panpie-core' ),
				'default' => esc_html__( 'Subscribe Now', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'display_active',
				'label'   => esc_html__( 'Display Active', 'panpie-core' ),
				'options' => array(
					'common-class' => esc_html__( 'Common Price Table', 'panpie-core' ),
					'active-class'  => esc_html__( 'Active Price Table', 'panpie-core' ),
				),
				'default' => 'common-class',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'offer_active',
				'label'   => esc_html__( 'Display Offer', 'panpie-core' ),
				'options' => array(
					'offer-active' 		=> esc_html__( 'Offer Active', 'panpie-core' ),
					'offer-inactive'  	=> esc_html__( 'Offer Inactive', 'panpie-core' ),
				),
				'default' => 'offer-inactive',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'offertext',
				'label'   => esc_html__( 'Button Text', 'panpie-core' ),
				'default' => esc_html__( 'Popular Sale!', 'panpie-core' ),
				'condition'   => array( 'offer_active' => array( 'offer-active' ) ),
			),
			
			array(
				'mode' => 'section_end',
			),
			
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_style',
				'label'       => esc_html__( 'Style', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bgcolor',
				'label'   => esc_html__( 'Background Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .rt-price-table-box' => 'background: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .rt-price-table-box' => 'background: {{VALUE}}',
				),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'panpie-core' ),
				'selector' => '{{WRAPPER}} .default-pricing .price-header .rtin-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .price-header .rtin-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .price-header .rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .rt-price-table-box ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .rt-price-table-box ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout1 .rtin-price .price-unit' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .rtin-price .price-unit' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout1 .rtin-price .price-symbol' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'price_color',
				'label'   => esc_html__( 'Price Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .rtin-pricing-price .rtin-price' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .rtin-pricing-price .rtin-price' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_icon_color',
				'label'   => esc_html__( 'Content Icon Color', 'panpie-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .rt-price-table-box ul li:before' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .rt-price-table-box ul li:before' => 'color: {{VALUE}}',
				),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}
	
	private function validate( $str ){
			$str = trim( $str );
			// replace BLANK keyword
			if ( strtolower( $str ) == 'blank'  ) {
				return '&nbsp;';
			}
			return $str;
		}

	protected function render() {
		
		$data = $this->get_settings();
			
		$features = strip_tags( $data['features'] ); // remove tags
		$features = preg_split( "/\R/", $data['features'] ); // string to array
		$features = array_map( array( $this, 'validate' ),  $features ); // validate

		$data['features'] = $features;
		
		$template = 'pricing-table';
		
		switch ( $data['layout'] ) {
			case 'layout2':
			$template = 'pricing-table-2';
			break;
			default:
			$template = 'pricing-table-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}