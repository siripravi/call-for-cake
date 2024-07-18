<?php
if ( ! is_admin() ) {
	return;
}
$templates = Thb_Theme_Admin::$thb_theme_directory . 'inc/framework/visualcomposer/templates/';
$files     = glob( $templates . 'thb-?*.php' );
foreach ( $files as $filename ) {
	require get_theme_file_path( 'inc/framework/visualcomposer/templates/' . basename( $filename ) );
}

// Render Templates Page.
add_filter( 'vc_templates_render_category', 'thb_render_template_block', 10 );
function thb_render_template_block( $category ) {

	$thb_panel_editor = new Vc_Templates_Panel_Editor();
	if ( 'thb_templates' === $category['category'] ) {
		ob_start();
		?>
		<div class="thb_templates_container vc_column vc_col-sm-12">
			<div class="thb_template_warning">
				<p><?php esc_html_e( 'These templates append the Page Builder elements to your page. The added elements still need to be configured from their settings for your content such as images, post sources, etc. as well as page options.', 'peakshops' ); ?></p>
			</div>
			<div class="theme-browser wp-clearfix">
			<?php foreach ( $category['templates'] as $key => $template ) { ?>
				<div class="thb_template theme <?php echo esc_attr( strtolower( implode( ' ', $template['cat'] ) ) ); ?>">
					<div class="theme-screenshot">
						<img src="<?php echo esc_url( $template['thumbnail'] ); ?>" alt="<?php echo esc_attr( $template['name'] ); ?>"/>
					</div>
					<h2 class="theme-name thb_template_name"><?php echo esc_attr( $template['name'] ); ?></h2>
					<div class="theme-actions">
						<a class="button button-primary thb_template_import" data-thb-id="<?php echo esc_attr( $key ); ?>"><?php esc_html_e( 'Add', 'peakshops' ); ?></a>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
		<div class="thb_library_categories">
			<ul>
				<li data-sort="all" class="active">All<span class="count">-</span></li>
				<li data-sort="homepage">Home Pages<span class="count">-</span></li>
				<li data-sort="page">Pages<span class="count">-</span></li>
				<li data-sort="banner-grid">Banner Grid<span class="count">-</span></li>
				<li data-sort="clients">Clients<span class="count">-</span></li>
				<li data-sort="counter">Counters<span class="count">-</span></li>
				<li data-sort="cta">Call To Action<span class="count">-</span></li>
				<li data-sort="divider">Dividers<span class="count">-</span></li>
				<li data-sort="hero">Hero<span class="count">-</span></li>
				<li data-sort="iconbox">Iconboxes<span class="count">-</span></li>
				<li data-sort="image-carousel">Image Carousels<span class="count">-</span></li>
				<li data-sort="image-slider">Image Sliders<span class="count">-</span></li>
				<li data-sort="misc">Misc<span class="count">-</span></li>
				<li data-sort="blog">Blog Posts<span class="count">-</span></li>
				<li data-sort="pricing-table">Pricing Table<span class="count">-</span></li>
				<li data-sort="product-category">Product Categories<span class="count">-</span></li>
				<li data-sort="products">Products<span class="count">-</span></li>
				<li data-sort="rows">Rows<span class="count">-</span></li>
				<li data-sort="social">Social<span class="count">-</span></li>
				<li data-sort="tabs">Tabs<span class="count">-</span></li>
				<li data-sort="team-members">Team Members<span class="count">-</span></li>
				<li data-sort="testimonials">Testimonials<span class="count">-</span></li>
				<li data-sort="toggle">Toggle<span class="count">-</span></li>
				<li data-sort="video-lightbox">Video Lightbox<span class="count">-</span></li>
			</ul>
		</div>
		<?php
		$category['output'] = ob_get_clean();
	}

	return $category;
}

/* Add Template Category & its templates */
add_filter( 'vc_get_all_templates', 'thb_templates' );
function thb_templates( $data ) {
	$thb_template_category = array(
		'category'             => 'thb_templates',
		'category_name'        => Thb_Theme_Admin::$thb_theme_name,
		'category_description' => esc_html__( 'Homepage layouts used inside the demos', 'peakshops' ),
		'category_weight'      => 1,
		'templates'            => thb_template_get_list(),
	);

	$data[] = $thb_template_category;
	return $data;
}

/* Ajax Action */
add_action( 'wp_ajax_thb_load_template', 'thb_load_template' );
function thb_load_template() {
	$id = filter_input( INPUT_POST, 'template_unique_id', FILTER_SANITIZE_STRING );

	$template = thb_template_get_list( $id );
	echo '' . $template['sc'];
	wp_die();
}

/* Template List */
function thb_template_get_list( $id = false ) {
	$template_list = array();
	$template_list = thb_get_bannergrid_templates( $template_list );
	$template_list = thb_get_clients_templates( $template_list );
	$template_list = thb_get_counter_templates( $template_list );
	$template_list = thb_get_cta_templates( $template_list );
	$template_list = thb_get_divider_templates( $template_list );
	$template_list = thb_get_hero_templates( $template_list );
	$template_list = thb_get_homepage_templates( $template_list );
	$template_list = thb_get_iconbox_templates( $template_list );
	$template_list = thb_get_imagecarousel_templates( $template_list );
	$template_list = thb_get_imageslider_templates( $template_list );
	$template_list = thb_get_misc_templates( $template_list );
	$template_list = thb_get_page_templates( $template_list );
	$template_list = thb_get_posts_templates( $template_list );
	$template_list = thb_get_pricingtable_templates( $template_list );
	$template_list = thb_get_productcategory_templates( $template_list );
	$template_list = thb_get_product_templates( $template_list );
	$template_list = thb_get_rows_templates( $template_list );
	$template_list = thb_get_social_templates( $template_list );
	$template_list = thb_get_tab_templates( $template_list );
	$template_list = thb_get_teammember_templates( $template_list );
	$template_list = thb_get_testimonial_templates( $template_list );
	$template_list = thb_get_toggle_templates( $template_list );
	$template_list = thb_get_videolightbox_templates( $template_list );

	if ( $id ) {
		return $template_list[ $id ];
	}
	return $template_list;
}
