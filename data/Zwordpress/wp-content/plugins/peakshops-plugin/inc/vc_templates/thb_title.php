<?php function thb_title( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_title', $atts );
	extract( $atts );
	$element_id    = uniqid( 'thb-title-' );
	$can_have_link = in_array( $style, array( 'style2', 'style5', 'style10', 'style11', 'style12', 'style13', 'style14' ) );
	$el_class[]    = 'thb_title';
	$el_class[]    = $icon_image ? 'has-img' : '';
	$el_class[]    = $style;
	$el_class[]    = $extra_class;
	$el_class[]    = in_array( $style, array( 'style4', 'style5', 'style6', 'style8', 'style9' ) ) ? $text_align : false;
	$img           = '';
	if ( $icon_image ) {
		$img = wpb_getImageBySize(
			array(
				'attach_id'  => $icon_image,
				'thumb_size' => 'full',
				'class'      => 'thb_image',
			)
		);
	}
	if ( $can_have_link ) {
		$link = ( $link == '||' ) ? '' : $link;
		$link = vc_build_link( $link );

		$link_to  = $link['url'];
		$a_title  = $link['title'];
		$a_target = $link['target'] ? $link['target'] : '_self';
	}
	ob_start();
	?>
	<div class="<?php echo esc_attr( implode( ' ', $el_class ) ); ?>" id="<?php echo esc_attr( $element_id ); ?>">
		<div class="thb_title_inner">
			<?php if ( in_array( $style, array( 'style3', 'style10' ) ) && ( $icon_image || $icon ) ) { ?>
				<div class="thb_title_icon">
					<?php if ( $icon_image ) { ?>
						<div class="thb_title_image">
							<?php echo $img['thumbnail']; ?>
						</div>
						<?php
					} else {
						get_template_part( 'assets/svg/' . $icon );
					}
					?>
				</div>
			<?php } ?>

			<?php
			if ( 'style1' === $style ) {
				get_template_part( 'assets/img/svg/left_brackets.svg' ); }
			?>
			<h2><?php echo wp_kses_post( $title ); ?></h2>
			<?php
			if ( 'style1' === $style ) {
				get_template_part( 'assets/img/svg/right_brackets.svg' ); }
			?>

			<?php if ( $can_have_link && $link_to && ! in_array( $style, array( 'style12', 'style14' ) ) ) { ?>
				<a href="<?php echo esc_attr( $link_to ); ?>" target="<?php echo sanitize_text_field( $a_target ); ?>" class="thb_title_link"><?php echo esc_attr( $a_title ); ?> <?php get_template_part( 'assets/img/svg/next_arrow.svg' ); ?></a>
			<?php } ?>
		</div>
		<?php if ( $description && '' !== $description ) { ?>
			<div class="thb_title_description">
				<?php echo wp_kses_post( $description ); ?>
			</div>
		<?php } ?>
		<?php if ( $can_have_link && $link_to && in_array( $style, array( 'style12', 'style14' ) ) ) { ?>
			<a href="<?php echo esc_attr( $link_to ); ?>" target="<?php echo sanitize_text_field( $a_target ); ?>" class="thb_title_link"><?php echo esc_attr( $a_title ); ?> <?php get_template_part( 'assets/img/svg/next_arrow.svg' ); ?></a>
		<?php } ?>
		<?php if ( ( $icon_image_width && $icon_image ) || $title_color || $icon_color || $description_color || ( 'style9' === $style && $bg_color ) ) { ?>
		<style>
			<?php if ( $icon_image_width && $icon_image ) { ?>
				#<?php echo esc_attr( $element_id ); ?>.thb_title .thb_title_image img {
					width: <?php echo esc_attr( $icon_image_width ); ?>px;
					height: auto;
				}
			<?php } ?>
			<?php if ( $title_color ) { ?>
				#<?php echo esc_attr( $element_id ); ?>.thb_title h2 {
					color: <?php echo esc_attr( $title_color ); ?>;
				}
				<?php if ( 'style14' === $style ) { ?>
				#<?php echo esc_attr( $element_id ); ?>.thb_title h2:after {
					background-color: <?php echo esc_attr( $title_color ); ?>;
				}

				<?php } ?>
			<?php } ?>
			<?php if ( $icon_color ) { ?>
				#<?php echo esc_attr( $element_id ); ?>.thb_title .thb_title_icon svg path,
				#<?php echo esc_attr( $element_id ); ?>.thb_title .thb_title_icon svg circle,
				#<?php echo esc_attr( $element_id ); ?>.thb_title .thb_title_icon svg rect,
				#<?php echo esc_attr( $element_id ); ?>.thb_title .thb_title_icon svg ellipse {
					stroke: <?php echo esc_attr( $icon_color ); ?>;
				}
			<?php } ?>
			<?php if ( $description_color ) { ?>
				#<?php echo esc_attr( $element_id ); ?>.thb_title .thb_title_description {
					color: <?php echo esc_attr( $description_color ); ?>;
				}
			<?php } ?>
			<?php if ( 'style9' === $style && $bg_color ) { ?>
				#<?php echo esc_attr( $element_id ); ?>.thb_title .thb_title_inner {
					background: <?php echo esc_attr( $bg_color ); ?>;
				}
			<?php } ?>
		</style>
		<?php } ?>
	</div>
	<?php

	$out = ob_get_clean();
	return $out;
}
thb_add_short( 'thb_title', 'thb_title' );
