<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Nav_Menu extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'Navigation Manu', 'panpie-core' );
		$this->rt_base = 'rt-nav-menu';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		$menus = wp_get_nav_menus( array( 'orderby' => 'name', 'order' => 'ASC' ) );

		$menu_items      = array();
		$menu_items['0'] = __( '---Select---', 'panpie-pro' );
		foreach ( $menus as $menu ) {
			$menu_items[$menu->term_id] = $menu->name;
		}

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => __( 'General', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => __( 'Title', 'panpie-core' ),
				'default' => 'Title here ....',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'menu',
				'label'   => __( 'Navigation Manu', 'panpie-core' ),
				'options' => $menu_items,
				'default' => '0',
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$template = 'nav-menu';

		return $this->rt_template( $template, $data );
	}
}