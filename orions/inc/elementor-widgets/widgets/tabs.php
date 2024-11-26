<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class Tabs extends \Elementor\Widget_Base

{

    public function get_name()
    {
        return 'orions_tabs';
    }

    public function get_title()
    {
        return esc_html__('Tabs', 'orions');
    }

    public function get_icon()
    {
        return 'eicon-tabs';
    }

    public function get_categories()
    {
        return ['gfxpartner'];
    }

    protected function register_controls()
    {

        // content - start

        $this->start_controls_section(
            'r_tab_content',
            [
                'label' => esc_html__('Content', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'r_sub_heading_control',
            [
                'label' => esc_html__('Sub Heading', 'orions'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'App Feature',
            ]
        );

        $this->add_control(
            'r_sub_icon_control',
            [
                'label' => esc_html__('Icon Class', 'orions'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'la-cog',
                'description' => 'Please Write Icon class from https://icons8.com/line-awesome'
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->start_controls_tabs( 'tab_repeater_tabs' );

        $repeater->start_controls_tab(
            'tab_repeater_content_tab',
            [
                'label' => esc_html__( 'Content', 'orions' ),
            ]
        );

        orions_get_tab_content_tab( $repeater );
        
        $repeater->end_controls_tab();        

        $repeater->end_controls_tabs();

        $this->add_control(
            'r_tab_repeater',
            [
                'label' => __('Tabs', 'orions'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => __('Tab', 'orions'),
            ]
        );

        $this->end_controls_section();

        // content - end

        // style - start
        $this->start_controls_section(
            'style',
            [
              'label' => esc_html__('Style', 'orions'),
              'tab' => \Elementor\Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'r_sub_heading_color',
            [
                'label' => esc_html__('Sub Heading Color', 'orions'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sub-heading h5' => 'color : {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'r_icon_color',
            [
                'label' => esc_html__('Icon Color', 'orions'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sub-heading i' => 'color : {{VALUE}}'
                ],
            ]
        );

        $this->end_controls_section();
        //orions_get_tab_main_styles( $this );

        // style - end

        // button style - start

        //orions_get_tab_btn_styles( $this );

        // button style - end

        // icon style - start

       // orions_get_tab_icon_styles( $this );

        // icon style - end

        // text style - start

       // orions_get_tab_btn_txt_styles( $this );

        // text style - end

        // dropdown style - start

       // orions_get_tab_dropdown_styles( $this );

        // dropdown style - end

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $id = $this->get_id();

        $this->add_render_attribute('tab_class', 'class', [ 
            'tab-section', 
            //'tab-' . $settings['tab_button_orientation']
        ]);

        //$this->add_render_attribute('link_wrapper_class', 'class', [ 
        //    $settings['tab_main_orientation'] == 'landscape' ? 'col-lg-6' : 'col-lg-12', 
        //]);

        $this->add_render_attribute('link_list_class', 'class', [ 
            'nav tab-nav',
            'tab-nav',
            'flex-column',
            'nav-pills',
            'me-3',
            //$settings['tab_show_dropdown_on_mobile'] == 'yes' ? 'mobile-hidden' : '',
            //$settings['tab_main_orientation'] == 'landscape' ? '' : '', 
        ]);

        $this->add_render_attribute('link_list_class', 'id', [ 
            'v-pills-tab tab-container-' . $id
        ]);

        $this->add_render_attribute('link_list_class', 'role', [ 
            'tablist'
        ]);

    ?>
    <div <?php $this->print_render_attribute_string( 'tab_class' ); ?>>
        <div class="tab-section-wrapper">
            <div class="container">
                <div class="row gx-5">
                <!-- tab links - start -->
                <div class="col-lg-4 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
                    <div class="sub-heading c-blue upper ls-1">
                        <i class="las <?php echo esc_html( $settings['r_sub_icon_control']);?>"></i>
                        <h5><?php echo esc_html( $settings['r_sub_heading_control']);?></h5>
                    </div>
                    <div <?php $this->print_render_attribute_string( 'link_list_class' ); ?> aria-orientation="vertical">                    
                        <?php
                            if ( is_array( $settings['r_tab_repeater'] ) || is_object( $settings['r_tab_repeater'] ) ) {
                                foreach ( $settings['r_tab_repeater'] as $item ) {
                                    orions_tab_link( 
                                        $item, 
                                        $item['_id'], 
                                        //$settings['tab_main_orientation'] == 'landscape' ? '' : ''
                                    );
                                } 
                            }
                        ?>
                    </div>                    
                </div>

                <!-- tab links - end -->
                <!-- tab panes - start -->
                <div class="col-lg-8 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
                    <div class="tab-content" id="v-pills-tabContent">
                        <?php 
                        if ( is_array( $settings['r_tab_repeater'] ) || is_object( $settings['r_tab_repeater'] ) ) {
                            foreach ( $settings['r_tab_repeater'] as $item ) {
                                orions_tab_pane( $item, $item['_id'] );
                            } 
                        }
                        ?>
                    </div>
                </div>
                <!-- tab panes - end -->
            </div>
        </div>
        </div>
    </div>
    <?php
    }
}
