<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class TestimonialSlider extends \Elementor\Widget_Base {

    public function get_name() {
        return 'orions_testimonial_slider';
    }

    public function get_title() {
        return esc_html__('Testimonials', 'orions');
    }

    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return ['gfxpartner'];
    }

    protected function register_controls() {

    // content - start

    $this->start_controls_section(
        'testimonial_content',
        [
            'label' => esc_html__('Content', 'orions'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT
        ]
    );

    $repeater = new \Elementor\Repeater();

    $repeater->add_control(
        'testimonial_slide_image',
        [
            'label' => __( 'Choose Image', 'orions' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
    );

    $repeater->add_control(
        'testimonial_slide_content',
        [
            'label' => esc_html__( 'Testimonial', 'orions' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'rows' => 10,
            'placeholder' => esc_html__( 'Type your testimonial here', 'orions' ),
        ]
    );

    $repeater->add_control(
        'testimonial_slide_name',
        [
            'label' => esc_html__( 'Name', 'orions' ),
            'type' => \Elementor\Controls_Manager::TEXT,            
            'placeholder' => esc_html__( 'Type your name here', 'orions' ),
        ]
    );
    
    $this->add_control(
      'testimonial_slides_repeater',
      [
        'label' => __( 'Image slides', 'orions' ),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'title_field' => __ ( 'Slide','orions' ),
      ]
    );

    $this->end_controls_section();

    // content - end
   
    // testimony style - start

    orions_get_testiomonial_testimony_styles( $this );

    // testimony style - end

    // name style - start

    orions_get_testiomonial_name_styles( $this );

    // name style - end  
    
    // slider nav - start

    orions_slide_nav_styles( $this );

    // slider nav - end

    // slider nav - start

    orions_slide_pagination_styles( $this );

    // slider nav - end
    
  }

    private function the_testimonial( $item, $pre_tag = '', $post_tag = '' ) {
        if ( !empty( $pre_tag ) ) echo wp_kses( $pre_tag, 'general' );
    ?>
        <div class="testimonial-slide">
            <div class="image">
                <div class="image-wrapper">
                    <div class="image-inner">
                    <?php 
                        echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( 
                            $item, 
                            'full', 
                            'testimonial_slide_image' 
                        ); 
                    ?>
                    </div>
                </div>
            </div>
            <div class="content">
                <p>“<?php echo esc_html( $item['testimonial_slide_content'] ) ?>”</p>
                <h5><?php echo esc_html( $item['testimonial_slide_name'] ) ?></h5>
            </div>
        </div>
    <?php
        if ( !empty( $post_tag ) ) echo wp_kses( $post_tag, 'general' );
    }

    private function all_the_testimonials( $pre_tag = '', $post_tag = '' ) {
        $settings = $this->get_settings_for_display();

        if ( is_array( $settings['testimonial_slides_repeater'] ) || is_object( $settings['testimonial_slides_repeater'] ) ) {
            foreach ( $settings['testimonial_slides_repeater'] as $item ) {
                $this->the_testimonial( $item, $pre_tag, $post_tag );
            }
        }
    }
  
    private function the_testimonial_slider() {
        $settings = $this->get_settings_for_display();
        $id = $this->get_id();

        // options for the slider
        $options = orions_slider_options( $settings, $id, [
            'spaceBetween' => 30,
            'breakpoints' => [
                '0' => [
                    'slidesPerView' => 1,
                    'centeredSlides' => true,
                    'spaceBetween' => 15,
                ],
                '500' => [
                    'slidesPerView' => 1,
                    'centeredSlides' => true,
                    'spaceBetween' => 30,
                ],
                '758' => [
                    'slidesPerView' => 1.9,
                    'centeredSlides' => true
                ],
                
            ]
        ] );

        // main class list
        $class_list = [
            'slider-'.$id
        ];

    ?>
               
            <!-- slider - start -->
            <div class="container">
                <div class="row">
                    <div class="testimonial-slider">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?php $this->all_the_testimonials( '<div class="swiper-slide">', '</div>' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- slider - end --> 
        <?php
            //orions_slider($id, $options);
    }
   
    protected function render() {
        $settings = $this->get_settings_for_display(); 
        $this->the_testimonial_slider();
    }

}
