<?php
/**
 * Template: Ingredient.
 *
 * @package RT_FoodMenuPro
 */

use RT\FoodMenuPro\Helpers\FnsPro;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

global $product;

$heading = apply_filters( 'fmp_food_menu_ingredient_heading', esc_html__( 'Ingredient', 'food-menu-pro' ) );
?>

<?php echo FnsPro::get_fm_ingredient_list(); ?>
