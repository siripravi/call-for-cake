<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;

?>

<div class="rtin-address-default address-<?php echo esc_attr( $data['style'] ); ?>">
	<div class="rtin-address-info">
		<?php if ( !empty( $data['address_info'] )  ) { ?>
			<div class="rtin-address">
				<?php foreach ( $data['address_info'] as $address ) { ?>
					<div class="rtin-item">
					<?php if ( !empty($address['address_label']) || !empty( $address['address_infos']) ) { ?>
					<?php if ( !empty( $address['address_icon'] ) ) { ?>
					<div class="rtin-icon"><?php echo wp_kses_post( $address['address_icon'] ); ?></div>
					<?php } ?>
					<div class="rtin-info"><?php if ( !empty( $address['address_label'] ) ) { ?><h3><?php echo esc_html( $address['address_label'] ); ?></h3><?php } ?><?php echo wp_kses_post( $address['address_infos'] ); ?></div>
					<?php } ?>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
</div>