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

$args = array(
	'post_type'      => 'panpie_testim',
	'posts_per_page' => $data['number'],
	'orderby'        => $data['orderby'],
);

if ( !empty( $data['cat'] ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'panpie_testimonial_category',
			'field' => 'term_id',
			'terms' => $data['cat'],
		)
	);
}

switch ( $data['orderby'] ) {
	case 'title':
	case 'menu_order':
	$args['order'] = 'ASC';
	break;
}

$query = new WP_Query( $args );

$slider_nav_class = $data['slider_nav'] == 'yes' ? ' slider-nav-enabled' : '';
$slider_dot_class = $data['slider_dots'] == 'yes' ? ' slider-dot-enabled' : '';

?>
<div class="default-testimonial rtin-testimonial-2 owl-wrap <?php echo esc_attr( $data['button_style'] ); ?> <?php echo esc_attr( $slider_nav_class ); ?><?php echo esc_attr( $slider_dot_class ); ?>">
	<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">
		<?php if ( $query->have_posts() ) :?>
			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php
				$id 			= get_the_id();
				$designation 	= get_post_meta( $id, 'panpie_tes_designation', true );
				$content 		= PanpieTheme_Helper::get_current_post_content();
				$content 		= wp_trim_words( $content, $data['count'], '' );
				$content 		= "<p>$content</p>";
				$ratting	 	= get_post_meta( $id, 'panpie_tes_rating', true );
				$rest_testimonial_rating = 5- intval( $ratting ) ;
				?>
				<div class="rtin-item">
					<div class="rtin-content">
						<?php if ( $data['thumbs_display']  == 'yes' ) { ?>
						<div class="rtin-figure">
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="rtin-thumb"><?php the_post_thumbnail( 'thumbnail' );?></div>
							<?php } ?>
						</div>
						<?php } ?>
						<?php if ( $data['ratting_display']  == 'yes' ) { ?>
							<ul class="rating">
								<?php for ($i=0; $i < $ratting; $i++) { ?>
									<li class="star-rate"><i class="fa fa-star" aria-hidden="true"></i></li>
								<?php } ?>			
								<?php for ($i=0; $i < $rest_testimonial_rating; $i++) { ?>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<?php } ?>
							</ul>
						<?php } ?>
						<?php echo wp_kses_post( $content ); ?>
						<h3 class="rtin-title"><?php the_title(); ?></h3>
						<div class="rtin-designation"><?php if ( $data['designation_display']  == 'yes' && $designation ) { ?><?php echo esc_html( $designation );?><?php } ?></div>
					</div>
				</div>
			<?php endwhile;?>
		<?php endif;?>
		<?php wp_reset_query();?>
	</div>
</div>