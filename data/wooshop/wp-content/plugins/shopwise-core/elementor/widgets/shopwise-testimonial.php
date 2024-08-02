<?php

namespace Elementor;

class Shopwise_Testimonial_Widget extends Widget_Base {

    public function get_name() {
        return 'shopwise-testimonial';
    }
    public function get_title() {
        return 'Testimonial (K)';
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
                'default' => 'Our Client Say!',
                'placeholder' => esc_html__( 'Enter title here', 'shopwise' )
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'shopwise' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Testimonial',
                'placeholder' => esc_html__( 'Enter subtitle here', 'shopwise' )
            ]
        );
		
        $this->add_control( 'description',
            [
                'label' => esc_html__( 'Description', 'shopwise' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Description Here!',
                'placeholder' => esc_html__( 'Enter description here', 'shopwise' )
            ]
        );
		
		$customimg = plugins_url( 'images/user_img1.jpg', __DIR__ );
		$repeater = new Repeater();
		
        $repeater->add_control( 'customer_image',
            [
                'label' => esc_html__( 'Image', 'shopwise' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $customimg],
            ]
        );
		
        $repeater->add_control( 'customer_name',
            [
                'label' => esc_html__( 'Name', 'shopwise' ),
                'type' => Controls_Manager::TEXT,
				'label_block' => true,
                'pleaceholder' => esc_html__( 'Enter the name here', 'shopwise' ),
                'default' => 'Add some text here',
            ]
        );
		
        $repeater->add_control( 'customer_position',
            [
                'label' => esc_html__( 'Position', 'shopwise' ),
                'type' => Controls_Manager::TEXT,
				'label_block' => true,
                'pleaceholder' => esc_html__( 'Enter the customer job.', 'shopwise' ),
                'default' => 'Add some text here',
            ]
        );
		
        $repeater->add_control( 'customer_comment',
            [
                'label' => esc_html__( 'Comment', 'shopwise' ),
                'type' => Controls_Manager::TEXTAREA,
                'pleaceholder' => esc_html__( 'Enter desc here', 'shopwise' ),
                'default' => 'Add some text here',
            ]
        );

        $this->add_control( 'testimonial_items',
            [
                'label' => esc_html__( 'Testimonial Items', 'shopwise' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'customer_name' => 'Lissa Castro',
                        'customer_position' => 'Designer',
                        'customer_comment' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam amet animi blanditiis consequatur debitis dicta distinctio, enim error eum iste libero modi nam natus perferendis possimus quasi sint sit tempora voluptatem.',
                        'customer_image' => ['url' => $customimg],
                    ],
                    [
                        'customer_name' => 'Alden Smith',
                        'customer_position' => 'Designer',
                        'customer_comment' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam amet animi blanditiis consequatur debitis dicta distinctio, enim error eum iste libero modi nam natus perferendis possimus quasi sint sit tempora voluptatem.',
                        'customer_image' => ['url' => $customimg],
                    ],
                    [
                        'customer_name' => 'Daisy Lana',
                        'customer_position' => 'Designer',
                        'customer_comment' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam amet animi blanditiis consequatur debitis dicta distinctio, enim error eum iste libero modi nam natus perferendis possimus quasi sint sit tempora voluptatem.',
                        'customer_image' => ['url' => $customimg],
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
		
		$this->add_control( 'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'shopwise' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#FFF1F1',
				'scheme' => [
					'type' => Core\Schemes\Color::get_type(),
					'value' => Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .section.bg_redon.klb-testi2' => 'background-color: {{VALUE}} !important',
				],
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
               'selectors' => ['{{WRAPPER}} .section h2' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .section h2:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .section h2 ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .section h2',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'shopwise' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => ' {{WRAPPER}} .section h2',
				
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
               'selectors' => ['{{WRAPPER}} .section .sub_heading' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .section .sub_heading:hover' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .section .sub_heading' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .section .sub_heading',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'shopwise' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .section .sub_heading',
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
               'selectors' => ['{{WRAPPER}} .section .leads' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'desc_hvrcolor',
           [
               'label' => esc_html__( 'Description Hover Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .section .leads:hover' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .section  .leads' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_text_shadow',
				'selector' => '{{WRAPPER}} .section .leads',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'label' => esc_html__( 'Typography', 'shopwise' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .section .leads',
            ]
        );
		
        $this->end_controls_section();
     	
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('item_styling',
            [
                'label' => esc_html__( ' Testimonial Items Style', 'shopwise' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_control( 'comment_background_color',
           [
               'label' => esc_html__( 'Background Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .testimonial_box' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'image_heading',
            [
                'label' => esc_html__( 'IMAGE', 'shopwise' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters',
				'selector' => '{{WRAPPER}} .author_img img',
			]
		);
		
		$this->add_responsive_control( 'image_text_height',
            [
                'label' => esc_html__( 'Height', 'shopwise' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .author_img img' => 'height: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_responsive_control( 'image_text_width',
            [
                'label' => esc_html__( 'Width', 'shopwise' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .author_img img' => 'width: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}} .author_img img',
				
			]
		);
		
		$this->add_responsive_control( 'image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'shopwise' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .author_img img ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		$this->add_control( 'name_heading',
            [
                'label' => esc_html__( 'NAME', 'shopwise' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'name_color',
           [
               'label' => esc_html__( 'Name Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .author_name h6' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'name_hvrcolor',
           [
               'label' => esc_html__( 'Name Hover Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .author_name h6:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'name_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'shopwise-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .author_name h6' => 'opacity: {{VALUE}} ;'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'name_text_shadow',
				'selector' => '{{WRAPPER}} .author_name h6',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typo',
                'label' => esc_html__( 'Typography', 'shopwise' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .author_name h6'
            ]
        );
		
		$this->add_control( 'position_heading',
            [
                'label' => esc_html__( 'POSITION', 'shopwise' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'position_color',
           [
               'label' => esc_html__( 'Position Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .author_name span' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'position_hvrcolor',
           [
               'label' => esc_html__( 'Position Hover Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .author_name span:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'position_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'shopwise-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .author_name span' => 'opacity: {{VALUE}} ;'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'position_text_shadow',
				'selector' => '{{WRAPPER}} .author_name span',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'position_typo',
                'label' => esc_html__( 'Typography', 'shopwise' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .author_name span'
            ]
        );
		
		$this->add_control( 'comment_heading',
            [
                'label' => esc_html__( 'COMMENT', 'shopwise' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'comment_color',
           [
               'label' => esc_html__( 'Comment Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .testimonial_desc p' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'comment_hvrcolor',
           [
               'label' => esc_html__( 'Comment Hover Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .testimonial_desc p:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'comment_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'shopwise-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .testimonial_desc p' => 'opacity: {{VALUE}} ;'],
            ]
        );
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'comment_typo',
                'label' => esc_html__( 'Typography', 'shopwise' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .testimonial_desc p'
            ]
        );
		
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
               'selectors' => ['{{WRAPPER}} .owl-nav .owl-prev, {{WRAPPER}} .owl-nav .owl-next' => 'color: {{VALUE}} !important;']
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
                'selectors' => ['{{WRAPPER}} .owl-nav .owl-prev, {{WRAPPER}} .owl-nav .owl-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
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
                   '{{WRAPPER}} .owl-nav .owl-prev:hover , {{WRAPPER}} .owl-nav .owl-next:hover' => 'color: {{VALUE}} !important;'
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
		

		echo '<div class="section bg_redon klb-testi2">';
		echo '<div class="container">';
		echo '<div class="row align-items-center">';

		echo '<div class="col-lg-4">';
		echo '<div class="heading_s1">';
		echo '<span class="sub_heading">'.esc_html($settings['subtitle']).'</span>';
		echo '<h2>'.esc_html($settings['title']).'</h2>';
		echo '</div>';
		echo '<p class="leads mb-lg-0">'.$settings['description'].'</p>';
		echo '</div>';

		echo '<div class="col-lg-8">';
		echo '<div class="testimonial_slider testimonial_style2 carousel_slider owl-carousel owl-theme nav_style1" data-dots="false" data-nav="true" data-margin="10" data-loop="true" data-autoplay="true" data-responsive=\'{"0":{"items": "1"}, "767":{"items": "2"}, "1199":{"items": "2"}}\'>';

		
		if ( $settings['testimonial_items'] ) {
			foreach ( $settings['testimonial_items'] as $item ) {
		
				echo '<div class="testimonial_box box_shadow1">';
				echo '<div class="author_img">';
				echo '<img class="rounded-circle" src="'.esc_url($item['customer_image']['url']).'" alt="user1" />';
				echo '</div>';
				echo '<div class="author_name">';
				echo '<h6>'.esc_html($item['customer_name']).'</h6>';
				echo '<span>'.esc_html($item['customer_position']).'</span>';
				echo '</div>';
				echo '<div class="testimonial_desc">';
				echo '<p>'.esc_html($item['customer_comment']).'</p>';
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