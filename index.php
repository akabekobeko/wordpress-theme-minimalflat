<?php get_header(); ?>

<div class="page-main">
    <div class="page-primary">
        <div class="page-content">

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
                    </div>
                </div>

                <?php the_content( __( '(more...)' ) ); ?>

            </article>

<?php endwhile;
else : ?>
            <article class="post">
                <h2><?php __( 'No posts found', 'akabeko2013' ); ?></h2>
                <p><?php __( 'Posts you are looking for was not found.', 'akabeko2013' ); ?></p>
            </article>
<?php endif; ?>

            <nav class="post-navigation">
                <div class="alignleft"><?php previous_posts_link( '<i class="fa fa-chevron-circle-left fa-lg"></i> PREV' ); ?></div>
                <div class="alignright"><?php next_posts_link( 'NEXT <i class="fa fa-chevron-circle-right fa-lg"></i>' ); ?></div>
                <div class="clear"></div>
            </nav>
        </div>
    </div>

    <?php get_sidebar(); ?>

    <div class="clear"></div>
</div>

<?php get_footer(); ?>