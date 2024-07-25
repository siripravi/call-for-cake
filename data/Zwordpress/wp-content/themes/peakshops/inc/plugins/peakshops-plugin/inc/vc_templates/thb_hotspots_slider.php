<?php function thb_hotspots_slider( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_hotspots_slider', $atts );
	extract( $atts );

	$img_id = preg_replace( '/[^\d]/', '', $image );
	$img    = wpb_getImageBySize(
		array(
			'attach_id'  => $img_id,
			'thumb_size' => 'full',
		)
	);
	if ( null === $img ) {
		$img['thumbnail'] = '<img src="http://placekitten.com/g/400/300" />';
	}
	$element_id = uniqid( 'thb-hotspots-slider-' );
	$spots      = json_decode( urldecode( $thb_hotspot_data ) );

	ob_start();
	?>
	<div class="thb-hotspot-wrapper" id="<?php echo esc_attr( $element_id ); ?>">
		<div class="row no-padding">
			<div class="small-12 medium-7 columns">
				<div class="thb-hotspot-container <?php echo esc_attr( $thb_tooltip_function ); ?>">
					<?php echo $img['thumbnail']; ?>
					<?php
					if ( count( $spots ) ) {
						foreach ( $spots as $key => $spot ) {
								unset( $hotspot_classes );
								$hotspot_classes[] = 'thb-hotspot';
								$hotspot_classes[] = $thb_pin_color;
								$hotspot_classes[] = $animation;
							?>
							<div class="<?php echo esc_attr( implode( ' ', $hotspot_classes ) ); ?>" style="left:<?php echo esc_attr( $spot->x ); ?>%; top:<?php echo esc_attr( $spot->y ); ?>%">
								<div class="thb-hotspot-content <?php echo esc_attr( $thb_pulsate ); ?>"></div>
								<?php $products[] = $spot->Product[0][0]; ?>
							</div>
							<?php
						}
					}
					?>
				</div>
			</div>
			<div class="small-12 medium-5 columns thb-hotspots-products">
				<ul class="products row thb-carousel" data-columns="1" data-infinite="false" data-autoplay="false" data-pagination="true">
					<?php foreach ( $products as $product_id ) { ?>
						<?php if ( thb_wc_supported() ) { ?>
							<?php
							$args = array(
								'post_type'           => 'product',
								'post_status'         => 'publish',
								'ignore_sticky_posts' => 1,
								'p'                   => $product_id,
							);

							$product_loop = new WP_Query( $args );
							$product      = wc_get_product( $product_id );
							remove_action( 'woocommerce_after_shop_loop_item_title', 'thb_template_loop_product_excerpt', 20 );
							while ( $product_loop->have_posts() ) :
								$product_loop->the_post();
								set_query_var( 'thb_columns', 'small-12 medium-12' );
								wc_get_template_part( 'content', 'product' );
							endwhile;
							wp_reset_postdata();
							add_action( 'woocommerce_after_shop_loop_item_title', 'thb_template_loop_product_excerpt', 20 );
							?>
						<?php } ?>
					<?php } ?>
				</ul>
			</div>
		</div>
		<style>
			<?php if ( $thb_bg_color ) { ?>
			#<?php echo esc_attr( $element_id ); ?>.thb-hotspot-wrapper {
				background-color: <?php echo esc_attr( $thb_bg_color ); ?>;
			}
			<?php } ?>
		</style>
	</div>

	<?php
	$out = ob_get_clean();

	return $out;
}
thb_add_short( 'thb_hotspots_slider', 'thb_hotspots_slider' );
