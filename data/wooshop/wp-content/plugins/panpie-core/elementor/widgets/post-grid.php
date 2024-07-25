<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Post_Grid extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Post Grid', 'panpie-core' );
		$this->rt_base = 'rt-post-grid';
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
		$categories = get_categories();
		$category_dropdown = array( '0' => esc_html__( 'All Categories', 'panpie-core' ) );

		foreach ( $categories as $category ) {
			$category_dropdown[$category->term_id] = $category->name;
		}
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
					'style1' => esc_html__( 'Post Layout 1', 'panpie-core' ),
					'style2' => esc_html__( 'Post Layout 2', 'panpie-core' ),
					'style3' => esc_html__( 'Post Layout 3', 'panpie-core' ),
					'style4' => esc_html__( 'Post Layout 4', 'panpie-core' ),
				),
				'default' => 'style1',
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
				'id'      => 'post_orderby',
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'cat',
				'label'   => esc_html__( 'Categories', 'panpie-core' ),
				'options' => $category_dropdown,
				'default' => '0',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'count',
				'label'   => esc_html__( 'Word count', 'panpie-core' ),
				'default' => 20,
				'description' => esc_html__( 'Maximum number of words', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'itemlimit',
				'label'   => esc_html__( 'Item Limit', 'panpie-core' ),
				'default' => 3,
				'description' => esc_html__( 'Maximum number of words', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_count',
				'label'   => esc_html__( 'Title count', 'panpie-core' ),
				'default' => 15,
				'description' => esc_html__( 'Maximum number of words', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'small_title_count',
				'label'   => esc_html__( 'Small Title count', 'panpie-core' ),
				'default' => 6,
				'description' => esc_html__( 'Maximum number of words', 'panpie-core' ),
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_display',
				'label'       => esc_html__( 'Content Display', 'panpie-core' ),
				'label_on'    => esc_html__( 'Show', 'panpie-core' ),
				'label_off'   => esc_html__( 'Hide', 'panpie-core' ),
				'default'     => 'no',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'read_display',
				'label'       => esc_html__( 'Read More Display', 'panpie-core' ),
				'label_on'    => esc_html__( 'Show', 'panpie-core' ),
				'label_off'   => esc_html__( 'Hide', 'panpie-core' ),
				'default'     => 'yes',
				'condition'   => array( 'style' => array( 'style2', 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'buttontext',
				'label'   => esc_html__( 'Button Text', 'panpie-core' ),
				'default' => esc_html__( 'READ MORE', 'panpie-core' ),
				'condition'   => array( 'read_display' =>'yes', 'style' => array( 'style2', 'style4' ) ),
			),
			array(
				'mode' => 'section_end',
			),
			// Option
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Option', 'panpie-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_grid_author',
				'label'       => esc_html__( 'Show Author Name', 'panpie-core' ),
				'label_on'    => esc_html__( 'Show', 'panpie-core' ),
				'label_off'   => esc_html__( 'Hide', 'panpie-core' ),
				'default'     => 'no',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_grid_date',
				'label'       => esc_html__( 'Show Date', 'panpie-core' ),
				'label_on'    => esc_html__( 'Show', 'panpie-core' ),
				'label_off'   => esc_html__( 'Hide', 'panpie-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_grid_category',
				'label'       => esc_html__( 'Show Categories', 'panpie-core' ),
				'label_on'    => esc_html__( 'Show', 'panpie-core' ),
				'label_off'   => esc_html__( 'Hide', 'panpie-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_grid_comment',
				'label'       => esc_html__( 'Show Comment Number', 'panpie-core' ),
				'label_on'    => esc_html__( 'Show', 'panpie-core' ),
				'label_off'   => esc_html__( 'Hide', 'panpie-core' ),
				'default'     => 'no',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_grid_view',
				'label'       => esc_html__( 'Show Views', 'panpie-core' ),
				'label_on'    => esc_html__( 'Show', 'panpie-core' ),
				'label_off'   => esc_html__( 'Hide', 'panpie-core' ),
				'default'     => 'no',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_grid_read',
				'label'       => esc_html__( 'Show Reading Length', 'panpie-core' ),
				'label_on'    => esc_html__( 'Show', 'panpie-core' ),
				'label_off'   => esc_html__( 'Hide', 'panpie-core' ),
				'default'     => 'no',
			),
			array(
				'mode' => 'section_end',
			),

			// Responsive Columns
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_responsive',
				'label'   => esc_html__( 'Number of Responsive Columns', 'panpie-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xl',
				'label'   => esc_html__( 'Desktops: > 1199px', 'panpie-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_lg',
				'label'   => esc_html__( 'Desktops: > 991px', 'panpie-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_md',
				'label'   => esc_html__( 'Tablets: > 767px', 'panpie-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_sm',
				'label'   => esc_html__( 'Phones: > 576px', 'panpie-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col',
				'label'   => esc_html__( 'Phones: < 576px', 'panpie-core' ),
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
		
		switch ( $data['style'] ) {
			case 'style4':
			$template = 'post-grid-4';
			break;
			case 'style3':
			$template = 'post-grid-3';
			break;
			case 'style2':
			$template = 'post-grid-2';
			break;
			default:
			$template = 'post-grid-1';
			break;
		}
		
		return $this->rt_template( $template, $data );
	}
}