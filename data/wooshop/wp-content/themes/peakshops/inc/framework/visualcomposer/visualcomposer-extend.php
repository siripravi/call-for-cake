<?php

// Utilities
$thb_animation_field_array = array(
	'None'               => '',
	'Right to Left'      => 'animation right-to-left',
	'Left to Right'      => 'animation left-to-right',
	'Right to Left - 3D' => 'animation right-to-left-3d',
	'Left to Right - 3D' => 'animation left-to-right-3d',
	'Bottom to Top'      => 'animation bottom-to-top',
	'Top to Bottom'      => 'animation top-to-bottom',
	'Bottom to Top - 3D' => 'animation bottom-to-top-3d',
	'Top to Bottom - 3D' => 'animation top-to-bottom-3d',
	'Scale'              => 'animation scale',
	'Fade'               => 'animation fade-in',
);

$thb_animation_array = array(
	'type'       => 'dropdown',
	'heading'    => esc_html__( 'Animation', 'peakshops' ),
	'param_name' => 'animation',
	'value'      => $thb_animation_field_array,
);

$thb_column_array = array(
	'1 Column'  => '1',
	'2 Columns' => 'medium-6',
	'3 Columns' => 'medium-4',
	'4 Columns' => 'medium-3',
	'5 Columns' => 'thb-5',
	'6 Columns' => 'medium-2',
);

$thb_filter_array = array(
	'Style 1 - Default'          => 'style1',
	'Style 1 - Default (Static)' => 'style1 alt',
	'Style 2 - Regular'          => 'style2',
	'Style 3 - With Counts'      => 'style3',
	'Style 4 - Menu Items'       => 'style4',
);

$thb_button_style_array = array(
	'Style 1' => 'style1',
	'Style 2' => 'style2',
);

$thb_offset_array = array(
	'-100%' => '-100%',
	'-95%'  => '-95%',
	'-90%'  => '-90%',
	'-85%'  => '-85%',
	'-80%'  => '-80%',
	'-75%'  => '-75%',
	'-70%'  => '-70%',
	'-65%'  => '-65%',
	'-60%'  => '-60%',
	'-55%'  => '-55%',
	'-50%'  => '-50%',
	'-45%'  => '-45%',
	'-40%'  => '-40%',
	'-35%'  => '-35%',
	'-30%'  => '-30%',
	'-25%'  => '-25%',
	'-20%'  => '-20%',
	'-15%'  => '-15%',
	'-10%'  => '-10%',
	'-5%'   => '-5%',
	'0%'    => '0%',
	'5%'    => '5%',
	'10%'   => '10%',
	'15%'   => '15%',
	'20%'   => '20%',
	'25%'   => '25%',
	'30%'   => '30%',
	'35%'   => '35%',
	'40%'   => '40%',
	'45%'   => '45%',
	'50%'   => '50%',
	'55%'   => '55%',
	'60%'   => '60%',
	'65%'   => '65%',
	'70%'   => '70%',
	'75%'   => '75%',
	'80%'   => '80%',
	'85%'   => '85%',
	'90%'   => '90%',
	'95%'   => '95%',
	'100%'  => '100%',
	'110%'  => '110%',
	'120%'  => '120%',
	'130%'  => '130%',
	'140%'  => '140%',
	'150%'  => '150%',
	'160%'  => '160%',
	'170%'  => '170%',
	'180%'  => '180%',
	'190%'  => '190%',
	'200%'  => '200%',
	'210%'  => '210%',
	'220%'  => '220%',
	'230%'  => '230%',
	'240%'  => '240%',
	'250%'  => '250%',
);

function thb_vc_gradient_direction( $group_name = 'Styling' ) {
	return array(
		'type'             => 'dropdown',
		'heading'          => esc_html__( 'Gradient Direction', 'peakshops' ),
		'param_name'       => 'bg_gradient_direction',
		'class'            => 'hidden-label',
		'description'      => esc_html__( 'You can change the gradient direction here.', 'peakshops' ),
		'group'            => $group_name,
		'edit_field_class' => 'vc_col-sm-6',
		'value'            => array(
			'Top to Bottom'            => '0',
			'Bottom Left to Top Right' => '-135',
			'Top Left to Bottom Right' => '-45',
			'Left to Right'            => '-90',
		),
		'std'              => '-135',
	);
}
function thb_vc_gradient_color1( $group_name = 'Styling' ) {
	return array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Background Gradient Color 1', 'peakshops' ),
		'param_name'       => 'bg_gradient1',
		'class'            => 'hidden-label',
		'description'      => esc_html__( 'Choose a first (top) color for the background gradient. Leave blank to disable.', 'peakshops' ),
		'group'            => $group_name,
		'edit_field_class' => 'vc_col-sm-6',
	);
}

function thb_vc_gradient_color2( $group_name = 'Styling' ) {
	return array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Background Gradient Color 2', 'peakshops' ),
		'param_name'       => 'bg_gradient2',
		'class'            => 'hidden-label',
		'description'      => esc_html__( 'Choose a second (bottom) color for the background gradient.', 'peakshops' ),
		'group'            => $group_name,
		'edit_field_class' => 'vc_col-sm-6',
	);
}

function thb_vc_gradient_color3( $group_name = 'Styling' ) {
	return array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Background Gradient Color 1', 'peakshops' ),
		'param_name'       => 'bg_gradient3',
		'class'            => 'hidden-label',
		'description'      => esc_html__( 'Choose a first (top) color for the background gradient. Leave blank to disable.', 'peakshops' ),
		'group'            => $group_name,
		'edit_field_class' => 'vc_col-sm-6',
	);
}

function thb_vc_gradient_color4( $group_name = 'Styling' ) {
	return array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Background Gradient Color 2', 'peakshops' ),
		'param_name'       => 'bg_gradient4',
		'class'            => 'hidden-label',
		'description'      => esc_html__( 'Choose a second (bottom) color for the background gradient.', 'peakshops' ),
		'group'            => $group_name,
		'edit_field_class' => 'vc_col-sm-6',
	);
}

// Visual Composer ROW Changes
vc_remove_param( 'vc_row', 'full_width' );
vc_remove_param( 'vc_row', 'gap' );
vc_remove_param( 'vc_row', 'equal_height' );
vc_remove_param( 'vc_row', 'css_animation' );
vc_remove_param( 'vc_row', 'video_bg' );
vc_remove_param( 'vc_row', 'video_bg_url' );
vc_remove_param( 'vc_row', 'video_bg_parallax' );
vc_remove_param( 'vc_row', 'parallax_speed_video' );

vc_add_param(
	'vc_row',
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Enable Full Width', 'peakshops' ),
		'param_name'  => 'thb_full_width',
		'value'       => array(
			'Yes' => 'true',
		),
		'weight'      => 1,
		'description' => esc_html__( 'If you enable this, this row will fill the screen', 'peakshops' ),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Disable Row Padding', 'peakshops' ),
		'param_name'  => 'thb_row_padding',
		'value'       => array(
			'Yes' => 'true',
		),
		'weight'      => 1,
		'description' => esc_html__( 'If you enable this, this row wont leave padding on the sides', 'peakshops' ),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Disable Column Padding', 'peakshops' ),
		'param_name'  => 'thb_column_padding',
		'value'       => array(
			'Yes' => 'true',
		),
		'weight'      => 1,
		'description' => esc_html__( 'If you enable this, the columns inside wont leave padding on the sides', 'peakshops' ),
	)
);

vc_add_param(
	'vc_row',
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Video Background', 'peakshops' ),
		'param_name'  => 'thb_video_bg',
		'weight'      => 1,
		'description' => esc_html__( 'You can specify a video background file here (mp4). Row Background Image will be used as Poster.', 'peakshops' ),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Video Overlay Color', 'peakshops' ),
		'param_name'  => 'thb_video_overlay_color',
		'weight'      => 1,
		'description' => esc_html__( 'If you want, you can select an overlay color.', 'peakshops' ),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Disable AutoPlay', 'peakshops' ),
		'param_name'  => 'thb_video_play_button',
		'weight'      => 1,
		'value'       => array(
			'Yes' => 'thb_video_play_button_enabled',
		),
		'description' => esc_html__( 'If enabled, the video wont start automatically and can be toggled using the Play Button Element.', 'peakshops' ),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Display Scroll to Bottom Arrow?', 'peakshops' ),
		'param_name'  => 'thb_scroll_bottom',
		'value'       => array(
			'Yes' => 'true',
		),
		'description' => esc_html__( 'If you enable this, this will show an arrow at the bottom of the row', 'peakshops' ),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Scroll to Bottom Arrow Style', 'peakshops' ),
		'param_name'  => 'thb_scroll_bottom_style',
		'value'       => array(
			'Line'     => 'style1',
			'Mouse'    => 'style2',
			'Arrow'    => 'style3',
			'Triangle' => 'style4',
		),
		'description' => esc_html__( 'This changes the shape of the arrow', 'peakshops' ),
		'dependency'  => array(
			'element' => 'thb_scroll_bottom',
			'value'   => array( 'true' ),
		),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Scroll to Bottom Arrow Color', 'peakshops' ),
		'param_name'  => 'thb_scroll_bottom_color',
		'value'       => array(
			'Dark'  => 'dark',
			'Light' => 'light',
		),
		'description' => esc_html__( 'Color of the scroll to bottom arrow', 'peakshops' ),
		'dependency'  => array(
			'element' => 'thb_scroll_bottom',
			'value'   => array( 'true' ),
		),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Border Radius', 'peakshops' ),
		'param_name'  => 'thb_border_radius',
		'weight'      => 1,
		'description' => esc_html__( 'You can add your own border-radius code here. For ex: 2px 2px 4px 4px', 'peakshops' ),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Box Shadow', 'peakshops' ),
		'param_name'  => 'box_shadow',
		'value'       => array(
			'No Shadow' => '',
			'Small'     => 'small-shadow',
			'Medium'    => 'medium-shadow',
			'Large'     => 'large-shadow',
			'X-Large'   => 'xlarge-shadow',
		),
		'description' => esc_html__( 'Select from different shadow styles.', 'peakshops' ),
	)
);
vc_add_param( 'vc_row', thb_vc_gradient_color1( 'Overlay' ) );
vc_add_param( 'vc_row', thb_vc_gradient_color2( 'Overlay' ) );
vc_add_param( 'vc_row', thb_vc_gradient_direction( 'Overlay' ) );

vc_add_param(
	'vc_row',
	array(
		'type'       => 'checkbox',
		'group'      => esc_html__( 'Dividers', 'peakshops' ),
		'heading'    => esc_html__( 'Enable Dividers?', 'peakshops' ),
		'param_name' => 'thb_shape_divider',
		'value'      => array(
			'Yes' => 'true',
		),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'       => 'thb_radio_image',
		'heading'    => esc_html__( 'Divider Shape', 'peakshops' ),
		'param_name' => 'divider_shape',
		'group'      => esc_html__( 'Dividers', 'peakshops' ),
		'options'    => array(
			'curve'         => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/dividers/curve.png',
			'tilt_v2'       => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/dividers/tilt_v2.png',
			'tilt'          => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/dividers/tilt.png',
			'triangle'      => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/dividers/triangle.png',
			'triangle_v2'   => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/dividers/triangle_v2.png',
			'waves_alt'     => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/dividers/waves_alt.png',
			'waves_v2'      => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/dividers/waves_v2.png',
			'waves'         => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/dividers/waves.png',
			'waves_opacity' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/dividers/waves_opacity.png',
			'cloud'         => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/dividers/cloud.png',
			'grunge'        => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/dividers/grunge.png',
			'mosaic'        => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/dividers/mosaic.png',
		),
		'dependency' => array(
			'element' => 'thb_shape_divider',
			'value'   => array( 'true' ),
		),
	)
);

vc_add_param(
	'vc_row',
	array(
		'type'       => 'colorpicker',
		'heading'    => esc_html__( 'Divider Color', 'peakshops' ),
		'param_name' => 'thb_divider_color',
		'group'      => esc_html__( 'Dividers', 'peakshops' ),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'       => 'colorpicker',
		'heading'    => esc_html__( 'Divider 2 Color', 'peakshops' ),
		'param_name' => 'thb_divider_color_2',
		'group'      => esc_html__( 'Dividers', 'peakshops' ),
		'dependency' => array(
			'element' => 'thb_divider_position',
			'value'   => array( 'both' ),
		),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Divider Position', 'peakshops' ),
		'param_name' => 'thb_divider_position',
		'group'      => esc_html__( 'Dividers', 'peakshops' ),
		'value'      => array(
			'Bottom' => 'bottom',
			'Top'    => 'top',
			'Both'   => 'both',
		),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'        => 'textfield',
		'group'       => esc_html__( 'Dividers', 'peakshops' ),
		'heading'     => esc_html__( 'Divider Height', 'peakshops' ),
		'param_name'  => 'thb_divider_height',
		'description' => esc_html__( 'You can use different units such as vw, vh and px. Default is 50px.', 'peakshops' ),
	)
);

// Inner Row
vc_remove_param( 'vc_row_inner', 'gap' );
vc_remove_param( 'vc_row_inner', 'equal_height' );
vc_remove_param( 'vc_row_inner', 'css_animation' );

vc_add_param(
	'vc_row_inner',
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Enable Max Width', 'peakshops' ),
		'param_name'  => 'thb_max_width',
		'value'       => array(
			'Yes' => 'max_width',
		),
		'std'         => 'max_width',
		'weight'      => 1,
		'description' => esc_html__( 'If you enable this, the row wont exceed the max width, especially inside a full-width parent row.', 'peakshops' ),
	)
);

vc_add_param(
	'vc_row_inner',
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Disable Column Padding', 'peakshops' ),
		'param_name'  => 'thb_column_padding',
		'value'       => array(
			'Yes' => 'true',
		),
		'weight'      => 1,
		'description' => esc_html__( 'If you enable this, the columns inside wont leave padding on the sides', 'peakshops' ),
	)
);
vc_add_param(
	'vc_row_inner',
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Border Radius', 'peakshops' ),
		'param_name'  => 'thb_border_radius',
		'weight'      => 1,
		'description' => esc_html__( 'You can add your own border-radius code here. For ex: 2px 2px 4px 4px', 'peakshops' ),
	)
);
vc_add_param(
	'vc_row_inner',
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Box Shadow', 'peakshops' ),
		'param_name'  => 'box_shadow',
		'value'       => array(
			'No Shadow' => '',
			'Small'     => 'small-shadow',
			'Medium'    => 'medium-shadow',
			'Large'     => 'large-shadow',
			'X-Large'   => 'xlarge-shadow',
		),
		'description' => esc_html__( 'Select from different shadow styles.', 'peakshops' ),
	)
);
// Columns
vc_remove_param( 'vc_column', 'css_animation' );
vc_add_param(
	'vc_column',
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Column Content Color', 'peakshops' ),
		'param_name'  => 'thb_color',
		'value'       => array(
			'Dark'  => 'thb-dark-column',
			'Light' => 'thb-light-column',
		),
		'weight'      => 1,
		'description' => esc_html__( 'If you white-colored contents for this column, select Light.', 'peakshops' ),
	)
);
vc_add_param(
	'vc_column',
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Enable Fixed Content', 'peakshops' ),
		'param_name'  => 'fixed',
		'value'       => array(
			'Yes' => 'thb-fixed',
		),
		'weight'      => 1,
		'description' => esc_html__( 'If you enable this, this column will be fixed.', 'peakshops' ),
	)
);
vc_add_param(
	'vc_column',
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Video Background (MP4)', 'peakshops' ),
		'param_name'  => 'thb_video_bg',
		'weight'      => 1,
		'description' => esc_html__( 'You can specify a video background file here (mp4). Row Background Image will be used as Poster.', 'peakshops' ),
		'dependency'  => array(
			'element' => 'video_bg',
			'value'   => array( 'yes' ),
		),
	)
);
vc_add_param(
	'vc_column',
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Video Overlay Color', 'peakshops' ),
		'param_name'  => 'thb_video_overlay_color',
		'weight'      => 1,
		'description' => esc_html__( 'If you want, you can select an overlay color.', 'peakshops' ),
	)
);
vc_add_param(
	'vc_column_inner',
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Column Content Color', 'peakshops' ),
		'param_name'  => 'thb_color',
		'value'       => array(
			'Dark'  => 'thb-dark-column',
			'Light' => 'thb-light-column',
		),
		'weight'      => 1,
		'description' => esc_html__( 'If you white-colored contents for this column, select Light.', 'peakshops' ),
	)
);
vc_add_param(
	'vc_column_inner',
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Enable Fixed Content', 'peakshops' ),
		'param_name'  => 'fixed',
		'value'       => array(
			'Yes' => 'thb-fixed',
		),
		'weight'      => 1,
		'description' => esc_html__( 'If you enable this, this column will be fixed.', 'peakshops' ),
	)
);
vc_add_param(
	'vc_column',
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Border Radius', 'peakshops' ),
		'param_name'  => 'thb_border_radius',
		'weight'      => 1,
		'description' => esc_html__( 'You can add your own border-radius code here. For ex: 2px 2px 4px 4px', 'peakshops' ),
	)
);
vc_add_param(
	'vc_column_inner',
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Border Radius', 'peakshops' ),
		'param_name'  => 'thb_border_radius',
		'weight'      => 1,
		'description' => esc_html__( 'You can add your own border-radius code here. For ex: 2px 2px 4px 4px', 'peakshops' ),
	)
);
vc_add_param(
	'vc_column',
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Box Shadow', 'peakshops' ),
		'param_name'  => 'box_shadow',
		'value'       => array(
			'No Shadow' => '',
			'Small'     => 'small-shadow',
			'Medium'    => 'medium-shadow',
			'Large'     => 'large-shadow',
			'X-Large'   => 'xlarge-shadow',
		),
		'description' => esc_html__( 'Select from different shadow styles.', 'peakshops' ),
	)
);
vc_add_param(
	'vc_column_inner',
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Box Shadow', 'peakshops' ),
		'param_name'  => 'box_shadow',
		'value'       => array(
			'No Shadow' => '',
			'Small'     => 'small-shadow',
			'Medium'    => 'medium-shadow',
			'Large'     => 'large-shadow',
			'X-Large'   => 'xlarge-shadow',
		),
		'description' => esc_html__( 'Select from different shadow styles.', 'peakshops' ),
	)
);
vc_add_param( 'vc_column', $thb_animation_array );
vc_add_param( 'vc_column_inner', $thb_animation_array );

// Text Area
vc_remove_param( 'vc_column_text', 'css_animation' );
vc_add_param( 'vc_column_text', $thb_animation_array );

// Empty Space
vc_add_param(
	'vc_empty_space',
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Mobile Height', 'peakshops' ),
		'param_name'  => 'mobile_height',
		'admin_label' => true,
		'value'       => '',
		'weight'      => 1,
		'description' => esc_html__( 'You can change the height in mobile devices', 'peakshops' ),
	)
);

// Toggle Accordion
vc_map(
	array(
		'name'            => esc_html__( 'Toggle / Accordion', 'peakshops' ),
		'base'            => 'thb_accordion',
		'icon'            => 'thb_vc_ico_accordion',
		'class'           => 'thb_vc_sc_accordion wpb_vc_accordion wpb_vc_tta_accordion',
		'as_parent'       => array(
			'only' => 'vc_tta_section',
		),
		'category'        => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'          => array(
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Allow collapsible all', 'peakshops' ),
				'param_name'  => 'accordion',
				'description' => esc_html__( 'Select checkbox to turn the toggles to an accordion.', 'peakshops' ),
				'value'       => array( esc_html__( 'Yes', 'peakshops' ) => 'true' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Active Tab Index', 'peakshops' ),
				'param_name'  => 'thb_index',
				'std'         => '0',
				'dependency'  => array(
					'element' => 'accordion',
					'value'   => array( 'true' ),
				),
				'description' => esc_html__( 'Enter any valid integer. 0 is first tab.', 'peakshops' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'peakshops' ),
				'param_name'  => 'style',
				'admin_label' => true,
				'value'       => array(
					'Style 1' => 'style1',
					'Style 2' => 'style2',
					'Style 3' => 'style3',
				),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Window Scrolling', 'peakshops' ),
				'param_name'  => 'tabs_scroll',
				'value'       => array(
					'Yes' => 'true',
				),
				'std'         => 'true',
				'description' => esc_html__( 'When enabled, window will scroll to top of the clicked section.', 'peakshops' ),
			),
		),
		'description'     => esc_html__( 'Toggles or Accordions', 'peakshops' ),
		'js_view'         => 'VcBackendTtaAccordionView',
		'custom_markup'   => '
	<div class="vc_tta-container" data-vc-action="collapseAll">
		<div class="vc_general vc_tta vc_tta-accordion vc_tta-color-backend-accordion-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-o-shape-group vc_tta-controls-align-left vc_tta-gap-2">
			 <div class="vc_tta-panels vc_clearfix {{container-class}}">
					{{ content }}
					<div class="vc_tta-panel vc_tta-section-append">
						 <div class="vc_tta-panel-heading">
								<h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left">
									 <a href="javascript:;" aria-expanded="false" class="vc_tta-backend-add-control">
											 <span class="vc_tta-title-text">' . esc_html__( 'Add Section', 'peakshops' ) . '</span>
												<i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i>
										</a>
								</h4>
						 </div>
					</div>
			 </div>
		</div>
	</div>',
		'default_content' => '[vc_tta_section title="' . sprintf( '%s %d', __( 'Section', 'peakshops' ), 1 ) . '"][/vc_tta_section][vc_tta_section title="' . sprintf( '%s %d', __( 'Section', 'peakshops' ), 2 ) . '"][/vc_tta_section]',
	)
);

VcShortcodeAutoloader::getInstance()->includeClass( 'WPBakeryShortCode_VC_Tta_Accordion' );
class WPBakeryShortCode_thb_accordion extends WPBakeryShortCode_VC_Tta_Accordion { }

// AutoType
vc_map(
	array(
		'base'        => 'thb_autotype',
		'name'        => esc_html__( 'Auto Type', 'peakshops' ),
		'description' => esc_html__( 'Animated text typing', 'peakshops' ),
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'icon'        => 'thb_vc_ico_autotype',
		'class'       => 'thb_vc_sc_autotype',
		'params'      => array(
			array(
				'type'        => 'textarea_safe',
				'heading'     => esc_html__( 'Content', 'peakshops' ),
				'param_name'  => 'typed_text',
				'value'       => '<h2>Unleash creativity with the powerful tools of *Animate Content 1;Animate Content 2*</h2>',
				'description' => '
			Enter the content to display with typing text. <br />
			Text within <b>*</b> will be animated, for example: <strong>*Sample text*</strong>. <br />
			Text separator is <b>;</b> for example: <strong>*Animate Content 1; Animate Content 2*</strong>',
				'admin_label' => true,
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Animated Text Color', 'peakshops' ),
				'param_name'  => 'thb_animated_color',
				'description' => esc_html__( 'Uses the accent color by default', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Type Speed', 'peakshops' ),
				'param_name'  => 'typed_speed',
				'description' => esc_html__( 'Speed of the type animation. Default is 50', 'peakshops' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Show Cursor?', 'peakshops' ),
				'param_name'  => 'cursor',
				'value'       => array(
					'Yes' => '1',
				),
				'std'         => '1',
				'description' => esc_html__( 'If enabled, the text will always animate, looping through the sentences used.', 'peakshops' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Loop?', 'peakshops' ),
				'param_name'  => 'loop',
				'value'       => array(
					'Yes' => '1',
				),
				'description' => esc_html__( 'If enabled, the text will always animate, looping through the sentences used.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
				'param_name'  => 'extra_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
			),
		),
	)
);

// Banner Grid Parent
vc_map(
	array(
		'name'            => esc_html__( 'Banner Grid', 'peakshops' ),
		'base'            => 'thb_bannergrid_parent',
		'icon'            => 'thb_vc_ico_bannergrid',
		'class'           => 'thb_vc_sc_bannergrid',
		'content_element' => true,
		'category'        => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'as_parent'       => array( 'only' => 'thb_bannergrid' ),
		'params'          => array(
			array(
				'type'        => 'thb_radio_image',
				'heading'     => esc_html__( 'Style', 'peakshops' ),
				'param_name'  => 'thb_bannergrid_style',
				'admin_label' => true,
				'std'         => 'style1',
				'options'     => array(
					'style1' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/banner_grid_styles/style1.png',
					'style2' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/banner_grid_styles/style2.png',
					'style3' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/banner_grid_styles/style3.png',
					'style4' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/banner_grid_styles/style4.png',
					'style5' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/banner_grid_styles/style5.png',
					'style6' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/banner_grid_styles/style6.png',
					'style7' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/banner_grid_styles/style7.png',
				),
				'description' => esc_html__( 'This changes the layout of the bannergrid.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Banner Grid Height', 'peakshops' ),
				'param_name'  => 'thb_bannergrid_height',
				'std'         => '500px',
				'description' => esc_html__( 'You can use different units such as vw, vh and px. Default is 500px. Does not affect mobile screens.', 'peakshops' ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Spacing', 'peakshops' ),
				'param_name' => 'thb_bannergrid_spacing',
				'value'      => array(
					'30px' => '30',
					'10px' => '10',
					'2px'  => '2',
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
				'param_name'  => 'extra_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
			),
		),
		'description'     => esc_html__( 'Different Banner Grid Layouts', 'peakshops' ),
		'js_view'         => 'VcColumnView',
	)
);

vc_map(
	array(
		'name'        => esc_html__( 'Single Banner', 'peakshops' ),
		'base'        => 'thb_bannergrid',
		'icon'        => 'thb_vc_ico_bannergrid',
		'class'       => 'thb_vc_sc_bannergrid',
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'as_child'    => array( 'only' => 'thb_bannergrid_parent' ),
		'params'      => array(
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image', 'peakshops' ),
				'param_name'  => 'bg_image',
				'group'       => esc_html__( 'Content', 'peakshops' ),
				'description' => esc_html__( 'Set an image for this slide.', 'peakshops' ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Text Color', 'peakshops' ),
				'param_name' => 'text_color',
				'std'        => 'dark',
				'group'      => esc_html__( 'Text', 'peakshops' ),
				'value'      => array(
					'Dark'  => 'dark',
					'Light' => 'light',
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Text Align', 'peakshops' ),
				'param_name' => 'text_align',
				'std'        => 'left',
				'group'      => esc_html__( 'Text', 'peakshops' ),
				'value'      => array(
					'Top Left'     => 'left top',
					'Center'       => 'center',
					'Top Right'    => 'right top',
					'Bottom Left'  => 'left bottom',
					'Bottom Right' => 'right bottom',
				),
			),
			array(
				'type'             => 'textarea_raw_html',
				'heading'          => esc_html__( 'Sub-Title', 'peakshops' ),
				'param_name'       => 'subtitle',
				'edit_field_class' => 'thb_simple_raw_html vc_col-xs-12 ',
				'group'            => esc_html__( 'Content', 'peakshops' ),
				'description'      => esc_html__( 'Sub-Title of the Banner', 'peakshops' ),
			),
			array(
				'type'             => 'textarea_raw_html',
				'heading'          => esc_html__( 'Title', 'peakshops' ),
				'param_name'       => 'title',
				'edit_field_class' => 'thb_simple_raw_html vc_col-xs-12 ',
				'group'            => esc_html__( 'Content', 'peakshops' ),
				'description'      => esc_html__( 'Title of the Banner', 'peakshops' ),
			),
			array(
				'type'             => 'textarea_raw_html',
				'heading'          => esc_html__( 'Text', 'peakshops' ),
				'param_name'       => 'text',
				'edit_field_class' => 'thb_simple_raw_html vc_col-xs-12 ',
				'group'            => esc_html__( 'Content', 'peakshops' ),
				'description'      => esc_html__( 'Description text', 'peakshops' ),
			),
			array(
				'type'             => 'vc_link',
				'heading'          => esc_html__( 'Button - 1', 'peakshops' ),
				'param_name'       => 'button_1',
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => esc_html__( 'Buttons', 'peakshops' ),
				'description'      => esc_html__( 'Button - 1 Content', 'peakshops' ),
			),
			array(
				'type'             => 'vc_link',
				'heading'          => esc_html__( 'Button - 2', 'peakshops' ),
				'param_name'       => 'button_2',
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => esc_html__( 'Buttons', 'peakshops' ),
				'description'      => esc_html__( 'Button - 2 Content', 'peakshops' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Style', 'peakshops' ),
				'param_name'       => 'btn_style',
				'edit_field_class' => 'vc_col-sm-6',
				'value'            => array(
					'Style 1' => 'btn style1',
					'Style 2' => 'btn style2',
					'Text'    => 'btn-text-regular',
					'Text 2'  => 'btn-text-regular style2',
				),
				'group'            => esc_html__( 'Buttons', 'peakshops' ),
				'std'              => 'btn style1',
				'description'      => esc_html__( 'This changes the look of the buttons.', 'peakshops' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Color', 'peakshops' ),
				'param_name'       => 'btn_color',
				'group'            => esc_html__( 'Buttons', 'peakshops' ),
				'edit_field_class' => 'vc_col-sm-6',
				'std'              => 'accent',
				'value'            => array(
					'Black'  => 'black',
					'White'  => 'white',
					'Accent' => 'accent',
				),
				'description'      => esc_html__( 'This changes the color of the button', 'peakshops' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Border Radius', 'peakshops' ),
				'param_name'       => 'btn_border_radius',
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => esc_html__( 'Buttons', 'peakshops' ),
				'std'              => 'small-radius',
				'value'            => array(
					'None'  => 'no-radius',
					'Small' => 'small-radius',
					'Pill'  => 'pill-radius',
				),
				'description'      => esc_html__( 'This changes the border-radius of the button. Some styles may not have this future.', 'peakshops' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Size', 'peakshops' ),
				'param_name'       => 'btn_size',
				'group'            => esc_html__( 'Buttons', 'peakshops' ),
				'edit_field_class' => 'vc_col-sm-6',
				'std'              => 'medium',
				'value'            => array(
					'Small'   => 'small',
					'Medium'  => 'medium',
					'Large'   => 'large',
					'X-Large' => 'x-large',
				),
				'description'      => esc_html__( 'Does not apply to text styles.', 'peakshops' ),
			),
		),
		'description' => esc_html__( 'Single Banner', 'peakshops' ),
	)
);
class WPBakeryShortCode_thb_bannergrid_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_bannergrid extends WPBakeryShortCode {}

// Blog Posts
vc_map(
	array(
		'name'        => esc_html__( 'Blog Posts', 'peakshops' ),
		'base'        => 'thb_post',
		'icon'        => 'thb_vc_ico_post',
		'class'       => 'thb_vc_sc_post',
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'      => array(
			array(
				'type'        => 'loop',
				'heading'     => esc_html__( 'Post Source', 'peakshops' ),
				'param_name'  => 'source',
				'description' => esc_html__( 'Set your post source here', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Offset', 'peakshops' ),
				'param_name'  => 'offset',
				'description' => esc_html__( 'You can offset your post with the number of posts entered in this setting', 'peakshops' ),
			),
			array(
				'type'        => 'thb_radio_image',
				'heading'     => esc_html__( 'Style', 'peakshops' ),
				'param_name'  => 'style',
				'admin_label' => true,
				'value'       => 'style1',
				'options'     => array(
					'style1' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/blog_styles/style1.png',
					'style2' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/blog_styles/style2.png',
					'style3' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/blog_styles/style3.png',
					'style4' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/blog_styles/style4.png',
					'style5' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/blog_styles/style4.png',
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'peakshops' ),
				'param_name'  => 'columns',
				'admin_label' => true,
				'value'       => array(
					'1 Column'  => '1',
					'2 Columns' => '2',
					'3 Columns' => '3',
					'4 Columns' => '4',
					'5 Columns' => '5',
					'6 Columns' => '6',
				),
				'description' => esc_html__( 'Select the layout of the posts.', 'peakshops' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Add Load More Button?', 'peakshops' ),
				'param_name'  => 'loadmore',
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'Add Load More button at the bottom. Does not work with Carousel enabled.', 'peakshops' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Use Carousel?', 'peakshops' ),
				'param_name'  => 'thb_carousel',
				'group'       => esc_html__( 'Carousel', 'peakshops' ),
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If you enable this, the posts will be displayed inside a carousel. Load More button will be disabled.', 'peakshops' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Auto Play', 'peakshops' ),
				'param_name'  => 'autoplay',
				'group'       => esc_html__( 'Carousel', 'peakshops' ),
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If enabled, the carousel will autoplay.', 'peakshops' ),
				'dependency'  => array(
					'element' => 'thb_carousel',
					'value'   => array( 'true' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Speed of the AutoPlay', 'peakshops' ),
				'param_name'  => 'autoplay_speed',
				'group'       => esc_html__( 'Carousel', 'peakshops' ),
				'value'       => '4000',
				'description' => esc_html__( 'Speed of the autoplay, default 4000 (4 seconds)', 'peakshops' ),
				'dependency'  => array(
					'element' => 'autoplay',
					'value'   => array( 'true' ),
				),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Display Category?', 'peakshops' ),
				'param_name'  => 'thb_cat',
				'value'       => array(
					'Yes' => 'true',
				),
				'std'         => 'true',
				'group'       => 'Styling',
				'description' => esc_html__( 'You can hide the category if you uncheck this.', 'peakshops' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Display Excerpt?', 'peakshops' ),
				'param_name'  => 'thb_excerpt',
				'value'       => array(
					'Yes' => 'true',
				),
				'std'         => 'true',
				'group'       => 'Styling',
				'description' => esc_html__( 'You can hide the excerpt if you uncheck this.', 'peakshops' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Display Date?', 'peakshops' ),
				'param_name'  => 'thb_date',
				'value'       => array(
					'Yes' => 'true',
				),
				'std'         => 'true',
				'group'       => 'Styling',
				'description' => esc_html__( 'You can hide the excerpt if you uncheck this.', 'peakshops' ),
			),
		),
		'description' => esc_html__( 'Display posts from your blog', 'peakshops' ),
	)
);

vc_map(
	array(
		'name'        => esc_html__( 'Button', 'peakshops' ),
		'base'        => 'thb_button',
		'icon'        => 'thb_vc_ico_button',
		'class'       => 'thb_vc_sc_button',
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'      => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'peakshops' ),
				'param_name'  => 'style',
				'value'       => $thb_button_style_array,
				'description' => esc_html__( 'This changes the look of the button', 'peakshops' ),
			),
			array(
				'type'             => 'vc_link',
				'heading'          => esc_html__( 'Link', 'peakshops' ),
				'param_name'       => 'link',
				'edit_field_class' => 'vc_col-sm-6',
				'description'      => esc_html__( 'Set your url & text for your button', 'peakshops' ),
				'admin_label'      => true,
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Use lightbox?', 'peakshops' ),
				'param_name'       => 'lightbox',
				'edit_field_class' => 'vc_col-sm-6',
				'value'            => array(
					'Yes' => 'true',
				),
				'description'      => esc_html__( 'If you want to show images or video links inside a lightbox, enable this.', 'peakshops' ),
			),
			$thb_animation_array,
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
				'param_name'  => 'extra_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Full Width', 'peakshops' ),
				'param_name'       => 'full_width',
				'group'            => 'Styling',
				'edit_field_class' => 'vc_col-sm-6',
				'value'            => array(
					'Yes' => 'true',
				),
				'description'      => esc_html__( 'If enabled, this will make the button fill its container', 'peakshops' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Size', 'peakshops' ),
				'param_name'       => 'size',
				'group'            => 'Styling',
				'edit_field_class' => 'vc_col-sm-6',
				'std'              => 'medium',
				'value'            => array(
					'Small'   => 'small',
					'Medium'  => 'medium',
					'Large'   => 'large',
					'X-Large' => 'x-large',
				),
				'description'      => esc_html__( 'This changes the size of the button', 'peakshops' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Color', 'peakshops' ),
				'param_name'       => 'color',
				'group'            => 'Styling',
				'edit_field_class' => 'vc_col-sm-6',
				'std'              => 'accent',
				'value'            => array(
					'Black'  => 'black',
					'White'  => 'white',
					'Accent' => 'accent',
				),
				'description'      => esc_html__( 'This changes the color of the button', 'peakshops' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Border Radius', 'peakshops' ),
				'param_name'       => 'border_radius',
				'group'            => 'Styling',
				'edit_field_class' => 'vc_col-sm-6',
				'std'              => 'small-radius',
				'value'            => array(
					'None'  => 'no-radius',
					'Small' => 'small-radius',
					'Pill'  => 'pill-radius',
				),
				'description'      => esc_html__( 'This changes the border-radius of the button. Some styles may not have this future.', 'peakshops' ),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Add Shadow on Hover?', 'peakshops' ),
				'param_name'       => 'thb_shadow',
				'group'            => 'Styling',
				'edit_field_class' => 'vc_col-sm-6',
				'value'            => array(
					'Yes' => 'thb_shadow',
				),
				'description'      => esc_html__( 'If enabled, this will add a shadow to the button', 'peakshops' ),
			),
		),
		'description' => esc_html__( 'Add an animated button', 'peakshops' ),
	)
);

vc_map(
	array(
		'name'        => esc_html__( 'Block Button', 'peakshops' ),
		'base'        => 'thb_button_block',
		'icon'        => 'thb_vc_ico_button_block',
		'class'       => 'thb_vc_sc_button_block',
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'      => array(
			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__( 'Background Image', 'peakshops' ),
				'param_name' => 'image',
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Link', 'peakshops' ),
				'param_name'  => 'link',
				'description' => esc_html__( 'Set your url & text for your button', 'peakshops' ),
				'admin_label' => true,
			),
			$thb_animation_array,
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
				'param_name'  => 'extra_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
			),
			array(
				'type'       => 'css_editor',
				'heading'    => esc_html__( 'Css', 'peakshops' ),
				'param_name' => 'css',
				'group'      => esc_html__( 'Design Options', 'peakshops' ),
			),
		),
		'description' => esc_html__( 'Add a block button with image', 'peakshops' ),
	)
);

vc_map(
	array(
		'name'        => esc_html__( 'Text Button', 'peakshops' ),
		'base'        => 'thb_button_text',
		'icon'        => 'thb_vc_ico_button_text',
		'class'       => 'thb_vc_sc_button_text',
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'      => array(
			array(
				'type'        => 'thb_radio_image',
				'heading'     => esc_html__( 'Style', 'peakshops' ),
				'param_name'  => 'style',
				'options'     => array(
					'style1' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/text_button_styles/style1.png',
					'style2' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/text_button_styles/style2.png',
					'style3' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/text_button_styles/style3.png',
					'style4' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/text_button_styles/style4.png',
					'style5' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/text_button_styles/style5.png',
				),
				'description' => esc_html__( 'This changes the look of the button', 'peakshops' ),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Link', 'peakshops' ),
				'param_name'  => 'link',
				'description' => esc_html__( 'Set your url & text for your button', 'peakshops' ),
				'admin_label' => true,
			),
			$thb_animation_array,
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
				'param_name'  => 'extra_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
			),
		),
		'description' => esc_html__( 'Add a text button', 'peakshops' ),
	)
);

// List Item

vc_map(
	array(
		'name'        => esc_html__( 'List Item', 'peakshops' ),
		'base'        => 'thb_bg_list',
		'icon'        => 'thb_vc_ico_bg_list',
		'class'       => 'thb_vc_sc_bg_list',
		'as_child'    => array( 'only' => 'thb_bg_list_parent' ),
		'params'      => array(
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Background Image', 'peakshops' ),
				'param_name'  => 'image',
				'description' => esc_html__( 'This image will be shown when you hover over this item.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title', 'peakshops' ),
				'param_name'  => 'title',
				'admin_label' => true,
				'description' => esc_html__( 'Title of this list item', 'peakshops' ),
			),
			array(
				'type'        => 'textarea_html',
				'heading'     => esc_html__( 'Content', 'peakshops' ),
				'param_name'  => 'content',
				'description' => esc_html__( 'Content to be shown under the title.', 'peakshops' ),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'CTA Button', 'peakshops' ),
				'param_name'  => 'link',
				'description' => esc_html__( 'Button that will be shown under the content.', 'peakshops' ),
			),
		),
		'description' => esc_html__( 'Add a list item.', 'peakshops' ),
	)
);

class WPBakeryShortCode_thb_bg_list_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_bg_list extends WPBakeryShortCode {}

// Cascading Images
vc_map(
	array(
		'name'                    => esc_html__( 'Cascading Images', 'peakshops' ),
		'base'                    => 'thb_cascading_parent',
		'icon'                    => 'thb_vc_ico_cascading',
		'class'                   => 'thb_vc_sc_cascading',
		'content_element'         => true,
		'show_settings_on_create' => false,
		'category'                => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'as_parent'               => array( 'only' => 'thb_cascading' ),
		'description'             => esc_html__( 'Insert a cascading Image', 'peakshops' ),
		'js_view'                 => 'VcColumnView',
		'params'                  => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
				'param_name'  => 'extra_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
			),
		),
	)
);

vc_map(
	array(
		'name'     => esc_html__( 'Single Image', 'peakshops' ),
		'base'     => 'thb_cascading',
		'icon'     => 'thb_vc_ico_cascading',
		'class'    => 'thb_vc_sc_cascading',
		'category' => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'as_child' => array( 'only' => 'thb_cascading_parent' ),
		'params'   => array(
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Select Image', 'peakshops' ),
				'param_name'  => 'image',
				'description' => esc_html__( 'Select Image for the layer', 'peakshops' ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Offset X', 'peakshops' ),
				'param_name' => 'image_x',
				'value'      => $thb_offset_array,
				'std'        => '0%',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Offset Y', 'peakshops' ),
				'param_name' => 'image_y',
				'value'      => $thb_offset_array,
				'std'        => '0%',
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Retina Size?', 'peakshops' ),
				'param_name'  => 'retina',
				'value'       => array(
					'Yes' => 'retina_size',
				),
				'description' => esc_html__( 'If selected, the image will be display half-size, so it looks crisps on retina screens. Full Width setting will override this.', 'peakshops' ),
			),
			$thb_animation_array,
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Add Border Radius?', 'peakshops' ),
				'param_name'  => 'radius',
				'group'       => 'Styling',
				'description' => esc_html__( 'You can add Border Radius in px value.', 'peakshops' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Add Box Shadow?', 'peakshops' ),
				'param_name'  => 'thb_box_shadow',
				'value'       => array(
					'Yes' => 'thb_box_shadow',
				),
				'group'       => 'Styling',
				'description' => esc_html__( 'You can add a Box Shadow to your image.', 'peakshops' ),
			),
		),
	)
);

class WPBakeryShortCode_thb_cascading_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_cascading extends WPBakeryShortCode {}

// Clients Parent
vc_map(
	array(
		'name'            => esc_html__( 'Clients', 'peakshops' ),
		'base'            => 'thb_clients_parent',
		'icon'            => 'thb_vc_ico_clients',
		'class'           => 'thb_vc_sc_clients',
		'content_element' => true,
		'category'        => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'as_parent'       => array( 'only' => 'thb_clients' ),
		'params'          => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'peakshops' ),
				'param_name'  => 'thb_style',
				'admin_label' => true,
				'value'       => array(
					'Style 1 (Grid)'                 => 'style1',
					'Style 2 (Carousel)'             => 'thb-carousel',
					'Style 3 (Grid with Titles)'     => 'style3',
					'Style 4 (Grid with Titles - 2)' => 'style4',
				),
				'description' => esc_html__( 'This changes the layout style of the client logos', 'peakshops' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'peakshops' ),
				'param_name'  => 'thb_columns',
				'admin_label' => true,
				'value'       => array(
					'2 Columns' => 'small-6 large-6',
					'3 Columns' => 'small-6 large-4',
					'4 Columns' => 'small-6 large-3',
					'5 Columns' => 'small-6 thb-5',
					'6 Columns' => 'small-6 large-2',
				),
			),
			$thb_animation_array,
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Image Borders', 'peakshops' ),
				'param_name'  => 'thb_image_borders',
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If you enable this, the logos will have border', 'peakshops' ),
				'dependency'  => array(
					'element' => 'thb_style',
					'value'   => array( 'style1', 'thb-carousel', 'style4' ),
				),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Retina Size?', 'peakshops' ),
				'param_name'  => 'retina',
				'value'       => array(
					'Yes' => 'retina_size',
				),
				'description' => esc_html__( 'If selected, the image will be display half-size, so it looks crisps on retina screens.', 'peakshops' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Border Color', 'peakshops' ),
				'param_name'  => 'thb_border_color',
				'admin_label' => true,
				'value'       => '#f0f0f0',
				'dependency'  => array(
					'element' => 'thb_image_borders',
					'value'   => array( 'true' ),
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Hover Effect', 'peakshops' ),
				'param_name'  => 'thb_hover_effect',
				'admin_label' => true,
				'value'       => array(
					'None'                      => '',
					'Opacity'                   => 'thb-opacity',
					'Grayscale'                 => 'thb-grayscale',
					'Opacity with Accent hover' => 'thb-opacity with-accent',
				),
				'dependency'  => array(
					'element' => 'thb_style',
					'value'   => array( 'style1', 'thb-carousel' ),
				),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Auto Play', 'peakshops' ),
				'param_name'  => 'autoplay',
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If enabled, the carousel will autoplay.', 'peakshops' ),
				'dependency'  => array(
					'element' => 'thb_style',
					'value'   => array( 'thb-carousel' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Speed of the AutoPlay', 'peakshops' ),
				'param_name'  => 'autoplay_speed',
				'value'       => '4000',
				'description' => esc_html__( 'Speed of the autoplay, default 4000 (4 seconds)', 'peakshops' ),
				'dependency'  => array(
					'element' => 'autoplay',
					'value'   => array( 'true' ),
				),
			),
		),
		'description'     => esc_html__( 'Partner/Client logos', 'peakshops' ),
		'js_view'         => 'VcColumnView',
	)
);

vc_map(
	array(
		'name'        => esc_html__( 'Client', 'peakshops' ),
		'base'        => 'thb_clients',
		'icon'        => 'thb_vc_ico_clients',
		'class'       => 'thb_vc_sc_clients',
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'as_child'    => array( 'only' => 'thb_clients_parent' ),
		'params'      => array(
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image', 'peakshops' ),
				'param_name'  => 'image',
				'value'       => '',
				'description' => esc_html__( 'Add logo image here.', 'peakshops' ),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Link', 'peakshops' ),
				'param_name'  => 'link',
				'admin_label' => true,
				'description' => esc_html__( 'Add a link to client website if desired.', 'peakshops' ),
			),
		),
		'description' => esc_html__( 'Single Client', 'peakshops' ),
	)
);
class WPBakeryShortCode_thb_clients_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_clients extends WPBakeryShortCode {}

// Contact Map
vc_map(
	array(
		'name'            => esc_html__( 'Contact Map Parent', 'peakshops' ),
		'base'            => 'thb_map_parent',
		'icon'            => 'thb_vc_ico_contactmap',
		'class'           => 'thb_vc_sc_contactmap',
		'content_element' => true,
		'category'        => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'as_parent'       => array( 'only' => 'thb_map' ),
		'params'          => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Map Height', 'peakshops' ),
				'param_name'  => 'height',
				'admin_label' => true,
				'value'       => 50,
				'description' => __( 'Enter height of the map in vh (0-100). For example, 50 will be 50% of viewport height and 100 will be full height. <small>Make sure you have filled in your Google Maps API inside Appearance > Theme Options.</small>', 'peakshops' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Expand Toggle', 'peakshops' ),
				'param_name'  => 'expand',
				'admin_label' => true,
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If enabled, this will show an expand button on the map.', 'peakshops' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Map Position', 'peakshops' ),
				'param_name'  => 'position',
				'admin_label' => true,
				'value'       => array(
					'Map on the Left'  => 'map_left',
					'Map on the Right' => 'map_right',
				),
				'std'         => 'map_left',
				'description' => esc_html__( 'This affects which side the map will grow.', 'peakshops' ),
				'dependency'  => array(
					'element' => 'expand',
					'value'   => array( 'true' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Map Zoom', 'peakshops' ),
				'param_name'  => 'zoom',
				'value'       => '0',
				'description' => esc_html__( 'Set map zoom level. Leave 0 to automatically fit to bounds.', 'peakshops' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Map Controls', 'peakshops' ),
				'param_name'  => 'map_controls',
				'std'         => 'panControl, zoomControl, mapTypeControl, scaleControl',
				'value'       => array(
					esc_html__( 'Pan Control', 'peakshops' )   => 'panControl',
					esc_html__( 'Zoom Control', 'peakshops' )  => 'zoomControl',
					esc_html__( 'Map Type Control', 'peakshops' ) => 'mapTypeControl',
					esc_html__( 'Scale Control', 'peakshops' ) => 'scaleControl',
					esc_html__( 'Street View Control', 'peakshops' ) => 'streetViewControl',
				),
				'description' => esc_html__( 'Toggle map options.', 'peakshops' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Map Type', 'peakshops' ),
				'param_name'  => 'map_type',
				'std'         => 'roadmap',
				'value'       => array(
					esc_html__( 'Roadmap', 'peakshops' )   => 'roadmap',
					esc_html__( 'Satellite', 'peakshops' ) => 'satellite',
					esc_html__( 'Hybrid', 'peakshops' )    => 'hybrid',
				),
				'description' => esc_html__( 'Choose map style.', 'peakshops' ),
			),
			array(
				'type'        => 'textarea_raw_html',
				'heading'     => esc_html__( 'Map Style', 'peakshops' ),
				'param_name'  => 'map_style',
				'description' => __( 'Paste the style code here. Browse map styles in <a href="https://snazzymaps.com/" target="_blank">SnazzyMaps</a>', 'peakshops' ),
			),
		),
		'description'     => esc_html__( 'Insert your Contact Map', 'peakshops' ),
		'js_view'         => 'VcColumnView',
	)
);

vc_map(
	array(
		'name'     => esc_html__( 'Contact Map Location', 'peakshops' ),
		'base'     => 'thb_map',
		'icon'     => 'thb_vc_ico_contactmap',
		'class'    => 'thb_vc_sc_contactmap',
		'category' => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'as_child' => array( 'only' => 'thb_map_parent' ),
		'params'   => array(
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Marker Image', 'peakshops' ),
				'param_name'  => 'marker_image',
				'description' => esc_html__( 'Add your Custom marker image or use default one.', 'peakshops' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Retina Marker', 'peakshops' ),
				'param_name'  => 'retina_marker',
				'value'       => array(
					esc_html__( 'Yes', 'peakshops' ) => 'yes',
				),
				'description' => esc_html__( 'Enabling this option will reduce the size of marker for 50%, example if marker is 32x32 it will be 16x16.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Latitude', 'peakshops' ),
				'admin_label' => true,
				'param_name'  => 'latitude',
				'description' => __( 'Enter latitude coordinate. To select map coordinates <a href="http://www.latlong.net/convert-address-to-lat-long.html" target="_blank">click here</a>.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Longitude', 'peakshops' ),
				'admin_label' => true,
				'param_name'  => 'longitude',
				'description' => esc_html__( 'Enter longitude coordinate.', 'peakshops' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Marker Title', 'peakshops' ),
				'param_name' => 'marker_title',
			),
			array(
				'type'       => 'textarea',
				'heading'    => esc_html__( 'Marker Description', 'peakshops' ),
				'param_name' => 'marker_description',
			),
		),
	)
);

class WPBakeryShortCode_thb_map_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_map extends WPBakeryShortCode {}

// Content Carousel Shortcode
vc_map(
	array(
		'name'                    => esc_html__( 'Content Carousel', 'peakshops' ),
		'base'                    => 'thb_content_carousel',
		'icon'                    => 'thb_vc_ico_content_carousel',
		'class'                   => 'thb_vc_sc_content_carousel',
		'as_parent'               => array( 'except' => 'thb_content_carousel' ),
		'category'                => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'show_settings_on_create' => true,
		'content_element'         => true,
		'params'                  => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'peakshops' ),
				'param_name'  => 'thb_columns',
				'value'       => $thb_column_array,
				'description' => esc_html__( 'Select the layout.', 'peakshops' ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Pagination', 'peakshops' ),
				'param_name' => 'thb_pagination',
				'group'      => 'Controls',
				'value'      => array(
					'Yes' => 'true',
				),
				'std'        => 'true',
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Navigation Arrows', 'peakshops' ),
				'param_name' => 'thb_navigation',
				'group'      => 'Controls',
				'value'      => array(
					'Yes' => 'true',
				),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Auto Play', 'peakshops' ),
				'param_name'  => 'autoplay',
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If enabled, the carousel will autoplay.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Speed of the AutoPlay', 'peakshops' ),
				'param_name'  => 'autoplay_speed',
				'value'       => '4000',
				'description' => esc_html__( 'Speed of the autoplay, default 4000 (4 seconds)', 'peakshops' ),
				'dependency'  => array(
					'element' => 'autoplay',
					'value'   => array( 'true' ),
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Margins between items', 'peakshops' ),
				'param_name'  => 'thb_margins',
				'group'       => 'Styling',
				'std'         => 'regular-padding',
				'value'       => array(
					'Regular' => 'regular-padding',
					'Mini'    => 'mini-padding',
					'Pixel'   => 'pixel-padding',
					'None'    => 'no-padding',
				),
				'description' => esc_html__( 'This will change the margins between items', 'peakshops' ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Overflow Visible?', 'peakshops' ),
				'param_name' => 'thb_overflow',
				'group'      => 'Styling',
				'value'      => array(
					'Yes' => 'overflow-visible-only',
				),
				'std'        => '',
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
				'param_name'  => 'extra_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
			),
		),
		'js_view'                 => 'VcColumnView',
		'description'             => esc_html__( 'Display your content in a carousel', 'peakshops' ),
	)
);

class WPBakeryShortCode_Thb_Content_Carousel extends WPBakeryShortCodesContainer { }


// Counter shortcode
vc_map(
	array(
		'name'        => esc_html__( 'Counter', 'peakshops' ),
		'base'        => 'thb_counter',
		'icon'        => 'thb_vc_ico_counter',
		'class'       => 'thb_vc_sc_counter',
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'      => array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Style', 'peakshops' ),
				'param_name' => 'style',
				'std'        => 'counter-style1',
				'value'      => array(
					'Counter Top'           => 'counter-style1',
					'Counter Top - Style 2' => 'counter-style4',
					'Counter Top - Style 3' => 'counter-style5',
					'Counter Below'         => 'counter-style3',
					'Counter Side'          => 'counter-style2',
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Icon', 'peakshops' ),
				'param_name' => 'icon',
				'value'      => thb_get_icon_array(),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'counter-style1', 'counter-style3' ),
				),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image As Icon', 'peakshops' ),
				'param_name'  => 'icon_image',
				'description' => esc_html__( 'You can set an image instead of an icon.', 'peakshops' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'counter-style1', 'counter-style3' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Image Width', 'peakshops' ),
				'param_name'  => 'icon_image_width',
				'description' => esc_html__( 'If you are using an image, you can set custom width here. Default is 64 (pixels).', 'peakshops' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'counter-style1', 'counter-style3' ),
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Alignment', 'peakshops' ),
				'param_name' => 'alignment',
				'value'      => array(
					'Left'  => 'thb-side left',
					'Right' => 'thb-side right',
				),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'counter-style2' ),
				),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Counter Color', 'peakshops' ),
				'param_name' => 'thb_counter_color',
				'group'      => 'Styling',
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Icon Color', 'peakshops' ),
				'param_name' => 'thb_icon_color',
				'group'      => 'Styling',
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Heading Color', 'peakshops' ),
				'param_name' => 'thb_heading_color',
				'group'      => 'Styling',
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Number to Count', 'peakshops' ),
				'param_name'  => 'counter',
				'admin_label' => true,
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Thousands Separator', 'peakshops' ),
				'param_name'  => 'thousand_separator',
				'value'       => array(
					'Yes' => 'true',
				),
				'std'         => 'true',
				'description' => esc_html__( 'You can disable the thousand separator for ex: 1,999', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Prepend to counter', 'peakshops' ),
				'param_name'  => 'prepend_counter_text',
				'description' => esc_html__( 'You can prepend text after the counter, like $', 'peakshops' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'counter-style1', 'counter-style4', 'counter-style5' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Append to counter', 'peakshops' ),
				'param_name'  => 'counter_text',
				'description' => esc_html__( 'You can append text after the counter, like %', 'peakshops' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'counter-style1', 'counter-style4', 'counter-style5' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Speed of the counter animation', 'peakshops' ),
				'param_name'  => 'speed',
				'value'       => '2000',
				'description' => esc_html__( 'Speed of the counter animation, default 1500', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Heading', 'peakshops' ),
				'param_name'  => 'heading',
				'admin_label' => true,
			),
			array(
				'type'        => 'textarea',
				'heading'     => esc_html__( 'Description', 'peakshops' ),
				'param_name'  => 'description',
				'description' => esc_html__( 'Include a small description for this counter', 'peakshops' ),
			),
		),
		'description' => esc_html__( 'Counters with icons', 'peakshops' ),
	)
);

// Countdown shortcode
vc_map(
	array(
		'name'        => esc_html__( 'Event Countdown', 'peakshops' ),
		'base'        => 'thb_countdown',
		'icon'        => 'thb_vc_ico_event_countdown',
		'class'       => 'thb_vc_sc_event_countdown',
		'description' => esc_html__( 'Countdown module for your events.', 'peakshops' ),
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Upcoming Event Date', 'peakshops' ),
				'param_name'  => 'date',
				'admin_label' => true,
				'value'       => '09/24/2020 12:00:00',
				'description' => esc_html__( 'Enter the due date for Event. eg : 12/24/2021 12:00:00 => month/day/year hour:minute:second', 'peakshops' ),
			),
			array(
				'heading'    => esc_html__( 'UTC Timezone', 'peakshops' ),
				'type'       => 'dropdown',
				'param_name' => 'offset',
				'value'      => array(
					'-12' => '-12',
					'-11' => '-11',
					'-10' => '-10',
					'-9'  => '-9',
					'-8'  => '-8',
					'-7'  => '-7',
					'-6'  => '-6',
					'-5'  => '-5',
					'-4'  => '-4',
					'-3'  => '-3',
					'-2'  => '-2',
					'-1'  => '-1',
					'0'   => '0',
					'+1'  => '+1',
					'+2'  => '+2',
					'+3'  => '+3',
					'+4'  => '+4',
					'+5'  => '+5',
					'+6'  => '+6',
					'+7'  => '+7',
					'+8'  => '+8',
					'+9'  => '+9',
					'+10' => '+10',
					'+12' => '+12',
				),
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Number color', 'peakshops' ),
				'param_name'       => 'countdown_color_number',
				'group'            => 'Styling',
				'edit_field_class' => 'vc_col-sm-6',
				'description'      => esc_html__( 'Color of the countdown numbers', 'peakshops' ),
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Text color', 'peakshops' ),
				'param_name'       => 'countdown_color_text',
				'group'            => 'Styling',
				'edit_field_class' => 'vc_col-sm-6',
				'description'      => esc_html__( 'Color of the countdown text', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
				'param_name'  => 'extra_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
			),
		),
	)
);

// Fade Type
vc_map(
	array(
		'base'        => 'thb_fadetype',
		'name'        => esc_html__( 'Fade Type', 'peakshops' ),
		'description' => esc_html__( 'Faded letter typing', 'peakshops' ),
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'icon'        => 'thb_vc_ico_fadetype',
		'class'       => 'thb_vc_sc_fadetype',
		'params'      => array(
			array(
				'type'        => 'textarea_safe',
				'heading'     => esc_html__( 'Content', 'peakshops' ),
				'param_name'  => 'fade_text',
				'value'       => '<h2>*Unleash creativity with the powerful tools of the Fade Type*</h2>',
				'description' => 'Enter the content to display with typing text. <br />
			Text within <b>*</b> will be animated, for example: <strong>*Sample text*</strong>. ',
				'admin_label' => true,
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Animation Styles', 'peakshops' ),
				'param_name'  => 'style',
				'value'       => array(
					'Linear, from bottom'  => 'style1',
					'Randomized, from top' => 'style2',
				),
				'std'         => 'style1',
				'description' => esc_html__( 'This changes style of the animation', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
				'param_name'  => 'extra_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
			),
		),
	)
);


// Flip Box shortcode
vc_map(
	array(
		'name'        => esc_html__( 'Flip Box', 'peakshops' ),
		'base'        => 'thb_flipbox',
		'icon'        => 'thb_vc_ico_flipbox',
		'class'       => 'thb_vc_sc_flipbox',
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'      => array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Icon', 'peakshops' ),
				'param_name' => 'icon_front',
				'value'      => thb_get_icon_array(),
				'group'      => esc_html__( 'Front Side', 'peakshops' ),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image As Icon', 'peakshops' ),
				'param_name'  => 'icon_image',
				'description' => esc_html__( 'You can set an image instead of an icon.', 'peakshops' ),
				'group'       => esc_html__( 'Front Side', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Image Width', 'peakshops' ),
				'param_name'  => 'icon_image_width',
				'description' => esc_html__( 'If you are using an image, you can set custom width here. Default is 64 (pixels).', 'peakshops' ),
				'group'       => esc_html__( 'Front Side', 'peakshops' ),
			),
			array(
				'type'       => 'textarea_safe',
				'heading'    => esc_html__( 'Content', 'peakshops' ),
				'param_name' => 'front_content',
				'group'      => esc_html__( 'Front Side', 'peakshops' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Content Color', 'peakshops' ),
				'param_name'  => 'front_text_color',
				'value'       => array(
					'Dark'  => 'dark',
					'Light' => 'light',
				),
				'description' => esc_html__( 'If you want white-colored contents for this side, select Light.', 'peakshops' ),
				'group'       => esc_html__( 'Front Side', 'peakshops' ),
			),
			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__( 'Background Image', 'peakshops' ),
				'param_name' => 'front_bg_image',
				'group'      => esc_html__( 'Front Side', 'peakshops' ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Icon', 'peakshops' ),
				'param_name' => 'icon_back',
				'value'      => thb_get_icon_array(),
				'group'      => esc_html__( 'Back Side', 'peakshops' ),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image As Icon', 'peakshops' ),
				'param_name'  => 'icon_image_back',
				'description' => esc_html__( 'You can set an image instead of an icon.', 'peakshops' ),
				'group'       => esc_html__( 'Back Side', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Image Width', 'peakshops' ),
				'param_name'  => 'icon_image_back_width',
				'description' => esc_html__( 'If you are using an image, you can set custom width here. Default is 64 (pixels).', 'peakshops' ),
				'group'       => esc_html__( 'Back Side', 'peakshops' ),
			),
			array(
				'type'       => 'textarea_safe',
				'heading'    => esc_html__( 'Back Content', 'peakshops' ),
				'param_name' => 'back_content',
				'group'      => esc_html__( 'Back Side', 'peakshops' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Content Color', 'peakshops' ),
				'param_name'  => 'back_text_color',
				'value'       => array(
					'Dark'  => 'dark',
					'Light' => 'light',
				),
				'description' => esc_html__( 'If you want white-colored contents for this side, select Light.', 'peakshops' ),
				'group'       => esc_html__( 'Back Side', 'peakshops' ),
			),
			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__( 'Background Image', 'peakshops' ),
				'param_name' => 'back_bg_image',
				'group'      => esc_html__( 'Back Side', 'peakshops' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Direction', 'peakshops' ),
				'param_name'  => 'direction',
				'value'       => array(
					'Horizontal' => 'thb-flip-horizontal',
					'Vertical'   => 'thb-flip-vertical',
				),
				'std'         => 'thb-flip-horizontal',
				'description' => esc_html__( 'You can change the direction of the flipbox here.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Min Height', 'peakshops' ),
				'param_name'  => 'min_height',
				'description' => esc_html__( 'Please enter the minimum height you would like for you box. Enter in number of pixels - Dont enter \'px\', default is \'300\'', 'peakshops' ),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Link', 'peakshops' ),
				'param_name'  => 'link',
				'description' => esc_html__( 'Add a link to your flipbox.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
				'param_name'  => 'extra_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
			),
		),
		'description' => esc_html__( 'Add a Flip Box', 'peakshops' ),
	)
);
vc_add_param( 'thb_flipbox', thb_vc_gradient_color1( 'Front Side' ) );
vc_add_param( 'thb_flipbox', thb_vc_gradient_color2( 'Front Side' ) );
vc_add_param( 'thb_flipbox', thb_vc_gradient_color3( 'Back Side' ) );
vc_add_param( 'thb_flipbox', thb_vc_gradient_color4( 'Back Side' ) );

/* Food Menu Item */
vc_map(
	array(
		'name'        => esc_html__( 'Food Menu Item', 'peakshops' ),
		'base'        => 'thb_menu_item',
		'icon'        => 'thb_vc_ico_menu_item',
		'class'       => 'thb_vc_sc_menu_item',
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title', 'peakshops' ),
				'param_name'  => 'title',
				'admin_label' => true,
				'description' => esc_html__( 'Title of this food item', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Price', 'peakshops' ),
				'param_name'  => 'price',
				'description' => esc_html__( 'Price of this food item.', 'peakshops' ),
			),
			array(
				'type'        => 'textarea',
				'heading'     => esc_html__( 'Description', 'peakshops' ),
				'param_name'  => 'description',
				'description' => esc_html__( 'Include a small description for this food item.', 'peakshops' ),
			),
		),
		'description' => esc_html__( 'Add a food menu item', 'peakshops' ),
	)
);

// Gradient Type
vc_map(
	array(
		'base'        => 'thb_gradienttype',
		'name'        => esc_html__( 'Gradient Type', 'peakshops' ),
		'description' => esc_html__( 'Text with Gradient Color', 'peakshops' ),
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'icon'        => 'thb_vc_ico_gradienttype',
		'class'       => 'thb_vc_sc_gradienttype',
		'params'      => array(
			array(
				'type'        => 'textarea_safe',
				'heading'     => esc_html__( 'Content', 'peakshops' ),
				'param_name'  => 'gradient_text',
				'value'       => '<h2>Unleash creativity with the powerful tools of Gradient Type</h2>',
				'description' => esc_html__( 'Enter the content to display with gradient.', 'peakshops' ),
				'admin_label' => true,
			),
			$thb_animation_array,
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
				'param_name'  => 'extra_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
			),
			array(
				'type'        => 'checkbox',
				'group'       => esc_html__( 'Styling', 'peakshops' ),
				'heading'     => esc_html__( 'On Hover?', 'peakshops' ),
				'description' => esc_html__( 'Enabling this will show the gradient on hover only.', 'peakshops' ),
				'param_name'  => 'on_hover',
				'value'       => array(
					'Yes' => 'true',
				),
				'std'         => '',
			),
		),
	)
);
vc_add_param( 'thb_gradienttype', thb_vc_gradient_color1() );
vc_add_param( 'thb_gradienttype', thb_vc_gradient_color2() );

// Horizontal List
vc_map(
	array(
		'name'        => esc_html__( 'Horizontal List', 'peakshops' ),
		'base'        => 'thb_horizontal_list',
		'icon'        => 'thb_vc_ico_horizontal_list',
		'class'       => 'thb_vc_sc_horizontal_list',
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'      => array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Column Layout', 'peakshops' ),
				'param_name' => 'thb_columns',
				'value'      => array(
					'Single Column' => '1',
					'2 Columns'     => '2',
					'3 Columns'     => '3',
					'4 Columns'     => '4',
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Column Sizes', 'peakshops' ),
				'param_name' => 'columns_2_size',
				'value'      => array(
					'50% | 50%' => '',
					'80% | 20%' => 'size2_80_20',
					'70% | 30%' => 'size2_70_30',
					'60% | 40%' => 'size2_60_40',
					'40% | 60%' => 'size2_40_60',
					'30% | 70%' => 'size2_30_70',
					'20% | 80%' => 'size2_20_80',
				),
				'dependency' => array(
					'element' => 'thb_columns',
					'value'   => array( '2' ),
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Column Sizes', 'peakshops' ),
				'param_name' => 'columns_3_size',
				'value'      => array(
					'33% | 33% | 33%' => '',
					'20% | 40% | 40%' => 'size3_20_40_40',
					'50% | 25% | 25%' => 'size3_50_25_25',
					'25% | 50% | 25%' => 'size3_25_50_25',
					'25% | 25% | 50%' => 'size3_25_25_50',
				),
				'dependency' => array(
					'element' => 'thb_columns',
					'value'   => array( '3' ),
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Column Sizes', 'peakshops' ),
				'param_name' => 'columns_4_size',
				'value'      => array(
					'25% | 25% | 25% | 25%' => '',
					'15% | 35% | 35% | 15%' => 'size4_15_35_35_15',
					'35% | 35% | 15% | 15%' => 'size4_35_35_15_15',
					'35% | 15% | 35% | 15%' => 'size4_35_15_35_15',
					'15% | 35% | 15% | 35%' => 'size4_15_35_15_35',
				),
				'dependency' => array(
					'element' => 'thb_columns',
					'value'   => array( '4' ),
				),
			),
			array(
				'type'             => 'dropdown',
				'edit_field_class' => 'vc_col-sm-3',
				'heading'          => sprintf( esc_html__( 'Text Alignment %s', 'peakshops' ), '<span class="thb-row-heading">Column 1</span>' ),
				'param_name'       => 'column_1_align',
				'value'            => array(
					'Left'   => 'text-left',
					'Center' => 'text-center',
					'Right'  => 'text-right',
				),
			),
			array(
				'type'             => 'dropdown',
				'edit_field_class' => 'vc_col-sm-3',
				'heading'          => '<span class="thb-row-heading">Column 2</span>',
				'param_name'       => 'column_2_align',
				'value'            => array(
					'Left'   => 'text-left',
					'Center' => 'text-center',
					'Right'  => 'text-right',
				),
				'dependency'       => array(
					'element' => 'thb_columns',
					'value'   => array( '2', '3', '4' ),
				),
			),
			array(
				'type'             => 'dropdown',
				'edit_field_class' => 'vc_col-sm-3',
				'heading'          => '<span class="thb-row-heading">Column 3</span>',
				'param_name'       => 'column_3_align',
				'value'            => array(
					'Left'   => 'text-left',
					'Center' => 'text-center',
					'Right'  => 'text-right',
				),
				'dependency'       => array(
					'element' => 'thb_columns',
					'value'   => array( '3', '4' ),
				),
			),
			array(
				'type'             => 'dropdown',
				'edit_field_class' => 'vc_col-sm-3',
				'heading'          => '<span class="thb-row-heading">Column 4</span>',
				'param_name'       => 'column_4_align',
				'value'            => array(
					'Left'   => 'text-left',
					'Center' => 'text-center',
					'Right'  => 'text-right',
				),
				'dependency'       => array(
					'element' => 'thb_columns',
					'value'   => array( '4' ),
				),
			),
			array(
				'type'        => 'textarea_safe',
				'heading'     => esc_html__( 'Column 1 Content', 'peakshops' ),
				'param_name'  => 'column_1_content',
				'admin_label' => true,
				'description' => esc_html__( 'Enter your column text here', 'peakshops' ),
			),
			array(
				'type'        => 'textarea_safe',
				'heading'     => esc_html__( 'Column 2 Content', 'peakshops' ),
				'param_name'  => 'column_2_content',
				'admin_label' => true,
				'description' => esc_html__( 'Enter your column text here', 'peakshops' ),
				'dependency'  => array(
					'element' => 'thb_columns',
					'value'   => array( '2', '3', '4' ),
				),
			),
			array(
				'type'        => 'textarea_safe',
				'heading'     => esc_html__( 'Column 3 Content', 'peakshops' ),
				'param_name'  => 'column_3_content',
				'admin_label' => true,
				'description' => esc_html__( 'Enter your column text here', 'peakshops' ),
				'dependency'  => array(
					'element' => 'thb_columns',
					'value'   => array( '3', '4' ),
				),
			),
			array(
				'type'        => 'textarea_safe',
				'heading'     => esc_html__( 'Column 4 Content', 'peakshops' ),
				'param_name'  => 'column_4_content',
				'admin_label' => true,
				'description' => esc_html__( 'Enter your column text here', 'peakshops' ),
				'dependency'  => array(
					'element' => 'thb_columns',
					'value'   => array( '4' ),
				),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Full Link URL', 'peakshops' ),
				'param_name'  => 'url',
				'description' => esc_html__( 'Adding an URL for this will link your entire list item', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
				'param_name'  => 'extra_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Hover Color', 'peakshops' ),
				'param_name'  => 'hover_color',
				'description' => esc_html__( 'Hover Color for this item', 'peakshops' ),
				'group'       => 'Styling',
			),
			$thb_animation_array,
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'peakshops' ),
				'param_name'  => 'style',
				'value'       => $thb_button_style_array,
				'description' => esc_html__( 'This changes the look of the button', 'peakshops' ),
				'group'       => 'CTA Buttons',
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'CTA Button 1', 'peakshops' ),
				'param_name'  => 'cta_1',
				'description' => esc_html__( 'If you want to display a CTA button. Buttons are added to the last column.', 'peakshops' ),
				'group'       => 'CTA Buttons',
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'CTA Button 2', 'peakshops' ),
				'param_name'  => 'cta_2',
				'description' => esc_html__( 'If you want to display another CTA button. Buttons are added to the last column.', 'peakshops' ),
				'group'       => 'CTA Buttons',
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Full Width', 'peakshops' ),
				'param_name'       => 'full_width',
				'group'            => 'CTA Styling',
				'edit_field_class' => 'vc_col-sm-6',
				'value'            => array(
					'Yes' => 'true',
				),
				'description'      => esc_html__( 'If enabled, this will make the button fill its container', 'peakshops' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Size', 'peakshops' ),
				'param_name'       => 'size',
				'group'            => 'CTA Styling',
				'edit_field_class' => 'vc_col-sm-6',
				'std'              => 'medium',
				'value'            => array(
					'Small'   => 'small',
					'Medium'  => 'medium',
					'Large'   => 'large',
					'X-Large' => 'x-large',
				),
				'description'      => esc_html__( 'This changes the size of the button', 'peakshops' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Color', 'peakshops' ),
				'param_name'       => 'color',
				'group'            => 'CTA Styling',
				'edit_field_class' => 'vc_col-sm-6',
				'std'              => 'accent',
				'value'            => array(
					'Black'  => 'black',
					'White'  => 'white',
					'Accent' => 'accent',
				),
				'description'      => esc_html__( 'This changes the color of the button', 'peakshops' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Border Radius', 'peakshops' ),
				'param_name'       => 'border_radius',
				'group'            => 'CTA Styling',
				'edit_field_class' => 'vc_col-sm-6',
				'std'              => 'small-radius',
				'value'            => array(
					'None'  => 'no-radius',
					'Small' => 'small-radius',
					'Pill'  => 'pill-radius',
				),
				'description'      => esc_html__( 'This changes the border-radius of the button. Some styles may not have this future.', 'peakshops' ),
			),
		),
		'description' => esc_html__( 'Show your data in a horizontal list', 'peakshops' ),
	)
);

// VC Gallery
vc_remove_param( 'vc_gallery', 'type' );
vc_remove_param( 'vc_gallery', 'title' );
vc_remove_param( 'vc_gallery', 'interval' );
vc_remove_param( 'vc_gallery', 'onclick' );
vc_remove_param( 'vc_gallery', 'source' );
vc_remove_param( 'vc_gallery', 'custom_srcs' );
vc_remove_param( 'vc_gallery', 'css_animation' );
vc_remove_param( 'vc_gallery', 'custom_links' );
vc_remove_param( 'vc_gallery', 'custom_links_target' );

vc_add_param(
	'vc_gallery',
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Gallery type', 'peakshops' ),
		'param_name'  => 'gallery_type',
		'value'       => array(
			esc_html__( 'Regular Grid', 'peakshops' ) => 'grid',
			esc_html__( 'Masonry Grid', 'peakshops' ) => 'thb-portfolio',
		),
		'weight'      => 1,
		'description' => esc_html__( 'Select gallery style. If you are using Masonry Grid, you can set individual image sizes inside "Attachment Details > Masonry Size" when adding them to your gallery.', 'peakshops' ),
	)
);

vc_add_param(
	'vc_gallery',
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Columns', 'peakshops' ),
		'param_name'  => 'thb_columns',
		'admin_label' => true,
		'value'       => array(
			'2 Columns' => 'small-6 large-6',
			'3 Columns' => 'small-6 large-4',
			'4 Columns' => 'small-6 large-3',
			'5 Columns' => 'small-6 thb-5',
			'6 Columns' => 'small-6 large-2',
		),
		'weight'      => 1,
		'dependency'  => array(
			'element' => 'gallery_type',
			'value'   => array( 'grid' ),
		),
	)
);

vc_add_param(
	'vc_gallery',
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Margins between items', 'peakshops' ),
		'param_name'  => 'thb_margins',
		'group'       => 'Styling',
		'std'         => 'regular-padding',
		'value'       => array(
			'Regular' => 'regular-padding',
			'Mini'    => 'mini-padding',
			'Pixel'   => 'pixel-padding',
			'None'    => 'no-padding',
		),
		'weight'      => 1,
		'description' => esc_html__( 'This will change the margins between items', 'peakshops' ),
	)
);

vc_add_param(
	'vc_gallery',
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Use lightbox?', 'peakshops' ),
		'param_name'  => 'lightbox',
		'weight'      => 1,
		'value'       => array(
			'Yes' => 'mfp-gallery',
		),
		'description' => esc_html__( 'Images will link to their large versions using Lightbox.', 'peakshops' ),
	)
);

vc_add_param( 'vc_gallery', $thb_animation_array );

// Iconbox
vc_map(
	array(
		'name'        => esc_html__( 'Iconbox', 'peakshops' ),
		'base'        => 'thb_iconbox',
		'icon'        => 'thb_vc_ico_iconbox',
		'class'       => 'thb_vc_sc_iconbox',
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'      => array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Type', 'peakshops' ),
				'param_name' => 'type',
				'value'      => array(
					'Top Icon - Line after icon'   => 'top type1',
					'Top Icon - Line after title'  => 'top type2',
					'Top Icon - Regular'           => 'top type3',
					'Top Icon - Border Around'     => 'top type4',
					'Top Icon - Border Top'        => 'top type5',
					'Top Icon - Border Around - 2' => 'top type6',
					'Left Icon - Style 1'          => 'left type1',
					'Left Icon - Style 2'          => 'left type2',
					'Right Icon - Style 1'         => 'right type1',
					'Right Icon - Style 2'         => 'right type2',
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Alignment', 'peakshops' ),
				'param_name' => 'alignment',
				'value'      => array(
					'Left'   => 'text-left',
					'Center' => 'text-center',
					'Right'  => 'text-right',
				),
				'std'        => 'text-center',
				'dependency' => array(
					'element' => 'type',
					'value'   => array( 'top type1', 'top type2', 'top type3', 'top type4', 'top type5', 'top type6' ),
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Icon', 'peakshops' ),
				'param_name' => 'icon',
				'value'      => thb_get_icon_array(),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image As Icon', 'peakshops' ),
				'param_name'  => 'icon_image',
				'description' => esc_html__( 'You can set an image instead of an icon.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Image Width', 'peakshops' ),
				'param_name'  => 'icon_image_width',
				'description' => esc_html__( 'If you are using an image, you can set custom width here. Default is 64 (pixels).', 'peakshops' ),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Link', 'peakshops' ),
				'param_name'  => 'link',
				'description' => esc_html__( 'Add a link to the iconbox if desired.', 'peakshops' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Read More Style', 'peakshops' ),
				'param_name'  => 'style',
				'value'       => array(
					'Style 1 (Line Left)'         => 'style1',
					'Style 2 (Line Bottom)'       => 'style2',
					'Style 3 (Arrow Left)'        => 'style3',
					'Style 4 (Arrow Right)'       => 'style4',
					'Style 5 (Arrow Right Small)' => 'style5',
				),
				'std'         => 'style5',
				'description' => esc_html__( 'This changes the look of the read more text', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Heading', 'peakshops' ),
				'param_name'  => 'heading',
				'admin_label' => true,
				'group'       => 'Content',
			),
			array(
				'type'       => 'textarea_safe',
				'heading'    => esc_html__( 'Content', 'peakshops' ),
				'param_name' => 'description',
				'group'      => 'Content',
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Border Color for Style 5', 'peakshops' ),
				'param_name' => 'thb_border_color',
				'group'      => 'Styling',
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'SVG Icon Color', 'peakshops' ),
				'param_name' => 'thb_icon_color',
				'group'      => 'Styling',
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Heading Color', 'peakshops' ),
				'param_name'  => 'thb_heading_color',
				'group'       => 'Styling',
				'description' => esc_html__( 'Color of the heading', 'peakshops' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Text Color', 'peakshops' ),
				'param_name'  => 'thb_text_color',
				'group'       => 'Styling',
				'description' => esc_html__( 'Color of the text', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Heading Font Size', 'peakshops' ),
				'param_name'  => 'heading_font_size',
				'group'       => 'Styling',
				'description' => esc_html__( 'Enter any valid font-size: 16px, 14pt, etc.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Content Font Size', 'peakshops' ),
				'param_name'  => 'description_font_size',
				'group'       => 'Styling',
				'description' => esc_html__( 'Enter any valid font-size: 16px, 14pt, etc.', 'peakshops' ),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Hover SVG Icon Color', 'peakshops' ),
				'param_name' => 'thb_icon_color_hover',
				'group'      => 'Hover Styling',
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Hover Image As Icon', 'peakshops' ),
				'param_name'  => 'icon_image_hover',
				'description' => esc_html__( 'If you are using an image, you can set an hover image.', 'peakshops' ),
				'group'       => 'Hover Styling',
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Hover Heading Color', 'peakshops' ),
				'param_name'  => 'thb_heading_color_hover',
				'group'       => 'Hover Styling',
				'description' => esc_html__( 'Color of the heading', 'peakshops' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Hover Text Color', 'peakshops' ),
				'param_name'  => 'thb_text_color_hover',
				'group'       => 'Hover Styling',
				'description' => esc_html__( 'Color of the text', 'peakshops' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Animation', 'peakshops' ),
				'param_name'  => 'animation',
				'value'       => array(
					'Yes' => 'true',
				),
				'weight'      => 1,
				'std'         => 'true',
				'group'       => 'Animation',
				'description' => esc_html__( 'You can disable animation if you like.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Animation Speed', 'peakshops' ),
				'param_name'  => 'animation_speed',
				'value'       => '1.5',
				'group'       => 'Animation',
				'description' => esc_html__( 'Speed of the animation in seconds', 'peakshops' ),
				'dependency'  => array(
					'element' => 'animation',
					'value'   => array( 'true' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
				'param_name'  => 'extra_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
			),
		),
		'description' => esc_html__( 'Iconboxes with different animations', 'peakshops' ),
	)
);

// Icon List
vc_map(
	array(
		'name'        => esc_html__( 'Icon List', 'peakshops' ),
		'base'        => 'thb_iconlist',
		'icon'        => 'thb_vc_ico_iconlist',
		'class'       => 'thb_vc_sc_iconlist',
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'      => array(
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'peakshops' ),
				'param_name' => 'icon',
				'settings'   => array(
					'emptyIcon'    => false,
					'type'         => 'fontawesome',
					'iconsPerPage' => 200,
				),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Icon Color', 'peakshops' ),
				'param_name' => 'thb_icon_color',
				'group'      => 'Styling',
			),
			$thb_animation_array,
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Text Color', 'peakshops' ),
				'param_name' => 'thb_text_color',
				'group'      => 'Styling',
			),
			array(
				'type'        => 'exploded_textarea',
				'heading'     => esc_html__( 'List Content', 'peakshops' ),
				'param_name'  => 'list_content',
				'admin_label' => true,
				'description' => esc_html__( 'Each line will be considered a list item as well as commas.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
				'param_name'  => 'extra_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
			),
		),
		'description' => esc_html__( 'Display a list with icons', 'peakshops' ),
	)
);

// Image shortcode
vc_map(
	array(
		'name'        => 'Image',
		'base'        => 'thb_image',
		'icon'        => 'thb_vc_ico_image',
		'class'       => 'thb_vc_sc_image wpb_vc_single_image',
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'      => array(
			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__( 'Select Image', 'peakshops' ),
				'param_name' => 'image',
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Display Caption?', 'peakshops' ),
				'param_name'  => 'caption',
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If selected, the image caption will be displayed.', 'peakshops' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Caption Style', 'peakshops' ),
				'param_name'  => 'caption_style',
				'value'       => array(
					'Style1' => 'style1',
					'Style2' => 'style2',
				),
				'description' => esc_html__( 'Select caption style.', 'peakshops' ),
				'dependency'  => array(
					'element' => 'caption',
					'value'   => array( 'true' ),
				),
			),
			array(
				'type'       => 'textarea_html',
				'heading'    => esc_html__( 'Text Below Image', 'peakshops' ),
				'param_name' => 'content',
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Retina Size?', 'peakshops' ),
				'param_name'  => 'retina',
				'value'       => array(
					'Yes' => 'retina_size',
				),
				'description' => esc_html__( 'If selected, the image will be display half-size, so it looks crisps on retina screens. Full Width setting will override this.', 'peakshops' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Ignore Lazy-Loading?', 'peakshops' ),
				'param_name'  => 'ignore_lazyload',
				'value'       => array(
					'Yes' => 'thb-ignore-lazyload',
				),
				'description' => esc_html__( 'If selected, lazyloading wont work on this image.', 'peakshops' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Full Width?', 'peakshops' ),
				'param_name'  => 'full_width',
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If selected, the image will always fill its container', 'peakshops' ),
			),
			$thb_animation_array,
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Image size', 'peakshops' ),
				'param_name'  => 'img_size',
				'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'peakshops' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Image alignment', 'peakshops' ),
				'param_name'  => 'alignment',
				'value'       => array(
					'Align left'   => 'alignleft',
					'Align right'  => 'alignright',
					'Align center' => 'aligncenter',
					'Align None'   => 'alignnone',
				),
				'description' => esc_html__( 'Select image alignment.', 'peakshops' ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Link to Full-Width Image?', 'peakshops' ),
				'param_name' => 'lightbox',
				'value'      => array(
					'Yes' => 'true',
				),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Image link', 'peakshops' ),
				'param_name'  => 'img_link',
				'description' => esc_html__( 'Enter url if you want this image to have link.', 'peakshops' ),
				'dependency'  => array(
					'element'  => 'lightbox',
					'is_empty' => true,
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Lightbox Gallery ID', 'peakshops' ),
				'param_name'  => 'gallery_id',
				'description' => esc_html__( 'The images with the same Gallery ID will be grouped as a gallery', 'peakshops' ),
				'dependency'  => array(
					'element' => 'lightbox',
					'value'   => 'true',
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
				'param_name'  => 'extra_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Border Radius', 'peakshops' ),
				'param_name'  => 'thb_border_radius',
				'group'       => 'Styling',
				'description' => esc_html__( 'You can add your own border-radius code here. For ex: 2px 2px 4px 4px', 'peakshops' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Box Shadow', 'peakshops' ),
				'param_name'  => 'box_shadow',
				'value'       => array(
					'No Shadow' => '',
					'Small'     => 'small-shadow',
					'Medium'    => 'medium-shadow',
					'Large'     => 'large-shadow',
					'X-Large'   => 'xlarge-shadow',
				),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'lightbox-style2' ),
				),
				'group'       => 'Styling',
				'description' => esc_html__( 'Select from different shadow styles.', 'peakshops' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Image Max Width', 'peakshops' ),
				'param_name'  => 'max_width',
				'value'       => array(
					'100%' => 'size_100',
					'125%' => 'size_125',
					'150%' => 'size_150',
					'175%' => 'size_175',
					'200%' => 'size_200',
					'225%' => 'size_225',
					'250%' => 'size_250',
					'275%' => 'size_275',
				),
				'std'         => 'size_100',
				'group'       => 'Styling',
				'description' => esc_html__( 'By default, image is contained within the columns, by setting this, you can extend the image over the container', 'peakshops' ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Show Video on Hover?', 'peakshops' ),
				'param_name' => 'video',
				'group'      => esc_html__( 'Video', 'peakshops' ),
				'value'      => array(
					'Yes' => 'true',
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Video URL', 'peakshops' ),
				'param_name'  => 'video_url',
				'group'       => esc_html__( 'Video', 'peakshops' ),
				'description' => esc_html__( 'Please enter your video url here. (mp4 file)', 'peakshops' ),
				'dependency'  => array(
					'element' => 'video',
					'value'   => array( 'true' ),
				),
			),
		),
		'description' => esc_html__( 'Add an animated image', 'peakshops' ),
	)
);

// Image Slider
vc_map(
	array(
		'name'        => esc_html__( 'Image Slider', 'peakshops' ),
		'base'        => 'thb_image_slider',
		'icon'        => 'thb_vc_ico_image_slider',
		'class'       => 'thb_vc_sc_image_slider',
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'      => array(
			array(
				'type'       => 'attach_images',
				'heading'    => esc_html__( 'Select Images', 'peakshops' ),
				'param_name' => 'images',
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'peakshops' ),
				'param_name'  => 'thb_columns',
				'value'       => array(
					'Single Column' => '1',
					'Two Columns'   => 'small-12 medium-6',
					'Three Columns' => 'small-12 medium-4',
					'Four Columns'  => 'small-12 medium-3',
				),
				'description' => esc_html__( 'Select the layout.', 'peakshops' ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Use lightbox?', 'peakshops' ),
				'param_name' => 'lightbox',
				'value'      => array(
					'Yes' => 'mfp-gallery',
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Image Size', 'peakshops' ),
				'param_name'  => 'img_size',
				'value'       => '',
				'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "full" size.', 'peakshops' ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Vertical Center Images', 'peakshops' ),
				'param_name' => 'thb_center',
				'value'      => array(
					'Yes' => 'true',
				),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Equal Height Images', 'peakshops' ),
				'param_name' => 'thb_equal_height',
				'value'      => array(
					'Yes' => 'true',
				),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Use Pagination', 'peakshops' ),
				'param_name' => 'thb_pagination',
				'value'      => array(
					'Yes' => 'true',
				),
				'group'      => 'Controls',
				'std'        => 'true',
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Navigation Arrows', 'peakshops' ),
				'param_name' => 'thb_navigation',
				'group'      => 'Controls',
				'value'      => array(
					'Yes' => 'true',
				),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Auto Play', 'peakshops' ),
				'param_name'  => 'autoplay',
				'value'       => array(
					'Yes' => 'true',
				),
				'group'       => 'Controls',
				'description' => esc_html__( 'If enabled, the carousel will autoplay.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Speed of the AutoPlay', 'peakshops' ),
				'param_name'  => 'autoplay_speed',
				'value'       => '4000',
				'group'       => 'Controls',
				'description' => esc_html__( 'Speed of the autoplay, default 4000 (4 seconds)', 'peakshops' ),
				'dependency'  => array(
					'element' => 'autoplay',
					'value'   => array( 'true' ),
				),
			),
		),
		'description' => esc_html__( 'Add Slider with your images', 'peakshops' ),
	)
);

// Label
vc_map(
	array(
		'name'        => esc_html__( 'Label', 'peakshops' ),
		'base'        => 'thb_label',
		'icon'        => 'thb_vc_ico_label',
		'class'       => 'thb_vc_sc_label',
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'      => array(
			array(
				'type'       => 'textarea_html',
				'heading'    => esc_html__( 'Content', 'peakshops' ),
				'param_name' => 'content',
				'group'      => 'Content',
			),

			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Full Width', 'peakshops' ),
				'param_name'  => 'thb_full_width',
				'value'       => array(
					'Yes' => 'thb-label-full',
				),
				'weight'      => 1,
				'description' => esc_html__( 'If you enable this, the label will be full-width', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Border Radius', 'peakshops' ),
				'param_name'  => 'thb_border_radius',
				'weight'      => 1,
				'description' => esc_html__( 'You can add your own border-radius code here. For ex: 2px 2px 4px 4px', 'peakshops' ),
			),
			$thb_animation_array,
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
				'param_name'  => 'extra_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
			),
			array(
				'type'       => 'css_editor',
				'heading'    => esc_html__( 'Css', 'peakshops' ),
				'param_name' => 'css',
				'group'      => esc_html__( 'Design options', 'peakshops' ),
			),
		),
		'description' => esc_html__( 'Display a label box', 'peakshops' ),
	)
);

// Page Menu
vc_map(
	array(
		'name'        => esc_html__( 'Page Menu', 'peakshops' ),
		'base'        => 'thb_page_menu',
		'icon'        => 'thb_vc_ico_page_menu',
		'class'       => 'thb_vc_sc_page_menu',
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'      => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Select Menu to display', 'peakshops' ),
				'param_name'  => 'menu',
				'value'       => thb_get_menu_array(),
				'admin_label' => true,
				'description' => esc_html__( 'Select which menu to display on this page.', 'peakshops' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'peakshops' ),
				'param_name'  => 'style',
				'value'       => array(
					'Style - Regular' => 'style0',
					'Style - 1'       => 'style1',
					'Style - 2'       => 'style2',
				),
				'std'         => 'style1',
				'description' => esc_html__( 'This changes style of the menu.', 'peakshops' ),
			),
		),
		'description' => esc_html__( 'Display a sub-menu for your page.', 'peakshops' ),
	)
);

// Play Button
vc_map(
	array(
		'name'                    => esc_html__( 'Play Button', 'peakshops' ),
		'base'                    => 'thb_play',
		'icon'                    => 'thb_vc_ico_play',
		'class'                   => 'thb_vc_sc_play',
		'category'                => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'show_settings_on_create' => false,
		'description'             => esc_html__( 'For Row Video Backgrounds', 'peakshops' ),
	)
);

// Pricing Table Parent
vc_map(
	array(
		'name'            => esc_html__( 'Pricing Table', 'peakshops' ),
		'base'            => 'thb_pricing_table',
		'icon'            => 'thb_vc_ico_pricing_table',
		'class'           => 'thb_vc_sc_pricing_table',
		'content_element' => true,
		'category'        => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'as_parent'       => array( 'only' => 'thb_pricing_column' ),
		'params'          => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'peakshops' ),
				'param_name'  => 'thb_pricing_style',
				'admin_label' => true,
				'std'         => 'style1',
				'value'       => array(
					'Style 1' => 'style1',
					'Style 2' => 'style2',
					'Style 3' => 'style3',
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'peakshops' ),
				'param_name'  => 'thb_pricing_columns',
				'admin_label' => true,
				'value'       => array(
					'2 Columns' => 'large-6',
					'3 Columns' => 'large-4',
					'4 Columns' => 'medium-4 large-3',
					'5 Columns' => 'medium-6 thb-5',
					'6 Columns' => 'medium-4 large-2',
				),
			),
		),
		'description'     => esc_html__( 'Pricing Table', 'peakshops' ),
		'js_view'         => 'VcColumnView',
	)
);

vc_map(
	array(
		'name'        => esc_html__( 'Pricing Table Column', 'peakshops' ),
		'base'        => 'thb_pricing_column',
		'icon'        => 'thb_vc_ico_pricing_table',
		'class'       => 'thb_vc_sc_pricing_table',
		'as_child'    => array( 'only' => 'thb_pricing_table' ),
		'params'      => array(
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Highlight?', 'peakshops' ),
				'param_name'  => 'highlight',
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If enabled, this column will be hightlighted.', 'peakshops' ),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image', 'peakshops' ),
				'param_name'  => 'image',
				'description' => esc_html__( 'Select an image if you would like to display one on top.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title', 'peakshops' ),
				'param_name'  => 'title',
				'admin_label' => true,
				'description' => esc_html__( 'Title of this pricing column', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Price', 'peakshops' ),
				'param_name'  => 'price',
				'description' => esc_html__( 'Price of this pricing column.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Per', 'peakshops' ),
				'param_name'  => 'per',
				'description' => esc_html__( 'To use after the price. For ex: /month', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Sub Title', 'peakshops' ),
				'param_name'  => 'sub_title',
				'description' => esc_html__( 'Some information under the price.', 'peakshops' ),
			),
			array(
				'type'        => 'textarea_html',
				'heading'     => esc_html__( 'Description', 'peakshops' ),
				'param_name'  => 'content',
				'description' => esc_html__( 'Include a small description for this box, this text area supports HTML too.', 'peakshops' ),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Pricing CTA Button', 'peakshops' ),
				'param_name'  => 'link',
				'description' => esc_html__( 'Button at the end of the pricing table.', 'peakshops' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Color', 'peakshops' ),
				'param_name'  => 'accent_color',
				'group'       => 'Styling',
				'description' => esc_html__( 'Changes different areas of the pricing table based on selected style.', 'peakshops' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Color 2', 'peakshops' ),
				'param_name'  => 'accent_color_2',
				'group'       => 'Styling',
				'description' => esc_html__( 'Changes different areas of the pricing table based on selected style.', 'peakshops' ),
			),
		),
		'description' => esc_html__( 'Add a pricing table', 'peakshops' ),
	)
);

class WPBakeryShortCode_thb_pricing_table extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_pricing_column extends WPBakeryShortCode {}

// Products
vc_map(
	array(
		'name'        => esc_html__( 'Product Grid/Carousel', 'peakshops' ),
		'base'        => 'thb_product',
		'icon'        => 'thb_vc_ico_product',
		'class'       => 'thb_vc_sc_product',
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'      => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Product Sort', 'peakshops' ),
				'param_name'  => 'product_sort',
				'value'       => array(
					'Best Sellers'      => 'best-sellers',
					'Latest Products'   => 'latest-products',
					'Top Rated'         => 'top-rated',
					'Featured Products' => 'featured-products',
					'Sale Products'     => 'sale-products',
					'By Category'       => 'by-category',
					'By Product ID'     => 'by-id',
				),
				'description' => esc_html__( 'Select the order of the products you would like to show.', 'peakshops' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Product Category', 'peakshops' ),
				'param_name'  => 'cat',
				'value'       => thb_product_categories(),
				'description' => esc_html__( 'Select the order of the products you would like to show.', 'peakshops' ),
				'dependency'  => array(
					'element' => 'product_sort',
					'value'   => array( 'by-category' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Product IDs', 'peakshops' ),
				'param_name'  => 'product_ids',
				'description' => esc_html__( 'Enter the products IDs you would like to display seperated by comma', 'peakshops' ),
				'dependency'  => array(
					'element' => 'product_sort',
					'value'   => array( 'by-id' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Number of Items', 'peakshops' ),
				'param_name'  => 'item_count',
				'value'       => '4',
				'description' => esc_html__( 'The number of products to show.', 'peakshops' ),
				'dependency'  => array(
					'element' => 'product_sort',
					'value'   => array( 'by-category', 'sale-products', 'top-rated', 'latest-products', 'best-sellers', 'featured-products' ),
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Spacing', 'peakshops' ),
				'param_name' => 'thb_spacing',
				'value'      => array(
					'10px' => '10',
					'20px' => '20',
					'30px' => '30',
					'40px' => '40',
					'50px' => '50',
				),
				'std'        => '30',
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Layout', 'peakshops' ),
				'param_name'  => 'thb_style',
				'admin_label' => true,
				'std'         => 'thb-regular-grid',
				'value'       => array(
					'Grid'     => 'thb-regular-grid',
					'Carousel' => 'thb-carousel',
				),
				'description' => esc_html__( 'This changes the layout style of the product categories', 'peakshops' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'peakshops' ),
				'param_name'  => 'columns',
				'admin_label' => true,
				'value'       => array(
					'1 Column'  => '1',
					'2 Columns' => '2',
					'3 Columns' => '3',
					'4 Columns' => '4',
					'5 Columns' => '5',
					'6 Columns' => '6',
				),
				'description' => esc_html__( 'Select the layout of the posts.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
				'param_name'  => 'extra_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Pagination', 'peakshops' ),
				'param_name' => 'thb_pagination',
				'group'      => esc_html__( 'Carousel Controls', 'peakshops' ),
				'value'      => array(
					'Yes' => 'true',
				),
				'std'        => 'true',
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Navigation Arrows', 'peakshops' ),
				'param_name' => 'thb_navigation',
				'group'      => esc_html__( 'Carousel Controls', 'peakshops' ),
				'value'      => array(
					'Yes' => 'true',
				),
				'std'        => 'true',
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Auto Play', 'peakshops' ),
				'param_name'  => 'autoplay',
				'group'       => esc_html__( 'Carousel Controls', 'peakshops' ),
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If enabled, the carousel will autoplay.', 'peakshops' ),
				'dependency'  => array(
					'element' => 'thb_style',
					'value'   => array( 'thb-carousel' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Speed of the AutoPlay', 'peakshops' ),
				'param_name'  => 'autoplay_speed',
				'group'       => esc_html__( 'Carousel Controls', 'peakshops' ),
				'value'       => '4000',
				'description' => esc_html__( 'Speed of the autoplay, default 4000 (4 seconds)', 'peakshops' ),
				'dependency'  => array(
					'element' => 'autoplay',
					'value'   => array( 'true' ),
				),
			),
		),
		'description' => esc_html__( 'Add WooCommerce products', 'peakshops' ),
	)
);

// Product Hotspots.
vc_map(
	array(
		'name'             => esc_html__( 'Product Hot Spots', 'peakshops' ),
		'base'             => 'thb_hotspots_slider',
		'icon'             => 'thb_vc_ico_imagehotspots',
		'class'            => 'thb_vc_sc_hotspots',
		'front_enqueue_js' => array( Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/js/vendor/jquery.hotspot.js' ),
		'admin_enqueue_js' => array( Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/js/vendor/jquery.hotspot.js' ),
		'category'         => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'           => array(
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Select Image', 'peakshops' ),
				'param_name'  => 'image',
				'description' => esc_html__( 'After selecting your image, you can then click on the image in the preview area to add your hotspots on the desired locations.', 'peakshops' ),
			),
			array(
				'type'             => 'thb_hotspot_param',
				'heading'          => esc_html__( 'Image Preview', 'peakshops' ),
				'param_name'       => 'thb_hotspot_data',
				'edit_field_class' => 'vc_column vc_col-sm-12',
				'description'      => esc_html__( 'Click to add a hotspot - Drag to move it', 'peakshops' ),
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'thb_tooltip_function',
				'heading'    => esc_html__( 'Functionality', 'peakshops' ),
				'value'      => array(
					'Show on Hover' => 'hover',
					'Show on Click' => 'click',
				),
				'std'        => 'hover',
				'group'      => esc_html__( 'Styling', 'peakshops' ),
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'thb_pin_color',
				'heading'    => esc_html__( 'Pin Color', 'peakshops' ),
				'value'      => array(
					'Black'  => 'pin-black',
					'White'  => 'pin-white',
					'Accent' => 'pin-accent',
				),
				'std'        => 'pin-white',
				'group'      => esc_html__( 'Styling', 'peakshops' ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Pin Animation', 'peakshops' ),
				'param_name' => 'animation',
				'value'      => $thb_animation_field_array,
				'group'      => esc_html__( 'Styling', 'peakshops' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Enable Pulsate Effect', 'peakshops' ),
				'param_name'  => 'thb_pulsate',
				'value'       => array(
					esc_html__( 'Yes', 'peakshops' ) => 'thb-pulsate',
				),
				'std'         => 'thb-pulsate',
				'description' => esc_html__( 'Shows a pulsate around the pin.', 'peakshops' ),
				'group'       => esc_html__( 'Styling', 'peakshops' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Background Color', 'peakshops' ),
				'param_name'  => 'thb_bg_color',
				'description' => esc_html__( 'Changes the background color.', 'peakshops' ),
				'group'       => esc_html__( 'Styling', 'peakshops' ),
			),
		),
		'description'      => esc_html__( 'Add Image with Product Hotspots', 'peakshops' ),
	)
);

// Product List
vc_map(
	array(
		'name'        => esc_html__( 'Product List', 'peakshops' ),
		'base'        => 'thb_product_list',
		'icon'        => 'thb_vc_ico_product_list',
		'class'       => 'thb_vc_sc_product_list',
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title', 'peakshops' ),
				'param_name'  => 'title',
				'admin_label' => true,
				'description' => esc_html__( 'Title of the widget', 'peakshops' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Product Sort', 'peakshops' ),
				'param_name'  => 'product_sort',
				'value'       => array(
					'Best Sellers'      => 'best-sellers',
					'Latest Products'   => 'latest-products',
					'Top Rated'         => 'top-rated',
					'Featured Products' => 'featured-products',
					'Sale Products'     => 'sale-products',
					'By Category'       => 'by-category',
					'By Product ID'     => 'by-id',
				),
				'description' => esc_html__( 'Select the order of the products you would like to show.', 'peakshops' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Product Category', 'peakshops' ),
				'param_name'  => 'cat',
				'value'       => thb_product_categories(),
				'description' => esc_html__( 'Select the order of the products you would like to show.', 'peakshops' ),
				'dependency'  => array(
					'element' => 'product_sort',
					'value'   => array( 'by-category' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Product IDs', 'peakshops' ),
				'param_name'  => 'product_ids',
				'description' => esc_html__( 'Enter the products IDs you would like to display seperated by comma', 'peakshops' ),
				'dependency'  => array(
					'element' => 'product_sort',
					'value'   => array( 'by-id' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Number of Items', 'peakshops' ),
				'param_name'  => 'item_count',
				'value'       => '4',
				'description' => esc_html__( 'The number of products to show.', 'peakshops' ),
				'dependency'  => array(
					'element' => 'product_sort',
					'value'   => array( 'by-category', 'sale-products', 'top-rated', 'latest-products', 'best-sellers', 'featured-products' ),
				),
			),
		),
		'description' => esc_html__( 'Add WooCommerce products in a list', 'peakshops' ),
	)
);

// Product Categories
vc_map(
	array(
		'name'        => esc_html__( 'Product Categories', 'peakshops' ),
		'base'        => 'thb_product_categories',
		'icon'        => 'thb_vc_ico_product_categories',
		'class'       => 'thb_vc_sc_product_categories',
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'      => array(
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Product Category', 'peakshops' ),
				'param_name'  => 'cat',
				'value'       => thb_product_categories(),
				'description' => esc_html__( 'Select the categories you would like to display', 'peakshops' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Order By', 'peakshops' ),
				'param_name'  => 'thb_orderby',
				'std'         => 'name',
				'value'       => array(
					'Name'       => 'name',
					'Menu Order' => 'menu_order',
				),
				'description' => esc_html__( 'This changes the order of the categories.', 'peakshops' ),
			),
			array(
				'type'        => 'thb_radio_image',
				'heading'     => esc_html__( 'Style', 'peakshops' ),
				'param_name'  => 'category_style',
				'options'     => array(
					'style1' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/category_styles/style1.png',
					'style2' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/category_styles/style2.png',
					'style3' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/category_styles/style3.png',
					'style4' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/category_styles/style4.png',
					'style5' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/category_styles/style5.png',
					'style6' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/category_styles/style6.png',
					'style7' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/category_styles/style7.png',
				),
				'std'         => 'style1',
				'description' => esc_html__( 'Select the categories you would like to display', 'peakshops' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Layout', 'peakshops' ),
				'param_name'  => 'thb_style',
				'admin_label' => true,
				'std'         => 'thb-regular-grid',
				'value'       => array(
					'Grid'     => 'thb-regular-grid',
					'Carousel' => 'thb-carousel',
				),
				'description' => esc_html__( 'This changes the layout style of the product categories', 'peakshops' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Category Product Counts', 'peakshops' ),
				'param_name'  => 'category_counts',
				'value'       => array(
					'Yes' => 'true',
				),
				'std'         => 'true',
				'description' => esc_html__( 'Toggles category product counts.', 'peakshops' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'peakshops' ),
				'param_name'  => 'columns',
				'admin_label' => true,
				'value'       => array(
					'Six Columns'   => '6',
					'Five Columns'  => '5',
					'Four Columns'  => '4',
					'Three Columns' => '3',
					'Two Columns'   => '2',
					'One Column'    => '1',
				),
				'description' => esc_html__( 'Select the layout of the products.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
				'param_name'  => 'extra_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
			),
		),
		'description' => esc_html__( 'Add WooCommerce product categories', 'peakshops' ),
	)
);

// Progress Bar Shortcode
vc_map(
	array(
		'name'        => esc_html__( 'Progress Bar', 'peakshops' ),
		'base'        => 'thb_progressbar',
		'icon'        => 'thb_vc_ico_progressbar',
		'class'       => 'thb_vc_sc_progressbar',
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title', 'peakshops' ),
				'param_name'  => 'title',
				'admin_label' => true,
				'description' => esc_html__( 'Title of this progress bar', 'peakshops' ),
				'value'       => 'Development',
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Progress', 'peakshops' ),
				'param_name'  => 'progress',
				'admin_label' => true,
				'description' => esc_html__( 'Value for this progress. Should be between 0 and 100', 'peakshops' ),
				'value'       => '70',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Bar Color', 'peakshops' ),
				'param_name'       => 'thb_bar_color',
				'edit_field_class' => 'vc_col-sm-6',
				'description'      => esc_html__( 'Uses the accent color by default', 'peakshops' ),
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Bar Color 2', 'peakshops' ),
				'param_name'       => 'thb_bar_color_2',
				'edit_field_class' => 'vc_col-sm-6',
				'description'      => esc_html__( 'Uses the accent color by default', 'peakshops' ),
			),
		),
		'description' => esc_html__( 'Display progress bars in different colors', 'peakshops' ),
	)
);

// Slider Parent
vc_map(
	array(
		'name'            => esc_html__( 'Slider', 'peakshops' ),
		'base'            => 'thb_slider_parent',
		'icon'            => 'thb_vc_ico_slider',
		'class'           => 'thb_vc_sc_slider',
		'content_element' => true,
		'category'        => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'as_parent'       => array( 'only' => 'thb_slider' ),
		'params'          => array(
			array(
				'type'        => 'thb_radio_image',
				'heading'     => esc_html__( 'Style', 'peakshops' ),
				'param_name'  => 'thb_slider_style',
				'admin_label' => true,
				'std'         => 'style1',
				'options'     => array(
					'style1' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/slider_styles/style1.png',
					'style2' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/slider_styles/style2.png',
					'style3' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/slider_styles/style3.png',
					'style4' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/slider_styles/style4.png',
					'style5' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/slider_styles/style5.png',
				),
				'description' => esc_html__( 'This changes the style of the slider.', 'peakshops' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Slider Horizontal Size', 'peakshops' ),
				'param_name'  => 'thb_slider_size',
				'value'       => array(
					'Regular'  => 'thb-size-normal',
					'Extended' => 'thb-size-extended',
				),
				'std'         => 'thb-size-normal',
				'description' => esc_html__( 'This changes the style of the slider. ', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Slider Height', 'peakshops' ),
				'param_name'  => 'thb_slider_height',
				'description' => esc_html__( 'You can use different units such as vw, vh and px. Default is 500px.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Slider Mobile Height', 'peakshops' ),
				'param_name'  => 'thb_slider_height_mobile',
				'description' => esc_html__( 'You can use different units such as vw, vh and px. Default is 300px.', 'peakshops' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Slider Animation', 'peakshops' ),
				'param_name'  => 'thb_slider_animation',
				'value'       => array(
					'Slide' => 'false',
					'Fade'  => 'true',
				),
				'std'         => 'true',
				'description' => esc_html__( 'This changes the animation.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
				'param_name'  => 'extra_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Auto Play', 'peakshops' ),
				'param_name'  => 'autoplay',
				'group'       => esc_html__( 'Auto Play', 'peakshops' ),
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If enabled, the slider will autoplay.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Speed of the AutoPlay', 'peakshops' ),
				'param_name'  => 'autoplay_speed',
				'value'       => '4000',
				'group'       => esc_html__( 'Auto Play', 'peakshops' ),
				'description' => esc_html__( 'Speed of the autoplay, default 4000 (4 seconds)', 'peakshops' ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Pagination', 'peakshops' ),
				'param_name' => 'thb_pagination',
				'group'      => esc_html__( 'Controls', 'peakshops' ),
				'value'      => array(
					'Yes' => 'true',
				),
				'std'        => 'true',
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Pagination Position', 'peakshops' ),
				'param_name'  => 'thb_pagination_position',
				'group'       => esc_html__( 'Controls', 'peakshops' ),
				'value'       => array(
					'Regular' => 'thb-regular-pagination',
					'Inside'  => 'thb-inside-pagination',
				),
				'std'         => 'thb-regular-pagination',
				'description' => esc_html__( 'This changes the position of the pagination. ', 'peakshops' ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Navigation Arrows', 'peakshops' ),
				'param_name' => 'thb_navigation',
				'group'      => esc_html__( 'Controls', 'peakshops' ),
				'value'      => array(
					'Yes' => 'true',
				),
				'std'        => 'true',
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Navigation Arrows Position', 'peakshops' ),
				'param_name'  => 'thb_navigation_position',
				'group'       => esc_html__( 'Controls', 'peakshops' ),
				'value'       => array(
					'Regular' => 'thb-light-arrows',
					'Outside' => 'thb-offset-arrows',
				),
				'std'         => 'thb-arrows-regular',
				'description' => esc_html__( 'This changes the position of the arrows. ', 'peakshops' ),
			),
			array(
				'type'        => 'colorpicker',
				'group'       => esc_html__( 'Customization', 'peakshops' ),
				'heading'     => esc_html__( 'Slide Background Color', 'peakshops' ),
				'param_name'  => 'thb_slider_bg',
				'description' => esc_html__( 'Uses the accent color by default. Used on certain styles, not all.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'group'       => esc_html__( 'Customization', 'peakshops' ),
				'heading'     => esc_html__( 'Border Radius', 'peakshops' ),
				'param_name'  => 'thb_border_radius',
				'description' => esc_html__( 'You can use different units such as vw, vh and px.', 'peakshops' ),
			),
		),
		'description'     => esc_html__( 'Different Slider Layouts', 'peakshops' ),
		'js_view'         => 'VcColumnView',
	)
);

vc_map(
	array(
		'name'        => esc_html__( 'Slide', 'peakshops' ),
		'base'        => 'thb_slider',
		'icon'        => 'thb_vc_ico_slider',
		'class'       => 'thb_vc_sc_slider',
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'as_child'    => array( 'only' => 'thb_slider_parent' ),
		'params'      => array(
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image', 'peakshops' ),
				'param_name'  => 'bg_image',
				'group'       => esc_html__( 'Content', 'peakshops' ),
				'description' => esc_html__( 'Set an image for this slide.', 'peakshops' ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Text Align', 'peakshops' ),
				'param_name' => 'text_align',
				'std'        => 'left',
				'group'      => esc_html__( 'Text', 'peakshops' ),
				'value'      => array(
					'Left'   => 'left',
					'Center' => 'center',
					'Right'  => 'right',
				),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Slide Link', 'peakshops' ),
				'param_name'  => 'slide_link',
				'group'       => esc_html__( 'Content', 'peakshops' ),
				'description' => esc_html__( 'You can use this setting to link the whole slide.', 'peakshops' ),
			),
			array(
				'type'             => 'textarea_raw_html',
				'heading'          => esc_html__( 'Sub-Title', 'peakshops' ),
				'param_name'       => 'subtitle',
				'edit_field_class' => 'thb_simple_raw_html vc_col-xs-12 ',
				'group'            => esc_html__( 'Content', 'peakshops' ),
				'description'      => esc_html__( 'Sub-Title of the Slide', 'peakshops' ),
			),
			array(
				'type'             => 'textarea_raw_html',
				'heading'          => esc_html__( 'Title', 'peakshops' ),
				'param_name'       => 'title',
				'edit_field_class' => 'thb_simple_raw_html vc_col-xs-12 ',
				'group'            => esc_html__( 'Content', 'peakshops' ),
				'description'      => esc_html__( 'Title of the Slide', 'peakshops' ),
			),
			array(
				'type'             => 'textarea_raw_html',
				'heading'          => esc_html__( 'Text', 'peakshops' ),
				'param_name'       => 'text',
				'edit_field_class' => 'thb_simple_raw_html vc_col-xs-12 ',
				'group'            => esc_html__( 'Content', 'peakshops' ),
				'description'      => esc_html__( 'Description text', 'peakshops' ),
			),
			array(
				'type'             => 'vc_link',
				'heading'          => esc_html__( 'Button - 1', 'peakshops' ),
				'param_name'       => 'button_1',
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => esc_html__( 'Buttons', 'peakshops' ),
				'description'      => esc_html__( 'Button - 1 Content', 'peakshops' ),
			),
			array(
				'type'             => 'vc_link',
				'heading'          => esc_html__( 'Button - 2', 'peakshops' ),
				'param_name'       => 'button_2',
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => esc_html__( 'Buttons', 'peakshops' ),
				'description'      => esc_html__( 'Button - 2 Content', 'peakshops' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Style', 'peakshops' ),
				'param_name'       => 'btn_style',
				'edit_field_class' => 'vc_col-sm-6',
				'value'            => array(
					'Style 1' => 'btn style1',
					'Style 2' => 'btn style2',
					'Text'    => 'btn-text-regular',
					'Text 2'  => 'btn-text-regular style2',
				),
				'group'            => esc_html__( 'Buttons', 'peakshops' ),
				'std'              => 'btn style1',
				'description'      => esc_html__( 'This changes the look of the buttons.', 'peakshops' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Color', 'peakshops' ),
				'param_name'       => 'btn_color',
				'group'            => esc_html__( 'Buttons', 'peakshops' ),
				'edit_field_class' => 'vc_col-sm-6',
				'std'              => 'accent',
				'value'            => array(
					'Black'  => 'black',
					'White'  => 'white',
					'Accent' => 'accent',
				),
				'description'      => esc_html__( 'This changes the color of the button', 'peakshops' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Border Radius', 'peakshops' ),
				'param_name'       => 'btn_border_radius',
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => esc_html__( 'Buttons', 'peakshops' ),
				'std'              => 'small-radius',
				'value'            => array(
					'None'  => 'no-radius',
					'Small' => 'small-radius',
					'Pill'  => 'pill-radius',
				),
				'description'      => esc_html__( 'This changes the border-radius of the button. Some styles may not have this future.', 'peakshops' ),
			),
		),
		'description' => esc_html__( 'Single Slide', 'peakshops' ),
	)
);
class WPBakeryShortCode_thb_slider_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_slider extends WPBakeryShortCode {}

// Slidetype
vc_map(
	array(
		'base'        => 'thb_slidetype',
		'name'        => esc_html__( 'Slide Type', 'peakshops' ),
		'description' => esc_html__( 'Animated text scrolling', 'peakshops' ),
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'icon'        => 'thb_vc_ico_slidetype',
		'class'       => 'thb_vc_sc_slidetype',
		'params'      => array(
			array(
				'type'        => 'textarea_safe',
				'heading'     => esc_html__( 'Content', 'peakshops' ),
				'param_name'  => 'slide_text',
				'value'       => '<h2>*Animate Content 1;Animate Content 2*</h2>',
				'description' => 'Enter the content to display with typing text. <br />
			Text within <b>*</b> will be animated, for example: <strong>*Sample text*</strong>. <br />
			Text separator is <b>;</b> for example: <strong>*Animate Content 1; Animate Content 2*</strong> which will create new lines at ;',
				'admin_label' => true,
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'peakshops' ),
				'param_name'  => 'style',
				'admin_label' => true,
				'value'       => array(
					'Lines'      => 'style1',
					'Words'      => 'style2',
					'Characters' => 'style3',
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Animated Text Color', 'peakshops' ),
				'param_name'  => 'thb_animated_color',
				'description' => esc_html__( 'Uses the accent color by default', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
				'param_name'  => 'extra_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
			),
		),
	)
);

// Share shortcode.
vc_map(
	array(
		'name'        => esc_html__( 'Social Links w/ Icon', 'peakshops' ),
		'base'        => 'thb_social_links',
		'icon'        => 'thb_vc_ico_share',
		'class'       => 'thb_vc_sc_sociallinks',
		'description' => esc_html__( 'Display your social links.', 'peakshops' ),
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title', 'peakshops' ),
				'param_name'  => 'title',
				'description' => esc_html__( 'Adds a title before the social icons.', 'peakshops' ),
			),
			array(
				'type'        => 'thb_radio_image',
				'heading'     => esc_html__( 'Style', 'peakshops' ),
				'param_name'  => 'style',
				'admin_label' => true,
				'std'         => 'style1',
				'options'     => array(
					'style1' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/social_link_styles/style1.png',
					'style2' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/social_link_styles/style2.png',
					'style3' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/social_link_styles/style3.png',
					'style4' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/social_link_styles/style4.png',
				),
			),
		),
	)
);

// Stroke type
vc_map(
	array(
		'base'        => 'thb_stroketype',
		'name'        => esc_html__( 'Stroke Type', 'peakshops' ),
		'description' => esc_html__( 'Text with Stroke style', 'peakshops' ),
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'icon'        => 'thb_vc_ico_stroketype',
		'class'       => 'thb_vc_sc_stroketype',
		'params'      => array(
			array(
				'type'        => 'textarea_safe',
				'heading'     => esc_html__( 'Content', 'peakshops' ),
				'param_name'  => 'slide_text',
				'value'       => '<h1>Peak Shops</h1>',
				'description' => 'Enter the content to display with stroke.',
				'admin_label' => true,
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Text Color', 'peakshops' ),
				'param_name'  => 'thb_color',
				'description' => esc_html__( 'Select text color', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Stroke Width', 'peakshops' ),
				'param_name'  => 'stroke_width',
				'std'         => '2px',
				'description' => esc_html__( 'Enter the value for the stroke width. ', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
				'param_name'  => 'extra_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
			),
			$thb_animation_array,
		),
	)
);

// Subscription
vc_map(
	array(
		'name'        => esc_html__( 'Subscription Form', 'peakshops' ),
		'base'        => 'thb_subscribe',
		'icon'        => 'thb_vc_ico_subscribe',
		'class'       => 'thb_vc_sc_subscribe',
		'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'      => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'peakshops' ),
				'param_name'  => 'style',
				'admin_label' => true,
				'std'         => 'style1',
				'value'       => array(
					'Vertical'   => 'style1',
					'Horizontal' => 'style2',
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title', 'peakshops' ),
				'admin_label' => true,
				'param_name'  => 'title',
			),
			array(
				'type'       => 'textarea_html',
				'heading'    => esc_html__( 'Description', 'peakshops' ),
				'param_name' => 'content',
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
				'param_name'  => 'extra_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
			),
		),
		'description' => esc_html__( 'Add a subscription form', 'peakshops' ),
	)
);

// Tabs
vc_map(
	array(
		'name'                    => esc_html__( 'Tabs', 'peakshops' ),
		'base'                    => 'thb_tabs',
		'icon'                    => 'thb_vc_ico_thb_tabs',
		'class'                   => 'thb_vc_sc_thb_tabs wpb_vc_tabs wpb_vc_tta_tabs',
		'show_settings_on_create' => false,
		'as_parent'               => array(
			'only' => 'vc_tta_section',
		),
		'category'                => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'params'                  => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'peakshops' ),
				'param_name'  => 'style',
				'admin_label' => true,
				'value'       => array(
					'Style 1' => 'style1',
					'Style 2' => 'style2',
					'Style 3' => 'style3',
					'Style 4' => 'style4',
				),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'active_section',
				'heading'     => esc_html__( 'Active section', 'peakshops' ),
				'value'       => 1,
				'description' => esc_html__( 'Enter active section number.', 'peakshops' ),
			),
		),
		'description'             => esc_html__( 'Tabbed Content', 'peakshops' ),
		'js_view'                 => 'VcBackendTtaTabsView',
		'custom_markup'           => '
	<div class="vc_tta-container" data-vc-action="collapse">
		<div class="vc_general vc_tta vc_tta-tabs vc_tta-color-backend-tabs-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-spacing-1 vc_tta-tabs-position-top vc_tta-controls-align-left">
			<div class="vc_tta-tabs-container">'
				. '<ul class="vc_tta-tabs-list">'
				. '<li class="vc_tta-tab" data-vc-tab data-vc-target-model-id="{{ model_id }}" data-element_type="vc_tta_section"><a href="javascript:;" data-vc-tabs data-vc-container=".vc_tta" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-target-model-id="{{ model_id }}"><span class="vc_tta-title-text">{{ section_title }}</span></a></li>'
				. '</ul>
			</div>
			<div class="vc_tta-panels vc_clearfix {{container-class}}">
				{{ content }}
			</div>
		</div>
	</div>',
		'default_content'         => '
		[vc_tta_section title="' . sprintf( '%s %d', esc_html__( 'Tab', 'peakshops' ), 1 ) . '"][/vc_tta_section]
		[vc_tta_section title="' . sprintf( '%s %d', esc_html__( 'Tab', 'peakshops' ), 2 ) . '"][/vc_tta_section]
	',
		'admin_enqueue_js'        => array(
			vc_asset_url( 'lib/vc_tabs/vc-tabs.min.js' ),
		),
	)
);

VcShortcodeAutoloader::getInstance()->includeClass( 'WPBakeryShortCode_VC_Tta_Tabs' );

class WPBakeryShortCode_thb_tabs extends WPBakeryShortCode_VC_Tta_Accordion { }

// Team Member Parent
vc_map(
	array(
		'name'            => esc_html__( 'Team Members', 'peakshops' ),
		'base'            => 'thb_team_parent',
		'icon'            => 'thb_vc_ico_team',
		'class'           => 'thb_vc_sc_team',
		'content_element' => true,
		'category'        => esc_html__( 'by Fuel Themes', 'peakshops' ),
		'as_parent'       => array( 'only' => 'thb_team, thb_team_addnew' ),
		'params'          => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Layout', 'peakshops' ),
				'param_name'  => 'thb_style',
				'admin_label' => true,
				'value'       => array(
					'Style 1 (Grid)'     => 'style1',
					'Style 2 (Carousel)' => 'thb-carousel',
				),
				'description' => esc_html__( 'This changes the layout style of the team members', 'peakshops' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Margins between items', 'peakshops' ),
				'param_name'  => 'thb_margins',
				'group'       => 'Styling',
				'std'         => 'regular-padding',
				'value'       => array(
					'Regular' => 'regular-padding',
					'Mini'    => 'mini-padding',
					'Pixel'   => 'pixel-padding',
					'None'    => 'no-padding',
				),
				'description' => esc_html__( 'This will change the margins between team members.', 'peakshops' ),
				'dependency'  => array(
					'element' => 'thb_style',
					'value'   => array( 'style1' ),
				),
			),
			array(
				'type'        => 'thb_radio_image',
				'heading'     => esc_html__( 'Team Member Style', 'peakshops' ),
				'param_name'  => 'thb_member_style',
				'options'     => array(
					'member_style1' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/team_member_styles/style1.png',
					'member_style3' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/team_member_styles/style3.png',
					'member_style4' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/team_member_styles/style4.png',
					'member_style5' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/team_member_styles/style5.png',
				),
				'std'         => 'member_style1',
				'description' => esc_html__( 'This changes the style of the members', 'peakshops' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'peakshops' ),
				'param_name'  => 'thb_columns',
				'admin_label' => true,
				'value'       => array(
					'1 Column'  => 'medium-12',
					'2 Columns' => 'large-6',
					'3 Columns' => 'large-4',
					'4 Columns' => 'medium-4 large-3',
					'5 Columns' => 'medium-6 thb-5',
					'6 Columns' => 'medium-4 large-2',
				),
			),
			$thb_animation_array,
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Text Color', 'peakshops' ),
				'param_name'  => 'thb_text_color',
				'value'       => array(
					'Dark'  => 'team-dark',
					'Light' => 'team-light',
				),
				'group'       => 'Styling',
				'std'         => 'team-dark',
				'description' => esc_html__( 'Color of the text inside hover information', 'peakshops' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Auto Play', 'peakshops' ),
				'param_name'  => 'autoplay',
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If enabled, the carousel will autoplay.', 'peakshops' ),
				'dependency'  => array(
					'element' => 'thb_style',
					'value'   => array( 'thb-carousel' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Speed of the AutoPlay', 'peakshops' ),
				'param_name'  => 'autoplay_speed',
				'value'       => '4000',
				'description' => esc_html__( 'Speed of the autoplay, default 4000 (4 seconds)', 'peakshops' ),
				'dependency'  => array(
					'element' => 'autoplay',
					'value'   => array( 'true' ),
				),
			),
		),
		'description'     => esc_html__( 'Team Members', 'peakshops' ),
		'js_view'         => 'VcColumnView',
	)
);

vc_map(
	array(
		'name'        => esc_html__( 'Team Member', 'peakshops' ),
		'base'        => 'thb_team',
		'icon'        => 'thb_vc_ico_team',
		'class'       => 'thb_vc_sc_team',
		'as_child'    => array( 'only' => 'thb_team_parent' ),
		'params'      => array(
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image', 'peakshops' ),
				'param_name'  => 'image',
				'description' => esc_html__( 'Add Team Member image here.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Name', 'peakshops' ),
				'param_name'  => 'name',
				'admin_label' => true,
				'description' => esc_html__( 'Name of the member.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Sub Title', 'peakshops' ),
				'param_name'  => 'sub_title',
				'description' => esc_html__( 'Position or title of the member.', 'peakshops' ),
			),
			array(
				'type'        => 'textarea_safe',
				'heading'     => esc_html__( 'Description', 'peakshops' ),
				'param_name'  => 'description',
				'description' => esc_html__( 'Include a small description for this member, this text area supports HTML too.', 'peakshops' ),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Link', 'peakshops' ),
				'param_name'  => 'link',
				'description' => esc_html__( 'You can set a global link for your team member here.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra Class for the link.', 'peakshops' ),
				'param_name'  => 'extra_link_class',
				'description' => esc_html__( 'This class will be add to the link.', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Facebook', 'peakshops' ),
				'param_name'  => 'facebook',
				'group'       => esc_html__( 'Social Icons', 'peakshops' ),
				'description' => esc_html__( 'Enter Facebook Link', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Twitter', 'peakshops' ),
				'param_name'  => 'twitter',
				'group'       => esc_html__( 'Social Icons', 'peakshops' ),
				'description' => esc_html__( 'Enter Twitter Link', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Linkedin', 'peakshops' ),
				'param_name'  => 'linkedin',
				'group'       => esc_html__( 'Social Icons', 'peakshops' ),
				'description' => esc_html__( 'Enter Linkedin Link', 'peakshops' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Instagram', 'peakshops' ),
				'param_name'  => 'instagram',
				'group'       => esc_html__( 'Social Icons', 'peakshops' ),
				'description' => esc_html__( 'Enter Instagram Link', 'peakshops' ),
			),
		),
		'description' => esc_html__( 'Single Team Member', 'peakshops' ),
	)
);
vc_add_param( 'thb_team_parent', thb_vc_gradient_color1() );
vc_add_param( 'thb_team_parent', thb_vc_gradient_color2() );
vc_add_param(
	'thb_team_parent',
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Shadow Color for Style 3', 'peakshops' ),
		'param_name'  => 'box_shadow',
		'description' => esc_html__( 'Choose a shadow color if needed', 'peakshops' ),
		'group'       => 'Styling',
	)
);

class WPBakeryShortCode_thb_team_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_team extends WPBakeryShortCode {}

	// Testimonial Parent
	vc_map(
		array(
			'name'            => esc_html__( 'Testimonials', 'peakshops' ),
			'base'            => 'thb_testimonial_parent',
			'icon'            => 'thb_vc_ico_testimonial',
			'class'           => 'thb_vc_sc_testimonial',
			'content_element' => true,
			'category'        => esc_html__( 'by Fuel Themes', 'peakshops' ),
			'as_parent'       => array( 'only' => 'thb_testimonial' ),
			'params'          => array(
				array(
					'type'        => 'thb_radio_image',
					'heading'     => esc_html__( 'Style', 'peakshops' ),
					'param_name'  => 'thb_style',
					'admin_label' => true,
					'std'         => 'style1',
					'options'     => array(
						'style1'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/testimonials/style1.png',
						'style2'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/testimonials/style2.png',
						'style3'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/testimonials/style3.png',
						'style4'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/testimonials/style4.png',
						'style6'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/testimonials/style6.png',
						'style7'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/testimonials/style7.png',
						'style8'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/testimonials/style8.png',
						'style9'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/testimonials/style9.png',
						'style10' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/testimonials/style10.png',
					),
					'description' => esc_html__( 'This changes the layout style of the testimonials', 'peakshops' ),
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Columns', 'peakshops' ),
					'param_name'  => 'columns',
					'value'       => $thb_column_array,
					'description' => esc_html__( 'This changes the column counts of the carousel or grid', 'peakshops' ),
					'dependency'  => array(
						'element' => 'thb_style',
						'value'   => array( 'style3', 'style6' ),
					),
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__( 'Display Slider Pagination', 'peakshops' ),
					'param_name' => 'thb_pagination',
					'value'      => array(
						'Yes' => 'true',
					),
					'std'        => 'true',
					'dependency' => array(
						'element' => 'thb_style',
						'value'   => array( 'style1', 'style2', 'style3', 'style4', 'style7', 'style8', 'style9', 'style10' ),
					),
				),
				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__( 'Auto Play', 'peakshops' ),
					'param_name'  => 'autoplay',
					'group'       => esc_html__( 'Auto Play', 'peakshops' ),
					'value'       => array(
						'Yes' => 'true',
					),
					'description' => esc_html__( 'If enabled, the carousel will autoplay.', 'peakshops' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Speed of the AutoPlay', 'peakshops' ),
					'param_name'  => 'autoplay_speed',
					'value'       => '4000',
					'group'       => esc_html__( 'Auto Play', 'peakshops' ),
					'description' => esc_html__( 'Speed of the autoplay, default 4000 (4 seconds)', 'peakshops' ),
					'dependency'  => array(
						'element' => 'thb_style',
						'value'   => array( 'style1', 'style2', 'style3', 'style4', 'style5', 'style7', 'style8' ),
					),
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Extra Class Name', 'peakshops' ),
					'param_name' => 'extra_class',
				),
			),
			'description'     => esc_html__( 'Testimonials Slider or Grid', 'peakshops' ),
			'js_view'         => 'VcColumnView',
		)
	);

	vc_map(
		array(
			'name'        => esc_html__( 'Testimonial', 'peakshops' ),
			'base'        => 'thb_testimonial',
			'icon'        => 'thb_vc_ico_testimonial',
			'class'       => 'thb_vc_sc_testimonial',
			'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
			'as_child'    => array( 'only' => 'thb_testimonial_parent' ),
			'params'      => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Quote Title', 'peakshops' ),
					'param_name'  => 'quote_title',
					'group'       => esc_html__( 'Quote', 'peakshops' ),
					'description' => esc_html__( 'Title of the Quote', 'peakshops' ),
				),
				array(
					'type'        => 'textarea',
					'heading'     => esc_html__( 'Quote', 'peakshops' ),
					'param_name'  => 'quote',
					'group'       => esc_html__( 'Quote', 'peakshops' ),
					'description' => esc_html__( 'Quote text', 'peakshops' ),
				),
				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__( 'Enable Review Stars', 'peakshops' ),
					'param_name'  => 'thb_review',
					'value'       => array(
						'Yes' => 'true',
					),
					'group'       => esc_html__( 'Quote', 'peakshops' ),
					'description' => esc_html__( 'If you enable this, stars will be shown to display user review.', 'peakshops' ),
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Review', 'peakshops' ),
					'param_name'  => 'thb_review_stars',
					'value'       => array(
						'5 Stars' => '5',
						'4 Stars' => '4',
						'3 Stars' => '3',
						'2 Stars' => '2',
						'1 Stars' => '1',
						'0 Stars' => '0',
					),
					'group'       => esc_html__( 'Quote', 'peakshops' ),
					'description' => esc_html__( 'Star rating of this review.', 'peakshops' ),
					'dependency'  => array(
						'element' => 'thb_review',
						'value'   => array( 'true' ),
					),
				),
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__( 'Review Image', 'peakshops' ),
					'param_name'  => 'review_image',
					'group'       => esc_html__( 'Quote', 'peakshops' ),
					'description' => esc_html__( 'Set an image for this review. Used for Style 5.', 'peakshops' ),
				),
				array(
					'type'        => 'vc_link',
					'heading'     => esc_html__( 'Link', 'peakshops' ),
					'param_name'  => 'link',
					'group'       => esc_html__( 'Quote', 'peakshops' ),
					'description' => esc_html__( 'Set a link for this slide. Used for Style 5.', 'peakshops' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Author', 'peakshops' ),
					'param_name'  => 'author_name',
					'admin_label' => true,
					'group'       => esc_html__( 'Author', 'peakshops' ),
					'description' => esc_html__( 'Name of the member.', 'peakshops' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Author Title', 'peakshops' ),
					'param_name'  => 'author_title',
					'group'       => esc_html__( 'Author', 'peakshops' ),
					'description' => esc_html__( 'Title that will appear below author name.', 'peakshops' ),
				),
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__( 'Author Image', 'peakshops' ),
					'param_name'  => 'author_image',
					'group'       => esc_html__( 'Author', 'peakshops' ),
					'description' => esc_html__( 'Add Author image here.', 'peakshops' ),
				),
			),
			'description' => esc_html__( 'Single Testimonial', 'peakshops' ),
		)
	);
	class WPBakeryShortCode_thb_testimonial_parent extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_thb_testimonial extends WPBakeryShortCode {}

	// Title
	vc_map(
		array(
			'name'        => esc_html__( 'Title', 'peakshops' ),
			'base'        => 'thb_title',
			'icon'        => 'thb_vc_ico_title',
			'class'       => 'thb_vc_sc_title',
			'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
			'params'      => array(
				array(
					'type'        => 'thb_radio_image',
					'heading'     => esc_html__( 'Type', 'peakshops' ),
					'param_name'  => 'style',
					'options'     => array(
						'style1'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style1.png',
						'style2'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style2.png',
						'style3'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style3.png',
						'style4'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style4.png',
						'style5'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style5.png',
						'style6'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style6.png',
						'style7'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style7.png',
						'style8'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style8.png',
						'style9'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style9.png',
						'style10' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style10.png',
						'style11' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style11.png',
						'style12' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style12.png',
						'style13' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style13.png',
						'style14' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style14.png',
					),
					'std'         => 'style1',
					'admin_label' => true,
					'description' => esc_html__( 'Select the title style.', 'peakshops' ),
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Text Alignment', 'peakshops' ),
					'param_name' => 'text_align',
					'std'        => 'text-center',
					'value'      => array(
						'Left'   => 'text-left',
						'Center' => 'text-center',
					),
					'dependency' => array(
						'element' => 'style',
						'value'   => array( 'style4', 'style5', 'style6', 'style7', 'style8', 'style9' ),
					),
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Icon', 'peakshops' ),
					'param_name' => 'icon',
					'value'      => thb_get_icon_array(),
					'dependency' => array(
						'element' => 'style',
						'value'   => array( 'style3', 'style10' ),
					),
				),
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__( 'Image As Icon', 'peakshops' ),
					'param_name'  => 'icon_image',
					'description' => esc_html__( 'You can set an image instead of an icon.', 'peakshops' ),
					'dependency'  => array(
						'element' => 'style',
						'value'   => array( 'style3', 'style10' ),
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Image Width', 'peakshops' ),
					'param_name'  => 'icon_image_width',
					'description' => esc_html__( 'If you are using an image, you can set custom width here. Default is 64 (pixels).', 'peakshops' ),
					'dependency'  => array(
						'element' => 'style',
						'value'   => array( 'style3', 'style10' ),
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Title', 'peakshops' ),
					'param_name'  => 'title',
					'admin_label' => true,
					'description' => esc_html__( 'The title text', 'peakshops' ),
				),
				array(
					'type'             => 'vc_link',
					'heading'          => esc_html__( 'Link', 'peakshops' ),
					'param_name'       => 'link',
					'edit_field_class' => 'vc_col-sm-6',
					'description'      => esc_html__( 'Set your url & text for your title', 'peakshops' ),
					'dependency'       => array(
						'element' => 'style',
						'value'   => array( 'style2', 'style5', 'style10', 'style11', 'style12', 'style13', 'style14' ),
					),
				),
				array(
					'type'        => 'textarea',
					'heading'     => esc_html__( 'Description', 'peakshops' ),
					'param_name'  => 'description',
					'description' => esc_html__( 'Include a small description for this title style', 'peakshops' ),
					'dependency'  => array(
						'element' => 'style',
						'value'   => array( 'style10', 'style11', 'style12', 'style13', 'style14' ),
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Extra Class Name', 'peakshops' ),
					'param_name'  => 'extra_class',
					'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'peakshops' ),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Title Color', 'peakshops' ),
					'param_name'  => 'title_color',
					'group'       => esc_html__( 'Styling', 'peakshops' ),
					'description' => esc_html__( 'Color of the title.', 'peakshops' ),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'SVG Icon Color', 'peakshops' ),
					'param_name'  => 'icon_color',
					'group'       => esc_html__( 'Styling', 'peakshops' ),
					'description' => esc_html__( 'Color of the svg icon', 'peakshops' ),
					'dependency'  => array(
						'element' => 'style',
						'value'   => array( 'style3', 'style10' ),
					),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Background Color', 'peakshops' ),
					'param_name'  => 'bg_color',
					'group'       => esc_html__( 'Styling', 'peakshops' ),
					'description' => esc_html__( 'Background color of the title.', 'peakshops' ),
					'dependency'  => array(
						'element' => 'style',
						'value'   => array( 'style9' ),
					),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Description Text Color', 'peakshops' ),
					'param_name'  => 'description_color',
					'group'       => esc_html__( 'Styling', 'peakshops' ),
					'description' => esc_html__( 'Text description color.', 'peakshops' ),
					'dependency'  => array(
						'element' => 'style',
						'value'   => array( 'style10', 'style11', 'style12', 'style13', 'style14' ),
					),
				),
			),
			'description' => esc_html__( 'Add a title to your sections', 'peakshops' ),
		)
	);

	// Twitter shortcode
	vc_map(
		array(
			'name'        => esc_html__( 'Twitter', 'peakshops' ),
			'base'        => 'thb_twitter',
			'icon'        => 'thb_vc_ico_twitter',
			'class'       => 'thb_vc_sc_twitter',
			'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
			'params'      => array(
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Style', 'peakshops' ),
					'param_name'  => 'style',
					'value'       => array(
						'Style 1 - List'   => 'style1',
						'Style 2 - Slider' => 'style2',
					),
					'description' => esc_html__( 'This changes layout', 'peakshops' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Number of Tweets', 'peakshops' ),
					'param_name'  => 'count',
					'admin_label' => true,
				),
			),
			'description' => esc_html__( 'Display your Tweets', 'peakshops' ),
		)
	);

	// Video Lightbox
	vc_map(
		array(
			'name'        => esc_html__( 'Video Lightbox', 'peakshops' ),
			'base'        => 'thb_video_lightbox',
			'icon'        => 'thb_vc_ico_video_lightbox',
			'class'       => 'thb_vc_sc_video_lightbox',
			'category'    => esc_html__( 'by Fuel Themes', 'peakshops' ),
			'params'      => array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Style', 'peakshops' ),
					'param_name' => 'style',
					'value'      => array(
						esc_html__( 'Just Icon', 'peakshops' ) => 'lightbox-style1',
						esc_html__( 'With Image', 'peakshops' ) => 'lightbox-style2',
						esc_html__( 'With Text', 'peakshops' ) => 'lightbox-style3',
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Video Link', 'peakshops' ),
					'param_name'  => 'video',
					'admin_label' => true,
					'description' => esc_html__( 'URL of the video you want to link to. Youtube, Vimeo, etc. YouTube URL Format should be: https://www.youtube.com/watch?v=QlQYoModbvk', 'peakshops' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Text for the link', 'peakshops' ),
					'param_name'  => 'video_text',
					'admin_label' => true,
					'description' => esc_html__( 'Text you want to show next to the icon', 'peakshops' ),
					'dependency'  => array(
						'element' => 'style',
						'value'   => array( 'lightbox-style3' ),
					),
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Icon Shape', 'peakshops' ),
					'param_name' => 'icon_style',
					'value'      => array(
						'Style 1' => 'style1',
						'Style 2' => 'style2',
						'Style 3' => 'style3',
					),
					'group'      => 'Styling',
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Icon Size', 'peakshops' ),
					'param_name' => 'icon_size',
					'value'      => array(
						'Inline'  => 'inline',
						'Regular' => 'regular',
						'Large'   => 'large',
						'X-Large' => 'xlarge',
					),
					'std'        => 'regular',
					'group'      => 'Styling',
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Icon Color', 'peakshops' ),
					'param_name'  => 'icon_color',
					'description' => esc_html__( 'Color of the Play Icon', 'peakshops' ),
					'group'       => 'Styling',
				),
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__( 'Select Image', 'peakshops' ),
					'param_name'  => 'image',
					'description' => esc_html__( 'Select image from media library.', 'peakshops' ),
					'dependency'  => array(
						'element' => 'style',
						'value'   => array( 'lightbox-style2' ),
					),
				),
				$thb_animation_array,
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Image Hover Style', 'peakshops' ),
					'param_name' => 'hover_style',
					'value'      => array(
						'No Animation' => '',
						'Image Zoom'   => 'hover-style1',
						'Fade'         => 'hover-style2',
					),
					'dependency' => array(
						'element' => 'style',
						'value'   => array( 'lightbox-style2' ),
					),
					'group'      => 'Styling',
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Box Shadow', 'peakshops' ),
					'param_name'  => 'box_shadow',
					'value'       => array(
						'No Shadow' => '',
						'Small'     => 'small-shadow',
						'Medium'    => 'medium-shadow',
						'Large'     => 'large-shadow',
						'X-Large'   => 'xlarge-shadow',
					),
					'dependency'  => array(
						'element' => 'style',
						'value'   => array( 'lightbox-style2' ),
					),
					'group'       => 'Styling',
					'description' => esc_html__( 'Select from different shadow styles.', 'peakshops' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Border Radius', 'peakshops' ),
					'param_name'  => 'border_radius',
					'description' => esc_html__( 'Set border radius of the image. Please add px,em, etc.. as well.', 'peakshops' ),
					'dependency'  => array(
						'element' => 'style',
						'value'   => array( 'lightbox-style2' ),
					),
					'group'       => 'Styling',
				),
			),
			'description' => esc_html__( 'Play button that opens videos in a lightbox', 'peakshops' ),
		)
	);
