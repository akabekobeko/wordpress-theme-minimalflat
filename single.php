<?php get_header(); ?>

<div class="page-main">
    <div class="page-primary">
        <div class="page-content-single">

<?php if( have_posts() ) :
while( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="post-header">
                    <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <div class="post-meta">
                        <i class="fa fa-clock-o"></i> <span class="post-date"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
                        <i class="fa fa-comment"></i> <span class="comment-num"><?php comments_popup_link( '0','1','%','','-' ); ?></span>
                        <i class="fa fa-folder" title="category"></i> <?php the_category( ', ' ); ?> 
                        <i class="fa fa-tags" title="tags"></i> <?php the_tags( '', ', ' ); ?>
                        <?php edit_post_link( __( 'Edit', 'akabeko2013' ), '<i class="fa fa-pencil-square"></i> ', '' ); ?> 
                    </div>
                </div>

                <?php the_post_thumbnail(); ?>
                <?php the_content(); ?>

                <?php $args = array( 'before' => '<div class="page-link">',
                                     'after' => '</div>',
                                     'link_before' => '<span>',
                                     'link_after' => '</span>',
                              );
                        wp_link_pages( $args ); ?>

                <nav class="post-navigation">
                    <div class="alignleft"><?php previous_post_link( '%link', '<i class="fa fa-chevron-circle-left fa-lg"></i> %title'); ?></div>
                    <div class="alignright"><?php next_post_link( '%link', '%title <i class="fa fa-chevron-circle-right fa-lg"></i>'); ?></div>
                    <div class="clear"></div>
                </nav>

                <?php comments_template(); ?>

            </article>

<?php endwhile;
else : ?>
            <article class="post">
                <h2><?php __( 'No posts found', 'akabeko2013' ); ?></h2>
                <p><?php __( 'Posts you are looking for was not found.', 'akabeko2013' ); ?></p>
            </article>
<?php endif; ?>

            </div>
        </div>

    <div class="clear"></div>
</div>

<?php get_footer(); ?>
