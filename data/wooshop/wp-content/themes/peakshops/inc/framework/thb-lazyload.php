<?php

// Adding Lazyload Class.
function thb_add_lazy_class( $html = '', $new_class ) {
	if ( 'on' === ot_get_option( 'lazy_load', 'on' ) ) {
		$pattern = '/class="([^"]*)"/';
		// Class attribute set.
		if ( preg_match( $pattern, $html, $matches ) ) {
			$predefined_classes = explode( ' ', $matches[1] );
			if ( ! in_array( $new_class, $predefined_classes, true ) && ! in_array( 'rev-slidebg', $predefined_classes, true ) && ! in_array( 'tp-bgimg', $predefined_classes, true ) && ! in_array( 'thb-ignore-lazyload', $predefined_classes, true ) ) {
				$predefined_classes[] = $new_class;
				$html                 = str_replace(
					$matches[0],
					sprintf( 'class="%s"', implode( ' ', $predefined_classes ) ),
					$html
				);
			}
		} else {
			$html = preg_replace( '/(\<.+("\s))/', sprintf( '$1class="%s" ', $new_class ), $html );
		}
	}
	return $html;
}

// Filter Images.
function thb_lazy_images_filter( $content ) {
	if ( 'on' === ot_get_option( 'lazy_load', 'on' ) ) {
		if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
			return $content;
		}
		if ( is_feed()
			|| intval( get_query_var( 'print' ) ) === 1
			|| intval( get_query_var( 'printpage' ) ) === 1
			|| strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera Mini' ) !== false
		) {
			return $content;
		}

		$matches            = array();
		$resp_replace       = 'data-sizes="auto" data-srcset=';
		$skip_images_regex  = '/class=".*lazyload.*"/';
		$skip_images_regex2 = '/class=".*rev-slidebg.*"/';
		$skip_images_regex3 = '/class=".*tp-bgimg.*"/';
		$skip_images_regex4 = '/class=".*attachment-woocommerce_thumbnail.*"/';
		$skip_images_regex5 = '/class=".*thb-ignore-lazyload.*"/';
		$placeholder        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
		preg_match_all( '/<img\s+.*?>/', $content, $matches );

		$search  = array();
		$replace = array();

		foreach ( $matches[0] as $img_html ) {
			// Don't to the replacement if a skip class is provided and the image has the class.
			if ( ! preg_match( $skip_images_regex, $img_html ) && ! preg_match( $skip_images_regex2, $img_html ) && ! preg_match( $skip_images_regex3, $img_html ) && ! preg_match( $skip_images_regex4, $img_html ) && ! preg_match( $skip_images_regex5, $img_html ) ) {

				$replace_html = preg_replace( '/<img(.*?)src=/i', '<img$1src="' . $placeholder . '" data-src=', $img_html );
				$replace_html = preg_replace( '/srcset=/i', $resp_replace, $replace_html );

				$replace_html = thb_add_lazy_class( $replace_html, 'lazyload' );

				array_push( $search, $img_html );
				array_push( $replace, $replace_html );
			}
		}

		$content = str_replace( $search, $replace, $content );
	}
	return $content;
}

// Change source to low quality.
function thb_lazy_low_quality( $attr, $attachment, $size ) {
	if ( 'on' === ot_get_option( 'lazy_load', 'on' ) && is_string( $size ) ) {
		$placeholder = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';

		// Low Quality Image Placeholders.
		$name = explode( '-', $size );
		if ( 'peakshops' === $name[0] ) {
			$name[2]     = 'mini';
			$size        = implode( '-', $name );
			$placeholder = wp_get_attachment_image_src( $attachment->ID, $size );
			$placeholder = $placeholder[0];
		} else {
			$ignored_classes = apply_filters( 'thb_lazy_load_exclude_classes', array( 'thb-ignore-lazyload' ) );

			foreach ( $ignored_classes as $to_ignore ) {
				if ( strpos( $attr['class'], $to_ignore ) !== false ) {
					$placeholder = $attr['src'];
					continue;
				}
			}
		}
		// Lazy Sizes.
		if ( strpos( $attr['class'], 'thb-ignore-lazyload' ) === false ) {
			$attr['data-src']   = $attr['src'];
			$attr['data-sizes'] = 'auto';
			$attr['src']        = $placeholder;
			$attr['class']     .= ' thb-lazyload lazyload';
		}
		// Set Src Set.
		if ( isset( $attr['srcset'] ) ) {
			$attr['data-srcset'] = $attr['srcset'];
			unset( $attr['srcset'] );
		}
	}
	return $attr;
}

// Filters.
if ( ! is_admin() ) {
	add_filter( 'the_content', 'thb_lazy_images_filter', 200 );
	add_filter( 'wp_get_attachment_image_attributes', 'thb_lazy_low_quality', 10, 3 );
}

// SiteGround Optimizer CachePress compatibility.
add_filter( 'sgo_lazy_load_exclude_classes', 'thb_exclude_from_sg' );
function thb_exclude_from_sg( $classes ) {
	$classes[] = 'thb-lazyload';
	$classes[] = 'thb-ignore-lazyload';
	return $classes;
}

// Dokan compatibility.
add_filter( 'dokan_product_image_attributes', 'thb_add_data_src_support' );
function thb_add_data_src_support( $array ) {
	if ( count( $array ) ) {
		$array['img']['data-src']   = array();
		$array['img']['data-sizes'] = array();
	}
	return $array;
}
