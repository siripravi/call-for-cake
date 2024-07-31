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
if ( $data['button_style'] == 'panpie-button-1' ) {
	if ( !empty( $data['buttontext'] ) ) {
		$btn = '<a class="btn-fill-dark" ' . $attr . '>' . $data['buttontext'] . '<i class="fas fa-arrow-right"></i>' . '</a>';
	}
} else {
	if ( !empty( $data['buttontext'] ) ) {
		$btn = '<a class="btn-fill-light" ' . $attr . '>' . $data['buttontext'] . '<i class="fas fa-arrow-right"></i>' . '</a>';
	}
}

?>
<div class="cta-default cta-<?php echo esc_attr( $data['style'] ); ?>">
	<div class="action-box">
		<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>
		<?php if ( !empty( $data['phone_text'] ) || !empty( $data['pho_number'] ) ) { ?>
		<h3 class="rtin-phone"><span><?php echo wp_kses_post( $data['phone_text'] );?></span> <?php echo wp_kses_post( $data['pho_number'] );?></h3>
		<?php } ?>
		<?php if ( !empty( $data['content'] ) ) { ?>
		<p><?php echo wp_kses_post( $data['content'] );?></p>
		<?php } ?>
		<?php if ( $btn ) { ?>
			<div class="rtin-button"><?php echo wp_kses_post( $btn );?></div>		
		<?php } ?>		
	</div>
</div>