<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class ContactForm7 extends \Elementor\Widget_Base {

	public function get_name() {
		return 'contact_form_orions';
	}

	public function get_title() {
		return esc_html__( 'Contact From 7', 'orions' );
	}

	public function get_icon() {
		return 'fas fa-mail-bulk';
	}

	public function get_categories() {
		return [ 'gfxpartner' ];
	}

	protected function get_selector_array( $selectors, $property ) {
		$result = [];

		foreach ( $selectors as $selector ) {
			$result[ $selector ] = $property;
		}

		return $result;
	}

	protected function register_controls() {
		
	$field_selector = [
		'{{WRAPPER}} .form-control',
		'{{WRAPPER}} input:not([type="submit"]):not([type="checkbox"]):not([type="radio"])', 
		'{{WRAPPER}} textarea',
		// '{{WRAPPER}} label'
	];

	$field_selector_focus = [
		'{{WRAPPER}} .form-control:focus',
		'{{WRAPPER}} .form-control:focus-visible',
		'{{WRAPPER}} input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]):focus',
		'{{WRAPPER}} input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]):focus-visible',
		'{{WRAPPER}} textarea:focus',
		'{{WRAPPER}} textarea:focus-visible',
		// '{{WRAPPER}} label'
	];

	$field_selector_placeholder = [
		'{{WRAPPER}} .form-control::placeholder',
		'{{WRAPPER}} .form-control::-webkit-input-placeholder',
		'{{WRAPPER}} .form-control::-moz-placeholder',
		'{{WRAPPER}} .form-control::-ms-input-placeholder',
		'{{WRAPPER}} .form-control::-moz-placeholder',

		'{{WRAPPER}} input:not([type="submit"]):not([type="checkbox"]):not([type="radio"])::placeholder',
		'{{WRAPPER}} input:not([type="submit"]):not([type="checkbox"]):not([type="radio"])::-webkit-input-placeholder',
		'{{WRAPPER}} input:not([type="submit"]):not([type="checkbox"]):not([type="radio"])::-moz-placeholder',
		'{{WRAPPER}} input:not([type="submit"]):not([type="checkbox"]):not([type="radio"])::-ms-input-placeholder',
		'{{WRAPPER}} input:not([type="submit"]):not([type="checkbox"]):not([type="radio"])::-moz-placeholder',

		'{{WRAPPER}} textarea::placeholder',
		'{{WRAPPER}} textarea::-webkit-input-placeholder',
		'{{WRAPPER}} textarea::-moz-placeholder',
		'{{WRAPPER}} textarea::-ms-input-placeholder',
		'{{WRAPPER}} textarea::-moz-placeholder',
		// '{{WRAPPER}} label'
	];

	$this->start_controls_section(
		'cf7_content',
		[
			'label' => esc_html__( 'Contact Form 7', 'orions' ), 
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]
	);  

	$this->add_control(
		'cf7',
		[
			'label' => esc_html__( 'Select contact form', 'orions' ),
			'description' => esc_html__('Contact form 7 must be installed for this widget to work','orions'),
			'type' => \Elementor\Controls_Manager::SELECT2,
			'multiple' => false,
			'options' => $this->get_contact_form_7_forms(),
		]
	);

	$this->end_controls_section();

  $this->start_controls_section(
            'heading_content',
            [
                'label' => esc_html__('Heading', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        orions_heading_data_controls($this);

        $this->end_controls_section();

	$this->start_controls_section(
        'cf7_style',
        [
          'label' => esc_html__('Fields', 'orions'),
          'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]
    );

	$this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'cf7_text',
            'label' => esc_html__('Typography', 'orions'),
            'selector' => implode( ',', $field_selector ),
        ]
    );

  $this->add_control(
    'cf7_field_margin',
    [
      'label' => esc_html__( 'Field Margin', 'orions' ),
      'type' => \Elementor\Controls_Manager::DIMENSIONS,
      'size_units' => [ 'px', '%', 'rem' ],
      'selectors' => [
        '{{WRAPPER}} input:not([type="submit"]):not([type="checkbox"]):not([type="radio"])' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};', 
      ]
    ]
  );

  $this->add_control(
    'cf7_textarea_margin',
    [
      'label' => esc_html__( 'Textarea Margin', 'orions' ),
      'type' => \Elementor\Controls_Manager::DIMENSIONS,
      'size_units' => [ 'px', '%', 'rem' ],
      'selectors' => [        
		    '{{WRAPPER}} textarea' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      ]
    ]
  );

  $this->add_control(
    'cf7_textarea',
    [
      'label' => esc_html__( 'Height', 'orions' ),
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
        '{{WRAPPER}} textarea' => 'height: {{SIZE}}{{UNIT}};',
      ],
    ]
  );

  $this->add_control(
    'cf7_padding',
    [
      'label' => esc_html__( 'Padding', 'orions' ),
      'type' => \Elementor\Controls_Manager::DIMENSIONS,
      'size_units' => [ 'px', '%', 'rem' ],
      'selectors' => $this->get_selector_array( $field_selector, 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ),
    ]
  );

  $this->add_control(
    'cf7_border_radius',
    [
      'label' => esc_html__( 'Border radius', 'orions' ),
      'type' => \Elementor\Controls_Manager::DIMENSIONS,
      'size_units' => [ 'px', '%', 'rem' ],
      'selectors' => $this->get_selector_array( $field_selector, 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ),
    ]
  );

	// tabs - start

	$this->start_controls_tabs( 'cf7_style_tabs' );
    
	// tab - start

    $this->start_controls_tab(
        'cf7_normal',
        [
            'label' => esc_html__( 'Normal', 'orions' ),
        ]
    );

    $this->add_control(
      'cf7_text_color',
      [
        'label' => esc_html__('Text color', 'orions'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => $this->get_selector_array( $field_selector, 'color : {{VALUE}}' )
      ]
    );

	$this->add_group_control(
		\Elementor\Group_Control_Border::get_type(),
		[
			'name' => 'cf7_normal_border',
			'selector' => implode( ',', $field_selector )
		]
	);

  $this->add_control(
    'cf7_bg_color_normal',
    [
      'label' => esc_html__('Background color', 'orions'),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => $this->get_selector_array( $field_selector, 'background-color : {{VALUE}}' )
    ]
  );

	$this->end_controls_tab();

	// tab - end
	
	// tab - start

	$this->start_controls_tab(
        'cf7_Active',
        [
            'label' => esc_html__( 'Active', 'orions' ),
        ]
  );

  $this->add_control(
    'cf7_text_color_active',
    [
      'label' => esc_html__('Text color', 'orions'),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => $this->get_selector_array( $field_selector_focus, 'color : {{VALUE}}' )
    ]
  );

  $this->add_control(
    'cf7_bg_color_focus',
    [
      'label' => esc_html__('Background color', 'orions'),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => $this->get_selector_array( $field_selector_focus, 'background-color : {{VALUE}}' )
    ]
  );

	$this->add_group_control(
		\Elementor\Group_Control_Border::get_type(),
		[
			'name' => 'cf7_active_border',
			'selector' => implode( ',', $field_selector_focus )
		]
	);


	$this->end_controls_tab();

	// tab - end

	$this->end_controls_tabs();

	// tabs - end

	$this->end_controls_section();

	$this->start_controls_section(
        'cf7_placeholder_style',
        [
          'label' => esc_html__('Placeholder', 'orions'),
          'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]
    );
  /**
	$this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'cf7_placeholder_text',
            'label' => esc_html__('Typography', 'orions'),
            'selector' => implode( ',', $field_selector_placeholder ),
        ]
    );
  */ 
	$this->add_control(
        'cf7_placeholder_color',
        [
          'label' => esc_html__('Text color', 'orions'),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => $this->get_selector_array( $field_selector_placeholder, 'color : {{VALUE}}' )
        ]
    );

	$this->end_controls_section();

	    // button style -  start

    $this->start_controls_section(
        'button_custom_style',
        [
          'label' => esc_html__('Submit', 'orions'),
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
/**
    $this->add_responsive_control('button_align',
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
*/
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
            '{{WRAPPER}} .button' => 'color : {{VALUE}} !important;'
          ]
          
        ]
    );

	$this->add_group_control(
		\Elementor\Group_Control_Border::get_type(),
		[
			'name' => 'cf7_normal_button_border',
			'selector' => '{{WRAPPER}} .button'
		]
	);

    $this->add_control(
      'button_bg_color',
      [
        'label' => esc_html__('Background color', 'orions'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .button' => 'background-color : {{VALUE}}'
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
            '{{WRAPPER}} .button:hover' => 'color : {{VALUE}} !important;'
          ]
          
        ]
    );

	$this->add_group_control(
		\Elementor\Group_Control_Border::get_type(),
		[
			'name' => 'cf7_hover_button_border',
			'selector' => '{{WRAPPER}} .button:hover'
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

    $this->start_controls_section(
            'heading_style',
            [
                'label' => esc_html__('Heading', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        orions_heading_style_controls($this);

        $this->end_controls_section();

	}

  protected function get_contact_form_7_forms() {

    $args = array('post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1);

    $catlist=[];
   
    if ( $categories = get_posts( $args ) ){
      foreach ( $categories as $category ) {
        ( int ) $catlist[ $category->ID ] = $category->post_title;
      }
    }
    else {
      ( int ) $catlist[ '0' ] = esc_html__( 'No contact From 7 form found', 'orions' );
    }

   return $catlist;
 }


	protected function render() {			
		$settings = $this->get_settings();
  ?>
    <div class="contact-form drop-shadow-2">
      <div class="contact-form-wrapper">        
          <?php orions_heading($settings); ?>
        <?php 
          echo do_shortcode('[contact-form-7 id="'.$settings['cf7'].'"]'); 
          ?>
      </div>
    </div>	
  <?php
    }
}

