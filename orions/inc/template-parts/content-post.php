<?php
    $title = trim( get_the_title() );

    $date_format = 'default';
    if ( !empty( $args['date_format'] ) && $args['date_format'] == 'custom'  ) {
        $date_format = 'custom';
    }
    $date_format = 'default';
    $class = [
        'single-blog-post',
        'hover',
        ! has_post_thumbnail() ? 'no-mt'  : ''
    ]

    
?>
<div <?php post_class( $class ); ?>>    
    
        <div class="blog-single-wrapper">
            <div class="blog-single-content">
                <?php orions_post_thumbnail(); ?>
                <?php if ( !empty( $title ) && has_post_thumbnail() ): ?>
                <?php endif; ?>
                <a href="<?php the_permalink(); ?>">
                    <h3><?php echo esc_html( $title ); ?></h3>
                </a>                                                    
                <div class="blog-single-details">
                    <div class="comments">
                        <i class="las la-comment-alt"></i>
                        <?php echo get_comments_number();?>
                    </div>
                    <div class="separator"></div>
                    <div class="date">
                        <i class="las la-calendar"></i>                                            
                        <?php echo wp_kses( orions_get_the_date( $date_format ), 'post' ); ?>
                    </div>
                </div>
                <p><?php echo the_excerpt();?> </p>
            </div>
            <a href="<?php the_permalink(); ?>" class="circle">
                <i class="las la-plus"></i>
                <i class="las la-angle-right hover"></i>
            </a>
        </div>
      
</div>