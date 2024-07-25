<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;
use PanpieTheme;
use PanpieTheme_Helper;
use Elementor\Utils;
use \WP_Query;

$socials = array(
	'facebook' => array(
		'text' => 'facebook',
		'icon' => 'fa-facebook-f',
		'url'  => $data['facebook'],
	),
	'twitter' => array(
		'text' => 'twitter',
		'icon' => 'fa-twitter',
		'url'  => $data['twitter'],
	),
	'linkedin' => array(
		'text' => 'linkedin',
		'icon' => 'fa-linkedin-in',
		'url'  => $data['linkedin'],
	),
	'goplus'   => array(
		'text' => 'google plus',
		'icon' => 'fa-google-plus',
		'url'  => $data['goplus'],
	),
	'instagram'   => array(
		'text' => 'Instagram',
		'icon' => 'fa-instagram',
		'url'  => $data['instagram'],
	),
	'whatsapp'   => array(
		'text' => 'Whatsapp',
		'icon' => 'fa-whatsapp',
		'url'  => $data['whatsapp'],
	),
	'youtube'   => array(
		'text' => 'Youtube',
		'icon' => 'fa-youtube',
		'url'  => $data['youtube'],
	),
);
?>
<?php if ( $data['preloader'] == 'yes' ) { ?>
<div id="preloader" class="preloader2">
	<div class="preloader-wrap">
		<div class="preloader-content">
			<div class="circle"></div>
		</div>
	</div>
</div>
<?php } ?>
<!-- MultiScroll Area End Here -->
<div id="multiscroll" class="multiscroll-wrapper">
	<div class="ms-left">
	<?php
		$i = 1;		
		foreach ( $data['split_item_lists'] as $split_item_list ) { ?>	
		<div class="ms-section left-slide1 <?php if ( $i == 1 ) { ?>active<?php } ?>">
		    <?php if ( $data['split_shape'] == 'yes' ) { ?>
			<ul class="split-shape-holder">
				<li class="shape1">
					<img width="236" height="70" loading='lazy' src="<?php echo PANPIE_ASSETS_URL . 'element/split_shape_1.png'; ?>" alt="<?php esc_html_e('split-shape1', 'panpie'); ?>">
				</li>
				<li class="shape2">
					<img width="659" height="276" loading='lazy' src="<?php echo PANPIE_ASSETS_URL . 'element/split_shape_2.png'; ?>" alt="<?php esc_html_e('split-shape2', 'panpie'); ?>">
				</li>
				<li class="shape3">
					<img width="168" height="133" loading='lazy' src="<?php echo PANPIE_ASSETS_URL . 'element/split_shape_3.png'; ?>" alt="<?php esc_html_e('split-shape3', 'panpie'); ?>">
				</li>
				<li class="shape4">
					<img width="380" height="182" loading='lazy' src="<?php echo PANPIE_ASSETS_URL . 'element/split_shape_4.png'; ?>" alt="<?php esc_html_e('split-shape4', 'panpie'); ?>">
				</li>
				<li class="shape5">
					<img width="255" height="192" loading='lazy' src="<?php echo PANPIE_ASSETS_URL . 'element/split_shape_5.png'; ?>" alt="<?php esc_html_e('split-shape5', 'panpie'); ?>">
				</li>
				<li class="shape6">
					<img width="171" height="164" loading='lazy' src="<?php echo PANPIE_ASSETS_URL . 'element/split_shape_6.png'; ?>" alt="<?php esc_html_e('split-shape6', 'panpie'); ?>">
				</li>
			</ul>		
			<?php } ?>
			<div class="item-content">
			<h2 class="item-title"><?php echo wp_kses_post( $split_item_list['item_title'] ); ?></h2>
			<a href="<?php echo $split_item_list['multi_button_url']['url'] ; ?>" class="btn-fill-dark"><i class="fas fa-shopping-cart"></i><?php echo esc_html( $split_item_list['multi_button_text'] ); ?></a>
			</div>
		</div>
	<?php $i++; } ?>
	</div>
	<div class="ms-right">
	<?php
		$i = 1;
		foreach ( $data['split_item_lists'] as $split_item_list ) { ?>	
		<div class="ms-section right-slide<?php echo esc_html( $i ); ?> <?php if ( $i == 1 ) { ?>active<?php } ?>">
			<div class="d-none d-xl-block d-lg-block">
				<?php if ( !empty( $split_item_list['image']['id'] ) ) { 
					echo wp_get_attachment_image( $split_item_list['image']['id'], 'full' ); 
				 } else { 
					echo '<img class="wp-post-image" src="' . PanpieTheme_Helper::get_img( 'noimage.jpg' ) . '" alt="'.get_the_title().'">';
				} ?>
			</div>			
			<div class="d-block d-xl-none d-lg-none">
				<?php if ( !empty( $split_item_list['image']['id'] ) ) { 
					echo wp_get_attachment_image( $split_item_list['image']['id'], 'full' ); 
				 } else { 
					echo '<img class="wp-post-image" src="' . PanpieTheme_Helper::get_img( 'noimage.jpg' ) . '" alt="'.get_the_title().'">';
				} ?>
			</div>		
		</div>
	<?php $i++; } ?>		
	</div>
	
	<?php if ( $data['footer_info'] == 'yes' ) { ?>
	<div class="social-menu-area">
		<ul class="ms-social-link">
			<?php if ( !empty( $data['followus'] )) { ?>
			<li><span><?php echo esc_html( $data['followus'] ); ?><span></li>
			<?php } ?>
			<?php foreach ( $socials as $social ): ?>
				<?php if ( !empty( $social['url']['url'] ) ): ?>
					<li><a target="_blank" href="<?php echo esc_url( $social['url']['url'] );?>"><i class="fab <?php echo esc_attr( $social['icon'] );?>" aria-hidden="true"></i></a></li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php } ?>
	<?php if ( $data['copyright'] == 'yes' ) { ?>
	<div class="ms-copyright"><?php echo wp_kses_post( PanpieTheme::$options['copyright_text'] );?></div>
	<?php } ?>
	
</div>