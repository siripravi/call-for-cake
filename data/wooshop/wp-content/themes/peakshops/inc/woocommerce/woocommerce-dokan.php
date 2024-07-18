<?php
if ( ! class_exists( 'WeDevs_Dokan' ) ) {
	return;
}
function thb_dokan_dashboard_wrap_before() {
	get_template_part( 'inc/templates/misc/page-title' );
	?>
	<div class="row">
		<div class="small-12 columns">
	<?php
}
add_action( 'dokan_dashboard_wrap_before', 'thb_dokan_dashboard_wrap_before' );

function thb_dokan_dashboard_wrap_end() {
	?>
		</div>
	</div>
	<?php
}
add_action( 'dokan_dashboard_wrap_end', 'thb_dokan_dashboard_wrap_end' );
