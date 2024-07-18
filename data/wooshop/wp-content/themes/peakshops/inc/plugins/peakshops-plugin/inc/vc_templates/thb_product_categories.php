<?php function thb_product_categories_sc( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_product_categories', $atts );
	extract( $atts );

	if ( ! thb_wc_supported() ) {
		return;
	}

	$args = $product_categories = $category_ids = array();
	$cats = explode( ',', $cat );

	foreach ( $cats as $cat ) {
		$c = get_term_by( 'slug', $cat, 'product_cat' );

		if ( $c ) {
			array_push( $category_ids, $c->term_id );
		}
	}

	$args = array(
		'orderby'    => $thb_orderby,
		'order'      => 'ASC',
		'hide_empty' => '0',
		'include'    => $category_ids,
	);

	$product_categories = get_terms( 'product_cat', $args );

	ob_start();

	$classes[] = 'products row';
	$classes[] = $thb_style;
	$classes[] = 'thb-carousel' === $thb_style ? 'thb-product-category-carousel thb-offset-arrows' : false;
	$classes[] = $extra_class;

	$col_classes = thb_translate_columns( $columns );
	?>

	<ul class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" data-navigation="true">
		<?php
		if ( $product_categories ) {
			foreach ( $product_categories as $category ) {
				wc_get_template(
					'content-product_cat.php',
					array(
						'category'              => $category,
						'thb_shortcode_columns' => $col_classes,
						'thb_category_style'    => $category_style,
						'thb_counts'            => $category_counts,
					)
				);
			}
		} else {
			esc_html_e( 'Please select Product Categories inside Element settings', 'peakshops' );
		}
		woocommerce_reset_loop();
		?>
	</ul>

	<?php

	$out = ob_get_clean();

	return $out;
}
thb_add_short( 'thb_product_categories', 'thb_product_categories_sc' );
