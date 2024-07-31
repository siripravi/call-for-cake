<?php
/**
 * Public Controller Class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Controllers;

use RT\FoodMenuPro\Abstracts\Controller;
use RT\FoodMenuPro\Controllers\Hooks;
use RT\FoodMenuPro\Controllers\Frontend as Frontend;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Admin Controller Class.
 */
class FrontendController extends Controller {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Classes to include.
	 *
	 * @return array
	 */
	public function classes() {
		$classes  = [];

		$classes[] = Hooks\ActionHooks::class;
		$classes[] = Hooks\FilterHooks::class;
		$classes[] = Frontend\Comments::class;
		$classes[] = Frontend\Template::class;
		$classes[] = Frontend\Shortcode::class;

		return $classes;
	}
}
