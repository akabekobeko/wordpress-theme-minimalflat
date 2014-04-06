<!-- comment-area -->
<div class="comment-area">

<?php if( have_comments() ): ?>

<?php $comments_cnt = get_comment_only_number(); ?>

<!-- Ping-back -->
<?php if( get_comments_number() - $comments_cnt > 0 ) { ?>
<h3>TRACKBACKS</h3>
    <ol class="commets-list">
        <?php wp_list_comments('type=pings&callback=mytheme_pings'); ?>
    </ol>
<?php } ?>

<!-- Comment -->
<?php if( $comments_cnt > 0 ) { ?>
<h3 id="comments">COMMENTS</h3>
    <ol class="commets-list">
        <?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
    </ol>
    <div class="comment-page-link">
        <?php paginate_comments_links(); ?>
    </div>
<?php } ?>

<?php endif; ?>

<?php $args = array(
    'title_reply'  => 'REPLY',
    'label_submit' => __( 'Submit comment', 'minimalflat' ),
    'fields' => array(
        'author' => '<p class="comment-form-author"><i class="fa fa-user"></i> <label for="author">' . __( 'Name', 'minimalflat' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"  placeholder="' . __( 'Name', 'minimalflat' ) . '" size="30" /></p>',

        'email' => '<p class="comment-form-email"><i class="fa fa-envelope-o"></i> <label for="email">' . __( 'Email', 'minimalflat' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" placeholder="' . __( 'Email', 'minimalflat' ) . '" size="30" /></p>',

        'url' => '<p id="comment-form-url"><i class="fa fa-globe"></i> <label for="url">' . __( 'Website', 'minimalflat' ) . '</label>' . '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . __( 'Website', 'minimalflat' ) . '" size="60" /></p>'
    ),

    'comment_field' => '<p class="comment-form-comment"><i class="fa fa-comment"></i> <label for="comment">' . __( 'Comment', 'minimalflat' ) . ' <span class="required">*</span></label><br /><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',

    'comment_notes_after' => ''
);

comment_form( $args ); ?>

</div>
<!-- /comment-area -->
