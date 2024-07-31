<?php
/**
 * Template: Taxonomy Food Menu.
 *
 * @package RT_FoodMenu
 */

use RT\FoodMenu\Helpers\Fns;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

Fns::render( 'archive-food-menu-cat' );
