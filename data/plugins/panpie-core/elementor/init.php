<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;
use Elementor\Plugin;
use PanpieTheme_Helper;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Custom_Widget_Init {

	public function __construct() {
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'init' ) );
		add_action( 'elementor/elements/categories_registered', array( $this, 'widget_categoty' ) );
		
		/*ajax actions*/
		add_filter( 'elementor/icons_manager/additional_tabs',  [$this, 'additional_tabs'], 10, 1 );
		add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'after_enqueue_styles_elementor_editor' ), 10, 1 );
	}
	
	public function after_enqueue_styles_elementor_editor()	{
		wp_enqueue_style( 'flaticon', \PanpieTheme_Helper::get_font_css( 'flaticon' ) );		
	}

	public function init() {
		require_once __DIR__ . '/base.php';
		
		// Widgets -- filename=>classname /@dev
		$widgets1 = array(
			'title'           		=> 'Title',
			'text-with-button'      => 'Text_With_Button',
			'about-image-text'      => 'About_Image_Text',
			'info-box'        		=> 'Info_Box',
			'cta'             		=> 'CTA',
			'rt-button'            => 'RT_Button',
			'contact-info'         	=> 'Contact_Info',
			'contact-address'       => 'Contact_Address',
			'progress-circle'       => 'Progress_Circle',
			'progress-bar'          => 'Progress_Bar',
			'counter'               => 'Counter',
			'post-grid'       		=> 'Post_Grid',
			'post-slider'       	=> 'Post_Slider',
			'rt-team'       	    => 'RT_Team',
			'event'     			=> 'RT_Event',
			'gallery'     			=> 'RT_Gallery',
			'testimonial'       	=> 'Testimonial',
			'logo-slider'       	=> 'Logo_Slider',
			'pricing-table'       	=> 'Pricing_Table',
			'nav-menu'        		=> 'Nav_Menu',
			'video'         	    => 'Video',
			'image'      			=> 'Image',
			'banner-add'      		=> 'Banner_Add',
			'shape-animation'       => 'Shape_Animation',
			'split-slider'          => 'Split_Slider',
		);
		
		$widgets2 = array();
			if ( class_exists( 'WooCommerce' ) ) {
			$widgets2 = array(
				'woo-layout'      		=> 'Woo_Product_Layout',
				'woo-category-box' 		=> 'Woo_Cat_Box',
			);
		}

		$widgets = array_merge( $widgets1, $widgets2 );
		
		foreach ( $widgets as $widget => $class ) {
			$template_name = "/elementor-custom/widgets/{$widget}.php";
			if ( file_exists( STYLESHEETPATH . $template_name ) ) {
				$file = STYLESHEETPATH . $template_name;
			}
			elseif ( file_exists( TEMPLATEPATH . $template_name ) ) {
				$file = TEMPLATEPATH . $template_name;
			}
			else {
				$file = __DIR__ . '/widgets/' . $widget. '.php';
			}

			require_once $file;
			
			$classname = __NAMESPACE__ . '\\' . $class;
			Plugin::instance()->widgets_manager->register_widget_type( new $classname );
		}
	}

	public function widget_categoty( $class ) {
		$id         = PANPIE_CORE_THEME_PREFIX . '-widgets'; // Category /@dev
		$properties = array(
			'title' => __( 'RadiusTheme Elements', 'panpie-core' ),
		);

		Plugin::$instance->elements_manager->add_category( $id, $properties );
	}
	
	public function custom_icon_for_elementor( $controls_registry )
	{
		// Get existing icons
		$icons = $controls_registry->get_control( 'icon' )->get_settings( 'options' );
		// Append new icons		
		$flaticons = PanpieTheme_Helper::get_flaticon_icons();
		// Then we set a new list of icons as the options of the icon control
		$new_icons = array_merge($flaticons, $icons);
		$controls_registry->get_control( 'icon' )->set_settings( 'options', $new_icons );
	}

	public function additional_tabs($tabs)
      {
        $json_url = PanpieTheme_Helper::get_asset_file('json/flaticon.json');

        $flaticon = [
          'name'          => 'flaticon',
          'label'         => esc_html__( 'Panpie Icon', 'panpie-core' ),
          'url'           => false,
          'enqueue'       => false,
          'prefix'        => '',
          'displayPrefix' => '',
          'labelIcon'     => 'fab fa-font-awesome-alt',
          'ver'           => '1.0.0',
          'fetchJson'     => $json_url,
        ];
        array_push( $tabs, $flaticon);

        return $tabs;
      }

}

new Custom_Widget_Init();