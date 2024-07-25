<?php

global $product;

$classes[] = 'thb-product-detail';
$classes[] = 'thb-product-style2';
?>

<?php
/**
 * woocommerce_before_single_product hook.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	get_template_part( 'inc/templates/misc/password-protected' );
	return;
}
$row_classes[] = 'row';
$row_classes[] = 'on' === ot_get_option( 'shop_product_fullwidth', 'off' ) ? 'full-width-row' : false;
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( $classes, $product ); ?>>

<?php
	/**
	 * woocommerce_before_single_product_summary hook.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
?>
<div class="<?php echo esc_attr( implode( ' ', $row_classes ) ); ?> thb-product-main-row">
	<div class="small-12 columns product-information">
		<div class="summary entry-summary">
			<div class="row align-justify">
				<div class="small-12 medium-8 columns">
					<?php
						/**
						 * woocommerce_single_product_summary hook.
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 * @hooked WC_Structured_Data::generate_product_data() - 60
						 */
						do_action( 'woocommerce_single_product_summary' );
					?>
				</div>
				<div class="small-12 medium-4 columns">
					<?php do_action( 'thb_product_style2_addto_cart' ); ?>
				</div>
			</div>
		</div><!-- .summary -->
	</div>
</div>
<div class="<?php echo esc_attr( implode( ' ', $row_classes ) ); ?>">
	<div class="small-12 columns">
		<?php
			/**
			 * woocommerce_after_single_product_summary hook.
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_upsell_display - 15
			 * @hooked woocommerce_output_related_products - 20
			 */
			do_action( 'woocommerce_after_single_product_summary' );
		?>
	</div>
</div>
</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
