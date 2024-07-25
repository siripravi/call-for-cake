<?php
class Thb_Theme_Admin {
	/**
	 * Main instance
	 */
	private static $_instance;

	/**
	 * Theme Name
	 */
	public static $thb_theme_name;

	/**
	 * Theme Version
	 */
	public static $thb_theme_version;

	/**
	 * Theme Slug
	 */
	public static $thb_theme_slug;

	/**
	 * Theme Directory
	 */
	public static $thb_theme_directory;

	/**
	 * Theme Directory URL
	 */
	public static $thb_theme_directory_uri;

	/**
	 * Product Key
	 */
	public static $thb_product_key;

	/**
	 * Product Key Expiration
	 */
	public static $thb_product_key_expired;

	/**
	 * Theme Constructor executed only once per request
	 */
	public function __construct() {
		if ( self::$_instance ) {
			_doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '2.0' );
		}
	}

	/**
	 * You cannot clone this class
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '2.0' );
	}

	/**
	 * You cannot unserialize instances of this class
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '2.0' );
	}

	public static function instance() {
		global $thb_Theme_Admin;
		if ( ! self::$_instance ) {
			self::$_instance = new self();
			$thb_Theme_Admin = self::$_instance;

			// Theme Variables.
			$theme                         = wp_get_theme();
			self::$thb_theme_name          = $theme->get( 'Name' );
			self::$thb_theme_version       = $theme->parent() ? $theme->parent()->get( 'Version' ) : $theme->get( 'Version' );
			self::$thb_theme_slug          = $theme->template;
			self::$thb_theme_directory     = get_template_directory() . '/';
			self::$thb_theme_directory_uri = get_template_directory_uri() . '/';

			self::$thb_product_key         = get_option( 'thb_' . self::$thb_theme_slug . '_key' );
			self::$thb_product_key_expired = get_option( 'thb_' . self::$thb_theme_slug . '_key_expired' );

			// After Setup Theme.
			add_action( 'after_setup_theme', array( self::$_instance, 'thb_after_setup_theme' ) );

			// Setup Admin Menus.
			if ( is_admin() ) {
				self::$_instance->thb_init_admin_pages();
			}
		}

		return self::$_instance;
	}
	/**
	 * After Theme Setup
	 */
	public function thb_after_setup_theme() {

		// WooCommerce Support.
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		if ( ot_get_option( 'shop_product_lightbox', 'lightbox' ) === 'zoom' ) {
			add_theme_support( 'wc-product-gallery-zoom' );
		}

		// Catalog Mode.
		if ( 'on' === ot_get_option( 'shop_catalog_mode', 'off' ) ) {
			remove_action( 'before_woocommerce_init', 'thb_different_add_to_cart', 15 );
			remove_action( 'woocommerce_after_shop_loop_item_title_loop_price', 'woocommerce_template_loop_price', 10 );
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
		}

		// Gutenberg.
		add_theme_support( 'align-wide' );
		add_theme_support( 'align-full' );
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Accent Color', 'peakshops' ),
					'slug'  => 'thb-accent',
					'color' => ot_get_option( 'accent_color', '#bfab80' ),
				),
			)
		);

		// WooCommerce Products per Page.
		add_filter( 'loop_shop_per_page', 'thb_shops_per_page', 20 );

		function thb_shops_per_page( $products_per_page ) {
			$products_per_page_get = filter_input( INPUT_GET, 'products_per_page', FILTER_VALIDATE_INT );
			$products_per_page     = isset( $products_per_page_get ) ? $products_per_page_get : ot_get_option( 'products_per_page' );
			return $products_per_page;
		}

		// Post Formats.
		add_theme_support( 'post-formats', array( 'gallery', 'video' ) );

		// Text Domain.
		load_theme_textdomain( 'peakshops', get_stylesheet_directory() . '/inc/languages' );

		// Background Support.
		add_theme_support( 'custom-background' );

		// Title Support.
		add_theme_support( 'title-tag' );

		// Required Settings.
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1170;
		}
		add_theme_support( 'automatic-feed-links' );

		// Editor Styling.
		add_theme_support( 'editor-styles' );
		add_editor_style( array( 'assets/css/editor-style.css' ) );

		// Image Settings.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 180, 180, true );

		$thb_image_sizes = self::$_instance->thb_image_sizes();

		// Register image size
		foreach ( $thb_image_sizes as $image_size ) {
			add_image_size( $image_size['slug'], $image_size['width'], $image_size['height'], $image_size['crop'] );
		}

		// HTML5 Galleries.
		add_theme_support( 'html5', array( 'comment-list', 'gallery', 'caption' ) );

		// Register Menu.
		add_theme_support( 'nav-menus' );
		register_nav_menus(
			array(
				'nav-menu'              => esc_html__( 'Navigation Menu', 'peakshops' ),
				'secondary-menu'        => esc_html__( 'Secondary Menu', 'peakshops' ),
				'mobile-secondary-menu' => esc_html__( 'Mobile Menu - Secondary Menu', 'peakshops' ),
			)
		);

		// Sidebars.
		$thb_sidebar_defaults = array(
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="thb-widget-title">',
			'after_title'   => '</div>',
		);

		$thb_sidebars = array(
			array(
				'name'        => esc_html__( 'Article Sidebar', 'peakshops' ),
				'id'          => 'single',
				'description' => esc_html__( 'The sidebar next to articles', 'peakshops' ),
			),
			array(
				'name'        => esc_html__( 'Author Sidebar', 'peakshops' ),
				'id'          => 'author',
				'description' => esc_html__( 'The sidebar on author pages', 'peakshops' ),
			),
			array(
				'name'        => esc_html__( 'Archive Sidebar', 'peakshops' ),
				'id'          => 'archive',
				'description' => esc_html__( 'The sidebar on archive pages', 'peakshops' ),
			),
			array(
				'name'        => esc_html__( 'Category Sidebar', 'peakshops' ),
				'id'          => 'category',
				'description' => esc_html__( 'The sidebar on category page. You can assign different categories inside Edit Category page.', 'peakshops' ),
			),
			array(
				'name'        => esc_html__( 'Tag Sidebar', 'peakshops' ),
				'id'          => 'tag',
				'description' => esc_html__( 'The sidebar on tag pages', 'peakshops' ),
			),
			array(
				'name'        => esc_html__( 'Search Sidebar', 'peakshops' ),
				'id'          => 'search',
				'description' => esc_html__( 'The sidebar on search result pages', 'peakshops' ),
			),
			array(
				'name'        => esc_html__( 'Page Sidebar', 'peakshops' ),
				'id'          => 'page',
				'description' => esc_html__( 'The sidebar for the default page layouts', 'peakshops' ),
			),
			array(
				'name'        => esc_html__( 'Mobile Menu Sidebar', 'peakshops' ),
				'id'          => 'mobile-menu',
				'description' => esc_html__( 'You can also add widgets inside your mobile menu.', 'peakshops' ),
			),
		);
		for ( $x = 1; $x <= 6; $x++ ) {
			$thb_sidebars[] = array(
				'name'        => esc_html__( 'Footer Column - ', 'peakshops' ) . $x,
				'id'          => 'footer' . $x,
				'description' => esc_html__( 'Contents of the column #', 'peakshops' ) . $x,
			);
		}

		// Shop Sidebar
		if ( thb_wc_supported() ) {
			array_unshift(
				$thb_sidebars,
				array(
					'name'        => esc_html__( 'Product Sidebar', 'peakshops' ),
					'id'          => 'thb-shop-product',
					'description' => esc_html__( 'Sidebar shown inside Product pages.', 'peakshops' ),
				)
			);
			array_unshift(
				$thb_sidebars,
				array(
					'name'        => esc_html__( 'Shop Sidebar', 'peakshops' ),
					'id'          => 'thb-shop-filters',
					'description' => esc_html__( 'Sidebar used for filters on the Shop page', 'peakshops' ),
				)
			);

		}
		// Register Sidebars
		foreach ( $thb_sidebars as $sidebar ) {
			register_sidebar( array_merge( $sidebar, $thb_sidebar_defaults ) );
		}

		/* Sidebars created in Theme Options */
		$option_sidebars = ot_get_option( 'sidebars' );
		if ( ! empty( $option_sidebars ) ) {
			foreach ( $option_sidebars as $sidebar ) {
				$the_sidebar = array(
					'name' => $sidebar['title'],
					'id'   => $sidebar['id'],
				);
				register_sidebar( array_merge( $the_sidebar, $thb_sidebar_defaults ) );
			}
		}
		function thb_remove_recent_comments_style() {
			global $wp_widget_factory;
			if ( array_key_exists( 'WP_Widget_Recent_Comments', $wp_widget_factory->widgets ) ) {
				remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
			}
		}
		add_action( 'widgets_init', 'thb_remove_recent_comments_style' );
	}
	public function thb_image_sizes() {
		$thb_image_sizes = apply_filters(
			'thb_image_sizes_filter',
			array(
				array(
					'slug'   => 'peakshops-rectangle',
					'width'  => 370,
					'height' => 240,
					'crop'   => true,
				),
				array(
					'slug'   => 'peakshops-rectanglesmall',
					'width'  => 400,
					'height' => 200,
					'crop'   => true,
				),
				array(
					'slug'   => 'peakshops-single',
					'width'  => 855,
					'height' => 500,
					'crop'   => true,
				),
				array(
					'slug'   => 'peakshops-full',
					'width'  => 855,
					'height' => 9999,
					'crop'   => false,
				),
			)
		);

		function thb_calculate_image_orientation( $thb_image_sizes ) {
			if ( ! is_array( $thb_image_sizes ) ) {
				return;
			}
			$new_sizes = array();
			foreach ( $thb_image_sizes as $image_size ) {
				$new_sizes[] = array(
					'slug'   => $image_size['slug'] . '-mini',
					'width'  => 20,
					'height' => 9999 === $image_size['height'] ? 9999 : absint( ( $image_size['height'] * 20 ) / $image_size['width'] ),
					'crop'   => $image_size['crop'],
				);
				$new_sizes[] = array(
					'slug'   => $image_size['slug'] . '-mobile',
					'width'  => 290,
					'height' => 9999 === $image_size['height'] ? 9999 : absint( ( $image_size['height'] * 290 ) / $image_size['width'] ),
					'crop'   => $image_size['crop'],
				);
				$new_sizes[] = array(
					'slug'   => $image_size['slug'] . '-x2',
					'width'  => $image_size['width'] * 2,
					'height' => 9999 === $image_size['height'] ? 9999 : $image_size['height'] * 2,
					'crop'   => $image_size['crop'],
				);

			}
			return $new_sizes;
		}
		$new_sizes = thb_calculate_image_orientation( $thb_image_sizes );
		foreach ( $new_sizes as $new_size ) {
			$thb_image_sizes[] = $new_size;
		}
		return $thb_image_sizes;
	}
	public function thb_demos() {
		return array(
			array(
				'import_file_name'         => 'Peak Shops',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/peakshops/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/peakshops/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/peakshops/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demos/homepages/peakshops.jpg',
				'import_demo_url'          => 'https://peakshops.fuelthemes.net/',
			),
			array(
				'import_file_name'         => 'Baby Store',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/babystore/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/babystore/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/babystore/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demos/homepages/babystore.jpg',
				'import_demo_url'          => 'https://peakshops.fuelthemes.net/peakshops-babystore',
			),
			array(
				'import_file_name'         => 'Beauty',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/beauty/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/beauty/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/beauty/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demos/homepages/beauty.jpg',
				'import_demo_url'          => 'https://peakshops.fuelthemes.net/peakshops-beauty',
			),
			array(
				'import_file_name'         => 'Super Store',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/superstore/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/superstore/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/superstore/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demos/homepages/superstore.jpg',
				'import_demo_url'          => 'https://peakshops.fuelthemes.net/peakshops-superstore',
			),
			array(
				'import_file_name'         => 'Active Wear',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/activewear/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/activewear/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/activewear/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demos/homepages/activewear.jpg',
				'import_demo_url'          => 'https://peakshops.fuelthemes.net/peakshops-activewear',
			),
			array(
				'import_file_name'         => 'Furniture',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/furniture/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/furniture/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/furniture/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demos/homepages/furniture.jpg',
				'import_demo_url'          => 'https://peakshops.fuelthemes.net/peakshops-furniture',
			),
			array(
				'import_file_name'         => 'Garage',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/garage/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/garage/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/garage/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demos/homepages/garage.jpg',
				'import_demo_url'          => 'https://peakshops.fuelthemes.net/peakshops-garage',
			),
			array(
				'import_file_name'         => 'Jewelery',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/jewelery/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/jewelery/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/jewelery/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demos/homepages/jewelery.jpg',
				'import_demo_url'          => 'https://peakshops.fuelthemes.net/peakshops-jewelery',
			),
			array(
				'import_file_name'         => 'Winery',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/winery/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/winery/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/winery/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demos/homepages/winery.jpg',
				'import_demo_url'          => 'https://peakshops.fuelthemes.net/peakshops-winery',
			),
			array(
				'import_file_name'         => 'Pandora',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/pandora/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/pandora/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/pandora/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demos/homepages/pandora.jpg',
				'import_demo_url'          => 'https://peakshops.fuelthemes.net/peakshops-pandora',
			),
			array(
				'import_file_name'         => 'Organic Market',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/organicmarket/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/organicmarket/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/organicmarket/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demos/homepages/organicmarket.jpg',
				'import_demo_url'          => 'https://peakshops.fuelthemes.net/peakshops-organicmarket',
			),
			array(
				'import_file_name'         => 'PPE',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/ppe/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/ppe/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/ppe/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demos/homepages/ppe.jpg',
				'import_demo_url'          => 'https://peakshops.fuelthemes.net/peakshops-ppe',
			),
			array(
				'import_file_name'         => 'Bakery',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/bakery/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/bakery/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/peakshops/bakery/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demos/homepages/bakery.jpg',
				'import_demo_url'          => 'https://peakshops.fuelthemes.net/peakshops-bakery',
			),
		);
	}
	/**
	 * Inintialize Admin Pages
	 */
	public function thb_init_admin_pages() {
		global $pagenow;

		// Script and styles
		add_action( 'admin_enqueue_scripts', array( & $this, 'thb_admin_page_enqueue' ) );

		// Menu Pages
		add_action( 'admin_menu', array( & $this, 'thb_admin_setup_menu' ), 1 );

		// Theme Options Redirect
		if ( $pagenow ) {
			$get_page = filter_input( INPUT_GET, 'page', FILTER_SANITIZE_STRING );
			if ( 'admin.php' === $pagenow && isset( $get_page ) && 'thb-theme-options' === wp_unslash( $get_page ) ) {
				if ( ! ( defined( 'WP_CLI' ) && WP_CLI ) ) {
					wp_safe_redirect( admin_url( 'themes.php?page=ot-theme-options' ) );
					exit();
				}
			}
		}
		// Redirect to Main Page
		add_action( 'after_switch_theme', array( & $this, 'thb_activation_redirect' ) );

		// Ajax Option Update
		add_action( 'wp_ajax_thb_update_options', array( & $this, 'thb_update_options' ) );
		add_action( 'wp_ajax_nopriv_thb_update_options', array( & $this, 'thb_update_options' ) );

		// Admin Notices
		add_action( 'admin_notices', array( & $this, 'thb_admin_notices' ) );

		// Theme Updates
		add_action( 'admin_init', array( & $this, 'thb_theme_update' ) );

		// Plugin Update Nonce
		add_action( 'register_sidebar', array( & $this, 'thb_theme_admin_init' ) );

	}
	public function thb_admin_notices() {
		$remote_ver = get_option( 'thb_' . self::$thb_theme_slug . '_remote_ver' ) ? get_option( 'thb_' . self::$thb_theme_slug . '_remote_ver' ) : self::$thb_theme_version;
		$local_ver  = self::$thb_theme_version;

		if ( version_compare( $local_ver, $remote_ver, '<' ) ) {
			if (
				( ! self::$thb_product_key && ( 0 === self::$thb_product_key_expired ) ) ||
				( self::$thb_product_key && ( 1 === self::$thb_product_key_expired ) )
			) {
				echo '<div class="notice is-dismissible error thb_admin_notices">
				<p>There is an update available for the <strong>' . esc_html( self::$thb_theme_name ) . '</strong> theme. Go to <a href="' . esc_url( admin_url( 'admin.php?page=thb-product-registration' ) ) . '">Product Registration</a> to enable theme updates.</p>
				</div>';
			}

			if ( ( self::$thb_product_key && ( 0 === self::$thb_product_key_expired ) ) ) {
				echo '<div class="notice is-dismissible error thb_admin_notices">
				<p>There is an update available for the <strong>' . esc_html( self::$thb_theme_name ) . '</strong> theme. <a href="' . esc_url( admin_url() ) . 'update-core.php">Update now</a>.</p>
				</div>';
			}
		}
	}
	public function thb_update_options() {
		check_ajax_referer( 'thb_register_ajax', 'security' );
		$key     = filter_input( INPUT_POST, 'key', FILTER_SANITIZE_STRING );
		$expired = filter_input( INPUT_POST, 'expired', FILTER_VALIDATE_BOOLEAN );
		update_option( 'thb_' . self::$thb_theme_slug . '_key', $key );
		update_option( 'thb_' . self::$thb_theme_slug . '_key_expired', $expired );
		wp_die();
	}
	public function thb_theme_update() {
		add_filter( 'pre_set_site_transient_update_themes', array( & $this, 'thb_check_for_update_theme' ) );
		add_filter( 'upgrader_pre_download', array( $this, 'thb_upgrade_filter' ), 10, 4 );
	}
	public function thb_check_for_update_plugins() {
		$name = 'thb_' . self::$thb_theme_slug . '_plugin_transient';
		$data = get_transient( $name );
		if ( ! $data ) {
			$args = array(
				'timeout' => 30,
				'body'    => array(
					'item_ids'    => '242431',
					'product_key' => self::$thb_product_key,
				),
			);

			$request = wp_remote_get( self::$_instance->thb_dashboard_url( 'plugin/version' ), $args );

			$data = '';
			if ( ! is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) === 200 ) {
				$data = json_decode( wp_remote_retrieve_body( $request ) );
			}
			set_transient( $name, $data, 6 * HOUR_IN_SECONDS );
		}
		return $data;
	}
	public function thb_check_for_update_theme( $transient ) {
		$args = array(
			'timeout' => 30,
			'body'    => array(
				'theme_name'  => self::$thb_theme_name,
				'product_key' => self::$thb_product_key,
			),
		);

		$request = wp_remote_get( self::$_instance->thb_dashboard_url( 'version' ), $args );

		if ( ! is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) === 200 ) {
			$data = json_decode( wp_remote_retrieve_body( $request ) );
			update_option( 'thb_' . self::$thb_theme_slug . '_key_expired', 0 );

			if ( isset( $data->success ) && false === $data->success ) {
				self::$thb_product_key_expired = 1;
				update_option( 'thb_' . self::$thb_theme_slug . '_key_expired', 1 );
			} else {
				if ( version_compare( self::$thb_theme_version, $data->version, '<' ) ) {
					$transient->response[ self::$thb_theme_slug ] = array(
						'new_version' => $data->version,
						'package'     => $data->download_url,
						'url'         => 'https://fuelthemes.net',
					);

					update_option( 'thb_' . self::$thb_theme_slug . '_remote_ver', $data->version );
				}
			}
		}
		return $transient;
	}
	public function thb_upgrade_filter( $reply, $package, $updater ) {
		$cond = ( ! self::$thb_product_key || ( 1 === self::$thb_product_key_expired ) );

		if ( isset( $updater->skin->theme_info ) && $updater->skin->theme_info['Name'] === self::$thb_theme_name ) {
			if ( $cond ) {
				return new WP_Error( 'no_credentials', sprintf( __( 'To receive automatic updates, registration is required. Please visit <a href="%1$s" target="_blank">Product Registration</a> to activate your theme.', 'peakshops' ), esc_url( admin_url( 'admin.php?page=thb-product-registration' ) ) ) );
			}
		}

		// VisualComposer
		if ( ( isset( $updater->skin->plugin ) ) && ( 'js_composer/js_composer.php' === $updater->skin->plugin ) ) {
			if ( $cond ) {
				return new WP_Error( 'no_credentials', sprintf( __( 'To receive automatic updates, registration is required. Please visit <a href="%1$s" target="_blank">Product Registration</a> to activate your theme.', 'peakshops' ), esc_url( admin_url( 'admin.php?page=thb-product-registration' ) ) ) );
			}
		}
		return $reply;
	}
	public function thb_plugins_install( $item ) {
		if ( ! function_exists( 'get_plugins' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}
		$installed_plugins = get_plugins();

		$item['sanitized_plugin'] = $item['name'];

		// WordPress Repository
		if ( ! $item['version'] ) {
			$item['version'] = TGM_Plugin_Activation::$instance->does_plugin_have_update( $item['slug'] );
		}

		// Install Link
		if ( ! isset( $installed_plugins[ $item['file_path'] ] ) ) {
			$actions = array(
				'install' => sprintf(
					'<a href="%1$s" class="button" title="Install %2$s">Install Now</a>',
					esc_url(
						wp_nonce_url(
							add_query_arg(
								array(
									'page'          => urlencode( TGM_Plugin_Activation::$instance->menu ),
									'plugin'        => urlencode( $item['slug'] ),
									'plugin_name'   => urlencode( $item['sanitized_plugin'] ),
									'tgmpa-install' => 'install-plugin',
									'return_url'    => network_admin_url( 'admin.php?page=thb-plugins' ),
								),
								TGM_Plugin_Activation::$instance->get_tgmpa_url()
							),
							'tgmpa-install',
							'tgmpa-nonce'
						)
					),
					$item['sanitized_plugin']
				),
			);
		}
		// Activate Link
		elseif ( is_plugin_inactive( $item['file_path'] ) ) {
			$actions = array(
				'activate' => sprintf(
					'<a href="%1$s" class="button button-primary" title="Activate %2$s">Activate</a>',
					esc_url(
						add_query_arg(
							array(
								'plugin'             => urlencode( $item['slug'] ),
								'plugin_name'        => urlencode( $item['sanitized_plugin'] ),
								'thb-activate'       => 'activate-plugin',
								'thb-activate-nonce' => wp_create_nonce( 'thb-activate' ),
								'return_url'         => network_admin_url( 'admin.php?page=thb-plugins' ),
							),
							admin_url( 'admin.php?page=thb-plugins' )
						)
					),
					$item['sanitized_plugin']
				),
			);
		}
		// Update Link

		elseif ( version_compare( $installed_plugins[ $item['file_path'] ]['Version'], $item['version'], '<' ) ) {
			$actions = array(
				'update' => sprintf(
					'<a href="%1$s" class="button button-update" title="Install %2$s"><span class="dashicons dashicons-update"></span> Update</a>',
					wp_nonce_url(
						add_query_arg(
							array(
								'page'         => urlencode( TGM_Plugin_Activation::$instance->menu ),
								'plugin'       => urlencode( $item['slug'] ),
								'tgmpa-update' => 'update-plugin',
								'version'      => urlencode( $item['version'] ),
								'return_url'   => network_admin_url( 'admin.php?page=thb-plugins' ),
							),
							TGM_Plugin_Activation::$instance->get_tgmpa_url()
						),
						'tgmpa-update',
						'tgmpa-nonce'
					),
					$item['sanitized_plugin']
				),
			);
		} elseif ( self::$_instance->thb_ispluginactive( $item['file_path'] ) ) {
			$actions = array(
				'deactivate' => sprintf(
					'<a href="%1$s" class="button" title="Deactivate %2$s">Deactivate</a>',
					esc_url(
						add_query_arg(
							array(
								'plugin'               => urlencode( $item['slug'] ),
								'plugin_name'          => urlencode( $item['sanitized_plugin'] ),
								'thb-deactivate'       => 'deactivate-plugin',
								'thb-deactivate-nonce' => wp_create_nonce( 'thb-deactivate' ),
							),
							admin_url( 'admin.php?page=thb-plugins' )
						)
					),
					$item['sanitized_plugin']
				),
			);
		}

		return $actions;
	}
	public function thb_theme_admin_init() {
		$get_name       = filter_input( INPUT_GET, 'plugin_name', FILTER_SANITIZE_STRING );
		$get_deactivate = filter_input( INPUT_GET, 'thb-deactivate', FILTER_SANITIZE_STRING );
		$get_activate   = filter_input( INPUT_GET, 'thb-activate', FILTER_SANITIZE_STRING );

		if ( isset( $get_deactivate ) && 'deactivate-plugin' === $get_deactivate ) {

			check_admin_referer( 'thb-deactivate', 'thb-deactivate-nonce' );

			if ( ! function_exists( 'get_plugins' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}

			$plugins = get_plugins();

			foreach ( $plugins as $plugin_name => $plugin ) {
				if ( $plugin['Name'] === $get_name ) {
						deactivate_plugins( $plugin_name );
				}
			}
		}

		if ( isset( $get_activate ) && 'activate-plugin' === $get_activate ) {

			check_admin_referer( 'thb-activate', 'thb-activate-nonce' );

			if ( ! function_exists( 'get_plugins' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}

			$plugins = get_plugins();

			foreach ( $plugins as $plugin_name => $plugin ) {
				if ( $plugin['Name'] === $get_name ) {
					activate_plugin( $plugin_name );
				}
			}
		}

	}
	public function thb_activation_redirect() {
		if ( ! ( defined( 'WP_CLI' ) && WP_CLI ) ) {
			$peakshops_installed = 'peakshops_installed';

			if ( false === get_option( $peakshops_installed, false ) ) {
				update_option( $peakshops_installed, true );
				wp_safe_redirect( admin_url( 'admin.php?page=thb-product-registration' ) );
				exit();
			}

			delete_option( $peakshops_installed );
		}
	}
	public function thb_admin_page_enqueue( $hook_suffix ) {
		wp_enqueue_script( 'thb-admin-meta', self::$thb_theme_directory_uri . 'assets/js/admin-meta.min.js', array( 'jquery' ), esc_attr( self::$thb_theme_version ), true );

		wp_localize_script(
			'thb-admin-meta',
			'thb_admin',
			array(
				'i18n'           => array(
					'mediaTitle'  => esc_html__( 'Choose an image', 'peakshops' ),
					'mediaButton' => esc_html__( 'Use image', 'peakshops' ),
				),
				'wc_placeholder' => thb_wc_supported() ? wc_placeholder_img_src() : '',
			)
		);

		wp_enqueue_style( 'thb-admin-css', self::$thb_theme_directory_uri . 'assets/css/admin.css', null, esc_attr( self::$thb_theme_version ) );
		wp_enqueue_style( 'thb-admin-vs-css', self::$thb_theme_directory_uri . 'assets/css/admin_vc.css', null, esc_attr( self::$thb_theme_version ) );

		if ( class_exists( 'WPBakeryVisualComposerAbstract' ) ) {
			wp_enqueue_style( 'vc_extra_css', self::$thb_theme_directory_uri . 'assets/css/vc_extra.css', null, esc_attr( self::$thb_theme_version ) );
			wp_enqueue_script( 'thb-admin-vc', self::$thb_theme_directory_uri . 'assets/js/admin-vc.min.js', array( 'jquery' ), esc_attr( self::$thb_theme_version ), true );
		}
	}
	public function thb_admin_setup_menu() {

		// Product Registration
		add_menu_page( self::$thb_theme_name, self::$thb_theme_name, 'edit_theme_options', 'thb-product-registration', array( & $this, 'thb_product_registration' ), self::$thb_theme_directory_uri . 'assets/img/admin/fuelthemes-icon.svg', 3 );

		// Product Registration
		add_submenu_page( 'thb-product-registration', 'Registration', 'Registration', 'edit_theme_options', 'thb-product-registration', array( & $this, 'thb_product_registration' ) );

		// Main Menu Item
		add_submenu_page( 'thb-product-registration', 'Plugins', 'Plugins', 'edit_theme_options', 'thb-plugins', array( & $this, 'thb_plugins' ) );

		// Demo Import
		add_submenu_page( 'thb-product-registration', 'Demo Import', 'Demo Import', 'edit_theme_options', 'thb-demo-import', array( & $this, 'thb_demo_import' ) );

		// Theme Options
		add_submenu_page( 'thb-product-registration', 'Theme Options', 'Theme Options', 'edit_theme_options', 'thb-theme-options', '__return_false' );

	}
	public function thb_plugins() {
		get_template_part( 'inc/admin/welcome/pages/plugins' );
	}
	public function thb_product_registration() {
		get_template_part( 'inc/admin/welcome/pages/registration' );
	}
	public function thb_demo_import() {
		get_template_part( 'inc/admin/welcome/pages/demo-import' );
	}
	public function thb_ispluginactive( $value ) {
		$func = 'is_plugin' . '_active';
		return $func( $value );
	}
	/**
	 * Inintialize API
	 */
	public function thb_dashboard_url( $type = null ) {
		$url = 'https://my.fuelthemes.net';
		switch ( $type ) {
			case 'verify':
				$url .= '/api/verify';
				break;
			case 'verify-by-purchase':
				$url .= '/api/verify-by-purchase';
				break;
			case 'version':
				$url .= '/api/version';
				break;
			case 'plugin/version':
				$url .= '/api/plugin/version';
				break;
			case 'demo':
				$url .= '/api/demo';
				break;
		}
		return $url;
	}
}
// Main instance shortcut
function thb_Theme_Admin() {
	global $thb_Theme_Admin;
	return $thb_Theme_Admin;
}
Thb_Theme_Admin::instance();
