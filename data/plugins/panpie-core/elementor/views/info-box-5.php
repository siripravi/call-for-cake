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
	$title = '<a ' . $attr . '>' . $data['title'] . '</a>';
	
}
else {
	$title = $data['title'];
}

if ( !empty( $data['buttontext'] ) ) {
	$btn = '<a class="info-button" ' . $attr . '>' . '<i class="fas fa-arrow-right"></i>' . $data['buttontext'] . '</a>';
}

// icon , image
if ( $attr ) {
  $getimg = '<a ' . $attr . '>' .Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size' , 'icon_image' ).'</a>';
}
else {
	$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'icon_image' );
}

$final_icon_class       = " fas fa-thumbs-up";
$final_icon_image_url   = '';
if ( is_string( $icon_class['value'] ) && $dynamic_icon_class =  $icon_class['value']  ) {
  $final_icon_class     = $dynamic_icon_class;
}
if ( is_array( $icon_class['value'] ) ) {
  $final_icon_image_url = $icon_class['value']['url'];
}

?>
<div class="info-box info-<?php echo esc_attr( $data['style'] );?>">
	<div class="rtin-item media-<?php echo esc_attr( $data['icontype'] );?>">
		<div class="rtin-content">
			<div class="rtin-header">
				<?php if ( !empty( $data['title'] ) ) { ?>
				<h3 class="rtin-title"><?php echo wp_kses_post( $title );?></h3>
				<?php } if ( !empty( $data['content'] ) ) { ?>
				<div class="rtin-text"><?php echo wp_kses_post( $data['content'] ); ?></div>
				<?php } ?>
				<?php if ( $data['button_display']  == 'yes' ) { ?>
				<?php if ( !empty( $btn ) ){ ?>
					<div class="rtin-button"><?php echo wp_kses_post( $btn );?></div>		
				<?php } } ?>
			</div>
			<div class="rtin-media">
				<?php if ( !empty( $data['icontype']== 'image' ) ) { ?>		            
					<span class="rtin-img"><?php echo wp_kses_post($getimg);?></span>  
				<?php }else{?> 	
				<?php if ( $final_icon_image_url ): ?>
					<span class="rtin-icon"><img src="<?php echo esc_url( $final_icon_image_url ); ?>" alt="SVG Icon"></span>
				<?php else: ?>
					<span class="rtin-icon"><i class="<?php  echo esc_attr( $final_icon_class ); ?>"></i></span>
				<?php endif ?>
				<?php }  ?>	
			</div>
		</div>
	</div>
</div>