<?php

/* Display Title */
function thb_displayTitle( $tag = 'h3', $id = false ) {
	$id   = $id ? $id : get_the_ID();
	$frmt = '<div class="post-title"><%s><a href="%s" title="%s"><span>%s</span></a></%s></div>';
	echo sprintf( $frmt, $tag, esc_url( get_permalink( $id ) ), the_title_attribute( 'echo=0' ), get_the_title( $id ), $tag );
}
add_action( 'thb_displayTitle', 'thb_displayTitle', 10, 2 );

/* Post Categories */
function thb_categories( $article = false ) {
	if ( has_category() ) {
		$separator = $article ? ', ' : ' ';
		?>
		<div class="post-category">
			<?php if ( $article ) { ?>
				<em><?php esc_html_e( 'in', 'peakshops' ); ?></em>
			<?php } ?>
			<?php the_category( $separator ); ?>
		</div>
		<?php
	}
}
add_action( 'thb_categories', 'thb_categories', 10, 1 );

// Article Title After.
function thb_article_after_h1() {
	?>
	<aside class="thb-article-meta">

		<?php if ( 'on' === ot_get_option( 'article_author_name', 'on' ) ) { ?>

			<div class="post-author">
				<em><?php esc_html_e( 'by', 'peakshops' ); ?></em>
				<?php the_author_posts_link(); ?>
			</div>
		<?php } ?>
		<?php if ( 'on' === ot_get_option( 'article_date', 'on' ) ) { ?>
			<div class="thb-post-date">
				<em><?php esc_html_e( 'on', 'peakshops' ); ?></em>
				<?php echo get_the_date(); ?>
			</div>
		<?php } ?>
		<?php if ( 'on' === ot_get_option( 'article_cat', 'on' ) ) { ?>
			<?php do_action( 'thb_categories', true ); ?>
		<?php } ?>
	</aside>
	<?php
}
add_action( 'thb_article_after_h1', 'thb_article_after_h1', 10 );

// Article Featured Image.
function thb_article_featured_image( $image_size ) {
	$thb_id                     = get_the_ID();
	$featured_image_credit      = get_post_meta( $thb_id, 'standard-featured-credit', true );
	$featured_image_override    = get_post_meta( $thb_id, 'featured_image_override', true );
	$featured_image_override_id = get_post_meta( $thb_id, 'featured_image_override_id', true );
	$format                     = get_post_format();
	$video_url                  = 'video' === $format ? get_post_meta( $thb_id, 'post_video', true ) : false;

	if ( ! has_post_thumbnail() ) {
		return;
	}
	?>
	<div class="thb-article-featured-image" data-override="<?php echo esc_attr( $featured_image_override ); ?>">
		<?php
		if ( 'video' === $format ) {
			if ( '' !== $video_url && wp_oembed_get( $video_url ) ) {
				echo apply_filters(
					'wp_video_shortcode',
					function() {
						return '<div class="flex-video widescreen">' . wp_oembed_get( $video_url ) . '</div>';
					}
				);
			} else {
				echo apply_filters(
					'wp_video_shortcode',
					function() {
						return wp_video_shortcode(
							array(
								'src' => $video_url,
							)
						);
					}
				);
			}
		} else {
			if ( has_post_thumbnail() ) {
				if ( 'on' === $featured_image_override && ! empty( $featured_image_override_id ) ) {
					echo wp_get_attachment_image( $featured_image_override_id, $image_size );
				} else {
					the_post_thumbnail( $image_size );
				}
			}
		}
		?>
		<?php if ( $featured_image_credit ) { ?>
			<div class="featured_image_credit"><?php echo wp_kses_post( $featured_image_credit ); ?></div>
		<?php } ?>
	</div>
	<?php
}
add_action( 'thb_article_featured_image', 'thb_article_featured_image', 1, 1 );

// Post pagination
add_filter( 'wp_link_pages_args', 'thb_change_link_page_args', 5 );
function thb_change_link_page_args( $defaults ) {
	$defaults['before'] = '<div class="thb-article-pagination"><span class="pages-text">' . esc_html__( 'Pages:', 'peakshops' ) . '</span>';
	$defaults['after']  = '</div>';
	return $defaults;
}
add_action( 'thb_after_article_content', 'wp_link_pages', 0 );

// Article End.
function thb_article_end() {
	get_template_part( 'inc/templates/post-detail-bits/post-nav' );
	get_template_part( 'inc/templates/post-detail-bits/post-related' );
}
add_action( 'thb_article_end', 'thb_article_end' );

/* Customized Pagination */
function thb_pagination() {
	the_posts_pagination(
		array(
			'prev_text' => esc_html__( 'Prev', 'peakshops' ),
			'next_text' => esc_html__( 'Next', 'peakshops' ),
			'mid_size'  => 2,
		)
	);
}
