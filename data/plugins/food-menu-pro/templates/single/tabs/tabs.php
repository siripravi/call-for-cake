<?php
/**
 * Template: Tabs.
 *
 * @package RT_FoodMenuPro
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

$tabs = apply_filters( 'fmp_food_menu_tabs', [] );

global $post;
$ingredient_status = get_post_meta( $post->ID, '_ingredient_status', true );
$nutrition_status  = get_post_meta( $post->ID, '_nutrition_status', true );
$commnet_status    = get_post_meta( $post->ID, 'comment_status', true );

if ( ! empty( $tabs ) ) : ?>
	<div class="fmp-tabs-wrapper <?php echo ! ( $ingredient_status || $nutrition_status || $commnet_status ) ? 'tabs-inactive' : 'tabs-active'; ?>">
		<ul class="fmp-tabs">
			<?php foreach ( $tabs as $key => $tab ) : ?>
				<li class="<?php echo esc_attr( $key ); ?>_tab" data-id="tab-fmp-<?php echo esc_attr( $key ); ?>">
					<?php echo esc_html( $tab['title'] ); ?>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php foreach ( $tabs as $key => $tab ) : ?>
			<div class="fmp-tab-panel fmp-tab-panel-<?php echo esc_attr( $key ); ?>" id="tab-fmp-<?php echo esc_attr( $key ); ?>">
				<?php call_user_func( $tab['callback'], $key, $tab ); ?>
			</div>
		<?php endforeach; ?>

	</div>
<?php endif; ?>
