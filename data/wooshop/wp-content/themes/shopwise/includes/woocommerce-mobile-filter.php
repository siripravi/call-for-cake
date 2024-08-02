<div class="mobile-filter">
	<div class="mobile-filter-header">
		<h5><?php esc_html_e('Product Filters','shopwise'); ?> <a data-toggle="offcanvas" class="float-right" href="#"><i class="fa fa-times"></i></a></h5>
	</div>
	<div class="klb-sidebar sidebar">
		<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
			<?php dynamic_sidebar( 'shop-sidebar' ); ?>
		<?php } ?> 
	</div>
</div>