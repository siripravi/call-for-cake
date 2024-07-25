<?php
// Remove actions.
remove_action( 'vc_activation_hook', 'vc_page_welcome_set_redirect' );
remove_action( 'init', 'vc_page_welcome_redirect' );
remove_action( 'admin_init', 'vc_page_welcome_redirect' );

// Remove IE & MetaData.
add_action( 'vc_after_init', 'thb_vc_init' );
function thb_vc_init() {
	remove_action( 'wp_head', array( visual_composer(), 'addMetaData' ) );
	remove_action( 'wp_head', array( visual_composer(), 'addIEMinimalSupport' ) );
	remove_action( 'wp_head', array( visual_composer(), 'addNoScript' ), 1000 );
}

// Set As Theme.
add_action( 'vc_before_init', 'thb_vc_set_as_theme' );
function thb_vc_set_as_theme() {
	$theme_mode = apply_filters( 'thb_vc_thememode', true );

	if ( $theme_mode ) {
		vc_manager()->disableUpdater( true );
		vc_set_as_theme();
	}

}

add_action( 'init', 'thb_the_shortcodes_for_vc' );
function thb_the_shortcodes_for_vc() {
	if ( function_exists( 'visual_composer' ) ) {
		if ( function_exists( 'vc_set_default_editor_post_types' ) ) {
			vc_set_default_editor_post_types( array( 'page', 'product' ) );
		}
		add_filter( 'vc_load_default_templates', 'thb_custom_template_modify_array' );
		function thb_custom_template_modify_array( $data ) {
				return array();
		}

		if ( is_admin() ) {
			function remove_vc_teaser() {
				remove_meta_box( 'vc_teaser', 'post', 'side' );
				remove_meta_box( 'vc_teaser', 'page', 'side' );
				remove_meta_box( 'vc_teaser', 'product', 'side' );
			}
			add_action( 'admin_head', 'remove_vc_teaser' );
		}

		// Shortcodes.
		require get_theme_file_path( '/inc/framework/visualcomposer/visualcomposer-extend.php' );

		// Templates.
		require get_theme_file_path( '/inc/framework/visualcomposer/visualcomposer-templates.php' );

		// Offsets.
		function thb_column_offset_class_merge( $class_string, $tag ) {

			if ( 'vc_column' === $tag || 'vc_column_inner' === $tag ) {

				$class_string = preg_replace( '/vc_col-/', '', $class_string );
				$class_string = preg_replace( '/lg-/', 'large-', $class_string );
				$class_string = preg_replace( '/md-/', 'medium-', $class_string );
				$class_string = preg_replace( '/sm-/', 'medium-', $class_string );
				$class_string = preg_replace( '/xs-/', 'small-', $class_string );
				$class_string = preg_replace( '/vc_column_container/', 'columns', $class_string );

				if ( ! preg_grep( '/small-[0-9]/', array( $class_string ) ) ) {
					$class_string .= ' small-12';
				}
				/* Change visibility */
				$class_string = preg_replace( '/vc_hidden-lg/', 'hide-for-large', $class_string );
				$class_string = preg_replace( '/vc_hidden-md/', 'hide-for-medium-only', $class_string );
				$class_string = preg_replace( '/vc_hidden-sm/', 'hide-for-small-only', $class_string );
				$class_string = preg_replace( '/vc_hidden-xs/', 'hide-for-small-only', $class_string );
			} elseif ( 'vc_row' === $tag || 'vc_row_inner' === $tag ) {
				$class_string = preg_replace( '/vc_row/', 'row', $class_string );
			}
			return $class_string;
		}
		add_filter( 'vc_shortcodes_css_class', 'thb_column_offset_class_merge', 10, 2 );

		// Add Page parameter to loop
		require_once vc_path_dir( 'PARAMS_DIR', '/loop/loop.php' );
		class ThbLoopQueryBuilder extends VcLoopQueryBuilder {
			public function parse_paged( $value ) {
				$this->args['paged'] = $value;
			}
			public function parse_post_format( $value ) {
				if ( $value ) {
					$this->args['tax_query'] = array(
						array(
							'taxonomy' => 'post_format',
							'field'    => 'slug',
							'terms'    => array( $value ),
						),
					);
				}
			}
			public function parse_offset( $value ) {
				$this->args['offset'] = $value;

				if ( isset( $this->args['offset'] ) ) {
					$page_offset = intval( $this->args['offset'] );

					if ( isset( $this->args['posts_per_page'] ) && isset( $this->args['paged'] ) ) {
						$page_offset = intval( $this->args['offset'] ) + ( ( $this->args['paged'] - 1 ) * $this->args['posts_per_page'] );
					}
					$this->args['offset'] = $page_offset;
				}
			}
		}

		// Add Radio Image option.
		function thb_radio_images( $param, $value ) {
			$unique_id = uniqid();
			$options   = isset( $param['options'] ) ? $param['options'] : '';

			$param_line  = '<input type="hidden" id="thb-radio-image-' . esc_attr( $unique_id ) . '" class="wpb_vc_param_value ' . esc_attr( $param['param_name'] ) . ' ' . esc_attr( $param['type'] ) . '" name="' . esc_attr( $param['param_name'] ) . '" value="' . esc_attr( $value ) . '"/>';
			$param_line .= '<div class="thb-radio-image" data-radio-image-id="' . esc_attr( $unique_id ) . '">';
			$param_line .= '<ul class="thb-radio-images-list">';

			$i = 0;
			foreach ( $options as $key => $key_value ) {
				$checked = $value === $key ? 'checked' : '';

				$param_line .= '<li for="thb_radio_image_' . esc_attr( $unique_id . '_' . $i ) . '"><label>
					<input type="radio" class="thb_radio_image_val" value="' . esc_attr( $key ) . '" name="thb_radio_image_' . esc_attr( $unique_id ) . '" ' . esc_attr( $checked ) . ' id="thb_radio_image_' . esc_attr( $unique_id . '_' . $i ) . '" />
					<div class="thb_radio_image"><img src="' . esc_url( $key_value ) . '" alt="' . esc_attr( $value ) . '" /></div>
				</label></li>';
				$i++;
			}

			$param_line .= '</ul>';
			$param_line .= '</div>';

			return $param_line;
		}
		vc_add_shortcode_param( 'thb_radio_image', 'thb_radio_images' );

		// Add HotSpot Image option.
		function thb_hotspot_image( $param, $value ) {
			$dependency = ( function_exists( 'vc_generate_dependencies_attributes' ) ) ? vc_generate_dependencies_attributes( $param ) : '';
			$param_name = isset( $param['param_name'] ) ? $param['param_name'] : '';
			$type       = isset( $param['type'] ) ? $param['type'] : '';
			$class      = isset( $param['class'] ) ? $param['class'] : '';
			$uni        = uniqid( 'thb-hotspot-' . wp_rand() );
			$output     = '<div class="thb-hotspot-param-container">';
			$output    .= '<div class="thb-hotspot-image-holder no-img" data-popup-title="' . esc_attr__( 'Hotspot Tooltip Content', 'peakshops' ) . '" data-save-text="' . esc_attr__( 'Save changes', 'peakshops' ) . '" data-close-text="' . esc_attr__( 'Close', 'peakshops' ) . '"></div>';
			$output    .= '<input type="hidden" id="' . esc_attr( $uni ) . '" name="' . $param['param_name'] . '" class="wpb_vc_param_value thb_hotspot_var ' . $param['param_name'] . ' ' . $param['type'] . '_field" value=\'' . $value . '\' />';
			$output    .= '</div>';
			return $output;
		}
		vc_add_shortcode_param( 'thb_hotspot_param', 'thb_hotspot_image' );
	}
}

// Check Front-End editor.
function thb_is_vc_frontend() {
	return function_exists( 'vc_is_inline' ) && vc_is_inline() ? true : false;
}
