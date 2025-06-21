<?php
/**
 * The header for our theme
 *
 * @package QP_Green_Park
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#primary"><?php esc_html_e('Skip to content', 'qp-greenpark'); ?></a>

        <?php 
        // Include header structure
        get_template_part('template-parts/section/section', 'header'); 
        
        // Include offcanvas menu
        get_template_part('template-parts/section/section', 'offcanvas-menu'); 
        ?>
    </div>
</body>
</html>