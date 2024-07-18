<?php function thb_selection() {
	$thb_id = get_queried_object_id();
	ob_start();
	?>
/* Options set in the admin page */

/* Header */
	<?php if ( $logo_height = ot_get_option( 'logo_height' ) ) { ?>
.logo-holder .logolink .logoimg {
	max-height: <?php thb_measurement_output( $logo_height ); ?>;
}
.logo-holder .logolink .logoimg[src$=".svg"] {
	max-height: 100%;
	height: <?php thb_measurement_output( $logo_height ); ?>;
}
<?php } ?>
	<?php if ( $logo_height_mobile = ot_get_option( 'logo_height_mobile' ) ) { ?>
@media screen and (max-width: 1067px) {
	.header .logo-holder .logolink .logoimg {
		max-height: <?php thb_measurement_output( $logo_height_mobile ); ?>;
	}
	.header .logo-holder .logolink .logoimg[src$=".svg"] {
		max-height: 100%;
		height: <?php thb_measurement_output( $logo_height_mobile ); ?>;
	}
}
<?php } ?>
	<?php if ( $logo_height_fixed = ot_get_option( 'logo_height_fixed' ) ) { ?>
@media screen and (min-width: 1068px) {
	.header.fixed .logo-holder .logolink .logoimg {
		max-height: <?php thb_measurement_output( $logo_height_fixed ); ?>;
	}
	.header.fixed .logo-holder .logolink .logoimg[src$=".svg"] {
		max-height: 100%;
		height: <?php thb_measurement_output( $logo_height_fixed ); ?>;
	}
}
<?php } ?>
	<?php if ( $header_padding = ot_get_option( 'header_padding' ) ) { ?>
@media screen and (min-width: 1068px) {
	.header:not(.fixed) .header-logo-row {
		<?php thb_paddingoutput( $header_padding ); ?>
	}
}
<?php } ?>
	<?php if ( $header_padding_mobile = ot_get_option( 'header_padding_mobile' ) ) { ?>
@media screen and (max-width: 1067px) {
	.header .header-logo-row,
	.header.fixed .header-logo-row {
		<?php thb_paddingoutput( $header_padding_mobile ); ?>
	}
}
<?php } ?>
	<?php if ( $header_padding_fixed = ot_get_option( 'header_padding_fixed' ) ) { ?>
@media screen and (min-width: 1068px) {
	.header.fixed {
		<?php thb_paddingoutput( $header_padding_fixed ); ?>
	}
}
<?php } ?>
	<?php if ( $logo_padding = ot_get_option( 'logo_padding' ) ) { ?>
@media screen and (min-width: 1068px) {
	.header:not(.fixed) .logo-holder {
		<?php thb_paddingoutput( $logo_padding ); ?>
	}
}
<?php } ?>
	<?php if ( $logo_mobile_padding = ot_get_option( 'logo_mobile_padding' ) ) { ?>
@media screen and (max-width: 1067px) {
	.header .logo-holder {
		<?php thb_paddingoutput( $logo_mobile_padding ); ?>
	}
}
<?php } ?>
/* Font Families */
	<?php if ( $primary_font = ot_get_option( 'primary_font' ) ) { ?>
h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6 {
		<?php thb_typeoutput( $primary_font ); ?>
}
<?php } ?>
	<?php if ( $secondary_font = ot_get_option( 'secondary_font' ) ) { ?>
body {
		<?php thb_typeoutput( $secondary_font ); ?>
}
<?php } ?>

	<?php if ( $fullmenu_font = ot_get_option( 'fullmenu_font' ) ) { ?>
.thb-full-menu {
		<?php thb_typeoutput( $fullmenu_font ); ?>
}
<?php } ?>

	<?php if ( $mobilemenu_font = ot_get_option( 'mobilemenu_font' ) ) { ?>
.thb-mobile-menu,
.thb-secondary-menu {
		<?php thb_typeoutput( $mobilemenu_font ); ?>
}
<?php } ?>

	<?php if ( $em_font = ot_get_option( 'em_font' ) ) { ?>
em {
		<?php thb_typeoutput( $em_font ); ?>
}
	<?php } ?>

	<?php if ( $label_font = ot_get_option( 'label_font' ) ) { ?>
label {
		<?php thb_typeoutput( $label_font ); ?>
}
<?php } ?>

	<?php if ( $button_font = ot_get_option( 'button_font' ) ) { ?>
input[type="submit"],
submit,
.button,
.btn,
.btn-block,
.btn-text,
.vc_btn3 {
		<?php thb_typeoutput( $button_font ); ?>
}
<?php } ?>

	<?php if ( $widget_title_font = ot_get_option( 'widget_title_font' ) ) { ?>
.widget .thb-widget-title {
		<?php thb_typeoutput( $widget_title_font ); ?>
}
<?php } ?>

/* Typography */
	<?php if ( $fullmenu_type = ot_get_option( 'fullmenu_type' ) ) { ?>
.thb-full-menu>.menu-item>a {
		<?php thb_typeoutput( $fullmenu_type ); ?>
}
<?php } ?>
	<?php if ( $fullmenu_sub_type = ot_get_option( 'fullmenu_sub_type' ) ) { ?>
.thb-full-menu .menu-item .sub-menu .menu-item a {
		<?php thb_typeoutput( $fullmenu_sub_type ); ?>
}
<?php } ?>
	<?php if ( $secondary_area_type = ot_get_option( 'secondary_area_type' ) ) { ?>
.thb-secondary-area .thb-secondary-item,
.thb-cart-amount .amount {
		<?php thb_typeoutput( $secondary_area_type ); ?>
}
<?php } ?>
	<?php if ( $mobilemenu_type = ot_get_option( 'mobilemenu_type' ) ) { ?>
.thb-mobile-menu>li>a {
		<?php thb_typeoutput( $mobilemenu_type ); ?>
}
<?php } ?>
	<?php if ( $mobilemenu_sub_type = ot_get_option( 'mobilemenu_sub_type' ) ) { ?>
.thb-mobile-menu .sub-menu a {
		<?php thb_typeoutput( $mobilemenu_sub_type ); ?>
}
<?php } ?>
	<?php if ( $mobilemenu_secondary_type = ot_get_option( 'mobilemenu_secondary_type' ) ) { ?>
#mobile-menu .thb-secondary-menu a {
		<?php thb_typeoutput( $mobilemenu_secondary_type ); ?>
}
<?php } ?>
	<?php if ( $mobilemenu_footer_type = ot_get_option( 'mobilemenu_footer_type' ) ) { ?>
#mobile-menu .side-panel-inner .mobile-menu-bottom .menu-footer {
		<?php thb_typeoutput( $mobilemenu_footer_type ); ?>
}
<?php } ?>
	<?php if ( $mobilemenu_social_type = ot_get_option( 'mobilemenu_social_type' ) ) { ?>
#mobile-menu .side-panel-inner .mobile-menu-bottom .thb-social-links-container {
		<?php thb_typeoutput( $mobilemenu_social_type ); ?>
}
<?php } ?>
	<?php if ( $widget_title_type = ot_get_option( 'widget_title_type' ) ) { ?>
.widget .thb-widget-title {
		<?php thb_typeoutput( $widget_title_type ); ?>
}
<?php } ?>
	<?php if ( $widget_title_type_footer = ot_get_option( 'widget_title_type_footer' ) ) { ?>
.footer .widget .thb-widget-title {
		<?php thb_typeoutput( $widget_title_type_footer ); ?>
}
<?php } ?>
	<?php if ( $footer_type = ot_get_option( 'footer_type' ) ) { ?>
.footer .widget,
.footer .widget p {
		<?php thb_typeoutput( $footer_type ); ?>
}
<?php } ?>
	<?php if ( $subfooter_fullmenu_type = ot_get_option( 'subfooter_fullmenu_type' ) ) { ?>
.subfooter .thb-full-menu>.menu-item>a {
		<?php thb_typeoutput( $subfooter_fullmenu_type ); ?>
}
<?php } ?>
	<?php if ( $subfooter_copyright_type = ot_get_option( 'subfooter_copyright_type' ) ) { ?>
.subfooter p {
		<?php thb_typeoutput( $subfooter_copyright_type ); ?>
}
<?php } ?>
	<?php if ( $subfooter_social_type = ot_get_option( 'subfooter_social_type' ) ) { ?>
.subfooter .thb-social-links-container {
		<?php thb_typeoutput( $subfooter_social_type ); ?>
}
<?php } ?>
/* Backgrounds */
	<?php if ( $global_notification_bg = ot_get_option( 'global_notification_bg' ) ) { ?>
.thb-global-notification.light,
.thb-global-notification.dark {
		<?php thb_bgoutput( $global_notification_bg ); ?>
}
<?php } ?>
	<?php if ( $content_bg = ot_get_option( 'content_bg' ) ) { ?>
#wrapper [role=main] {
		<?php thb_bgoutput( $content_bg ); ?>
}
	<?php } ?>
	<?php if ( $subheader_bg = ot_get_option( 'subheader_bg' ) ) { ?>
.subheader {
		<?php thb_bgoutput( $subheader_bg ); ?>
}
	<?php } ?>
	<?php if ( $header_bg = ot_get_option( 'header_bg' ) ) { ?>
.header:not(.fixed) {
		<?php thb_bgoutput( $header_bg ); ?>
}
<?php } ?>
	<?php if ( $fixed_header_bg = ot_get_option( 'fixed_header_bg' ) ) { ?>
.header.fixed {
		<?php thb_bgoutput( $fixed_header_bg ); ?>
}
<?php } ?>
	<?php if ( $menu_bg = ot_get_option( 'menu_bg' ) ) { ?>
.header:not(.fixed) .header-menu-row {
		<?php thb_bgoutput( $menu_bg ); ?>
}
<?php } ?>
	<?php if ( $submenu_bg = ot_get_option( 'submenu_bg' ) ) { ?>
.thb-full-menu .sub-menu,
.thb-dropdown-style2 .thb-dropdown-style,
.thb-dropdown-style2 .thb-full-menu .sub-menu,
.thb-full-menu .thb-dropdown-style2 .sub-menu,
.thb-secondary-area .thb-quick-cart .thb-secondary-cart,
.thb-full-menu>.menu-item.menu-item-has-children>a:before,
.thb-secondary-area .thb-quick-cart:after {
		<?php thb_bgoutput( $submenu_bg ); ?>
}
<?php } ?>
	<?php if ( $footer_bg = ot_get_option( 'footer_bg' ) ) { ?>
.footer {
		<?php thb_bgoutput( $footer_bg ); ?>
}
<?php } ?>
	<?php if ( $subfooter_bg = ot_get_option( 'subfooter_bg' ) ) { ?>
.subfooter {
		<?php thb_bgoutput( $subfooter_bg ); ?>
}
<?php } ?>
	<?php if ( $mobilemenu_bg = ot_get_option( 'mobilemenu_bg' ) ) { ?>
#mobile-menu,
#mobile-menu .side-panel-header {
		<?php thb_bgoutput( $mobilemenu_bg ); ?>
}
<?php } ?>
	<?php if ( $cookiebar_bg = ot_get_option( 'cookiebar_bg' ) ) { ?>
.thb-cookie-bar {
		<?php thb_bgoutput( $cookiebar_bg ); ?>
}
	<?php } ?>
/* Colors */
	<?php if ( $accent_color = ot_get_option( 'accent_color' ) ) { ?>
a:hover,
h1 small, h2 small, h3 small, h4 small, h5 small, h6 small,
h1 small a, h2 small a, h3 small a, h4 small a, h5 small a, h6 small a,
.thb-full-menu .menu-item.menu-item-has-children.menu-item-mega-parent > .sub-menu > li.mega-menu-title > a,
.thb-full-menu .menu-item.menu-item-has-children.menu-item-mega-parent > .sub-menu > li.menu-item-has-children > .sub-menu > li.title-item > a,
.thb-dropdown-color-dark .thb-full-menu .sub-menu li a:hover,
.thb-full-menu .sub-menu li.title-item > a,
.post .thb-read-more,
.post-detail .thb-article-nav .thb-article-nav-post:hover span,
.post-detail .thb-article-nav .thb-article-nav-post:hover strong,
.commentlist .comment .reply,
.commentlist .review .reply,
.star-rating > span:before, .comment-form-rating p.stars > span:before,
.comment-form-rating p.stars:hover a, .comment-form-rating p.stars.selected a,
.widget ul a:hover,
.widget.widget_nav_menu li.active > a,
.widget.widget_nav_menu li.active > .thb-arrow,
.widget.widget_nav_menu li.active > .count, .widget.widget_pages li.active > a,
.widget.widget_pages li.active > .thb-arrow,
.widget.widget_pages li.active > .count, .widget.widget_meta li.active > a,
.widget.widget_meta li.active > .thb-arrow,
.widget.widget_meta li.active > .count, .widget.widget_product_categories li.active > a,
.widget.widget_product_categories li.active > .thb-arrow,
.widget.widget_product_categories li.active > .count,
.has-thb-accent-color,
.has-thb-accent-color p,
.wp-block-button .wp-block-button__link.has-thb-accent-color,
.wp-block-button .wp-block-button__link.has-thb-accent-color p,
input[type="submit"].white:hover,
.button.white:hover,
.btn.white:hover,
.thb-social-links-container.style3 .thb-social-link,
.thb_title .thb_title_link,
.thb-tabs.style3 .thb-tab-menu .vc_tta-panel-heading a.active,
.thb-page-menu li:hover a, .thb-page-menu li.current_page_item a,
.thb-page-menu.style0 li:hover a, .thb-page-menu.style0 li.current_page_item a,
.thb-testimonials.style7 .testimonial-author cite,
.thb-testimonials.style7 .testimonial-author span,
.thb-iconbox.top.type5 .iconbox-content .thb-read-more,
.thb-autotype .thb-autotype-entry,
.thb-pricing-table.style2 .pricing-container .thb_pricing_head .thb-price,
.thb-menu-item .thb-menu-item-parent .thb-menu-title h6,
.thb-filter-bar .thb-products-per-page a.active,
.products .product .woocommerce-loop-product__title a:hover,
.products .product .product-category,
.products .product .product-category a,
.products .product.thb-listing-button-style4 .thb_transform_price .button,
.products .product-category:hover h2,
.thb-product-detail .product-information .woocommerce-product-rating .woocommerce-review-link,
.thb-product-detail .variations_form .reset_variations,
.thb-product-tabs.thb-product-tabs-style3 .wc-tabs li.active a,
.woocommerce-account .woocommerce-MyAccount-navigation .is-active a,
.thb-checkout-toggle a,
.woocommerce-terms-and-conditions-wrapper .woocommerce-privacy-policy-text a,
.woocommerce-terms-and-conditions-wrapper label a,
.subfooter.dark a:hover  {
	color: <?php echo esc_attr( $accent_color ); ?>;
}
.thb-secondary-area .thb-secondary-item .count,
.post.style4 h3:after,
.tag-cloud-link:hover, .post-detail .thb-article-tags a:hover,
.has-thb-accent-background-color,
.wp-block-button .wp-block-button__link.has-thb-accent-background-color,
input[type="submit"]:not(.white):not(.style2):hover,
.button:not(.white):not(.style2):hover,
.btn:not(.white):not(.style2):hover,
input[type="submit"].grey:hover,
.button.grey:hover,
.btn.grey:hover,
input[type="submit"].accent:not(.style2), input[type="submit"].alt:not(.style2),
.button.accent:not(.style2),
.button.alt:not(.style2),
.btn.accent:not(.style2),
.btn.alt:not(.style2),
.btn-text.style3 .circle-btn,
.thb-slider.thb-carousel.thb-slider-style3 .thb-slide .thb-slide-content-inner, .thb-slider.thb-carousel.thb-slider-style5 .thb-slide .thb-slide-content-inner,
.thb-inner-buttons .btn-text-regular.style2.accent:after,
.thb-page-menu.style1 li:hover a, .thb-page-menu.style1 li.current_page_item a,
.thb-client-row.thb-opacity.with-accent .thb-client:hover,
.thb-client-row .style4 .accent-color,
.thb-progressbar .thb-progress span,
.thb-product-icon:hover, .thb-product-icon.exists,
.products .product-category.thb-category-style3 .thb-category-link:after,
.products .product-category.thb-category-style4:hover .woocommerce-loop-category__title:after,
.products .product-category.thb-category-style6 .thb-category-link:hover .woocommerce-loop-category__title,
.thb-product-nav .thb-product-nav-button:hover .product-nav-link,
#scroll_to_top:hover,
.products .product.thb-listing-button-style5 .thb-addtocart-with-quantity .button.accent,
.wc-block-grid__products .wc-block-grid__product .wc-block-grid__product-add-to-cart .wp-block-button__link:hover {
	background-color: <?php echo esc_attr( $accent_color ); ?>;
}
input[type="submit"].accent:not(.white):not(.style2):hover, input[type="submit"].alt:not(.white):not(.style2):hover,
.button.accent:not(.white):not(.style2):hover,
.button.alt:not(.white):not(.style2):hover,
.btn.accent:not(.white):not(.style2):hover,
.btn.alt:not(.white):not(.style2):hover {
	background-color: <?php echo esc_attr( thb_adjust_color_lighten_darken( $accent_color, 10 ) ); ?>;
}
.thb-checkout-toggle {
	background-color: rgba(<?php echo esc_attr( thb_hex2rgb( $accent_color ) ); ?>, 0.1);
	border-color: rgba(<?php echo esc_attr( thb_hex2rgb( $accent_color ) ); ?>, 0.3);
}
input[type="submit"].style2.accent,
.button.style2.accent,
.btn.style2.accent,
.thb-social-links-container.style3 .thb-social-link,
.thb-inner-buttons .btn-text-regular.accent,
.thb-page-menu.style1 li:hover a, .thb-page-menu.style1 li.current_page_item a,
.thb-client-row.has-border.thb-opacity.with-accent .thb-client:hover,
.thb-pricing-table.style1 .thb-pricing-column.highlight-true .pricing-container,
.thb-hotspot-container .thb-hotspot.pin-accent,
.thb-product-nav .thb-product-nav-button:hover .product-nav-link,
#scroll_to_top:hover {
	border-color: <?php echo esc_attr( $accent_color ); ?>;
}
.thb-tabs.style4 .thb-tab-menu .vc_tta-panel-heading a.active,
.thb-page-menu.style1 li:hover + li a, .thb-page-menu.style1 li.current_page_item + li a,
.thb-iconbox.top.type5,
.thb-product-detail.thb-product-sticky,
.thb-product-tabs.thb-product-tabs-style4 .wc-tabs li.active {
	border-top-color: <?php echo esc_attr( $accent_color ); ?>;
}
.post .thb-read-more svg,
.post .thb-read-more svg .bar,
.commentlist .comment .reply svg path,
.commentlist .review .reply svg path,
.btn-text.style4 .arrow svg:first-child,
.thb_title .thb_title_link svg,
.thb_title .thb_title_link svg .bar,
.thb-iconbox.top.type5 .iconbox-content .thb-read-more svg,
.thb-iconbox.top.type5 .iconbox-content .thb-read-more svg .bar {
	fill: <?php echo esc_attr( $accent_color ); ?>;
}
.thb_title.style10 .thb_title_icon svg path,
.thb_title.style10 .thb_title_icon svg circle,
.thb_title.style10 .thb_title_icon svg rect,
.thb_title.style10 .thb_title_icon svg ellipse,
.products .product.thb-listing-button-style3 .product-thumbnail .button.black:hover svg,
.products .product.thb-listing-button-style3 .product-thumbnail .button.accent svg,
.thb-testimonials.style10 .slick-dots li .text_bullet svg path {
	stroke: <?php echo esc_attr( $accent_color ); ?>;
}
.thb-tabs.style1 .vc_tta-panel-heading a.active, .thb-tabs.style2 .vc_tta-panel-heading a.active,
.thb-product-tabs.thb-product-tabs-style1 .wc-tabs li.active a, .thb-product-tabs.thb-product-tabs-style2 .wc-tabs li.active a {
	color: <?php echo esc_attr( $accent_color ); ?>;
	-moz-box-shadow: inset 0 -3px 0 0 <?php echo esc_attr( $accent_color ); ?>;
	-webkit-box-shadow: inset 0 -3px 0 0 <?php echo esc_attr( $accent_color ); ?>;
	box-shadow: inset 0 -3px 0 0 <?php echo esc_attr( $accent_color ); ?>;
}
<?php } ?>
	<?php if ( $widget_title_color = ot_get_option( 'widget_title_color' ) ) { ?>
.widget .thb-widget-title {
	color: <?php echo esc_attr( $widget_title_color ); ?>;
}
<?php } ?>
	<?php if ( $footer_widget_title_color = ot_get_option( 'footer_widget_title_color' ) ) { ?>
.footer .widget .thb-widget-title,
.footer.dark .widget .thb-widget-title {
	color: <?php echo esc_attr( $footer_widget_title_color ); ?>;
}
<?php } ?>
	<?php if ( $footer_text_color = ot_get_option( 'footer_text_color' ) ) { ?>
.footer,
.footer p,
.footer.dark,
.footer.dark p {
	color: <?php echo esc_attr( $footer_text_color ); ?>;
}
<?php } ?>
	<?php if ( $subfooter_text_color = ot_get_option( 'subfooter_text_color' ) ) { ?>
.subfooter,
.subfooter p,
.subfooter.dark,
.subfooter.dark p {
	opacity: 1;
	color: <?php echo esc_attr( $subfooter_text_color ); ?>;
}
<?php } ?>
	<?php if ( $mobile_menu_icon_color = ot_get_option( 'mobile_menu_icon_color' ) ) { ?>
.mobile-toggle-holder .mobile-toggle span,
.header.dark-header .mobile-toggle-holder .mobile-toggle span {
	background: <?php echo esc_attr( $mobile_menu_icon_color ); ?>;
}
<?php } ?>
	<?php if ( $submenu_border_color = ot_get_option( 'submenu_border_color' ) ) { ?>
.thb-full-menu .sub-menu,
.thb-dropdown-style2 .thb-dropdown-style,
.thb-dropdown-style2 .thb-full-menu .sub-menu,
.thb-full-menu .thb-dropdown-style2 .sub-menu,
.thb-dropdown-style2 .thb-secondary-area .thb-quick-cart .thb-secondary-cart,
.thb-dropdown-style2 .thb-secondary-area .thb-secondary-dropdown,
.thb-secondary-area .thb-quick-cart .thb-dropdown-style2 .thb-secondary-cart,
.thb-secondary-area .thb-secondary-dropdown,
.thb-secondary-area .thb-quick-cart .thb-secondary-cart {
	border-color: <?php echo esc_attr( $submenu_border_color ); ?>;
}
.thb-full-menu>.menu-item.menu-item-has-children>a:before {
	border-top-color: <?php echo esc_attr( $submenu_border_color ); ?>;
	border-right-color: <?php echo esc_attr( $submenu_border_color ); ?>;
}
.thb-dropdown-style2 .thb-full-menu .menu-item.menu-item-has-children>a:before,
.thb-dropdown-style2 .thb-secondary-area .thb-quick-search:before,
.thb-secondary-area .thb-dropdown-style2 .thb-quick-search:before,
.thb-dropdown-style2 .thb-secondary-area .thb-quick-cart:before,
.thb-secondary-area .thb-dropdown-style2 .thb-quick-cart:before{
	border-top-color: <?php echo esc_attr( $submenu_border_color ); ?>;
	border-right-color: <?php echo esc_attr( $submenu_border_color ); ?>;
	background-color: <?php echo esc_attr( $submenu_border_color ); ?>;
}
.thb-secondary-area .thb-quick-search:before,
.thb-secondary-area .thb-quick-cart:before {
	border-top-color: <?php echo esc_attr( $submenu_border_color ); ?>;
	border-right-color: <?php echo esc_attr( $submenu_border_color ); ?>;
}
<?php } ?>

/* Links Colors */
	<?php if ( $general_link_color = ot_get_option( 'general_link_color' ) ) { ?>
		<?php thb_linkcoloroutput( $general_link_color, '', false ); ?>
<?php } ?>
	<?php if ( $subheader_link_color = ot_get_option( 'subheader_link_color' ) ) { ?>
		<?php thb_linkcoloroutput( $subheader_link_color, '.subheader .thb-full-menu>.menu-item>' ); ?>
		<?php thb_linkcoloroutput( $subheader_link_color, '.subheader.dark .thb-full-menu>.menu-item>' ); ?>
<?php } ?>
	<?php if ( $fullmenu_link_color_dark = ot_get_option( 'fullmenu_link_color_dark' ) ) { ?>
		<?php thb_linkcoloroutput( $fullmenu_link_color_dark, '.thb-full-menu>li>' ); ?>
		<?php
			$header_color = ot_get_option( 'header_color', 'light-header' );
		if ( 'dark-header' === $header_color ) {
			thb_linkcoloroutput( $fullmenu_link_color_dark, '.header.dark-header .thb-full-menu>.menu-item>' );
		}
		?>
	<?php } ?>
	<?php if ( $submenu_link_color = ot_get_option( 'submenu_link_color' ) ) { ?>
		<?php thb_linkcoloroutput( $submenu_link_color, '.thb-full-menu .sub-menu li' ); ?>
		<?php thb_linkcoloroutput( $submenu_link_color, '.thb-dropdown-color-dark .thb-full-menu .sub-menu li' ); ?>
<?php } ?>
	<?php if ( $mobilemenu_link_color = ot_get_option( 'mobilemenu_link_color' ) ) { ?>
		<?php thb_linkcoloroutput( $mobilemenu_link_color, '#mobile-menu .thb-mobile-menu>li>' ); ?>
		<?php thb_linkcoloroutput( $mobilemenu_link_color, '#mobile-menu.dark .thb-mobile-menu>li>' ); ?>
<?php } ?>
	<?php if ( $mobilemenu_secondary_link_color = ot_get_option( 'mobilemenu_secondary_link_color' ) ) { ?>
		<?php thb_linkcoloroutput( $mobilemenu_secondary_link_color, '#mobile-menu .thb-secondary-menu' ); ?>
		<?php thb_linkcoloroutput( $mobilemenu_secondary_link_color, '#mobile-menu.dark .thb-secondary-menu' ); ?>
<?php } ?>
	<?php if ( $footer_link_color = ot_get_option( 'footer_link_color' ) ) { ?>
		<?php thb_linkcoloroutput( $footer_link_color, '.footer .widget' ); ?>
		<?php
		if ( 'dark' === ot_get_option( 'footer_color' ) ) {
			thb_linkcoloroutput( $footer_link_color, '.footer.dark .widget' ); }
		?>
<?php } ?>
	<?php if ( $subfooter_link_color = ot_get_option( 'subfooter_link_color' ) ) { ?>
		<?php thb_linkcoloroutput( $subfooter_link_color, '.subfooter' ); ?>
		<?php thb_linkcoloroutput( $subfooter_link_color, '.subfooter .thb-full-menu>li' ); ?>
<?php } ?>

/* Shop Colors */
	<?php if ( $rating_star_color = ot_get_option( 'rating_star_color' ) ) { ?>
.star-rating>span:before,
.comment-form-rating p.stars>span:before {
	color: <?php echo esc_attr( $rating_star_color ); ?>;
}
<?php } ?>
	<?php if ( $shop_price_color = ot_get_option( 'shop_price_color' ) ) { ?>
.price ins, .price .amount,
.thb-cart-amount .amount,
.product_list_widget .amount {
	color: <?php echo esc_attr( $shop_price_color ); ?>;
}
<?php } ?>
	<?php if ( $product_category_link_color = ot_get_option( 'product_category_link_color' ) ) { ?>
		<?php thb_linkcoloroutput( $product_category_link_color, '.products .product .product-category' ); ?>
<?php } ?>
	<?php if ( $product_title_link_color = ot_get_option( 'product_title_link_color' ) ) { ?>
		<?php thb_linkcoloroutput( $product_title_link_color, '.products .product .woocommerce-loop-product__title' ); ?>
<?php } ?>
	<?php if ( $product_detail_title_color = ot_get_option( 'product_detail_title_color' ) ) { ?>
.thb-product-detail .product-information h1 {
	color: <?php echo esc_attr( $product_detail_title_color ); ?>;
}
<?php } ?>

/* Badge Colors */
	<?php if ( $badge_justarrived = ot_get_option( 'badge_justarrived' ) ) { ?>
.badge.new {
	background: <?php echo esc_attr( $badge_justarrived ); ?>;
}
.badge.new.style5:after {
	border-right-color: <?php echo esc_attr( $badge_justarrived ); ?>;
}
<?php } ?>
	<?php if ( $badge_sale = ot_get_option( 'badge_sale' ) ) { ?>
.badge.onsale,
.wc-block-grid__products .wc-block-grid__product .wc-block-grid__product-onsale {
	background: <?php echo esc_attr( $badge_sale ); ?>;
}
.badge.onsale.style5:after {
	border-right-color: <?php echo esc_attr( $badge_sale ); ?>;
}
<?php } ?>
	<?php if ( $badge_outofstock = ot_get_option( 'badge_outofstock' ) ) { ?>
.badge.out-of-stock {
	background: <?php echo esc_attr( $badge_outofstock ); ?>;
}
.badge.out-of-stock.style5:after {
	border-right-color: <?php echo esc_attr( $badge_outofstock ); ?>;
}
<?php } ?>
	<?php if ( $notification_color_success = ot_get_option( 'notification_color_success' ) ) { ?>
.thb-temp-message,
.woocommerce-message {
	background-color: <?php echo esc_attr( $notification_color_success ); ?>;
}
	<?php } ?>
	<?php if ( $notification_color_info = ot_get_option( 'notification_color_info' ) ) { ?>
.woocommerce-info:not(.cart-empty) {
	background-color: <?php echo esc_attr( $notification_color_info ); ?>;
}
<?php } ?>
	<?php if ( $notification_color_error = ot_get_option( 'notification_color_error' ) ) { ?>
.woocommerce-info {
	background-color: <?php echo esc_attr( $notification_color_error ); ?>;
}
<?php } ?>
/* Shop Typography */
	<?php if ( $shop_product_page_title = ot_get_option( 'shop_product_page_title' ) ) { ?>
.thb-woocommerce-header.style1 .thb-shop-title,
.thb-woocommerce-header.style2 .thb-shop-title,
.thb-woocommerce-header.style3 .thb-shop-title {
		<?php thb_typeoutput( $shop_product_page_title ); ?>
}
<?php } ?>
	<?php if ( $shop_product_title = ot_get_option( 'shop_product_title' ) ) { ?>
.products .product .woocommerce-loop-product__title,
.wc-block-grid__products .wc-block-grid__product .woocommerce-loop-product__title .wc-block-grid__product-title {
		<?php thb_typeoutput( $shop_product_title ); ?>
}
<?php } ?>
	<?php if ( $shop_product_price = ot_get_option( 'shop_product_price' ) ) { ?>
.products .product .amount {
		<?php thb_typeoutput( $shop_product_price ); ?>
}
<?php } ?>
	<?php if ( $shop_product_category_title = ot_get_option( 'shop_product_category_title' ) ) { ?>
.products .product .product-category {
		<?php thb_typeoutput( $shop_product_category_title ); ?>
}
<?php } ?>
	<?php if ( $shop_product_excerpt = ot_get_option( 'shop_product_excerpt' ) ) { ?>
.products .product .product-excerpt {
		<?php thb_typeoutput( $shop_product_excerpt ); ?>
}
<?php } ?>
	<?php if ( $shop_product_button = ot_get_option( 'shop_product_button' ) ) { ?>
.products .product .button {
		<?php thb_typeoutput( $shop_product_button ); ?>
}
<?php } ?>
/* Product Page Typography */
	<?php if ( $shop_product_detail_title = ot_get_option( 'shop_product_detail_title' ) ) { ?>
.thb-product-detail .product-information h1 {
		<?php thb_typeoutput( $shop_product_detail_title ); ?>
}
<?php } ?>
	<?php if ( $shop_product_detail_price = ot_get_option( 'shop_product_detail_price' ) ) { ?>
.thb-product-detail .product-information .price .amount {
		<?php thb_typeoutput( $shop_product_detail_price ); ?>
}
<?php } ?>
	<?php if ( $shop_product_detail_excerpt = ot_get_option( 'shop_product_detail_excerpt' ) ) { ?>
.thb-product-detail .product-information .entry-summary .woocommerce-product-details__short-description {
		<?php thb_typeoutput( $shop_product_detail_excerpt ); ?>
}
<?php } ?>
/* Header Measurements */
	<?php if ( $header_secondary_icon_color = ot_get_option( 'header_secondary_icon_color' ) ) { ?>
.thb-secondary-area .thb-secondary-item svg.thb-wishlist-icon,
.thb-secondary-area .thb-secondary-item svg.thb-search-icon,
.thb-secondary-area .thb-secondary-item svg.thb-myaccount-icon {
	fill: <?php echo esc_attr( $header_secondary_icon_color ); ?> !important;
}
.header .thb-secondary-area .thb-secondary-item svg.thb-cart-icon,
.header.dark-header .thb-secondary-area .thb-secondary-item svg.thb-cart-icon {
	stroke: none;
	fill: <?php echo esc_attr( $header_secondary_icon_color ); ?> !important;
}
.header .thb-secondary-area .thb-secondary-item svg.thb-cart-icon.thb-cart-icon-style1,
.header.dark-header .thb-secondary-area .thb-secondary-item svg.thb-cart-icon.thb-cart-icon-style1 {
	stroke: <?php echo esc_attr( $header_secondary_icon_color ); ?> !important;
	fill: transparent !important;
}
.header .thb-secondary-area .thb-secondary-item svg.thb-cart-icon.thb-cart-icon-style5 path,
.header .thb-secondary-area .thb-secondary-item svg.thb-cart-icon.thb-cart-icon-style6 path,
.header.dark-header .thb-secondary-area .thb-secondary-item svg.thb-cart-icon.thb-cart-icon-style5 path,
.header.dark-header .thb-secondary-area .thb-secondary-item svg.thb-cart-icon.thb-cart-icon-style6 path {
	stroke: <?php echo esc_attr( $header_secondary_icon_color ); ?> !important;
}
<?php } ?>
	<?php if ( $header_secondary_icon_size = ot_get_option( 'header_secondary_icon_size' ) ) { ?>
@media screen and (min-width: 768px) {
	.thb-secondary-area .thb-secondary-item svg {
		height: <?php echo esc_html( $header_secondary_icon_size ); ?>px;
	}
}
<?php } ?>
	<?php if ( $menu_margin = ot_get_option( 'menu_margin' ) ) { ?>
.thb-full-menu>.menu-item+.menu-item {
	margin-left: <?php thb_measurement_output( $menu_margin ); ?>
}
<?php } ?>
/* Footer Measurements */
	<?php if ( $footer_margin = ot_get_option( 'footer_margin' ) ) { ?>
.footer {
		<?php thb_marginoutput( $footer_margin ); ?>
}
<?php } ?>
	<?php if ( $footer_padding = ot_get_option( 'footer_padding' ) ) { ?>
.footer {
		<?php thb_paddingoutput( $footer_padding ); ?>
}
<?php } ?>
	<?php if ( $subfooter_padding = ot_get_option( 'subfooter_padding' ) ) { ?>
.subfooter {
		<?php thb_paddingoutput( $subfooter_padding ); ?>
}
<?php } ?>
	<?php if ( $footer_logo_height = ot_get_option( 'footer_logo_height' ) ) { ?>
.footer .footer-logo-holder .footer-logolink .logoimg {
	max-height: <?php thb_measurement_output( $footer_logo_height ); ?>;
}
<?php } ?>
	<?php if ( $subfooter_logo_height = ot_get_option( 'subfooter_logo_height' ) ) { ?>
.subfooter .footer-logo-holder .logoimg {
	max-height: <?php thb_measurement_output( $subfooter_logo_height ); ?>;
}
<?php } ?>

/* Heading Typography */
	<?php if ( $h1_type = ot_get_option( 'h1_type' ) ) { ?>
@media screen and (min-width: 1068px) {
	h1,
	.h1 {
		<?php thb_typeoutput( $h1_type ); ?>
	}
}
h1,
.h1 {
		<?php thb_typeoutput( $h1_type, false, false, true ); ?>
}
<?php } ?>
	<?php if ( $h2_type = ot_get_option( 'h2_type' ) ) { ?>
@media screen and (min-width: 1068px) {
	h2 {
		<?php thb_typeoutput( $h2_type ); ?>
	}
}
h2 {
		<?php thb_typeoutput( $h2_type, false, false, true ); ?>
}
<?php } ?>
	<?php if ( $h3_type = ot_get_option( 'h3_type' ) ) { ?>
@media screen and (min-width: 1068px) {
	h3 {
		<?php thb_typeoutput( $h3_type ); ?>
	}
}
h3 {
		<?php thb_typeoutput( $h3_type, false, false, true ); ?>
}
<?php } ?>
	<?php if ( $h4_type = ot_get_option( 'h4_type' ) ) { ?>
@media screen and (min-width: 1068px) {
	h4 {
		<?php thb_typeoutput( $h4_type ); ?>
	}
}
h4 {
		<?php thb_typeoutput( $h4_type, false, false, true ); ?>
}
<?php } ?>
	<?php if ( $h5_type = ot_get_option( 'h5_type' ) ) { ?>
@media screen and (min-width: 1068px) {
	h5 {
		<?php thb_typeoutput( $h5_type ); ?>
	}
}
h5 {
		<?php thb_typeoutput( $h5_type, false, false, true ); ?>
}
<?php } ?>
	<?php if ( $h6_type = ot_get_option( 'h6_type' ) ) { ?>
h6 {
		<?php thb_typeoutput( $h6_type ); ?>
}
<?php } ?>
/* Grid Size */
	<?php if ( $thb_grid_size = ot_get_option( 'thb_grid_size' ) ) { ?>
.row {
	max-width: <?php thb_measurement_output( $thb_grid_size ); ?>;
}
.row.max_width {
	max-width: <?php thb_measurement_output( $thb_grid_size ); ?> !important;
}
.non-VC-page .elementor-section.elementor-section-boxed>.elementor-container {
	max-width: <?php thb_measurement_output( $thb_grid_size ); ?>;
}
<?php } ?>
/* Page Backgrounds */
.page-id-<?php echo esc_attr( $thb_id ); ?> #wrapper div[role="main"],
.postid-<?php echo esc_attr( $thb_id ); ?> #wrapper div[role="main"] {
	<?php thb_bgoutput( get_post_meta( $thb_id, 'page_bg', true ) ); ?>
}
/* Site Border */
	<?php if ( 'on' === ot_get_option( 'site_borders' ) ) { ?>
.thb-borders {
	border-color: <?php echo esc_attr( ot_get_option( 'site_borders_color' ) ); ?>;
}
		<?php if ( $site_borders_width = ot_get_option( 'site_borders_width', array( '8', 'px' ) ) ) { ?>
	@media only screen and (min-width: 40.063em) {
		.thb-borders {
			border-width: <?php thb_measurement_output( $site_borders_width ); ?>;
		}
		.thb-borders-on #wrapper {
			padding: <?php thb_measurement_output( $site_borders_width ); ?>;
		}
	}
	<?php } ?>
<?php } ?>
/* Boxed */
	<?php if ( $boxed_margin = ot_get_option( 'boxed_margin' ) ) { ?>
.thb-boxed-on #wrapper {
		<?php thb_marginoutput( $boxed_margin ); ?>
}
<?php } ?>
	<?php if ( $notification_duration = ot_get_option( 'notification_duration', '5' ) ) { ?>
.thb-temp-message, .woocommerce-message, .woocommerce-error, .woocommerce-info:not(.cart-empty) {
	animation-delay: 0.5s, <?php echo esc_attr( $notification_duration ); ?>s;
}
	<?php } ?>
/* Extra CSS */
	<?php echo ot_get_option( 'extra_css' ); ?>
	<?php
	$out = ob_get_clean();
	// Remove comments
	$out = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $out );
	// Remove space after colons
	$out = str_replace( ': ', ':', $out );
	// Remove whitespace
	$out = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $out );

	return $out;
}
