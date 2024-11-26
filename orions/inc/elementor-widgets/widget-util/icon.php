<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

function orions_get_icon_size_styles( $instance, $secton_label = null ) {
    if ( empty( $instance ) || !is_object( $instance ) ) return;

    if ( $secton_label == null ) {
        $secton_label = esc_html__( 'Size', 'orions' );
    }

    $instance->start_controls_section(
        'icon_size_style',
        [
          'label' => $secton_label,
          'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]
    );

    $instance->add_responsive_control(
        'icon_size_font_size',
        [
            'label' => esc_html__( 'Font Size', 'orions' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%', 'rem' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
                'rem' => [
                    'min' => 0,
                    'max' => 100,
                ]
            ],
            'selectors' => [
                '{{WRAPPER}} .icon-box' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .icon-svg' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $instance->add_responsive_control(
        'icon_size_width',
        [
            'label' => esc_html__( 'Width', 'orions' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%', 'rem' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
                'rem' => [
                    'min' => 0,
                    'max' => 100,
                ]
            ],
            'selectors' => [
                '{{WRAPPER}} .icon-box' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $instance->add_responsive_control(
        'icon_size_height',
        [
            'label' => esc_html__( 'Height', 'orions' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%', 'rem' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
                'rem' => [
                    'min' => 0,
                    'max' => 100,
                ]
            ],
            'selectors' => [
                '{{WRAPPER}} .icon-box' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    
    $instance->end_controls_section();
}

function orions_get_icon_position_styles( $instance, $secton_label = null ) {
    if ( empty( $instance ) || !is_object( $instance ) ) return;

    if ( $secton_label == null ) {
        $secton_label = esc_html__( 'Position', 'orions' );
    }

    $instance->start_controls_section(
        'icon_position_style_section',
        [
          'label' => $secton_label,
          'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]
    );

    $instance->add_responsive_control(
        'icon_self_align',
        [
            'label'         => esc_html__( 'Self Align', 'orions' ),
            'type'          => \Elementor\Controls_Manager::CHOOSE,
            'options'       => [
                'margin-right: auto;'      => [
                    'title'=> __( 'Left', 'orions' ),
                    'icon' => 'eicon-h-align-left',
                ],
                'margin-left: auto; margin-right: auto;'    => [
                    'title'=> __( 'Center', 'orions' ),
                    'icon' => 'eicon-h-align-center',
                ],
                'margin-left: auto;'     => [
                    'title'=> __( 'Right', 'orions' ),
                    'icon' => 'eicon-h-align-right',
                ],
            ],
            'selectors'     => [
                '{{WRAPPER}} .icon-box' => '{{VALUE}}',
            ],
        ]
    );

    $instance->add_control(
        'icon_position',
      [
            'label'         => esc_html__( 'Position', 'orions' ),
            'type'          => \Elementor\Controls_Manager::SELECT,
            'options'       => [
                'static'    => esc_html__( 'Static', 'orions' ),
                'relative'  => esc_html__( 'Relative', 'orions' ),
                'absolute'  => esc_html__( 'Absolute', 'orions' ),
                'fixed'     => esc_html__( 'Fixed', 'orions' )
            ],
            'default'       => 'static',
            'selectors'     => [
                '{{WRAPPER}} .icon-box' => 'position: {{VALUE}};',
            ],
      ]
    );

    $instance->add_control(
        'icon_position_top_select',
      [
            'label'         => esc_html__( 'Top', 'orions' ),
            'type'          => \Elementor\Controls_Manager::SELECT,
            'options'       => [
                'initial'   => esc_html__( 'Initial', 'orions' ),
                'custom'    => esc_html__( 'Custom', 'orions' )
            ],
            'default'       => 'initial',
            'conditions'    => [
                'terms'     => 
                [
                    [
                        'name'  => 'icon_position',
                        'operator' => '!==',
                        'value' => 'static'
                    ]
                ]
            ]
      ]
    );

    $instance->add_responsive_control(
        'icon_position_top_value',
        [
            'label' => esc_html__( 'Top Value', 'orions' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%', 'rem' ],
            'range' => [
                'px' => [
                    'min' => -1000,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'rem' => [
                    'min' => -100,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .icon-box' => 'top: {{SIZE}}{{UNIT}};',
            ],
            'conditions' => [
                'relation' => 'and',
                'terms'     => 
                [
                    [
                        'name'  => 'icon_position',
                        'operator' => '!==',
                        'value' => 'static'
                    ],
                    [
                        'name'  => 'icon_position_top_select',
                        'operator' => '===',
                        'value' => 'custom'
                    ]
                ]
            ]
        ]
    );

    $instance->add_control(
        'icon_position_right_select',
      [
            'label'         => esc_html__( 'Right', 'orions' ),
            'type'          => \Elementor\Controls_Manager::SELECT,
            'options'       => [
                'initial'   => esc_html__( 'Initial', 'orions' ),
                'custom'    => esc_html__( 'Custom', 'orions' )
            ],
            'default'       => 'initial',
            'conditions' => [
                'relation' => 'and',
                'terms'     => 
                [
                    [
                        'name'  => 'icon_position',
                        'operator' => '!==',
                        'value' => 'static'
                    ]
                ]
            ]
      ]
    );

    $instance->add_responsive_control(
        'icon_position_right_value',
        [
            'label' => esc_html__( 'Right Value', 'orions' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%', 'rem' ],
            'range' => [
                'px' => [
                    'min' => -1000,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'rem' => [
                    'min' => -100,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .icon-box' => 'right: {{SIZE}}{{UNIT}};',
            ],
            'conditions' => [
                'relation' => 'and',
                'terms'     => 
                [
                    [
                        'name'  => 'icon_position',
                        'operator' => '!==',
                        'value' => 'static'
                    ],
                    [
                        'name'  => 'icon_position_right_select',
                        'operator' => '===',
                        'value' => 'custom'
                    ]
                ]
            ]
        ]
    );

    $instance->add_control(
        'icon_position_bottom_select',
      [
            'label'         => esc_html__( 'Bottom', 'orions' ),
            'type'          => \Elementor\Controls_Manager::SELECT,
            'options'       => [
                'initial'   => esc_html__( 'Initial', 'orions' ),
                'custom'    => esc_html__( 'Custom', 'orions' )
            ],
            'default'       => 'initial',
            'conditions'    => [
                'terms'     => 
                [
                    [
                        'name'  => 'icon_position',
                        'operator' => '!==',
                        'value' => 'static'
                    ]
                ]
            ]
      ]
    );

    $instance->add_responsive_control(
        'icon_position_bottom_value',
        [
            'label' => esc_html__( 'Bottom Value', 'orions' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%', 'rem' ],
            'range' => [
                'px' => [
                    'min' => -1000,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'rem' => [
                    'min' => -100,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .icon-box' => 'bottom: {{SIZE}}{{UNIT}};',
            ],
            'conditions' => [
                'relation' => 'and',
                'terms'     => 
                [
                    [
                        'name'  => 'icon_position',
                        'operator' => '!==',
                        'value' => 'static'
                    ],
                    [
                        'name'  => 'icon_position_bottom_select',
                        'operator' => '===',
                        'value' => 'custom'
                    ]
                ]
            ]
        ]
    );

    $instance->add_control(
        'icon_position_left_select',
      [
            'label'         => esc_html__( 'Left', 'orions' ),
            'type'          => \Elementor\Controls_Manager::SELECT,
            'options'       => [
                'initial'   => esc_html__( 'Initial', 'orions' ),
                'custom'    => esc_html__( 'Custom', 'orions' )
            ],
            'default'       => 'initial',
            'conditions'    => [
                'terms'     => 
                [
                    [
                        'name'  => 'icon_position',
                        'operator' => '!==',
                        'value' => 'static'
                    ]
                ]
            ]
      ]
    );

    $instance->add_responsive_control(
        'icon_position_left_value',
        [
            'label' => esc_html__( 'Left Value', 'orions' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%', 'rem' ],
            'range' => [
                'px' => [
                    'min' => -1000,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'rem' => [
                    'min' => -100,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .icon-box' => 'left: {{SIZE}}{{UNIT}};',
            ],
            'conditions' => [
                'relation' => 'and',
                'terms'     => 
                [
                    [
                        'name'  => 'icon_position',
                        'operator' => '!==',
                        'value' => 'static'
                    ],
                    [
                        'name'  => 'icon_position_left_select',
                        'operator' => '===',
                        'value' => 'custom'
                    ]
                ]
            ]
        ]
    );

    $instance->add_responsive_control(
        'icon_horz_align',
        [
            'label'         => esc_html__( 'Horizontal alignment', 'orions' ),
            'type'          => \Elementor\Controls_Manager::CHOOSE,
            'options'       => [
                'flex-start'      => [
                    'title'=> __( 'Left', 'orions' ),
                    'icon' => 'eicon-h-align-left',
                ],
                'center'    => [
                    'title'=> __( 'Center', 'orions' ),
                    'icon' => 'eicon-h-align-center',
                ],
                'flex-end'     => [
                    'title'=> __( 'Right', 'orions' ),
                    'icon' => 'eicon-h-align-right',
                ],
            ],
            'default'       => 'center',
            'selectors'     => [
                '{{WRAPPER}} .icon-box' => 'justify-content: {{VALUE}};',
            ],
        ]
    );

    $instance->add_responsive_control(
        'icon_vertical_align',
        [
            'label'         => esc_html__( 'Vertical alignment', 'orions' ),
            'type'          => \Elementor\Controls_Manager::CHOOSE,
            'options'       => [
                'flex-start'      => [
                    'title'=> __( 'Left', 'orions' ),
                    'icon' => 'eicon-v-align-top',
                ],
                'center'    => [
                    'title'=> __( 'Center', 'orions' ),
                    'icon' => 'eicon-v-align-middle',
                ],
                'flex-end'     => [
                    'title'=> __( 'Right', 'orions' ),
                    'icon' => 'eicon-v-align-bottom',
                ],
            ],
            'default'       => 'center',
            'selectors'     => [
                '{{WRAPPER}} .icon-box' => 'align-items: {{VALUE}};',
            ],
        ]
    );

    $instance->end_controls_section();
}

function orions_get_icon_main_styles( $instance, $secton_label = null ) {
    if ( empty( $instance ) || !is_object( $instance ) ) return;

    if ( $secton_label == null ) {
        $secton_label = esc_html__( 'Style', 'orions' );
    }

    $instance->start_controls_section(
        'icon_custom_style',
        [
          'label' => $secton_label,
          'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]
    );

    $instance->add_control(
        'icon_border-radius',
        [
            'label' => esc_html__( 'Border Radius', 'orions' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'rem' ],
            'selectors' => [
                '{{WRAPPER}} .icon-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $instance->start_controls_tabs( 'icon_tabs' );
    
    $instance->start_controls_tab(
        'icon_normal',
        [
            'label' => esc_html__( 'Normal', 'orions' ),
        ]
    );

    $instance->add_control(
        'icon_text_color',
        [
          'label' => esc_html__('Color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .icon' => 'color: {{VALUE}}; fill: {{VALUE}};',
          ]
          
        ]
    );

    $instance->add_control(
      'icon_bg_color',
      [
        'label' => esc_html__('Background color', 'orions'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .icon-box' => 'background-color: {{VALUE}}'
        ]
        
      ]
    );

    $instance->end_controls_tab();

    $instance->start_controls_tab(
        'icon_hover',
        [
            'label' => esc_html__( 'Hover', 'orions' ),
        ]
    );

    $instance->add_control(
        'icon_text_color_hover',
        [
          'label' => esc_html__('Color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .icon-box:hover .icon' => 'color: {{VALUE}}; fill: {{VALUE}};',
          ]
          
        ]
    );

    $instance->add_control(
      'icon_bg_color_hover',
      [
        'label' => esc_html__('Background color', 'orions'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .icon-box:hover' => 'background-color: {{VALUE}}'          
        ]
        
      ]
    );

    $instance->end_controls_tab();

    $instance->end_controls_tabs();  

    $instance->end_controls_section();
}