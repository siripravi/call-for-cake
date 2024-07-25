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

$thumb_size = 'panpie-size7';
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
	'post_type' 		=> 'panpie_event',
	'post_status' 		=> 'publish',
	'orderby' 			=> $post_sorting,
	'order' 			=> $post_ordering,
	'posts_per_page' 	=> $number_of_post,
	'paged'          	=> $paged,
);

if ( $cat_single_grid != 0 ) {
	$args['tax_query'] = array (
		array (
			'taxonomy' => 'panpie_event_category',
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
$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";

?>
<div class="event-default event-grid-<?php echo esc_attr( $data['layout'] );?>">
	<div class="row <?php echo esc_attr( $gap_class ); ?> rt-masonry-grid">	
		<?php
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
				$query->the_post();			
				$excerpt 				= wp_trim_words( get_the_excerpt(), $excerpt_count, '' );
				$event_title 			= wp_trim_words( get_the_title(), $title_count, '' );
				$panpie_event_address   = get_post_meta( get_the_ID(), 'panpie_event_address', true );
				$panpie_event_phone   	= get_post_meta( get_the_ID(), 'panpie_event_phone', true );
				
				$panpie_time_html       = sprintf( '%s<span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ) );
				$panpie_time_html       = apply_filters( 'panpie_single_time', $panpie_time_html );
		?>
		<div class="<?php echo esc_attr( $col_class ) ?> rt-grid-item">
			<div class="rtin-item">
				<div class="single-item">
					<div class="rtin-figure">
						<?php
							if ( has_post_thumbnail() ){
								the_post_thumbnail( $thumb_size, ['class' => 'img-fluid mb-10 width-100'] );
							} else {
								if ( !empty( PanpieTheme::$options['no_preview_image']['id'] ) ) {
									echo wp_get_attachment_image( PanpieTheme::$options['no_preview_image']['id'], $thumb_size );
								} else {
									echo '<img class="wp-post-image" src="' . PanpieTheme_Helper::get_img( 'noimage_390X340.jpg' ) . '" alt="'.get_the_title().'">';
								}
							}
						?>
						<div class="event-date"><?php echo $panpie_time_html; ?></div>
					</div>
				</div>
				<div class="single-item">
					<div class="rtin-content">
						<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
						<?php if ( $data['excerpt_display'] == 'yes' ) { ?>
						<div class="event-text"><?php echo wp_kses( $excerpt , 'alltext_allow' ); ?></div><?php } ?>
						<?php if (empty( $addres_display ) || empty( $phone_display ) ) { ?>
						<div class="rtin-info">
							<?php if ( $data['addres_display'] == 'yes' ) { ?>
							<span><i class="fas fa-map-marker-alt"></i><?php echo wp_kses_post( $panpie_event_address );?></span>
							<?php } if ( $data['phone_display'] == 'yes' ) { ?>
							<span><i class="fas fa-phone-alt"></i><?php echo wp_kses_post( $panpie_event_phone );?></span>
							<?php } ?>
						</div>
						<?php } ?>
						<?php if ( $data['read_display'] == 'yes' ) { ?>
							<div class="event-button">
								<a class="btn-fill-dark" href="<?php the_permalink(); ?>"><?php esc_html_e( 'SEE DETAILS', 'panpie-core' );?></a></div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	<?php } ?>
	</div>
		<?php if ( $data['more_button'] == 'show' ) { ?>
			<?php if ( !empty( $data['see_button_text'] ) ) { ?>
			<div class="event-more-button"><a class="btn-fill-dark" href="<?php echo esc_url( $data['see_button_link'] );?>"><?php echo esc_html( $data['see_button_text'] );?><i class="fas fa-arrow-right"></i></a></div>
			<?php } ?>
		<?php } else { ?>
			<?php PanpieTheme_Helper::pagination(); ?>
		<?php } ?>
		<?php PanpieTheme_Helper::wp_reset_temp_query( $temp ); ?>
</div>