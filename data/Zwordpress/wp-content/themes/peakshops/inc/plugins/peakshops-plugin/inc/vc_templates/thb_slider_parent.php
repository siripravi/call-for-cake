<?php function thb_slider_parent( $atts, $content = null ) {
	global $thb_slider_style;
	$atts = vc_map_get_attributes( 'thb_slider_parent', $atts );
	extract( $atts );

	$element_id = uniqid( 'thb-slider-' );
	$pattern    = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
	$el_class[] = 'thb-slider';
	$el_class[] = 'thb-carousel';
	$el_class[] = 'thb-slider-' . $thb_slider_style;
	$el_class[] = $thb_slider_size;
	$el_class[] = $extra_class;
	$el_class[] = 'thb-offset-arrows' === $thb_navigation_position ? $thb_navigation_position : 'thb-light-arrows';
	$el_class[] = $thb_pagination_position;

	$out = '';
	ob_start();

	?>
	<div id="<?php echo esc_attr( $element_id ); ?>" class="<?php echo esc_attr( implode( ' ', $el_class ) ); ?>" data-columns="1" data-pagination="<?php echo esc_attr( $thb_pagination ); ?>" data-navigation="<?php echo esc_attr( $thb_navigation ); ?>" data-autoplay="<?php echo esc_attr( $autoplay ); ?>" data-autoplay-speed="<?php echo esc_attr( $autoplay_speed ); ?>" data-fade="<?php echo esc_attr( $thb_slider_animation ); ?>">
		<?php echo wpb_js_remove_wpautop( $content, false ); ?>
	</div>
	<?php if ( $thb_slider_height || $thb_slider_height_mobile || $thb_border_radius ) { ?>
		<style>
			<?php
			if ( $thb_slider_height ) {
				$regexr            = preg_match( $pattern, $thb_slider_height, $matches );
				$value             = isset( $matches[1] ) ? (float) $matches[1] : (float) $thb_slider_height;
				$unit              = isset( $matches[2] ) ? $matches[2] : 'px';
				$thb_slider_height = $value . $unit;
				?>
					@media screen and ( min-width: 768px ) {
						#<?php echo esc_attr( $element_id ); ?> .thb-slide {
							height: <?php echo esc_attr( $thb_slider_height ); ?>
						}
					}
			<?php } ?>
			<?php
			if ( $thb_slider_height_mobile ) {
				$regexr            = preg_match( $pattern, $thb_slider_height_mobile, $matches );
				$value             = isset( $matches[1] ) ? (float) $matches[1] : (float) $thb_slider_height_mobile;
				$unit              = isset( $matches[2] ) ? $matches[2] : 'px';
				$thb_slider_height = $value . $unit;
				?>
					@media screen and ( max-width: 768px ) {
						#<?php echo esc_attr( $element_id ); ?> .thb-slide {
							height: <?php echo esc_attr( $thb_slider_height ); ?>
						}
					}
			<?php } ?>
			<?php
			if ( $thb_slider_bg && in_array( $thb_slider_style, array( 'style3', 'style5' ) ) ) {
				?>
				#<?php echo esc_attr( $element_id ); ?> .thb-slide .thb-slide-content-inner {
					background: <?php echo esc_attr( $thb_slider_bg ); ?> !important;
				}
			<?php } ?>
			<?php if ( $thb_border_radius ) { ?>
				#<?php echo esc_attr( $element_id ); ?> .thb-slide .thb-slide-image img {
					border-radius: <?php echo esc_attr( $thb_border_radius ); ?>;
				}
				<?php if ( in_array( $thb_slider_style, array( 'style3', 'style5' ) ) ) { ?>
					#<?php echo esc_attr( $element_id ); ?> .thb-slide .thb-slide-content-inner {
						border-radius: <?php echo esc_attr( $thb_border_radius ); ?>;
					}
				<?php } ?>
			<?php } ?>
		</style>
	<?php } ?>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short( 'thb_slider_parent', 'thb_slider_parent' );
