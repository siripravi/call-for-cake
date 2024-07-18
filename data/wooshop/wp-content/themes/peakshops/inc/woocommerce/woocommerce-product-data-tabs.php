<?php
if ( ! is_admin() ) {
	return;
}
if ( ! thb_wc_supported() ) {
	return;
}
// Add Tab.
add_filter( 'woocommerce_product_data_tabs', 'thb_product_settings_tabs' );
function thb_product_settings_tabs( $tabs ) {
	$tabs['peakshops'] = array(
		'label'    => esc_html__( 'Peak Shops', 'peakshops' ),
		'target'   => 'thb_product_data',
		'priority' => 61,
	);
	return $tabs;

}

// Tab Content.
add_action( 'woocommerce_product_data_panels', 'thb_product_panels' );
function thb_product_panels() {

	echo '<div id="thb_product_data" class="panel woocommerce_options_panel hidden">';

	woocommerce_wp_text_input(
		array(
			'id'          => 'thb_product_video',
			'value'       => get_post_meta( get_the_ID(), 'thb_product_video', true ),
			'label'       => 'Video URL',
			'description' => esc_html__( 'Opens the video in lightbox. Accepts youtube, video and mp4 urls.', 'peakshops' ),
		)
	);
	woocommerce_wp_checkbox(
		array(
			'id'          => 'sizing_guide',
			'label'       => 'Sizing Guide',
			'description' => esc_html__( 'Enable', 'peakshops' ),
		)
	);
	woocommerce_wp_textarea_input(
		array(
			'id'          => 'sizing_guide_content',
			'value'       => get_post_meta( get_the_ID(), 'sizing_guide_content', true ),
			'label'       => 'Sizing Guide Content',
			'description' => esc_html__( 'Opens this content in lightbox when the button is clicked.', 'peakshops' ),
		)
	);
	echo '</div>';
}

// Save Content.
add_action( 'woocommerce_process_product_meta', 'thb_save_product_fields', 10, 2 );
function thb_save_product_fields( $id, $post ) {
	$sizing_guide_content = filter_input( INPUT_POST, 'sizing_guide_content', FILTER_SANITIZE_STRING );
	$thb_product_video    = filter_input( INPUT_POST, 'thb_product_video', FILTER_SANITIZE_STRING );
	$sizing_guide         = filter_input( INPUT_POST, 'sizing_guide', FILTER_VALIDATE_BOOLEAN );
	$sizing_guide         = $sizing_guide ? 'yes' : 'no';

	update_post_meta( $id, 'sizing_guide', $sizing_guide );
	update_post_meta( $id, 'thb_product_video', $thb_product_video );
	update_post_meta( $id, 'sizing_guide_content', $sizing_guide_content );
}
