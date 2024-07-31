<?php
/**
 * Frontend Template Class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Controllers\Frontend;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Frontend Template Class.
 */
class Template {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Class Init.
	 *
	 * @return void
	 */
	protected function init() {
		\add_filter( 'comments_template', [ $this, 'comments_template_loader' ] );
	}

	public function comments_template_loader( $template ) {
		if ( get_post_type() !== TLPFoodMenu()->post_type ) {
			return $template;
		}

		$check_dirs = [
			trailingslashit( get_stylesheet_directory() ) . TLPFoodMenu()->templates_path(),
			trailingslashit( get_template_directory() ) . TLPFoodMenu()->templates_path(),
			trailingslashit( get_stylesheet_directory() ),
			trailingslashit( get_template_directory() ),
			FMP()->plugin_template_path(),
		];

		foreach ( $check_dirs as $dir ) {
			if ( file_exists( trailingslashit( $dir ) . 'single-food-menu-reviews.php' ) ) {
				return trailingslashit( $dir ) . 'single-food-menu-reviews.php';
			}
		}

		return $template;
	}
}
