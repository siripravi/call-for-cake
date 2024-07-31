<?php
/**
 * Load More Ajax Class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Controllers\Frontend\Ajax;

use WP_Query;
use RT\FoodMenu\Helpers\Fns;
use RT\FoodMenu\Helpers\Options;
use RT\FoodMenu\Helpers\RenderHelpers;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Load More Ajax Class.
 */
class LoadMore {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Class Init.
	 *
	 * @return void
	 */
	protected function init() {
		\add_action( 'wp_ajax_fmpLoadMore', [ $this, 'response' ] );
		\add_action( 'wp_ajax_nopriv_fmpLoadMore', [ $this, 'response' ] );
	}

	/**
	 * Ajax Response.
	 *
	 * @return void
	 */
	public function response() {
		$error = true;
		$msg   = $data = null;

		if ( Fns::verifyNonce() ) {
			$scID = absint( $_REQUEST['scID'] );

			if ( $scID && ! is_null( get_post( $scID ) ) ) {
				$scMeta = get_post_meta( $scID );
				$layout = ( ! empty( $scMeta['fmp_layout'][0] ) ? $scMeta['fmp_layout'][0] : 'layout-free' );

				$dCol = ( ! empty( $scMeta['fmp_desktop_column'][0] ) ? absint( $scMeta['fmp_desktop_column'][0] ) : 0 );
				$tCol = ( ! empty( $scMeta['fmp_tab_column'][0] ) ? absint( $scMeta['fmp_tab_column'][0] ) : 0 );
				$mCol = ( ! empty( $scMeta['fmp_mobile_column'][0] ) ? absint( $scMeta['fmp_mobile_column'][0] ) : 0 );

				$dCol = 0 === $dCol ? RenderHelpers::defaultColumns( $layout ) : $dCol;
				$tCol = 0 === $tCol ? 2 : $tCol;
				$mCol = 0 === $mCol ? 1 : $mCol;

				$imgSize       = ( ! empty( $scMeta['fmp_image_size'][0] ) ? $scMeta['fmp_image_size'][0] : 'medium' );
				$excerpt_limit = ( ! empty( $scMeta['fmp_excerpt_limit'][0] ) ? absint( $scMeta['fmp_excerpt_limit'][0] ) : 0 );

				$isIsotope  = preg_match( '/isotope/', $layout );
				$isCarousel = preg_match( '/carousel/', $layout );

				/* Argument create */
				$args              = $arg = [];
				$source            = get_post_meta( $scID, 'fmp_source', true );
				$args['post_type'] = ( $source && in_array( $source, array_keys( Options::scProductSource() ) ) ) ? $source : TLPFoodMenu()->post_type;
				$categoryTaxonomy  = ( $args['post_type'] == 'product' ) ? 'product_cat' : TLPFoodMenu()->taxonomies['category'];
				$arg['taxonomy']   = $categoryTaxonomy;
				// Common filter.
				/* post__in */
				$post__in = ( isset( $scMeta['fmp_post__in'][0] ) ? $scMeta['fmp_post__in'][0] : null );

				if ( $post__in ) {
					$post__in         = explode( ',', $post__in );
					$args['post__in'] = $post__in;
				}
				/* post__not_in */
				$post__not_in = ( isset( $scMeta['fmp_post__not_in'][0] ) ? $scMeta['fmp_post__not_in'][0] : null );

				if ( $post__not_in ) {
					$post__not_in         = explode( ',', $post__not_in );
					$args['post__not_in'] = $post__not_in;
				}

				/* LIMIT */
				$limit                  = ( ( empty( $scMeta['fmp_limit'][0] ) || $scMeta['fmp_limit'][0] === '-1' ) ? 10000000 : (int) $scMeta['fmp_limit'][0] );
				$args['posts_per_page'] = $limit;
				$pagination             = ( ! empty( $scMeta['fmp_pagination'][0] ) ? true : false );

				if ( $pagination ) {
					$posts_per_page = ( isset( $scMeta['fmp_posts_per_page'][0] ) ? intval( $scMeta['fmp_posts_per_page'][0] ) : $limit );

					if ( $posts_per_page > $limit ) {
						$posts_per_page = $limit;
					}

					// Set 'posts_per_page' parameter.
					$args['posts_per_page'] = $posts_per_page;

					$paged = ( ! empty( $_REQUEST['paged'] ) ) ? absint( $_REQUEST['paged'] ) : 2;

					$offset        = $posts_per_page * ( (int) $paged - 1 );
					$args['paged'] = $paged;

					// Update posts_per_page.
					if ( intval( $args['posts_per_page'] ) > $limit - $offset ) {
						$args['posts_per_page'] = $limit - $offset;
						$args['offset']         = $offset;
					}
				}

				// Taxonomy.
				$cats = ( isset( $scMeta['fmp_categories'] ) ? array_filter( $scMeta['fmp_categories'] ) : [] );
				$taxQ = [];

				if ( is_array( $cats ) && ! empty( $cats ) ) {
					$taxQ[] = [
						'taxonomy' => $categoryTaxonomy,
						'field'    => 'term_id',
						'terms'    => $cats,
					];
				}

				if ( ! empty( $taxQ ) ) {
					$args['tax_query'] = $taxQ;
				}

				// Order.
				$order_by = ( isset( $scMeta['fmp_order_by'][0] ) ? $scMeta['fmp_order_by'][0] : null );
				$order    = ( isset( $scMeta['fmp_order'][0] ) ? $scMeta['fmp_order'][0] : null );

				if ( $order ) {
					$args['order'] = $order;
				}

				if ( $order_by ) {
					if ( $order_by == 'price' ) {
						$args['orderby']  = 'meta_value_num';
						$args['meta_key'] = '_price';
					} else {
						$args['orderby'] = $order_by;
					}
				}

				// Validation.
				$dCol = round( 12 / $dCol );
				$tCol = round( 12 / $tCol );
				$mCol = round( 12 / $mCol );

				if ( $isCarousel ) {
					$dCol = $tCol = $mCol = 12;
				}

				$arg['grid'] = "fmp-col-lg-{$dCol} fmp-col-md-{$dCol} fmp-col-sm-{$tCol} fmp-col-xs-{$mCol}";
				$gridType    = ! empty( $scMeta['fmp_grid_style'][0] ) ? $scMeta['fmp_grid_style'][0] : 'even';

				$arg['customImgSize'] = get_post_meta( $scID, 'fmp_custom_image_size', true );
				$arg['defaultImgId']  = ( ! empty( $scMeta['fmp_placeholder_image'][0] ) ? absint( $scMeta['fmp_placeholder_image'][0] ) : null );

				$arg['add_to_cart_text'] = ! empty( $scMeta['fmp_add_to_cart_text'][0] ) ? esc_attr( $scMeta['fmp_add_to_cart_text'][0] ) : esc_html__( 'Add to cart', 'food-menu-pro' );
				$arg['read_more']        = ! empty( $scMeta['fmp_read_more_button_text'][0] ) ? esc_attr( $scMeta['fmp_read_more_button_text'][0] ) : null;
				$arg['class']            = $gridType . '-grid-item';
				$arg['class']           .= ' fmp-grid-item';

				if ( ! $isIsotope ) {
					$arg['class'] .= ' fmp-ready-animation animated fadeIn';
				} else {
					$arg['class'] .= ' fmp-isotope-item';
				}

				if ( $isCarousel ) {
					$arg['class'] .= ' fmp-carousel-item';
				}

				$margin = ! empty( $scMeta['fmp_margin'][0] ) ? $scMeta['fmp_margin'][0] : 'default';

				if ( $margin == 'no' ) {
					$arg['class'] .= ' no-margin';
				}

				$image_shape = ! empty( $scMeta['fmp_image_shape'][0] ) ? $scMeta['fmp_image_shape'][0] : null;

				// if ( $image_shape == 'circle' ) {
				// 	$arg['class'] .= ' fmp-img-circle';
				// }

				$arg['items']       = ! empty( $scMeta['fmp_item_fields'] ) ? $scMeta['fmp_item_fields'] : [];
				$arg['anchorClass'] = null;
				$link               = ! empty( $scMeta['fmp_detail_page_link'][0] ) ? true : false;
				$popup              = ! empty( $scMeta['fmp_single_food_popup'][0] ) ? true : false;

				if ( $link ) {
					if ( $popup ) {
						$arg['anchorClass'] .= ' fmp-popup';
					}

					$arg['link'] = true;
				} else {
					$arg['link']         = false;
					$arg['anchorClass'] .= ' fmp-disable';
				}

				$arg['wc']     = TLPFoodMenu()->isWcActive();
				$arg['source'] = $args['post_type'];
				$fmpQuery      = new WP_Query( $args );

				// Start layout.
				if ( $fmpQuery->have_posts() ) {

					while ( $fmpQuery->have_posts() ) {
						$fmpQuery->the_post();

						$pID            = get_the_ID();
						$arg['pID']     = $pID;
						$arg['title']   = get_the_title();
						$arg['pLink']   = get_permalink();
						$excerpt        = get_the_excerpt();
						$arg['excerpt'] = RenderHelpers::getExcerpt( $excerpt, $scMeta['fmp_excerpt_limit'][0], $scMeta['fmp_excerpt_custom_text'][0] );

						if ( $isIsotope ) {
							$termAs    = wp_get_post_terms(
								$pID,
								$categoryTaxonomy,
								[ 'fields' => 'all' ]
							);
							$isoFilter = null;

							if ( ! empty( $termAs ) ) {
								foreach ( $termAs as $term ) {
									$isoFilter .= ' ' . 'iso_' . $term->term_id;
								}
							}

							$arg['isoFilter'] = $isoFilter;
						}

						$arg['imgSize'] = $imgSize;
						$data          .= Fns::render( 'layouts/' . $layout, $arg, true );

					}

					if ( ! empty( $data ) ) {
						$error = false;
					}
				} else {
					$msg = esc_html__( 'No More Post to load', 'food-menu-pro' );
				}
				wp_reset_postdata();

			} else {
				$msg = esc_html__( 'No More Post to load', 'food-menu-pro' );
			}
		} else {
			$msg = esc_html__( 'Security error', 'food-menu-pro' );
		}
		wp_send_json(
			[
				'error' => $error,
				'msg'   => $msg,
				'data'  => $data,
			]
		);
		die();
	}
}
