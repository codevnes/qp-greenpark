<?php
/**
 * The main template file for the blog page
 *
 * @package QP_Green_Park
 */

get_header();

// Get all categories for navigation
$categories = get_categories(array(
    'orderby' => 'name',
    'order'   => 'ASC',
    'hide_empty' => true,
));
?>

<main id="primary" class="site-main">
    <div class="category-archive">
        <div class="category-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="category-title"><?php echo get_the_title(get_option('page_for_posts')); ?></h1>
                        
                        <?php if (!empty($categories)) : ?>
                            <div class="category-nav">
                                <ul class="category-nav__list">
                                    <li class="category-nav__item is-active">
                                        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="category-nav__link">
                                            Tất cả
                                        </a>
                                    </li>
                                    <?php foreach ($categories as $category) : ?>
                                        <li class="category-nav__item">
                                            <a href="<?php echo get_category_link($category->term_id); ?>" class="category-nav__link">
                                                <?php echo $category->name; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="category-content">
            <div class="container">
                <?php if (have_posts()) : ?>
                    <div class="row post-grid">
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="col-md-6 col-lg-4 post-grid__item">
                                <article id="post-<?php the_ID(); ?>" <?php post_class('news-item'); ?>>
                                    <a href="<?php the_permalink(); ?>" class="news-item__link">
                                        <div class="news-item__card">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div class="news-item__image">
                                                    <?php the_post_thumbnail('medium'); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="news-item__content">
                                                <h3 class="news-item__title"><?php the_title(); ?></h3>
                                                <div class="news-item__meta">
                                                    <div class="news-item__date">
                                                        <?php echo get_the_date('d'); ?>
                                                        <span><?php echo get_the_date('.m.Y'); ?></span>
                                                    </div>
                                                    <span class="news-item__button">
                                                        <i class="fa-light fa-arrow-right"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    
                    <div class="pagination-wrapper">
                        <?php
                        the_posts_pagination(array(
                            'mid_size'  => 2,
                            'prev_text' => '<i class="fa-light fa-arrow-left"></i>',
                            'next_text' => '<i class="fa-light fa-arrow-right"></i>',
                        ));
                        ?>
                    </div>
                    
                <?php else : ?>
                    <div class="row">
                        <div class="col-12">
                            <p class="no-posts">Không có bài viết nào.</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?> 