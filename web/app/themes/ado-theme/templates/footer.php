<footer class="content-info" role="contentinfo">
    <?php dynamic_sidebar('sidebar-footer'); ?>
      <?php if ( function_exists('yoast_breadcrumb') ) {
      yoast_breadcrumb('<p id="breadcrumbs">','</p>');
    } ?>
</footer>
