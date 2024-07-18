<?php function thb_slider( $atts, $content = null ) {
	global $thb_slider_style;
	$atts = vc_map_get_attributes( 'thb_slider', $atts );
	extract( $atts );

	$img = wpb_getImageBySize(
		array(
			'attach_id'  => $bg_image,
			'thumb_size' => 'full',
		)
	);
	if ( $img == null ) {
		$img['thumbnail'] = '<img src="http://placekitten.com/g/400/300" />';
	}

	$out          = '';
	$column_class = array();
	$row_class    = array();
	$btn_exists   = array( '', '||', '|||' );
	ob_start();

	$row_class[] = 'row max_width';
	switch ( $thb_slider_style ) {
		case 'style1':
			$column_class[] = 'small-12 medium-10 large-7 columns';
			$row_class[]    = 'align-center';
			break;
		case 'style2':
			$column_class[] = 'small-12 medium-7 large-5 columns';
			break;
		case 'style3':
			$row_class[]    = 'align-right';
			$column_class[] = 'small-12 medium-7 large-5 columns';
			break;
		case 'style4':
			$column_class[] = 'small-12 medium-9 large-6 columns';
			$row_class[]    = 'align-center';
			break;
		case 'style5':
			$column_class[] = 'small-12 medium-7 large-5 columns';
			break;
	}
	$slide_class[] = 'thb-slide';
	$slide_class[] = 'text-' . $text_align;
	$slide_class[] = 'thb-light-slide-text';
	?>
	<div class="<?php echo esc_attr( implode( ' ', $slide_class ) ); ?>">
		<div class="thb-slide-image">
			<?php echo $img['thumbnail']; ?>
		</div>
		<?php
		if ( ! in_array( $slide_link, $btn_exists ) ) {
				$slide_link        = vc_build_link( $slide_link );
				$slide_link_to     = $slide_link['url'];
				$slide_link_title  = $slide_link['title'];
				$slide_link_target = $slide_link['target'] ? $slide_link['target'] : '_self';
			?>
			<a class="thb-slide-link" href="<?php echo esc_attr( $slide_link_to ); ?>" target="<?php echo sanitize_text_field( $slide_link_target ); ?>" title="<?php echo esc_attr( $slide_link_title ); ?>"></a>
			<?php
		}
		?>
		<div class="thb-slide-content">
			<div class="<?php echo esc_attr( implode( ' ', $row_class ) ); ?>">
				<div class="<?php echo esc_attr( implode( ' ', $column_class ) ); ?>">
					<div class="thb-slide-content-inner">
						<?php if ( '' !== $subtitle ) { ?>
							<div class="thb-slider-subtitle h6"><?php echo urldecode( thb_decode( $subtitle ) ); ?></div>
						<?php } ?>
						<?php if ( '' !== $title ) { ?>
							<div class="thb-slider-title h1"><?php echo urldecode( thb_decode( $title ) ); ?></div>
						<?php } ?>
						<?php if ( '' !== $text ) { ?>
							<div class="thb-slider-text"><?php echo urldecode( thb_decode( $text ) ); ?></div>
						<?php } ?>
						<?php if ( ! in_array( $button_1, $btn_exists ) || ! in_array( $button_2, $btn_exists ) ) { ?>
							<div class="thb-inner-buttons">
								<?php
									$btn_class[] = $btn_style;
									$btn_class[] = $btn_border_radius;
									$btn_class[] = $btn_color;

								if ( ! in_array( $button_1, $btn_exists ) ) {
										$button_1        = vc_build_link( $button_1 );
										$button_1_to     = $button_1['url'];
										$button_1_title  = $button_1['title'];
										$button_1_target = $button_1['target'] ? $button_1['target'] : '_self';
									?>
										<a class="<?php echo esc_attr( implode( ' ', $btn_class ) ); ?>" href="<?php echo esc_attr( $button_1_to ); ?>" target="<?php echo sanitize_text_field( $button_1_target ); ?>" role="button"><span><?php echo esc_attr( $button_1_title ); ?></span></a>
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
										<a class="<?php echo esc_attr( implode( ' ', $btn_class ) ); ?>" href="<?php echo esc_attr( $button_2_to ); ?>" target="<?php echo sanitize_text_field( $button_2_target ); ?>" role="button"><span><?php echo esc_attr( $button_2_title ); ?></span></a>
										<?php
								}
								?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short( 'thb_slider', 'thb_slider' );
