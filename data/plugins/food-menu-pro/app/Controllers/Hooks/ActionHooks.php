<?php
/**
 * Action Hook Class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Controllers\Hooks;

use RT\FoodMenu\Helpers\Fns;
use RT\FoodMenuPro\Helpers\FnsPro;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Action Hook Class.
 */
class ActionHooks {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Class Init.
	 *
	 * @return void
	 */
	protected function init() {
		\remove_action( 'fmp_single_summery', [ TLPFoodMenu(), 'fmp_summery_price' ], 30 );

		\add_action( 'fmp_single_summery', [ $this, 'fmp_summery_price' ], 30 );
		\add_action( 'fmp_single_details', [ $this, 'fmp_single_before_details' ], 10 );
		\add_action( 'fmp_single_details', [ $this, 'fmp_single_tabs' ], 20 );
		\add_action( 'fmp_single_details', [ $this, 'fmp_single_after_details' ], 30 );

		\add_action( 'fmp_review_before', [ $this, 'fmp_review_display_gravatar' ], 10 );
		\add_action( 'fmp_review_before_comment_meta', [ $this, 'fmp_review_display_rating' ], 10 );
		\add_action( 'fmp_review_meta', [ $this, 'fmp_review_display_meta' ], 10 );
		\add_action( 'fmp_review_comment_text', [ $this, 'fmp_review_display_comment_text' ], 10 );

		\add_action( 'pre_get_posts', [ $this, 'pre_get_posts' ] );
		\add_action( 'admin_init', [ $this, 'refresh' ] );
	}

	/**
	 * Price.
	 *
	 * @return void
	 */
	public function fmp_summery_price() {
		$settings      = get_option( TLPFoodMenu()->options['settings'] );
		$hiddenOptions = ! empty( $settings['hide_options'] ) ? $settings['hide_options'] : [];

		if ( ! in_array( 'price', $hiddenOptions ) ) {
			global $post;

			if ( $post->post_type == 'product' && TLPFoodMenu()->isWcActive() ) {
				woocommerce_template_single_price();

				echo '<div class="wc-add-to-cart fmp-qv-add-to-cart">';
				woocommerce_template_single_add_to_cart();
				echo '</div>';
			} else {
				$fmp_type = get_post_meta( $post->ID, '_fmp_type', true );

				if ( 'variable' === $fmp_type ) {
					$variations = get_posts(
						[
							'post_type'      => 'fmp_variation',
							'posts_per_page' => -1,
							'post_status'    => 'any',
							'post_parent'    => $post->ID,
							'order'          => 'ASC',
						]
					);
					$html       = null;

					if ( ! empty( $variations ) ) {
						$html .= '<table class="fmp-price-listing">';

						foreach ( $variations as $variation ) {
							$name  = get_post_meta( $variation->ID, '_name', true );
							$price = FnsPro::getPriceWithSymbol( get_post_meta( $variation->ID, '_price', true ) );
							$html .= "<tr><td>{$name}</td><td>{$price}</td>";
						}

						$html .= '</table>';
					}

					Fns::print_html( $html );
				} else {
					$gTotal = FnsPro::fmpHtmlPrice();
					echo "<div class='offers'>{$gTotal}</div>";
				}
			}
		}
	}

	/**
	 * Ratings
	 *
	 * @return void
	 */
	public function fmp_review_display_rating() {
		Fns::render( 'single/review-rating' );
	}

	/**
	 * Meta.
	 *
	 * @return void
	 */
	public function fmp_review_display_meta() {
		Fns::render( 'single/review-meta' );
	}

	/**
	 * Comment text.
	 *
	 * @return void
	 */
	public function fmp_review_display_comment_text() {
		echo '<div itemprop="description" class="description">';
		comment_text();
		echo '</div>';
	}

	/**
	 * Gravatar display.
	 *
	 * @param string $comment Comment.
	 * @return void
	 */
	public function fmp_review_display_gravatar( $comment ) {
		echo get_avatar( $comment, apply_filters( 'fmp_review_gravatar_size', '60' ), '' );
	}

	/**
	 * Wrapper start.
	 *
	 * @return void
	 */
	public function fmp_single_before_details() {
		echo "<div id='fmp-single-details'>";
	}

	/**
	 * Renders tab.
	 *
	 * @return void
	 */
	public function fmp_single_tabs() {
		Fns::render( 'single/tabs/tabs' );
	}

	/**
	 * Wrapper end.
	 *
	 * @return void
	 */
	public function fmp_single_after_details() {
		echo '</div>';
	}

	/**
	 * pre_get_posts Query update for FMP()->post_type
	 *
	 * @param $wp_query
	 */
	public function pre_get_posts( $wp_query ) {
		if ( is_admin() ) {
			if ( isset( $wp_query->query['post_type'] ) && ! isset( $_GET['orderby'] ) && $wp_query->query['post_type'] == TLPFoodMenu()->post_type && $wp_query->is_main_query() ) {
				$wp_query->set( 'orderby', 'menu_order' );
				$wp_query->set( 'order', 'ASC' );
			}
		}
	}

	/**
	 * Refresh Sorting
	 */
	public function refresh() {
		global $wpdb, $typenow;

		if ( $typenow != TLPFoodMenu()->post_type ) {
			return;
		}

		$results = $wpdb->get_results(
		"
			SELECT ID
			FROM $wpdb->posts
			WHERE post_type = '" . TLPFoodMenu()->post_type . "' AND post_status IN ('publish', 'pending', 'draft', 'private', 'future')
			ORDER BY menu_order ASC
			"
		);

		foreach ( $results as $key => $result ) {
			$wpdb->update( $wpdb->posts, [ 'menu_order' => $key + 1 ], [ 'ID' => $result->ID ] );
		}
	}
}
