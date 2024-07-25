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
// $selected_attribute = $data['variation_cat'];
$attribute_limit = $data['attribute_limit'];

$args = array(
    'post_type'      => 'product',
    'post_status'    => 'publish',
    'orderby'        => $post_sorting,
    'order'          => $post_ordering,
    'posts_per_page' => $number_of_post,
    'paged'          => $paged,
);

if ($cat_single_box != 0) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'    => $cat_single_box,
        ),
    );
}

$query = new WP_Query($args);
$temp = PanpieTheme_Helper::wp_set_temp_query($query);

$posts_per_page = $data['itemnumber'];
if ($posts_per_page % 2 == 1) {
    $is_offset = 'offset-lg-3 offset-md-3 offset-xl-0 ';
}

$col_class = "row-cols-xl-{$data['col_xl']} row-cols-lg-{$data['col_lg']} row-cols-md-{$data['col_md']}  row-cols-sm-{$data['col_sm']} row-cols-{$data['col']}";

?>
<div class="panpie-style-<?php echo esc_attr($data['style']); ?> food-menu-recommend"
     data-url="<?php echo esc_url(site_url()); ?>">
    <div class="row <?php echo esc_attr($col_class); ?>">
        <?php $i = 1;
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
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
                        </div>

                        <div class="item-content">
                            <?php if ($data['title_showhide'] == 'yes') { ?><h3 class="item-title"><a
                                        href="<?php echo esc_url(add_query_arg($sltAttributes, get_the_permalink())); ?>"><?php echo wp_kses($product_title, 'alltext_allow'); ?></a>
                                </h3><?php } ?>
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

                <?php $i++;
            } ?>
        <?php } ?>
    </div>
    <?php if ($data['more_button'] == 'show') { ?>
        <?php if (!empty($data['see_button_text'])) { ?>
            <div class="gallery-button"><a class="btn-fill-dark"
                href="<?php echo esc_url($data['see_button_link']); ?>"><?php echo esc_html($data['see_button_text']); ?>
                <i class="fas fa-arrow-right"></i></a></div>
        <?php } ?>
    <?php } else { ?>
        <?php PanpieTheme_Helper::pagination(); ?>
    <?php } ?>
    <?php PanpieTheme_Helper::wp_reset_temp_query($temp); ?>
</div>