<?php

namespace Elementor;

class Shopwise_Icon_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'shopwise-icon-box';
    }
    public function get_title() {
        return 'Icon Box (K)';
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
		
		$this->add_control( 'box_type',
			[
				'label' => esc_html__( 'Box Type', 'shopwise' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'select-type',
				'options' => [
					'select-type' => esc_html__( 'Select a type', 'shopwise' ),
					'type1' 	  => esc_html__( 'Type 1', 'shopwise' ),
					'type2'		  => esc_html__( 'Type 2', 'shopwise' ),
					'type3'		  => esc_html__( 'Type 3', 'shopwise' ),
					'type4'		  => esc_html__( 'Type 4', 'shopwise' ),
					'type5'		  => esc_html__( 'Type 5', 'shopwise' ),
				],
			]
		);
		
		$this->add_control(
			'switcher_icon',
			[
				'label' => esc_html__( 'Use Custom Icon', 'shopwise' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'shopwise' ),
				'label_off' => esc_html__( 'No', 'shopwise' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		
		$this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'shopwise' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'fa-brands',
				],
                'label_block' => true,
				'condition' => ['switcher_icon' => '']
			]
		);
		
        $this->add_control( 'custom_icon',
            [
                'label' => esc_html__( 'Custom Icon', 'shopwise' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'flaticon-shipped',
                'description'=> 'You can add icon code. for example: flaticon-shipped',
				'condition' => ['switcher_icon' => 'yes']
            ]
        );

       $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'shopwise' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'pleaceholder' => esc_html__( 'Enter title here', 'shopwise' ),
                'default' => 'Free Delivery',
            ]
        );
       $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'shopwise' ),
                'type' => Controls_Manager::TEXTAREA,
                'pleaceholder' => esc_html__( 'Enter desc here', 'shopwise' ),
                'default' => 'If you are going to use of Lorem, you need to be sure there anything',
            ]
        );
		
		$this->end_controls_section();
		
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
		
		$this->start_controls_section('shopwise_styling',
            [
                'label' => esc_html__( ' Style', 'shopwise' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_responsive_control( 'icon_box_alignment',
            [
                'label' => esc_html__( 'Alignment', 'shopwise' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .icon_box , {{WRAPPER}} .contact_icon' => 'text-align: {{VALUE}};'],
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
		
		$this->add_control( 'icon_heading',
            [
                'label' => esc_html__( 'ICON', 'shopwise' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'icon_bg_color',
           [
               'label' => esc_html__( 'Icon Background', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .contact_style3 .contact_icon , {{WRAPPER}} .icon_box_style5 .icon' => 'background-color: {{VALUE}};'],
			   'condition' => ['box_type' => ['type3' , 'type2' ]]
           ]
        );
		
		$this->add_control( 'icon_bg_hvrcolor',
           [
               'label' => esc_html__( 'Icon Hover Background', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .contact_style3 .contact_icon::before , {{WRAPPER}} .icon_box_style5 .icon:hover' => 'background-color: {{VALUE}};'],
			   'condition' => ['box_type' => ['type3' , 'type2' ]]
           ]
        );
		
		$this->add_control( 'icon_border_color',
           [
               'label' => esc_html__( 'Icon Border', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .contact_style3 .contact_icon' => 'border-color: {{VALUE}};'],
			   'condition' => ['box_type' => ['type3' , 'type2' ]]
           ]
        );
		
		$this->add_responsive_control( 'icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'shopwise' ),
                'type' => Controls_Manager::SLIDER,
                'min' => 0,
                'max' => 100,
                'selectors' => [ '{{WRAPPER}} .icon_box .icon i' => 'font-size: {{SIZE}}px;' ],
            ]
        );
		
		$this->add_control( 'icon_color',
           [
               'label' => esc_html__( 'Icon Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .icon_box .icon i , {{WRAPPER}} .contact_icon i' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'icon_hvrcolor',
           [
               'label' => esc_html__( 'Icon Hover Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .icon_box .icon i:hover , {{WRAPPER}} .contact_icon i:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'icon_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'shopwise-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .icon_box .icon i , {{WRAPPER}} .contact_icon i' => 'opacity: {{VALUE}};'],
				
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .icon_box .icon i , {{WRAPPER}} .contact_icon i',
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
               'selectors' => ['{{WRAPPER}} .icon_box h5 , {{WRAPPER}} .icon_box h6 , {{WRAPPER}} .contact_text span' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .icon_box h5:hover , {{WRAPPER}} .icon_box h6:hover , {{WRAPPER}} .contact_text span:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .icon_box h5 , {{WRAPPER}} .icon_box h6 , {{WRAPPER}} .contact_text span' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .icon_box h5 , {{WRAPPER}} .icon_box h6 , {{WRAPPER}} .contact_text span',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'shopwise' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => ' {{WRAPPER}} .icon_box h5 , {{WRAPPER}} .icon_box h6 , {{WRAPPER}} .contact_text span',
				
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
               'selectors' => ['{{WRAPPER}} .icon_box p , {{WRAPPER}} .contact_text p' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'desc_hvrcolor',
           [
               'label' => esc_html__( 'Description Hover Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .icon_box p:hover , {{WRAPPER}} .contact_text p:hover' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .icon_box p , {{WRAPPER}} .contact_text p' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_text_shadow',
				'selector' => '{{WRAPPER}} .icon_box p , {{WRAPPER}} .contact_text p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'label' => esc_html__( 'Typography', 'shopwise' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .icon_box p , {{WRAPPER}} .contact_text p',
            ]
        );
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '';
		
			if($settings['box_type'] == 'type5'){
				echo '<div class="icon_box icon_box_style6">';
				echo '<div class="icon">';
				if($settings['switcher_icon'] == 'yes'){
					echo '<i class="'.esc_attr($settings['custom_icon']).'"></i>';
				} else {
					Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'false' ] );						
				}
				echo '</div>';
				echo '<div class="icon_box_content">';
				echo '<h5>'.esc_html($settings['title']).'</h5>';
				echo '<p>'.esc_html($settings['desc']).'</p>';
				echo '</div>';
				echo '</div>';
			}elseif($settings['box_type'] == 'type4'){
				echo '<div class="icon_box icon_box_style3">';
				echo '<div class="icon">';
				if($settings['switcher_icon'] == 'yes'){
					echo '<i class="'.esc_attr($settings['custom_icon']).'"></i>';
				} else {
					Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'false' ] );						
				}
				echo '</div>';
				echo '<div class="icon_box_content">';
				echo '<h6>'.esc_html($settings['title']).'</h6>';
				echo '<p>'.esc_html($settings['desc']).'</p>';
				echo '</div>';
				echo '</div>';
				
			} elseif($settings['box_type'] == 'type3'){
				echo '<div class="contact_wrap contact_style3">';
				echo '<div class="contact_icon">';
				if($settings['switcher_icon'] == 'yes'){
					echo '<i class="'.esc_attr($settings['custom_icon']).'"></i>';
				} else {
					Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'false' ] );						
				}
				echo '</div>';
				echo '<div class="contact_text">';
				echo '<span>'.esc_html($settings['title']).'</span>';
				echo '<p>'.shopwise_sanitize_data($settings['desc']).'</p>';
				echo '</div>';
				echo '</div>';
			}elseif($settings['box_type'] == 'type2'){
				echo '<div class="icon_box icon_box_style5">';
				echo '<div class="icon">';
				if($settings['switcher_icon'] == 'yes'){
					echo '<i class="'.esc_attr($settings['custom_icon']).'"></i>';
				} else {
					Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'false' ] );						
				}
				echo '</div>';
				echo '<div class="icon_box_content">';
				echo '<h5>'.esc_html($settings['title']).'</h5>';
				echo '<p>'.esc_html($settings['desc']).'</p>';
				echo '</div>';
				echo '</div>';
			} else {
				echo '<div class="icon_box icon_box_style1">';
				echo '<div class="icon">';
				if($settings['switcher_icon'] == 'yes'){
					echo '<i class="'.esc_attr($settings['custom_icon']).'"></i>';
				} else {
					Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'false' ] );						
				}
				echo '</div>';
				echo '<div class="icon_box_content">';
				echo '<h5>'.esc_html($settings['title']).'</h5>';
				echo '<p>'.esc_html($settings['desc']).'</p>';
				echo '</div>';
				echo '</div>';
			}
	}

}
