<?php

    get_header();

    get_template_part( 'inc/template-parts/page', 'header' );

    while ( have_posts() ):
        the_post();
?>
    <div class="project-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <?php if ( has_post_thumbnail() ):  ?>
                    <!-- project thumbnail - start -->
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="project-detail-thumbnail">
                                <?php orions_post_thumbnail( 'orions-project-detail-thumbnail-size' ); ?>
                            </div>
                        </div>
                    </div>
                    <!-- project thumbnail - end -->
                    <?php endif; ?>

                    <!-- project title - start -->
                    <?php the_title( 
                        '<div class="row">
                            <div class="col-lg-10 offset-lg-1">
                                <div class="project-detail-title">
                                    <h1 class="heading">', 
                                    '</h1>
                                </div>
                            </div>
                        </div>' ); ?>
                    <!-- project title - end -->

                    <!-- project inner content - start -->
                    <div class="project-detail-inner">
                        <div class="row gx-5">
                            <!-- project content - start -->
                            <div class="col-lg-7 offset-lg-1">
                                <div class="project-detail-content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            <!-- project content - end -->

                            <!-- project sidebar - start -->
                            <div class="col-lg-4">
                                <div class="project-detail-sidebar">
                                    <div class="detail">
                                        <span class="title"><?php echo esc_html__( 'Date', 'orions' ); ?>:</span>
                                        <span><?php echo esc_html( get_the_date() ); ?></span>
                                    </div>
                                    <?php
                                        if ( function_exists( 'get_field' ) ):
                                            $i = 1;
                                            while ( true ):
                                                $detail = get_field( 'project_details_' . $i  );
                                                if ( 
                                                    empty( $detail ) || 
                                                    empty( $detail['detail_title'] ) ||
                                                    empty( $detail['detail_value'] )
                                                ) break;
                                                $title = $detail['detail_title'];
                                                $value = $detail['detail_value'];
                                        ?>
                                            <div class="detail">
                                                <span class="title"><?php echo esc_html( $title ); ?></span>
                                                <span><?php echo esc_html( $value ); ?></span>
                                            </div>
                                        <?php
                                            $i++;
                                            endwhile;
                                        endif;
                                    ?>
                                </div>
                            </div>
                            <!-- project sidebar - end -->
                        </div>
                    </div>
                    <!-- project inner content - end -->

                </div>
            </div>
        </div>
    </div>

    
<?php
    get_template_part( 'inc/template-parts/content', 'related-projects' );

    endwhile;

    get_footer();