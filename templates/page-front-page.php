<?php
/**
 * Template Name: Front Page
 *
 * @package QP_Green_Park
 */

//  Chăn truy cập trực tiếp
if (!defined('ABSPATH'))
    exit;


get_header();
?>

<div class="page page-pagepiling">
    <div id="pagepiling">
        <?php get_template_part('template-parts/section/section-video'); ?>

        <?php get_template_part('template-parts/section/section-introduction'); ?>

        <?php get_template_part('template-parts/section/section-masterplan'); ?>

        <?php get_template_part('template-parts/section/section-location'); ?>

        <?php get_template_part('template-parts/section/section-advantage'); ?>

        <?php get_template_part('template-parts/section/section-news'); ?>

        <?php get_template_part('template-parts/section/section-contact'); ?>
    </div>
</div>

<?php
get_footer();
?>