<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;

use PanpieTheme;
use PanpieTheme_Helper;
use \WP_Query;

$thumb_size = 'panpie-size4';

if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
}
else if ( get_query_var('page') ) {
	$paged = get_query_var('page');
}
else {
	$paged = 1;
}
$number_of_post = $data['itemnumber'];
$post_sorting = $data['orderby'];
$post_ordering = $data['post_ordering'];
$title_count = $data['title_count'];
$excerpt_count = $data['excerpt_count'];	
$cat_single_box = $data['cat_single_box'];

$args = array(
	'post_type' => 'product',
	'post_status' => 'publish',
	'orderby' => $post_sorting,
	'order' => $post_ordering,
	'posts_per_page' => $number_of_post,
	'paged'          => $paged,
);
if ( $cat_single_box != 0 ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'product_cat',
			'field'    => 'term_id',
			'terms'    => $cat_single_box,
		),
	);
}

$query = new WP_Query( $args );
$temp = PanpieTheme_Helper::wp_set_temp_query( $query );

$posts_per_page = $data['itemnumber'];
if ( $posts_per_page % 2 == 1 ) {
	$is_offset = 'offset-lg-3 offset-md-3 offset-xl-0 ';
}

$col_class = "row-cols-xl-{$data['col_xl']} row-cols-lg-{$data['col_lg']} row-cols-md-{$data['col_md']}  row-cols-sm-{$data['col_sm']} row-cols-{$data['col']}";

?>
<div class="panpie-style-<?php echo esc_attr( $data['style'] ); ?> food-menu-recommend" data-url="<?php echo esc_url( site_url() ); ?>">
	<div class="row <?php echo esc_attr( $col_class ); ?> food-menu-combo">
		<?php $i = 1;
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
				$query->the_post();	
				$id 		= get_the_ID();
				$excerpt = wp_trim_words( get_the_excerpt(), $excerpt_count, '' );
				$product_title = wp_trim_words( get_the_title(), $title_count, '' );
				
				global $product;
				global $woocommerce;
				$currency = get_woocommerce_currency_symbol();
				$price = get_post_meta( get_the_ID(), '_regular_price', true);
				$sale = get_post_meta( get_the_ID(), '_sale_price', true);
				$ext_button_text = get_post_meta( get_the_ID(), '_button_text', true);
				$ext_product_url = get_post_meta( get_the_ID(), '_product_url', true);
		?>
		
		<div class="col">
			<div class="food-box-2">
				<div class="img-wrap">
					<div class="item-img">
						<a href="<?php the_permalink(); ?>">
							<?php
								if ( has_post_thumbnail() ){
									the_post_thumbnail( $thumb_size, ['class' => 'img-fluid mb-10 width-100'] );
								} else {
									if ( !empty( PanpieTheme::$options['no_preview_image']['id'] ) ) {
										echo wp_get_attachment_image( PanpieTheme::$options['no_preview_image']['id'], $thumb_size );
									} else {
										echo '<img class="wp-post-image" src="' . PanpieTheme_Helper::get_img( 'noimage_400X400.jpg' ) . '" alt="'.get_the_title().'">';
									}
								}
							?>
						</a>
						
						<div class="btn-wrap">
							<?php
								switch ( $product->get_type() ) {
									case "variable" :
									$link = get_permalink($product->get_id());
									$label  = apply_filters('variable_add_to_cart_text', esc_html__('View options', 'panpie-core'));
								?>
									<div class="btn-wrap">
										<a href="<?php echo esc_url( $link ); ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i><?php echo esc_html( $label ); ?></a>
									</div>
								<?php break;
									case "grouped" :
										$link   = get_permalink($product->get_id());
										$label  = apply_filters('grouped_add_to_cart_text', esc_html__('Select Product', 'panpie-core'));
								?>
									<div class="btn-wrap">
										<a href="<?php echo esc_url( $link ); ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i><?php echo esc_html( $label ); ?></a>
									</div>
								<?php
									break;
									case "external" :
										if ( !empty( $ext_product_url ) ) {
											$link  = $ext_product_url;
										} else {
											$link   = get_permalink($product->get_id());
										}
										if ( !empty( $ext_button_text ) ) {
											$label  = $ext_button_text;
										} else {
											$label  = apply_filters('external_add_to_cart_text', esc_html__('Read More', 'panpie-core'));
										}
								?>
								<div class="btn-wrap">
									<a href="<?php echo esc_url( $link ); ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i><?php echo esc_html( $label ); ?></a>
								</div>
								<?php
									break;
									default :
										$link   = esc_url( $product->add_to_cart_url() );
										$label  = apply_filters('add_to_cart_text', esc_html__('Add to cart', 'panpie-core'));
								?>
								<div class="btn-wrap">
									<a href="<?php echo esc_url( $link ); ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i><?php echo esc_html( $label ); ?></a>
								</div>
								<?php
									break;
								}
							?>
						</div>
						
					</div>
				</div>
				<div class="item-content">
					<?php if ( $data['price_showhide'] == 'yes' ) { ?>
					<?php
					// Price
					switch ( $product->get_type() ) {
						case "variable" : ?>
						<?php
							global $product, $post;
						?>
							<div class="item-price">
							<?php
							$prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
							echo wp_kses( $currency . number_format(($prices[0] + $prices[1])/2 , 2 ) , 'alltext_allow' );
							?>
							</div>						
						<?php break;
							case "grouped" :
							$link = get_permalink($product->get_id());
						?>
							<div class="item-price"><a href="<?php echo esc_url( $link ); ?>"><?php $label = apply_filters('grouped_add_to_cart_text', esc_html__('View Product', 'panpie-core')); echo esc_html( $label ); ?></a></div>
						<?php break; ?>
						<?php
							case "external" : ?>
						<?php
							if ( !empty( $ext_product_url ) ) {
								$link  = $ext_product_url;
							} else {
								$link   = get_permalink($product->get_id());
							}
							
							if ( !empty( $ext_button_text ) ) {
								$label  = $ext_button_text;
							} else {
								$label  = apply_filters('external_add_to_cart_text', esc_html__('Read More', 'panpie-core'));
							}
						?>
							<div class="item-price"><a href="<?php echo esc_url( $link ); ?>"><?php echo wp_kses( $label, 'alltext_allow' ) ; ?></a></div>
						<?php break; ?>
						<?php
							default : ?>
							<div class="item-price"><?php echo wp_kses( $product->get_price_html() , 'alltext_allow' ); ?></div>
						<?php break;
					}
					?>
					<?php } ?>
					<?php if ( $data['title_showhide'] == 'yes' ) { ?><h3 class="item-title"><a href="<?php the_permalink(); ?>"><?php echo wp_kses( $product_title, 'alltext_allow' ); ?></a></h3><?php } ?>
					<?php if ( $data['excerpt_display'] == 'yes' ) { ?><p><?php echo wp_kses( $excerpt , 'alltext_allow' ); ?></p><?php } ?>
				</div>
			</div>
		</div>
		<?php $i++ ; } ?>
	<?php } ?>
	</div>
	<?php if ( $data['more_button'] == 'show' ) { ?>
		<?php if ( !empty( $data['see_button_text'] ) ) { ?>
		<div class="gallery-button"><a class="btn-fill-dark" href="<?php echo esc_url( $data['see_button_link'] );?>"><?php echo esc_html( $data['see_button_text'] );?><i class="fas fa-arrow-right"></i></a></div>
		<?php } ?>
	<?php } else { ?>
		<?php PanpieTheme_Helper::pagination(); ?>
	<?php } ?>
	<?php PanpieTheme_Helper::wp_reset_temp_query( $temp ); ?>
</div>