<?php
/**
 * Template: Grid by Category 1.
 *
 * @package RT_FoodMenuPro
 */

use RT\FoodMenu\Helpers\Fns;
use RT\FoodMenuPro\Helpers\FnsPro;
use RT\FoodMenu\Helpers\RenderHelpers;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

extract( $arg );
?>
<div class="<?php echo esc_attr( $grid ) . ' ' . esc_attr( $class ); ?>">
	<div class='fmp-cat1 fmp-box-wrapper'>
		<div class="fmp-cat-title">
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
					$id          = get_the_ID();
					$image       = Fns::getFeatureImage( $id, $imgSize, $defaultImgId, $customImgSize );
					$excerpt     = RenderHelpers::getExcerpt( get_the_excerpt(), $excerpt_limit, $after_short_desc );
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
						<div class="fmp-media">
							<?php
							if ( in_array( 'image', $items ) ) {
								if ( $link ) {
									?>
									<a class="<?php echo esc_attr( $anchorClass ); ?> fmp-image fmp-pull-left" href="<?php the_permalink(); ?>" data-id="<?php the_ID(); ?>"><?php echo wp_kses_post( $image ); ?></a>
									<?php
								} else {
									echo "<span class='fmp-pull-left'>" . wp_kses_post( $image ) . '</span>';
								}
							}
							?>

							<div class="fmp-media-body">
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
							</div>
						</div>
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
