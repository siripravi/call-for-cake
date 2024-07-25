<!-- Start SearchForm -->
<form method="get" class="searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input name="s" type="text" placeholder="<?php esc_attr_e( 'Search', 'peakshops' ); ?>">
	<button type="submit" class="search-submit" value="<?php echo esc_attr_e( 'Search', 'peakshops' ); ?>" aria-label="<?php echo esc_attr_e( 'Search', 'peakshops' ); ?>"><?php get_template_part( 'assets/img/svg/search.svg' ); ?></button>
</form>
<!-- End SearchForm -->
