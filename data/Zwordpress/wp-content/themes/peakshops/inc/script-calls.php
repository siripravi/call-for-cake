<?php
// De-register Contact Form 7 styles.
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

// Main Styles.
function thb_main_styles() {
	global $post;
	$i                       = 0;
	$self_hosted_fonts       = ot_get_option( 'self_hosted_fonts' );
	$thb_theme_directory_uri = Thb_Theme_Admin::$thb_theme_directory_uri;
	$thb_theme_version       = Thb_Theme_Admin::$thb_theme_version;

	// Enqueue.
	wp_enqueue_style( 'thb-app', esc_url( get_theme_file_uri( 'assets/css/app.css' ) ), null, esc_attr( $thb_theme_version ) );

	if ( ! defined( 'THB_DEMO_SITE' ) ) {
		wp_enqueue_style( 'thb-style', get_stylesheet_uri(), null, esc_attr( $thb_theme_version ) );
	}
	wp_enqueue_style( 'thb-google-fonts', thb_google_webfont(), null, esc_attr( $thb_theme_version ) );
	wp_add_inline_style( 'thb-app', thb_selection() );

	if ( class_exists( 'WeDevs_Dokan::class' ) ) {
		wp_enqueue_style( 'thb-dokan', esc_url( get_theme_file_uri( 'assets/css/plugins/plugin-dokan.css' ) ), array( 'thb-app' ), esc_attr( $thb_theme_version ) );
	}  

	if ( $self_hosted_fonts ) {
		foreach ( $self_hosted_fonts as $font ) {
			$i++;
			wp_enqueue_style( 'thb-self-hosted-' . $i, $font['font_url'], null, esc_attr( $thb_theme_version ) );
		}
	}

	if ( $post ) {
		if ( has_shortcode( $post->post_content, 'contact-form-7' ) && function_exists( 'wpcf7_enqueue_styles' ) ) {
			wpcf7_enqueue_styles();
		}
	}
	// Typekit.
	$typekit_id = ot_get_option( 'typekit_id' );
	if ( $typekit_id ) {
		wp_enqueue_style( 'thb-typekit', 'https://use.typekit.net/' . $typekit_id . '.css', null, esc_attr( $thb_theme_version ), false );
	}

	// No Gutenberg Styles on Page Builder templates
	if ( is_page_template( 'page-default.php' ) ) {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wc-block-style' );
	}

}
add_action( 'wp_enqueue_scripts', 'thb_main_styles' );

// Remove default WPBakery styles.
function thb_remove_wpbakery_styles() {
	if ( 'on' === ot_get_option( 'thb_remove_wpbakery_styles', 'on' ) && ! thb_is_vc_frontend() ) {
		wp_dequeue_style( 'js_composer_front' );
		wp_deregister_style( 'js_composer_front' );
		wp_dequeue_script( 'js_composer_front' );
		wp_deregister_script( 'js_composer_front' );
		wp_dequeue_script( 'wpb_composer_front_js' );
	}
}
add_action( 'wp_enqueue_scripts', 'thb_remove_wpbakery_styles', 10001 );

// Preload font files.
function thb_preload_font_files() {
	$font_url = get_theme_file_uri( 'assets/fonts/paymentfont-webfont.woff' );
	$font_url = add_query_arg( 'v', '1.2.5', $font_url );
	?>
	<link rel="preload" href="<?php echo esc_url( $font_url ); ?>" as="font" crossorigin="anonymous">
	<?php
}
add_action( 'wp_head', 'thb_preload_font_files', 7 );

// Main Scripts.
function thb_register_js() {
	if ( ! is_admin() ) {
		global $post;
		$thb_combined_libraries  = ot_get_option( 'thb_combined_libraries', 'on' );
		$thb_api_key             = ot_get_option( 'map_api_key' );
		$thb_dependency          = array( 'jquery', 'underscore' );
		$thb_theme_directory_uri = Thb_Theme_Admin::$thb_theme_directory_uri;
		$thb_theme_version       = Thb_Theme_Admin::$thb_theme_version;
		// Register.
		if ( 'on' === $thb_combined_libraries ) {
			wp_enqueue_script( 'thb-vendor', esc_url( $thb_theme_directory_uri ) . 'assets/js/vendor.min.js', array( 'jquery' ), esc_attr( $thb_theme_version ), true );
			$thb_dependency[] = 'thb-vendor';
		} else {
			$thb_js_libraries = array(
				'gsap'                => '_0gsap.min.js',
				'drawsvgplugin'       => '_2DrawSVGPlugin.js',
				'splittext'           => '_3SplitText.min.js',
				'scrolltoplugin'      => '_1ScrollToPlugin.min.js',
				'headroom'            => 'headroom.min.js',
				'imagesloaded-pkgd'   => 'imagesloaded.pkgd.min.js',
				'isinviewport'        => 'isInViewport.min.js',
				'jquery-autocomplete' => 'jquery.autocomplete.js',
				'jquery-headroom'     => 'jquery.headroom.js',
				'jquery-hotspot'      => 'jquery.hotspot.js',
				'jquery-hoverIntent'  => 'jquery.hoverIntent.js',
				'magnific-popup'      => 'jquery.magnific-popup.min.js',
				'video'               => 'jquery.vide.js',
				'js-cookie'           => 'js.cookie.js',
				'lazysizes'           => 'lazysizes.min.js',
				'mobile-detect'       => 'mobile-detect.min.js',
				'odometer'            => 'odometer.min.js',
				'perfect-scrollbar'   => 'perfect-scrollbar.min.js',
				'select2'             => 'select2.min.js',
				'slick'               => 'slick.min.js',
				'typed'               => 'typed.min.js',
			);
			foreach ( $thb_js_libraries as $handle => $value ) {
				wp_enqueue_script( $handle, esc_url( $thb_theme_directory_uri ) . 'assets/js/vendor/' . esc_attr( $value ), array( 'jquery' ), esc_attr( $thb_theme_version ), true );
			}
		}
		wp_enqueue_script( 'underscore' );

		if ( 'on' === ot_get_option( 'shop_product_quickview', 'on' ) ) {
			wp_enqueue_script( 'wc-add-to-cart-variation' );
		}
		wp_enqueue_script( 'thb-app', esc_url( $thb_theme_directory_uri ) . 'assets/js/app.min.js', $thb_dependency, esc_attr( $thb_theme_version ), true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		if ( $post ) {
			if ( has_shortcode( $post->post_content, 'thb_map_parent' ) || has_shortcode( $post->post_content, 'thb_location_parent' ) ) {
				wp_enqueue_script( 'gmapdep', 'https://maps.google.com/maps/api/js?key=' . esc_attr( $thb_api_key ), null, esc_attr( $thb_theme_version ), false );
			}

			if ( has_shortcode( $post->post_content, 'contact-form-7' ) && function_exists( 'wpcf7_enqueue_scripts' ) ) {
				wpcf7_enqueue_scripts();
			}
		}

		wp_localize_script(
			'thb-app',
			'themeajax',
			array(
				'url'      => admin_url( 'admin-ajax.php' ),
				'l10n'     => array(
					'of'               => esc_html__( '%curr% of %total%', 'peakshops' ),
					'just_of'          => esc_html__( 'of', 'peakshops' ),
					'loading'          => esc_html__( 'Loading', 'peakshops' ),
					'lightbox_loading' => esc_html__( 'Loading...', 'peakshops' ),
					'nomore'           => esc_html__( 'No More Posts', 'peakshops' ),
					'nomore_products'  => esc_html__( 'All Products Loaded', 'peakshops' ),
					'loadmore'         => esc_html__( 'Load More', 'peakshops' ),
					'adding_to_cart'   => esc_html__( 'Adding to Cart', 'peakshops' ),
					'added_to_cart'    => esc_html__( 'Added To Cart', 'peakshops' ),
					'has_been_added'   => esc_html__( 'has been added to your cart.', 'peakshops' ),
					'no_results'       => esc_html__( 'No Results Found', 'peakshops' ),
					'results_found'    => esc_html__( 'Results Found', 'peakshops' ),
					'results_all'      => esc_html__( 'View All Results', 'peakshops' ),
					'copied'           => esc_html__( 'Copied', 'peakshops' ),
					'prev'             => esc_html__( 'Prev', 'peakshops' ),
					'next'             => esc_html__( 'Next', 'peakshops' ),
					'pinit'            => esc_html__( 'PIN IT', 'peakshops' ),
				),
				'svg'      => array(
					'prev_arrow'  => thb_load_template_part( 'assets/img/svg/prev_arrow.svg' ),
					'next_arrow'  => thb_load_template_part( 'assets/img/svg/next_arrow.svg' ),
					'close_arrow' => thb_load_template_part( 'assets/svg/arrows_remove.svg' ),
					'pagination'  => thb_load_template_part( 'assets/img/svg/pagination.svg' ),
					'preloader'   => thb_load_template_part( 'assets/img/svg/preloader-material.svg' ),
				),
				'nonce'    => array(
					'product_quickview' => wp_create_nonce( 'thb_quickview_ajax' ),
					'autocomplete_ajax' => wp_create_nonce( 'thb_autocomplete_ajax' ),
				),
				'settings' => array(
					'site_url'                        => get_home_url(),
					'current_url'                     => get_permalink(),
					'fixed_header_scroll'             => ot_get_option( 'fixed_header_scroll', 'on' ),
					'fixed_header_padding'            => ot_get_option( 'header_padding_fixed' ),
					'general_search_ajax'             => ot_get_option( 'general_search_ajax', 'on' ),
					'newsletter'                      => ot_get_option( 'newsletter', 'on' ),
					'newsletter_length'               => ot_get_option( 'newsletter-interval', '1' ),
					'newsletter_delay'                => ot_get_option( 'newsletter_delay', '0' ),
					'newsletter_mailchimp'            => ot_get_option( 'newsletter_mailchimp_api' ) !== '',
					'shop_product_listing_pagination' => ot_get_option( 'shop_product_listing_pagination', 'style1' ),
					'right_click'                     => ot_get_option( 'right_click', 'on' ),
					'cart_url'                        => thb_wc_supported() ? wc_get_cart_url() : false,
					'is_cart'                         => thb_wc_supported() ? is_cart() : false,
					'is_checkout'                     => thb_wc_supported() ? is_checkout() : false,
					'touch_threshold'                 => apply_filters( 'peakshops_touchthreshold', 5 ),
					'mobile_menu_animation_speed'     => ot_get_option( 'mobile_menu_animation_speed', 0.3 ),
				),
			)
		);
	}
}
add_action( 'wp_enqueue_scripts', 'thb_register_js' );

// WooCommerce Remove Unnecessary Files.
add_action(
	'init',
	function() {
		remove_action( 'wp_head', 'wc_gallery_noscript' );
	}
);
function thb_woocommerce_scripts_styles() {

	if ( ! is_admin() ) {
		if ( thb_wc_supported() ) {
			global $post;
			wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
			wp_deregister_style( 'woocommerce_prettyPhoto_css' );

			if ( ! has_shortcode( $post && $post->post_content, 'yith_wcwl_wishlist' ) ) {
				wp_dequeue_style( 'yith-wcwl-font-awesome' );
				wp_deregister_style( 'yith-wcwl-font-awesome' );
			} else {
				wp_dequeue_style( 'yith-wcwl-main' );
			}

			wp_dequeue_script( 'prettyPhoto' );
			wp_dequeue_script( 'prettyPhoto-init' );

			wp_dequeue_style( 'jquery-selectBox' );
			wp_dequeue_script( 'jquery-selectBox' );

			if ( ! class_exists( 'WC_Checkout_Add_Ons_Loader::class' ) ) {
				wp_dequeue_style( 'selectWoo' );
				wp_deregister_style( 'selectWoo' );
				wp_dequeue_script( 'selectWoo' );
				wp_deregister_script( 'selectWoo' );
			}

			wp_dequeue_script( 'vc_woocommerce-add-to-cart-js' );
			if ( ! is_checkout() ) {
				wp_dequeue_script( 'jquery-selectBox' );
				wp_dequeue_style( 'selectWoo' );
				wp_dequeue_script( 'selectWoo' );
			}
		}
	}
}

add_action( 'wp_enqueue_scripts', 'thb_woocommerce_scripts_styles', 10001 );
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

function thb_yith_wcwl_main_script_deps() {
	return array( 'jquery' );
}
add_filter( 'yith_wcwl_main_script_deps', 'thb_yith_wcwl_main_script_deps' );
