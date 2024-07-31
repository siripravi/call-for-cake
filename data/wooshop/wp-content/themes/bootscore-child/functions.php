<?php

/**
 * @package Bootscore Child
 *
 * @version 6.0.0
 */


// Exit if accessed directly
defined('ABSPATH') || exit;
$bootchild_theme_data = wp_get_theme();
$action  = 'bootchild_theme_init';
//do_action($action);
define('BOOTCHILD_VERSION', (WP_DEBUG) ? time() : $bootchild_theme_data->get('Version'));
define('BOOTCHILD_AUTHOR_URI', $bootchild_theme_data->get('AuthorURI'));
define('BOOTCHILD_NAME', 'bootchild');

// DIR
define('BOOTCHILD_BASE_DIR',    get_stylesheet_directory() . '/');
//define('BOOTCHILD_INC_DIR',     BOOTCHILD_BASE_DIR . 'inc/');
//define('BOOTCHILD_VIEW_DIR',    BOOTCHILD_INC_DIR . 'views/');
define('BOOTCHILD_LIB_DIR',     BOOTCHILD_BASE_DIR . 'lib/');
//define('BOOTCHILD_WID_DIR',     BOOTCHILD_INC_DIR . 'widgets/');
//define('BOOTCHILD_PLUGINS_DIR', BOOTCHILD_INC_DIR . 'plugins/');
//define('BOOTCHILD_MODULES_DIR', BOOTCHILD_INC_DIR . 'modules/');
define('BOOTCHILD_ASSETS_DIR',  BOOTCHILD_BASE_DIR . 'assets/');
define('BOOTCHILD_CSS_DIR',     BOOTCHILD_ASSETS_DIR . 'css/');
define('BOOTCHILD_JS_DIR',      BOOTCHILD_ASSETS_DIR . 'js/');

// URL
define('BOOTCHILD_BASE_URL',    get_stylesheet_directory_uri() . '/');
define('BOOTCHILD_ASSETS_URL',  BOOTCHILD_BASE_URL . 'assets/');
define('BOOTCHILD_CSS_URL',     BOOTCHILD_ASSETS_URL . 'css/');
define('BOOTCHILD_JS_URL',      BOOTCHILD_ASSETS_URL . 'js/');
define('BOOTCHILD_IMG_URL',     BOOTCHILD_ASSETS_URL . 'img/');
define('BOOTCHILD_LIB_URL',     BOOTCHILD_BASE_URL . 'lib/');

//Other Plugins active or not
define('BOOTCHILD_BBPRESS_IS_ACTIVE', class_exists('bbPress'));
// icon trait Plugin Activation

//require_once BOOTCHILD_INC_DIR . 'icon-trait.php';
// Includes
//require_once BOOTCHILD_INC_DIR . 'helper-functions.php';
//require_once BOOTCHILD_INC_DIR . 'bootchild.php';
//require_once BOOTCHILD_INC_DIR . 'general.php';
//require_once BOOTCHILD_INC_DIR . 'scripts.php';
//require_once BOOTCHILD_INC_DIR . 'template-vars.php';
//require_once BOOTCHILD_INC_DIR . 'includes.php';
//require_once BOOTCHILD_INC_DIR . 'lc-helper.php';
//require_once BOOTCHILD_INC_DIR . 'lc-utility.php';

// Includes Modules
//require_once BOOTCHILD_MODULES_DIR . 'rt-post-related.php';
//require_once BOOTCHILD_MODULES_DIR . 'rt-gallery-related.php';
//require_once BOOTCHILD_MODULES_DIR . 'rt-event-related.php';
//require_once BOOTCHILD_MODULES_DIR . 'rt-team-related.php';
//require_once BOOTCHILD_MODULES_DIR . 'rt-breadcrumbs.php';

// WooCommerce
if (class_exists('WooCommerce')) {
  //require_once BOOTCHILD_INC_DIR . 'woo-functions.php';
 // require_once BOOTCHILD_INC_DIR . 'woo-hooks.php';
}

// TGM Plugin Activation
//require_once BOOTCHILD_LIB_DIR . 'class-tgm-plugin-activation.php';
//require_once BOOTCHILD_INC_DIR . 'tgm-config.php';

add_editor_style('style-editor.css');

// Update Breadcrumb Separator
//add_action('bcn_after_fill', 'bootchild_hseparator_breadcrumb_trail', 1);
function bootchild_hseparator_breadcrumb_trail($object)
{
  $object->opt['hseparator'] = '<span class="dvdr"> - </span>';
  return $object;
}


/**
 * Enqueue scripts and styles
 */
add_action('wp_enqueue_scripts', 'bootscore_child_enqueue_styles');
function bootscore_child_enqueue_styles()
{

  // Compiled main.css
  $modified_bootscoreChildCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/assets/css/main.css'));
  wp_enqueue_style('main', get_stylesheet_directory_uri() . '/assets/css/main.css', array('parent-style'), $modified_bootscoreChildCss);

  // wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom.css');

  wp_enqueue_style('bootchild-gfonts-css', 'http://fonts.googleapis.com/css?family=Roboto%3A500%2C700%2C400%7CBarlow%3A600%2C700%2C600&amp;subset=latin&amp;display=fallback&amp;ver=3.1.4');
  // wp_enqueue_style('bootstrap-cs', get_template_directory_uri() . '/assets/css/slicknav.min.css');
  wp_enqueue_style('flaticon-bootchild-css', get_stylesheet_directory_uri() . '/assets/fonts/flaticon-bootchild/flaticon.css');
  wp_enqueue_style('magnific-popup-csse', get_stylesheet_directory_uri() . '/assets/css/magnific-popup.css');
  wp_enqueue_style('font-awesome-css', get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css');
  wp_enqueue_style('animate-css', get_stylesheet_directory_uri() . '/assets/css/animate.min.css');
  wp_enqueue_style('select2-csse', get_stylesheet_directory_uri() . '/assets/css/select2.min.css');
  wp_enqueue_style('bootchild-default-css', get_stylesheet_directory_uri() . '/assets/css/default.css');
  wp_enqueue_style('bootchild-elementor-css', get_stylesheet_directory_uri() . '/assets/css/elementor.css');
  wp_enqueue_style('bootchild-style-css', get_stylesheet_directory_uri() . '/assets/css/style.css');
  //wp_enqueue_style('parent-style', get_stylesheet_directory_uri() . '/style.css');
  // custom.js
  // Get modification time. Enqueue file with modification date to prevent browser from loading cached scripts when file content changes. 
  $modificated_CustomJS = date('YmdHi', filemtime(get_stylesheet_directory() . '/assets/js/custom.js'));
  wp_enqueue_script('nice-select-js', get_stylesheet_directory_uri() . '/assets/js/jquery.nice-select.min.js', array('jquery'), $modificated_CustomJS, false, true);
  wp_enqueue_script('barfiller-js', get_stylesheet_directory_uri() . '/assets/js/jquery.barfiller.js', array('jquery'), $modificated_CustomJS, false, true);
  wp_enqueue_script('magnific-popup-js', get_stylesheet_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), $modificated_CustomJS, false, true);
  wp_enqueue_script('slicknav-js', get_stylesheet_directory_uri() . '/assets/js/jquery.slicknav.js', array('jquery'), $modificated_CustomJS, false, true);
  wp_enqueue_script('owl-carousel-js', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), $modificated_CustomJS, false, true);
  wp_enqueue_script('nicescroll-js', get_stylesheet_directory_uri() . '/assets/js/jquery.nicescroll.min.js', array('jquery'), $modificated_CustomJS, false, true);
  wp_enqueue_script('nicescroll-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), $modificated_CustomJS, false, true);

}
require_once('wp_bootstrap4-mega-navwalker.php');
register_nav_menus(array(
  'mega_menu'   => __('Mega Menu', 'your-theme'),
));
//register MegaMenu widget if the Mega Menu is set as the menu location
$location = 'mega_menu';
$css_class = 'mega-menu-parent';
$locations = get_nav_menu_locations();
if (isset($locations[$location])) {
  $menu = get_term($locations[$location], 'nav_menu');
  if ($items = wp_get_nav_menu_items($menu->name)) {
    foreach ($items as $item) {
      if (in_array($css_class, $item->classes)) {
        register_sidebar(array(
          'id'   => 'mega-menu-item-' . $item->ID,
          'description' => 'Mega Menu items',
          'name' => $item->title . ' - Mega Menu',
          'before_widget' => '<li id="%1$s" class="mega-menu-item">',
          'after_widget' => '</li>',

        ));
      }
    }
  }
}
//require_once('inc/breadcrumb.php');              // Breadcrumb
