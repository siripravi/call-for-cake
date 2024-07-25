<?php
	$subfooter_classes[]   = 'subfooter';
	$subfooter_classes[]   = 'style4';
	$subfooter_classes[]   = ot_get_option( 'subfooter_color', 'light' );
	$subfooter_classes[]   = 'subfooter-full-width-' . ot_get_option( 'subfooter_full_width', 'off' );
	$subfooter_menu        = ot_get_option( 'subfooter_menu' );
	$subfooter_social_link = ot_get_option( 'subfooter_social_link', 'on' );
?>
<!-- Start subfooter -->
<div class="<?php echo esc_attr( implode( ' ', $subfooter_classes ) ); ?>">
	<div class="row align-middle subfooter-row">
		<div class="small-12 medium-4 columns text-center medium-text-left">
			<?php
			if ( $subfooter_menu ) {
				wp_nav_menu(
					array(
						'menu'       => $subfooter_menu,
						'depth'      => 1,
						'menu_class' => 'thb-full-menu',
						'container'  => false,
					)
				);
			}
			?>
		</div>
		<div class="small-12 medium-4 columns text-center">
			<?php do_action( 'thb_footer_logo', true ); ?>
		</div>
		<div class="small-12 medium-4 columns text-center medium-text-right">
			<?php if ( 'on' === $subfooter_social_link ) { thb_get_social_list(); } ?>
			<?php do_action( 'thb_payment_icons' ); ?>
		</div>
	</div>
	<div class="row align-middle align-center">
		<div class="small-12 medium-6 large-4 columns text-center">
			<?php echo wp_kses_post( ot_get_option( 'subfooter_text' ) ); ?>
		</div>
	</div>
</div>
<!-- End Subfooter -->
