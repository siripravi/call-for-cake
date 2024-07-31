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

if ( $data['button_style'] == 'panpie-button-1' ) {
	if ( !empty( $data['buttontext'] ) ) {
		$btn = '<a class="btn-fill-red-white" ' . $attr . '>' . '<i class="fas fa-shopping-cart"></i>' . $data['buttontext'] . '</a>';
	}
} elseif ( $data['button_style'] == 'panpie-button-2' ) {
	if ( !empty( $data['buttontext'] ) ) {
		$btn = '<a class="btn-fill-light" ' . $attr . '>' . '<i class="fas fa-shopping-cart"></i>' . $data['buttontext'] . '</a>';
	}
}else {
	if ( !empty( $data['buttontext'] ) ) {
		$btn = '<a class="btn-fill-white" ' . $attr . '>' . '<i class="fas fa-shopping-cart"></i>' . $data['buttontext'] . '</a>';
	}
}

//bgimage
//$bgimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'rt_bgimage' );

//image
if ( $attr ) {
  $getimg = '<a ' . $attr . '>' .Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size' , 'rt_image' ).'</a>';
}
else {
	$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'rt_image' );
}

?>
<div class="banner-add-default banner-add-<?php echo esc_attr( $data['style'] );?>">
	<div class="rtin-image" data-bg-image="<?php echo esc_attr($data['rt_bgimage']['url']); ?>">
	
		<?php if ( !empty( $getimg ) ){ ?>
		<div class="banner-img">
		<?php echo wp_kses_post($getimg);?>
		</div>
		<?php } ?>

		<div class="item-content">
			<h3 class="item-title"><?php echo wp_kses_post( $data['title'] ); ?></h3>
			<?php if ( !empty( $btn ) ){ ?>
			<div class="rtin-button"><?php echo wp_kses_post( $btn );?></div>		
			<?php } ?>
		</div>
			
	</div>
</div>