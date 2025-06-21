<?php
/**
 * The template for displaying property single posts
 *
 * @package QP_Green_Park
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container py-5">
        <?php
        while (have_posts()) :
            the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('property-single'); ?>>
            <div class="row">
                <div class="col-lg-8">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="property-gallery mb-4">
                            <div class="main-image">
                                <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
                            </div>
                            
                            <?php
                            // Check if ACF is active and get gallery images
                            if (function_exists('get_field')) :
                                $gallery_images = get_field('property_gallery');
                                if ($gallery_images) : ?>
                                    <div class="property-gallery-thumbs owl-carousel mt-3">
                                        <?php foreach ($gallery_images as $image) : ?>
                                            <a href="<?php echo esc_url($image['url']); ?>" data-fancybox="property-gallery">
                                                <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid rounded">
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif;
                            endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="property-content">
                        <header class="property-header mb-4">
                            <?php the_title('<h1 class="property-title">', '</h1>'); ?>
                            
                            <?php
                            // Property address (ACF field)
                            if (function_exists('get_field')) :
                                $address = get_field('property_address');
                                if ($address) : ?>
                                    <div class="property-address">
                                        <i class="bi bi-geo-alt"></i> <?php echo esc_html($address); ?>
                                    </div>
                                <?php endif;
                            endif; ?>
                        </header>

                        <div class="property-features mb-4">
                            <div class="row">
                                <?php
                                // Property features (ACF fields)
                                if (function_exists('get_field')) :
                                    $price = get_field('property_price');
                                    $size = get_field('property_size');
                                    $bedrooms = get_field('property_bedrooms');
                                    $bathrooms = get_field('property_bathrooms');
                                ?>
                                    <?php if ($price) : ?>
                                    <div class="col-6 col-md-3 mb-3">
                                        <div class="feature-item">
                                            <div class="feature-title">Giá</div>
                                            <div class="feature-value"><?php echo esc_html($price); ?></div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <?php if ($size) : ?>
                                    <div class="col-6 col-md-3 mb-3">
                                        <div class="feature-item">
                                            <div class="feature-title">Diện tích</div>
                                            <div class="feature-value"><?php echo esc_html($size); ?> m²</div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <?php if ($bedrooms) : ?>
                                    <div class="col-6 col-md-3 mb-3">
                                        <div class="feature-item">
                                            <div class="feature-title">Phòng ngủ</div>
                                            <div class="feature-value"><?php echo esc_html($bedrooms); ?></div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <?php if ($bathrooms) : ?>
                                    <div class="col-6 col-md-3 mb-3">
                                        <div class="feature-item">
                                            <div class="feature-title">Phòng tắm</div>
                                            <div class="feature-value"><?php echo esc_html($bathrooms); ?></div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="property-description mb-4">
                            <h3>Mô tả</h3>
                            <?php the_content(); ?>
                        </div>

                        <?php
                        // Property amenities (ACF field)
                        if (function_exists('get_field')) :
                            $amenities = get_field('property_amenities');
                            if ($amenities) : ?>
                                <div class="property-amenities mb-4">
                                    <h3>Tiện ích</h3>
                                    <ul class="amenities-list">
                                        <?php foreach ($amenities as $amenity) : ?>
                                            <li><?php echo esc_html($amenity); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif;
                        endif; ?>

                        <?php
                        // Property location map (ACF field)
                        if (function_exists('get_field')) :
                            $location = get_field('property_location');
                            if ($location) : ?>
                                <div class="property-map mb-4">
                                    <h3>Vị trí</h3>
                                    <div class="acf-map" data-zoom="16">
                                        <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
                                    </div>
                                </div>
                            <?php endif;
                        endif; ?>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="property-sidebar sticky-top">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="card-title">Liên hệ tư vấn</h3>
                                
                                <?php
                                // Property contact form (shortcode from Contact Form 7)
                                if (function_exists('get_field')) :
                                    $contact_form = get_field('property_contact_form');
                                    if ($contact_form) :
                                        echo do_shortcode($contact_form);
                                    endif;
                                endif; ?>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Dự án cùng khu vực</h3>
                                
                                <?php
                                // Get related properties by location
                                $current_id = get_the_ID();
                                $related_args = array(
                                    'post_type' => 'property',
                                    'posts_per_page' => 3,
                                    'post__not_in' => array($current_id),
                                    'orderby' => 'rand',
                                );
                                
                                // Add taxonomy query if property has terms
                                $property_types = get_the_terms(get_the_ID(), 'property-type');
                                if ($property_types && !is_wp_error($property_types)) {
                                    $property_type_ids = array();
                                    foreach ($property_types as $property_type) {
                                        $property_type_ids[] = $property_type->term_id;
                                    }
                                    $related_args['tax_query'] = array(
                                        array(
                                            'taxonomy' => 'property-type',
                                            'field' => 'term_id',
                                            'terms' => $property_type_ids,
                                        ),
                                    );
                                }
                                
                                $related_properties = new WP_Query($related_args);
                                
                                if ($related_properties->have_posts()) :
                                    while ($related_properties->have_posts()) : $related_properties->the_post();
                                ?>
                                    <div class="related-property mb-3">
                                        <div class="row g-0">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div class="col-4">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid rounded')); ?>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <div class="col<?php echo has_post_thumbnail() ? '-8' : ''; ?> ps-3">
                                                <h4 class="fs-6 mb-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                <?php if (function_exists('get_field')) : ?>
                                                    <?php $price = get_field('property_price'); ?>
                                                    <?php if ($price) : ?>
                                                        <div class="property-price"><?php echo esc_html($price); ?></div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    endwhile;
                                    wp_reset_postdata();
                                else :
                                    echo '<p>Không có dự án nào.</p>';
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <?php endwhile; // End of the loop. ?>
    </div>
</main>

<?php
get_footer(); 