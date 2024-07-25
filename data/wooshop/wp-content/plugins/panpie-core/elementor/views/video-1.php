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
		<div class="item-icon">
			<?php if ( !empty( $data['video_title'] ) ) { ?>
			<h3><?php echo wp_kses_post( $data['video_title'] ); ?></h3><?php } ?>
			<a class="rtin-play rt-video-popup" href="<?php echo esc_url( $data['videourl']['url'] );?>"><i class="fas fa-play"></i></a>
		</div>
	</div>
</div>