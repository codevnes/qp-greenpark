<?php
/**
 * Section Perspective 3D
 * 
 * @package QP_GreenPark
 */

// Get the album data
$album = qp_greenpark_get_photo_album();
if (!$album || empty($album['images'])) return;
?>

<div class="section-perspective section pp-section" data-anchor="perspective">
    <div class="section-content">
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="section-title">
                    <span>PHỐI CẢNH 3D</span>
                    <br />
                    <strong>TỔNG THỂ DỰ ÁN</strong>
                </h2>
                <div class="section-divider mx-auto"></div>
            </div>
            
            <div class="perspective-carousel gp-carousel owl-carousel">
                <?php foreach ($album['images'] as $image) : ?>
                <div class="perspective-item">
                    <a href="<?php echo esc_url($image['url']); ?>" class="perspective-image" data-fancybox="perspective-gallery">
                        <img src="<?php echo esc_url($image['url']); ?>" 
                             alt="<?php echo esc_attr($image['alt'] ?: $album['title']); ?>" 
                             class="img-fluid">
                        <div class="perspective-overlay">
                            <span class="perspective-icon">
                                <i class="fa-regular fa-plus"></i>
                            </span>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>