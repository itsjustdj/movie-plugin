<?php

/*Register Custom Post Type Movie Reviews*/

function cpt_mr() {

   $supports = array(
      'title', // post title
      'editor', //post editor
      'author', // post author
      'category', // categories
      'thumbnail', // featured images
      'excerpt', // post excerpt
      'revisions', // post revisions
      'post-formats', // post formats
      'comments'
   );

   $labels = array(
      'name' => _x('Movie Reviews', 'plural'),
      'singular_name' => _x('Movie Review', 'singular'),
      'menu_name' => _x('Movie Reviews', 'admin_menu'),
      'name_admin_bar' => _x('Movie Review', 'admin_bar'),
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
      'supports' => $supports,
      'taxonomies' => array('topic', 'category', 'post_tag'),
      'labels' => $labels,
      'public' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'movie-review'),
      'has_archive' => true,
      'hierarchical' => false,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      // 'menu_position'       => 12,
      'can_export'          => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
      'show_in_rest'        => true,
      );

      // Registering the custom post type
      register_post_type('movie_reviews', $args);
}

// Hook into the 'init' action

add_action('init', 'cpt_mr');


// include your custom post type on category and tags pages
function mr_custom_post_type_cat_filter( $query ) {
            
   global $pagenow;
   
   $type = 'post';
   if ( isset( $_GET['post_type'] ) ) {
       $type = $_GET['post_type'];
   }
   if ( is_category() && ( ! isset( $query->query_vars['suppress_filters'] ) || false == $query->query_vars['suppress_filters'] ) ) {
       $query->set( 'post_type', array( 'post', 'movie_reviews' ) );
   }
   if ( $query->is_tag() && $query->is_main_query() ) {
   
       $query->set( 'post_type', array( 'post', 'movie_reviews' ) );
   }
   if ( is_admin() && 'books' == $type && $query->is_main_query() && $pagenow == 'edit.php' ) {
       $query->set( 'post_type', 'books' );
   }
   if ( is_admin() && 'post' == $type && $query->is_main_query() && $pagenow == 'edit.php' ) {
       $query->set( 'post_type', 'post' );
   }

   return $query;
}
add_action('pre_get_posts', 'mr_custom_post_type_cat_filter');
      
/*Custom Post type end*/