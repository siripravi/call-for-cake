<?php

namespace Elementor;

class Shopwise_Custom_Title_Widget extends Widget_Base {

    public function get_name() {
        return 'shopwise-custom-title';
    }
    public function get_title() {
        return 'Custom Title (K)';
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
				'label' => esc_html__( 'Content', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control( 'title_type',
			[
				'label' => esc_html__( 'Title Type', 'shopwise' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-column' => esc_html__( 'Select Type', 'shopwise' ),
					'type1'	  => esc_html__( 'Type 1', 'shopwise' ),
					'type2'	  => esc_html__( 'Type 2', 'shopwise' ),
				],
			]
		);
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'shopwise' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Exclusive Products',
                'pleaceholder' => esc_html__( 'Set a title.', 'shopwise' )
            ]
        );

        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'shopwise' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Subtitle here',
                'pleaceholder' => esc_html__( 'Set a subtitle.', 'shopwise' ),
				'condition' => ['title_type' => 'type2']

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
               'selectors' => ['{{WRAPPER}} .heading_s4 h2 , {{WRAPPER}} .heading_s3 h2' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .heading_s4 h2:hover , {{WRAPPER}} .heading_s3 h2:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .heading_s4 h2 , {{WRAPPER}} .heading_s3 h2' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .heading_s4 h2',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'shopwise' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => ' {{WRAPPER}} .heading_s4 h2 , {{WRAPPER}} .heading_s3 h2',
				
            ]
        );
		
		$this->add_control( 'subtitle_heading',
            [
                'label' => esc_html__( 'SUBTITLE', 'shopwise' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => ['title_type' => ['type2' ]]
            ]
        );
		
		$this->add_control( 'subtitle_color',
           [
               'label' => esc_html__( 'Subtitle Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .leads ' => 'color: {{VALUE}};'],
			   'condition' => ['title_type' => ['type2' ]]
           ]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .leads:hover' => 'color: {{VALUE}};'],
			   'condition' => ['title_type' => ['type2' ]]
           ]
        );
		
		$this->add_control( 'subtitle_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'shopwise-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}}  .leads' => 'opacity: {{VALUE}};'],
				'condition' => ['title_type' => ['type2' ]]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}}  .leads',
				'condition' => ['title_type' => ['type2' ]]
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'shopwise' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}}  .leads',
				'condition' => ['title_type' => ['type2' ]]
            ]
        );
		
		$this->add_control( 'border_color',
           [
               'label' => esc_html__( 'Border Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .heading_s3::before' => 'background-color: {{VALUE}};'],
			   'condition' => ['title_type' => ['type1' , 'select-column']]
           ]
        );
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '';
		
		if($settings['title_type'] == 'type2'){
			echo '<div class="heading_s4 text-center">';
			echo '<h2>'.esc_html($settings['title']).'</h2>';
			echo '</div>';
			echo '<p class="text-center leads">'.esc_html($settings['subtitle']).'</p>';
		} else {
			echo '<div class="heading_s3 text-center">';
			echo '<h2>'.esc_html($settings['title']).'</h2>';
			echo '</div>';
			echo '<div class="small_divider clearfix"></div>';
		}
	}

}
