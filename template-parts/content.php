<?php
/**
 * Template part for displaying posts
 *
 * @package QP_Green_Park
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card mb-4'); ?>>
    <div class="row g-0">
        <?php if (has_post_thumbnail()) : ?>
            <div class="col-md-4">
                <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                    <?php the_post_thumbnail('medium', array('class' => 'img-fluid rounded-start h-100 object-fit-cover')); ?>
                </a>
            </div>
        <?php endif; ?>
        
        <div class="<?php echo has_post_thumbnail() ? 'col-md-8' : 'col-12'; ?>">
            <div class="card-body">
                <header class="entry-header">
                    <?php
                    the_title('<h2 class="entry-title card-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');

                    if ('post' === get_post_type()) :
                    ?>
                        <div class="entry-meta text-muted mb-2 small">
                            <?php
                            qp_greenpark_posted_on();
                            qp_greenpark_posted_by();
                            ?>
                        </div><!-- .entry-meta -->
                    <?php endif; ?>
                </header><!-- .entry-header -->

                <div class="entry-content card-text">
                    <?php
                    the_excerpt();
                    ?>
                </div><!-- .entry-content -->

                <footer class="entry-footer mt-3">
                    <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-primary"><?php esc_html_e('Read More', 'qp-greenpark'); ?></a>
                </footer><!-- .entry-footer -->
            </div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> --> 