<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;

$btn = $attr = '';

if ( !empty( $data['one_buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['one_buttonurl']['url'] . '"';
	$attr .= !empty( $data['one_buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['one_buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
	
}
if ( $data['button_style'] == 'panpie-button-1' ) {
	if ( !empty( $data['button_one'] ) ) {
		$btn = '<a class="btn-fill-dark" ' . $attr . '>' . $data['button_one'] . '<i class="fas fa-arrow-right"></i>' .'</a>';
	}
} else {
	if ( !empty( $data['button_one'] ) ) {
		$btn = '<a class="btn-fill-light" ' . $attr . '>' . $data['button_one'] . '<i class="fas fa-arrow-right"></i>' .'</a>';
	}
}
?>
<div class="title-text-button <?php echo esc_attr( $data['showhide'] ); ?> text-<?php echo esc_attr( $data['style'] ); ?>">
	<?php if ( !empty( $data['sub_title'] ) ) { ?>
		<div class="subtitle"><?php echo wp_kses_post( $data['sub_title'] );?></div>
	<?php } ?>
	<?php if ( !empty( $data['title'] ) ) { ?>
		<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?><?php if ( $data['showhide'] == 'barshow' ) { ?><span class="title-bar"></span><?php } ?></h2><?php } ?>
	<div class="rtin-content"><?php echo wp_kses_post( $data['content'] );?></div>
	<?php if ( $data['button_display']  == 'yes' ) { ?>
		<?php if ( $btn ) { ?>
			<div class="rtin-button"><?php echo wp_kses_post( $btn );?></div>
		<?php } ?>
	<?php } ?>
</div>