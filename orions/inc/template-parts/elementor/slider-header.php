<?php

    require_once( get_template_directory() . '/inc/template-tags.php' );

    $settings = $args['settings'];
    $id = $args['id'];

    //$prev_icon = $settings['rs_prev_icon'];
    //$next_icon = $settings['rs_next_icon'];

    $pagination_class = [
        'col-lg-4', 
        'offset-lg-0',
        'col-10',
        'offset-1'
    ];

    if ( empty( $settings['r_heading_control'] ) )
        array_push( $pagination_class, 'col-lg-8 offset-lg-0 col-10 offset-1' )

?>

<div class="container">
    <div class="row">
        <?php if ( !empty( $settings['r_heading_control'] ) ): ?>
            <div class="col-lg-8 offset-lg-0 col-10 offset-1">
                <div class="screen-section-header">                                         
                    <div class="main-heading">                               
                    <?php orions_heading( $settings ); ?>
                    </div>
                </div>
            </div>            
        <?php endif; ?>
            <div class="col-lg-4 offset-lg-0 col-10 offset-1">
                <div class="screen-slider-navigation slider-navigation">
                    <div class="screen-slider-navigation-prev">
                        <i class="las la-long-arrow-alt-left"></i>
                    </div>
                    <div class="screen-slider-navigation-next">
                        <i class="las la-long-arrow-alt-right"></i>
                    </div>
                </div>
            </div>
    </div>
</div>
