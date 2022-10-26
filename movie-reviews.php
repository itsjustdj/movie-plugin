<?php
/**
 * @package Easy Movie Reviews
 * @version 1.0
 */
/*
Plugin Name: Easy Movie Reviews
Plugin URI: 
Description: Allows you to create review posts about movies. More functions to come.
Author: D.J. Billings
Version: 1.0
Author URI: http://itsjustdj.com
*/

/*Custom Post Type Movie Reviews*/

function post_type_movie_reviews() {

   $supports = array(
      'title', // post title
      'editor', //post editor
      'author', // post author
      'categories', // categories
      'thumbnail', // featured images
      'excerpt', // post excerpt
    //   'custom-fields', // custom fields
      'revisions', // post revisions
      'post-formats', // post formats
   );

   $labels = array(
      'name' => _x('Movie Reviews', 'plural'),
      'singular_name' => _x('Movie Review', 'singular'),
      'menu_name' => _x('Movie Reviews', 'admin_menu'),
      'name_admin_bar' => _x('Movie Reviews', 'admin_bar'),
      'add_new' => _x('Add New', 'add new'),
      'add_new_item' => __('Add New movie review'),
      'new_item' => __('New movie review'),
      'edit_item' => __('Edit movie review'),
      'view_item' => __('View movie review'),
      'all_items' => __('All movie reviews'),
      'search_items' => __('Search movie reviews'),
      'not_found' => _('No movie reviews found.'),
   );
   $args = array(
      'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'revisions', 'categories', 'tags'),
      'labels' => $labels,
      'public' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'movie-reviews'),
      'has_archive' => true,
      'hierarchical' => false,
      );
      register_post_type('movie_reviews', $args);
}

add_action('init', 'post_type_movie_reviews');
      
/*Custom Post type end*/