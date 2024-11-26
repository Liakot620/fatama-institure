<?php


if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class OrionsImageMod {
    public static function init() {
        add_action( 
            'elementor/element/image/section_style_image/after_section_end', 
            [ __CLASS__, 'controls' ], 
            10, 
            2 
        );
    }

    public static function controls( $instance, $args ) {

        $instance->start_controls_section(
            'orions_image_styles',
            [
                'label' => esc_html__('ORIONS: Styles', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $instance->add_responsive_control(
			'orions_image_height',
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
						'max' => 200,
					],
                    'rem' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .elementor-widget-container' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $instance->add_responsive_control(
			'orions_image_object',
			[
				'label' => esc_html__( 'Object fit', 'orions' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'initial',
				'options' => [
					'initial'  => esc_html__( 'default', 'orions' ),
					'cover' => esc_html__( 'cover', 'orions' ),
					'contain' => esc_html__( 'contain', 'orions' ),
					'fill' => esc_html__( 'fill', 'orions' ),
					'none' => esc_html__( 'none', 'orions' ),
				],
                'selectors' => [
                    '{{WRAPPER}} img' => 'object-fit: {{VALUE}};',
				],
			]
		);

        $instance->add_responsive_control(
			'orions_image_object_position',
			[
				'label' => esc_html__( 'Object position', 'orions' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'initial',
				'options' => [
					'initial'  => esc_html__( 'default', 'orions' ),
					'top' => esc_html__( 'top', 'orions' ),
					'center' => esc_html__( 'center', 'orions' ),
					'bottom' => esc_html__( 'bottom', 'orions' ),
				],
                'selectors' => [
                    '{{WRAPPER}} img' => 'object-position: {{VALUE}};',
				],
			]
		);

        $instance->end_controls_section();

    }


}

OrionsImageMod::init();