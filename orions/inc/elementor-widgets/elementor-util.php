<?php

if ( !defined('ABSPATH') ) exit; // Exit if accessed directly

if ( !function_exists( 'orions_slider' ) ):
function orions_slider($id, $options) {
?>
    <script>
        'use strict';

        let el_<?php echo esc_html( $id ); ?> = document.querySelector('.<?php echo esc_html( 'slider-'.$id ); ?> .swiper-container');

        // options
        let options_<?php echo esc_html( $id ); ?> = <?php echo wp_json_encode( $options ); ?>

        // slider init
        el_<?php echo esc_html( $id ); ?>.swiper = new Swiper(
            '.<?php echo esc_html( 'slider-'.$id ); ?> .swiper-container',
            options_<?php echo esc_html( $id ); ?>
        )

    </script>
<?php
}
endif;

if ( !function_exists( 'orions_slider_pagination' ) ) {
    function orions_slider_pagination( $settings, $id ) {
        if ( $settings['rs_pagination'] != 'yes' ) return;
    ?>
        <div class="slider-pagination slider-pagination-<?php echo esc_attr( $id ); ?>"></div>
    <?php
    }
}


if ( !function_exists( 'orions_slider_options' ) ) {
    function orions_slider_options( $settings, $id, $other = null ) {

        if ( empty( $settings ) ) return;

        

        // slider pagination
        if ( !empty( $settings['rs_pagination'] ) && $settings['rs_pagination'] == 'yes' && !empty( $id ) ) {
            $pagination = [
                'pagination' => [
                    'el' => '.slider-pagination-' . $id,
                    'type' => 'bullets',
                ]
            ];
           // $options = array_merge( $options, $pagination );
        }        
    }
}

if ( !function_exists( 'orions_slider_controls' ) ) {
    function orions_slider_controls( $instance = null, $condition = [] ) {
        if ( $instance == null ) return;

        $instance->add_control(
            'rs_slides_per_view',
            [
                'label' => esc_html__( 'Slides per view', 'orions' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'condition' => $condition
            ]
        );
    
        $instance->add_control(
           'rs_navigation',
            [
                'label' => __( 'Slider navigation', 'orions' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'yes', 'orions' ),
                'label_off' => __( 'no', 'orions' ),
                'return_value' => 'yes',
                'condition' => $condition
            ]
        );
      
        $instance->add_control(
            'rs_prev_icon',
            [
                'label' => __('Navigation previous icon', 'orions'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => array_merge( ['rs_navigation' => 'yes'], $condition )
            ]
        );
      
        $instance->add_control(
            'rs_next_icon',
            [
                'label' => __('Navigation next icon', 'orions'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => array_merge( ['rs_navigation' => 'yes'], $condition )
            ]
        );

        $instance->add_control(
            'rs_pagination',
             [
                 'label' => __( 'Slider Pagination', 'orions' ),
                 'type' => \Elementor\Controls_Manager::SWITCHER,
                 'label_on' => __( 'yes', 'orions' ),
                 'label_off' => __( 'no', 'orions' ),
                 'return_value' => 'yes',
                 'condition' => $condition
             ]
         );
          
        $instance->add_control(
            'rs_autoplay',
            [
                'label' => __( 'Slider autoplay', 'orions' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'yes', 'orions' ),
                'label_off' => __( 'no', 'orions' ),
                'return_value' => 'yes',
                'condition' => $condition
            ]
        );
      
        $instance->add_control(
            'rs_autoplay_delay',
            [
                'label' => __( 'Delay', 'orions' ),
                'description' => __('1000 represents 1 second', 'orions'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 60000,
                'step' => 500,
                'default' => 2000,
                'condition' => $condition
            ]
        );
      
        $instance->add_control(
            'rs_speed',
            [
              'label' => __( 'Speed', 'orions' ),
              'description' => __('1000 represents 1 second', 'orions'),
              'type' => \Elementor\Controls_Manager::NUMBER,
              'min' => 0,
              'max' => 60000,
              'step' => 500,
              'default' => 2000,
              'condition' => $condition
            ]
        );
      
        $instance->add_control(
            'rs_loop',
            [
              'label' => __( 'Slider loop', 'orions' ),
              'type' => \Elementor\Controls_Manager::SWITCHER,
              'label_on' => __( 'yes', 'orions' ),
              'label_off' => __( 'no', 'orions' ),
              'return_value' => 'yes',
              'condition' => $condition        
            ]
        );
    }
}

if ( !function_exists( 'orions_slider_options' ) ) {
    function orions_slider_options( $settings, $id, $other = null ) {

        if ( empty( $settings ) ) return;

        $options = [
            'loop' => $settings['rs_loop'] ? true : false,
            'speed' =>  $settings['rs_speed'],
            'slidesPerView' => $settings['rs_slides_per_view'],
            'spaceBetween' => 0,
            'resizeObserver' => true
        ];

        // slider autoplay
        if ( $settings['rs_autoplay'] == 'yes' ) {
            $delay_arr = [
                'autoplay' => [
                    'delay' => $settings['rs_autoplay_delay'],
                    'disableOnInteraction' => false
                ]
            ];
            $options = array_merge( $options, $delay_arr );
        }
    
        // slider navigation
        if ( $settings['rs_navigation'] == 'yes' && !empty( $id ) ) {
            $navigation = [
                'navigation' => [
                    'nextEl' => '.slider-nav-'.$id.' .slider-nav-next',
                    'prevEl' => '.slider-nav-'.$id.' .slider-nav-prev',
                ]
            ];
            $options = array_merge( $options, $navigation );
        }

        // slider pagination
        if ( !empty( $settings['rs_pagination'] ) && $settings['rs_pagination'] == 'yes' && !empty( $id ) ) {
            $pagination = [
                'pagination' => [
                    'el' => '.slider-pagination-' . $id,
                    'type' => 'bullets',
                ]
            ];
            $options = array_merge( $options, $pagination );
        }

        

        if ( $other != null )
            $options = array_merge( $options, $other );
        
        return $options;
    }
}

if ( !function_exists( 'orions_slide_nav_styles' ) ) {
    function orions_slide_nav_styles( $instance ) {
        if ( empty( $instance ) ) return;

        $instance->start_controls_section(
            'rs_nav_styles',
            [
                'label' => __( 'Navigation', 'orions' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [ 'rs_navigation' => 'yes' ]
            ]
        );

        $instance->add_control(
			'rs_nav_icon_size',
			[
				'label' => esc_html__( 'Size', 'orions' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
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
				],
				'selectors' => [
					'{{WRAPPER}} .slider-nav-btn .icon' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .slider-nav-btn .icon-svg' => 'height: {{SIZE}}{{UNIT}};',
				],
                'condition' => [ 'rs_navigation' => 'yes' ]
			]
		);

        $instance->start_controls_tabs( 'rs_nav_tabs' );

        $instance->start_controls_tab(
            'rs_nav_normal',
            [
                'label' => esc_html__( 'Normal', 'orions' ),
                'condition' => [ 'rs_navigation' => 'yes' ]
            ]
        );

        $instance->add_control(
			'rs_nav_normal_icon_color',
			[
				'label' => esc_html__( 'Color', 'orions' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-nav-btn .icon' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .slider-nav-btn .icon-svg' => 'fill: {{VALUE}};',
				],
                'condition' => [ 'rs_navigation' => 'yes' ]
			]
		);

        $instance->add_control(
			'rs_nav_normal_icon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'orions' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-nav-btn' => 'background-color: {{VALUE}};',
				],
                'condition' => [ 'rs_navigation' => 'yes' ]
			]
		);

        $instance->end_controls_tab();

        $instance->start_controls_tab(
            'rs_nav_hover',
            [
                'label' => esc_html__( 'Hover', 'orions' ),
                'condition' => [ 'rs_navigation' => 'yes' ]
            ]
        );

        $instance->add_control(
			'rs_nav_hover_icon_color',
			[
				'label' => esc_html__( 'Color', 'orions' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-nav-btn:hover .icon' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .slider-nav-btn:hover .icon-svg' => 'fill: {{VALUE}};',
				],
                'condition' => [ 'rs_navigation' => 'yes' ]
			]
		);

        $instance->add_control(
			'rs_nav_hover_icon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'orions' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-nav-btn::after' => 'background-color: {{VALUE}};',
				],
                'condition' => [ 'rs_navigation' => 'yes' ]
			]
		);

        $instance->end_controls_tab();

        $instance->end_controls_tabs();

        $instance->end_controls_section();

    }
}

if ( !function_exists( 'orions_slide_pagination_styles' ) ) {
    function orions_slide_pagination_styles( $instance ) {
        if ( empty( $instance ) ) return;

        $instance->start_controls_section(
            'rs_pagination_styles',
            [
                'label' => __( 'Pagination', 'orions' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [ 'rs_pagination' => 'yes' ]
            ]
        );

        $instance->add_control(
			'rs_pagination_icon_size',
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
					'rem' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slider-pagination .swiper-pagination-bullet' => 
                    'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
                'condition' => [ 'rs_pagination' => 'yes' ]
			]
		);

        $instance->start_controls_tabs( 'rs_pagination_tabs' );

        $instance->start_controls_tab(
            'rs_pagination_normal',
            [
                'label' => esc_html__( 'Normal', 'orions' ),
                'condition' => [ 'rs_pagination' => 'yes' ]
            ]
        );

        $instance->add_control(
			'rs_pagination_normal_icon_color',
			[
				'label' => esc_html__( 'Color', 'orions' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-pagination .swiper-pagination-bullet:not(.swiper-pagination-bullet-active)' => 
                    'background-color: {{VALUE}};'
				],
                'condition' => [ 'rs_pagination' => 'yes' ]
			]
		);

        $instance->end_controls_tab();

        $instance->start_controls_tab(
            'rs_pagination_hover',
            [
                'label' => esc_html__( 'Hover', 'orions' ),
                'condition' => [ 'rs_pagination' => 'yes' ]
            ]
        );

        $instance->add_control(
			'rs_pagination_hover_icon_color',
			[
				'label' => esc_html__( 'Color', 'orions' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-pagination .swiper-pagination-bullet:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .slider-pagination .swiper-pagination-bullet-active:hover' => 'background-color: {{VALUE}};'
				],
                'condition' => [ 'rs_pagination' => 'yes' ]
			]
		);

        $instance->end_controls_tab();

        $instance->end_controls_tabs();

        $instance->end_controls_section();

    }
}

if ( !function_exists( 'orions_heading_data_controls' ) ) {
    function orions_heading_data_controls( $instance = null, $condition = [] ) {
        if ( $instance == null ) return;

        $instance->add_control(
            'r_heading_control',
            [
                'label' => esc_html__('Heading', 'orions'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '',
                'condition' => $condition
            ]
        );
        $instance->add_control(
            'r_sub_heading_control',
            [
                'label' => esc_html__('Sub Heading', 'orions'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '',
                'condition' => $condition
            ]
        );
        $instance->add_control(
            'r_sub_heading_control_line_icon',
            [
                'label' => esc_html__( 'Sub Heading icon', 'orions' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'la-user-circle',
                'options' => [
                    '' => esc_html__( 'Blank', 'orions' ),
                    'la-user-circle' => esc_html__( 'User', 'orions' ),
                    'la-handshake' => esc_html__( 'Handshake', 'orions' ),
                    'la-cog' => esc_html__( 'Setting', 'orions' ),
                    'la-video' => esc_html__( 'Video Camera', 'orions' ),
                    'la-tags' => esc_html__( 'Tag', 'orions' ),
                    'la-comments' => esc_html__( 'Comments', 'orions' ),
                    'la-file-alt' => esc_html__( 'File', 'orions' ),
                    'la-tablet' => esc_html__( 'Tablet', 'orions' ),
                    'la-bullhorn' => esc_html__( 'Bullhorn', 'orions' ),
                    'la-cloud-download-alt' => esc_html__( 'Cloud Download', 'orions' ),
                    'la-envelope' => esc_html__( 'Envelope', 'orions' ),
                    'la-envelope-open' => esc_html__( 'Envelope Open', 'orions' ),
                    'la-envelope-open-text' => esc_html__( 'Envelope Text', 'orions' ),
                ],
                'description' => 'Select Blank (If you want to choose Icon Bellow)',
            ]
        );
        $instance->add_control(
            'r_sub_heading_control_icon',
            [
                'label' => __('Sub Heading icon', 'orions'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'la-user-circle',
                    'library' => 'solid',
                ],
                'condition' => $condition
            ]
        );

    }
}

if ( !function_exists( 'orions_heading_style_controls' ) ) {
    function orions_heading_style_controls( $instance = null, $condition = [] ) {
        if ( $instance == null ) return;

        $instance->add_control(
            'r_heading_preset_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition' => $condition
            ]
        );
      
        $instance->add_responsive_control(
            'r_heading_align',
          [
            'label'         => esc_html__( 'Alignment', 'orions' ),
            'type'          => \Elementor\Controls_Manager::CHOOSE,
            'options'       => [
                'text-align: left;'      => [
                    'title'=> esc_html__( 'Left', 'orions' ),
                    'icon' => 'eicon-text-align-left',
                ],
                'margin-left: auto; margin-right: auto; text-align: center; justify-content: center;'    => [
                    'title'=> esc_html__( 'Center', 'orions' ),
                    'icon' => 'eicon-text-align-center',
                ],
                'margin-left: auto; text-align: right;'     => [
                    'title'=> esc_html__( 'Right', 'orions' ),
                    'icon' => 'eicon-text-align-right',
                ],
            ],
            'default'       => 'text-align: left;',
            'selectors'     => [ 
                '{{WRAPPER}} .heading' => '{{VALUE}}',
                '{{WRAPPER}} .heading::after' => '{{VALUE}}',
            ],
            'condition' => $condition
          ]
        );
    
        $instance->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'r_heading_type',
                'label' => esc_html__('Heading', 'orions'),
                'selector' => '{{WRAPPER}} .heading h1',
                'condition' => $condition
            ]
        );
        $instance->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'r_sub_heading_type',
                'label' => esc_html__('Sub Heading', 'orions'),
                'selector' => '{{WRAPPER}} .sub-heading h5',
                'condition' => $condition
            ]
        );
    
        $instance->add_control(
            'r_heading_color',
            [
                'label' => esc_html__('Heading Color', 'orions'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .heading h1' => 'color : {{VALUE}}'
                ],
                'condition' => $condition
            ]
        );
        $instance->add_control(
            'r_sub_heading_color',
            [
                'label' => esc_html__('Sub Heading Color', 'orions'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sub-heading h5' => 'color : {{VALUE}}'
                ],
                'condition' => $condition
            ]
        );
        $instance->add_control(
            'r_icon_color',
            [
                'label' => esc_html__('Icon Color', 'orions'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sub-heading i' => 'color : {{VALUE}}'
                ],
                'condition' => $condition
            ]
        );
    
        

    }
}

if ( !function_exists( 'orions_get_elementor_templates' ) ) {
    function orions_get_elementor_templates() {
        $templates = \Elementor\Plugin::instance()->templates_manager->get_source( 'local' )->get_items();

        if ( empty( $templates ) ) {
            return [ 
                '0' => __( 'There are no templates', 'orions' ) 
            ];
        }

        $template_lists = [ 
            '0' => __( 'Select Template', 'orions' ) 
        ];

        if ( is_array( $template_lists ) ) {
            foreach ( $templates as $template ) {
                $template_lists[ $template['template_id'] ] = $template['title'] . ' (' . $template['type'] . ')';
            }
        }

        return $template_lists;
    }
}

if ( !function_exists( 'orions_render_icon' ) ) {
    function orions_render_icon( $icon ) {

        // default next icon
        if ( !is_array( $icon ) && $icon == 'default-next' ) {
            ?>
                <span class="icon-svg icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M219.9 266.7L75.89 426.7c-5.906 6.562-16.03 7.094-22.59 1.188c-6.918-6.271-6.783-16.39-1.188-22.62L186.5 256L52.11 106.7C46.23 100.1 46.75 90.04 53.29 84.1C59.86 78.2 69.98 78.73 75.89 85.29l144 159.1C225.4 251.4 225.4 260.6 219.9 266.7z"/></svg>
                </span>
            <?php
            return;
        }

        // default previous icon
        if ( !is_array( $icon ) && $icon == 'default-prev' ) {
            ?>
                <span class="icon-svg icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M203.9 405.3c5.877 6.594 5.361 16.69-1.188 22.62c-6.562 5.906-16.69 5.375-22.59-1.188L36.1 266.7c-5.469-6.125-5.469-15.31 0-21.44l144-159.1c5.906-6.562 16.03-7.094 22.59-1.188c6.918 6.271 6.783 16.39 1.188 22.62L69.53 256L203.9 405.3z"/></svg>
                </span>
            <?php
            return;
        }

        // render icon from class
        if ( !is_array( $icon ) &&  !empty( $icon ) ) {
            ?>
                <i class="<?php echo esc_attr( $icon ) ?>"></i>
            <?php
            return;
        }

        $is_svg = $icon['library'] == 'svg';

        if ( $is_svg ) {
            echo wp_kses('<span class="icon-svg icon">', 'post');
        }
        
        \Elementor\Icons_Manager::render_icon( 
            $icon, 
            [ 'aria-hidden' => 'true', 'class' => 'icon' ]
        );

        if ( $is_svg ) {
            echo wp_kses('</span>', 'post');
        }


    }
}

if ( !function_exists( 'orions_get_nav_menu_names' ) ) {
    function orions_get_nav_menu_names() {
        $data = get_terms( 'nav_menu', [ 'hide_empty' => true ] );
        $result = [];
        if ( is_array( $data ) || is_object( $data ) ) {
            foreach( $data as $obj ) {
                $result[ $obj->term_id ] = $obj->name;
            }
        }
        return $result;
    }
}