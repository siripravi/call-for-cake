<?php function thb_post( $atts, $content = null ) {
	$style = '';
	$atts  = vc_map_get_attributes( 'thb_post', $atts );
	extract( $atts );

	$element_id = uniqid( 'thb-posts-shortcode-' );
	$rand       = wp_rand( 0, 1000 );

	$thb_excerpt = $thb_excerpt === 'true' ? true : false;
	$thb_date    = $thb_date === 'true' ? true : false;

	if ( $offset ) {
		$source .= '|offset:' . $offset;
	}
	$source_data   = VcLoopSettings::parseData( $source );
	$query_builder = new ThbLoopQueryBuilder( $source_data );
	$thb_posts     = $query_builder->build();
	$posts         = $thb_posts[1];
	$style         = $style;

	$classes[] = 'thb-posts-shortcode row';
	$classes[] = 'thb-posts-' . $style;
	$classes[] = $thb_carousel === 'true' ? 'thb-carousel thb-offset-arrows' : 'thb-posts-loadmore';
	$classes[] = ( $thb_carousel !== 'true' && $loadmore == 'true' ) ? 'posts-pagination-style2' : '';

	ob_start();
	?>

	<div id="<?php echo esc_attr( $element_id ); ?>" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" data-autoplay="<?php echo esc_attr( $autoplay ); ?>" data-autoplay-speed="<?php echo esc_attr( $autoplay_speed ); ?>" data-pagination="true" data-loadmore="#loadmore-<?php echo esc_attr( $rand ); ?>" data-security="<?php echo esc_attr( wp_create_nonce( 'thb_posts_ajax' ) ); ?>" data-navigation="true">
		<?php if ( $posts->have_posts() ) :  while ( $posts->have_posts() ) : $posts->the_post(); ?>
			<?php
				set_query_var( 'thb_date', $thb_date );
				set_query_var( 'thb_cat', $thb_cat );
				set_query_var( 'thb_columns', $columns );
				set_query_var( 'thb_excerpt', $thb_excerpt );
				get_template_part( 'inc/templates/post-styles/' . $style );
			?>
		<?php endwhile; else : endif; ?>
	</div>
	<?php if ( $thb_carousel !== 'true' && $loadmore === 'true' ) { ?>
		<?php
			wp_localize_script( 'thb-app', esc_attr( 'thb_postsajax_' . $rand ), array(
				'count'       => $source_data['size'],
				'loop'        => $source,
				'thb_style'   => $style,
				'thb_columns' => $columns,
				'thb_date'    => $thb_date,
				'thb_cat'     => $thb_cat,
				'thb_excerpt' => $thb_excerpt,
			) );
		?>
		<div class="row">
			<div class="small-12 columns text-center">
				<a href="#" class="thb_load_more masonry_btn button" title="<?php esc_html_e( 'Load More', 'peakshops' ); ?>" data-posts-id="<?php echo esc_attr( $rand ); ?>" id="loadmore-<?php echo esc_attr( $rand ); ?>"><?php esc_html_e( 'Load More', 'peakshops' ); ?></a>
			</div>
		</div>
	<?php } ?>
	<?php
	$out = ob_get_clean();
	set_query_var( 'thb_date', false );
	set_query_var( 'thb_cat', false );
	set_query_var( 'thb_columns', false );
	set_query_var( 'thb_excerpt', false );
	set_query_var( 'thb_animation', false );
	wp_reset_query();
	wp_reset_postdata();

	return $out;
}
thb_add_short( 'thb_post', 'thb_post' );
