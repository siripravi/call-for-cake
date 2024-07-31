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

$panpie_has_entry_meta  = ( $data['post_grid_author'] == 'yes' || $data['post_grid_date'] == 'yes' || $data['post_grid_category'] == 'yes' || $data['post_grid_comment'] == 'yes' || $data['post_grid_view'] == 'yes' && function_exists( 'panpie_views' ) || $data['post_grid_read'] == 'yes' && function_exists( 'panpie_reading_time' ) ) ? true : false;

$thumb_size = 'panpie-size5';

$args = array(
	'posts_per_page' 	=> $data['itemlimit'],
	'cat'            	=> (int) $data['cat'],
	'order' 			=> $data['post_ordering'],
	'orderby' 			=> $data['post_orderby'],
);

$query = new WP_Query( $args );
$temp = PanpieTheme_Helper::wp_set_temp_query( $query );

$posts_per_page = $data['itemlimit'];
if ( $posts_per_page % 2 == 1 ) {
	$is_offset = 'offset-lg-0 offset-md-3 offset-xl-0 ';
}

$col_class = "col-xl-{$data['col_xl']} col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-{$data['col']}";

?>
<div class="post-default post-grid-<?php echo esc_attr( $data['style'] );?>">
	<div class="row auto-clear">
	<?php $i = 1; if ( $query->have_posts() ) :?>
		<?php while ( $query->have_posts() ) : $query->the_post();?>
			<?php
			$content = PanpieTheme_Helper::get_current_post_content();
			$content = wp_trim_words( get_the_excerpt(), $data['count'], '' );
			$content = "<p>$content</p>";
			$title = wp_trim_words( get_the_title(), $data['title_count'], '' );
			
			$panpie_comments_number = number_format_i18n( get_comments_number() );
			$panpie_comments_html = $panpie_comments_number == 1 ? esc_html__( 'Comment: ' , 'panpie-core' ) : esc_html__( 'Comments: ' , 'panpie-core' );
			$panpie_comments_html = $panpie_comments_html . '<span class="comment-number">'. $panpie_comments_number . '</span> ';
			
			$panpie_time_html = sprintf( '<span><span>%s </span>%s %s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );

			?>
			<div class="<?php if ( ( $i == $posts_per_page ) && ( $posts_per_page % 2 == 1 ) ) { echo esc_attr( $is_offset ) ; } echo esc_attr( $col_class );?>">
				<div class="rtin-item-post">
					<div class="rtin-img">
						<a href="<?php the_permalink(); ?>">
							<?php
								if ( has_post_thumbnail() ){
									the_post_thumbnail( $thumb_size );
								}
								else {
									if ( !empty( PanpieTheme::$options['no_preview_image']['id'] ) ) {
										echo wp_get_attachment_image( PanpieTheme::$options['no_preview_image']['id'], $thumb_size );
									}
									else {
										echo '<img class="wp-post-image" src="' . PanpieTheme_Helper::get_img( 'noimage_370X435.jpg' ) . '" alt="'.get_the_title().'">';
									}
								}
							?>
						</a>
					</div>
					<div class="rtin-content">
						<?php if ( $panpie_has_entry_meta ) { ?>
						<ul class="post-grid-meta">
							<?php if ( $data['post_grid_date'] == 'yes' ) { ?>
							<li class="blog-date"><i class="far fa-calendar"></i><?php echo get_the_date(); ?></li>
							<?php } if ( $data['post_grid_author'] == 'yes' ) { ?>
							<li class="item-author"><i class="fas fa-user"></i><?php esc_html_e( 'by ', 'panpie-core' );?><?php the_author_posts_link(); ?></li>
							<?php } if ( $data['post_grid_category'] == 'yes' ) { ?>
							<li class="blog-cat"><i class="fas fa-tag"></i><?php echo the_category( ', ' );?></li>
							<?php } if ( $data['post_grid_comment'] == 'yes' ) { ?>
							<li class="item-comment"><i class="fas fa-comment"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses_post( $panpie_comments_html );?></a></li>
							<?php } if ( $data['post_grid_view'] == 'yes' && function_exists( 'panpie_views' ) ) { ?>
							<li><span class="meta-views meta-item "><i class="fas fa-signal"></i><?php echo panpie_views(); ?></span></li>
							<?php } if ( $data['post_grid_read'] == 'yes' && function_exists( 'panpie_reading_time' ) ) { ?>
							<li class="meta-reading-time meta-item"><i class="far fa-clock"></i><?php echo panpie_reading_time(); ?></li>
							<?php } ?>
						</ul>
						<?php } ?>
						<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3>
						<?php if ( $data['content_display'] == 'yes' ) { ?>
						<?php echo wp_kses_post( $content );?>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php $i++; endwhile;?>
	</div>
	<?php endif;?>
	<?php PanpieTheme_Helper::wp_reset_temp_query( $temp );?>
</div>