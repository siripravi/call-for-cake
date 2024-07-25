<?php

$thb_links = apply_filters(
	'thb_admin_page_tabs',
	array(
		'thb-product-registration' => 'Product Registration',
		'thb-plugins'              => 'Install Plugins',
		'thb-demo-import'          => 'Demo Content Import',
		'thb-theme-options'        => 'Theme Options',
	)
);

?>
<h2 class="nav-tab-wrapper wp-clearfix">
<?php
foreach ( $thb_links as $thb_link_id => $thb_title ) {
	?>
	<a href="<?php echo esc_url( "admin.php?page={$thb_link_id}" ); ?>" class="nav-tab
						<?php
						if ( $thb_link_id === $_GET['page'] ) {
							echo ' nav-tab-active'; }
						?>
	">
		<?php echo esc_attr( $thb_title ); ?>
	</a>
	<?php
}
?>
</h2>
