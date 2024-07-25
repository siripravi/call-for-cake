<?php
function thb_get_teammember_templates( $template_list ) {
	$template_list['teammember_01'] = array(
		'name'      => esc_html__( 'Team Members - 01', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/team/team01.jpg',
		'cat'       => array( 'Team-Members' ),
		'sc'        => '[thb_team_parent thb_columns="large-4" bg_gradient1="rgba(255,255,255,0.91)" bg_gradient2="rgba(255,255,255,0.91)"][thb_team image="506" name="Tylor Katholling" sub_title="Founder" description="Tortor non facilisi vel rhoncus consequat cum accumsan. Varius, phasellus Laoreet euismod sociosqu curabitur congue hac semper urna consectetuer orci tincidunt duis velit gravida, enim tempor viverra tortor euismod." facebook="#" twitter="#" linkedin="#"][thb_team image="505" name="Ceccila Pinto" sub_title="Creative Director" description="Tortor non facilisi vel rhoncus consequat cum accumsan. Varius, phasellus Laoreet euismod sociosqu curabitur congue hac semper urna consectetuer orci tincidunt duis velit gravida, enim tempor viverra tortor euismod." facebook="#" twitter="#" linkedin="#"][thb_team image="504" name="Holden Hoffington" sub_title="Senior Developer" description="Tortor non facilisi vel rhoncus consequat cum accumsan. Varius, phasellus Laoreet euismod sociosqu curabitur congue hac semper urna consectetuer orci tincidunt duis velit gravida, enim tempor viverra tortor euismod." facebook="#" twitter="#" linkedin="#"][/thb_team_parent]',
	);
	$template_list['teammember_02'] = array(
		'name'      => esc_html__( 'Team Members - 02', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/team/team02.jpg',
		'cat'       => array( 'Team-Members' ),
		'sc'        => '[vc_row][vc_column][thb_team_parent thb_member_style="member_style3" thb_columns="large-4" animation="animation bottom-to-top" thb_text_color="team-light" bg_gradient1="rgba(244,172,2,0.82)" bg_gradient2="rgba(244,172,2,0.82)" box_shadow="rgba(221,153,51,0.55)"][thb_team image="511" name="Tylor Katholling" sub_title="Founder" description="Living sea gathering lesser two beginning upon life i dont also gathering one spirit under gathering green so our." facebook="#" twitter="#"][thb_team image="512" name="Ceccila Pinto" sub_title="Project Manager" description="There herb it is upon. Blessed, so god him replenish multiply deep, fruit light likeness and." facebook="#" linkedin="#"][thb_team image="513" name="Holden Hoffington" sub_title="Executive Director" description="Face from dont night, fish air him he divided subdue. Set fish image man You cattle." facebook="#" instagram="#"][/thb_team_parent][/vc_column][/vc_row]',
	);
	$template_list['teammember_03'] = array(
		'name'      => esc_html__( 'Team Members - 03', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/team/team03.jpg',
		'cat'       => array( 'Team-Members' ),
		'sc'        => '[vc_row][vc_column][thb_team_parent thb_member_style="member_style4" thb_columns="medium-4 large-3" animation="animation fade-in"][thb_team name="Benjamin T. Sullivan" sub_title="Otolaryngology" image="506"][thb_team name="Janice J. Crum" sub_title="Pediatrics" image="505"][thb_team name="Mike N. Pease" sub_title="Neurology" image="504"][thb_team name="Mia Clarkson" sub_title="Patology" image="515"][/thb_team_parent][/vc_column][/vc_row]',
	);
	$template_list['teammember_04'] = array(
		'name'      => esc_html__( 'Team Members - 04', 'peakshops' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demos/team/team04.jpg',
		'cat'       => array( 'Team-Members' ),
		'sc'        => '[vc_row][vc_column][thb_team_parent thb_member_style="member_style5" thb_columns="large-4" animation="animation bottom-to-top-3d" thb_text_color="team-light" bg_gradient1="rgba(110,117,134,0.9)" bg_gradient2="rgba(110,117,134,0.9)"][thb_team image="511" name="Marcus Susen" sub_title="Founder" description="Doesnt kind female grass it and greater it saying so fifth blessed let dry tree fill theyre living. Male abundantly subdue abundantly that, man fill form called." facebook="#" twitter="#" instagram="#"][thb_team image="512" name="Morgan Stogsdil" sub_title="Attorney" description="Doesnt kind female grass it and greater it saying so fifth blessed let dry tree fill theyre living. Male abundantly subdue abundantly that, man fill form called." facebook="#" twitter="#" instagram="#"][thb_team image="513" name="Adam Stoltz" sub_title="Attorney" description="Doesnt kind female grass it and greater it saying so fifth blessed let dry tree fill theyre living. Male abundantly subdue abundantly that, man fill form called." facebook="#" twitter="#" instagram="#"][/thb_team_parent][/vc_column][/vc_row]',
	);
	return $template_list;
}
