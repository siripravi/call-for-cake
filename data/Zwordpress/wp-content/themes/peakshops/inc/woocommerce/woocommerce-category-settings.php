<?php
if ( ! thb_wc_supported() ) {
	return;
}
/* Top Content */
function thb_products_top_content() {
	if ( is_shop() && ! is_search() && ! is_paged() ) {
		$shop_top_content = ot_get_option( 'shop_top_content' );

		if ( $shop_top_content && '' !== $shop_top_content ) {
			?>
			<div class="thb-category-top-content" id="thb-shop-top-content">
				<?php echo do_shortcode( $shop_top_content ); ?>
			</div>
			<?php
		}
	} elseif ( is_product_category() ) {
		$thb_id  = get_queried_object_id();
		$content = get_term_meta( $thb_id, 'category_top_content' );
		if ( ! empty( $content[0] ) ) {
			?>
			<div class="thb-category-top-content" id="thb-category-top-content">
				<?php echo do_shortcode( wp_specialchars_decode( $content[0] ) ); ?>
			</div>
			<?php
		}
	}
}
add_action( 'thb_products_before', 'thb_products_top_content' );

/* Bottom Content */
function thb_products_bottom_content() {
	if ( is_shop() && ! is_search() && ! is_paged() ) {
		$shop_bottom_content = ot_get_option( 'shop_bottom_content' );

		if ( $shop_bottom_content && '' !== $shop_bottom_content ) {
			?>
			<div class="thb-category-bottom-content" id="thb-shop-bottom-content">
				<?php echo do_shortcode( $shop_bottom_content ); ?>
			</div>
			<?php
		}
	} elseif ( is_product_category() ) {
		$thb_id  = get_queried_object_id();
		$content = get_term_meta( $thb_id, 'category_bottom_content' );
		if ( ! empty( $content[0] ) ) {
			?>
			<div class="thb-category-bottom-content" id="thb-category-bottom-content">
				<?php echo wp_kses_post( do_shortcode( wp_specialchars_decode( $content[0] ) ) ); ?>
			</div>
			<?php
		}
	}
}
add_action( 'thb_products_after', 'thb_products_bottom_content' );

if ( ! is_admin() ) {
	return;
}
/**
 * Edit category header field.
 */

function thb_edit_category_header_img( $term, $taxonomy ) {
	$image                   = '';
	$header_id               = absint( get_term_meta( $term->term_id, 'header_id', true ) );
	$category_bottom_content = get_term_meta( $term->term_id, 'category_bottom_content', true );
	$category_top_content    = get_term_meta( $term->term_id, 'category_top_content', true );
	if ( $header_id ) {
		$image = wp_get_attachment_image_url( $header_id, 'thumbnail' );
	} else {
		$image = wc_placeholder_img_src();
	}

	?>
	<tr class="form-field">
		<th scope="row"><h2><?php esc_html_e( 'Peak Shops Settings', 'peakshops' ); ?></h2></th>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top"><label><?php esc_html_e( 'Header Image', 'peakshops' ); ?></label></th>
		<td>
			<div id="product_cat_header" style="float:left;margin-right:10px;"><img src="<?php echo esc_url( $image ); ?>" width="60px" height="60px" /></div>
			<div style="line-height: 60px;">
				<input type="hidden" id="product_cat_header_id" name="product_cat_header_id" value="<?php echo esc_attr( $header_id ); ?>" />
				<button type="submit" class="thb_upload_header button"><?php esc_html_e( 'Upload/Add image', 'peakshops' ); ?></button>
				<button type="submit" class="thb_remove_header button"><?php esc_html_e( 'Remove image', 'peakshops' ); ?></button>
			</div>
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top"><label><?php esc_html_e( 'Category Top Content', 'peakshops' ); ?></label></th>
		<td>
			<textarea name="category_top_content" id="category_top_content" rows="5" cols="50" class="large-text" spellcheck="false"><?php echo wp_kses_post( $category_top_content ); ?></textarea>
			<p class="description"><?php esc_html_e( 'This content will appear on top of the category, you can use shortcodes', 'peakshops' ); ?></p>
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top"><label><?php esc_html_e( 'Category Bottom Content', 'peakshops' ); ?></label></th>
		<td>
			<textarea name="category_bottom_content" id="category_bottom_content" rows="5" cols="50" class="large-text" spellcheck="false"><?php echo wp_kses_post( $category_bottom_content ); ?></textarea>
			<p class="description"><?php esc_html_e( 'This content will appear at the bottom of the category, you can use shortcodes', 'peakshops' ); ?></p>
		</td>
	</tr>
	<?php

}

add_action( 'product_cat_edit_form_fields', 'thb_edit_category_header_img', 20, 2 );

/**
 * woocommerce_category_header_img_save function.
 */

function thb_category_header_img_save( $term_id ) {
	$product_cat_header_id   = filter_input( INPUT_POST, 'product_cat_header_id', FILTER_VALIDATE_INT );
	$category_bottom_content = filter_input( INPUT_POST, 'category_bottom_content', FILTER_DEFAULT );
	$category_top_content    = filter_input( INPUT_POST, 'category_top_content', FILTER_DEFAULT );
	if ( isset( $product_cat_header_id ) ) {
		update_term_meta( $term_id, 'header_id', absint( $product_cat_header_id ) );
	}
	if ( isset( $category_bottom_content ) ) {
		update_term_meta( $term_id, 'category_bottom_content', $category_bottom_content );
	}
	if ( isset( $category_top_content ) ) {
		update_term_meta( $term_id, 'category_top_content', $category_top_content );
	}
}
add_action( 'edited_product_cat', 'thb_category_header_img_save', 10, 2 );


/**
 * Header column added to category admin.
 */

function thb_woocommerce_product_cat_header_columns( $columns ) {

	$new_columns           = array();
	$new_columns['cb']     = $columns['cb'];
	$new_columns['thumb']  = esc_html__( 'Image', 'peakshops' );
	$new_columns['header'] = esc_html__( 'Header', 'peakshops' );
	unset( $columns['cb'] );
	unset( $columns['thumb'] );

	return array_merge( $new_columns, $columns );

}

add_filter( 'manage_edit-product_cat_columns', 'thb_woocommerce_product_cat_header_columns' );


/**
 * Thumbnail column value added to category admin.
 */
function thb_woocommerce_product_cat_header_column( $columns, $column, $id ) {

	if ( 'header' === $column ) {
		$image        = '';
		$thumbnail_id = get_term_meta( $id, 'header_id', true );

		if ( $thumbnail_id ) {
			$image = wp_get_attachment_image_url( $thumbnail_id, 'thumbnail' );
		} else {
			$image = wc_placeholder_img_src();
		}
		$columns .= '<img src="' . esc_url( $image ) . '" alt="Thumbnail" class="wp-post-image" height="40" width="40" />';

	}
	return $columns;
}
add_filter( 'manage_product_cat_custom_column', 'thb_woocommerce_product_cat_header_column', 10, 3 );
