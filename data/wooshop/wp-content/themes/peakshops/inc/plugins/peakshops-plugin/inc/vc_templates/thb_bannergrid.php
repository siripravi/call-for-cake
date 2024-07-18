<?php function thb_bannergrid( $atts, $content = null ) {
	global $thb_bannergrid_style;
	$atts = vc_map_get_attributes( 'thb_bannergrid', $atts );
	extract( $atts );

	$img = wpb_getImageBySize( array( 'attach_id' => $bg_image, 'thumb_size' => 'full' ) );
	if ( $img == NULL ) {
		$img['thumbnail'] = '<img src="http://placekitten.com/g/400/300" />';
	}

	$out = '';
	$column_class = [];
	$row_class    = [];
	$btn_exists   = array( '', '||', '|||' );
	ob_start();

	$slide_class[] = 'thb-banner';
	$slide_class[] = 'text-' . $text_align;
	$slide_class[] = 'text-' . $text_color;
	?>
	<div class="<?php echo esc_attr( implode( ' ', $slide_class ) ); ?>">
		<div class="thb-banner-image">
			<?php echo $img['thumbnail']; ?>
		</div>
		<div class="thb-banner-content">
			<div class="thb-banner-content-inner">
				<?php if ( '' !== $subtitle ) { ?>
					<div class="thb-banner-subtitle h6"><?php echo urldecode( thb_decode( $subtitle ) ); ?></div>
				<?php } ?>
				<?php if ( '' !== $title ) { ?>
					<div class="thb-banner-title h3"><?php echo urldecode( thb_decode( $title ) ); ?></div>
				<?php } ?>
				<?php if ( '' !== $text ) { ?>
					<div class="thb-banner-text"><?php echo urldecode( thb_decode( $text ) ); ?></div>
				<?php } ?>
				<?php if ( ! in_array( $button_1, $btn_exists ) || ! in_array( $button_2, $btn_exists ) ) { ?>
					<div class="thb-inner-buttons">
						<?php
							$btn_class[] = $btn_style;
							$btn_class[] = $btn_border_radius;
							$btn_class[] = $btn_color;
							$btn_class[] = $btn_size;

							if ( ! in_array( $button_1, $btn_exists ) ) {
									$button_1        = vc_build_link( $button_1 );
									$button_1_to     = $button_1['url'];
									$button_1_title  = $button_1['title'];
									$button_1_target = $button_1['target'] ? $button_1['target'] : '_self';
								?>
								<a class="<?php echo esc_attr( implode( ' ', $btn_class ) ); ?>" href="<?php echo esc_attr( $button_1_to ); ?>" target="<?php echo sanitize_text_field( $button_1_target ); ?>" role="button"><span><?php echo esc_attr($button_1_title); ?></span></a>
								<?php
							}
						?>
						<?php
							if ( ! in_array( $button_2, $btn_exists ) ) {
								  $button_2        = vc_build_link( $button_2 );
								  $button_2_to     = $button_2['url'];
								  $button_2_title  = $button_2['title'];
								  $button_2_target = $button_2['target'] ? $button_2['target'] : '_self';
						    ?>
						    <a class="<?php echo esc_attr( implode( ' ', $btn_class ) ); ?>" href="<?php echo esc_attr( $button_2_to ); ?>" target="<?php echo sanitize_text_field( $button_2_target ); ?>" role="button"><span><?php echo esc_attr($button_2_title); ?></span></a>
						    <?php
						  }
						?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short( 'thb_bannergrid', 'thb_bannergrid' );