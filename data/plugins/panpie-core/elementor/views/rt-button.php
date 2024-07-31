<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;
extract($data);

$final_icon_class       = " fas fa-thumbs-up";
if ( is_string( $icon_class['value'] ) && $dynamic_icon_class =  $icon_class['value']  ) {
  $final_icon_class     = $dynamic_icon_class;
}


?>
<div class="rt-button rt-button-<?php echo esc_attr( $data['style'] ); ?>">
	<?php if( !empty( $data['buttontext'] ) ) { ?>
		<a class="button <?php echo esc_attr( $data['icon_position'] ); ?>" href="<?php echo esc_url( $data['buttonurl']['url'] );?>">
            <?php if($data['icon_position'] == 'icon-left') { ?><i class="<?php  echo esc_attr( $final_icon_class ); ?>"></i><?php } ?>
            <?php echo esc_html( $data['buttontext'] );?>
            <?php if($data['icon_position'] == 'icon-right') { ?><i class="<?php  echo esc_attr( $final_icon_class ); ?>"></i><?php } ?>
      	</a>
	<?php } ?>
</div>