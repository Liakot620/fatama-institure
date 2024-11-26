<?php

	$display_header = true;
	$heading        = null;
	$bg_img         = null;
	$pattern_img    = null;

if ( function_exists( 'get_field' ) ) {
	$display_header = get_field( 'display_page_header' );
	$heading        = get_field( 'page_header_title' );
	$bg_img         = get_field( 'page_header_bg' );
	$pattern_img    = get_field( 'page_header_pattern_bottom' );


	if ( is_home() ) {
		$heading = get_field( 'page_header_title', get_option( 'page_for_posts' ) );
	}
}

if ( ! $display_header && ! is_search() && ! is_archive() && ! is_404() && ! is_paged() ) {
	return;
}

if ( is_search() ) {
	$heading = __('Search Result:"', 'orions') . get_search_query() . __('"', 'orions');
}

if ( is_archive() ) {
	$heading = __( 'Archives', 'orions' );
}

if ( is_404() ) {
	$heading = __( 'Not Found', 'orions' );
}
?>
<!--
    page header - start
    -->
    <div class="page-header">
        <div class="page-header-wrapper">
            <div class="page-header-inner">
                <div class="container">
                    <div class="row d-lg-flex align-items-lg-end">
                        <div class="col-lg-6">
                            <div class="page-header-content c-white">
                                <h1><?php
									if ( ! empty( $heading ) ) {
										// custom heading
										echo esc_html( $heading );
									} else {
										// dynamic heading
										$type = get_post_type();
										if ( $type == 'page' ) {
											the_title();
										} elseif ( is_home() ) {
											$title = single_post_title( '', false );
											if ( empty( $title ) ) {
												$title = __( 'Our Blog', 'orions' );
											}
											echo esc_html( $title, 'orions' );
										} else {
											echo esc_html( $type );
										}
									}
									?>								
								</h1>
                                <div class="breadcrumbs">
									<?php orions_breadcrumbs(); ?>
								</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="background-pattern background-pattern-2">
                <div class="background-pattern-img background-loop" style="<?php echo esc_attr( empty( $bg_img ) ? '' : 'background-image: url(' . esc_url( $bg_img['url'] ) . ')' ); ?>"></div>
                <div class="background-pattern-gradient"></div>
                <div class="background-pattern-bottom">
                    <div class="image" style="<?php echo esc_attr( empty( $pattern_img ) ? '' : 'background-image: url(' . esc_url( $pattern_img['url'] ) . ')' ); ?>"></div>
                </div>
            </div>
        </div>
    </div>
    <!--
    page header - end
    -->
