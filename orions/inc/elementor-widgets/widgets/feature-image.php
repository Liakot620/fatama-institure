<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class FeatureImage extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'orions_image';
    }

    public function get_title()
    {
        return esc_html__('Feature Image', 'orions');
    }

    public function get_icon()
    {
        return 'eicon-image';
    }

    public function get_categories()
    {
        return ['gfxpartner'];
    }

    protected function register_controls()
    {

        // content - start

        $this->start_controls_section(
            'f_image_content',
            [
                'label' => esc_html__('Image', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'f_image',
            [
                'label' => __( 'Choose 1st Image', 'orions' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'f2_image',
            [
                'label' => __( 'Choose 2nd Image', 'orions' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'f_b_image',
            [
                'label' => __( 'Choose Background Image', 'orions' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // content - end

        // style - start

        $this->start_controls_section(
            'f_image_style',
            [
                'label' => esc_html__('Style', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'f_image_extend_switch',
			[
				'label' => esc_html__( 'Extend Image', 'orions' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Left', 'orions' ),
				'label_off' => esc_html__( 'Right', 'orions' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);       


        $this->add_responsive_control(
			'f_image_height',
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
						'max' => 200,
					],
                    'rem' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
                    '{{WRAPPER}} .r-image-inner' => '--height-elementor: {{SIZE}}{{UNIT}};',
					// '{{WRAPPER}} .r-image-inner' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
		);

        $this->add_control(
			'f_image_ovelap',
			[
				'label' => esc_html__( 'Allow overlap', 'orions' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'orions' ),
				'label_off' => esc_html__( 'No', 'orions' ),
				'return_value' => 'overlap',
				'default' => 'no-overlap',
			]
		);

        $this->add_responsive_control(
			'f_image_border_radius',
			[
				'label' => esc_html__( 'Border radius', 'orions' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .pattern-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

        // style - end

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
    ?>
<?php if ( $settings['f2_image']['url'] != ''){?> 
    <?php if ( $settings['f_image_extend_switch'] == 'yes'){?>
        <div class="pattern-image feature-section-image">
            <img src="<?php echo esc_url($settings['f_image']['url'])?>" class="image" alt="image">
            <img src="<?php echo esc_url($settings['f2_image']['url'])?>" class="phone" alt="phone">
            <div class="background-pattern background-pattern-radius-reverse">
                <div class="background-pattern-img background-loop" style="background-image: url(<?php echo esc_url($settings['f_b_image']['url'])?>);"></div>
                <div class="background-pattern-gradient"></div>
            </div>
        </div>
    <?php } else {?>
        <div class="pattern-image feature-section-image">
            <img src="<?php echo esc_url($settings['f_image']['url'])?>" class="image" alt="image">
            <img src="<?php echo esc_url($settings['f2_image']['url'])?>" class="phone" alt="phone">
            <div class="background-pattern background-pattern-radius">
                <div class="background-pattern-img background-loop" style="background-image: url(<?php echo esc_url($settings['f_b_image']['url'])?>);"></div>
                <div class="background-pattern-gradient"></div>
            </div>
        </div> 
        <?php }?>
<?php } else { ?>
        <div class="about-section-image">
            <div class="pattern-image pattern-image-1">
                <div class="pattern-image-wrapper">
                    <img class="drop-shadow-1" src="<?php echo esc_url($settings['f_image']['url'])?>" alt="image">
                    <div class="background-pattern background-pattern-radius drop-shadow-1">
                        <div class="background-pattern-img background-loop" style="background-image: url(<?php echo esc_url($settings['f_b_image']['url'])?>);"></div>
                        <div class="background-pattern-gradient"></div>
                    </div>
                </div>
            </div>
        </div>
<?php }?>    
    <?php
    }
}
