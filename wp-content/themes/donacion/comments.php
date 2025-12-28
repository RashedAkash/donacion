<?php
if ( post_password_required() ) {
    return;
}
?>

<div class="single_post_comment pb-27">
    <?php if ( have_comments() ) : ?>
        <h6 class="related_post_title mb-35">
            <?php
                $comments_number = get_comments_number();
                printf( _n( '%s Comment', '%s Comments', $comments_number, 'your-theme-textdomain' ), number_format_i18n( $comments_number ) );
            ?>
        </h6>
        <div class="latest_comments">
            <ul>
                <?php
                    wp_list_comments( array(
                        'style'       => 'ul',
                        'short_ping'  => true,
                        'avatar_size' => 70,
                        'callback'    => 'yourtheme_comment_markup', // Custom callback for your markup
                    ) );
                ?>
            </ul>
        </div>
    <?php endif; ?>
</div>

<?php
// Custom callback for formatting comments
function yourtheme_comment_markup( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment; 
    if ( 'div' === $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
        <div class="comments_box <?php echo $depth > 1 ? 'children' : 'pb-30'; ?>">
            <div class="comment_avater f-left">
                <?php echo get_avatar( $comment, 70 ); ?>
            </div>
            <div class="comment_text <?php echo $depth > 1 ? '' : 'has-children'; ?>">
                <div class="avater_text">
                    <h5>
                        <?php printf( '<a href="%s">%s</a>', get_comment_link( $comment->comment_ID ), get_comment_author() ); ?>
                        <span><i class="fal fa-bookmark"></i></span>
                    </h5>
                    <div class="blog_meta mb-10">
                        <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" class="calendar">
                            <i class="fal fa-calendar-alt"></i> <?php comment_date('d F Y'); ?>
                        </a>
                    </div>
                    <?php comment_reply_link( array_merge( $args, array(
                        'reply_text' => '<i class="fal fa-reply"></i>Reply',
                        'depth'      => $depth,
                        'max_depth'  => $args['max_depth']
                    ) ) ); ?>
                </div>
                <p><?php comment_text(); ?></p>
            </div>
        </div>
    <?php
}
?>

<div class="comment_form_wrapper">
    <h6 class="related_post_title mb-35">Post Comment</h6>
    <div class="comment_form_details">
        <?php
            $comments_args = array(
                'title_reply'          => '',
                'label_submit'         => 'Post Comment',
                'class_submit'         => 'comment_details_btn g_btn to_right1',
                'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s"><i class="fal fa-comments"></i> %4$s <span></span></button>',
                'comment_field'        => '<div class="comment_form_single"><div class="comment_textarea"><textarea id="comment" name="comment" cols="30" rows="10" placeholder="Type your comments..."></textarea><label for="comment"><i class="fal fa-pencil-alt"></i></label></div></div>',
                'fields'               => array(
                    'author' => '<div class="comment_form_single"><input id="author" name="author" type="text" placeholder="Type your name...." value="' . esc_attr( $commenter['comment_author'] ) . '"><label for="author"><i class="fal fa-user"></i></label></div>',
                    'email'  => '<div class="comment_form_single"><input id="email" name="email" type="email" placeholder="Type your email...." value="' . esc_attr( $commenter['comment_author_email'] ) . '"><label for="email"><i class="fal fa-user"></i></label></div>',
                    'url'    => '<div class="comment_form_single"><input id="url" name="url" type="text" placeholder="Type your website...." value="' . esc_attr( $commenter['comment_author_url'] ) . '"><label for="url"><i class="fal fa-globe"></i></label></div>',
                ),
            );
            comment_form( $comments_args );
        ?>
    </div>
</div>
