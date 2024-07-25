<?php
if ( 'on' !== ot_get_option( 'thb_cookie_bar', 'off' ) || ! class_exists( 'PeakShops_plugin' ) ) {
	return;
}
?>
<aside class="thb-cookie-bar">
	<div class="thb-cookie-text">
		<?php
		echo do_shortcode( ot_get_option( 'thb_cookie_bar_content', '<p>In order to provide you a personalized shopping experience, our site uses cookies. By continuing to use this site, you are agreeing to our <a href="#">cookie policy</a>.</p>' ) );
		?>
	</div>
	<a class="btn style2 small button-accept"><?php esc_html_e( 'ACCEPT', 'peakshops' ); ?></a>
</aside>
