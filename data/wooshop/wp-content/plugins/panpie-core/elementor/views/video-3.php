<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;
use PanpieTheme_Helper;
use Elementor\Group_Control_Image_Size;

// image
$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'video_image' );

?>
<div class="rt-video video-<?php echo esc_attr( $data['style'] );?>">
	<div class="rtin-video">
		<div class="item-img">
		<?php echo wp_kses_post($getimg);?>
		</div>
		<?php if(!empty($data['title'])) { ?>
		
		<div class="rtin-title">
		<img width="58" height="22" loading='lazy' src="<?php echo PANPIE_ASSETS_URL . 'element/shape27.png'; ?>" alt="<?php esc_html_e('video-shape1', 'panpie'); ?>">
		<span><?php echo wp_kses_post( $data['title'] ); ?></span>
		<img width="58" height="22" loading='lazy' src="<?php echo PANPIE_ASSETS_URL . 'element/shape27.png'; ?>" alt="<?php esc_html_e('video-shape1', 'panpie'); ?>">
		</div>
		<?php } ?>
		<div class="item-icon">
			<a class="rtin-play rt-video-popup" href="<?php echo esc_url( $data['videourl']['url'] );?>"><i class="fas fa-play"></i></a>
		</div>
		
	</div>
</div>