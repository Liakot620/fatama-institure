<?php

    // redux opt_name
    if ( !class_exists( 'Redux' ) ) {
		$orions_opt = [];
		$orions_opt['prs_heading_txt'] = __( 'Other Projects', 'orions' );
		$orions_opt['brs_prev_icon'] = 'default-prev';
		$orions_opt['brs_next_icon'] = 'default-next';
	} else {
		global $orions_opt;
	}

    $display = true;
    if ( function_exists( 'get_field' ) ) {
        $display = get_field( 'display_related_projects' );
    }

    if ( ! $display ) return;

    $prev_icon = $orions_opt['prs_prev_icon'];
	$next_icon = $orions_opt['prs_next_icon'];

    
	if ( $orions_opt['meta_project_rs_nav_switch'] == '0' ) {
        $prev_icon = null;
		$next_icon = null;
	}

	if ( $orions_opt['meta_project_rs_nav_switch'] == '1' && empty( $orions_opt['prs_prev_icon'] ) ) {
		$prev_icon = 'default-prev';
	}

	if ( $orions_opt['meta_project_rs_nav_switch'] == '1' && empty( $orions_opt['prs_next_icon'] ) ) {
		$next_icon = 'default-next';
	}

    // id for the slider
    $id = 'related_project';

    // settings for the content
    $settings = [
        'r_heading_control' => $orions_opt['prs_heading_txt'],
        'r_heading_preset' => 'normal',
        'rs_prev_icon' => $prev_icon,
        'rs_next_icon' => $next_icon,
    ];
    // options for the slider
    $options = [
        'loop' => false,
        'speed' => 1000,
        'slidesPerView' => 2,
        'spaceBetween'=> 30,
        'resizeObserver' => true,
        'navigation' => [
            'nextEl' => '.slider-nav-' . $id  . ' .slider-nav-next',
            'prevEl' => '.slider-nav-' . $id  . ' .slider-nav-prev'
        ],
        'breakpoints' => [
            '0' => [
                'slidesPerView' => 1,
                'centeredSlides' => true,
                'initialSlide' => 1,
                'spaceBetween'=> 33,
            ],
            '992' => [
                'slidesPerView' => 2,
                'centeredSlides' => false
            ]
        ]
    ];

    // main class list
    $class_list = [
        'slider',
        'project-slider',
        'slider-'.$id
    ];

    $categories = get_the_category();

    $args = array(
        'posts_per_page' => 4,
        'post_type' => esc_attr('project'),
        'post_status'    => 'publish',
        'post__not_in' => [ $post->ID ],
		'ignore_sticky_posts' => 1,
		'cat' => !empty( $categories ) ? $categories[0]->term_id : null
    );
    
    $rp_query = new \WP_Query( $args );

    if ( ! $rp_query->have_posts() ) return;

?>

<div class="related-projects">
    <div class="related-projects-wrapper">
        <div class="container">
            <div class='<?php echo esc_html( implode(' ', $class_list) ); ?>'>
                <!-- header - start -->
                <?php
                    get_template_part( 
                        '/inc/template-parts/elementor/slider', 
                        'header',
                        array(
                            'settings' => $settings,
                            'id' => $id
                        )
                    );
                ?>
                <!-- header - end -->
                <!-- slider - start -->
                <div class='row'>
                    <div class='col-12'>
                        <div class='swiper-container overflow-visible'>
                            <div class='swiper-wrapper'>
                                <?php
                                    while ( $rp_query->have_posts() ) {
                                        $rp_query->the_post();

                                        echo wp_kses( '<div class="swiper-slide">', 'general' );
                                        get_template_part( 
                                            '/inc/template-parts/content', 
                                            'project'
                                        );
                                        echo wp_kses( '</div>', 'general' );
                                    } wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- slider - end -->
            </div>
        </div>
    </div>
</div>
<?php orions_slider( 'related_project', $options ); ?>