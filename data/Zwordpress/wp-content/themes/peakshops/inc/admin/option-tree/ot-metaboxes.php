<?php
/**
 * Initialize the meta boxes.
 */
add_action( 'admin_init', 'thb_custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types
 * in demo-theme-options.php.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */


function thb_custom_meta_boxes() {

	/**
	 * Create a custom meta boxes array that we pass to
	 * the OptionTree Meta Box API Class.
	 */

	$page_metabox = array(
		'id'       => 'page_settings',
		'title'    => esc_html__( 'Page Settings', 'peakshops' ),
		'pages'    => array( 'page' ),
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'id'    => 'tab2',
				'label' => esc_html__( 'Page Settings', 'peakshops' ),
				'type'  => 'tab',
			),
			array(
				'label' => esc_html__( 'Display Title?', 'peakshops' ),
				'id'    => 'display_title',
				'type'  => 'on_off',
				'desc'  => esc_html__( 'Shows the page title by default.', 'peakshops' ),
				'std'   => 'on',
			),
			array(
				'label' => esc_html__( 'Page Background', 'peakshops' ),
				'id'    => 'page_bg',
				'type'  => 'background',
				'desc'  => esc_html__( 'Background settings for the page.', 'peakshops' ),
			),
			array(
				'label' => esc_html__( 'Disable Footer', 'peakshops' ),
				'id'    => 'disable_footer',
				'type'  => 'on_off',
				'desc'  => esc_html__( 'When enabled, footer will not be shown on this page.', 'peakshops' ),
				'std'   => 'off',
			),
			array(
				'id'    => 'tab5',
				'label' => esc_html__( 'Default Page Layout', 'peakshops' ),
				'type'  => 'tab',
			),
			array(
				'id'    => 'standard_text',
				'label' => esc_html__( 'About Default Layout Settings', 'peakshops' ),
				'desc'  => esc_html__( 'These settings are used when the page template is set to "Default"', 'peakshops' ),
				'type'  => 'textblock',
			),
			array(
				'label' => esc_html__( 'Use Sidebar', 'peakshops' ),
				'id'    => 'sidebar',
				'type'  => 'on_off',
				'desc'  => esc_html__( 'Display a sidebar on this page.', 'peakshops' ),
				'std'   => 'off',
			),
			array(
				'label'     => esc_html__( 'Sidebar Position', 'peakshops' ),
				'id'        => 'sidebar_position',
				'type'      => 'radio',
				'desc'      => esc_html__( 'By default, the sidebar sits on the right.', 'peakshops' ),
				'choices'   => array(
					array(
						'label' => esc_html__( 'Right', 'peakshops' ),
						'value' => 'right',
					),
					array(
						'label' => esc_html__( 'Left', 'peakshops' ),
						'value' => 'left',
					),
				),
				'std'       => 'right',
				'condition' => 'sidebar:is(on)',
			),
			array(
				'label'     => esc_html__( 'Use Custom Sidebar', 'peakshops' ),
				'id'        => 'custom_sidebar',
				'type'      => 'on_off',
				'desc'      => esc_html__( 'Select another sidebar to display on this page.', 'peakshops' ),
				'std'       => 'off',
				'condition' => 'sidebar:is(on)',
			),
			array(
				'label'     => esc_html__( 'Select Sidebar to use', 'peakshops' ),
				'id'        => 'custom_sidebar_id',
				'type'      => 'sidebar_select',
				'desc'      => esc_html__( 'Select another sidebar to display on this page.', 'peakshops' ),
				'std'       => 'off',
				'condition' => 'custom_sidebar:is(on)',
			),
		),
	);

	$post_metabox = array(
		'id'       => 'post_meta_style',
		'title'    => esc_html__( 'Post Settings', 'peakshops' ),
		'pages'    => array( 'post' ),
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'id'    => 'tab0',
				'label' => esc_html__( 'General', 'peakshops' ),
				'type'  => 'tab',
			),
			array(
				'label' => esc_html__( 'Override Featured Image?', 'peakshops' ),
				'id'    => 'featured_image_override',
				'type'  => 'on_off',
				'desc'  => esc_html__( 'When enabled, the image selected here will be displayed on article page, not the featured image.', 'peakshops' ),
				'std'   => 'off',
			),
			array(
				'label'     => esc_html__( 'Override Featured Image Selection', 'peakshops' ),
				'id'        => 'featured_image_override_id',
				'type'      => 'upload',
				'desc'      => esc_html__( 'Select which image to use as the featured image.', 'peakshops' ),
				'class'     => 'ot-upload-attachment-id',
				'condition' => 'featured_image_override:is(on)',
			),
			array(
				'label' => esc_html__( 'Featured Image Credit', 'peakshops' ),
				'id'    => 'standard-featured-credit',
				'type'  => 'text',
				'desc'  => esc_html__( 'Featured Image Credit, enter the copyright information for your featured image if needed.', 'peakshops' ),
				'std'   => '',
			),
			array(
				'id'    => 'tab3',
				'label' => esc_html__( 'Gallery Format', 'peakshops' ),
				'type'  => 'tab',
			),
			array(
				'label' => esc_html__( 'Gallery Photos', 'peakshops' ),
				'id'    => 'post-gallery-photos',
				'desc'  => esc_html__( 'Images selected here will be displayed inside the gallery.', 'peakshops' ),
				'type'  => 'gallery',
			),
			array(
				'id'    => 'tab4',
				'label' => esc_html__( 'Video Format', 'peakshops' ),
				'type'  => 'tab',
			),
			array(
				'label' => esc_html__( 'Video URL', 'peakshops' ),
				'id'    => 'post_video',
				'type'  => 'text',
				'desc'  => esc_html__( 'Video URL. You can find a list of websites you can embed here: <a href="http://codex.wordpress.org/Embeds">Wordpress Embeds</a>', 'peakshops' ),
			),
		),
	);
	/**
	 * Register our meta boxes using the
	 * ot_register_meta_box() function.
	 */
	ot_register_meta_box( $page_metabox );
	ot_register_meta_box( $post_metabox );
}

