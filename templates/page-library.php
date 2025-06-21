<?php
/**
 * Template Name: Thư Viện Dự Án
 * 
 * @package QP_GreenPark
 */

get_header();

?>

<div class="page-library page-pagepiling" id="pagepiling">

    <?php get_template_part('template-parts/section/section-perspective'); ?>

    <?php get_template_part('template-parts/section/section-document'); ?>

    <?php get_template_part('template-parts/section/section-contact'); ?>


</div>

<?php
get_footer();