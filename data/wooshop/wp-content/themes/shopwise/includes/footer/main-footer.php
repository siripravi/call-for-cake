<?php
if ( ! function_exists( 'shopwise_main_footer_function' ) ) {
	function shopwise_main_footer_function(){
		
	?>

		<?php if(get_theme_mod('shopwise_footer_subscribe_area') == 1 ){ ?>
			<?php if(shopwise_page_settings('hide_subscribe_form') != 'yes'){ ?>
			<div class="section bg_default small_pt small_pb">
				<div class="container">	
					<div class="row align-items-center">	
						<div class="col-md-6">
							<div class="heading_s1 mb-md-0 heading_light">
								<h3><?php echo esc_html(get_theme_mod('shopwise_footer_subscribe_title')); ?></h3>
							</div>
						</div>
						<div class="col-md-6">
							<div class="newsletter_form">
								<?php echo do_shortcode('[mc4wp_form id="'.get_theme_mod('shopwise_footer_subscribe_formid').'"]'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		<?php } ?>
		
		</div>

		<?php if(shopwise_page_settings('hide_page_footer') != 'yes'){ ?>
		<footer class="footer_dark">

			<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) || is_active_sidebar( 'footer-5' ) ) { ?>
			<div class="footer_top">
				<div class="container">
					<div class="row">
						<?php if(get_theme_mod('shopwise_footer_column') == '3columns'){ ?>
							<div class="col-lg-4 col-md-4 col-sm-12">
								<?php dynamic_sidebar( 'footer-1' ); ?>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-6">
								<?php dynamic_sidebar( 'footer-2' ); ?>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-6">
								<?php dynamic_sidebar( 'footer-3' ); ?>
							</div>
						<?php } elseif(get_theme_mod('shopwise_footer_column') == '4columns'){ ?>
							<div class="col-lg-3 col-md-3 col-sm-12">
								<?php dynamic_sidebar( 'footer-1' ); ?>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6">
								<?php dynamic_sidebar( 'footer-2' ); ?>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6">
								<?php dynamic_sidebar( 'footer-3' ); ?>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6">
								<?php dynamic_sidebar( 'footer-4' ); ?>
							</div>
						<?php } else { ?>
							<div class="col-lg-3 col-md-6 col-sm-12">
								<?php dynamic_sidebar( 'footer-1' ); ?>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-6">
								<?php dynamic_sidebar( 'footer-2' ); ?>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-6">
								<?php dynamic_sidebar( 'footer-3' ); ?>
							</div>
							<div class="col-lg-2 col-md-6 col-sm-6">
								<?php dynamic_sidebar( 'footer-4' ); ?>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6">
								<?php dynamic_sidebar( 'footer-5' ); ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php } ?>
			
			<div class="bottom_footer border-top-tran">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<?php if(get_theme_mod( 'shopwise_copyright' )){ ?>
								<p class="mb-md-0 text-center text-md-left"><?php echo shopwise_sanitize_data(get_theme_mod( 'shopwise_copyright' )); ?></p>
							<?php } else { ?>
								<p class="mb-md-0 text-center text-md-left"><?php esc_html_e('Copyright 2022.KlbTheme . All rights reserved','shopwise'); ?></p>
							<?php } ?>
						</div>
						<div class="col-md-6">
							<?php $paymentimage = get_theme_mod('shopwise_footer_payment'); ?>
							<?php if($paymentimage){ ?> 
								<ul class="footer_payment text-center text-lg-right">
									<?php foreach($paymentimage as $p){ ?> 
										<li><img src="<?php echo esc_url( shopwise_get_image($p['payment_image']) ); ?>" alt="<?php esc_attr_e('payment-image','shopwise'); ?>"></li>
									<?php } ?>
								</ul>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<?php } ?>

		<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

		
		<?php $mobilebottommenu = get_theme_mod('shopwise_mobile_bottom_menu','0'); ?>
		<?php if($mobilebottommenu == '1'){ ?>
		
			<?php $edittoggle = get_theme_mod('shopwise_mobile_bottom_menu_edit_toggle','0'); ?>
			<?php if($edittoggle == '1'){ ?>
				<div class="footer-fix-nav shadow">
					<div class="row mx-0">
						<?php $editrepeater = get_theme_mod('shopwise_mobile_bottom_menu_edit'); ?>
						
						<?php foreach($editrepeater as $e){ ?>		
						<?php if($e['mobile_menu_type'] == 'Home'){ ?>
								<div class="col">
									<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>"><i class="ion-home"></i></a>
								</div>
							<?php } elseif($e['mobile_menu_type'] == 'Shop'){ ?>
								<div class="col">
									<a href="<?php echo wc_get_page_permalink( 'shop' ); ?>"><i class="ion-android-apps"></i></a>
								</div>
							<?php } elseif($e['mobile_menu_type'] == 'Category'){ ?>
								<div class="col">
									<a class="button-filter" data-toggle="offcanvas" href="#" href="<?php echo wc_get_page_permalink( 'shop' ); ?>"><i class="ion-funnel"></i></a>
								</div>	
							<?php } elseif($e['mobile_menu_type'] == 'Cart'){ ?>
								<div class="col">
									<?php global $woocommerce; ?>
									<a href="<?php echo esc_url(wc_get_cart_url()); ?>"><i class="ion-ios-cart"></i><span class="cart_count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'shopwise'), $woocommerce->cart->cart_contents_count);?></a>
								</div>
							<?php } elseif($e['mobile_menu_type'] == 'Myaccount'){ ?>
								<div class="col">
									<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>"><i class="ion-person"></i></a>
								</div>
							<?php } else { ?>	
								<div class="col">
									<a href="<?php echo esc_url($e['mobile_menu_url']); ?>">
										<i class="<?php echo esc_attr($e['mobile_menu_icon']); ?>"></i>
									</a>
								</div>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
				<?php } else { ?>
				<div class="footer-fix-nav shadow">
					<div class="row mx-0">
						<div class="col">
							<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>"><i class="ion-home"></i></a>
						</div>
						<?php if(is_shop() || is_product_category()){ ?>
						<div class="col">
							<a class="button-filter" data-toggle="offcanvas" href="#" href="<?php echo wc_get_page_permalink( 'shop' ); ?>"><i class="ion-funnel"></i></a>
						</div>
						<?php } else { ?>
						<div class="col">
							<a href="<?php echo wc_get_page_permalink( 'shop' ); ?>"><i class="ion-android-apps"></i></a>
						</div>
						<?php } ?>
						<div class="col">
							<?php global $woocommerce; ?>
							<a href="<?php echo esc_url(wc_get_cart_url()); ?>"><i class="ion-ios-cart"></i><span class="cart_count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'shopwise'), $woocommerce->cart->cart_contents_count);?></a>
						</div>
						<div class="col">
							<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>"><i class="ion-person"></i></a>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php } ?>

		<?php if(get_theme_mod('shopwise_grid_list_view','0') == '1' || $mobilebottommenu == '1'){ ?>
			<?php if(is_shop() || is_product_category()){ ?>
				<?php get_template_part('includes/woocommerce-mobile-filter'); ?> 
			<?php } ?>
		<?php } ?>
		
	<?php }
}

add_action('shopwise_main_footer','shopwise_main_footer_function', 10);