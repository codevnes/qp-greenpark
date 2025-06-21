<?php
/**
 * Template Name: Trang Giới Thiệu
 * 
 * @package QP_GreenPark
 */

get_header();

?>

<div class="page page-pagepiling" id="pagepiling">
    <?php get_template_part('template-parts/section/section-video'); ?>
    <?php get_template_part('template-parts/section/section-overview'); ?>
    <?php get_template_part('template-parts/section/section-advantage'); ?>
    <?php get_template_part('template-parts/section/section-contact'); ?>
</div>

<?php
get_footer();