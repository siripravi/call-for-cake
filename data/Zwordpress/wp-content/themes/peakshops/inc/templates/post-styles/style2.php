<?php
	$classes[] = 'post';
	$classes[] = 'style2';

	$thb_columns = get_query_var( 'thb_columns' );
	$thb_date    = get_query_var( 'thb_date' );
	$thb_excerpt = get_query_var( 'thb_excerpt' );
	$thb_cat     = get_query_var( 'thb_cat' );
	$columns     = $thb_columns ? thb_translate_columns( $thb_columns ) : 'medium-6';

	add_filter( 'excerpt_length', 'thb_short_excerpt_length' );
?>
<div class="small-12 <?php echo esc_attr( $columns ); ?> columns">
	<div <?php post_class( $classes ); ?>>
		<?php if ( has_post_thumbnail() ) { ?>
			<figure class="post-gallery">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail( 'peakshops-rectangle-x2' ); ?>
				</a>
				<?php if ( $thb_cat ) { ?>
					<?php do_action( 'thb_categories' ); ?>
				<?php } ?>
			</figure>
		<?php } ?>
		<?php if ( $thb_date ) { ?>
			<aside class="thb-post-bottom">
				<div class="post-date"><?php echo get_the_date(); ?></div>
			</aside>
		<?php } ?>
		<?php do_action( 'thb_displayTitle', 'h3' ); ?>
		<?php if ( $thb_excerpt ) { ?>
			<div class="post-excerpt">
				<?php the_excerpt(); ?>
			</div>
		<?php } ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="thb-read-more"><?php esc_html_e( 'Read More', 'peakshops' ); ?> <?php get_template_part( 'assets/img/svg/next_arrow.svg' ); ?></a>
	</div>
</div>
