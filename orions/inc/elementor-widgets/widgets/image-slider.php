<?php

if (!defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly

class ImageSlider extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'orions_client_slider';
    }

    public function get_title()
    {
        return __('Image Slider', 'orions');
    }

    public function get_icon()
    {
        return 'eicon-photo-library';
    }

    public function get_categories()
    {
        return ['gfxpartner'];
    }

    protected function register_controls()
    {

        // slides - start

        $this->start_controls_section(
            'cs_content',
            [
                'label' => __('Slides', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'cs_image',
            [
                'label' => __('Choose Image', 'orions'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'cs_link',
            [
                'label' => __('Link', 'orions'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'orions'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $this->add_control(
            'cs_repeater',
            [
                'label' => __('Client slides', 'orions'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => __('Client', 'orions'),
            ]
        );

        $this->end_controls_section();

        // slides - end        

        // heading content - start

        $this->start_controls_section(
            'heading_content',
            [
                'label' => esc_html__('Heading', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        orions_heading_data_controls( $this );

        $this->end_controls_section();

        // heading content - end

        // heading content - start

        $this->start_controls_section(
            'bottom_heading_content',
            [
                'label' => esc_html__('Bottom Heading', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'b_heading_control',
            [
                'label' => esc_html__('Heading', 'orions'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '',
            ]
        );
        $this->add_control(
            'b_sub_heading_control',
            [
                'label' => esc_html__('Sub Heading', 'orions'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '',
            ]
        );
        $this->add_control(
            'b_sub_heading_control_line_icon',
            [
                'label' => esc_html__( 'Sub Heading icon', 'orions' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'la-user-circle',
                'options' => [
                    '' => esc_html__( 'Default', 'orions' ),
                    'la-user-circle' => esc_html__( 'User', 'orions' ),
                    'la-handshake' => esc_html__( 'Handshake', 'orions' ),
                    'la-cog' => esc_html__( 'Setting', 'orions' ),
                    'la-video' => esc_html__( 'Video Camera', 'orions' ),
                    'la-tags' => esc_html__( 'Tag', 'orions' ),
                    'la-comments' => esc_html__( 'Comments', 'orions' ),
                    'la-file-alt' => esc_html__( 'File', 'orions' ),
                    'la-tablet' => esc_html__( 'Tablet', 'orions' ),
                    'la-bullhorn' => esc_html__( 'Bullhorn', 'orions' ),
                    'la-cloud-download-alt' => esc_html__( 'Cloud Download', 'orions' ),
                    'la-envelope' => esc_html__( 'Envelope', 'orions' ),
                    'la-envelope-open' => esc_html__( 'Envelope Open', 'orions' ),
                    'la-envelope-open-text' => esc_html__( 'Envelope Text', 'orions' ),
                ],
            ]
        );
        $this->add_control(
            'b_sub_heading_control_icon',
            [
                'label' => __('Sub Heading icon', 'orions'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'la-user-circle',
                    'library' => 'solid',
                ],
            ]
        );

        $this->end_controls_section();

        // heading content - end
        // Play Button - start

        $this->start_controls_section(
            'p_button',
            [
                'label' => __('Play Button', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'button_text',
            [
            'label' => esc_html__('Text', 'orions'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Google Play'
            ]
        );
        $repeater->add_control(
            'button_sub_text',
            [
            'label' => esc_html__('Sub Text', 'orions'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'get it on'
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label' => esc_html__('Link', 'orions'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'orions'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            
            ]
        );

        $repeater->add_control(
          'button_icon',
          [
              'label' => __('Icon', 'orions'),
              'type' => \Elementor\Controls_Manager::ICONS
          ]
        );

        $repeater->add_control(
          'button_icon_css',
          [
              'label' => __('CSS Class', 'orions'),
              'type' => \Elementor\Controls_Manager::TEXT
          ]
        );  

        $this->add_control(
            'p_repeater',
            [
                'label' => __('Play Button', 'orions'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => __('Button', 'orions'),
            ]
        );

        $this->end_controls_section();

        // slides - end
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
        // heading style - start

        $this->start_controls_section(
            'heading_style',
            [
                'label' => esc_html__('Heading', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        orions_heading_style_controls( $this );

        $this->end_controls_section();

        // heading style - end
        // Bottom Heading - start
        $this->start_controls_section(
            'b_heading_style',
            [
                'label' => esc_html__('Bottom Heading', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'b_heading_preset_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );      
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'b_heading_type',
                'label' => esc_html__('Heading', 'orions'),
                'selector' => '{{WRAPPER}} .screen-section-bottom-wrapper h1',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'b_sub_heading_type',
                'label' => esc_html__('Sub Heading', 'orions'),
                'selector' => '{{WRAPPER}} .screen-section-bottom-wrapper h4',
            ]
        );
    
        $this->add_control(
            'b_heading_color',
            [
                'label' => esc_html__('Heading Color', 'orions'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .screen-section-bottom-wrapper h1' => 'color : {{VALUE}}'
                ],
            ]
        );
        $this->add_control(
            'b_sub_heading_color',
            [
                'label' => esc_html__('Sub Heading Color', 'orions'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .screen-section-bottom-wrapper h4' => 'color : {{VALUE}}'
                ],
            ]
        );
        $this->add_control(
            'b_icon_color',
            [
                'label' => esc_html__('Icon Color', 'orions'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .screen-section-bottom-wrapper h4 i' => 'color : {{VALUE}}'
                ],
            ]
        );
        $this->end_controls_section();
        // Bottom Heading - end
        
        // content style - start

        get_orions_client_styles( $this );

        // content style - end

        // slider nav - start

        //orions_slide_nav_styles( $this );

        // slider nav - end

        // slider nav - start

        //orions_slide_pagination_styles( $this );

        // slider nav - end

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $id = $this->get_id();
        $b_sub_icon = $settings['b_sub_heading_control_line_icon'];

        // options for the slider
        $options = orions_slider_options($settings, $id, 
            [
                'spaceBetween' => 30,
                'breakpoints' => [
                    '0' => [
                        'slidesPerView' => 1,
                        'centeredSlides' => true
                    ],
                    '500' => [
                        'slidesPerView' => 1.2,
                        'centeredSlides' => true
                    ],
                    //'992' => [
                    //    'slidesPerView' => $settings['rs_slides_per_view'],
                    //    'centeredSlides' => false
                    //]
                ]
            ]
        );

        // main class list
        $class_list = [
            'slider',
            'client-slider',
            'slider-' . $id,
        ];

        ?>
<div class="<?php echo esc_html(implode(' ', $class_list)); ?>">
    <div class="screen-section">
        <div class="screen-section-wrapper">
        <!-- header - start -->
        <?php
            get_template_part(
                '/inc/template-parts/elementor/slider',
                'header',
                array(
                    'settings' => $settings,
                    'id' => $id,
                )
            );
        ?>
        <!-- header - end -->
        <!-- slider - start -->
            <div class="screen-slider">
                <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php
                                if ( is_array( $settings['cs_repeater'] ) || is_object( $settings['cs_repeater'] ) ):
                                foreach ( $settings['cs_repeater'] as $item ):
                                $target = $item['cs_link']['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $item['cs_link']['nofollow'] ? ' rel="nofollow"' : '';
                            ?>
    	                            <!-- slide - start -->
    	                            <div class="swiper-slide">
                                        <div class="screen-slide">
                                            <figure>                                    

                                            <?php
                                                echo
                                                \Elementor\Group_Control_Image_Size::get_attachment_image_html(
                                                    $item,
                                                    'full',
                                                    'cs_image'
                                                );
                                            ?>                                    
                                            </figure>
                                    </div>
                                </div>
                                <!-- slide - end -->
                            <?php endforeach; endif; ?>
                        </div>
                </div>
            </div>
        <!-- slider - end -->
            <!--
            screen section bottom - start
            -->
            <div class="screen-section-bottom">
                <div class="screen-section-bottom-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-0 col-10 offset-1">
                                <h1 class="c-white"><?php echo esc_html($settings['b_heading_control']);?></h1>
                                <h4 class="c-white">
                                    <?php if($b_sub_icon != '') {?>
                                        <i class="las <?php echo wp_kses( $settings['b_sub_heading_control_line_icon'], 'elementor-general' ); ?>"></i>
                                    <?php } else {?>
                                        <i class="las <?php echo wp_kses( $settings['b_sub_heading_control_icon']['value'], 'elementor-general' ); ?>"></i>
                                    <?php }?>                                    
                                    <?php echo esc_html($settings['b_sub_heading_control']);?>
                                </h4>
                            </div>
                            <div class="col-lg-4 offset-lg-0 col-10 offset-1">
                                <div class="download-button-group download-button-1-group">
                                <?php
                                    if ( is_array( $settings['p_repeater'] ) || is_object( $settings['p_repeater'] ) ):
                                    foreach ( $settings['p_repeater'] as $item ):
                                    $target = $item['button_link']['is_external'] ? ' target="_blank"' : '';
                                    $nofollow = $item['button_link']['nofollow'] ? ' rel="nofollow"' : '';
                                    $url = !empty( $item['button_link']['url'] ) ? ' href='.esc_url( $item['button_link']['url'] ) : '';
                                    $icon_color = $item['button_icon']['value'];

                                    if ($icon_color == 'fab fa-apple') {
                                      $this->add_render_attribute('button_attr', 'class', 'download-button download-button-1 download-button-apple');
                                    } else {
                                    $this->add_render_attribute('button_attr', 'class', 'download-button download-button-1 download-button-google');
                                    }
                                    if ( $item['button_link']['is_external'] )
                                      $this->add_render_attribute('button_attr', 'target', '_blank');

                                    if ( $item['button_link']['nofollow'] )
                                      $this->add_render_attribute('button_attr', 'rel', 'nofollow');

                                    if ( !empty( $item['button_link']['url'] ) )
                                      $this->add_render_attribute('button_attr', 'href', $item['button_link']['url']);
                                ?>
                                    <a  <?php $this->print_render_attribute_string('button_attr');  ?>>
                                        <div class="download-button-inner">
                                            <div class="download-button-icon <?php echo esc_html( $item['button_icon_css'] ); ?>">
                                                <i class="<?php echo wp_kses( $item['button_icon']['value'], 'elementor-general' ); ?>"></i>
                                            </div>
                                            <div class="download-button-content">
                                                <h5 class="c-grey upper ls-1"><?php echo esc_html( $item['button_sub_text'] ); ?></h5>
                                                <h3 class="c-dark ls-2"><?php echo esc_html( $item['button_text'] ); ?></h3>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; endif; ?>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--
            screen section bottom - end
            -->       
        </div>    
        <div class="background-pattern background-pattern-2">
            <div class="background-pattern-img background-loop" style="background-image: url(<?php echo esc_url($settings['p_image']['url']);?>);"></div>
            <div class="background-pattern-gradient"></div>
            <div class="background-pattern-bottom">
                <div class="image" style="background-image: url(<?php echo esc_url($settings['b_p_image']['url']);?>);"></div>
            </div>
        </div>
    </div>
</div>
    <?php
orions_slider($id, $options);
    }
}
