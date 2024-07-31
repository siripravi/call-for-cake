<?php
/**
 * Template: Grid by Category 2.
 *
 * @package RT_FoodMenuPro
 */

use RT\FoodMenuPro\Helpers\FnsPro;
use RT\FoodMenu\Helpers\RenderHelpers;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

extract( $arg );

$catImgSrc    = null;
$cat_thumb_id = get_term_meta( $term->term_id, 'fmp_cat_thumbnail_id', true );

if ( $taxonomy == 'product_cat' ) {
	$cat_thumb_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
}

if ( $cat_thumb_id ) {
	$catImageS = wp_get_attachment_image_src( $cat_thumb_id, 'large' );
	$catImgSrc = $catImageS[0];
}
?>
<div class="<?php echo esc_attr( $grid . ' ' . $class ); ?>">
	<div class='fmp-cat2 fmp-box-wrapper'>
		<div class="fmp-cat-title" style="background-image: url('<?php echo esc_url( $catImgSrc ); ?>');">
			<h2><?php echo esc_html( $term->name ); ?></h2>
			<?php echo( $term->description ? "<p class='cat-description'>" . wp_kses_post( $term->description ) . '</p>' : null ); ?>
		</div>
		<div class="fmp-box">
			<?php
			$gridQuery = new WP_Query( $args );

			if ( $gridQuery->have_posts() ) {
				echo '<ul class="menu-list">';
				while ( $gridQuery->have_posts() ) :
					$gridQuery->the_post();
					$excerpt = RenderHelpers::getExcerpt( get_the_excerpt(), $excerpt_limit, $after_short_desc );

					$id          = get_the_ID();
					$add_to_cart = null;
					if ( $source == 'product' && $wc == true ) {
						$_product = wc_get_product( get_the_ID() );
						$pID      = $id;
						$pLink    = get_the_permalink( $pID );
						$price    = $_product->get_price_html();
						$pType    = $_product->get_type();

						if ( $_product->is_purchasable() ) {
							if ( $_product->is_in_stock() ) {
								ob_start();

								woocommerce_template_loop_add_to_cart();
								$add_to_cart .= apply_filters( 'rtfm_add_to_cart_btn', ob_get_contents(), $pLink, $id, $pType, $add_to_cart_text, $items, $anchorClass );

								ob_end_clean();
							}
						}
					} else {
						$price = FnsPro::fmpHtmlPrice( get_the_ID() );
					}
					?>
					<li class="fmp-item-<?php the_ID(); ?>">
						<div class="fmp-title-price">
							<?php if ( in_array( 'title', $items ) ) : ?>
								<h3 class="fmp-title">
									<?php if ( $link ) { ?>
										<a class="<?php echo esc_attr( $anchorClass ); ?>" href="<?php the_permalink(); ?>" data-id="<?php the_ID(); ?>"><?php the_title(); ?></a>
										<?php
									} else {
										the_title();
									}
									?>
								</h3>
							<?php endif; ?>
							<?php if ( in_array( 'price', $items ) ) : ?>
								<span class="fmp-price price"><?php echo wp_kses_post( $price ); ?></span>
							<?php endif; ?>
						</div>
						<?php if ( in_array( 'excerpt', $items ) ) : ?>
							<p><?php echo wp_kses_post( $excerpt ); ?></p>
						<?php endif; ?>
						<?php if ( in_array( 'read_more', $items ) && $link ) : ?>
							<a href="<?php the_permalink(); ?>" data-id="<?php the_ID(); ?>" class="<?php echo esc_attr( $anchorClass ); ?> fmp-btn-read-more"><?php echo esc_html( $read_more ); ?></a>
						<?php endif; ?>
						<?php
						if ( in_array( 'add_to_cart', $items, true ) ) :
							echo stripslashes_deep( $add_to_cart );
						endif;
						?>
					</li>
					<?php
				endwhile;
				echo '</ul>';
				wp_reset_postdata();
			} else {
				echo '<p>' . esc_html__( 'No item found.', 'food-menu-pro' ) . '</p>';
			}
			?>
		</div>
	</div>
</div>
