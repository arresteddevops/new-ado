  <?php if ( function_exists('yoast_breadcrumb') ) {
      yoast_breadcrumb('<p id="breadcrumbs">','</p>');
    } ?>
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
  <div class="entry-content">
  <?php the_post_thumbnail('bones-thumb-500-square'); ?>
      <a href="<?php echo get_permalink( $post_id ); ?>"><h2 class="entry-title"><?= $episode_title ?></a></h2>
    
      
      <?php $episode_summary = get_post_meta($post_id, '_cmb2_ado_summary', true); ?>
      <?php echo( wpautop( $episode_summary ) ); ?>
      <?php echo do_shortcode('[powerpress width=100]'); ?>

    
      </div>
  </article>
<?php endwhile; ?>