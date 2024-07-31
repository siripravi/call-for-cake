<?php
/**
 * CPT Admin Columns Class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Controllers\Admin;

use RT\FoodMenu\Helpers\Fns;
use RT\FoodMenuPro\Helpers\FnsPro;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Admin Columns Class.
 */
class AdminColumns {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Class Init.
	 *
	 * @return void
	 */
	protected function init() {
		\add_action( 'restrict_manage_posts', [ $this, 'add_taxonomy_filters' ] );
		\add_filter( 'manage_edit-food-menu_columns', [ $this, 'arrange_fmp_columns' ] );
		\add_action( 'manage_food-menu_posts_custom_column', [ $this, 'manage_fmp_columns' ], 10, 2 );

		// Add cat columns.
		\add_filter( 'manage_edit-food-menu-cat_columns', [ $this, 'fmp_cat_columns' ] );
		\add_filter( 'manage_food-menu-cat_custom_column', [ $this, 'fmp_cat_column' ], 10, 3 );
	}

	public function add_taxonomy_filters() {
		global $typenow;

		// Must set this to the post type you want the filter(s) displayed on
		if ( TLPFoodMenu()->post_type !== $typenow ) {
			return;
		}

		foreach ( TLPFoodMenu()->taxonomies as $tax_slug ) {
			echo $this->build_taxonomy_filter( $tax_slug );
		}
	}

	/**
	 * Build an individual dropdown filter.
	 *
	 * @param string $tax_slug Taxonomy slug to build filter for.
	 *
	 * @return string Markup, or empty string if taxonomy has no terms.
	 */
	protected function build_taxonomy_filter( $tax_slug ) {
		$terms = get_terms( $tax_slug );

		if ( 0 == count( $terms ) ) {
			return '';
		}

		$tax_name         = $this->get_taxonomy_name_from_slug( $tax_slug );
		$current_tax_slug = isset( $_GET[ $tax_slug ] ) ? $_GET[ $tax_slug ] : false;
		$filter           = '<select name="' . esc_attr( $tax_slug ) . '" id="' . esc_attr( $tax_slug ) . '" class="postform">';
		$filter          .= '<option value="0">' . esc_html( $tax_name ) . '</option>';
		$filter          .= $this->build_term_options( $terms, $current_tax_slug );
		$filter          .= '</select>';

		return $filter;
	}

	/**
	 * Get the friendly taxonomy name, if given a taxonomy slug.
	 *
	 * @param string $tax_slug Taxonomy slug.
	 *
	 * @return string Friendly name of taxonomy, or empty string if not a valid taxonomy.
	 */
	protected function get_taxonomy_name_from_slug( $tax_slug ) {
		$tax_obj = get_taxonomy( $tax_slug );
		if ( ! $tax_obj ) {
			return '';
		}

		return $tax_obj->labels->name;
	}

	/**
	 * Build a series of option elements from an array.
	 *
	 * Also checks to see if one of the options is selected.
	 *
	 * @param array  $terms            Array of term objects.
	 * @param string $current_tax_slug Slug of currently selected term.
	 *
	 * @return string Markup.
	 */
	protected function build_term_options( $terms, $current_tax_slug ) {
		$options = '';

		foreach ( $terms as $term ) {
			$options .= sprintf(
				"<option value='%s' %s />%s</option>",
				esc_attr( $term->slug ),
				selected( $current_tax_slug, $term->slug, false ),
				esc_html( $term->name . '(' . $term->count . ')' )
			);
		}

		return $options;
	}

	public function arrange_fmp_columns( $columns ) {
		if ( isset( $columns['title'] ) ) {
			unset( $columns['title'] );
		}

		$cols          = [];
		$cols['cb']    = $columns['cb'];
		$cols['thumb'] = '<span class="fmp-image tips" data-tip="' . esc_attr__( 'Image', 'food-menu-pro' ) . '">' . esc_html__( 'Image', 'food-menu-pro' ) . '</span>';
		$cols['title'] = esc_html__( 'Name', 'food-menu-pro' );
		$cols['stock'] = esc_html__( 'Stock', 'food-menu-pro' );
		$cols['price'] = esc_html__( 'Price', 'food-menu-pro' );

		if ( isset( $columns['cb'] ) ) {
			unset( $columns['cb'] );
		}

		return array_merge( $cols, $columns );
	}

	public function manage_fmp_columns( $column, $post_id ) {
		switch ( $column ) {
			case 'thumb':
				echo get_the_post_thumbnail( $post_id, 'thumbnail' );
				break;

			case 'stock':
				echo FnsPro::getStockStatus( $post_id );
				break;

			case 'price':
				$price = FnsPro::fmpHtmlPrice( $post_id );
				echo ! empty( $price ) ? $price : '<span class="na">–</span>';
				break;
		}
	}

	/**
	 * Thumbnail column added to category admin.
	 *
	 * @param mixed $columns
	 *
	 * @return array
	 */
	public function fmp_cat_columns( $columns ) {
		$new_columns = [];

		if ( isset( $columns['cb'] ) ) {
			$new_columns['cb'] = $columns['cb'];
			unset( $columns['cb'] );
		}

		$new_columns['_fmp_thumb']       = esc_html__( 'Image', 'food-menu-pro' );
		$new_columns_order['_fmp_order'] = esc_html__( 'Order', 'food-menu-pro' );

		return array_merge( $new_columns, $columns, $new_columns_order );
	}

	/**
	 * Thumbnail column value added to category admin.
	 *
	 * @param string $columns
	 * @param string $column
	 * @param int    $id
	 *
	 * @return array
	 */
	public function fmp_cat_column( $columns, $column, $id ) {
		if ( '_fmp_thumb' == $column ) {
			$thumbnail_id = get_term_meta( $id, 'fmp_cat_thumbnail_id', true );

			if ( $thumbnail_id ) {
				$image = wp_get_attachment_thumb_url( $thumbnail_id );
			} else {
				$image = Fns::placeholder_img_src();
			}

			// Prevent esc_url from breaking spaces in urls for image embeds
			// Ref: https://core.trac.wordpress.org/ticket/23605
			$image    = str_replace( ' ', '%20', $image );
			$columns .= '<img src="' . esc_url( $image ) . '" alt="' . esc_attr__( 'Thumbnail', 'food-menu-pro' ) . '" class="wp-post-image" height="48" width="48" />';

		}

		if ( '_fmp_order' == $column ) {
			$columns .= absint( get_term_meta( $id, '_order', true ) );
		}

		return $columns;
	}
}
