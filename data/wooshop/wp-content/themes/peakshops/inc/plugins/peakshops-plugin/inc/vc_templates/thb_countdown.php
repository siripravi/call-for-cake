<?php function thb_countdown( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_countdown', $atts );
	extract( $atts );

	$classes[] = 'thb-countdown';
	$classes[] = $extra_class;

	$out ='';
	ob_start();


	?>
	<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>" data-offset="<?php echo esc_attr( $offset ); ?>" data-date="<?php echo esc_attr( $date ); ?>">
    <ul class="thb-countdown-ul">
      <li>
        <span class="days timestamp">00</span>
        <span class="timelabel"><?php esc_html_e( 'days', 'peakshops' ); ?></span>
      </li>
      <li>
        <span class="hours timestamp">00</span>
        <span class="timelabel"><?php esc_html_e( 'hrs', 'peakshops' ); ?></span>
      </li>
      <li>
        <span class="minutes timestamp">00</span>
        <span class="timelabel"><?php esc_html_e( 'min', 'peakshops' ); ?></span>
      </li>
      <li>
        <span class="seconds timestamp">00</span>
        <span class="timelabel"><?php esc_html_e( 'sec', 'peakshops' ); ?></span>
      </li>
    </ul>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short( 'thb_countdown', 'thb_countdown' );