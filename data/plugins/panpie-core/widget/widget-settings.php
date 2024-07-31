<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'widgets_init', 'panpie_widgets_init' );
function panpie_widgets_init() {

	// Register Custom Widgets
	register_widget( 'PanpieTheme_About_Widget' );
	register_widget( 'PanpieTheme_Address_Widget' );
	register_widget( 'PanpieTheme_Social_Widget' );
	register_widget( 'PanpieTheme_Recent_Posts_With_Image_Widget' );
	register_widget( 'PanpieTheme_Post_Box' );
	register_widget( 'PanpieTheme_Post_Tab' );
	register_widget( 'PanpieTheme_Feature_Post' );
	register_widget( 'PanpieTheme_Open_Hour_Widget' );
	register_widget( 'PanpieTheme_Product_Box' );
	register_widget( 'PanpieTheme_Call_to_Action' );
	
}