<?php
$posttags = get_the_tags();
if ( ot_get_option( 'article_tags', 'on' ) === 'off') {
	return;
}
?>
<?php if ( ! empty( $posttags ) ) { ?>
	<div class="thb-article-tags">
	<?php
	if ( $posttags ) {
		$return = '';
		foreach ( $posttags as $thb_tag ) {
			?>
			<a href="<?php echo esc_url( get_tag_link( $thb_tag->term_id ) ); ?>" title="<?php echo esc_attr( get_tag_link( $thb_tag->name ) ); ?>"><?php echo esc_html( $thb_tag->name ); ?></a>
			<?php
		}
	}
	?>
	</div>
	<?php
}
