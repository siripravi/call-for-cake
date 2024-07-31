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

class RT_Event extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Event', 'panpie-core' );
		$this->rt_base = 'rt-event';
		$this->rt_translate = array(
			'cols'  => array(
				'12' => esc_html__( '1 Col', 'panpie-core' ),
				'6'  => esc_html__( '2 Col', 'panpie-core' ),
				'4'  => esc_html__( '3 Col', 'panpie-core' ),
				'3'  => esc_html__( '4 Col', 'panpie-core' ),
				'2'  => esc_html__( '6 Col', 'panpie-core' ),
			),
		);
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		
		$terms  = get_terms( array( 'taxonomy' => 'panpie_event_category', 'fields' => 'id=>name' ) );
		$category_dropdown = array( '0' => __( 'Please Selecet category', 'panpie-core' ) );

		foreach ( $terms as $id => $name ) {
			$category_dropdown[$id] = $name;
		}
		
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
					'layout1' => esc_html__( 'Event 1', 'panpie-core' ),
					'layout2' => esc_html__( 'Event 2', 'panpie-core' ),
				),
				'default' => 'layout1',
			),
			array (
				'type'      => Controls_Manager::SELECT2,
				'id'        => 'cat_single',
				'label'     => esc_html__( 'Categories', 'zugan-core' ),
				'options'   => $category_dropdown,
				'default'   => '0',
				'multiple'  => false,
			),
			/*Post Order*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'post_ordering',
				'label'   => esc_html__( 'Post Ordering', 'panpie-core' ),
				'options' => array(
					'DESC'	=> esc_html__( 'Desecending', 'panpie-core' ),
					'ASC'	=> esc_html__( 'Ascending', 'panpie-core' ),
				),
				'default' => 'DESC',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'orderby',
				'label'   => esc_html__( 'Post Sorting', 'panpie-core' ),				
				'options' => array(
					'recent' 		=> esc_html__( 'Recent Post', 'panpie-core' ),
					'rand' 			=> esc_html__( 'Random Post', 'panpie-core' ),
					'menu_order' 	=> esc_html__( 'Custom Order', 'panpie-core' ),
					'title' 		=> esc_html__( 'By Name', 'panpie-core' ),
				),
				'default' => 'recent',
			),			
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'posts_not_in',
				'label'   => esc_html__( 'Enter Post ID that will not display', 'panpie-core' ),
				'fields'  => array(
					array(
						'type'    => Controls_Manager::NUMBER,
						'name'    => 'post_not_in',
						'label'   => esc_html__( 'Post ID', 'panpie-core' ),
						'default' => '0',
					),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'column_no_gutters',
				'label'   => esc_html__( 'Display column gap', 'panpie-core' ),
				'options' => array(
					'show'        => esc_html__( 'Gap', 'panpie-core' ),
					'hide'        => esc_html__( 'No Gap', 'panpie-core' ),
				),
				'default' => 'show',
				'condition'   => array( 'layout' => array( 'layout1' ) ),
			),
			
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'column_no_gutters2',
				'label'   => esc_html__( 'Display column gap', 'panpie-core' ),
				'options' => array(
					'show'        => esc_html__( 'Normal', 'panpie-core' ),
					'hide'        => esc_html__( 'Gutters 5', 'panpie-core' ),
				),
				'default' => 'hide',
				'condition'   => array( 'layout' => array( 'layout2' ) ),
			),
			
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'itemnumber',
				'label'   => esc_html__( 'Item Number', 'panpie-core' ),
				'default' => -1,
				'description' => esc_html__( 'Use -1 for showing all items( Showing items per category )', 'panpie-core' ),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Item Title Typo', 'panpie-core' ),
				'selector' => '{{WRAPPER}} .event-default .rtin-item h3',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_count',
				'label'   => esc_html__( 'Title Word count', 'panpie-core' ),
				'default' => 5,
				'description' => esc_html__( 'Maximum number of words', 'panpie-core' ),				
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'excerpt_display',
				'label'       => esc_html__( 'Excerpt/Content Display', 'panpie-core' ),
				'label_on'    => esc_html__( 'Show', 'panpie-core' ),
				'label_off'   => esc_html__( 'Hide', 'panpie-core' ),
				'default'     => 'yes',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'excerpt_count',
				'label'   => esc_html__( 'Word count', 'panpie-core' ),
				'default' => 8,
				'description' => esc_html__( 'Maximum number of words', 'panpie-core' ),
				'condition'   => array( 'excerpt_display' =>'yes' ),
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'read_display',
				'label'       => esc_html__( 'Read More Display', 'panpie-core' ),
				'label_on'    => esc_html__( 'Show', 'panpie-core' ),
				'label_off'   => esc_html__( 'Hide', 'panpie-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'addres_display',
				'label'       => esc_html__( 'Address Display', 'panpie-core' ),
				'label_on'    => esc_html__( 'Show', 'panpie-core' ),
				'label_off'   => esc_html__( 'Hide', 'panpie-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'phone_display',
				'label'       => esc_html__( 'Phone Display', 'panpie-core' ),
				'label_on'    => esc_html__( 'Show', 'panpie-core' ),
				'label_off'   => esc_html__( 'Hide', 'panpie-core' ),
				'default'     => 'yes',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'more_button',
				'label'   => esc_html__( 'More Button', 'panpie-core' ),
				'options' => array(
					'show'        => esc_html__( 'Show Read More', 'panpie-core' ),
					'hide'        => esc_html__( 'Show Pagination', 'panpie-core' ),
				),
				'default' => 'show',				
			),
			array (
				'type'    => Controls_Manager::TEXT,
				'id'      => 'see_button_text',
				'label'   => esc_html__( 'Button Text', 'panpie-core' ),
				'condition'   => array( 'more_button' => array( 'show' ) ),
				'default' => esc_html__( 'MORE SERVICES', 'panpie-core' ),
			),
			array (
				'type'    => Controls_Manager::TEXT,
				'id'      => 'see_button_link',
				'label'   => esc_html__( 'Button Link', 'panpie-core' ),
				'condition'   => array( 'more_button' => array( 'show' ) ),
			),
			array(
				'mode' => 'section_end',
			),

			// Responsive Columns
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_responsive',
				'label'   => esc_html__( 'Number of Responsive Columns', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_lg',
				'label'   => esc_html__( 'Desktops: > 1199px', 'panpie-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_md',
				'label'   => esc_html__( 'Desktops: > 991px', 'panpie-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_sm',
				'label'   => esc_html__( 'Tablets: > 767px', 'panpie-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xs',
				'label'   => esc_html__( 'Phones: < 768px', 'panpie-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		switch ( $data['layout'] ) {
			case 'layout2':
			$template = 'event-2';
			break;
			default:
			$template = 'event-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}