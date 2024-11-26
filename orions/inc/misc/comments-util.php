<?php

if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


if ( !function_exists( 'orions_comment_style' ) ) {
function orions_comment_style( $comment, $args, $depth ) {

    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    $is_pingback = $comment->comment_type == 'pingback';
    $is_traceback = $comment->comment_type == 'trackback';

    ?>
    <div
        <?php comment_class(array(empty( $args['has_children'] ) ? '' : 'comments-single has-reply', 'comments-single comment')) ?> 
        id="comment-<?php comment_ID() ?>"
    >
        <div class="comments-single-wrapper">

            <?php if ( !$is_pingback && !$is_traceback ): ?>
                <!-- comment image - start -->
                <div class="comments-single-image">
                    <?php
                    // if the commenter has a gravatar, then display it otherwise display a default image
                    if (
                        $comment->user_id || 
                        email_exists( $comment->comment_author_email ) || 
                        orions_validate_gravatar( $comment->comment_author_email )
                        ): 
                    ?>
                        <?php echo get_avatar( $comment, 100, '', '', '' ); ?>
                    <?php else: ?>
                        <img 
                        src="<?php echo esc_url( get_template_directory_uri().'/inc/assets/images/comment_placeholder.jpg' ); ?>" 
                        alt="comment-image">
                    <?php endif; ?>
                </div>
                <!-- comment image - end -->
            <?php endif; ?>
            
            <div class="comments-single-content" role="complementary">

                <div class="comment-inner-wrapper">
                    <a href="<?php comment_author_url(); ?>">
                        <h5 class="name"><?php comment_author(); ?></h5>
                    </a>
                    <?php if ( !$is_pingback && !$is_traceback ): ?>
                        <p class="date"><?php comment_date(); ?></p>
                    <?php endif; ?>
                </div>

                <?php if ($comment->comment_approved == '0') : ?>
                    <p class="comment-meta-item paragraph dark"><?php echo esc_html__('Your comment is awaiting moderation.', 'orions') ?></p>
                <?php else: ?>

                    <?php 
                        if 
                        (   ( $comment->comment_type == 'pingback' || $comment->comment_type == 'trackback' ) 
                            && !$args['short_ping']
                        )
                        {
                            comment_text();
                        }

                        if 
                        ( $comment->comment_type != 'pingback' && $comment->comment_type != 'trackback' )
                        {
                            comment_text();
                        }
                    ?>

                <?php endif; ?>

                <?php if ( !$is_pingback && !$is_traceback ): ?>
                    <div class="reply-button">                        
                    <?php comment_reply_link(
                        array_merge( 
                            $args,
                            [
                                'add_below' => 'comment', 
                                'depth' => $depth, 
                                'max_depth' => $args['max_depth']
                            ]
                        )
                        ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php }
    // one closing div tag is not added, because WordPress adds one and then there is an extra closing div tag
}
/****************************************
comment fields
****************************************/
if (!function_exists('orions_default_comment_fields')) {
function orions_default_comment_fields($fields) {
    // author field
    $fields['author'] = '
    <div class="comment-form">
        <div class="comment-form--inner">
            <div class="row">
            <div class="col-lg-6">
                    <div class="form-floating">
                        <input 
                        type="text"
                        required 
                        class="input form-control" 
                        id="name-field" 
                        name="name"
                        placeholder="' . __('Name *', 'orions') . '">
                        <label for="author">' . __('Name *', 'orions') . '</label>
                    </div>
            ';

    // email field
    $fields['email'] = '
            
                
                <div class="form-floating">
                    <input 
                    required
                    type="email" 
                    class="input form-control" 
                    id="email-field" 
                    name="email"
                    placeholder="' . __('Email *', 'orions') . '">
                    <label for="email">' . __('Email *', 'orions') . '</label>
                </div>
            </div>';

    // url field
    unset( $fields['url'] );

    // comment content field
    $fields['comment_field'] ='
            <div class="col-lg-6">
                <div class="form-floating textarea-form">
                    <textarea 
                    required
                    class="input textarea form-control" 
                    placeholder="' . __('Write reply *', 'orions') . '" 
                    name="comment"
                    id="comment-field"
                    ></textarea>
                    <label for="comment">' . __('Write reply *', 'orions') . '</label>
                </div>
            </div>';
    
    // cookies field
    $fields['cookies'] = '
            <div class="col">
                <div class="cookies-consent"> 
                    <label for="wp-comment-cookies-consent" class="paragraph">'
                        .__('Save my name and email in this browser for the next time I comment.', 'orions').'
                        <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
        </div>
        </div>
    </div>';
   
    return $fields;
  }
}
add_action('comment_form_default_fields', 'orions_default_comment_fields');

if (!function_exists('orions_comment_fields')) {
// move the cookies checkbox to the end of fields
function orions_comment_fields($fields) {
    $cookie_field = $fields['cookies'];
    unset($fields['cookies']);
    $fields['cookies'] = $cookie_field;
    return $fields;
}
}
add_action('comment_form_fields', 'orions_comment_fields', 99, 1);

if (!function_exists('orions_validate_gravatar')) {
function orions_validate_gravatar($email) {
    // From http://codex.wordpress.org/Using_Gravatars
    // Craft a potential url and test its headers
    $hash = md5($email);
    $uri = 'http://www.gravatar.com/avatar/' . $hash . '?d=404';
    $headers = @get_headers($uri);
    if (empty($headers)) {
        $has_valid_avatar = FALSE;
        return $has_valid_avatar;
    }
    if (!preg_match("|200|", $headers[0])) {
        $has_valid_avatar = FALSE;
    } else {
        $has_valid_avatar = TRUE;
    }
    return $has_valid_avatar;
}
}