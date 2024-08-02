<?php

/*************************************************
## Main Header Function
*************************************************/

add_action('shopwise_main_header','shopwise_main_header_function',10);

if ( ! function_exists( 'shopwise_main_header_function' ) ) {
	function shopwise_main_header_function(){
	
?>	
		<?php  
		if(get_theme_mod('shopwise_subscribe_popup') == 'on'){
			get_template_part( 'includes/header/subscribe-popup' ); 
		}
		?>
	
<?php
		if(shopwise_page_settings('page_header_type') == 'type5'){
		
		get_template_part( 'includes/header/header-type5' );

		} elseif(shopwise_page_settings('page_header_type') == 'type4'){
			
			get_template_part( 'includes/header/header-type4' );

		} elseif(shopwise_page_settings('page_header_type') == 'type3'){
			
			get_template_part( 'includes/header/header-type3' );
			
		} elseif(shopwise_page_settings('page_header_type') == 'type2'){
			
			get_template_part( 'includes/header/header-type2' );
			
		} elseif(shopwise_page_settings('page_header_type') == 'type1') {
			
			get_template_part( 'includes/header/header-type1' );
			
		} elseif(get_theme_mod('shopwise_header_type') == 'type5'){
			
			get_template_part( 'includes/header/header-type5' );
			
		} elseif(get_theme_mod('shopwise_header_type') == 'type4'){
			
			get_template_part( 'includes/header/header-type4' );

		} elseif(get_theme_mod('shopwise_header_type') == 'type3'){

			get_template_part( 'includes/header/header-type3' );

		} elseif(get_theme_mod('shopwise_header_type') == 'type2'){
			
			get_template_part( 'includes/header/header-type2' );
			
		} else {
			
			get_template_part( 'includes/header/header-type1' );
			
		}
		
	}
}



?>
