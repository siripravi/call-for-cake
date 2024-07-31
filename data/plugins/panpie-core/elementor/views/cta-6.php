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
		<span class="sub-title"><?php echo wp_kses_post( $data['sub_title'] );?></span>
		<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>
		<?php if ( !empty( $data['content'] ) ) { ?>
		<p><?php echo wp_kses_post( $data['content'] );?></p>
		<?php } ?>
	</div>
</div>