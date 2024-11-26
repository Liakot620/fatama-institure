<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class IconBox extends \Elementor\Widget_Base {

  public function get_name(){
    return 'orions_icon_box';
  }

  public function get_title() {
    return esc_html__('Icon Box', 'orions');
  }

  public function get_icon() {
    return 'eicon-icon-box';
  }

  public function get_categories(){
    return ['gfxpartner'];
  }

  protected function register_controls(){

    // content -  start

    $this->start_controls_section(
        'content',
        [
            'label' => esc_html__('Content', 'orions'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT
        ]
    );

    $this->add_control(
      'icon_swicher',
      [
        'label' => esc_html__( 'Icon Position', 'orions' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__( 'Top', 'orions' ),
        'label_off' => esc_html__( 'Left', 'orions' ),
        'return_value' => 'yes',
        'default' => 'yes',
      ]
    );  

    $this->add_control(
        'content_box_title',
        [
            'label' => esc_html__( 'Title', 'orions' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Unlimited Storage',
        ]
    );

    $this->add_control(
        'content_box_text',
        [
            'label' => esc_html__( 'Text', 'orions' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => "Heat multiply is second divided fowl there isn't man cattle.",
        ]
    );

    $this->add_control(
        'content_r_box_icon',
        [
            'label' => esc_html__( 'Sub Heading icon', 'orions' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'la-user-circle',
            'options' => [
                   '' => esc_html__( 'Blank', 'orions' ),
                   'la-user-circle' => esc_html__( 'User', 'orions' ),
                   'la-user-lock' => esc_html__( 'User Lock', 'orions' ),
                   'la-phone-volume' => esc_html__('Phone', 'orions'),
                   'la-handshake' => esc_html__( 'Handshake', 'orions' ),
                   'la-headset' => esc_html__('Headset', 'orions'),
                   'la-cog' => esc_html__( 'Setting', 'orions' ),
                   'la-video' => esc_html__( 'Video Camera', 'orions' ),
                   'la-photo-video' => esc_html__('Photo Video', 'orions'),
                   'la-tags' => esc_html__( 'Tag', 'orions' ),
                   'la-comments' => esc_html__( 'Comments', 'orions' ),
                   'la-file-alt' => esc_html__( 'File', 'orions' ),
                   'la-tablet' => esc_html__( 'Tablet', 'orions' ),
                   'la-bullhorn' => esc_html__( 'Bullhorn', 'orions' ),
                   'la-cloud-download-alt' => esc_html__( 'Cloud Download', 'orions' ),
                   'la-envelope' => esc_html__( 'Envelope', 'orions' ),
                   'la-envelope-open' => esc_html__( 'Envelope Open', 'orions' ),
                   'la-envelope-open-text' => esc_html__( 'Envelope Text', 'orions' ),
                   'la-map-marked-alt' => esc_html__( 'Marked Map', 'orions' ),
                   'la-server' => esc_html__( 'Server', 'orions' ),
                ],
            'description' => 'Select Blank (If you Want to Choose Icon From Bellow)'
            ]
        );

    $this->add_control(
        'content_box_icon',
        [
            'label' => __('Icon', 'orions'),
            'type' => \Elementor\Controls_Manager::ICONS,
        ]
    );

    $this->end_controls_section();

    // content -  end

    // style -  start

    $this->start_controls_section(
        'style',
        [
          'label' => esc_html__('Style', 'orions'),
          'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]
    );

    $this->add_responsive_control(
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
                '{{WRAPPER}} .icon-text' => '{{VALUE}}',
                '{{WRAPPER}} .icon-text::after' => '{{VALUE}}',
                '{{WRAPPER}} .icon-text-1' => '{{VALUE}}',
                '{{WRAPPER}} .icon-text-1::after' => '{{VALUE}}',              
            ],
          ]
        );

    $this->add_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'orions' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .icon-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          '{{WRAPPER}} .icon-text-1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

    $this->add_control(
			'border_radius',
			[
				'label' => esc_html__( 'Border radius', 'orions' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
          '{{WRAPPER}} .icon-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .icon-text-1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
          'name' => 'Heading_text_typography',
          'label' => esc_html__('Heading Text', 'orions'),
          'selector' => '{{WRAPPER}} .icon-text h4',
          'condition' => array_merge( ['icon_swicher' => 'yes'] )
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
          'name' => 'Heading_text_typographys',
          'label' => esc_html__('Heading Text', 'orions'),
          'selector' => '{{WRAPPER}} .icon-text-1 h4',
          'condition' => array_merge( ['icon_swicher' => ''] )
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
          'name' => 'text_typography',
          'label' => esc_html__('Text', 'orions'),
          'selector' => '{{WRAPPER}} .icon-text p',
          'condition' => array_merge( ['icon_swicher' => 'yes'] )
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
          'name' => 'text_typographys',
          'label' => esc_html__('Text', 'orions'),
          'selector' => '{{WRAPPER}} .icon-text-1 p',
          'condition' => array_merge( ['icon_swicher' => ''] )
      ]
    );

    $this->add_control(
      'heading_text_color',
      [
        'label' => esc_html__('Heading Text color', 'orions'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .icon-text h4' => 'color : {{VALUE}};',
          '{{WRAPPER}} .icon-text-1 h4' => 'color : {{VALUE}};',
        ]
        
      ]
    );

    $this->add_control(
      'text_color',
      [
        'label' => esc_html__('Text color', 'orions'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .icon-text p' => 'color : {{VALUE}};',
          '{{WRAPPER}} .icon-text-1 p' => 'color : {{VALUE}};',
        ]
        
      ]
    );

    $this->add_control(
      'background_color',
      [
        'label' => esc_html__('Background color', 'orions'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .icon-text' => 'background-color : {{VALUE}};',
          '{{WRAPPER}} .icon-text-1' => 'background-color : {{VALUE}};',
        ]
        
      ]
    );    

    $this->add_control(
      'icon_color',
      [
        'label' => esc_html__('Icon color', 'orions'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .icon-text i::before' => 'background : {{VALUE}}; -webkit-background-clip : text;',
          '{{WRAPPER}} .icon-text-1 i::before' => 'background : {{VALUE}}; -webkit-background-clip : text;',
        ]
        
      ]
    );

    $this->add_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon size', 'orions' ),
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
						'max' => 100,
					],
				],
				'selectors' => [
          '{{WRAPPER}} .icon-text i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .icon-text-1 i' => 'font-size: {{SIZE}}{{UNIT}};',
          '{{WRAPPER}} .single-icon-box .icon-inner .icon-svg' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

    $this->end_controls_section();

    // style -  end
  
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    $box_icon = $settings['content_r_box_icon'];
  ?>
    <?php if ( $settings['icon_swicher'] == 'yes'){?>
    <div class="icon-text">
      <?php if($box_icon != '') {?>
      <i class="las <?php echo wp_kses( $settings['content_r_box_icon'], 'elementor-general' ); ?>"></i>
      <?php } else { ?>
        <i class="las <?php echo wp_kses( $settings['content_box_icon']['value'], 'elementor-general' ); ?>"></i>
      <?php }?>
      <h4 class="c-dark"><?php echo esc_html( $settings['content_box_title'] ); ?></h4>
      <p class="c-grey"><?php echo esc_html( $settings['content_box_text'] ); ?></p>
    </div>
  <?php } else {?>
    <div class="icon-text-1">
      <?php if($box_icon != '') {?>
      <i class="las <?php echo wp_kses( $settings['content_r_box_icon'], 'elementor-general' ); ?>"></i>
      <?php } else { ?>
        <i class="las <?php echo wp_kses( $settings['content_box_icon']['value'], 'elementor-general' ); ?>"></i>
      <?php }?>
      <div>
        <h4 class="c-dark"><?php echo esc_html( $settings['content_box_title'] ); ?></h4>
        <p class="c-grey"><?php echo esc_html( $settings['content_box_text'] ); ?></p>
      </div>
    </div>
    <?php }?>   
    <?php
  }
}
