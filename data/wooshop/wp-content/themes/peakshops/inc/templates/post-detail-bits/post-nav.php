<?php
if ( 'off' === ot_get_option( 'blog_nav', 'on' ) ) {
	return;
}

$blog_nav_cat = 'on' === ot_get_option( 'blog_nav_cat', 'off' ) ? true : false;
$prev_post    = get_adjacent_post( $blog_nav_cat, '', true );
$next_post    = get_adjacent_post( $blog_nav_cat, '', false );

if ( empty( $prev_post ) && empty( $next_post ) ) {
	return;
}
?>
<aside class="thb-article-nav">
	<?php if ( ! empty( $prev_post ) ) { ?>
		<a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" class="thb-article-nav-post previous">
			<span class="thb-article-nav-text"><?php esc_html_e( 'Previous', 'peakshops' ); ?></span>
			<strong><?php echo esc_html( $prev_post->post_title ); ?></strong>
		</a>
	<?php } ?>
	<?php if ( ! empty( $next_post ) ) { ?>
		<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="thb-article-nav-post next">
			<span class="thb-article-nav-text"><?php esc_html_e( 'Next', 'peakshops' ); ?></span>
			<strong><?php echo esc_html( $next_post->post_title ); ?></strong>
		</a>
	<?php } ?>
</aside>
