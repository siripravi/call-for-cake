<?php function thb_product( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_product', $atts );
	extract( $atts );

	if ( ! thb_wc_supported() ) {
		return;
	}

	$args = array();

	if ( 'latest-products' === $product_sort ) {
		$args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $item_count,
		);
	} elseif ( 'featured-products' === $product_sort ) {
		$args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'tax_query'           => array(
				array(
					'taxonomy' => 'product_visibility',
					'field'    => 'name',
					'terms'    => 'featured',
					'operator' => 'IN',
				),
			),
			'posts_per_page'      => $item_count,
		);
	} elseif ( 'top-rated' === $product_sort ) {
		$ordering_args = WC()->query->get_catalog_ordering_args( 'rating', 'asc' );

		$args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $item_count,
			'meta_key'            => $ordering_args['meta_key'],
			'orderby'             => $ordering_args['orderby'],
			'order'               => $ordering_args['order'],
		);

	} elseif ( 'sale-products' === $product_sort ) {
		$product_ids_on_sale = wc_get_product_ids_on_sale();

		$args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $item_count,
			'post__in'            => $product_ids_on_sale,
		);
	} elseif ( 'by-category' === $product_sort ) {
		$args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'product_cat'         => $cat,
			'posts_per_page'      => $item_count,
		);
	} elseif ( 'by-id' === $product_sort ) {
		$product_id_array = explode( ',', $product_ids );

		$args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'post__in'            => $product_id_array,
			'orderby'             => 'post__in',
		);
	} else {
		$args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'order'               => 'desc',
			'posts_per_page'      => $item_count,
			'meta_key'            => 'total_sales',
			'orderby'             => 'meta_value_num',
		);
	}
	$args['meta_query'] = WC()->query->get_meta_query();
	ob_start();

	$products = new WP_Query( $args );
	$col      = thb_translate_columns( $columns );

	if ( $products->have_posts() ) {

		$classes[] = 'products row';
		$classes[] = $thb_style;
		$classes[] = 'thb-carousel' === $thb_style ? 'thb-product-carousel thb-offset-arrows' : false;
		$classes[] = 'thb-products-spacing-' . $thb_spacing;
		$classes[] = $extra_class;

		?>

		<ul class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" data-autoplay="<?php echo esc_attr( $autoplay ); ?>" data-autoplay-speed="<?php echo esc_attr( $autoplay_speed ); ?>" data-pagination="<?php echo esc_attr( $thb_pagination ); ?>" data-navigation="<?php echo esc_attr( $thb_navigation ); ?>">
			<?php
			while ( $products->have_posts() ) :
				$products->the_post();
				?>
				<?php $product = wc_get_product( $products->post->ID ); ?>
				<?php set_query_var( 'thb_columns', $col ); ?>
				<?php wc_get_template_part( 'content', 'product' ); ?>
			<?php endwhile; // end of the loop. ?>
		</ul>

		<?php
	}

	$out = ob_get_clean();

	wp_reset_query();
	wp_reset_postdata();
	set_query_var( 'thb_animation', false );
	return $out;
}
thb_add_short( 'thb_product', 'thb_product' );
