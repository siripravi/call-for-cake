<?php
/**
 * Variation.
 *
 * @package RT_FoodMenuPro
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}
?>

<div class="fmp_variation fmp-metabox <?php echo isset( $flug ) ? esc_attr( $flug ) : 'closed'; ?>" rel="">
	<h3>
		<a href="#" data-id="<?php echo absint( $variation_id ); ?>" class="remove_row delete"><?php esc_html_e( 'Remove', 'food-menu-pro' ); ?></a>
		<div class="handlediv" title="<?php esc_attr_e( 'Click to toggle', 'food-menu-pro' ); ?>"></div>
		<strong># <?php echo absint( $variation_id ); ?> # </strong><strong class="variation_name"><?php echo esc_html( $variation_name ); ?></strong>
	</h3>
	<div class="fmp_variation_data fmp-metabox-content">
		<div class="item-wrap">
			<label><?php esc_html_e( 'Name', 'food-menu-pro' ); ?></label>
			<input type="text" value="<?php echo esc_attr( $variation_name ); ?>" class="variation_name" name="variation[<?php echo absint( $variation_id ); ?>][name]">
		</div>
		<div class="item-wrap">
			<label><?php esc_html_e( 'Price', 'food-menu-pro' ); ?></label>
			<input type="number" step="any" value="<?php echo esc_attr( $variation_price ); ?>" name="variation[<?php echo absint( $variation_id ); ?>][price]">
		</div>
	</div>
</div>
