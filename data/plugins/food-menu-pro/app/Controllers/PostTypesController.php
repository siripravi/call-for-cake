<?php
/**
 * Custom Post Type Register Class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Controllers;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Custom Post Type Register Class.
 */
class PostTypesController {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Post Type Slug.
	 *
	 * @var string
	 */
	private $post_type_slug;

	/**
	 * Class Init.
	 *
	 * @return void
	 */
	protected function init() {
		$this
			->post_types()
			->taxonomies()
			->flush();
	}

	/**
	 * Post Type Definition.
	 *
	 * @return PostTypesController
	 */
	protected function post_types() {
		\add_post_type_support( TLPFoodMenu()->post_type, 'comments' );

		$post_types = $this->post_type_args();

		if ( empty( $post_types ) ) {
			return $this;
		}

		foreach ( $post_types as $post_type => $args ) {
			\register_post_type( $post_type, $args );
		}

		return $this;
	}

	/**
	 * Taxonomy Definition.
	 *
	 * @return PostTypesController
	 */
	protected function taxonomies() {
		$taxonomies = $this->taxonomy_args();

		if ( empty( $taxonomies ) ) {
			return;
		}

		foreach ( $taxonomies as $taxonomy => $args ) {
			\register_taxonomy( TLPFoodMenu()->taxonomies[ $taxonomy ], [ TLPFoodMenu()->post_type ], $args );
		}

		return $this;
	}

	/**
	 * Post Type Arguments.
	 *
	 * @return array
	 */
	private function post_type_args() {
		$args = [];

		/**
		 * Post Type: Variations.
		 */
		$args['fmp_variation'] = [
			'label'           => esc_html__( 'Variations', 'food-menu-pro' ),
			'description'     => esc_html__( 'Variations', 'food-menu-pro' ),
			'public'          => false,
			'hierarchical'    => false,
			'supports'        => false,
			'capability_type' => 'post',
		];

		$args['fmp_variation']['labels'] = [
			'menu_name'          => esc_html__( 'Variations', 'food-menu-pro' ),
			'name'               => esc_html__( 'Variations', 'food-menu-pro' ),
			'singular_name'      => esc_html__( 'Variations', 'food-menu-pro' ),
			'all_items'          => esc_html__( 'All Variations', 'food-menu-pro' ),
			'add_new'            => esc_html__( 'Add Variation', 'food-menu-pro' ),
			'add_new_item'       => esc_html__( 'Add Variation', 'food-menu-pro' ),
			'edit_item'          => esc_html__( 'Edit Variation', 'food-menu-pro' ),
			'new_item'           => esc_html__( 'New Variation', 'food-menu-pro' ),
			'view_item'          => esc_html__( 'View Variation', 'food-menu-pro' ),
			'search_items'       => esc_html__( 'Search Variation', 'food-menu-pro' ),
			'not_found'          => esc_html__( 'No Variation found', 'food-menu-pro' ),
			'not_found_in_trash' => esc_html__( 'No Variation in the trash', 'food-menu-pro' ),
		];

		return $args;
	}

	/**
	 * Taxonomy Arguments.
	 *
	 * @return array
	 */
	private function taxonomy_args() {
		$args = [];

		/**
		 * Taxonomy: Tag.
		 */
		$args['tag'] = [
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_tagcloud'     => true,
			'hierarchical'      => false,
			'rewrite'           => [
				'slug'       => TLPFoodMenu()->taxonomies['tag'],
				'with_front' => false,
			],
			'show_admin_column' => true,
			'query_var'         => true,
		];

		$args['tag']['labels'] = [
			'name'                       => esc_html__( 'Tags', 'food-menu-pro' ),
			'singular_name'              => esc_html__( 'Tag', 'food-menu-pro' ),
			'menu_name'                  => esc_html_x( 'Tags', 'Admin menu name', 'food-menu-pro' ),
			'search_items'               => esc_html__( 'Search Tags', 'food-menu-pro' ),
			'all_items'                  => esc_html__( 'All Tags', 'food-menu-pro' ),
			'edit_item'                  => esc_html__( 'Edit Tag', 'food-menu-pro' ),
			'update_item'                => esc_html__( 'Update Tag', 'food-menu-pro' ),
			'add_new_item'               => esc_html__( 'Add New Tag', 'food-menu-pro' ),
			'new_item_name'              => esc_html__( 'New Tag Name', 'food-menu-pro' ),
			'popular_items'              => esc_html__( 'Popular Tags', 'food-menu-pro' ),
			'separate_items_with_commas' => esc_html__( 'Separate Tags with commas', 'food-menu-pro' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove Tags', 'food-menu-pro' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used tags', 'food-menu-pro' ),
			'not_found'                  => esc_html__( 'No Tags found', 'food-menu-pro' ),
		];

		/**
		 * Taxonomy: Ingredient.
		 */
		$args['ingredient'] = [
			'public'            => false,
			'show_in_nav_menus' => false,
			'show_ui'           => true,
			'show_tagcloud'     => false,
			'hierarchical'      => false,
			'rewrite'           => [
				'slug' => TLPFoodMenu()->taxonomies['ingredient'],
			],
			'show_admin_column' => false,
			'query_var'         => false,
		];

		$args['ingredient']['labels'] = [
			'name'                       => esc_html__( 'Ingredients', 'food-menu-pro' ),
			'singular_name'              => esc_html__( 'Ingredient', 'food-menu-pro' ),
			'menu_name'                  => esc_html__( 'Ingredients', 'food-menu-pro' ),
			'edit_item'                  => esc_html__( 'Edit Ingredient', 'food-menu-pro' ),
			'update_item'                => esc_html__( 'Update Ingredient', 'food-menu-pro' ),
			'add_new_item'               => esc_html__( 'Add New Ingredient', 'food-menu-pro' ),
			'new_item_name'              => esc_html__( 'New Ingredient', 'food-menu-pro' ),
			'parent_item'                => esc_html__( 'Parent Ingredient', 'food-menu-pro' ),
			'parent_item_colon'          => esc_html__( 'Parent Ingredient:', 'food-menu-pro' ),
			'all_items'                  => esc_html__( 'All ingredients', 'food-menu-pro' ),
			'search_items'               => esc_html__( 'Search ingredients', 'food-menu-pro' ),
			'popular_items'              => esc_html__( 'Popular ingredients', 'food-menu-pro' ),
			'separate_items_with_commas' => esc_html__( 'Separate ingredients with commas', 'food-menu-pro' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove ingredients', 'food-menu-pro' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used  ingredients', 'food-menu-pro' ),
			'not_found'                  => esc_html__( 'No ingredients found.', 'food-menu-pro' ),
		];

		/**
		 * Taxonomy: Nutrition.
		 */
		$args['nutrition'] = [
			'public'            => false,
			'show_in_nav_menus' => false,
			'show_ui'           => true,
			'show_tagcloud'     => false,
			'hierarchical'      => false,
			'rewrite'           => [
				'slug' => TLPFoodMenu()->taxonomies['nutrition'],
			],
			'show_admin_column' => false,
			'query_var'         => false,
		];

		$args['nutrition']['labels'] = [
			'name'                       => esc_html__( 'Nutrition', 'food-menu-pro' ),
			'singular_name'              => esc_html__( 'Nutrition', 'food-menu-pro' ),
			'menu_name'                  => esc_html__( 'Nutrition', 'food-menu-pro' ),
			'edit_item'                  => esc_html__( 'Edit nutrition', 'food-menu-pro' ),
			'update_item'                => esc_html__( 'Update nutrition', 'food-menu-pro' ),
			'add_new_item'               => esc_html__( 'Add New nutrition', 'food-menu-pro' ),
			'new_item_name'              => esc_html__( 'New nutrition', 'food-menu-pro' ),
			'parent_item'                => esc_html__( 'Parent nutrition', 'food-menu-pro' ),
			'parent_item_colon'          => esc_html__( 'Parent nutrition', 'food-menu-pro' ),
			'all_items'                  => esc_html__( 'All nutrition', 'food-menu-pro' ),
			'search_items'               => esc_html__( 'Search nutrition', 'food-menu-pro' ),
			'popular_items'              => esc_html__( 'Popular nutrition', 'food-menu-pro' ),
			'separate_items_with_commas' => esc_html__( 'Separate nutrition with commas', 'food-menu-pro' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove nutrition', 'food-menu-pro' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used  nutrition', 'food-menu-pro' ),
			'not_found'                  => esc_html__( 'No nutrition found.', 'food-menu-pro' ),
		];

		/**
		 * Taxonomy: Unit.
		 */
		$args['unit'] = [
			'public'            => false,
			'show_in_nav_menus' => false,
			'show_ui'           => true,
			'show_tagcloud'     => false,
			'hierarchical'      => false,
			'rewrite'           => [
				'slug' => TLPFoodMenu()->taxonomies['unit'],
			],
			'show_admin_column' => false,
			'query_var'         => false,
		];

		$args['unit']['labels'] = [
			'name'                       => esc_html__( 'Units', 'food-menu-pro' ),
			'singular_name'              => esc_html__( 'Unit', 'food-menu-pro' ),
			'menu_name'                  => esc_html__( 'Units', 'food-menu-pro' ),
			'edit_item'                  => esc_html__( 'Edit unit', 'food-menu-pro' ),
			'update_item'                => esc_html__( 'Update unit', 'food-menu-pro' ),
			'add_new_item'               => esc_html__( 'Add New unit', 'food-menu-pro' ),
			'new_item_name'              => esc_html__( 'New unit', 'food-menu-pro' ),
			'parent_item'                => esc_html__( 'Parent unit', 'food-menu-pro' ),
			'parent_item_colon'          => esc_html__( 'Parent unit', 'food-menu-pro' ),
			'all_items'                  => esc_html__( 'All units', 'food-menu-pro' ),
			'search_items'               => esc_html__( 'Search units', 'food-menu-pro' ),
			'popular_items'              => esc_html__( 'Popular units', 'food-menu-pro' ),
			'separate_items_with_commas' => esc_html__( 'Separate units with commas', 'food-menu-pro' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove units', 'food-menu-pro' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used units', 'food-menu-pro' ),
			'not_found'                  => esc_html__( 'No unit found.', 'food-menu-pro' ),
		];

		return $args;
	}

	/**
	 * Remove rewrite rules and then recreate rewrite rules.
	 *
	 * @return void
	 */
	private function flush() {
		$flush = get_option( TLPFoodMenu()->options['flash'] );

		if ( $flush ) {
			\flush_rewrite_rules();
			\update_option( TLPFoodMenu()->options['flash'], false );
		}
	}
}
