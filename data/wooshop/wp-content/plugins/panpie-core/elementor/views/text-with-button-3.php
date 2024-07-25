<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;
extract($data);

$btn = $attr = '';

if ( !empty( $data['one_buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['one_buttonurl']['url'] . '"';
	$attr .= !empty( $data['one_buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['one_buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
	
}
if ( $data['button_style'] == 'panpie-button-1' ) {
	if ( !empty( $data['button_one'] ) ) {
		$btn = '<a class="btn-fill-dark" ' . $attr . '>' . $data['button_one'] . '<i class="fas fa-arrow-right"></i>' .'</a>';
	}
} else {
	if ( !empty( $data['button_one'] ) ) {
		$btn = '<a class="btn-fill-light" ' . $attr . '>' . $data['button_one'] . '<i class="fas fa-arrow-right"></i>' .'</a>';
	}
}

//Icon, image
$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'icon_image');
$final_icon_class       = '';
$final_icon_image_url   = '';
if ( is_string( $icon_class['value'] ) && $dynamic_icon_class =  $icon_class['value']  ) {
  $final_icon_class     = $dynamic_icon_class;
}
if ( is_array( $icon_class['value'] ) ) {
  $final_icon_image_url = $icon_class['value']['url'];
}

?>
<div class="title-text-button banner-slide-<?php echo esc_attr( $data['style'] ); ?>">
	<div class="<?php echo esc_attr( $data['animation_offon'] ); ?> <?php echo esc_attr( $data['animation'] ); ?>" data-wow-delay="300ms" data-wow-duration="1500ms">
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
	<?php if ( !empty( $data['sub_title'] ) ) { ?>
		<div class="subtitle <?php echo esc_attr( $data['animation_offon'] ); ?> <?php echo esc_attr( $data['animation'] ); ?>" data-wow-delay="500ms" data-wow-duration="1500ms"><?php echo wp_kses_post( $data['sub_title'] );?></div>
	<?php } ?>
	
	<?php if ( !empty( $data['title'] ) ) { ?>
		<h2 class="rtin-title <?php echo esc_attr( $data['animation_offon'] ); ?> <?php echo esc_attr( $data['animation'] ); ?>" data-wow-delay="800ms" data-wow-duration="1500ms"><?php echo wp_kses_post( $data['title'] );?></h2>		
	<?php } ?>	
	
	<div class="rtin-content <?php echo esc_attr( $data['animation_offon'] ); ?> <?php echo esc_attr( $data['animation'] ); ?>" data-wow-delay="1100ms" data-wow-duration="1500ms"><?php echo wp_kses_post( $data['content'] );?></div>
	
	<?php if ( $data['button_display']  == 'yes' ) { ?>
		<?php if ( $btn ) { ?>
			<div class="rtin-button <?php echo esc_attr( $data['animation_offon'] ); ?> <?php echo esc_attr( $data['animation'] ); ?>" data-wow-delay="1200ms" data-wow-duration="1500ms"><?php echo wp_kses_post( $btn );?></div>
		<?php } ?>
	<?php } ?>
</div>