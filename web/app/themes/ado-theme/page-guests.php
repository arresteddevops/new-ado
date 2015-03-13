<?php
/**
 * Template Name: Guests Page
 */
?>
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'guests'); ?>
<?php endwhile; ?>
