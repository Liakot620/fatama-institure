<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class ContactBox extends \Elementor\Widget_Base

{

    public function get_name()
    {
        return 'orions_contacte_box';
    }

    public function get_title()
    {
        return esc_html__('Contact Box', 'orions');
    }

    public function get_icon()
    {
        return 'eicon-map-pin';
    }

    public function get_categories()
    {
        return ['gfxpartner'];
    }

    protected function register_controls()
    {

        // content - start

        $this->start_controls_section(
            'image_box_content_section',
            [
                'label' => esc_html__('Content', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'column_count',
            [
                'label' => esc_html__( 'Columns', 'orions' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'col-lg-4',
                'options' => [
                    'col-lg-6' => esc_html__( '2 Columns', 'orions' ),
                    'col-lg-4' => esc_html__( '3 Columns', 'orions' ),
                    'col-lg-3' => esc_html__( '4 Columns', 'orions' ),
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image_box_title',
            [
                'label' => esc_html__( 'Title', 'orions' ),
                'type' => \Elementor\Controls_Manager::TEXT,            
                'placeholder' => esc_html__( 'Type title here', 'orions' ),
            ]
        );

        $repeater->add_control(
            'image_box_content',
            [
                'label' => esc_html__( 'Content', 'orions' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,            
                'placeholder' => esc_html__( 'Type content here', 'orions' ),
            ]
        );
        $repeater->add_control(
            'r_box_icon',
            [
                'label' => esc_html__( 'Box icon', 'orions' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'la-user-circle',
                'options' => [
                       '' => esc_html__( 'Blank', 'orions' ),
                       'la-user-circle' => esc_html__( 'User', 'orions' ),
                       'la-user-lock' => esc_html__( 'User Lock', 'orions' ),
                       'la-phone-volume' => esc_html__('Phone', 'orions'),
                       'la-handshake' => esc_html__( 'Handshake', 'orions' ),
                       'la-headset' => esc_html__('Headset', 'orions'),
                       'la-cog' => esc_html__( 'Setting', 'orions' ),
                       'la-video' => esc_html__( 'Video Camera', 'orions' ),
                       'la-photo-video' => esc_html__('Photo Video', 'orions'),
                       'la-tags' => esc_html__( 'Tag', 'orions' ),
                       'la-comments' => esc_html__( 'Comments', 'orions' ),
                       'la-file-alt' => esc_html__( 'File', 'orions' ),
                       'la-tablet' => esc_html__( 'Tablet', 'orions' ),
                       'la-bullhorn' => esc_html__( 'Bullhorn', 'orions' ),
                       'la-cloud-download-alt' => esc_html__( 'Cloud Download', 'orions' ),
                       'la-envelope' => esc_html__( 'Envelope', 'orions' ),
                       'la-envelope-open' => esc_html__( 'Envelope Open', 'orions' ),
                       'la-envelope-open-text' => esc_html__( 'Envelope Text', 'orions' ),
                       'la-map-marked-alt' => esc_html__( 'Marked Map', 'orions' ),
                       'la-server' => esc_html__( 'Server', 'orions' ),
                    ],
                'description' => ' Select Black (If you Want to Choose Icon from bellow Icon Library)'
            ]
        );

        $repeater->add_control(
            'image_box_icon',
            [
                'label' => __('Icon', 'orions'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'la-user-circle',
                    'library' => 'solid',
                ],
                'description' => 'Select Black in Box Icon(If you Want to Choose Icon Here)'
            ]
        );

        

        $repeater->add_control(
            'image_box_link_text',
            [
                'label' => esc_html__( 'Link Text', 'orions' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type link text here', 'orions' ),
            ]
        );

        $repeater->add_control(
            'image_box_link',
            [
                'label' => esc_html__( 'Link', 'orions' ),
                'type' => \Elementor\Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'image_box_repeater',
            [
              'label' => __( 'Boxes', 'orions' ),
              'type' => \Elementor\Controls_Manager::REPEATER,
              'fields' => $repeater->get_controls(),
              'title_field' => __ ( 'Box','orions' ),
            ]
        );

        $this->end_controls_section();

        // content - end

        // icon styles - start

        orions_get_contact_box_icon_styles( $this );

        // icon styles - end

        // heading styles - start

        orions_get_contact_box_title_styles( $this );

        // heading styles - end

        // content styles - start

        orions_get_contact_box_content_styles( $this );

        // content styles - end       

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $columns = 'col-lg-4';
        if ( ! empty( $settings['column_count'] ) )
            $columns = $settings['column_count'];
    ?>
    
        <div class="row gx-5 details-row">
            <?php 
                if ( is_array( $settings['image_box_repeater'] ) || is_object( $settings['image_box_repeater'] ) ):
                    foreach ( $settings['image_box_repeater'] as $item ):
            ?>
                <div class="<?php echo esc_attr( $columns ); ?> offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
                    <?php
                        get_template_part(
                            'inc/template-parts/elementor/contact',
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
    
    <?php
    }
}
