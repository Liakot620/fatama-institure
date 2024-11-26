<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

function orions_get_blog_title_styles( $instance = null ) {
    if ( $instance == null ) return;

    $instance->start_controls_section(
        'blog_title_style_section',
        [
            'label' => __('Title', 'orions'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]
    );

    $instance->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
          'name' => 'blog_title_format',
          'label' => __('Typography', 'orions'),
          'selector' => '{{WRAPPER}} .blog-single-content h3',
      ]
    );

    $instance->add_control(
      'blog_title_color',
      [
        'label' => __('Color', 'orions'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .blog-single-content h3' => 'color : {{VALUE}}',
        ],
      ]
    );

    $instance->end_controls_section();

}

function orions_get_blog_date_styles( $instance = null ) {
    if ( $instance == null ) return;

    $instance->start_controls_section(
        'blog_date_style_section',
        [
            'label' => __('Date', 'orions'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]
    );

    $instance->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
          'name' => 'blog_date_format',
          'label' => __('Typography', 'orions'),
          'selector' => '{{WRAPPER}} .single-blog-post .content .details .date',
      ]
    );

    $instance->add_control(
      'blog_date_color',
      [
        'label' => __('Color', 'orions'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .single-blog-post .content .details .date' => 'color : {{VALUE}}',
        ],
      ]
    );

    $instance->add_control(
        'blog_date_bg_color',
        [
          'label' => __('Background Color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .single-blog-post .content .details .date' => 'background-color : {{VALUE}}',
          ],
        ]
      );

    $instance->end_controls_section();

}

function orions_get_blog_author_styles( $instance = null ) {
    if ( $instance == null ) return;

    $instance->start_controls_section(
        'blog_author_style_section',
        [
            'label' => __('Author', 'orions'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]
    );

    $instance->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
          'name' => 'blog_author_format',
          'label' => __('Typography', 'orions'),
          'selector' => '{{WRAPPER}} .single-blog-post .details h6',
      ]
    );

    $instance->add_control(
      'blog_author_color',
      [
        'label' => __('Color', 'orions'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .single-blog-post .details h6' => 'color : {{VALUE}}',
        ],
      ]
    );

    $instance->end_controls_section();

}

function orions_get_blog_pagination_styles( $instance = null ) {
  if ( $instance == null ) return;

  $instance->start_controls_section(
      'blog_pagination_style_section',
      [
          'label' => __('Pagination', 'orions'),
          'tab' => \Elementor\Controls_Manager::TAB_STYLE
      ]
  );

  $instance->add_responsive_control(
    'pagination_align',
    [
        'label'         => esc_html__( 'Alignment', 'orions' ),
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
            '{{WRAPPER}} .page-numbers' => '{{VALUE}};',
        ],
    ]
  );

  $instance->start_controls_tabs( 'pagination_tabs' );

  $instance->start_controls_tab(
    'pagination_normal',
    [
        'label' => esc_html__( 'Normal', 'orions' ),
    ]
  );

  $instance->add_control(
    'pagination_color_normal',
    [
      'label' => esc_html__('Color', 'orions'),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} .pagination li' => 'color : {{VALUE}};'
      ]
      
    ]
  );

  $instance->add_control(
    'pagination_background_color_normal',
    [
      'label' => esc_html__('Background color', 'orions'),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} .pagination li' => 'background-color : {{VALUE}};',        
      ]
      
    ]
  );

  $instance->add_control(
    'pagination_prev_next_color_normal',
    [
      'label' => esc_html__('Prev/Next color', 'orions'),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} .pagination li *.prev' => 'color : {{VALUE}}; fill : {{VALUE}};',
        '{{WRAPPER}} .pagination li *.next' => 'color : {{VALUE}}; fill : {{VALUE}};'
      ]
      
    ]
  );

  $instance->add_control(
    'pagination_prev_next_bg_color_normal',
    [
      'label' => esc_html__('Prev/Next Background color', 'orions'),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} .pagination li *.prev' => 'background-color : {{VALUE}};',
        '{{WRAPPER}} .pagination li *.next' => 'background-color : {{VALUE}};'
      ]
      
    ]
  );

  $instance->end_controls_tab();

  $instance->start_controls_tab(
    'pagination_hover',
    [
        'label' => esc_html__( 'Hover', 'orions' ),
    ]
  );

  $instance->add_control(
    'pagination_color_hover',
    [
      'label' => esc_html__('Color', 'orions'),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} .pagination li:hover' => 'color : {{VALUE}};',
        '{{WRAPPER}} .pagination li:focus' => 'color : {{VALUE}};',
        '{{WRAPPER}} .pagination li *.current' => 'color : {{VALUE}};'
      ]
      
    ]
  );

  $instance->add_control(
    'pagination_background_color_hover',
    [
      'label' => esc_html__('Background color', 'orions'),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} .pagination li:hover' => 'background-color : {{VALUE}};',
        '{{WRAPPER}} .pagination li:focus' => 'background-color : {{VALUE}};',
        '{{WRAPPER}} .pagination li *.current' => 'background-color : {{VALUE}};'
      ]
      
    ]
  );

  $instance->add_control(
    'pagination_prev_next_color_hover',
    [
      'label' => esc_html__('Prev/Next color', 'orions'),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} .pagination li *.prev:hover' => 'color : {{VALUE}}; fill : {{VALUE}};',
        '{{WRAPPER}} .pagination li *.next:hover' => 'color : {{VALUE}}; fill : {{VALUE}};'
      ]
      
    ]
  );

  $instance->add_control(
    'pagination_prev_next_bg_color_hover',
    [
      'label' => esc_html__('Prev/Next Background color', 'orions'),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} .pagination li *.prev:hover' => 'background-color : {{VALUE}};',
        '{{WRAPPER}} .pagination li *.next:hover' => 'background-color : {{VALUE}};'
      ]
      
    ]
  );

  $instance->end_controls_tab();

  $instance->end_controls_tabs();

  $instance->end_controls_section();

}