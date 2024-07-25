<?php
// Footer Columns.
function thb_footer_columns() {
	$footer_columns = ot_get_option( 'footer_columns', 'fourcolumns' );
	?>
		<?php if ( 'fourcolumns' === $footer_columns ) { ?>
			<div class="small-12 medium-6 large-3 columns">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
			<div class="small-12 medium-6 large-3 columns">
				<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
			<div class="small-12 medium-6 large-3 columns">
				<?php dynamic_sidebar( 'footer3' ); ?>
			</div>
			<div class="small-12 medium-6 large-3 columns">
				<?php dynamic_sidebar( 'footer4' ); ?>
			</div>
		<?php } elseif ( 'threecolumns' === $footer_columns ) { ?>
			<div class="small-12 medium-6 large-4 columns">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
			<div class="small-12 medium-6 large-4 columns">
				<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
			<div class="small-12 large-4 columns">
					<?php dynamic_sidebar( 'footer3' ); ?>
			</div>
		<?php } elseif ( 'twocolumns' === $footer_columns ) { ?>
			<div class="small-12 medium-6 columns">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
			<div class="small-12 medium-6 columns">
				<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
		<?php } elseif ( 'doubleleft' === $footer_columns ) { ?>
			<div class="small-12 medium-6 large-3 columns">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
			<div class="small-12 medium-6 large-3 columns">
				<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
			<div class="small-12 medium-6 large-6 columns">
				<?php dynamic_sidebar( 'footer3' ); ?>
			</div>
		<?php } elseif ( 'doubleright' === $footer_columns ) { ?>
			<div class="small-12 medium-6 large-6 columns">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
			<div class="small-12 medium-6 large-3 columns">
				<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
			<div class="small-12 medium-6 large-3 columns">
					<?php dynamic_sidebar( 'footer3' ); ?>
			</div>
		<?php } elseif ( 'fivecolumns' === $footer_columns ) { ?>
			<div class="small-12 medium-6 thb-5 columns">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
			<div class="small-12 medium-6 thb-5 columns">
				<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
			<div class="small-12 medium-6 thb-5 columns">
				<?php dynamic_sidebar( 'footer3' ); ?>
			</div>
			<div class="small-12 medium-6 thb-5 columns">
				<?php dynamic_sidebar( 'footer4' ); ?>
			</div>
			<div class="small-12 thb-5 columns">
				<?php dynamic_sidebar( 'footer5' ); ?>
			</div>
		<?php } elseif ( 'onecolumns' === $footer_columns ) { ?>
			<div class="small-12 columns">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
		<?php } elseif ( 'sixcolumns' === $footer_columns ) { ?>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer3' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer4' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer5' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer6' ); ?>
			</div>
		<?php } elseif ( 'fivelargerightcolumns' === $footer_columns ) { ?>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer3' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer4' ); ?>
			</div>
			<div class="small-6 medium-8 large-4 columns">
				<?php dynamic_sidebar( 'footer5' ); ?>
			</div>
		<?php } elseif ( 'fivelargeleftcolumns' === $footer_columns ) { ?>
			<div class="small-6 medium-8 large-4 columns">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer3' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer4' ); ?>
			</div>
			<div class="small-12 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer5' ); ?>
			</div>
		<?php } elseif ( 'fivelargerightcolumnsalt' === $footer_columns ) { ?>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer3' ); ?>
			</div>
			<div class="small-6 medium-4 large-3 columns">
				<?php dynamic_sidebar( 'footer4' ); ?>
			</div>
			<div class="small-12 medium-8 large-3 columns">
				<?php dynamic_sidebar( 'footer5' ); ?>
			</div>
		<?php } elseif ( 'fivelargeleftcolumnsalt' === $footer_columns ) { ?>
			<div class="small-12 medium-8 large-3 columns">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
			<div class="small-6 medium-4 large-3 columns">
				<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer3' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer4' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer5' ); ?>
			</div>
		<?php } ?>
	<?php
}
add_action( 'thb_footer_columns', 'thb_footer_columns' );

// Footer Logo.
function thb_footer_logo( $subfooter = false ) {
	$toggle = ot_get_option( 'footer_logo', 'off' );

	if ( $subfooter ) {
		$toggle = ot_get_option( 'subfooter_logo', 'off' );
	}
	if ( 'on' === $toggle ) {

		if ( $subfooter ) {
			$footer_logo_upload = ot_get_option( 'subfooter_logo_upload', Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/logo.png' );
		} else {
			$footer_logo_upload = ot_get_option( 'footer_logo_upload', Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/logo.png' );
		}
		?>
		<div class="footer-logo-holder">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logolink" title="<?php bloginfo( 'name' ); ?>">
				<img src="<?php echo esc_url( $footer_logo_upload ); ?>" class="logoimg" loading="lazy" alt="<?php bloginfo( 'name' ); ?>"/>
			</a>
		</div>
		<?php
	}
}
add_action( 'thb_footer_logo', 'thb_footer_logo', 1 );

// Payment Icons.
function thb_payment_icons() {
	$footer_payment_icons        = ot_get_option( 'footer_payment_icons', array() );
	$footer_payment_icons_custom = ot_get_option( 'footer_payment_icons_custom', array() );
	if ( ! count( $footer_payment_icons ) && ! count( $footer_payment_icons_custom ) ) {
		return;
	}
	?>
	<ul class="thb-payment-icons footer-payment-icons">
		<?php
		if ( count( $footer_payment_icons ) ) {
			foreach ( $footer_payment_icons as $payment ) {
				?>
				<li><i class="pf pf-<?php echo esc_attr( $payment['payment_type'] ); ?>"></i></li>
				<?php
			}
		}
		?>
		<?php
		if ( count( $footer_payment_icons_custom ) ) {
			foreach ( $footer_payment_icons_custom as $payment ) {
				?>
				<li class="thb-custom-payment-icon thb-<?php echo esc_attr( sanitize_title_with_dashes( $payment['title'] ) ); ?>"><img src="<?php echo esc_attr( $payment['icon_image'] ); ?>" alt="<?php echo esc_attr( $payment['title'] ); ?>" /></li>
				<?php
			}
		}
		?>
	</ul>
	<?php
}
add_action( 'thb_payment_icons', 'thb_payment_icons' );

// Footer Templates.
function thb_footer_templates() {
	if ( 'on' === ot_get_option( 'footer', 'on' ) ) {
		get_template_part( 'inc/templates/footer/footer-style1' );
	}
	if ( 'on' === ot_get_option( 'subfooter', 'on' ) ) {
		get_template_part( 'inc/templates/subfooter/subfooter-' . ot_get_option( 'subfooter_style', 'style1' ) );
	}
	if ( ot_get_option( 'fixed_header', 'on' ) === 'on' ) {
		$fixed_header_style = ot_get_option( 'fixed_header_style', 'style1' );
		get_template_part( 'inc/templates/header/fixed-' . $fixed_header_style );
	}
	?>
	<div class="click-capture"></div>
	<?php
}
add_action( 'thb_after_main', 'thb_footer_templates' );


// Footer Items.
function thb_footer_items() {
	// Scroll To Top.
	if ( 'on' === ot_get_option( 'scroll_to_top', 'on' ) ) {
		?>
		<a id="scroll_to_top">
			<i class="thb-icon-up-open-mini"></i>
		</a>
		<?php
	}

	// Off Canvas Filters.
	do_action( 'thb_shop_filters' );

	// Single Product Quick View.
	if ( 'on' === ot_get_option( 'shop_product_quickview', 'on' ) ) {
		?>
		<div class="thb-quickview-wrapper">
			<header class="side-panel-header">
				<span><?php esc_html_e( 'Quick Shop', 'peakshops' ); ?></span>
				<div class="thb-close thb-quickview-close" title="<?php esc_attr_e( 'Close', 'peakshops' ); ?>"><?php get_template_part( 'assets/img/svg/close.svg' ); ?></div>
			</header>
			<div class="thb-quickview-content"></div>
		</div>
		<?php
	}

	// Cookie Bar.
	get_template_part( 'inc/templates/misc/cookie-bar' );
}
add_action( 'wp_footer', 'thb_footer_items', 3 );

// Thb Newsletter Popup.
function thb_newsletter() {

	$newsletter = ot_get_option( 'newsletter', 'off' );

	if ( 'on' !== $newsletter ) {
		return;
	}

	if ( ! is_admin() ) {
		$newsletter_lightbox_color = ot_get_option( '$newsletter_lightbox_color' );
		$newsletter_image          = ot_get_option( 'newsletter_image' );
		?>
		<aside id="newsletter-popup" class="mfp-hide theme-popup newsletter-popup <?php echo esc_attr( $newsletter_lightbox_color ); ?>">
			<?php if ( $newsletter_image ) { ?>
				<figure class="newsletter-image"><?php echo wp_get_attachment_image( $newsletter_image, 'peakshops-full' ); ?></figure>
			<?php } ?>
			<div class="newsletter-content">
				<?php get_template_part( 'inc/templates/misc/subscribe' ); ?>
			</div>
		</aside>
		<?php
	}
}
add_action( 'wp_footer', 'thb_newsletter' );
