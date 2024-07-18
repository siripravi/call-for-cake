<?php function thb_subscribe( $atts, $content = null ) {
	$style = 'style1';
  $atts = vc_map_get_attributes( 'thb_subscribe', $atts );
  extract( $atts );
 	ob_start();
	$classes[] = 'thb-newsletter-form thb-subscribe-element';
	$classes[] = $style;
	$classes[] = $extra_class;
 	?>
	<aside class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
		<?php if ( $title ) { ?><h4><?php echo esc_html( $title ); ?></h4><?php } ?>
		<?php if ( $content ) { ?><?php echo wp_kses_post( wpautop( $content ) ); ?><?php } ?>
		<div>
			<form class="newsletter-form" action="#" method="post" data-security="<?php echo esc_attr( wp_create_nonce( 'thb_subscription' ) ); ?>">
				<input placeholder="<?php esc_attr_e( 'Your E-Mail', 'peakshops' ); ?>" type="text" name="widget_subscribe" class="widget_subscribe">
				<button type="submit" name="submit" class="btn accent"><?php esc_html_e( 'SUBSCRIBE', 'peakshops' ); ?></button>
				<?php do_action( 'thb_after_newsletter_submit' ); ?>
			</form>
			<?php do_action( 'thb_after_newsletter_form' ); ?>
		</div>
	</aside>
	<?php
  $out = ob_get_clean();
  return $out;
}
thb_add_short( 'thb_subscribe', 'thb_subscribe' );
