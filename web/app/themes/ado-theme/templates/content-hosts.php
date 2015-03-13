<div class="entry-content">
  <?php
  echo do_shortcode('[wp_biographia user="*" role="editor"]');
  ?>
</div>
<footer>
  <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
</footer>