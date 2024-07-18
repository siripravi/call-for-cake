<?php
	$thb_id           = get_the_ID();
	$display_title    = get_post_meta( $thb_id, 'display_title', true );
	$sidebar          = get_post_meta( $thb_id, 'sidebar', true );
	$sidebar_position = get_post_meta( $thb_id, 'sidebar_position', true );
	$custom_sidebar   = get_post_meta( $thb_id, 'custom_sidebar', true );
?>
<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php
			if ( post_password_required() ) {
				get_template_part( 'inc/templates/misc/password-protected' );
			} elseif ( thb_is_woocommerce() ) {
				?>
			<div <?php post_class(); ?>>
				<div class="row">
					<div class="small-12 columns">
						<div class="no-vc">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<div <?php post_class( 'non-VC-page' ); ?>>
				<?php if ( 'off' !== $display_title ) { ?>
					<?php get_template_part( 'inc/templates/misc/page-title' ); ?>
				<?php } ?>
				<div class="row">
					<div class="small-12 columns">
						<?php if ( 'on' === $sidebar ) { ?>
							<div class="sidebar-container <?php if ( 'right' === $sidebar_position ) { ?>sidebar-right<?php } ?>">
								<div class="sidebar">
									<?php
									if ( 'on' === $custom_sidebar ) {
										$custom_sidebar_id = get_post_meta( $thb_id, 'custom_sidebar_id', true );
										dynamic_sidebar( $custom_sidebar_id );
									} else {
										dynamic_sidebar( 'page' );
									}
									?>
								</div>
								<div class="sidebar-content-main">
									<?php the_content(); ?>
									<?php wp_link_pages(); ?>
								</div>
							</div>
						<?php } else { ?>
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
						<?php } ?>
						<?php
						if ( comments_open() || get_comments_number() ) {
							comments_template( '', true );
						}
						?>
					</div>
				</div>
			</div>
		<?php } ?>
	<?php endwhile; endif; ?>
<?php
get_footer();
