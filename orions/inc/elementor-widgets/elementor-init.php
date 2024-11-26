<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Orions_Widgets_Loader {

  private static $_instance = null;

  public function __construct() {
    $this->init();
  }

  public static function instance() {
      if ( !isset( self::$_instance ) ) {
        self::$_instance = new self();
      }
      return self::$_instance;
  }

  public function init() {
    // require the elementor util file
    $this->require_util_files();

    // require mods
    $this->orions_elementor_mods();

    // register all theme widgets
    add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets'], 99);
    
    // add the category to the elementor dashboard
    add_action('elementor/init', [$this, 'elementor_widget_category']); 


    // enqueue custom styles for the elementor dashboard
    add_action( 'admin_enqueue_scripts', [ $this, 'orions_elementor_style' ], 999 );
    // add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'orions_elementor_style' ], 999 );
  }


  private function include_widgets_files(){
    require_once(get_template_directory() . '/inc/elementor-widgets/widgets/heading.php');
    require_once(get_template_directory() . '/inc/elementor-widgets/widgets/app-button.php');
    require_once(get_template_directory() . '/inc/elementor-widgets/widgets/button.php');
    require_once(get_template_directory() . '/inc/elementor-widgets/widgets/feature.php');
    require_once(get_template_directory() . '/inc/elementor-widgets/widgets/contact-box.php');
    require_once(get_template_directory() . '/inc/elementor-widgets/widgets/icon-box-alt.php');
    require_once(get_template_directory() . '/inc/elementor-widgets/widgets/icon-box.php');
	
	require_once(get_template_directory() . '/inc/elementor-widgets/widgets/video-btn.php');
	require_once(get_template_directory() . '/inc/elementor-widgets/widgets/feature-image.php');
    require_once(get_template_directory() . '/inc/elementor-widgets/widgets/price-box.php');
    require_once(get_template_directory() . '/inc/elementor-widgets/widgets/testimonial-slider.php');
    require_once(get_template_directory() . '/inc/elementor-widgets/widgets/accordion.php');
    require_once(get_template_directory() . '/inc/elementor-widgets/widgets/blog.php');
    require_once(get_template_directory() . '/inc/elementor-widgets/widgets/image-slider.php');
    require_once(get_template_directory() . '/inc/elementor-widgets/widgets/contact-form-7.php');
    require_once(get_template_directory() . '/inc/elementor-widgets/widgets/subscribe-form.php');
    require_once(get_template_directory() . '/inc/elementor-widgets/widgets/team.php');
    require_once(get_template_directory() . '/inc/elementor-widgets/widgets/social-slider.php');
    //require_once(get_template_directory() . '/inc/elementor-widgets/widgets/background.php');
    require_once(get_template_directory() . '/inc/elementor-widgets/widgets/tabs.php');
    require_once(get_template_directory() . '/inc/elementor-widgets/widgets/menu.php');
    
  }

  public function register_widgets(){
    $this->include_widgets_files();

    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Heading());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \AppButton());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Button());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Feature());  
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \ContactBox());   
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \IconBoxAlt());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \IconBox());
	//\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \MenuList());
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \VideoBtn());
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \FeatureImage());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \PriceBox());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \TestimonialSlider());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Accordion());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Blog());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \ImageSlider());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \ContactForm7());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \SubscribeForm());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Team());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \SocialSlider());
    //\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \background());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Tabs());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \MenuList());
  }

  public function elementor_widget_category($widgets_manager){
    \Elementor\Plugin::$instance->elements_manager->add_category(
        'gfxpartner',
        [
            'title' => esc_html__( 'gfxpartner', 'orions' ),
            'icon' => 'fa fa-plug',
        ],
        1
    );
  }

  public function orions_elementor_style() {
    wp_enqueue_style('orions-elementor-styles', get_template_directory_uri().'/inc/assets/css/elementor_style.css', array(), false, false);
  }

  private function require_util_files() {
    require_once( __DIR__ . '/elementor-util.php' );
    require_once( __DIR__ . '/widget-util/tabs.php' );
    require_once( __DIR__ . '/widget-util/projects.php' );
    require_once( __DIR__ . '/widget-util/testimonial.php' );
    require_once( __DIR__ . '/widget-util/blog.php' );
    require_once( __DIR__ . '/widget-util/clients.php' );
    require_once( __DIR__ . '/widget-util/icon.php' );
    require_once( __DIR__ . '/widget-util/image-box.php' );
    require_once( __DIR__ . '/widget-util/contact-box.php' );
    //require_once( __DIR__ . '/widget-util/hamburger.php' );
  }

  public function orions_elementor_mods() {
    require_once(get_template_directory() . '/inc/elementor-widgets/mods/section.php');
    require_once(get_template_directory() . '/inc/elementor-widgets/mods/image.php');
  }

}

Orions_Widgets_Loader::instance();