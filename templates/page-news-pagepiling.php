<?php
/**
 * Template Name: Trang Tin Tức (Pagepiling)
 *
 * @package QP_Green_Park
 */

get_header();

// Get categories
$categories = get_categories(array(
    'orderby' => 'name',
    'order'   => 'ASC',
    'hide_empty' => true,
));

// Filter out empty categories
$valid_categories = array();
foreach ($categories as $category) {
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 1,
        'cat' => $category->term_id,
    );
    $query = new WP_Query($args);
    
    if ($query->have_posts()) {
        $valid_categories[] = $category;
    }
    wp_reset_postdata();
}

// Create anchors for pagepiling
$anchors = array();
foreach ($valid_categories as $category) {
    $anchors[] = $category->slug;
}
?>

<div class="page page-pagepiling">
    <div id="pagepiling" class="news-pagepiling">
        <?php if (!empty($valid_categories)) : ?>
            <?php foreach ($valid_categories as $category) : ?>
                <div class="section news-section pp-section" data-anchor="<?php echo $category->slug; ?>">
                    <div class="section-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="section-title" data-aos="fade-up" data-aos-duration="800">
                                        <?php echo $category->name; ?>
                                    </h2>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <?php
                                    // Get posts for this category
                                    $args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 6,
                                        'cat' => $category->term_id,
                                    );
                                    $query = new WP_Query($args);
                                    
                                    if ($query->have_posts()) : ?>
                                        <div class="news-carousel owl-carousel" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                                <div class="news-item">
                                                    <a href="<?php the_permalink(); ?>" class="news-item__link">
                                                        <div class="news-item__card">
                                                            <?php if (has_post_thumbnail()) : ?>
                                                                <div class="news-item__image">
                                                                    <?php the_post_thumbnail('medium'); ?>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="news-item__content">
                                                                <h5 class="news-item__title"><?php the_title(); ?></h5>
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
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                        
                                        <div class="news-view-more-wrapper" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                                            <a href="<?php echo get_category_link($category->term_id); ?>" class="btn-view-more">
                                                XEM THÊM <?php echo $category->name; ?>
                                                <span class="btn-icon">
                                                    <i class="fa-light fa-arrow-right"></i>
                                                </span>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <?php wp_reset_postdata(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="section news-section pp-section">
                <div class="section-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <p>Không có danh mục bài viết nào.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    // Pass category anchors to pagepiling initialization
    var newsAnchors = <?php echo json_encode($anchors); ?>;
</script>

<?php
get_footer();
?> 