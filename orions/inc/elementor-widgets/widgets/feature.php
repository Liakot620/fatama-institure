<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Feature extends \Elementor\Widget_Base{

    public function get_name(){
        return 'orions_feature';
    }
 
    public function get_title(){
        return __( 'Features', 'orions' );
    }

    public function get_icon(){
        return 'eicon-device-laptop';
    }

    public function get_categories(){
        return ['gfxpartner'];
    }

    protected function register_controls() {

    // options - start

    orions_get_projects_options( $this );

    // options - end 
  
    // style - start

    orions_get_projects_style( $this );

    // style - end

    // slider nav - start

    orions_slide_nav_styles( $this );

    // slider nav - end

    // slider pagination - start

    orions_slide_pagination_styles( $this );

    // slider pagination - end

    // load more style - start

    $this->start_controls_section(
        'load_more_style_section',
        [
            'label' => __( 'Load more', 'orions' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [ 'ps_switch!' => 'yes', 'lm_switch' => 'yes' ]
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'button_text',
            'label' => esc_html__('Text', 'orions'),
            'selector' => '{{WRAPPER}} .load-more-button',
        ]
    );

    $this->add_responsive_control(
      'button_align',
      [
          'label'         => esc_html__( 'Alignment', 'orions' ),
          'type'          => \Elementor\Controls_Manager::CHOOSE,
          'options'       => [
              'left'      => [
                  'title'=> __( 'Left', 'orions' ),
                  'icon' => 'fa fa-align-left',
              ],
              'center'    => [
                  'title'=> __( 'Center', 'orions' ),
                  'icon' => 'fa fa-align-center',
              ],
              'right'     => [
                  'title'=> __( 'Right', 'orions' ),
                  'icon' => 'fa fa-align-right',
              ],
          ],
          'default'       => 'center',
          'selectors'     => [
              '{{WRAPPER}} .load-more-row > div' => 'text-align: {{VALUE}};',
          ],
      ]
    );

    $this->add_responsive_control(
			'width',
			[
				'label' => esc_html__( 'Width', 'orions' ),
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
            'max' => 100
          ]
				],
				'selectors' => [
					'{{WRAPPER}} .load-more-button' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

    $this->start_controls_tabs( 'button_tabs' );
    
    $this->start_controls_tab(
        'button_normal',
        [
            'label' => esc_html__( 'Normal', 'orions' ),
        ]
    );

    $this->add_control(
        'button_text_color',
        [
          'label' => esc_html__('Text color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .load-more-button' => 'color : {{VALUE}} !important; fill : {{VALUE}} !important;'
          ]
          
        ]
    );

    $this->add_control(
      'button_bg_color',
      [
        'label' => esc_html__('Background color', 'orions'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .load-more-button' => 'background-color : {{VALUE}}'
        ]
        
      ]
    );


    $this->end_controls_tab();

    $this->start_controls_tab(
        'button_hover',
        [
            'label' => esc_html__( 'Hover', 'orions' ),
        ]
    );

    $this->add_control(
        'button_text_color_hover',
        [
          'label' => esc_html__('Text hover color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .load-more-button:hover' => 'color : {{VALUE}} !important; fill : {{VALUE}} !important;'
          ]
          
        ]
    );

    $this->add_control(
      'button_bg_color_hover',
      [
        'label' => esc_html__('Background color', 'orions'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .load-more-button:hover' => 'background-color : {{VALUE}}'
        ]
        
      ]
    );

    $this->end_controls_tab();

    $this->end_controls_tabs();

    $this->end_controls_section();

    // load more style - end

    // heading content - start

    $this->start_controls_section(
        'heading_content',
        [
            'label' => esc_html__('Heading', 'orions'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            'condition' => [ 'ps_switch' => 'yes' ]
        ]
    );

    orions_heading_data_controls( $this, [ 'ps_switch' => 'yes' ] );

    $this->end_controls_section();

    // heading content - end

    // heading style - start

    $this->start_controls_section(
        'heading_style',
        [
            'label' => esc_html__('Heading', 'orions'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [ 'ps_switch' => 'yes' ]
        ]
    );

    orions_heading_style_controls( $this, [ 'ps_switch' => 'yes' ] );

    $this->end_controls_section();

    // heading style - end

  }
  
    private function the_projects( $pre_tag = '', $post_tag = '' ) {
        $settings = $this->get_settings_for_display();

        $args = array(
            'posts_per_page' => esc_attr($settings['orions_projects_number']),
            'orderby'     => esc_attr($settings['orions_projects_sort']),
            'order'       => esc_attr($settings['orions_projects_order']),      
            'post_type' => esc_attr('feature'),
            'post_status'    => 'publish'
        );
        
        $query = new \WP_Query( $args );

        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                if ( !empty( $pre_tag ) ) echo wp_kses( $pre_tag, 'general' );
                get_template_part( 
                    '/inc/template-parts/content', 
                    'project' 
                );
                if ( !empty( $post_tag ) ) echo wp_kses( $post_tag, 'general' );
            }
            wp_reset_postdata();
        }
    }

    private function the_projects_slider() {
        $settings = $this->get_settings_for_display();
        $id = $this->get_id();

        // options for the slider
        $options = orions_slider_options( $settings, $id );

        $options = array_merge(
            $options,
            [
                'spaceBetween' => 30,
                'breakpoints' => [
                    '0' => [
                        'slidesPerView' => 1,
                        'centeredSlides' => true,
                        'initialSlide' => 1,
                    ],
                    '992' => [
                        'slidesPerView' => $options['slidesPerView'],
                        'centeredSlides' => false,
                        'initialSlide' => 0,
                    ]
                ]
            ]
        );

        // main class list
        $class_list = [
            'slider',
            'project-slider',
            'slider-'.$id
        ];
    ?>
        <div class="<?php echo esc_html( implode(' ', $class_list) ); ?>">
            <!-- header - start -->
            <?php
                get_template_part( 
                    '/inc/template-parts/elementor/slider', 
                    'header',
                    array(
                        'settings' => $settings,
                        'id' => $id
                    )
                );
            ?>
            <!-- header - end -->
            <!-- slider - start -->
            <div class="row">
                <div class="col-12">
                    <div class="swiper-container overflow-visible">
                        <div class="swiper-wrapper">
                            <?php $this->the_projects( '<div class="swiper-slide">', '</div>' ); ?>
                        </div>
                    </div>
                    <?php orions_slider_pagination( $settings, $id ); ?>
                </div>
            </div>
            <!-- slider - end -->
        </div>
    <?php
        orions_slider($id, $options);
    }

    private function the_projects_list() {
        $settings = $this->get_settings_for_display();

        // total projects
       // $max = wp_count_posts('project')->publish;

        $nonce = wp_create_nonce( 'projects-load-more' );        
    ?>
        <?php if ($settings['orions_feature_hovers'] == 'h_none') {?>
            <div class="row gx-5 gy-5">
                <?php $this->the_projects( '<div class="col-lg-4 offset-lg-0 col-md-6 offset-md-0 col-10 offset-1"><div class="app-feature-single app-feature-single-1">', '</div></div>' ) ?>
            </div>
        <?php } else { ?>
            <div class="row gx-5 gy-5">
                <?php $this->the_projects( '<div class="col-lg-4 offset-lg-0 col-md-6 offset-md-0 col-10 offset-1"><div class="app-feature-single app-feature-single-2">', '</div></div>' ) ?>
            </div>
        <?php } ?>         
        
    <?php
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
    ?>
            <?php
                
                    $this->the_projects_list();
            ?>
    <?php
    }
}

