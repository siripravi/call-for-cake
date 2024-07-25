<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;

use PanpieTheme_Helper;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
extract($data);

$attr = '';
if ( !empty( $data['url']['url'] ) ) {
	$attr  = 'href="' . $data['url']['url'] . '"';
	$attr .= !empty( $data['url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['url']['nofollow'] ) ? ' rel="nofollow"' : '';
	
}
//image
if ( $attr ) {
  $getimg = '<a ' . $attr . '>' .Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size' , 'rt_image' ).'</a>';
}
else {
	$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'rt_image' );
}


if ( $attr ) {
  $getimg2 = '<a ' . $attr . '>' .Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size' , 'rt_image2' ).'</a>';
}
else {
	$getimg2 = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'rt_image2' );
}

if ( $attr ) {
  $getimg3 = '<a ' . $attr . '>' .Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size' , 'rt_image3' ).'</a>';
}
else {
	$getimg3 = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'rt_image3' );
}

?>

<div class="image-default image-<?php echo esc_attr( $data['style'] );?>">
	<div class="rtin-image">
		<?php echo wp_kses_post($getimg);?>
		<div class="animate-left wow fadeInLeft" data-wow-delay="800ms" data-wow-duration="1500ms">
			<?php echo wp_kses_post($getimg2);?>
		</div>
		<div class="animate-right wow fadeInUp" data-wow-delay="900ms" data-wow-duration="1500ms" >
			<?php echo wp_kses_post($getimg3);?>
		</div>
	</div>
</div>