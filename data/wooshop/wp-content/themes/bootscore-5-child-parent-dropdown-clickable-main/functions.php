<?php

	// style and scripts
	 add_action( 'wp_enqueue_scripts', 'bootscore_5_child_enqueue_styles' );
	 function bootscore_5_child_enqueue_styles() {
         
         // style.css
         wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
         
         // custom.js
         //wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', false, '', true);

     } 





// Dequeue bootScore theme.js
function bootscore_remove_scripts() {
        
    // Dequeue parent theme.js
    wp_dequeue_script( 'bootscore-script' );
    wp_deregister_script( 'bootscore-script' );
        
    // Enqueue child chustom.js
    wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', false, '', true);

}
add_action( 'wp_enqueue_scripts', 'bootscore_remove_scripts', 20 );




// Register Nav Walker class_alias
if ( ! function_exists( 'register_navwalker' ) ) :
    function register_navwalker(){
        require_once('inc/class-wp-bootstrap-navwalker.php');
    }
endif;
add_action( 'after_setup_theme', 'register_navwalker' );