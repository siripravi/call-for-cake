<?php
if ( is_admin() ) {
	return;
}
// Thb Mobile Toggle.
function thb_mobile_toggle() {
	?>
	<div class="mobile-toggle-holder thb-secondary-item">
		<div class="mobile-toggle">
			<span></span><span></span><span></span>
		</div>
	</div>
	<?php
}
add_action( 'thb_mobile_toggle', 'thb_mobile_toggle', 3 );

// Mobile Menu.
function thb_mobile_menu() {
	get_template_part( 'inc/templates/header/mobile-menu-style1' );
}
add_action( 'wp_footer', 'thb_mobile_menu' );

// Logo.
function thb_logo( $section = false ) {
	$logo      = ot_get_option( 'logo', Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/logo.png' );
	$classes[] = 'logo-holder';
	if ( 'fixed-logo' === $section ) {
		$logo      = ot_get_option( 'logo_fixed', $logo );
		$classes[] = 'fixed-logo-holder';
	}
	?>
	<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logolink" title="<?php bloginfo( 'name' ); ?>">
			<img src="<?php echo esc_url( $logo ); ?>" loading="lazy" class="logoimg logo-dark" alt="<?php bloginfo( 'name' ); ?>" />
		</a>
	</div>
	<?php
}
add_action( 'thb_logo', 'thb_logo', 2, 1 );

// Global Notification.
function thb_global_notification() {
	$global_notification = ot_get_option( 'global_notification', 'on' );

	if ( 'off' === $global_notification ) {
		return;
	}
	get_template_part( 'inc/templates/header/global-notification' );
}
add_action( 'thb_before_header', 'thb_global_notification' );
// Searchform.
function thb_product_searchform( $index = false ) {
	$header_search_categories = 'on' === ot_get_option( 'header_search_categories', 'on' );
	?>
	<div class="thb-header-inline-search">
		<?php
		if ( ! thb_wc_supported() ) {
			get_search_form();
		} else {
			wc_get_template(
				'product-searchform.php',
				array(
					'thb_categories' => $header_search_categories,
					'index'          => $index,
				)
			);
		}
		?>
		<div class="thb-autocomplete-wrapper"></div>
	</div>
	<?php
}
add_action( 'thb_product_searchform', 'thb_product_searchform', 2, 1 );

// Left Content.
function thb_header_left() {
	$header_left_content = ot_get_option( 'header_left_content', 'nothing' );

	if ( 'search' === $header_left_content ) {
		do_action( 'thb_product_searchform' );
	} elseif ( 'custom-content' === $header_left_content ) {
		$header_left_custom_content = ot_get_option( 'header_left_custom_content', '' );

		if ( '' !== $header_left_custom_content ) {
			?>
			<div class="thb_header_left">
			<?php echo do_shortcode( $header_left_custom_content ); ?>
			</div>
			<?php
		}
	}
}
add_action( 'thb_header_left', 'thb_header_left' );

// Secondary Area.
function thb_secondary_area( $mobile = false ) {
	$classes[] = 'thb-secondary-area';
	$classes[] = 'thb-separator-' . ot_get_option( 'header_secondary_separator', 'off' );
	?>
	<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
		<?php
			do_action( 'thb_quick_search' );
			do_action( 'thb_quick_profile' );
			do_action( 'thb_quick_wishlist' );
			do_action( 'thb_quick_cart' );
			do_action( 'thb_mobile_toggle' );
		?>
	</div>
	<?php
}
add_action( 'thb_secondary_area', 'thb_secondary_area', 10, 1 );

// Header Cart.
function thb_quick_cart() {
	if ( ! thb_wc_supported() ) {
		return;
	}
	$header_cart       = ot_get_option( 'header_cart', 'on' );
	$header_cart_label = ot_get_option( 'header_cart_label', 'on' );

	if ( 'off' === $header_cart && 'off' === $header_cart_label ) {
		return;
	}

	$header_cart_icon   = ot_get_option( 'header_cart_icon', 'style1' );
	$header_cart_amount = ot_get_option( 'header_cart_amount', 'on' );
	?>
	<div class="thb-secondary-item thb-quick-cart has-dropdown">
		<?php if ( 'on' === $header_cart_label ) { ?>
			<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="thb-item-text"><?php esc_html_e( 'Cart', 'peakshops' ); ?></a>
		<?php } ?>
		<?php if ( 'on' === $header_cart_amount ) { ?>
			<?php if ( is_object( WC()->cart ) ) { ?>
				<span class="thb-item-text thb-cart-amount"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
			<?php } ?>
		<?php } ?>
		<div class="thb-item-icon-wrapper">
			<?php if ( 'on' === $header_cart ) { ?>
				<span class="thb-item-icon">
					<?php get_template_part( 'assets/img/svg/cart/' . $header_cart_icon . '.svg' ); ?>
				</span>
			<?php } ?>
			<?php if ( is_object( WC()->cart ) ) { ?>
				<span class="count thb-cart-count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
			<?php } ?>
		</div>
		<?php if ( ! is_cart() && ! is_checkout() ) { ?>
			<div class="thb-secondary-cart thb-secondary-dropdown">
				<?php
				if ( class_exists( 'WC_Widget_Cart' ) ) {
					the_widget(
						'WC_Widget_Cart',
						array(
							'title' => false,
						)
					);
				}
				?>
				<?php do_action( 'thb_header_after_cart' ); ?>
			</div>
		<?php } ?>
	</div>
	<?php
}
add_action( 'thb_quick_cart', 'thb_quick_cart', 3 );

// Header Search.
function thb_quick_search() {
	$header_search       = ot_get_option( 'header_search', 'on' );
	$header_search_label = ot_get_option( 'header_search_label', 'on' );
	if ( 'off' === $header_search && 'off' === $header_search_label ) {
		return;
	}
	?>
	<div class="thb-secondary-item thb-quick-search has-dropdown">
		<?php if ( 'on' === $header_search_label ) { ?>
			<span class="thb-item-text"><?php esc_html_e( 'Search', 'peakshops' ); ?></span>
		<?php } ?>
		<?php if ( 'on' === $header_search ) { ?>
		<div class="thb-item-icon-wrapper">
			<?php get_template_part( 'assets/img/svg/search.svg' ); ?>
		</div>
		<?php } ?>
		<div class="thb-secondary-search thb-secondary-dropdown">
			<?php do_action( 'thb_product_searchform', '9997' ); ?>
		</div>
	</div>
	<?php
}
add_action( 'thb_quick_search', 'thb_quick_search' );

// Header Profile.
function thb_quick_profile() {
	if ( ! thb_wc_supported() ) {
		return;
	}
	$header_myaccount       = ot_get_option( 'header_myaccount', 'on' );
	$header_myaccount_label = ot_get_option( 'header_myaccount_label', 'on' );
	if ( 'off' === $header_myaccount && 'off' === $header_myaccount_label ) {
		return;
	}
	?>
	<a class="thb-secondary-item thb-quick-profile" href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" title="<?php esc_attr_e( 'My Account', 'peakshops' ); ?>">
		<?php if ( 'on' === $header_myaccount_label ) { ?>
			<span class="thb-item-text">
				<?php esc_html_e( 'My Account', 'peakshops' ); ?>
			</span>
		<?php } ?>
		<?php if ( 'on' === $header_myaccount ) { ?>
			<?php get_template_part( 'assets/img/svg/myaccount-style1.svg' ); ?>
		<?php } ?>
	</a>
	<?php
}
add_action( 'thb_quick_profile', 'thb_quick_profile' );

// Header Wishlist.
function thb_quick_wishlist() {
	if ( ! thb_wc_supported() ) {
		return;
	}
	$header_wishlist       = ot_get_option( 'header_wishlist', 'on' );
	$header_wishlist_label = ot_get_option( 'header_wishlist_label', 'on' );

	if ( 'off' === $header_wishlist && 'off' === $header_wishlist_label ) {
		return;
	}

	?>
	<?php if ( class_exists( 'YITH_WCWL' ) ) { ?>
		<a class="thb-secondary-item thb-quick-wishlist" href="<?php echo esc_url( YITH_WCWL()->get_wishlist_url() ); ?>" title="<?php esc_attr_e( 'Wishlist', 'peakshops' ); ?>">
			<?php if ( 'on' === $header_wishlist_label ) { ?>
				<span class="thb-item-text"><?php esc_html_e( 'Wishlist', 'peakshops' ); ?></span>
			<?php } ?>
			<div class="thb-item-icon-wrapper">
				<?php if ( 'on' === $header_wishlist ) { ?>
				<span class="thb-item-icon">
					<?php get_template_part( 'assets/img/svg/wishlist-style1.svg' ); ?>
				</span>
				<?php } ?>
				<?php if ( YITH_WCWL()->count_products() ) { ?>
					<span class="count thb-wishlist-count"><?php echo esc_html( YITH_WCWL()->count_products() ); ?></span>
				<?php } ?>
			</div>
		</a>
	<?php } ?>
	<?php
}
add_action( 'thb_quick_wishlist', 'thb_quick_wishlist', 3 );

// Subheader Sections
function thb_subheader_sections( $sections ) {

	if ( ! is_array( $sections ) || count( $sections ) < 1 ) {
		return;
	}
	foreach ( $sections as $section ) {
		$section_type = $section['section_type'];

		switch ( $section_type ) {
			case 'menu':
				$subheader_menu = $section['menu'];
				if ( $subheader_menu ) {
					wp_nav_menu(
						array(
							'menu'       => $subheader_menu,
							'container'  => false,
							'depth'      => 2,
							'menu_class' => 'thb-full-menu',
						)
					);
				}
				break;
			case 'text':
				$subheader_text = $section['text'];
				echo '<div class="subheader-text">' . do_shortcode( $subheader_text ) . '</div>';
				break;
			case 'ls':
				do_action( 'thb_language_switcher' );
				break;
			case 'cs':
				do_action( 'thb_currency_switcher' );
				break;
			case 'social':
				thb_get_social_list();
				break;
		}
	}
}
add_action( 'thb_subheader_sections', 'thb_subheader_sections', 10, 2 );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function thb_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'thb_pingback_header' );
