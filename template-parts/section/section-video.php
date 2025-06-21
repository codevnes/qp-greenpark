<div class="section-video section pp-section" data-anchor="video">
    <div class="section-content">
        <div class="video-background">
            <?php 
            $video_url = wp_get_attachment_url(67);
            if ($video_url) :
            ?>
            <video 
                id="my-video"
                class="video-js vjs-fill vjs-big-play-centered"
                autoplay
                muted
                loop
                playsinline
                poster=""
                data-setup='{"controls": false, "autoplay": true, "preload": "auto"}'
            >
                <source src="<?php echo esc_url($video_url); ?>" type="video/mp4" />
            </video>
            <?php endif; ?>
        </div>
        <div class="video-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 d-none" data-aos="fade-right" data-aos-duration="1000">
                        <h2 class="section-title">QP Green Park</h2>
                        <p class="section-subtitle">Experience luxury living in harmony with nature</p>
                    </div>
                    <div class="col-md-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <a href="#introduction" class="btn btn-srcoll-down">
                            <i class="fa-light fa-arrow-down"></i>
                        </a>
                    </div>
                    <div class="col-md-5 d-none" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
                        <p>Khu Nhà Ở Quang Phúc 3 – tâm điểm phồn hoa mới tại trung tâm Bắc Tân Uyên. Dự án sở hữu vị trí chiến lược, kiến trúc hiện đại đẳng cấp cùng hệ tiện ích hoàn hảo, mang đến không gian sống thời thượng cho cư dân.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>