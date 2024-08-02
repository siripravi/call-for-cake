<?php
/**
 * header.php
 * @package WordPress
 * @subpackage Shopwise
 * @since Shopwise 1.0
 * 
 */
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( "charset" ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<?php if (!get_theme_mod( 'shopwise_loader' )) { ?>
		<div class="preloader">
			<?php if(get_theme_mod('shopwise_loader_image')){ ?>
				<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'shopwise_loader_image' )) ); ?>" alt="<?php bloginfo("name"); ?>">
			<?php } else { ?>
				<div class="lds-ellipsis">
					<span></span>
					<span></span>
					<span></span>
				</div>
			<?php } ?>
		</div>
	<?php } ?>

	<?php shopwise_do_action( 'shopwise_before_main_header'); ?>

	<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) { ?>
		<?php
        /**
        * Hook: shopwise_main_header
        *
        * @hooked shopwise_main_header_function - 10
        */
        do_action( 'shopwise_main_header' );
	
		?>
	<?php } ?>

	<?php shopwise_do_action( 'shopwise_after_main_header'); ?>



	<div class="main_content">