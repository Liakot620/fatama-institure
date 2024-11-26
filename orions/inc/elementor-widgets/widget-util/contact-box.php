<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

function orions_get_contact_box_icon_styles( $instance = null ) {
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
                '{{WRAPPER}} .icon i' => 'height: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );    

    $instance->end_controls_tabs();

    $instance->end_controls_section();
}

function orions_get_contact_box_title_styles( $instance = null ) {
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
            'selector' => '{{WRAPPER}} .app-feature-single h3',
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
            '{{WRAPPER}} .app-feature-single:not(.dropped) h3' => 'color : {{VALUE}};'
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
            '{{WRAPPER}} .app-feature-single.dropped h3' => 'color : {{VALUE}};'
          ]
          
        ]
    );

    $instance->end_controls_tab();

    $instance->end_controls_tabs();

    $instance->end_controls_section();
}

function orions_get_contact_box_content_styles( $instance = null ) {
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
            'selector' => '{{WRAPPER}} .app-feature-single p',
        ]
    );

    $instance->add_control(
        'content_color',
        [
          'label' => esc_html__('Color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .app-feature-single p' => 'color : {{VALUE}};'
          ]
          
        ]
    );

    $instance->end_controls_section();
}
