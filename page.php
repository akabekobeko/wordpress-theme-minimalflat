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
                        <?php edit_post_link( __( 'Edit', 'minimalflat' ), '<i class="fa fa-pencil-square"></i> ', '' ); ?>
                    </div>
                </div>

                <?php the_content(); ?>

                <?php comments_template(); ?>
            </article>

<?php endwhile;
else : ?>
            <article class="post">
                <h2><?php __( 'No pages found', 'minimalflat' ); ?></h2>
                <p><?php __( 'Pages you are looking for was not found.', 'minimalflat' ); ?></p>
            </article>
<?php endif; ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>