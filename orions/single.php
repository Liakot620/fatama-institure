<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package orions
 */

	get_header();

	get_template_part( 'inc/template-parts/page', 'header' );

	$date_format = 'default';
	$date_format_field = get_post_meta(get_the_ID(), 'theme_specified_date_format', true);

	if ( $date_format_field === '1' )
		$date_format = 'custom';


	$display_rs_field = get_post_meta(get_the_ID(), 'display_related_posts', true);
	$display_rs = true;
	$display_rs = $display_rs_field === '' || $display_rs_field === '1';
		

	if ( !class_exists( 'Redux' ) ) {
		$orions_opt = [];
		$orions_opt['meta_post_date_select'] = 'default';
		$orions_opt['meta_post_rs_switch'] = true;
		$orions_opt['brs_heading_txt'] = __( 'Similar News.', 'orions' );
		$orions_opt['brs_sub_heading_txt'] = __( 'Recent News.', 'orions' );
		$orions_opt['brs_bg'] = null;
		$orions_opt['brs1_bg'] = null;
		//$orions_opt['brs_prev_icon'] = 'default-prev';
		//$orions_opt['brs_next_icon'] = 'default-next';
		$orions_opt['meta_post_rs_nav_switch'] = '0';
		$orions_opt['meta_post_share_btn'] = '0';
	} else {
		global $orions_opt;
	}

	$categories = get_the_category();

	$args = [
		'posts_per_page' => 4,
		'post_type' => 'post',
		'post__not_in' => [ $post->ID ],
		'ignore_sticky_posts' => 1,
		'cat' => !empty( $categories ) ? $categories[0]->term_id : null
	];

	$rp_query = new WP_Query( $args );

	// pagination
    $pagination = [
		'before'=> '
			<div class="post-nav-links">
				<h6>'.__('Pages', 'orions').': </h6>
				<div class="post-nav-links-inner">', 
		'after' => '
				</div>
			</div>'
	];

	$date_class = 'date-' . $date_format;
  
	$col_class = 'col-lg-8 offset-lg-2';

	$is_paginated = ( ! empty( get_next_posts_link() ) ) || ( ! empty( get_previous_posts_link() ) );

	$related_off_comments_on = ! ( $display_rs && $rp_query->have_posts() ) && ( comments_open() || get_comments_number() != 0 );

?>

	<?php while ( have_posts() ): the_post(); ?>
	
	<div class="blog-detail <?php echo esc_attr( $related_off_comments_on ? 'related-off-comments-on' : '' ); ?>">
		<div class="blog-detail-wrapper">
			<div class="container">
				<?php if (has_post_thumbnail() ): ?>
				<!-- thumbnail - start -->
				<div class="row">
					<div class="<?php echo esc_attr( ! has_post_thumbnail() ? 'col-10 offset-1' : 'col-lg-12 offset-lg-0' ); ?>">
						<div class="blog-detail-thumbnail drop-shadow">
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'orions-post-detail-thumbnail-size' ); ?>						
							<img src="<?php echo esc_url($image[0]); ?>" alt="blog-detail-thumbnail">
						</div>
					</div>
				</div>
				<!-- thumbnail - end -->
				<?php endif ?>
				<!-- title - start -->
				<div class="row">
					<div class="col-md-8 offset-md-2 col-10 offset-1">
					<?php if (  $orions_opt['meta_post_share_btn'] == '0' ) { ?>
						<div class="blog-detail-content share_btn c-grey">
					<?php } else { ?>
						<div class="blog-detail-content c-grey">
					<?php } ?>
							<?php if ( ! empty( get_the_title() ) ): ?>
							<?php
								the_title( '<h1 class="c-dark f-w-700">', '</h1>' ); 
							?>
							<?php endif; ?>
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
                            <?php if ( ! empty( get_the_content() ) ): ?>
                                <?php echo get_the_content(); 
                                wp_link_pages( array(
			    					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'orions' ) . '</span>',
			    					'after'       => '</div>',
			    					'link_before' => '<span>',
			    					'link_after'  => '</span>',
			    					'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'orions' ) . ' </span>%',
			    					'separator'   => '<span class="screen-reader-text">, </span>',
			    				) );
                                ?>

                            <?php endif; ?>
							<?php
							if ( !class_exists( 'Redux' ) ) {
									$orions_opt = [];
									$orions_opt['meta_post_share_btn'] = false;
								} else {
									global $orions_opt;
								}
							if (  $orions_opt['meta_post_share_btn'] == true ) {?>
							
							<?php echo do_shortcode('[socialSharingButtons]'); ?>
							<?php } else {} ?>
						</div>
					</div>
				</div>
				<!-- title - end -->				
			</div>
		</div>
	</div>

	<?php if ( $display_rs && $rp_query->have_posts() ): 
	
		
		$options = [
			//'r_heading_control' => $orions_opt['brs_heading_txt'],
			'r_heading_preset'	=> 'normal',

			//'rs_prev_icon'		=> $prev_icon,
			//'rs_next_icon'		=> $next_icon
		];

		$id = 'related_blog';

		$slider_options = [
			'spaceBetween'		=> 30,
			'resizeObserver' 	=> true,
			'autoHeight'		=> true,
			'navigation' 		=> [
				'nextEl' 		=> '.slider-nav-'.$id.' .slider-nav-next',
				'prevEl' 		=> '.slider-nav-'.$id.' .slider-nav-prev',
			],
			'breakpoints'		=> [
				'0' => [
					'slidesPerView'		=> 1,
					'centeredSlides'	=> true,
				],
				'992' => [
					'slidesPerView'		=> 3,
					'centeredSlides'	=> false,
				],
			]
		];

	?>
	<div class="related-posts">
		<div class="related-posts-wrapper">
			<div class="related-posts-inner">
				<div class="container">
					<!--
                    related posts header - start
                    -->
					<div class="row">
						<div class="col-lg-6 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
                            <div class="section-heading section-heading-1 c-white">
                                <div class="sub-heading upper ls-1">
                                    <i class="las la-file-alt"></i>
                                <?php 
                                	if ( !class_exists( 'Redux' ) ) {
										$orions_opt = [];
										$orions_opt['brs_sub_heading_txt'] = __( 'Recent News.', 'orions' );
									} else {
										global $orions_opt;
									}
                                ?>
                                    <h5><?php echo esc_html($orions_opt['brs_sub_heading_txt']);?></h5>
                                </div>
                                <div class="main-heading">
                                	<?php 
                                	if ( !class_exists( 'Redux' ) ) {
										$orions_opt = [];
										$orions_opt['brs_heading_txt'] = __( 'Similar News.', 'orions' );
									} else {
										global $orions_opt;
									}
									?>
                                    <h1><?php echo esc_html($orions_opt['brs_heading_txt']);?></h1>
                                </div>
                            </div>
                        </div>
						<div class="col-lg-6 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
						<?php 
							if ( !class_exists( 'Redux' ) ) {
								$orions_opt = [];
								$orions_opt['meta_post_rs_nav_switch'] = '0';
							} else {
								global $orions_opt;
							}
						?>
						<?php 
							if (  $orions_opt['meta_post_rs_nav_switch'] == '0' ) { } 
							else {
						?>

                            <div class="related-posts-slider-navigation slider-navigation">
                                <div class="related-posts-slider-navigation-prev">
                                    <i class="las la-long-arrow-alt-left"></i>
                                </div>
                                <div class="related-posts-slider-navigation-next">
                                    <i class="las la-long-arrow-alt-right"></i>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                    <!--
                    related posts header - end
                    -->
                </div>				
				
				<div class="container related-posts-slider-container">
					<div class="row">
						<div class="col-lg-12">
							<div class="related-blog-slider slider-<?php echo esc_attr( $id ); ?>">
								<div class="swiper-container">
									<div class="swiper-wrapper">
										<?php 
											while ( $rp_query->have_posts() ): 
											$rp_query->the_post();
										?>
											<div class="swiper-slide">
												<div class="blog-single">
												<?php
													get_template_part( 
														'/inc/template-parts/content', 
														'post',
														[
															'date_format' => 'custom'
														]
													);
												?>
												</div>
											</div>
										<?php endwhile; wp_reset_postdata(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="background-pattern background-pattern-1">
				<?php 
					if ( !class_exists( 'Redux' ) ) {
						$orions_opt = [];
						$orions_opt['brs_bg'] = null;
					} else {
						global $orions_opt;
					}
				?>
                <div class="background-pattern-img background-loop" style="background-image: url(<?php echo esc_url( $orions_opt['brs_bg']['url'] ); ?>);"></div>
                <div class="background-pattern-gradient"></div>
                <div class="background-pattern-bottom">
                <?php 
					if ( !class_exists( 'Redux' ) ) {
						$orions_opt = [];
						$orions_opt['brs1_bg'] = null;
					} else {
						global $orions_opt;
					}
				?>
                    <div class="image" style="background-image: url(<?php echo esc_url( $orions_opt['brs1_bg']['url'] ); ?>)"></div>
                </div>
            </div>
		</div>
		
	</div>
	<?php orions_slider( 'related_blog', $slider_options ); endif; ?>

	<?php 
		if ( comments_open() || get_comments_number() != 0 ) {
			comments_template();
		}
	?>

	<?php endwhile; ?>

<?php
get_footer();
