<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;
use PanpieTheme_Helper;

$attr = '';
if ( !empty( $data['url']['url'] ) ) {
	$attr  = 'href="' . $data['url']['url'] . '"';
	$attr .= !empty( $data['url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['url']['nofollow'] ) ? ' rel="nofollow"' : '';
	$title = '<a ' . $attr . '>' . $data['title'] . '</a>';
	
}
else {
	$title = $data['title'];
}

if ( !empty( $data['buttontext'] ) ) {
	$btn = '<a class="panpie-button-2" ' . $attr . '>' . $data['buttontext'] . '<i class="fas fa-arrow-right"></i>' . '</a>';
}

?>
<div class="info-box info-<?php echo esc_attr( $data['style'] );?>">
	<div class="rtin-item media">
		<?php if ( !empty( $data['serial_number'] ) ) { ?>
		<div class="rtin-serial"><?php echo wp_kses_post( $data['serial_number'] ); ?></div>
		<?php } ?>
		<div class="media-body">
			<?php if ( !empty( $data['title'] ) ) { ?>
			<h3 class="rtin-title"><?php echo wp_kses_post( $title ); ?></h3>
			<?php } if ( !empty( $data['content'] ) ) { ?>
			<div class="rtin-text"><?php echo wp_kses_post( $data['content'] ); ?></div>
			<?php } ?>
			<?php if ( $data['button_display']  == 'yes' ) { ?>
				<?php if ( !empty( $btn ) ){ ?>
					<div class="rtin-button"><?php echo wp_kses_post( $btn );?></div>		
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>