<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

function get_orions_client_styles( $instance = null ) {
    if ( $instance == null ) return;

    $instance->start_controls_section(
        'client_styles',
        [
            'label' => esc_html__('Play Button', 'orions'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $instance->start_controls_tabs( 'client_tabs' );
    
    // normal - start

    $instance->start_controls_tab(
        'client_normal_style',
        [
            'label' => esc_html__( 'Normal', 'orions' ),
        ]
    );

    $instance->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'play_button_heading_type',
            'label' => esc_html__('Heading', 'orions'),
            'selector' => '{{WRAPPER}} .download-button-content h3',
        ]
    );
    $instance->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'play_button_sub_heading_type',
            'label' => esc_html__('Sub Heading', 'orions'),
            'selector' => '{{WRAPPER}} .download-button-content h5',
        ]
    );    
    $instance->add_control(
        'play_button_heading_color',
        [
            'label' => esc_html__('Heading Color', 'orions'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .download-button-content h3' => 'color : {{VALUE}}'
            ],
        ]
    );
    $instance->add_control(
        'play_button_sub_heading_color',
        [
            'label' => esc_html__('Sub Heading Color', 'orions'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .download-button-content h5' => 'color : {{VALUE}}'
            ],
        ]
    );
    /**
    $instance->add_control(
        'client_opacity',
        [
            'label' => esc_html__( 'Opacity', 'orions' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1,
                    'step' => 0.1
                ]
            ],
            'selectors' => [
                '{{WRAPPER}} .client-image img' => 'opacity: {{SIZE}};',
            ],
        ]
    );
    */
    $instance->add_control(
        'play_button_icon_color',
        [
          'label' => esc_html__('Icon color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .download-button-1 .download-button-icon i' => 'color : {{VALUE}}'
          ]
          
        ]
    );

    $instance->end_controls_tab();

    // normal - end

    // hover - start

    $instance->start_controls_tab(
        'client_hover_style_hover',
        [
            'label' => esc_html__( 'Hover', 'orions' ),
        ]
    );
    $instance->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'play_button_heading_type_hover',
            'label' => esc_html__('Heading', 'orions'),
            'selector' => '{{WRAPPER}} .download-button-1:hover .download-button-content h3',
        ]
    );
    $instance->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'play_button_sub_heading_type_hover',
            'label' => esc_html__('Sub Heading', 'orions'),
            'selector' => '{{WRAPPER}} .download-button-1:hover .download-button-content h5',
        ]
    );    
    $instance->add_control(
        'play_button_heading_color_hover',
        [
            'label' => esc_html__('Heading Color', 'orions'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .download-button-1:hover .download-button-content h3' => 'color : {{VALUE}}'
            ],
        ]
    );
    $instance->add_control(
        'play_button_sub_heading_color_hover',
        [
            'label' => esc_html__('Sub Heading Color', 'orions'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .download-button-1:hover .download-button-content h5' => 'color : {{VALUE}}'
            ],
        ]
    );
    /**
    $instance->add_control(
        'client_opacity_hover',
        [
            'label' => esc_html__( 'Opacity', 'orions' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1,
                    'step' => 0.1
                ]
            ],
            'selectors' => [
                '{{WRAPPER}} .client-image:hover img' => 'opacity: {{SIZE}};',
            ],
        ]
    );
    */
    $instance->add_control(
        'play_button_icon_hover',
        [
          'label' => esc_html__('Icon color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .download-button-1:hover .download-button-icon i' => 'color : {{VALUE}}'
          ]
          
        ]
    );

    $instance->end_controls_tab();

    // hover - end

    $instance->end_controls_tabs();

    $instance->end_controls_section();

}