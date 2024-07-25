<?php
update_option( sprintf( 'thb_%s_key', get_option( 'template' ) ), 'activated' );
update_option( sprintf( 'thb_%s_key_expired', get_option( 'template' ) ), 0 );

// Option-Tree Theme Mode.
require get_theme_file_path( '/inc/admin/option-tree/init.php' );

// Theme Admin.
require get_theme_file_path( '/inc/admin/welcome/class-thb-theme-admin.php' );

// Imports.
require get_theme_file_path( '/inc/admin/imports/import.php' );

// TGM Plugin Activation Class.
require get_theme_file_path( '/inc/admin/plugins/plugins.php' );

// Script Calls.
require get_theme_file_path( '/inc/script-calls.php' );

// Social Links.
require get_theme_file_path( '/inc/framework/thb-social-links.php' );

// Lazy Loading.
require get_theme_file_path( '/inc/framework/thb-lazyload.php' );

// Misc.
require get_theme_file_path( '/inc/misc.php' );

// Header Related.
require get_theme_file_path( '/inc/header-related.php' );

// Ajax.
require get_theme_file_path( '/inc/ajax.php' );

// MailChimp Integration.
require get_theme_file_path( '/inc/framework/thb-mailchimp.php' );

// Breadcrumbs.
require get_theme_file_path( '/inc/framework/thb-breadcrumbs.php' );

// Post Related.
require get_theme_file_path( '/inc/post-related.php' );

// Sharing
require get_theme_file_path( '/inc/framework/thb-post-social.php' );

// Add Menu Support.
require get_theme_file_path( '/inc/wp3menu.php' );

// CSS Output of Theme Options.
require get_theme_file_path( '/inc/selection.php' );

// WooCommerce.
require get_theme_file_path( '/inc/woocommerce/woocommerce-misc.php' );
require get_theme_file_path( '/inc/woocommerce/woocommerce-general.php' );
require get_theme_file_path( '/inc/woocommerce/woocommerce-filterbar.php' );
require get_theme_file_path( '/inc/woocommerce/woocommerce-single.php' );
require get_theme_file_path( '/inc/woocommerce/woocommerce-single-category.php' );
require get_theme_file_path( '/inc/woocommerce/woocommerce-cart.php' );
require get_theme_file_path( '/inc/woocommerce/woocommerce-checkout.php' );
require get_theme_file_path( '/inc/woocommerce/woocommerce-gutenberg.php' );
require get_theme_file_path( '/inc/woocommerce/woocommerce-quickview.php' );
require get_theme_file_path( '/inc/woocommerce/woocommerce-attribute-settings.php' );
require get_theme_file_path( '/inc/woocommerce/woocommerce-category-settings.php' );
require get_theme_file_path( '/inc/woocommerce/woocommerce-product-data-tabs.php' );
require get_theme_file_path( '/inc/woocommerce/woocommerce-dokan.php' );

// Multi-Language.
require get_theme_file_path( '/inc/framework/thb-multilanguage.php' );

// WPBakery Integration.
require get_theme_file_path( '/inc/framework/visualcomposer/visualcomposer.php' );

// Footer Related.
require get_theme_file_path( '/inc/footer-related.php' );

