<?php

global $product;

$shop_product_sidebar = ot_get_option( 'shop_product_sidebar', 'off' );

$classes[] = 'thb-product-detail';
$classes[] = 'thb-product-sidebar-' . $shop_product_sidebar;
$classes[] = 'thb-product-style3';

$row_classes[] = 'row';
$row_classes[] = 'on' === ot_get_option( 'shop_product_fullwidth', 'off' ) ? 'full-width-row' : false;
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
?>
<div class="<?php echo esc_attr( implode( ' ', $row_classes ) ); ?>">
	<div class="small-12 columns">
		<div id="product-<?php the_ID(); ?>" <?php wc_product_class( $classes, $product ); ?>>
	<?php if ( 'off' !== $shop_product_sidebar ) { ?>
		<div class="sidebar-container thb-shop-sidebar-layout sidebar-<?php echo esc_attr( $shop_product_sidebar ); ?>">
			<div class="sidebar thb-shop-sidebar">
				<?php
				if ( is_active_sidebar( 'thb-shop-product' ) ) {
					dynamic_sidebar( 'thb-shop-product' ); }
				?>
			</div>
			<div class="sidebar-content-main thb-shop-content">
	<?php } ?>
			<div class="row thb-product-main-row">
				<div class="small-12 medium-7 columns">
					<?php
						/**
						 * woocommerce_before_single_product_summary hook.
						 *
						 * @hooked woocommerce_show_product_sale_flash - 10
						 * @hooked woocommerce_show_product_images - 20
						 */
						do_action( 'woocommerce_before_single_product_summary' );
					?>
				</div>
				<div class="small-12 medium-5 columns product-information">
					<div class="summary entry-summary">

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

					</div><!-- .summary -->
				</div>
			</div>
	<?php if ( 'off' !== $shop_product_sidebar ) { ?>
			</div>
		</div>
	<?php } ?>
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
</div><!-- #product-<?php the_ID(); ?> -->
		<?php do_action( 'woocommerce_after_single_product' ); ?>
	</div>
</div>
