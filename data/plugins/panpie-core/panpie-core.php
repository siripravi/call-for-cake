<?php
/*
Plugin Name: Panpie Core
Plugin URI: https://www.radiustheme.com
Description: Panpie Core Plugin for Panpie Theme
Version: 2.5
Author: RadiusTheme
Author URI: https://www.radiustheme.com
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'PANPIE_CORE' ) ) {
	define( 'PANPIE_CORE',                   ( WP_DEBUG ) ? time() : '1.0' );
	define( 'PANPIE_CORE_THEME_PREFIX',      'panpie' );
	define( 'PANPIE_CORE_THEME_PREFIX_VAR',  'panpie' );
	define( 'PANPIE_CORE_CPT_PREFIX',        'panpie' );
	define( 'PANPIE_CORE_BASE_DIR',      plugin_dir_path( __FILE__ ) );

}

class Panpie_Core {

	public $plugin  = 'panpie-core';
	public $action  = 'panpie_theme_init';

	public function __construct() {
		$prefix = PANPIE_CORE_THEME_PREFIX_VAR;

		add_action( 'plugins_loaded', array( $this, 'demo_importer' ), 15 );
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ), 16 );
		add_action( 'after_setup_theme', array( $this, 'post_meta' ), 15 );
		add_action( 'after_setup_theme', array( $this, 'elementor_widgets' ) );
		add_action( $this->action,       array( $this, 'after_theme_loaded' ) );
		add_shortcode('panpie-post-single-gallery', array( $this, 'panpie_post_single_gallery' ) );
		add_shortcode('panpie-single-event-info', array( $this, 'panpie_single_event_info' ) );

		// Redux Flash permalink after options changed
		add_action( "redux/options/{$prefix}/saved", array( $this, 'flush_redux_saved' ), 10, 2 );
		add_action( "redux/options/{$prefix}/section/reset", array( $this, 'flush_redux_reset' ) );
		add_action( "redux/options/{$prefix}/reset", array( $this, 'flush_redux_reset' ) );
		add_action( 'init', array( $this, 'rewrite_flush_check' ) );
		add_action( 'redux/loaded', array( $this, 'panpie_remove_demo') );

		require_once 'module/rt-post-share.php';
		require_once 'module/rt-post-views.php';
		require_once 'module/rt-post-length.php';

		// Widgets
		require_once 'widget/about-widget.php';
		require_once 'widget/address-widget.php';
		require_once 'widget/social-widget.php';
		require_once 'widget/rt-recent-post-widget.php';
		require_once 'widget/rt-post-box.php';
		require_once 'widget/rt-post-tab.php';
		require_once 'widget/rt-feature-post.php';
		require_once 'widget/rt-open-hour-widget.php';
		require_once 'widget/search-widget.php'; // override default
		require_once 'widget/rt-product-box.php';
		require_once 'widget/rt-calltoaction-widget.php';

		//

		require_once 'widget/widget-settings.php';
		require_once 'widget/rt-widget-fields.php';
		require_once 'lib/optimization/__init__.php';
	}

	/**
	 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
	*/

	public function panpie_remove_demo() {
		// Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
		if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
			remove_filter( 'plugin_row_meta', array(
				ReduxFrameworkPlugin::instance(),
				'plugin_metalinks'
				), null, 2 );

			// Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
			remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
		}
	}

	public function demo_importer() {
		require_once 'demo-importer.php';
	}
	public function load_textdomain() {
		load_plugin_textdomain( $this->plugin , false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
	public function post_meta(){
		if ( !did_action( $this->action ) || ! defined( 'RT_FRAMEWORK_VERSION' ) ) {
			return;
		}
		require_once 'post-meta.php';
		require_once 'post-types.php';
	}
	public function elementor_widgets(){
		if ( did_action( $this->action ) && did_action( 'elementor/loaded' ) ) {

			require_once 'elementor/init.php';
		}
	}
	public function after_theme_loaded() {
		require_once PANPIE_CORE_BASE_DIR . 'lib/wp-svg/init.php'; // SVG support
		require_once 'widget/sidebar-generator.php'; // sidebar widget generator
	}

	public function get_base_url(){

		$file = dirname( dirname(__FILE__) );

		// Get correct URL and path to wp-content
		$content_url = untrailingslashit( dirname( dirname( get_stylesheet_directory_uri() ) ) );
		$content_dir = untrailingslashit( WP_CONTENT_DIR );

		// Fix path on Windows
		$file = wp_normalize_path( $file );
		$content_dir = wp_normalize_path( $content_dir );

		$url = str_replace( $content_dir, $content_url, $file );

		return $url;

	}

	// Flush rewrites
	public function flush_redux_saved( $saved_options, $changed_options ){
		if ( empty( $changed_options ) ) {
			return;
		}
		$prefix = PANPIE_CORE_THEME_PREFIX_VAR;
		$flush  = false;

		if ( $flush ) {
			update_option( "{$prefix}_rewrite_flash", true );
		}
	}

	public function flush_redux_reset(){
		$prefix = PANPIE_CORE_THEME_PREFIX_VAR;
		update_option( "{$prefix}_rewrite_flash", true );
	}

	public function rewrite_flush_check() {
		$prefix = PANPIE_CORE_THEME_PREFIX_VAR;
		if ( get_option( "{$prefix}_rewrite_flash" ) == true ) {
			flush_rewrite_rules();
			update_option( "{$prefix}_rewrite_flash", false );
		}
	}

	/*Post Single Shortcode*/
	public function panpie_post_single_gallery() {
		ob_start();
		$panpie_post_gallerys_raw = get_post_meta( get_the_ID(), 'panpie_post_gallery', true );
		$panpie_post_gallerys = explode( "," , $panpie_post_gallerys_raw );
			if ( !empty( $panpie_post_gallerys ) ) { ?>
			<div class="rt-swiper-slider single-post-slider">
				<div class="rt-swiper-container" data-autoplay="false" data-autoplay-timeout="true" data-slides-per-view="1" data-centered-slides="true" data-space-between="30" data-r-x-small="1" data-r-small="1" data-r-medium="1" data-r-large="1" data-r-x-large="1">
					<div class="swiper-wrapper">
					<?php foreach( $panpie_post_gallerys as $panpie_post_gallery ) { ?>
					<div class="swiper-slide">
						<?php echo wp_get_attachment_image( $panpie_post_gallery, 'panpie-size2', "", array( "class" => "img-responsive" ) );
						?>
					</div>
					<?php } ?>
					</div>
					<div class="swiper-button">
						<div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
						<div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
					</div>
				</div>
			</div>
		<?php }
		return ob_get_clean();
	}

	/*Event Single Shortcode*/
	public function panpie_single_event_info() {
		ob_start();
		$panpie_event_title   	= get_post_meta( get_the_ID(), 'panpie_event_title', true );
		$panpie_event_text   	= get_post_meta( get_the_ID(), 'panpie_event_text', true );
		$panpie_event_address   = get_post_meta( get_the_ID(), 'panpie_event_address', true );
		$panpie_event_phone   	= get_post_meta( get_the_ID(), 'panpie_event_phone', true );
		$panpie_event_mail   	= get_post_meta( get_the_ID(), 'panpie_event_mail', true );
		$panpie_event_open   	= get_post_meta( get_the_ID(), 'panpie_event_open', true );

		$panpie_event_button   	= get_post_meta( get_the_ID(), 'panpie_event_button', true );
		$panpie_event_url   	= get_post_meta( get_the_ID(), 'panpie_event_url', true );
		?>

		<?php if ( ( PanpieTheme::$options['event_title'] )  && !empty( $panpie_event_title ) || ( PanpieTheme::$options['event_text'] )  && !empty( $panpie_event_text ) || ( PanpieTheme::$options['event_address'] ) && !empty( $panpie_event_address ) || ( PanpieTheme::$options['event_phone'] )  && !empty( $panpie_event_phone ) || ( PanpieTheme::$options['event_mail'] ) && !empty( $panpie_event_mail ) || ( PanpieTheme::$options['event_open'] ) && !empty ( $panpie_event_open ) ) { ?>
		<div class="rtin-event-wrap">
			<?php if ( ( PanpieTheme::$options['event_title'] ) && !empty( $panpie_event_title ) ) { ?>
			<h3><?php echo wp_kses_post( $panpie_event_title );?></h3>
			<?php } if ( ( PanpieTheme::$options['event_text'] ) && !empty( $panpie_event_text ) ) { ?>
				<p><?php echo esc_html( $panpie_event_text );?></p>
			<?php } ?>
			<ul class="rtin-event-info">
				<?php if ( ( PanpieTheme::$options['event_address'] ) && !empty( $panpie_event_address ) ) { ?>
				<li><i class="fas fa-map-marker-alt"></i><?php echo esc_html( $panpie_event_address );?></li>
				<?php } if ( ( PanpieTheme::$options['event_phone'] ) && !empty( $panpie_event_phone ) ) { ?>
				<li><i class="fas fa-phone-alt"></i><?php echo esc_html( $panpie_event_phone );?></li>
				<?php } if ( ( PanpieTheme::$options['event_mail'] ) && !empty( $panpie_event_mail ) ) { ?>
				<li><i class="far fa-envelope"></i><?php echo esc_html( $panpie_event_mail );?></li>
				<?php } if ( ( PanpieTheme::$options['event_open'] ) && !empty ( $panpie_event_open ) ) { ?>
				<li><i class="far fa-clock"></i><?php echo wp_kses_post( $panpie_event_open );?></li>
				<?php } ?>
			</ul>
			<?php if ( PanpieTheme::$options['event_button'] ) { ?>
			<?php if ( !empty ( $panpie_event_button ) || !empty ( $panpie_event_url ) ) { ?>
			<div class="single-event-button">
				<a href="<?php echo esc_url ( $panpie_event_url ); ?>" class="btn-fill-dark"><?php echo wp_kses( $panpie_event_button , 'alltext_allow' );?></a></div>
			<?php } } ?>
		</div>
		<?php }
		return ob_get_clean();
	}

}

new Panpie_Core;