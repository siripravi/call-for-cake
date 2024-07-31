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
		$btn = '<a class="btn-fill-black" ' . $attr . '>' . '<span>' . 'Get It On' .'</span>' . $data['buttontext'] . '<i class="fas fa-arrow-right"></i>' . '</a>';
	}
}

?>
<div class="cta-default cta-<?php echo esc_attr( $data['style'] ); ?>">
	<div class="action-box row">
		<div class="cta-content col-lg-6">
			<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>
			<?php if ( !empty( $data['content'] ) ) { ?>
			<p><?php echo wp_kses_post( $data['content'] );?></p>
			<?php } ?>
		</div>
		<div class="col-lg-6">
			<div class="rtin-button">
				<a class="btn-fill-black" href="<?php echo esc_url( $data['buttonurl']['url'] );?>">
					<div class="media">
						<div class="item-icon">
							<img src="<?php echo PANPIE_ASSETS_URL . 'element/play-icon.png'; ?>" alt="Play">
						</div>
						<div class="media-body">
							<div class="item-text">
								<span><?php esc_html_e( 'Get It On', 'panpie' );?></span><?php echo esc_html( $data['buttontext'] );?>
							</div>
						</div>
					</div>
				</a>
				<a class="btn-fill-black" href="<?php echo esc_url( $data['buttonurl2']['url'] );?>">
					<div class="media">
						<div class="item-icon">
							<img src="<?php echo PANPIE_ASSETS_URL . 'element/app-icon.png'; ?>" alt="Play">
						</div>
						<div class="media-body">
							<div class="item-text">
								<span><?php esc_html_e( 'Available On', 'panpie' );?></span><?php echo esc_html( $data['buttontext2'] );?>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>