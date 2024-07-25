<aside class="thb-article-subscribe thb-newsletter-form">
	<h4>
		<?php
		$newsletter_translation = ot_get_option( 'newsletter_translation', 'off' );
		if ( 'on' === $newsletter_translation ) {
			$newsletter_translation_title = ot_get_option( 'newsletter_translation_title' );
			echo wp_kses_post( $newsletter_translation_title );
		} else {
			esc_html_e( 'Sign Up to Our Newsletter', 'peakshops' );
		}
		?>
</h4>
	<p>
		<?php
		if ( 'on' === $newsletter_translation ) {
			$newsletter_translation_text = ot_get_option( 'newsletter_translation_text' );
			echo wp_kses_post( $newsletter_translation_text );
		} else {
			esc_html_e( 'Get notified about exclusive offers every week!', 'peakshops' );
		}
		?>
	</p>
	<form class="newsletter-form" action="#" method="post" data-security="<?php echo esc_attr( wp_create_nonce( 'thb_subscription' ) ); ?>">
		<input placeholder="<?php esc_attr_e( 'Your E-Mail', 'peakshops' ); ?>" type="text" name="widget_subscribe" class="widget_subscribe large">
		<button type="submit" name="submit" class="btn large"><?php esc_html_e( 'SIGN UP', 'peakshops' ); ?></button>
		<?php do_action( 'thb_after_newsletter_submit' ); ?>
	</form>
	<?php do_action( 'thb_after_newsletter_form' ); ?>
</aside>
