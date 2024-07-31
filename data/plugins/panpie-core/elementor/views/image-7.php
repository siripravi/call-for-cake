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

?>

<div class="image-default image-<?php echo esc_attr( $data['style'] );?>">
	<div class="rtin-image">
		<ul class="shape-list">
			<li class="shape1"><img src="<?php echo PANPIE_ASSETS_URL . 'element/shape16.png'; ?>" alt="<?php esc_html_e('shape16', 'panpie'); ?>"></li>
			<li class="shape2"><img src="<?php echo PANPIE_ASSETS_URL . 'element/shape15.png'; ?>" alt="<?php esc_html_e('shape15', 'panpie'); ?>"></li>
			<li class="shape3"><img src="<?php echo PANPIE_ASSETS_URL . 'element/shape17.png'; ?>" alt="<?php esc_html_e('shape17', 'panpie'); ?>"></li>
		</ul>
		<?php echo wp_kses_post($getimg);?>
	</div>
</div>