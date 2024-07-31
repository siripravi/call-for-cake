<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace radiustheme\Panpie_Core;
 
use PanpieTheme;
use Panpie_Core;
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
 
//$selected_attribute = $data['variation_cat']; //@new
$attribute_limit = $data['attribute_limit'];
 
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
 
$slider_nav_class = $data['slider_nav'] == 'yes' ? 'slider-nav-enabled' : '';
$slider_dot_class = $data['slider_dots'] == 'yes' ? ' slider-dot-enabled' : '';
?>
<div class="shop-layout-<?php echo esc_attr( $data['style'] );?> owl-wrap <?php echo esc_attr( $data['button_style'] ); ?> <?php echo esc_attr( $slider_nav_class ); ?><?php echo esc_attr( $slider_dot_class ); ?>">
	<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">
		<?php if ( $query->have_posts() ) { ?>
			<?php while ( $query->have_posts() ) {
				$query->the_post();
				$id 		= get_the_ID();			
                $product_id = get_the_ID();
                $excerpt = wp_trim_words(get_the_excerpt(), $excerpt_count, '');
                $product_title = wp_trim_words(get_the_title(), $title_count, '');
 
                global $product;
                global $woocommerce;
                $currency = get_woocommerce_currency_symbol();
                $price = get_post_meta(get_the_ID(), '_regular_price', true);
                $sale = get_post_meta(get_the_ID(), '_sale_price', true);
                $ext_button_text = get_post_meta(get_the_ID(), '_button_text', true);
                $ext_product_url = get_post_meta(get_the_ID(), '_product_url', true);
 
                $variation_price_html = '';
                $itemAttributes = [];
                $variations = [];
                $sltAttributes = [];
                if ($product->get_type() == 'variable') {
                    $variations = $product->get_available_variations();
                    $attributes = $product->get_variation_attributes();

                    $selected_attribute = '';
                    if ( $attributes ) { 
                        $keys = array_keys($attributes);
                        $selected_attribute = str_replace('pa_', '', $keys[0]);
                    } 

                    $itemAttributes = !empty($attributes['pa_' . $selected_attribute]) && is_array($attributes['pa_' . $selected_attribute]) ? $attributes['pa_' . $selected_attribute] : [];
                    if (!empty($variations)) {
                        foreach ($variations as $variation) {
                            if (!empty($variation['attributes']['attribute_pa_' . $selected_attribute]) && $variation['attributes']['attribute_pa_' . $selected_attribute] === $itemAttributes[0]) {
                                $sltAttributes = $variation['attributes'];
                                $variation_price_html = $variation['price_html'];
                                break;
                            }
                        }
                    }
                }
			?>
		<div class="col">
			<div class="food-box variation-number-<?php echo esc_attr($attribute_limit); ?>" data-product_id="<?php echo absint($product_id); ?>" data-product_variations="<?php echo htmlspecialchars(wp_json_encode($variations)); ?>">
				<div class="item-header">
					<?php if ( $data['title_showhide'] == 'yes' ) { ?><h3 class="item-title"><a href="<?php the_permalink(); ?>"><?php echo wp_kses( $product_title, 'alltext_allow' ); ?></a></h3><?php } ?>
					<?php if ( $data['price_showhide'] == 'yes' ) { ?>
					<?php
						// Price
						switch ( $product->get_type() ) {
							case "variable" : ?>

								<div class="item-price <?php if (!empty($value['display_price'])) { ?>discount<?php } ?>">
									<?php echo $variation_price_html; ?>
								</div>

							<?php break;
								case "grouped" :
								$link = get_permalink($product->get_id());
							?>
								<a href="<?php echo esc_url( $link ); ?>"><?php $label = apply_filters('grouped_add_to_cart_text', esc_html__('View Product', 'panpie-core')); echo esc_html( $label ); ?></a>
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
								<a href="<?php echo esc_url( $link ); ?>"><?php echo wp_kses( $label, 'alltext_allow' ) ; ?></a>
							<?php break; ?>
							<?php
								default : ?>
								<?php echo wp_kses ( $product->get_price_html() , 'alltext_allow' ); ?>
							<?php break;
						}
					?>
					<?php } ?>
					<?php if ( $data['rating_showhide'] == 'yes' ) { ?>
					<div class="rating-custom">
						<?php wc_get_template( 'rating.php' ); ?>
					</div>
					<?php } ?>
				</div>
				<div class="item-img">
					<a href="<?php the_permalink(); ?>">
						<?php
							if ( has_post_thumbnail() ){
								the_post_thumbnail( $thumb_size , ['class' => 'img-fluid mb-10 width-100'] );
							} else {
								if ( !empty( PanpieTheme::$options['no_preview_image']['id'] ) ) {
									echo wp_get_attachment_image( PanpieTheme::$options['no_preview_image']['id'], $thumb_size );
								} else {
									echo '<img class="wp-post-image" src="' . PanpieTheme_Helper::get_img( 'noimage_400X400.jpg' ) . '" alt="'.get_the_title().'">';
								}
							}
						?>
					</a>
				</div>
				<div class="item-content">
					<ul class="entry-meta">
						<?php 
							// variables and other name
							switch ( $product->get_type() ) {
								case "variable" :
									$uqid = rand( 1,5 ). time();
 
								?>
								<li class="variable-prod-price">
									<?php
                                        $index_i = 1;
                                        foreach( $attributes as $key => $attribute ) {
                                            $key = str_replace('pa_', '', $key);
                                            ?>
                                                <select class="variable-prod-select" data-attribute="<?php echo esc_attr($key) ?>">
                                                    <?php
                                                    if (!empty($attribute)) {
                                                        foreach ($attribute as $itemAttribute) {
                                                            printf('<option value="%1$s">%1$s</option>', $itemAttribute);
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            <?php
                                            if ( $attribute_limit == $index_i ) {
                                                break;
                                            }
                                            $index_i++;
                                        }
                                    ?>
								</li>
								<?php break;
									case "grouped" : ?>
								<?php break; ?>
								<?php
									case "external" : ?>
								<?php break; ?>
								<?php
									default : ?>
 
								<?php break;
							}
						?>
						<li class="variable-icon">							
						<a href="<?php the_permalink(); ?>"><i class="fas fa-shopping-cart" aria-hidden="true"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
 
			<?php } ?>
		<?php } ?>
		<?php PanpieTheme_Helper::wp_reset_temp_query( $temp ); ?><?php wp_reset_postdata(); ?>
	</div>
</div>