<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Button extends \Elementor\Widget_Base {

  public function get_name(){
    return 'orions_button';
  }

  public function get_title() {
    return esc_html__('Button', 'orions');
  }

  public function get_icon() {
    return 'eicon-button';
  }

  public function get_categories(){
    return ['gfxpartner'];
  }

  protected function register_controls(){

    // button content -  start

    $this->start_controls_section(
      'button_content',
      [
        'label' => esc_html__('Content', 'orions'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT
      ]
    );


    $this->add_control(
        'button_text',
        [
        'label' => esc_html__('Text', 'orions'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'button-2'
        ]
    );    

    $this->add_control(
        'button_link',
        [
            'label' => esc_html__('Link', 'orions'),
            'type' => \Elementor\Controls_Manager::URL,
        
        ]
    );

    $this->add_control(
        'button_css',
        [
        'label' => esc_html__('CSS Class', 'orions'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'button-2'
        ]
    );     

    $this->end_controls_section();

    // button content -  end

    // button style -  start

    $this->start_controls_section(
        'button_custom_style',
        [
          'label' => esc_html__('Style', 'orions'),
          'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'button_text',
            'label' => esc_html__('Text', 'orions'),
            'selector' => '{{WRAPPER}} .button',
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
              '{{WRAPPER}}' => 'text-align: {{VALUE}};',
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
					'{{WRAPPER}} .button' => 'width: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .button-content h4' => 'color : {{VALUE}} !important; fill : {{VALUE}} !important;'
          ]
          
        ]
    );   
    $this->add_control(
      'button_bg_color',
      [
        'label' => esc_html__('Background color', 'orions'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .button-inner::after' => 'background-color : {{VALUE}}'
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
            '{{WRAPPER}} .button:hover' => 'color : {{VALUE}} !important; fill : {{VALUE}} !important;'
          ]
          
        ]
    );

    $this->add_control(
      'button_bg_color_hover',
      [
        'label' => esc_html__('Background color', 'orions'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .button:hover' => 'background-color : {{VALUE}}'
        ]
        
      ]
    );

    $this->end_controls_tab();

    $this->end_controls_tabs();  

    $this->end_controls_section();

    // button style -  end
  
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();

    $target = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
    $nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';
    $url = !empty( $settings['button_link']['url'] ) ? ' href='.esc_url( $settings['button_link']['url'] ) : '';  

       
    
    if ( $settings['button_link']['is_external'] )
      $this->add_render_attribute('button_attr', 'target', '_blank');

    if ( $settings['button_link']['nofollow'] )
      $this->add_render_attribute('button_attr', 'rel', 'nofollow');

    if ( !empty( $settings['button_link']['url'] ) )
      $this->add_render_attribute('button_attr', 'href', $settings['button_link']['url']);
    
  ?>
    <a <?php $this->print_render_attribute_string('button_attr');?> class="button <?php echo esc_html( $settings['button_css'] ); ?>" >
      <div class="button-inner">
        <div class="button-content">
          <h4><?php echo esc_html( $settings['button_text'] ); ?></h4>
        </div>
      </div>
    </a>       
    <?php
  }
}
