<div class="section-contact section pp-section" data-anchor="contact">
    <div class="section-content">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 contact-info" data-aos="fade-right" data-aos-duration="1000">
                    <div class="contact-logo">
                        <?php echo qp_greenpark_get_image('logo.png', 'QP Green Park', 'img-fluid w-25'); ?>
                    </div>

                    <div class="contact-contact-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon">
                            <i class="fa-light fa-location-dot"></i>
                        </div>
                        <div class="content">
                            <h4>Địa chỉ</h4>
                            <p>Tầng L16, Tòa Nhà Vietcombank, Số 5 Công Trường Mễ Linh, Phường Bến Nghé, Quận 1, TP. Hồ
                                Chí Minh</p>
                        </div>
                    </div>

                    <div class="contact-contact-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon">
                            <i class="fa-light fa-phone"></i>
                        </div>
                        <div class="content">
                            <h4>Hotline</h4>
                            <p>(028) 35 28 28 28</p>
                        </div>
                    </div>

                    <div class="contact-contact-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon">
                            <i class="fa-light fa-envelope"></i>
                        </div>
                        <div class="content">
                            <h4>Email</h4>
                            <p>info@qpgroup.vn</p>
                        </div>
                    </div>

                    <div class="contact-contact-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon">
                            <i class="fa-light fa-fax"></i>
                        </div>
                        <div class="content">
                            <h4>Fax</h4>
                            <p>(028) 35 18 18 18</p>
                        </div>
                    </div>

                    <div class="contact-social" data-aos="fade-up" data-aos-delay="500">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="col-lg-6 contact-form" data-aos="fade-left" data-aos-duration="1000">
                    <div class="contact-form-wrapper">
                        <?php
                        // Contact Form 7 shortcode
                        if (function_exists('wpcf7_contact_form')) {
                            echo do_shortcode('[contact-form-7 id="contact-form" title="Contact Form"]');
                        } else {
                            // Fallback if CF7 is not active
                            ?>
                            <form class="contact-form">
                                <div class="form-row">
                                    <div class="form-group">
                                        <input type="text" name="contact-name" class="form-control"
                                            placeholder="HỌ TÊN (*)">
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" name="contact-phone" class="form-control"
                                            placeholder="ĐIỆN THOẠI (*)">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="email" name="contact-email" class="form-control" placeholder="EMAIL">
                                </div>

                                <div class="form-group select-group">
                                    <select name="contact-property-type" class="form-control">
                                        <option value="" disabled selected>CHỌN LOẠI CĂN HỘ BẠN QUAN TÂM</option>
                                        <option value="Studio">Studio</option>
                                        <option value="1-bedroom">1 Phòng ngủ</option>
                                        <option value="2-bedroom">2 Phòng ngủ</option>
                                        <option value="3-bedroom">3 Phòng ngủ</option>
                                        <option value="penthouse">Penthouse</option>
                                    </select>
                                    <span class="select-icon"><i class="fa-light fa-plus"></i></span>
                                </div>

                                <div class="form-group">
                                    <textarea name="contact-message" class="form-control" rows="3"
                                        placeholder="LỜI NHẮN"></textarea>
                                </div>

                                <div class="form-submit">
                                    <button type="submit" class="btn-submit">
                                        ĐĂNG KÝ NGAY
                                        <i class="fa-light fa-arrow-right"></i>
                                    </button>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>