<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
$columns                       = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id             = $product->get_image_id();
$shop_product_thumbnail_layout = ot_get_option( 'shop_product_thumbnail_layout', 'style1' );
$wrapper_classes               = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery__wrapper',
		'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);

$classes[] = 'woocommerce-product-gallery';
$classes[] = 'product-images';

?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>">
	<figure id="product-images" class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $classes ) ) ); ?>">
		<?php do_action( 'thb_product_images' ); ?>
		<?php

		if ( $post_thumbnail_id ) {
			$html = wc_get_gallery_image_html( $post_thumbnail_id, true );
		} else {
			$html  = '<div class="first woocommerce-product-gallery__image--placeholder">';
			$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'peakshops' ) );
			$html .= '</div>';
		}

		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id );

		do_action( 'woocommerce_product_thumbnails' );
		?>
	</figure>
	<?php wc_get_template( 'woocommerce/single-product/product-gallery-thumbnails-sticky.php' ); ?>
</div>
