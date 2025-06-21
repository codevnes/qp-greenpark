<?php
/**
 * Template part for displaying the navigation bar
 *
 * @package QP_Green_Park
 */
?>
<nav class="site-navbar navbar">
    <div class="site-navbar__left">
        <button class="site-navbar__toggle js-toggle-menu btn" type="button">
            <span class="site-navbar__icon"><i class="fa-solid fa-bars"></i></span>
            <span class="site-navbar__toggle-text">Menu</span>
        </button>
        <div class="site-navbar__lang dropdown d-none">
            <a class="dropdown-toggle" href="#" id="dropdownLanguage" data-bs-toggle="dropdown"
                aria-expanded="false">
                VN
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLanguage">
                <li><a class="dropdown-item" href="<?php echo esc_url(home_url('/')); ?>">VN</a>
                </li>
                <li><a class="dropdown-item" href="<?php echo esc_url(home_url('/en/')); ?>">EN</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="site-navbar__branding">
        <a class="site-navbar__brand" href="<?php echo esc_url(home_url('/')); ?>">
            <?php
            if (function_exists('the_custom_logo') && has_custom_logo()) {
                the_custom_logo();
            } else {
                // Paste SVG hoặc text logo tại đây
                ?>
                <span class="site-navbar__logo-text"><?php bloginfo('name'); ?></span>
                <?php
            }
            ?>
        </a>
    </div>
    <div class="site-navbar__right">
        <a class="site-navbar__hotline btn btn--icon hide-on-mobile" href="tel:02835282828">
            <span class="btn__icon"><i class="fa-regular fa-phone-volume"></i></span>
            <span class="btn__text">(028) 35 28 28 28</span>
        </a>
        <a class="site-navbar__register btn btn--icon hide-on-mobile" href="<?php echo esc_url(home_url('/lien-he/')); ?>">
            <span class="btn__icon"><i class="fa-regular fa-pen-to-square"></i></span>
            <span class="btn__text">Nhận tư vấn</span>
        </a>
    </div>
</nav> 