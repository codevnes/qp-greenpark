<?php
/**
 * The template for displaying single posts
 *
 * @package QP_Green_Park
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">

                <?php
                while (have_posts()) :
                    the_post();
                ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class('single-post mb-5'); ?>>
                    <header class="entry-header mb-4">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

                        <div class="entry-meta mb-3">
                            <?php
                            qp_greenpark_posted_on();
                            qp_greenpark_posted_by();
                            ?>
                        </div>
                    </header>

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail mb-4">
                            <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php
                        the_content(
                            sprintf(
                                wp_kses(
                                    /* translators: %s: Name of current post. Only visible to screen readers */
                                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'qp-greenpark'),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                wp_kses_post(get_the_title())
                            )
                        );

                        wp_link_pages(
                            array(
                                'before' => '<div class="page-links">' . esc_html__('Pages:', 'qp-greenpark'),
                                'after'  => '</div>',
                            )
                        );
                        ?>
                    </div>

                    <footer class="entry-footer mt-4">
                        <?php qp_greenpark_entry_footer(); ?>
                    </footer>
                </article>

                <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                endwhile; // End of the loop.
                ?>

            </div>
            <div class="col-lg-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer(); 