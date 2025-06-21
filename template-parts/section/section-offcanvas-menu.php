<?php
/**
 * Template part for displaying the offcanvas menu
 *
 * @package QP_Green_Park
 */
?>
<!-- Offcanvas Menu -->
<div class="offcanvas-menu" id="offcanvasMenu">
    <div class="offcanvas-menu__overlay"></div>
    <div class="offcanvas-menu__wrapper">
        <div class="offcanvas-menu__inner">
            <div class="offcanvas-menu__header">
                <a href="<?php echo home_url(); ?>" class="offcanvas-menu__logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/static-assets/images/logo-text.svg" alt="<?php bloginfo('name'); ?>">
                </a>
                <button class="offcanvas-menu__close js-close-menu" aria-label="Close menu">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="offcanvas-menu__content">
                <div class="offcanvas-menu__container">
                    <div class="offcanvas-menu__left">
                        <?php if (function_exists('the_custom_logo') && has_custom_logo()) : ?>
                            <div class="offcanvas-menu__brand">
                                <?php the_custom_logo(); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="offcanvas-menu__social">
                            <a href="#" class="offcanvas-menu__social-link" aria-label="Facebook">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                            <a href="#" class="offcanvas-menu__social-link" aria-label="Youtube">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                            <a href="#" class="offcanvas-menu__social-link" aria-label="Instagram">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="#" class="offcanvas-menu__social-link" aria-label="Linkedin">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                    <div class="offcanvas-menu__right">
                        <?php
                        wp_nav_menu(array(
                            'theme_location'  => 'menu-1',
                            'menu_id'         => 'primary-menu',
                            'menu_class'      => 'offcanvas-menu__nav offcanvas-menu__nav--two-columns',
                            'container'       => 'nav',
                            'container_class' => 'offcanvas-menu__navigation',
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="offcanvas-menu__background">
            <!-- Abstract Shape SVGs -->
            <div class="offcanvas-menu__svg-element offcanvas-menu__svg-element--1">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path fill="rgba(255, 255, 255, 0.05)" d="M45.4,-77.6C58.6,-70.5,69.2,-58.5,77.6,-44.8C86,-31.2,92.3,-15.6,91.2,-0.7C90.1,14.3,81.6,28.5,73.1,42.8C64.6,57,56.1,71.2,43.4,78.5C30.7,85.7,13.9,86,0.8,84.5C-12.3,83,-24.6,79.6,-38.9,74.4C-53.1,69.2,-69.4,62,-77.9,49.8C-86.4,37.6,-87,20.3,-85.2,4.2C-83.5,-11.9,-79.3,-26.8,-71.6,-39.6C-63.9,-52.3,-52.7,-62.8,-39.9,-70C-27,-77.2,-12.4,-81,-0.7,-79.8C11.1,-78.6,32.2,-84.7,45.4,-77.6Z" transform="translate(100 100)" />
                </svg>
            </div>
            <div class="offcanvas-menu__svg-element offcanvas-menu__svg-element--2">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path fill="rgba(255, 255, 255, 0.08)" d="M35.6,-63.6C46.4,-56.6,55.9,-48,64.7,-37C73.5,-26.1,81.7,-13,80.9,-0.4C80.1,12.2,70.4,24.3,61.2,35.3C52.1,46.3,43.4,56.2,32.1,62.3C20.8,68.5,6.9,70.9,-7,71.4C-20.9,71.9,-34.8,70.4,-46.6,64.2C-58.5,58,-68.3,47.1,-74.5,34.4C-80.6,21.7,-83.1,7.2,-82.5,-7.4C-81.8,-21.9,-78.1,-36.4,-69.1,-46.7C-60.2,-57,-46.1,-63.2,-32.9,-68.7C-19.7,-74.2,-7.3,-79.1,3.1,-84.7C13.5,-90.3,24.8,-70.7,35.6,-63.6Z" transform="translate(100 100)" />
                </svg>
            </div>
            <div class="offcanvas-menu__svg-element offcanvas-menu__svg-element--3">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path fill="rgba(255, 255, 255, 0.06)" d="M44.3,-76.1C58.9,-69.2,73.3,-59.8,81.8,-46.1C90.3,-32.4,93,-14.6,89.9,1.8C86.8,18.1,78,32.6,68.2,45.9C58.4,59.1,47.7,71.1,34.7,76.5C21.7,81.9,6.5,80.8,-7.7,77.9C-21.9,74.9,-35,70.2,-48.3,63.6C-61.5,57,-74.9,48.6,-82.3,36.2C-89.8,23.9,-91.1,7.6,-86.8,-6.2C-82.5,-20,-72.6,-31.1,-62.3,-40.7C-52,-50.4,-41.2,-58.5,-29.8,-66.3C-18.3,-74,-9.1,-81.3,2.5,-85.5C14.1,-89.7,28.3,-90.8,44.3,-76.1Z" transform="translate(100 100)" />
                </svg>
            </div>
        </div>
    </div>
</div> 