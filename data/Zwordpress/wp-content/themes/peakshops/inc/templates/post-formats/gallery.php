<?php
$thb_id              = get_the_ID();
$post_gallery_photos = get_post_meta( $thb_id, 'post-gallery-photos', true );

$post_gallery_photos_arr = array();
if ( $post_gallery_photos ) {
	$post_gallery_photos_arr = explode( ',', $post_gallery_photos );
}
if ( empty( $post_gallery_photos_arr ) ) {
	return;
}
?>
<div class="thb-article-featured-image thb-gallery-format">
	<div class="thb-carousel" data-columns="1" data-infinite="true" data-navigation="true">
		<?php foreach( $post_gallery_photos_arr as $photo_id ) { ?>
			<figure>
				<?php echo wp_get_attachment_image( $photo_id, 'peakshops-single' ); ?>
			</figure>
		<?php } ?>
	</div>
</div>