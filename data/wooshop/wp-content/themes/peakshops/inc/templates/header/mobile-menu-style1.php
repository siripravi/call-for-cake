<?php
	$color   = ot_get_option( 'mobile_menu_color', 'light' );
	$class[] = 'style1';
	$class[] = 'side-panel';
	$class[] = $color;
	$class[] = 'light' === $color ? 'dark-scroll' : false;
?>
<nav id="mobile-menu" class="<?php echo esc_attr( implode( ' ', $class ) ); ?>" data-behaviour="<?php echo esc_attr( ot_get_option( 'submenu_behaviour', 'thb-submenu' ) ); ?>">
	<header class="side-panel-header">
		<span><?php esc_html_e( 'Menu', 'peakshops' ); ?></span>
		<div class="thb-mobile-close thb-close" title="<?php esc_attr_e( 'Close', 'peakshops' ); ?>"><?php get_template_part( 'assets/img/svg/close.svg' ); ?></div>
	</header>
	<div class="side-panel-inner" id="mobile_menu_scroll">

		<div class="mobile-menu-top">
			<?php
			if ( 'on' === ot_get_option( 'mobilemenu_search', 'on' ) ) {
				if ( ! thb_wc_supported() ) {
					get_search_form();
				} else {
					wc_get_template(
						'product-searchform.php',
						array(
							'thb_categories' => false,
							'index'          => 999,
						)
					);
				}
			}
			if ( 'on' === ot_get_option( 'mobilemenu_override', 'off' ) ) {
				$mobilemenu_override_menu = ot_get_option( 'mobilemenu_override_menu' );
				wp_nav_menu(
					array(
						'menu'        => $mobilemenu_override_menu,
						'depth'       => 4,
						'container'   => false,
						'menu_class'  => 'thb-mobile-menu',
						'walker'      => new thb_mobileDropdown(),
						'fallback_cb' => function() {
							?>
							<p><?php esc_html_e( 'Please assign a menu from Appearance > Theme Options > Menu > Mobile Menu', 'peakshops' ); ?></p>
							<?php
						},
					)
				);
			} else {
				wp_nav_menu(
					array(
						'theme_location' => 'nav-menu',
						'depth'          => 4,
						'container'      => false,
						'menu_class'     => 'thb-mobile-menu',
						'walker'         => new thb_mobileDropdown(),
						'fallback_cb'    => function() {
							?>
							<p><?php esc_html_e( 'Please assign a menu from Appearance > Menus', 'peakshops' ); ?></p>
							<?php
						},
					)
				);
			}
			if ( has_nav_menu( 'mobile-secondary-menu' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'mobile-secondary-menu',
						'depth'          => 1,
						'container'      => false,
						'menu_class'     => 'thb-secondary-menu',
					)
				);
			}
			?>
			<?php dynamic_sidebar( 'mobile-menu' ); ?>
		</div>
		<div class="mobile-menu-bottom">
			<?php
			if ( 'on' === ot_get_option( 'mobilemenu_social_link', 'on' ) ) {
				thb_get_social_list(); }
			?>
			<?php if ( $mobile_menu_footer = ot_get_option( 'mobile_menu_footer' ) ) { ?>
				<div class="menu-footer">
					<?php echo do_shortcode( $mobile_menu_footer ); ?>
				</div>
			<?php } ?>
		</div>
	</div>
	<div class="thb-mobile-menu-switchers">
		<?php do_action( 'thb_language_switcher_mobile' ); ?>
		<?php do_action( 'thb_currency_switcher_mobile' ); ?>
	</div>
</nav>
