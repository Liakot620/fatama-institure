	<div class="hero hero-1">
        <div class="hero-wrapper">
            <div class="container">
			<?php

				$header_id = $args['header_id'];
				$header_post = null;

				$args = [
				    'post_type' => 'header',
				    'p'			=> $header_id
				];

				$query = new WP_Query( $args );

				while ( $query->have_posts() ) {
				    $query->the_post();
				    the_content();
				} wp_reset_postdata();
			?>
			</div>
        <?php
	        $display_background = true;
	        $hero_img_bg		= null;
	        $hero_bottom_img	= null;
	        if ( function_exists( 'get_field' ) ) { 
	            $display_background = get_field( 'show_hero_background' );
	            $hero_img_bg		= get_field( 'hero_background_image' );
	            $hero_bottom_img	= get_field( 'hero_bottom_pattern' );
	        }
	         if ( $display_background == true ) {
        ?>
            <div class="background-pattern background-pattern-1">
                <div class="background-pattern-img background-loop" style="<?php echo esc_attr( empty( $hero_img_bg ) ? '' : 'background-image: url(' . esc_url( $hero_img_bg['url'] ) . ')' ); ?>"></div>
                <div class="background-pattern-gradient"></div>
                <div class="background-pattern-bottom">
                    <div class="image" style="<?php echo esc_attr( empty( $hero_bottom_img ) ? '' : 'background-image: url(' . esc_url( $hero_bottom_img['url'] ) . ')' ); ?>"></div>
                </div>
            </div>
        <?php
            }
        ?>
        </div>
    </div>