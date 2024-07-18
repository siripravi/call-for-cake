<?php
if ( ! thb_wc_supported() ) {
	return;
}
// Product Page Ajax Add to Cart.
function thb_woocommerce_single_product() {
	if ( 'off' === ot_get_option( 'shop_product_ajax_addtocart', 'on' ) ) {
		return;
	}

	function thb_ajax_add_to_cart_redirect_template() {
		$thb_ajax = filter_input( INPUT_GET, 'thb-ajax-add-to-cart', FILTER_VALIDATE_BOOLEAN );

		if ( $thb_ajax ) {
			wc_get_template( 'ajax/add-to-cart-fragments.php' );
			exit;
		}
	}
	add_action( 'wp', 'thb_ajax_add_to_cart_redirect_template', 1000 );
	function thb_woocommerce_after_add_to_cart_button() {
		global $product;
		?>
			<input type="hidden" name="action" value="wc_prod_ajax_to_cart" />
		<?php
		// Make sure we have the add-to-cart avaiable as button name doesn't submit via ajax.
		if ( $product->is_type( 'simple' ) ) {
			?>
			<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>"/>
			<?php
		}
	}
	add_action( 'woocommerce_after_add_to_cart_button', 'thb_woocommerce_after_add_to_cart_button' );
	function thb_woocommerce_display_site_notice() {
		?>
		<div class="thb_prod_ajax_to_cart_notices"></div>
		<?php
	}
	add_action( 'woocommerce_before_main_content', 'thb_woocommerce_display_site_notice', 10 );
}
add_action( 'before_woocommerce_init', 'thb_woocommerce_single_product' );

// Badges.
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
add_action( 'thb_product_images', 'thb_product_badge', 10 );

// Zoom Icon.
function thb_product_zoom() {
	?>
	<a class="woocommerce-product-gallery__trigger thb-product-icon">
		<span class="thb-icon-text"><?php echo esc_html__( 'Zoom', 'peakshops' ); ?></span>
		<?php get_template_part( 'assets/img/svg/zoom.svg' ); ?>
	</a>
	<?php
}
add_action( 'thb_product_images', 'thb_product_zoom', 10 );

// Video Icon.
function thb_product_video() {
	$thb_product_video = get_post_meta( get_the_ID(), 'thb_product_video', true );

	if ( ! $thb_product_video || '' === $thb_product_video ) {
		return;
	}
	?>
	<a class="thb-product-icon thb-product-video mfp-video" href="<?php echo esc_url( $thb_product_video ); ?>">
		<span class="thb-icon-text on-left"><?php echo esc_html__( 'View Video', 'peakshops' ); ?></span>
		<?php get_template_part( 'assets/img/svg/video.svg' ); ?>
	</a>
	<?php
}
add_action( 'thb_product_images', 'thb_product_video', 30 );

// Tab Styles.
add_action(
	'woocommerce_before_single_product',
	function() {
		$shop_product_style        = filter_input( INPUT_GET, 'shop_product_style', FILTER_SANITIZE_STRING );
		$shop_product_tab_position = filter_input( INPUT_GET, 'shop_product_tab_position', FILTER_SANITIZE_STRING );
		$shop_product_style        = $shop_product_style ? $shop_product_style : ot_get_option( 'shop_product_style', 'style1' );
		$shop_product_tab_position = $shop_product_tab_position ? $shop_product_tab_position : ot_get_option( 'shop_product_tab_position', 'style2' );

		add_action( 'woocommerce_single_product_summary', 'thb_product_sharing', 35 );

		if ( 'style2' === $shop_product_tab_position ) {
			remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
			add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 100 );
		}
		if ( 'style2' === $shop_product_style ) {
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
			remove_action( 'woocommerce_single_product_summary', 'thb_product_sharing', 35 );

			add_action( 'thb_product_style2_addto_cart', 'woocommerce_template_single_add_to_cart', 10 );
			add_action( 'thb_product_style2_addto_cart', 'thb_product_sharing', 20 );
		}

		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 11 );

	},
	15
);

// Product Nav.
function thb_product_navigation() {
	global $post;
	$next_post = get_next_post( true, '', 'product_cat' );
	$prev_post = get_previous_post( true, '', 'product_cat' );
	?>
	<ul class="thb-product-nav">
	<?php if ( $next_post ) { ?>
		<li class="thb-product-nav-button product-nav-next">
			<a href="<?php echo esc_url( get_the_permalink( $next_post->ID ) ); ?>" rel="next" class="product-nav-link">
				<i class="thb-icon-left-open-mini"></i>
			</a>
			<div class="thb-product-nav-image">
				<?php echo get_the_post_thumbnail( $next_post->ID, apply_filters( 'woocommerce_gallery_thumbnail_size', 'woocommerce_gallery_thumbnail' ) ); ?>
			</div>
		</li>
	<?php } ?>
	<?php if ( $prev_post ) { ?>
		<li class="thb-product-nav-button product-nav-prev">
			<a href="<?php echo esc_url( get_the_permalink( $prev_post->ID ) ); ?>" rel="prev" class="product-nav-link">
				<i class="thb-icon-right-open-mini"></i>
			</a>
			<div class="thb-product-nav-image">
				<?php echo get_the_post_thumbnail( $prev_post->ID, apply_filters( 'woocommerce_gallery_thumbnail_size', 'woocommerce_gallery_thumbnail' ) ); ?>
			</div>
		</li>
	<?php } ?>
	</ul>
	<?php
}
add_action( 'thb_product_navigation', 'thb_product_navigation' );

// Remove Product Description Heading.
function thb_remove_product_description_heading() {
	return '';
}
add_filter( 'woocommerce_product_description_heading', 'thb_remove_product_description_heading' );


// Remove Additional Product Information Heading.
function thb_remove_product_information_heading() {
	return '';
}
add_filter( 'woocommerce_product_additional_information_heading', 'thb_remove_product_information_heading' );

// Remove Sidebar.
function thb_disable_woo_commerce_sidebar() {
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
}
add_action( 'init', 'thb_disable_woo_commerce_sidebar' );

// Add Wishlist & Sharing.
function thb_product_sharing() {
	if ( wp_doing_ajax() ) {
		return;
	}
	?>
	<div class="thb-product-meta-before">
		<?php
		thb_sizing_guide();
		thb_wishlist_button( true );

		$post_id         = get_the_ID();
		$post_url        = get_permalink();
		$sharing_buttons = thb_article_get_accounts( $post_url, $post_id, 'product_sharing_buttons' );

		if ( ! empty( $sharing_buttons ) ) {
			?>
			<div class="thb-share-product">
				<a class="thb-share-text">
					<?php get_template_part( 'assets/img/svg/share.svg' ); ?>
					<?php esc_html_e( 'Share', 'peakshops' ); ?>
				</a>
				<div class="icons">
					<div class="inner">
						<?php
						$i = 0;
						foreach ( $sharing_buttons as $button ) {
							?>
							<a href="<?php echo esc_attr( $button['url'] ); ?>" rel="noreferrer" class="social social-<?php echo esc_attr( $button['slug'] ); ?>"
												<?php
												if ( 'whatsapp' === $button['slug'] ) {
													?>
								data-action="share/whatsapp/share"<?php } ?>>
							<i class="<?php echo esc_attr( $button['icon'] ); ?>"></i>
							</a>
						<?php $i++; } ?>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	<?php
}
// Sizing Guide.
function thb_sizing_guide() {
	$thb_id               = get_the_ID();
	$sizing_guide         = get_post_meta( $thb_id, 'sizing_guide', true );
	$sizing_guide_content = get_post_meta( $thb_id, 'sizing_guide_content', true );

	if ( 'yes' === $sizing_guide ) {
		?>
		<a href="#thb-sizing-popup" rel="inline" class="mfp-inline sizing_guide">
			<?php get_template_part( 'assets/img/svg/sizing_guide.svg' ); ?>
			<?php esc_html_e( 'Sizing Guide', 'peakshops' ); ?>
		</a>
		<aside id="thb-sizing-popup" class="mfp-hide theme-popup text-left">
			<div class="theme-popup-content">
				<?php echo do_shortcode( $sizing_guide_content ); ?>
			</div>
		</aside>
		<?php
	}
}

// Sticky Add to Cart.
function thb_sticky_add_to_cart() {
	$shop_product_sticky_addtocart = ot_get_option( 'shop_product_sticky_addtocart', 'on' );
	if ( 'off' === $shop_product_sticky_addtocart ) {
		return;
	}
	if ( is_product() ) {
		global $product;
		if ( $product->is_purchasable() && $product->is_in_stock() ) {
			wc_get_template_part( 'layouts/single-product', 'sticky' );
		}
	}
}
add_action( 'wp_footer', 'thb_sticky_add_to_cart' );

// Ignore Lazyload.
function thb_woocommerce_gallery_image_html_attachment_image_params( $params ) {
	$params['class'] .= ' thb-ignore-lazyload';
	return $params;
}
add_filter( 'woocommerce_gallery_image_html_attachment_image_params', 'thb_woocommerce_gallery_image_html_attachment_image_params' );
