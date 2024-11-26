<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package orions
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$class = 'col-md-8 offset-md-2 col-10 offset-1';
if ( is_page() ) {
	$class = 'col-lg-10 offset-lg-1';
}


$logged_in_form = [
	'comment_field' => '
	<div class="comments-form">
		<div class="row">
			<div class="col">
				
					<div class="form-floating">
						<textarea 
						required
						class="input textarea form-control" 
						placeholder="' . __('Write reply *', 'orions') . '" 
						name="comment"
						id="comment" rows="4"
						></textarea>
						<label for="comment">' . __('Write reply *', 'orions') . '</label>
					</div>
				
			</div>
		</div>
	',
	'title_reply' => wp_kses( '<span class="heading">' . __('Write a reply', 'orions') . '</span>' , 'post' ),
	'comment_notes_before' => '',
	'cancel_reply_link' => esc_html__('CANCEL', 'orions'),
	'label_submit' => esc_html__('Submit Reply', 'orions'),
	'submit_field' => '
	<div class="row">
		<div class="col-12">
			<p class="form-submit c-button">%1$s %2$s</p>
		</div>
		<div class="col-lg-6 cancel"></div>
	</div>'
];

$logged_out_form = [
	'comment_field' => '',
	'title_reply' => wp_kses( '<span class="heading">' . __('Write a reply', 'orions') . '</span>' , 'post' ),
	'comment_notes_before' => '',
	'cancel_reply_link' => esc_html__('CANCEL', 'orions'),
	'label_submit' => esc_html__('Submit Reply', 'orions'),
	'submit_field' => '
	<div class="row">
		<div class="col-12 comments-form">
			<p class="form-submit c-button">%1$s %2$s</p>
		</div>
		<div class="col-lg-6 cancel"></div>
	</div>'
];

?>

<!-- comments - start -->
<?php if ( comments_open() ) : ?>
<div class="comments">
	<div class="comments-wrapper">
		<div class="container">
			<div class="row">
				<div class="<?php echo esc_attr( $class ); ?>">
					<div class="comments-list">				
						<div class="comments-heading">
							<h3 class="c-dark f-w-700">
							<?php
								$orions_comment_count = get_comments_number();
								if ( '1' === $orions_comment_count ) {
									echo esc_html( $orions_comment_count . __( ' replie', 'orions' ) );
								} else {
									echo esc_html( $orions_comment_count . __( ' replies', 'orions' ) );
								}
							?>
							</h3>
						</div><!-- .comments-title -->

					
						<?php
							wp_list_comments(
								array(
									'short_ping' => true,
									'callback' => 'orions_comment_style',
									'style' => 'div'
								)
							);
						?>
					</div><!-- .comment-list -->

					<?php the_comments_navigation(); ?>
				</div>
			</div>
			<!--
			comment form - start
			-->
			<div class="row <?php echo esc_attr( ! have_comments() ? 'no-comments' : '' ); ?>  <?php echo esc_attr( is_user_logged_in() ? 'logged-in-form': '' ); ?>">
				<div class="<?php echo esc_attr( $class ); ?>">
			        <?php
						comment_form(
						is_user_logged_in() ?
						$logged_in_form :
						$logged_out_form
						);
			        ?>
			    </div>
			</div>
			<!--
			comment form - end
			-->
		</div>
	</div>
</div>
<?php endif; // Check for have_comments(). ?>
<!-- comments - end -->
