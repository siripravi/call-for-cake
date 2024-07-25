<?php
if ( 'off' === ot_get_option( 'article_related', 'on' ) ) {
	return;
}

$thb_id = get_the_id();
$tags   = wp_get_post_tags( $thb_id );

if ( $tags ) {
	$tag_ids = array();

	foreach ( $tags as $individual_tag ) {
		$tag_ids[] = $individual_tag->term_id;
	}
	$args = array(
		'tag__in'             => $tag_ids,
		'post__not_in'        => array( $thb_id ),
		'posts_per_page'      => ot_get_option( 'article_related_count', '3' ),
		'ignore_sticky_posts' => 1,
		'no_found_rows'       => true,
		'post_status'         => 'publish',
	);

	$related_posts = new WP_Query( $args );

	if ( $related_posts->have_posts() ) {
		?>
		<!-- Start Related Posts -->
		<div class="thb-related-posts hide-on-print">
			<h6 class="related-posts-title"><?php esc_html_e( 'Related Articles', 'peakshops' ); ?></h6>
			<div class="row">
				<?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
					<div class="small-12 medium-6 large-4 columns">
						<?php get_template_part( 'inc/templates/post-styles/related' ); ?>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
		<!-- End Related Posts -->
		<?php
	}
}
wp_reset_postdata();
