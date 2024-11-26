<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class IconBoxAlt extends \Elementor\Widget_Base {

  public function get_name(){
    return 'orions_icon_box_alt';
  }

  public function get_title() {
    return esc_html__('Icon Box Alt', 'orions');
  }

  public function get_icon() {
    return 'eicon-icon-box';
  }

  public function get_categories(){
    return ['gfxpartner'];
  }

  protected function register_controls(){

    // content -  start

    $this->start_controls_section(
        'content',
        [
            'label' => esc_html__('Content', 'orions'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT
        ]
    );


    $this->add_control(
        'content_box_sub_text',
        [
            'label' => esc_html__( 'Title Text', 'orions' ),
            'type' => \Elementor\Controls_Manager::TEXT,
        ]
    );
    $this->add_control(
      'content_box_main_text',
      [
        'label' => esc_html__( 'Content Text', 'orions' ),
        'type' => \Elementor\Controls_Manager::CODE,
        'language' => 'html',
        'rows' => 20,
      ]
    );

    $this->add_control(
        'r_box_icon',
        [
            'label' => esc_html__( 'Sub Heading icon', 'orions' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'la-user-circle',
            'options' => [
                   '' => esc_html__( 'Default', 'orions' ),
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
            ]
        );

    $this->add_control(
        'content_box_icon',
        [
            'label' => __('Icon', 'orions'),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                    'value' => 'la-user-circle',
                    'library' => 'solid',
                ]
                
        ]
    );

    $this->add_control(
        'link',
        [
            'label' => esc_html__('Link', 'orions'),
            'type' => \Elementor\Controls_Manager::URL,
        
        ]
    );

    $this->end_controls_section();

    // content -  end

    // style -  start

    $this->start_controls_section(
        'style',
        [
          'label' => esc_html__('Style', 'orions'),
          'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]
    );

    $this->add_control(
      'icon_color',
      [
        'label' => esc_html__('Icon color', 'orions'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .icon-box-alt .icon' => 'color : {{VALUE}} !important; fill : {{VALUE}} !important;'
        ]
        
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
          'name' => 'sub_heading_text',
          'label' => esc_html__('Secondary heading typography', 'orions'),
          'selector' => '{{WRAPPER}} .icon-box-alt .sub',
      ]
    );

    $this->add_control(
      'sub_heading_color',
      [
        'label' => esc_html__('Secondary heading color', 'orions'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .icon-box-alt .sub' => 'color : {{VALUE}};'
        ]
        
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
          'name' => 'primary_heading_text',
          'label' => esc_html__('Primary heading typography', 'orions'),
          'selector' => '{{WRAPPER}} .icon-box-alt .main',
      ]
    );

    $this->add_control(
      'primary_heading_color',
      [
        'label' => esc_html__('Primary heading color', 'orions'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .icon-box-alt .main' => 'color : {{VALUE}};'
        ]
        
      ]
    );

    $this->end_controls_section();

    // style -  end
  
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();

    if ( $settings['link']['is_external'] )
      $this->add_render_attribute('link_attr', 'target', '_blank');

    if ( $settings['link']['nofollow'] )
      $this->add_render_attribute('link_attr', 'rel', 'nofollow');

    if ( !empty( $settings['link']['url'] ) )
      $this->add_render_attribute('link_attr', 'href', $settings['link']['url']);
    $box_icon = $settings['r_box_icon'];    

  ?>
    <?php if ( ! empty( $settings['link'] ) ): ?>
        <a <?php $this->print_render_attribute_string('link_attr');  ?>>
    <?php endif; ?>
    <div class="app-feature-single app-feature-single-1">
      <div class="app-feature-single-wrapper">
        <?php if($box_icon != '') {?>
        <div class="icon">
          <i class="las <?php echo wp_kses( $settings['r_box_icon'], 'elementor-general' ); ?>"></i>
        </div>
        <?php } else { ?>
        <div class="icon">
         <i class="las <?php echo wp_kses( $settings['content_box_icon']['value'], 'elementor-general' ); ?>"></i>
        </div>
        <?php }?>
        <h3 class="c-dark"><?php echo esc_html($settings['content_box_sub_text']); ?></h3>
        <?php echo esc_html($settings['content_box_main_text']); ?>
        
      </div>
    </div>    
    <?php if ( ! empty( $settings['link'] ) ): ?>
        </a>
    <?php endif; ?>
    <?php
  }
}
