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

?>

<div class="image-default image-<?php echo esc_attr( $data['style'] );?>">
	<div class="rtin-image">
		<?php echo wp_kses_post($getimg);?>
		<div class="discount-price" data-parallax='{"x" : 0, "y" : 50}'>
			<?php echo wp_kses_post($getimg2);?>
		</div>
	</div>
</div>