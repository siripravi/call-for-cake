<?php
/*
Template Name: Fullwidth Template
 */
// Layout class
if ( BootscoreChild::$layout == 'full-width' ) {
	$panpie_layout_class = 'col-sm-12 col-12';
} else {
	$panpie_layout_class = 'col-lg-8 col-md-12 col-12';
}
?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container-fluid px-0"> 
		<div class="row">
			<?php
			if ( BootscoreChild::$layout == 'left-sidebar' ) {
				get_sidebar();
			}
			?>
			<div class="<?php echo esc_attr( $panpie_layout_class );?>">
				<main id="main" class="site-main">
					<?php while ( have_posts() ) : the_post(); ?>					
						<?php get_template_part( 'template-parts/content', 'page' ); ?>
						<?php
						if ( comments_open() || get_comments_number() ){
							comments_template();
						}
						?>
					<?php endwhile; ?>
				</main>
			</div>
			<?php
			if( BootscoreChild::$layout == 'right-sidebar' ){				
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>