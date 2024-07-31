<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;
use radiustheme\Lib\WP_SVG;
?>
<div class="rt-counter rtin-counter-<?php echo esc_attr( $data['style'] );?> rtin-<?php echo esc_attr( $data['iconalign'] );?>">
	<div class="rtin-item clearfix">
		<div class="rtin-content">
			<div class="rtin-counter"><span class="counter" data-num="<?php echo esc_attr( $data['number'] );?>" data-rtspeed="<?php echo esc_attr( $data['speed'] );?>" data-rtsteps="<?php echo esc_attr( $data['steps'] );?>"><?php echo esc_html( $data['number'] );?></span></div>
			<svg 
			 xmlns="http://www.w3.org/2000/svg"
			 xmlns:xlink="http://www.w3.org/1999/xlink"
			 width="68.5px" height="19.5px">
			<path fill-rule="evenodd"  stroke="rgb(251, 100, 33)" stroke-width="1px" stroke-linecap="butt" stroke-linejoin="miter" fill="none"
			 d="M0.500,11.500 C0.500,11.500 2.285,0.789 20.500,0.500 C33.100,0.300 30.300,4.900 67.500,2.500 L62.500,9.500 L67.500,10.500 C67.500,10.500 61.700,17.700 46.500,17.500 C46.500,17.500 10.300,9.300 4.500,18.500 L6.500,10.500 L0.500,11.500 Z"/>
			</svg>
			<h3 class="rtin-title"><?php echo esc_html( $data['title'] );?></h3>
		</div>	
	</div>
</div>
