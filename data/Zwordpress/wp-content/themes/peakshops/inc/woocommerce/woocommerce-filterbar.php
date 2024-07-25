<?php
if ( ! thb_wc_supported() ) {
	return;
}
if ( is_admin() ) {
	return;
}
// Off-Canvas Filters.
function thb_shop_filters() {
	if ( is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy() ) {
		$shop_listing_filter_style_get = filter_input( INPUT_GET, 'shop_listing_filter_style', FILTER_SANITIZE_STRING );
		$shop_listing_filter_style     = isset( $shop_listing_filter_style_get ) ? $shop_listing_filter_style_get : ot_get_option( 'shop_listing_filter_style', 'style1' );

		if ( 'style3' === $shop_listing_filter_style ) {
			return;
		}
		?>
		<div id="side-filters" class="side-panel thb-side-filters">
			<header class="side-panel-header">
				<span><?php esc_html_e( 'Filter', 'peakshops' ); ?></span>
				<div class="thb-close" title="<?php esc_attr_e( 'Close', 'peakshops' ); ?>"><?php get_template_part( 'assets/img/svg/close.svg' ); ?></div>
			</header>
			<div class="side-panel-content custom_scroll">
				<?php
				if ( is_active_sidebar( 'thb-shop-filters' ) ) {
					dynamic_sidebar( 'thb-shop-filters' );
				} else {
					?>
					<p><?php esc_html_e( 'Please assign widgets to your "Shop Sidebar" inside Appearance > Widgets.', 'peakshops' ); ?></p>
					<?php
				}
				?>
			</div>
		</div>
		<?php
	}
}
add_action( 'thb_shop_filters', 'thb_shop_filters' );

// Remove/Add Breadcrumbs.
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

function thb_breadcrumbs() {
	$shop_header_style           = ot_get_option( 'shop_listing_header_style', 'style4' );
	$shop_listing_header_bgstyle = ot_get_option( 'shop_listing_header_bgstyle', 'style1' );

	$classes[]     = 'thb-woocommerce-header woocommerce-products-header';
	$row_classes[] = 'row';

	if ( ! is_product() ) {
		$shop_product_listing_fullwidth = ot_get_option( 'shop_product_listing_fullwidth', 'off' );

		$row_classes[] = 'on' === $shop_product_listing_fullwidth ? 'full-width-row' : false;

		$classes[] = $shop_header_style;
		$classes[] = 'thb-bg-' . $shop_listing_header_bgstyle;
		$classes[] = ot_get_option( 'shop_listing_header_bgstyle_color', 'light' );
	} else {
		$row_classes[] = 'on' === ot_get_option( 'shop_product_fullwidth', 'off' ) ? 'full-width-row' : false;
	}
	?>
	<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
		<div class="<?php echo esc_attr( implode( ' ', $row_classes ) ); ?>">
			<div class="small-12 columns">
				<div class="thb-breadcrumb-bar">
					<?php
					if ( ! is_product() || ( is_product() && 'on' === ot_get_option( 'shop_product_breadcrumbs', 'on' ) ) ) {
						woocommerce_breadcrumb();
					}
					?>
					<?php if ( is_product() && 'on' === ot_get_option( 'shop_product_nav', 'on' ) ) { ?>
						<?php do_action( 'thb_product_navigation' ); ?>
					<?php } ?>
				</div>
				<?php if ( ! is_product() ) { ?>
					<div class="thb-woocommerce-header-title">
						<h1 class="thb-shop-title"><?php woocommerce_page_title(); ?></h1>
						<?php
						/**
						 * Hook: woocommerce_archive_description.
						 *
						 * @hooked woocommerce_taxonomy_archive_description - 10
						 * @hooked woocommerce_product_archive_description - 10
						 */
						do_action( 'woocommerce_archive_description' );
						?>
						<?php
						$shop_listing_header_categories = ot_get_option( 'shop_listing_header_categories', 'on' );

						if ( 'on' === $shop_listing_header_categories ) {
							$parent_id  = get_queried_object_id();
							$categories = get_terms(
								'product_cat',
								array(
									'hide_empty' => 0,
									'parent'     => $parent_id,
								)
							);

							if ( count( $categories ) > 0 ) {
								?>
								<ul class="thb-shop-category-list">
									<?php foreach ( $categories as $category ) { ?>
										<li class="thb-shop-category-item">
											<a href="<?php echo esc_url( get_term_link( $category->slug, 'product_cat' ) ); ?>" class="button pill-radius small style2 thb-cat-<?php echo esc_attr( $category->slug ); ?>">
												<?php echo esc_html( $category->name ); ?>
											</a>
										</li>
									<?php } ?>
								</ul>
							<?php } ?>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php
		if ( in_array( $shop_listing_header_bgstyle, array( 'style2', 'style3' ), true ) ) {
			$shop_listing_header_height = ot_get_option( 'shop_listing_header_height' );
			$shop_listing_header_bg     = ot_get_option( 'shop_listing_header_bg' );
			?>
			<style>
				<?php if ( is_product_category() ) { ?>
					<?php
						$cat       = get_queried_object();
						$cat_id    = $cat->term_id;
						$header_id = get_term_meta( $cat_id, 'header_id', true );
						$image     = wp_get_attachment_url( $header_id, 'full' );

					?>
					.thb-woocommerce-header.thb-bg-style2>.row,
					.thb-woocommerce-header.thb-bg-style3 {
						<?php if ( $image ) { ?>
						background-image: url(<?php echo esc_url( $image ); ?>);
						<?php } else { ?>
							<?php thb_bgoutput( $shop_listing_header_bg ); ?>
						<?php } ?>
					}
				<?php } else { ?>
					.thb-woocommerce-header.thb-bg-style2>.row,
					.thb-woocommerce-header.thb-bg-style3 {
						<?php thb_bgoutput( $shop_listing_header_bg ); ?>
					}
				<?php } ?>
				<?php if ( $shop_listing_header_height ) { ?>
					.thb-woocommerce-header.thb-bg-style2>.row,
					.thb-woocommerce-header.thb-bg-style3 {
						min-height: <?php thb_measurement_output( $shop_listing_header_height ); ?>
					}
				<?php } ?>
			</style>
		<?php } ?>
	</div>
	<?php
}
add_action( 'woocommerce_before_main_content', 'thb_breadcrumbs', 20 );

function thb_filter_bar() {
	if ( is_product() ) {
		return;
	}
	$shop_listing_filter_style_get = filter_input( INPUT_GET, 'shop_listing_filter_style', FILTER_SANITIZE_STRING );
	$shop_listing_filter_style     = isset( $shop_listing_filter_style_get ) ? $shop_listing_filter_style_get : ot_get_option( 'shop_listing_filter_style', 'style1' );

	$classes[] = 'thb-filter-bar';
	$classes[] = $shop_listing_filter_style;
	?>
	<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
		<div class="row align-middle">
			<div class="small-6 medium-3 large-6 columns">
				<a href="#" id="thb-shop-filters"><?php get_template_part( 'assets/img/svg/filter.svg' ); ?> <?php esc_html_e( 'Filter', 'peakshops' ); ?></a>
			</div>
			<div class="small-6 medium-9 large-6 columns text-right">
				<?php do_action( 'thb_filter_bar_right' ); ?>
				<span class="filter-bar-title"><?php esc_html_e( 'Sort by', 'peakshops' ); ?></span>
				<?php woocommerce_catalog_ordering(); ?>
			</div>
		</div>
		<?php if ( 'style3' === $shop_listing_filter_style ) { ?>
			<div id="thb-hidden-filters" class="thb-hidden-filters">
				<?php
				if ( is_active_sidebar( 'thb-shop-filters' ) ) {
					dynamic_sidebar( 'thb-shop-filters' );
				} else {
					?>
					<p><?php esc_html_e( 'Please assign widgets to your "Shop Sidebar" inside Appearance > Widgets.', 'peakshops' ); ?></p>
					<?php
				}
				?>
			</div>
		<?php } ?>
	</div>
	<?php
}
add_action( 'woocommerce_before_shop_loop', 'thb_filter_bar', 10 );

function thb_products_per_page_variations() {
	$products_per_page_variations = ot_get_option( 'products_per_page_variations' );

	if ( ! $products_per_page_variations ) {
		return;
	}

	$products_per_page_options = explode( ',', $products_per_page_variations );

	global $wp;

	$current_url = home_url( add_query_arg( $wp->query_vars, $wp->request ) );

	$products_per_page = filter_input( INPUT_GET, 'products_per_page', FILTER_VALIDATE_INT );

	?>
	<div class="thb-products-per-page">
		<span class="filter-bar-title"><?php esc_html_e( 'Show', 'peakshops' ); ?></span>
		<?php foreach ( $products_per_page_options as $key => $value ) { ?>
			<a rel="nofollow" href="<?php echo esc_url( add_query_arg( 'products_per_page', $value, $current_url ) ); ?>" class="per-page-variation
			<?php
			if ( $products_per_page === $value ) {
				echo 'active'; }
			?>
			">
				<?php esc_html( printf( '%s', '-1' === $value ? esc_html__( 'All', 'peakshops' ) : $value ) ); ?>
			</a>
		<?php } ?>
	</div>
	<?php
}
add_action( 'thb_filter_bar_right', 'thb_products_per_page_variations', 10 );

function thb_shop_description() {
	$shop_description = ot_get_option( 'shop_description' );
	if ( is_shop() && '' !== $shop_description ) {
		?>
		<div class="term-description">
			<?php echo wp_kses_post( $shop_description ); ?>
		</div>
		<?php
	}
}
add_action( 'woocommerce_archive_description', 'thb_shop_description' );
