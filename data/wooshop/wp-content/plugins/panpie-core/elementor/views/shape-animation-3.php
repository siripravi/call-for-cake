<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;
use PanpieTheme_Helper;
?>
<div class="rt-animate-image animate-image-<?php echo esc_attr( $data['style'] ); ?>">
	<div class="figure-holder">	
		<div class="left-holder wow <?php echo esc_attr( $data['left_animation'] ); ?>" data-wow-delay="<?php echo esc_attr( $data['delay'] ); ?>" data-wow-duration="<?php echo esc_attr( $data['duration'] ); ?>">			
			<img src="<?php echo PANPIE_ASSETS_URL . 'element/shape13.png'; ?>" alt="shape13">
		</div>
		<div class="right-holder wow <?php echo esc_attr( $data['right_animation'] ); ?>" data-wow-delay="<?php echo esc_attr( $data['delay'] ); ?>" data-wow-duration="<?php echo esc_attr( $data['duration'] ); ?>" >			
			<img src="<?php echo PANPIE_ASSETS_URL . 'element/shape14.png'; ?>" alt="shape14">
		</div>
	</div>
</div>