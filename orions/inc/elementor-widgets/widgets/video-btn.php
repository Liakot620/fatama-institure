<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class VideoBtn extends \Elementor\Widget_Base {

  public function get_name(){
    return 'orions_video_btn';
  }

  public function get_title() {
    return esc_html__('Video Button', 'orions');
  }

  public function get_icon() {
    return 'eicon-button';
  }

  public function get_categories(){
    return ['gfxpartner'];
  }

  protected function register_controls(){

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

    // button content -  start

    $this->start_controls_section(
      'video_button_content',
      [
        'label' => esc_html__('Right Image', 'orions'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT
      ]
    );

    $this->add_control(
        'video_button_link',
        [
            'label' => esc_html__('Video Button Link', 'orions'),
            'type' => \Elementor\Controls_Manager::URL,
        
        ]
    );

    $this->add_control(
        'video_image',
        [
            'label' => __( 'Choose Image', 'orions' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
    );
    $this->add_control(
        'video_button_extend_type',
        [
            'label' => esc_html__( 'Extend Side', 'orions' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'left',
            'options' => [
                'left'  => esc_html__( 'Left', 'orions' ),
                'right' => esc_html__( 'Right', 'orions' )
            ],
            'condition' => [
               'r_image_extend_switch' => 'yes'
            ]
        ]
    );

    $this->end_controls_section();
    // button content -  end
    // Button Content - start
    $this->start_controls_section(
      'button_content',
      [
        'label' => esc_html__('Button Content', 'orions'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT
      ]
    );


    $this->add_control(
        'button_text',
        [
        'label' => esc_html__('Text', 'orions'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'Get Started'
        ]
    );    

    $this->add_control(
        'button_link',
        [
            'label' => esc_html__('Link', 'orions'),
            'type' => \Elementor\Controls_Manager::URL,
        
        ]
    );
    
    $this->add_control(
      'box_shadow',
      [
        'label' => esc_html__( 'Show Box Shadow', 'orions' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__( 'Show', 'orions' ),
        'label_off' => esc_html__( 'Hide', 'orions' ),
        'return_value' => 'yes',
        'default' => 'yes',
      ]
    );      

    $this->end_controls_section();
    // Button Content - end
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

    $this->end_controls_section();
    // Banckground - end    
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
  
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();

   // $target = $settings['video_button_link']['is_external'] ? ' target="_blank"' : '';
    //$nofollow = $settings['video_button_link']['nofollow'] ? ' rel="nofollow"' : '';
    // Video Url
    $url = !empty( $settings['video_button_link']['url'] ) ? ' href='.esc_url( $settings['video_button_link']['url'] ) : '';  

    // Button - start
    $target = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
    $nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';
    $url = !empty( $settings['button_link']['url'] ) ? ' href='.esc_url( $settings['button_link']['url'] ) : '';  

    if ( $settings['box_shadow'] == 'yes'){
      $this->add_render_attribute('button_attr', 'class', 'button button-1');
    } else {
      $this->add_render_attribute('button_attr', 'class', 'button button-2');
    }
    
    
    if ( $settings['button_link']['is_external'] )
      $this->add_render_attribute('button_attr', 'target', '_blank');

    if ( $settings['button_link']['nofollow'] )
      $this->add_render_attribute('button_attr', 'rel', 'nofollow');

    if ( !empty( $settings['button_link']['url'] ) )
      $this->add_render_attribute('button_attr', 'href', $settings['button_link']['url']);
    // Button - end

    
    $this->add_render_attribute('button_attrs', 'class', 'glightbox');
   
	  
    if ( !empty( $settings['video_button_link']['url'] ) )
      $this->add_render_attribute('button_attrs', 'href', $settings['video_button_link']['url']);
    
  ?>
  <div class="video-section">
    <div class="video-section-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 offset-lg-1 order-lg-1 col-10 offset-1 order-2">
            <div class="video-section-content">
              <?php orions_heading( $settings ); ?>
              <a <?php $this->print_render_attribute_string('button_attr');  ?>>
                <div class="button-inner">
                  <div class="button-content">
                    <h4><?php echo esc_html( $settings['button_text'] ); ?></h4>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-5 offset-lg-1 order-lg-2 order-1">
            <div class="video-section-video">
                <figure>
                <?php 
                    echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( 
                    $settings, 
                    'full', 
                    'video_image' 
                    ); 
                ?>
                    <div class="play">
                        <a <?php $this->print_render_attribute_string('button_attrs');  ?>>
                            <i class="la la-play"></i>
                         </a>
                    </div>
                </figure>
            </div>
          </div>
        </div>
        <div class="background-pattern background-pattern-radius drop-shadow-1">
          <div class="background-pattern-img background-loop" style="background-image: url(<?php echo esc_url($settings['p_image']['url']);?>);"></div>
          <div class="background-pattern-gradient"></div>
        </div>
      </div>
    </div>
  </div>
                            
    <?php
  }
}
