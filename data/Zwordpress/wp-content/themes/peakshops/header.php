<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php

	/**
	 * Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */

	wp_head();
	?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php do_action( 'thb_before_wrapper' ); ?>
<!-- Start Wrapper -->
<div id="wrapper">
	<?php do_action( 'thb_before_header' ); ?>
	<?php
	// Sub-Header.
	if ( 'on' === ot_get_option( 'subheader', 'off' ) ) {
		get_template_part( 'inc/templates/subheader/style1' );
	}
	?>
	<?php get_template_part( 'inc/templates/header/' . ot_get_option( 'header_style', 'style1' ) ); ?>
	<?php do_action( 'thb_before_main' ); ?>
	<div role="main">
