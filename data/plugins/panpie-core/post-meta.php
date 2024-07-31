<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;

use PanpieTheme;
use PanpieTheme_Helper;
use \RT_Postmeta;

if ( ! defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'RT_Postmeta' ) ) {
	return;
}

$Postmeta = RT_Postmeta::getInstance();

$prefix = PANPIE_CORE_CPT_PREFIX;

/*-------------------------------------
#. Layout Settings
---------------------------------------*/
$nav_menus = wp_get_nav_menus( array( 'fields' => 'id=>name' ) );
$nav_menus = array( 'default' => __( 'Default', 'panpie-core' ) ) + $nav_menus;
$sidebars  = array( 'default' => __( 'Default', 'panpie-core' ) ) + PanpieTheme_Helper::custom_sidebar_fields();

$Postmeta->add_meta_box( "{$prefix}_page_settings", __( 'Layout Settings', 'panpie-core' ), array( 'page', 'post', 'panpie_team', 'panpie_event', 'panpie_gallery', 'panpie_testim' ), '', '', 'high', array(
	'fields' => array(
	
		"{$prefix}_layout_settings" => array(
			'label'   => __( 'Layouts', 'panpie-core' ),
			'type'    => 'group',
			'value'  => array(	
			
				"{$prefix}_layout" => array(
					'label'   => __( 'Layout', 'panpie-core' ),
					'type'    => 'select',
					'options' => array(
						'default'       => __( 'Default', 'panpie-core' ),
						'full-width'    => __( 'Full Width', 'panpie-core' ),
						'left-sidebar'  => __( 'Left Sidebar', 'panpie-core' ),
						'right-sidebar' => __( 'Right Sidebar', 'panpie-core' ),
					),
					'default'  => 'default',
				),		
				'panpie_sidebar' => array(
					'label'    => __( 'Custom Sidebar', 'panpie-core' ),
					'type'     => 'select',
					'options'  => $sidebars,
					'default'  => 'default',
				),
				"{$prefix}_page_menu" => array(
					'label'    => __( 'Main Menu', 'panpie-core' ),
					'type'     => 'select',
					'options'  => $nav_menus,
					'default'  => 'default',
				),
				"{$prefix}_tr_header" => array(
					'label'    	  => __( 'Transparent Header', 'panpie-core' ),
					'type'     	  => 'select',
					'options'  	  => array(
						'default' => __( 'Default', 'panpie-core' ),
						'on'      => __( 'Enabled', 'panpie-core' ),
						'off'     => __( 'Disabled', 'panpie-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_top_bar" => array(
					'label' 	  => __( 'Top Bar', 'panpie-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'panpie-core' ),
						'on'      => __( 'Enabled', 'panpie-core' ),
						'off'     => __( 'Disabled', 'panpie-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_top_bar_style" => array(
					'label' 	=> __( 'Top Bar Layout', 'panpie-core' ),
					'type'  	=> 'select',
					'options'	=> array(
						'default' => __( 'Default', 'panpie-core' ),
						'1'       => __( 'Layout 1', 'panpie-core' ),
						'2'       => __( 'Layout 2', 'panpie-core' ),
						'3'       => __( 'Layout 3', 'panpie-core' ),
					),
					'default'   => 'default',
				),
				"{$prefix}_header_opt" => array(
					'label' 	  => __( 'Header On/Off', 'panpie-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'panpie-core' ),
						'on'      => __( 'Enabled', 'panpie-core' ),
						'off'     => __( 'Disabled', 'panpie-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_header" => array(
					'label'   => __( 'Header Layout', 'panpie-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'panpie-core' ),
						'1'       => __( 'Layout 1', 'panpie-core' ),
						'2'       => __( 'Layout 2', 'panpie-core' ),
						'3'       => __( 'Layout 3', 'panpie-core' ),
						'4'       => __( 'Layout 4', 'panpie-core' ),
						'5'       => __( 'Layout 5', 'panpie-core' ),
						'6'       => __( 'Layout 6', 'panpie-core' ),
						'7'       => __( 'Layout 7', 'panpie-core' ),
						'8'       => __( 'Layout 8', 'panpie-core' ),
						'9'       => __( 'Layout 9', 'panpie-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_footer" => array(
					'label'   => __( 'Footer Layout', 'panpie-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'panpie-core' ),
						'1'       => __( 'Layout 1', 'panpie-core' ),
						'2'       => __( 'Layout 2', 'panpie-core' ),
						'3'       => __( 'Layout 3', 'panpie-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_footer_area" => array(
					'label' 	  => __( 'Footer Area', 'panpie-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'panpie-core' ),
						'on'      => __( 'Enabled', 'panpie-core' ),
						'off'     => __( 'Disabled', 'panpie-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_copyright_area" => array(
					'label' 	  => __( 'Copyright Area', 'panpie-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'panpie-core' ),
						'on'      => __( 'Enabled', 'panpie-core' ),
						'off'     => __( 'Disabled', 'panpie-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_top_padding" => array(
					'label'   => __( 'Content Padding Top', 'panpie-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'panpie-core' ),
						'0px'     => __( '0px', 'panpie-core' ),
						'10px'    => __( '10px', 'panpie-core' ),
						'20px'    => __( '20px', 'panpie-core' ),
						'30px'    => __( '30px', 'panpie-core' ),
						'40px'    => __( '40px', 'panpie-core' ),
						'50px'    => __( '50px', 'panpie-core' ),
						'60px'    => __( '60px', 'panpie-core' ),
						'70px'    => __( '70px', 'panpie-core' ),
						'80px'    => __( '80px', 'panpie-core' ),
						'90px'    => __( '90px', 'panpie-core' ),
						'100px'   => __( '100px', 'panpie-core' ),
						'110px'   => __( '110px', 'panpie-core' ),
						'120px'   => __( '120px', 'panpie-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_bottom_padding" => array(
					'label'   => __( 'Content Padding Bottom', 'panpie-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'panpie-core' ),
						'0px'     => __( '0px', 'panpie-core' ),
						'10px'    => __( '10px', 'panpie-core' ),
						'20px'    => __( '20px', 'panpie-core' ),
						'30px'    => __( '30px', 'panpie-core' ),
						'40px'    => __( '40px', 'panpie-core' ),
						'50px'    => __( '50px', 'panpie-core' ),
						'60px'    => __( '60px', 'panpie-core' ),
						'70px'    => __( '70px', 'panpie-core' ),
						'80px'    => __( '80px', 'panpie-core' ),
						'90px'    => __( '90px', 'panpie-core' ),
						'100px'   => __( '100px', 'panpie-core' ),
						'110px'   => __( '110px', 'panpie-core' ),
						'120px'   => __( '120px', 'panpie-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner" => array(
					'label'   => __( 'Banner', 'panpie-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'panpie-core' ),
						'on'	  => __( 'Enable', 'panpie-core' ),
						'off'	  => __( 'Disable', 'panpie-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_breadcrumb" => array(
					'label'   => __( 'Breadcrumb', 'panpie-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'panpie-core' ),
						'on'      => __( 'Enable', 'panpie-core' ),
						'off'	  => __( 'Disable', 'panpie-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner_type" => array(
					'label'   => __( 'Banner Background Type', 'panpie-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'panpie-core' ),
						'bgimg'   => __( 'Background Image', 'panpie-core' ),
						'bgcolor' => __( 'Background Color', 'panpie-core' ),
					),
					'default' => 'default',
				),
				"{$prefix}_banner_bgimg" => array(
					'label' => __( 'Banner Background Image', 'panpie-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'panpie-core' ),
				),
				"{$prefix}_banner_bgcolor" => array(
					'label' => __( 'Banner Background Color', 'panpie-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'panpie-core' ),
				),		
				"{$prefix}_page_bgimg" => array(
					'label' => __( 'Page/Post Background Image', 'panpie-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'panpie-core' ),
				),
				"{$prefix}_page_bgcolor" => array(
					'label' => __( 'Page/Post Background Color', 'panpie-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'panpie-core' ),
				),
			)
		)
	),
) );

/*-------------------------------------
#. Single Post Gallery
---------------------------------------*/

$Postmeta->add_meta_box( 'panpie_post_info', __( 'Post Info', 'panpie-core' ), array( 'post' ), '', '', 'high', array(
	'fields' => array(	
		'panpie_post_gallery' => array(
			'label' => __( 'Post Gallery', 'panpie-core' ),
			'type'  => 'gallery',
		),		
	),
) );

/*-------------------------------------
#. Team
---------------------------------------*/

$Postmeta->add_meta_box( 'panpie_team_settings', __( 'Team Member Settings', 'panpie-core' ), array( 'panpie_team' ), '', '', 'high', array(
	'fields' => array(
		'panpie_team_position' => array(
			'label' => __( 'Position', 'panpie-core' ),
			'type'  => 'text',
		),
		'panpie_team_experience' => array(
			'label' => __( 'Experience', 'panpie-core' ),
			'type'  => 'text',
		),
		'panpie_team_email' => array(
			'label' => __( 'Email', 'panpie-core' ),
			'type'  => 'text',
		),
		'panpie_team_phone' => array(
			'label' => __( 'Phone', 'panpie-core' ),
			'type'  => 'text',
		),
		'panpie_team_address' => array(
			'label' => __( 'Address', 'panpie-core' ),
			'type'  => 'text',
		),
		'panpie_team_socials_header' => array(
			'label' => __( 'Socials', 'panpie-core' ),
			'type'  => 'header',
			'desc'  => __( 'Enter your social links here', 'panpie-core' ),
		),
		'panpie_team_socials' => array(
			'type'  => 'group',
			'value'  => PanpieTheme_Helper::team_socials()
		),
	)
) );

$Postmeta->add_meta_box( 'panpie_team_skills', __( 'Team Member Skills', 'panpie-core' ), array( 'panpie_team' ), '', '', 'high', array(
	'fields' => array(
		'panpie_team_skill' => array(
			'type'  => 'repeater',
			'button' => __( 'Add New Skill', 'panpie-core' ),
			'value'  => array(
				'skill_name' => array(
					'label' => __( 'Skill Name', 'panpie-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. Marketing', 'panpie-core' ),
				),
				'skill_value' => array(
					'label' => __( 'Skill Percentage (%)', 'panpie-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. 75', 'panpie-core' ),
				),
				'skill_color' => array(
					'label' => __( 'Skill Color', 'panpie-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, primary color will be used', 'panpie-core' ),
				),
			)
		),
	)
) );
$Postmeta->add_meta_box( 'panpie_team_contact', __( 'Team Member Contact', 'panpie-core' ), array( 'panpie_team' ), '', '', 'high', array(
	'fields' => array(
		'panpie_team_contact_form' => array(
			'label' => __( 'Contct Shortcode', 'panpie-core' ),
			'type'  => 'text',
		),
	)
) );

/*-------------------------------------
#. Event
---------------------------------------*/

$Postmeta->add_meta_box( 'panpie_event_style_box', __( 'Event style', 'panpie-core' ), array( 'panpie_event' ), '', '', 'high', array(
	'fields' => array(
		"panpie_event_style" => array(
			'label'   => __( 'Event Template', 'panpie-core' ),
			'type'    => 'select',
			'options' => array(
				'default'  => __( 'Default', 'panpie-core' ),
				'style1'  => __( 'Style 1', 'panpie-core' ),
				'style2'  => __( 'Style 2', 'panpie-core' ),
			),
			'default'  => 'default',
		),
	),
) );
$Postmeta->add_meta_box( 'panpie_event_info', __( 'Event Info', 'panpie-core' ), array( 'panpie_event' ), '', '', 'high', array(
	'fields' => array(
		'panpie_event_title' => array(
			'label' => __( 'Event Title', 'panpie-core' ),
			'type'  => 'text',
		),
		'panpie_event_text' => array(
			'label' => __( 'Event Text', 'panpie-core' ),
			'type'  => 'textarea',
		),
		'panpie_event_address' => array(
			'label' => __( 'Address', 'panpie-core' ),
			'type'  => 'text',
		),
		'panpie_event_phone' => array(
			'label' => __( 'Phone', 'panpie-core' ),
			'type'  => 'text',
		),
		'panpie_event_mail' => array(
			'label' => __( 'Mail', 'panpie-core' ),
			'type'  => 'text',
		),
		'panpie_event_open' => array(
			'label' => __( 'Open Day', 'panpie-core' ),
			'type'  => 'text',
		),
		'panpie_event_button' => array(
			'label' => __( 'Event Button', 'panpie-core' ),
			'type'  => 'text',
		),
		'panpie_event_url' => array(
			'label' => __( 'Event Button Url', 'panpie-core' ),
			'type'  => 'text',
		),
	),
) );

/*-------------------------------------
#. Gallery
---------------------------------------*/
$Postmeta->add_meta_box( 'panpie_gallery_info', __( 'Gallery Info', 'panpie-core' ), array( 'panpie_gallery' ), '', '', 'high', array(
	'fields' => array(
		'panpie_port_gallery' => array(
			'label' => __( 'Gallery', 'panpie-core' ),
			'type'  => 'gallery',
		),
		'panpie_port_button' => array(
			'label' => __( 'Gallery Button', 'panpie-core' ),
			'type'  => 'text',
		),
		'panpie_port_url' => array(
			'label' => __( 'Gallery Button Url', 'panpie-core' ),
			'type'  => 'text',
		),
	),
) );

/*-------------------------------------
#. Testimonial
---------------------------------------*/
$Postmeta->add_meta_box( 'panpie_testimonial_info', __( 'Testimonial Info', 'panpie-core' ), array( 'panpie_testim' ), '', '', 'high', array(
	'fields' => array(
		'panpie_tes_designation' => array(
			'label' => __( 'Designation', 'panpie-core' ),
			'type'  => 'text',
		),		
		'panpie_tes_rating' => array(
			'label' => __( 'Select the Rating', 'panpie-core' ),
			'type'  => 'select',
			'options' => array(
				'default' => __( 'Default', 'panpie-core' ),
				'1'    => '1',
				'2'    => '2',
				'3'    => '3',
				'4'    => '4',
				'5'    => '5'
				),
			'default'  => 'default',
		),
	)
) );