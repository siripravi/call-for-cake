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

$thumb_size = 'panpie-size6';
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
$cat_single_grid = $data['cat_single'];
$args = array(
	'post_type' => 'panpie_gallery',
	'post_status' => 'publish',
	'orderby' => $post_sorting,
	'order' => $post_ordering,
	'posts_per_page' => $number_of_post,
	'paged'          => $paged,
);

if ( $cat_single_grid != 0 ) {
	$args['tax_query'] = array (
		array (
			'taxonomy' => 'panpie_gallery_category',
			'field'    => 'ID',
			'terms'    => $cat_single_grid,
		)
	);
}

$query = new WP_Query( $args );
$temp = PanpieTheme_Helper::wp_set_temp_query( $query );

$gap_class = '';
if ( $data['column_no_gutters'] == 'hide' ) {
   $gap_class  = 'no-gutters';
}

$posts_per_page = $data['itemnumber'];
if ( $posts_per_page % 2 == 1 ) {
	$is_offset = 'offset-lg-3 offset-md-3 offset-xl-0 ';
}

$col_class = "col-xl-{$data['col_xl']} col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-{$data['col']}";

?>
<div class="gallery-default gallery-multi-layout-2 gallery-<?php echo esc_attr( $data['layout'] );?>">
	<div class="row <?php echo esc_attr( $gap_class ); ?>">	
		<?php $i = 1;
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
				$query->the_post();			
				$excerpt = wp_trim_words( get_the_excerpt(), $excerpt_count, '' );
				$portfolio_title = wp_trim_words( get_the_title(), $title_count, '' );
		?>
		<div class="<?php if ( ( $i == $posts_per_page ) && ( $posts_per_page % 2 == 1 ) ) { echo esc_attr( $is_offset ) ; } echo esc_attr( $col_class ) ?>">
			<div class="rtin-item">
				<div class="rtin-figure">
					<a href="<?php the_permalink(); ?>">
						<?php
							if ( has_post_thumbnail() ){
								the_post_thumbnail( $thumb_size, ['class' => 'img-fluid mb-10 width-100'] );
							} else {
								if ( !empty( PanpieTheme::$options['no_preview_image']['id'] ) ) {
									echo wp_get_attachment_image( PanpieTheme::$options['no_preview_image']['id'], $thumb_size );
								} else {
									echo '<img class="wp-post-image" src="' . PanpieTheme_Helper::get_img( 'noimage_370X328.jpg' ) . '" alt="'.get_the_title().'">';
								}
							}
						?>
					</a>
					<?php if (empty( $view_display ) || empty( $link_display ) ) { ?>
					<div class="item-icon">
						<?php if ( $data['view_display'] == 'yes' ) { ?>
						<a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" class="img-popup-icon" data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="1" data-elementor-lightbox-title="<?php echo get_the_title(); ?>"><i class="far fa-eye"></i></a>
						<?php } if ( $data['link_display'] == 'yes' ) { ?>
						<a href="<?php the_permalink();?>"><i class="fas fa-expand-alt"></i></a>
						<?php } ?>
					</div>
					<?php } ?>
				</div>
				<div class="rtin-content">
					<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php if ( $data['excerpt_display'] == 'yes' ) { ?>
					<p><?php echo wp_kses( $excerpt , 'alltext_allow' ); ?></p>
					<?php } ?>
					<?php if ( $data['cat_display'] == 'yes' ) { ?>
					<div class="rtin-cat"><?php
						$i = 1;
						$term_lists = get_the_terms( get_the_ID(), 'panpie_gallery_category' );
						foreach ( $term_lists as $term_list ){ 
						$link = get_term_link( $term_list->term_id, 'panpie_gallery_category' ); ?><?php if ( $i > 1 ){ echo esc_html( ', ' ); } ?><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $term_list->name ); ?></a><?php $i++; } ?></div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php $i++; } ?>
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