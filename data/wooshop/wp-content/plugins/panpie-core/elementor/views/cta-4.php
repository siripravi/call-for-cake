<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;

$btn = $attr = '';
if ( !empty( $data['buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['buttonurl']['url'] . '"';
	$attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
	
}

?><div class="cta-default cta-<?php echo esc_attr( $data['style'] ); ?>">
	<div class="action-box">
		<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>
		<?php if ( !empty( $data['content'] ) ) { ?>
		<p><?php echo wp_kses_post( $data['content'] );?></p>
		<?php } ?>
		<?php if ( !empty( $data['phone_text'] ) || !empty( $data['pho_number'] ) ) { ?>
		<h3 class="rtin-phone"><span><i class="fas fa-phone-alt"></i><?php echo wp_kses_post( $data['phone_text'] );?></span> <a href="tel:<?php echo esc_attr( $data['pho_number'] ); ?>"><?php echo wp_kses_post( $data['pho_number'] );?></a></h3>
		<?php } ?>
	</div>
</div>