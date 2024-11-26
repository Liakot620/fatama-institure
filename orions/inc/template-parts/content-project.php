<?php
    $s_feature_icon = null;
    //$c_feature_icon = null;
    //$pattern_img         = null;

if ( function_exists( 'get_field' ) ) {
    $s_feature_icon = get_field( 'select_feature_icon' );
    //$c_feature_icon = get_field( 'choose_feature_icon' );
    //$bg_img         = get_field( 'page_header_bg' );
    //$pattern_img    = get_field( 'page_header_pattern_bottom' );
    
}
    $title = trim( get_the_title() );

    $post_categories = get_the_terms( $post->ID, 'category' );
    if ( ! empty( $post_categories ) && ! is_wp_error( $post_categories ) ) {
        $categories = join( ', ', wp_list_pluck( $post_categories, 'name' ) );
    }
?>

            
        <div class="app-feature-single-wrapper">
        <?php if ( ! empty( $s_feature_icon ) ) { ?>
            <a href="<?php the_permalink(); ?>" class="icon">
                <i class="las <?php echo esc_html($s_feature_icon);?>"></i>
            </a>
        <?php } ?>
            <a href="<?php the_permalink(); ?>">
                <?php if ( !empty( $title ) ): ?>
                    <h3 class="c-dark"><?php echo esc_html( $title ); ?></h4>
                <?php endif; ?>
            </a>
            <p class="c-grey"><?php the_excerpt();?></p>            
        </div>
        <a href="<?php the_permalink(); ?>" class="circle">
            <i class="las la-plus"></i>
            <i class="las la-angle-right hover"></i>
        </a>
