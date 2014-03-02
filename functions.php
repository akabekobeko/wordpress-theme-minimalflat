<?php

load_theme_textdomain( 'akabeko2013', get_template_directory() . '/languages' );

// Require: Content width
if( ! isset( $content_width ) ) { $content_width = 640; }

// Reccomended: Feed
add_theme_support( 'automatic-feed-links' );

// Reccomended: Post thumbnail
add_theme_support( 'post-thumbnails' );

// Reccomended: Editor style
add_editor_style( 'editor_style.css' );

// Reccomended: Sidebar
register_sidebar( array( 'name'          => __( 'Sidebar', 'akabeko2013' ),
                         'id'            => 'sidebar-1',
                         'description'   => __( 'Suderbar area', 'akabeko2013' ),
                         'before_widget' => '<div id="%1$s" class="widget %2$s">',
                         'after_widget'  => '</div>' )
);

// Reccomended: Custom background
add_theme_support( 'custom-background',
                    array( 'default-color' => 'f5f5f5',
                           'default-image' => get_template_directory_uri() . '/images/page-back.png' )
);

// Reccomended: Custom header
add_theme_support( 'custom-header',
                    array( 'width'         => 32,
                           'height'        => 32,
                           'header-text'   => false )
);

/**
 * Load theme stylesheets.
 */
function mytheme_stylesheets()
{
    wp_enqueue_style( 'font-awesome',     '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css' );
    wp_enqueue_style( 'normalize',         get_template_directory_uri() . '/normalize.css' );
    wp_enqueue_style( 'akabeko2013-style', get_stylesheet_uri() );
}
add_action( 'wp_print_styles', 'mytheme_stylesheets' );

/**
 * Get the comments of the article.
 *
 * @return comments.
 */
function get_comment_only_number()
{
    global $wpdb, $tablecomments, $post;
    $comments = $wpdb->get_results( "SELECT * FROM $wpdb->comments WHERE comment_post_ID = $post->ID AND comment_type NOT REGEXP '^(trackback|pingback)$' AND comment_approved = '1'" );

    return count( $comments );
}

/**
 * Output the pin-backs to the article.
 *
 * @param $comment Comment.
 * @param $args    Default args.
 * @param $depth   Defaukt depth.
 */
function mytheme_pings( $comment, $args, $depth )
{
    $GLOBALS['comment'] = $comment; ?>
    <li><i class="fa fa-external-link-square"></i> <?php echo comment_date(); ?> : <?php comment_author_link(); ?>
<?php }

/**
 * Output the comment to the article.
 *
 * @param $comment Comment.
 * @param $args    Default args.
 * @param $depth   Defaukt depth.
 */
function mytheme_comment( $comment, $args, $depth )
{
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <div id="comment-<?php comment_ID(); ?>" class="comment-body">
        <?php echo get_avatar( $comment, 44 ); ?>
        <?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link()) ?>
        <div class="comment-meta">
            <?php printf( '%1$s', get_comment_date() . ' ' . get_comment_time() ) ?><?php edit_comment_link( __( 'Edit', 'akabeko2013' ),'  ','' ) ?>
        </div>
        <?php if( $comment->comment_approved == '0') : ?>
            <p class="wait"><?php _e( 'Pending', 'akabeko2013' ) ?></p>
        <?php endif; ?>
        <?php comment_text() ?>
        <div class="reply">
            <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'akabeko2013' ) . ' <i class="fa fa-reply"></i>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
        </div>
    </div>
<?php }

/**
 * Customize the tag-cloud.
 *
 * @param $args Default settings.
 *
 * @return New settings.
 */
function mytheme_widget_tag_cloud_args( $args )
{
    $args = array(
        'unit'     => 'em',
        'number'   => 20,
        'smallest' => 0.8,
        'largest'  => 0.8
    );

    return $args;
}
add_filter( 'widget_tag_cloud_args', 'mytheme_widget_tag_cloud_args');

?>