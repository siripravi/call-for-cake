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

$p_ids = array();

foreach ( $data['posts_not_in'] as $p_idsn ) {
	$p_ids[] = $p_idsn['post_not_in'];
}

$posts_per_page = $data['itemnumber'];

$col_class = "row-cols-xl-{$data['col_xl']} row-cols-lg-{$data['col_lg']} row-cols-md-{$data['col_md']}  row-cols-sm-{$data['col_sm']} row-cols-{$data['col']}";

?>
<div class="food-menu-isotop-<?php echo esc_attr( $data['style'] ); ?> <?php if ( $data['all_button'] == 'hide' ) {?>hide-all<?php } ?>" data-url="<?php echo esc_url( site_url() ); ?>">
	<div class="isotope-wrap">
		<div class="isotope-classes-tab">
			<?php if ( $data['all_button'] == 'show' ) {?>
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
		
		<div class="row <?php echo esc_attr( $col_class ); ?> featuredContainer">
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
							
				$portfolio_id = get_the_ID();
				
				if( !in_array( $portfolio_id , $do_not_duplicate ) ) {
				//uniqe post sure	
				$do_not_duplicate[] = $portfolio_id;
				$currency = get_woocommerce_currency_symbol();
				$excerpt = wp_trim_words( get_the_excerpt(), $excerpt_count, '' );
				$product_title = wp_trim_words( get_the_title(), $title_count, '' );
				
				$item_terms = get_the_terms( get_the_ID(), 'product_cat' );
				
				$term_links = array();
				
				foreach ( $item_terms as $term ) {
					$term_links[] = $term->slug;
				}
				$terms_of_item = join( " ", $term_links );
		?>
			<div class="col <?php echo esc_html( $terms_of_item ); ?>">
				<div class="food-menu-box">
					<div class="media">
						<div class="item-img">
						<?php
							if ( has_post_thumbnail() ){
								the_post_thumbnail( array( 105, 105 ) , ['class' => 'img-fluid mb-10 width-100'] );
							} else {
								if ( !empty( PanpieTheme::$options['no_preview_image']['id'] ) ) {
									echo wp_get_attachment_image( PanpieTheme::$options['no_preview_image']['id'], $thumb_size );
								} else {
									echo '<img class="wp-post-image" src="' . PanpieTheme_Helper::get_img( 'noimage_400X400.jpg' ) . '" alt="'.get_the_title().'">';
								}
							}
						?>
						</div>
						<div class="media-body">
							<?php if ( $data['title_showhide'] == 'yes' ) { ?><h3 class="item-title"><a href="<?php the_permalink(); ?>"><?php echo wp_kses( $product_title, 'alltext_allow' ); ?></a></h3><?php } ?>
							<?php if ( $data['excerpt_display'] == 'yes' ) { ?><p><?php echo wp_kses_post( $excerpt );?></p><?php } ?>	
							<?php if ( $data['price_showhide'] == 'yes' ) { ?>
							<?php
							global $product;
							global $woocommerce;

							// Price
							
							switch ( $product->get_type() ) {
								case "variable" : ?>
									<div class="item-price var-price"><?php
									$prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
									echo wp_kses( $currency . number_format(($prices[0] + $prices[1])/2 , 2 ) , 'alltext_allow' );
									?></div>							
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
						</div> 
					</div>
				</div>
			</div>
		<?php $i++; } } ?>
		<?php }
		} ?>
		</div>
	</div>
	<?php if ( $data['more_button'] == 'show' ) { ?>
		<?php if ( !empty( $data['see_button_text'] ) ) { ?>
		<div class="gallery-button"><a class="btn-fill-dark" href="<?php echo esc_url( $data['see_button_link'] );?>"><?php echo esc_html( $data['see_button_text'] );?><i class="fas fa-arrow-right"></i></a></div>
		<?php } ?>
	<?php } else { ?>
		<?php PanpieTheme_Helper::pagination(); ?>
	<?php } ?>
	<?php //PanpieTheme_Helper::wp_reset_temp_query( $temp );
	wp_reset_query(); ?>
</div>