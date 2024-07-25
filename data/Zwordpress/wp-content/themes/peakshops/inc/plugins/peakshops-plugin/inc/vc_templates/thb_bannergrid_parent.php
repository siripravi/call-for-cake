<?php function thb_bannergrid_parent( $atts, $content = null ) {
	global $thb_bannergrid_style;
	$atts = vc_map_get_attributes( 'thb_bannergrid_parent', $atts );
	extract( $atts );

	$element_id = uniqid('thb-bannergrid-');
	$pattern    = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
	$el_class[] = 'thb-bannergrid';
	$el_class[] = 'thb-bannergrid-' . $thb_bannergrid_style;
	$el_class[] = $extra_class;
	$el_class[] = 'thb-bannergrid-spacing-' . $thb_bannergrid_spacing;

	$out ='';
	ob_start();

	?>
	<div id="<?php echo esc_attr( $element_id ); ?>" class="<?php echo esc_attr( implode( ' ', $el_class ) ); ?>">
		<div class="row thb-bannergrid-parent-row">
			<?php
				echo thb_bannergrid_layout( $thb_bannergrid_style, $content );
			?>
		</div>
	</div>
	<?php if ( $thb_bannergrid_height || $thb_bannergrid_height_mobile ) { ?>
		<style>
			<?php
				if ( $thb_bannergrid_height ) {
					$regexr                = preg_match( $pattern, $thb_bannergrid_height, $matches );
					$value                 = isset( $matches[1] ) ? (float) $matches[1] : (float) $thb_bannergrid_height;
					$unit                  = isset( $matches[2] ) ? $matches[2] : 'px';
					$thb_bannergrid_height = ( $value + $thb_bannergrid_spacing ) . $unit;
					?>
					@media screen and ( min-width: 768px ) {
						#<?php echo esc_attr( $element_id ); ?> {
							height: <?php echo esc_attr( $thb_bannergrid_height ); ?>
						}
					}
			<?php } ?>
		</style>
	<?php } ?>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short( 'thb_bannergrid_parent', 'thb_bannergrid_parent' );