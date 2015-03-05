<?php while (have_posts()) : the_post(); ?>
  <?php if ( function_exists('yoast_breadcrumb') ) {
      yoast_breadcrumb('<p id="breadcrumbs">','</p>');
    } ?>

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
    <header>
      <h1 class="entry-title"><?= $episode_title ?></h1>
    </header>
    <?php echo do_shortcode('[share]') ?>

    <div class="entry-content">
      <?php the_post_thumbnail('bones-thumb-500-square'); ?>
      <?php $episode_summary = get_post_meta($post_id, '_cmb2_ado_summary', true); ?>
      <?php $episode_shownotes  = get_post_meta($post_id, '_cmb2_ado_show_notes', true); ?>
      <?php echo( wpautop( $episode_summary ) ); ?>
      <?php 
        if ($episode_shownotes <> NULL){

          echo do_shortcode('[powerpress]');
          echo "<h2>Show Notes</h2>";
          echo( wpautop( $episode_shownotes ) );
        }
        ?>

        <h2>Guests</h2>
        <?php $coauthors = get_coauthors(); ?>
        <?php foreach( $coauthors as $coauthor ) : ?>
        <?php if ($coauthor->user_level <> '10' ) {  ?>
        <?php echo do_shortcode('[wp_biographia user="' . $coauthor->nickname . '"]');}?>
        <?php endforeach; ?>
        
        <?php
          global $post;
          $checkout = get_post_meta( $post->ID, '_cmb2_ado_checkouts', true );
          if ($checkout <> NULL){
            echo('<h2>Check Outs</h2>');
            echo( wpautop( $checkout ) );
          } ?>

          <hr />

          <h3>Thanks to our awesome sponsors!</h3>

          <?php
          $sponsor_1_url =  get_post_meta( $post->ID, '_cmb2_ado_sponsor_1_url', true );
          $sponsor_1_banner =  get_post_meta( $post->ID, '_cmb2_sponsor_1_banner', true );
          $sponsor_1_text = get_post_meta( $post->ID, '_cmb2_ado_sponsor_1_text', true );
          $sponsor_2_url =  get_post_meta( $post->ID, '_cmb2_ado_sponsor_2_url', true );
          $sponsor_2_banner =  get_post_meta( $post->ID, '_cmb2_ado_sponsor_2_banner', true );
          $sponsor_2_text = get_post_meta( $post->ID, '_cmb2_ado_sponsor_2_text', true );
          if ($sponsor_1_banner <> NULL){
            echo('<p><a href = "' . $sponsor_1_url . '"><img src ="' . $sponsor_1_banner . '"></a></p>');
          }

          if ($sponsor_2_banner <> NULL){
            echo('<p><a href = "' . $sponsor_2_url . '"><img src ="' . $sponsor_2_banner . '"></a></p>');
          }
          ?>

          <hr />
        
      </div>
      <?php echo do_shortcode('[share]') ?>

    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>