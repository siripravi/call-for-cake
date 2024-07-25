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

class Split_Slider extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'Split Slider', 'panpie-core' );
		$this->rt_base = 'rt-split-slider';
		parent::__construct( $data, $args );
	}
		
	private function rt_load_scripts(){
		wp_enqueue_style( 'multiscroll' );
		wp_enqueue_script( 'multiscroll' );
		wp_enqueue_script( 'rt-easings' );
	}

	public function rt_fields(){
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'item_title', [
				'type' => Controls_Manager::TEXTAREA,
				'label'   => esc_html__( 'Title', 'panpie-core' ),
				'default' => esc_html__( 'THE CRISPY TASTE OF PIZZA', 'panpie-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'multi_button_text', [
				'type' => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Button Text', 'panpie-core' ),
				'default' => esc_html__( 'ORDER NOW', 'panpie-core' ),
				'label_block' => true,
			]
		);		
		$repeater->add_control(
			'multi_button_url', [
				'type' => Controls_Manager::URL,
				'label' => esc_html__( 'Link (Optional)', 'panpie-core' ),
				'placeholder' => 'https://your-link.com',
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'image', [
				'type' => Controls_Manager::MEDIA,
				'label'   => esc_html__( 'Image', 'panpie-core' ),
				'description' => esc_html__( 'Recommended image size full', 'panpie-core' ),
				'label_block' => true,
			]
		);
		
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'panpie-core' ),
			),			
			/*Split Slider( tab Multi )*/
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'split_item_lists',
				'label'   => esc_html__( 'Add as many item as you want', 'panpie-core' ),
				'fields' => $repeater->get_controls(),
				'default' => [
					['title' => esc_html__('THE CRISPY TASTE OF PIZZA', 'panpie-core' ) ],
					['title' => esc_html__('THE CRISPY TASTE OF PIZZA', 'panpie-core' ) ],
					['title' => esc_html__('THE CRISPY TASTE OF PIZZA', 'panpie-core' ) ],
		       ],
			),
			
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'followus',
				'label'   => esc_html__( 'Follow Us', 'panpie-core' ),
				'default' => esc_html__( 'Follow Us On :', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'facebook',
				'label'   => esc_html__( 'Facebook URL', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'twitter',
				'label'   => esc_html__( 'Twitter URL', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'linkedin',
				'label'   => esc_html__( 'Linkedin URL', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'goplus',
				'label'   => esc_html__( 'Google Plus URL', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'instagram',
				'label'   => esc_html__( 'Instagram URL', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'whatsapp',
				'label'   => esc_html__( 'Whatsapp URL', 'panpie-core' ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'youtube',
				'label'   => esc_html__( 'Youtube URL', 'panpie-core' ),
			),
			
			array(
				'mode' => 'section_end',
			),
			/*Style*/
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Style', 'panpie-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'panpie-core' ),
				'selector' => '{{WRAPPER}} .multiscroll-wrapper .ms-left .left-slide1 .item-title',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'copyright',
				'label'       => esc_html__( 'Copyright', 'panpie-core' ),
				'label_on'    => esc_html__( 'On', 'panpie-core' ),
				'label_off'   => esc_html__( 'Off', 'panpie-core' ),
				'default'     => 'yes',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'split_shape',
				'label'       => esc_html__( 'Background Shape', 'panpie-core' ),
				'label_on'    => esc_html__( 'On', 'panpie-core' ),
				'label_off'   => esc_html__( 'Off', 'panpie-core' ),
				'default'     => 'yes',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'footer_info',
				'label'       => esc_html__( 'Footer Info', 'panpie-core' ),
				'label_on'    => esc_html__( 'On', 'panpie-core' ),
				'label_off'   => esc_html__( 'Off', 'panpie-core' ),
				'default'     => 'yes',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'preloader',
				'label'       => esc_html__( 'Preloader', 'panpie-core' ),
				'label_on'    => esc_html__( 'On', 'panpie-core' ),
				'label_off'   => esc_html__( 'Off', 'panpie-core' ),
				'default'     => 'yes',
			),
			array(
				'mode' => 'section_end',
			),
			
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		
		$this->rt_load_scripts();
		$template = 'split-slider';

		return $this->rt_template( $template, $data );
	}
}