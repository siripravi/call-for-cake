<?php

/*************************************************
## Styles and Scripts
*************************************************/ 
define('KLB_INDEX_JS', plugin_dir_url( __FILE__ )  . '/js');
define('KLB_INDEX_CSS', plugin_dir_url( __FILE__ )  . '/css');

function klb_scripts() {
     wp_register_script( 'jquery-socialshare',    KLB_INDEX_JS . '/jquery-socialshare.js', array('jquery'), '1.0', true);
     wp_register_script( 'klb-social-share', 	  KLB_INDEX_JS . '/custom/social_share.js', array('jquery'), '1.0', true);
     wp_register_script( 'klb-widget-product-categories', 	  plugins_url( 'widgets/js/widget-product-categories.js', __FILE__ ), true );
}
add_action( 'wp_enqueue_scripts', 'klb_scripts' );

/*----------------------------
  Elementor Get Templates
 ----------------------------*/
if ( ! function_exists( 'shopwise_get_elementorTemplates' ) ) {
    function shopwise_get_elementorTemplates( $type = null )
    {
        if ( class_exists( '\Elementor\Plugin' ) ) {

            $args = [
                'post_type' => 'elementor_library',
                'posts_per_page' => -1,
            ];

            $templates = get_posts( $args );
            $options = array();

            if ( !empty( $templates ) && !is_wp_error( $templates ) ) {

				$options['0'] = esc_html__('Set a Template','shopwise-core');

                foreach ( $templates as $post ) {
                    $options[ $post->ID ] = $post->post_title;
                }
            } else {
                $options = array(
                    '' => esc_html__( 'No template exist.', 'shopwise-core' )
                );
            }

            return $options;
        }
    }
}

/*----------------------------
  Single Share
 ----------------------------*/
add_action( 'woocommerce_single_product_summary', 'shopwise_social_share', 70);
function shopwise_social_share(){
	$socialshare = get_theme_mod( 'shopwise_shop_social_share', '0' );

	if($socialshare == '1'){
	wp_enqueue_script('jquery-socialshare');
	wp_enqueue_script('klb-social-share');
	
	$single_share_multicheck = get_theme_mod('shopwise_shop_single_share',array( 'facebook', 'twitter', 'pinterest', 'linkedin', 'tumblr'));
	
	  echo '<div class="social shop-social social-container product_share">';
		  echo '<span>'.esc_html__('Share:','shopwise').'</span>';
		  echo '<ul class="social_icons">';
		  
			if(in_array('facebook', $single_share_multicheck)){
			  echo '<li><a href="#" class="facebook" aria-label="'.esc_attr__('Share this page with Facebook','shopwise').'" role="button"><i class="ion-social-facebook"></i></a></li>';
			}
			if(in_array('twitter', $single_share_multicheck)){  
			  echo '<li><a href="#" class="twitter" aria-label="'.esc_attr__('Share this page with Twitter','shopwise').'"><i class="ion-social-twitter"></i></a></li>';
			}
			if(in_array('pinterest', $single_share_multicheck)){  
			  echo '<li><a href="#" href="#" class="pinterest" aria-label="'.esc_attr__('Share this page with Pinterest','shopwise').'"><i class="ion-social-pinterest"></i></a></li>';
			}
			if(in_array('linkedin', $single_share_multicheck)){  
			  echo '<li><a href="#" class="linkedin" aria-label="'.esc_attr__('Share this page with Linkedin','shopwise').'"><i class="ion-social-linkedin"></i></a></li>';
			}
			if(in_array('tumblr', $single_share_multicheck)){  
			  echo '<li><a href="#" class="tumblr" aria-label="'.esc_attr__('Share this page with Tumblr','shopwise').'"><i class="ion-social-tumblr"></i></a></li>';
			} 
			
		  echo '</ul>';	
	  echo '</div>';
	  
	}
}