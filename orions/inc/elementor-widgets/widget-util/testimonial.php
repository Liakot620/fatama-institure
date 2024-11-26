<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

function orions_get_testiomonial_name_styles( $instance = null ) {
    if ( $instance == null ) return;

    $instance->start_controls_section(
        'testimonial_name_styles',
        [
          'label' => esc_html__('Name', 'orions'),
          'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]
    );

    $instance->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'testimonial_name_typo',
            'label' => esc_html__('Typography', 'orions'),
            'selector' => '{{WRAPPER}} .testimonial-slide h5',
        ]
    );
    
    $instance->add_control(
        'testimonial_name_color',
        [
          'label' => esc_html__('Color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .testimonial-slide h5' => 'color : {{VALUE}}'
          ]
        ]
    );

    $instance->end_controls_section();
}

function orions_get_testiomonial_testimony_styles( $instance = null ) {
    if ( $instance == null ) return;

    $instance->start_controls_section(
        'testimonial_testimony_styles',
        [
          'label' => esc_html__('Testimony', 'orions'),
          'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]
    );

    $instance->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'testimonial_testimony_typo',
            'label' => esc_html__('Typography', 'orions'),
            'selector' => '{{WRAPPER}} .testimonial-slide .content p',
        ]
    );
    
    $instance->add_control(
        'testimonial_testimony_bg_color',
        [
          'label' => esc_html__('Color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .testimonial-slide .content p' => 'color : {{VALUE}}'
          ]
        ]
    );

    $instance->end_controls_section();
}