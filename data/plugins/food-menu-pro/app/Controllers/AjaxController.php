<?php
/**
 * Ajax Controller Class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Controllers;

use RT\FoodMenuPro\Controllers\Admin\Ajax as AdminAjax;
use RT\FoodMenuPro\Controllers\Frontend\Ajax as FrontendAjax;
use RT\FoodMenuPro\Abstracts\Controller;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Ajax Controller Class.
 */
class AjaxController extends Controller {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Ajax.
	 *
	 * @var array
	 */
	private $ajax = [];

	/**
	 * Classes to include.
	 *
	 * @return array
	 */
	public function classes() {
		$this
			->admin_ajax()
			->frontend_ajax();

		return $this->ajax;
	}

	/**
	 * Admin Ajax
	 *
	 * @return Object
	 */
	private function admin_ajax() {
		$this->ajax[] = AdminAjax\Licence::class;
		$this->ajax[] = AdminAjax\Sorting::class;
		$this->ajax[] = AdminAjax\Attribute::class;
		$this->ajax[] = AdminAjax\Variation::class;

		return $this;
	}

	/**
	 * Frontend Ajax
	 *
	 * @return Object
	 */
	private function frontend_ajax() {
		$this->ajax[] = FrontendAjax\Popup::class;
		$this->ajax[] = FrontendAjax\LoadMore::class;
		$this->ajax[] = FrontendAjax\AddToCart::class;

		return $this;
	}
}
