<?php function thb_pricing_column( $atts, $content = null ) {
	global $thb_pricing_columns, $thb_pricing_style;
	$atts = vc_map_get_attributes( 'thb_pricing_column', $atts );
	extract( $atts );

	$content = vc_value_from_safe( $content );

	$el_class[] = 'thb-pricing-column';
	$el_class[] = 'small-12';
	$el_class[] = $thb_pricing_columns;
	$el_class[] = 'columns';
	$el_class[] = 'highlight-' . $highlight;
	$out        = '';
	ob_start();

	$element_id = uniqid( 'thb-pricing-column-' );

	/* Button */
	$link     = ( $link == '||' ) ? '' : $link;
	$link_btn = vc_build_link( $link );

	$link_to  = $link_btn['url'];
	$a_title  = $link_btn['title'];
	$a_target = $link_btn['target'] ? $link_btn['target'] : '_self';

	/* Image */
	$image_class = in_array( $thb_pricing_style, array( 'style2', 'style3' ) ) ? 'retina_size' : '';
	$image_full  = wpb_getImageBySize(
		array(
			'attach_id'  => $image,
			'class'      => $image_class,
			'thumb_size' => 'full',
		)
	);
	?>
	<div class="<?php echo esc_attr( implode( ' ', $el_class ) ); ?>" id="<?php echo esc_attr( $element_id ); ?>">
		<div class="pricing-container 
		<?php
		if ( $link ) {
			?>
			has-button<?php } ?>">
			<?php if ( $highlight === 'true' && $thb_pricing_style == 'style2' ) { ?>
			  <div class="pricing-style2-highlight"></div>
			<?php } ?>
			<?php
			if ( $image_full ) {
				echo $image_full['thumbnail']; }
			?>
			<?php if ( $thb_pricing_style == 'style3' ) { ?>
			  <div class="thb-pricing-style3-container">
			<?php } ?>
			<div class="thb_pricing_head">
				<?php if ( $title ) { ?>
					<h4><?php echo esc_html( $title ); ?></h4>
				<?php } ?>
				<?php if ( $thb_pricing_style == 'style2' ) { ?>
					<?php if ( $sub_title ) { ?>
					  <p class="pricing_sub_title"><?php echo esc_html( $sub_title ); ?></p>
					<?php } ?>
					<?php if ( $price ) { ?>
				  <h3 class="thb-price"><?php echo esc_html( $price ); ?>
												   <?php
													if ( $per ) {
														?>
						<small><?php echo esc_html( $per ); ?></small><?php } ?></h3>
					<?php } ?>
				<?php } elseif ( $thb_pricing_style == 'style1' ) { ?>
					<?php if ( $price ) { ?>
					  <h3 class="thb-price"><?php echo esc_html( $price ); ?>
													   <?php
														if ( $per ) {
															?>
							 <small><?php echo esc_html( $per ); ?></small><?php } ?></h3>
				<?php } ?>
					<?php if ( $sub_title ) { ?>
					  <p class="pricing_sub_title"><?php echo esc_html( $sub_title ); ?></p>
				<?php } ?>
				<?php } elseif ( $thb_pricing_style == 'style3' ) { ?>
					<?php if ( $sub_title ) { ?>
					  <p class="pricing_sub_title"><?php echo esc_html( $sub_title ); ?></p>
					<?php } ?>
				<?php } ?>
			</div>
			<div class="pricing-description">
				<?php
				if ( $content ) {
					echo do_shortcode( $content ); }
				?>
			</div>
			<?php if ( $thb_pricing_style == 'style3' ) { ?>
			  </div>
			<?php } //.thb-pricing-style3-container ?>
			<?php if ( $thb_pricing_style == 'style3' ) { ?>
			  <div class="thb-pricing-footer">
				<?php if ( $price ) { ?>
				<h3 class="thb-price"><?php echo esc_html( $price ); ?>
												 <?php
													if ( $per ) {
														?>
					 <small><?php echo esc_html( $per ); ?></small><?php } ?></h3>
				<?php } ?>
				<?php if ( $link && $thb_pricing_style == 'style3' ) { ?>
				<a class="btn mini" href="<?php echo esc_attr( $link_to ); ?>" target="<?php echo sanitize_text_field( $a_target ); ?>" role="button" title="<?php echo esc_attr( $a_title ); ?>"><?php echo esc_attr( $a_title ); ?></a>
				<?php } ?>
			  </div>
			<?php } ?>
			<?php if ( $link && $thb_pricing_style == 'style2' ) { ?>
			<a class="btn pill-radius" href="<?php echo esc_attr( $link_to ); ?>" target="<?php echo sanitize_text_field( $a_target ); ?>" role="button" title="<?php echo esc_attr( $a_title ); ?>"><?php echo esc_attr( $a_title ); ?></a>
			<?php } ?>
		</div>
		<?php if ( $link && $thb_pricing_style == 'style1' ) { ?>
		<a class="btn large accent" href="<?php echo esc_attr( $link_to ); ?>" target="<?php echo sanitize_text_field( $a_target ); ?>" role="button" title="<?php echo esc_attr( $a_title ); ?>"><?php echo esc_attr( $a_title ); ?></a>
		<?php } ?>
		<style>
			<?php if ( $thb_pricing_style == 'style1' ) { ?>
				<?php if ( $accent_color ) { ?>
				.thb-pricing-table.style1 #<?php echo esc_attr( $element_id ); ?> .btn {
					background: <?php echo esc_attr( $accent_color ); ?>;
				}
				.thb-pricing-table.style1 #<?php echo esc_attr( $element_id ); ?>.highlight-true .pricing-container {
					border-color: <?php echo esc_attr( $accent_color ); ?>;
				}
				<?php } ?>
			<?php } elseif ( $thb_pricing_style == 'style2' ) { ?>
				<?php if ( $accent_color ) { ?>
				.thb-pricing-table.style2 #<?php echo esc_attr( $element_id ); ?> .btn {
					background: <?php echo esc_attr( $accent_color ); ?>;
				}
				.thb-pricing-table.style2 #<?php echo esc_attr( $element_id ); ?> .thb_pricing_head .thb-price {
					color: <?php echo esc_attr( $accent_color ); ?>;
				}
				<?php } ?>
				<?php if ( $accent_color_2 ) { ?>
				.thb-pricing-table.style2 .pricing-style2-highlight {
					background: <?php echo esc_attr( $accent_color_2 ); ?>;
				}
				<?php } ?>
			<?php } elseif ( $thb_pricing_style == 'style3' ) { ?>
				<?php if ( $accent_color ) { ?>
				.thb-pricing-table.style3 #<?php echo esc_attr( $element_id ); ?> .btn {
					background: <?php echo esc_attr( $accent_color ); ?>;
				}
				.thb-pricing-table.style3 #<?php echo esc_attr( $element_id ); ?> .thb-pricing-footer .thb-price {
					color: <?php echo esc_attr( $accent_color ); ?>;
				}
				<?php } ?>
			<?php } ?>
		</style>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short( 'thb_pricing_column', 'thb_pricing_column' );
