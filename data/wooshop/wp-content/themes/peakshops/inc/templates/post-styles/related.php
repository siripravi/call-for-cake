<?php
	$classes[] = 'post';
	$classes[] = 'related';

	// Used on related posts.
?>
<div <?php post_class( $classes ); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<figure class="post-gallery">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail( 'peakshops-rectangle-x2' ); ?>
			</a>
			<?php if ( 'on' === ot_get_option( 'post_meta_cat', 'on' ) ) { ?>
				<?php do_action( 'thb_categories' ); ?>
			<?php } ?>
		</figure>
	<?php } ?>
	<?php do_action( 'thb_displayTitle', 'h6' ); ?>
	<?php if ( 'on' === ot_get_option( 'post_meta_date', 'on' ) ) { ?>
		<aside class="thb-post-bottom">
			<div class="post-date"><?php echo get_the_date(); ?></div>
		</aside>
	<?php } ?>
</div>
