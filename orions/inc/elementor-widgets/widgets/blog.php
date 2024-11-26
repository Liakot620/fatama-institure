<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Blog extends \Elementor\Widget_Base{

    public function get_name(){
        return 'orions_blog';
    }
 
    public function get_title(){
        return __( 'Blog', 'orions' );
    }

    public function get_icon(){
        return 'eicon-post-list';
    }

    public function get_categories(){
        return ['gfxpartner'];
    }

    protected function register_controls() {

    // post options - start

    $this->start_controls_section(
        'blog_section',
        [
            'label' => __( 'Post Options', 'orions' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'orions_blog_column',
        [
            'label' => __( 'Columns', 'orions' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'col-lg-4',
            'options' => [
                'col-lg-6'  => __( '2', 'orions' ),
                'col-lg-4' => __( '3', 'orions' )
            ],
        ]
    );

    $this->add_control(
        'orions_posts_number',
        [
            'label' => __( 'Posts per page', 'orions' ),
            'type'  => \Elementor\Controls_Manager::NUMBER,
            'min'			=> -1,
            'default' => 3
        ]
    );

    $this->add_control(
        'orions_posts_order',
        [
            'label' => __( 'Order posts', 'orions' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'DESC' => 'descending',
                'ASC' => 'ascending',
            ],
            'default' => 'DESC',
        ]
    );

    $this->add_control(
        'orions_posts_sort',
        [
            'label' => __( 'Sorting posts by', 'orions' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'date' => 'date',
                'modified' => 'last modified date',
                'rand' => 'Random',
                'title' => 'title',
                'comment_count' => 'number of comments',
            ],
            'default' => 'date',
        ]
    );    

    $this->add_control(
        'show_pagination',
        [
            'label' => __( 'Show pagination', 'orions' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'orions' ),
            'label_off' => __( 'Hide', 'orions' ),
            'return_value' => 'yes',
            'default' => 'no',
        ]
    );

    $this->add_control(
        'custom_date_format',
        [
            'label' => __( 'Custom date format', 'orions' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'orions' ),
            'label_off' => __( 'No', 'orions' ),
            'return_value' => 'custom',
            'default' => 'custom',
        ]
    );

    $this->add_control(
        'custom_hover_format',
        [
            'label' => __( 'Hover Option', 'orions' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'blog-single-1' => 'Hover With Color',
                'b_hover_y' => 'Hover Without Color',
            ],
            'default' => 'blog-single-1',
        ]
    );    

    $this->end_controls_section();

    // post options - end

    // title - start

    orions_get_blog_title_styles( $this );

    // title - end

    // date - start

    //orions_get_blog_date_styles( $this );

    // date - end

    // author - start

    //orions_get_blog_author_styles( $this );

    // author - end

    // pagination - start

    orions_get_blog_pagination_styles( $this );

    // pagination - end
  
  }
  

  protected function render(){
    $settings = $this->get_settings_for_display();
    $id = $this->get_id();

    $paged = orions_get_page_query();
    
    $args = array(
      'posts_per_page' => esc_attr($settings['orions_posts_number']),
      'orderby'     => esc_attr($settings['orions_posts_sort']),
      'order'       => esc_attr($settings['orions_posts_order']),      
      'post_type' => esc_attr('post'),
      'paged' => $paged,
      'post_status'    => 'publish'
    );
      
    $query = new \WP_Query( $args );
    

  ?>
    <div class="blog-list">
        <div class="row gx-5 gy-5">
            <?php 
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        ?>
                        <div class="<?php echo esc_attr( $settings['orions_blog_column'] ); ?> offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
                            <div class="blog-single <?php echo esc_attr( $settings['custom_hover_format'] ); ?>">
                            <?php
                                get_template_part( 
                                    '/inc/template-parts/content', 
                                    'post',
                                    [
                                        'date_format' => $settings['custom_date_format'],
                                        //'hover_format' => $settings['custom_hover_format'],
                                    ]
                                );
                            ?>
                            </div>
                        </div>
                        <?php
                    } wp_reset_postdata();
                }
            ?>
        </div>
        <?php 
            if ( $settings['show_pagination'] == 'yes' ) {
                orions_paginate( $query, '<div class="row"><div class="col">', '</div></div>' );
            }
        ?>
    </div>
  <?php
  }
}

