<?php

namespace Elementor;

class Shopwise_Breadcrumb_Widget extends Widget_Base {

    public function get_name() {
        return 'shopwise-breadcrumb';
    }
    public function get_title() {
        return 'Breadcrumb (K)';
    }
    public function get_icon() {
        return 'eicon-slider-push';
    }
    public function get_categories() {
        return [ 'shopwise' ];
    }

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'shopwise' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'shopwise' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'About Us',
                'pleaceholder' => esc_html__( 'Set a title.', 'shopwise' )
            ]
        );
		
		$this->end_controls_section();
		
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
		
		$this->start_controls_section('shopwise_styling',
            [
                'label' => esc_html__( 'Style', 'shopwise' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_control( 'breadcrumb_bg_color',
           [
               'label' => esc_html__( 'Background Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .breadcrumb_section' => 'background-color: {{VALUE}} !important;']
           ]
        );
		
		$this->add_control( 'title_heading',
            [
                'label' => esc_html__( 'TITLE', 'shopwise' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'title_color',
           [
               'label' => esc_html__( 'Title Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .page-title-mini .page-title h1' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .page-title-mini .page-title h1:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'shopwise-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .page-title-mini .page-title h1' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .page-title-mini .page-title h1',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Title Typography', 'shopwise' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => ' {{WRAPPER}} .page-title-mini .page-title h1',
				
            ]
        );
		
		$this->add_control( 'bread_color',
            [
                'label' => esc_html__( 'Page/Post Color', 'shopwise' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .breadcrumb li a ' => 'color:{{VALUE}}  !important;' ]
            ]
        );
		
		$this->add_control( 'bread_hvr_color',
            [
                'label' => esc_html__( 'Page/Post Hover Color', 'shopwise' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .breadcrumb li a:hover ' => 'color:{{VALUE}}   !important ;' ]
            ]
        );
		
        $this->add_control( 'bread_sepcolor',
            [
                'label' => esc_html__( 'Separator Color', 'shopwise' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .breadcrumb-item + .breadcrumb-item::before' => 'color:{{VALUE}} ;' ]
            ]
        );
		
		$this->add_control( 'bread_actvcolor',
            [
                'label' => esc_html__( 'Current/Post Color', 'shopwise' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .breadcrumb-item.active' => 'color:{{VALUE}}  ;' ],
            ]
        );
		
        $this->add_control( 'bread_hvrcolor',
            [
                'label' => esc_html__( ' Current/Post Hover Color', 'shopwise' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .breadcrumb-item.active:hover ' => 'color:{{VALUE}} ;' ],
            ]
        );
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'bread_typo',
                'label' => esc_html__( 'Typography', 'shopwise' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => ' {{WRAPPER}} .breadcrumb-item.active , {{WRAPPER}} .breadcrumb li a ',
				
            ]
        );
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '';
			
		echo '<div class="breadcrumb_section bg_gray page-title-mini">';
		echo '<div class="container">';
		echo '<div class="row align-items-center">';
		echo '<div class="col-md-6">';
		echo '<div class="page-title">';
		echo '<h1>'.esc_html($settings['title']).'</h1>';
		echo '</div>';
		echo '</div>';
		echo '<div class="col-md-6">';
		echo shopwise_breadcrubms();
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';

		
	}

}
