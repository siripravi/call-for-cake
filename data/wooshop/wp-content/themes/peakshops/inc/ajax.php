<?php
// Ajax Search.
function thb_ajax_search() {
	check_ajax_referer( 'thb_autocomplete_ajax', 'security' );
	$search_keyword              = filter_input( INPUT_GET, 'query', FILTER_SANITIZE_STRING );
	$product_cat                 = filter_input( INPUT_GET, 'product_cat', FILTER_SANITIZE_STRING );
	$time_start                  = microtime( true );
	$product_visibility_term_ids = wc_get_product_visibility_term_ids();
	$ordering_args               = WC()->query->get_catalog_ordering_args( 'title', 'asc' );
	$suggestions                 = array();

	$args = array(
		's'                   => $search_keyword,
		'post_type'           => 'product',
		'post_status'         => 'publish',
		'ignore_sticky_posts' => 1,
		'posts_per_page'      => 5,
		'orderby'             => $ordering_args['orderby'],
		'order'               => $ordering_args['order'],
		'suppress_filters'    => false,
		'tax_query'           => array(
			array(
				'taxonomy' => 'product_visibility',
				'field'    => 'term_taxonomy_id',
				'terms'    => $product_visibility_term_ids['exclude-from-search'],
				'operator' => 'NOT IN',
			),
		),
	);
	if ( $product_cat && '0' !== $product_cat ) {
		$args['tax_query'] = array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'product_cat',
				'field'    => 'slug',
				'terms'    => $product_cat,
			),
		);
	}

	$products = get_posts( $args );

	if ( ! empty( $products ) ) {
		foreach ( $products as $post ) {
			$product = wc_get_product( $post );

			$suggestions[] = array(
				'id'        => $product->get_id(),
				'value'     => wp_strip_all_tags( $product->get_title() ),
				'url'       => $product->get_permalink(),
				'thumbnail' => $product->get_image(),
				'price'     => $product->get_price_html(),
			);
		}
	} else {
		$suggestions = false;
	}

	$time_end    = microtime( true );
	$time        = $time_end - $time_start;
	$suggestions = array(
		'suggestions' => $suggestions,
		'time'        => $time,
	);
	echo wp_json_encode( $suggestions );
	wp_die();
}

add_action( 'wp_ajax_nopriv_thb_ajax_search', 'thb_ajax_search' );
add_action( 'wp_ajax_thb_ajax_search', 'thb_ajax_search' );

function thb_search_in_wc_category( $query ) {
	if ( ! $query->is_search() ) {
		return $query;
	}
	$product_cat = filter_input( INPUT_GET, 'product_cat', FILTER_SANITIZE_STRING );

	if ( $product_cat && '0' !== $product_cat ) {
		$query->set(
			'tax_query',
			array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'slug',
					'terms'    => $product_cat,
				),
			)
		);
	}
	return $query;
}
add_action( 'pre_get_posts', 'thb_search_in_wc_category', 10 );

// Posts shortcode.
function thb_posts_ajax() {
	check_ajax_referer( 'thb_posts_ajax', 'security' );
	$count = filter_input( INPUT_POST, 'count', FILTER_VALIDATE_INT );
	$loop  = filter_input( INPUT_POST, 'loop', FILTER_SANITIZE_STRING );
	$page  = filter_input( INPUT_POST, 'page', FILTER_VALIDATE_INT );

	$thb_style   = filter_input( INPUT_POST, 'thb_style', FILTER_SANITIZE_STRING );
	$thb_columns = filter_input( INPUT_POST, 'thb_columns', FILTER_SANITIZE_STRING );
	$thb_date    = filter_input( INPUT_POST, 'thb_date', FILTER_VALIDATE_BOOLEAN );
	$thb_cat     = filter_input( INPUT_POST, 'thb_cat', FILTER_VALIDATE_BOOLEAN );
	$thb_excerpt = filter_input( INPUT_POST, 'thb_excerpt', FILTER_VALIDATE_BOOLEAN );

	$source_data          = VcLoopSettings::parseData( $loop );
	$source_data['paged'] = $page;
	$source_data          = thb_move_key_before( $source_data, 'offset', 'paged' );
	$query_builder        = new ThbLoopQueryBuilder( $source_data );
	$posts                = $query_builder->build();
	$more_query           = $posts[1];

	add_filter( 'wp_get_attachment_image_attributes', 'thb_lazy_low_quality', 10, 3 );
	if ( $more_query->have_posts() ) :
		while ( $more_query->have_posts() ) :
			$more_query->the_post();
			set_query_var( 'thb_date', $thb_date );
			set_query_var( 'thb_cat', $thb_cat );
			set_query_var( 'thb_excerpt', $thb_excerpt );
			set_query_var( 'thb_columns', $thb_columns );
			get_template_part( 'inc/templates/post-styles/' . $thb_style );
		endwhile;
	endif;
	wp_die();
}
add_action( 'wp_ajax_nopriv_thb_posts_ajax', 'thb_posts_ajax' );
add_action( 'wp_ajax_thb_posts_ajax', 'thb_posts_ajax' );

// Email Subscribe.
function thb_subscribe_emails() {
	check_ajax_referer( 'thb_subscription', 'security' );
	// the email.
	$email   = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );
	$privacy = filter_input( INPUT_POST, 'privacy', FILTER_VALIDATE_BOOLEAN );
	$checked = filter_input( INPUT_POST, 'checked', FILTER_VALIDATE_BOOLEAN );

	if ( $privacy && ! $checked ) {
		echo '<div class="woocommerce-error">' . esc_html__( 'Please accept the terms of our newsletter.', 'peakshops' ) . '</div>';
		wp_die();
	}
	// if the email is valid.
	if ( is_email( $email ) ) {

		// get all the current emails.
		$stack = get_option( 'subscribed_emails' );

		//if there are no emails in the database.
		if ( ! $stack ) {
			//update the option with the first email as an array.
			update_option( 'subscribed_emails', array( $email ) );
		} else {
			//if the email already exists in the array.
			if ( in_array( $email, $stack, true ) ) {
				echo '<div class="woocommerce-error">' . __( '<strong>Oh snap!</strong> That email address is already subscribed!', 'peakshops' ) . '</div>';
			} else {

				// If there is more than one email, add the new email to the array.
				array_push( $stack, $email );

				//update the option with the new set of emails.
				update_option( 'subscribed_emails', $stack );

				echo '<div class="woocommerce-message">' . __( '<strong>Well done!</strong> Your address has been added.', 'peakshops' ) . '</div>';
			}
		}
	} else {
		echo '<div class="woocommerce-error">' . __( '<strong>Oh snap!</strong> Please enter a valid email address.', 'peakshops' ) . '</div>';
	}
	wp_die();
}
add_action( 'wp_ajax_nopriv_thb_subscribe_emails', 'thb_subscribe_emails' );
add_action( 'wp_ajax_thb_subscribe_emails', 'thb_subscribe_emails' );
