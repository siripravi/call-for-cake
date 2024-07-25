<?php
	global $product;
	$product_url              = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
	$shop_product_hover_count = ot_get_option( 'shop_product_hover_count', '2' );
	$attachment_ids           = $product->get_gallery_image_ids();


?>
<div class="thb-product-image-link thb-slider-image">
	<div class="thb-carousel slick thb-mini-arrows" data-navigation="true" data-columns="1">
		<?php echo woocommerce_get_product_thumbnail(); ?>
		<?php
		if ( $attachment_ids ) {
			$i = 0;
			foreach ( $attachment_ids as $attachment_id ) {
				if ( $i === $shop_product_hover_count ) {
					continue;
				}
				echo wp_get_attachment_image( $attachment_id, 'woocommerce_thumbnail' );
				$i++;
			}
		}
		?>
		<a href="<?php echo esc_url( $product_url ); ?>" title="<?php the_title_attribute(); ?>" class="thb-carousel-image-link"></a>
	</div>
</div>
