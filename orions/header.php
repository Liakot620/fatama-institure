<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package orions
 */
	global $orions_opt;
    if ( ! class_exists( 'Redux' ) ) {
        $orions_opt = [];
        $rodio_opt['demo_design_select'] = 'default';
        $orions_opt['preloader_switch'] = true;
        $orions_opt['logo_options'] = null;
        $orions_opt['mobile_menu'] = null;
	} else {
		global $orions_opt;
	}	

?>
<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head();?>
</head>



<body <?php body_class();?>>
<?php wp_body_open();?>
<div class="main-wrapper">
	<?php if ( $orions_opt['preloader_switch'] ): ?>
	<!--
    preloader - start
    -->
    <div class="preloader">
        <div class="preloader-wrapper">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 0 200 200">
            <g class="pre load6">
                <path fill="#1B1A1C" d="M124.5,57L124.5,57c0,3.9-3.1,7-7,7h-36c-3.9,0-7-3.1-7-7v0c0-3.9,3.1-7,7-7h36
                C121.4,50,124.5,53.1,124.5,57z"/>
                <path fill="#1B1A1C" d="M147.7,86.9L147.7,86.9c-2.7,2.7-7.2,2.7-9.9,0l-25.5-25.5c-2.7-2.7-2.7-7.2,0-9.9l0,0
                c2.7-2.7,7.2-2.7,9.9,0L147.7,77C150.5,79.8,150.5,84.2,147.7,86.9z"/>
                <path fill="#1B1A1C" d="M143,74.5L143,74.5c3.9,0,7,3.1,7,7v36c0,3.9-3.1,7-7,7l0,0c-3.9,0-7-3.1-7-7v-36
                C136,77.6,139.1,74.5,143,74.5z"/>
                <path fill="#1B1A1C" d="M148.4,112.4L148.4,112.4c2.7,2.7,2.7,7.2,0,9.9L123,147.7c-2.7,2.7-7.2,2.7-9.9,0h0c-2.7-2.7-2.7-7.2,0-9.9
                l25.5-25.5C141.3,109.6,145.7,109.6,148.4,112.4z"/>
                <path fill="#1B1A1C" d="M125.5,143L125.5,143c0,3.9-3.1,7-7,7h-36c-3.9,0-7-3.1-7-7l0,0c0-3.9,3.1-7,7-7h36 C122.4,136,125.5,139.1,125.5,143z"/>
                <path fill="#1B1A1C" d="M52.3,113.1L52.3,113.1c2.7-2.7,7.2-2.7,9.9,0l25.5,25.5c2.7,2.7,2.7,7.2,0,9.9h0c-2.7,2.7-7.2,2.7-9.9,0
                L52.3,123C49.5,120.2,49.5,115.8,52.3,113.1z"/>
                <path fill="#1B1A1C" d="M57,75.5L57,75.5c3.9,0,7,3.1,7,7v36c0,3.9-3.1,7-7,7h0c-3.9,0-7-3.1-7-7v-36C50,78.6,53.1,75.5,57,75.5z"/>
                <path fill="#1B1A1C" d="M86.9,52.3L86.9,52.3c2.7,2.7,2.7,7.2,0,9.9L61.5,87.6c-2.7,2.7-7.2,2.7-9.9,0l0,0c-2.7-2.7-2.7-7.2,0-9.9
                L77,52.3C79.8,49.5,84.2,49.5,86.9,52.3z"/>
            </g>
            </svg>
        </div>
    </div>
    <!--
    preloader - end
    -->
	<?php endif; ?>
	<!--
    navigation - start
    -->
<?php 
    if ( is_home() || is_front_page() ) {
        if ( !class_exists( 'Redux' ) ) {
        $orions_opt = [];       
        $orions_opt['demo_design_select'] = 'pbp_color';
        } else {
            global $orions_opt;
        }
        $css_change = $orions_opt['demo_design_select'];
        if( $css_change == 'gbp_color' ){
?>
    <div class="navigation navigation-1">
    <?php } else { ?>
    <div class="navigation">
    <?php } } else {?>
    <div class="navigation navigation-1">
    <?php } ?>
        <div class="navigation-wrapper">
            <div class="container">
                <div class="navigation-inner">
                <?php
                if ( is_home() || is_front_page() ) { 
                    $css_change = $orions_opt['demo_design_select'];
                    if($css_change == 'gbp_color'){
                ?>
                    <?php
                $logo_img = $orions_opt['logo_options']['url'];
                if ( $logo_img != '') { ?>
                    <div class="navigation-logo">
                        <?php orions_the_logo(); ?>                    
                        <a class="logo-white" href="<?php echo esc_url( home_url() ); ?>">
                            <img src="<?php echo esc_url( $orions_opt['logo_options']['url'] ); ?>" alt="orions-logo">
                        </a>                    
                    </div>
                <?php } else { ?>
                    <div class="navigation-logo">
                        <?php orions_the_logo(); ?> 
                    </div>
                <?php 
                        }
                    } else {
                ?>
                    <div class="navigation-logo">
                        <?php orions_the_logo(); ?> 
                    </div>
                <?php } } else { ?> 
                <?php
                $logo_img = $orions_opt['logo_options'];
                if ( $logo_img != '') { ?>
                    <div class="navigation-logo">
                        <?php orions_the_logo(); ?>                    
                        <a class="logo-white" href="<?php echo esc_url( home_url() ); ?>">
                            <img src="<?php echo esc_url( $orions_opt['logo_options']['url'] ); ?>" alt="orions-logo">
                        </a>                    
                    </div>
                <?php } else { ?>
                    <div class="navigation-logo">
                        <?php orions_the_logo(); ?> 
                    </div>
                <?php 
                        } 
                    } 
                ?>
                    <div class="navigation-menu">
                    <?php if ( class_exists( 'Redux' ) ) { ?>
                        <div class="mobile-header">
                            <div class="logo">
                                <a href="<?php echo esc_url( home_url() ); ?>">
                                    <img src="<?php echo esc_url( $orions_opt['logo_options']['url'] ); ?>" alt="image">
                                </a>
                            </div>
                            <ul>
                                <li class="close-button">
                                    <i class="fas fa-times"></i>
                                </li>
                            </ul>
                        </div>
                    <?php } ?>    
                        <?php

                            // desktop menu
                            if ( has_nav_menu( 'default-menu' ) )
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'default-menu',
                                        'container' => 'ul',
                                        'menu_class' => 'parent',
                                        'link_before'=> '<span>',
                                        'link_after' => '</span>',
                                        //'container_class' => '',
                                    )
                                );
                        ?>
                        <div class="background-pattern">
                    <?php if ( class_exists( 'Redux' ) ) { ?>        
                        <div class="background-pattern-img background-loop" style="background-image: url(<?php echo esc_url( $orions_opt['mobile_menu']['url'] ); ?>);"></div>
                    <?php }?>
                            <div class="background-pattern-gradient"></div>
                        </div>                       
                    </div>
                    <div class="navigation-bar">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--
    navigation - end
    -->	

    <?php
    $header_id = 'default';
    if ( function_exists( 'get_field' ) ) {
        $header_id = ( ! empty( get_field( 'header_desktop' ) ) ) ? get_field( 'header_desktop' ) : 'default';
    }

    if ( is_404() && class_exists( 'Redux' ) ) {
        $header_id = ( ! empty( $orions_opt['404_page_header_desktop'] ) ) ? $orions_opt['404_page_header_desktop'] : 'default';
    }

    if ( is_search() && class_exists( 'Redux' ) ) {
        $header_id = ( ! empty( $orions_opt['search_page_header_desktop'] ) ) ? $orions_opt['search_page_header_desktop'] : 'default';
    }

    $scrollbar_class = ' enabled-sticky-nav';
    $header_body_class = 'header-default';
    if ( $header_id != 'default' ) {
        $header_body_class = 'header-custom';
    }
        // don't display the header if the post type is header and footer.
        if ( ! is_singular( 'header' ) && ! is_singular( 'footer' ) && ! is_singular( 'elementor_library' ) ):
    ?>               
                <?php
                
                    if ( ! empty( $header_id ) && $header_id == 'default' ) {
                        // default navigation
                        get_template_part( 'inc/template-parts/header/header', 'default' );
            } elseif ( ! empty( $header_id ) ) {
                        // custom navigation
                        get_template_part(
                            'inc/template-parts/header/header',
                            'custom',
                            [ 'header_id' => $header_id ]
                        );
            }

            ?>
        <?php endif; ?>