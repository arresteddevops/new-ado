<!-- trying the wrapper -->
<div id="wrapper">
<div id = "list">
<?php while (have_posts()) : the_post(); ?>

  <?php
  $post_id = get_the_ID();
  $episode_number = get_post_meta($post_id, '_cmb2_ado_episode_number', true);
  if ($episode_number == NULL)
  {
    $episode_title = the_title("","",FALSE);
  }
  else
  {
    $episode_title = "Episode Number " . $episode_number . " <br/>". the_title("","",FALSE);
  }
  ?>

  <article <?php post_class(); ?>>
  <?php if ($wp_query->current_post < 1) : ?>
    <div class="item-first">
  <?php else : ?>
    <div class="item">
  <?php endif ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'episode-archive-thumb' ); ?>
  <img src = "<?php echo $image[0]; ?>">

      <a href="<?php echo get_permalink( $post_id ); ?>"><h2 class="entry-title"><?= $episode_title ?></a></h2>
    
      
      <?php $episode_summary = get_post_meta($post_id, '_cmb2_ado_summary', true); ?>
      <!--
      <?php $episode_summary = substr($episode_summary, 0, 100); ?>
      -->
      <div id="summary">
      <?php echo( $episode_summary ) ; ?>
      </div>
      <?php echo do_shortcode('[powerpress]'); ?>

    
      </div>
  </article>
<?php endwhile; ?>
</div>
</div>