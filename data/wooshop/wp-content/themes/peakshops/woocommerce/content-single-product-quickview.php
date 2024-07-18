<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$post_thumbnail_id = $product->get_image_id();
$classes[]         = 'thb-product-detail';
$classes[]         = 'thb-product-quickview';

if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}
?>
<?php
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
?>
<div <?php wc_product_class( $classes, $product ); ?>>
	<div class="thb-product-quickview-images thb-custom-scroll thb-scroll-x" id="quickview_scroll">
		<?php

		if ( $post_thumbnail_id ) {
			$html = wc_get_gallery_image_html( $post_thumbnail_id, true );
		} else {
			$html  = '<div class="first woocommerce-product-gallery__image--placeholder">';
			$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'peakshops' ) );
			$html .= '</div>';
		}
		function thb_remove_product_image_link( $html, $post_id ) {
			return preg_replace( '!<(a|/a).*?>!', '', $html );
		}
		add_filter( 'woocommerce_single_product_image_thumbnail_html', 'thb_remove_product_image_link', 10, 2 );
		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id );

		do_action( 'woocommerce_product_thumbnails' );
		?>
	</div>

	<div class="product-information">
		<div class="summary entry-summary">
			<a href="<?php the_permalink(); ?>"><?php the_title( '<h1 class="product_title entry-title">', '</h1>' ); ?></a>
			<?php
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
				/**
				 * woocommerce_single_product_summary hook.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */

				do_action( 'woocommerce_single_product_summary' );
			?>
		</div>
	</div>
</div>
