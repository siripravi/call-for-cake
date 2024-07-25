<?php
/**
 * Attribute.
 *
 * @package RT_FoodMenuPro
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}
?>

<div class="fmp_attribute fmp-metabox <?php echo esc_attr( $flug ); ?>" rel="<?php echo esc_attr( $position ); ?>">
	<h3>
		<a href="#" class="remove_row delete"><?php esc_html_e( 'Remove', 'food-menu-pro' ); ?></a>
		<div class="handlediv" title="<?php esc_attr_e( 'Click to toggle', 'food-menu-pro' ); ?>"></div>
		<strong class="attribute_name"><?php echo esc_html( $attribute_label ); ?></strong>
	</h3>
	<div class="fmp_attribute_data fmp-metabox-content">
		<table cellpadding="0" cellspacing="0">
			<tbody>
			<tr>
				<td class="attribute_name">
					<label><?php esc_html_e( 'Name', 'food-menu-pro' ); ?>:</label>
					<input type="text" class="attribute_name" name="attribute_names[<?php echo esc_attr( $i ); ?>]" value="<?php echo esc_attr( $attribute['name'] ); ?>" />
					<input type="hidden" name="attribute_position[<?php echo esc_attr( $i ); ?>]" class="attribute_position" value="<?php echo esc_attr( $position ); ?>" />
				</td>
				<td rowspan="3">
					<label><?php esc_html_e( 'Value(s)', 'food-menu-pro' ); ?>:</label><textarea name="attribute_values[<?php echo esc_attr( $i ); ?>]" cols="5" rows="5" placeholder="<?php echo esc_attr( sprintf( esc_html__( 'Enter some text, or some attributes by "%s" separating values.', 'food-menu-pro' ), '|' ) ); ?>"><?php echo esc_textarea( $attribute['value'] ); ?></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label><input type="checkbox" class="checkbox" <?php checked( $attribute['is_visible'], 1 ); ?> name="attribute_visibility[<?php echo esc_attr( $i ); ?>]" value="1" /> <?php esc_html_e( 'Visible on the product page', 'food-menu-pro' ); ?></label>
				</td>
			</tr>
			<tr>
				<td>
					<div class="enable_variation show_if_variable">
						<label><input type="checkbox" class="checkbox" <?php checked( $attribute['is_variation'], 1 ); ?> name="attribute_variation[<?php echo esc_attr( $i ); ?>]" value="1" /> <?php esc_html_e( 'Used for variations', 'food-menu-pro' ); ?></label>
					</div>
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>
