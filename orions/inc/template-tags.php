<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package orions
 */

if ( ! function_exists( 'orions_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function orions_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'orions' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'orions_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function orions_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'orions' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'orions_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function orions_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'orions' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'orions' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'orions' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'orions' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'orions' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'orions' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'orions_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function orions_post_thumbnail( $size = 'orions-post-thumbnail-size', $anchor = true ) {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}		
		?>
		<div class="post-thumbnail">
		<?php if ( $anchor ): ?>
		<a href="<?php the_permalink(); ?>" class="figure" aria-hidden="true" tabindex="-1">
		<?php endif; ?>
		
			<?php
				the_post_thumbnail(
					$size,
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
			?>

		<?php if ( $anchor ): ?>
			<div class="img-hover">
	            <div class="icon">
	                <i class="las la-link"></i>
	            </div>
	        </div>
		</a>
		
		<?php endif; ?>
		</div>
		<?php
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

if ( ! function_exists( 'orions_paginate' ) ):
	function orions_paginate( $query = '', $prev = '', $next = '' ) {

		if ( $prev != '' ) {
			echo wp_kses( $prev, 'post' );
		}

		if( $query == '' ) {
			global $wp_query;
			$query = $wp_query;
		}

		$args =  array(
			'base'			=> str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			'total'			=> $query->max_num_pages,
			'current'		=> orions_get_page_query(),
			'format'		=> '/page/%#%',
			'show_all'		=> false,
			'type'			=> 'list',
			'end_size'		=> 2,
			'mid_size'		=> 1,
			'add_args'		=> false,
			'add_fragment'	=> '',
			'prev_text'		=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M203.9 405.3c5.877 6.594 5.361 16.69-1.188 22.62c-6.562 5.906-16.69 5.375-22.59-1.188L36.1 266.7c-5.469-6.125-5.469-15.31 0-21.44l144-159.1c5.906-6.562 16.03-7.094 22.59-1.188c6.918 6.271 6.783 16.39 1.188 22.62L69.53 256L203.9 405.3z"/></svg>',
			'next_text'		=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M219.9 266.7L75.89 426.7c-5.906 6.562-16.03 7.094-22.59 1.188c-6.918-6.271-6.783-16.39-1.188-22.62L186.5 256L52.11 106.7C46.23 100.1 46.75 90.04 53.29 84.1C59.86 78.2 69.98 78.73 75.89 85.29l144 159.1C225.4 251.4 225.4 260.6 219.9 266.7z"/></svg>',
		) ;


		?>
		<div class="blog-pagination">
			<?php echo paginate_links( $args ); ?>
		</div>
		<?php

		if ( $next != '' ) {
			echo wp_kses( $next, 'post' );
		}
	}
endif;

if ( !function_exists( 'orions_sub_heading' ) ) {
	function orions_sub_heading( $settings = null ) {
		if ( $settings == null ) return;

		$class_list = array(
            'sub-head',
            $settings['r_heading_preset'],
        );
	?>
	<h5 class="<?php echo esc_attr( implode(' ', $class_list) ); ?>">
        <?php echo wp_kses( $settings['r_heading_control'], 'elementor-general' ); ?>
    </h5>
	<?php
	}
}

if ( !function_exists( 'orions_heading' ) ) {
	function orions_heading( $settings = null ) {
		if ( $settings == null ) return;
		$class_wrapper = array(
			'heading',                        
        );
		$class_list = array(
            'heading sub-heading c-blue upper ls-1',            
        );
        $class_list1 = array(
            'main-heading c-dark',            
        );
        $sub_icon = $settings['r_sub_heading_control_line_icon'];
	?>
	<div class="section-heading <?php echo esc_attr( implode(' ', $class_wrapper) ); ?>">
	<div class="<?php echo esc_attr( implode(' ', $class_list) ); ?>">
	<?php if($sub_icon != '') {?>
		<i class="las <?php echo wp_kses( $settings['r_sub_heading_control_line_icon'], 'elementor-general' ); ?>"></i>
	<?php } else {?>
        <i class="las <?php echo wp_kses( $settings['r_sub_heading_control_icon']['value'], 'elementor-general' ); ?>"></i>
    <?php }?>
        <h5><?php echo wp_kses( $settings['r_sub_heading_control'], 'elementor-general' ); ?></h5>
    </div>
	<div class="<?php echo esc_attr( implode(' ', $class_list1) ); ?>">
		<h1>
	        <?php echo wp_kses( $settings['r_heading_control'], 'elementor-general' ); ?>
	    </h1>
	</div>
	</div>
	<?php
	}
}

if ( !function_exists( 'orions_breadcrumbs' ) ) {
	function orions_breadcrumbs() {
	?>
		<ul>

			<?php
				// front page
				if ( is_front_page() ):
			?>
				<li><?php echo esc_html__( 'Home', 'orions' ); ?></li>
			<?php else: ?>
				<li>
					<a href="<?php echo esc_url( home_url() ) ?>">
						<?php echo esc_html__( 'Home', 'orions' ); ?>
					</a>
				</li>
			<?php endif; // front page ?>

			<?php
				// single post
				if ( is_singular( 'post' ) ):
					$categories = get_the_category();
			?>
				<?php if ( !empty( $categories ) ): ?>
					<li><i class="las la-angle-right"></i>
						<a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>">
							<?php echo esc_html( $categories[0]->name ); ?>
						</a>
					</li>
				<?php endif; // categories ?>

			<?php endif; // single post ?>

			<?php 
				// for pages that are not front page
				if ( is_page() && !is_front_page() ):
					$post = get_post( get_the_ID() );
					// compute parent pages
					if ( $post->post_parent ) {
						$parent_id = $post->post_parent;
						$links = [];
						// loop through all parent pages
						while ( $parent_id ) {
							$parent = get_post( $parent_id );
							$links[] = '<li><a href="' . get_permalink( $parent->ID ) . '">' . get_the_title( $parent->ID ) . '</a><li>';
							$parent_id = $parent->post_parent;
						}
						// reverse array
						$links = array_reverse( $links );

						// output parent pages links
						if ( is_array( $links ) || is_object( $links ) ) {
							foreach ( $links as $link ) {
								echo wp_kses( $link, 'general' );
							}
						}
					}
			?>
				<li><i class="las la-angle-right"></i> <?php the_title(); ?></li>
			<?php endif; // for pages that are not front page ?>

			<?php
				// search page
				if ( is_search() ):
			?>
				<li><i class="las la-angle-right"></i> <?php echo esc_html__( 'Search result', 'orions' ) ?></li>
			<?php endif; // search page ?>

			<?php
				// 404 page
				if ( is_404() ):
			?>
				<li><i class="las la-angle-right"></i> <?php echo esc_html__( '404', 'orions' ) ?></li>
			<?php endif; // 404 page ?>

			<?php 
				// archive page
				if ( is_archive() ): 
			?>
				<li><?php the_archive_title(); ?></li>
			<?php endif; // archive page ?>

			<?php
				// cpt
				if ( is_single() && get_post_type() != 'post' && get_post_type() != 'attachment' ):
			?>
				<li> <i class="las la-angle-right"></i> <?php the_title(); ?></li>
			<?php endif; // cpt ?>

		</ul>
	<?php
	}
}

if ( !function_exists( 'orions_get_slider_navigation' ) ) {
	function orions_get_slider_navigation( $id, $prev_icon, $next_icon ) {
		$class_list = array(
			'screen-slider-navigation',
			'slider-navigation',
			'slider-nav-'.$id
		);
	?>
	<div class="<?php echo esc_attr( implode(' ', $class_list) ); ?>">

		<?php if ( !empty( $prev_icon ) ): ?>
			<div class="screen-slider-navigation-prev">
				<?php
					orions_render_icon( $prev_icon );
				?>
			</div>
		<?php endif; ?>
			
		<?php if ( !empty( $next_icon ) ): ?>
			<div class="screen-slider-navigation-next">				
				<?php 
					orions_render_icon( $next_icon );
				?>
			</div>
		<?php endif; ?>

	</div>
	<?php
	}
}

if ( !function_exists('orions_get_the_date') ) {
	function orions_get_the_date( $type = 'default' ) {
		if ( $type == 'default' ) {
			return '<span class="default">' . get_the_date() . '</span>';
		}

		$result = get_the_date( 'Y M, d' );

		return $result;
	}
}

if ( !function_exists('orions_the_logo') ):
function orions_the_logo() {
	if ( has_custom_logo() ):
		the_custom_logo();
	else:
	?>
		<a href="<?php echo esc_url( home_url() ); ?>">
			<img src="<?php echo esc_url(get_template_directory_uri());?>/inc/assets/images/logo.png" alt="Logo">
		</a>
	<?php
	endif;
}
endif;

if ( ! function_exists( 'orions_excerpt_more' ) && ! is_admin() ) :
	/**
	 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
	 *
	 * @since Orions 1.0
	 *
	 * @return string 'Continue reading' link prepended with an ellipsis.
	 */
	function orions_excerpt_more( $more ) {
		$link = sprintf(
			'',
			esc_url( get_permalink( get_the_ID() ) ),
			/* translators: %s: Post title. Only visible to screen readers. */
			sprintf( __( 'Read More %s', 'orions' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
		return ' &hellip; ' . $link;
	}
	add_filter( 'excerpt_more', 'orions_excerpt_more' );
endif;

if ( ! function_exists( 'orions_excerpt_length' ) && ! is_admin() ) :
function orions_excerpt_length($length) {
 return 25;
 	} 
add_filter('excerpt_length', 'orions_excerpt_length');
endif;