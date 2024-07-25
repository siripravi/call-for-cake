<?php
/**
 * Template: Description.
 *
 * @package RT_FoodMenuPro
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

global $post;

$heading = esc_html( apply_filters( 'fmp_food_menu__description_heading', esc_html__( 'Description', 'food-menu-pro' ) ) );
?>

<?php the_content(); ?>
