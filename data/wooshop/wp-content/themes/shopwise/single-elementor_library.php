<?php

/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package WordPress
* @subpackage Machic
* @since 1.0.0
*/

	remove_action( 'shopwise_main_header', 'shopwise_main_header_function', 10 );
	remove_action( 'shopwise_main_footer', 'shopwise_main_footer_function', 10 );

	remove_action( 'shopwise_before_main_shop', 'shopwise_get_elementor_template', 10);
	remove_action( 'shopwise_after_main_shop', 'shopwise_get_elementor_template', 10);
	remove_action( 'shopwise_before_main_footer', 'shopwise_get_elementor_template', 10);
	remove_action( 'shopwise_after_main_footer', 'shopwise_get_elementor_template', 10);
	remove_action( 'shopwise_before_main_header', 'shopwise_get_elementor_template', 10);
	remove_action( 'shopwise_after_main_header', 'shopwise_get_elementor_template', 10);

    get_header();

    while ( have_posts() ) : the_post();
        the_content();
    endwhile;

    get_footer();
?>
