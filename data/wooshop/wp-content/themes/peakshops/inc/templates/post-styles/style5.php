<?php
	$classes[] = 'post';
	$classes[] = 'style5';

	$thb_columns = get_query_var( 'thb_columns' );
	$thb_date    = get_query_var( 'thb_date' );
	$thb_excerpt = get_query_var( 'thb_excerpt' );
	$thb_cat     = get_query_var( 'thb_cat' );
	$columns     = $thb_columns ? thb_translate_columns( $thb_columns ) : 'medium-6';

	add_filter( 'excerpt_length', 'thb_shortmid_excerpt_length' );
?>
<div class="small-12 <?php echo esc_attr( $columns ); ?> columns">
	<div <?php post_class( $classes ); ?>>
		<figure class="post-gallery">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail( 'peakshops-rectangle-x2' ); ?>
			</a>
			<?php if ( $thb_cat ) { ?>
				<?php do_action( 'thb_categories' ); ?>
			<?php } ?>
			<div class="post-content-inner">
				<?php do_action( 'thb_displayTitle', 'h3' ); ?>
				<?php if ( $thb_excerpt ) { ?>
					<div class="post-excerpt">
						<?php the_excerpt(); ?>
					</div>
				<?php } ?>
			</div>
		</figure>
	</div>
</div>
