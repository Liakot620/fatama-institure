<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class Team extends \Elementor\Widget_Base

{

    public function get_name()
    {
        return 'orions_team';
    }

    public function get_title()
    {
        return esc_html__('Team', 'orions');
    }

    public function get_icon()
    {
        return 'eicon-lock-user';
    }

    public function get_categories()
    {
        return ['gfxpartner'];
    }

    protected function register_controls()
    {

        // heading content - start

        $this->start_controls_section(
            'heading_content',
            [
                'label' => esc_html__('Heading', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        orions_heading_data_controls( $this );

        $this->end_controls_section();


        // team content - start

        $this->start_controls_section(
            'team_content',
            [
                'label' => esc_html__('Content', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'team_image',
            [
                'label' => __( 'Choose Image', 'orions' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'team_name',
            [
                'label' => esc_html__( 'Name', 'orions' ),
                'type' => \Elementor\Controls_Manager::TEXT,            
                'placeholder' => esc_html__( 'Type name here', 'orions' ),
            ]
        );

        $repeater->add_control(
            'team_designation',
            [
                'label' => esc_html__( 'Designation', 'orions' ),
                'type' => \Elementor\Controls_Manager::TEXT,            
                'placeholder' => esc_html__( 'Type designation here', 'orions' ),
            ]
        );

        $repeater->add_control(
            'team_social_icon_1',
            [
                'label' => __('Social Icon 1', 'orions'),
                'type' => \Elementor\Controls_Manager::ICONS
            ]
         );

        $repeater->add_control(
            'team_social_link_1',
            [
                'label' => esc_html__('Link 1', 'orions'),
                'type' => \Elementor\Controls_Manager::URL
            ]
        );

        $repeater->add_control(
            'team_social_icon_2',
            [
                'label' => __('Social Icon 2', 'orions'),
                'type' => \Elementor\Controls_Manager::ICONS
            ]
        );

        $repeater->add_control(
            'team_social_link_2',
            [
                'label' => esc_html__('Link 2', 'orions'),
                'type' => \Elementor\Controls_Manager::URL
            ]
        );

        $repeater->add_control(
            'team_social_icon_3',
            [
                'label' => __('Social Icon 3', 'orions'),
                'type' => \Elementor\Controls_Manager::ICONS
            ]
        );

        $repeater->add_control(
            'team_social_link_3',
            [
                'label' => esc_html__('Link 3', 'orions'),
                'type' => \Elementor\Controls_Manager::URL
            ]
        );

        $repeater->add_control(
            'team_social_icon_4',
            [
                'label' => __('Social Icon 4', 'orions'),
                'type' => \Elementor\Controls_Manager::ICONS
            ]
        );

        $repeater->add_control(
            'team_social_link_4',
            [
                'label' => esc_html__('Link 4', 'orions'),
                'type' => \Elementor\Controls_Manager::URL
            ]
        );

        // $social_repeater = new \Elementor\Repeater();

        // $social_repeater->add_control(
        //     'team_social_icon',
        //     [
        //         'label' => __('Icon', 'orions'),
        //         'type' => \Elementor\Controls_Manager::ICONS
        //     ]
        // );

        // $social_repeater->add_control(
        //     'team_social_link',
        //     [
        //         'label' => esc_html__('Link', 'orions'),
        //         'type' => \Elementor\Controls_Manager::URL
        //     ]
        // );

        // $repeater->add_control(
        //     'team_social_repeater',
        //     [
        //       'label' => __( 'Social Links', 'orions' ),
        //       'type' => \Elementor\Controls_Manager::REPEATER,
        //       'fields' => $social_repeater->get_controls(),
        //       'title_field' => __( 'Social Link', 'orions' ),
        //     ]
        // );

        //$this->add_social_controls( $repeater, 4 );

        $this->add_control(
            'team_repeater',
            [
              'label' => __( 'Team members', 'orions' ),
              'type' => \Elementor\Controls_Manager::REPEATER,
              'fields' => $repeater->get_controls(),
              'title_field' => esc_html( '{{{ team_name }}}' ),
            ]
        );


        $this->end_controls_section();
        // Banckground - Start
        $this->start_controls_section(
            'price_background_section',
            [
                'label' => esc_html__('Background', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'p_image',
            [
                'label' => __( 'Choose Pattern Image', 'orions' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'b_p_image',
            [
                'label' => __( 'Choose Bottom Image', 'orions' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();
        // Banckground - end

        // team content - end        

        // team style - start

        $this->start_controls_section(
            'team_style',
            [
                'label' => esc_html__('Style', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'label' => esc_html__('Name typography', 'orions'),
                'selector' => '{{WRAPPER}} .team-single-wrapper h3',
            ]
        ); 
        
        $this->add_control(
            'name_color',
            [
              'label' => esc_html__('Name color', 'orions'),
              'type' => \Elementor\Controls_Manager::COLOR,
              'selectors' => [
                '{{WRAPPER}} .team-single-wrapper h3' => 'color : {{VALUE}};'
              ]
              
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'desgination_typography',
                'label' => esc_html__('Designation typography', 'orions'),
                'selector' => '{{WRAPPER}} .team-single-wrapper p',
            ]
        ); 
        
        $this->add_control(
            'desgination_color',
            [
              'label' => esc_html__('Designation color', 'orions'),
              'type' => \Elementor\Controls_Manager::COLOR,
              'selectors' => [
                '{{WRAPPER}} .team-single-wrapper p' => 'color : {{VALUE}};'
              ]
              
            ]
        );

        // start tabs

        $this->start_controls_tabs( 'team_tabs' );

        $this->start_controls_tab(
            'team_normal',
            [
                'label' => esc_html__( 'Normal', 'orions' ),
            ]
        );

        $this->add_control(
            'social_icon_color_normal',
            [
              'label' => esc_html__('Social icon color', 'orions'),
              'type' => \Elementor\Controls_Manager::COLOR,
              'selectors' => [
                '{{WRAPPER}} .team-single-wrapper li a' => 'color : {{VALUE}};'
              ]
              
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'team_active',
            [
                'label' => esc_html__( 'Hover', 'orions' ),
            ]
        );        

        $this->add_control(
            'social_icon_color_active',
            [
              'label' => esc_html__('Social icon color', 'orions'),
              'type' => \Elementor\Controls_Manager::COLOR,
              'selectors' => [
                '{{WRAPPER}} .team-single-wrapper li:hover a' => 'color : {{VALUE}};'
              ]
              
            ]
        );

        $this->add_control(
            'social_icon_bg_color_active',
            [
              'label' => esc_html__('Social icon background color', 'orions'),
              'type' => \Elementor\Controls_Manager::COLOR,
              'selectors' => [
                '{{WRAPPER}} .team-single-wrapper li:hover a' => 'background-color : {{VALUE}};'
              ]
              
            ]
        );

        $this->end_controls_tab();

        //$this->end_controls_tabs();

        // end tabs

        $this->end_controls_section();

        // team style - end

        // heading style - start

        $this->start_controls_section(
            'team_style_heading',
            [
                'label' => esc_html__('Heading', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        orions_heading_style_controls($this);

        $this->end_controls_section();

        // heading style - end

        // slider nav - start

        //orions_slide_nav_styles( $this );

        // slider nav - end

        // slider nav - start

       // orions_slide_pagination_styles( $this );

        // slider nav - end

    }

/*    private function add_social_controls( $instance, $count ) {
        for ( $i = 1; $i != $count + 1; $i++ ) {
            $instance->add_control(
                'team_social_icon_' . $i,
                [
                    'label' => __('Social Icon' . $i, 'orions'),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                    'value' => 'la-user-circle',
                    'library' => 'solid',
                    ],
                ]
            );

            $instance->add_control(
                'team_social_link_' . $i,
                [
                    'label' => esc_html__('Link ' . $i, 'orions'),
                    'type' => \Elementor\Controls_Manager::URL
                ]
            );
        }
    }
*/
    private function the_team_members( $pre_tag = '', $post_tag = '' ) {
        $settings = $this->get_settings_for_display();
        if ( $settings['team_repeater'] == null ) return;
        if ( is_array( $settings['team_repeater'] ) || is_object( $settings['team_repeater'] ) ) {
            foreach( $settings['team_repeater'] as $member ) {
                if ( !empty( $pre_tag ) ) echo wp_kses( $pre_tag, 'general' );
                get_template_part( '/inc/template-parts/elementor/team', 'member', [ 'member' => $member, 'count' => 4 ] );
                if ( !empty( $post_tag ) ) echo wp_kses( $post_tag, 'general' );
            }
        }
    }

    private function orions_team_slider()
    {
        $settings = $this->get_settings_for_display();
        $id = $this->get_id();        

        // main class list
        $class_list = [
            'slider',
            'team-slider',
            'slider-'.$id
        ];
    ?>
<div class="<?php echo esc_html( implode(' ', $class_list) ); ?> hellow">
         <!-- header - start -->
        <div class="container">
        <!--
        team section heading - start
        -->
            <div class="row">
                <div class="col">
                    <?php orions_heading( $settings ); ?>
                </div>
            </div>
        <!--
        team section heading - end
        -->
        </div>
                
        <!-- header - end -->
        <!-- slider - start -->
    <div class="container team-slider-container">
        <div class="row">
            <div class="col">
                <div class="slider-wrapper">
                    <div class="swiper-container overflow-visible">
                        <div class="swiper-wrapper">
                            <?php $this->the_team_members( '<div class="swiper-slide">', '</div>' ); ?>
                        </div>
                    </div>
                    <div class="team-slider-navigation slider-navigation">
                                    <div class="team-slider-navigation-prev">
                                        <i class="las la-long-arrow-alt-left"></i>
                                    </div>
                                    <div class="team-slider-navigation-next">
                                        <i class="las la-long-arrow-alt-right"></i>
                                    </div>
                                </div>
                </div>
            </div>
        </div>
        <!-- slider - end -->
    </div>
</div>
    <?php
        // orions_slider($id, $options);
    }


/**    private function the_team_list() {
    ?>
    <div class="team-list-wrapper">
        <div class="row row-masonry gx-5 gy-5 team-list-inner" 
            data-masonry-options='{ "percentPosition": true, "horizontalOrder": true, "transitionDuration": 0 }'>
            <?php $this->the_team_members( '<div class="col-lg-4">', '</div>' ); ?>
        </div>
    </div>
    <?php
    }
*/
    protected function render()
    {
        $settings = $this->get_settings_for_display();
    ?>
        <div class="team">
            <div class="team-wrapper">
                <div class="team-inner">
                <?php
                    $this->orions_team_slider();
                    //if ( $settings['team_slider_switch'] == 'yes' ) {
                    //    $this->orions_team_slider();
                    //} else {
                    //    $this->the_team_list();
                    //}
                ?>
                </div>
                <div class="background-pattern background-pattern-1">
                    <div class="background-pattern-img background-loop" style="background-image: url(<?php echo esc_url($settings['p_image']['url']);?>);"></div>
                    <div class="background-pattern-gradient"></div>
                    <div class="background-pattern-bottom">
                        <div class="image" style="background-image: url(<?php echo esc_url($settings['b_p_image']['url']);?>)"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}
