<?php
get_header();
get_template_part( 'inc/templates/misc/breadcrumbs' );
get_template_part( 'inc/templates/misc/header-archive' );
$blog_style_get = filter_input( INPUT_GET, 'blog_style', FILTER_SANITIZE_STRING );
$blog_layout    = isset( $blog_style_get ) ? $blog_style_get : ot_get_option( 'blog_style', 'style1' );

?>
<div class="row">
	<div class="small-12 columns">
		<div class="sidebar-container<?php if ( ! is_active_sidebar( 'archive' ) ) { ?> no-sidebar<?php } ?>">
			<div class="sidebar-content-main">
				<div class="row">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							$columns = is_active_sidebar( 'archive' ) ? false : 3;
							set_query_var( 'thb_date', ( 'on' === ot_get_option( 'post_meta_date', 'on' ) ) );
							set_query_var( 'thb_cat', ( 'on' === ot_get_option( 'post_meta_cat', 'on' ) ) );
							set_query_var( 'thb_columns', $columns );
							set_query_var( 'thb_excerpt', ( 'on' === ot_get_option( 'post_meta_excerpt', 'on' ) ) );
							get_template_part( 'inc/templates/post-styles/' . $blog_layout );
						endwhile;
						else :
							get_template_part( 'inc/templates/misc/not-found' );
						endif;
						?>
				</div>
				<?php thb_pagination(); ?>
			</div>
			<?php if ( is_active_sidebar( 'archive' ) ) { ?>
				<div class="sidebar">
					<?php do_action( 'thb_archive_sidebar' ); ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php
get_footer();
