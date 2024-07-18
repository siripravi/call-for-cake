<?php get_header(); ?>
<?php get_template_part( 'inc/templates/misc/breadcrumbs' ); ?>
<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		if ( post_password_required() ) {
			get_template_part( 'inc/templates/misc/password-protected' );
		} else {
			get_template_part( 'inc/templates/post-detail-styles/style1' );
		}
	endwhile;
endif;

get_footer();

