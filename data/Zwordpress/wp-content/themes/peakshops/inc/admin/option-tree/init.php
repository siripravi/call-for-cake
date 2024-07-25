<?php
add_filter( 'ot_show_pages', '__return_true' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_override_forced_textarea_simple', '__return_true' );
add_filter( 'ot_show_settings_import', '__return_false' );
add_filter( 'ot_show_options_ui', '__return_false' );
add_filter(
	'ot_google_fonts_api_key',
	function() {
		return ot_get_option( 'google_fonts_api_key' );
	}
);
add_filter( 'ot_load_dynamic_css', '__return_false' );
require get_template_directory() . '/inc/admin/option-tree/ot-radioimages.php';
require get_template_directory() . '/inc/admin/option-tree/ot-metaboxes.php';
require get_template_directory() . '/inc/admin/option-tree/ot-themeoptions.php';
require get_template_directory() . '/inc/admin/option-tree/ot-functions.php';
if ( ! class_exists( 'OT_Loader' ) ) {
	require get_template_directory() . '/inc/admin/option-tree/admin/ot-loader.php';
}
