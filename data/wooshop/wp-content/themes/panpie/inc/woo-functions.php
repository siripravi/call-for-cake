<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

/*-------------------------------------
#. Theme supports for WooCommerce
---------------------------------------*/
function panpie_wc_support() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );
}

/*----------------------------------------
#. Replace WooCommerce Default functions
------------------------------------------*/
// Short description - Use excerpt when description doesn't exist
if ( ! function_exists( 'woocommerce_template_single_excerpt' ) ) {
	function woocommerce_template_single_excerpt() {
		global $post;
		if ( ! $post->post_excerpt && !PanpieTheme::$options['wc_show_excerpt'] ) {
			return false;
		}

		echo '<div class="short-description">';
		if ( ! $post->post_excerpt ) {
			the_excerpt();
		} else {
			wc_get_template( 'single-product/short-description.php' );
		}
		echo '</div>';
	}
}

/*-------------------------------------
#. Custom functions used directly
---------------------------------------*/
function panpie_wc_product_slider( $products, $title, $type='' ) {
	include PANPIE_BASE_DIR . 'wc-template-parts/content-product-slider.php';
}

/*-------------------------------------
#. Custom functions used in hooks
---------------------------------------*/
function panpie_header_cart_count( $fragments ) {
	global $woocommerce;
	ob_start(); ?>
	<span class="cart-icon-num"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
	<?php
	$fragments['span.cart-icon-num'] = ob_get_clean();
	return $fragments;
}

function panpie_smallscreen_breakpoint(){
	return '767px';
}

function panpie_wc_hide_page_title(){
	return false;
}

function panpie_wc_loop_shop_per_page(){
	return PanpieTheme::$options['wc_num_product'];
}

function panpie_wc_wrapper_start() {
	get_template_part( 'wc-template-parts/content', 'shop-header' );
}

function panpie_wc_wrapper_end() {
	get_template_part( 'wc-template-parts/content', 'shop-footer' );
}

function panpie_wc_shop_topbar(){
	get_template_part( 'wc-template-parts/content', 'shop-top' );
}

function panpie_wc_loop_product_title(){
	echo '<h3><a href="' . get_the_permalink() . '" class="woocommerce-LoopProduct-link">' . get_the_title() . '</a></h3>';
}

function panpie_wc_loop_shop_columns(){
	if ( PanpieTheme::$layout == 'full-width' ) {
		return 4;
	}
	return 3;
}

function panpie_wc_shop_thumb_area(){
	get_template_part( 'wc-template-parts/content', 'shop-thumb' );
}

function panpie_wc_shop_info_wrap_start(){
	if ( is_rtl() ) {  $align = 'text-right'; } else { $align='text-center'; } 
	echo '<div class="product-info-area '. $align .'">';
}

function panpie_wc_shop_add_description(){
	if ( is_shop() || is_product_category() || is_product_tag() ) {
		global $post;
		echo '<div class="shop-excerpt grid-hide"><div class="short-description">';
		the_excerpt();
		echo '</div></div>';
		/*custom list info*/
		if ( PanpieTheme::$options['wc_product_hover'] ): ?>
			<div class="product-list-info">
				<ul>
					<li><?php woocommerce_template_loop_add_to_cart(); ?></li>
					<?php if ( function_exists( 'YITH_WCQV_Frontend' ) && PanpieTheme::$options['wc_quickview_icon'] ): ?>
					<li><a href="" class="yith-wcqv-button" data-product_id="<?php echo esc_attr( $product->get_id() );?>"><i class="fa fa-search"></i></a></li>
					<?php endif; ?>
					<?php if ( class_exists( 'YITH_WCWL_Shortcode' ) && PanpieTheme::$options['wc_wishlist_icon'] ) { ?>
					<?php
					$args = array(
					'browse_wishlist_text' => '<i class="fa fa-check"></i>',
					'already_in_wishslist_text' => '',
					'product_added_text' => '',
					'icon' => 'fa-heart-o',
					'label' => '',
					'link_classes' => 'add_to_wishlist single_add_to_wishlist alt wishlist-icon',
					);
					?>
					<li><?php echo YITH_WCWL_Shortcode::add_to_wishlist( $args );?> </li>
					<li><?php echo do_shortcode( '[yith_compare_button]' ); ?> </li>	
					<?php } ?>
				</ul>	
			</div>
		<?php endif; 
	}
}

function panpie_wc_shop_info_wrap_end(){
	echo '</div>';
}

function panpie_wc_render_sku(){ 
	get_template_part( 'wc-template-parts/content', 'product-sku' );
}

function panpie_wc_render_meta(){
	get_template_part( 'wc-template-parts/content', 'product-meta' );
}

function panpie_wc_show_or_hide_related_products(){
	// Show or hide related products
	if ( empty( PanpieTheme::$options['wc_related'] ) ) {
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	}
}

function panpie_wc_hide_product_data_tab( $tabs ){
	if ( empty( PanpieTheme::$options['wc_description'] ) ) {
		unset( $tabs['description'] );
	}
	if ( empty( PanpieTheme::$options['wc_reviews'] ) ) {
		unset( $tabs['reviews'] );
	}
	if ( empty( PanpieTheme::$options['wc_additional_info'] ) ) {
		unset( $tabs['additional_information'] );
	}
	return $tabs;
}

function panpie_wc_product_review_form( $comment_form ){
	$commenter = wp_get_current_commenter();

	$comment_form['fields'] = array(
		'author' => '<div class="row"><div class="col-sm-6"><div class="comment-form-author form-group"><input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="' . esc_attr__( 'Name *', 'panpie' ) . '" required /></div></div>',
		'email'  => '<div class="comment-form-email col-sm-6"><div class="form-group"><input id="email" class="form-control" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="' . esc_attr__( 'Email *', 'panpie' ) . '" required /></div></div></div>',
	);

	$comment_form['comment_field'] = '';

	if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
		$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . esc_html__( 'Your Rating', 'panpie' ) .'</label>
		<select name="rating" id="rating" required>
			<option value="">' . esc_html__( 'Rate&hellip;', 'panpie' ) . '</option>
			<option value="5">' . esc_html__( 'Perfect', 'panpie' ) . '</option>
			<option value="4">' . esc_html__( 'Good', 'panpie' ) . '</option>
			<option value="3">' . esc_html__( 'Average', 'panpie' ) . '</option>
			<option value="2">' . esc_html__( 'Not that bad', 'panpie' ) . '</option>
			<option value="1">' . esc_html__( 'Very Poor', 'panpie' ) . '</option>
		</select></p>';
	}

	$comment_form['comment_field'] .= '<div class="acurate"><div class="form-group comment-form-comment"><textarea id="comment" name="comment" class="form-control" placeholder="' . esc_attr__( 'Your Review *', 'panpie' ) . '" cols="45" rows="8" required></textarea></div></div>';

	return $comment_form;
}

function panpie_wc_show_or_hide_cross_sells(){
	// Show or hide related cross sells
	if ( !empty( PanpieTheme::$options['wc_cross_sell'] ) ) {
		add_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10 );
	}
}
/*for meta in the below*/
function panpie_content_after_addtocart_button_func() {

	global $product;
	$cats_html = wc_get_product_category_list( $product->get_id(), ', ', '<div class="product-meta"><span>' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'panpie' ) . '</span> ', '</div>' );
	$tags_html = wc_get_product_tag_list( $product->get_id(), ', ', '<div class="product-meta"><span>' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'panpie' ) . '</span> ', '</div>' );
	?>
	<div class="single-product-meta">
		<?php

		if ( PanpieTheme::$options['wc_cats'] ) {
			echo wp_kses( $cats_html , 'alltext_allow' );
		}
		if ( PanpieTheme::$options['wc_tags'] ) {
			echo wp_kses( $tags_html , 'alltext_allow' );
		}

	?>	
	</div>
	
	
	<?php if (  PanpieTheme::$options['wc_share'] && function_exists( 'panpie_post_share' ) ) { ?>
		<div class="product-share"><span><?php esc_html_e( 'Share:', 'panpie' );?></span><?php panpie_post_share(); ?></div>
	<?php }
}

/*get template - WooCommerce*/
function get_custom_template_part( $template, $args = array() ){
	$template = 'woocommerce/custom/template-parts/' . $template;
	get_template_part( $template, $args );
}
?>