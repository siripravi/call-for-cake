<?php
/**
 * Admin Controller Class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Controllers;

use RT\FoodMenuPro\Controllers\Admin as Admin;
use RT\FoodMenuPro\Abstracts\Controller;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Admin Controller Class.
 */
class AdminController extends Controller {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Admin.
	 *
	 * @var array
	 */
	private $admin = [];

	/**
	 * Classes to include.
	 *
	 * @return array
	 */
	public function classes() {
		$this
			->settings()
			->metabox();

		return $this->admin;
	}

	/**
	 * Settings.
	 *
	 * @return object
	 */
	private function settings() {
		$this->admin[] = Admin\Preview::class;
		$this->admin[] = Admin\Settings::class;
		$this->admin[] = Admin\Licencing::class;
		$this->admin[] = Admin\AdminColumns::class;

		return $this;
	}

	/**
	 * Metabox.
	 *
	 * @return object
	 */
	private function metabox() {
		$this->admin[] = Admin\Metabox\TaxMeta::class;
		$this->admin[] = Admin\Metabox\PostMeta::class;
		$this->admin[] = Admin\Metabox\ShortcodeMeta::class;

		return $this;
	}
}
