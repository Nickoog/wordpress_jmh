<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

add_theme_support( 'post-thumbnails' ); 

/* INCLUDE ALL CPT FILES */
foreach(glob(get_template_directory() . "/lib/cpt/*.php") as $file){
	require $file;
}

/* ACF OPTION WIDGET */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();	
} 

function wpshout_longer_excerpts( $length ) {
	// Don't change anything inside /wp-admin/
	if ( is_admin() ) {
		return $length;
	}
	// Set excerpt length to 140 words
	return 20;
}
// "999" priority makes this run last of all the functions hooked to this filter, meaning it overrides them
add_filter( 'excerpt_length', 'wpshout_longer_excerpts', 999 );

function wpshout_change_and_link_excerpt( $more ) {
	if ( is_admin() ) {
		return $more;
	}

	// Change text, make it link, and return change
	return '&hellip; <a href="' . get_the_permalink() . '">[...]</a>';
 }
 add_filter( 'excerpt_more', 'wpshout_change_and_link_excerpt', 999 );

 
function jmhtheme_comment( $comment, $args, $depth ) {
    $GLOBALS[ 'comment' ] = $comment;
    switch ( $comment->comment_type ) :
        // case 'pingback' :
        case 'trackback' :
            ?>
            <div class="post pingback">
                <p><?php _e( 'Pingback:', 'jmh-theme' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'jmh-theme' ), ' ' ); ?></p>
            </div>
                <?php
                break;
            default :
                ?>
                <?php
                if ( $depth > 1 ) {
                    echo '<div class="media d-flex ml-5">';
                }
                ?>
            <div class="media justify-content-between w-100 d-flex border-bottom p-2 my-4" <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <?php if($comment->user_id) { ?>

                    <span>
                        <?php echo get_avatar( $comment, 100, $default, $alt, array( 'class' => array( 'd-flex', 'mb-3', 'mx-auto' ) ) ); ?>
                    </span>

                <?php } else { ?>
                    <span>
                        <?php echo get_avatar( $comment, 100 ); ?>
                    </span>
                <?php } ?>
                    <div class="media-body text-center text-md-left ml-md-3 ml-0">
                        <h5 class="mt-0 font-weight-bold">
                    <?php if($comment->user_id) { ?>

                        <a href="<?php echo get_home_url().'/profile/?id='.$comment->user_id ?>" class="user"><?php printf( __( '%s', 'jmh-theme' ), sprintf( '<cite data-toggle="tooltip" data-placement="top" title="View profile" class="fn">%s</cite>', get_comment_author_link() ) ); ?></a>
                    <?php } else { ?>
                        <a class="user"><?php printf( __( '%s', 'jmh-theme' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?></a>
                    <?php } ?>

                        <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args[ 'max_depth' ], 'add_below' => 'li-comment', 'reply_text' => '<i class="fa fa-reply pull-right"></i>' ) ), $comment_id ); ?>

                    </h5>
                    <h6>
                    <i class="fa fa-clock-o"></i> <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
                        <?php
                        /* translators: 1: date, 2: time */
                        printf( __( '%1$s', 'jmh-theme' ), get_comment_date(), get_comment_time() );
                        ?>
                    </time></a>                             <?php edit_comment_link( __( '(Edit)', 'jmh-theme' ), ' ' ); ?>
                    </h6>
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                        <em><?php _e( 'Your comment is awaiting moderation.', 'jmh-theme' ); ?></em>
                        <br />
                    <?php endif; ?>
                    <p><?php echo get_comment_text(); ?></p>
                        <?php
                        if($comment->comment_parent == 0){
                            $comment_id = $comment->comment_ID;
                        }else {
                            $comment_id = $comment->comment_parent;
                        }
                        ?>

            </div>
        </div>

        <?php
        if ( $depth > 1 ) {
            echo '</div>';
        }
        ?>


        <?php
        break;
    endswitch;
}


 show_admin_bar(false);
