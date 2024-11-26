<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package orions
 */

	if ( !class_exists( 'Redux' ) ) {
		$orions_opt = [];
		$orions_opt['meta_footer_select'] = 'default';
	} else {
		global $orions_opt;
	}

	$footer_id = 'default';
	if ( function_exists( 'get_field' ) ) {
		$footer_id = ( ! empty( get_field( 'footer_select' ) ) ) ? get_field( 'footer_select' ) : 'default';
	}

	if ( is_404() && class_exists( 'Redux' ) ) {
		$footer_id = ( ! empty( $orions_opt['404_page_footer'] ) ) ? $orions_opt['404_page_footer'] : 'default';
	}

	if ( is_search() && class_exists( 'Redux' ) ) {
		$footer_id = ( ! empty( $orions_opt['search_page_footer'] ) ) ? $orions_opt['search_page_footer'] : 'default';
	}
	
	// don't display the footer if the post type is header and footer.
	if ( ! is_singular( 'header' ) && ! is_singular( 'footer' ) && ! is_singular( 'elementor_library' ) ) {

		if ( !empty( $footer_id ) && $footer_id == 'default' ) {
			// default footer
			get_template_part( 'inc/template-parts/footer/footer', 'default' );
		} else if ( !empty( $footer_id ) ) {
			// custom footer
			get_template_part( 
				'inc/template-parts/footer/footer', 
				'custom', 
				[ 'footer_id' => $footer_id ] 
			);	
		}

	}

?>


</div><!-- .main-wrapper -->

<?php wp_footer(); ?>


</body>
</html>
