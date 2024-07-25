<?php

/**
 * @package Bootscore Child
 *
 * @version 6.0.0
 */


// Exit if accessed directly
defined('ABSPATH') || exit;


/**
 * Enqueue scripts and styles
 */
add_action('wp_enqueue_scripts', 'bootscore_child_enqueue_styles');
function bootscore_child_enqueue_styles() {

  // Compiled main.css
  $modified_bootscoreChildCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/assets/css/main.css'));
  wp_enqueue_style('main', get_stylesheet_directory_uri() . '/assets/css/main.css', array('parent-style'), $modified_bootscoreChildCss);

  // style.css
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
  
  // custom.js
  // Get modification time. Enqueue file with modification date to prevent browser from loading cached scripts when file content changes. 
  $modificated_CustomJS = date('YmdHi', filemtime(get_stylesheet_directory() . '/assets/js/custom.js'));
  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'), $modificated_CustomJS, false, true);
}
require_once('wp_bootstrap4-mega-navwalker.php');
register_nav_menus( array(
  'mega_menu'   => __( 'Mega Menu', 'your-theme' ),
  ) );
  //register MegaMenu widget if the Mega Menu is set as the menu location
$location = 'mega_menu';
$css_class = 'mega-menu-parent';
$locations = get_nav_menu_locations();
if ( isset( $locations[ $location ] ) ) {
  $menu = get_term( $locations[ $location ], 'nav_menu' );
  if ( $items = wp_get_nav_menu_items( $menu->name ) ) {
    foreach ( $items as $item ) {
      if ( in_array( $css_class, $item->classes ) ) {
        register_sidebar( array(
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
