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

$thumb_size = 'panpie-size9';

if (get_query_var('paged')) {
    $paged = get_query_var('paged');
} else if (get_query_var('page')) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}
$number_of_post = $data['itemnumber'];
$post_sorting = $data['orderby'];
$post_ordering = $data['post_ordering'];
$title_count = $data['title_count'];
$excerpt_count = $data['excerpt_count'];
$cat_single_box = $data['cat_single_box']; 
$attribute_limit = $data['attribute_limit'];

$p_ids = array();

foreach ( $data['posts_not_in'] as $p_idsn ) {
	$p_ids[] = $p_idsn['post_not_in'];
}

$posts_per_page = $data['itemnumber'];
$col_class = "row-cols-xl-{$data['col_xl']} row-cols-lg-{$data['col_lg']} row-cols-md-{$data['col_md']}  row-cols-sm-{$data['col_sm']} row-cols-{$data['col']}";

?>
<div class="panpie-style-<?php echo esc_attr( $data['style'] ); ?> food-menu-isotop <?php if ( $data['all_button'] == 'hide' ) { ?>hide-all<?php } ?>" data-url="<?php echo esc_url( site_url() ); ?>">
	<div class="isotope-wrap">
		<div class="isotope-classes-tab">
			<?php if ( $data['all_button'] == 'show' ) { ?>
				<a class="nav-item current" href="#" data-filter="*" ><?php esc_html_e( 'All', 'panpie' );?></a>
			<?php }
				if ( !empty( $data['category_list'] ) ) {
					foreach ( $data['category_list'] as $cat ) {
						$cats[] = array(
							'cat_multi_box' => $cat['cat_multi_box'],
						);
					}
				} else {
					$product_terms = get_terms( 'product_cat', array(
						'hide_empty' => true,
					) );
					foreach ( $product_terms as $product_term ){
						$cats[] = array(
							'cat_multi_box' => $product_term->term_id,
						);
					}	
				}
				
				if ( !empty( $cats ) ) {
				//category
				$category_number = count( $cats );
					foreach ( $cats as $cat ) {
					if ( $cat['cat_multi_box'] != 0 ) {
						$term_name = get_term( $cat['cat_multi_box'], 'product_cat' );						
						$cat_filter = $term_name->slug;
			?>				
			<a class="nav-item" href="#" data-filter=".<?php echo esc_attr( $cat_filter );?>"><?php echo esc_html( $term_name->name ); ?></a>
			<?php } } } ?>
		</div>

		<div class="row <?php echo esc_attr($col_class); ?> featuredContainer">
			<?php
			$i = 1;
			$do_not_duplicate = array();
			foreach ( $cats as $cat  ) {				
			$args = array(
				'post_type' => 'product',
				'posts_per_page' => $number_of_post,
				'order' => $post_ordering,
				'paged'          => $paged,
				'tax_query' => array(
					array(
						'taxonomy' => 'product_cat',
						'field'    => 'id',
						'terms'    => $cat['cat_multi_box'],
					),
				),
				'post__not_in'   => $p_ids,
			);				
			
			$args['orderby'] = $post_sorting;
			
			$query = new WP_Query( $args );
			
			$temp = PanpieTheme_Helper::wp_set_temp_query( $query );
			
			if ( $query->have_posts() ) {
				
				while ( $query->have_posts() ) {
				$query->the_post();			
				$product_id = get_the_ID();
				
				if( !in_array( $product_id , $do_not_duplicate ) ) {
				//uniqe post sure	
				$do_not_duplicate[] = $product_id;
				global $product;
                global $woocommerce;
				$excerpt = wp_trim_words( get_the_excerpt(), $excerpt_count, '' );
				$product_title = wp_trim_words( get_the_title(), $title_count, '' );
				
				$item_terms = get_the_terms( get_the_ID(), 'product_cat' );
				
				$term_links = array();
				
				foreach ( $item_terms as $term ) {
					$term_links[] = $term->slug;
				}
				$terms_of_item = join( " ", $term_links );
				
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

					<div class="col <?php echo esc_html( $terms_of_item ); ?>">
						<div class="food-box variation-number-<?php echo esc_attr($attribute_limit); ?>" data-product_id="<?php echo absint($product_id); ?>"
							 data-product_variations="<?php echo htmlspecialchars(wp_json_encode($variations)); // WPCS: XSS ok. ?>">
							<div class="img-wrap">
								<div class="item-img">
									<a href="<?php echo esc_url(add_query_arg($sltAttributes, get_the_permalink())); ?>">
										<?php
										if (has_post_thumbnail()) {
											the_post_thumbnail($thumb_size, ['class' => 'img-fluid mb-10 width-100']);
										} else {
											if (!empty(PanpieTheme::$options['no_preview_image']['id'])) {
												echo wp_get_attachment_image(PanpieTheme::$options['no_preview_image']['id'], $thumb_size);
											} else {
												echo '<img class="wp-post-image" src="' . PanpieTheme_Helper::get_img('noimage_400X400.jpg') . '" alt="' . get_the_title() . '">';
											}
										}
										?>
									</a>
								</div>
								<?php
									switch ($product->get_type()) {
										case "variable" :
											$label = apply_filters('variable_add_to_cart_text', esc_html__('View options', 'panpie-core'));
											?>
											<div class="btn-wrap">
												<a href="<?php echo esc_url(add_query_arg($sltAttributes, get_the_permalink())); ?>" class="cart-btn"><i
												class="fas fa-shopping-cart"></i><?php echo esc_html($label); ?>
												</a>
											</div>
											<?php break;
										case "grouped" :
											$link = get_permalink($product->get_id());
											$label = apply_filters('grouped_add_to_cart_text', esc_html__('Select Product', 'panpie-core'));
											?>
											<div class="btn-wrap">
												<a href="<?php echo esc_url($link); ?>" class="cart-btn"><i
													class="fas fa-shopping-cart"></i><?php echo esc_html($label); ?>
												</a>
											</div>
											<?php
											break;
										case "external" :
											if (!empty($ext_product_url)) {
												$link = $ext_product_url;
											} else {
												$link = get_permalink($product->get_id());
											}
											if (!empty($ext_button_text)) {
												$label = $ext_button_text;
											} else {
												$label = apply_filters('external_add_to_cart_text', esc_html__('Read More', 'panpie-core'));
											}
											?>
											<div class="btn-wrap">
												<a href="<?php echo esc_url($link); ?>" class="cart-btn"><i
													class="fas fa-shopping-cart"></i><?php echo esc_html($label); ?>
												</a>
											</div>
											<?php
											break;
										default :
											$link = esc_url($product->add_to_cart_url());
											$label = apply_filters('add_to_cart_text', esc_html__('Add to cart', 'panpie-core'));
											?>
											<div class="btn-wrap">
												<a href="<?php echo esc_url($link); ?>" class="cart-btn"><i
													class="fas fa-shopping-cart"></i><?php echo esc_html($label); ?>
												</a>
											</div>
											<?php
											break;
									}
									?>
							</div>

							<div class="item-content">
								<?php if ($data['title_showhide'] == 'yes') { ?><h3 class="item-title"><a
									href="<?php echo esc_url(add_query_arg($sltAttributes, get_the_permalink())); ?>"><?php echo wp_kses($product_title, 'alltext_allow'); ?></a>
									</h3><?php } ?>
								
								<?php if ( $data['excerpt_display'] == 'yes' ) { ?><p><?php echo wp_kses( $excerpt , 'alltext_allow' ); ?></p><?php } ?>
								
								<?php if ($data['price_showhide'] == 'yes') { ?>
									<ul class="entry-meta">
										<?php
										// variables and other name
										if ("variable" === $product->get_type()) { 
											?>
											<li class="variable-prod-price"> 
												<?php
													$index_i = 1;
													foreach( $attributes as $key => $attribute ) {
														$_key = str_replace('pa_', '', $key);
														?>
															<select class="variable-prod-select" data-attribute="<?php echo esc_attr($_key) ?>">
																<?php 
																if (!empty($attribute)) {
																	foreach ($attribute as $itemAttribute) {
																		$term = get_term_by( 'slug', $itemAttribute, $key );
																		printf('<option value="%s">%s</option>', $itemAttribute, $term->name);
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
											<?php
										}
										?>
										<li class="text-center">
											<?php
											// Price
											switch ($product->get_type()) {
												case "variable" :
													?>
													<div class="item-price <?php if (!empty($value['display_price'])) { ?>discount<?php } ?>">
														<?php echo $variation_price_html; ?>
													</div>
													<?php
													break;
												case "grouped" :
													$link = get_permalink($product->get_id());
													?>
													<a href="<?php echo esc_url($link); ?>"><?php $label = apply_filters('grouped_add_to_cart_text', esc_html__('View Product', 'panpie-core'));
														echo esc_html($label); ?></a>
													<?php break; ?>
												<?php
												case "external" : ?>
													<?php
													if (!empty($ext_product_url)) {
														$link = $ext_product_url;
													} else {
														$link = get_permalink($product->get_id());
													}

													if (!empty($ext_button_text)) {
														$label = $ext_button_text;
													} else {
														$label = apply_filters('external_add_to_cart_text', esc_html__('Read More', 'panpie-core'));
													}
													?>
													<a href="<?php echo esc_url($link); ?>"><?php echo wp_kses($label, 'alltext_allow'); ?></a>
													<?php break; ?>
												<?php
												default : ?>
												<?php echo wp_kses($product->get_price_html(), 'alltext_allow'); ?>
												<?php break;
											}

											?>
										</li>
									</ul>
								<?php } ?>
							</div>
						</div>
					</div>

		<?php $i++; } } ?>
		<?php }
		} ?>
		</div>
	</div>
    <?php 
	//PanpieTheme_Helper::wp_reset_temp_query($temp);
	wp_reset_query();	?>
</div>