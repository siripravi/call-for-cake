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
$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";

?>
<div class="default-testimonial rtin-testimonial-1 rtin-testimonial-grid">
	<div class="row auto-clear">
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
				<div class="<?php echo esc_attr( $col_class );?>">
				<div class="rtin-item">
					<div class="rtin-content">
						<div class="item-icon">
							<i class="fas fa-quote-left"></i>
						</div>
						<?php echo wp_kses_post( $content ); ?>
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
						<h3 class="rtin-title"><?php the_title(); ?><?php if ( $data['designation_display']  == 'yes' && $designation ) { ?><span class="rtin-designation"> - <?php echo esc_html( $designation );?></span><?php } ?></h3>
					</div>
				</div>
				</div>
			<?php endwhile;?>
		<?php endif;?>
		<?php wp_reset_query();?>
	</div>
</div>