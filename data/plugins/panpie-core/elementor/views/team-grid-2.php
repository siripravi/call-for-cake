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

$prefix      = PANPIE_CORE_THEME_PREFIX;
$thumb_size  = 'panpie-size4';

if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
}
else if ( get_query_var('page') ) {
	$paged = get_query_var('page');
}
else {
	$paged = 1;
}

$args = array(
	'post_type'      => 'panpie_team',
	'posts_per_page' => $data['number'],
	'orderby'        => $data['orderby'],
	'paged' => $paged
);

if ( !empty( $data['cat'] ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'panpie_team_category',
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
$temp = PanpieTheme_Helper::wp_set_temp_query( $query );
$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";
?>
<div class="team-default team-multi-layout-2 team-grid-<?php echo esc_attr( $data['style'] );?>">
	<div class="row auto-clear">
		<?php if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$id            = get_the_id();
				$position   	= get_post_meta( $id, 'panpie_team_position', true );
				$socials       = get_post_meta( $id, 'panpie_team_socials', true );
				$social_fields = PanpieTheme_Helper::team_socials();
				if ( $data['contype'] == 'content' ) {
					$content = apply_filters( 'the_content', get_the_content() );
				}
				else {
					$content = apply_filters( 'the_excerpt', get_the_excerpt() );;
				}
				$content = wp_trim_words( $content, $data['count'], '' );
				$content = "<p>$content</p>";
				?>
				<div class="<?php echo esc_attr( $col_class );?>">
					<div class="rtin-item">
						<div class="rtin-content-wrap">
							<div class="rtin-thums">
								<a href="<?php the_permalink();?>">
								<?php
								if ( has_post_thumbnail() ){
									the_post_thumbnail( $thumb_size );
								}
								else {
									if ( !empty( PanpieTheme::$options['no_preview_image']['id'] ) ) {
										echo wp_get_attachment_image( PanpieTheme::$options['no_preview_image']['id'], $thumb_size );
									}
									else {
										echo '<img class="wp-post-image" src="' . PanpieTheme_Helper::get_img( 'noimage_400X400.jpg' ) . '" alt="'.get_the_title().'">';
									}
								}
								?>
								</a>
								<?php if ( !empty( $socials ) && $data['social_display']  == 'yes' ) { ?>
									<ul class="rtin-social">
										<?php foreach ( $socials as $key => $social ): ?>
											<?php if ( !empty( $social ) ): ?>
												<li><a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fab <?php echo esc_attr( $social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a></li>
											<?php endif; ?>
										<?php endforeach; ?>
									</ul>
								<?php } ?>
							</div>
							<div class="mask-wrap">
								<div class="rtin-content">
									<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
									<?php if ( $position && $data['designation_display']  == 'yes' ) { ?>
										<div class="rtin-designation"><?php echo esc_html( $position );?></div>
									<?php } ?>
									<?php if ( $data['content_display']  == 'yes' ) { ?>
										<?php echo wp_kses_post( $content );?>
									<?php } ?>	
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
		<?php //wp_reset_postdata();?>
	</div>
	<?php if ( $data['more_button'] == 'show' ) { ?>
		<?php if ( !empty( $data['see_button_text'] ) ) { ?>
		<div class="team-button"><a class="btn-fill-dark" href="<?php echo esc_url( $data['see_button_link'] );?>"><?php echo esc_html( $data['see_button_text'] );?><i class="fas fa-arrow-right"></i></a></div>
		<?php } ?>
	<?php } else { ?>
		<?php PanpieTheme_Helper::pagination(); ?>
	<?php } ?>
	<?php PanpieTheme_Helper::wp_reset_temp_query( $temp ); ?>
</div>