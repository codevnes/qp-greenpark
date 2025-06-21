<?php
/**
 * The main template file
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
                if (have_posts()) :

                    if (is_home() && !is_front_page()) :
                        ?>
                        <header>
                            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                        </header>
                        <?php
                    endif;

                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();

                        /*
                         * Include the Post-Type-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                         */
                        get_template_part('template-parts/content', get_post_type());

                    endwhile;

                    // Bootstrap 5 pagination
                    echo '<div class="pagination-container mt-5">';
                    echo '<nav aria-label="Page navigation">';
                    echo '<ul class="pagination justify-content-center">';
                    
                    $big = 999999999; // need an unlikely integer
                    $paginate_links = paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total' => $wp_query->max_num_pages,
                        'type' => 'array',
                        'prev_text' => '&laquo;',
                        'next_text' => '&raquo;',
                    ));
                    
                    if (is_array($paginate_links)) {
                        foreach ($paginate_links as $link) {
                            // Convert default output to Bootstrap 5 pagination format
                            if (strpos($link, 'current') !== false) {
                                echo '<li class="page-item active">' . str_replace('page-numbers', 'page-link', $link) . '</li>';
                            } else {
                                echo '<li class="page-item">' . str_replace('page-numbers', 'page-link', $link) . '</li>';
                            }
                        }
                    }
                    
                    echo '</ul>';
                    echo '</nav>';
                    echo '</div>';

                else :

                    get_template_part('template-parts/content', 'none');

                endif;
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
