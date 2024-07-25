<?php function thb_social_links( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_social_links', $atts );
	extract( $atts );

	$element_id = uniqid( 'thb-social-links-' );

	// Classes
	$class[] = 'thb-social-links-element';
	$class[] = $style;
	$out     = '';

	ob_start();
	?>
	<div id="<?php echo esc_attr( $element_id ); ?>" class="<?php echo esc_attr( implode( ' ', $class ) ); ?>">
	<?php if ( '' !== $title ) { ?>
		<span class="social-links-title"><?php echo esc_html( $title ); ?></span>
	<?php } ?>
		<?php thb_get_social_list( false, $style ); ?>
	</div>
	<?php
	$out = ob_get_clean();

	return $out;
}
thb_add_short( 'thb_social_links', 'thb_social_links' );
