<?php

global $product;

$classes[] = 'thb-product-detail';
$classes[] = 'thb-product-sticky';
?>

<?php
if ( post_password_required() ) {
	return;
}
?>

<div <?php wc_product_class( $classes, $product ); ?>>
	<div class="sticky-product-title">
		<div class="sticky-product-image">
			<?php echo get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_small_thumbnail_size', 'shop_catalog' ) ); ?>
		</div>
		<?php the_title( '<h6>', '</h6>' ); ?>
	</div>
	<div class="product-information">
		<?php woocommerce_template_single_price(); ?>
		<?php
		if ( $product->is_type( 'simple' ) ) {
			woocommerce_template_single_add_to_cart();
		} else {
			?>
			<button class="alt button single_add_to_cart_button thb-select-options"><?php esc_html_e( 'Select Options', 'peakshops' ); ?></button>
			<?php
		}
		?>
	</div>
</div>
