<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class MenuList extends \Elementor\Widget_Base

{

    public function get_name()
    {
        return 'orions_menu_list';
    }

   public function get_title()
    {
        return esc_html__('Menu', 'orions');
    }

    public function get_icon()
    {
        return 'eicon-nav-menu';
    }

    public function get_categories()
    {
        return ['gfxpartner'];
    }

    protected function register_controls()
    {

        // content - start

        $this->start_controls_section(
            'content',
            [
                'label' => esc_html__('Content', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );        

        $this->add_control(
            'menu_select',
            [
                'label' => esc_html__( 'Menu', 'orions' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => orions_get_nav_menu_names(),
            ]
        );
        
        $this->end_controls_section();

        // content - end

        // style - start

        $this->start_controls_section(
            'style',
            [
                'label' => esc_html__('Style', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'height',
            [
                'label' => esc_html__( 'Height', 'orions' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'rem' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,                      
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
                    '{{WRAPPER}}' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'text_type',
                'label' => esc_html__('Text', 'orions'),
                'selector' => '{{WRAPPER}} .navigation-menu > li > a',
            ]
        );

        

        $this->start_controls_tabs( 'menu_tabs' );
    
        $this->start_controls_tab(
            'menu_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'orions' ),
            ]
        );

        $this->add_control(
            'text_color_normal',
            [
              'label' => esc_html__('Text color', 'orions'),
              'type' => \Elementor\Controls_Manager::COLOR,
              'selectors' => [
                '{{WRAPPER}} .navigation-menu > li > a' => 'color : {{VALUE}};'
              ]
              
            ]
        );

        $this->end_controls_tab(); // end tab

        $this->start_controls_tab(
            'menu_sticky_tab',
            [
                'label' => esc_html__( 'Sticky', 'orions' ),
            ]
        );

        $unq = $this->get_unique_selector();

        $this->add_control(
            'text_color_sticky',
            [
              'label' => esc_html__('Text color', 'orions'),
              'type' => \Elementor\Controls_Manager::COLOR,
              'selectors' => [
                '.sticky-nav.scrolled .elementor-element-{{ID}} .navigation-menu > li > a' => 'color : {{VALUE}} !important;'
              ]
              
            ]
        );
        

        $this->end_controls_tab(); // end tab

        $this->end_controls_tabs(); // end tabs

        $this->end_controls_section();

        // style - end        

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if ( empty( $settings['menu_select'] ) && ! is_nav_menu( $settings['menu_select'] ) ) return;

        //$class = 'navigation-menu ';
        $container_class = 'navigation-menu-wrapper menu-' . $this->get_id();

        
    ?>
    

        <?php
            wp_nav_menu([
                'theme_location' => 'other-menu',
                'menu' => $settings['menu_select'],
                'container_class' => $container_class,
                'link_before'=> '<span>',
                'link_after' => '</span>'
            ]);
        ?>

    
    <?php
    }
}
