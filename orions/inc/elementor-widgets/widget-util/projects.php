<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

function orions_get_projects_options( $instance = null ) {
    if ( $instance == null ) return;

    $instance->start_controls_section(
        'project_section',
        [
            'label' => __( 'Project Options', 'orions' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $instance->add_control(
        'important_note',
        [
            'label' => esc_html__( 'Important Note', 'orions' ),
            'type' => \Elementor\Controls_Manager::RAW_HTML,
            'raw' => '<p style="margin-top: 20px; line-height: normal;">' . __( 'You can customize these features by going to the \'Projects\' (menu to the left) in the admin dashboard.', 'orions' ) . '</p>'
        ]
    );

    $instance->add_control(
        'orions_projects_number',
        [
            'label' => __( 'Projects per page', 'orions' ),
            'type'  => \Elementor\Controls_Manager::NUMBER,
            'min'			=> -1,
            'default' => 3
        ]
    );

    $instance->add_control(
        'orions_projects_order',
        [
            'label' => __( 'Order', 'orions' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'DESC' => 'descending',
                'ASC' => 'ascending',
            ],
            'default' => 'DESC',
        ]
    );

    $instance->add_control(
        'orions_projects_sort',
        [
            'label' => __( 'Sorting projects by', 'orions' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'date' => 'date',
                'modified' => 'last modified date',
                'rand' => 'Random',
                'title' => 'title',
                'comment_count' => 'number of comments',
            ],
            'default' => 'date',
        ]
    );

    $instance->add_control(
        'orions_feature_hovers',
        [
            'label' => __( 'Feature Hover Option', 'orions' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'h_none' => 'None',
                'h_yes' => 'Yes',
            ],
            'default' => 'h_none',
        ]
    );

    $instance->end_controls_section();
}

function orions_get_projects_style( $instance = null ) {
    if ( $instance == null ) return;

    $instance->start_controls_section(
        'project_style',
        [
            'label' => esc_html__('Style', 'orions'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $instance->add_control(
        'project_background_color',
        [
          'label' => esc_html__('Background color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .app-feature-single-wrapper' => 'background-color : {{VALUE}}'
          ]
          
        ]
    );    

    $instance->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'project_title_typo',
            'label' => esc_html__('Title Typography', 'orions'),
            'selector' => '{{WRAPPER}} .app-feature-single-wrapper h3',
        ]
    );

    $instance->add_control(
        'project_title_color',
        [
          'label' => esc_html__('Title Color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .app-feature-single-wrapper h3' => 'color : {{VALUE}}'
          ]
          
        ]
    );

    $instance->add_control(
        'project_icon_size',
        [
            'label' => esc_html__( 'Icon Size', 'orions' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'rem' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1,
                ],
                'rem' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .app-feature-single .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $instance->add_control(
        'project_icon_color',
        [
          'label' => esc_html__('Icon Color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .app-feature-single-2 .icon i::before' => 'background : {{VALUE}}; -webkit-background-clip : text;'
          ]
          
        ]
    );

    $instance->end_controls_section();

}
