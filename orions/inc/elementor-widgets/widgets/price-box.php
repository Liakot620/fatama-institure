<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class PriceBox extends \Elementor\Widget_Base

{

    public function get_name()
    {
        return 'orions_image_box';
    }

    public function get_title()
    {
        return esc_html__('Price Box', 'orions');
    }

    public function get_icon()
    {
        return 'eicon-heading';
    }

    public function get_categories()
    {
        return ['gfxpartner'];
    }

    protected function register_controls()
    {
        //Heading - Start
        $this->start_controls_section(
            'heading_content',
            [
                'label' => esc_html__('Heading', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        orions_heading_data_controls( $this );

        $this->end_controls_section();
        // Heading - End
        // content - start

        $this->start_controls_section(
            'image_box_content_section',
            [
                'label' => esc_html__('Content', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'price_switcher_1',
            [
                'label' => esc_html__( 'Price Switcher 1', 'orions' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Monthly',
            ]
        );

        $this->add_control(
            'price_switcher_2',
            [
                'label' => esc_html__( 'Price Switcher 2', 'orions' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Annual',
            ]
        );

        $repeater = new \Elementor\Repeater();        

        $repeater->add_control(
            'price_box_title',
            [
                'label' => esc_html__( 'Title', 'orions' ),
                'type' => \Elementor\Controls_Manager::TEXT,            
                'placeholder' => esc_html__( 'Type title here', 'orions' ),
            ]
        );

        $repeater->add_control(
            'p_title_color',
            [
              'label' => esc_html__('Color', 'orions'),
              'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );

        $repeater->add_control(
            'price_unit',
            [
                'label' => esc_html__( 'Price Unit', 'orions' ),
                'type' => \Elementor\Controls_Manager::TEXT,            
                'placeholder' => esc_html__( 'Type Price Unit', 'orions' ),
            ]
        );

        $repeater->add_control(
            'monthly_price',
            [
                'label' => esc_html__( 'Monthly Price', 'orions' ),
                'type' => \Elementor\Controls_Manager::TEXT,            
                'placeholder' => esc_html__( 'Type Monthly Price', 'orions' ),
            ]
        );

        $repeater->add_control(
            'annual_price',
            [
                'label' => esc_html__( 'Annual Price', 'orions' ),
                'type' => \Elementor\Controls_Manager::TEXT,            
                'placeholder' => esc_html__( 'Type Annual Price', 'orions' ),
            ]
        );
        $repeater->add_control(
            'price_box_content',
            [
                'label' => esc_html__( 'Content', 'orions' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,            
                'placeholder' => esc_html__( 'Type content here', 'orions' ),
            ]
        );

        $repeater->add_control(
            'price_box_link_text',
            [
                'label' => esc_html__( 'Link Text', 'orions' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type link text here', 'orions' ),
            ]
        );

        $repeater->add_control(
            'price_box_bg_color',
            [
                'label' => esc_html__( 'CSS Class', 'orions' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Button BackGround and Hover Color CSS', 'orions' ),
            ]
        );

        $repeater->add_control(
            'price_box_link',
            [
                'label' => esc_html__( 'Link', 'orions' ),
                'type' => \Elementor\Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'price_box_bottom_text',
            [
                'label' => esc_html__( 'Bottom Text', 'orions' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'image_box_repeater',
            [
              'label' => __( 'Boxes', 'orions' ),
              'type' => \Elementor\Controls_Manager::REPEATER,
              'fields' => $repeater->get_controls(),
              'title_field' => __ ( 'Price Box','orions' ),
            ]
        );

        $this->end_controls_section();

        // Banckground - Start
        $this->start_controls_section(
            'price_background_section',
            [
                'label' => esc_html__('Background', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'p_image',
            [
                'label' => __( 'Choose Pattern Image', 'orions' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'b_p_image',
            [
                'label' => __( 'Choose Bottom Image', 'orions' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();
        // Banckground - end
        // content - end
        // heading style - start

        $this->start_controls_section(
            'team_style_heading',
            [
                'label' => esc_html__('Heading', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        orions_heading_style_controls($this);

        $this->end_controls_section();

        // heading style - end

        // icon styles - start

        //orions_get_image_box_icon_styles( $this );

        // icon styles - end

        // heading styles - start
        $this->start_controls_section(
            'image_box_content_title_style',
            [
                'label' => esc_html__('Title', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'heading_style',
                'label' => esc_html__('Typography', 'orions'),
                'selector' => '{{WRAPPER}} .pricing-single h5',
            ]
        );

        $this->end_controls_section();
        
        //orions_get_image_box_title_styles( $this );

        // heading styles - end

        // content styles - start

        orions_get_image_box_content_styles( $this );

        // content styles - end

        // link styles - start

        orions_get_image_box_link_styles( $this );

        // link styles - end

        // reveal styles - start

        //orions_get_image_box_reveal_styles( $this );

        // reveal styles - end

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();        
    ?>
<div class="pricing-section">
    <div class="pricing-section-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
                    <?php orions_heading( $settings ); ?>
                </div>
            </div>
            <div class="pricing">
                <div class="row">
                    <div class="col">
                        <div class="switch">
                            <div class="form-check form-switch">
                                <label class="form-check-label" for="price-switch"><?php echo esc_html($settings['price_switcher_1']);?></label>
                                <input class="form-check-input" type="checkbox" id="price-switch" checked="checked">
                                <label class="form-check-label" for="price-switch"><?php echo esc_html($settings['price_switcher_2']);?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="pricing-slider">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <?php 
                                        if ( is_array( $settings['image_box_repeater'] ) || is_object( $settings['image_box_repeater'] ) ):
                                            foreach ( $settings['image_box_repeater'] as $item ):
                                    ?>
                                        <div class="swiper-slide">
                                            <?php
                                                get_template_part(
                                                    'inc/template-parts/elementor/price',
                                                    'box',
                                                    [ 'item' => $item ]
                                                );
                                            ?>
                                        </div>
                                    <?php
                                            endforeach;
                                        endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
        <div class="background-pattern background-pattern-1">
            <div class="background-pattern-img background-loop" style="background-image: url(<?php echo esc_url($settings['p_image']['url']);?>);"></div>
            <div class="background-pattern-gradient"></div>
            <div class="background-pattern-bottom">
                <div class="image" style="background-image: url(<?php echo esc_url($settings['b_p_image']['url']);?>)"></div>
            </div>
        </div>
    </div>
</div>
    <?php
    }
}
