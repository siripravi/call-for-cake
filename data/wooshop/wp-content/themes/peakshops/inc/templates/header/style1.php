<?php
	$mobile_header_style = ot_get_option( 'mobile_header_style', 'style1' );

	$header_class[] = 'header style1';
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
				<div class="small-8 medium-6 large-8 columns mobile-logo-column">
					<?php do_action( 'thb_logo' ); ?>
					<?php do_action( 'thb_product_searchform' ); ?>
				</div>
				<div class="small-2 medium-3 large-4 columns">
					<?php do_action( 'thb_secondary_area' ); ?>
				</div>
			<?php } else { ?>
				<div class="small-6 large-8 columns">
					<?php do_action( 'thb_logo' ); ?>
					<?php do_action( 'thb_product_searchform' ); ?>
				</div>
				<div class="small-6 large-4 columns">
					<?php do_action( 'thb_secondary_area' ); ?>
				</div>
			<?php } ?>
		</div>
	</div>
	<div class="header-menu-row">
		<div class="row">
			<div class="small-12 columns">
				<div class="thb-navbar">
					<?php get_template_part( 'inc/templates/header/full-menu' ); ?>
				</div>
				<?php
				if ( has_nav_menu( 'secondary-menu' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'secondary-menu',
							'depth'          => 4,
							'container'      => false,
							'menu_class'     => 'thb-header-secondary thb-full-menu',
							'walker'         => new thb_MegaMenu(),
						)
					);
				}
				?>
			</div>
		</div>
	</div>
</header>
