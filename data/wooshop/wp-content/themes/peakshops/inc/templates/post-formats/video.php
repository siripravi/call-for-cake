<?php
$thb_id    = get_the_ID();
$video_url = get_post_meta( $thb_id, 'post_video', true );

if ( ! $video_url || '' === $video_url ) {
	return;
}
?>
<div class="thb-article-featured-image thb-video-format">
	<?php
	if ( '' !== $video_url && wp_oembed_get( $video_url ) ) {
		echo '<div class="flex-video widescreen">' . wp_oembed_get( $video_url ) . '</div>';
	} else {
		echo wp_video_shortcode(
			array(
				'src' => $video_url,
			)
		);
	}
	?>
</div>
