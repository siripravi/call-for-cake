<?php
if ( ! thb_wc_supported() ) {
	return;
}
// Add WooCommerce assets to Edit Post Screen.
function thb_set_wc_screen_ids( $screen ) {
	$screen[] = 'post';
	$screen[] = 'page';
	return $screen;
}
add_filter( 'woocommerce_screen_ids', 'thb_set_wc_screen_ids' );

// Product Layout Sizes.
function thb_get_product_size( $style = 'style2', $i = 0 ) {
	$size = '';
	$i    = strval( $i );

	if ( 'style2' === $style ) {
		$i = in_array( $i, array( '3', '4', '5', '6', '10', '11', '12', '13', '17', '18', '19', '20', '24', '25', '26', '27', '31', '32', '33', '34' ), true ) ? 1 : 2;
		switch ( $i ) {
			case 1:
				$size = 'large-3';
				break;
			case 2:
				$size = 'large-4';
				break;
		}
	} elseif ( 'style3' === $style ) {
		$i = in_array( $i, array( '4', '5', '6', '7', '8', '13', '14', '15', '16', '17', '22', '23', '24', '25', '26', '31', '32', '33', '34', '35' ), true ) ? 1 : 2;
		switch ( $i ) {
			case 1:
				$size = 'thb-5';
				break;
			case 2:
				$size = 'large-3';
				break;
		}
	} elseif ( 'style4' === $style ) {
		$i = in_array( $i, array( '5', '6', '7', '8', '9', '10', '16', '17', '18', '19', '20', '21', '27', '28', '29', '30', '31', '32' ), true ) ? 1 : 2;
		switch ( $i ) {
			case 1:
				$size = 'large-2';
				break;
			case 2:
				$size = 'thb-5';
				break;
		}
	} elseif ( 'style5' === $style ) {
		$i = in_array( $i, array( '0', '1', '2', '3', '7', '8', '9', '10', '14', '15', '16', '17', '21', '22', '23', '24', '28', '29', '30', '31' ), true ) ? 1 : 2;
		switch ( $i ) {
			case 2:
				$size = 'large-4';
				break;
			case 1:
				$size = 'large-3';
				break;
		}
	} elseif ( 'style6' === $style ) {
		$i = in_array( $i, array( '5', '6', '7', '8', '14', '15', '16', '17', '23', '24', '25', '26', '32', '33', '34', '35' ), true ) ? 1 : 2;
		switch ( $i ) {
			case 2:
				$size = 'thb-5';
				break;
			case 1:
				$size = 'large-3';
				break;
		}
	} elseif ( 'style7' === $style ) {
		$i = in_array( $i, array( '6', '7', '8', '9', '10', '17', '18', '19', '20', '21', '28', '29', '30', '31', '32', '39', '40', '41', '42', '43' ), true ) ? 1 : 2;
		switch ( $i ) {
			case 2:
				$size = 'large-2';
				break;
			case 1:
				$size = 'thb-5';
				break;
		}
	} elseif ( 'style8' === $style ) {
		$i = in_array( $i, array( '8', '9', '10', '19', '20', '21', '30', '31', '32' ), true ) ? 1 : 2;
		switch ( $i ) {
			case 1:
				$size = 'large-4';
				break;
			case 2:
				$size = 'large-3';
				break;
		}
	}
	return $size;
}
// Pagination.
function thb_woocommerce_pagination_args( $defaults ) {
	$defaults['type']      = 'plain';
	$defaults['prev_text'] = esc_html__( 'Prev', 'peakshops' );
	$defaults['next_text'] = esc_html__( 'Next', 'peakshops' );

	return $defaults;
}
add_filter( 'woocommerce_pagination_args', 'thb_woocommerce_pagination_args' );

// Remove Hooks.
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

// Add Badges.
add_action( 'woocommerce_before_shop_loop_item', 'thb_product_badge', 10 );

// Add Custom Notice wrapper.
add_action( 'thb_after_main', 'thb_custom_notice', 10 );
function thb_custom_notice() {
	?>
	<div class="thb-woocommerce-notices-wrapper"></div>
	<?php
}

// Add Title with Link.
function thb_template_loop_product_title() {
	global $product;
	$product_url = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
	?>
	<?php
	if ( 'on' === ot_get_option( 'shop_product_listing_category', 'on' ) ) {
		$shop_product_listing_category_single = ot_get_option( 'shop_product_listing_category_single', 'on' );
		?>
		<div class="product-category">
			<?php
			if ( 'on' === $shop_product_listing_category_single ) {
				$product_cats = wc_get_product_category_list( get_the_ID(), '\n', '', '' );
				if ( $product_cats ) {
					list( $first_part ) = explode( '\n', $product_cats );
					echo wp_kses(
						$first_part,
						array(
							'a' => array(
								'href' => array(),
								'rel'  => array(),
							),
						)
					);
				}
			} else {
				echo wc_get_product_category_list( $product->get_id(), ', ' );
			}
			?>
		</div>
	<?php } ?>
	<h2 class="<?php echo esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ); ?>"><a href="<?php echo esc_url( $product_url ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	<?php
}
add_action( 'woocommerce_shop_loop_item_title', 'thb_template_loop_product_title', 10 );


// Add Excerpt
function thb_template_loop_product_excerpt() {
	if ( 'off' === ot_get_option( 'shop_product_listing_excerpt', 'off' ) ) {
		return;
	}
	$shop_product_listing_excerpt_words = ot_get_option( 'shop_product_listing_excerpt_words', 12 );
	?>
	<div class="product-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), intval( $shop_product_listing_excerpt_words ), '&hellip;' ) ); ?></div>
	<?php
}
add_action( 'woocommerce_after_shop_loop_item_title', 'thb_template_loop_product_excerpt', 20 );

// Remove Rating Text
function thb_template_loop_product_rating( $html, $rating, $count ) {
	$html = '<span style="width:' . ( ( $rating / 5 ) * 100 ) . '%"></span>';
	return $html;
}
add_filter( 'woocommerce_get_star_rating_html', 'thb_template_loop_product_rating', 5, 3 );


// Add to Cart Styles
add_action( 'before_woocommerce_init', 'thb_different_add_to_cart', 15 );

function thb_different_add_to_cart() {
	$shop_product_listing_button = ot_get_option( 'shop_product_listing_button', 'style1' );
	// Over Image - style2/style3
	if ( 'style2' === $shop_product_listing_button || 'style3' === $shop_product_listing_button ) {
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		add_action( 'thb_loop_after_product_image', 'woocommerce_template_loop_add_to_cart', 10 );
	}
	// Transform Price
	if ( 'style4' === $shop_product_listing_button ) {
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

		add_action( 'thb_template_loop_price', 'woocommerce_template_loop_price' );
		add_action( 'thb_template_loop_add_to_cart', 'woocommerce_template_loop_add_to_cart' );
		add_action(
			'woocommerce_after_shop_loop_item_title',
			function() {
				?>
			<div class="thb_transform_price">
				<div class="thb_transform_loop_price">
					<?php do_action( 'thb_template_loop_price' ); ?>
				</div>
				<div class="thb_transform_loop_buttons">
					<?php do_action( 'thb_template_loop_add_to_cart' ); ?>
				</div>
			</div>
				<?php
			},
			15
		);
	}
	// Icon
	if ( 'style3' === $shop_product_listing_button ) {
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		add_filter(
			'woocommerce_product_add_to_cart_text',
			function( $var ) {
				$text = '<span class="thb-icon-text on-left">' . $var . '</span>';
				return thb_load_template_part( 'assets/img/svg/add-to-cart.svg' ) . $text;
			}
		);
		add_action( 'thb_loop_after_product_image', 'woocommerce_template_loop_add_to_cart', 10 );
	}
	// No Button
	if ( 'style0' === $shop_product_listing_button ) {
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	}
	// Icon with Count
	if ( 'style5' === $shop_product_listing_button ) {
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		add_filter(
			'woocommerce_product_add_to_cart_text',
			function( $var ) {
				$text = '<span class="thb-icon-text on-right">' . $var . '</span>';
				return thb_load_template_part( 'assets/img/svg/add-to-cart.svg' ) . $text;
			}
		);
		function thb_product_listing_button_style5() {
			global $product;
			?>
			<div class="thb-addtocart-with-quantity">
				<?php
				if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
					?>
					<form action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="cart" method="post" enctype="multipart/form-data">
						<?php echo woocommerce_quantity_input( array(), $product, false ); ?>
						<?php woocommerce_template_loop_add_to_cart(); ?>
					</form>
				<?php } else { ?>
					<?php woocommerce_template_loop_add_to_cart(); ?>
				<?php } ?>
			</div>
			<?php
		}
		add_action( 'woocommerce_after_shop_loop_item', 'thb_product_listing_button_style5', 10 );
	}
};

// Filter just the args for adding a custom data attribute.

add_filter( 'woocommerce_loop_add_to_cart_args', 'thb_filter_woocommerce_loop_add_to_cart_args', 10, 2 );
function thb_filter_woocommerce_loop_add_to_cart_args( $args, $product ) {
	$shop_product_listing_button_color = ot_get_option( 'shop_product_listing_button_color', 'black' );
	$shop_product_listing_button       = ot_get_option( 'shop_product_listing_button', 'style1' );

	if ( 'style2' === $shop_product_listing_button || 'style1' === $shop_product_listing_button || 'style3' === $shop_product_listing_button || 'style5' === $shop_product_listing_button ) {

		if ( 'style1' === $shop_product_listing_button && 'white-alt' === $shop_product_listing_button_color ) {
			$shop_product_listing_button_color = 'style2';
		}
		if ( 'style1' === $shop_product_listing_button ) {
			$args['class'] .= ' small';
		}
		$args['class'] .= ' ' . $shop_product_listing_button_color;
	}
	return $args;
}

// Breadcrumb Delimiter.
function thb_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = ' <i>/</i> ';
	return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'thb_change_breadcrumb_delimiter' );

function thb_swatches_list() {
	if ( 'off' === ot_get_option( 'shop_product_listing_attribute_display', 'off' ) ) {
		return;
	}
	global $product;

	$thb_id = $product->get_id();

	if ( empty( $thb_id ) || ! $product->is_type( 'variable' ) ) {
		return false;
	}
	$attribute_name = ot_get_option( 'shop_product_listing_variation' );
	if ( empty( $attribute_name ) ) {
		return false;
	}
	$transient_name = 'thb_listing_swatches_' . esc_attr( sanitize_title( $attribute_name ) ) . '_' . $thb_id;
	$return_html    = get_transient( $transient_name );
	if ( false === $return_html ) {
		$available_variations = $product->get_available_variations();
		if ( empty( $available_variations ) ) {
			return false;
		}
		$attribute_id = wc_attribute_taxonomy_id_by_name( sanitize_title( $attribute_name ) );
		$attribute    = wc_get_attribute( $attribute_id );
		$terms        = wc_get_product_terms( $thb_id, $attribute->slug, array( 'fields' => 'all' ) );

		$swatches = new THB_Product_Attributes();
		$html     = '';
		foreach ( $terms as $term ) {
			$html .= $swatches->thb_render_swatch( $attribute->type, $term, '', $attribute->slug, $available_variations );
		}
		$return_html = '<div class="thb-swatches ' . esc_attr( $attribute->type ) . '-swatch" data-attribute_name="attribute_' . esc_attr( $attribute->slug ) . '">' . $html . '</div>';

		set_transient( $transient_name, $return_html, HOUR_IN_SECONDS );
	}
	echo apply_filters( 'thb_listing_swatches_html', $return_html );
}
add_action( 'woocommerce_after_shop_loop_item_title', 'thb_swatches_list', 40 );
