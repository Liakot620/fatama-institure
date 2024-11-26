<?php


if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class OrionsSectionMod {
    public static function init() {
        add_action( 
            'elementor/element/section/section_layout/before_section_end', 
            [ __CLASS__, 'controls' ], 
            10, 
            2 
        );

        add_action( 
            'elementor/frontend/section/before_render', 
            [ __CLASS__, 'section_attribute' ]
        );

		add_action(
			'elementor/element/section/section_typo/after_section_end',
			[ __CLASS__, 'nav_style_controls' ],
			99,
			2
		);
		
    }

    public static function section_attribute( $instance ) {

        $settings = $instance->get_settings_for_display();

        // if ( $settings['orions_section_align'] == 'none' ) return;

		if ( !empty( $settings['orions_section_align'] ) ) {
			$instance->add_render_attribute(
				'_wrapper', 'class', [
					$settings['orions_section_align'] !==  'none' 
					? $settings['orions_section_align'] : 
					''
				]
			);
		}

		if ( get_post_type() == 'header' && !empty( $settings['orions_nav_sec_sticky'] ) ) {
			$instance->add_render_attribute(
				'_wrapper', 'class', [
					$settings['orions_nav_sec_sticky'] === 'sticky-nav' ? 
					$settings['orions_nav_sec_sticky'] : 
					''
				]
			);
		}
        
    }

    public static function controls( $instance, $args ) {

        $instance->add_control(
			'orions_section_heading',
			[
				'label' => esc_html__( 'ORIONS', 'orions' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $instance->add_control(
			'orions_section_align',
			[
				'label' => esc_html__( 'Align', 'orions' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
                    'none'          => esc_html__( 'None', 'orions' ),
					'r-left-align'  => esc_html__( 'Left', 'orions' ),
					'r-right-align' => esc_html__( 'Right', 'orions' ),
				],
			]
		);

		if ( get_post_type() == 'header' ) {

			$instance->add_control(
				'orions_nav_sec_sticky',
				[
					'label' => esc_html__( 'Sticky', 'orions' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'orions' ),
					'label_off' => esc_html__( 'Hide', 'orions' ),
					'return_value' => 'sticky-nav',
					'default' => 'not-sticky-nav',
				]
			);
		}
    }

	public static function nav_style_controls( $instance, $args ) {

		// if ( get_post_type() != 'header' ) return;

		$condition = [
			'orions_nav_sec_sticky' => 'sticky-nav'
		];

		$instance->start_controls_section(
			'orions_nav_style_sec',
			[
			  'label' => esc_html__('ORIONS', 'orions'),
			  'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			  'condition' => $condition
			]
		);

		$instance->start_controls_tabs( 'button_tabs' );

		$instance->start_controls_tab(
			'orions_nav_bg_tab_normal',
			[
				'label' => esc_html__( 'Normal', 'orions' ),
				'condition' => $condition
			]
		);

		$instance->add_control(
			'orions_nav_bg_normal',
			[
				'label' => esc_html__( 'Color', 'orions' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}' => 'background-color: {{VALUE}} !important',
				],
				'condition' => $condition
			]
		);

		$instance->add_control(
			'orions_section_height',
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
					'{{WRAPPER}} > .elementor-container' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => $condition
			]
		);

		$instance->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'orions_nav_bg_normal_border_type',
				'selector' => '{{WRAPPER}}',
				'condition' => $condition
			]
		);

		$instance->end_controls_tab();

		$instance->start_controls_tab(
			'orions_nav_bg_tab_sticky',
			[
				'label' => esc_html__( 'Sticky', 'orions' ),
				'condition' => $condition
			]
		);

		$instance->add_control(
			'orions_nav_bg_sticky',
			[
				'label' => esc_html__( 'Color', 'orions' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}.sticky-nav.scrolled' => 'background-color: {{VALUE}} !important',
				],
				'condition' => $condition
			]
		);

		$instance->add_control(
			'orions_section_height_sticky',
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
					'{{WRAPPER}}.sticky-nav.scrolled > .elementor-container' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => $condition
			]
		);

		$instance->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'orions_nav_bg_sticky_border_type',
				'selector' => '{{WRAPPER}}.sticky-nav.scrolled',
				'condition' => $condition
			]
		);

		$instance->end_controls_tab();

		$instance->end_controls_tabs();

		$instance->end_controls_section();

		// $settings = $instance->get_settings_for_display();
		// echo '<h1>'; print_r( $settings ); echo '</h1>';

	}
}

OrionsSectionMod::init();