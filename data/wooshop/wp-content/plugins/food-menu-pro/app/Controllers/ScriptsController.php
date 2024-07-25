<?php
/**
 * Scripts Class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Controllers;

use RT\FoodMenu\Helpers\Fns;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Scripts Class.
 */
class ScriptsController {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Styles.
	 *
	 * @var array
	 */
	private $styles = [];

	/**
	 * Scripts.
	 *
	 * @var array
	 */
	private $scripts = [];

	/**
	 * Class Init.
	 *
	 * @return void
	 */
	protected function init() {
		$this->get_assets();

		if ( empty( $this->styles ) && empty( $this->scripts ) ) {
			return;
		}

		$version = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? time() : FMP()->options['version'];

		wp_deregister_style( 'fm-frontend' );
		wp_deregister_script( 'fm-frontend' );

		foreach ( $this->styles as $style ) {
			wp_register_style( $style['handle'], $style['src'], '', $version );
		}

		foreach ( $this->scripts as $script ) {
			wp_register_script( $script['handle'], $script['src'], $script['deps'], $version, $script['footer'] );
		}

		\add_action( 'admin_enqueue_scripts', [ $this, 'admin_scripts' ] );
		\add_action( 'wp_enqueue_scripts', [ $this, 'frontend_script' ] );
	}

	/**
	 * Frontend scripts.
	 *
	 * @return void
	 */
	public function frontend_script() {
		\wp_enqueue_style( 'fmp-swiper' );
		\wp_enqueue_style( 'fmp-scrollbar' );
		\wp_enqueue_style( 'fmp-fontawsome' );
		\wp_enqueue_style( 'fmp-modal' );

		if ( is_rtl() ) {
			\wp_enqueue_style( 'fmp-rtl' );
		}

		\wp_enqueue_style( 'fm-frontend' );

		if ( is_single() && get_post_type() == TLPFoodMenu()->post_type ) {
			\wp_enqueue_script( 'fmp-image-load' );
			\wp_enqueue_script( 'fmp-swiper' );
			\wp_enqueue_script( 'fmp-single-food' );
		}
	}

	/**
	 * Admin scripts.
	 *
	 * @return void
	 */
	public function admin_scripts() {
		global $pagenow, $typenow;

		// validate page.
		if ( ! in_array( $pagenow, [ 'edit.php' ] ) ) {
			return;
		}

		if ( $typenow != TLPFoodMenu()->post_type ) {
			return;
		}

		\wp_enqueue_script(
			[
				'ace_code_highlighter_js',
				'ace_mode_js',
				'fmp-admin',
			]
		);

		\wp_enqueue_style(
			[
				'fmp-fontawsome',
				'fmp-admin',
			]
		);

		$nonce = wp_create_nonce( Fns::nonceText() );

		\wp_localize_script(
			'fmp-admin',
			'fmp_var',
			[
				'nonceID' => esc_attr( Fns::nonceId() ),
				'nonce'   => esc_attr( $nonce ),
				'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
			]
		);
	}

	/**
	 * Get all scripts.
	 *
	 * @return void
	 */
	private function get_assets() {
		$this
			->get_styles()
			->get_scripts();
	}

	/**
	 * Get styles.
	 *
	 * @return object
	 */
	private function get_styles() {
		$this->styles[] = [
			'handle' => 'fmp-fontawsome',
			'src'    => FMP()->assets_url() . 'vendor/font-awesome/css/font-awesome.min.css',
		];

		$this->styles[] = [
			'handle' => 'fmp-scrollbar',
			'src'    => FMP()->assets_url() . 'vendor/scrollbar/jquery.mCustomScrollbar.min.css',
		];

		$this->styles[] = [
			'handle' => 'fmp-swiper',
			'src'    => FMP()->assets_url() . 'vendor/swiper/swiper.min.css',
		];

		$this->styles[] = [
			'handle' => 'fmp-modal',
			'src'    => FMP()->assets_url() . 'vendor/jquery-modal/jquery.modal.min.css',
		];

		$this->styles[] = [
			'handle' => 'fm-frontend',
			'src'    => FMP()->assets_url() . 'css/foodmenu.min.css',
		];

		$this->styles[] = [
			'handle' => 'fmp-rtl',
			'src'    => FMP()->assets_url() . 'css/foodmenu-rtl.css',
		];

		/**
		 * Admin Styles.
		 */
		if ( is_admin() ) {
			$this->styles[] = [
				'handle' => 'fmp-admin',
				'src'    => FMP()->assets_url() . 'css/admin.min.css',
			];

			$this->styles[] = [
				'handle' => 'fmp-admin-preview',
				'src'    => FMP()->assets_url() . 'css/admin-preview.min.css',
			];
		}

		return $this;
	}

	/**
	 * Get scripts.
	 *
	 * @return object
	 */
	private function get_scripts() {
		$this->scripts[] = [
			'handle' => 'fmp-image-load',
			'src'    => FMP()->assets_url() . 'vendor/isotope/imagesloaded.pkgd.min.js',
			'deps'   => [ 'jquery' ],
			'footer' => true,
		];

		$this->scripts[] = [
			'handle' => 'fmp-isotope',
			'src'    => FMP()->assets_url() . 'vendor/isotope/isotope.pkgd.min.js',
			'deps'   => [ 'jquery' ],
			'footer' => false,
		];

		$this->scripts[] = [
			'handle' => 'fmp-jzoom',
			'src'    => FMP()->assets_url() . 'js/jzoom.min.js',
			'deps'   => [ 'jquery' ],
			'footer' => false,
		];

		$this->scripts[] = [
			'handle' => 'fmp-scrollbar',
			'src'    => FMP()->assets_url() . 'vendor/scrollbar/jquery.mCustomScrollbar.min.js',
			'deps'   => [ 'jquery' ],
			'footer' => false,
		];

		$this->scripts[] = [
			'handle' => 'fmp-swiper',
			'src'    => FMP()->assets_url() . 'vendor/swiper/swiper.min.js',
			'deps'   => [ 'jquery' ],
			'footer' => true,
		];

		$this->scripts[] = [
			'handle' => 'fmp-actual-height',
			'src'    => FMP()->assets_url() . 'vendor/actual-height/jquery.actual.min.js',
			'deps'   => [ 'jquery' ],
			'footer' => false,
		];

		$this->scripts[] = [
			'handle' => 'fmp-modal',
			'src'    => FMP()->assets_url() . 'vendor/jquery-modal/jquery.modal.min.js',
			'deps'   => [ 'jquery' ],
			'footer' => false,
		];

		$this->scripts[] = [
			'handle' => 'fmp-single-food',
			'src'    => FMP()->assets_url() . 'js/single-food.min.js',
			'deps'   => [ 'jquery' ],
			'footer' => true,
		];

		$this->scripts[] = [
			'handle' => 'fm-frontend',
			'src'    => FMP()->assets_url() . 'js/foodmenu.min.js',
			'deps'   => [ 'jquery', 'fmp-actual-height', 'imagesloaded' ],
			'footer' => true,
		];

		/**
		 * Admin Scripts.
		 */
		if ( is_admin() ) {
			$this->scripts[] = [
				'handle' => 'ace_code_highlighter_js',
				'src'    => FMP()->assets_url() . 'vendor/ace/ace.js',
				'deps'   => null,
				'footer' => false,
			];
			$this->scripts[] = [
				'handle' => 'ace_mode_js',
				'src'    => FMP()->assets_url() . 'vendor/ace/mode-css.js',
				'deps'   => [ 'ace_code_highlighter_js' ],
				'footer' => false,
			];
			$this->scripts[] = [
				'handle' => 'fmp-accounting',
				'src'    => FMP()->assets_url() . 'vendor/accounting/accounting.min.js',
				'deps'   => [ 'jquery' ],
				'footer' => true,
			];
			$this->scripts[] = [
				'handle' => 'fmp-admin-food',
				'src'    => FMP()->assets_url() . 'js/admin-food.min.js',
				'deps'   => [ 'jquery' ],
				'footer' => true,
			];
			$this->scripts[] = [
				'handle' => 'fmp-admin',
				'src'    => FMP()->assets_url() . 'js/admin.min.js',
				'deps'   => [ 'jquery' ],
				'footer' => true,
			];
			$this->scripts[] = [
				'handle' => 'fmp-admin-preview',
				'src'    => FMP()->assets_url() . 'js/admin-preview.min.js',
				'deps'   => [ 'jquery' ],
				'footer' => true,
			];
			$this->scripts[] = [
				'handle' => 'fmp-admin-sc',
				'src'    => FMP()->assets_url() . 'js/admin-sc.min.js',
				'deps'   => [ 'jquery' ],
				'footer' => true,
			];
			$this->scripts[] = [
				'handle' => 'fmp-admin-taxonomy',
				'src'    => FMP()->assets_url() . 'js/admin-taxonomy.min.js',
				'deps'   => [ 'jquery' ],
				'footer' => true,
			];
		}

		return $this;
	}
}
