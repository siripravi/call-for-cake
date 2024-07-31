<?php

/**
 * WooCommerce functions and definitions
 *
 * @package Bootscore
 * @version 6.0.0
 */


// Exit if accessed directly
defined('ABSPATH') || exit;


/**
 * Load required files
 */
require_once('inc/wc-breadcrumb.php');
require_once('inc/wc-enqueue.php');
require_once('inc/wc-forms.php');
require_once('inc/wc-loop.php');
require_once('inc/wc-mini-cart.php');
require_once('inc/wc-cart.php');
require_once('inc/wc-qty-btn.php'); 
require_once('inc/wc-redirects.php'); 
require_once('inc/wc-setup.php'); 
require_once('inc/wc-deprecated.php'); 

// Blocks
require_once('inc/blocks/wc-block-widget-categories.php'); 


/**
 * Register Ajax Cart
 *
 * Enabled/Disabled based on the setting in backend under WooCommerce > Settings > Products > Enable AJAX add to cart buttons on archives.
 * Disable file via filter add_filter('bootscore/load_ajax_cart', '__return_false');
 */
function bootscore_register_ajax_cart() {
  if (apply_filters('bootscore/load_ajax_cart', true)) {
    $ajax_cart_en = 'yes' === get_option('woocommerce_enable_ajax_add_to_cart');
    if ($ajax_cart_en) {
      require_once('inc/ajax-cart.php');
    }
  }
}
add_action('after_setup_theme', 'bootscore_register_ajax_cart');