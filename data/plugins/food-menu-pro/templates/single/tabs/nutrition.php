<?php
/**
 * Template: Nutrition.
 *
 * @package RT_FoodMenuPro
 */

use RT\FoodMenuPro\Helpers\FnsPro;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

global $product;

$heading = apply_filters( 'fmp_food_menu_nutrition_heading', esc_html__( 'Nutrition', 'food-menu-pro' ) );
?>

<?php echo FnsPro::get_fm_nutrition_list(); ?>
