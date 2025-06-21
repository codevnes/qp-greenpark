<div class="section-news section pp-section" data-anchor="news">
    <div class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    // Get categories for tabs
                    $categories = get_categories(array(
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'hide_empty' => true,
                    ));
                    
                    if (!empty($categories)) : ?>
                    <div class="news-tabs" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                        <ul class="nav nav-tabs" id="newsTab" role="tablist">
                            <?php 
                            $first = true;
                            foreach ($categories as $index => $category) : ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?php echo $first ? 'active' : ''; ?>" 
                                            id="tab-<?php echo $category->slug; ?>" 
                                            data-bs-toggle="tab" 
                                            data-bs-target="#content-<?php echo $category->slug; ?>" 
                                            type="button" 
                                            role="tab" 
                                            aria-controls="content-<?php echo $category->slug; ?>" 
                                            aria-selected="<?php echo $first ? 'true' : 'false'; ?>">
                                        <?php echo $category->name; ?>
                                    </button>
                                </li>
                                <?php $first = false; ?>
                            <?php endforeach; ?>
                        </ul>
                        
                        <div class="tab-content" id="newsTabContent">
                            <?php 
                            $first = true;
                            foreach ($categories as $index => $category) : ?>
                                <div class="tab-pane fade <?php echo $first ? 'show active' : ''; ?>" 
                                     id="content-<?php echo $category->slug; ?>" 
                                     role="tabpanel" 
                                     aria-labelledby="tab-<?php echo $category->slug; ?>">
                                     
                                    <?php
                                    // Get recent posts for this category
                                    $args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 6,
                                        'cat' => $category->term_id,
                                    );
                                    $query = new WP_Query($args);
                                    
                                    if ($query->have_posts()) : ?>
                                        <div class="news-carousel owl-carousel" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
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
                                        
                                        <div class="news-view-more-wrapper" data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
                                            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn-view-more">
                                                XEM THÊM
                                                <span class="btn-icon">
                                                    <i class="fa-light fa-arrow-right"></i>
                                                </span>
                                            </a>
                                        </div>
                                    <?php 
                                    else : 
                                        echo '<p>Không có bài viết nào trong danh mục này.</p>';
                                    endif;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                                <?php $first = false; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php else : ?>
                        <p>Không có danh mục bài viết nào.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>