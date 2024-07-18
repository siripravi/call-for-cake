<div class="row">
	<div class="small-12 columns">
		<div class="thb-breadcrumb-bar">
			<?php
			if ( function_exists( 'yoast_breadcrumb' ) && 'on' === ot_get_option( 'thb_yoast_breadcrumbs', 'off' ) ) {
				yoast_breadcrumb( '<p id="breadcrumbs" class="woocommerce-breadcrumb">', '</p>' );
			} elseif ( function_exists( 'rank_math_the_breadcrumbs' ) && 'on' === ot_get_option( 'thb_rankmath_breadcrumbs', 'off' ) ) {
				rank_math_the_breadcrumbs();
			} else {
				thb_breadcrumb_trail(
					array(
						'show_on_front' => false,
						'show_title'    => true,
						'show_browse'   => false,
					)
				);
			}
			?>
		</div>
	</div>
</div>
