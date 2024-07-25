<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie_Core;
use \RT_Posts;
use PanpieTheme;


if ( !class_exists( 'RT_Posts' ) ) {
	return;
}

$post_types = array(
	'panpie_team'       => array(
		'title'           => __( 'Team Member', 'panpie-core' ),
		'plural_title'    => __( 'Team', 'panpie-core' ),
		'menu_icon'       => 'dashicons-businessman',
		'labels_override' => array(
			'menu_name'   => __( 'Team', 'panpie-core' ),
		),
		'rewrite'         => PanpieTheme::$options['team_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' )
	),
	'panpie_event' => array(
		'title'           => __( 'Event', 'panpie-core' ),
		'plural_title'    => __( 'Event', 'panpie-core' ),
		'menu_icon'       => 'dashicons-book',
		'rewrite'         => PanpieTheme::$options['event_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),
	),
	'panpie_gallery'  => array(
		'title'           => __( 'Gallery', 'panpie-core' ),
		'plural_title'    => __( 'Gallery', 'panpie-core' ),
		'menu_icon'       => 'dashicons-book',
		'rewrite'         => PanpieTheme::$options['gallery_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),
	),
	'panpie_testim'     => array(
		'title'           => __( 'Testimonial', 'panpie-core' ),
		'plural_title'    => __( 'Testimonials', 'panpie-core' ),
		'menu_icon'       => 'dashicons-awards',
		'rewrite'         => PanpieTheme::$options['testimonial_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'page-attributes' )
	),
);

$taxonomies = array(
	'panpie_team_category' => array(
		'title'        => __( 'Team Category', 'panpie-core' ),
		'plural_title' => __( 'Team Categories', 'panpie-core' ),
		'post_types'   => 'panpie_team',
		'rewrite'      => array( 'slug' => PanpieTheme::$options['team_cat_slug'] ),
	),
	'panpie_event_category' => array(
		'title'        => __( 'Event Category', 'panpie-core' ),
		'plural_title' => __( 'Event Categories', 'panpie-core' ),
		'post_types'   => 'panpie_event',
		'rewrite'      => array( 'slug' => PanpieTheme::$options['event_cat_slug'] ),
	),
	'panpie_gallery_category' => array(
		'title'        => __( 'Gallery Category', 'panpie-core' ),
		'plural_title' => __( 'Gallery Categories', 'panpie-core' ),
		'post_types'   => 'panpie_gallery',
		'rewrite'      => array( 'slug' => PanpieTheme::$options['gallery_cat_slug'] ),
	),
	'panpie_testimonial_category' => array(
		'title'        => __( 'Testimonial Category', 'panpie-core' ),
		'plural_title' => __( 'Testimonial Categories', 'panpie-core' ),
		'post_types'   => 'panpie_testim',
		'rewrite'      => array( 'slug' => PanpieTheme::$options['testim_cat_slug'] ),
	),
);

$Posts = RT_Posts::getInstance();
$Posts->add_post_types( $post_types );
$Posts->add_taxonomies( $taxonomies );