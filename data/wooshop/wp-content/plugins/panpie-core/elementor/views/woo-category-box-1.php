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
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="71.281" height="32.16" viewBox="0 0 71.281 32.16">
				  <path d="M71.077,18.003 L69.209,20.351 C68.865,20.783 68.236,20.855 67.804,20.511 C67.372,20.167 67.300,19.538 67.644,19.106 L69.512,16.758 C69.856,16.326 70.485,16.254 70.917,16.598 C71.349,16.942 71.421,17.571 71.077,18.003 ZM61.738,29.742 C61.394,30.174 60.765,30.246 60.333,29.902 C59.901,29.558 59.829,28.929 60.173,28.497 L64.531,23.019 C64.875,22.586 65.504,22.515 65.936,22.859 C66.368,23.203 66.440,23.832 66.096,24.264 L61.738,29.742 ZM55.464,15.547 C55.208,16.036 54.603,16.225 54.114,15.968 C53.625,15.711 53.437,15.107 53.693,14.618 L58.804,4.877 C59.060,4.388 59.665,4.200 60.154,4.456 C60.643,4.713 60.831,5.317 60.575,5.806 L55.464,15.547 ZM51.747,22.631 C51.491,23.120 50.886,23.309 50.397,23.052 C49.908,22.796 49.720,22.191 49.976,21.702 L50.906,19.931 C51.162,19.442 51.767,19.254 52.256,19.510 C52.745,19.767 52.933,20.371 52.677,20.860 L51.747,22.631 ZM40.691,15.759 C40.551,16.293 40.005,16.612 39.471,16.472 C38.936,16.332 38.617,15.786 38.757,15.252 L42.559,0.741 C42.699,0.207 43.245,-0.112 43.779,0.028 C44.314,0.168 44.633,0.714 44.493,1.248 L40.691,15.759 ZM27.155,17.660 L22.207,3.500 C22.025,2.978 22.300,2.408 22.821,2.226 C23.342,2.044 23.913,2.319 24.095,2.840 L29.043,17.000 C29.225,17.522 28.950,18.092 28.429,18.274 C27.908,18.456 27.337,18.181 27.155,17.660 ZM18.380,24.033 L17.406,22.287 C17.137,21.805 17.310,21.195 17.792,20.926 C18.274,20.657 18.883,20.830 19.152,21.312 L20.127,23.059 C20.396,23.541 20.223,24.150 19.741,24.419 C19.258,24.689 18.649,24.516 18.380,24.033 ZM14.483,17.047 L9.123,7.441 C8.854,6.959 9.027,6.350 9.509,6.081 C9.992,5.811 10.601,5.984 10.870,6.467 L16.229,16.073 C16.498,16.555 16.325,17.164 15.843,17.433 C15.361,17.702 14.752,17.529 14.483,17.047 ZM10.878,31.932 C10.444,32.274 9.815,32.198 9.474,31.764 L5.148,26.261 C4.807,25.827 4.882,25.198 5.316,24.857 C5.750,24.516 6.379,24.591 6.720,25.025 L11.046,30.528 C11.388,30.962 11.312,31.591 10.878,31.932 ZM2.058,22.330 L0.204,19.972 C-0.138,19.538 -0.062,18.909 0.372,18.568 C0.806,18.226 1.435,18.302 1.776,18.736 L3.630,21.094 C3.971,21.528 3.896,22.157 3.462,22.498 C3.028,22.840 2.399,22.765 2.058,22.330 Z" class="cls-1"/>
				</svg>
			</div>
			<div class="media-body">
				<h3 class="rtin-title"><?php echo esc_html( $woo_category->name ); ?></h3>
				<?php if ( $data['cat_num_display']  == 'yes' ) { ?><span class="rtin-sub-title">(<?php echo esc_html( $woo_category->count ); ?>)</span><?php } ?>
			</div>
		</div>
	</a>
</div>