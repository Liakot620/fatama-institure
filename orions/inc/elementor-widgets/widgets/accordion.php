<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class Accordion extends \Elementor\Widget_Base

{

    public function get_name()
    {
        return 'orions_accordion';
    }

    public function get_title()
    {
        return esc_html__('Accordion', 'orions');
    }

    public function get_icon()
    {
        return 'eicon-accordion';
    }

    public function get_categories()
    {
        return ['gfxpartner'];
    }

    protected function register_controls()
    {

        // heading content - start

        $this->start_controls_section(
            'r_accordion_content',
            [
                'label' => esc_html__('Content', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'r_accordion_keep_open',
            [
                'label' => esc_html__( 'Keep one open', 'orions' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'orions' ),
                'label_off' => esc_html__( 'No', 'orions' ),
                'return_value' => 'keep-open',
                'default' => 'dont-keep-open',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'r_accordion_active',
            [
                'label' => esc_html__( 'Active', 'orions' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'orions' ),
                'label_off' => esc_html__( 'No', 'orions' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $repeater->add_control(
            'r_accordion_title',
            [
                'label' => esc_html__('Title', 'orions'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Type your title here', 'orions'),
                'label_block' => true
            ]
        );

        $repeater->add_control(
            'r_accordion_content',
            [
                'label' => esc_html__('Content', 'orions'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,                
                'placeholder' => esc_html__('Type your content here', 'orions'),
            ]
        );

        $this->add_control(
            'r_accordion_repeater',
            [
                'label' => __('Tabs', 'orions'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => __('Tab', 'orions'),
            ]
        );

        $this->end_controls_section();

        // heading content - end

        // heading style - start

        $this->start_controls_section(
            'general_style',
            [
                'label' => esc_html__('General', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tab_heading_typo',
                'label' => esc_html__('Typography', 'orions'),
                'selector' => '{{WRAPPER}} .accordion-button',
            ]
        );

        $this->add_responsive_control(
            'heading_padding',
            [
                'label' => esc_html__( 'Heading padding', 'orions' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
                'selectors' => [
                    '{{WRAPPER}} .accordion-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'body_padding',
            [
                'label' => esc_html__( 'Body padding', 'orions' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
                'selectors' => [
                    '{{WRAPPER}} .accordion-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'body_txt_color',
            [
              'label' => esc_html__('Body text color', 'orions'),
              'type' => \Elementor\Controls_Manager::COLOR,
              'selectors' => [
                '{{WRAPPER}} .accordion-item p' => 'color : {{VALUE}};'
              ]
              
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => esc_html__( 'Border radius', 'orions' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
                'selectors' => [
                    '{{WRAPPER}} .accordion-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .accordion-item:first-of-type' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .accordion-item:last-of-type' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs( 'accordion_style_tabs' );
    
        $this->start_controls_tab(
            'tab_normal',
            [
                'label' => esc_html__( 'Normal', 'orions' ),
            ]
        );

        $this->add_control(
            'tab_bg_color',
            [
              'label' => esc_html__('Background color', 'orions'),
              'type' => \Elementor\Controls_Manager::COLOR,
              'selectors' => [
                '{{WRAPPER}} .accordion-item:not(.shown)' => 'background-color : {{VALUE}};'
              ]
              
            ]
        );

        $this->add_control(
            'tab_heading_color',
            [
              'label' => esc_html__('Heading color', 'orions'),
              'type' => \Elementor\Controls_Manager::COLOR,
              'selectors' => [
                '{{WRAPPER}} .accordion-button.collapsed' => 'color : {{VALUE}};'
              ]
              
            ]
        );

        $this->add_control(
            'tab_icon_bg_color',
            [
              'label' => esc_html__('Icon color', 'orions'),
              'type' => \Elementor\Controls_Manager::COLOR,
              'selectors' => [
                '{{WRAPPER}} .faq .accordion-button::after' => 'color : {{VALUE}};'
              ]
              
            ]
        );

        $this->add_control(
            'tab_icon_color',
            [
              'label' => esc_html__('Icon Collapsed color', 'orions'),
              'type' => \Elementor\Controls_Manager::COLOR,
              'selectors' => [
                '{{WRAPPER}} .faq .accordion-button:not(.collapsed)::after' => 'color : {{VALUE}};',
                '{{WRAPPER}} .faq .accordion-button:not(.collapsed)::after' => 'color : {{VALUE}};'
              ]
              
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_active',
            [
                'label' => esc_html__( 'Active', 'orions' ),
            ]
        );

        $this->add_control(
            'tab_bg_color_active',
            [
              'label' => esc_html__('Background color', 'orions'),
              'type' => \Elementor\Controls_Manager::COLOR,
              'selectors' => [
                '{{WRAPPER}} .accordion-item.shown' => 'background-color : {{VALUE}};'
              ]
              
            ]
        );

        $this->add_control(
            'tab_heading_color_active',
            [
              'label' => esc_html__('Heading color', 'orions'),
              'type' => \Elementor\Controls_Manager::COLOR,
              'selectors' => [
                '{{WRAPPER}} .accordion-button:not(.collapsed)' => 'color : {{VALUE}};'
              ]
              
            ]
        );

        $this->add_control(
            'tab_icon_bg_color_active',
            [
              'label' => esc_html__('Icon color', 'orions'),
              'type' => \Elementor\Controls_Manager::COLOR,
              'selectors' => [
                '{{WRAPPER}} .faq .accordion-button::after' => 'color : {{VALUE}};'
              ]
              
            ]
        );

        $this->add_control(
            'tab_icon_color_active',
            [
              'label' => esc_html__('Icon color', 'orions'),
              'type' => \Elementor\Controls_Manager::COLOR,
              'selectors' => [
                '{{WRAPPER}} .faq .accordion-button:not(.collapsed)::after' => 'color : {{VALUE}};',
                '{{WRAPPER}} .faq .accordion-button:not(.collapsed)::after' => 'color : {{VALUE}};'
              ]
              
            ]
        );

        $this->end_controls_tab();


        $this->end_controls_tabs();

        $this->end_controls_section();

        // heading style - end

    }

    private function accordion_item( $item, $parent, $id ) {
        $settings = $this->get_settings_for_display();
        $active = $item['r_accordion_active'] == 'yes';
        $heading_id = 'faq-' . $id . rand();
        $collapse_id = 'faq-collapse-' . $id . rand();
    ?>
        <div class="accordion-item">
            <div 
                class="accordion-header" 
                id="<?php echo esc_attr( $heading_id ); ?>"
            >   
                <button 
                    class="accordion-button <?php echo esc_attr( $active ? '' : 'collapsed' ) ?>" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#<?php echo esc_attr( $collapse_id ); ?>" 
                    aria-expanded="true" 
                    aria-controls="<?php echo esc_attr( $collapse_id ); ?>"
                >
                    <span><?php echo esc_html( $item['r_accordion_title'] ); ?></span>                    
                </button>
            </div>            
            <div 
                id="<?php echo esc_attr( $collapse_id ); ?>"
                class="accordion-collapse collapse <?php echo esc_attr( $active ? 'show' : '' ) ?>" 
                aria-labelledby="<?php echo esc_attr( $heading_id ); ?>" 
                data-bs-parent="#faq-accordion"
            >
                <div class="accordion-body">
                    <p><?php echo esc_html( $item['r_accordion_content'] ); ?></p>
                </div>
            </div>
        </div>
    <?php
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $id = $this->get_id();

        $parent = 'faq-accordion accordion-parent-' . $id;

    ?>

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-9 col-md-8 col-10">
                        <div class="faq-wrapper">
                            <div class="faq" id="faq-accordion">
                                <?php 
                                    if ( is_array( $settings['r_accordion_repeater'] ) || is_object( $settings['r_accordion_repeater'] ) ) {
                                        foreach ( $settings['r_accordion_repeater'] as $item ) {
                                            $this->accordion_item( $item, $parent, $id );
                                        } 
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
    <?php
    }
}
