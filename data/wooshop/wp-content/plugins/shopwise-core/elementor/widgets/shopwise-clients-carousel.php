<?php

namespace Elementor;

class Shopwise_Clients_Carousel_Widget extends Widget_Base {

    public function get_name() {
        return 'shopwise-clients-carousel';
    }
    public function get_title() {
        return 'Clients Carousel (K)';
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
		
		$this->add_control( 'client_type',
			[
				'label' => esc_html__( 'Client Type', 'shopwise' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'select-type',
				'options' => [
					'select-type' => esc_html__( 'Select a type', 'shopwise' ),
					'type1' 	  => esc_html__( 'Type 1', 'shopwise' ),
					'type2'		  => esc_html__( 'Type 2', 'shopwise' ),
				],
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
                'type' => Controls_Manager::TEXT,
                'default' => 'Our Brands',				
            ]
        );

		$customimg = plugins_url( 'images/cl_logo1.png', __DIR__ );
		$repeater = new Repeater();

        $repeater->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'shopwise' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $customimg],
            ]
        );

        $this->add_control( 'client_items',
            [
                'label' => esc_html__( 'Client Items', 'shopwise' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'image' => ['url' => $customimg],
                    ],
                    [
                        'image' => ['url' => $customimg],
                    ],
                    [
                        'image' => ['url' => $customimg],
                    ],
                    [
                        'image' => ['url' => $customimg],
                    ],
                    [
                        'image' => ['url' => $customimg],
                    ],
                    [
                        'image' => ['url' => $customimg],
                    ],
                    [
                        'image' => ['url' => $customimg],
                    ],
                    [
                        'image' => ['url' => $customimg],
                    ],

					
                ]
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
               'selectors' => ['{{WRAPPER}} .heading_s2 h4 , {{WRAPPER}} .heading_s2 h2 ' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .heading_s2 h4:hover , {{WRAPPER}} .heading_s2 h2:hover ' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .heading_s2 h4 , {{WRAPPER}} .heading_s2 h2' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .heading_s2 h4 , {{WRAPPER}} .heading_s2 h2',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'shopwise' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} {{WRAPPER}} .heading_s2 h4 , {{WRAPPER}} .heading_s2 h2',
				
            ]
        );
		
		$this->add_control( 'image_heading',
            [
                'label' => esc_html__( 'IMAGE', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters',
				'selector' => '{{WRAPPER}} .owl-carousel .owl-item img',
			]
		);
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'label' => esc_html__( 'Border', 'shopwise' ),
                'selector' => '{{WRAPPER}} .owl-carousel .owl-item img ',
            ]
        );
        
		$this->add_responsive_control( 'image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'shopwise' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .owl-carousel .owl-item img ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		$this->add_control( 'nav_heading',
            [
                'label' => esc_html__( 'NAV', 'shopwise' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->start_controls_tabs( 'slider_nav_tabs');
        $this->start_controls_tab( 'slider_nav_normal_tab',
            [ 'label'  => esc_html__( 'Normal', 'shopwise' ) ]
        );
        
		$this->add_control( 'nav_clr',
           [
               'label' => esc_html__( 'Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .owl-nav .owl-prev, {{WRAPPER}} .owl-nav .owl-next' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'nav_border',
                'label' => esc_html__( 'Border', 'shopwise' ),
                'selector' => '{{WRAPPER}} .owl-nav .owl-prev, {{WRAPPER}} .owl-nav .owl-next',
            ]
        );
        
		$this->add_responsive_control( 'nav_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'shopwise' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .owl-nav .owl-prev, {{WRAPPER}} .owl-nav .owl-next ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'nav_background',
                'label' => esc_html__( 'Background', 'shopwise' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .owl-nav .owl-prev, {{WRAPPER}} .owl-nav .owl-next',
            ]
        );
       
	    $this->end_controls_tab(); //slider_nav_normal_tab
		
        $this->start_controls_tab( 'slider_nav_hover_tab',
            [ 'label' => esc_html__( 'Hover', 'shopwise' ) ]
        );
       
	    $this->add_control( 'nav_hvrclr',
            [
               'label' => esc_html__( 'Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => [
                   '{{WRAPPER}} .owl-nav .owl-prev:hover, {{WRAPPER}} .owl-nav .owl-next:hover' => 'color: {{VALUE}};'
               ]
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'nav_hvr_border',
                'label' => esc_html__( 'Border', 'shopwise' ),
                'selector' => '{{WRAPPER}} .owl-nav .owl-prev:hover, {{WRAPPER}} .owl-nav .owl-next:hover ',
            ]
        );
        
		$this->add_responsive_control( 'nav_hvr_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'shopwise' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .owl-nav .owl-prev:hover, {{WRAPPER}} .owl-nav .owl-next:hover ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
       
	    $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'nav_hvr_background',
                'label' => esc_html__( 'Background', 'shopwise' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .owl-nav .owl-prev:hover, {{WRAPPER}} .owl-nav .owl-next:hover ',
            ]
        );
		
		$this->end_controls_tab(); //slider_nav_hover_tab
		
        $this->end_controls_tabs(); //slider_nav_tabs
		
		$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		echo '<div class="klb-section">';
		echo '<div class="container">';
		
		if($settings['title']){
			echo '<div class="row">';
			echo '<div class="col-md-12">';
			echo '<div class="heading_tab_header">';
			echo '<div class="heading_s2">';
			if($settings['title_type'] == 'type2'){
			echo '<h4>'.esc_html($settings['title']).'</h4>';
			} else {
			echo '<h2>'.esc_html($settings['title']).'</h2>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}

		echo '<div class="row">';
		echo '<div class="col-12">';
		if($settings['client_type'] == 'type2'){
			echo '<div class="client_logo carousel_slider owl-carousel owl-theme" data-dots="false" data-margin="30" data-loop="true" data-autoplay="true" data-responsive=\'{"0":{"items": "2"}, "480":{"items": "3"}, "767":{"items": "4"}, "991":{"items": "5"}}\'>';
		} else {
			echo '<div class="client_logo carousel_slider owl-carousel owl-theme nav_style3" data-dots="false" data-nav="true" data-margin="30" data-loop="true" data-autoplay="true" data-responsive=\'{"0":{"items": "2"}, "480":{"items": "3"}, "767":{"items": "4"}, "991":{"items": "5"}}\'>';
		}
		
		if ( $settings['client_items'] ) {
			foreach ( $settings['client_items'] as $item ) {
				echo '<div class="item">';
				echo '<div class="cl_logo">';
				echo '<img src="'.esc_url($item['image']['url']).'" alt="cl_logo"/>';
				echo '</div>';
				echo '</div>';
			}
		}
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		
	}

}
