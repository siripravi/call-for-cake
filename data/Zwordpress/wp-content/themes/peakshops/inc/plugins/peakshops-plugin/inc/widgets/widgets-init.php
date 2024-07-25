<?php

// Register Widgets.
function thb_register_widgets() {
	$thb_widgets = array(
		'thb-widget-social-links'     => 'thb_widget_social_links',
		'thb-widget-subscribe'        => 'thb_widget_subscribe',
		'thb-widget-swatches'         => 'thb_widget_swatch_filter',
		'thb-widget-sticky-separator' => 'thb_widget_sticky_separator',
	);
	foreach ( $thb_widgets as $key => $value ) {
		if ( 'thb-widget-swatches' === $key && ! class_exists( 'WC_Widget' ) ) {
			continue;
		}
		require_once peakshops_plugin()->get_plugin_path() . 'inc/widgets/' . sanitize_key( $key ) . '.php';
		register_widget( $value );
	}
}

add_action( 'widgets_init', 'thb_register_widgets' );

// Do Shortcodes on widgets.
add_filter( 'widget_text', 'do_shortcode' );

// Tag Cloud Size.
function tag_cloud_filter( $args = array() ) {
	$args['smallest'] = 10;
	$args['largest']  = 10;
	$args['unit']     = 'px';
	return $args;
}

add_filter( 'widget_tag_cloud_args', 'tag_cloud_filter', 90 );
add_filter( 'woocommerce_product_tag_cloud_widget_args', 'tag_cloud_filter', 90 );
