<?php

namespace Elementor;

class Shopwise_Home_Slider_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'shopwise-home-slider';
    }
    public function get_title() {
        return 'Home Slider (K)';
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

		$defaultbg = plugins_url( 'images/banner1.jpg', __DIR__ );
		
		$this->add_control( 'slider_type',
			[
				'label' => esc_html__( 'Slider Type', 'shopwise' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'select-type',
				'options' => [
					'select-type' => esc_html__( 'Select a type', 'shopwise' ),
					'type1' 	  => esc_html__( 'Type 1', 'shopwise' ),
					'type2'		  => esc_html__( 'Type 2', 'shopwise' ),
					'type3'		  => esc_html__( 'Type 3', 'shopwise' ),
				],
			]
		);
		
		
		$this->add_control(
			'enable_dots',
			[
				'label' => esc_html__( 'Enable Dots', 'shopwise' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'shopwise' ),
				'label_off' => esc_html__( 'No', 'shopwise' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		
		$repeater = new Repeater();
        $repeater->add_control( 'slider_image',
            [
                'label' => esc_html__( 'Image', 'shopwise' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );
		
        $repeater->add_control( 'slider_title',
            [
                'label' => esc_html__( 'Title', 'shopwise' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Slider Title',
                'pleaceholder' => esc_html__( 'Enter title here', 'shopwise' )
            ]
        );

        $repeater->add_control( 'slider_subtitle',
            [
                'label' => esc_html__( 'Subitle', 'shopwise' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Slider Subtitle',
                'pleaceholder' => esc_html__( 'Enter subtitle here', 'shopwise' )
            ]
        );

        $repeater->add_control( 'slider_desc',
            [
                'label' => esc_html__( 'Description', 'shopwise' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '',
                'pleaceholder' => esc_html__( 'Enter desc here', 'shopwise' ),
            ]
        );

        $repeater->add_control( 'slider_btn_title',
            [
                'label' => esc_html__( 'Button Title', 'shopwise' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'shopwise' )
            ]
        );
        $repeater->add_control( 'slider_btn_link',
            [
                'label' => esc_html__( 'Button Link', 'shopwise' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'shopwise' )
            ]
        );

        $this->add_control( 'slider_items',
            [
                'label' => esc_html__( 'Slide Items', 'shopwise' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{slider_title}}',
                'default' => [
                    [
                        'slider_image' => ['url' => $defaultbg],
                        'slider_title' => 'Get up to 50% off Today Only!',
                        'slider_subtitle' => 'Woman Fashion',
                        'slider_btn_title' => 'Shop Now',
                        'slider_btn_link' => '#0',
                    ],

                    [
                        'slider_image' => ['url' => $defaultbg],
                        'slider_title' => '50% off in all products',
                        'slider_subtitle' => 'Man Fashion',
                        'slider_btn_title' => 'Shop Now',
                        'slider_btn_link' => '#0',
                    ],

                    [
                        'slider_image' => ['url' => $defaultbg],
                        'slider_title' => 'Taking your Viewing Experience to Next Level',
                        'slider_subtitle' => 'Summer Sale',
                        'slider_btn_title' => 'Shop Now',
                        'slider_btn_link' => '#0',
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
		
		$this->add_responsive_control( 'shopwise_alignment',
            [
                'label' => esc_html__( 'Alignment', 'shopwise' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .banner_content2 , {{WRAPPER}} .banner_content' => 'text-align: {{VALUE}} !important;'],
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'shopwise' ),
                        'icon' => 'fa fa-align-left'
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'shopwise' ),
                        'icon' => 'fa fa-align-center'
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'shopwise' ),
                        'icon' => 'fa fa-align-right'
                    ]
                ],
                'toggle' => true,
                
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
               'selectors' => ['{{WRAPPER}} .banner_content2 h6 , {{WRAPPER}} .banner_content2 h5 , 
			   {{WRAPPER}} .banner_content h5' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner_content2 h6:hover , {{WRAPPER}} .banner_content2 h5:hover , 
			   {{WRAPPER}} .banner_content h5:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .banner_content2 h6 , {{WRAPPER}} .banner_content2 h5 , 
			   {{WRAPPER}} .banner_content h5' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .banner_content2 h6 , {{WRAPPER}} .banner_content2 h5, 
			   {{WRAPPER}} .banner_content h5',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'shopwise' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => ' {{WRAPPER}} .banner_content2 h6 , {{WRAPPER}} .banner_content2 h5, 
			   {{WRAPPER}} .banner_content h5',
				
            ]
        );
		
		$this->add_control( 'subtitle_heading',
            [
                'label' => esc_html__( 'SUBTITLE', 'shopwise' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'subtitle_color',
           [
               'label' => esc_html__( 'Subtitle Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner_content2 h2 , {{WRAPPER}} .banner_content h2' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner_content2 h2:hover , {{WRAPPER}} .banner_content h2:hover' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .banner_content2 h2 , {{WRAPPER}} .banner_content h2' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .banner_content2 h2 , {{WRAPPER}} .banner_content h2',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'shopwise' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .banner_content2 h2 , {{WRAPPER}} .banner_content h2',
            ]
        );
		
		$this->add_control( 'desc_heading',
            [
                'label' => esc_html__( 'DESCRIPTION', 'shopwise' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'desc_color',
           [
               'label' => esc_html__( 'Description Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner_content2 p' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'desc_hvrcolor',
           [
               'label' => esc_html__( 'Description Hover Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner_content2 p:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'desc_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'shopwise-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .banner_content2  p' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_text_shadow',
				'selector' => '{{WRAPPER}} .banner_content2 p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'label' => esc_html__( 'Typography', 'shopwise' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .banner_content2 p',
            ]
        );
		
        $this->end_controls_section();
     	
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('btn_styling',
            [
                'label' => esc_html__( ' Button Style', 'shopwise' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_responsive_control( 'btn_padding',
            [
                'label' => esc_html__( 'Padding', 'shopwise' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .banner_slide_content  a.btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],              
            ]
        );
  	    
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'shopwise' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .banner_slide_content a.btn'
            ]
        );
		
		$this->add_control( 'btn_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'shopwise-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .banner_slide_content a.btn' => 'opacity: {{VALUE}} ;'],
            ]
        );

		$this->start_controls_tabs('btn_tabs');
        $this->start_controls_tab( 'btn_normal_tab',
            [ 'label' => esc_html__( 'Normal', 'shopwise' ) ]
        );
		
		$this->add_control( 'btn_color',
            [
                'label' => esc_html__( 'Color', 'shopwise' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .banner_slide_content a.btn' => 'color: {{VALUE}} !important;']
            ]
        );
       
	    $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_border',
                'label' => esc_html__( 'Border', 'shopwise' ),
                'selector' => '{{WRAPPER}}  .banner_slide_content a.btn ',
            ]
        );
        
		$this->add_responsive_control( 'btn_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'shopwise' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .banner_slide_content a.btn ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
       
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_background',
                'label' => esc_html__( 'Background', 'shopwise' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .btn-fill-out::before, {{WRAPPER}} .btn-fill-out::after ,
				{{WRAPPER}} .banner_slide_content a.btn',
            ]
        );
       
		$this->end_controls_tab(); //btn_normal_tab
		
        $this->start_controls_tab('btn_hover_tab',
            [ 'label' => esc_html__( 'Hover', 'shopwise' ) ]
        );
       
	    $this->add_control( 'btn_hvrcolor',
            [
                'label' => esc_html__( 'Color', 'shopwise' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}}  .banner_slide_content a.btn:hover ' => 'color: {{VALUE}} !important;']
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_hvr_border',
                'label' => esc_html__( 'Border', 'shopwise' ),
                'selector' => '{{WRAPPER}}  .banner_slide_content a.btn:hover ',
            ]
        );
        
		$this->add_responsive_control( 'btn_hvr_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'shopwise' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}}  .banner_slide_content a.btn:hover ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_hvr_background',
                'label' => esc_html__( 'Background', 'shopwise' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .banner_slide_content a.btn:hover , {{WRAPPER}} .btn-line-fill:before, {{WRAPPER}} .btn-line-fill:after' 
            ]
        );
		
		$this->end_controls_tab(); //btn_hover_tab
		
        $this->end_controls_tabs(); //btn_tabs
		
        $this->end_controls_section();
     	
		/*****   END CONTROLS SECTION   ******/
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('shopwise_nav_styling',
            [
                'label' => esc_html__( ' Nav Style', 'shopwise' ),
                'tab' => Controls_Manager::TAB_STYLE
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
               'selectors' => ['{{WRAPPER}} .light_arrow .carousel-control-next, {{WRAPPER}} .light_arrow .carousel-control-prev' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'nav_border',
                'label' => esc_html__( 'Border', 'shopwise' ),
                'selector' => '{{WRAPPER}} .light_arrow .carousel-control-next, {{WRAPPER}}  .light_arrow .carousel-control-prev',
            ]
        );
        
		$this->add_responsive_control( 'nav_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'shopwise' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .light_arrow .carousel-control-next, {{WRAPPER}} .light_arrow .carousel-control-prev ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'nav_background',
                'label' => esc_html__( 'Background', 'shopwise' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .light_arrow .carousel-control-next, {{WRAPPER}} .light_arrow .carousel-control-prev',
            ]
        );
		
		$this->add_control( 'home_slider_prev_heading',
            [
                'label' => __( 'PREV POSITION', 'shopwise' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
       
	   $this->add_responsive_control( 'home_slider_prev_horizontal',
            [
                'label' => esc_html__( 'Horizontal Position ( % )', 'shopwise' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .light_arrow .carousel-control-prev' => 'left:{{SIZE}}%;' ],
            ]
        );
       
	   $this->add_responsive_control( 'home_slider_prev_vertical',
            [
                'label' => esc_html__( 'Vertical Position ( % )', 'shopwise' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .light_arrow .carousel-control-prev' => 'top:{{SIZE}}%;' ],
            ]
        );
        
		$this->add_control( 'home_slider_next_heading',
            [
                'label' => __( 'NEXT POSITION', 'shopwise' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        
		$this->add_responsive_control( 'home_slider_next_horizontal',
            [
                'label' => esc_html__( 'Horizontal Position ( % )', 'shopwise' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .light_arrow .carousel-control-next' => 'left:{{SIZE}}%;' ],
            ]
        );
        
		$this->add_responsive_control( 'home_slider_next_vertical',
            [
                'label' => esc_html__( 'Vertical Position ( % )', 'shopwise' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .light_arrow .carousel-control-next' => 'top:{{SIZE}}%;' ],
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
                   '{{WRAPPER}} .light_arrow .carousel-control-next:hover, {{WRAPPER}} .light_arrow .carousel-control-prev:hover' => 'color: {{VALUE}};'
               ]
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'nav_hvr_border',
                'label' => esc_html__( 'Border', 'shopwise' ),
                'selector' => '{{WRAPPER}} .light_arrow .carousel-control-next:hover, {{WRAPPER}} .light_arrow .carousel-control-prev:hover ',
            ]
        );
        
		$this->add_responsive_control( 'nav_hvr_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'shopwise' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .light_arrow .carousel-control-next:hover, {{WRAPPER}} .light_arrow .carousel-control-prev:hover ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
       
	    $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'nav_hvr_background',
                'label' => esc_html__( 'Background', 'shopwise' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .light_arrow .carousel-control-next:hover, {{WRAPPER}} .light_arrow .carousel-control-prev:hover ',
            ]
        );
		
		$this->end_controls_tab(); //slider_nav_hover_tab
		
        $this->end_controls_tabs(); //slider_nav_tabs
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( $settings['slider_items'] ) {
			if($settings['slider_type'] == 'type3'){
				require_once( __DIR__ . '/home-slider/type3.php' );
			} elseif($settings['slider_type'] == 'type2'){
				require_once( __DIR__ . '/home-slider/type2.php' );
			} else {
				require_once( __DIR__ . '/home-slider/type1.php' );
			}
		}
	}

}
