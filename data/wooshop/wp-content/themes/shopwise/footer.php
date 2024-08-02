<?php
/**
 * footer.php
 * @package WordPress
 * @subpackage Shopwise
 * @since Shopwise 1.0
 * 
 */
 ?>
 
	<?php do_action('shopwise_top_footer');?>

	<?php shopwise_do_action( 'shopwise_before_main_footer'); ?>

	<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) { ?>
		<?php
        /**
        * Hook: shopwise_main_footer
        *
        * @hooked shopwise_main_footer_function - 10
        */
        do_action( 'shopwise_main_footer' );
	
		?>
	<?php } ?>

	<?php shopwise_do_action( 'shopwise_after_main_footer'); ?>

	<?php wp_footer(); ?>
	</body>
</html>