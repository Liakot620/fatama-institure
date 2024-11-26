<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class AppButton extends \Elementor\Widget_Base {

  public function get_name(){
    return 'orions_app_button';
  }

  public function get_title() {
    return esc_html__('App Button', 'orions');
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
        'default' => 'Google Play'
        ]
    );
    $this->add_control(
        'button_sub_text',
        [
        'label' => esc_html__('Sub Text', 'orions'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'get it on'
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
      'button_icon',
      [
          'label' => __('Icon', 'orions'),
          'type' => \Elementor\Controls_Manager::ICONS
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
            'label' => esc_html__('Button Text', 'orions'),
            'selector' => '{{WRAPPER}} .download-button-content h3',
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'button_s_text',
            'label' => esc_html__('Button Sub Text', 'orions'),
            'selector' => '{{WRAPPER}} .download-button-content h5',
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
					'{{WRAPPER}} a.download-button' => 'width: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .download-button-content h3' => 'color : {{VALUE}} !important; fill : {{VALUE}} !important;'
          ]
          
        ]
    );

    $this->add_control(
        'button_sub_text_color',
        [
          'label' => esc_html__('Sub Text color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .download-button-content h5' => 'color : {{VALUE}} !important; fill : {{VALUE}} !important;'
          ]
          
        ]
    );

    $this->add_control(
        'button_icon_color',
        [
          'label' => esc_html__('Icon color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .download-button-icon' => 'color : {{VALUE}} !important; fill : {{VALUE}} !important;'
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
            '{{WRAPPER}} .download-button:hover .download-button-content h3' => 'color : {{VALUE}} !important; fill : {{VALUE}} !important;'
          ]
          
        ]
    );

    $this->add_control(
        'button_sub_text_color_hover',
        [
          'label' => esc_html__('Sub Text hover color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .download-button:hover .download-button-content h5' => 'color : {{VALUE}} !important; fill : {{VALUE}} !important;'
          ]
          
        ]
    );

    $this->add_control(
      'button_icon_color_hover',
      [
        'label' => esc_html__('Icon color', 'orions'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .download-button:hover .download-button-icon i' => 'color : {{VALUE}}'
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
    $btn_css = 'nutton-1';

    $icon_color = $settings['button_icon']['value'];

    if ($icon_color == 'fab fa-apple') {
      $this->add_render_attribute('button_attr', 'class', 'download-button download-button-apple');
    } else {
    $this->add_render_attribute('button_attr', 'class', 'download-button download-button-google');
    }
    if ( $settings['button_link']['is_external'] )
      $this->add_render_attribute('button_attr', 'target', '_blank');

    if ( $settings['button_link']['nofollow'] )
      $this->add_render_attribute('button_attr', 'rel', 'nofollow');

    if ( !empty( $settings['button_link']['url'] ) )
      $this->add_render_attribute('button_attr', 'href', $settings['button_link']['url']);
 
  ?>
    <a <?php $this->print_render_attribute_string('button_attr');  ?>>
      <div class="download-button-inner">
        <div class="download-button-icon c-purple">
          <i class="<?php echo wp_kses( $settings['button_icon']['value'], 'elementor-general' ); ?>"></i>
        </div>
        <div class="download-button-content">
          <h5 class="c-grey upper ls-1"><?php echo esc_html( $settings['button_sub_text'] ); ?></h5>
          <h3 class="c-dark ls-2"><?php echo esc_html( $settings['button_text'] ); ?></h3>
        </div>
      </div>
    </a>    
    <?php
  }
}
