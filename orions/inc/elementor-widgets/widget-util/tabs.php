<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
/**
function orions_get_tab_main_styles( $instance = null ) {
    if ( $instance == null ) return;
    
    $instance->start_controls_section(
        'tab_main_style',
        [
            'label' => esc_html__('Main', 'orions'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $instance->add_control(
        'tab_show_dropdown_on_mobile',
        [
            'label' => esc_html__( 'Show dropdown on mobile', 'orions' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'orions' ),
            'label_off' => esc_html__( 'Hide', 'orions' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $instance->add_control(
        'tab_main_orientation',
        [
            'label' => esc_html__( 'Orientation', 'orions' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'landscape',
            'options' => [
                'landscape' => esc_html__( 'Landscape', 'orions' ),
                'portrait' => esc_html__( 'Portrait', 'orions' )
            ],
        ]
    );

    $instance->end_controls_section();
}
*/
function orions_get_tab_icon_styles( $instance = null ) {
    if ( $instance == null ) return;

    $instance->start_controls_section(
        'tab_button_icon_style',
        [
            'label' => esc_html__('Icon', 'orions'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $instance->add_control(
        'tab_button_icon_margin',
        [
            'label' => esc_html__( 'Margin', 'orions' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'rem' ],
            'selectors' => [
                '{{WRAPPER}} .nav-tabs .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $instance->start_controls_tabs( 'tab_button_icon_style_states' );
    
    // normal tab button icon - start
    $instance->start_controls_tab(
        'tab_button_icon_style_normal',
        [
            'label' => esc_html__( 'Normal', 'orions' ),
        ]
    );

    $instance->add_control(
        'tab_button_icon_normal_size',
        [
            'label' => esc_html__( 'Size', 'orions' ),
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
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .nav-tabs .icon' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $instance->add_control(
        'tab_button_icon_normal_color',
        [
          'label' => esc_html__('Color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .nav-tabs .icon' => 'color : {{VALUE}}'
          ]
          
        ]
    );

    $instance->end_controls_tab();
    // normal tab button icon - end

    // active tab button icon - start
    $instance->start_controls_tab(
        'tab_button_icon_style_active',
        [
            'label' => esc_html__( 'Active', 'orions' ),
        ]
    );

    $instance->add_control(
        'tab_button_icon_active_size',
        [
            'label' => esc_html__( 'Size', 'orions' ),
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
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .nav-tabs .active .icon' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $instance->add_control(
        'tab_button_icon_active_color',
        [
          'label' => esc_html__('Color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .nav-tabs .active .icon' => 'color : {{VALUE}}'
          ]
          
        ]
    );

    $instance->end_controls_tab();
    // active tab button icon - end

    $instance->end_controls_tabs(); 

    $instance->end_controls_section();
}

function orions_get_tab_btn_txt_styles( $instance = null ) {
    if ( $instance == null ) return;

    $instance->start_controls_section(
        'tab_button_text_style',
        [
            'label' => esc_html__('Button text', 'orions'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $instance->start_controls_tabs( 'tab_button_text_style_states' );

    // normal tab button text - start
    $instance->start_controls_tab(
        'tab_button_text_style_normal',
        [
            'label' => esc_html__( 'Normal', 'orions' ),
        ]
    );

    $instance->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'tab_button_text_typo_normal',
            'label' => esc_html__( 'Typography', 'orions' ),
            'selector' => '{{WRAPPER}} .orions-tabs .button-list-text',
        ]
    );

    $instance->add_control(
        'tab_button_text_color_normal',
        [
          'label' => esc_html__( 'Color', 'orions' ),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .orions-tabs .button-list-text' => 'color : {{VALUE}}'
          ]
          
        ]
    );

    $instance->end_controls_tab();
    // normal tab button text - end

    // active tab button text - start
    $instance->start_controls_tab(
        'tab_button_text_style_active',
        [
            'label' => esc_html__( 'Active', 'orions' ),
        ]
    );

    $instance->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'tab_button_text_typo_active',
            'label' => esc_html__( 'Typography', 'orions' ),
            'selector' => '{{WRAPPER}} .orions-tabs .active .button-list-text',
        ]
    );

    $instance->add_control(
        'tab_button_text_color_active',
        [
          'label' => esc_html__( 'Color', 'orions' ),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .orions-tabs .active .button-list-text' => 'color : {{VALUE}}',
            '{{WRAPPER}} .orions-tabs .nav-link:hover .button-list-text' => 'color : {{VALUE}}'
          ]
          
        ]
    );

    $instance->end_controls_tab();
    // active tab button text - end

    $instance->end_controls_tabs();

    $instance->end_controls_section();
}

function orions_get_tab_btn_styles( $instance = null ) {
    if ( $instance == null ) return;

    $instance->start_controls_section(
        'tab_button_style',
        [
            'label' => esc_html__('Button', 'orions'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $instance->add_control(
        'tab_button_orientation',
        [
            'label' => esc_html__( 'Orientation', 'orions' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'portrait',
            'options' => [
                'landscape' => esc_html__( 'Landscape', 'orions' ),
                'portrait' => esc_html__( 'Portrait', 'orions' )
            ],
        ]
    );

    $instance->add_control(
        'tab_button_padding',
        [
            'label' => esc_html__( 'Padding', 'orions' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'rem' ],
            'selectors' => [
                '{{WRAPPER}} .orions-tabs .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $instance->start_controls_tabs( 'tab_button_style_states' );

    // normal tab button - start
    $instance->start_controls_tab(
        'tab_button_style_normal',
        [
            'label' => esc_html__( 'Normal', 'orions' ),
        ]
    );

    $instance->add_control(
        'tab_button_bg_color_normal',
        [
          'label' => esc_html__( 'Background color', 'orions' ),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .orions-tabs .nav-link' => 'background-color : {{VALUE}}'
          ]
          
        ]
    );

    $instance->add_control(
        'tab_button_bg_border_radius_normal',
        [
            'label' => esc_html__( 'Border radius', 'orions' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em', 'rem' ],
            'selectors' => [
                '{{WRAPPER}} .orions-tabs .nav-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $instance->end_controls_tab();
    // normal tab button - end

    // active tab button - start
    $instance->start_controls_tab(
        'tab_button_style_acive',
        [
            'label' => esc_html__( 'Active', 'orions' ),
        ]
    );

    $instance->add_control(
        'tab_button_bg_extend',
        [
            'label' => esc_html__( 'Extend background', 'orions' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'orions' ),
            'label_off' => esc_html__( 'No', 'orions' ),
            'return_value' => 'block',
            'default' => 'none',
            'selectors' => [
                '{{WRAPPER}} .orions-tabs .nav-link::after' => 'display : {{VALUE}}'
            ]
        ]
    );

    $instance->add_control(
        'tab_button_bg_color_active',
        [
          'label' => esc_html__( 'Background color', 'orions' ),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .orions-tabs .nav-link.active' => 'background-color : {{VALUE}}',
            '{{WRAPPER}} .orions-tabs .nav-link:hover' => 'background-color : {{VALUE}}'
          ]
          
        ]
    );

    $instance->add_control(
        'tab_button_bg_border_radius_active',
        [
            'label' => esc_html__( 'Border radius', 'orions' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em', 'rem' ],
            'selectors' => [
                '{{WRAPPER}} .orions-tabs .nav-link.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $instance->end_controls_tab();
    // active tab button - end

    $instance->end_controls_tabs();

    $instance->end_controls_section();
}

function orions_get_tab_dropdown_styles( $instance = null ) {
    if ( empty( $instance ) ) return;

    $instance->start_controls_section(
        'tab_dropdown_style',
        [
            'label' => esc_html__('Dropdown', 'orions'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $instance->add_control(
        'tab_dropdown_notice',
        [
            'label' => esc_html__( 'Notice', 'orions' ),
            'type' => \Elementor\Controls_Manager::RAW_HTML,
            'raw' => '<p style="margin-top: 20px; line-height: normal;">' . __( 'These styles apply to tab options when they are collapsed into a dropdown on smaller screen sizes.', 'orions' ) . '</p>',
            'separator' => 'after',
        ]
    );

    $instance->add_control(
        'tab_dropdown_bg_color',
        [
            'label' => esc_html__( 'Background color', 'orions' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .selectify .active' => 'background-color: {{VALUE}}',
                '{{WRAPPER}} .selectify ul' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $instance->add_control(
        'dropdown_tab_arrow_color',
        [
          'label' => esc_html__('Arrow color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .selectify .active-wrapper .arrow-icon' => 'fill : {{VALUE}};'
          ]
          
        ]
    );

    $instance->start_controls_tabs( 'dropdown_tabs' );
    
    $instance->start_controls_tab(
        'dropdown_tab_normal',
        [
            'label' => esc_html__( 'Normal', 'orions' ),
        ]
    );

    $instance->add_control(
        'dropdown_tab_color_normal',
        [
          'label' => esc_html__('Text color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .selectify ul' => 'color : {{VALUE}};'
          ]
          
        ]
    );

    $instance->add_control(
        'dropdown_tab_icon_color_normal',
        [
          'label' => esc_html__('Icon color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .selectify .icon-wrapper' => 'color : {{VALUE}};',
            '{{WRAPPER}} .selectify .icon-wrapper' => 'fill : {{VALUE}};'
          ]
          
        ]
    );

    $instance->add_control(
        'dropdown_tab_bg_color_normal',
        [
          'label' => esc_html__('Background color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .selectify ul li:not(.selected)' => 'background-color : {{VALUE}};'
          ]
          
        ]
    );


    $instance->end_controls_tab();

    $instance->start_controls_tab(
        'dropdown_tab_active',
        [
            'label' => esc_html__( 'Active', 'orions' ),
        ]
    );

    $instance->add_control(
        'dropdown_tab_color_active',
        [
          'label' => esc_html__('Text color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .selectify ul li.selected' => 'color : {{VALUE}};',
            '{{WRAPPER}} .selectify .active .button-text' => 'color : {{VALUE}};'
          ]
          
        ]
    );

    $instance->add_control(
        'dropdown_tab_icon_color_active',
        [
          'label' => esc_html__('Icon color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .selectify li.selected .icon-wrapper' => 'color : {{VALUE}}; fill : {{VALUE}};',
            '{{WRAPPER}} .selectify .active .icon-wrapper' => 'color : {{VALUE}}; fill : {{VALUE}};'
          ]
          
        ]
    );

    $instance->add_control(
        'dropdown_tab_bg_color_active',
        [
          'label' => esc_html__('Background color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .selectify ul li.selected' => 'background-color : {{VALUE}};'
          ]
          
        ]
    );

    $instance->end_controls_tab();

    $instance->end_controls_tabs();

    $instance->end_controls_section();
}

function orions_tab_link( $item, $id, $col = '' ) {
    $active = $item['r_tab_active'] == 'yes' ? 'active' : '';
    $link_id = 'tab-button-' . $id;
    $target_id = 'tab-pane-' . $id;
?>
    
        <button 
            class="nav-link <?php echo esc_attr( $active ); ?>" 
            id="<?php echo esc_attr( $link_id ); ?>" 
            
            data-bs-toggle="pill" 
            data-bs-target="#<?php echo esc_attr( $target_id ); ?>" 
            type="button" 
            role="tab" 
            aria-controls="<?php echo esc_attr( $target_id ); ?>" 
            aria-selected="<?php echo esc_attr( $active == 'active' ? 'true' : 'false' ); ?>"
            <?php //echo esc_attr( $item['r_tab_active'] == 'yes' ? 'data-selected': '' ); ?>
        >
            <span>                
                <i class="las <?php echo esc_html( $item['r_tab_icon'] ); ?>"></i>
                <span class="text"><?php echo esc_html( $item['r_tab_title'] ); ?></span>            
            </span>

        </button>
<?php
}

function orions_tab_pane( $item, $id ) {
    $active = $item['r_tab_active'] == 'yes' ? 'active' : '';
    $link_id = 'tab-button-' . $id;
    $target_id = 'tab-pane-' . $id;
    
    $class_list = [
        'tab-pane',
        $active,
        //'elementor-repeater-item-' . $id,
        //'tab-' . $item['r_tab_content_type']
    ];

?>
    <div 
        class="<?php echo esc_attr( implode( ' ', $class_list ) ); ?>" 
        id="<?php echo esc_attr( $target_id ); ?>" 
        role="tabpanel" 
        aria-labelledby="<?php echo esc_attr( $link_id ); ?>">
        <?php
            if ( $item['r_tab_content_type'] == 'text' ) {
            
            ?>
            <div class="tab-pane-wrapper c-grey text-pane">
                <h3><?php echo esc_html( $item['r_tab_title'] ); ?></h3>
                <div>
                    <?php echo wp_kses( $item['r_tab_wysiwyg'], 'wysiwyg-heading-removal' ); ?>
                </div>
            </div>
            <?php

            } else if ( $item['r_tab_content_type'] == 'template' ) {
            ?>
                <div class="tab-pane-wrapper c-grey">
                <?php
                    $content = \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $item['r_tab_content_template'] );
                    echo wp_kses( $content, 'elementor-template' );
                ?>
                </div>
            <?php
            }
        
        ?>
        
    </div>
<?php
}

function orions_get_tab_content_tab( $instance = null ) {
    if ( $instance == null ) return;

    $instance->add_control(
        'r_tab_active',
        [
            'label' => esc_html__( 'Active', 'orions' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'orions' ),
            'label_off' => esc_html__( 'No', 'orions' ),
            'return_value' => 'yes',
            'default' => 'no',
        ]
    );

    $instance->add_control(
        'r_tab_icon',
        [
            'label' => __('Icon Class', 'orions'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'la-comments',
            'description' => 'Please Write Icon class from https://icons8.com/line-awesome'
        ]
    );

    $instance->add_control(
        'r_tab_title',
        [
            'label' => esc_html__('Title', 'orions'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'placeholder' => esc_html__('Type your title here', 'orions'),
        ]
    );

    $instance->add_control(
        'r_tab_content_type',
        [
            'label'       => esc_html__( 'Type', 'orions' ),
            'type'        => \Elementor\Controls_Manager::SELECT,
            'default'     => 'type_1',
            'options'     => [
                'text' => esc_html__( 'Text', 'orions' ),
                'template' => esc_html__( 'Template', 'orions' ),
            ],
        ]
    );

    $instance->add_control(
        'r_tab_wysiwyg',
        [
            'label' => esc_html__('Content', 'orions'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'rows' => 10,
            'placeholder' => esc_html__('Type your content here', 'orions'),
            'condition' => [
                'r_tab_content_type' => 'text'
            ]
        ]
    );

    $instance->add_control(
        'r_tab_content_template',
        [
            'label'       => esc_html__( 'Template', 'orions' ),
            'type'        => \Elementor\Controls_Manager::SELECT,
            'default'     => '0',
            'options'     => orions_get_elementor_templates(),
            'description' => esc_html__( 'You can create new templates or customize existing templates by going to the \'Templates\' menu item (Besides the \'Elementor\' menu item) on the dashboard.', 'orions' ),
            'condition' => [
                'r_tab_content_type' => 'template'
            ]
        ]
    );

    
}

function orions_get_tab_style_tab( $instance = null ) {
    if ( $instance == null ) return;

    $instance->add_control(
        'tab_content_background',
        [
          'label' => esc_html__( 'Background Color', 'orions' ),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .tab-content .tab-pane.active{{CURRENT_ITEM}}' => 'background-color : {{VALUE}}',
          ]
        ]
    );

    $instance->add_control(
        'tab_content_border_radius',
        [
            'label' => esc_html__( 'Border radius', 'orions' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'rem' ],
            'selectors' => [
                '{{WRAPPER}} .tab-content .tab-pane.active{{CURRENT_ITEM}}' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ]
        ]
    );

    $instance->add_responsive_control(
        'tab_content_padding',
        [
            'label' => esc_html__( 'Padding', 'orions' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'rem' ],
            'selectors' => [
                '{{WRAPPER}} .tab-content .tab-pane.active{{CURRENT_ITEM}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $instance->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'tab_content_h3_typo',
            'label' => esc_html__('Heading Typography', 'orions'),
            'selector' => '{{WRAPPER}} .tab-content .tab-pane.active{{CURRENT_ITEM}} > .tab-pane-wrapper > h3',
        ]
    );

    $instance->add_control(
        'tab_content_h3_color',
        [
          'label' => esc_html__( 'Heading Color', 'orions' ),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .tab-content .tab-pane.active{{CURRENT_ITEM}} > .tab-pane-wrapper > h3' => 'color : {{VALUE}}',
          ]
        ]
    );

    $instance->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'tab_content_con_typo',
            'label' => esc_html__('Content Typography', 'orions'),
            'selector' => '{{WRAPPER}} .tab-content .tab-pane.active{{CURRENT_ITEM}} div *',
        ]
    );

    $instance->add_control(
        'tab_content_con_color',
        [
          'label' => esc_html__( 'Content Color', 'orions' ),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .tab-content .tab-pane.active{{CURRENT_ITEM}} div *' => 'color : {{VALUE}}',
          ]
        ]
    );
}