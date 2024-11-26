<?php

if ( ! function_exists( 'orions_acf_header_values' ) ) {
    function orions_acf_header_values( $field ) {
    
        // default choice
        $field['choices']['default'] = __( 'Default', 'orions' );

        $args = [
            'post_type'     => 'header',
            'numberposts'   => -1,
            'post_status'   => 'publish'
        ];

        $posts = get_posts( $args );

        foreach ( $posts as $post ) {
            $field['choices'][ $post->ID ] = $post->post_title;
        }
                
        return $field;
    }
}
add_filter( 'acf/load_field/name=header_desktop', 'orions_acf_header_values' );
add_filter( 'acf/load_field/name=header_mobile', 'orions_acf_header_values' );

if ( ! function_exists( 'orions_acf_footer_values' ) ) {
    function orions_acf_footer_values( $field ) {
    
        // default choice
        $field['choices']['default'] = __( 'Default', 'orions' );

        $args = [
            'post_type'     => 'footer',
            'numberposts'   => -1,
            'post_status'   => 'publish'
        ];

        $posts = get_posts( $args );

        foreach ( $posts as $post ) {
            $field['choices'][ $post->ID ] = $post->post_title;
        }
                
        return $field;
    }
}
add_filter( 'acf/load_field/name=footer_select', 'orions_acf_footer_values' );