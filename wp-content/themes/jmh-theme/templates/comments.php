<?php
/*
* If the current post is protected by a password and
* the visitor has not yet entered the password we will
* return early without loading the comments.
*/
if ( post_password_required() )
    return;
?>

<section id="comments" class="comments container">
    <h5 class="comment-header text-uppercase">
        <?php if(get_comment_pages_count() > 1) echo ' class="mb-1"';?> <?php echo (get_comments_number()) ? get_comments_number() : '';?> Comments
    </h5>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through? If so, show navigation ?>
        <nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation text-center mb-2">

            <?php previous_comments_link( __( '<i class="fa fa-caret-left left" aria-hidden="true"></i> Commentaires plus anciens', 'jmh-theme' ) ); ?>

            <?php next_comments_link( __( 'Commentaires récents <i class="fa fa-caret-right right" aria-hidden="true"></i>', 'jmh-theme' ) ); ?>

        </nav>
        <!-- #comment-nav-before .site-navigation .comment-navigation -->
    <?php endif; // check for comment navigation ?>
    <?php
        $args = array(
            'status' => 'approve',
            'number' => '15', // whatever number of comments you wish to display.
            'post_id' => get_the_ID(), // use post_id, not post_ID - replace 18 by your post ID
        );
        $comments = get_comments($args);
        wp_list_comments( array(
            'avatar_size' => 60,
            'max_depth'   => 2,
            'short_ping'  => true,
            'callback'    => 'jmhtheme_comment',
            'type'        => 'comment',
        ), $comments );
    ?>
    <!-- .commentlist -->

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through? If so, show navigation ?>
        <nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation text-center mb-2">
            <?php previous_comments_link( __( '<i class="fa fa-caret-left left" aria-hidden="true"></i> Commentaires plus anciens', 'jmh-theme' ) ); ?>

            <?php next_comments_link( __( 'Commentaires récents <i class="fa fa-caret-right right" aria-hidden="true"></i>', 'jmh-theme' ) ); ?>
        </nav>
        <!-- #comment-nav-below .site-navigation .comment-navigation -->
        <?php endif; // check for comment navigation ?>

        <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        ?>
        <p class="nocomments">
            <?php _e( 'Les commentaires sont fermés.', 'jmh-theme' ); ?>
        </p>
        <?php endif; ?>
            <?php
            $current_user = wp_get_current_user()->user_nicename;
            $aria_req = ( $req ? " aria-required='true'" : '' );
            $args = array(
            'fields' => apply_filters(
                'comment_form_default_fields', array(
                    'author' =>'

                    <!-- Name -->
                    <label for="name">'. __( 'Votre nom' ) . ( $req ? '<span class="required">*</span>' : '' )  .' </label>
                    <input type="text" id="author" name="author" class="form-control" value="' .
                        esc_attr( $commenter['comment_author'] ) . '" '. $aria_req . '>
                    ',

                    'email'  => '
                    <!-- Email -->
                    <label for="email">'. __( 'Votre email', 'jmh-theme' ) . ( $req ? '<span class="required">*</span>' : '' ). '</label>
                    <input type="text" id="email" name="email" class="form-control" ' . $aria_req .' value="' . esc_attr(  $commenter['comment_author_email'] ) .
                        '">
                    '
                )
            ),
            'comment_field' => (is_user_logged_in() ? '
                        <!--Third row-->
                        <div class="row">
                            <!--Image column-->
                            <div class="col-sm-2 col-xs-12">' .
                                get_avatar( get_current_user_id(), 100 ) .
                            '</div>
                            <!--/.Image column-->

                            <!--Content column-->
                            <div class="col-sm-10 col-12">

                                <!-- Comment -->
                                <div class="form-group">
                                    <label for="comment">Votre commentaire</label>
                                    <textarea id="comment" name="comment" type="text"  class="form-control" rows="5"></textarea>
                                </div>


                            </div>
                            <!--/.Content column-->

                        </div>
                        <!--/.Third row-->': '
                        <!-- Comment -->
                        <div class="form-group">
                            <label for="comment">Votre commentaire</label>
                            <textarea id="comment" name="comment" type="text"  class="form-control" rows="5"></textarea>
                        </div>'),
                'comment_notes_after' => '',
                'comment_notes_before' => '',
                'logged_in_as' => '<p class="text-center">('. sprintf(
                                     __( 'Connecté en tant que <a href="%1$s">%2$s</a>' . $current_user . '! <a href="%3$s" title="Déconnectez-vous de ce compte">Se déconnecter?</a>' ),
                                    admin_url( 'profile.php' ),
                                    $user_identity,
                                    wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
                                ) . ')</p>  ',
                'title_reply' => '',
                'class_submit' => 'btn btn-info btn-md ',
                'label_submit' => 'Commenter'

            );
        ?>
        <!--Leave a reply section-->
        <h5 class="reply-header text-uppercase mt-5">
            <?php _e('Laisser un commentaire', 'jmh-theme')?> 
        </h5>
        <div class="my-4">
            <?php comment_form($args ); ?>
        </div>
        <!--/.Leave a reply section-->
</section>
<!-- #comments .comments-area -->