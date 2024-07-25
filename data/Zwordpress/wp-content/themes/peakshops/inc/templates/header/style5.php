<?php
	$mobile_header_style = ot_get_option( 'mobile_header_style', 'style1' );

	$header_class[] = 'header style5';
	$header_class[] = 'thb-main-header';
	$header_class[] = 'thb-header-full-width-' . ot_get_option( 'header_fullwidth', 'off' );
	$header_class[] = ot_get_option( 'header_color', 'light-header' );
	$header_class[] = 'mobile-header-' . $mobile_header_style;
?>
<header class="<?php echo esc_attr( implode( ' ', $header_class ) ); ?>">
	<div class="header-logo-row">
		<div class="row align-middle">
			<?php if ( 'style1' === $mobile_header_style ) { ?>
				<div class="small-2 medium-3 columns hide-for-large">
					<?php do_action( 'thb_mobile_toggle' ); ?>
				</div>
				<div class="small-8 medium-6 large-8 columns mobile-logo-column hide-for-large">
					<?php do_action( 'thb_logo' ); ?>
				</div>
				<div class="small-2 medium-3 large-4 columns hide-for-large">
					<?php do_action( 'thb_secondary_area' ); ?>
				</div>
				<div class="small-12 columns show-for-large">
					<div class="thb-style5-logo-wrapper">
						<?php do_action( 'thb_mobile_toggle' ); ?>
						<?php do_action( 'thb_logo' ); ?>
					</div>
					<?php do_action( 'thb_product_searchform' ); ?>
					<?php do_action( 'thb_secondary_area' ); ?>
				</div>
			<?php } else { ?>
				<div class="small-12 columns">
					<div class="thb-style5-logo-wrapper">
						<?php do_action( 'thb_mobile_toggle' ); ?>
						<?php do_action( 'thb_logo' ); ?>
					</div>
					<?php do_action( 'thb_product_searchform' ); ?>
					<?php do_action( 'thb_secondary_area' ); ?>
				</div>
			<?php } ?>
		</div>
	</div>
</header>
