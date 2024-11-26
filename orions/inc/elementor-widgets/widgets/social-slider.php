<?php

if (!defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly

class SocialSlider extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'orions_insta_slider';
    }

    public function get_title()
    {
        return __('Social Slider', 'orions');
    }

    public function get_icon()
    {
        return 'eicon-social-icons';
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

        $this->add_control(
            'cs_repeater',
            [
                'label' => __('Social slides', 'orions'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => __('Image', 'orions'),
            ]
        );

        $this->end_controls_section();

        // slides - end 

        // heading content - start

        $this->start_controls_section(
            'insta_heading_content',
            [
                'label' => esc_html__('Heading', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'b_heading_control',
            [
                'label' => esc_html__('Social Heading', 'orions'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '',
            ]
        );

        $this->add_control(
            'b_heading_icon',
            [
                'label' => esc_html__('Icon Class', 'orions'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'fa-instagram',
                'description' => 'Please Choose icon Class from "Font Awesome Icon"',
            ]
        );

        $this->add_control(
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

        $this->end_controls_section();

        // heading content - end 
        
        // Social Heading Style- start
        $this->start_controls_section(
            'b_heading_style',
            [
                'label' => esc_html__('Heading', 'orions'),
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
                'selector' => '{{WRAPPER}} .button-premium .button-content h4',
            ]
        );        
    
        $this->add_control(
            'b_heading_color',
            [
                'label' => esc_html__('Heading Color', 'orions'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-premium .button-content h4' => 'color : {{VALUE}}'
                ],
            ]
        );
        
        $this->add_control(
            'b_icon_color',
            [
                'label' => esc_html__('Icon Color', 'orions'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-premium .button-content i' => 'color : {{VALUE}}'
                ],
            ]
        );
        $this->add_control(
            'bg_color',
            [
                'label' => esc_html__('Background Color', 'orions'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .instagram .button-premium .button-inner::after' => 'background-color : {{VALUE}}'
                ],
            ]
        );

        $this->end_controls_section();
        // Bottom Heading Style - end
        
        // content style - start

        //get_orions_client_styles( $this );

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
        //$b_sub_icon = $settings['b_sub_heading_control_line_icon'];

        // options for the slider        

        // main class list
        $class_list = [
            'slider',
            'client-slider',
            'slider-' . $id,
        ];

        ?>
<div class="<?php echo esc_html(implode(' ', $class_list)); ?>">
    <div class="instagram">
        <div class="instagram-wrapper">       
        <!-- slider - start -->
            <div class="instagram-slider">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                            <?php
                                if ( is_array( $settings['cs_repeater'] ) || is_object( $settings['cs_repeater'] ) ):
                                foreach ( $settings['cs_repeater'] as $item ):
                                //$target = $item['cs_link']['is_external'] ? ' target="_blank"' : '';
                                //$nofollow = $item['cs_link']['nofollow'] ? ' rel="nofollow"' : '';
                            ?>
    	                            <!-- slide - start -->
    	                            <div class="swiper-slide">
                                        <div class="instagram-slide"> 
                                            <?php
                                                echo
                                                \Elementor\Group_Control_Image_Size::get_attachment_image_html(
                                                    $item,
                                                    'full',
                                                    'cs_image'
                                                );
                                            ?>
                                        </div> 
                                    </div>
                                <!-- slide - end -->
                            <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
        <!-- slider - end -->                   
        </div>
        <?php
            $target = $settings['cs_link']['is_external'] ? ' target="_blank"' : '';
            $nofollow = $settings['cs_link']['nofollow'] ? ' rel="nofollow"' : '';
            $url = !empty( $settings['cs_link']['url'] ) ? ' href='.esc_url( $settings['cs_link']['url'] ) : '';
            $this->add_render_attribute('button_attr', 'class', 'button button-premium');
            if ( !empty( $settings['cs_link']['url'] ) )
            $this->add_render_attribute('button_attr', 'href', $settings['cs_link']['url']);
        ?>   
        <div class="button-wrapper">
            <a <?php $this->print_render_attribute_string('button_attr');  ?>>
                <div class="button-inner">
                    <div class="button-content">
                        <i class="fab <?php echo esc_html($settings['b_heading_icon']);?>"></i>
                         <h4><?php echo esc_html($settings['b_heading_control']);?></h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
    <?php
//orions_slider($id, $options);
    }
}
