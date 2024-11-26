<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Orions
 */

get_header();

$error_top_heading = __( '404 Error!', 'orions' );
$error_heading = __( 'We can\'t seem to find the page you\'re looking for.', 'orions' );
$error_paragraph = __( 'The page you\'e looking for might have been removed, had it\'s name change or temporarily unavailable', 'orions' );

get_template_part( 'inc/template-parts/page', 'header' );
if ( !class_exists( 'Redux' ) ) {
		$orions_opt = [];		
		$orions_opt['404_page_header_title'] = '';
		$orions_opt['404_page_page_icon'] = 'la-times-circle';
		$orions_opt['404_page_sub_title'] = '';
		$orions_opt['404_page_sub_title_icon'] = 'la-times-circle';
		$orions_opt['404_page_content'] = '';
	} else {
		global $orions_opt;
	}
	$page_title = $orions_opt['404_page_header_title'];
	$page_icon = $orions_opt['404_page_page_icon'];
	$sub_title = $orions_opt['404_page_sub_title'];
	$sub_icon = $orions_opt['404_page_sub_title_icon'];
	$page_content = $orions_opt['404_page_content'];
?>

<div class="search">
	<div class="search-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 d-flex justify-content-center">
					<!-- search error - start -->
					<div class="search-error">						
							<div class="section-heading">
                                <div class="sub-heading c-blue upper ls-1">
                                <?php if ($sub_icon != '') {?> 
                                    <i class="las <?php echo esc_html( $sub_icon ); ?>"></i>
                                <?php } ?>
                                    <h5><?php echo wp_kses_post( $sub_title ); ?></h5>
                                </div>
                            <?php if ($page_title != '') {?>
                            	<div class="main-heading c-dark">
                                    <h1><?php echo wp_kses_post( $page_title ); ?></h1>
                                </div>
                           	<?php } else { ?>
                                <div class="main-heading c-dark">
                                    <h1><?php echo esc_html( $error_top_heading ); ?><br> <?php echo esc_html( $error_heading ); ?></h1>
                                </div>
                            <?php } ?>
                            </div>
                        <?php if ($page_icon != '') {?>   
                            <div class="contact-form-icon">
					            <i class="las <?php echo esc_html( $page_icon ); ?>"></i>
					        </div>
					    <?php }?>
					    <?php if ($page_content != '') {?> 						
						<p class="c-dark"><?php echo esc_html( $page_content ); ?></p>
					<?php } else {?>
						<p class="c-dark"><?php echo esc_html( $error_paragraph ); ?></p>
					<?php }?>

						<a href="<?php echo esc_url( home_url() ); ?>" class="button button-2 error-btn">
					      	<div class="button-inner">
					        	<div class="button-content">
					          	<h4><?php echo esc_html__( 'HOMEPAGE', 'orions' ); ?></h4>
					        	</div>
					      	</div>
					    </a>						
					</div>
					<!-- search error - end -->
				</div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
