<?php

namespace Elementor;

class Shopwise_Single_Banner_Widget extends Widget_Base {

    public function get_name() {
        return 'shopwise-single-banner';
    }
    public function get_title() {
        return 'Single Banner (K)';
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

		$defaultimage = plugins_url( 'images/shop_banner_img1.jpg', __DIR__ );
		
		$this->add_control( 'image_type',
			[
				'label' => esc_html__( 'Image Type', 'shopwise' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'select-type',
				'options' => [
					'select-type' => esc_html__( 'Select a type', 'shopwise' ),
					'type1' 	  => esc_html__( 'Type 1', 'shopwise' ),
					'type2'		  => esc_html__( 'Type 2', 'shopwise' ),
					'type3'		  => esc_html__( 'Type 3', 'shopwise' ),
					'type4'		  => esc_html__( 'Type 4', 'shopwise' ),
				],
			]
		);
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'shopwise' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'shopwise' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Super Sale',
                'pleaceholder' => esc_html__( 'Enter title here', 'shopwise' ),
				'condition' => ['image_type' => array('type1','type3','type4','select-type')]
            ]
        );

        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subitle', 'shopwise' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'New Collection',
                'pleaceholder' => esc_html__( 'Enter subtitle here', 'shopwise' ),
				'condition' => ['image_type' => array('type1','type3','type4','select-type')]
            ]
        );

		
        $this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'shopwise' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'shopwise' ),
				'condition' => ['image_type' => array('type1','type3','type4','select-type')]
            ]
        );
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'shopwise' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'shopwise' )
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
                'selectors' => ['{{WRAPPER}} .single_banner' => 'text-align: {{VALUE}} !important;'],
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
				'selector' => '{{WRAPPER}} .single_banner img , {{WRAPPER}} .sale_banner img',
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
               'selectors' => ['{{WRAPPER}} .single_banner h5 ' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .single_banner h5:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .single_banner h5' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .single_banner h5',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'shopwise' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => ' {{WRAPPER}} .single_banner h5',
				
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
               'selectors' => ['{{WRAPPER}} .single_banner h3' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'shopwise' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .single_banner h3:hover , {{WRAPPER}} .banner_content h2:hover' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .single_banner h3' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .single_banner h3',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'shopwise' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .single_banner h3',
            ]
        );
		
		$this->add_control( 'button_heading',
            [
                'label' => esc_html__( 'BUTTON', 'shopwise' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'shopwise' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .single_banner a'
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
                'selectors' => ['{{WRAPPER}}  .single_banner a' => 'opacity: {{VALUE}} ;'],
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
                'selectors' => ['{{WRAPPER}} .single_banner a' => 'color: {{VALUE}} ;']
            ]
        );
		
		$this->add_control( 'btn_border_color',
            [
                'label' => esc_html__( 'Border Color', 'shopwise' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .single_bn_link::before ' => 'background-color: {{VALUE}} ;']
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
                'selectors' => ['{{WRAPPER}} .single_banner a:hover ' => 'color: {{VALUE}} ;']
            ]
        );

		$this->end_controls_tab(); //btn_hover_tab
		
        $this->end_controls_tabs(); //btn_tabs		
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$target   = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';

		$output = '';
		
			if($settings['image_type'] == 'type4'){
				echo '<div class="single_banner">';
				echo '<img src="'.esc_url($settings['image']['url']).'" alt="banner1">';
				echo '<div class="fb_info2">';
				echo '<h5 class="single_bn_title1">'.esc_html($settings['title']).'</h5>';
				echo '<h3 class="single_bn_title">'.esc_html($settings['subtitle']).'</h3>';
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="single_bn_link">'.esc_html($settings['btn_title']).'</a>';
				echo '</div>';
				echo '</div>';
			} elseif($settings['image_type'] == 'type3'){
				echo '<div class="single_banner">';
				echo '<img src="'.esc_url($settings['image']['url']).'" alt="banner1">';
				echo '<div class="fb_info">';
				echo '<h5 class="single_bn_title1">'.esc_html($settings['title']).'</h5>';
				echo '<h3 class="single_bn_title">'.esc_html($settings['subtitle']).'</h3>';
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="single_bn_link">'.esc_html($settings['btn_title']).'</a>';
				echo '</div>';
				echo '</div>';
			} elseif($settings['image_type'] == 'type2'){
				echo '<div class="sale_banner">';
				echo '<a class="hover_effect1" href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'>';
				echo '<img src="'.esc_url($settings['image']['url']).'" alt="shop_banner_img3">';
				echo '</a>';
				echo '</div>';
			} else {
				echo '<div class="single_banner">';
				echo '<img src="'.esc_url($settings['image']['url']).'" alt="'.esc_attr($settings['title']).'"/>';
				echo '<div class="single_banner_info">';
				echo '<h5 class="single_bn_title1">'.esc_html($settings['title']).'</h5>';
				echo '<h3 class="single_bn_title">'.esc_html($settings['subtitle']).'</h3>';
				if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" class="single_bn_link" '.esc_attr($target.$nofollow).'>'.esc_html($settings['btn_title']).'</a>';
				}
				echo '</div>';
				echo '</div>';
			}

	}

}
