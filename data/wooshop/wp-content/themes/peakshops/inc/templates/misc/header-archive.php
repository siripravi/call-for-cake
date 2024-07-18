<?php
if ( is_front_page() ) {
	return;
}
?>
<div class="row">
	<div class="small-12 columns">
		<div class="archive-title search-title">
			<div class="row align-center text-center">
				<div class="small-12 medium-8 large-6 columns">
					<h1>
						<?php
						if ( is_category() ) {
							echo single_cat_title( '', false );

						} elseif ( is_tag() ) {
							echo single_tag_title( '', false );

						} elseif ( is_search() ) {
							printf( esc_html__( 'Search Results for: %s', 'peakshops' ), '<span>' . get_search_query() . '</span>' );

						} elseif ( is_author() ) {
							printf( esc_html__( 'Author Archives: %s', 'peakshops' ), '<span>' . get_the_author() . '</span>' );

						} elseif ( is_day() ) {
							printf( esc_html__( 'Daily Archives: %s', 'peakshops' ), '<span>' . get_the_date() . '</span>' );

						} elseif ( is_month() ) {
							printf( esc_html__( 'Monthly Archives: %s', 'peakshops' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

						} elseif ( is_year() ) {
							printf( esc_html__( 'Yearly Archives: %s', 'peakshops' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

						} elseif ( is_home() ) {
							esc_html_e( 'Latest News', 'peakshops' );
						}
						?>
					</h1>
					<?php
					if ( get_the_archive_description() ) {
						the_archive_description();
					} elseif ( is_page() ) {
						$thb_id = get_queried_object_id();
						echo wpautop( get_the_excerpt( $thb_id ) );
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
