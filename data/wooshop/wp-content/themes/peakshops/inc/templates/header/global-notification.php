<?php
$global_notification = ot_get_option( 'global_notification', 'off' );

if ( 'off' === $global_notification ) {
	return;
}
$global_notification_color = ot_get_option( 'global_notification_color', 'light' );
?>
<aside class="thb-global-notification <?php echo esc_attr( $global_notification_color ); ?>">
	<div class="row">
		<div class="small-12 columns">
			<?php echo do_shortcode( ot_get_option( 'global_notification_content' ) ); ?>
		</div>
	</div>
</aside>
