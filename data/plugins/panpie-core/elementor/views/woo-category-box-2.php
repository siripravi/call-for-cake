<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;


use PanpieTheme;
use PanpieTheme_Helper;
use \WP_Query;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

extract($data);

$woo_category = get_term_by( 'id', absint( $data['cat_multi_category'] ), 'product_cat' );

//category link
$term_link = get_term_link( absint( $data['cat_multi_category'] ) );

//image or icon
$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'active_image_size', 'active_image' );
$getimgHover = Group_Control_Image_Size::get_attachment_image_html( $data, 'hover_image_size', 'hover_image' );

$final_icon_class       = " fas fa-thumbs-up";
$final_icon_image_url   = '';
if ( is_string( $icon_class['value'] ) && $dynamic_icon_class =  $icon_class['value']  ) {
  $final_icon_class = $dynamic_icon_class;
}
if ( is_array( $icon_class['value'] ) ) {
  $final_icon_image_url = $icon_class['value']['url'];
}

?>
<div class="default-category-box category-box-<?php echo esc_attr( $data['style'] ); ?>">
	<a href="<?php echo esc_url( $term_link ); ?>" <?php if ( !empty( $data['icontype']== 'image' ) ) { ?>class="es-min-height"<?php } ?>>
		<div class="media">
			<div class="rt-categoty-icon <?php echo esc_attr( $data['img_scale'] ); ?> <?php if ( !empty( $data['icontype']== 'image' ) ) { ?>d-flex<?php } ?>" style="font-size:<?php echo esc_attr( $icon_size ); ?>px">
			<div class="svg-shape">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="63.937" height="60" viewBox="0 0 63.937 60"><path d="M33.562,-0.000 C50.130,-0.000 66.697,13.730 63.562,29.999 C60.562,45.568 53.530,59.931 33.562,59.999 C18.069,60.052 -2.438,49.068 3.562,29.999 C8.535,14.195 -0.007,-0.000 33.562,-0.000 Z" class="shape-1"></path></svg>
			
				<?php if ( !empty( $data['icontype']== 'image' ) ) { ?>
					<span class="imgnormal"><?php echo wp_kses_post( $getimg ); ?></span>
					<?php if ( !empty( $getimgHover ) ) { ?>
					<span class="imghover"><?php echo wp_kses_post( $getimgHover ); ?></span>
					<?php }
					} else {
						if ( $final_icon_image_url ) { ?>
						<span class="svg-img"><img src="<?php echo esc_url( $final_icon_image_url ); ?>" alt="SVG Icon"></span>
					<?php } else { ?>
						<i class="<?php  echo esc_attr( $final_icon_class ); ?>"></i>
					<?php } ?>
				<?php } ?>
			</div>
			<div class="media-body">
				<h3 class="rtin-title"><?php echo esc_html( $woo_category->name ); ?></h3>
				<?php if ( $data['cat_num_display']  == 'yes' ) { ?><span class="rtin-sub-title">(<?php echo esc_html( $woo_category->count ); ?>)</span><?php } ?>
			</div>
			</div>
		</div>
	</a>
</div>