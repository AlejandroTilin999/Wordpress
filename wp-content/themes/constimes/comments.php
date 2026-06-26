<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 */
?>
<?php
// If the current post is protected by a password and the visitor has not yet 
// entered the password we will return early without loading the comments.
// ----------------------------------------------------------------------------------------
if ( post_password_required() ) {
    return;
}
?>

<?php if ( have_comments() || comments_open()) : ?>

    
    <div class="post-comments"> 
            <div class="all-comments">
            <?php
                    $comment_no = number_format_i18n( get_comments_number() );
                    $comment_text = ( !empty( $comment_no ) AND ( $comment_no > 1 ) ) ? esc_html__( ' Comments', 'constimes' ) : esc_html__( ' Comment ', 'constimes' );
                    $comment_no = ( !empty( $comment_no ) AND ( $comment_no > 0 ) ) ? '<h3>' . esc_html( $comment_no . $comment_text ) . '</h3>' : ' ';
                    print sprintf( "%s", $comment_no );
                ?>
                <ul>

                <?php
                        wp_list_comments( [
                            'style'       => 'ul',
                            'callback'    => 'constimes_comment',
                            // 'avatar_size' => 90,
                            'short_ping'  => true,
                        ] );
                    ?>
                </ul>
            </div>
            <div class="comments-form wow animate__fadeInUp" data-wow-duration="1s" data-wow-delay="0s" style="visibility: visible; animation-duration: 1s; animation-delay: 0s; animation-name: L;">
            <?php
            $post_id = '';
            if ( null === $post_id )
                $post_id = get_the_ID();
            else
                $id      = $post_id;
        
            $commenter       = wp_get_current_commenter();
            $user            = wp_get_current_user();
            $user_identity   = $user->exists() ? $user->display_name : '';
        
        
            $req         = get_option( 'require_name_email' );
            $aria_req    = ( $req ? " aria-required='true'" : '' );
        
            $fields = array(
                'author' => '<input placeholder="'.  esc_attr__('Enter Name', 'constimes').'" id="author" class="tp-form-control" name="author" type="text" value="' . esc_attr( $commenter[ 'comment_author' ] ) . '" size="30"' . $aria_req . ' />',
                'email'  => '<input placeholder="'.  esc_attr__('Enter Email', 'constimes').'" id="email" name="email" class="tp-form-control" type="email" value="' . esc_attr( $commenter[ 'comment_author_email' ] ) . '" size="30"' . $aria_req . ' />',
                'url'    => '<input placeholder="'.  esc_attr__('Enter Website', 'constimes').'" id="url" name="url" class="tp-form-control" type="url" value="' . esc_attr( $commenter[ 'comment_author_url' ] ) . '" size="30" />'
            );
        
            if ( is_user_logged_in() ) {
                $cl = 'loginformuser';
            } else {
                $cl = '';
            }
            $defaults = [
                'fields'             => $fields,
                'comment_field'      => '
                    <textarea class="tp-form-control msg-box" placeholder="'.  esc_attr__('Enter Your Comments', 'constimes').'" id="comment" name="comment" aria-required="true"></textarea>
                ',
                'submit_button'    => '<button class="link-anime v2" type="submit">' . esc_html__( 'Post Comment', 'constimes' ) . ' </button>',
                /** This filter is documented in wp-includes/link-template.php */
                'must_log_in'        => '
                    <p class="must-log-in">
                    '.esc_html__('You must be','constimes').' <a href="'.esc_url(wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) )).'">'.esc_html__('logged in','constimes').'</a> '.esc_html__('to post a comment.','constimes').'
                    </p>',
                /** This filter is documented in wp-includes/link-template.php */
                'logged_in_as'       => '
                    <p class="logged-in-as">
                    '.esc_html__('Logged in as','constimes').' <a href="'.esc_url(get_edit_user_link()).'">'.esc_html($user_identity).'</a>. <a href="'.esc_url(wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) )).'" title="'.esc_attr__('Log out of this account','constimes').'">'.esc_html__('Log out?','constimes').'</a>
                    </p>',
                'id_form'            => 'commentform',
                'id_submit'          => 'submit',
                'class_submit'       => 'tp-btn',
                'title_reply'        => esc_html__( 'Add a Comment', 'constimes' ),
                'title_reply_to'     => esc_html__( 'Leave a Reply to %s', 'constimes' ),
                'cancel_reply_link'  => esc_html__( 'Cancel reply', 'constimes' ),
                'label_submit'       => esc_html__( 'Submit Comment', 'constimes' ),
                'format'             => 'xhtml',
            ];
        
            comment_form( $defaults );
            ?>


            </div>
    </div>


    <div id="comments" class="blog-post-comment">


        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ): ?>
            <div class="comment-pagination mb-5">
                <nav id="comment-nav-below" class="comment-navigation" role="navigation">
                    <h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'constimes' );?></h1>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="nav-previous "><?php previous_comments_link( esc_html__( '&larr; Older ', 'constimes' ) );?></div>
                        </div>
                        <div class="col-md-6">
                            <div class="nav-next "><?php next_comments_link( esc_html__( 'Newer &rarr;', 'constimes' ) );?></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </nav><!-- #comment-nav-below -->
            </div>
        <?php endif; // check for comment navigation ?>
    
    


    </div><!-- #comments -->
<?php endif;