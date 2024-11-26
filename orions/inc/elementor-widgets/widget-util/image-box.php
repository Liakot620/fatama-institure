<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

function orions_get_image_box_icon_styles( $instance = null ) {
    if ( $instance == null ) return;

    $instance->start_controls_section(
        'image_box_content_icon_style',
        [
            'label' => esc_html__('Icon', 'orions'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $instance->add_control(
        'icon_size',
        [
            'label' => esc_html__( 'Size', 'orions' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%', 'rem' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 5,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
                'rem' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .icon' => 'height: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .icon' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $instance->start_controls_tabs( 'icon_tabs' );

    $instance->start_controls_tab(
        'icon_tab_normal',
        [
            'label' => esc_html__( 'Normal', 'orions' ),
        ]
    );

    $instance->add_control(
        'icon_normal_color',
        [
          'label' => esc_html__('Color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .image-box:not(.dropped) .icon' => 'color : {{VALUE}} !important; fill : {{VALUE}} !important;'
          ]
          
        ]
    );

    $instance->end_controls_tab();

    $instance->start_controls_tab(
        'icon_tab_active',
        [
            'label' => esc_html__( 'Active', 'orions' ),
        ]
    );

    $instance->add_control(
        'icon_hover_color',
        [
          'label' => esc_html__('Color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .image-box.dropped .icon' => 'color : {{VALUE}} !important; fill : {{VALUE}} !important;'
          ]
          
        ]
    );

    $instance->end_controls_tab();

    $instance->end_controls_tabs();

    $instance->end_controls_section();
}

function orions_get_image_box_title_styles( $instance = null ) {
    if ( $instance == null ) return;

    $instance->start_controls_section(
        'image_box_content_title_style',
        [
            'label' => esc_html__('Title', 'orions'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $instance->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'heading_style',
            'label' => esc_html__('Typography', 'orions'),
            'selector' => '{{WRAPPER}} .image-box-content h4',
        ]
    );

    $instance->start_controls_tabs( 'heading_tabs' );

    $instance->start_controls_tab(
        'heading_tab_normal',
        [
            'label' => esc_html__( 'Normal', 'orions' ),
        ]
    );

    $instance->add_control(
        'heading_normal_color',
        [
          'label' => esc_html__('Color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .image-box:not(.dropped) .image-box-content h4' => 'color : {{VALUE}};'
          ]
          
        ]
    );

    $instance->end_controls_tab();

    $instance->start_controls_tab(
        'heading_tab_active',
        [
            'label' => esc_html__( 'Active', 'orions' ),
        ]
    );

    $instance->add_control(
        'heading_hover_color',
        [
          'label' => esc_html__('Color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .image-box.dropped .image-box-content h4' => 'color : {{VALUE}};'
          ]
          
        ]
    );

    $instance->end_controls_tab();

    $instance->end_controls_tabs();

    $instance->end_controls_section();
}

function orions_get_image_box_content_styles( $instance = null ) {
    if ( $instance == null ) return;

    $instance->start_controls_section(
        'image_box_content_content_style',
        [
            'label' => esc_html__('Content', 'orions'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $instance->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'content_style',
            'label' => esc_html__('Typography', 'orions'),
            'selector' => '{{WRAPPER}} .pricing-single ul li',
        ]
    );

    $instance->add_control(
        'content_color',
        [
          'label' => esc_html__('Color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .pricing-single ul li' => 'color : {{VALUE}};',
          ]
          
        ]
    );

    $instance->end_controls_section();
}

function orions_get_image_box_link_styles( $instance = null ) {
    if ( $instance == null ) return;

    $instance->start_controls_section(
        'image_box_content_link_style',
        [
            'label' => esc_html__('Link', 'orions'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $instance->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'link_style',
            'label' => esc_html__('Typography', 'orions'),
            'selector' => '{{WRAPPER}} .button-content h4',
        ]
    );

    $instance->add_control(
        'link_color',
        [
          'label' => esc_html__('Color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .button-content h4' => 'color : {{VALUE}};',
            '{{WRAPPER}} .image-box .image-box-content .content a::after' => 'background-color : {{VALUE}};'
          ]
          
        ]
    );
    
    $instance->end_controls_section();
}

function orions_get_image_box_reveal_styles( $instance = null ) {
    if ( $instance == null ) return;


    $instance->start_controls_section(
        'image_box_content_reveal_style',
        [
            'label' => esc_html__('Reveal', 'orions'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $instance->start_controls_tabs( 'reveal_style_tabs' );
    
    $instance->start_controls_tab(
        'reveal_normal',
        [
            'label' => esc_html__( 'Normal', 'orions' ),
        ]
    );

    $instance->add_control(
        'tab_icon_bg_color',
        [
          'label' => esc_html__('Icon background color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} div:not(.dropped) .reveal' => 'background-color : {{VALUE}};'
          ]
          
        ]
    );

    $instance->add_control(
        'tab_icon_color',
        [
          'label' => esc_html__('Icon color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} div:not(.dropped) .reveal::before' => 'background-color : {{VALUE}};',
            '{{WRAPPER}} div:not(.dropped) .reveal::after' => 'background-color : {{VALUE}};'
          ]
          
        ]
    );

    $instance->end_controls_tab();

    $instance->start_controls_tab(
        'reveal_active',
        [
            'label' => esc_html__( 'Active', 'orions' ),
        ]
    );

    $instance->add_control(
        'tab_icon_bg_color_active',
        [
          'label' => esc_html__('Icon background color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} div.dropped .reveal' => 'background-color : {{VALUE}};'
          ]
          
        ]
    );

    $instance->add_control(
        'tab_icon_color_active',
        [
          'label' => esc_html__('Icon color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} div.dropped .reveal::before' => 'background-color : {{VALUE}};',
            '{{WRAPPER}} div.dropped .reveal::after' => 'background-color : {{VALUE}};'
          ]
          
        ]
    );

    $instance->end_controls_tab();

    $instance->end_controls_tabs();

    $instance->end_controls_section();

}