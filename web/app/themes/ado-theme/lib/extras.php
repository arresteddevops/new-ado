<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Config;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Config\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/** 
* Remove additional assets from plugins
*/ 
function remove_plugin_assets() {
  wp_dequeue_style('roots-share-buttons'); // roots-share-buttons/assets/styles/share-buttons.css
  wp_dequeue_script('roots-share-buttons'); //roots-share-buttons/assets/scripts/share-buttons.js
  wp_enqueue_style('wp-biographia', '/app/plugins/wp-biographia/css/wp-biographia.css', array(), NULL);
  wp_dequeue_style('wp-biographia'); //wp-biographia/css/wp-biographia.css
}

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\remove_plugin_assets');
