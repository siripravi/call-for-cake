<?php
/**
 * Filter Hook Class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Controllers\Hooks;

use RT\FoodMenu\Helpers\Fns;
use RT\FoodMenuPro\Helpers\FnsPro;
use RT\FoodMenuPro\Helpers\OptionsPro;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Filter Hook  Class.
 */
class FilterHooks {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Class Init.
	 *
	 * @return void
	 */
	protected function init() {
		\add_filter( 'fmp_food_menu_tabs', [ $this, 'default_tabs' ] );
		\add_filter( 'fmp_food_menu_tabs', [ $this, 'sort_tabs' ], 99 );
		\add_filter( 'rt_fm_setting_fields', [ $this, 'setting_fields' ] );
		\add_filter( 'fmp_sc_layout_types', [ $this, 'scLayoutTypes' ] );
		\add_filter( 'fmp_sc_layouts', [ $this, 'scLayout' ] );
		\add_filter( 'fmp_image_size', [ $this, 'get_image_sizes' ] );
		\add_filter( 'fmp_sc_order_by', [ $this, 'scOrderBy' ] );
		\add_filter( 'fmp_item_fields', [ $this, 'fmpItemFields' ] );
		\add_filter( 'fmp_sc_pagination_type', [ $this, 'fmpPaginationType' ] );
		\add_filter( 'rtfm_layout_default_columns', [ $this, 'scLayoutColumns' ], 10, 2 );
	}

	function setting_fields( $settings ) {
		return array_merge(
			$settings,
			OptionsPro::rtLicenceField()
		);
	}

	public function scLayoutTypes( $types ) {
		$types = [
			'grid'        => [
				'title' => esc_html__( 'Grid Layouts', 'food-menu-pro' ),
				'img'   => TLPFoodMenu()->assets_url() . 'images/layouts/grid-layouts.png',
			],
			'list'        => [
				'title' => esc_html__( 'List Layouts', 'food-menu-pro' ),
				'img'   => TLPFoodMenu()->assets_url() . 'images/layouts/list-layouts.png',
			],
			'grid-by-cat' => [
				'title' => esc_html__( 'Grid by Category Layouts', 'food-menu-pro' ),
				'img'   => TLPFoodMenu()->assets_url() . 'images/layouts/grid-by-category-layouts.png',
			],
			'slider'      => [
				'title' => esc_html__( 'Slider Layouts', 'food-menu-pro' ),
				'img'   => TLPFoodMenu()->assets_url() . 'images/layouts/carousel-3.png',
			],
			'isotope'     => [
				'title' => esc_html__( 'Isotope Filters Layouts', 'food-menu-pro' ),
				'img'   => TLPFoodMenu()->assets_url() . 'images/layouts/isotope-filters-layouts.png',
			],
		];

		return $types;
	}

	public function scLayout( $layouts ) {
		return array_merge(
			$layouts,
			[
				'grid-by-cat-free-2' => [
					'title'  => esc_html__( 'Grid By Category 5', 'tlp-food-menu' ),
					'layout' => 'grid-by-cat',
					'img'    => TLPFoodMenu()->assets_url() . 'images/layouts/grid-by-category-2.png',
					// 'layout_link' => esc_url( 'https://www.radiustheme.com/demo/plugins/food-menu/menu-by-category/' ),
				],
				'grid-by-cat1' => [
					'title'  => esc_html__( 'Grid By Category 6', 'food-menu-pro' ),
					'layout' => 'grid-by-cat',
					'img'    => FMP()->assets_url() . 'images/layouts/grid-by-category-6.png',
					// 'layout_link' => esc_url( 'https://www.radiustheme.com/demo/plugins/food-menu/menu-by-category-2/' ),
				],
				'grid-by-cat2' => [
					'title'  => esc_html__( 'Grid By Category 7', 'food-menu-pro' ),
					'layout' => 'grid-by-cat',
					'img'    => FMP()->assets_url() . 'images/layouts/grid-by-category-7.png',
					// 'layout_link' => esc_url( 'https://www.radiustheme.com/demo/plugins/food-menu/category-menu-2/' ),
				],
				'layout1'      => [
					'title'  => esc_html__( 'Grid Layout 1', 'food-menu-pro' ),
					'layout' => 'grid',
					'img'    => FMP()->assets_url() . 'images/layouts/grid-layout-1.png',
					// 'layout_link' => esc_url( 'https://www.radiustheme.com/demo/plugins/food-menu/grid-layout-1/' ),
				],
				'layout2'      => [
					'title'  => esc_html__( 'List Layout 5', 'food-menu-pro' ),
					'layout' => 'list',
					'img'    => TLPFoodMenu()->assets_url() . 'images/layouts/list-layout-5.png',
					// 'layout_link' => esc_url( 'https://www.radiustheme.com/demo/plugins/food-menu/grid-layout-2/' ),
				],
				'layout3'      => [
					'title'  => esc_html__( 'Grid Layout 2', 'food-menu-pro' ),
					'layout' => 'grid',
					'img'    => FMP()->assets_url() . 'images/layouts/grid-layout-2.png',
					// 'layout_link' => esc_url( 'https://www.radiustheme.com/demo/plugins/food-menu/grid-layout-3/' ),
				],
				'layout4'      => [
					'title'  => esc_html__( 'List Layout 6', 'food-menu-pro' ),
					'layout' => 'list',
					'img'    => TLPFoodMenu()->assets_url() . 'images/layouts/list-layout-6.png',
					// 'layout_link' => esc_url( 'https://www.radiustheme.com/demo/plugins/food-menu/grid-layout-4/' ),
				],
				'layout6'      => [
					'title'  => esc_html__( 'Grid Layout 3', 'food-menu-pro' ),
					'layout' => 'grid',
					'img'    => FMP()->assets_url() . 'images/layouts/grid-layout-3.png',
					// 'layout_link' => esc_url( 'https://www.radiustheme.com/demo/plugins/food-menu/layout-5/' ),
				],
				'layout7'      => [
					'title'  => esc_html__( 'Grid Layout 4', 'food-menu-pro' ),
					'layout' => 'grid',
					'img'    => FMP()->assets_url() . 'images/layouts/grid-layout-4.png',
					// 'layout_link' => esc_url( 'https://www.radiustheme.com/demo/plugins/food-menu/layout-5/' ),
				],
				'layout8'      => [
					'title'  => esc_html__( 'Grid Layout 5', 'food-menu-pro' ),
					'layout' => 'grid',
					'img'    => FMP()->assets_url() . 'images/layouts/grid-layout-5.png',
					// 'layout_link' => esc_url( 'https://www.radiustheme.com/demo/plugins/food-menu/layout-5/' ),
				],
				'layout5'      => [
					'title'  => esc_html__( 'List Layout 7', 'food-menu-pro' ),
					'layout' => 'list',
					'img'    => TLPFoodMenu()->assets_url() . 'images/layouts/list-layout-7.png',
					// 'layout_link' => esc_url( 'https://www.radiustheme.com/demo/plugins/food-menu/layout-5/' ),
				],
				'carousel1'    => [
					'title'  => esc_html__( 'Carousel 1', 'food-menu-pro' ),
					'layout' => 'slider',
					'img'    => FMP()->assets_url() . 'images/layouts/carousel-1.png',
					// 'layout_link' => esc_url( 'https://www.radiustheme.com/demo/plugins/food-menu/slider-1/' ),
				],
				'carousel2'    => [
					'title'  => esc_html__( 'Carousel 2', 'food-menu-pro' ),
					'layout' => 'slider',
					'img'    => FMP()->assets_url() . 'images/layouts/carousel-2.png',
					// 'layout_link' => esc_url( 'https://www.radiustheme.com/demo/plugins/food-menu/slider-2/' ),
				],
				'carousel3'    => [
					'title'  => esc_html__( 'Carousel 3', 'food-menu-pro' ),
					'layout' => 'slider',
					'img'    => FMP()->assets_url() . 'images/layouts/carousel-3.png',
					// 'layout_link' => esc_url( 'https://www.radiustheme.com/demo/plugins/food-menu/slider-3/' ),
				],
				'carousel4'    => [
					'title'  => esc_html__( 'Carousel 4', 'food-menu-pro' ),
					'layout' => 'slider',
					'img'    => FMP()->assets_url() . 'images/layouts/carousel-4.png',
					// 'layout_link' => esc_url( 'https://www.radiustheme.com/demo/plugins/food-menu/slider-4/' ),
				],
				'isotope1'     => [
					'title'  => esc_html__( 'Isotope 1', 'food-menu-pro' ),
					'layout' => 'isotope',
					'img'    => FMP()->assets_url() . 'images/layouts/isotope-1.png',
					// 'layout_link' => esc_url( 'https://www.radiustheme.com/demo/plugins/food-menu/filter-1/' ),
				],
				'isotope2'     => [
					'title'  => esc_html__( 'Isotope 2', 'food-menu-pro' ),
					'layout' => 'isotope',
					'img'    => FMP()->assets_url() . 'images/layouts/isotope-2.png',
					// 'layout_link' => esc_url( 'https://www.radiustheme.com/demo/plugins/food-menu/filter-2-even-masonry/' ),
				],
				'isotope3'     => [
					'title'  => esc_html__( 'Isotope 3', 'food-menu-pro' ),
					'layout' => 'isotope',
					'img'    => FMP()->assets_url() . 'images/layouts/isotope-3.png',
					// 'layout_link' => esc_url( 'https://www.radiustheme.com/demo/plugins/food-menu/filter-3-even-masonry/' ),
				],
				'isotope4'     => [
					'title'  => esc_html__( 'Isotope 4', 'food-menu-pro' ),
					'layout' => 'isotope',
					'img'    => FMP()->assets_url() . 'images/layouts/isotope-4.png',
					// 'layout_link' => esc_url( 'https://www.radiustheme.com/demo/plugins/food-menu/filter-4-even-masonry/' ),
				],
			]
		);
	}

	public function get_image_sizes( $imgSize ) {
		$imgSize['full']       = esc_html__( 'Full Size', 'food-menu-pro' );
		$imgSize['fmp_custom'] = esc_html__( 'Custom Image Size', 'food-menu-pro' );

		return $imgSize;
	}

	public function scOrderBy( $order_by ) {
		$order_by['rand'] = esc_html__( 'Random', 'food-menu-pro' );

		return $order_by;
	}

	public function fmpItemFields( $items ) {
		$proItems = [
			// 'categories' => esc_html__( 'Categories', 'food-menu-pro' ),
			// 'label'      => esc_html__( 'Label', 'food-menu-pro' ),
			'read_more' => esc_html__( 'Read More', 'food-menu-pro' ),
		];

		if ( TLPFoodMenu()->isWcActive() ) {
			$proItems['add_to_cart'] = esc_html__( 'Add to cart (WooCommerce)', 'food-menu-pro' );
			$proItems['quantity']    = esc_html__( 'Quantity (WooCommerce)', 'food-menu-pro' );
		}

		return array_merge( $items, $proItems );
	}

	public function fmpPaginationType( $types ) {
		$proTypes = [
			'pagination_ajax' => esc_html__( 'Ajax Numbered Pagination', 'food-menu-pro' ),
			'load_more'       => esc_html__( 'Ajax Load More Button', 'food-menu-pro' ),
			'load_on_scroll'  => esc_html__( 'Ajax Load More on Scroll', 'food-menu-pro' ),
		];

		return array_merge( $types, $proTypes );
	}

	public function sort_tabs( $tabs = [] ) {
		// Make sure the $tabs parameter is an array.
		if ( ! is_array( $tabs ) ) {
			trigger_error( 'Function sort_tabs() expects an array as the first parameter. Defaulting to empty array.' );
			$tabs = [];
		}

		uasort( $tabs, [ $this, '_sort_priority_callback' ] );

		return $tabs;
	}

	public function default_tabs( $tabs = [] ) {
		global $post;
		$settings      = get_option( TLPFoodMenu()->options['settings'] );
		$hiddenOptions = ! empty( $settings['hide_options'] ) ? $settings['hide_options'] : [];

		// Description tab - shows product content.
		if ( $post->post_content && ! in_array( 'description', $hiddenOptions ) ) {
			$tabs['description'] = [
				'title'    => esc_html__( 'Description', 'food-menu-pro' ),
				'priority' => 10,
				'callback' => [ __CLASS__, 'description_tab' ],
			];
		}

		// Ingredient tab - shows ingredient.
		$ingredient_status = get_post_meta( $post->ID, '_ingredient_status', true );

		if ( $ingredient_status && ! in_array( 'ingredient', $hiddenOptions ) ) {
			$tabs['ingredient'] = [
				'title'    => esc_html__( 'Ingredients', 'food-menu-pro' ),
				'priority' => 20,
				'callback' => [ __CLASS__, 'ingredient_tab' ],
			];
		}

		// Nutrition tab - shows nutrition.
		$nutrition_status = get_post_meta( $post->ID, '_nutrition_status', true );

		if ( $nutrition_status && ! in_array( 'nutrition', $hiddenOptions ) ) {
			$tabs['nutrition'] = [
				'title'    => esc_html__( 'Nutrition', 'food-menu-pro' ),
				'priority' => 30,
				'callback' => [ __CLASS__, 'nutrition_tab' ],
			];
		}

		// Reviews tab - shows comments.
		if ( comments_open() && ! in_array( 'reviews', $hiddenOptions ) ) {
			$tabs['reviews'] = [
				'title'    => sprintf(
					esc_html__( 'Reviews (%d)', 'food-menu-pro' ),
					( FnsPro::food()->get_review_count() )
				),
				'priority' => 40,
				'callback' => 'comments_template',
			];
		}

		return $tabs;
	}

	public static function comments_template( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		Fns::render( 'single/review', compact( 'comment', 'args', 'depth' ) );
	}

	public static function description_tab() {
		Fns::render( 'single/tabs/description' );
	}

	public static function ingredient_tab() {
		Fns::render( 'single/tabs/ingredient' );
	}

	public static function nutrition_tab() {
		Fns::render( 'single/tabs/nutrition' );
	}

	public function scLayoutColumns( $columns, $layout ) {
		switch ( $layout ) {
			case 'layout7':
				$columns = 3;
				break;
		}

		return $columns;
	}

	private function _sort_priority_callback( $a, $b ) {
		if ( $a['priority'] === $b['priority'] ) {
			return 0;
		}

		return ( $a['priority'] < $b['priority'] ) ? - 1 : 1;
	}
}
